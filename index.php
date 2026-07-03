<?php get_header(); ?>

<section class="relative min-h-125 flex items-center overflow-hidden bg-slate-950 border-b border-slate-900 py-24"> 
    <video 
        autoplay 
        loop 
        muted 
        playsinline
        poster="<?php echo get_template_directory_uri(); ?>/assets/images/home-hero-code-image.jpg"
        class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0 object-left">
        <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/home-hero-code-video.mp4" type="video/mp4">
    </video>

    <div class="backdrop-blur-xs absolute inset-0 bg-linear-to-t from-slate-950/40 via-slate-900/90 to-slate-950/40 z-10 pointer-events-none"></div>
    <div class="container m-auto px-4 sm:px-6 lg:px-8">
        <div class="relative z-20 max-w-5xl mr-auto w-full fade-and-slide-in">
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

<section id="my-work" class="py-15 relative lazy-loaded">
    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-950/40 to-slate-900/80 z-10 pointer-events-none"></div>
    
    <div class="slide-in-left container mx-auto z-20 relative px-4 sm:px-6 lg:px-8">
        <h2 class="font-mono text-slate-100 text-4xl mb-5">My Work</h2> 
    </div>

    <div class="slide-in-left portfolio-carousel-scroller carousel-scroll-inset relative z-30 w-full overflow-x-auto scrollbar-hide snap-x snap-mandatory cursor-grab active:cursor-grabbing select-none">
        <div class="portfolio-carousel-track flex gap-6 pb-6 carousel-track-padding">
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

            <div aria-hidden="true" class="shrink-0 w-[15vw] md:w-8"></div>
        </div>
    </div>
</section>
<section id="contact" class="py-15 relative border-t border-slate-900">
    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-950/40 to-slate-900/80 z-10 pointer-events-none"></div>

    <div class="fade-and-slide-in lazy-loaded container mx-auto relative z-20 px-4 sm:px-6 lg:px-8">
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







<script>
document.addEventListener('DOMContentLoaded', () => {
    const scroller = document.querySelector('.portfolio-carousel-scroller');

    if (!scroller) return;

    let isDown = false;
    let startX;
    let scrollLeft;

    scroller.addEventListener('mousedown', (e) => {
        isDown = true;
        scroller.classList.add('active');
        scroller.style.scrollSnapType = 'none';

        startX = e.pageX - scroller.getBoundingClientRect().left;
        scrollLeft = scroller.scrollLeft;
    });

    scroller.addEventListener('mouseleave', () => {
        isDown = false;
        scroller.classList.remove('active');
        scroller.style.scrollSnapType = 'x mandatory';
    });

    scroller.addEventListener('mouseup', () => {
        isDown = false;
        scroller.classList.remove('active');
        scroller.style.scrollSnapType = 'x mandatory';
    });

    scroller.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();

        const x = e.pageX - scroller.getBoundingClientRect().left;
        const walk = (x - startX) * 2;
        scroller.scrollLeft = scrollLeft - walk;
    });
});

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Remove the hidden/offset classes and add active classes
        entry.target.classList.remove('opacity-0', 'translate-y-10');
        entry.target.classList.add('opacity-100', 'translate-y-0');
      }
    });
  });

  observer.observe(document.getElementById('lazy-loaded'));

</script>

<?php get_footer(); ?>