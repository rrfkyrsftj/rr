(function () {
    var uxpLoginDataService = [
        '$http','$document',
        /**
         * @param {IHttpService} $http
         * @param {IDocumentService} $document
         */
        function ($http, $document) {
            // TODO: do not get this directly off the DOM
            /**
             * @type {?HTMLInputElement}
             */
            var csrfHiddenInput = $document[0].querySelector('input[name=_csrf]');
            if (csrfHiddenInput === null) {
                throw new Error('CSRF token not found on DOM.');
            }
            var csrfToken = csrfHiddenInput.getAttribute('value');

            var dataService = {};

            /**
             * @param {MemorizedAccount} account
             * @returns {IHttpPromise}
             */
            dataService.forgetMemorizedAccount = function (account) {
                var targetUrl = '/memorized-accounts/' + account.hashedLoginId;
                /**
                 * @type {IRequestConfig}
                 */
                var httpRequest = {
                    url: targetUrl,
                    method: 'DELETE',
                    withCredentials: true,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                };

                return $http(httpRequest);
            };

            // ************ ReCaptcha ************
            /**
             * Return an array of iFrames
             */
            dataService.getChallengeIFrame = function () {
                var frames = Array.from($document[0].getElementsByTagName('iframe'));
                var recaptchaWindow = {};

                frames.forEach(function (x) {
                    // get the reCaptcha challenge window
                    if (x.title.includes('challenge')) {
                        recaptchaWindow = x.parentNode.parentNode;
                    }
                });

                return recaptchaWindow;
            };

            dataService.submitLoginForm = function () {
                $document[0].getElementById('loginForm').submit();
            };

            dataService.onSubmitRecaptcha = function () {
                $document[0].getElementById('loginForm').onsubmit = function (event) {
                    event.preventDefault();
                    grecaptcha.execute();
                };
            };

            return dataService;
        }
    ];

    angular
        .module('uxpLoginDataServiceModule', [])
        .factory('uxpLoginDataService', uxpLoginDataService);
})();
