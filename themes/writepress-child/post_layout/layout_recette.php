<?php 	
include get_template_directory().'/framework/variables/variables-post-layout.php';
// post_title_position
$post_title_position = 'below';
?>
<div class="post_layout_style2 post_layout_recette post_layout_fullwidth_thumb">

	 <?php	if ( has_post_thumbnail() ) { ?>
		<?php the_post_thumbnail('fullwidthBanner'); ?>
	 <?php } ?>
	<?php //Post Thumbnail End ?>
<div class="container-main <?php writepress_sidebar_and_class('show','hide','post');?>"> 
<div class="container-padding">           
<div class="zolo-container">
<div class="single_post_content_wrapper">
    <div class="inner-content">
    <div class="post_layout_content_area">
    <div class="post_layout_content <?php if (!has_post_thumbnail()){?>post_list_thumb--empty<?}?>">
            
      <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
          <?php /* The loop */ ?>
          <?php while ( have_posts() ) : the_post();
            ?>
                    
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
            <div class="blogpage_content">


                
				<div class="post_title_area center title_position_below">
               		<?php printf(	'<h2 class="entry-title">%s</h2>', get_the_title() ); 
					
					
		// Post Meta
		if($post_meta == true){
			echo '<ul class="entry_meta_list">';	
			$format_prefix = '%2$s';
			$date = sprintf( '<li><span class="date"><span class="meta_label"></span><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></span></li>',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', 'writepress' ), the_title_attribute( 'echo=0' ) ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
			);
			echo $date;	
			
			if($post_category_position == 'below'){
					$categories_list = get_the_category_list( __( ' / ', 'writepress' ) );
				if ( $categories_list ) {
					echo '<li class="categories-links">';
					echo $categories_list;
					echo '</li>';
				}
			}
			
			printf( '<li><span class="author-list"><span class="meta_label">'.__('By','writepress').' </span><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></li>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'writepress' ), get_the_author() ) ),
			get_the_author()
			); 
			
			if ( comments_open() && ! is_single() ) : 
				echo '<li><span class="comments-link">';
				comments_popup_link( '0 comments ', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); 
				echo '</span></li>';
			endif; 
			echo '</ul>';
		}
					
					
					
					?>
               			
					
               	</div>
                <div class="blog_text_area">
                    <div class="post-content">
<?php 
$note = get_post_meta($post->ID, 'note', false);
if( count( $note ) != 0 ) { ?>
<div class="note">
	<p><?php echo get_post_meta($post->ID, 'note', true) ?></p>
</div>
<?php 
} else { 
// do nothing; 
}?>	<?php 
$ingredient = get_post_meta($post->ID, 'ingredients', false);
if( count( $ingredient ) != 0 ) { ?>
<div class="ingredients">
	<p>Ingredients:</p>
	<ul>
	<?php foreach($ingredient as $ingredient) {
            echo '<li>'.$ingredient.'</li>';
            }
            ?>
	</ul>
</div>
<?php 
} else { 
// do nothing; 
}?>
<?php 
$preparation = get_post_meta($post->ID, 'préparation', false);
if( count( $preparation ) == 1 ) { ?>
<div class="preparation">
	<p>Préparation:</p>
	<p><?php echo get_post_meta($post->ID, 'préparation', true) ?></p>
</div>

<?php } else if( count( $preparation ) != 0 ) { ?>
<div class="preparation">
	<p>Préparation:</p>
	<ol>
	<?php foreach($preparation as $preparation) {
            echo '<li>'.$preparation.'</li>';
            }
            ?>
	</ol>
</div>
<?php 
} else { 
// do nothing; 
}?>
                        <div class="entry-content">
                       	<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'writepress' ) ); ?>
                       		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'writepress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                        </div>


<?php writepress_tags();?>
                    <!-- .entry-content -->
                    <!-- .entry-meta --> 
                    </div>
                </div>
            
			<?php //Share Box Start ?>
           <?php if( ( $social_sharing_box == 'on' && $show_hide_sharing != 'no' ) ||  ( $social_sharing_box == 'off' && $show_hide_sharing == 'yes' ) ): ?>
            <div class="share-box">
            <h4><?php echo ($sharing_social_tagline)? $sharing_social_tagline : '';?></h4>
            <?php writepress_social_sharing(); ?>
          </div>
            <?php endif; ?>
          <?php //Share Box End ?>
          
          
          <?php
            //Author Area Start
            writepress_author_info();
            //Author Area End  
            ?>
          
          <?php  //Related Post Start ?>
		<?php if( ( $related_posts == 'on' && $show_hide_related_posts != 'no' ) ||  ( $related_posts == 'off' && $show_hide_related_posts == 'yes' ) ): ?>
        <?php $related_post = writepress_get_related_posts($post->ID);  ?>
        
        <?php if($related_post->have_posts()){ ?>
          <div class="related_post_area">
          	<h3><?php echo __('Related Posts', 'writepress'); ?></h3>
            <ul class="related_post_list">
              <?php while($related_post->have_posts()): $related_post->the_post(); ?>
              <li class="fitrow_col">
                <div class="entry-thumbnail"> 
                <?php 
                    //zolo_zilla_likes
                    if( function_exists('zolo_zilla_likes') ){ 
                   		echo '<span class="zolo_zilla_likes_box"> ';
                    		zolo_zilla_likes();
                    	echo '</span>';
                    }
                    ?>
                    
                	<a href="<?php the_permalink(); ?>">
                	<?php  if ( has_post_thumbnail() ) { the_post_thumbnail( 'writepress_thumb_blog_medium' ); } ?>
                	</a> 
                </div>
                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>   
              </li>
              <?php endwhile;?>
            </ul>
          </div>
          <?php } ?>
          
            <?php endif; ?>
            <?php  //Related Post End ?>
          
          <?php //Comments Area Start ?>
          
          <?php if( ( $blog_comments == 'on' && $show_hide_post_comments != 'no' ) || ( $blog_comments == 'off' && $show_hide_post_comments == 'yes' ) ): ?>
				  <?php
				  	wp_reset_postdata();
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }	
          		 ?>
			<?php endif; ?>
          <?php //Comments Area End ?>
          <?php endwhile; ?>
        </div>
        <!-- #content --> 
        </article>
        </div>
      </div>
      <!-- #primary -->      
		 <?php writepress_sidebar_and_class('hide','show','post');?>
       </div>
       </div>
    </div>
    </div>
  </div>
 </div>
</div>

<?php // Previous/next post navigation Start 
if($post_navigation_style == 'style1'){
	echo '<div class="zolo-container">';
}
if( ( $blog_pn_nav == 'on' && $show_hide_post_pagination != 'no' ) ||  ( $blog_pn_nav == 'off'  && $show_hide_post_pagination == 'yes' ) ):
writepress_single_page_nav();
endif;
if($post_navigation_style == 'style1'){
echo '</div>';
} 
// Previous/next post navigation End ?>	

</div>