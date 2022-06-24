onmessage = function(e) {
    fetch(e.data[0] + '/webservice/produk?apikey='+ e.data[1] +'&id='+e.data[2]+'&do=suka')
        .then(response => response.json())
        .then(data => {
            postMessage(data)
        })
        .catch(error => console.error(error));
}

