<?php if ($total_pages > 1): ?>
        <div class="pagination">
          <?php if ($page > 1): ?>
            <a href="<?= $base_url ?>?page=<?= $current_page ?>&page_number=<?= $page - 1; ?>&search=<?= $search; ?>">
              <i class='bx bx-left-arrow-alt'></i>
            </a>
          <?php endif; ?>
          <?php
          $max_pages_shown = 5;
          $start_page = max(1, $page - floor($max_pages_shown / 2));
          $end_page = min($total_pages, $start_page + $max_pages_shown - 1);

          if ($end_page - $start_page + 1 < $max_pages_shown) {
            $start_page = max(1, $end_page - $max_pages_shown + 1);
          }

          for ($i = $start_page; $i <= $end_page; $i++): ?>
            <div class="pagination__content">
              <a href="<?= $base_url ?>?page=<?= $current_page ?>&page_number=<?= $i; ?>&search=<?= $search; ?>"
                class="<?= ($i == $page) ? 'active' : ''; ?>">
                <?= $i; ?>
              </a>
            </div>
          <?php endfor; ?>
          <?php if ($page < $total_pages): ?>
            <a href="<?= $base_url ?>?page=<?= $current_page ?>&page_number=<?= $page + 1; ?>&search=<?= $search; ?>">
              <i class='bx bx-right-arrow-alt'></i>
            </a>

          <?php endif; ?>
        </div>
      <?php endif; ?>