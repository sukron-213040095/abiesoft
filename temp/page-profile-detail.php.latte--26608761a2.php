<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/profile/detail.php.latte */
final class Template26608761a2 extends Latte\Runtime\Template
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
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 79 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 80 */;
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
		echo '<div class="flex justify-center mb-[60px]">
    <div class="w-[700px] mt-[50px] relative">
        <div class="bg-white shadow-sm bg-white shadow-sm right-0 min-h-[200px] rounded-lg overflow-hidden">
            <div class="flex justify-left items-center">
                <div id="btnBiodata" onClick="showTabBiodata()" class="cursor-pointer px-6 text-gray-300 text-sky-400 font-semibold border-b-[2px] border-solid border-sky-400 pt-4 pb-[14px]">Biodata</div>
                <div id="btnAlamat" onClick="showTabAlamat()" class="cursor-pointer py-4 px-6 text-gray-300 hover:text-gray-500 font-semibold">Alamat</div>
                <div id="btnPembayaran" onClick="showTabpembayaran()" class="cursor-pointer py-4 px-6 text-gray-300 hover:text-gray-500 font-semibold">Pembayaran</div>
            </div>
            <hr>
            <div id="profilDetail">
                <div class="p-6">
                    <div class="p-2 float-left w-[30%] border-[1px] border-solid border-gray-100">
                        <div>
                            <div class="w-full h-[200px] bg-slate-100 shimmer"></div>
                        </div>
                    </div>
                    <div class="float-left w-[70%] pl-4 pb-4 mt-[-35px]">
                        <div class="font-semibold pb-3"><div class="w-90px] h-[20px] bg-slate-100 shimmer"></div></div>
                        <div class="flex justify-left items-top pb-1">
                            <div class="w-[150px] h-[20px]">
                                <div class="w-[100px] h-[20px] bg-slate-100 shimmer"></div>
                            </div>
                        </div>
                        <div class="flex justify-left items-top pb-1">
                            <div class="w-[150px] h-[20px]">
                                <div class="w-[140px] h-[20px] bg-slate-100 shimmer"></div>
                            </div>
                        </div>
                        <div class="flex justify-left items-top pb-1">
                            <div class="w-[150px] h-[20px]">
                                <div class="w-[130px] h-[20px] bg-slate-100 shimmer"></div>
                            </div>
                        </div>
                        <div class="flex justify-left items-top pb-1">
                            <div class="w-[150px] h-[20px]">
                                <div class="w-[80px] h-[20px] bg-slate-100 shimmer"></div>
                            </div>
                        </div>
                        <div class="flex justify-left items-top pb-1">
                            <div class="w-[150px] h-[20px]">
                                <div class="w-[80px] h-[20px] bg-slate-100 shimmer"></div>
                            </div>
                        </div>
                        <div class="font-semibold pb-3 pt-3"><div class="w-[160px] h-[20px] bg-slate-100 shimmer"></div></div>
                        <div class="flex justify-left items-top pb-1">
                            <div class="w-[150px] h-[20px]">
                                <div class="w-[140px] h-[20px] bg-slate-100 shimmer"></div>
                            </div>
                        </div>
                        <div class="font-semibold pb-3 pt-3"><div class="w-[110px] h-[20px] bg-slate-100 shimmer"></div></div>
                        <div class="flex justify-left items-top pb-1">
                            <div class="w-[150px] h-[20px]">
                                <div class="w-[100px] h-[20px] bg-slate-100 shimmer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <hr class="my-2">
                    <div class="flex justify-center items-center">
                        <div class=\'bg-slate-100 text-white px-6 py-2 rounded-md text-[10pt] my-2 w-[100px] h-[35px] shimmer\'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup"></div>
';
	}


	/** {block pluginjs} on line 79 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 80 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 81 */;
		echo '/assets/jsa/profile/detail.js"></script>
';
	}
}
