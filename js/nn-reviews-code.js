jQuery( window ).load(function() {
	jQuery('blockquote').next().css("clear","none");
	jQuery('<div style="clear:both;"></div>').insertAfter('.nn-review-detail-container');
		
	jQuery('.nn-review-item').each(function(){
		if(jQuery(this).find('blockquote').length == 0){
			jQuery(this).remove();
		}
	});
});	