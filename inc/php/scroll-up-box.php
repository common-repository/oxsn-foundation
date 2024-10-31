<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


?>

<div class="oxsn_scroll_up_box">

	<?php
		if (get_option('oxsn_scroll_up_box_icon_control') != '') {
			$scroll_up_box_icon = get_option( 'oxsn_scroll_up_box_icon_control' );
		} else {
			$scroll_up_box_icon = '⇡';
		}
		echo $scroll_up_box_icon;
	?>

</div>