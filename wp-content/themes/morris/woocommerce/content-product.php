<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );
?>

<article class="item-box--product-item grid_4 clearfix">
    <figure class="image-wrapper clearfix">
    	<a href="<?php echo(get_permalink( $product->get_id() ));?>">
        <?php 
        	do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */

        	?>
        </a>
    </figure>
	<?php 
	($product->get_price()) ? $isPriceExist = '' : $isPriceExist = 'price-exist';?>
    <div class="item-box--product-content woocommerce clearfix <?php echo($isPriceExist);?>">
    	<a href="<?php echo(get_permalink( $product->get_id() ));?>"><?php do_action( 'woocommerce_shop_loop_item_title' );?></a>
    	<?php do_action( 'woocommerce_after_shop_loop_item_title' );
		$shortDescription = get_post_meta($product->get_id(), 'small-description', true);?>
        <footer class="item-box--footer clearfix">
			<?php if($shortDescription) {?>
				<p><?php  echo($shortDescription);?></p>
			<?php }
			else{?>
				<ul></ul>
			<?php }
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
            ?>
        </footer>
    </div>
</article>

