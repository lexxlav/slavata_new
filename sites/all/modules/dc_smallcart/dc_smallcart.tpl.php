<?php
  /**
   *
   *  Drupal Commerce smallcart block template. Variables
   *   - $empty - whether the cart is empty
   *   - $cart_link - link to the cart
   *   - $checkout_link - link to checkout
   *   - $message - text message
   */
?>
<?php if (!$empty): ?>
  <div class="shoping-cart-cart">
    <?php print $cart_link; ?>
  </div>
<?php endif; ?>
<div class="shoping-cart-info">
  <?php print $message; ?>
</div>
<?php if (!$empty): ?>
  <div class="shoping-cart-checkout">
    <?php print $checkout_link; ?>
  </div>
<?php endif; ?>
