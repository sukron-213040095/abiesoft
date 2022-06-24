function showTabDetail(){
    document.getElementById('btnTabDetailProduk').setAttribute('class','px-4 py-2 outline-none border-b-[2px] border-solid border-sky-600 text-sky-600 font-semibold');
    document.getElementById('btnTabInfoProduk').setAttribute('class','px-4 py-2 border-b-[2px] hover:text-sky-600 font-semibold');
    let produk = new Worker(BASEURL+'/assets/jsa/worker/CrudProduk/worker-singel.js');
    produk.postMessage([BASEURL,APIKEY,ID]);
    produk.onmessage = function(e) {
        let data = e.data;
        document.getElementById('tabInfoProduk').innerHTML = `
            <div>`+data[0].keterangan+`</div>
        `;
    }
    return false;
}

function showTabInfoPenting(){
    document.getElementById('btnTabInfoProduk').setAttribute('class','px-4 py-2 outline-none border-b-[2px] border-solid border-sky-600 text-sky-600 font-semibold');
    document.getElementById('btnTabDetailProduk').setAttribute('class','px-4 py-2 border-b-[2px] hover:text-sky-600 font-semibold');
    document.getElementById('tabInfoProduk').innerHTML = `Info Penting Produk`;
    return false;
}

function loadDataProduk(ID){
    document.getElementById('boxDetailInfo').innerHTML = `
        <div class="grid grid-cols-2 gap-2 mb-8">
            <div class="flex justify-center items-top">
                <div class="w-[300px] h-[350px] bg-slate-100">
                    <div class="w-[300px] h-[350px] vg-slate-100 shimmer"></div>
                </div>
            </div>
            <div>
                <h2 class="text-[14pt] font-semibold"><div class="h-[22pt] w-[400px] bg-slate-100 shimmer"></div></h2>
                <div class="flex justify-left items-center text-[10pt]">
                    <div class="h-[17pt] w-full bg-slate-100 shimmer"></div>
                </div>
                <div>
                    <div class="text-[26pt] font-semibold"><div class="h-[30pt] w-[400px] bg-slate-100 shimmer"></div></div>
                    <div class="flex justify-left items-center">
                        <div class="h-[17pt] w-[100px] bg-slate-100 shimmer"></div>
                    </div>
                </div>
                <div class="mt-4 mb-4 border-t-[1px] border-b-[1px] border-solid border-gray-300 flex justify-left items-center">
                    <div class="h-[22pt] w-full bg-slate-100 shimmer"></div>
                </div>
                <div id='tabInfoProduk'>...</div>
                <div class="py-4 mt-4 mb-4 border-t-[1px] border-b-[1px] border-solid border-gray-300 flex justify-left items-center">
                    <div class="w-[50px] h-[50px] rounded-[50%] overflow-hidden">
                        <div class="w-[50px] h-[50px] bg-slate-100 shimmer">
                    </div>
                    <div class="text-[10pt] pl-4">
                        <div class="font-semibold"><div class="h-[17pt] w-full bg-slate-100 shimmer"></div></div>
                        <div><div class="h-[17pt] w-full bg-slate-100 shimmer"></div></div>
                    </div>
                </div>
            </div>
        </div>
    `;
    let produk = new Worker(BASEURL+'/assets/jsa/worker/CrudProduk/worker-singel.js');
    produk.postMessage([BASEURL,APIKEY,ID]);
    produk.onmessage = function(e) {
        let data = e.data;
        let infodiskon = "";
        let potongan = 0;
        let hargafinal = 0;
        let hargafinalint = 0;
        if(data[0].diskon != 0){
            potongan = Math.round(data[0].harga / 100 * data[0].diskon).toFixed(0);
            hargafinal = (data[0].harga - potongan).toLocaleString();
            hargafinalint = data[0].harga - potongan;
            infodiskon = `
                <div class="flex justify-left items-center">
                    <div class="bg-red-50 text-red-600 font-bold px-2 text-[10pt]">`+data[0].diskon+`%</div>
                    <div class="px-2 line-through">Rp.`+data[0].harga.toLocaleString()+`</div>
                </div>
            `;
        }else{
            hargafinal = data[0].harga.toLocaleString();
            hargafinalint = data[0].harga;
        }
        document.getElementById('stok').innerHTML = data[0].stok;
        document.getElementById('iptstok').value = data[0].stok;
        document.getElementById('hargaitem').value = hargafinalint;
        document.getElementById('subtotal').innerHTML = hargafinal;
        if(data[0].diskon != 0){
            document.getElementById('hargaasli').value = data[0].harga;
            document.getElementById('totalHargaAsli').innerHTML = "Rp. "+data[0].harga.toLocaleString();
        }else{
            document.getElementById('hargaasli').value = 0;
            document.getElementById('totalHargaAsli').innerHTML = "";
        }
        let onlinestatus = `<div class="relative h-[20px]"><div class="absolute  px-4 text-white bg-red-600 rounded-md">offline</div></div>`;
        if(data[0].status == "online"){
            onlinestatus = `<div class="relative h-[20px]"><div class="absolute px-4 text-white bg-green-400 rounded-md">online</div></div>`;
        }
        document.getElementById('boxDetailInfo').innerHTML = `
            <div class="grid grid-cols-2 gap-2 mb-8">
                <div class="flex justify-center items-top">
                    <div class="w-[300px] h-[350px] bg-slate-400">
                        <img src='`+data[0].gambar+`' class="w-[300px] h-[350px] object-cover">
                    </div>
                </div>
                <div>
                    <h2 class="text-[14pt] font-semibold">`+data[0].nama+`</h2>
                    <div class="flex justify-left items-center text-[10pt]">
                        <div class="pr-2 py-1 rounded-[25px] flex justify-center items-center">
                            <span>Terjual</span>
                            <span class='text-[10pt] ml-[5px] font-semibold'>`+data[0].laku+`</span>
                        </div>
                        <div class="pr-2 font-semibold">.</div>
                        <div class="pr-2 py-1 rounded-[25px] flex justify-center items-center">
                            <button class="hover:text-sky-400" onClick='likeThis(this.id)' id="sukaterbaru`+data[0].id+`"><i class="las la-heart"></i></button>
                            <span class='text-[10pt] ml-[5px] font-semibold'>`+data[0].suka+`</span>
                        </div>
                    </div>
                    <div>
                        <div class="text-[26pt] font-semibold">Rp. `+hargafinal+`</div>
                        `+infodiskon+`
                    </div>
                    <div class="mt-4 mb-4 border-t-[1px] border-b-[1px] border-solid border-gray-300 flex justify-left items-center">
                        <button type='button' id='btnTabDetailProduk' class='px-4 py-2 outline-none border-b-[2px] border-solid border-sky-600 text-sky-600 font-semibold' onClick="showTabDetail()">Detail</button>
                        <button type='button' id='btnTabInfoProduk' class='px-4 py-2 border-b-[2px] hover:text-sky-600 font-semibold' onClick="showTabInfoPenting()">Pengiriman dan Pembayaran</button>
                    </div>
                    <div id='tabInfoProduk'>...</div>
                    <div class="py-4 mt-4 mb-4 border-t-[1px] border-b-[1px] border-solid border-gray-300 flex justify-left items-center">
                        <div class="w-[50px] h-[50px] rounded-[50%] overflow-hidden">
                            <img src='`+data[0].photouser+`' class="w-[50px] h-[50px] object-cover">
                        </div>
                        <div class="text-[10pt] pl-4">
                            <div class="font-semibold">`+data[0].namauser+`</div>
                            `+onlinestatus+`
                        </div>
                    </div>
                </div>
            </div>
        `;
        showTabDetail();
        cekItem(ID);
    }
    return false;
}
loadDataProduk(ID);

