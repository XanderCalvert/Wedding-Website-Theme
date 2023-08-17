console.log('Hello from Typescript');

document.addEventListener('DOMContentLoaded', () => {
    const toggler = document.querySelector('.custom-toggler') as HTMLButtonElement;
    const mobileMenu = document.querySelector('.mobile-menu') as HTMLElement;
    const header = document.querySelector('#masterhead') as HTMLElement;

    if  (header) {
        // Scrolling
        window.addEventListener('scroll', () => {
            if ( window.scrollY > 0 ) {
                header.style.position = 'sticky';
            } else {
                header.style.position = 'absolute';
            }
        });
    }

    if (toggler && mobileMenu) {
        toggler.addEventListener('click', () => {
            const icon = toggler.querySelector('.custom-toggler-icon');
            if (icon) {
                if (icon.classList.contains('opened')) {
                    icon.classList.remove('opened');
                    mobileMenu.style.opacity = '0'; // Hide
                } else {
                    icon.classList.add('opened');
                    mobileMenu.style.opacity = '1'; // Show
                }
            }
        });
    }
});
