<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/produk/detail.php.latte */
final class Template3443c85a7e extends Latte\Runtime\Template
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
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 68 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 69 */;
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
		echo 'bg-slate-100';
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
                    <form method="post" action="" id="formKeranjang" name="formKeranjang" onSubmit="return setKeKeranjang()">
                        <div class="relative h-[34px]">
                            <input type="number" onBlur="if(this.value == \'\'){ this.value = 1; hitungHarga(this.value); }" onKeyUp="hitungHarga(this.value)" class="absolute w-[150px] text-center border-[1px] border-solid border-slate-200 p-1 outline-none font-bold" value="1" id="qty" name="qty">
                            <input type="hidden" id="idproduk" name="idproduk" value="';
		echo LR\Filters::escapeHtmlAttr($id) /* line 28 */;
		echo '">
                            <input type="hidden" id="iptstok" name="iptstok" value="0">
                            <input type="hidden" id="hargaitem" name="hargaitem" value="0">
                            <input type="hidden" id="hargaasli" name="hargaasli" value="0">
                            <button type=\'button\' class="absolute font-bold text-[14pt] mt-[3px] ml-[10px] hover:text-sky-400" onClick=\'minVal()\'><i class="las la-minus"></i></button>
                            <button type=\'button\' class="absolute font-bold text-[14pt] mt-[3px] ml-[125px] hover:text-sky-400" onClick=\'plusVal()\'><i class="las la-plus"></i></button>
                            <div class="absolute right-0 mt-[5px]"><span class="ml-2">Stok </span><span class="font-semibold px-2 py-1 text-white rounded-sm bg-sky-400" id="stok">0</span></div>
                            <div class="w-full pt-[36px] text-red-600 text-[10pt]" id="msgErr"></div>
                        </div>
                        <div class="mt-4">
                            <button type="button" class="font-semibold text-[10pt] text-sky-400" onClick="tambahCatatan()"><i class="las la-pen"></i> Tambah Catatan</button>
                            <div id=\'boxCatatan\' class="hidden"><input type=\'text\' id="catatan" name="catatan" class="px-2 py-2 w-full rounded-md border-[2px] border-solid border-gray-300 outline-none" placeholder="Catatan pembelian"></div>
                        </div>
                        <div id="transaksi" class="mt-4 mb-4"></div>
                        <div class="relative pt-[20px]">
                            <div id=\'totalHargaAsli\' class="absolute line-through right-0 mt-[-20px]">Rp. 0</div>
                            <div class="flex justify-between items-center">
                                <div>Subtotal</div>
                                <div class="font-bold text-[18pt]">Rp. <span id="subtotal">0</span></div>
                            </div>
                        </div>
';
		if (\AbieSoft\Auth\AuthController::isLogin()) /* line 49 */ {
			echo '                            <div class="mt-4 grid grid-cols-2 gap-2">
                                <button class="bg-sky-400 text-white px-4 py-2 rounded-md hover:bg-[rgba(56,189,248,.8)]" type=\'submit\' id=\'btnKeranjang\'><i class="las la-plus"></i> Keranjang</button>
                                <button class="border-[2px] border-solid border-sky-400 text-sky-400 px-8 py-2 rounded-md hover:border-[rgba(56,189,248,.8)]" type=\'button\'>Beli</button>
                            </div>
';
		} else /* line 54 */ {
			echo '                            <div class="mt-4 grid grid-cols-1 gap-2">
                                <button class="border-[2px] w-full border-solid border-sky-400 text-sky-400 px-8 py-2 rounded-md hover:border-[rgba(56,189,248,.8)]" type=\'button\' onClick="loginNext(window.location.href)">Login</button>
                            </div>
';
		}
		echo '                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear-both"></div>
';
	}


	/** {block pluginjs} on line 68 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 69 */
	public function blockPagejs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script>
let SLUG = ';
		echo LR\Filters::escapeJs($slug) /* line 71 */;
		echo ';
let ID = ';
		echo LR\Filters::escapeJs($id) /* line 72 */;
		echo ';
</script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 74 */;
		echo '/assets/jsa/produk/detail.js"></script>
';
	}
}
