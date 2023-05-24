// resets branch list before unloading. 
(function () {
    var branchResetDirective = [
    	'$window',
    	function($window) {
			return {
				link: function (scope, elm, attrs, ctrl) {
                    $window.addEventListener('beforeunload', function(e) {
                        if (scope.state.isSubmittingForm) {
                            elm[0].length = 0;
                        }
                        return '';
                    });  
                }
            }
        }
    ];

    angular
        .module('branchResetModule', [])
        .directive('branchReset', branchResetDirective)
})();

