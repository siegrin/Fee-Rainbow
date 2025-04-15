<?php
require_once 'app/models/products.php';
function getLatestProducts($limit = 8)
{
  return query("SELECT * FROM products ORDER BY created_at DESC LIMIT $limit");
}

function getAllCategories()
{
  return query("SELECT * FROM categories ORDER BY name ASC");
}

function getProductsByCategory($category_id, $limit = 4)
{
  return query("SELECT * FROM products WHERE category_id = $category_id ORDER BY created_at DESC LIMIT $limit");
}

function getRecommendedProducts($limit = 4)
{
  return query("SELECT * FROM products ORDER BY RAND() LIMIT $limit"); // atau bisa berdasarkan log pembelian
}

function formatPrice($amount, $currency = 'Rp.')
{
  return $currency . ' ' . number_format($amount, 2, '.', ',');
}

function getBaseURL()
{
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
  $host = $_SERVER['HTTP_HOST'];
  return $protocol . $host;
}

function getWhatsAppMessage($product = null)
{
  // Jika tidak ada produk atau bukan array valid, kirim pesan default
  if (!is_array($product) || empty($product["name"]) || empty($product["price"]) || empty($product["image"])) {
    $defaultMessage = "Hallo kak! 👋\n\nSaya ingin bertanya mengenai produk atau layanan yang tersedia di toko ini 😊";
    return urlencode($defaultMessage);
  }

  // Jika ada produk dan semua data tersedia
  $name = $product["name"];
  $price = formatPrice($product["price"]);
  $imageURL = getBaseURL() . '/admin/uploads/' . $product["image"];

  $message = "Hallo kak! 👋\n\nSaya tertarik dengan produk berikut:\n\n" .
    "🛍 *$name*\n💰 *$price*\n🖼 Gambar: $imageURL\n\n" .
    "Apakah masih tersedia? Dan bagaimana proses pemesanannya ya? 😊";

  return urlencode($message);
}

function getContactLink($platform, $contact, $product = null)
{
  switch (strtolower($platform)) {
    case 'whatsapp':
      $number = preg_replace('/\D/', '', $contact);
      $message = $product ? getWhatsAppMessage($product) : '';
      return 'https://wa.me/' . $number . '?text=' . $message;

    case 'instagram':
      return 'https://instagram.com/' . $contact;

    case 'discord':
      return 'https://discord.gg/' . $contact;

    default:
      return '#';
  }
}
?>