function showTabBiodata (){
    document.getElementById('btnBiodata').setAttribute('class', 'cursor-pointer px-6 text-gray-300 text-sky-400 font-semibold border-b-[2px] border-solid border-sky-400 pt-4 pb-[14px]');
    document.getElementById('btnProduk').setAttribute('class', 'cursor-pointer py-4 px-6 text-gray-300 hover:text-gray-500 font-semibold');
    document.getElementById('btnAlamat').setAttribute('class', 'cursor-pointer py-4 px-6 text-gray-300 hover:text-gray-500 font-semibold');
    document.getElementById('btnPembayaran').setAttribute('class', 'cursor-pointer py-4 px-6 text-gray-300 hover:text-gray-500 font-semibold');
    
    // Shimmer
    document.getElementById('profilDetail').innerHTML = `
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
                <div class='bg-slate-100 text-white px-6 py-2 rounded-md text-[10pt] my-2 w-[100px] h-[35px] shimmer'></div>
            </div>
        </div>
    `; 
    
    let url = BASEURL + "/webservice/user?apikey="+APIKEY+"&tab=biodata";
    $.ajax({
        url: url,
        success: function(msg) {

            if(msg.split("|").length == 8){
                let nama = msg.split("|")[0];
                let tgllahir = msg.split("|")[1];
                let jeniskelamin = msg.split("|")[2];
                let email = msg.split("|")[3];
                let photo = msg.split("|")[4];
                let nohp = msg.split("|")[5];
                let pertanyaan = msg.split("|")[6];
                let tgledit = msg.split("|")[7];
                
                document.getElementById('profilDetail').innerHTML = `
                    <div class="p-6">
                        <div class="p-2 float-left w-[30%] border-[1px] border-solid border-gray-100">
                            <div>
                                <img id='pp2' src='`+photo+`' class="w-full">
                            </div>
                            <div class='relative'>
                                <form onSubmit="return uploadPhoto()" method='post' action='' id='formUpload' name='formUpload' enctype="multipart/form-data">
                                    <input type='file' id='photo' name='photo' class='w-full absolute h-[45px] opacity-0 cursor-pointer'>
                                    <input type='hidden' id='model' name='model' value='upload'>
                                    <div class="px-4 py-2 font-semibold hover:text-sky-400 cursor-pointer text-center">Browse</div>
                                    <button type='submit' id='btnUpload' class='py-2 px-4 text-[10pt] bg-sky-400 text-white hover:bg-sky-300 w-full'>Upload</button>
                                </form>
                            </div>
                        </div>
                        <div class="float-left w-[70%] pl-4 pb-4">
                            <div class="font-semibold pb-3">Biodata</div>
                            <div class="flex justify-left items-top pb-2">
                                <div class="absolute w-[150px]">Nama</div>
                                <div class='float ml-[150px]'><span id='showNama'>`+nama+`</span> <button name="`+nama+`" id='onNama' onClick="ubahNama(this.name)" class='text-sky-400 ml-4 font-semibold'><i class="las la-edit"></i></button></div>
                                <div cleass='clear-both'></div>
                            </div>
                            <div class="flex justify-left items-top pb-2">
                                <div class="absolute w-[150px]">Tanggal Lahir</div>
                                <div class='float ml-[150px]'><span id='showTglLahir'>`+tgllahir+`</span> <button name='`+tgledit+`' id='onTglLahir' onClick="ubahTanggalLahir(this.name)" class='text-sky-400 ml-4 font-semibold'><i class="las la-edit"></i></button></div>
                                <div cleass='clear-both'></div>
                            </div>
                            <div class="flex justify-left items-top pb-2">
                                <div class="absolute w-[150px]">Jenis Kelamin</div>
                                <div class='float ml-[150px]'><span id='showJenisKelamin'>`+jeniskelamin+`</span> <button name='`+jeniskelamin+`' id='onJenisKelamin' onClick="ubahJenisKelamin(this.name)" class='text-sky-400 ml-4 font-semibold'><i class="las la-edit"></i></button></div>
                                <div cleass='clear-both'></div>
                            </div>
                            <div class="flex justify-left items-top pb-2">
                                <div class="absolute w-[150px]">Email</div>
                                <div class='float ml-[150px]'><span id='showEmail'>`+email+`</span> <button name='`+email+`' id='onEmail' onClick="ubahEmail(this.name)" class='text-sky-400 ml-4 font-semibold'><i class="las la-edit"></i></button></div>
                                <div cleass='clear-both'></div>
                            </div>
                            <div class="flex justify-left items-top pb-2">
                                <div class="absolute w-[150px]">No Hp</div>
                                <div class='float ml-[150px]'><span id='showNoHp'>`+nohp+`</span> <button name='`+nohp+`' id='onNoHp' onClick="ubahNoHp(this.name)" class='text-sky-400 ml-4 font-semibold'><i class="las la-edit"></i></button></div>
                                <div cleass='clear-both'></div>
                            </div>
                            <div class="font-semibold pb-3 pt-3">Pertanyaan Pemulihan</div>
                            <div class="flex justify-left items-top pb-2">
                                <div class="absolute w-[150px]">Pertanyaan</div>
                                <div class='float ml-[150px]'><span id='showPertanyaan'>`+pertanyaan+`</span> <button name='`+pertanyaan+`' id='onPertanyaan' onClick="ubahPertanyaan(this.name)" id='onPertanyaan' class='text-sky-400 ml-4 font-semibold'><i class="las la-edit"></i></button></div>
                                <div cleass='clear-both'></div>
                            </div>
                            <div class="font-semibold pb-3 pt-3">Ubah Password</div>
                            <div class="flex justify-left items-top pb-2">
                                <div class="absolute w-[150px]">Password</div>
                                <div class='float ml-[150px]'>******  <button class='text-sky-400 ml-4 font-semibold'  onClick="ubahPassword()" ><i class="las la-edit"></i></button></div>
                                <div cleass='clear-both'></div>
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <hr class="my-2">
                        <div class="flex justify-center items-center">
                            <button type='button' class='bg-red-600 text-white px-6 py-2 rounded-md text-[10pt] my-2' onClick='requestDelete()'>Hapus Akun</button>
                        </div>
                    </div>
                `;
            }else{

                document.getElementById('profilDetail').innerHTML = `
                    <div class="p-6">
                        <div class="w-full p-4 text-center">
                            <center><img src='`+BASEURL+`/assets/media/ilustrasi/terputus.png' class='w-[150px]'></center>
                        </div>
                        <div class="w-full text-center text-gray-400 pB-4 mb-8">
                            <div class='text-[11pt] text-semibold'>KONEKSI TERPUTUS</div>
                            <div class='text-[8pt]'>Tidak dapat terhubung ke server. Pastikan kembali koneksi internet anda, lalu coba lagi.</div>
                        </div>
                    </div>
                `;

            }
        }
    });
}

