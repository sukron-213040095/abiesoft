$("form#formRegistrasi").on("submit", function(e) {
    e.preventDefault();
    let nama = document.forms["formRegistrasi"]["nama"].value;
    let email = document.forms["formRegistrasi"]["email"].value;
    let password = document.forms["formRegistrasi"]["password"].value;
    let konfirmasipassword =
        document.forms["formRegistrasi"]["konfirmasipassword"].value;
    let btnRegistrasi = document.getElementById("btnRegistrasi");
    if (setText(nama)) {
        toastr.info("Nama " + setText(nama));
        document.getElementById("nama").focus();
        return false;
    } else if (setEmail(email)) {
        toastr.info(setEmail(email));
        document.getElementById("email").focus();
        return false;
    } else if (setText(password)) {
        toastr.info("Password " + setText(password));
        document.getElementById("password").focus();
        return false;
    } else if (setText(konfirmasipassword)) {
        toastr.info("Konfirmasi Password " + setText(konfirmasipassword));
        document.getElementById("konfirmasipassword").focus();
        return false;
    } else if (password !== konfirmasipassword) {
        toastr.info("Konfirmasi Password tidak sama");
        document.getElementById("konfirmasipassword").focus();
        return false;
    } else {
        let formData = new FormData(this);
        let doAction = BASEURL + "/set_registrasi";
        btnRegistrasi.setAttribute("disabled", true);
        btnRegistrasi.innerHTML = `Mendaftarkan..`;
        $.ajax({
            url: doAction,
            type: "POST",
            data: formData,
            success: function(msg) {
                if (msg == "Berhasil") {
                    toastr.success("User baru telah dibuat");
                    document.getElementById('registrasiComplete').innerHTML = `
                        <div class="bg-white shadow-md radius-md p-4">
                            <div class="text-center">
                                <div class="text-[18pt] font-semibold">Registrasi Berhasil</div>
                                <div class='mt-4'>
                                    <div class="p-2 bg-green-500 text-white">Registrasi anda berhasil, anda sekarang terdaftar di web umieali cake & cookies. Untuk menggunakan fitur di web ini silahkan login dengan akun anda.</div>
                                </div>
                                <div class="mt-2 flex justify-center">
                                    <a href='/login'  id="btnRegistrasi" name="btnRegistrasi" class="mt-2 radius-lg px-4 py-2 border bg-sky-900 hover:bg-sky-800 text-white font-semibold w-full outline-none">Login</a>
                                </div>
                            </div>
                        </div>
                    `;
                } else if (msg == "Cancel") {
                    toastr.error("Gagal registrasi user");
                    btnRegistrasi.removeAttribute("disabled");
                    btnRegistrasi.innerHTML = `Registrasi`;
                } else {
                    toastr.info(msg);
                    btnRegistrasi.removeAttribute("disabled");
                    btnRegistrasi.innerHTML = `Registrasi`;
                }
            },
            cache: false,
            contentType: false,
            processData: false,
        });
        return false;
    }
});