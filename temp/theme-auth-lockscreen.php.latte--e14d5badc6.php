<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/../theme/auth/lockscreen.php.latte */
final class Templatee14d5badc6 extends Latte\Runtime\Template
{
	public const Blocks = [
		['title' => 'blockTitle', 'plugincss' => 'blockPlugincss', 'classbody' => 'blockClassbody', 'content' => 'blockContent', 'pluginjs' => 'blockPluginjs', 'pagejs' => 'blockPagejs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo "\n";
		$this->renderBlock('plugincss', get_defined_vars()) /* line 4 */;
		echo "\n";
		$this->renderBlock('classbody', get_defined_vars()) /* line 8 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 12 */;
		echo "\n";
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 39 */;
		echo "\n";
		$this->renderBlock('pagejs', get_defined_vars()) /* line 43 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../../launcher.php.latte';
		return get_defined_vars();
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo ' ';
		echo LR\Filters::escapeHtmlText($title) /* line 3 */;
		echo ' ';
	}


	/** {block plugincss} on line 4 */
	public function blockPlugincss(array $ʟ_args): void
	{
		echo '<link rel="stylesheet" href="../../assets/examples/css/pages/login-lockscreen.css">
';
	}


	/** {block classbody} on line 8 */
	public function blockClassbody(array $ʟ_args): void
	{
		echo 'animsition page-locked layout-full page-dark
';
	}


	/** {block content} on line 12 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="avatar avatar-lg" style="width: 70px; height: 70px;">
                <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($photo)) /* line 16 */;
		echo '" alt="..." style="height: 70px; width: 70px; object-fit: cover; object-position: center;">
        </div>
        <p class="locked-user">';
		echo LR\Filters::escapeHtmlText($nama) /* line 18 */;
		echo '</p>
        <form method="post" id="formLogin" name="formLogin">
            <div class="input-group">
                <input type="password" class="form-control last" id="password" name="password" placeholder="Masukan password">
                <input type="hidden" id="lockscreen" name="lockscreen" value="on">
                <input type="hidden" id="username" name="username" value="lockscreen">
                <span class="input-group-btn">
                    ';
		echo LR\Filters::escapeHtmlText(\AbieSoft\Utilities\Generate::token()) /* line 25 */;
		echo '<input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\Magic\Reader::token()) /* line 25 */;
		echo '">
                    <button type="submit" class="btn btn-primary"><i class="icon wb-unlock" aria-hidden="true"></i>
                        <span class="sr-only">unLock</span>
                        <div style=\'display: none\' id=\'btnLogin\'></div>
                    </button>
                </span>
            </div>
        </form>
        <p>Masukan password untuk login kembali</p>
        <p><a href="/remove#removeLockscreen">atau Login dengan User lain?</a></p>
    </div>
</div>
';
	}


	/** {block pluginjs} on line 39 */
	public function blockPluginjs(array $ʟ_args): void
	{
		echo '<script src="../../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
';
	}


	/** {block pagejs} on line 43 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '<script src="../../assets/js/Plugin/jquery-placeholder.js"></script>
<script src="../../assets/js/Plugin/animate-list.js"></script>
<script src="../../assets/jsa/login.js"></script>
';
	}
}
