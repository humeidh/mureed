<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Mureed</title>
    <meta name="description" content="The Mureed — a quiet guesthouse on Fulidhoo Island, Vaavu Atoll, Maldives. Send us a booking inquiry or message us on WhatsApp.">
    <meta name="theme-color" content="#0f2440">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy-950: #0b1b31;
            --navy-900: #0f2440;
            --navy-800: #1a365d;
            --azure: #4f9be0;
            --sand-50: #faf7f0;
            --sand-100: #f4efe2;
            --sand-300: #e3d9c2;
            --ink: #14233a;
            --ink-soft: #55627a;
            --ink-faint: #8a94a6;
            --on-dark: #ffffff;
            --on-dark-soft: rgba(255,255,255,0.72);
            --on-dark-faint: rgba(255,255,255,0.45);
            --line-dark: rgba(255,255,255,0.12);
            --wa: #25d366;
            --wa-deep: #1ebe5b;
            --danger: #c2413b;
            --radius: 14px;
            --serif: 'Fraunces', Georgia, 'Times New Roman', serif;
            --sans: 'Manrope', system-ui, -apple-system, 'Segoe UI', sans-serif;
        }

        * { box-sizing: border-box; }

        html, body { margin: 0; padding: 0; }

        body {
            font-family: var(--sans);
            color: var(--ink);
            background: var(--sand-50);
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
        }

        .layout {
            display: grid;
            grid-template-columns: minmax(0, 5fr) minmax(0, 6fr);
            min-height: 100vh;
        }

        /* ---------- Left: brand + contact ---------- */
        .side {
            position: relative;
            overflow: hidden;
            color: var(--on-dark);
            background:
                radial-gradient(120% 70% at 85% 0%, rgba(79,155,224,0.28) 0%, transparent 60%),
                linear-gradient(170deg, var(--navy-800) 0%, var(--navy-900) 45%, var(--navy-950) 100%);
            padding: clamp(2rem, 5vw, 4rem);
            display: flex;
            flex-direction: column;
            gap: 3rem;
        }

        .side > * { position: relative; z-index: 2; }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .brand-mark {
            width: 5.75rem;
            height: 5.75rem;
            flex-shrink: 0;
            border-radius: 50%;
            object-fit: contain;
            display: block;
            box-shadow: 0 8px 22px -6px rgba(0,0,0,0.45);
        }

        .brand small {
            display: block;
            font-size: 0.68rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--on-dark-faint);
            font-weight: 600;
            margin-top: 0.15rem;
        }

        .intro { margin-top: auto; }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--on-dark-faint);
            margin: 0 0 1.1rem;
        }

        .eyebrow::before {
            content: '';
            width: 1.6rem;
            height: 1px;
            background: var(--azure);
        }

        h1 {
            font-family: var(--serif);
            font-weight: 400;
            font-size: clamp(2.2rem, 4.2vw, 3.6rem);
            line-height: 1.08;
            letter-spacing: -0.02em;
            margin: 0 0 1.25rem;
            text-wrap: balance;
        }

        h1 em {
            font-style: italic;
            color: var(--sand-300);
        }

        .lede {
            font-size: 1.02rem;
            line-height: 1.7;
            color: var(--on-dark-soft);
            max-width: 30rem;
            margin: 0 0 2rem;
        }

        .btn-wa {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            background: var(--wa);
            color: #062a14;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.98rem;
            padding: 0.95rem 1.6rem;
            border-radius: 999px;
            box-shadow: 0 12px 30px -8px rgba(37,211,102,0.55);
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .btn-wa:hover {
            background: var(--wa-deep);
            transform: translateY(-2px);
            box-shadow: 0 16px 34px -8px rgba(37,211,102,0.65);
        }

        .btn-wa:focus-visible {
            outline: 2px solid #fff;
            outline-offset: 3px;
        }

        .btn-wa svg { width: 1.3rem; height: 1.3rem; flex-shrink: 0; }

        .contact-list {
            list-style: none;
            margin: 0;
            padding: 1.75rem 0 0;
            border-top: 1px solid var(--line-dark);
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.4rem 1.5rem;
        }

        .contact-list li {
            display: flex;
            gap: 0.8rem;
            align-items: flex-start;
            min-width: 0;
        }

        .contact-list .ico {
            flex-shrink: 0;
            width: 2.1rem;
            height: 2.1rem;
            border-radius: 50%;
            border: 1px solid var(--line-dark);
            display: grid;
            place-items: center;
            color: var(--sand-300);
        }

        .contact-list .ico svg { width: 0.95rem; height: 0.95rem; }

        .contact-list .label {
            display: block;
            font-size: 0.66rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--on-dark-faint);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .contact-list .value,
        .contact-list a {
            color: var(--on-dark);
            text-decoration: none;
            font-size: 0.93rem;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .contact-list a:hover { color: var(--sand-300); }

        /* Decorative horizon lines */
        .waves {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 55%;
            z-index: 1;
            pointer-events: none;
            opacity: 0.55;
        }

        .waves svg { width: 200%; height: 100%; display: block; animation: drift 28s linear infinite; }

        @keyframes drift {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }

        .sun {
            position: absolute;
            width: 22rem;
            height: 22rem;
            right: -7rem;
            top: -7rem;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 0 0 3rem rgba(255,255,255,0.02), 0 0 0 6rem rgba(255,255,255,0.015);
            z-index: 1;
        }

        /* ---------- Right: inquiry form ---------- */
        .main {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: clamp(2rem, 5vw, 4rem) clamp(1rem, 5vw, 4rem);
        }

        .card {
            width: 100%;
            max-width: 34rem;
            animation: rise 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes rise {
            from { opacity: 0; transform: translateY(14px); }
            to { opacity: 1; transform: none; }
        }

        .card h2 {
            font-family: var(--serif);
            font-weight: 400;
            font-size: clamp(1.7rem, 2.6vw, 2.2rem);
            letter-spacing: -0.015em;
            margin: 0 0 0.5rem;
        }

        .card .sub {
            color: var(--ink-soft);
            margin: 0 0 2rem;
            line-height: 1.6;
            font-size: 0.97rem;
        }

        form { display: grid; gap: 1.1rem; }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.1rem;
        }

        .field { display: flex; flex-direction: column; gap: 0.45rem; min-width: 0; }

        label {
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            color: var(--ink);
        }

        label .opt { color: var(--ink-faint); font-weight: 500; }

        input, select, textarea {
            font: inherit;
            font-size: 0.97rem;
            color: var(--ink);
            background: #fff;
            border: 1px solid var(--sand-300);
            border-radius: 10px;
            padding: 0.8rem 0.95rem;
            width: 100%;
            min-width: 0;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
            -webkit-appearance: none;
            appearance: none;
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2355627a' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.95rem center;
            padding-right: 2.4rem;
        }

        textarea { resize: vertical; min-height: 6rem; }

        select:invalid,
        select.is-empty { color: var(--ink-faint); }

        select option { color: var(--ink); }

        select:disabled {
            background-color: var(--sand-100);
            cursor: not-allowed;
        }

        /* Transfer checkbox */
        .check {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
            padding: 0.95rem 1rem;
            background: #fff;
            border: 1px solid var(--sand-300);
            border-radius: 10px;
            cursor: pointer;
            letter-spacing: 0;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .check:hover { border-color: #cfc2a5; }

        .check:has(input:checked) {
            border-color: var(--navy-800);
            box-shadow: 0 0 0 3px rgba(26,54,93,0.08);
        }

        .check input {
            flex-shrink: 0;
            width: 1.15rem;
            height: 1.15rem;
            margin: 0.1rem 0 0;
            padding: 0;
            border: 1.5px solid #b9ab8a;
            border-radius: 5px;
            display: grid;
            place-content: center;
            cursor: pointer;
        }

        .check input:checked {
            background: var(--navy-900);
            border-color: var(--navy-900);
        }

        .check input:checked::after {
            content: '';
            width: 0.32rem;
            height: 0.6rem;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: translateY(-1px) rotate(45deg);
        }

        .check input:focus-visible { box-shadow: 0 0 0 3px rgba(26,54,93,0.2); }

        .check-title { display: block; font-size: 0.93rem; font-weight: 600; }

        .check-hint {
            display: block;
            margin-top: 0.2rem;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--ink-faint);
        }

        .transfer-row { transition: opacity 0.2s ease; }
        .transfer-row.is-disabled { opacity: 0.5; }

        input::placeholder, textarea::placeholder { color: var(--ink-faint); }

        input:hover, select:hover, textarea:hover { border-color: #cfc2a5; }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--navy-800);
            box-shadow: 0 0 0 3px rgba(26,54,93,0.12);
        }

        .field.invalid input,
        .field.invalid select { border-color: var(--danger); }

        .error {
            font-size: 0.76rem;
            color: var(--danger);
            min-height: 0;
            display: none;
        }

        .field.invalid .error { display: block; }

        .submit {
            margin-top: 0.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            width: 100%;
            font: inherit;
            font-weight: 700;
            font-size: 1rem;
            color: #fff;
            background: var(--navy-900);
            border: 0;
            border-radius: 999px;
            padding: 1rem 1.5rem;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .submit:hover { background: var(--navy-800); transform: translateY(-1px); }
        .submit:focus-visible { outline: 2px solid var(--azure); outline-offset: 3px; }
        .submit svg { width: 1.1rem; height: 1.1rem; }

        .note {
            text-align: center;
            font-size: 0.8rem;
            color: var(--ink-faint);
            margin: 0.25rem 0 0;
            line-height: 1.5;
        }

        .footer {
            margin-top: 2.5rem;
            padding-top: 1.25rem;
            border-top: 1px solid var(--sand-300);
            font-size: 0.75rem;
            color: var(--ink-faint);
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        /* Floating WhatsApp button (mobile) */
        .fab {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            background: var(--wa);
            color: #fff;
            display: none;
            place-items: center;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.35);
            z-index: 10;
        }

        .fab svg { width: 1.7rem; height: 1.7rem; }

        /* ---------- Responsive ---------- */
        @media (max-width: 960px) {
            .layout { grid-template-columns: 1fr; }
            .side { gap: 2.25rem; padding-bottom: 3rem; }
            .intro { margin-top: 0; }
            .waves { height: 40%; }
            .fab { display: grid; }
        }

        @media (max-width: 520px) {
            .side { padding: 1.75rem 1rem 2.5rem; }
            .main { padding: 2.25rem 1rem 5.5rem; }
            .row { grid-template-columns: 1fr; }
            .contact-list { grid-template-columns: 1fr; }
            .btn-wa { width: 100%; justify-content: center; }
        }

        @media (prefers-reduced-motion: reduce) {
            .waves svg, .card { animation: none; }
            .btn-wa, .submit { transition: none; }
        }
    </style>
</head>
<body>

<div class="layout">

    <!-- ===== Left: brand & contact ===== -->
    <aside class="side">
        <div class="sun" aria-hidden="true"></div>

        <div class="brand">
            <img class="brand-mark" src="{{ asset('images/logo.png') }}" alt="" width="92" height="92">
            <div>
                The Mureed
                <small>Guesthouse &middot; Maldives</small>
            </div>
        </div>

        <div class="intro">
            <p class="eyebrow">Fulidhoo Island</p>
            <h1>Slow mornings, <em>clear water,</em> and a warm island welcome.</h1>
            <p class="lede">
                A small guesthouse on one of Vaavu Atoll's quietest islands. Tell us your dates and we'll
                take care of the rest, or message us now on WhatsApp.
            </p>
            <a class="btn-wa js-wa" href="#" target="_blank" rel="noopener">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.47 14.38c-.3-.15-1.75-.86-2.02-.96-.27-.1-.47-.15-.67.15-.2.3-.77.96-.94 1.16-.17.2-.35.22-.64.07-.3-.15-1.25-.46-2.38-1.47-.88-.78-1.47-1.75-1.64-2.05-.17-.3-.02-.46.13-.6.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.6-.92-2.2-.24-.58-.49-.5-.67-.5h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.21 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.23 1.36.2 1.87.12.57-.08 1.75-.72 2-1.41.25-.69.25-1.29.17-1.41-.07-.12-.27-.2-.57-.35M12.05 21.5h-.01a9.4 9.4 0 0 1-4.8-1.32l-.34-.2-3.57.94.95-3.48-.22-.36a9.4 9.4 0 0 1-1.44-5.01c0-5.2 4.23-9.43 9.44-9.43 2.52 0 4.89.98 6.67 2.77a9.37 9.37 0 0 1 2.76 6.67c0 5.2-4.23 9.43-9.44 9.43m8.03-17.46A11.27 11.27 0 0 0 12.05.72C5.79.72.7 5.8.7 12.06c0 2 .52 3.95 1.52 5.67L.6 23.6l6.01-1.58a11.33 11.33 0 0 0 5.43 1.38h.01c6.25 0 11.34-5.09 11.34-11.34 0-3.03-1.18-5.88-3.32-8.02"/></svg>
                Chat with us on WhatsApp
            </a>
        </div>

        <ul class="contact-list">
            <li>
                <span class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
                <div>
                    <span class="label">Phone</span>
                    <a class="js-phone" href="tel:+9607343400">+960 734-3400</a>
                </div>
            </li>
            <li>
                <span class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg></span>
                <div>
                    <span class="label">Email</span>
                    <a href="mailto:info@themureed.com">info@themureed.com</a>
                </div>
            </li>
            <li>
                <span class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
                <div>
                    <span class="label">Location</span>
                    <span class="value">Fulidhoo Island, Vaavu Atoll<br>Republic of Maldives</span>
                </div>
            </li>
            <li>
                <span class="ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></span>
                <div>
                    <span class="label">Front desk</span>
                    <span class="value">Daily, 6:00 AM &ndash; 10:00 PM<br>Maldives time (GMT+5)</span>
                </div>
            </li>
        </ul>

        <div class="waves" aria-hidden="true">
            <svg viewBox="0 0 1200 300" preserveAspectRatio="none" fill="none" stroke="rgba(255,255,255,0.14)" stroke-width="1">
                <path d="M0 120 Q 75 100 150 120 T 300 120 T 450 120 T 600 120 T 750 120 T 900 120 T 1050 120 T 1200 120"/>
                <path d="M0 160 Q 75 140 150 160 T 300 160 T 450 160 T 600 160 T 750 160 T 900 160 T 1050 160 T 1200 160"/>
                <path d="M0 200 Q 75 180 150 200 T 300 200 T 450 200 T 600 200 T 750 200 T 900 200 T 1050 200 T 1200 200"/>
                <path d="M0 240 Q 75 220 150 240 T 300 240 T 450 240 T 600 240 T 750 240 T 900 240 T 1050 240 T 1200 240"/>
                <path d="M0 280 Q 75 260 150 280 T 300 280 T 450 280 T 600 280 T 750 280 T 900 280 T 1050 280 T 1200 280"/>
            </svg>
        </div>
    </aside>

    <!-- ===== Right: booking inquiry ===== -->
    <main class="main">
        <div class="card">
            <h2>Booking inquiry</h2>
            <p class="sub">Share your dates and we'll confirm availability and rates. When you press send, WhatsApp opens with your details already filled in.</p>

            <form id="inquiry" novalidate>
                <div class="field">
                    <label for="name">Full name</label>
                    <input id="name" name="name" type="text" autocomplete="name" placeholder="Jane Doe" required>
                    <span class="error">Please enter your name.</span>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" placeholder="you@example.com" required>
                        <span class="error">Please enter a valid email.</span>
                    </div>
                    <div class="field">
                        <label for="country">Nationality</label>
                        <select id="country" name="country" autocomplete="country-name" required>
                            <option value="">Select a country</option>
                        </select>
                        <span class="error">Please select your nationality.</span>
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="checkin">Check-in</label>
                        <input id="checkin" name="checkin" type="date" required>
                        <span class="error">Choose a check-in date.</span>
                    </div>
                    <div class="field">
                        <label for="checkout">Check-out</label>
                        <input id="checkout" name="checkout" type="date" required>
                        <span class="error">Check-out must be after check-in.</span>
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="adults">Adults</label>
                        <select id="adults" name="adults" required>
                            <option value="">Select</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option value="6+">6+</option>
                        </select>
                        <span class="error">Please select number of adults.</span>
                    </div>
                    <div class="field">
                        <label for="children">Children</label>
                        <select id="children" name="children" required>
                            <option value="">Select</option>
                            <option>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option value="4+">4+</option>
                        </select>
                        <span class="error">Please select number of children.</span>
                    </div>
                </div>

                <label class="check" for="transfer">
                    <input id="transfer" name="transfer" type="checkbox">
                    <span>
                        <span class="check-title">I need a transfer to the island</span>
                        <span class="check-hint">We'll arrange your pickup and travel to Fulidhoo.</span>
                    </span>
                </label>

                <div class="row transfer-row is-disabled" id="transfer-row">
                    <div class="field">
                        <label for="pickup">Pickup location</label>
                        <select id="pickup" name="pickup" disabled>
                            <option value="">Select pickup</option>
                            <option value="Male'">Male'</option>
                            <option value="Airport">Airport</option>
                        </select>
                        <span class="error">Choose a pickup location.</span>
                    </div>
                    <div class="field">
                        <label for="pickup-time">Preferred time</label>
                        <select id="pickup-time" name="pickup_time" disabled>
                            <option value="">Select time</option>
                            <option value="Morning">Morning</option>
                            <option value="Afternoon">Afternoon</option>
                        </select>
                        <span class="error">Choose a preferred time.</span>
                    </div>
                </div>

                <div class="field">
                    <label for="message">Anything else? <span class="opt">(optional)</span></label>
                    <textarea id="message" name="message" placeholder="Room preference, activities or dietary requirements"></textarea>
                </div>

                <button class="submit" type="submit">
                    Send inquiry via WhatsApp
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                </button>
                <p class="note">We usually reply within a few hours.</p>
            </form>

            <div class="footer">
                <span>&copy; <span id="year"></span> The Mureed Guesthouse</span>
                <span>Fulidhoo &middot; Vaavu Atoll &middot; Maldives</span>
                <span>Managed by &middot; Adventus-co</span>
            </div>
        </div>
    </main>
</div>

<a class="fab js-wa" href="#" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.47 14.38c-.3-.15-1.75-.86-2.02-.96-.27-.1-.47-.15-.67.15-.2.3-.77.96-.94 1.16-.17.2-.35.22-.64.07-.3-.15-1.25-.46-2.38-1.47-.88-.78-1.47-1.75-1.64-2.05-.17-.3-.02-.46.13-.6.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.6-.92-2.2-.24-.58-.49-.5-.67-.5h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.21 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.23 1.36.2 1.87.12.57-.08 1.75-.72 2-1.41.25-.69.25-1.29.17-1.41-.07-.12-.27-.2-.57-.35M12.05 21.5h-.01a9.4 9.4 0 0 1-4.8-1.32l-.34-.2-3.57.94.95-3.48-.22-.36a9.4 9.4 0 0 1-1.44-5.01c0-5.2 4.23-9.43 9.44-9.43 2.52 0 4.89.98 6.67 2.77a9.37 9.37 0 0 1 2.76 6.67c0 5.2-4.23 9.43-9.44 9.43m8.03-17.46A11.27 11.27 0 0 0 12.05.72C5.79.72.7 5.8.7 12.06c0 2 .52 3.95 1.52 5.67L.6 23.6l6.01-1.58a11.33 11.33 0 0 0 5.43 1.38h.01c6.25 0 11.34-5.09 11.34-11.34 0-3.03-1.18-5.88-3.32-8.02"/></svg>
</a>

<script>
    // ---------------------------------------------------------------
    // WhatsApp business number: international format, digits only
    // (country code + number, no "+", spaces or dashes).
    // TODO: replace with the real business WhatsApp number.
    // ---------------------------------------------------------------
    const WHATSAPP_NUMBER = '9607343400';
    const GREETING = "Hello The Mureed! I'd like to ask about staying with you.";

    const waLink = (text) => 'https://wa.me/' + WHATSAPP_NUMBER + '?text=' + encodeURIComponent(text);

    // Quick-chat buttons
    document.querySelectorAll('.js-wa').forEach((a) => { a.href = waLink(GREETING); });

    document.getElementById('year').textContent = new Date().getFullYear();

    // Country dropdown: ISO 3166-1 codes, names resolved in English and sorted A–Z
    (() => {
        const codes = ('AF AX AL DZ AS AD AO AI AQ AG AR AM AW AU AT AZ BS BH BD BB BY BE BZ BJ BM BT BO BQ BA BW BV BR IO BN BG BF BI CV KH CM CA KY CF TD CL CN CX CC CO KM CG CD CK CR CI HR CU CW CY CZ DK DJ DM DO EC EG SV GQ ER EE SZ ET FK FO FJ FI FR GF PF TF GA GM GE DE GH GI GR GL GD GP GU GT GG GN GW GY HT HM VA HN HK HU IS IN ID IR IQ IE IM IL IT JM JP JE JO KZ KE KI KP KR KW KG LA LV LB LS LR LY LI LT LU MO MG MW MY MV ML MT MH MQ MR MU YT MX FM MD MC MN ME MS MA MZ MM NA NR NP NL NC NZ NI NE NG NU NF MK MP NO OM PK PW PS PA PG PY PE PH PN PL PT PR QA RE RO RU RW BL SH KN LC MF PM VC WS SM ST SA SN RS SC SL SG SX SK SI SB SO ZA GS SS ES LK SD SR SJ SE CH SY TW TJ TZ TH TL TG TK TO TT TN TR TM TC TV UG UA AE GB US UM UY UZ VU VE VN VG VI WF EH YE ZM ZW XK').split(' ');
        let names;
        try {
            const dn = new Intl.DisplayNames(['en'], { type: 'region' });
            names = codes.map((c) => dn.of(c) || c);
        } catch (_) {
            names = codes;
        }
        const select = document.getElementById('country');
        names
            .sort((a, b) => a.localeCompare(b, 'en'))
            .forEach((n) => select.add(new Option(n, n)));
        const sync = () => select.classList.toggle('is-empty', !select.value);
        select.addEventListener('change', sync);
        sync();
    })();

    // Date constraints
    const form = document.getElementById('inquiry');
    const checkin = document.getElementById('checkin');
    const checkout = document.getElementById('checkout');

    const iso = (d) => {
        const off = d.getTimezoneOffset();
        return new Date(d.getTime() - off * 60000).toISOString().slice(0, 10);
    };
    const today = new Date();
    checkin.min = iso(today);
    checkout.min = iso(new Date(today.getTime() + 86400000));

    checkin.addEventListener('change', () => {
        if (!checkin.value) return;
        const next = new Date(checkin.value + 'T00:00:00');
        next.setDate(next.getDate() + 1);
        checkout.min = iso(next);
        if (!checkout.value || checkout.value <= checkin.value) checkout.value = iso(next);
        setInvalid(checkin, false);
        setInvalid(checkout, false);
    });

    const setInvalid = (input, bad) => input.closest('.field').classList.toggle('invalid', bad);

    form.querySelectorAll('input').forEach((el) =>
        el.addEventListener('input', () => setInvalid(el, false))
    );

    // Island transfer: pickup fields are only active when the box is ticked
    const transfer = document.getElementById('transfer');
    const transferRow = document.getElementById('transfer-row');
    const pickup = document.getElementById('pickup');
    const pickupTime = document.getElementById('pickup-time');
    const transferSelects = [pickup, pickupTime];
    const country = document.getElementById('country');
    const adults = document.getElementById('adults');
    const children = document.getElementById('children');
    const requiredSelects = [country, adults, children];

    const syncEmpty = (s) => s.classList.toggle('is-empty', !s.value);

    [...transferSelects, ...requiredSelects].forEach((s) => {
        s.addEventListener('change', () => { setInvalid(s, false); syncEmpty(s); });
        syncEmpty(s);
    });

    transfer.addEventListener('change', () => {
        const on = transfer.checked;
        transferRow.classList.toggle('is-disabled', !on);
        transferSelects.forEach((s) => {
            s.disabled = !on;
            if (!on) { s.value = ''; setInvalid(s, false); syncEmpty(s); }
        });
        if (on) pickup.focus();
    });

    const fmt = (v) => new Date(v + 'T00:00:00').toLocaleDateString('en-GB', {
        weekday: 'short', day: 'numeric', month: 'short', year: 'numeric'
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const f = Object.fromEntries(new FormData(form).entries());
        let ok = true;

        const name = document.getElementById('name');
        const email = document.getElementById('email');

        if (!f.name.trim()) { setInvalid(name, true); ok = false; }
        if (!f.email.trim() || !email.checkValidity()) { setInvalid(email, true); ok = false; }
        requiredSelects.forEach((s) => { if (!s.value) { setInvalid(s, true); ok = false; } });
        if (!f.checkin) { setInvalid(checkin, true); ok = false; }
        if (!f.checkout || (f.checkin && f.checkout <= f.checkin)) { setInvalid(checkout, true); ok = false; }
        if (transfer.checked) {
            transferSelects.forEach((s) => { if (!s.value) { setInvalid(s, true); ok = false; } });
        }

        if (!ok) {
            const first = form.querySelector('.field.invalid input, .field.invalid select');
            if (first) first.focus();
            return;
        }

        const nights = Math.round(
            (new Date(f.checkout + 'T00:00:00') - new Date(f.checkin + 'T00:00:00')) / 86400000
        );

        const lines = [
            '*New booking inquiry: The Mureed*',
            '',
            'Name: ' + f.name.trim(),
            'Email: ' + f.email.trim(),
            'Nationality: ' + f.country,
            'Check-in: ' + fmt(f.checkin),
            'Check-out: ' + fmt(f.checkout) + ' (' + nights + ' night' + (nights === 1 ? '' : 's') + ')',
            'Guests: ' + f.adults + ' adult' + (f.adults === '1' ? '' : 's') +
                (f.children !== '0' ? ', ' + f.children + ' child' + (f.children === '1' ? '' : 'ren') : ''),
            transfer.checked
                ? 'Island transfer: Yes, pickup from ' + pickup.value + ' (' + pickupTime.value.toLowerCase() + ')'
                : 'Island transfer: Not needed',
            f.message.trim() ? '' : null,
            f.message.trim() ? 'Notes: ' + f.message.trim() : null,
        ].filter((l) => l !== null);

        window.open(waLink(lines.join('\n')), '_blank', 'noopener');
    });
</script>
</body>
</html>
