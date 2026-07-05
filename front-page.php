<?php get_header(); ?>

<section class="relative min-h-125 flex items-center overflow-hidden bg-slate-950 border-b border-slate-900 py-24 px-4 sm:px-6 lg:px-0"> 
    <video 
        autoplay 
        loop 
        muted 
        playsinline
        poster="<?php echo get_template_directory_uri(); ?>/assets/images/home-hero-bg-image.jpeg"
        class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0 object-left">
        <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/jstuckeywebdev_hero_video_2026-07-03-compressed.mp4" type="video/mp4">
    </video>

    <div class="backdrop-blur-xs absolute inset-0 bg-linear-to-t from-slate-950/40 via-slate-900/90 to-slate-950/40 z-10 pointer-events-none"></div>
    <div class="container m-auto">
        <div class="header-offset relative z-20 max-w-5xl mr-auto w-full fade-and-slide-in">
            <span class="font-mono text-sm font-semibold tracking-wider text-indigo-400 uppercase">Available for Work</span>
            <h1 class="text-5xl font-bold tracking-tight text-slate-100 mt-3 mb-4">
                Joey Stuckey
            </h1>
            <p class="text-xl text-slate-300 max-w-2xl leading-relaxed hero-tagline">
                Web Developer specializing in clean custom WordPress themes and modern frontend solutions.
            </p>
        </div>
    </div>
</section>

<section id="my-work" class="py-15 px-4 sm:px-6 lg:px-0 relative" >
    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-950/40 to-slate-900/80 z-10 pointer-events-none"></div>
    
    <div class="fade-and-slide-in container mx-auto z-20 relative">
        <span class="font-mono text-sm font-semibold tracking-wider text-indigo-400 uppercase">Portfolio</span>
        <h2 class="font-mono text-slate-100 text-4xl mt-3 mb-3">Featured Projects</h2>
        <p class="text-slate-400 mb-6 text-lg leading-relaxed">A selection of custom web development projects, featuring clean code, responsive layouts, and tailored WordPress architecture.</p> 
        <div class="all-tags flex flex-wrap mb-8 gap-2">
            <?php 
            $all_tags = get_tags();
            foreach ($all_tags as $tag) {
                echo '<span class="portfolio-tag portfolio-tag-filter-button cursor-pointer outline-slate-400 outline-1 hover:bg-slate-400 hover:text-slate-900 text-xs font-mono font-semibold text-slate-400 rounded-md py-1 px-2.5">' . esc_html($tag->name) . '</span>';
            }
            ?>
        </div>
    </div>

    <div class="slide-in-left portfolio-carousel-scroller carousel-scroll-inset relative z-30 w-full overflow-x-auto scrollbar-hide snap-x snap-mandatory cursor-grab active:cursor-grabbing select-none">
        <div id="portfolio-carousel" class="portfolio-carousel-track flex gap-6 pb-6 carousel-track-padding">
            <?php
            $args = array(
                'post_type'      => 'entry',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $portfolio_query = new WP_Query( $args );

            if ( $portfolio_query->have_posts() ) :
                while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
                    get_template_part( 'template-parts/content', 'portfolio-card' );
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-slate-500 font-mono text-sm px-4">No production assets found.</p>';
            endif;
            ?>

            <div aria-hidden="true" class="carousel-end-spacer shrink-0 w-[15vw] md:w-8"></div>
        </div>
        <div id="portfolio-carousel-storage" hidden aria-hidden="true"></div>
    </div>
</section>
<section id="contact" class="py-15 relative border-t border-slate-900 px-4 sm:px-6 lg:px-0">
    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-950/40 to-slate-900/80 z-10 pointer-events-none"></div>

    <div class="fade-and-slide-in lazy-loaded container mx-auto relative z-20">
        <div class="max-w-2xl">
            <span class="font-mono text-sm font-semibold tracking-wider text-indigo-400 uppercase">Contact</span>
            <h2 class="font-mono text-slate-100 text-4xl mt-3 mb-3">Get In Touch</h2>
            <p class="text-slate-400 text-lg mb-8 leading-relaxed">
                I look forward to helping with your project!
            </p>

            <div class="contact-form-card bg-slate-900 rounded-xl border border-slate-800/60 p-6 sm:p-8">
                <?php echo do_shortcode('[forminator_form id="51"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>