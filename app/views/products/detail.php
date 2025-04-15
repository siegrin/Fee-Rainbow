<?php
require "app/controllers/ProductsController.php";

$id = $_GET["id"];
$categories = query("SELECT * FROM categories ORDER BY id");
$subcategories = query("SELECT * FROM subcategories ORDER BY id");
$occasions = query("SELECT * FROM occasions ORDER BY id");
$products = query("SELECT 
    p.*, 
    c.name AS category_name, 
    s.name AS subcategory_name, 
    o.name AS occasion_name 
  FROM products p
  LEFT JOIN categories c ON p.category_id = c.id
  LEFT JOIN subcategories s ON p.subcategory_id = s.id
  LEFT JOIN occasions o ON p.occasion_id = o.id
  WHERE p.id = $id")[0];



?>

<!-- ===== FORM SECTION ===== -->
<div class="details--container">
  <div class="card--wrapper">
    <article class="product__card-detail">
      <a href="#" class="product__link">
        <img src="uploads/<?= $products["image"]; ?>" alt="image" class="product__img">
      </a>
    </article>

    <div class="product__info">
      <div class="product__contact">
        <p class="product__title">Pesan melalui:</p>
        <div class="contact__icons">
          <a href="<?= getContactLink('whatsapp', '0', $products); ?>" target="_blank" class="contact__icon"
            title="WhatsApp">
            <i class='bx bxl-whatsapp'></i>
          </a>
          <a href="<?= getContactLink('instagram', 'itsgrinme/'); ?>" target="_blank" class="contact__icon"
            title="Instagram">
            <i class='bx bxl-instagram'></i>
          </a>
          <a href="<?= getContactLink('discord', 'UDmQzjedd4'); ?>" target="_blank" class="contact__icon"
            title="Discord">
            <i class='bx bxl-discord-alt'></i>
          </a>
        </div>
      </div>
      <p class="product__title-detail">Nama Produk : <span><?= $products["name"]; ?></span></p>
      <p class="product__title-detail">Kategori : <span><?= $products["category_name"]; ?></span></p>
      <p class="product__title-detail">Sub Kategori : <span><?= $products["subcategory_name"]; ?></span></p>
      <p class="product__title-detail">Tema : <span><?= $products["occasion_name"]; ?></span></p>
      <p class="product__price" id="price"><span><?= formatPrice($products["price"]); ?></span></p>
      <p class="product__title-detail">Deskripsi Produk : <br><span><?= $products["description"]; ?></span></p>

    </div>
  </div>
</div>