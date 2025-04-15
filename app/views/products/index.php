<?php
require "app/controllers/ProductsController.php";

# $categories = query("SELECT * FROM categories ORDER BY id ASC");

$limit = 8;
$page = isset($_GET['page_number']) ? (int) $_GET['page_number'] : 1;
$offset = ($page - 1) * $limit;
// Ambil parameter search jika ada
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$current_page = "products";
$base_url = "index.php";


$total_rows = getTotalProducts($search);
$products = getAllProducts($limit, $offset, $search);
$total_pages = ceil($total_rows / $limit);
$displayed_count = min($page * $limit, $total_rows); // Menampilkan jumlah data sampai halaman saat ini
?>
<!-- ===== CATEGORY TABLE ===== -->

    <div class="card--container container">
      <div class="card--wrapper">
        <div class="data--card grid">
          <?php $i = ($page - 1) * $limit + 1; ?>
          <?php if (count($products) > 0): ?>
            <?php foreach ($products as $row): ?>
              <article class="product__card">
                <a href="index.php?page=products&action=detail&id=<?= $row["id"]; ?>" class="product__link">
                  <img src="uploads/<?= $row["image"]; ?>" alt="image" class="product__img">
                  <div class="product__info">
                    <p class="product__title"><?= $row["name"]; ?></p>
                    <p class="product__price"id="price"><?= formatPrice($row["price"]); ?></p>
                  </div>
                </a>
              </article>
              <?php $i++; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      <?php
      include 'app/views/layouts/pagination.php'
        ?>
    </div>

  </div>
</main>