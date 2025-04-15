<?php
require "app/controllers/CategoryController.php";
$limit = 5;
$page = isset($_GET['page_number']) ? (int) $_GET['page_number'] : 1;
$offset = ($page - 1) * $limit;
// Ambil parameter search jika ada
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$current_page = "categories";
$base_url = "index.php";

$total_rows = getTotalCategories($search);
$categories = getAllCategories($limit, $offset, $search);
$total_pages = ceil($total_rows / $limit);
$displayed_count = min($page * $limit, $total_rows); // Menampilkan jumlah data sampai halaman saat ini
?>
<!-- ===== CATEGORY TABLE ===== -->
<div>
  <a href="index.php?page=categories&action=add">
    <button class="btn btn-add">Add Category</button>
  </a>
</div>
<form class="form__search" action="index.php" method="GET">
  <input type="hidden" name="page" value="categories">
  <div class="search--box">
    <i class='bx bx-search'></i>
    <input type="text" name="search" placeholder="Search"
      value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
    <button type="submit" class="btn-search">Search</button>
    <?php if (!empty($_GET['search'])): ?>
      <a href="index.php?page=categories" class="btn-reset">Reset</a>
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
        <th>Total SubCategory</th>
        <th>Action</th>
      </tr>
    <tbody>
      <?php $i = ($page - 1) * $limit + 1; ?>
      <?php if (count($categories) > 0): ?>
        <?php foreach ($categories as $row): ?>
          <tr>
            <td> <?= $i; ?> </td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["total_subcategories"]; ?></td>
            <td>
              <div>
                <a href="index.php?page=categories&action=edit&id=<?= $row["id"]; ?>" class="btn-edit">Edit</a>
                <a href="index.php?page=categories&subpage=subcategories&id=<?= $row["id"]; ?>" class="btn-view">View</a>
                <a href="index.php?page=categories&action=delete&id=<?= $row["id"]; ?>" class="btn-delete"
                  onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">Delete</a>
              </div>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="4" style="text-align: center; font-weight: bold;">Data tidak ditemukan</td>
        </tr>
      <?php endif; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4">Total Occasions: <?= $displayed_count . "/" . $total_rows; ?></td>
      </tr>
    </tfoot>
    </thead>
  </table>
</div>