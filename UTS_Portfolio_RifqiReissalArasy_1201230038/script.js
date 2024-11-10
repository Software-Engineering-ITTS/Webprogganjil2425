// Nav click outside
document.addEventListener('click', function(e) {
    var navbarToggler = document.querySelector('.navbar-toggler');
    var navbarCollapse = document.querySelector('.navbar-collapse');

    if (navbarCollapse.classList.contains('show') && !navbarToggler.contains(e.target) && !navbarCollapse.contains(e.target)) {
        var bsCollapse = new bootstrap.Collapse(navbarCollapse);
        bsCollapse.hide();
        }
    });
      