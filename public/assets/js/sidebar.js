document.addEventListener('DOMContentLoaded', function () {
  var toggleSidebarBtn = document.getElementById('toggle-sidebar');
  var sidebarMini = document.getElementById('sidebar-mini');
  var mainContent = document.querySelector('.main-content');

  toggleSidebarBtn.addEventListener('click', function () {
    sidebarMini.classList.toggle('show-sidebar-mini');
    if (mainContent.classList.contains('shifted-full'))
      mainContent.classList.toggle('shifted-full');
    else
      mainContent.classList.toggle('shifted');
    sidebarFulls.forEach(function (sidebar) {
      sidebar.classList.remove('show-sidebar-full');
    });
  });

  var toggler = document.querySelectorAll('[data-bs-toggle="sidebar-full"]');
  var sidebarFulls = document.querySelectorAll('.sidebar-full');

  toggler.forEach(function (el) {
    el.addEventListener('click', function () {
      var target = document.querySelector(this.getAttribute('data-bs-target'));

      sidebarFulls.forEach(function (sidebar) {
        sidebar.classList.remove('show-sidebar-full');
      });

      target.classList.add('show-sidebar-full');
      mainContent.classList.remove('shifted');
      mainContent.classList.add('shifted-full');
    });
  });
});

$('#dropdown-menu-button').on('click', function () {

  display = document.getElementById('dropdown-menu-div').style.display;
  button = document.getElementById('dropdown-menu-button').style;
  var dropdown_menu = $('.dropdown-menu-div');
  
  if (display == 'none') {
    dropdown_menu.slideDown();
    button.color = "#cedc0d";
  } else {
    dropdown_menu.slideUp();
    button.color = "";
  }
})