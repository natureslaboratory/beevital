<?php


add_action('wp_enqueue_scripts',function(){

    wp_enqueue_style('bv',get_bloginfo('stylesheet_directory') . '/style.css');
    wp_enqueue_style('font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('faq', "/wp-content/themes/beevital/dist/scripts/index.js", [], false, true);
    ?> 
    <script>
        console.log("<?php echo get_template_directory() . "/dist/index.js" ?>");
    </script>
    
    <?php

    /** Font awesome js */
    wp_register_script('font-awesome','https://kit.fontawesome.com/fae2de29d1.js',['jquery']);
    wp_enqueue_script('font-awesome');
    wp_script_add_data( 'font-awesome', 'crossorigin', 'anonymous');

});


//enable woocommerce
add_action( 'after_setup_theme', function() {
    add_theme_support( 'woocommerce' );
    add_post_type_support( 'page', 'excerpt' );
});



// remove hooks we don't want
remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_filter('woocommerce_locate_template','thwmsc_multistep_template',20);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);



add_action( 'woocommerce_output_related_products',function(){

    $args = array(
        'posts_per_page' => 4,
        'columns' => 4,
        'orderby' => 'rand'
    );
    woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );

}, 25);


// add hooks back we do need
add_action('woocommerce_template_single_add_to_cart','woocommerce_template_single_add_to_cart',30);
add_action( 'woocommerce_breadcrumb', 'woocommerce_breadcrumb', 20, 0 );

add_filter('woocommerce_locate_template',function($template, $template_name, $template_path){

    if('checkout/form-checkout.php' == $template_name ){

        $template = get_stylesheet_directory() . '/woocommerce/checkout/form-checkout.php';

    }
    return $template;
},20,3);

add_filter('woocommerce_cart_totals_coupon_label',function(string $text, $coupon){
   return str_replace('Coupon: ','',$text);
},10,2);

//add_action('woocommerce_removed_coupon',function(string $code){
//
//    wp_redirect('/cart');
//    exit;
//},10,1);



add_filter( 'woocommerce_output_related_products_args', function(array $args){
    $args['posts_per_page'] = 3; // 4 related products
    return $args;
}, 20 );


add_action('init',function(){

//   register_nav_menu('products','Main Products Menu');
//   register_nav_menu('remedies','Remedies Menu');


   register_taxonomy('remedies','product',[
       'labels'=>[
           'name'=>'Remedies',
           'singular_name'=>'Remedy'
       ],
       'public'=>true,
       'hierarchical'=>true,
       'rewrite'=>[
           'slug'=>'remedies'
       ]
   ]);

   register_post_type('benefits-of-propolis',[
      'labels'=>[
          'name'=>'Benefits Of Propolis',
          'singular_name'=>'Benefit Of Propolis'
      ],
       'public'=>false,
       'show_ui'=>true,
       'supports' => array( 'title', 'editor','page-attributes')
   ]);

});

add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
    $prefix = 'bevital__';

    $meta_boxes[] = [
        'title'      => 'Extra Product Data', 'online-generator',
        'id'         => 'extra-product-data',
        'post_types' => ['product'],
        'context'    => 'normal',
        'fields'     => [
            [
                'type' => 'textarea',
                'name' => esc_html__( 'Ingredients', 'online-generator' ),
                'id'   => $prefix . 'ingredients',
                'rows' => 15,
            ],
            [
                'type' => 'textarea',
                'name' => esc_html__( 'Packaging', 'online-generator' ),
                'id'   => $prefix . 'packaging',
                'rows' => 15,
            ],
            [
                'type' => 'textarea',
                'name' => esc_html__( 'Manufactured', 'online-generator' ),
                'id'   => $prefix . 'manufactured',
                'rows' => 15,
            ],
            [
                'type' => 'wysiwyg',
                'name' => esc_html__( 'How To Take', 'online-generator' ),
                'id'   => $prefix . 'howtotake',
            ]
        ],
    ];

    return $meta_boxes;
});



