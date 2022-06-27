<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/../theme/auth/registrasi.php.latte */
final class Template70ebc2cc6f extends Latte\Runtime\Template
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
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 81 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 82 */;
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
		echo 'bg-slate-50';
	}


	/** {block content} on line 9 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <div class="text-center pt-[25px] pb-[50px] flex justify-center">
        <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 11 */;
		echo '" class="font-semibold text-[24pt] w-[100px]">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 12 */;
		echo '/assets/media/images/logo_umieali_name.png" class="w-[100px]">
        </a>
    </div>

    <div class="flex justify-center">
        <div class="max-w-[900px] flex justify-between">
            <div class="w-[400px]">
                <form method="post" action="" id="formRegistrasi" name="formRegistrasi">
                    <div class="bg-white shadow-md radius-md p-4">
                        <div class="text-center">
                            <div class="text-[18pt] font-semibold">Registrasi</div>
                            <div>Sudah punya akun? <a href="/login" class="text-sky-700 hover:text-amber-500">Masuk</a></div>
                        </div>

';
		if ($googleAkun == 'Tidak Ada') /* line 29 */ {
			echo '
                        <div class="p-4 text-center">
                            <a href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 32 */;
			echo '/registrasiByGoogle" type="button" class="w-[100%] px-8 py-2 border radius-lg border-gray-200 font-semibold">
                                <div class="flex justify-center aligns-center">
                                <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 34 */;
			echo '/assets/media/images/logo_google.png" class="w-[25px] h-[25px] mr-[10px]">
                                    <div>Daftar dengan Google</div>
                                </div>
                            </a>
                        </div>
                        <div class="p-4 flex justify-center aligns-center">
                            <div class="h-[1px] w-full bg-gray-200">&nbsp;</div>
                            <div class="mx-4 mt-[-15px]">atau</div>
                            <div class="h-[1px] w-full bg-gray-200">&nbsp;</div>
                        </div>

';
		}
		echo '
                        <div class="px-4">
                            <div class="mb-2">
                                <label class="text-[10pt]" for="nama">Nama Lengkap</label>
                                <input id="nama" name="nama" class="focus:border-sky-600 radius-lg px-4 py-2 border border-gray-200 w-full outline-none" placeholder="Nama" value="';
		echo LR\Filters::escapeHtmlAttr($nama) /* line 50 */;
		echo '">
                            </div>
                            <div class="mb-2">
                                <label class="text-[10pt]" for="email">Email</label>
                                <input id="email" name="email" class="focus:border-sky-600 radius-lg px-4 py-2 border border-gray-200 w-full outline-none" placeholder="Email" value="';
		echo LR\Filters::escapeHtmlAttr($email) /* line 54 */;
		echo '">
                            </div>
                            <div class="mb-2">
                                <label class="text-[10pt]" for="password">Password</label>
                                <input type="password" id="password" name="password" class="focus:border-sky-600 radius-lg px-4 py-2 border border-gray-200 w-full outline-none" placeholder="Password">
                            </div>
                            <div class="mb-2">
                                <label class="text-[10pt]" for="konfirmasipassword">Konfirmasi Password</label>
                                <input type="password" id="konfirmasipassword" name="konfirmasipassword" class="focus:border-sky-600 radius-lg px-4 py-2 border border-gray-200 w-full outline-none" placeholder="Konfirmasi Password">
                            </div>
                            <div class="mb-4">
                                ';
		echo LR\Filters::escapeHtmlText(\AbieSoft\Utilities\Generate::token()) /* line 65 */;
		echo '<input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\Magic\Reader::token()) /* line 65 */;
		echo '">
                                <button type="submit"  id="btnRegistrasi" name="btnRegistrasi" class="mt-2 radius-lg px-4 py-2 border bg-sky-900 hover:bg-sky-800 text-white font-semibold w-full outline-none">Daftar</button>
                            </div>
                            <div class="mb-4 text-[10pt] text-center">
                                Dengan mendaftar berarti anda menyetujui <a class="text-sky-700 hover:text-amber-500" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 69 */;
		echo '/syaratketentuan" target="_blank">Syarat dan Ketentuan</a> toko kami.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="text-center mt-[50px] mb-[25px] text-[11pt] font-semibold">&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 78 */;
		echo ' | <span>Umieali Cake & Cookies</span></div>
';
	}


	/** {block pluginjs} on line 81 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 82 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 83 */;
		echo '/assets/jsa/registrasi.js"></script>
';
	}
}
