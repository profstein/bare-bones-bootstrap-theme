<?php /* Template Name: VAT Major Template */ ?>
    <?php get_header(); ?>

    <div class="container">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- show the title as h3 element-->
                                <?php the_title('<h3>','</h3>'); ?>
                            </div>
                        </div>

                        <div class="main-content">
                    <!-- shows the content added in the dashboard-->
                            <?php the_content() ?>
                        </div>


                    </div>
                    <!--                end post-->
                </div>
                <!-- end container -->

                <?php endwhile; ?>
                   

        <?php endif; ?>
        
        
        <!-- This code creates a custom WP_Query that goes in and gets all of the posts related to the VAT Major. -->
<?php //wrap it all in a check to make sure the taxonomy exists
if( taxonomy_exists('major') ): ?>

     <?php //Custom WP_Query to find other work in the major ?>
        <?php
            $args = array(
                'post_type' => 'post',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'major',
                        'field'    => 'slug',
                        'terms'    => 'vat'
                    )
                )
            );
            $the_query = new WP_Query( $args );
        //                                print_r($the_query);
        ?>

        <?php if ( $the_query->have_posts() ) : ?> 
        <div class="container">
            <div class="row">
               <h3>Work by Students in the Major</h3>
                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-sm-4">  
                        <?php get_template_part('content','thumbnail'); ?>
                    </div>                                  
                <!-- end of the loop -->
                <?php endwhile; ?>
            </div><!-- end row -->
        </div><!-- end container -->
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <!-- No other student posts were found -->
        <?php endif; ?> 




<?php 
//end if taxonomy_exists()
endif; 
?>
        
        

    </div>
    <!-- end container-->




    <?php get_footer(); ?>