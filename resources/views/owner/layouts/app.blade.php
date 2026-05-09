<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'LaundroMetrics - Owner Dashboard')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary": "#ffffff",
                        "surface-bright": "#f9f9f9",
                        "primary-fixed-dim": "#b3c5ff",
                        "surface-container-highest": "#e2e2e2",
                        "inverse-primary": "#b3c5ff",
                        "surface": "#f9f9f9",
                        "on-primary-fixed": "#00174a",
                        "primary-container": "#002366",
                        "on-primary": "#ffffff",
                        "background": "#f9f9f9",
                        "error": "#ba1a1a",
                        "error-container": "#ffdad6",
                        "surface-dim": "#dadada",
                        "inverse-on-surface": "#f0f1f1",
                        "surface-tint": "#435b9f",
                        "on-primary-container": "#758dd5",
                        "tertiary-container": "#222a2f",
                        "surface-variant": "#e2e2e2",
                        "on-error-container": "#93000a",
                        "inverse-surface": "#2f3131",
                        "surface-container-low": "#f3f3f4",
                        "on-tertiary-fixed-variant": "#40484d",
                        "on-tertiary-fixed": "#151d22",
                        "on-background": "#1a1c1c",
                        "on-secondary": "#ffffff",
                        "tertiary-fixed": "#dbe4ea",
                        "primary-fixed": "#dbe1ff",
                        "on-secondary-fixed": "#001f29",
                        "on-primary-fixed-variant": "#2a4386",
                        "on-tertiary-container": "#899197",
                        "primary": "#00113a",
                        "secondary-container": "#9ae1ff",
                        "on-surface-variant": "#444650",
                        "on-surface": "#1a1c1c",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#bfc8ce",
                        "secondary": "#0c6780",
                        "on-secondary-fixed-variant": "#004d62",
                        "secondary-fixed-dim": "#89d0ed",
                        "secondary-fixed": "#baeaff",
                        "outline": "#757682",
                        "on-secondary-container": "#09657f",
                        "surface-container-high": "#e8e8e8",
                        "tertiary": "#0e161a",
                        "surface-container-lowest": "#ffffff",
                        "surface-container": "#eeeeee",
                        "outline-variant": "#c5c6d2"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "stack-sm": "8px",
                        "stack-lg": "32px",
                        "section-padding-mobile": "48px",
                        "stack-md": "16px",
                        "section-padding-desktop": "80px",
                        "base": "8px",
                        "container-max": "1200px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "label-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "display-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "display-lg-mobile": ["Inter"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-lg-mobile": ["28px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["48px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "display-lg-mobile": ["36px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface flex h-screen overflow-hidden">
    <nav
        class="bg-surface dark:bg-surface-dim border-r border-outline-variant/30 fixed left-0 top-0 h-full w-64 hidden lg:flex flex-col py-stack-lg px-4 gap-stack-md z-50 overflow-y-auto scrollbar-hide">
        <div class="mb-stack-lg px-4 shrink-0">
            <h1 class="font-headline-md text-headline-md font-bold text-primary dark:text-primary-fixed-dim">
                LaundroMetrics</h1>
            <p class="font-label-md text-label-md text-on-surface-variant mt-1">Management Portal</p>
        </div>
        
@php
    $navItemClass = "text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed-dim hover:bg-surface-container-high dark:hover:bg-inverse-surface rounded-xl transition-all duration-200 flex items-center gap-3 px-4 py-3 hover:translate-x-1";
    $navActiveItemClass = "bg-secondary-container dark:bg-on-secondary-fixed-variant text-on-secondary-container dark:text-secondary-fixed rounded-xl flex items-center gap-3 px-4 py-3 hover:translate-x-1 transition-transform duration-200";
@endphp
        <div class="flex flex-col gap-2">

            <span class="text-xs font-bold text-on-surface-variant uppercase tracking-wider px-4 mt-2 mb-1">Menu Utama</span>
            <a class="{{ request()->is('dashboard*') || request()->is('/') ? $navActiveItemClass : $navItemClass }}"
                href="/dashboard">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <a class="{{ request()->is('orders*') ? $navActiveItemClass : $navItemClass }}"
                href="/orders">
                <span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
                <span class="font-label-md text-label-md">Orders</span>
            </a>
            <a class="{{ request()->is('pickup-delivery*') ? $navActiveItemClass : $navItemClass }}"
                href="/pickup-delivery">
                <span class="material-symbols-outlined" data-icon="local_shipping">local_shipping</span>
                <span class="font-label-md text-label-md">Pickup & Delivery</span>
            </a>


            <span class="text-xs font-bold text-on-surface-variant uppercase tracking-wider px-4 mt-4 mb-1">Master Data</span>
            <a class="{{ request()->is('customers*') ? $navActiveItemClass : $navItemClass }}"
                href="/customers">
                <span class="material-symbols-outlined" data-icon="groups">groups</span>
                <span class="font-label-md text-label-md">Customers</span>
            </a>
            <a class="{{ request()->is('services*') ? $navActiveItemClass : $navItemClass }}"
                href="/services">
                <span class="material-symbols-outlined" data-icon="category">category</span>
                <span class="font-label-md text-label-md">Services</span>
            </a>
            <a class="{{ request()->is('promo*') ? $navActiveItemClass : $navItemClass }}"
                href="/promo">
                <span class="material-symbols-outlined" data-icon="campaign">campaign</span>
                <span class="font-label-md text-label-md">Promo</span>
            </a>

            <span class="text-xs font-bold text-on-surface-variant uppercase tracking-wider px-4 mt-4 mb-1">Aktivitas & Laporan</span>
            <a class="{{ request()->is('reports*') ? $navActiveItemClass : $navItemClass }}"
                href="/reports">
                <span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                <span class="font-label-md text-label-md">Reports</span>
            </a>
            <a class="{{ request()->is('reviews*') ? $navActiveItemClass : $navItemClass }}"
                href="/reviews">
                <span class="material-symbols-outlined" data-icon="star_rate">star_rate</span>
                <span class="font-label-md text-label-md">Review</span>
            </a>

        </div>
        <div class="mt-auto flex flex-col gap-2 border-t border-outline-variant/30 pt-stack-md shrink-0">
            <a class="{{ request()->is('profile*') ? $navActiveItemClass : $navItemClass }}"
                href="/profile">
                <span class="material-symbols-outlined" data-icon="person">person</span>
                <span class="font-label-md text-label-md">Profile</span>
            </a>
            <form action="#" method="POST" class="m-0">
                <button type="submit" class="w-full text-error dark:text-error hover:bg-error-container dark:hover:bg-error-container/20 rounded-xl transition-all duration-200 flex items-center gap-3 px-4 py-3 hover:translate-x-1 text-left">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    <span class="font-label-md text-label-md">Logout</span>
                </button>
            </form>
        </div>
    </nav>
    <div class="flex-1 lg:ml-64 flex flex-col h-screen">
        <header
            class="bg-surface-container-lowest dark:bg-inverse-surface shadow-sm shadow-[0_8px_24px_rgba(0,35,102,0.08)] dark:shadow-none docked full-width top-0 sticky z-40 flex justify-between items-center h-16 px-gutter w-full">
            <div class="flex items-center gap-4 lg:hidden">
                <span class="material-symbols-outlined text-primary" data-icon="menu">menu</span>
                <span
                    class="font-headline-lg text-headline-lg font-bold text-primary dark:text-primary-fixed-dim">LaundroMetrics</span>
            </div>
            <div
                class="hidden lg:block text-primary dark:text-primary-fixed-dim font-headline-md text-headline-md font-bold">
                @yield('header_title', 'Dashboard Overview')
            </div>
            <div class="flex items-center gap-4 text-on-surface-variant dark:text-surface-variant">
                <button
                    class="hover:bg-surface-container-low dark:hover:bg-on-surface-variant/10 transition-colors p-2 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                </button>
                <button
                    class="hover:bg-surface-container-low dark:hover:bg-on-surface-variant/10 transition-colors p-2 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined" data-icon="help">help</span>
                </button>
                <div
                    class="h-8 w-8 rounded-full bg-primary-container overflow-hidden ml-2 border border-outline-variant">
                    <img alt="Business Owner Avatar" class="w-full h-full object-cover"
                        data-alt="A close-up portrait of a professional business owner in a bright, modern office setting. The lighting is crisp and natural, highlighting a confident smile. The background is slightly blurred, emphasizing a clean, corporate aesthetic in light mode."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_mxVqWEGWNJPrR-lyeh4dZYi96-FoGBMIPNCPhkxdopyokFUpFzLKpKpRmD7-Actzh4LW_SCvk16i5bW9I-a_MPHfzeegcc0RhUvhNCtCEda2vgyie_52SbgNoriBVcVdYeReGIN78iIrRIvGMX_HOi5l-1dfSZv1NxURHenu6zI7I1MtTHwzuc3fk58IO_LIYhu8vWBfwga46jVGYODD1o10KNOV55pguUre_MEKgkKzttnrHamrGgddDcOBwAW3Lm_zHace3dw" />
                </div>
            </div>
        </header>
        <main class="flex-1 overflow-y-auto p-gutter lg:p-section-padding-desktop bg-background">
            @yield('content')
        </main>
    </div>
</body>

</html>
