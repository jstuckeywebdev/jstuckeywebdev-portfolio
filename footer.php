<footer class="bg-slate-950 border-t border-slate-900 py-5 px-4 sm:px-6 lg:px-0">
    <div class="container mx-auto flex flex-col justify-between gap-y-2">
        <p class="font-mono text-lg text-slate-400">Joey Stuckey | Web Developer</p>
        <nav class="flex items-center">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'container'      => false, // Removes the default <div> wrapper
                'menu_class'     => 'flex gap-8 font-mono text-slate-400 text-sm', // Adds a class to the <ul> element
            ) );
            ?>    
        </nav>
        <p class="font-mono text-sm text-slate-400">
            <a href="mailto:joey@jstuckeyweb.dev">joey@jstuckeyweb.dev</a>
        </p>

        <div>
            <p class="font-mono text-sm text-slate-400 mt-5">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
            </p>
            <p class="font-mono text-sm text-slate-400">
                All rights reserved.
            </p>
        </div>

    </div>
</footer>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('mobile-nav-toggle');
    const menu = document.getElementById('mobile-nav-menu');

    if (!toggle || !menu) return;

    const closeMenu = () => {
        menu.classList.add('hidden');
        toggle.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open menu');
    };

    toggle.addEventListener('click', () => {
        const isOpen = !menu.classList.contains('hidden');

        if (isOpen) {
            closeMenu();
            return;
        }

        menu.classList.remove('hidden');
        toggle.classList.add('is-open');
        toggle.setAttribute('aria-expanded', 'true');
        toggle.setAttribute('aria-label', 'Close menu');
    });

    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });
});
</script>
    <?php wp_footer(); ?>
</body>
</html>
