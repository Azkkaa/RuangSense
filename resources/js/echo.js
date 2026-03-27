import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

const apiKey = document.getElementById('apiKey')?.innerText;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    encrypted: true,
});
