const URL = document.getElementById("url").value;

const elementUpdate = document.getElementsByClassName("update");

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const ID = this.getAttribute("data-id");
        fetch(URL + "/berangkat/view/get/" + ID)
            .then((res) => res.json())
            .then((res) => {
                document.querySelector("input[name=utanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
                document.querySelector("input[name=utipe]").value = res.data.tipe;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
                document.querySelector(
                    "input[name=tanggal_keberangkatan]"
                ).value = res.data.tanggal_keberangkatan;
            });
    });
}

// document.getElementById("update").addEventListener("click", function () {
//     const ID = this.getAttribute("data-id");
//     fetch(URL + "/berangkat/view/get/" + ID)
//         .then((res) => res.json())
//         .then((res) => {
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tipe]").value = res.data.tipe;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//             document.querySelector("input[name=tanggal_keberangkatan]").value =
//                 res.data.tanggal_keberangkatan;
//         });
// });

let dataHarga = {
    id: 0,
    harga: 0,
};

const netto = document.querySelector("input[name=netto]");

document
    .querySelector("input[name=berat_timbang]")
    .addEventListener("keyup", function () {
        netto.value = this.value;
    });

document
    .querySelector("input[name=tara_mbl]")
    .addEventListener("keyup", function () {
        const net =
            parseInt(
                document.querySelector("input[name=berat_timbang]").value
            ) - parseInt(this.value);
        netto.value = net.toString();
    });

document
    .querySelector("select[name=wilayah]")
    .addEventListener("change", function () {
        console.log("ok");
        fetch(URL + "/wilayah/getHarga/" + this.value)
            .then((res) => res.json())
            .then((res) => updateHarga(res.data[0]));
    });

document
    .querySelector("select[name=nama_petani]")
    .addEventListener("change", function () {
        console.log("ok");
        fetch(URL + "/petani/getRegister/" + this.value)
            .then((res) => res.json())
            .then((res) => updateRegister(res.data[0]));
    });

const updateHarga = (res) => {
    if (res == null) {
        document.querySelector("input[name=harga]").value = "";
    } else {
        dataHarga.id = res.id_wilayah;
        dataHarga.harga = res.harga_wilayah;
        document.querySelector("input[name=harga]").value = dataHarga.harga;
    }
};

const updateRegister = (res) => {
    document.querySelector("input[name=no_induk]").value = res.register_pemilik;
};
