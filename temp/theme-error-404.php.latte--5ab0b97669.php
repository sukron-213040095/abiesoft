<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/../theme/error/404.php.latte */
final class Template5ab0b97669 extends Latte\Runtime\Template
{
	public const Blocks = [
		['title' => 'blockTitle', 'classbody' => 'blockClassbody', 'plugincss' => 'blockPlugincss', 'content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo "\n";
		$this->renderBlock('classbody', get_defined_vars()) /* line 4 */;
		$this->renderBlock('plugincss', get_defined_vars()) /* line 7 */;
		$this->renderBlock('content', get_defined_vars()) /* line 10 */;
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


	/** {block classbody} on line 4 */
	public function blockClassbody(array $ʟ_args): void
	{
		echo 'animsition page-error page-error-404 layout-full
';
	}


	/** {block plugincss} on line 7 */
	public function blockPlugincss(array $ʟ_args): void
	{
		echo '<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 8 */;
		echo '/assets/examples/css/pages/errors.css">
';
	}


	/** {block content} on line 10 */
	public function blockContent(array $ʟ_args): void
	{
		echo '    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content vertical-align-middle">
        <header>
          <h1 class="animation-slide-top">404</h1>
          <p>Halaman Tidak Ditemukan</p>
        </header>
        <p class="error-advise">Halaman tidak tersedia/ tidak dapat diakses.</p>
        <a class="btn btn-primary btn-round" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 18 */;
		echo '">Kembali Ke Home</a>
      </div>
    </div>
';
	}
}
