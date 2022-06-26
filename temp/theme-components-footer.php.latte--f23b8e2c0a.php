<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\templates\theme\components\footer.php.latte */
final class Templatef23b8e2c0a extends Latte\Runtime\Template
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
		if (\AbieSoft\Utilities\GetUri::currentPage() != 'registrasi' && \AbieSoft\Utilities\GetUri::currentPage() != 'login' && \AbieSoft\Utilities\GetUri::currentPage() != 'syaratketentuan' && \AbieSoft\Utilities\GetUri::currentPage() != 'login?next=http:') /* line 2 */ {
			echo '<div class="bg-white p-4">
    <div class="float ml-auto mr-auto w-[1100px]">
        <div class="w-full mb-4">
            <div class="w-[40%] float float-left p-4">
                <div class="flex justify-left items-top">
                    <div><img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 11 */;
			echo '/assets/media/images/umieali.png" class="w-[150px] ml-auto mr-auto float"></div>
                    <div class="ml-4">
                        <div class="ml-2"><span class="font-semibold text-[12pt]">Tentang Kami</span></div>
                        <ul>
                            <li><a href=\'\' class="hover:text-sky-400 hover:underline mx-2">Tentang Kami</a></li>
                            <li><a href=\'\' class="hover:text-sky-400 hover:underline mx-2">Hubungi Kami</a></li>
                            <li><a href=\'\' class="hover:text-sky-400 hover:underline mx-2">Ketentuan</a></li>
                        </ul>
                        <div class="ml-2 py-4"><hr></div>
                        <div class="ml-2 text-[10pt]">
                            <div>Kp. Asem Kulon RT 001/014 Kel. Kresek</div>
                            <div>Kec. Cibatu - Kab. Garut</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[30%] float float-left p-4">
                <div><span class="font-semibold text-[12pt]">Metode Pembayaran</span></div>
                <div>
                    <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 30 */;
			echo '/assets/media/images/bca.png" class="w-[60px] float float-left m-2">
                    <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 31 */;
			echo '/assets/media/images/bri.png" class="w-[60px] float float-left m-2">
                    <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 32 */;
			echo '/assets/media/images/gopay.png" class="w-[40px] float float-left m-2">
                    <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 33 */;
			echo '/assets/media/images/ovo.png" class="w-[40px] float float-left m-2">
                    <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 34 */;
			echo '/assets/media/images/shopee.png" class="w-[60px] float float-left m-2">
                    <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 35 */;
			echo '/assets/media/images/cimb.png" class="w-[120px] float float-left m-2">
                    <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 36 */;
			echo '/assets/media/images/dana.png" class="w-[30px] float float-left m-2">
                    <div class="clear-both"></div>
                </div>

                <div class="mt-2"><span class="font-semibold text-[12pt]">Support Pengiriman</span></div>
                <div>
                    <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 42 */;
			echo '/assets/media/images/jajapcibatu.png" class="w-[150px] float float-left m-2">
                    <div class="clear-both"></div>
                </div>
            </div>
            <div class="w-[30%] float float-left p-4">
                <div>
                    <div><span class="font-semibold text-[12pt]">Sosial Media</span> Kami,</div>
                    <div>
                        <a href=\'https://www.facebook.com\'><img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 50 */;
			echo '/assets/media/images/fb.png" class="w-[30px] float float-left m-2"></a>
                        <a href=\'https://www.instagram.com\'><img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 51 */;
			echo '/assets/media/images/ig.png" class="w-[30px] float float-left m-2"></a>
                        <a href=\'https://www.twitter.com\'><img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 52 */;
			echo '/assets/media/images/tw.png" class="w-[30px] float float-left m-2"></a>
                        <a href=\'https://api.whatsapp.com/send?phone=6289663477730\'><img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 53 */;
			echo '/assets/media/images/wa.png" class="w-[30px] float float-left m-2"></a>
                        <div class="clear-both"></div>
                    </div>
                    <div class="float-right mt-[80px]"><img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 56 */;
			echo '/assets/media/images/logo_halal.png" class="w-[40px] float float-left m-2"></div>
                </div>
            </div>
            <div class="clear-both"></div>
        </div>
    </div>
    <div class="clear-both"></div>
</div>
<div class="bg-sky-900 p-4 text-white font-semibold text-center">
&copy; 2022 | UmieAli Cake & Cookies
</div>
';
		}
	}
}
