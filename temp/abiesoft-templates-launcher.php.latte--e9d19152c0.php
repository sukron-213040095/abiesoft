<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\templates\launcher.php.latte */
final class Templatee9d19152c0 extends Latte\Runtime\Template
{
	public const Blocks = [
		['title' => 'blockTitle', 'plugincss' => 'blockPlugincss', 'classbody' => ['blockClassbody', 'html/attr'], 'navbar' => 'blockNavbar', 'sidebar' => 'blockSidebar', 'content' => 'blockContent', 'dialog' => 'blockDialog', 'footer' => 'blockFooter', 'pluginjs' => 'blockPluginjs', 'pagejs' => 'blockPagejs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 10 */;
		echo '</title>
    
    <link rel="apple-touch-icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 12 */;
		echo '/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 13 */;
		echo '/assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 16 */;
		echo '/assets/css/style.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 17 */;
		echo '/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 18 */;
		echo '/assets/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 19 */;
		echo '/assets/css/site.min.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 22 */;
		echo '/assets/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 23 */;
		echo '/assets/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 24 */;
		echo '/assets/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 25 */;
		echo '/assets/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 26 */;
		echo '/assets/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 27 */;
		echo '/assets/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 28 */;
		echo '/assets/examples/css/structure/alerts.css">
';
		$this->renderBlock('plugincss', get_defined_vars()) /* line 29 */;
		echo '    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 33 */;
		echo '/assets/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 34 */;
		echo '/assets/fonts/brand-icons/brand-icons.min.css">
    <link rel=\'stylesheet\' href=\'http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic\'>
    
    <!-- Scripts -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 38 */;
		echo '/assets/vendor/breakpoints/breakpoints.js"></script>
    <script>
        const BASEURL = ';
		echo LR\Filters::escapeJs(\AbieSoft\Utilities\Config::envReader('BASEURL')) /* line 40 */;
		echo '
      Breakpoints();
    </script>
  </head>
  <body  class="';
		$this->renderBlock('classbody', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'html/attr', $s);
		}) /* line 44 */;
		echo '">

    <div id="msg_error"></div>

';
		$this->renderBlock('navbar', get_defined_vars()) /* line 48 */;
		$this->renderBlock('sidebar', get_defined_vars()) /* line 49 */;
		$this->renderBlock('content', get_defined_vars()) /* line 50 */;
		$this->renderBlock('dialog', get_defined_vars()) /* line 51 */;
		$this->renderBlock('footer', get_defined_vars()) /* line 52 */;
		echo '    <!-- End Content -->

    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 55 */;
		echo '/assets/js/message.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 56 */;
		echo '/assets/js/validasi.js"></script>


    <!-- Core  -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 60 */;
		echo '/assets/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 61 */;
		echo '/assets/vendor/jquery/jquery.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 62 */;
		echo '/assets/vendor/popper-js/umd/popper.min.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 63 */;
		echo '/assets/vendor/bootstrap/bootstrap.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 64 */;
		echo '/assets/vendor/animsition/animsition.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 65 */;
		echo '/assets/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 66 */;
		echo '/assets/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 67 */;
		echo '/assets/vendor/asscrollable/jquery-asScrollable.js"></script>
    
    <!-- Plugins -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 70 */;
		echo '/assets/vendor/switchery/switchery.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 71 */;
		echo '/assets/vendor/intro-js/intro.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 72 */;
		echo '/assets/vendor/screenfull/screenfull.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 73 */;
		echo '/assets/vendor/slidepanel/jquery-slidePanel.js"></script>
';
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 74 */;
		echo '    
    <!-- Scripts -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 77 */;
		echo '/assets/js/Component.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 78 */;
		echo '/assets/js/Plugin.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 79 */;
		echo '/assets/js/Base.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 80 */;
		echo '/assets/js/Config.js"></script>
    
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 82 */;
		echo '/assets/js/Section/Menubar.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 83 */;
		echo '/assets/js/Section/Sidebar.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 84 */;
		echo '/assets/js/Section/PageAside.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 85 */;
		echo '/assets/js/Plugin/menu.js"></script>
    
    <!-- Config -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 88 */;
		echo '/assets/js/config/colors.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 89 */;
		echo '/assets/js/config/tour.js"></script>
    <script>Config.set(\'assets\', \'assets\');</script>
    
    <!-- Page -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 93 */;
		echo '/assets/js/Site.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 94 */;
		echo '/assets/js/Plugin/asscrollable.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 95 */;
		echo '/assets/js/Plugin/slidepanel.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 96 */;
		echo '/assets/js/Plugin/switchery.js"></script>
';
		$this->renderBlock('pagejs', get_defined_vars()) /* line 97 */;
		echo '    
    <script>
      (function(document, window, $){
        \'use strict\';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
    
  </body>
</html>
';
	}


	/** {block title} on line 10 */
	public function blockTitle(array $ʟ_args): void
	{
	}


	/** {block plugincss} on line 29 */
	public function blockPlugincss(array $ʟ_args): void
	{
	}


	/** {block classbody} on line 44 */
	public function blockClassbody(array $ʟ_args): void
	{
	}


	/** {block navbar} on line 48 */
	public function blockNavbar(array $ʟ_args): void
	{
	}


	/** {block sidebar} on line 49 */
	public function blockSidebar(array $ʟ_args): void
	{
	}


	/** {block content} on line 50 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block dialog} on line 51 */
	public function blockDialog(array $ʟ_args): void
	{
	}


	/** {block footer} on line 52 */
	public function blockFooter(array $ʟ_args): void
	{
	}


	/** {block pluginjs} on line 74 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 97 */
	public function blockPagejs(array $ʟ_args): void
	{
	}
}
