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
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 6 */;
		echo '/assets/images/favicon.ico">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 7 */;
		echo '/assets/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 8 */;
		echo '/assets/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 9 */;
		echo '/assets/fonts/brand-icons/brand-icons.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 10 */;
		echo '/assets/vendor/bootstrap-sweetalert/sweetalert.css">
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
		$this->renderBlock('content', get_defined_vars()) /* line 36 */;
		$this->renderBlock('dialog', get_defined_vars()) /* line 37 */;
		$this->createTemplate('theme/components/footer.php.latte', $this->params, 'include')->renderToContentType('html') /* line 38 */;
		echo '
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 40 */;
		echo '/assets/js/jquery.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 41 */;
		echo '/assets/js/owl.carousel.min.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 42 */;
		echo '/assets/vendor/bootstrap-sweetalert/sweetalert.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 43 */;
		echo '/assets/vendor/toastr/toastr.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 44 */;
		echo '/assets/js/page/sweetalert.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 45 */;
		echo '/assets/js/page/toastr.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 46 */;
		echo '/assets/js/validasi.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 47 */;
		echo '/assets/jsa/index.js"></script>
';
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 48 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 52 */;
		echo '    <script>
        (function(document, window, $){
            \'use strict\';

            var Site = window.Site;
            $(document).ready(function(){
                Site.run();
            });
        })(document, window, jQuery);
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


	/** {block content} on line 36 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block dialog} on line 37 */
	public function blockDialog(array $ʟ_args): void
	{
	}


	/** {block pluginjs} on line 48 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 52 */
	public function blockPagejs(array $ʟ_args): void
	{
	}
}