showTabBiodata();

function ubahNama(nama){
    document.getElementById('popup').innerHTML = `
        <div class="fixed top-[130px] left-0 right-0 z-[9999]">
            <div class="w-full flex justify-center item-center">
                <div class="bg-white w-[400px] rounded-lg p-6 relative">
                    <button class='absolute right-[15px] top-[10px] outline-none border-none' onClick='hidePopUp()'>
                    <i class="las la-times"></i>
                    </button>
                    <div class="font-semibold text-[14pt] text-center">Perbaiki Nama</div>
                    <div class="mt-2 text-center text-gray-400">
                        Pastikan nama yang anda buat dikenali dan sesuai dengan profile anda.
                    </div>
                    <div class="mt-2">
                        <form onSubmit='return submitUbahNama()' method='post' action='' id='formUbahNama' name='formUbahNama'>
                            <div>
                                <label for='nama' class="font-semibold">Nama</label>
                                <div>
                                    <input class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' type='text' id='nama' name='nama' value='`+nama+`'>
                                </div>
                                <div class="text-center">
                                    <input type='hidden' id='model' name='model' value='nama'>
                                    <button type='submit' id='btnUbahNama' class="bg-sky-400 hover:bg-sky-300 px-4 py-2 text-white font-semibold rounded-md text-[10pt] mt-4 mb-2">Simpan Perubahan</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed z-[999] top-[83px] right-0 bottom-0 left-0" onClick='hidePopUp()' style='background-color:rgba(0,0,0,.7)'></div>
    `;
}

