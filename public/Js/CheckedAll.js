const checkAll = document.getElementById("check-all");
const URL = document.getElementById("url").value;
const TOKEN = document.getElementById("token").value;

checkAll.onchange = function () {
    let cl = document.getElementsByClassName("cl");
    if (cl !== null) {
        if (this.checked) {
            for (let i = 0; i < cl.length; i++) {
                cl[i].checked = true;
            }
        } else {
            for (let i = 0; i < cl.length; i++) {
                cl[i].checked = false;
            }
        }
    }
};

document.getElementById("filter").addEventListener("click", function () {
    const sopir = document.querySelector("select[name=pilih]");
    const ds = document.querySelectorAll("input[type=checkbox]");

    if (sopir.value === "Pilih Petani") {
        for (let i = 0; i < ds.length; i++) {
            ds[i].disabled = true;
        }
    } else {
        for (let i = 0; i < ds.length; i++) {
            ds[i].disabled = false;
        }
    }
    getSopir();
});

document.querySelector("select[name=pilih]").onchange = function () {
    if (this.value === "Pilih Petani") {
        const ds = document.querySelectorAll("input[type=checkbox]");
        for (let i = 0; i < ds.length; i++) {
            ds[i].disabled = true;
        }
    }
};

function getSopir() {
    const sopir = document.querySelector("select[name=pilih]").value;
    fetch(URL + "/pilih?name=" + sopir)
        .then((res) => res.json())
        .then(
            (res) =>
                (document.getElementById("list-data").innerHTML = parse(
                    res.pembayaran
                ))
        );
}

const parse = (data) => {
    let html = "";
    data.map((res) => {
        html += htmldata(res);
    });
    return html;
};

const htmldata = (item) => {
    return /*html*/ `<tr>
    <td><input type="checkbox" class="cl" name="id[]" value="${
        item.id_keberangkatan
    }" /></td>
    <td>${formatTanggal(item.tanggal_pulang)}</td>
    <td>${item.tipe}</td>
    <td>${item.nama_petani}</td>
    <td>${item.nama_sopir}</td>
    <td>${item.pabrik_tujuan}</td>
    <td>${formatTanggal(item.tanggal_keberangkatan)}</td>
    <td>${item.refaksi}</td>
    <td>${formatRupiah((item.harga * item.netto).toString())}</td>

</tr>`;
};

const formatTanggal = (tgl) => {
    const listMonth = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "November",
        "Desember",
    ];
    const month = tgl.split("-");
    return `${month[2]}-${listMonth[parseInt(month[1]) - 1]}-${month[0]}`;
};

const formatRupiah = (angka, prefix) => {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
};
