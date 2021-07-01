const URL = document.getElementById("url").value;
const TOKEN = document.getElementById("token").value;

function filter() {
    try {
        getfilter();
    } catch (e) {
        console.log(e);
        document.getElementById("list-data").innerHTML = "error";
    }
}

function getfilter() {
    const date = document.getElementById('date-range').value;
    const split = date.split(' / ');
    fetch(`${URL}/filterpembayaran`, {
        method: "post",
        body: JSON.stringify({ tgl1: split[0], tgl2: split[1] }),
        headers: { "Content-Type": "application/json", "X-CSRF-Token": TOKEN },
    })
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("list-data").innerHTML = parse(res);
        });

}

const parse = (data) => {
    let html = "";
    data.data.map((res) => {
        html += htmldata(res);
    });
    return html;
}

const htmldata = (res) => {
    return /*html*/ `<tr>
    <td>${res.tipe}</td>
    <td>${res.no_invoice}</td>
    <td>${res.harga}</td>
    <td>${res.tanggal_bayar}</td>
    <td>${res.nominal}</td>
    <td>${res.netto}</td>
    <td>${res.pabrik_tujuan}</td>
    <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"> Edit</button>&nbsp;
        <a href="/pembayaran/${res.id_pembayaran}" class="btn btn-danger">Hapus</a>
    </td>
</tr>`
}

displayD()


function displayD() {
    const dt = document.getElementsByClassName('detail');

    for (let i = 0; i < dt.length; i++) {
        dt[i].addEventListener('click', function () {
            const ID = this.getAttribute('data-id');
            console.log(ID)
            fetch(URL + '/detailp?id=' + ID)
                .then(res => res.json())
                .then(res => {
                    document.getElementById('tabel-detail').innerHTML =
                        parse2(res);
                });
        });
    }
}

const parse2 = (data) => {
    let html = "";
    let no = 1;
    data.data.map((res) => {
        html += detaildata(res, no++)
    })
    return html
}

const detaildata = (res, no) => {
    const netto = res.berat_pulang * res.refaksi
    const total = res.harga * netto
    return /*html*/ `<tr>
    <td>${no}</td>
    <td>${formatTanggal(res.tanggal_keberangkatan)}</td>
    <td>${formatTanggal(res.tanggal_pulang)}</td>
    <td>${res.no_sp}</td>
    <td>${res.no_truk}</td>
    <td>${res.pabrik_tujuan}</td>
    <td>${netto}</td>
    <td>${formatRupiah(res.harga.toString(), 'Rp ')}</td>
    <td>${formatRupiah(total.toString(), 'Rp ')}</td>
</tr>`
}

const formatTanggal = tgl => {
    const listMonth = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'November',
        'Desember',
    ];
    const month = tgl.split('-');
    return `${month[2]}/${listMonth[parseInt(month[1]) - 1]}/${month[0]}`;
};

const formatRupiah = (angka, prefix) => {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? 'Rp. ' + rupiah : '';
};