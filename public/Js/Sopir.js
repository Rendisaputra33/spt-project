const URL = document.getElementById("url").value;

const elementUpdate = document.getElementsByClassName("update");

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        document
            .getElementById("form-update")
            .setAttribute("action", URL + "/sopir/" + id);

        fetch(`${URL}/sopir/json/getSopir/${id}`)
            .then((res) => res.json())
            .then((res) => {
                document.querySelector("input[name=nama_sopir]").value =
                    res.data_update.nama_sopir;
                document.querySelector("input[name=nohp_sopir]").value =
                    res.data_update.nohp_sopir;
                document.querySelector("input[name=alamat_sopir]").value =
                    res.data_update.alamat_sopir;
            });
    });
}

document.getElementById("search").addEventListener("keyup", function () {
    const keyword = this.value;
    fetch(URL + "/sopir/group/search?name=" + keyword)
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("list-data").innerHTML = parseSearch(res);
        });
});

const parseSearch = (data) => {
    let html = "";
    data.data.map((res) => {
        html += elementSearch(res);
    });
    return html;
};

const elementSearch = (res) => {
    return /*html*/ `<tr>
    <td>${res.id_sopir}</td>
    <td>${res.nama_sopir}</td>
    <td>${res.nohp_sopir}</td>
    <td>${res.alamat_sopir}</td>
<td>

    <a href="#" class="btn btn-success text-bold update"
        data-target="#modal-lg" data-toggle="modal"
        data-id="${res.id_sopir}">UPDATE</a>
    <form action="${URL}/sopir/${res.id_sopir}"
        method="post" class="d-inline">
        <input type="hidden" name="_token" value="${TOKEN}">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger text-bold">DELETE</button>
    </form>

</td>
</tr>`;
};