add_filter('woocommerce_account_menu_items',function(array $items,array $endpoints){

    unset($items['downloads']);

    return $items;

},10,2);


//add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');


//add_filter('thwmsc_change_tab_settings', function(array $steps){
//
//    $steps['billing']['title']='Payment';
//    $steps['billing']['indextype']='icon_index';
//
//    $steps['shipping']['title']='Delivery';
//    $steps['shipping']['indextype']='icon_index';
//
//    $steps['order_review']['title']='Confirmation';
//    $steps['order_review']['indextype']='icon_index';
//
//echo '<pre>';die(print_r($steps));
//    return $steps;
//});
//
//
add_filter('thwmsc_public_display_settings',function(array $props){

    $props['button_new_class'] = 'block_cta';
    return $props;
});


add_filter('thwmsc_change_previous_button', function(string $text){

    return '<i class="far fa-long-arrow-left" aria-hidden="true"></i>Back to previous step';
});


/**
 * WOrDPrESS FUNCTION OVERRiDeS
 */

function bv__woocommerce_checkout_coupon_form() {
    if ( is_user_logged_in() || WC()->checkout()->is_registration_enabled() || ! WC()->checkout()->is_registration_required() ) {
        wc_get_template(
            'checkout/form-coupon.php',
            array(
                'checkout' => WC()->checkout(),
            )
        );
    }
}

