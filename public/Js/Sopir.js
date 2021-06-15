const URL = document.getElementById("url").value;

document.getElementById("update").addEventListener("click", function () {
    const id = this.getAttribute("data-id");
    fetch(`${URL}/sopir/json/getSopir/${id}`)
        .then((res) => res.json())
        .then((res) => {
            document.querySelector("input[name=nama_sopir]").value =
                res.data_update.nama_sopir;
            document.querySelector("input[name=nohp_sopir]").value =
                res.data_update.nohp_sopir;
            document.querySelector("input[name=alamat_sopir]").value =
                res.data_update.alamat_sopir;
        });
});
