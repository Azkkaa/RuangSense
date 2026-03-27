import './bootstrap';

import Alpine from 'alpinejs';
import darkLight from './theme/darkLight';

window.Alpine = Alpine;

Alpine.start();

const body = document.querySelector('body');
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");
const buttonTheme = document.getElementById('change-theme');

darkLight.defaultUserTheme(prefersDarkScheme.matches, body, buttonTheme);

if (buttonTheme) {
    buttonTheme.addEventListener('click', () => {
        darkLight.changeTheme(body, buttonTheme);
    })
}
