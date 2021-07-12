const URL = document.getElementById('url').value;
const elementUpdate = document.getElementsByClassName('update');

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener('click', function () {
        const id = elementUpdate[i].getAttribute('data-id');
        console.log(id);
        document
            .getElementById('form-update')
            .setAttribute('action', URL + '/sopir/' + id);

        fetch(`${URL}/sopir/json/getSopir/${id}`)
            .then(res => res.json())
            .then(res => {
                document.querySelector('input[name=nama_sopir]').value =
                    res.data_update.nama_petani;
                document.querySelector('input[name=nohp_sopir]').value =
                    res.data_update.nohp_petani;
                document.querySelector('input[name=alamat_sopir]').value =
                    res.data_update.alamat_petani;
            });
    });
}

document.getElementById('search').addEventListener('keyup', function () {
    const keyword = this.value;
    fetch(URL + '/sopir/group/search?name=' + keyword)
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
    <td>${res.id_petani}</td>
    <td>${res.nama_petani}</td>
    <td>${res.nohp_petani}</td>
    <td>${res.alamat_petani}</td>
<td>

    <a href="#" class="btn btn-success text-bold update"
        data-target="#modal-lg" data-toggle="modal"
        data-id="${res.id_sopir}">UPDATE</a>
    <form action="${URL}/sopir/${res.id_petani}"
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

const flash = document.querySelector('#flash-data-success');

const alert = Swal.mixin({
    toast: true,
    position: 'top-end',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500,
});

if (flash.getAttribute('data-flash-success') !== '') {
    alert.fire({
        icon: 'success',
        title: `${flash.getAttribute('data-flash-success')}`,
    });
}