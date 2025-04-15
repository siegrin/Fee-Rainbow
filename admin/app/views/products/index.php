<?php
require "app/controllers/ProductsController.php";

# $categories = query("SELECT * FROM categories ORDER BY id ASC");

$limit = 5;
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
<div>
  <a href="index.php?page=products&action=add">
    <button class="btn btn-add">Add Product</button>
  </a>
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
<?php
include 'app/views/layouts/pagination.php'
  ?>
<div class="table--container">
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Categories</th>
        <th>SubCategories</th>
        <th>Occasion</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    <tbody>
      <?php $i = ($page - 1) * $limit + 1; ?>
      <?php if (count($products) > 0): ?>
        <?php foreach ($products as $row): ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["category_name"]; ?></td>
            <td><?= $row["subcategory_name"]; ?></td>
            <td><?= $row["occasion_name"]; ?></td>
            <td><?= formatPrice($row["price"]); ?></td>
            <td>
              <div>
                <a href="index.php?page=products&action=edit&id=<?= $row["id"]; ?>" class="btn-edit">Edit</a>
                <a href="index.php?page=products&action=delete&id=<?= $row["id"]; ?>" class="btn-delete"
                  onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">Delete</a>
              </div>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" style="text-align: center; font-weight: bold;">Data tidak ditemukan</td>
        </tr>
      <?php endif; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7">Total Occasions: <?= $displayed_count . "/" . $total_rows; ?></td>
      </tr>
    </tfoot>
    </thead>
  </table>
</div>