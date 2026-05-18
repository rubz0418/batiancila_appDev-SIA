<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Hinunangan shop visits')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-0: #0c1222;
            --bg-1: #121a2e;
            --surface: rgba(255, 255, 255, 0.06);
            --surface-strong: rgba(255, 255, 255, 0.1);
            --card: #ffffff;
            --card-border: rgba(15, 23, 42, 0.06);
            --text: #0f172a;
            --text-muted: #64748b;
            --text-on-dark: #e2e8f0;
            --text-on-dark-muted: #94a3b8;
            --accent: #14b8a6;
            --accent-hover: #0d9488;
            --accent-glow: rgba(20, 184, 166, 0.35);
            --accent-soft: #ccfbf1;
            --radius-lg: 20px;
            --radius-md: 14px;
            --radius-sm: 10px;
            --shadow-sm: 0 1px 2px rgba(15, 23, 42, 0.04);
            --shadow-md: 0 4px 24px rgba(15, 23, 42, 0.06), 0 2px 8px rgba(15, 23, 42, 0.04);
            --shadow-card-hover: 0 20px 40px -12px rgba(15, 23, 42, 0.12), 0 8px 16px -8px rgba(20, 184, 166, 0.15);
            --header-h: 4.5rem;
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: "Plus Jakarta Sans", system-ui, sans-serif;
            background:
                radial-gradient(1200px 600px at 10% -10%, rgba(20, 184, 166, 0.18), transparent 55%),
                radial-gradient(900px 500px at 100% 0%, rgba(99, 102, 241, 0.12), transparent 50%),
                linear-gradient(165deg, #f0fdfa 0%, #f8fafc 38%, #f1f5f9 100%);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: linear-gradient(135deg, var(--bg-0) 0%, var(--bg-1) 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.25);
        }
        .site-header__inner {
            max-width: 1040px;
            margin: 0 auto;
            padding: 1rem 1.35rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
            color: inherit;
        }
        .brand__mark {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: var(--radius-sm);
            background: linear-gradient(135deg, var(--accent) 0%, #2dd4bf 100%);
            display: grid;
            place-items: center;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--bg-0);
            box-shadow: 0 0 0 1px rgba(255,255,255,0.15), 0 8px 24px var(--accent-glow);
        }
        .brand__text h1 {
            margin: 0;
            font-size: 1.125rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #fff;
        }
        .brand__text p {
            margin: 0.15rem 0 0;
            font-size: 0.8125rem;
            color: var(--text-on-dark-muted);
            max-width: 20rem;
            line-height: 1.35;
        }
        .site-nav {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-wrap: wrap;
        }
        .nav-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-on-dark);
            text-decoration: none;
            background: var(--surface);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 999px;
            transition: background 0.2s, border-color 0.2s, transform 0.2s;
        }
        .nav-pill:hover {
            background: var(--surface-strong);
            border-color: rgba(20, 184, 166, 0.35);
            transform: translateY(-1px);
        }
        .nav-pill:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }
        main {
            flex: 1;
            width: min(1040px, 100%);
            margin: 0 auto;
            padding: 2rem 1.35rem 3rem;
        }
        .site-footer {
            margin-top: auto;
            padding: 1.25rem 1.35rem;
            font-size: 0.8125rem;
            color: var(--text-muted);
            text-align: center;
            border-top: 1px solid rgba(15, 23, 42, 0.06);
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(8px);
        }
        a:not(.btn):not(.brand):not(.nav-pill):not(.visit-card) {
            color: var(--accent-hover);
            text-underline-offset: 3px;
        }
        a:not(.btn):not(.brand):not(.nav-pill):not(.visit-card):hover {
            color: var(--accent);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.65rem 1.25rem;
            background: linear-gradient(135deg, var(--accent) 0%, #0d9488 100%);
            color: #fff !important;
            text-decoration: none !important;
            border-radius: 999px;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 14px var(--accent-glow);
            transition: transform 0.2s, box-shadow 0.2s, filter 0.2s;
        }
        .btn:hover {
            filter: brightness(1.05);
            transform: translateY(-1px);
            box-shadow: 0 8px 22px var(--accent-glow);
        }
        .btn:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 3px;
        }
        .btn-outline {
            background: transparent;
            color: var(--text) !important;
            border: 2px solid rgba(15, 23, 42, 0.12);
            box-shadow: none;
        }
        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent-hover) !important;
            background: var(--accent-soft);
        }
        .page-eyebrow {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent-hover);
            margin-bottom: 0.5rem;
        }
        h2.page-title {
            margin: 0 0 0.5rem;
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--text);
        }
        .page-lead {
            margin: 0 0 1.75rem;
            font-size: 1.0625rem;
            color: var(--text-muted);
            max-width: 36rem;
        }
        .alert {
            padding: 0.9rem 1rem;
            margin-bottom: 1.25rem;
            border-radius: var(--radius-md);
            font-weight: 600;
        }
        .alert-success {
            color: #115e59;
            background: #ccfbf1;
            border: 1px solid rgba(20, 184, 166, 0.35);
        }
        .alert-error {
            color: #991b1b;
            background: #fee2e2;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        .alert ul {
            margin: 0;
            padding-left: 1.2rem;
        }
        .actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        .field {
            display: grid;
            gap: 0.4rem;
        }
        .field label {
            font-size: 0.8125rem;
            font-weight: 700;
            color: var(--text);
        }
        .field input,
        .field select,
        .field textarea {
            width: 100%;
            border: 1px solid rgba(15, 23, 42, 0.14);
            border-radius: var(--radius-sm);
            padding: 0.75rem 0.85rem;
            font: inherit;
            color: var(--text);
            background: #fff;
        }
        .field textarea {
            min-height: 130px;
            resize: vertical;
        }
        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            outline: 2px solid rgba(20, 184, 166, 0.4);
            border-color: var(--accent);
        }
        .field-error {
            color: #b91c1c;
            font-size: 0.8125rem;
            font-weight: 600;
        }
        .field-hint {
            color: var(--text-muted);
            font-size: 0.8125rem;
            font-weight: 500;
        }
        .form-panel {
            padding: 1.25rem;
            background: var(--card);
            border: 1px solid var(--card-border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
        }
        .form-grid {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        }
        .field-full {
            grid-column: 1 / -1;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="site-header">
        <div class="site-header__inner">
            <a href="{{ url('/items') }}" class="brand">
                <span class="brand__mark" aria-hidden="true">HN</span>
                <div class="brand__text">
                    <h1>Hinunangan shop visits</h1>
                    <p>Local stops in the municipality</p>
                </div>
            </a>
            <nav class="site-nav" aria-label="Primary navigation">
                <a href="{{ route('items.index') }}" class="nav-pill">All visits</a>
                <a href="{{ route('items.create') }}" class="nav-pill">Add visit</a>
                <a href="{{ route('form.create') }}" class="nav-pill">Request form</a>
            </nav>
        </div>
    </header>

    <main>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">
        Hinunangan shop visits · Laravel mini project · {{ date('Y') }}
    </footer>
    @stack('scripts')
</body>
</html>
