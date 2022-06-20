/// Terbaru
let kategori = new Worker(BASEURL+'/assets/jsa/worker/worker-kategori.js');
kategori.postMessage([BASEURL,APIKEY,SLUG]);
kategori.onmessage = function(e) {
    let data = e.data;
    let result = "";
    result += `<div class="grid grid-cols-6 gap-4">`;
    for(let i=0; i < data.length; i++){
        result += `
        <a href="{\AbieSoft\Utilities\Config::envReader('BASEURL')}/kategori/aneka-bolu" class="bg-white cursor-pointer rounded-md overflow-hidden hover:shadow-lg border-solid border-[2px] border-white hover:border-solid hover:border-[2px] hover:border-sky-300">
            <div class="w-full h-[180px] rounded-tl-md rounded-tr-md overflow-hidden">
                <img src="`+data[i].gambar+`" class="w-[200px] h-[180px] object-cover">
            </div>
            <div class="p-2">
                <h2 class="text-[10pt] font-bold leading-[15px]">`+data[i].nama+`</h2>
                <p class="text-[8pt] text-justify my-2 leading-[15px]">`+data[i].keterangan+`</p>
                <div class="flex justify-between items-center">
                    <div class="text-[12pt] font-bold text-sky-500">Rp. `+data[i].harga+`</div>
                    <div class="text-[14pt] font-bold text-red-500"></div>
                </div>
            </div>
        </a>`;  
    }
    result += `</div>`;
    document.getElementById('itemKategori').innerHTML = result;
}