function bv__comment_form( $args = array(), $post_id = null ) {
    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }

    // Exit the function when comments for the post are closed.
    if ( ! comments_open( $post_id ) ) {
        /**
         * Fires after the comment form if comments are closed.
         *
         * @since 3.0.0
         */
        do_action( 'comment_form_comments_closed' );

        return;
    }

    $commenter     = wp_get_current_commenter();
    $user          = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $args = wp_parse_args( $args );
    if ( ! isset( $args['format'] ) ) {
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
    }

    $req      = get_option( 'require_name_email' );
    $html_req = ( $req ? " required='required'" : '' );
    $html5    = 'html5' === $args['format'];

    $fields = array(
        'author' => sprintf(
            '<p class="comment-form-author">%s %s</p>',
            sprintf(
                '<label for="author">%s%s</label>',
                __( 'Name' ),
                ( $req ? ' <span class="required">*</span>' : '' )
            ),
            sprintf(
                '<input id="author" name="author" type="text" value="%s" size="30" maxlength="245"%s />',
                esc_attr( $commenter['comment_author'] ),
                $html_req
            )
        ),
        'email'  => sprintf(
            '<p class="comment-form-email">%s %s</p>',
            sprintf(
                '<label for="email">%s%s</label>',
                __( 'Email' ),
                ( $req ? ' <span class="required">*</span>' : '' )
            ),
            sprintf(
                '<input id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
                ( $html5 ? 'type="email"' : 'type="text"' ),
                esc_attr( $commenter['comment_author_email'] ),
                $html_req
            )
        ),
        'url'    => sprintf(
            '<p class="comment-form-url">%s %s</p>',
            sprintf(
                '<label for="url">%s</label>',
                __( 'Website' )
            ),
            sprintf(
                '<input id="url" name="url" %s value="%s" size="30" maxlength="200" />',
                ( $html5 ? 'type="url"' : 'type="text"' ),
                esc_attr( $commenter['comment_author_url'] )
            )
        ),
    );



    $required_text = sprintf(
    /* translators: %s: Asterisk symbol (*). */
        ' ' . __( 'Required fields are marked %s' ),
        '<span class="required">*</span>'
    );

    /**
     * Filters the default comment form fields.
     *
     * @since 3.0.0
     *
     * @param string[] $fields Array of the default comment fields.
     */
    $fields = apply_filters( 'comment_form_default_fields', $fields );

    $defaults = array(
        'fields'               => $fields,
        'comment_field'        => sprintf(
            '<p class="comment-form-comment">%s %s</p>',
            sprintf(
                '<label for="comment">%s</label>',
                _x( 'Comment', 'noun' )
            ),
            '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>'
        ),
        'must_log_in'          => sprintf(
            '<p class="must-log-in">%s</p>',
            sprintf(
            /* translators: %s: Login URL. */
                __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                /** This filter is documented in wp-includes/link-template.php */
                wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
            )
        ),
        'logged_in_as'         => sprintf(
            '<p class="logged-in-as">%s</p>',
            sprintf(
            /* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
                __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>' ),
                get_edit_user_link(),
                /* translators: %s: User name. */
                esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.' ), $user_identity ) ),
                $user_identity,
                /** This filter is documented in wp-includes/link-template.php */
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
            )
        ),
        'comment_notes_before' => sprintf(
            '<p class="comment-notes">%s%s</p>',
            sprintf(
                '<span id="email-notes">%s</span>',
                __( 'Your email address will not be published.' )
            ),
            ( $req ? $required_text : '' )
        ),
        'comment_notes_after'  => '',
        'action'               => site_url( '/wp-comments-post.php' ),
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_container'      => 'comment-respond',
        'class_form'           => 'comment-form',
        'class_submit'         => 'block_cta',
        'name_submit'          => 'submit',
        'title_reply'          => __( 'Leave a Reply' ),
        /* translators: %s: Author of the comment being replied to. */
        'title_reply_to'       => __( 'Leave a Reply to %s' ),
        'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after'    => '</h3>',
        'cancel_reply_before'  => ' <small>',
        'cancel_reply_after'   => '</small>',
        'cancel_reply_link'    => __( 'Cancel reply' ),
        'label_submit'         => __( 'Post Comment' ),
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
        'format'               => 'xhtml',
    );

    /**
     * Filters the comment form default arguments.
     *
     * Use {@see 'comment_form_default_fields'} to filter the comment fields.
     *
     * @since 3.0.0
     *
     * @param array $defaults The default comment form arguments.
     */
    $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

    // Ensure that the filtered arguments contain all required default values.
    $args = array_merge( $defaults, $args );

    // Remove `aria-describedby` from the email field if there's no associated description.
    if ( isset( $args['fields']['email'] ) && false === strpos( $args['comment_notes_before'], 'id="email-notes"' ) ) {
        $args['fields']['email'] = str_replace(
            ' aria-describedby="email-notes"',
            '',
            $args['fields']['email']
        );
    }

    /**
     * Fires before the comment form.
     *
     * @since 3.0.0
     */
    do_action( 'comment_form_before' );
    ?>
    <div id="respond" class="<?php echo esc_attr( $args['class_container'] ); ?>">
        <?php
        echo $args['title_reply_before'];

        comment_form_title( $args['title_reply'], $args['title_reply_to'] );

        echo $args['cancel_reply_before'];

        cancel_comment_reply_link( $args['cancel_reply_link'] );

        echo $args['cancel_reply_after'];

        echo $args['title_reply_after'];

        if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :

            echo $args['must_log_in'];
            /**
             * Fires after the HTML-formatted 'must log in after' message in the comment form.
             *
             * @since 3.0.0
             */
            do_action( 'comment_form_must_log_in_after' );

        else :

            printf(
                '<form action="%s" method="post" id="%s" class="%s"%s>',
                esc_url( $args['action'] ),
                esc_attr( $args['id_form'] ),
                esc_attr( $args['class_form'] ),
                ( $html5 ? ' novalidate' : '' )
            );

            /**
             * Fires at the top of the comment form, inside the form tag.
             *
             * @since 3.0.0
             */
            do_action( 'comment_form_top' );

            if ( is_user_logged_in() ) :

                /**
                 * Filters the 'logged in' message for the comment form for display.
                 *
                 * @since 3.0.0
                 *
                 * @param string $args_logged_in The logged-in-as HTML-formatted message.
                 * @param array  $commenter      An array containing the comment author's
                 *                               username, email, and URL.
                 * @param string $user_identity  If the commenter is a registered user,
                 *                               the display name, blank otherwise.
                 */
                echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

                /**
                 * Fires after the is_user_logged_in() check in the comment form.
                 *
                 * @since 3.0.0
                 *
                 * @param array  $commenter     An array containing the comment author's
                 *                              username, email, and URL.
                 * @param string $user_identity If the commenter is a registered user,
                 *                              the display name, blank otherwise.
                 */
                do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

            else :

                echo $args['comment_notes_before'];

            endif;

            // Prepare an array of all fields, including the textarea.
            $comment_fields = array( 'comment' => $args['comment_field'] ) + (array) $args['fields'];

            /**
             * Filters the comment form fields, including the textarea.
             *
             * @since 4.4.0
             *
             * @param array $comment_fields The comment fields.
             */
            $comment_fields = apply_filters( 'comment_form_fields', $comment_fields );

            // Get an array of field names, excluding the textarea.
            $comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );

            // Get the first and the last field name, excluding the textarea.
            $first_field = reset( $comment_field_keys );
            $last_field  = end( $comment_field_keys );

            foreach ( $comment_fields as $name => $field ) {

                if ( 'comment' === $name ) {

                    /**
                     * Filters the content of the comment textarea field for display.
                     *
                     * @since 3.0.0
                     *
                     * @param string $args_comment_field The content of the comment textarea field.
                     */
                    echo apply_filters( 'comment_form_field_comment', $field );

                    echo $args['comment_notes_after'];

                } elseif ( ! is_user_logged_in() ) {

                    if ( $first_field === $name ) {
                        /**
                         * Fires before the comment fields in the comment form, excluding the textarea.
                         *
                         * @since 3.0.0
                         */
                        do_action( 'comment_form_before_fields' );
                    }

                    /**
                     * Filters a comment form field for display.
                     *
                     * The dynamic portion of the filter hook, `$name`, refers to the name
                     * of the comment form field. Such as 'author', 'email', or 'url'.
                     *
                     * @since 3.0.0
                     *
                     * @param string $field The HTML-formatted output of the comment form field.
                     */
                    echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";

                    if ( $last_field === $name ) {
                        /**
                         * Fires after the comment fields in the comment form, excluding the textarea.
                         *
                         * @since 3.0.0
                         */
                        do_action( 'comment_form_after_fields' );
                    }
                }
            }

            $submit_button = sprintf(
                $args['submit_button'],
                esc_attr( $args['name_submit'] ),
                esc_attr( $args['id_submit'] ),
                esc_attr( $args['class_submit'] ),
                esc_attr( $args['label_submit'] )
            );

            /**
             * Filters the submit button for the comment form to display.
             *
             * @since 4.2.0
             *
             * @param string $submit_button HTML markup for the submit button.
             * @param array  $args          Arguments passed to comment_form().
             */
            $submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );

            $submit_field = sprintf(
                $args['submit_field'],
                $submit_button,
                get_comment_id_fields( $post_id )
            );

            /**
             * Filters the submit field for the comment form to display.
             *
             * The submit field includes the submit button, hidden fields for the
             * comment form, and any wrapper markup.
             *
             * @since 4.2.0
             *
             * @param string $submit_field HTML markup for the submit field.
             * @param array  $args         Arguments passed to comment_form().
             */
            echo apply_filters( 'comment_form_submit_field', $submit_field, $args );

            /**
             * Fires at the bottom of the comment form, inside the closing form tag.
             *
             * @since 1.5.0
             *
             * @param int $post_id The post ID.
             */
            do_action( 'comment_form', $post_id );

            echo '</form>';

        endif;
        ?>
    </div><!-- #respond -->
    <?php

    /**
     * Fires after the comment form.
     *
     * @since 3.0.0
     */
    do_action( 'comment_form_after' );
}



