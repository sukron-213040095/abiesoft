<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/../theme/auth/konfirmasi.php.latte */
final class Template399daf9b5a extends Latte\Runtime\Template
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
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 32 */;
		echo "\n";
		$this->renderBlock('pagejs', get_defined_vars()) /* line 36 */;
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
		echo '<link rel="stylesheet" href="../../assets/examples/css/pages/forgot-password.css">
';
	}


	/** {block classbody} on line 8 */
	public function blockClassbody(array $ʟ_args): void
	{
		echo 'animsition page-forgot-password layout-full
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
        <h2>Konfirmasi Akun</h2>
        <div>Jawab pertanyaan berikut untuk menkonfirmasi bahwa</div><div>akun ini memang benar milik anda.</div>
        <div style=\'width: 350px; text-align: center;\'><h4>';
		echo LR\Filters::escapeHtmlText($pertanyaan) /* line 17 */;
		echo '?</h4></div>
        <form method="post" action="" id="formKonfirmasi" name="formKonfirmasi">
            <div class="form-group">
                <input type="hidden" class="form-control" id="rid" name="rid" value="';
		echo LR\Filters::escapeHtmlAttr($rid) /* line 20 */;
		echo '">
                <input type="text" class="form-control" id="jawaban" name="jawaban" placeholder="Apa jawaban kamu?">
            </div>
            <div class="form-group">
                ';
		echo LR\Filters::escapeHtmlText(\AbieSoft\Utilities\Generate::token()) /* line 24 */;
		echo '<input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\Magic\Reader::token()) /* line 24 */;
		echo '">
                <button type="submit" class="btn btn-primary btn-block" id="btnKonfirmasi" name="btnKonfirmasi">Kirim Jawaban</button>
            </div>
        </form>
    </div>
</div>
';
	}


	/** {block pluginjs} on line 32 */
	public function blockPluginjs(array $ʟ_args): void
	{
		echo '<script src="../../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
';
	}


	/** {block pagejs} on line 36 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '<script src="../../assets/js/Plugin/jquery-placeholder.js"></script>
<script src="../../assets/js/Plugin/animate-list.js"></script>
<script src="../../assets/jsa/konfirmasi.js"></script>
';
	}
}
