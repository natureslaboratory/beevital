<?php get_header(); ?>
<div class="container__outer">

    <!-- PAGE INTRO -->
    <div id="page_intro_wrapper">

        <div id="page_intro" class="container__inner mw_1146">

            <div class="heading large">
                <?php echo ucwords(single_term_title()); ?>
            </div>

            <div class="text">
                <?php echo term_description(); ?>

            </div>

        </div>

        <?php bv__includeTemplate('partials/vertical_icons') ?>


    </div>
    <!-- END OF PAGE INTRO -->

    <!-- TABS NAV -->
    <div class="tabs_nav_wrapper">

        <ul class="tabs_nav container__inner mw_1146" id="products_tabs_nav">

            <li>
                <a href="#" class="active">
                    Products
                </a>
            </li>

            <li>
                <a href="#">
                    Information
                </a>
            </li>

            <li>
                <a href="#">
                    News/Blog
                </a>
            </li>

        </ul>

        <select class="tabs_mobile_nav" id="products_tabs_mobile_nav">
            <option>Products</option>
            <option>Information</option>
            <option>News/Blog</option>

        </select>

    </div>
    <!-- END OF TABS NAV -->
</div>
<?php get_footer(); ?>
