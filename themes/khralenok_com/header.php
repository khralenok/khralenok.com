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
    <svg viewBox="0 0 220 40" xmlns="http://www w3 org/2000/svg">
    <path d="M168 16 C169 12 173 10 177 11 C181 12 183 16 182 20 C181 25 177 27 173 26 C169 25 167 21 168 16 Z" />
    <path d="M86 18 L89 18 L88 14 L86 18 Z" />
    <path d="M58 11 L58 18 C60 18 61 18 63 17 C64 17 65 16 66 14 C66 13 66 13 65 12 C65 12 65 12 63 11 C62 11 60 11 58 11 Z" />
    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3 L0 3 L3 37 C3 37 3 38 3 38 C4 39 7 39 10 39 L212 39 C216 40 219 39 219 38 L219 1 C220 0 216 -0 212 0 L6 1 C3 1 1 1 0 2 C-0 2 -0 2 0 3 ZM177 7 C171 5 165 9 164 15 C162 22 166 28 172 30 C179 32 185 28 186 21 C188 15 184 9 177 7 ZM143 8 C144 7 145 8 145 8 L157 23 V10 C157 9 158 8 159 8 C160 8 161 9 161 10 V29 C161 30 161 31 160 31 C159 32 158 31 157 31 L147 17 L149 29 C149 30 149 31 147 31 C146 32 145 31 145 30 L142 10 C142 9 142 8 143 8 ZM126 6 C125 6 124 7 124 8 L124 8 L124 8 C124 8 124 8 123 9 L122 26 C122 27 122 28 124 28 C124 28 124 28 124 28 C124 28 124 28 124 28 L136 29 C137 29 138 28 138 27 C138 26 137 25 136 25 L126 24 L127 19 L133 20 C134 20 135 19 135 18 C135 17 134 16 133 16 L127 15 L127 11 L137 11 C138 11 139 11 139 9 C139 8 139 7 137 7 L126 6 ZM106 8 C106 7 105 6 104 6 C103 6 102 7 102 8 L103 27 C103 29 104 29 105 29 H117 C118 29 119 28 119 27 C119 26 118 25 117 25 H107 L106 8 ZM88 7 C89 7 89 7 90 8 L94 19 L98 19 C99 20 100 21 100 22 C100 23 99 24 98 24 L95 23 L98 29 C98 30 98 32 97 32 C95 32 94 32 94 31 L91 23 L85 22 L82 29 C82 30 81 30 80 30 C79 29 78 28 78 27 L86 8 C86 7 87 7 88 7 ZM59 23 L59 28 C59 29 58 30 57 30 C55 30 54 29 54 28 L53 9 C53 8 54 7 55 7 C58 6 61 6 64 7 C66 7 68 8 69 9 C70 11 71 12 70 15 C70 18 68 20 65 21 L75 26 C76 27 76 28 76 29 C75 30 74 31 73 30 L59 23 ZM37 8 L38 17 L46 16 L46 9 C46 7 46 6 48 6 C49 6 50 7 50 8 L50 28 C50 29 50 30 48 30 C47 30 46 30 46 28 L46 20 L38 21 L38 28 C38 29 37 30 36 30 C35 30 34 30 34 28 L33 9 C33 7 34 6 35 6 C36 6 37 7 37 8 ZM13 7 C14 7 15 8 15 9 L16 16 L24 7 C25 6 26 6 27 7 C28 8 28 9 27 10 L21 16 L32 27 C32 27 32 29 32 30 C31 30 30 30 29 30 L18 19 L16 22 L16 22 L16 22 L17 29 C17 30 16 31 15 31 C14 31 13 30 12 29 L11 9 C11 8 12 7 13 7 ZM192 9 C192 8 191 7 190 7 C189 7 188 8 188 9 L192 29 C192 30 193 31 194 31 C195 31 196 30 196 28 L195 22 C195 22 195 22 195 22 L197 19 L208 28 C209 29 210 29 211 28 C212 27 212 26 211 25 L199 16 L204 9 C205 8 205 7 204 6 C203 5 202 6 201 7 L194 16 L192 9 Z" />
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