<div class="breadcrumb">
  <a href="index.php">Dashboard</a>

  <?php
  $breadcrumbParts = [];
  $path = "";

  // **Tambahkan Page**
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $path .= "page=$page";
    $label = ucfirst(str_replace("-", " ", $page));

    $breadcrumbParts[] = "<a href='index.php?$path'>$label</a>";
  }

  // **Tambahkan Subpage (subcategories)**
  if (isset($_GET['subpage'])) {
    $subpage = $_GET['subpage'];
    $path .= "&subpage=$subpage&id=$id";
    $label = ucfirst(str_replace("-", " ", $subpage));

    $breadcrumbParts[] = "<a href='index.php?$path'>$label</a>";
  }

  // **Tambahkan ID jika ada (tetap tersimpan)**
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $path .= "&id=$id";
  }

  // **Tambahkan Action (Edit, Delete, dll.)**
  if (isset($_GET['action'])) {
    $action = ucfirst($_GET['action']);
    $path .= "&action=$action";
    $breadcrumbParts[] = "<a href='index.php?$path'>$action</a>";
  }

  // **Tampilkan breadcrumb dengan ikon separator**
  foreach ($breadcrumbParts as $index => $part) {
    echo " <i class='bx bx-chevron-right'></i> " . $part;
  }
  ?>
</div>