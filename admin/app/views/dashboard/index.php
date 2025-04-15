<?php

$total_categories = query("SELECT COUNT(*) as total FROM categories")[0]['total'];
$total_occasions = query("SELECT COUNT(*) as total FROM occasions")[0]['total'];
$total_products = query("SELECT COUNT(*) as total FROM products")[0]['total'];

  ?>
<h3 class="main--title">Today's data</h3>

<div class="card--wrapper">
  <div class="data--card">
    <a href="index.php?page=products" class="link--card">
      <div class="card--header">
        <div class="amount">
          <span class="title">Products</span>
          <span class="amount--value">X<?= $total_products; ?></span>
        </div>
      </div>
    </a>
  </div>

  <div class="data--card">
    <a href="index.php?page=categories" class="link--card">
      <div class="card--header">
        <div class="amount">
          <span class="title">Categories</span>
          <span class="amount--value">X<?= $total_categories; ?></span>
        </div>
      </div>
    </a>
  </div>

  <div class="data--card">
    <a href="index.php?page=occasions" class="link--card">
      <div class="card--header">
        <div class="amount">
          <span class="title">Occusion</span>
          <span class="amount--value">X<?= $total_occasions; ?></span>
        </div>
      </div>
    </a>
  </div>
</div>