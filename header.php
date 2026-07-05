<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts Preconnect (Speeds up font loading) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Inter (Sans-Serif) & JetBrains Mono (Monospace) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
<header class="absolute z-50 w-full">
    <div class="bg-slate-950 slide-down h-full py-5">
        
        <div class="flex justify-between items-center container mx-auto px-4 sm:px-6 lg:px-0">
            <div class="site-title font-mono font-medium text-slate-100">
                <a href="/">Joey Stuckey | Web Developer</a>
            </div>
            
            <nav class="hidden md:block" aria-label="Primary">
                <ul class="flex gap-8 font-mono">
                    <li><a href="/#my-work" class="font-medium text-slate-100 hover:text-indigo-400 transition-colors">My Work</a></li>
                    <li><a href="/#contact" class="font-medium text-slate-100 hover:text-indigo-400 transition-colors">Contact</a></li>
                </ul>
            </nav>
            
            <button
            type="button"
            id="mobile-nav-toggle"
            class="mobile-nav-toggle md:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 text-slate-100"
            aria-expanded="false"
            aria-controls="mobile-nav-menu"
            aria-label="Open menu"
            >
            <span class="mobile-nav-bar block w-6 h-0.5 bg-current"></span>
            <span class="mobile-nav-bar block w-6 h-0.5 bg-current"></span>
            <span class="mobile-nav-bar block w-6 h-0.5 bg-current"></span>
        </button>
    </div>
</div>

    <nav id="mobile-nav-menu" class="mobile-nav-menu md:hidden hidden border-t border-slate-900 bg-slate-950" aria-label="Primary mobile">
        <ul class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col gap-4 font-mono">
            <li><a href="/#my-work" class="block font-medium text-slate-100 hover:text-indigo-400 transition-colors">My Work</a></li>
            <li><a href="/#contact" class="block font-medium text-slate-100 hover:text-indigo-400 transition-colors">Contact</a></li>
        </ul>
    </nav>
</header>
