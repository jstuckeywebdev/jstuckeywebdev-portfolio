<?php get_header(); ?>

<section class="py-15 relative code-bg-image header-offset">
    <div class="backdrop-blur-xs absolute inset-0 bg-linear-to-t from-slate-950/40 via-slate-900/90 to-slate-950/40 z-10 pointer-events-none"></div>
 
    <div class="fade-and-slide-in container mx-auto z-20 relative px-4 sm:px-6 lg:px-8 header-offset">

    <?php 
        $description = get_field('portfolio_description');
    ?>

        <h1 class="text-slate-100 font-bold text-4xl mt-15"><?php the_title(); ?></h1>
        <div class="portfolio-tags my-4 pt-0 flex flex-wrap gap-2">
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
        <p class="text-slate-400 mb-6 text-lg leading-relaxed"><?php echo $description ?></p> 

        <div class="flex gap-4 text-xs font-mono mt-auto pt-2 border-t border-slate-800/50">

            <?php 
            $live_url = get_field('live_url'); 
            $github_url = get_field('github_url');

            if ( $github_url ) : ?>
                <a href="<?php echo esc_url($github_url) ?>" target="_blank" rel="noopener" class="text-slate-400 hover:text-slate-200 transition-colors">GitHub →</a>
            <?php endif; ?>
            <?php if ( $live_url ) : ?>
                <a href="<?php echo $live_url ?>" target="_blank" rel="noopener" class="text-indigo-400 hover:text-indigo-300 transition-colors">Visit Site →</a>
            <?php endif; ?>                
        </div>
    </div>
</section>

<section class="circuit-board-bg relative py-15 h-dvh iframe-preview-section">
    <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 via-slate-950/40 to-slate-900/80 z-10 pointer-events-none"></div>

    <?php 
        $live_url = get_field('live_url');
    ?>
    <div class="iframe-preview-stage flex justify-center h-11/12">
        <div class="container z-20 iframe-container" data-preview="desktop">
            <div class="iframe-preview-clip">
                <div class="iframe-preview-scaler">
                    <iframe id="website-preview-iframe" src="<?php echo esc_url( $live_url ); ?>" class="w-full h-full border-2 border-slate-100 rounded-md m-auto" title="<?php echo esc_attr( get_the_title() ); ?> preview"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-mobile-toggle-container flex justify-center">
        <div class="desktop-mobile-toggle text-slate-100 p-0 mt-10 z-20">
            <button type="button" id="desktop-toggle-button" class="active p-3 rounded-l-xl outline-1 outline-slate-100 desktop-mobile-toggle-btn w-25">Desktop</button><button type="button" id="mobile-toggle-button" class="desktop-mobile-toggle-btn p-3 rounded-r-xl outline-1 outline-slate-100 w-25">Mobile</button>
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
    const PREVIEW_DESKTOP_WIDTH = 1280;
    const PREVIEW_DESKTOP_FALLBACK_HEIGHT = 720;
    const PREVIEW_DESKTOP_MIN_HEIGHT = 240;
    const iframeContainer = document.querySelector('.iframe-container');
    const previewStage = document.querySelector('.iframe-preview-stage');
    const previewSection = document.querySelector('.iframe-preview-section');
    const clip = document.querySelector('.iframe-preview-clip');
    const scaler = document.querySelector('.iframe-preview-scaler');
    const desktopButton = document.getElementById('desktop-toggle-button');
    const mobileButton = document.getElementById('mobile-toggle-button');
    const iframe = document.getElementById('website-preview-iframe');

    if (!iframeContainer || !previewStage || !previewSection || !clip || !scaler || !desktopButton || !mobileButton || !iframe) return;

    function isNarrowViewport() {
        return window.matchMedia('(max-width: 767px)').matches;
    }

    function getMaxVisualHeight() {
        const section = iframeContainer.closest('section');
        return section ? Math.floor(section.clientHeight * (11 / 12)) : Math.floor(window.innerHeight * 0.65);
    }

    function getIframeDocumentHeight() {
        try {
            const doc = iframe.contentDocument || iframe.contentWindow?.document;
            if (!doc?.body) return null;

            return Math.max(
                doc.body.scrollHeight,
                doc.body.offsetHeight,
                doc.documentElement.scrollHeight,
                doc.documentElement.offsetHeight,
            );
        } catch {
            return null;
        }
    }

    function resetScaledPreview() {
        scaler.style.removeProperty('--preview-scale');
        scaler.style.width = '';
        scaler.style.height = '';
        scaler.style.transform = '';
        scaler.style.position = '';
        scaler.style.left = '';
        scaler.style.top = '';
        scaler.style.transformOrigin = '';
        iframe.style.width = '';
        iframe.style.height = '';
        iframe.style.maxWidth = '';
        clip.style.height = '';
        iframeContainer.style.height = '';
        iframeContainer.classList.remove('iframe-preview-fit-content');
        previewStage.classList.remove('is-fit-content');
        previewSection.classList.remove('is-preview-fit-content');
    }

    function updatePreviewLayout() {
        const preview = iframeContainer.dataset.preview || 'desktop';

        resetScaledPreview();

        if (isNarrowViewport() && preview === 'desktop') {
            const containerWidth = clip.clientWidth || iframeContainer.clientWidth;
            const scale = containerWidth / PREVIEW_DESKTOP_WIDTH;
            const maxVisualHeight = getMaxVisualHeight();
            const maxScalerHeight = maxVisualHeight / scale;
            const measuredHeight = getIframeDocumentHeight();
            const contentHeight = Math.max(
                PREVIEW_DESKTOP_MIN_HEIGHT,
                Math.min(measuredHeight || PREVIEW_DESKTOP_FALLBACK_HEIGHT, maxScalerHeight),
            );
            const visualHeight = Math.ceil(contentHeight * scale);

            iframeContainer.classList.add('iframe-preview-fit-content');
            previewStage.classList.add('is-fit-content');
            previewSection.classList.add('is-preview-fit-content');
            iframeContainer.style.height = `${visualHeight}px`;
            clip.style.height = `${visualHeight}px`;

            scaler.style.position = 'absolute';
            scaler.style.top = '0';
            scaler.style.left = '50%';
            scaler.style.width = `${PREVIEW_DESKTOP_WIDTH}px`;
            scaler.style.height = `${contentHeight}px`;
            scaler.style.transform = `translateX(-50%) scale(${scale})`;
            scaler.style.transformOrigin = 'top center';
            iframe.style.width = `${PREVIEW_DESKTOP_WIDTH}px`;
            iframe.style.height = `${contentHeight}px`;
            iframe.style.maxWidth = 'none';
        }
    }

    function setPreview(mode) {
        iframeContainer.dataset.preview = mode;
        desktopButton.classList.toggle('active', mode === 'desktop');
        mobileButton.classList.toggle('active', mode === 'mobile');
        updatePreviewLayout();
    }

    desktopButton.addEventListener('click', () => setPreview('desktop'));
    mobileButton.addEventListener('click', () => setPreview('mobile'));
    window.addEventListener('resize', updatePreviewLayout);
    iframe.addEventListener('load', updatePreviewLayout);

    setPreview('desktop');
});
</script>

<?php get_footer(); ?>