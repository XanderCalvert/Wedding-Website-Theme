console.log('Hello from Typescript');

document.addEventListener('DOMContentLoaded', () => {
    const toggler = document.querySelector('.custom-toggler') as HTMLButtonElement;
    const mobileMenu = document.querySelector('.mobile-menu') as HTMLElement;
    const header = document.querySelector('#masthead') as HTMLElement;
    const icon = document.querySelector('.custom-toggler-icon') as HTMLElement;
    const body = document.querySelector('body') as HTMLElement;

    if (header) {
        const setHeaderPosition = () => {
            if (window.scrollY > 0) {
                header.style.position = 'sticky';
            } else {
                header.style.position = 'absolute';
            }
        }
    
        // Run immediately on page load
        setHeaderPosition();
    
        // Also run on scroll
        window.addEventListener('scroll', setHeaderPosition);
    }

    if ( toggler && mobileMenu && icon ) {
        toggler.addEventListener('click', () => {
            const icon = toggler.querySelector('.custom-toggler-icon');
            if (icon) {
                if (icon.classList.contains('opened')) {
                    icon.classList.remove('opened');
                    mobileMenu.style.opacity = '0'; // Hide
                    mobileMenu.style.zIndex = '1100'; // Hide
                    mobileMenu.classList.remove('active');
                    body.style.overflow = 'visible';
                } else {
                    icon.classList.add('opened');
                    mobileMenu.style.opacity = '1'; // Show
                    mobileMenu.style.zIndex = '1000'; // Show
                    mobileMenu.classList.add('active');
                    body.style.overflow = 'hidden';
                }
            }
        });
    }
});
