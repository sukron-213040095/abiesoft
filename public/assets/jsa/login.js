$("form#formLogin").on("submit", function(e) {
    e.preventDefault();
    let email = document.forms["formLogin"]["email"].value;
    let password = document.forms["formLogin"]["password"].value;
    let btnLogin = document.getElementById("btnLogin");
    if (setEmail(email)) {
        toastr.info("Email " + setEmail(email));
        document.getElementById("email").focus();
        return false;
    } else if (setText(password)) {
        toastr.info("Password " + setText(password));
        document.getElementById("password").focus();
        return false;
    } else {
        let formData = new FormData(this);
        let doAction = BASEURL + "/set_login";
        btnLogin.setAttribute("disabled", true);
        btnLogin.innerHTML = `Mengautentikasi..`;
        $.ajax({
            url: doAction,
            type: "POST",
            data: formData,
            success: function(msg) {
                if (msg == "Berhasil") {
                    window.location.href = BASEURL;
                } else if (msg == "Cancel") {
                    toastr.error("Login gagal");
                    btnLogin.removeAttribute("disabled");
                    btnLogin.innerHTML = `Login`;
                } else {
                    window.location.href = msg;
                }
            },
            cache: false,
            contentType: false,
            processData: false,
        });
        return false;
    }
});


