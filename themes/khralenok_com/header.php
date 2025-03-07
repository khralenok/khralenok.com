<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<meta name="description" content="Learn to create websites with Grigorii Khralenok - your personal mentor"></meta>
<title>
  <?php 
  echo get_bloginfo('name');
  echo ' - ';
  the_title();
  ?>
  </title>
</head>
<body>
<header>
  <a class="logo" aria-label="To Main Page" href="/">
    <svg xmlns="http://www.w3.org/2000/svg" width="240" height="48" viewBox="0 0 80 16" fill="none">
      <path class="logo-back" d="M0 3C0 3 0 1 2 1L78 0C80 0 80 2 80 2L79 13C79 13 79 15 77 15L4 16C2 16 2 14 2 14L0 3Z" fill="black" />
      <path class="logo-letter" d="M65 4C68 4 68 8 68 8C68 12 64 12 64 12C61 12 61 8 61 8C61 4 65 4 65 4Z" stroke="white" />
      <path class="logo-letter" d="M54 11L53 4L58 12V4" stroke="white"/>
      <path class="logo-letter" d="M46 4H50" stroke="white"/>
      <path class="logo-letter" d="M45 11H50" stroke="white"/>
      <path class="logo-letter" d="M46 8H48" stroke="white"/>
      <path class="logo-letter" d="M45 11L46 4" stroke="white"/>
      <path class="logo-letter" d="M40 4L39 13L43 12" stroke="white"/>
      <path class="logo-letter" d="M29 12L32 3L36 13" stroke="white"/>
      <path class="logo-letter" d="M30 9L35 8" />
      <path class="logo-letter" d="M19 4C19 4 25 3 26 5C27 7 21 8 21 8L27 11" stroke="white"/>
      <path class="logo-letter" d="M21 13L20 4" stroke="white"/>
      <path class="logo-letter" d="M13 9H17" stroke="white"/>
      <path class="logo-letter" d="M13 14L14 4" stroke="white"/>
      <path class="logo-letter" d="M18 12L17 5" stroke="white"/>
      <path class="logo-letter" d="M4 4L5 13" stroke="white"/>
      <path class="logo-letter" d="M10 4L5 8" stroke="white"/>
      <path class="logo-letter" d="M11 11L7 7" stroke="white"/>
      <path class="logo-letter" d="M70 4L71 12" stroke="white"/>
      <path class="logo-letter" d="M76 3L71 8" stroke="white"/>
      <path class="logo-letter" d="M77 11L72 7" stroke="white"/>
    </svg>
  </a>
  <nav>
    <ul>
      <li><a href="<?php echo is_front_page()? '': get_home_url() ?>#subjects">Subjects</a></li>
      <li><a href="<?php echo is_front_page()? '': get_home_url() ?>#prices">Prices</a></li>
      <li><a href="<?php echo is_front_page()? '': get_home_url() ?>#reviews">Reviews</a></li>
    </ul>
  </nav>
  <div class="menu-icon">
    <div class="menu-icon-bar"></div>
    <div class="menu-icon-bar"></div>
    <div class="menu-icon-bar"></div>
  </div>
</header>