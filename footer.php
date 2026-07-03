<footer class="bg-slate-950 border-t border-slate-900 py-5">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <p class="font-mono text-sm text-slate-400">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
        </p>
        <nav>
            <ul class="flex gap-6 font-mono text-sm">
                <li><a href="#my-work" class="text-slate-400 hover:text-indigo-400 transition-colors">My Work</a></li>
                <li><a href="#contact" class="text-slate-400 hover:text-indigo-400 transition-colors">Contact</a></li>
            </ul>
        </nav>
    </div>
</footer>
    <?php wp_footer(); ?>
</body>
</html>
