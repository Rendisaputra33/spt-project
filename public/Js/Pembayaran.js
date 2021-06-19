const URL = document.getElementById("url").value;
const TOKEN = document.getElementById("token").value;

function filter() {
    const tgl1 = document.getElementById('tgl1');
    const tgl2 = document.getElementById('tgl2');
    const data = fetch(URL + "/filterpembayaran", {
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
    <td>${item.no_invoice}</td>
    <td>${item.harga}</td>
    <td>${item.tanggal_bayar}</td>
    <td>${item.nominal}</td>
    <td>${item.netto}</td>
    <td>${item.pabrik_tujuan}</td>
    <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"> Edit</button>&nbsp;
        <a href="/pembayaran/${item.id_pembayaran}" class="btn btn-danger">Hapus</a>
    </td>
</tr>`
}