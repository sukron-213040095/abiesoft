<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/home/index.php.latte */
final class Template2bae4cf2c3 extends Latte\Runtime\Template
{
	public const Blocks = [
		['title' => 'blockTitle', 'plugincss' => 'blockPlugincss', 'body' => 'blockBody', 'content' => 'blockContent', 'pluginjs' => 'blockPluginjs', 'pagejs' => 'blockPagejs', 'footer' => 'blockFooter'],
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
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 338 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 339 */;
		echo "\n";
		$this->renderBlock('footer', get_defined_vars()) /* line 343 */;
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
		echo '    <div class="float w-[1100px] ml-auto mr-auto">
        <div class="owl-carousel">
            <div><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 13 */;
		echo '/assets/media/images/img_1.png" class="w-[100%] block"></div>
            <div><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 14 */;
		echo '/assets/media/images/img_2.png" class="w-[100%] block"></div>
            <div><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 15 */;
		echo '/assets/media/images/img_3.png" class="w-[100%] block"></div>
        </div>
        <div class="text-center">
            <div class="text-[20pt] font-semibold">Rayakan pesta bersama yang spesial dari kreasi kami</div>
            <div class="text-[20pt] font-semibold">Umieali cake and cookies</div>
        </div>

        <div class="category mt-8 mb-8">
            <div class="grid grid-cols-7 gap-4">
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 26 */;
		echo '/kategori/aneka-bolu" class="bg-slate-100 rounded-[10px] overflow-hidden hover:opacity-[.9] cursor-pointer">
                    <div class="w-[1500px] h-[150px] overflow-hidden">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 28 */;
		echo '/assets/media/images/img_1.png" class="w-[150px] h-[150px] object-cover">
                    </div>
                    <div class="absolute font-semibold text-[10pt] p-2 bg-yellow-300 mt-[-60px] rounded-br-[25px] pr-[20px]">Aneka Bolu</div>
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 32 */;
		echo '/kategori/kue-pernikahan" class="bg-slate-100 rounded-[10px] overflow-hidden hover:opacity-[.9] cursor-pointer">
                    <div class="w-[1500px] h-[150px] overflow-hidden">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 34 */;
		echo '/assets/media/images/img_1.png" class="w-[150px] h-[150px] object-cover">
                    </div>
                    <div class="absolute font-semibold text-[10pt] p-2 bg-yellow-300 mt-[-60px] rounded-br-[25px] pr-[20px]">Kue Pernikahan</div>
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 38 */;
		echo '/kategori/kue-ulang-tahun" class="bg-slate-100 rounded-[10px] overflow-hidden hover:opacity-[.9] cursor-pointer">
                    <div class="w-[1500px] h-[150px] overflow-hidden">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 40 */;
		echo '/assets/storage/images/ultah_1.jpg" class="w-[150px] object-cover">
                    </div>
                    <div class="absolute font-semibold text-[10pt] p-2 bg-yellow-300 mt-[-60px] rounded-br-[25px] pr-[20px]">Kue Ulang Tahun</div>
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 44 */;
		echo '/kategori/nasi-tumpeng" class="bg-slate-100 rounded-[10px] overflow-hidden hover:opacity-[.9] cursor-pointer">
                    <div class="w-[1500px] h-[150px] overflow-hidden">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 46 */;
		echo '/assets/media/images/img_1.png" class="w-[150px] h-[150px] object-cover">
                    </div>
                    <div class="absolute font-semibold text-[10pt] p-2 bg-yellow-300 mt-[-60px] rounded-br-[25px] pr-[20px]">Nasi Tumpeng</div>
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 50 */;
		echo '/kategori/aneka-puding" class="bg-slate-100 rounded-[10px] overflow-hidden hover:opacity-[.9] cursor-pointer">
                    <div class="w-[1500px] h-[150px] overflow-hidden">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 52 */;
		echo '/assets/media/images/img_1.png" class="w-[150px] h-[150px] object-cover">
                    </div>
                    <div class="absolute font-semibold text-[10pt] p-2 bg-yellow-300 mt-[-60px] rounded-br-[25px] pr-[20px]">Aneka Puding</div>
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 56 */;
		echo '/kategori/snackbox" class="bg-slate-100 rounded-[10px] overflow-hidden hover:opacity-[.9] cursor-pointer">
                    <div class="w-[1500px] h-[150px] overflow-hidden">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 58 */;
		echo '/assets/storage/images/snack_1.jpg" class="w-[150px] h-[150px] object-cover">
                    </div>
                    <div class="absolute font-semibold text-[10pt] p-2 bg-yellow-300 mt-[-60px] rounded-br-[25px] pr-[20px]">Snackbox</div>
                </a>
                <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 62 */;
		echo '/kategori/aneka-jajanan" class="bg-slate-100 rounded-[10px] overflow-hidden hover:opacity-[.9] cursor-pointer">
                    <div class="w-[1500px] h-[150px] overflow-hidden">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 64 */;
		echo '/assets/media/images/img_1.png" class="w-[150px] h-[150px] object-cover">
                    </div>
                    <div class="absolute font-semibold text-[10pt] p-2 bg-yellow-300 mt-[-60px] rounded-br-[25px] pr-[20px]">Aneka Jajanan</div>
                </a>
            </div>
        </div>
        <div class="palinglaku mt-8 mb-8 px-4 pt-[40px] rounded-t-md" style="background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(226,232,240,1) 50%);">
            <h2 class="pb-[40px] text-center w-full block font-semibold text-[20pt]">Paling Laku</h2>
            <div id=\'dataPalingLaku\'>
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
                </div>
            </div>
        </div>

        <div class="lagipromo mt-8 mb-8 px-4 pt-[40px] rounded-t-md" style="background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(226,232,240,1) 50%);">
            <h2 class="pb-[40px] text-center w-full block font-bold text-[20pt]">Lagi Promo Nie.. Lumayan Hemat Beberapa Persen. Ayo!</h2>
            <div id=\'dataDiskon\'>
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
                </div>
            </div>
        </div>

        <div><hr></div>

        <div class="AllItem mt-8 mb-8">
            <div id="dataTerbaru">
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
                </div>
            </div>
        </div>



        
    </div>
    <div class=\'clear-both\'></div>
';
	}


	/** {block pluginjs} on line 338 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 339 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 340 */;
		echo '/assets/jsa/home/carousel.js"></script>
';
	}


	/** {block footer} on line 343 */
	public function blockFooter(array $ʟ_args): void
	{
	}
}
