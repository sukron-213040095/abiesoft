<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\templates\launcher.php.latte */
final class Templatefcdc422cde extends Latte\Runtime\Template
{
	public const Blocks = [
		['plugincss' => 'blockPlugincss', 'title' => 'blockTitle', 'body' => ['blockBody', 'html/attr'], 'content' => 'blockContent', 'dialog' => 'blockDialog', 'pluginjs' => 'blockPluginjs', 'pagejs' => 'blockPagejs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 7 */;
		echo '/assets/images/favicon.ico">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 8 */;
		echo '/assets/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 9 */;
		echo '/assets/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 10 */;
		echo '/assets/fonts/brand-icons/brand-icons.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 11 */;
		echo '/assets/vendor/toastr/toastr.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 12 */;
		echo '/assets/css/abiesoft.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 13 */;
		echo '/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 14 */;
		echo '/assets/css/owl.theme.default.min.css">
';
		$this->renderBlock('plugincss', get_defined_vars()) /* line 15 */;
		echo '    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: \'#da373d\',
                    }
                }
            }
        }
        const BASEURL = ';
		echo LR\Filters::escapeJs(\AbieSoft\Utilities\Config::envReader('BASEURL')) /* line 28 */;
		echo ';
        const APIKEY = ';
		echo LR\Filters::escapeJs(\AbieSoft\Utilities\Config::envReader('APIKEY')) /* line 29 */;
		echo ';
    </script>
';
		$header = false /* line 31 */;
		echo '</head>
<title>';
		$this->renderBlock('title', get_defined_vars()) /* line 33 */;
		echo '</title>
<body class="';
		$this->renderBlock('body', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'html/attr', $s);
		}) /* line 34 */;
		echo '">
';
		$this->createTemplate('theme/components/header.php.latte', $this->params, 'include')->renderToContentType('html') /* line 35 */;
		echo '    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
';
		$this->renderBlock('content', get_defined_vars()) /* line 37 */;
		$this->renderBlock('dialog', get_defined_vars()) /* line 38 */;
		$this->createTemplate('theme/components/footer.php.latte', $this->params, 'include')->renderToContentType('html') /* line 39 */;
		echo '
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 41 */;
		echo '/assets/js/jquery-3.6.0.min.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 42 */;
		echo '/assets/js/owl.carousel.min.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 43 */;
		echo '/assets/vendor/bootstrap-sweetalert/sweetalert.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 44 */;
		echo '/assets/vendor/toastr/toastr.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 45 */;
		echo '/assets/js/page/toastr.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 46 */;
		echo '/assets/js/validasi.js"></script>
';
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 47 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 51 */;
		echo '    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 52 */;
		echo '/assets/jsa/index.js"></script>
    <script>
        var GoogleAuth;
        var SCOPE = \'https://www.googleapis.com/auth/drive.metadata.readonly\';
        function handleClientLoad() {
            // Load the API\'s client and auth2 modules.
            // Call the initClient function after the modules load.
            gapi.load(\'client:auth2\', initClient);
        }

        function initClient() {
            // In practice, your app can retrieve one or more discovery documents.
            var discoveryUrl = \'https://www.googleapis.com/discovery/v1/apis/drive/v3/rest\';

            // Initialize the gapi.client object, which app uses to make API requests.
            // Get API key and client ID from API Console.
            // \'scope\' field specifies space-delimited list of access scopes.
            gapi.client.init({
                \'apiKey\': \'YOUR_API_KEY\',
                \'clientId\': \'YOUR_CLIENT_ID\',
                \'discoveryDocs\': [discoveryUrl],
                \'scope\': SCOPE
            }).then(function () {
            GoogleAuth = gapi.auth2.getAuthInstance();

            // Listen for sign-in state changes.
            GoogleAuth.isSignedIn.listen(updateSigninStatus);

            // Handle initial sign-in state. (Determine if user is already signed in.)
            var user = GoogleAuth.currentUser.get();
            setSigninStatus();

            // Call handleAuthClick function when user clicks on
            //      "Sign In/Authorize" button.
            $(\'#sign-in-or-out-button\').click(function() {
                handleAuthClick();
            });
            $(\'#revoke-access-button\').click(function() {
                revokeAccess();
            });
            });
        }

        function handleAuthClick() {
            if (GoogleAuth.isSignedIn.get()) {
            // User is authorized and has clicked "Sign out" button.
            GoogleAuth.signOut();
            } else {
            // User is not signed in. Start Google auth flow.
            GoogleAuth.signIn();
            }
        }

        function revokeAccess() {
            GoogleAuth.disconnect();
        }

        function setSigninStatus() {
            var user = GoogleAuth.currentUser.get();
            var isAuthorized = user.hasGrantedScopes(SCOPE);
            if (isAuthorized) {
            $(\'#sign-in-or-out-button\').html(\'Sign out\');
            $(\'#revoke-access-button\').css(\'display\', \'inline-block\');
            $(\'#auth-status\').html(\'You are currently signed in and have granted \' +
                \'access to this app.\');
            } else {
            $(\'#sign-in-or-out-button\').html(\'Sign In/Authorize\');
            $(\'#revoke-access-button\').css(\'display\', \'none\');
            $(\'#auth-status\').html(\'You have not authorized this app or you are \' +
                \'signed out.\');
            }
        }

        function updateSigninStatus() {
            setSigninStatus();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script async defer src="https://apis.google.com/js/api.js"
            onload="this.onload=function(){};handleClientLoad()"
            onreadystatechange="if (this.readyState === \'complete\') this.onload()">
    </script>
</body>
</html>';
	}


	/** {block plugincss} on line 15 */
	public function blockPlugincss(array $ʟ_args): void
	{
	}


	/** {block title} on line 33 */
	public function blockTitle(array $ʟ_args): void
	{
	}


	/** {block body} on line 34 */
	public function blockBody(array $ʟ_args): void
	{
	}


	/** {block content} on line 37 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block dialog} on line 38 */
	public function blockDialog(array $ʟ_args): void
	{
	}


	/** {block pluginjs} on line 47 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 51 */
	public function blockPagejs(array $ʟ_args): void
	{
	}
}
