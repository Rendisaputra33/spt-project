const URL = document.getElementById("url").value;

const elementUpdate = document.getElementsByClassName("update");

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        document
            .getElementById("form-update")
            .setAttribute("action", URL + "/pg/" + id);

        fetch(`${URL}/pg/json/getPg/${id}`)
            .then((res) => res.json())
            .then((res) => {
                document.querySelector("input[name=nama_pg]").value =
                    res.data_update.nama_pg;
                document.querySelector("input[name=lokasi_pg]").value =
                    res.data_update.lokasi_pg;
            });
    });
}
