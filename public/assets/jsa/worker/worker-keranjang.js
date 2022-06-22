onmessage = function(e) {
    fetch(e.data[0] + '/keranjang?apikey='+ e.data[1])
        .then(response => response.json())
        .then(data => {
            postMessage(data)
        })
        .catch(error => console.error(error));
}

