<?php get_header(); 

$hero_overline = get_field('hero_overline');
$hero_heading = get_field('hero_heading');
$hero_text = get_field('hero_text');
$about_overline = get_field('about_overline');
$about_heading = get_field('about_heading');
$about_text = get_field('about_text');
$about_image = get_field('about_image');
$education = get_field('education');
$experience = get_field('experience');
$portfolio_overline = get_field('portfolio_overline');
$portfolio_heading = get_field('portfolio_heading');
$portfolio_text = get_field('portfolio_text');
$contact_overline = get_field('contact_overline');
$contact_heading = get_field('contact_heading');
$contact_text = get_field('contact_text');
$contact_section_email = get_field('contact_section_email');
$linkedin_url = get_field('linkedin_url');
$github_url = get_field('github_url');

?>

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
            <span class="font-mono text-sm font-semibold tracking-wider text-indigo-400 uppercase"><?php echo $hero_overline ?></span>
            <h1 class="text-5xl font-bold tracking-tight text-slate-100 mt-3 mb-4">
                <?php echo $hero_heading ?>
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl leading-relaxed hero-tagline">
                <?php echo $hero_text ?>
            </p>
        </div>
    </div>
</section>

<section id="about" class="py-15 relative border-t border-slate-900 px-4 sm:px-6 lg:px-0">
    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-950/40 to-slate-900/80 z-10 pointer-events-none"></div>
    <div class="container z-20 relative m-auto">
        <div class="fade-and-slide-in">
            <span class="font-mono text-sm font-semibold tracking-wider text-indigo-400 uppercase"><?php echo $about_overline ?></span>
            <h2 class="font-mono text-slate-100 text-4xl mt-3 mb-3"><?php echo $about_heading ?></h2>
            <div class="md:gap-25 flex flex-col-reverse md:flex-row">
                <div class="text-slate-400 text-lg md:w-2/3">
                    <p class="leading-relaxed"><?php echo $about_text ?></p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6 border-t border-slate-900">
                        <!-- Experience Column -->
                        <div>
                            <h4 class="font-mono text-xs tracking-wider text-slate-500 uppercase mb-4">Work Experience</h4>
                            <div class="space-y-4">
                                <div class="flex flex-col">
                                    <span class="text-slate-200 font-medium">Website Support Developer</span>
                                    <div class="flex justify-between items-center text-xs font-mono text-slate-400 mt-1">
                                        <span>Infomedia</span>
                                        <span>2025 — Present</span>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-slate-200 font-medium">Website Support Technician II</span>
                                    <div class="flex justify-between items-center text-xs font-mono text-slate-400 mt-1">
                                        <span>SuperPath</span>
                                        <span>2024 — 2025</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Education Column -->
                        <div>
                            <h4 class="font-mono text-xs tracking-wider text-slate-500 uppercase mb-4">Education</h4>
                            <div class="space-y-4">
                                <div class="flex flex-col">
                                    <span class="text-slate-200 font-medium">Full Stack Web Development with PHP</span>
                                    <span class="text-xs font-mono text-slate-400 mt-1">Jefferson State Community College</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-slate-200 font-medium">Web Design Certification</span>
                                    <span class="text-xs font-mono text-slate-400 mt-1">FreeCodeCamp</span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="md:w-1/3 mb-8">
                <img src="<?php echo $about_image ?>" alt="" class="rounded-3xl aspect-square slide-in-left">
            </div>
        </div>
    </div>
    </div>
</section>

<section id="my-work" class="py-15 px-4 sm:px-6 lg:px-0 relative" >
    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-950/40 to-slate-900/80 z-10 pointer-events-none"></div>
    
    <div class="fade-and-slide-in container mx-auto z-20 relative">
        <span class="font-mono text-sm font-semibold tracking-wider text-indigo-400 uppercase"><?php echo $portfolio_overline ?></span>
        <h2 class="font-mono text-slate-100 text-4xl mt-3 mb-3"><?php echo $portfolio_heading ?></h2>
        <p class="text-slate-400 mb-6 text-lg leading-relaxed"><?php echo $portfolio_text ?></p> 
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
    <div class="container m-auto">
        <div class="z-20 relative fade-and-slide-in">
            <span class="font-mono text-sm font-semibold tracking-wider text-indigo-400 uppercase"><?php echo $contact_overline ?></span>
            <h2 class="font-mono text-slate-100 text-4xl mt-3 mb-3"><?php echo $contact_heading ?></h2>
            <p class="text-slate-400 text-lg mb-8 leading-relaxed"><?php echo $contact_text ?></p>
        </div>
        <div class="fade-and-slide-in lazy-loaded container mx-auto relative z-20">
            <div class="flex flex-col-reverse lg:flex-row justify-start lg:gap-25 w-full">
                    <div class="w-full lg:w-1/2 contact-form-card bg-slate-900 rounded-xl border border-slate-800/60 p-6 sm:p-8">
                        <?php echo do_shortcode('[forminator_form id="51"]'); ?>
                    </div>
                    <div class="w-full lg:w-1/2 mb-8 mb:mb-0 bg-slate-900 border-slate-800/60 p-6 sm:p-8 rounded-xl h-fit">
                        <p class="text-slate-400 hover:text-slate-100"><a href="mailto:<?php echo $contact_section_email ?>" class="hover:text-slate-100"><i class="fa-solid fa-envelope"></i> <?php echo $contact_section_email ?></a></p>
                        <p class="text-slate-400 hover:text-slate-100"><a href="<?php echo $linkedin_url ?>" class="hover:text-slate-100" target="_blank"><i class="fa-brands fa-linkedin"></i> Connect with me on LinkedIn →</a></p>
                        <p class="text-slate-400 hover:text-slate-100"><a href="<?php echo $github_url ?>" class="hover:text-slate-100" target="_blank"><i class="fa-brands fa-github"></i> Check Out My Github →</a></p>
                    </div>
                </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>