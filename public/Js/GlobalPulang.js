const elementUpdate = document.getElementsByClassName("update");
const URL = document.getElementById("url").value;
const TOKEN = document.getElementById("token").value;

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

document.getElementById('filter').addEventListener('click', function () {
    filter();
});

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
    fetch(`${URL}/filterpulang`, {
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
    <td>${res.no_sp}</td>
    <td>${res.wilayah}</td>
    <td>${res.nama_petani}</td>
    <td>${res.nama_sopir}</td>
    <td>${res.pabrik_tujuan}</td>
    <td>${res.berat_pulang} Kuintal</td>
    <td>${res.netto_pulang}</td>
    <td>formatRupiah(${res.harga})</td>
    <td>formatTanggal(${res.tanggal_pulang})</td>
    <td>
        <button type="button" class="btn btn-warning update" data-target="#modal-lg" data-toggle="modal" data-id="${res.id_keberangkatan}"> Edit</button>&nbsp;
        <a href="/pulang/${res.id_keberangkatan}" class="btn btn-danger">Hapus</a>
    </td>
</tr>`
}
