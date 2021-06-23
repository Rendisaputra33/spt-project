const URL = document.getElementById("url").value;
const TOKEN = document.getElementById("token").value;

const elementUpdate = document.getElementsByClassName("update");

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const ID = this.getAttribute("data-id");
        document
            .getElementById("form-update")
            .setAttribute("action", URL + "/berangkat/" + ID);
        fetch(URL + "/berangkat/view/get/" + ID)
            .then((res) => res.json())
            .then((res) => {
                document.querySelector("input[name=utanggal_berangkat]").value =
                    res.data.tanggal_keberangkatan;
                document.querySelector("select[name=utipe]").value =
                    res.data.tipe;
                document.querySelector("input[name=uno_sp]").value =
                    res.data.no_sp;
                document.querySelector("input[name=uno_induk]").value =
                    res.data.no_induk;
                document.querySelector("select[name=uwilayah]").value =
                    res.data.wilayah;
                document.querySelector("select[name=unama_petani]").value =
                    res.data.nama_petani;
                document.querySelector("select[name=unama_sopir]").value =
                    res.data.nama_sopir;
                document.querySelector("select[name=upabrik_tujuan]").value =
                    res.data.pabrik_tujuan;
                document.querySelector("input[name=usangu]").value =
                    res.data.sangu;
                document.querySelector("input[name=uberat_timbang]").value =
                    res.data.berat_timbang;
                document.querySelector("input[name=utara_mbl]").value =
                    res.data.tara_mbl;
                document.querySelector("input[name=unetto]").value =
                    res.data.netto;
                document.querySelector("input[name=uharga]").value =
                    res.data.harga;
            });
    });
}

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

document.getElementById("filter").addEventListener("click", function () {
    const a = new Date().toLocaleDateString();
    const date = a.split("/");
    const month = date[0] < 10 ? "0" + date[0] : date[0];
    document.querySelector(
        "input[name=tgl1]"
    ).value = `${date[2]}-${month}-${date[1]}`;
});

function filter() {
    const tgl1 = document.getElementById("tgl1").value;
    const tgl2 = document.getElementById("tgl2").value;
    const data = fetch(URL + "/filterberangkat", {
        method: "post",
        body: JSON.stringify({ tgl1: tgl1, tgl2: tgl2 }),
        headers: { "Content-Type": "application/json", "X-CSRF-Token": TOKEN },
    })
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("list-data").innerHTML = parse(res);
        });
    return data.json();
}

const parse = (data) => {
    let html = "";
    data.data.map((res) => {
        html += elementSearch(res);
    });
    return html;
};

const data = (res) => {
    return /*html*/ `<tr>
    <td>${res.tipe}</td>
    <td>${res.no_sp}</td>
    <td>${res.wilayah}</td>
    <td>${res.nama_petani}</td>
    <td>${res.nama_sopir}</td>
    <td>${res.pabrik_tujuan}</td>
    <td>${res.berat_timbang}</td>
    <td>${res.netto}</td>
    <td>${res.harga}</td>
    <td>${res.tanggal_keberangkatan}</td>
    <td>
        <button type="button" class="btn btn-info update" data-toggle="modal" data-target="#exampleModal" data-id="${res.id_keberangkatan}"> Edit</button>&nbsp;
        <a href="/berangkat/${res.id_keberangkatan}" class="btn btn-danger">Hapus</a>
    </td>
</tr>`;
};
