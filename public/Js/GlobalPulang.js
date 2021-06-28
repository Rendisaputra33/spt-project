const URL = document.getElementById('url').value;
const TOKEN = document.getElementById('token').value;

function displayU() {
    const elementUpdate = document.getElementsByClassName('update');
    for (let i = 0; i < elementUpdate.length; i++) {
        elementUpdate[i].addEventListener('click', function () {
            const ID = this.getAttribute('data-id');
            console.log(ID);
            document
                .getElementById('form-update')
                .setAttribute('action', URL + '/pulang/' + ID);
            fetch(URL + '/pulang/view/get/' + ID)
                .then(res => res.json())
                .then(res => {
                    document.querySelector('input[name=no_truk]').value =
                        res.data.no_truk;
                    document.querySelector('input[name=berat_pulang]').value =
                        res.data.berat_pulang;
                    document.querySelector('input[name=refaksi]').value =
                        res.data.refaksi;
                    document.querySelector('input[name=tanggal_pulang]').value =
                        res.data.tanggal_pulang;
                    document.querySelector(
                        'input[name=tanggal_bongkar]'
                    ).value = res.data.tanggal_bongkar;
                });
        });
    }
}

displayU();

document.getElementById('filter').addEventListener('click', function () {
    filter();
});

function filter() {
    try {
        getfilter();
    } catch (e) {
        console.log(e);
        document.getElementById('list-data').innerHTML = 'error';
    }
}

function getfilter() {
    const date = document.getElementById('date-range').value;
    const split = date.split(' / ');
    fetch(`${URL}/filterpulang`, {
        method: 'post',
        body: JSON.stringify({ tgl1: split[0], tgl2: split[1] }),
        headers: { 'Content-Type': 'application/json', 'X-CSRF-Token': TOKEN },
    })
        .then(res => res.json())
        .then(res => {
            document.getElementById('list-data').innerHTML = parse(res);
            displayD();
            displayU();
        });
}

const parse = data => {
    let html = '';
    let no = 1;
    data.data.map(res => {
        html += htmldata(res, no++);
    });
    return html;
};

const htmldata = (res, no) => {
    const total = res.netto_pulang * res.harga;
    return /*html*/ `<tr>
    <td>${no}</td>
    <td>${formatTanggal(res.tanggal_pulang)}</td>
    <td>${formatTanggal(res.tanggal_keberangkatan)}</td>
    <td>${res.nama_petani}</td>
    <td>${res.no_sp}</td>
    <td>${res.no_truk}</td>
    <td>${res.nama_sopir} Kuintal</td>
    <td>${res.netto_pulang}</td>
    <td>${formatRupiah(res.harga.toString(), 'Rp ')}</td>
    <td>${formatRupiah(total.toString(), 'Rp ')}</td>
    <td>
        <button type="button" class="btn btn-primary text-bold detail" id="detail" data-target="#modal-lg-2" data-toggle="modal" data-id="${
            res.id_keberangkatan
        }"><i class="fas fa-info-circle"></i>&nbsp;Detail</button>
        <button type="button" class="btn btn-success text-bold update" data-target="#modal-lg" data-toggle="modal" data-id="${
            res.id_keberangkatan
        }"><i class="fas fa-pencil-alt"></i>&nbsp;Ubah</button>
        <a href="/pulang/${
            res.id_keberangkatan
        }" class="btn btn-danger text-bold"><i class="far fa-trash-alt"></i>&nbsp;Hapus</a>
    </td>
</tr>`;
};

function displayD() {
    const dt = document.getElementsByClassName('detail');

    for (let i = 0; i < dt.length; i++) {
        dt[i].addEventListener('click', function () {
            const ID = this.getAttribute('data-id');
            fetch(URL + '/detail?id=' + ID)
                .then(res => res.json())
                .then(res => {
                    (document.getElementById('detail1').innerHTML = htmldetail(
                        res.data
                    )),
                        (document.getElementById('detail2').innerHTML =
                            htmldetail2(res.data));
                });
        });
    }
}

displayD();

const htmldetail = res => {
    return /*html*/ `<tr class="col-sm" style="display: flex; flex-direction: column;">
    <td>${formatTanggal(res.tanggal_keberangkatan)}</td>
    <td>${res.tipe}</td>
    <td>${res.no_sp}</td>
    <td>${res.no_induk}</td>
    <td>${res.wilayah}</td>
    <td>${res.nama_sopir}</td>
    <td>${res.nama_petani}</td>
    <td>${res.pabrik_tujuan}</td>
    <td>${res.berat_pulang}</td>
</tr>`;
};

const htmldetail2 = res => {
    return /*html*/ `<tr class="col-sm" style="display: flex; flex-direction: column;">
    <td>${res.no_induk}</td>
    <td>${res.wilayah}</td>
    <td>${res.nama_sopir}</td>
    <td>${res.nama_petani}</td>
    <td>${res.pabrik_tujuan}</td>
    <td>${res.berat_pulang}</td>
    <td>${res.netto}</td>
    <td>${formatRupiah(res.harga.toString(), 'Rp ')}</td>
    <td>${formatTanggal(res.tanggal_pulang)}</td>
</tr>`;
};

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
