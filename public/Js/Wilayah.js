const URL = document.getElementById("url").value;

document.getElementById("update").addEventListener("click", function () {
    const id = this.getAttribute("data-id");
    fetch(`${URL}/wilayah/json/getWilayah/${id}`)
        .then((res) => res.json())
        .then((res) => {
            document.querySelector("input[name=nama_wilayah]").value =
                res.data_update.nama_wialayah;
            document.querySelector("input[name=harga_wilayah]").value =
                res.data_update.harga_wilayah;
        });
});