function submitUbahNama(){
    let nama = document.forms["formUbahNama"]["nama"].value;
    let model = document.forms["formUbahNama"]["model"].value;
    if (setText(nama)) {
        toastr.info("Nama " + setText(nama));
        document.getElementById("nama").focus();
        return false;
    }else{
        let doAction =  BASEURL + "/webservice/profile/update";
        $.ajax({
            url: doAction,
            type: "POST",
            data: $('#formUbahNama').serialize(),
            success: function(msg) {
                if (msg == "Berhasil") {
                    toastr.success("Perubahan disimpan");
                    document.getElementById('showNama').innerHTML = nama;
                    document.getElementById('onNama').setAttribute('name',nama);
                    return false;
                } else {
                    toastr.error(msg);
                    return false;
                }
            },
        });
        return false;
    }
}


function ubahTanggalLahir(tgl){
    document.getElementById('popup').innerHTML = `
        <div class="fixed top-[130px] left-0 right-0 z-[9999]">
            <div class="w-full flex justify-center item-center">
                <div class="bg-white w-[400px] rounded-lg p-6 relative">
                    <button class='absolute right-[15px] top-[10px] outline-none border-none' onClick='hidePopUp()'>
                    <i class="las la-times"></i>
                    </button>
                    <div class="font-semibold text-[14pt] text-center">Perbaiki Tanggal Lahir</div>
                    <div class="mt-2 text-center text-gray-400">
                        Sesuaikan tanggal lahir anda.
                    </div>
                    <div class="mt-2">
                        <form onSubmit='return submitUbahTglLahir()'  method='post' id='formTanggalLahir' name='formTanggalLahir'>
                            <div>
                                <label for='nama' class="font-semibold">Tanggal Lahir</label>
                                <div>
                                    <input type='date' class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' id='tgllahir' name='tgllahir' value='`+tgl+`'>
                                </div>
                                <div class="text-center">
                                    <input type='hidden' id='model' name='model' value='tgllahir'>
                                    <button type='submit' class="bg-sky-400 hover:bg-sky-300 px-4 py-2 text-white font-semibold rounded-md text-[10pt] mt-4 mb-2">Simpan Perubahan</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed z-[999] top-[83px] right-0 bottom-0 left-0" onClick='hidePopUp()' style='background-color:rgba(0,0,0,.7)'></div>
    `;
}

function submitUbahTglLahir(){
    let tgllahir = document.forms["formTanggalLahir"]["tgllahir"].value;
    let model = document.forms["formTanggalLahir"]["model"].value;
    if (setText(tgllahir)) {
        toastr.info("Tanggal lahir " + setText(tgllahir));
        document.getElementById("tgllahir").focus();
        return false;
    }else{
        let doAction =  BASEURL + "/webservice/profile/update";
        $.ajax({
            url: doAction,
            type: "POST",
            data: $('#formTanggalLahir').serialize(),
            success: function(msg) {
                if (msg == "Berhasil") {
                    toastr.success("Perubahan disimpan");
                    let formatTgl =  BASEURL + "/webservice/formater?tgl="+tgllahir;
                    $.ajax({
                        url: formatTgl,
                        type: "GET",
                        success : function(msg){
                            document.getElementById('showTglLahir').innerHTML = msg;
                            document.getElementById('onTglLahir').setAttribute('name',tgllahir);
                        }
                    });
                    return false;
                } else {
                    toastr.error(msg);
                    return false;
                }
            },
        });
        return false;
    }
}

