<?php get_header(); ?>

<div class="content-area blog-page-content">
    <header class="page-header text-center">
        <h2 class="page-title">Latest Guides & Updates</h2>
        <p class="page-subtitle">Insights, tutorials, and news on moving to Germany.</p>
    </header>
    
    <?php if ( have_posts() ) : ?>
        <div class="posts-grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="post-card">
                    <div class="post-card-content">
                        <header class="post-header">
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                            </div>
                            <?php the_title( '<h3 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
                        </header>
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <footer class="post-footer">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more-link">Read Conversation &rarr;</a>
                        </footer>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <div class="no-posts-found text-center">
            <p>No guides found right now. Check back later!</p>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
