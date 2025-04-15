<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ===== BOX ICONS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="public/assets/css/styles.css?v=<?php echo time(); ?>">
  <title>Dashboard</title>
</head>

<body>
  <header class="header" id="header">
    <div class="header__toggle">
      <i class='bx bx-menu' id="header-toggle"></i>
    </div>
  </header>

  <main>
    <div class="main--content container">
      <div class="header--wrapper">
        <div class="header--title">
          <?php
          include "breadcrumb.php";
          ?>
        </div>
        <form class="form__search" action="index.php" method="GET">
  <input type="hidden" name="page" value="products">
  <div class="search--box">
    <i class='bx bx-search'></i>
    <input type="text" name="search" placeholder="Search"
      value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
    <button type="submit" class="btn-search">Search</button>
    <?php if (!empty($_GET['search'])): ?>
      <a href="index.php?page=products" class="btn-reset">Reset</a>
    <?php endif; ?>
  </div>
</form>
      </div>