function ubahJenisKelamin(jeniskelamin){
    let setJenisKelamin = "-";
    if(jeniskelamin == "Pria"){
        setJenisKelamin = "<option value='Pria'>Pria</option>";   
    } else if(jeniskelamin == "Perempuan"){
        setJenisKelamin = "<option value='Perempuan'>Perempuan</option>";   
    } else{
        
        setJenisKelamin = "<option value=''>Pilih Jenis Kelamin</option>";
    }
    document.getElementById('popup').innerHTML = `
        <div class="fixed top-[130px] left-0 right-0 z-[9999]">
            <div class="w-full flex justify-center item-center">
                <div class="bg-white w-[400px] rounded-lg p-6 relative">
                    <button class='absolute right-[15px] top-[10px] outline-none border-none' onClick='hidePopUp()'>
                    <i class="las la-times"></i>
                    </button>
                    <div class="font-semibold text-[14pt] text-center">Pilih Jenis Kelamin</div>
                    <div class="mt-2 text-center text-gray-400">
                        Pastikan jenis kelamin telah sesuai
                    </div>
                    <div class="mt-2">
                        <form onSubmit='return submitJenisKelamin()' method='post' action='' id='formJenisKelamin' name='formJenisKelamin'>
                            <div>
                                <label for='nama' class="font-semibold">Jenis Kelamin</label>
                                <div>
                                    <select class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' id='jeniskelamin' name='jeniskelamin'>
                                        `+setJenisKelamin+`
                                        <option value='Pria'>Pria</option>
                                        <option value='Perempuan'>Perempuan</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <input type='hidden' id='model' name='model' value='jeniskelamin'>
                                    <button class="bg-sky-400 hover:bg-sky-300 px-4 py-2 text-white font-semibold rounded-md text-[10pt] mt-4 mb-2">Simpan Perubahan</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed z-[999] top-[83px] right-0 bottom-0 left-0" onClick='hidePopUp()' style='background-color:rgba(0,0,0,.7)'></div>
    `;
}


function submitJenisKelamin(){
    let jeniskelamin = document.forms["formJenisKelamin"]["jeniskelamin"].value;
    let model = document.forms["formJenisKelamin"]["model"].value;
    if (setPilihan(jeniskelamin)) {
        toastr.info("Jenis Kelamin " + setPilihan(jeniskelamin));
        document.getElementById("jeniskelamin").focus();
        return false;
    }else{
        let doAction =  BASEURL + "/webservice/profile/update";
        $.ajax({
            url: doAction,
            type: "POST",
            data: $('#formJenisKelamin').serialize(),
            success: function(msg) {
                if (msg == "Berhasil") {
                    toastr.success("Perubahan disimpan");
                    document.getElementById('showJenisKelamin').innerHTML = jeniskelamin;
                    document.getElementById('onJenisKelamin').setAttribute('name',jeniskelamin);
                } else {
                    toastr.error(msg);
                    return false;
                }
            },
        });
        return false;
    }
}

function ubahEmail(email){
    document.getElementById('popup').innerHTML = `
        <div class="fixed top-[130px] left-0 right-0 z-[9999]">
            <div class="w-full flex justify-center item-center">
                <div class="bg-white w-[400px] rounded-lg p-6 relative">
                    <button class='absolute right-[15px] top-[10px] outline-none border-none' onClick='hidePopUp()'>
                    <i class="las la-times"></i>
                    </button>
                    <div class="font-semibold text-[14pt] text-center">Ganti Email</div>
                    <div class="mt-2 text-center text-gray-400">
                        Pastikan email yang anda masukan sudah benar.
                    </div>
                    <div class="mt-2">
                        <form onSubmit='return submitUbahEmail()' method='post' action='' id='formUbahEmail' name='formUbahEmail'>
                            <div>
                                <label for='email' class="font-semibold">Email</label>
                                <div>
                                    <input class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' type='text' id='email' name='email' value='`+email+`'>
                                </div>
                                <div class="text-center">
                                    <input type='hidden' id='model' name='model' value='email'>
                                    <button type='submit' id='btnUbahEmail' class="bg-sky-400 hover:bg-sky-300 px-4 py-2 text-white font-semibold rounded-md text-[10pt] mt-4 mb-2">Simpan Perubahan</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed z-[999] top-[83px] right-0 bottom-0 left-0" onClick='hidePopUp()' style='background-color:rgba(0,0,0,.7)'></div>
    `;
}

