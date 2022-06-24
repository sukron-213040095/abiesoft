function showProfileOption(){
    let OpsiProfile = document.getElementById('OpsiProfile');
    let LoadingOpsi = document.getElementById('LoadingOpsi');
    if(OpsiProfile){
        if(OpsiProfile.classList == "hidden"){
            OpsiProfile.setAttribute("class","absolute bg-white min-w-[250px] max-w-[300px] left-[0px] top-[65px] rounded-md shadow-md font-semibold z-[99999]");
            LoadingOpsi.innerHTML = `
                <div class='p-4 overflow-hidden'>
                    <div class="py-4">
                        <div class="flex justify-center mb-2">
                            <div class="w-[80px] h-[80px] rounded-[50%] overflow-hidden bg-slate-100 shimmer"></div>
                        </div>
                        <div class="flex justify-center">
                            <div class="text-center w-[90px] h-[20px] bg-slate-100 shimmer"></div>
                        </div>
                        <div class="flex justify-center mt-2">
                            <div class="text-[10pt] w-[130px] h-[15px] text-center font-normal bg-slate-100 shimmer"></div>
                        </div>
                    </div>
                    <div class="py-2">
                        <hr>
                    </div>
                    <div class="py-2 flex justify-between items-center">
                        <div><a class="bg-slate-100 shimmer w-[25px] h-[25px]"></a></div>
                        <div><a class="w-[65px] h-[30px] rounded-md py-2 bg-slate-100 shimmer text-white"></a></div>
                    </div>
                </div>
            `;
            let url = BASEURL + "/webservice/user?apikey="+ APIKEY +"&opsi=profile";
            $.ajax({
                url: url,
                success: function(msg) {
                    let nama = msg.split("|")[0];
                    let email = msg.split("|")[1];
                    let photo = msg.split("|")[2];
                    if(msg.split("|").length != 3){
                        LoadingOpsi.innerHTML = `
                            <div class='w-[250px] p-8 overflow-hidden'>
                                <div class="w-full p-4 text-center">
                                    <center><img src='`+BASEURL+`/assets/media/ilustrasi/terputus.png' class='w-[150px]'></center>
                                </div>
                                <div class="w-full text-center text-gray-400 pB-4 mb-8">
                                    <div class='text-[11pt] text-semibold'>KONEKSI TERPUTUS</div>
                                    <div class='text-[8pt]'>Tidak dapat terhubung ke server. Pastikan kembali koneksi internet anda, lalu coba lagi.</div>
                                </div>
                            </div>
                        `;
                    }else{
                        LoadingOpsi.innerHTML = `
                            <div class='p-4 overflow-hidden'>
                                <div class="py-4">
                                    <div class="flex justify-center mb-2">
                                        <div class="w-[80px] h-[80px] rounded-[50%] overflow-hidden">
                                            <img src="`+photo+`" class="w-[80px] h-[80px] object-cover">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        `+nama+`
                                    </div>
                                    <div class="text-[10pt] text-center font-normal">
                                        `+email+`
                                    </div>
                                </div>
                                <div class="py-2">
                                    <hr>
                                </div>
                                <div class="py-2 flex justify-between items-center">
                                    <a class="px-3 rounded-md text-[14pt] hover:text-gray-400" href='`+BASEURL+`/profile'><i class="las la-cog"></i></a>
                                    <a class="px-3 rounded-md text-[10pt] py-2 bg-sky-400 text-white" href='`+BASEURL+`/logout'><span>Logout</span></a>
                                </div>
                            </div>
                        `;
                    }
                }
            });
        }else{
            OpsiProfile.setAttribute("class","hidden");
            LoadingOpsi.innerHTML = "";
        }
    }
    return false;
}


