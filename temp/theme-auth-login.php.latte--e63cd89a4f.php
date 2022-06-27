<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/../theme/auth/login.php.latte */
final class Templatee63cd89a4f extends Latte\Runtime\Template
{
	public const Blocks = [
		['title' => 'blockTitle', 'plugincss' => 'blockPlugincss', 'body' => 'blockBody', 'header' => 'blockHeader', 'content' => 'blockContent', 'pluginjs' => 'blockPluginjs', 'pagejs' => 'blockPagejs'],
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
		$this->renderBlock('header', get_defined_vars()) /* line 9 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 11 */;
		echo "\n";
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 64 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 65 */;
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


	/** {block header} on line 9 */
	public function blockHeader(array $ʟ_args): void
	{
		echo ' asdfasdsa';
	}


	/** {block content} on line 11 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <div class="text-center pt-[25px] pb-[50px] flex justify-center">
        <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 13 */;
		echo '" class="font-semibold text-[24pt] w-[100px]">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 14 */;
		echo '/assets/media/images/logo_umieali_name.png" class="w-[100px]">
        </a>
    </div>

    <div class="flex justify-center">
        <div class="max-w-[900px] flex justify-between">
            <div class="w-[400px]">
                <form method="post" action="" id="formLogin" name="formLogin">
                    <div class="bg-white shadow-md radius-md p-4">
                        <div class="text-center">
                            <div class="text-[18pt] font-semibold">Login</div>
                            <div>Belum punya akun? <a href="/registrasi" class="text-sky-700 hover:text-amber-500">Registrasi</a></div>
                        </div>
                        <div class="p-4 text-center">
                            <a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($googleLogin)) /* line 28 */;
		echo '\' type="button" class="w-[100%] px-8 py-2 border radius-lg border-gray-200 font-semibold">
                                <div class="flex justify-center aligns-center h-[25px]">
                                    <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 30 */;
		echo '/assets/media/images/logo_google.png" class="w-[25px] h-[25px] mr-[10px]">
                                    <div>Login dengan Google</div>
                                </div>
                            </a>
                        </div>
                        <div class="p-4 flex justify-center aligns-center">
                            <div class="h-[1px] w-full bg-gray-200">&nbsp;</div>
                            <div class="mx-4 mt-[-15px]">atau</div>
                            <div class="h-[1px] w-full bg-gray-200">&nbsp;</div>
                        </div>
                        <div class="px-4">
                            <div class="mb-2">
                                <label class="text-[10pt]" for="email">Email</label>
                                <input id="email" name="email" class="focus:border-sky-600 radius-lg px-4 py-2 border border-gray-200 w-full outline-none" placeholder="Email">
                            </div>
                            <div class="mb-2">
                                <label class="text-[10pt]" for="password">Password</label>
                                <input type="password" id="password" name="password" class="focus:border-sky-600 radius-lg px-4 py-2 border border-gray-200 w-full outline-none" placeholder="Password">
                            </div>
                            <div class="mb-4">
                                <input type=\'hidden\' id=\'next\' name=\'next\' value=\'';
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\Utilities\Input::get('next')) /* line 50 */;
		echo '\'>
                                ';
		echo LR\Filters::escapeHtmlText(\AbieSoft\Utilities\Generate::token()) /* line 51 */;
		echo '<input type="hidden" id="__token" name="__token" value="';
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\Magic\Reader::token()) /* line 51 */;
		echo '">
                                <button type="submit"  id="btnLogin" name="btnLogin" class="mt-2 radius-lg px-4 py-2 border bg-sky-900 hover:bg-sky-800 text-white font-semibold w-full outline-none">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="text-center mt-[50px] mb-[25px] text-[11pt] font-semibold">&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 61 */;
		echo ' | <span>Umieali Cake & Cookies</span></div>
';
	}


	/** {block pluginjs} on line 64 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 65 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 66 */;
		echo '/assets/jsa/login.js"></script>
';
	}
}
