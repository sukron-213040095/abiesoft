onmessage = function(e) {
    fetch(e.data[0] + '/webservice/user?apikey='+ e.data[1] +'&list=kategori&slug='+e.data[2])
        .then(response => response.json())
        .then(data => {
            postMessage(data)
        })
        .catch(error => console.error(error));
}

