function showTabAlamat (){
    document.getElementById('btnAlamat').setAttribute('class', 'cursor-pointer px-6 text-gray-300 text-sky-400 font-semibold border-b-[2px] border-solid border-sky-400 pt-4 pb-[14px]');
    document.getElementById('btnProduk').setAttribute('class', 'cursor-pointer py-4 px-6 text-gray-300 hover:text-gray-500 font-semibold');
    document.getElementById('btnBiodata').setAttribute('class', 'cursor-pointer py-4 px-6 text-gray-300 hover:text-gray-500 font-semibold');
    document.getElementById('btnPembayaran').setAttribute('class', 'cursor-pointer py-4 px-6 text-gray-300 hover:text-gray-500 font-semibold');
    let url = BASEURL + "/webservice/user?apikey="+APIKEY+"&tab=alamat";
    $.ajax({
        url: url,
        success: function(msg) {
            document.getElementById('profilDetail').innerHTML = `
                <div class="p-6">
                    `+msg+`
                </div>
            `;
        }
    });
}