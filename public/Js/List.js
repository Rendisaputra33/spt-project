const elementUpdate = document.getElementsByClassName('update');
const URL = document.getElementById('url').value;
const TOKEN = document.getElementById('token').value;

for (let i = 0; i < elementUpdate.length; i++) {
    elementUpdate[i].addEventListener('click', function () {
        const ID = this.getAttribute('data-id');
        document
            .getElementById('form-update')
            .setAttribute('action', URL + '/pulang/' + ID);
    });
}

document
    .querySelector('input[name=berat_pulang]')
    .addEventListener('keyup', function () {
        document.querySelector('input[name=netto]').value =
            this.value.toString();
    });

document
    .querySelector('input[name=refaksi]')
    .addEventListener('keyup', function () {
        let set =
            parseInt(document.querySelector('input[name=berat_pulang]').value) -
            parseInt(this.value);
        document.querySelector('input[name=netto]').value = set.toString();
    });

