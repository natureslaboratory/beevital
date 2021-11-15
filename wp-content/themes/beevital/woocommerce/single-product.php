<?php get_header();

global $product;
if (!is_object($product)) {
    $product = wc_get_product(get_the_ID());
}


?>
<div class="container__outer" id="product-<?php the_ID(); ?>">

    <?php do_action('woocommerce_before_single_product'); ?>
    <!-- PRODUCT MAIN -->
    <div id="product_main_wrapper">

        <div id="product_main" class="container__inner mw_1366">

            <div class="image">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
            </div>

            <div class="description">

                <a href="<?php echo get_permalink(bv__getShopPageID()); ?>" class="back_cta">
                    <i class="fas fa-arrow-left"></i>Back
                </a>

                <div class="type">
                    <?php echo wc_get_product_category_list(get_the_ID()); ?>
                    <!-- WHOLE HEALTH -->
                </div>

                <div class="heading">
                    <?php the_title(); ?>
                </div>

                <div class="price">
                    <?= wc_price($product->get_price()) ?>
                </div>

                <div class="rating">
                    <div class="stars">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <div class="label">
                        Be the first to rate this
                    </div>

                </div>

                <div class="excerpt">

                    <p>
                        <?php echo $product->get_short_description(); ?>
                    </p>

                </div>

                <?php if ($remedies = bv__getRemediesForProduct($product)) : ?>
                    <div class="remedy_list">

                        <div class="label">
                            Remedy for:
                        </div>

                        <div class="remedies">

                            <?php /** @var WP_Term $remedy */ foreach ($remedies as $remedy) : ?>
                                <div class="icon">
                                    <img src="<?php echo bv__getRemedyIconUrl($remedy); ?>" />
                                </div>
                            <?php endforeach; ?>



                        </div>

                    </div>
                <?php endif; ?>

                <?php do_action('woocommerce_template_single_add_to_cart'); ?>



            </div>

        </div>

        <div class="vertical_icons">

            <div class="icon">
                <i class="far fa-seedling"></i>
            </div>

            <div class="icon">
                <i class="fas fa-plus"></i>
            </div>

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/vertical_icons/bee.png'); ?>" />
            </div>

            <div class="icon">
                <i class="fas fa-equals"></i>
            </div>

            <div class="icon">
                <i class="far fa-heart"></i>
            </div>

        </div>

    </div>
    <!-- END OF PRODUCT MAIN -->

    <!-- PRODUCT TABS -->
    <div id="product_tabs">

        <div class="tabs_nav_wrapper">

            <div class="container__inner mw_1146">

                <ul class="tabs_nav">

                    <li>
                        <a href="javascript:void(0)" class="active" data-tab="description_tab">
                            Description
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0)" data-tab="how_to_take_tab">
                            How to take
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0)" data-tab="reviews_tab">
                            Reviews
                        </a>
                    </li>

                </ul>

            </div>

        </div>

        <div class="container__inner mw_1146">

            <!-- DESCRIPTION -->
            <div id="description_tab" class="tab active">

                <div class="sub_heading">
                    Description
                </div>

                <div id="product_description">

                    <div class="column">

                        <?php echo apply_filters('the_content', $product->get_description()); ?>


                    </div>

                    <div class="column box">

                        <?php if ($ingredients = bv__getExtraProductData($product->get_id(), 'ingredients')) : ?>
                            <div class="sub_heading">
                                Ingredients
                            </div>

                            <p>
                                <?php echo $ingredients; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($packaging = bv__getExtraProductData($product->get_id(), 'packaging')) : ?>
                            <div class="sub_heading">
                                Packaging
                            </div>

                            <p>
                                <?php echo $packaging; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($manufactured = bv__getExtraProductData($product->get_id(), 'manufactured')) : ?>
                            <div class="sub_heading">
                                Manufactured
                            </div>

                            <p>
                                <?php echo $manufactured; ?>
                            </p>
                        <?php endif; ?>

                    </div>

                </div>

            </div>
            <!-- END OF DESCRIPTION -->

            <?php if ($howToTake = bv__getExtraProductData($product->get_id(), 'howtotake')) : ?>
                <!-- HOW TO TAKE -->
                <div id="how_to_take_tab" class="tab">

                    <div class="sub_heading">
                        How to take
                    </div>

                    <?php echo apply_filters('the_content', $howToTake); ?>

                </div>
                <!-- END OF HOW TO TAKE -->
            <?php endif; ?>

            <?php if (comments_open()) : ?>
                <!-- REVIEWS -->
                <div id="reviews_tab" class="tab">

                    <div class="sub_heading">
                        Reviews
                    </div>


                    <?php if (have_comments()) : ?>
                        <ol class="commentlist">
                            <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
                        </ol>

                        <?php
                        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
                            echo '<nav class="woocommerce-pagination">';
                            paginate_comments_links(
                                apply_filters(
                                    'woocommerce_comment_pagination_args',
                                    array(
                                        'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                                        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                                        'type'      => 'list',
                                    )
                                )
                            );
                            echo '</nav>';
                        endif;
                        ?>
                    <?php else : ?>
                        <p class="woocommerce-noreviews"><?php esc_html_e('There are no reviews yet.', 'woocommerce'); ?></p>
                    <?php endif; ?>

                    <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>
                        <div id="review_form_wrapper">
                            <div id="review_form">
                                <?php
                                $commenter    = wp_get_current_commenter();
                                $comment_form = array(
                                    /* translators: %s is product title */
                                    'title_reply'         => have_comments() ? esc_html__('Add a review', 'woocommerce') : sprintf(esc_html__('Be the first to review &ldquo;%s&rdquo;', 'woocommerce'), get_the_title()),
                                    /* translators: %s is product title */
                                    'title_reply_to'      => esc_html__('Leave a Reply to %s', 'woocommerce'),
                                    'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
                                    'title_reply_after'   => '</span>',
                                    'comment_notes_after' => '',
                                    'label_submit'        => esc_html__('Submit', 'woocommerce'),
                                    'logged_in_as'        => '',
                                    'comment_field'       => '',
                                );

                                $name_email_required = (bool) get_option('require_name_email', 1);
                                $fields              = array(
                                    'author' => array(
                                        'label'    => __('Name', 'woocommerce'),
                                        'type'     => 'text',
                                        'value'    => $commenter['comment_author'],
                                        'required' => $name_email_required,
                                    ),
                                    'email'  => array(
                                        'label'    => __('Email', 'woocommerce'),
                                        'type'     => 'email',
                                        'value'    => $commenter['comment_author_email'],
                                        'required' => $name_email_required,
                                    ),
                                );

                                $comment_form['fields'] = array();

                                foreach ($fields as $key => $field) {
                                    $field_html  = '<p class="field comment-form-' . esc_attr($key) . '">';
                                    $field_html .= '<label for="' . esc_attr($key) . '">' . esc_html($field['label']);

                                    if ($field['required']) {
                                        $field_html .= '&nbsp;<span class="required">*</span>';
                                    }

                                    $field_html .= '</label><input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" value="' . esc_attr($field['value']) . '" size="30" ' . ($field['required'] ? 'required' : '') . ' /></p>';

                                    $comment_form['fields'][$key] = $field_html;
                                }

                                $account_page_url = wc_get_page_permalink('myaccount');
                                if ($account_page_url) {
                                    /* translators: %s opening and closing link tags respectively */
                                    $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(esc_html__('You must be %1$slogged in%2$s to post a review.', 'woocommerce'), '<a href="' . esc_url($account_page_url) . '">', '</a>') . '</p>';
                                }

                                if (wc_review_ratings_enabled()) {
                                    $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__('Your rating', 'woocommerce') . (wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '') . '</label><select name="rating" id="rating" required>
                                    <option value="">' . esc_html__('Rate&hellip;', 'woocommerce') . '</option>
                                    <option value="5">' . esc_html__('Perfect', 'woocommerce') . '</option>
                                    <option value="4">' . esc_html__('Good', 'woocommerce') . '</option>
                                    <option value="3">' . esc_html__('Average', 'woocommerce') . '</option>
                                    <option value="2">' . esc_html__('Not that bad', 'woocommerce') . '</option>
                                    <option value="1">' . esc_html__('Very poor', 'woocommerce') . '</option>
                                </select></div>';
                                }

                                $comment_form['comment_field'] .= '<p class="field comment-form-comment"><label for="comment">' . esc_html__('Your review', 'woocommerce') . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

                                bv__comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                                ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <p class="woocommerce-verification-required"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'woocommerce'); ?></p>
                    <?php endif; ?>

                    <div class="clear"></div>

                </div>
                <!-- END OF REVIEWS -->
            <?php endif; ?>

        </div>

    </div>
    <!-- END OF PRODUCT TABS -->

    <!-- KEY BENEFITS -->
    <?php if ($benefits = bv__getBenefitsOfPropolis()) : ?>
        <div id="key_benefits_wrapper">

            <div id="key_benefits" class="container__inner mw_1146">

                <div class="heading">
                    4 key <strong>benefits of propolis</strong>
                </div>

                <div class="benefits">
                    <?php foreach ($benefits as $key => $benefit) : ?>
                        <div class="benefit">

                            <div class="number">
                                <?php echo str_pad(((int)$key + 1), 2, '0', STR_PAD_LEFT); ?>.
                            </div>

                            <div class="text">

                                <div class="sub_heading">
                                    <?php echo apply_filters('the_title', $benefit->post_title); ?>
                                </div>

                                <?php echo apply_filters('the_content', $benefit->post_content); ?>

                            </div>

                        </div>

                    <?php endforeach; ?>
                </div>

                <div class="footer">
                    <p>
                        Learn more about the <a href="/propolis" class="inline_cta">benefits of propolis<i class="far fa-long-arrow-right"></i></a>
                    </p>
                </div>

            </div>

        </div>
    <?php endif; ?>
    <!-- END OF KEY BENEFITS -->

    <!-- BANNER -->
    <div id="banner" class="stacked  container__inner mw_1366">

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/free_uk_delivery.png'); ?>" />
            </div>

            <div class="text">
                <div class="sub_heading">Free UK delivery</div>
                <p>Free delivery on orders over &pound;20</p>
                <a href="/delivery-and-returns" class="inline_cta">Read more<i class="far fa-long-arrow-right"></i></a>
            </div>

        </div>

        <div class="separator"></div>

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/free_returns.png'); ?>" />
            </div>

            <div class="text">
                <div class="sub_heading">Free returns</div>
                <p>30-days free return policy</p>
                <a href="/delivery-and-returns" class="inline_cta">Read more<i class="far fa-long-arrow-right"></i></a>
            </div>

        </div>

        <div class="separator"></div>

        <div class="column">

            <div class="icon">
                <img src="<?php bv__getThemeImageUrl('global/misc/banner_icons/customer_service.png'); ?>" />
            </div>

            <div class="text">
                <div class="sub_heading">Customer service</div>
                <p>Excellent customer care</p>
                <a href="/customer-service" class="inline_cta">Read more<i class="far fa-long-arrow-right"></i></a>
            </div>

        </div>

    </div>
    <!-- END OF BANNER -->

    <div class="container__inner mw_1366">

        <!-- RELATED PRODUCTS -->
        <div class="products_partial">

            <div class="container__inner mw_1146">

                <div class="intro">

                    <div class="heading">
                        <strong>Related</strong> products
                    </div>

                </div>

            </div>

            <?php do_action('woocommerce_output_related_products'); ?>

        </div>
        <!-- END OF RELATED PRODUCTS -->

    </div>
</div>
<script>
    jQuery(document).ready(($) => {
        // QUANTITY CHANGER

        $('.quantity_select .btn').on('click', function(e) {
            e.preventDefault();

            const oldVal = $(this).parent().find('input').val();
            let newVal;

            if ($(this).hasClass('plus')) {
                newVal = parseFloat(oldVal) + 1;
            } else {
                if (oldVal > 1) {
                    newVal = parseFloat(oldVal) - 1;
                } else {
                    newVal = 1;
                }
            }

            $(this).parent().find('input').val(newVal);
        });


        // TABS

        $('#product_tabs .tabs_nav li a').click(function(e) {
            e.preventDefault();

            const tabID = $(this).attr('data-tab');

            $('#product_tabs .tabs_nav li a').removeClass('active');
            $('.tab').removeClass('active');

            $(this).addClass('active');
            $('#' + tabID).addClass('active');
        });
    })
</script>
<?php get_footer(); ?>