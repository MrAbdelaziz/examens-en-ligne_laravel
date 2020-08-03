jQuery(document).ready(function() {
    /* Form */
    $('.exam-add-form fieldset:first-child').fadeIn('slow');
    $('.exam-add-form input[type="text"], .exam-add-form input[type="password"], .exam-add-form input[type="number"], .exam-add-form textarea, .exam-add-form select').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    // next step
    $('.exam-add-form .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	parent_fieldset.find('input[type="text"], input[type="number"], input[type="password"], textarea, select').each(function() {
    		if( $(this).val() == "" ) {
    			$(this).addClass('input-error');
    			next_step = false;
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
	    		$(this).next().fadeIn();
	    	});
    	}
    });
    // previous step
    $('.exam-add-form .btn-previous').on('click', function() {
    	$(this).parents('fieldset').fadeOut(400, function() {
    		$(this).prev().fadeIn();
    	});
    });
    // submit
    $('.exam-add-form').on('submit', function(e) {
    	$(this).find('input[type="text"], input[type="number"], input[type="password"], textarea, select').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    });
});
