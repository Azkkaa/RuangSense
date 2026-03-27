const darkLight = {
    getIconHtml(isDark) {
        return isDark
            ? '<i class="ph-fill ph-moon text-xl transition-transform duration-500 rotate-0"></i>'
            : '<i class="ph-fill ph-sun text-xl transition-transform duration-500 rotate-0"></i>';
    },

    defaultUserTheme(prefersDarkScheme, element, font) {
        const savedTheme = localStorage.getItem('theme');

        const shouldBeDark = savedTheme
            ? savedTheme === 'dark'
            : prefersDarkScheme;

        if (shouldBeDark) {
            element.setAttribute('data-mode', 'dark');
        } else {
            element.removeAttribute('data-mode');
        }

        if (font) {
            font.innerHTML = this.getIconHtml(shouldBeDark);
        }
    },

    changeTheme(element, font) {
        const isDarkNow = element.dataset.mode === 'dark';

        const overlay = document.createElement('div');
        Object.assign(overlay.style, {
            position: 'fixed',
            inset: 0,
            zIndex: 9999,
            opacity: 0,
            pointerEvents: 'none',
            transition: 'opacity 0.4s ease',
            backgroundColor: isDarkNow ? '#ffffff' : '#0f172a'
        });

        document.body.appendChild(overlay);

        requestAnimationFrame(() => {
            overlay.style.opacity = '0.5';
        });

        setTimeout(() => {
            if (isDarkNow) {
                element.removeAttribute('data-mode');
                localStorage.setItem('theme', 'light');
                if (font) font.innerHTML = this.getIconHtml(false);
            } else {
                element.setAttribute('data-mode', 'dark');
                localStorage.setItem('theme', 'dark');
                if (font) font.innerHTML = this.getIconHtml(true);
            }

            overlay.style.opacity = '0';
            setTimeout(() => overlay.remove(), 400);
        }, 150);
    }
};

export default darkLight;
