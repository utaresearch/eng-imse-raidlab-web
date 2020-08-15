<script>
		jQuery(document).ready(function() {
			jQuery('ul.sf-menu').superfish({
			delay:       1000,                            // one second delay on mouseout
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
			speed:       'fast',                          // faster animation speed
			autoArrows:  false                            // disable generation of arrow mark-up
			pathClass:   'currentPage',					  // class given to li of current page
			});
		});
		</script>