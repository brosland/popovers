'use strict';

(function ($, undefined) {
	$.nette.ext('user-popover', {
		init: function () {
			this.setup($('body'));
		},
		success: function (payload) {
			if (payload.closeModal) {
				this.closeModal();
			}

			if (payload.snippets) {
				var snippets = this.ext('snippets');

				for (var id in payload.snippets) {
					this.setup(snippets.getElement(id));
				}
			}
		}
	}, {
		setup: function ($el) {
			var createPopover = function ($element, $content) {
				$element.popover({
					content: $content,
					container: $element,
					html: 'true',
					placement: 'auto bottom',
					trigger: 'manual'
				});
			};

			$el.find('[data-user-popover]').hover(function () {
				var $popover = $(this);

				if ($popover.data('bs.popover') === undefined) {
					$.nette.ajax({
						url: $popover.data('user-popover'),
						dataType: 'html',
						success: function (html) {
							createPopover($popover, html);

							$popover.popover('show');
						}
					});
				}
			}, function () {
				var $popover = $(this);

				setTimeout(function () {
					if (!$popover.is(':hover'))
					{
						$popover.popover('destroy');
					}
				}, 250);
			});
		}
	});
})(jQuery);