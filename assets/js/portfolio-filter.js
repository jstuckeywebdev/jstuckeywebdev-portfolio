document.addEventListener('DOMContentLoaded', () => {
    const scroller = document.querySelector('.portfolio-carousel-scroller');
    const portfolioParent = document.getElementById('portfolio-carousel');
    let activeTags = [];

    if (scroller) {
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
            scroller.style.scrollSnapType = '';
        });

        scroller.addEventListener('mouseup', () => {
            isDown = false;
            scroller.classList.remove('active');
            scroller.style.scrollSnapType = '';
        });

        scroller.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();

            const x = e.pageX - scroller.getBoundingClientRect().left;
            const walk = (x - startX) * 2;
            scroller.scrollLeft = scrollLeft - walk;
        });
    }

    if (!portfolioParent) return;

    function getScrollY() {
        if (window.visualViewport) {
            return window.visualViewport.pageTop;
        }

        return window.scrollY || document.documentElement.scrollTop || 0;
    }

    function restoreScroll(scrollY, carouselScrollLeft) {
        const restore = () => {
            document.documentElement.scrollTop = scrollY;
            document.body.scrollTop = scrollY;
            window.scrollTo(0, scrollY);

            if (scroller && carouselScrollLeft !== null) {
                scroller.scrollLeft = carouselScrollLeft;
            }
        };

        restore();
        requestAnimationFrame(restore);
        requestAnimationFrame(() => requestAnimationFrame(restore));
        [0, 16, 50, 100, 200, 350].forEach((ms) => window.setTimeout(restore, ms));
    }

    function toggleTag(tag) {
        const cleanClass = tag.textContent.toLowerCase().replace(/\s/g, '');

        if (tag.classList.contains('active')) {
            tag.classList.remove('active', 'bg-slate-400', 'text-slate-900', cleanClass, 'outline-0');
            tag.classList.add('outline-1');
            activeTags = activeTags.filter((item) => item !== cleanClass);
        } else {
            activeTags.push(cleanClass);
            tag.classList.add('active', 'bg-slate-400', 'text-slate-900', cleanClass, 'outline-0');
            tag.classList.remove('outline-1');
        }
    }

    function applyPortfolioFilter(scrollY, carouselScrollLeft) {
        [...portfolioParent.children].forEach((item) => {
            if (!item.matches('article')) return;

            const matchesTags = activeTags.length === 0
                || activeTags.every((tagClass) => item.classList.contains(tagClass));

            item.classList.toggle('portfolio-item-filtered-out', !matchesTags);
            item.setAttribute('aria-hidden', matchesTags ? 'false' : 'true');
        });

        restoreScroll(scrollY, carouselScrollLeft);
    }

    function handleTagActivation(tag, scrollY) {
        const carouselScrollLeft = scroller ? scroller.scrollLeft : null;
        toggleTag(tag);
        applyPortfolioFilter(scrollY, carouselScrollLeft);
    }

    [...document.getElementsByClassName('portfolio-tag-filter-button')].forEach((tag) => {
        let touchStartX = 0;
        let touchStartY = 0;
        let capturedScrollY = 0;
        let suppressClick = false;

        tag.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].clientX;
            touchStartY = e.changedTouches[0].clientY;
            capturedScrollY = getScrollY();
        }, { passive: true });

        tag.addEventListener('touchend', (e) => {
            const touch = e.changedTouches[0];
            const movedX = Math.abs(touch.clientX - touchStartX);
            const movedY = Math.abs(touch.clientY - touchStartY);

            if (movedX > 10 || movedY > 10) return;

            e.preventDefault();
            suppressClick = true;
            handleTagActivation(tag, capturedScrollY);
            window.setTimeout(() => { suppressClick = false; }, 500);
        }, { passive: false });

        tag.addEventListener('click', (e) => {
            if (suppressClick) {
                e.preventDefault();
                return;
            }

            e.preventDefault();
            handleTagActivation(tag, getScrollY());
        });
    });
});
