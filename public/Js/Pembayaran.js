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