add_shortcode( 'bv__wc_reg_form', function() {
    if ( is_admin() ) return;
    if ( is_user_logged_in() ) return;
    ob_start();


    do_action( 'woocommerce_before_customer_login_form' );

    ?>
    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

        <?php do_action( 'woocommerce_register_form_start' ); ?>

        <div class="field">
            <label for="email">Email address</label>
            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" />
        </div>

        <div class="field">

            <label for="password" class="flex">
                <div>Password</div>
            </label>

            <div class="password_input">
                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
            </div>

        </div>

        <?php do_action( 'woocommerce_register_form' ); ?>

        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
        <button type="submit" class="block_cta">
            Register
        </button>


        <?php do_action( 'woocommerce_register_form_end' ); ?>

    </form>

    <?php

    return ob_get_clean();
});

/**
 *
 * WOOCOMMERCE FUNCTION OVERRIDES
 */


/**
 * @param array $args
 */
function woocommerce_login_form( array $args = [] ) : void
{

    $defaults = array(
        'message'  => '',
        'redirect' => '',
        'hidden'   => false,
    );

    $args = wp_parse_args( $args, $defaults );


    wc_get_template( 'checkout/parts/form-login.php', $args );
}

/**
 * bv functions
 */





/**
 * @param string $templateName
 */
