const checkAll = document.getElementById("check-all");

checkAll.onchange = function () {
    let cl = document.getElementsByClassName("cl");
    if (cl !== null) {
        if (this.checked) {
            for (let i = 0; i < cl.length; i++) {
                cl[i].checked = true;
            }
        } else {
            for (let i = 0; i < cl.length; i++) {
                cl[i].checked = false;
            }
        }
    }
};
