<?php get_header(); ?>

    <!-- CHANGE THIS TO class="container-fluid" if you want the content to span whe whole width of the page -->
    <div class="container">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                    <div class="row">

                            <!-- featured image across the top -->
                            <div class="col-sm-12">
                                <p>
                                    <!-- check if the post has a Post Thumbnail assigned to it. -->
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php  the_post_thumbnail( 'post-featured', array( 'class' => 'img-responsive' ) );?>
                                        </a>
                                        <?php endif; ?>

                                </p>
                            </div>
                    </div>
                    <!-- end row -->
                    <div class="next-prev">
                        <div class="col-xs-12">
                            <div class="prev-next">
                                <?php previous_post_link('Previous Work: %link', '%title'); ?> 
                                &nbsp;
                                <?php next_post_link('Next Work: %link', '%title'); ?>
                            </div> <!-- end prev-next -->
                        </div>
                    </div>
                        
                    <!-- This shows the title of the post  -->
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- show the title as h3 element-->
                            <?php the_title('<h3>','</h3>'); ?>
                        </div>
                    </div>

                    <div class="main-content">
                        <!-- main page content You need to add your own bootstrap markup to the page content
                             by entering it in the content field in the dashboard.
                             No div.row or anything is wrapped here so each page can do its own thing. TO change the
                             position of the title or featured image from page to page you would need to modify them
                             in this file or create more than one page template file.
                             Make sure to add at least one <div class="row"> around your content when you add it in the dashboard.
                         -->
                        <?php the_content() ?>
                    </div>
                        
                        
                <div class="work-info">
                    <div class="student">
                       <?php //these next few lines only work if the Taxonomy Images plugin is installed
                            $image = apply_filters( 'taxonomy-images-list-the-terms', '', array(
                                'image_size' => 'thumbnail',
                                'taxonomy'     => 'students',
                            ) );
                            if(! empty($image)):
                        ?>
                            <div class="student-picture">
                                <?php 
                                    echo $image; 
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php //this requires the Media Creators Plugin is installed ?>
                        <p>Student: <?php echo get_the_term_list( $post->ID, 'students'); ?></p>
                        <p>Major: <?php echo get_the_term_list( $post->ID, 'major'); ?> </p>
                        <p>Class: <?php echo get_the_term_list( $post->ID, 'course'); ?> </p>
                    </div>
                </div>
                        
                        <div class="related-work">
                              
<!--                        ------------------------------------------------------------------------- -->                                        <?php get_template_part('related-work-student'); ?>
                            
<!--                        ------------------------------------------------------------------------- -->
                            <?php get_template_part('related-work-major'); ?>
                                                  
<!--                        ------------------------------------------------------------------------- -->
                            <?php get_template_part('related-work-course'); ?>
                                                    
                        <!-- end related work -->    
                        </div>
                        


                    

                <!-- end post -->
                </div>

                <?php endwhile; ?>
        <?php endif; ?>

    </div>
    <!-- end container-->




    <?php get_footer(); ?>