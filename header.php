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
<header class="p-5 bg-slate-950">
    <div class="flex justify-between container m-auto">
        <div class="site-title font-mono font-medium text-slate-400"><a href="/">Joey Stuckey | Web Developer</a></div>
        <nav>
            <ul class="flex gap-8 font-mono">
                <li class="font-medium text-slate-400">My Work</li>
                <li class="font-medium text-slate-400">Services</li>
                <li class="font-medium text-slate-400">Contact</li>
            </ul>
        </nav>
    </div>
</header>