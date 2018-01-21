<?php
/*******************************************************************
 * @Author: Boutros AbiChedid
 * @Date:   March 20, 2011
 * @Websites: http://bacsoftwareconsulting.com/
 * http://blueoliveonline.com/
 * @Description: Numbered Page Navigation (Pagination) Code.
 * @Tested: Up to WordPress version 3.1.2 (also works on WP 3.3.1)
 ********************************************************************/
/* Function that Rounds To The Nearest Value.
   Needed for the pagenavi() function */
function round_num($num, $to_nearest) {
	/*Round fractions down (http://php.net/manual/en/function.floor.php)*/
	return floor($num/$to_nearest)*$to_nearest;
}
/* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
   Function is largely based on Version 2.4 of the WP-PageNavi plugin */
function promx_pagenavi($query_object, $before = '', $after = '') {

	//global $wpdb, $wp_query;

	$pagenavi_options = array();
	//$pagenavi_options['pages_text'] = ('Page %CURRENT_PAGE% of %TOTAL_PAGES%:');
	$pagenavi_options['pages_text'] = ('');
	$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['first_text'] = ('');
	$pagenavi_options['last_text'] = ('');
	$pagenavi_options['next_text'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
	$pagenavi_options['prev_text'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
	$pagenavi_options['dotright_text'] = '<span class="periods">...</span>';
	$pagenavi_options['dotleft_text'] = '<span class="periods">...</span>';
	$pagenavi_options['num_pages'] = 3; //continuous block of page numbers
	$pagenavi_options['always_show'] = 0;
	$pagenavi_options['num_larger_page_numbers'] = 0;
	$pagenavi_options['larger_page_numbers_multiple'] = 5;
	$pagenavi_options['item_classes'] = ' ';
	//If NOT a single Post is being displayed
	/*http://codex.wordpress.org/Function_Reference/is_single)*/
	if (!is_single()) {
		$request = $query_object->request;
		//intval — Get the integer value of a variable
		/*http://php.net/manual/en/function.intval.php*/
		$posts_per_page = intval(get_query_var('posts_per_page'));
		//Retrieve variable in the WP_Query class.
		/*http://codex.wordpress.org/Function_Reference/get_query_var*/
		$paged = intval(get_query_var('paged'));
		$numposts = $query_object->found_posts;
		$max_page = $query_object->max_num_pages;
		//empty — Determine whether a variable is empty
		/*http://php.net/manual/en/function.empty.php*/
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pagenavi_options['num_pages']);
		$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
		$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
		$pages_to_show_minus_1 = $pages_to_show - 1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		//ceil — Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		$larger_per_page = $larger_page_to_show*$larger_page_multiple;
		//round_num() custom function - Rounds To The Nearest Value.
		$larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
		$larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
		$larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
		$larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
		if($larger_start_page_end - $larger_page_multiple == $start_page) {
			$larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
			$larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
		}
		if($larger_start_page_start <= 0) {
			$larger_start_page_start = $larger_page_multiple;
		}
		if($larger_start_page_end > $max_page) {
			$larger_start_page_end = $max_page;
		}
		if($larger_end_page_end > $max_page) {
			$larger_end_page_end = $max_page;
		}
		if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
			/*http://php.net/manual/en/function.str-replace.php */
			/*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
			$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			echo $before.' <ul class="pagination mt-0">'."\n";
			if(!empty($pages_text)) {
				echo '<li class="pages">'.$pages_text.'</li>';
			}
			//Displays a link to the previous post which exists in chronological order from the current post.
			/*http://codex.wordpress.org/Function_Reference/previous_post_link*/

			//PREV PAGE START
			if($start_page > 1){
				echo '<li aria-label="Previous" class="' . $pagenavi_options['item_classes'] . 'page-numbers prev-page" >';
				previous_posts_link($pagenavi_options['prev_text']);
				echo '</li>';
			}
			//PREV PAGE END

			//FIRST PAGE START
			if ($start_page >= 2 && $pages_to_show < $max_page) {
				$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
				//esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
				/*http://codex.wordpress.org/Data_Validation*/
				//get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.



				echo '<li class="' . $pagenavi_options['item_classes'] . 'page-numbers-first-page" >';
				echo '<a href="'.esc_url(get_pagenum_link()).'" class="pagin-link" title="'.$first_page_text.'">'
				     .'1'
				     . '</a>';
				echo '</li>';

				if(!empty($pagenavi_options['dotleft_text'])) {
					//DOTS PAGE START
					//echo '<li class="' . $pagenavi_options['item_classes'] . ' page-numbers-dots" >';
					echo '<li class="expand">'.$pagenavi_options['dotleft_text'].'</li>';
					//echo '</li>';
					//DOTS PAGE END
				}

			}
			//FIRST PAGE END



			if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
				for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
					$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
					echo '<li class="' . $pagenavi_options['item_classes'] . '" >';
					echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="pagin-link" title="'.$page_text.'">'.$page_text.'</a>';
					echo '</li>';
				}
			}
			for($i = $start_page; $i  <= $end_page; $i++) {
				if($i == $paged) {
					$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
					//CURRENT PAGE START
					echo '<li class="' . $pagenavi_options['item_classes'] . ' page-numbers-current active" >';
					echo '<span  class="current">'.$current_page_text.'<span class="sr-only">(current)</span></span>';
					echo '</li>';
					//CURRENT PAGE END
				} else {
					$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
					//SIMPLE PAGE START
					echo '<li class="' . $pagenavi_options['item_classes'] . ' page-numbers-simple" title="'.$page_text.'" >';
					echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="pagin-link" >'.$page_text.'</a>';
					echo '</li>';
					//SIMPLE PAGE END
				}
			}

			if ($end_page < $max_page) {

				if(!empty($pagenavi_options['dotright_text'])) {
					//DOTS PAGE START
					//echo '<li class="' . $pagenavi_options['item_classes'] . ' page-numbers-dots" >';
					echo '<li class="expand">'.$pagenavi_options['dotright_text'].'</li>';
					//echo '</li>';
					//DOTS PAGE END
				}

				$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
				//LAST PAGE START
				echo '<li class="' . $pagenavi_options['item_classes'] . ' page-numbers-last-page" >';
				echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="pagin-link" title="'.$last_page_text.'">'
				     . $max_page
				     .'</a>';
				echo '</li>';
				//LAST PAGE END


			}

			//NEXT PAGE START
			echo '<li aria-label="Next" class="' . $pagenavi_options['item_classes'] . ' next-page" >';
			next_posts_link($pagenavi_options['next_text'], $max_page);
			echo '</li>';
			//NEXT PAGE END


			if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
				for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
					$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
					echo '<a href="'.esc_url(get_pagenum_link($i)).'" class=" pagin-link" title="'.$page_text.'"  >'.$page_text.'</a>';
				}
			}
			echo '</ul>'.$after."\n";
		}
	}
}