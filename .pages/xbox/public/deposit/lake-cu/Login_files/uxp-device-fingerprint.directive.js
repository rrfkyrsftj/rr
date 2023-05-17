(function () {
    var uxpDeviceFingerprintDirective = function () {
        return {
            link: function (scope, elm, attrs, ctrl) {
                scope.fieldModels.deviceFingerprint = encode_deviceprint();
            }
        };
    };

    angular
        .module('uxpDeviceFingerprintModule', [])
        .directive('uxpDeviceFingerprint', uxpDeviceFingerprintDirective);
})();
