  var currentUrl = window.location.href;
  var menuItems = document.querySelectorAll('ul li a');
  
  for (var i = 0; i < menuItems.length; i++) {
    if (menuItems[i].href === currentUrl) {
      menuItems[i].parentNode.classList.add('active');
    }
  }