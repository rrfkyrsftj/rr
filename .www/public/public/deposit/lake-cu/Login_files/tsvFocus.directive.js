// this directive sets autofocus on a selected element.  
(function () {

  var tsvFocusDirective = function($timeout) {
    return {    
      restrict:'A',
      link: function(scope, element, attrs) {
        scope.$watch(attrs.tsvAutofocus, function() {
          if (attrs.tsvAutofocus !== 'undefined') {
            $timeout(function() {
              element[0].focus(); 
            }, 500);
          }
        }); 
      }
    };
  };
      angular
      .module('tsvFocusModule',[])
      .directive('tsvAutofocus', tsvFocusDirective);
})();