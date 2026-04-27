<?php get_header(); ?>

<div class="content-area single-post-content">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="single-post">
                <header class="post-header">
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-author">by <?php the_author(); ?></span>
                    </div>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                </header>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <footer class="post-footer">
                    <div class="post-categories">
                        Categories: <?php the_category(', '); ?>
                    </div>
                    <div class="post-tags">
                        <?php the_tags('Tags: ', ', ', ''); ?>
                    </div>
                </footer>
            </article>

            <!-- Comments Section -->
            <div class="comments-section">
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
