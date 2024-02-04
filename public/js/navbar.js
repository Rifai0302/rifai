document.addEventListener('DOMContentLoaded', function () {
    var navbarToggler = document.querySelector('.navbar-toggler');

    navbarToggler.addEventListener('click', function () {
        navbarToggler.classList.toggle('animated');
    });

    var navbarCollapse = new bootstrap.Collapse(document.getElementById('navbarNav'));

    navbarCollapse._element.addEventListener('hidden.bs.collapse', function () {
        navbarToggler.classList.remove('animated');
    });
});