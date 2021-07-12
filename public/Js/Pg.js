const URL = document.getElementById('url').value;

const elementUpdate = document.getElementsByClassName('update');

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        document
            .getElementById('form-update')
            .setAttribute('action', URL + '/pg/' + id);

        fetch(`${URL}/pg/json/getPg/${id}`)
            .then(res => res.json())
            .then(res => {
                document.querySelector('input[name=nama_pg]').value =
                    res.data_update.nama_pg;
                document.querySelector('input[name=lokasi_pg]').value =
                    res.data_update.lokasi_pg;
            });
    });
}

document.getElementById('search').addEventListener('keyup', function () {
    const keyword = this.value;
    fetch(URL + '/pg/group/search?name=' + keyword)
        .then(res => res.json())
        .then(res => {
            document.getElementById('list-data').innerHTML = parseSearch(res);
        });
});

const parseSearch = data => {
    let html = '';
    data.data.map(res => {
        html += elementSearch(res);
    });
    return html;
};

const elementSearch = res => {
    return /*html*/ `<tr>
    <td>${res.id_pg}</td>
    <td>${res.nama_pg}</td>
    <td>${res.lokasi_pg}</td>
<td>

    <a href="#" class="btn btn-success text-bold update"
        data-target="#modal-lg" data-toggle="modal"
        data-id="${res.id_pg}">UPDATE</a>
    <form action="${URL}/pg/${res.id_pg}"
        method="post" class="d-inline">
        <input type="hidden" name="_token" value="${TOKEN}">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger text-bold">DELETE</button>
    </form>

</td>
</tr>`;
};

function listDelete() {
    const documentDel = document.querySelectorAll('.delete');
    for (let i = 0; i < documentDel.length; i++) {
        documentDel[i].onclick = function (e) {
            e.preventDefault();
            swalDelete(this.getAttribute('href'));
        };
    }
}

function swalDelete(param) {
    Swal.fire({
        title: 'Yakin ingin Menghapus?',
        text: 'Data akan di hapus secara permanent!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
    }).then(result => {
        result.isConfirmed ? (window.location.href = param) : '';
    });
}

listDelete();
