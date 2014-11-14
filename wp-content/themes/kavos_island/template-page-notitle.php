<?php
/*
Template Name: No title
*/

include_once("header2.php");

//get_header();
?>

<div id='my-page'>
	<?php if (have_posts()) : the_post(); ?>
		<?php

        the_content();

        ?>
	<?php endif; ?>
</div>
<?php  get_footer(); ?>