<?php
require "app/controllers/ProductsController.php";

# $categories = query("SELECT * FROM categories ORDER BY id ASC");

$limit = 8;
$page = isset($_GET['page_number']) ? (int) $_GET['page_number'] : 1;
$offset = ($page - 1) * $limit;
// Ambil parameter search jika ada
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$current_page = "dashboard";
$base_url = "index.php";

// Barang terbaru
$new_products = getLatestProducts(8);

// Barang per kategori (bisa kamu loop nanti untuk masing-masing kategori)
$categories = getAllCategories(); // ambil semua kategori
$products_by_category = [];
foreach ($categories as $category) {
  $products_by_category[$category['id']] = getProductsByCategory($category['id'], 4);
}

// Barang referensi (misalnya yang sering dibeli atau random)
$recommended_products = getRecommendedProducts(4);

$total_rows = getTotalProducts($search);
$products = getAllProducts($limit, $offset, $search);
$total_pages = ceil($total_rows / $limit);
$displayed_count = min($page * $limit, $total_rows); // Menampilkan jumlah data sampai halaman saat ini
?>
<!-- ===== CATEGORY TABLE ===== -->

    <div class="card--container container">
      <h3 class="main--title">Barang Terbaru</h3>
      <div class="card--wrapper">
        <div class="data--card grid">
          <?php foreach ($new_products as $row): ?>
            <article class="product__card">
              <a href="index.php?page=products&action=detail&id=<?= $row["id"]; ?>" class="product__link">
                <img src="uploads/<?= $row["image"]; ?>" alt="image" class="product__img">
                <div class="product__info">
                  <p class="product__title"><?= $row["name"]; ?></p>
                  <p class="product__price"><?= formatPrice($row["price"]); ?></p>
                </div>
              </a>
            </article>
          <?php endforeach; ?>
        </div>
      </div>


      <h3 class="main--title">Rekomendasi untuk Kamu</h3>
      <div class="card--wrapper">
        <div class="data--card grid">
          <?php foreach ($recommended_products as $row): ?>
            <article class="product__card">
              <a href="index.php?page=products&action=detail&id=<?= $row["id"]; ?>" class="product__link">
                <img src="uploads/<?= $row["image"]; ?>" alt="image" class="product__img">
                <div class="product__info">
                  <p class="product__title"><?= $row["name"]; ?></p>
                  <p class="product__price"><?= formatPrice($row["price"]); ?></p>
                </div>
              </a>
            </article>
          <?php endforeach; ?>
        </div>
      </div>

      <h3 class="main--title">
        <a href="index.php?page=products">
          All Products
        </a>
      </h3>
      <div class="card--wrapper">
        <div class="data--card grid">
          <?php $i = ($page - 1) * $limit + 1; ?>
          <?php if (count(value: $products) > 0): ?>
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

      <h3 class="main--title">Produk per Kategori</h3>
      <?php foreach ($categories as $cat): ?>
        <?php if (!empty($products_by_category[$cat['id']])): ?>
          <h4>
            <a href="index.php?page=products&search=<?= $cat["name"]; ?>">
              <?= $cat["name"]; ?>
            </a>
          </h4>
          <div class="card--wrapper">
            <div class="data--card grid">
              <?php foreach ($products_by_category[$cat['id']] as $row): ?>
                <article class="product__card">
                  <a href="index.php?page=products&action=detail&id=<?= $row["id"]; ?>" class="product__link">
                    <img src="uploads/<?= $row["image"]; ?>" alt="image" class="product__img">
                    <div class="product__info">
                      <p class="product__title"><?= $row["name"]; ?></p>
                      <p class="product__price"><?= formatPrice($row["price"]); ?></p>
                    </div>
                  </a>
                </article>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>

    </div>
</main>