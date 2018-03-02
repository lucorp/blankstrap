<?php get_header(); ?>

    <div class="container">

        <div class="row">

            <div class="col-sm-12 col-xs-12 col-md-12 col-xl-12 col-lg-12">

                <?php if (have_posts()) : ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                        <h1>Výsledky hľadania pre <?php the_search_query(); ?></h1>

                        <?php while (have_posts()) : the_post(); ?>
                            <hr>
                            <h3 class="search-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Stránka <?php the_title(); ?></a></h3>
                            <?php the_excerpt(); ?>

                        <?php endwhile; ?>

                    </article>

                    <nav class="page-nav">
                        <p><?php posts_nav_link(' &bull; '); ?></p>
                    </nav>

                <?php else : ?>

                    <div class="search-error">
                        <h1>Zadaný výraz nenájdený.</h1>
                        <p>Vami zadaný výraz nebol nájdený.</p>
                        <p>Skúste hľadaný výraz preformulovať, alebo nám zavolajte na telefónne číslo <a href="tel:<?php echo get_option('companyphone'); ?>"><?php echo get_option('companyphone'); ?></a>, prípadne nám napíšte na email <a href="mailto:<?php echo get_option('companyemail'); ?>"><?php echo get_option('companyemail'); ?></a></p>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>