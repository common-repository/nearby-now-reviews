jQuery( window ).load(function() {
	var $elem = jQuery(".auto-scroll .nn-review-item"), l = $elem.length, i = 0; 
	function go() { 
		$elem.eq(i % l).fadeIn(4000, function() { 
			$elem.eq(i % l).fadeOut(4000, go); i++; 
		}) 
	} 
	go();
});