function bv__includeTemplate(string $templateName) : void
{
    $dir = dirname(__FILE__) . '/';
    $path = $dir . str_replace('.php','',$templateName) . '.php';

    if(file_exists($path)){
        include_once($path);
        return;
    }

    echo "FILE NOT FOUND: $path";
    return;
}


/**
 * @param string $imageName
 * @param bool $echo
 * @return string|null
 */
function bv__getThemeImageUrl(string $imageName, bool $echo = true) : ?string
{
    $base = get_bloginfo('stylesheet_directory') . '/images/';

    if($echo){
        echo $base . $imageName; return null;
    }


    return $base . $imageName;

}

/**
 * @return string|null
 */
function bv__getCurrentCategorySlug() : ?string
{
    $object = get_queried_object();


    return isset($object->slug) ? $object->slug : null;
}

/**
 * @return string|null
 */
function bv__getCurrentCategoryName() : ?string
{
    $object = get_queried_object();


    return isset($object->name) ? $object->name : null;
}

/**
 * @return string|null
 */
function bv__getCurrentRemedySlug() : ?string
{
    $object = get_queried_object();



    return isset($object->slug) ? $object->slug : null;
}

/**
 * @param string $slug
 * @return bool
 */
function bv__isProductCategory(string $slug) : bool
{

    return is_product_category($slug);
}

/**
 * @return bool
 */
function bv__isOnRemedies() : bool
{
    return is_tax('remedies');
}


/**
 * @param string $slug
 * @return bool
 */
function bv__isRemedy(string $slug) : bool
{
    return is_tax('remedies',$slug);
}

/**
 * @return int
 */
function bv__countCart() : int
{
    return WC()->cart->get_cart_contents_count();
}

/**
 * @param string|null $slug
 * @param int $number
 * @return array|null
 */
function bv__getProductsForCategory(?string $slug, int $number = 12) : ?array
{



    // if slug is null get all
    $query = [
        'post_type'=>'product',
        'numberposts'=>$number,
        'posts_per_page'=>$number
    ];

    if($slug !== null){

        $tax_query = [
            [
            'taxonomy'=>'product_cat',
            'terms'=>$slug,
            'field'=>'slug'
                ]
        ];



        $query['tax_query'] = $tax_query;
    }


    $products = get_posts($query);



    return $products && !empty($products) ? $products : null;
}

/**
 * @param int $number
 * @return array|null
 */
function bv__getProductsForCurrentCategory(int $number = 12) : ?array
{


    return bv__getProductsForCategory(bv__getCurrentCategorySlug(),$number);
}

