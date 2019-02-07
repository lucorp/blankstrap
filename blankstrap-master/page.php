<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="container">
        <div class="row" id="post-<?php the_ID(); ?>">
            <div class="col-md-12 col-sm-12 col-xs-12 col-xl-12 col-lg-12">
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>
                <section>
                    <?php the_content(); ?>
                </section>
            </div>
        </div>
    </div>

<?php endwhile; else: ?>

    <div class="section">
        <?php get_template_part('lib/inc/not-found'); ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>