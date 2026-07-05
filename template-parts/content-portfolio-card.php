<?php 
$tags = get_the_tags();
$class_str = '';
    if ( $tags ) {
        foreach( $tags as $tag ){
            $name = str_replace(' ', '', strtolower($tag->name));
            $class_str = $class_str . $name . ' ';
        }
    }
?>
<article class="<?php echo $class_str ?>shadow-2xla w-[70vw] sm:w-100 shrink-0 snap-center md:snap-start flex flex-col bg-slate-900 rounded-xl overflow-hidden border border-slate-800/60 hover:border-indigo-500/30 transition-all duration-300 group">    
    <div class="image-wrapper overflow-hidden h-48 w-full">
        <img src="<?php the_post_thumbnail_url('medium_large'); ?>" draggable="false" class="pointer-events-none w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
    </div>
    <div class="portfolio-tags p-4 pb-0 flex flex-wrap gap-2">
        <?php
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
    <div class="p-4 flex flex-col grow justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-100 mb-2 group-hover:text-indigo-400 transition-colors"><?php the_title();?></h2>      
            <?php 
            $description = get_field('portfolio_description');
            $live_url = get_field('live_url'); 
            $github_url = get_field('github_url');
            ?>
            
            <?php if ( $description ) : ?>
                <p class="text-slate-400 text-sm line-clamp-3 mb-4"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>
        <div class="flex justify-between gap-4 text-xs font-mono mt-auto pt-2 border-t border-slate-800/50">
            <?php if ( $github_url ) : ?>
                <a href="<?php echo esc_url($github_url) ?>" target="_blank" rel="noopener" class="text-slate-400 hover:text-slate-200 transition-colors">GitHub</a>
            <?php endif; ?>
            
            <a href="<?php echo the_permalink(); ?>" rel="noopener" class="text-indigo-400 hover:text-indigo-300 transition-colors">View Project →</a>             
        </div>
    </div>
</article>