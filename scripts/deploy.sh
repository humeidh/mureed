#!/usr/bin/env bash
# scripts/deploy.sh
# Runs on the VPS as the deployer user, triggered by GitHub Actions via SSH.

set -euo pipefail

APP_DIR="/var/www/themureed"
PHP="/usr/bin/php8.5"
ARTISAN="$PHP $APP_DIR/artisan"

echo "==> [$(date '+%Y-%m-%d %H:%M:%S')] Deploy started"

cd "$APP_DIR"

# --- 1. Maintenance mode ON ---
echo "==> Enabling maintenance mode"
$ARTISAN down --retry=30 --render="errors::503"

# Lift maintenance mode on any failure
trap '$ARTISAN up; echo "==> Maintenance mode lifted (trap)"' EXIT

# --- 2. Pull latest code ---
echo "==> Pulling latest code from main"
git fetch origin main
git reset --hard origin/main

# --- 3. Install PHP dependencies ---
echo "==> Installing Composer dependencies"
composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist

# --- 4. Run database migrations ---
echo "==> Running migrations"
$ARTISAN migrate --force

# --- 5. Rebuild application caches ---
echo "==> Caching config, routes, views, events"
$ARTISAN config:cache
$ARTISAN route:cache
$ARTISAN view:cache
$ARTISAN event:cache
$ARTISAN filament:optimize

# --- 6. Ensure storage link exists ---
$ARTISAN storage:link --force 2>/dev/null || true

# --- 7. Fix permissions ---
echo "==> Setting permissions"
chmod -R 775 storage bootstrap/cache

# --- 8. Reload PHP-FPM gracefully ---
echo "==> Reloading PHP-FPM"
sudo /bin/systemctl reload php8.5-fpm

# --- 9. Restart queue workers ---
echo "==> Restarting queue workers"
$ARTISAN queue:restart
sudo /usr/bin/supervisorctl restart themureed-worker:*

# --- 10. Maintenance mode OFF ---
trap - EXIT
echo "==> Disabling maintenance mode"
$ARTISAN up

echo "==> [$(date '+%Y-%m-%d %H:%M:%S')] Deploy complete"
