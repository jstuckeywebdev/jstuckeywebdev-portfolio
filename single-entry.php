<?php get_header(); ?>

<section class="py-25 relative code-bg-image">
    <div class="backdrop-blur-xs absolute inset-0 bg-linear-to-t from-slate-950/40 via-slate-900/90 to-slate-950/40 z-10 pointer-events-none"></div>
 
    <div class="fade-and-slide-in container mx-auto z-20 relative px-4 sm:px-6 lg:px-8 header-offset">

    <?php 
        $description = get_field('portfolio_description');
    ?>

        <h1 class="text-slate-100 text-center font-bold text-4xl mt-3 mb-3"><?php the_title(); ?></h1>
        <div class="portfolio-tags p-4 pt-0 flex flex-wrap justify-center gap-2">
            <?php

            $tags = get_the_tags();
            $class_str = '';
            if ( $tags ) {
                foreach( $tags as $tag ){
                    $name = str_replace(' ', '', strtolower($tag->name));
                    $class_str = $class_str . $name . ' ';
                }
            }

            if ( $tags ) {
                foreach ( $tags as $tag ){
                    $clean_class = str_replace(' ', '', strtolower($tag->name));
                    ?>
                    <span class="portfolio-tag text-xs font-mono font-semibold text-slate-950 bg-slate-400 rounded-md py-1 px-2.5 <?php echo esc_attr($clean_class) ?>">
                        <?php echo esc_html($tag->name) ?>
                    </span>
                    <?php 
                }
            }
            ?>
        </div>
        <p class="text-slate-400 text-center mb-6 text-lg leading-relaxed"><?php echo $description ?></p> 

        <div class="flex justify-center gap-4 text-xs font-mono mt-auto pt-2 border-t border-slate-800/50">

            <?php 
            $live_url = get_field('live_url'); 
            $github_url = get_field('github_url');

            if ( $github_url ) : ?>
                <a href="<?php echo esc_url($github_url) ?>" target="_blank" rel="noopener" class="text-slate-400 hover:text-slate-200 transition-colors">GitHub →</a>
            <?php endif; ?>
            <?php if ( $live_url ) : ?>
                <a href="<?php echo the_permalink(); ?>" target="_blank" rel="noopener" class="text-indigo-400 hover:text-indigo-300 transition-colors">Visit Site →</a>
            <?php endif; ?>                
        </div>
    </div>
</section>

<section class="circuit-board-bg relative py-15 h-dvh">
    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-950/40 to-slate-900/80 z-10 pointer-events-none"></div>

    <?php 
        $live_url = get_field('live_url');
    ?>
    <div class="flex justify-center h-11/12">
        <div class="container z-20">
            <iframe id="website-preview-iframe" src="<?php echo $live_url ?>" class="w-full h-full border-2 border-slate-100 rounded-md m-auto"></iframe>
        </div>
    </div>

    <div class="desktop-mobile-toggle-container flex justify-center">
        <div class="desktop-mobile-toggle text-slate-100 p-0 mt-10 z-20">
            <button id="desktop-toggle-button" class="active p-3 rounded-l-xl outline-1 outline-slate-100 desktop-mobile-toggle-btn w-25">Desktop</button><button id="mobile-toggle-button" class="desktop-mobile-toggle-btn p-3 rounded-r-xl outline-1 outline-slate-100 w-25">Mobile</button>
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
    const desktopButton = document.getElementById('desktop-toggle-button');
    const mobileButton = document.getElementById('mobile-toggle-button');
    const iframe = document.getElementById('website-preview-iframe');

    function toggleView(btn) {
        if(!btn.classList.contains('active')){
            btn.classList.add('active');
            if(btn.id == "mobile-toggle-button"){
                desktopButton.classList.remove('active');
                iframe.classList.add('mobile-view');
            } else if (btn.id == "desktop-toggle-button") {
                mobileButton.classList.remove('active');
                iframe.classList.remove('mobile-view');
            }
        }
    };

    desktopButton.addEventListener('click', (e) => {
        toggleView(desktopButton);
    });

    mobileButton.addEventListener('click', (e) => {
        toggleView(mobileButton);
    });



        
</script>

<?php get_footer(); ?>