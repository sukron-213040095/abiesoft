<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\templates\theme\components\navbar.php.latte */
final class Templated23de1b48a extends Latte\Runtime\Template
{
	public const Blocks = [
		['navbar' => 'blockNavbar'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('navbar', get_defined_vars()) /* line 1 */;
	}


	/** {block navbar} on line 1 */
	public function blockNavbar(array $ʟ_args): void
	{
		echo '    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand navbar-brand-center" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 11 */;
		echo '">
            <img class="navbar-brand-logo navbar-brand-logo-normal" src="../../assets/media/logo-abiesoft.png" title="AbieSoft">
            <img class="navbar-brand-logo navbar-brand-logo-special" src="../../assets/media/logo-abiesoft.png" title="AbieSoft">
            <span class="navbar-brand-text hidden-xs-down">';
		echo LR\Filters::escapeHtmlText(\AbieSoft\Utilities\Config::envReader('APP_TITLE')) /* line 14 */;
		echo '</span>
        </a>
    </div>

    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->

            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                        <span class="avatar avatar-online">
                            <span style="height: 30px; width: 30px; overflow: hidden;">
                                <img id="pp1" src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Auth\AuthController::getPhoto())) /* line 40 */;
		echo '" style="height: 30px; width: 30px; object-fit: cover; object-position: center;" alt="...">
                            </span>
                            <i></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 46 */;
		echo '/profile" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 48 */;
		echo '/logout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>


    </div>
</nav>
';
	}
}
