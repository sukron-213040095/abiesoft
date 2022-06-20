<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\templates\theme\components\footer.php.latte */
final class Templatee6d3de6f6e extends Latte\Runtime\Template
{
	public const Blocks = [
		['footer' => 'blockFooter'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('footer', get_defined_vars()) /* line 1 */;
	}


	/** {block footer} on line 1 */
	public function blockFooter(array $ʟ_args): void
	{
		echo '<footer class="site-footer">
    <div class="site-footer-legal">&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 3 */;
		echo ' AbieSoft</div>
    <div class="site-footer-right"></div>
</footer>
';
	}
}
