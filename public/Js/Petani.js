const URL = document.getElementById("url").value;

const elementUpdate = document.getElementsByClassName("update");

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        document
            .getElementById("form-update")
            .setAttribute("action", URL + "/petani/" + id);
        fetch(`${URL}/petani/json/getPetani/${id}`)
            .then((res) => res.json())
            .then((res) => {
                document.querySelector("input[name=nama_petani]").value =
                    res.data_update.nama_petani;
                document.querySelector("input[name=register_petani]").value =
                    res.data_update.register_petani;
                document.querySelector("input[name=nama_pabrik]").value =
                    res.data_update.nama_pabrik;
            })
            .catch((err) => console.log(err));
    });
}
