//  OBJEK KE JSON
// let mahasiswa = {
//     nama: "rizkika zakka 1",
//     umur: 21,
//     hobby: "basket"
// }

// // objek
// // console.log(mahasiswa);

// console.log(JSON.stringify(mahasiswa));

// JSON KE OBJEK
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }

// // menjalankan ajax
// xhr.open('GET', 'coba.json', true);
// xhr.send();

// MENGGUNAKA JQUERY   
$.getJSON('coba.json', function (data) {

    console.log(data);

})