function submitUbahEmail(){
    let email = document.forms["formUbahEmail"]["email"].value;
    let model = document.forms["formUbahEmail"]["model"].value;
    if (setEmail(email)) {
        toastr.info("Email " + setEmail(email));
        document.getElementById("email").focus();
        return false;
    }else{
        let doAction =  BASEURL + "/webservice/profile/update";
        $.ajax({
            url: doAction,
            type: "POST",
            data: $('#formUbahEmail').serialize(),
            success: function(msg) {
                if (msg == "Berhasil") {
                    toastr.success("Perubahan disimpan");
                    document.getElementById('showEmail').innerHTML = email;
                    document.getElementById('onEmail').setAttribute('name',email);
                    return false;
                } else {
                    toastr.error(msg);
                    return false;
                }
            },
        });
        return false;
    }
}

function ubahNoHp(nohp){
    document.getElementById('popup').innerHTML = `
        <div class="fixed top-[130px] left-0 right-0 z-[9999]">
            <div class="w-full flex justify-center item-center">
                <div class="bg-white w-[400px] rounded-lg p-6 relative">
                    <button class='absolute right-[15px] top-[10px] outline-none border-none' onClick='hidePopUp()'>
                    <i class="las la-times"></i>
                    </button>
                    <div class="font-semibold text-[14pt] text-center">Ganti No Hp</div>
                    <div class="mt-2 text-center text-gray-400">
                        Pastikan no hp yang anda masukan sudah benar.
                    </div>
                    <div class="mt-2">
                        <form onSubmit='return submitUbahNoHp()' method='post' action='' id='formUbahNoHp' name='formUbahNoHp'>
                            <div>
                                <label for='nohp' class="font-semibold">No Hp</label>
                                <div>
                                    <input class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' type='text' id='nohp' name='nohp' value='`+nohp+`'>
                                </div>
                                <div class="text-center">
                                    <input type='hidden' id='model' name='model' value='nohp'>
                                    <button type='submit' id='btnUbahNoHp' class="bg-sky-400 hover:bg-sky-300 px-4 py-2 text-white font-semibold rounded-md text-[10pt] mt-4 mb-2">Simpan Perubahan</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed z-[999] top-[83px] right-0 bottom-0 left-0" onClick='hidePopUp()' style='background-color:rgba(0,0,0,.7)'></div>
    `;
}

function submitUbahNoHp(){
    let nohp = document.forms["formUbahNoHp"]["nohp"].value;
    let model = document.forms["formUbahNoHp"]["model"].value;
    if (setNoHp(nohp)) {
        toastr.info("No Hp " + setNoHp(nohp));
        document.getElementById("nohp").focus();
        return false;
    }else{
        let doAction =  BASEURL + "/webservice/profile/update";
        $.ajax({
            url: doAction,
            type: "POST",
            data: $('#formUbahNoHp').serialize(),
            success: function(msg) {
                if (msg == "Berhasil") {
                    toastr.success("Perubahan disimpan");
                    document.getElementById('showNoHp').innerHTML = nohp;
                    document.getElementById('onNoHp').setAttribute('name',nohp);
                    return false;
                } else {
                    toastr.error(msg);
                    return false;
                }
            },
        });
        return false;
    }
}

