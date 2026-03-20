#!/usr/bin/env bash
# scripts/first-time-setup.sh
# Run this ONCE after the first deployment to set up Filament Shield.
# Do NOT run this on every deploy — it will reset permissions.

set -euo pipefail

APP_DIR="/var/www/themureed"
PHP="/usr/bin/php8.5"
ARTISAN="$PHP $APP_DIR/artisan"

cd "$APP_DIR"

echo "==> Installing Filament Shield"
$ARTISAN shield:install --fresh

echo "==> Generating all permissions"
$ARTISAN shield:generate --all

echo "==> Creating Filament admin user"
$ARTISAN make:filament-user

echo "==> Assigning super admin role to user ID 1"
$ARTISAN shield:super-admin --user=1

echo "==> First time setup complete"
