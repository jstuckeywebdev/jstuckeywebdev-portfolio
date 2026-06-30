<?php get_header(); ?>

<div class="relative min-h-[500px] flex items-center overflow-hidden bg-slate-950 border-b border-slate-900 py-24">   
    <video 
        autoplay 
        loop 
        muted 
        playsinline 
        class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0 opacity-60 object-left">
        <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/home-hero-code-video.mp4" type="video/mp4">
    </video>

    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-slate-950 z-10 pointer-events-none"></div>

    <div class="relative z-20 max-w-5xl mx-auto px-6 w-full">
        <span class="text-sm font-semibold tracking-wider text-indigo-400 uppercase">Available for Work</span>
        <h1 class="text-5xl font-bold tracking-tight text-slate-100 mt-3 mb-4">
            Joey Stuckey
        </h1>
        <p class="text-xl text-slate-300 max-w-2xl leading-relaxed">
            Web Developer specializing in clean custom WordPress themes and modern frontend solutions.
        </p>
    </div>
</div>

<?php get_footer(); ?>