const URL = document.getElementById("url").value;

document.getElementById("update").addEventListener("click", function () {
    const id = this.getAttribute("data-id");
    fetch(`${URL}/petani/json/getPetani/${id}`)
        .then((res) => res.json())
        .then((res) => {
            document.querySelector("input[name=nama_petani]").value =
                res.data_update.nama_petani;
            document.querySelector("input[name=register_petani]").value =
                res.data_update.register_petani;
            document.querySelector("input[name=nama_pabrik]").value =
                res.data_update.nama_pabrik;
        });
});
