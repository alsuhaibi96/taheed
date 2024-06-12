document.getElementById('menu-toggle').addEventListener('click', function() {
    var mobileSidebar = document.getElementById('mobile-sidebar');
    if (mobileSidebar.classList.contains('-translate-x-full')) {
        mobileSidebar.classList.remove('-translate-x-full');
    } else {
        mobileSidebar.classList.add('-translate-x-full');
    }
});

document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        const contentDiv = document.getElementById('content');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.classList.remove('text-black', 'bg-white');
            link.classList.add('text-white', 'bg-black');
        });

        this.classList.remove('text-white', 'bg-black');
        this.classList.add('text-black', 'bg-white');

        let component = '';
        switch (this.id) {
            case 'home-link':
            case 'mobile-home-link':
                component = 'home';
                break;
            case 'clients-link':
            case 'mobile-clients-link':
                component = 'clients';
                break;
            case 'bikes-link':
            case 'mobile-bikes-link':
                component = 'bikes';
                break;
            case 'main-link':
            case 'mobile-main-link':
                component = 'main';
                break;

            case 'customer-settings':
            case 'mobile-settings-link':
                component = 'settings';
                break;
        }

        fetch(`/load-component`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ component: component })
            })
            .then(response => response.text())
            .then(html => {
                contentDiv.innerHTML = html;
            });
    });
});