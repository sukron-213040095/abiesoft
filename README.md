# AbieSoft
Singkatnya abiesoft itu berasal dari kata Abie dan Software. Abie sendiri merupakan panggilan saya dan software adalah perangkat lunak.
AbieSoft ini kerangka untuk membuat aplikasi berbasis php. Teknologi yang digunakannya meliputi html, css, javascript, php, latte template engine dan tailwind css.

# Spesifikasi
php yang dibutuhkan php 8.0, karena dalam pembuatannya saya banyak menggunakan fungsi <code>match</code> fitur baru php yang dimana fungsi tersebut baru ada di php 8.0.
sehingga jika di local kita menggunakan php 8 ke bawah akan ada error.

# Instalasi
Download source code abiesoft, 
Kemudian buat nama database baru di mysql.
lalu masuk ke folder source code abiesoft yang sudah didownload, lakukan konfigurasi di file <code>.env</code>, 
lakukan konfigurasi databasenya seperti DB_HOT, DB_NAME, DB_USER dan DB_PASS. lalu buka terminal yang mengarah ke folder abiesoft dan jalankan perintah
<code>php abiesoft db:import</code> dan lakukan perintah lagi <code>php abiesoft generate:api</code> kemudian copy kan apikeynya ke file <code>.env</code>
dan simpan apikey yang sudah dicopy tadi ke APIKEY.

# Menjalankan Aplikasi
<div>Jika anda menggunakan valet. Pada setingan BASEURL pada <code>.env</code> bisa diisikan domain sesuai valetnya misalkan <code>http://abiesoft.test</code> dan
untuk WEB_DOMAIN nya bisa dikosongkan</div>
<div>Jika anda menginginkan menyimpan folder abiesoft disembarang tempat anda bisa langsung menjalankan aplikasinya dengan menggunakan perintah 
<code>php abiesoft start</code>. tapi sebelum menjalankan perinta tersebut pastikan dulu WEB_DOMAIN berupa ip local misalkan <code>WEB_DOMAIN=127.0.0.1:8000</code> maka 
<code>BASEURL=http://127.0.0.1:8000</code> baru kemudian jalankan perintah <code>php abiesoft start</code></div>
