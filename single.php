<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="section">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                </header>
                <section>
                    <?php if (has_post_thumbnail()) the_post_thumbnail(); ?>
                    <?php the_content(); ?>

                </section>
            </article>

            <nav class="page-nav">
                <p><?php previous_post_link(); ?> &bull; <?php next_post_link(); ?></p>
            </nav>

            <?php comments_template(); ?>

        </div>

    <?php endwhile; else: ?>

        <div class="section">
            <?php get_template_part('lib/inc/not-found'); ?>
        </div>

    <?php endif; ?>

<?php get_footer(); ?>