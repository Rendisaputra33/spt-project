const URL = document.getElementById("url").value;

document.getElementById("update").addEventListener("click", function () {
    const ID = this.getAttribute("data-id");
    fetch(URL + "/berangkat/view/get/" + ID)
        .then((res) => res.json())
        .then((res) => {
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tipe]").value = res.data.tipe;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
            document.querySelector("input[name=tanggal_keberangkatan]").value = res.data.tanggal_keberangkatan;
        })
});
