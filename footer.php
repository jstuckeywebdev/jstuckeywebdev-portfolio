<footer class="bg-slate-950 border-t border-slate-900 py-5 px-4 sm:px-6 lg:px-0">
    <div class="container mx-auto flex justify-between">
        <div>
            <p class="font-mono text-sm text-slate-400">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
            </p>
            <p class="font-mono text-sm text-slate-400">
                All rights reserved.
            </p>
        </div>
        <nav class="flex items-center">
            <ul class="flex gap-8 font-mono">
                <li><a href="/#my-work" class="text-slate-400 hover:text-indigo-400 transition-colors text-sm">Portfolio</a></li>
                <li><a href="https://github.com/jstuckeywebdev" target="_blank" class="font-medium text-slate-400 hover:text-indigo-400 transition-colors text-sm">Github</a></li>
                <li><a href="/#contact" class="text-slate-400 hover:text-indigo-400 transition-colors text-sm">Contact</a></li>
            </ul>
        </nav>

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
