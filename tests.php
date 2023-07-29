<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
nav {
  background-color: #f5f5f7;
  height: 70px;
}

.menu {
  display: flex;
  justify-content: space-between;
  list-style-type: none;
  margin: 0;
  padding: 0;
  height: 100%;
}

.menu li {
  position: relative;
  margin: 0 1.5em;
  height: 100%;
}

.menu a {
  color: #111;
  text-decoration: none;
  font-size: 1.2em;
  padding: 0 1.5em;
  display: flex;
  align-items: center;
  height: 100%;
  transition: all 0.2s ease-in-out;
}

.menu a:hover {
  color: #007aff;
}

.has-submenu:hover .submenu {
  display: block;
}

.submenu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0,0,0,.1);
  width: 100%;
}

.submenu li {
  display: block;
  margin: 0;
}

.submenu a {
  font-size: 1.2em;
  padding: 1em 1.5em;
  display: block;
  color: #111;
  text-decoration: none;
  transition: all 0.2s ease-in-out;
}

.submenu a:hover {
  color: #007aff;
  background-color: #f5f5f7;
}

/* Style for the Apple logo */
.menu li:first-child a {
  font-size: 2em;
  font-weight: bold;
  padding: 0;
}

/* Style for the search icon */
.menu li:nth-child(6) a {
  font-size: 1.2em;
  padding: 0;
}

/* Style for the cart icon */
.menu li:last-child a {
  font-size: 1.2em;
  position: relative;
  padding: 0;
}

.menu li:last-child a:after {
  content: '';
  position: absolute;
  top: -0.5em;
  right: -0.5em;
  width: 1.5em;
  height: 1.5em;
  background-color: #007aff;
  border-radius: 50%;
  color: #fff;
  font-size: 0.8em;
  display: flex;
  justify-content: center;
  align-items: center;
}

.menu li:last-child a:before {
  content: '1';
  position: absolute;
  top: -0.5em;
  right: -0.5em;
  color: #fff;
  font-size: 0.8;}
    </style>
</head>
<body>
<nav>
  <ul class="menu">
    <li><a href="#">Mac</a></li>
    <li class="has-submenu">
      <a href="#">iPad</a>
      <ul class="submenu">
        <li><a href="#">iPad Pro</a></li>
        <li><a href="#">iPad Air</a></li>
        <li><a href="#">iPad</a></li>
        <li><a href="#">iPad mini</a></li>
      </ul>
    </li>
    <li class="has-submenu">
      <a href="#">iPhone</a>
      <ul class="submenu">
        <li><a href="#">iPhone 12</a></li>
        <li><a href="#">iPhone 11</a></li>
        <li><a href="#">iPhone SE</a></li>
        <li><a href="#">iPhone XR</a></li>
      </ul>
    </li>
    <li><a href="#">Watch</a></li>
    <li><a href="#">TV</a></li>
    <li><a href="#">Music</a></li>
    <li><a href="#">Support</a></li>
  </ul>
</nav>
<script>

const menuToggle = document.querySelector('.menu-toggle');
const menu = document.querySelector('.menu');

menuToggle.addEventListener('click', function() {
  menu.classList.toggle('show-menu');
});
</script>
</body>
</html>