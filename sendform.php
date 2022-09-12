<?php
if ($_POST) {
    $create_custom_product = new WC_ProductExtended;
    $create_custom_product->set_name(esc_html($_POST['post_title']));
    $create_custom_product->set_regular_price(sanitize_text_field($_POST['_regular_price']));
    $create_custom_product->set_prod_img($_POST['custom-img-id']);
    $create_custom_product->set_image_id($_POST['custom-img-id']);
    $create_custom_product->set_prod_type($_POST['prod_type']);
    $create_custom_product->set_created($_POST['test_created']);
    $create_custom_product->set_status('publish');
    $create_custom_product->save();
    wp_redirect('index.php');
    exit;
}