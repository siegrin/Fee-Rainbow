<!--==================== FOOTER ====================-->
<footer class="footer">
   <div class="footer__container container grid">
      <div>
         <a href="#" class="footer__logo">Catalog Store</a>

         <p class="footer__description">
            Discover quality products, crafted with care. <br> Fast shipping guaranteed.
         </p>
      </div>

      <div class="footer__content grid">
         <div>
            <h3 class="footer__title">Address</h3>

            <ul class="footer__list">
               <li>
                  <address class="footer__info">Knowhere <br> Where</address>
               </li>

               <li>
                  <address class="footer__info">9AM - 11PM</address>
               </li>
            </ul>
         </div>

         <div>
            <h3 class="footer__title">Contact Me</h3>

            <ul class="footer__list">
               <li>
                  <address class="footer__info">piubitt@email.com</address>
               </li>

               <li>
                  <address class="footer__info">+620 000 000 000</address>
               </li>
            </ul>
         </div>

         <div>
            <h3 class="footer__title">Follow Us</h3>
            <div class="product__contact">
               <div class="contact__icons">
                  <a href="<?= getContactLink('whatsapp', '0', $products); ?>" target="_blank"
                     class="contact__icon-footer" title="WhatsApp">
                     <i class='bx bxl-whatsapp'></i>
                  </a>
                  <a href="<?= getContactLink('instagram', 'itsgrinme/'); ?>" target="_blank"
                     class="contact__icon-footer" title="Instagram">
                     <i class='bx bxl-instagram'></i>
                  </a>
                  <a href="<?= getContactLink('discord', 'UDmQzjedd4'); ?>" target="_blank" class="contact__icon-footer"
                     title="Discord">
                     <i class='bx bxl-discord-alt'></i>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <span class="footer__copy">&#169; All Rights Reserved By Catalog Store</span>
</footer>

<!--===== MAIN JS =====-->
<script src="assets/js/index.js"></script>
</body>

</html>