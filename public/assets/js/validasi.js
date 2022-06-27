function setPilihan(txt) {
    if (txt == "" || txt == null) {
        let status = "belum dipilih";
        return status;
    }
}

function setClean(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    }
}

function setSimpel(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 0) {
        let status = "minimal 1 huruf";
        return status;
    }
}

function setText(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        let status = "minimal 4 huruf";
        return status;
    }
}

function validateEmail(email) {
    // const re =
    //     /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const re =/^\w+(?:\.\w+)*@\w+(?:\.\w+)+$/;
    return re.test(email);
}

function validateUrl(url) {
    const pattern = new RegExp(
        "^(https?:\\/\\/)?" +
        "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" +
        "((\\d{1,3}\\.){3}\\d{1,3}))" +
        "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" +
        "(\\?[;&a-z\\d%_.~+=-]*)?" +
        "(\\#[-a-z\\d_]*)?$",
        "i"
    );
    return !!pattern.test(url);
}

function setEmail(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        let status = "minimal 4 huruf";
        return status;
    } else if (!validateEmail(txt)) {
        let status = "tidak sesuai format";
        return status;
    }
}

function setUrl(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        let status = "minimal 4 huruf";
        return status;
    } else if (!validateUrl(txt)) {
        let status = "format url salah";
        return status;
    }
}

function setAngka(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        let status = "minimal 4 angka";
        return status;
    } else if (isNaN(txt)) {
        let status = "harus angka";
        return status;
    }
}

function setAngkaOnly(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (isNaN(txt)) {
        let status = "harus angka";
        return status;
    }
}

function setNoHp(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 9) {
        let status = "minimal 10 angka";
        return status;
    } else if (isNaN(txt)) {
        let status = "harus angka";
        return status;
    }
}

function setUsia(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (txt < 1) {
        let status = "minimal 1 tahun";
        return status;
    } else if (isNaN(txt)) {
        let status = "harus angka";
        return status;
    }
}

function setKtp(txt) {
    if (txt == "" || txt == null) {
        let status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 15) {
        let status = "harus 16 angka";
        return status;
    } else if (isNaN(txt)) {
        let status = "harus angka";
        return status;
    }
}