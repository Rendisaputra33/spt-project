const URL = document.getElementById("url").value;

document.getElementById("update").addEventListener("click", function () {
    const id = this.getAttribute("data-id");
    fetch(`${URL}/pg/json/getPg/${id}`)
        .then((res) => res.json())
        .then((res) => {
            document.querySelector("input[name=nama_pg]").value =
                res.data_update.nama_pg;
            document.querySelector("input[name=lokasi_pg]").value =
                res.data_update.lokasi_pg;
        });
});