function ubahPertanyaan(pertanyaan){
    document.getElementById('popup').innerHTML = `
        <div class="fixed top-[130px] left-0 right-0 z-[9999]">
            <div class="w-full flex justify-center item-center">
                <div class="bg-white w-[400px] rounded-lg p-6 relative">
                    <button class='absolute right-[15px] top-[10px] outline-none border-none' onClick='hidePopUp()'>
                    <i class="las la-times"></i>
                    </button>
                    <div class="font-semibold text-[14pt] text-center">Buat Pertanyaan</div>
                    <div class="mt-2 text-center text-gray-400">
                        Pertanyaan ini digunakan jika anda ingin mereset password ketika anda lupa passwordnya
                    </div>
                    <div class="mt-2">
                        <form onSubmit='return submitPertanyaan()' method='post' action='' id='formPertanyaan' name='formPertanyaan'>
                            <div>
                                <label for='pertanyaan' class="font-semibold">Pertanyaan</label>
                                <div class='pb-1'>
                                    <input class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' type='text' id='pertanyaan' name='pertanyaan' value='`+pertanyaan+`'>
                                </div>
                                <label for='jawaban' class="font-semibold">Jawaban</label>
                                <div class='pb-1'>
                                    <input class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' type='text' id='jawaban' name='jawaban'>
                                </div>
                                <div class="text-center">
                                    <input type='hidden' id='model' name='model' value='pertanyaan'>
                                    <button type='submit' id='btnPertanyaan' class="bg-sky-400 hover:bg-sky-300 px-4 py-2 text-white font-semibold rounded-md text-[10pt] mt-4 mb-2">Simpan Perubahan</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed z-[999] top-[83px] right-0 bottom-0 left-0" onClick='hidePopUp()' style='background-color:rgba(0,0,0,.7)'></div>
    `;
}

function submitPertanyaan(){
    let pertanyaan = document.forms["formPertanyaan"]["pertanyaan"].value;
    let jawaban = document.forms["formPertanyaan"]["jawaban"].value;
    let model = document.forms["formPertanyaan"]["model"].value;
    if (setText(pertanyaan)) {
        toastr.info("Pertanyaan " + setText(pertanyaan));
        document.getElementById("pertanyaan").focus();
        return false;
    }else if (setText(jawaban)) {
        toastr.info("Jawaban " + setText(jawaban));
        document.getElementById("jawaban").focus();
        return false;
    }else{
        let doAction =  BASEURL + "/webservice/profile/update";
        $.ajax({
            url: doAction,
            type: "POST",
            data: $('#formPertanyaan').serialize(),
            success: function(msg) {
                if (msg == "Berhasil") {
                    toastr.success("Perubahan disimpan");
                    document.getElementById('showPertanyaan').innerHTML = pertanyaan;
                    document.getElementById('onPertanyaan').setAttribute('name',pertanyaan);
                    jawaban.value = "";
                    return false;
                } else {
                    toastr.error(msg);
                    return false;
                }
            },
        });
        return false;
    }
}

function ubahPassword(){
    document.getElementById('popup').innerHTML = `
        <div class="fixed top-[130px] left-0 right-0 z-[9999]">
            <div class="w-full flex justify-center item-center">
                <div class="bg-white w-[400px] rounded-lg p-6 relative">
                    <button class='absolute right-[15px] top-[10px] outline-none border-none' onClick='hidePopUp()'>
                    <i class="las la-times"></i>
                    </button>
                    <div class="font-semibold text-[14pt] text-center">Ganti Password</div>
                    <div class="mt-2 text-center text-gray-400">
                        Pastikan selalu memperbarui password untuk keamanan akun anda.
                    </div>
                    <div class="mt-2">
                        <form onSubmit='return submitPassword()' method='post' action='' id='formPassword' name='formPassword'>
                            <div>
                                <label for='password' class="font-semibold">Password</label>
                                <div class='pb-1'>
                                    <input class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' type='password' id='password' name='password'>
                                </div>
                                <label for='konfirmasipassword' class="font-semibold">Konfirmasi Password</label>
                                <div class='pb-1'>
                                    <input class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' type='password' id='konfirmasipassword' name='konfirmasipassword'>
                                </div>
                                <div class="text-center">
                                    <input type='hidden' id='model' name='model' value='password'>
                                    <button type='submit' id='btnPassword' class="bg-sky-400 hover:bg-sky-300 px-4 py-2 text-white font-semibold rounded-md text-[10pt] mt-4 mb-2">Simpan Perubahan</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed z-[999] top-[83px] right-0 bottom-0 left-0" onClick='hidePopUp()' style='background-color:rgba(0,0,0,.7)'></div>
    `;
}

