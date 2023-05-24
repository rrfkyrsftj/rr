(function () {
    var uxpLoginController = [
        '$scope', 'uxpLoginDataService', '$window', '$timeout',
        function ($scope, uxpLoginDataService, $window, $timeout) {
            /**
             * ngModels for form fields
             *
             * @type {{
             *      password: ?string,
             *      pac: ?string,
             *      deviceFingerprint: ?string,
             *      hashedLoginId: ?string,
             *      passwordInputType: string,
             *      accountNickname: ?string,
             *      rememberMe: boolean,
             *      pan: ?string,
             *      memberNum: ?string,
             *      branch: ?string,
             *      username: ?string,
             *      agreeTAndC: boolean,
             * }}
             */
            $scope.fieldModels = {
                username: null,
                pac: null,
                pan: null,
                branch: null,
                memberNum: null,
                hashedLoginId: null,
                password: null,
                passwordInputType: 'password',
                rememberMe: false,
                accountNickname: null,
                deviceFingerprint: null,
                agreeTAndC: false
            };

            /**
             * @typedef Branch
             * @type {Object}
             *
             * @property {string} name
             * @property {string} value
             */

            /**
             * @type {Branch[]}
             */
            $scope.branches = [];

            /**
             * ngForm outer form
             *
             * @type {angular.IFormController|{}}
             */
            $scope.uxpLoginForm = {
                /**
                 * ngForm subform for Memorized Accounts
                 *
                 * @type {angular.IFormController|{}}
                 */
                memorizedLoginsForm: {},
                /**
                 * ngForm subform for performing a login using a username and password
                 *
                 * @type {angular.IFormController|{}}
                 */
                newLoginForm: {}
            };

            // should we show Memorized Users picker, or New User Login?
            $scope.state = {
                forceShowNewLogin: false,
                usingMemorizedUser: false,
                memorizedAccountsEditMode: false,
                isSubmittingForm: false,
                isFieldOnChange: false,
                isShowingSpinner: false
            };

            /**
             * @typedef MemorizedAccount
             * @type {Object}
             *
             * @property {string} nickname
             * @property {string} maskedLoginId
             * @property {string} hashedLoginId
             */

            /**
             * @type {MemorizedAccount[]}
             */
            $scope.memorizedAccounts = [];
            // test data
            // $scope.memorizedAccounts = [
            //     {
            //         "nickname": "Nickname",
            //         "maskedLoginId": "**3456",
            //         "hashedLoginId": "1450575490"
            //     }, {
            //         "nickname": "Another nickname",
            //         "maskedLoginId": "***1010",
            //         "hashedLoginId": "1099168620"
            //     }, {
            //         "nickname": "Third nickname",
            //         "maskedLoginId": "******7890",
            //         "hashedLoginId": "-2054162758"
            //     }
            // ];

            /**
             * @type {?MemorizedAccount}
             */
            $scope.selectedMemorizedAccount = null;

            $scope.showNewLoginForm = function () {
                $scope.state.forceShowNewLogin = true;
            };

            /**
             * @returns {boolean}
             */
            $scope.showingNewLogin = function () {
                return !$scope.haveMemorizedAccounts() || $scope.state.forceShowNewLogin;
            };

            $scope.showNewUserLogin = function () {
                $scope.clearLoginCredentials();
                $scope.state.usingMemorizedUser = false;
                $scope.showNewLoginForm();
            };

            $scope.showMemorizedAccounts = function () {
                $scope.clearLoginCredentials();
                $scope.state.forceShowNewLogin = false;
                $scope.state.memorizedAccountsEditMode = false;
            };

            /**
             * @returns {boolean}
             */
            $scope.showingMemorizedAccounts = function () {
                return $scope.haveMemorizedAccounts() && !$scope.state.forceShowNewLogin;
            };

            /**
             * @returns {boolean}
             */
            $scope.showingMemorizedAccountsEdit = function () {
                return $scope.showingMemorizedAccounts() && $scope.state.memorizedAccountsEditMode;
            };

            /**
             * Show the Edit Mode for Memorized Accounts
             */
            $scope.showEditMemorized = function () {
                $scope.state.memorizedAccountsEditMode = true;
            };

            /**
             * Make a request to the backend OAuth service, to forget the remembered account.
             *
             * @param {MemorizedAccount} account The account we want to forget
             * @param {Event} event Click event from the Delete button
             */
            $scope.forgetMemorizedAccount = function (account, event) {
                event.preventDefault();
                event.stopPropagation();

                let localizedConfirmText = event.target.getAttribute('data-confirm-message');
                var confirmMessage = localizedConfirmText + ' ' + account.maskedLoginId + '"?';
                var deleteConfirmed = window.confirm(confirmMessage);

                if (deleteConfirmed) {
                    uxpLoginDataService.forgetMemorizedAccount(account)
                        .then(
                            function success(response) {
                                $scope.removeFromMemorized(account);
                            },
                            function error(response) {
                                console.error('Error Forgetting Account: ', account);
                            }
                        );
                }
            };

            /**
             * Remove the specified account from the view model
             *
             * @param {MemorizedAccount} account
             */
            $scope.removeFromMemorized = function (account) {
                var accountIndex = $scope.memorizedAccounts.indexOf(account);
                if (accountIndex < 0) {
                    throw new Error('Trying to delete a non-existant memorized Account!');
                }
                $scope.memorizedAccounts.splice(accountIndex, 1);
            };

            $scope.clearLoginCredentials = function () {
                $scope.setLoginCredentials(null);
                $scope.fieldModels.rememberMe = false;
                $scope.fieldModels.accountNickname = null;
                $scope.state.usingMemorizedUser = false;
                $scope.fieldModels.agreeTAndC = false;
            };

            /**
             * Clear, and set the login credentials to those specified in the `account`
             *
             * @param {?MemorizedAccount} account
             */
            $scope.setLoginCredentials = function (account) {
                $scope.selectedMemorizedAccount = account;

                // blank out any existing entered password when switching logins, and reset the sub-form
                $scope.fieldModels.password = null;
                $scope.uxpLoginForm.newLoginForm.password.$setUntouched();

                // clear the memberNum input field
                $scope.fieldModels.memberNum = null;
                if ($scope.uxpLoginForm.newLoginForm.memberNum) {
                    $scope.uxpLoginForm.newLoginForm.memberNum.$setUntouched();
                }
                // if we have a selected an account, set the memorized account identifier
                $scope.fieldModels.hashedLoginId = account ? $scope.selectedMemorizedAccount.hashedLoginId : null;
            };

            /**
             * @returns {boolean}
             */
            $scope.haveMemorizedAccounts = function () {
                return $scope.memorizedAccounts.length > 0;
            };

            /**
             * For the given selectedAccount, set the credentials and
             *
             * @param {MemorizedAccount} selectedAccount
             */
            $scope.selectMemorizedAccount = function (selectedAccount) {
                $scope.setLoginCredentials(selectedAccount);
                $scope.state.forceShowNewLogin = true;
                $scope.state.usingMemorizedUser = true;

                // place focus on password toggle for accessibility compliance
                var passwordToggle = document.getElementById('passwordToggle');
                $scope.$watch('passwordToggle', function(){
                    if (passwordToggle) {
                        $timeout(function() {
                            passwordToggle.focus(); 
                          });
                    }
                });
            };

            $scope.togglePasswordMask = function () {
                // toggle the PASSWORD field input type to a TEXT input to reveal the password
                $scope.fieldModels.passwordInputType = $scope.fieldModels.passwordInputType === 'password' ?
                    'text' :
                    'password';
            };

            /**
             * @returns {boolean}
             */
            $scope.isAccountNicknameInvalid = function () {
                return $scope.uxpLoginForm.newLoginForm['account-nickname'].$touched &&
                    $scope.uxpLoginForm.newLoginForm['account-nickname'].$invalid;
            };

            /**
             * @returns {boolean}
             */
            $scope.hasNicknameMinLengthError = function () {
                return $scope.isAccountNicknameInvalid() &&
                    (
                        $scope.uxpLoginForm.newLoginForm['account-nickname'].$error.minlength ||
                        $scope.uxpLoginForm.newLoginForm['account-nickname'].$error.required
                    )
            };

            /**
             * @returns {boolean}
             */
            $scope.isMemberNumInvalid = function () {
                return $scope.uxpLoginForm.newLoginForm.memberNum.$touched &&
                    $scope.uxpLoginForm.newLoginForm.memberNum.$dirty &&
                    $scope.uxpLoginForm.newLoginForm.memberNum.$invalid;
            };

            /**
             * @returns {boolean}
             */
            $scope.isPanNumInvalid = function () {
                return $scope.uxpLoginForm.newLoginForm.pan.$touched &&
                    $scope.uxpLoginForm.newLoginForm.pan.$dirty &&
                    $scope.uxpLoginForm.newLoginForm.pan.$invalid;
            };            

            /**
             * @returns {boolean}
             */
            $scope.isPasswordInvalid = function () {
                return $scope.uxpLoginForm.newLoginForm.password.$touched &&
                    $scope.uxpLoginForm.newLoginForm.password.$dirty &&
                    $scope.uxpLoginForm.newLoginForm.password.$invalid &&
                    $scope.uxpLoginForm.newLoginForm.password.$viewValue !== "";
            };

            // ************ ReCaptcha ************
            /**
             * ReCaptcha onloadCallback
             */
            var onloadCallback = function () {
                uxpLoginDataService.onSubmitRecaptcha();
            };

            /**
             * ReCaptcha data-callback
             */
            var formSubmit = function () {
                // Login button will be disabled after the user completed the challenge
                // (just in case it got enabled by 'initListener')
                $scope.state.isSubmittingForm = true;
                $scope.state.isShowingSpinner = true;
                $scope.$apply();

                uxpLoginDataService.submitLoginForm();
            };

            $window.onloadCallback = onloadCallback;
            $window.formSubmit = formSubmit;

            // reset form fields
            $window.addEventListener('pageshow', function(event) {
                    $scope.resetForm();
              });
            $scope.resetForm = function() {
                $scope.uxpLoginForm.$setUntouched();
                $scope.uxpLoginForm.$setPristine();
                $scope.fieldModels.memberNum = '';
                var panEl = document.getElementById("panNum");
                if(panEl) {
                   panEl.value = $scope.setPan();
                }
                $scope.fieldModels.pan = $scope.setPan();
            }

            /**
             * If recaptcha is disabled: disable login button and show a spinner
             * If recaptcha is enabled: disable login button, remove the spinner, and watch challenge window
             */
            $scope.ngSubmitListener = function (isRecaptchaEnabled) {
                $scope.state.isSubmittingForm = true;
                $scope.state.isShowingSpinner = true;

                if (isRecaptchaEnabled === 'true') {
                    $scope.initListener();
                    $scope.state.isShowingSpinner = false;
                }
            };

            $scope.initListener = function () {
                var recaptchaWindow = uxpLoginDataService.getChallengeIFrame();

                if (recaptchaWindow) {
                    // This will listen the changes on CSS, if opacity changes to 0 it means that the window
                    // was closed so the loginButton will be enabled. This is done because the user can close
                    // the challenge window without finishing it.
                    $scope.$watch(recaptchaWindow.style.opacity === '0', function () {
                        $scope.state.isSubmittingForm = false;
                    });
                }
            };

            // https://stackoverflow.com/questions/21825157/internet-explorer-11-detection
            $scope.isIE11 = (!!window.MSInputMethodContext && !!document.documentMode);
            
            /**
             * @returns {boolean}
             */
            $scope.isFieldChanged = function () {
                return $scope.state.isFieldOnChange = true;
            }
            /**
             * @returns {boolean}
             */
            $scope.isPanInside = function () {
                return PAN_CONFIG.isPanEnabled && !PAN_CONFIG.isPanPrefixOutside;
            }
            /**
             * @returns {string}
             */
            $scope.setPan = function() {
                return $scope.isPanInside() &&  PAN_CONFIG.panPrefix !== null ? PAN_CONFIG.panPrefix : '';
            }
        }
    ];

    angular
        .module('UxpLoginApp')
        .controller('UxpLoginController', uxpLoginController)
})();
