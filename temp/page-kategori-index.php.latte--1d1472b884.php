<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/kategori/index.php.latte */
final class Template1d1472b884 extends Latte\Runtime\Template
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
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 601 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 602 */;
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
    <div class="w-full text-center p-8">
        <h2 class="text-[20pt] font-semibold">';
		echo LR\Filters::escapeHtmlText($nama) /* line 12 */;
		echo '</h2>

        <div class="category mt-8 mb-8">
            <div class="grid grid-cols-7 gap-4">
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 17 */;
		echo '/kategori/aneka-bolu" class="border-[1px] border-solid border-slate-300 hover:border-slate-400 rounded-[25px] text-[10pt] text-center py-1 px-2 text-bold cursor-pointer">
                    Aneka Bolu
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 20 */;
		echo '/kategori/kue-pengantin" class="border-[1px] border-solid border-slate-300 hover:border-slate-400 rounded-[25px] text-[10pt] text-center py-1 px-2 text-bold cursor-pointer">
                    Kue Pengantin
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 23 */;
		echo '/kategori/kue-khitan" class="border-[1px] border-solid border-slate-300 hover:border-slate-400 rounded-[25px] text-[10pt] text-center py-1 px-2 text-bold cursor-pointer">
                    Kue Khitan
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 26 */;
		echo '/kategori/kue-ulang-tahun" class="border-[1px] border-solid border-slate-300 hover:border-slate-400 rounded-[25px] text-[10pt] text-center py-1 px-2 text-bold cursor-pointer">
                    Kue Ulang Tahun
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 29 */;
		echo '/kategori/-tumpeng" class="border-[1px] border-solid border-slate-300 hover:border-slate-400 rounded-[25px] text-[10pt] text-center py-1 px-2 text-bold cursor-pointer">
                    Tumpeng
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 32 */;
		echo '/kategori/-pudding" class="border-[1px] border-solid border-slate-300 hover:border-slate-400 rounded-[25px] text-[10pt] text-center py-1 px-2 text-bold cursor-pointer">
                    Puding
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 35 */;
		echo '/kategori/snack-box" class="border-[1px] border-solid border-slate-300 hover:border-slate-400 rounded-[25px] text-[10pt] text-center py-1 px-2 text-bold cursor-pointer">
                    Snack Box
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="AllItem mb-8">
            <div id="itemKategori">
                <div class="grid grid-cols-6 gap-4">
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md overflow-hidden border-solid border-[2px] border-white">
                        <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                            <div class="w-full h-[180px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-[10pt] font-bold leading-[15px]"><div class="w-full h-[17px] bg-slate-100 shimmer"></div></h2>
                            <p class="text-[8pt] text-justify my-2 leading-[15px]"><div class="w-full h-[13px] bg-slate-100 shimmer"></div></p>
                            <div class="flex justify-between items-center">
                                <div class="text-[12pt] font-bold text-sky-500"><div class="w-full h-[20px] bg-slate-100 shimmer"></div></div>
                                <div class="text-[14pt] font-bold text-red-500"></div>
                            </div>
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


	/** {block pluginjs} on line 601 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 602 */
	public function blockPagejs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script>let SLUG = ';
		echo LR\Filters::escapeJs($slug) /* line 603 */;
		echo ';</script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 604 */;
		echo '/assets/jsa/kategori/list.js"></script>
';
	}
}
