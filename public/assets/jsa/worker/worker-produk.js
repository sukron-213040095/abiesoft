onmessage = function(e) {
    fetch(e.data[0] + '/webservice/user?apikey='+ e.data[1] +'&tab=produk')
        .then(response => response.json())
        .then(data => {
            postMessage(data)
        })
        .catch(error => console.error(error));
}

