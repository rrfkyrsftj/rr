(function () {
    // {@see: https://docs.angularjs.org/guide/forms#custom-validation}
    var uxpPatternDirective = function ($parse) {
        return {
            require: 'ngModel',
            link: function (scope, elm, attrs, ctrl) {
                // update the model with value if value attribute is set
                var model = attrs.ngModel;
                var value = attrs.value;
                if (attrs.type === "number") {
                    value = parseInt(value)
                }
                $parse(model).assign(scope, value);

                if (!attrs.uxpPattern.length) {
                    console.error('Invalid RegExp pattern for uxp-pattern directive: ', attrs.uxpPattern);
                    return;
                }

                var PATTERN_REGEXP = new RegExp(attrs.uxpPattern);

                /**
                 * @param {any} modelValue
                 * @param {any} viewValue
                 * @returns {boolean}
                 */
                ctrl.$validators.uxpPattern = function (modelValue, viewValue) {
                    var isValid = false;
                    if (ctrl.$isEmpty(modelValue)) {
                        // consider empty models to be invalid
                        return false;
                    }

                    // make sure we have valid pac String values
                    if (PATTERN_REGEXP.test(viewValue)) {
                        // it is valid
                        isValid = true;
                    }

                    return isValid;
                };
            }
        };
    };

    angular
        .module('uxpPatternModule', [])
        .directive('uxpPattern', uxpPatternDirective);
})();