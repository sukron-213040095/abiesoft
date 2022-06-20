<?php

use Latte\Runtime as LR;

/** source: D:\app\test\abiesoft\app\Http/../../templates/page/../theme/auth/syaratketentuan.php.latte */
final class Templateea09b37ad6 extends Latte\Runtime\Template
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
		$this->renderBlock('pluginjs', get_defined_vars()) /* line 41 */;
		$this->renderBlock('pagejs', get_defined_vars()) /* line 42 */;
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
		echo '    <div class="text-center pt-[25px] pb-[50px] flex justify-center">
        <h2 class="font-semibold text-[24pt] w-[100px]"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 11 */;
		echo '/assets/media/images/logo_umieali_name.png"></h2>
    </div>

    <div class="flex justify-center">
        <div class="w-[700px] p-4 relative">
            <div class="text-[18pt] mb-20 mt-20 font-semibold">Syarat dan Ketentuan</div>
            <div class="mb-4">Selamat datang di www.umieali.com.</div>
            <div class="absolute right-0 w-[250px] top-[-30px]"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 18 */;
		echo '/assets/media/ilustrasi/term.png"></div>
            <div class="text-justify">
                Syarat & ketentuan yang ditetapkan di bawah ini mengatur pemakaian jasa yang ditawarkan oleh Umieali Cake & Cookies terkait penggunaan situs www.umieali.com. Pengguna disarankan membaca dengan seksama karena dapat berdampak kepada hak dan kewajiban Pengguna di bawah hukum.
                Dengan mendaftar dan/atau menggunakan situs www.umieali.com, maka pengguna dianggap telah membaca, mengerti, memahami dan menyetujui semua isi dalam Syarat & ketentuan. Syarat & ketentuan ini merupakan bentuk kesepakatan yang dituangkan dalam sebuah perjanjian yang sah antara Pengguna dengan Umieali Cake & Cookies. Jika pengguna tidak menyetujui salah satu, pesebagian, atau seluruh isi Syarat & ketentuan, maka pengguna tidak diperkenankan menggunakan layanan di www.umieali.com.
            </div>
            <ul class="ml-[15px] list-decimal text-justify">
                <li>Pengguna dengan ini menyatakan bahwa pengguna adalah orang yang cakap dan mampu untuk mengikatkan dirinya dalam sebuah perjanjian yang sah menurut hukum.</li>
                <li>Umieali Cake & Cookies tidak menerima biaya apapun dalam pendaftaran.</li>
                <li>Pengguna yang telah mendaftar berhak bertindak sebagai pembeli</li>
                <li>Pengguna memahami dan menyetujui untuk tidak menggunakan, memodifikasi, membongkar, melakukan kegiatan penggandaan, menjual kembali dan/atau kegiatan mengeksploitasi lainnya pada sistem perangkat lunak atau perangkat keras, jaringan dan/atau data Situs/Aplikasi dengan teknologi otomatis atau manual tanpa adanya izin dari Umieali Cake & Cookies.</li>
                <li>Pengguna menyetujui untuk tidak menggunakan dan/atau mengakses sistem Umieali Cake & Cookies secara langsung atau tidak langsung baik keseluruhan atau sebagian dengan virus, perangkat lunak, atau teknologi lainnya yang dapat mengakibatkan melemahkan, merusak, mengganggu atau menghambat, membatasi dan/atau mengambil alih fungsionalitas serta integritas dari sistem perangkat lunak atau perangkat keras, jaringan, dan/atau data pada Situs/Aplikasi Umieali Cake & Cookies.</li>
                <li>Pengguna memiliki hak untuk melakukan perubahan pada nama akun sebanyak jumlah kesempatan yang disediakan dan Umieali Cake & Cookies berhak merubah jumlah kesempatan perubahan pada nama akun. Pengguna harus memastikan bahwa perubahan pada nama akun telah sesuai dengan yang diinginkan dan bertanggung jawab secara pribadi atas perubahan nama akun yang dilakukan oleh Pengguna. Pengguna menyetujui bahwa setiap perikatan yang terjadi sebelum perubahan nama tetap mengikat Pengguna.</li>
                <li>Pengguna bertanggung jawab secara pribadi untuk menjaga kerahasiaan akun dan password untuk semua aktivitas yang terjadi dalam akun Pengguna.</li>
                <li>Umieali Cake & Cookies tidak akan meminta username, password maupun kode SMS verifikasi atau kode OTP milik akun Pengguna untuk alasan apapun, oleh karena itu Umieali Cake & Cookies menghimbau Pengguna agar tidak memberikan data tersebut maupun data penting lainnya kepada pihak yang mengatasnamakan Umieali Cake & Cookies atau pihak lain yang tidak dapat dijamin keamanannya.</li>
                <li>Pengguna setuju untuk memastikan bahwa Pengguna keluar dari akun di akhir setiap sesi dan memberitahu Umieali Cake & Cookies jika ada penggunaan tanpa izin atas sandi atau akun Pengguna.</li>
                <li>Pengguna dengan ini menyatakan bahwa Umieali Cake & Cookies tidak bertanggung jawab atas kerugian ataupun kendala yang timbul atas penyalahgunaan akun Pengguna yang diakibatkan oleh kelalaian Pengguna, termasuk namun tidak terbatas pada menyetujui dan/atau memberikan akses masuk akun yang dikirimkan oleh Umieali Cake & Cookies melalui pesan notifikasi kepada pihak lain melalui perangkat Pengguna, meminjamkan akun kepada pihak lain, mengakses link atau tautan yang diberikan oleh pihak lain, memberikan atau memperlihatkan kode verifikasi (OTP), password atau email kepada pihak lain, maupun kelalaian Pengguna lainnya yang mengakibatkan kerugian ataupun kendala pada akun Pengguna.</li>
            </ul>
        </div>
    </div>

    <div class="text-center mt-[50px] mb-[25px] text-[11pt] font-semibold">&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 38 */;
		echo ' | <span>Umieali Cake & Cookies</span></div>
';
	}


	/** {block pluginjs} on line 41 */
	public function blockPluginjs(array $ʟ_args): void
	{
	}


	/** {block pagejs} on line 42 */
	public function blockPagejs(array $ʟ_args): void
	{
		echo '    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(\AbieSoft\Utilities\Config::envReader('BASEURL'))) /* line 43 */;
		echo '/assets/jsa/registrasi.js"></script>
';
	}
}
