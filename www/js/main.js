Nette.validators.AppModulesBaseFormsControlsAmountInput_validateAmount = Nette.validators['float'];
Nette.validators.AppModulesBaseFormsControlsAmountInput_validateMinAmount = function (elem, arg, value) {
	return parseFloat(arg['amount']) <= parseFloat(value);
};
Nette.validators.AppModulesBaseFormsControlsAmountInput_validateMaxAmount = function (elem, arg, value) {
	return parseFloat(arg['amount']) >= parseFloat(value);
};

$(function () {
	// top link
	$('#top-link a').click(function (e) {
		e.preventDefault();

		$('html,body').animate({scrollTop: 0}, 'fast');
	});

	$(window).scroll(function () {
		if ($(window).scrollTop() > 0) {
			$('#top-link').fadeIn('slow');
		} else {
			$('#top-link').fadeOut('slow');
		}
	});

	// init extensions
	$.nette.init();
});