/// Paling Laku
if($('#dataPalingLaku').length){
    let palinglaku = new Worker(BASEURL + '/assets/jsa/worker-palinglaku.js');
    palinglaku.postMessage([BASEURL,APIKEY]);
    palinglaku.onmessage = function(e) {
        let data = e.data;
        let result = "";
        result += `<div class="grid grid-cols-6 gap-4">`;
        for(let i=0; i < data.length; i++){
            let diskon = "";
            if(data[i].diskon != "0%"){
                diskon = data[i].diskon;
            }
            result += `
            <div class="relative bg-white cursor-pointer rounded-md overflow-hidden hover:shadow-lg border-solid border-[2px] border-white hover:border-solid hover:border-[2px] hover:border-sky-300">
                <a href="`+BASEURL+`/produk/`+data[i].slug+`">
                    <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                        <img src="`+data[i].gambar+`" class="w-[200px] h-[180px] object-cover">
                    </div>
                    <div class="p-2">
                        <h2 class="text-[10pt] font-bold leading-[15px]">`+data[i].nama+`</h2>
                        <p class="text-[8pt] text-justify my-2 leading-[15px]">`+data[i].keterangan+`</p>
                        <div class="flex justify-between items-center">
                            <div class="text-[12pt] font-bold text-sky-500">Rp. `+data[i].harga+`</div>
                            <div class="text-[14pt] font-bold text-red-500">`+diskon+`</div>
                        </div>
                    </div>
                </a>
            </div>`;    
        }
        result += `</div>`;
        document.getElementById('dataPalingLaku').innerHTML = result;
    }
}


/// Promo
if($('#dataDiskon').length){
    let promo = new Worker(BASEURL + '/assets/jsa/worker-promo.js');
    promo.postMessage([BASEURL,APIKEY]);
    promo.onmessage = function(e) {
        let data = e.data;
        let result = "";
        result += `<div class="grid grid-cols-6 gap-4">`;
        for(let i=0; i < data.length; i++){
            result += `
            <div class="relative bg-white cursor-pointer rounded-md overflow-hidden hover:shadow-lg border-solid border-[2px] border-white hover:border-solid hover:border-[2px] hover:border-sky-300">
                <a href="`+BASEURL+`/produk/`+data[i].slug+`">
                    <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                        <img src="`+data[i].gambar+`" class="w-[200px] h-[180px] object-cover">
                    </div>
                    <div class="p-2">
                        <h2 class="text-[10pt] font-bold leading-[15px]">`+data[i].nama+`</h2>
                        <p class="text-[8pt] text-justify my-2 leading-[15px]">`+data[i].keterangan+`</p>
                        <div class="flex justify-between items-center">
                            <div class="text-[12pt] font-bold text-sky-500">Rp. `+data[i].harga+`</div>
                            <div class="text-[14pt] font-bold text-red-500">`+data[i].diskon+`</div>
                        </div>
                    </div>
                </a>
            </div>`;    
        }
        result += `</div>`;
        document.getElementById('dataDiskon').innerHTML = result;
    }
}


/// Terbaru
if($('#dataTerbaru').length){
    let terbaru = new Worker(BASEURL + '/assets/jsa/worker-terbaru.js');
    terbaru.postMessage([BASEURL,APIKEY]);
    terbaru.onmessage = function(e) {
        let data = e.data;
        let result = "";
        result += `<div class="grid grid-cols-6 gap-4">`;
        for(let i=0; i < data.length; i++){
            let diskon = "";
            if(data[i].diskon != "0%"){
                diskon = data[i].diskon;
            }
            result += `
            <div class="relative bg-white cursor-pointer rounded-md overflow-hidden hover:shadow-lg border-solid border-[2px] border-white hover:border-solid hover:border-[2px] hover:border-sky-300">
                <a href="`+BASEURL+`/produk/`+data[i].slug+`">
                    <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                        <img src="`+data[i].gambar+`" class="w-[200px] h-[180px] object-cover">
                    </div>
                    <div class="p-2">
                        <h2 class="text-[10pt] font-bold leading-[15px]">`+data[i].nama+`</h2>
                        <p class="text-[8pt] text-justify my-2 leading-[15px]">`+data[i].keterangan+`</p>
                        <div class="flex justify-between items-center">
                            <div class="text-[12pt] font-bold text-sky-500">Rp. `+data[i].harga+`</div>
                            <div class="text-[14pt] font-bold text-red-500">`+diskon+`</div>
                        </div>
                    </div>
                </a>
            </div>`;    
        }
        result += `</div>`;
        document.getElementById('dataTerbaru').innerHTML = result;
    }
}



function loadCart(){
    let loaccart = new Worker(BASEURL + '/assets/jsa/worker/worker-keranjang.js');
    loaccart.postMessage([BASEURL,APIKEY]);
    loaccart.onmessage = function(e) {
        let data = e.data;
        if(data[0].total !== null && data[0].jumlah !== null){
            document.querySelector('#jharga').innerHTML = data[0].total.toLocaleString();
            document.querySelector('#jitem').innerHTML = data[0].jumlah;
        }else{
            document.querySelector('#jharga').innerHTML = 0;
            document.querySelector('#jitem').innerHTML = 0;
        }
    }
}

loadCart();