function minVal(){
    let qty = document.querySelector("input[type='number']").value;
    let stok = document.querySelector("input[id='iptstok']").value;
    let hargaitem = document.querySelector("input[id='hargaitem']").value;
    let hargaasli = document.querySelector("input[id='hargaasli']").value;
    let jsubtotal = hargaitem;
    let jhargaasli = hargaasli;
    let result = parseInt(qty) - 1;
    if(result >= 1 && result <= parseInt(stok)){
        document.querySelector("input[type='number']").value = result;
        jsubtotal = result * parseInt(hargaitem);
        document.getElementById('subtotal').innerHTML = jsubtotal.toLocaleString();
        if(hargaasli !=0){
            jhargaasli = result * parseInt(hargaasli);
            document.getElementById('totalHargaAsli').innerHTML = "Rp. "+jhargaasli.toLocaleString();
        }else{
            document.getElementById('totalHargaAsli').innerHTML = "";
        }
    }
}

function plusVal(){
    let qty = document.querySelector("input[type='number']").value;
    let stok = document.querySelector("input[id='iptstok']").value;
    let hargaitem = document.querySelector("input[id='hargaitem']").value;
    let hargaasli = document.querySelector("input[id='hargaasli']").value;
    let jsubtotal = hargaitem;
    let jhargaasli = hargaasli;
    let result = parseInt(qty) + 1;
    if(result >= 1 && result <= parseInt(stok)){
        document.querySelector("input[type='number']").value = result;
        jsubtotal = result * parseInt(hargaitem);
        document.getElementById('subtotal').innerHTML = jsubtotal.toLocaleString();
        if(hargaasli !=0){
            jhargaasli = result * parseInt(hargaasli);
            document.getElementById('totalHargaAsli').innerHTML = "Rp. "+jhargaasli.toLocaleString();
        }else{
            document.getElementById('totalHargaAsli').innerHTML = "";
        }
    }
}

