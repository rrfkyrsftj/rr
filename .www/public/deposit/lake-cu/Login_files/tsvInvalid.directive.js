(function () {

    var tsvInvalidDirective = function($timeout) {
      return {    
        link: function(scope, element, attrs) {
            scope.$watch(function() {
                return element[0].value;
            }, function(){
                    $timeout(function () {
                        if (element.hasClass('ng-pristine') || element.hasClass('ng-valid')) {
                            element[0].setAttribute('aria-invalid', false);
                        } 
                        else {
                            element[0].setAttribute('aria-invalid', true);
                        }
                    })
                }
            );
        }
      };
    };
        angular
        .module('tsvInvalidModule',[])
        .directive('ariaInvalid', tsvInvalidDirective);
  })();