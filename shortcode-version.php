<?php //<~ don't add me in - code below goes into functions.php

add_shortcode( 'wpb_accordion_acf', 'wpb_accordion_acf' );
/**
* Accordion Repeater Field 
*/
function wpb_accordion_acf() {
ob_start();

// *Repeater
// accordion_repeater
// *Sub-Fields
// accordion_header
// accordion_content

?>

<style>

/* Style the buttons that are used to open and close the accordion panel */
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
  margin-bottom: 10px;
  border: none;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover,
button:focus {
  background-color: #ccc;
  background: #ccc;
  border: none;
}

/* Style the accordion panel. Note: hidden by default */
.panel {
  padding: 0 18px;
  background-color: white;
  display: none;
  overflow: hidden;

}

.accordion:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: #777;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}
	
</style>

<?php

// check if the repeater field has rows of data
if( have_rows('accordion_repeater') ):
	
 	
 	// loop through the rows of data for the tab header
    while ( have_rows('accordion_repeater') ) : the_row();
		
		$header = get_sub_field('accordion_header');
		$content = get_sub_field('accordion_content');

	?>
	
		<button class="accordion"><?php echo $header; ?></button>
		<div class="panel">
		  <p><?php echo $content; ?></p>
		</div>    
		<?php
	endwhile; //End the loop 

else :

    // no rows found
    echo 'Come back tomorrow';

endif;
  
return ob_get_clean();
}
