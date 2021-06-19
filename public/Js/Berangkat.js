const URL = document.getElementById("url").value;
const TOKEN = document.getElementById("token").value;

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

document.getElementById('filter').addEventListener('click', function () {
    const tgl = document.getElementById('tgl1');
    const a = new Date().toLocaleDateString();
    const date = a.split('/');
    const month = date[0] < 10 ? "0" + date[0] : date[0];
    document.querySelector('input[name=tgl1]').value = `${date[2]}-${month}-${date[1]}`;
})

function filter() {
    const tgl1 = document.getElementById('tgl1').value;
    const tgl2 = document.getElementById('tgl2').value;
    const data = fetch(URL + "/filterberangkat", {
        method: 'post',
        body: JSON.stringify({ tgl1: tgl1, tgl2: tgl2 }),
        headers: { "Content-Type": "application/json", "X-CSRF-Token": TOKEN },
    })
        .then(res => res.json())
        .then(res => {
            document.getElementById('list-data').innerHTML = parse(res);
        })
}

const parse = (data) => {
    let html = "";
    data.data.map((res) => {
        html += elementSearch(res);
    });
    return html;
}

const data = (res) => {
    return /*html*/ `<tr>
    <td>${item.tipe}</td>
    <td>${item.no_sp}</td>
    <td>${item.wilayah}</td>
    <td>${item.nama_petani}</td>
    <td>${item.nama_sopir}</td>
    <td>${item.pabrik_tujuan}</td>
    <td>${item.berat_timbang}</td>
    <td>${item.netto}</td>
    <td>${item.harga}</td>
    <td>${item.tanggal_keberangkatan}</td>
    <td>
        <button type="button" class="btn btn-info update" data-toggle="modal" data-target="#exampleModal" data-id="${item.id_keberangkatan}"> Edit</button>&nbsp;
        <a href="/berangkat/${item.id_keberangkatan}" class="btn btn-danger">Hapus</a>
    </td>
</tr>`
}
