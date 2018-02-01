<?php
// Custom Walker Class for Bootstrap Menu
add_action( 'after_setup_theme', 'bootstrap_setup' );

if ( ! function_exists( 'bootstrap_setup' ) ):

  function bootstrap_setup(){

    class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

    	public $menu_data = [];

    	public $pages_id = [];

      function start_lvl( &$output, $depth = 0, $args = array() ) {

	    $indent = str_repeat( "\t", $depth );
        $output    .= "\n$indent<ul class=\"dropdown-menu" . " animated flipInY dropdown-menu-level-" . $depth . "\">\n";

      }

      function get_image_url($post_id){
	      $image_url = kdmfi_get_featured_image_src( 'top-menu-image', 'full', $post_id );

	      if(!$image_url){
	      	return false;
	      }

	      return $image_url;
      }

	   function get_menu_excerpt($post_id){
		   $excerpt = get_the_excerpt( $post_id );

		    if(!$excerpt){
			    return false;
		    }

		    return $excerpt;
	   }



      function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

	     $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown dropdown-submenu' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'nav-item';


        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

	      //For ajax menu
	    $data_page_id = strlen( $item->object_id ) ? ' data-page-id="' . esc_attr( $item->ID ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $data_page_id . $li_attributes . '>';



        /*$menu_image_url = $this->get_image_url($item->object_id);

        if($menu_image_url){
	        $output .= '<img class="menu-image" src="' . $menu_image_url . '" alt="' . $item->attr_title . '">';
        }

	    $menu_text = $this->get_menu_excerpt($item->object_id);

        if($menu_text){
	        $output .= '<p class="menu-text">' . $menu_text . '</p>';
        }*/



        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'" ' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'" ' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'" ' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'" ' : '';
        $attributes .= ($args->walker->has_children)      ? ' class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : 'class="nav-link"';


        $item_output = $args->before;

        if(!empty( $item->url )){
        	$html_tag = 'a';
        }else{
	        $html_tag = 'span';
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output .= ($depth > 0) ? '<' . $html_tag . ' class="dropdown-item"' . $attributes . '> ' : '<' . $html_tag . $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</' . $html_tag . '>';

        $item_output .= $args->after;

	      if($depth == 1){
		      //var_dump($item);
		      $this->menu_data[$item->menu_item_parent][$item->object_id] = array(
			      'page_id' => intval($item->object_id),
			      'page_link' => esc_attr( $item->url),
			      'page_classes' => $classes,
			      'page_attr' => $attributes,
			      'page_html' => $html_tag,
			      'page_menu_id' => $id,
			      'page_title' => $title,
			      'menu_order' => $item->menu_order,
			      'current_item_parent' => $item->current_item_parent,
			      'current' => $item->current
		      );

		      $this->pages_id[] = intval($item->object_id);

		      return;
	      }

	      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
      }

    }

  }

endif;