function hitungHarga(item){
    let stok = document.querySelector("input[id='iptstok']").value;
    let qty = document.getElementById('qty').value;
    let hargaitem = document.querySelector("input[id='hargaitem']").value;
    let hargaasli = document.querySelector("input[id='hargaasli']").value;
    let jsubtotal = hargaitem;
    let jhargaasli = hargaasli;

    if(parseInt(item) <= 0 ){
        $('#msgErr').html("Minimal pembelian 1 pcs");
        document.getElementById('qty').value = 1;
        jsubtotal = 1 * parseInt(hargaitem);
        document.getElementById('subtotal').innerHTML = jsubtotal.toLocaleString();
        if(hargaasli !=0){
            jhargaasli = 1 * parseInt(hargaasli);
            document.getElementById('totalHargaAsli').innerHTML = "Rp. "+jhargaasli.toLocaleString();
        }else{
            document.getElementById('totalHargaAsli').innerHTML = "";
        }
    }else if(parseInt(item) > parseInt(stok)){
        $('#msgErr').html("Max. Pembelian tergantung stok, sisa stok "+ stok + " pcs");
        document.getElementById('qty').value = stok;
        jsubtotal = stok * parseInt(hargaitem);
        document.getElementById('subtotal').innerHTML = jsubtotal.toLocaleString();
        if(hargaasli !=0){
            jhargaasli = stok * parseInt(hargaasli);
            document.getElementById('totalHargaAsli').innerHTML = "Rp. "+jhargaasli.toLocaleString();
        }else{
            document.getElementById('totalHargaAsli').innerHTML = "";
        }
    }else{
        $('#msgErr').html("");
        document.getElementById('qty').value = item;
        console.log(parseInt(hargaitem));
        jsubtotal = item * parseInt(hargaitem);
        document.getElementById('subtotal').innerHTML = jsubtotal.toLocaleString();
        if(hargaasli !=0){
            jhargaasli = item * parseInt(hargaasli);
            document.getElementById('totalHargaAsli').innerHTML = "Rp. "+jhargaasli.toLocaleString();
        }else{
            document.getElementById('totalHargaAsli').innerHTML = "";
        }
    }
}

