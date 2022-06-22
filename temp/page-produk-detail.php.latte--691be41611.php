<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/produk/detail.php.latte */
final class Template691be41611 extends Latte\Runtime\Template
{
	public const Blocks = [
		['title' => 'blockTitle', 'plugincss' => 'blockPlugincss', 'body' => 'blockBody', 'content' => 'blockContent', 'pluginjs' => 'blockPluginjs', 'pagejs' => 'blockPagejs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo '

';
		$this->renderBlock('plugincss', get_defined_vars()) /* line 5 */;
		echo "\n";
		$this->renderBlock('body', get_defined_vars()) /* line 7 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 9 */;
		echo "\n";
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 56 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 57 */;
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


	/** {block plugincss} on line 5 */
	public function blockPlugincss(array $ʟ_args): void
	{
	}


	/** {block body} on line 7 */
	public function blockBody(array $ʟ_args): void
	{
		echo 'bg-slate-200';
	}


	/** {block content} on line 9 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="float w-[1100px] ml-auto mr-auto">
    <div class="w-full text-[10pt] p-8">
        <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 12 */;
		echo '" class="hover:text-sky-400">Home</a> > Produk  > ';
		echo LR\Filters::escapeHtmlText($nama) /* line 12 */;
		echo '
    </div>
    <div class="grid grid-cols-3 gap-2 mb-8">

        <div class="col-span-2">
            <div id=\'boxDetailInfo\'></div>
        </div>

        <div class="pl-8">
            <div class="p-4 bg-white rounded-md">
                <div class="min-h-[80px]">
                    <div class="relative h-[34px]">
                        <form>
                            <input type="number" onBlur="if(this.value == \'\'){ this.value = 1; hitungHarga(this.value); }" onKeyUp="hitungHarga(this.value)" class="absolute w-[150px] text-center border-[1px] border-solid border-slate-200 p-1 outline-none font-bold" value="1" id="qty" name="qty">
                            <input type="hidden" id="iptstok" name="iptstok" value="0">
                            <input type="hidden" id="hargaitem" name="hargaitem" value="0">
                            <input type="hidden" id="hargaasli" name="hargaasli" value="0">
                            <button type=\'button\' class="absolute font-bold text-[14pt] mt-[3px] ml-[10px] hover:text-sky-400" onClick=\'minVal()\'><i class="las la-minus"></i></button>
                            <button type=\'button\' class="absolute font-bold text-[14pt] mt-[3px] ml-[125px] hover:text-sky-400" onClick=\'plusVal()\'><i class="las la-plus"></i></button>
                            <div class="absolute right-0 mt-[5px]"><span class="ml-2">Stok </span><span class="font-semibold" id="stok">0</span></div>
                        <form>
                        <div class="w-full pt-[36px] text-red-600 text-[10pt]" id="msgErr"></div>
                    </div>
                    <div class="mt-4">
                        <button type="button" class="font-semibold text-[10pt] text-sky-400"><i class="las la-pen"></i> Tambah Catatan</button>
                    </div>
                    <div id="transaksi" class="mt-4 mb-4"></div>
                    <div class="relative pt-[20px]">
                        <div id=\'totalHargaAsli\' class="absolute line-through right-0 mt-[-20px]">Rp. 0</div>
                        <div class="flex justify-between items-center">
                            <div>Subtotal</div>
                            <div class="font-bold text-[18pt]">Rp. <span id="subtotal">0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear-both"></div>
';
	}


	/** {block pluginjs} on line 56 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 57 */
	public function blockPagejs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script>
let SLUG = ';
		echo LR\Filters::escapeJs($slug) /* line 59 */;
		echo ';
let ID = ';
		echo LR\Filters::escapeJs($id) /* line 60 */;
		echo ';
</script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 62 */;
		echo '/assets/jsa/produk/detail.js"></script>
';
	}
}