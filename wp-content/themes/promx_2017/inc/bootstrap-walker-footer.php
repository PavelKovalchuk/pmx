<?php
// Custom Walker Class for Bootstrap Menu Footer
add_action( 'after_setup_theme', 'bootstrap_setup_footer' );

if ( ! function_exists( 'bootstrap_setup_footer' ) ):

  function bootstrap_setup_footer(){

    class Bootstrap_Walker_Footer_Menu extends Walker_Nav_Menu {


      function start_lvl( &$output, $depth = 0, $args = array() ) {

        $indent = str_repeat( "\t", $depth );
        $output    .= "\n$indent<ul class=\"" . " footer-menu-level-" . $depth . "\">\n";

      }

      function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'sub-menu' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'nav-item';


        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'" ' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'" ' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'" ' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'" ' : '';
        $attributes .= ($args->walker->has_children)      ? ' class="nav-link"' : 'class="nav-link"';

        $item_output = $args->before;

        if(!empty( $item->url )){
        	$html_tag = 'a';
        }else{
	        $html_tag = 'span';
        }

        $item_output .= ($depth > 0) ? '<' . $html_tag . ' class=""' . $attributes . '> ' : '<' . $html_tag . $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</' . $html_tag . '>';

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
      }

    }

  }

endif;