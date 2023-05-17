//add / remove class '.temp-margin' when focusing / leaving any input to prevent keyboard covers inputs on Android.
// '.temp-margin' is an android specific css. 
(function () {
    var androidMarginDirective = [
    	function() {
			return {
                restrict:'A',
                link: function (scope, element, attrs) {
                    var containerElm = document.querySelector('.widget-c1-oauth-login') || document.querySelector('.widget-c1-oauth-pac-change');

                    function onKeyboardShow (event) {
                        containerElm.classList.add('temp-margin');
                    }
        
                    function onKeyboardDismiss (event) {
                        if(containerElm.classList.contains('temp-margin')) {
                            containerElm.classList.remove('temp-margin');
                        }
                    }
                    element[0].addEventListener('focus', onKeyboardShow);
                    element[0].addEventListener('blur', onKeyboardDismiss);
                }
            }
        }
    ];

    angular
        .module('androidMarginModule', [])
        .directive('androidMargin', androidMarginDirective)

})();