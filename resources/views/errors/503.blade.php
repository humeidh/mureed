<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Mureed - Under Maintenance</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <style>
        :root {
            --navy-900: #1a365d;
            --navy-800: #2d3748;
            --azure-500: #3182ce;
            --azure-600: #2c5aa0;
            --sand-50: #f4efe2;
            --ink-on-navy: #ffffff;
            --ink-muted: rgba(255,255,255,0.72);
            --ink-faint: rgba(255,255,255,0.5);
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background: var(--navy-900);
        }

        body {
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--ink-on-navy);
            background: linear-gradient(160deg, var(--navy-900) 0%, var(--navy-800) 62%, #24334a 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 4rem 1.5rem 0;
        }

        .content {
            position: relative;
            z-index: 2;
            max-width: 40rem;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-bottom: 14rem;
            animation: riseIn 0.9s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .mark {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 12px;
            background: var(--sand-50);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Georgia, 'Times New Roman', serif;
            font-weight: 700;
            font-size: 1.9rem;
            color: var(--navy-900);
            box-shadow: 0 12px 28px rgba(0,0,0,0.35);
            margin-bottom: 1.75rem;
        }

        .eyebrow {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--ink-faint);
            margin: 0 0 0.9rem;
        }

        .eyebrow::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--azure-500);
            margin-right: 0.6em;
            vertical-align: middle;
            box-shadow: 0 0 0 4px rgba(49, 130, 206, 0.25);
        }

        h1 {
            font-family: Georgia, 'Times New Roman', serif;
            font-weight: 700;
            font-size: clamp(2rem, 5vw, 3rem);
            line-height: 1.18;
            letter-spacing: -0.01em;
            margin: 0 0 1rem;
            text-wrap: balance;
        }

        p.lede {
            font-size: clamp(1rem, 1.6vw, 1.125rem);
            line-height: 1.65;
            color: var(--ink-muted);
            max-width: 34rem;
            margin: 0 0 2.25rem;
            text-wrap: balance;
        }

        .cta {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            background: var(--sand-50);
            color: var(--navy-900);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.98rem;
            padding: 0.85rem 1.9rem;
            border-radius: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
        }

        .cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.35);
            background: #ffffff;
        }

        .cta:focus-visible {
            outline: 2px solid var(--azure-500);
            outline-offset: 3px;
        }

        .cta svg { width: 1rem; height: 1rem; flex-shrink: 0; }

        .status {
            margin-top: 2.75rem;
            padding-top: 1.75rem;
            border-top: 1px solid rgba(255,255,255,0.14);
            width: 100%;
            max-width: 22rem;
            font-size: 0.82rem;
            color: var(--ink-faint);
            line-height: 1.8;
        }

        .status strong { color: var(--ink-muted); font-weight: 600; }

        .location {
            letter-spacing: 0.06em;
            text-transform: uppercase;
            font-size: 0.68rem;
            color: var(--ink-faint);
            margin-top: 0.65rem;
        }

        /* Horizon illustration */
        .horizon {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 46vh;
            min-height: 240px;
            z-index: 1;
            pointer-events: none;
        }

        .horizon svg { width: 100%; height: 100%; display: block; }

        .sun {
            animation: glow 6s ease-in-out infinite;
            transform-origin: center;
        }

        .wave-back { animation: driftBack 22s linear infinite; }
        .wave-front { animation: driftFront 16s linear infinite; }

        @keyframes riseIn {
            from { opacity: 0; transform: translateY(14px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes glow {
            0%, 100% { opacity: 0.9; }
            50% { opacity: 1; filter: drop-shadow(0 0 18px rgba(244, 239, 226, 0.35)); }
        }

        @keyframes driftBack {
            from { transform: translateX(0); }
            to { transform: translateX(-33.333%); }
        }

        @keyframes driftFront {
            from { transform: translateX(0); }
            to { transform: translateX(-33.333%); }
        }

        @media (prefers-reduced-motion: reduce) {
            .content { animation: none; }
            .sun, .wave-back, .wave-front { animation: none; }
        }

        @media (max-width: 30rem) {
            .content { padding-bottom: 11rem; }
            .horizon { height: 34vh; min-height: 170px; }
        }
    </style>
</head>
<body>

    <div class="content">
        <div class="mark" aria-hidden="true">M</div>
        <p class="eyebrow">Under Maintenance</p>
        <h1>We're tidying up the island</h1>
        <p class="lede">
            The Mureed is closed to visitors for a little while as we polish a few things behind the scenes.
            We'll have the doors open again shortly &mdash; thank you for your patience.
        </p>
        <a class="cta" href="mailto:info@themureed.com">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 6 12 13 2 6"/><path d="M2 6h20v12H2z"/></svg>
            Email Us
        </a>
        <div class="status">
            @php
                $retryAfter = method_exists($exception ?? null, 'getHeaders') ? ($exception->getHeaders()['Retry-After'] ?? null) : null;
            @endphp
            @if ($retryAfter)
                <div><strong>Estimated return:</strong> within {{ max(1, (int) ceil($retryAfter / 60)) }} minute{{ ceil($retryAfter / 60) == 1 ? '' : 's' }}</div>
            @endif
            <div class="location">Fulidhoo Island &middot; Vaavu Atoll &middot; Maldives</div>
        </div>
    </div>

    <div class="horizon" aria-hidden="true">
        <svg viewBox="0 0 900 300" preserveAspectRatio="none">
            <circle class="sun" cx="450" cy="120" r="46" fill="#f4efe2" opacity="0.92"/>
            <g class="wave-back" fill="#24334a" opacity="0.65">
                <path d="M0,190 Q75,170 150,190 T300,190 T450,190 T600,190 T750,190 T900,190 T1050,190 T1200,190 T1350,190 V300 H0 Z"/>
                <path d="M1200,190 Q1275,170 1350,190 T1500,190 T1650,190 T1800,190 T1950,190 T2100,190 T2250,190 T2400,190 T2550,190 V300 H1200 Z" transform="translate(-900,0)"/>
            </g>
            <g class="wave-front" fill="#182842">
                <path d="M0,225 Q75,200 150,225 T300,225 T450,225 T600,225 T750,225 T900,225 T1050,225 T1200,225 T1350,225 V300 H0 Z"/>
                <path d="M1200,225 Q1275,200 1350,225 T1500,225 T1650,225 T1800,225 T1950,225 T2100,225 T2250,225 T2400,225 T2550,225 V300 H1200 Z" transform="translate(-900,0)"/>
            </g>
            <g transform="translate(640,205)" opacity="0.9">
                <path d="M-26,10 L26,10 L15,20 L-15,20 Z" fill="#182842"/>
                <path d="M0,-28 L0,10 L20,10 Z" fill="#2d3748"/>
                <line x1="0" y1="-28" x2="0" y2="10" stroke="#0f1d33" stroke-width="1.5"/>
            </g>
        </svg>
    </div>

</body>
</html>
