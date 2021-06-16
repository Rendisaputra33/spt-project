const URL = document.getElementById("url").value;

const elementUpdate = document.getElementsByClassName("update");

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        document
            .getElementById("form-update")
            .setAttribute("action", URL + "/wilayah/" + id);

        fetch(`${URL}/wilayah/json/getWilayah/${id}`)
            .then((res) => res.json())
            .then((res) => {
                document.querySelector("input[name=nama_wilayah]").value =
                    res.data_update.nama_wilayah;
                document.querySelector("input[name=harga_wilayah]").value =
                    res.data_update.harga_wilayah;
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
    <td>${res.id_wilayah}</td>
    <td>${res.nama_wilayah}</td>
    <td>${res.harga_wilayah}</td>
<td>

    <a href="#" class="btn btn-success text-bold update"
        data-target="#modal-lg" data-toggle="modal"
        data-id="${res.id_wilayah}">UPDATE</a>
    <form action="${URL}/wilayah/${res.id_wilayah}"
        method="post" class="d-inline">
        <input type="hidden" name="_token" value="${TOKEN}">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger text-bold">DELETE</button>
    </form>

</td>
</tr>`;
};