/**
 * @param string|null $slug
 * @param int $number
 * @param bool $bestSellers
 * @return array|null
 */
function bv__getProductsForRemedy(?string $slug, int $number = 12, bool $bestSellers = false) : ?array
{

    $query = [
        'post_type'=>'product',
        'numberposts'=>$number,
        'posts_per_page'=>$number
    ];

    if($slug !== null){

        $tax_query = [
            [
            'taxonomy'=>'remedies',
            'terms'=>$slug,
            'field'=>'slug'
                ]
        ];

        $query['tax_query'] = $tax_query;
    }


    if($bestSellers){
        $query = array_merge($query,[
            'meta_key'  	=> 'total_sales',
            'orderby'   	=> 'meta_value_num',
            'order' 		=> 'desc',
        ]);
    }

    $products = get_posts($query);


    return $products && !empty($products) ? $products : null;
}

/**
 * @param int $number
 * @param bool $bestSellers
 * @return array|null
 */
function bv__getProductsForCurrentRemedy(int $number = 12, bool $bestSellers = false) : ?array
{

    return bv__getProductsForRemedy(bv__getCurrentRemedySlug(),$number,$bestSellers);

}


/**
 * @param WC_Product $product
 * @param array $args
 */
function bv__woocommerce_template_loop_add_to_cart( WC_Product $product, array $args = [] ) : void
{

    if ( $product ) {

        $defaults = array(
            'quantity'   => 1,
            'class'      => implode(
                ' ',
                array_filter(
                    array(
                        'button',
                        'product_type_' . $product->get_type(),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                    )
                )
            ),
            'attributes' => array(
                'data-product_id'  => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label'       => $product->add_to_cart_description(),
                'rel'              => 'nofollow',
            ),
        );

        $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

        if ( isset( $args['attributes']['aria-label'] ) ) {
            $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
        }



        wc_get_template( 'loop/add-to-cart.php', ['product'=>$product,'originalArguments'=>$args]);
    }
}

/**
 * @return int
 */
function bv__getShopPageID() : int
{
    return (int)get_option( 'woocommerce_shop_page_id' );
}

/**
 * @param int $number
 * @return array|null
 */
function bv__getBenefitsOfPropolis(int $number = 4) : ?array
{

    $posts = get_posts([
        'post_type'=>'benefits-of-propolis',
        'numberposts'=>$number,
        'orderby'=>'menu_order',
        'order'=>'ASC'
    ]);

    return $posts && !empty($posts) ? $posts : null;
}


/**
 * @param string $key
 * @return string|null
 */
function bv__getExtraProductData(int $productId, string $key) : ?string
{

    $key = 'bevital__' . str_replace('bevital__','',$key);

    $info = get_post_meta($productId,$key,true);

    return $info && !empty($info) ? (string)$info : null;
}

/**
 * @param WC_Product $product
 * @return array|null
 */
function bv__getRemediesForProduct(WC_Product $product) : ?array
{

    $remedies = wp_get_post_terms($product->get_id(),'remedies');

    return $remedies && !empty($remedies) ? $remedies : null;

}

/**
 * @param WP_Term $remedy
 * @return string
 */
function bv__getRemedyIconUrl(WP_Term $remedy) : string
{

    // replace  - with _ in slug
    $slug = str_replace('-','_',$remedy->slug);


    return get_bloginfo('stylesheet_directory') . '/images/global/misc/remedy_icons/'.$slug.'.png';

}

/**
 * @param int $productId
 * @return bool
 */
function bv__isProductVariableById(int $productId) : bool
{


    // if it has attributes then it's variable??
    $atts = get_post_meta($productId,'_product_attributes',true);

    return $atts && !empty($atts);

}

/**
 * @param int $variationId
 * @return string
 */
function bv__getVariationNameById(int $variationId) : string
{
    $variation = wc_get_product($variationId);

    // replace the #number
    return $variation->get_formatted_name();
}

/**
 * @param int $number
 * @return array|null
 */
