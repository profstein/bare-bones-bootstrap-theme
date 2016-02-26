<?php get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                
                
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                    <div class="col-sm-4">
                        <p>
                           <!-- check if the post has a Post Thumbnail assigned to it. -->
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                  <?php  the_post_thumbnail( 'post-medium', array( 'class' => 'img-responsive' ) );?>
                                </a>
                            <?php endif; ?>
                           
                        </p>
                        <!-- show the title as h3 element-->
                        <?php the_title('<h3>','</h3>'); ?> 
                    </div>
                </div>

            <?php endwhile; ?>	
<!--
            <?php //simple_boostrap_page_navi(); ?>	
-->
            <?php else : ?>

                <div class="col-sm-8 col-sm-push-2 col-md-4 col-md-push-4">
                    <p><?php _e("No posts found.", "simple-bootstrap"); ?></p>
                </div>

            <?php endif; ?>
            </div>
        <!-- end row-->   
           
        


        
    </div>
    <!-- end container-->






<?php get_footer(); ?>