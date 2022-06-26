<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\templates\theme\components\header.php.latte */
final class Templateb74185f843 extends Latte\Runtime\Template
{
	public const Blocks = [
		['header' => 'blockHeader'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('header', get_defined_vars()) /* line 1 */;
	}


	/** {block header} on line 1 */
	public function blockHeader(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		if (\AbieSoft\Utilities\GetUri::currentPage() != 'login' && \AbieSoft\Utilities\GetUri::currentPage() != 'registrasi' && \AbieSoft\Utilities\GetUri::currentPage() != 'syaratketentuan' && \AbieSoft\Utilities\GetUri::currentPage() != 'login?next=http:') /* line 2 */ {
			echo '<div class="h-[80px]"></div>
<div class="fixed top-0 left-0 right-0 z-[999]">
    <div class="bg-white p-4 shadow-sm">
        <div class="flex justify-center">
            <div class="">
                <div class="lg:w-[1100px] xl:w-[1100px] md:lg:w-full sm:w-full w-full flex justify-between items-center">
                    <div class="w-[300px] flex justify-start items-center">
                        ';
			echo LR\Filters::escapeHtmlText($authButton) /* line 13 */;
			echo '
                    </div>
                    <div class="w-[300px] flex justify-center">
                        <a href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 16 */;
			echo '"><img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 16 */;
			echo '/assets/media/images/logo_umieali_name.png" class="w-[100px]"></a>
                    </div>
                    <div class="w-[300px] flex justify-end items-center">
                        <a href="/order/checkout" class="mr-4 font-semibold text-[12pt] hover:bg-slate-200 px-4 py-2 rounded-lg cursor-pointer">
                            <span>Rp. <span id=\'jharga\'>0</span>,-</span>
                            <i class="las la-shopping-bag text-[18pt]"></i>
                            <span id=\'jitem\'>0</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute w-[1100px]">
                <div class="relative w-full">
                    <div id="OpsiProfile" class="hidden">
                        <div id="LoadingOpsi">
                            <div class=\'p-4 overflow-hidden\'>
                                <div class="py-4">
                                    <div class="flex justify-center mb-2">
                                        <div class="w-[80px] h-[80px] rounded-[50%] overflow-hidden bg-gray-200 shimmer"></div>
                                    </div>
                                    <div class="flex justify-center">
                                        <div class="text-center w-[90px] h-[20px] bg-gray-200 shimmer"></div>
                                    </div>
                                    <div class="flex justify-center mt-2">
                                        <div class="text-[10pt] w-[130px] h-[15px] text-center font-normal bg-gray-200 shimmer"></div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <hr>
                                </div>
                                <div class="py-2 flex justify-between items-center">
                                    <div><a class="w-[65px] h-[30px] rounded-md py-2 bg-gray-200 shimmer text-white"></a></div>
                                    <div><a class="bg-gray-200 shimmer w-[25px] h-[25px]"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
';
		}
	}
}
