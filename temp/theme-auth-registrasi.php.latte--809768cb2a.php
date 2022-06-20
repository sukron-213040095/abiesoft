<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/../theme/auth/registrasi.php.latte */
final class Template809768cb2a extends Latte\Runtime\Template
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
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 50 */;
		echo "\n";
		$this->renderBlock('pagejs', get_defined_vars()) /* line 54 */;
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
		echo '<link rel="stylesheet" href="../../assets/examples/css/pages/login.css">
';
	}


	/** {block classbody} on line 8 */
	public function blockClassbody(array $ʟ_args): void
	{
		echo 'animsition page-login layout-full page-dark
';
	}


	/** {block content} on line 12 */
	public function blockContent(array $ʟ_args): void
	{
		echo '<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="brand">
            <img class="brand-img" src="../../assets/media/logo-abiesoft.png" alt="...">
            <h2 class="brand-text">';
		echo LR\Filters::escapeHtmlText(\AbieSoft\Utilities\Config::envReader('APP_TITLE')) /* line 17 */;
		echo '</h2>
        </div>
        <p>Buat akun anda untuk menggunakan fitur aplikasi</p>
        <form method="post" role="form">
            <div class="form-group">
                <label class="sr-only" for="inputNama">Nama</label>
                <input type="text" class="form-control" id="inputNama" name="inputNama" placeholder="Nama">
            </div>
            <div class="form-group">
                <label class="sr-only" for="inputUsername">Username</label>
                <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Username">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="sr-only" for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="sr-only" for="inputKonfirmasiPassword">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="inputKonfirmasiPassword" name="inputKonfirmasiPassword" placeholder="Konfirmasi Password">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
        </form>
        <p>Sudah punya akun? <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 45 */;
		echo '/login">Login</a></p>
    </div>
</div>
';
	}


	/** {block pluginjs} on line 50 */
	public function blockPluginjs(array $ʟ_args): void
	{
		echo '<script src="../../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
';
	}


	/** {block pagejs} on line 54 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '<script src="../../assets/js/Plugin/jquery-placeholder.js"></script>
<script src="../../assets/js/Plugin/animate-list.js"></script>
';
	}
}
