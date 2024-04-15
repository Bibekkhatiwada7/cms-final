<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ShopMax
 */

get_header();
?>

	<main id="primary" class="site-main">
<!-- HTMLCode -->

<div class="myHeader">
        <h1>Welcome to <span>Shop Max</span></h1>
		<div class="featured-products">
    <h2>Featured Products</h2>
    <?php
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 4,
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat', // Use the WooCommerce product category taxonomy
                'field'    => 'slug',
                'terms'    => 'featured-products', // Replace with the slug of your WooCommerce product category
            ),
        ),
    );
    $featured_query = new WP_Query( $args );

    if ( $featured_query->have_posts() ) :
        while ( $featured_query->have_posts() ) :
            $featured_query->the_post();
            ?>
            <div class="featured-product">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    <h3><?php the_title(); ?></h3>
                </a>
                <p><?php echo wc_price( get_post_meta( get_the_ID(), '_price', true ) ); ?></p>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No featured products found.';
    endif;
    ?>
</div>

    </div>

    <main>
        <section id="about" class="section">
            <h2>About Us</h2>
            <p>Shop Max is your one-stop destination for all your shopping needs. We offer a wide range of products
                including electronics, fashion, home essentials, beauty products, sports equipment, toys, books, and
                much more. Our extensive selection caters to diverse tastes and preferences, ensuring that you find
                exactly what you're looking for.</p>
            <p>At Shop Max, we prioritize customer satisfaction above all else. Our dedicated team works tirelessly to
                curate the best products from trusted brands and vendors. With Shop Max, you can shop with confidence,
                knowing that every item is of the highest quality.</p>
            <p>In addition to our vast product range, we also offer convenient shipping options, secure payment methods,
                and excellent customer support. Whether you're shopping for yourself or searching for the perfect gift,
                Shop Max provides a seamless and enjoyable shopping experience for all.</p>
            
        </section>

        <section id="mission" class="section">
            <h2>Our Mission</h2>
            <p>
                At Shop Max, we understand that shopping is more than just a transaction—it's an experience. That's why
                we're dedicated to curating a diverse selection of products that cater to every need and preference.
                Whether you're looking for the latest tech gadgets, stylish fashion essentials, or practical home goods,
                we've got you covered.

                But our commitment goes beyond just offering great products. We believe in building lasting
                relationships with our customers by providing exceptional service at every step of the way. From
                knowledgeable staff ready to assist you with your inquiries to hassle-free returns and exchanges, we're
                here to ensure your satisfaction.

                Moreover, we recognize the importance of affordability in today's economy. That's why we work tirelessly
                to keep our prices competitive without compromising on quality. By leveraging our network of suppliers
                and optimizing our operations, we pass on the savings to you, our valued customers.

                At Shop Max, we're not just in the business of selling products—we're in the business of enhancing
                lives. Join us on our mission to redefine the shopping experience and discover why thousands of
                customers choose us for all their shopping needs.
            </p>
        </section>

        <section id="contact" class="section contact">
            <h2>Contact Us</h2>
            <p>If you have any questions or inquiries, feel free to reach out to us:</p>
            <ul>
                <li>Email: info@shopmax.com</li>
                <li>Phone: 1-800-SHOP-MAX</li>
            </ul>
        </section>
    </main>

   
<!-- HTMLCode -->
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
