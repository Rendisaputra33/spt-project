const elementUpdate = document.getElementsByClassName("update");
const URL = document.getElementById("url").value;

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const ID = this.getAttribute("data-id");
        console.log(ID);
        document
            .getElementById("form-update")
            .setAttribute("action", URL + "/pulang/" + ID);
        fetch(URL + "/pulang/view/get/" + ID)
            .then((res) => res.json())
            .then((res) => {
                document.querySelector("input[name=no_truk]").value =
                    res.data.no_truk;
                document.querySelector("input[name=berat_pulang]").value =
                    res.data.berat_pulang;
                document.querySelector("input[name=refaksi]").value =
                    res.data.refaksi;
                document.querySelector("input[name=tanggal_pulang]").value =
                    res.data.tanggal_pulang;
                document.querySelector("input[name=tanggal_bongkar]").value =
                    res.data.tanggal_bongkar;
            });
    });
}
