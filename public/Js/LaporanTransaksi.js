const URL = document.getElementById('url').value;
const TOKEN = document.getElementById('token').value;

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
    const pabrik = document.getElementById('pabrik').value;
    const type = document.getElementById('type').value;
    const date = document.getElementById('date-range').value;
    const split = date.split(' / ');
    fetch(`${URL}/filtertransaksi`, {
        method: 'post',
        body: JSON.stringify({
            tgl1: split[0],
            tgl2: split[1],
            type: type,
            tujuan: pabrik,
        }),
        headers: { 'Content-Type': 'application/json', 'X-CSRF-Token': TOKEN },
    })
        .then(res => res.json())
        .then(res => {
            document.getElementById('list-data').innerHTML = parse(res);
        });
}

const parse = data => {
    let html = '';
    data.data.map(res => {
        html += htmldata(res);
    });
    return html;
};

const htmldata = res => {
    return /*html*/ `<tr>
    <td>${res.tipe}</td>
    <td>${res.no_sp}</td>
    <td>${res.wilayah}</td>
    <td>${res.nama_petani}</td>
    <td>${res.nama_sopir}</td>
    <td>${res.pabrik_tujuan}</td>
    <td>${res.berat_timbang}</td>
    <td>${res.netto}</td>
    <td>formatRupiah(${res.harga})</td>
    <td>formatTanggal(${res.tanggal_keberangkatan})</td>
    <td><a href="/transaksi/berangkat/cetak/${res.id_keberangkatan}" class="btn btn-success">cetak</a></td>
</tr>`;
};
