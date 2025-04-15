<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ===== BOX ICONS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="public/assets/css/styles.css?v=<?php echo time(); ?>">

  <title>Admin</title>
</head>

<body id="body-pd">
  <!-- ===== HEADER ===== -->
  <header class="header" id="header">
    <div class="header__toggle">
      <i class='bx bx-menu' id="menu-toggle"></i>
    </div>
  </header>

  <!-- ===== SIDEBAR ===== -->
  <aside class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div class="nav__content">
        <a href="index.php" class="nav__logo">
          <i class='bx bx-layer nav__logo-icon'></i>
          <span class="nav__logo-text">Dashboard</span>
        </a>
        <ul class="nav__list">
          <li>
            <a href="index.php?page=products" class="nav__link">
              <i class='bx bx-folder nav__icon'></i>
              <span class="nav__text">Product</span>
            </a>
          </li>

          <li>
            <a href="index.php?page=categories" class="nav__link">
              <i class="bx bx-category-alt nav__icon"></i>
              <span class="nav__text">Category</span>
            </a>
          </li>
          <li>
            <a href="index.php?page=occasions" class="nav__link">
              <i class="bx bx-category-alt nav__icon"></i>
              <span class="nav__text">Occasion</span>
            </a>
          </li>
        </ul>
      </div>
      <a href="index.php?page=logout" class="nav__link nav__logout">
        <i class='bx bx-log-out nav__icon'></i>
        <span class="nav__text">Logout</span>
      </a>
    </nav>
  </aside>

  <!-- ===== MAIN CONTENT ===== -->
  <main>
    <div class="tabular--wrapper">
      <?php
      include "breadcrumb.php";
      ?>