function submitPassword(){
    let password = document.forms["formPassword"]["password"].value;
    let konfirmasipassword = document.forms["formPassword"]["konfirmasipassword"].value;
    let model = document.forms["formPassword"]["model"].value;
    if (setText(password)) {
        toastr.info("Password " + setText(password));
        document.getElementById("password").focus();
        return false;
    }else if (setText(konfirmasipassword)) {
        toastr.info("Konfirmasi Password " + setText(konfirmasipassword));
        document.getElementById("konfirmasipassword").focus();
        return false;
    }else if (konfirmasipassword != password) {
        toastr.info("Konfirmasi password tidak sama");
        document.getElementById("konfirmasipassword").focus();
        return false;
    }else{
        let doAction =  BASEURL + "/webservice/profile/update";
        $.ajax({
            url: doAction,
            type: "POST",
            data: $('#formPassword').serialize(),
            success: function(msg) {
                if (msg == "Berhasil") {
                    toastr.success("Perubahan disimpan");
                    password.value = "";
                    konfirmasipassword.value = "";
                    return false;
                } else {
                    toastr.error(msg);
                    return false;
                }
            },
        });
        return false;
    }
}

function requestDelete(){
    document.getElementById('popup').innerHTML = `
        <div class="fixed top-[130px] left-0 right-0 z-[9999]">
            <div class="w-full flex justify-center item-center">
                <div class="bg-white w-[400px] rounded-lg p-6 relative">
                    <button class='absolute right-[15px] top-[10px] outline-none border-none' onClick='hidePopUp()'>
                    <i class="las la-times"></i>
                    </button>
                    <div class="font-semibold text-[14pt] text-center">Hapus Akun?</div>
                    <div class="mt-2 text-center text-gray-400">
                        Hati-hati, pastikan kembali apakah anda ingin menghapusnya?
                    </div>
                    <div class="mt-2">
                        <form onSubmit='return submitHapus()' method='post' action='' id='formHapus' name='formHapus'>
                            <div>
                                <label for='password' class="font-semibold">Password</label>
                                <div class='pb-1'>
                                    <input class='outline-none border-[1px] border-solid border-gray-300 py-2 px-3 w-full rounded-md text-[10pt]' type='password' id='password' name='password'>
                                </div>
                                <div class="text-center">
                                    <input type='hidden' id='model' name='model' value='hapus'>
                                    <button type='submit' id='btnHapus' class="bg-sky-400 hover:bg-sky-300 px-4 py-2 text-white font-semibold rounded-md text-[10pt] mt-4 mb-2">Simpan Perubahan</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed z-[999] top-[83px] right-0 bottom-0 left-0" onClick='hidePopUp()' style='background-color:rgba(0,0,0,.7)'></div>
    `;
}

function submitHapus(){
    let password = document.forms["formHapus"]["password"].value;
    let model = document.forms["formHapus"]["model"].value;
    if (setText(password)) {
        toastr.info("Password " + setText(password));
        document.getElementById("password").focus();
        return false;
    }else{
        let doAction =  BASEURL + "/webservice/profile/update";
        $.ajax({
            url: doAction,
            type: "POST",
            data: $('#formHapus').serialize(),
            success: function(msg) {
                if (msg == "Berhasil") {
                    window.location.href=BASEURL;
                } else {
                    toastr.error(msg);
                    return false;
                }
            },
        });
        return false;
    }
}

function uploadPhoto(){
    let photo = document.forms["formUpload"]["photo"].value;
    if (setText(photo)) {
        toastr.info("Photo " + setText(photo));
        document.getElementById("photo").focus();
        return false;
    }else{
        const formData = new FormData();
        const filePhoto = document.querySelector('input[type="file"]');
        formData.append('photo', filePhoto.files[0]);
        fetch(BASEURL + "/webservice/profile/upload", {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('pp1').setAttribute('src',data[0].photo);
            document.getElementById('pp2').setAttribute('src',data[0].photo);
            if(data[0].status === "Sukses"){
                toastr.success("Photo sudah diperbarui");
            }else if(data[0].status === "Sukses"){
                toastr.error("Gagal memperbarui photo");
            }else{
                toastr.error(data[0].status);
            }
        })
        .catch(error => {
            toastr.error("Gagal memperbarui photo");
        });
        return false;
    }
}