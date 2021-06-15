const URL = document.getElementById("url").value;

const elementUpdate = document.getElementsByClassName("update");

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        document
            .getElementById("form-update")
            .setAttribute("action", URL + "/sopir/" + id);

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
}
