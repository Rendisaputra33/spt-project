$('#tb').dataTable({
    searching: false,
    lengthChange: false,
    language: {
        info: 'Halaman ke _PAGE_ dari _PAGES_',
    },
});

document.getElementById('filter').onclick = function () {
    console.log('ok');
    pager();
};

function pager() {
    $('#tb').dataTable({
        searching: false,
        lengthChange: false,
        language: {
            info: 'Halaman ke _PAGE_ dari _PAGES_',
        },
    });
}

// $(document).cange(function () {
//     $('#tb').dataTable({
//         searching: false,
//         lengthChange: false,
//         language: {
//             info: 'Halaman ke _PAGE_ dari _PAGES_',
//         },
//     });
// });