function bv__getPopularProducts(int $number = 3) : ?array
{
    $products = get_posts([
        'post_type' 	=> 'product',
        'meta_key'  	=> 'total_sales',
        'orderby'   	=> 'meta_value_num',
        'order' 		=> 'desc',
        'numberposts'=>$number
    ]);


    return $products && !empty($products) ? $products : null;
}

/**
 * @return array|null
 */
function bv__getSearchProductResults() : ?array
{
    global $wp_query;

    $posts = [];

    if($wp_query->have_posts()){

        while($wp_query->have_posts()){

            $wp_query->the_post();

            if(get_post_type() == 'product'){

                if(bv__isProductVariableById(get_the_ID())){
                    $posts[] = new WC_Product_Variable(get_the_ID());
                }else {
                    $posts[] = new WC_Product(get_the_ID());
                }
            }
        }

        wp_reset_postdata();
    }

    return $posts && !empty($posts) ? $posts : null;
}

/**
 * @return array|null
 */
function bv__getSearchPageResults() : ?array
{
    global $wp_query;

    $posts = [];

    if($wp_query->have_posts()){

        while($wp_query->have_posts()){

            $wp_query->the_post();

            if(get_post_type() == 'page'){
                $posts[] = get_post();
            }
        }

        wp_reset_postdata();
    }

    return $posts && !empty($posts) ? $posts : null;
}

/**
 * @return array|null
 */
function bv__getSearchPostResults() : ?array
{
    global $wp_query;

    $posts = [];

    if($wp_query->have_posts()){

        while($wp_query->have_posts()){

            $wp_query->the_post();

            if(get_post_type() == 'post'){
                $posts[] = get_post();
            }
        }

        wp_reset_postdata();
    }

    return $posts && !empty($posts) ? $posts : null;
}

/**
 * @param int $number
 * @param bool $useCurrentTax
 * @return array|null
 */
function bv__getLatestBlogPosts(int $number = 10, bool $useCurrentTax = false) : ?array
{

    $args = [
        'post_type'=>'post',
        'orderby'=>'date',
        'order'=>'DESC',
        'numberposts'=>$number
    ];

    if($useCurrentTax){

        $categorySlug = bv__getCurrentCategorySlug();



        $args['tax_query'] = [
            [
                'taxonomy'=>'category',
                'field'=>'slug',
                'terms'=>$categorySlug
            ]
        ];
    }


    $posts = get_posts($args);

    return $posts && !empty($posts) ? $posts : null;
}

/**
 * @param int $postId
 */
function bv__outputPostCategoryList(int $postId) : void
{

    if($categories = wp_get_post_categories($postId)){

        ?>
        <ul id="categories-list">
            <?php foreach($categories as $category) : $cat = get_category($category); ?>
                <li class="cat-item cat-item-<?php echo $cat->term_id; ?>"><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php

    }

}


/**
 * Override the shipping html so we can use it with custom htl on form-shipping.php
 */
function bv__wc_cart_totals_shipping_html() : void
{
    $packages = WC()->shipping()->get_packages();
    $first    = true;



    foreach ( $packages as $i => $package ) {
        $chosen_method = isset( WC()->session->chosen_shipping_methods[ $i ] ) ? WC()->session->chosen_shipping_methods[ $i ] : '';
        $product_names = array();

        if ( count( $packages ) > 1 ) {
            foreach ( $package['contents'] as $item_id => $values ) {
                $product_names[ $item_id ] = $values['data']->get_name() . ' &times;' . $values['quantity'];
            }
            $product_names = apply_filters( 'woocommerce_shipping_package_details_array', $product_names, $package );
        }

        wc_get_template(
            'checkout/parts/checkout-shipping.php',
            array(
                'package'                  => $package,
                'available_methods'        => $package['rates'],
                'show_package_details'     => count( $packages ) > 1,
                'show_shipping_calculator' => is_cart() && apply_filters( 'woocommerce_shipping_show_shipping_calculator', $first, $i, $package ),
                'package_details'          => implode( ', ', $product_names ),
                /* translators: %d: shipping package number */
                'package_name'             => apply_filters( 'woocommerce_shipping_package_name', ( ( $i + 1 ) > 1 ) ? sprintf( _x( 'Shipping %d', 'shipping packages', 'woocommerce' ), ( $i + 1 ) ) : _x( 'Shipping', 'shipping packages', 'woocommerce' ), $i, $package ),
                'index'                    => $i,
                'chosen_method'            => $chosen_method,
                'formatted_destination'    => WC()->countries->get_formatted_address( $package['destination'], ', ' ),
                'has_calculated_shipping'  => WC()->customer->has_calculated_shipping(),
            )
        );

        $first = false;
    }
}

