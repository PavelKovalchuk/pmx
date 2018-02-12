<?php

add_action('admin_menu', function(){
	add_menu_page( 'proMX Icons', 'proMX Icons', 'manage_options', 'promx-icons-options', 'add_promx_icons_to_admin_panel', '', 108 );
} );

function add_promx_icons_to_admin_panel(){

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	$icons = [
		'fa-bar-chart',
		'fa-area-chart',
		'fa-line-chart' ,
		'fa-pie-chart',
		'fa-windows',
		'fa-mobile',
		'fa-cube',
		'fa-database',
		'fa-envelope',
		'fa-eye',
		'fa-desktop',
		'fa-tablet',
		'fa-cogs',
		'fa-television',
		'fa-plug',
		'fa-puzzle-piece',
		'fa-cubes',
		'fa-user-circle-o',
		'fa-users',
		'fa-user',
		'fa-user-secret',
		'fa-wrench',
		'fa-tags',
		'fa-sitemap',
		'fa-shopping-basket',
		'fa-code',

		'fa-envelope-square',
		'fa-envelope-open',
		'fa-window-maximize',
		'fa-briefcase',
		'fa-paperclip',
		'fa-map-marker',
		'fa-flag',

	];
	?>
	<div class="wrap">
		<h2><?php echo get_admin_page_title() ?></h2>

		<table width="100%" border="1">
			<caption>Font Awesome icons</caption>
			<tr>
				<th>View</th>
				<th>Value</th>
				<th>View</th>
				<th>Value</th>
				<th>View</th>
				<th>Value</th>

			</tr>

			<?php

			$i = 0;
			foreach ($icons as $icon)
			{
				if( $i == 0 || $i % 6 == 0){
					echo "<tr>";
				}

				echo "<td style='text-align: center'><i class='fa " . $icon . "' aria-hidden='true'></i></td>";
				echo "<td style='text-align: center'>" . $icon . "</td>";

				if($i % 6 == 2){
					echo "</tr>";
				}

				$i++;
			}
		?>

		</table>
		</body>
	</div>
	<?php

}