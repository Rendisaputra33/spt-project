const URL = document.getElementById("url").value;

const elementUpdate = document.getElementsByClassName("update");

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        document
            .getElementById("form-update")
            .setAttribute("action", URL + "/wilayah/" + id);

        fetch(`${URL}/wilayah/json/getWilayah/${id}`)
            .then((res) => res.json())
            .then((res) => {
                document.querySelector("input[name=nama_wilayah]").value =
                    res.data_update.nama_wilayah;
                document.querySelector("input[name=harga_wilayah]").value =
                    res.data_update.harga_wilayah;
            });
    });
}