function setKeKeranjang(){
    const form = document.querySelector('form[id="formKeranjang"]');
    const formData = new FormData(form);
    fetch(BASEURL + '/keranjang/new', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data[0].message == "Cancel"){
            toastr.error("Gagal menambah item");
            cekItem(ID);
            loadCart();
        }else{
            toastr.success(data[0].message);
            cekItem(ID);
            loadCart();
        }
    })
    .catch(error => console.error(error));
    return false;
}

function tambahCatatan(){
    let catatan = document.querySelector('#boxCatatan');
    if(catatan.className == "hidden"){
        catatan.setAttribute("class","block");
    }else{
        catatan.setAttribute("class","hidden");
    }
}

function loginNext(NEXT){
    window.location.href = BASEURL + "/login?next="+NEXT;
}

function hapusItem(){
    fetch(BASEURL + '/webservice/produk?apikey='+ APIKEY +'&id='+ID+'&do=hapusitem', {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        if(data[0].message == "Berhasil"){
            toastr.error("Item dihapus");
            cekItem(ID);
            loadCart();
            hitungHarga(1);
        }
    })
    .catch(error => console.error(error));
    return false;
}

function cekItem(ID){
    let item = new Worker(BASEURL + '/assets/jsa/worker/CrudProduk/worker-item.js');
    item.postMessage([BASEURL,APIKEY,ID]);
    item.onmessage = function(e) {
        let data = e.data;
        console.log(data[0]);
        if(data[0].jumlah != undefined){
            document.getElementById('transaksi').innerHTML = `
                <div class="bg-slate-50 p-2 text-[11pt] relative">
                    <button onClick='hapusItem()' type='button' class="text-[10pt] font-bold absolute right-[5px] top=[-3px] hover:text-sky-400"><i class="las la-times"></i></button>
                    <div class=" grid grid-cols-3 gap-2">
                        <div class="col-span-2">
                            <div>`+data[0].jumlah+`x</div>
                            <div class='font-semibold'>`+data[0].nama+`</div>
                        </div>
                        <div class='text-right font-semibold'>
                            <div>&nbsp;</div>
                            <div>Rp. `+data[0].total.toLocaleString()+`</div>
                        </div>
                    </div>
                    <div class='text-[10pt]'>`+data[0].catatan+`</div>
                </div>
            `;
            document.getElementById('btnKeranjang').innerHTML = "Perbarui";
        }else{
            document.getElementById('transaksi').innerHTML = "";
            document.getElementById('btnKeranjang').innerHTML = `<i class="las la-plus"></i> Keranjang`;
        }
        document.getElementById('catatan').value = data[0].catatan;
        if(data[0].harga != 0){
            document.getElementById('totalHargaAsli').innerHTML = data[0].harga.toLocaleString();
        }else{
            document.getElementById('totalHargaAsli').innerHTML = "";
        }
        document.getElementById('subtotal').innerHTML = data[0].total.toLocaleString();
        document.getElementById('qty').value = data[0].jumlah;
    }
    return false;
}

cekItem(ID);


function likeThis(id){
    let suka = new Worker(BASEURL + '/assets/jsa/worker/worker-suka.js');
    suka.postMessage([BASEURL,APIKEY,id]);
    suka.onmessage = function(e) {
        let data = e.data;
        if(data[0].message == "Disukai"){
            document.getElementById(id).setAttribute('class','absolute text-red-500 font-bold text-[14pt] right-[5px] top-[0px]');
        }else{
            document.getElementById(id).setAttribute('class','absolute text-gray-500 font-bold text-[14pt] right-[5px] top-[0px]');
        }
    }
}

