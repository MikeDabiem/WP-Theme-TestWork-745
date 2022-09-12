<section class="shop">
    <div class="products">
        <?php
            $args = array(
                'post_type' => 'product',
                'orderby' => 'title',
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
            global $product;
        ?>
        <div class="products__item">
            <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
                <?php
                    if (is_array(wp_get_attachment_image_src(get_post_meta( $post->ID, '_your_img_id', true )))) {
                        ?><img src="<?php echo wp_get_attachment_image_src(get_post_meta( $post->ID, '_your_img_id', true ), [300, 300])[0] ?>" alt=""><?php
                    }
                    else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />';
                ?>
                <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                <h3 class="products__item-title"><?php the_title(); ?></h3>
                <div class="products__item-price"><?php echo $product->get_price_html(); ?></div>
                <p><?php if(get_post_meta( $post->ID, 'test_created', true )) {?>
                    Published: <?php echo get_post_meta( $post->ID, 'test_created', true ); }?>
                </p>
                <p><?php if(get_post_meta( $post->ID, 'prod_type', true )) {?>
                    Type: <?php echo get_post_meta( $post->ID, 'prod_type', true ); }?>
                </p>
            </a>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
</section>