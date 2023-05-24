(function () {
    var uxpActionMessageDirective = [
    	'$window',
    	function($window) {
			return {
				link: function (scope, elm, attrs, ctrl) {
					var messagePrompt = $window.confirm(attrs.errortext);
					var appLink = attrs.errorlink;

					if (messagePrompt) {
						// when the ok button is pressed
						// Send the user to the app's URL
						$window.location = appLink
					} else {
						// when the cancel button is pressed
						// Do nothing
					}
				}
			}
		}
    ];

    angular
        .module('uxpActionMessageModule', [])
        .directive('uxpActionMessage', uxpActionMessageDirective)
})();