add_action('wp_enqueue_scripts', 'disable_woocommerce_loading_css_js', 99 );

function disable_woocommerce_loading_css_js() {
        if(! is_cart() && ! is_checkout() ) {
                wp_dequeue_style('wc-gateway-ppec-frontend');
                wp_deregister_script('paypal-checkout-sdk');
        }
}

/**
 * Add upload button to WP dashboard
 * @return null
 */
function ha_dashboard_widgets() {
	global $wp_meta_boxes;

	wp_add_dashboard_widget('ha_upload_widget', 'Herbal Apothecary Stock Upload', 'ha_upload_widget');
}

function ha_upload_widget() {
	// Generate a custom nonce value.
	if( current_user_can( 'edit_users' ) ) {
		$ha_upload_nonce = wp_create_nonce( 'ha_upload_stock_form_nonce' );
	?>
<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="ha_upload_stock_form" enctype="multipart/form-data">
	<input type="file" name="ha_upload_stock_file" id="ha_upload_stock_file" />
	<input type="hidden" name="action" value="ha_upload_stock">
	<input type="hidden" name="ha_upload_stock_form_nonce" value="<?php echo $ha_upload_nonce; ?>" />
	<script>
		jQuery('#ha_upload_stock_file').on('change', function() {
			jQuery('#ha_upload_stock_form').submit();
		});
	</script>
</form>
	<?php
	} else {
	 echo __("You are not authorized to perform this operation.", $this->plugin_name);
	}
}
add_action('wp_dashboard_setup', 'ha_dashboard_widgets');

function ha_upload_handler() {
		if( isset( $_POST['ha_upload_stock_form_nonce'] ) &&
				wp_verify_nonce( $_POST['ha_upload_stock_form_nonce'], 'ha_upload_stock_form_nonce') ) {
			// Check we've got the right file type
			if ($_FILES['ha_upload_stock_file']['type'] != 'text/csv' &&
					$_FILES['ha_upload_stock_file']['type'] != 'application/vnd.ms-excel')
				wp_die( 'File must be in CSV format, the MIME type for this file is ' . $_FILES['ha_upload_stock_file']['type'], __( 'Error' ), array(
					'response' 	=> 403
				) );

			// Move to the wp-content dir
			if (move_uploaded_file($_FILES['ha_upload_stock_file']["tmp_name"], WP_CONTENT_DIR . '/ha_stock_upload.csv')) {
				echo "File has been uploaded and will be processed shortly. <br /><a href=\"/wp-admin\">Click here to go back</a>";
			} else {
				echo "There was an error uploading the file. Please check the logs for more details.";
			}
		} else {
			echo "Unable to upload.";
			wp_die( __( 'Invalid nonce specified'), __( 'Error' ), array(
				'response' 	=> 403
			) );
		}
}
add_action( 'admin_post_ha_upload_stock', 'ha_upload_handler');

function bv_tag_query($query) {
    if ($query->is_tag()) {
        $query->set("posts_per_page", 5);
    }
    // echo "<pre>" . print_r($query, true) . "</pre>";
} 

add_action("pre_get_posts", "bv_tag_query", 20);