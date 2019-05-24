<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $writepress_data;
$cur_id = writepress_current_page_id();
 
$page_sidebar_position = get_post_meta( $cur_id , 'zt_sidebar_position', true );
$blog_sidebar_position = isset($writepress_data["blogposts_sidebar_position"]) ? $writepress_data["blogposts_sidebar_position"] : 'left';
$blog_layout = isset($writepress_data["blog_layout"]) ? $writepress_data["blog_layout"] : 'masonry';
$blog_grid_columns = isset($writepress_data["blog_grid_columns"]) ? $writepress_data["blog_grid_columns"] : '2';

$post_title_position = isset($writepress_data['post_title_position']) ? $writepress_data['post_title_position'] : 'above';
$post_title_alignment = isset($writepress_data['post_title_alignment']) ? $writepress_data['post_title_alignment'] : 'left';
$post_separator_show_hide = isset($writepress_data['post_separator_show_hide']) ? $writepress_data['post_separator_show_hide'] : 'hide';
$blog_post_design = isset($writepress_data['blog_post_design']) ? $writepress_data['blog_post_design'] : 'none';
$post_social_sharing_show_hide = isset($writepress_data["post_social_sharing_show_hide"]) ? $writepress_data["post_social_sharing_show_hide"] : 'show';

// Featured Image
$image_rollover_icons_show_hide = get_post_meta( $cur_id, 'zt_image_rollover_icons_show_hide', true );

$format_quote = has_post_format( 'quote' );
$format_audio = has_post_format( 'audio' ); 

//Inside while loop
$post_video = get_post_meta( $cur_id, 'zt_video', true );

$panel_post_meta = get_post_meta( $cur_id , 'zt_post_meta', true );
$adminpanel_post_meta = isset($writepress_data["post_meta"]) ? $writepress_data["post_meta"] : 'on';


if($page_sidebar_position == 'default' || $page_sidebar_position == 'none' || $page_sidebar_position == ''){
	if($page_sidebar_position != 'none'){
	if($blog_sidebar_position == 'left'){
			$sidebar_position_class = 'hassidebar left';			
		}elseif($blog_sidebar_position == 'right'){
			$sidebar_position_class = 'hassidebar right';			
		}elseif($blog_sidebar_position == 'both'){
			$sidebar_position_class = 'hassidebar double_sidebars';			
		}elseif($blog_sidebar_position == 'none'){	
			$sidebar_position_class = 'hasnosidebar';		
		}
	}
}else{	
		if($page_sidebar_position == 'left'){
			$sidebar_position_class = 'hassidebar left';		
		}elseif($page_sidebar_position == 'right'){
			$sidebar_position_class = 'hassidebar right';		
		}elseif($page_sidebar_position == 'both'){
			$sidebar_position_class = 'hassidebar double_sidebars';
		
		}
	}

		//Blog Layout Class
		//Blog Layout Masonry
		//Blog Thumbnail
		
		if($blog_layout == 'small'){
			$blog_layout_masonry_class = 'blog_layout_small fitrow_row';
			$blog_layout_thumb = 'writepress_thumb_blog_medium';
			
		}elseif($blog_layout == 'medium'){
			$blog_layout_masonry_class = 'blog_layout_medium fitrow_row';
			$blog_layout_thumb = 'writepress_thumb_blog_medium';
			
		}elseif($blog_layout == 'large'){
			$blog_layout_masonry_class = 'blog_layout_large fitrow_row';
			$blog_layout_thumb = 'writepress_thumb_blog_large';
			
		}elseif($blog_layout == 'grid'){
			$blog_layout_masonry_class = 'blog_layout_grid fitrow_row';
			$blog_layout_thumb = 'writepress_thumb_blog_medium';
			
		}elseif($blog_layout == 'masonry'){
			$blog_layout_masonry_class = 'blog_layout_masonry';
			$blog_layout_thumb = 'full';
				
		}
		//Blog Layout Columns Class
   		if($blog_layout == 'grid' || $blog_layout == 'masonry'){
			
			if($blog_grid_columns == '2'){
				$blog_layout_column_class = 'blog_column_2';
				
			}elseif($blog_grid_columns == '3'){
				$blog_layout_column_class = 'blog_column_3';
				
			}elseif($blog_grid_columns == '4'){
				$blog_layout_column_class = 'blog_column_4';
				
			}elseif($blog_grid_columns == '5'){
				$blog_layout_column_class = 'blog_column_5';
				
			}elseif($blog_grid_columns == '6'){
				$blog_layout_column_class = 'blog_column_6';
			}
		
		}else{
				$blog_layout_column_class = '';
			}
 	//Masonry
    if($blog_layout == 'masonry'){
        $masonry_item = 'masonry-item';
    }else{
        $masonry_item = 'fitrow_columns';
        }
	
	// Post Meta
	if($panel_post_meta == 'default' || $panel_post_meta = ''){
	if($adminpanel_post_meta == 'on'){
			$post_meta = true;
	
		}else{$post_meta = false;
		}
			  
	}elseif($panel_post_meta == 'yes' || $panel_post_meta == 'no'){
	 if($panel_post_meta == 'yes'){
			$post_meta = true;
		 }else{
			 $post_meta = false;
			 }
	}else{
			$post_meta = true;
		}
	
	if( writepress_number_of_featured_images() > 0 || $post_video ){
		$posthasno_thumb = 'posthas_thumb';
	}else{
		$posthasno_thumb = 'posthas_no_thumb';
	}
	
		
