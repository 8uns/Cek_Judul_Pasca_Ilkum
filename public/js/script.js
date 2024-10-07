// var BASEURL = "http://localhost/put/public/";


// $.ajax({
//     url: BASEURL + 'dashboard/getMhs',

//     method: 'post',
//     dataType: 'json',
//     success: function (data) {
//         $('#totalmhs').append(data.totalmhs);
//     }
// });



// $.ajax({
//     url: BASEURL + 'dashboard/getKrit',

//     method: 'post',
//     dataType: 'json',
//     success: function (data) {
//         $('#totalkrit').append(data.totalkrit);
//     }
// });



// $.ajax({
//     url: BASEURL + 'dashboard/getIns',

//     method: 'post',
//     dataType: 'json',
//     success: function (data) {
//         $('#totalins').append(data.totalins);
//     }
// });





// $.ajax({
//     url: BASEURL + 'dashboard/getInstrumen',
//     method: 'post',
//     dataType: 'json',
//     success: function (dataRek) {

//         // chart 1
//         console.log(dataRek)
//         const ctx = document.getElementById('myChart').getContext('2d');
//         const data = {
//             labels: [
//                 'Sudah mengisi kuisioner/instrumen',
//                 'Belum mengisi kuisioner/instrumen'
//             ],
//             datasets: [{
//                 label: 'My First Dataset',
//                 data: [dataRek.totalsudah, dataRek.totalbelum],
//                 backgroundColor: [
//                     'rgb(75, 192, 192)',
//                     'rgb(255, 205, 86)'
//                 ],
//                 hoverOffset: 4
//             }]
//         };
//         const config = {
//             type: 'doughnut',
//             data: data,
//             options: {}
//         };
//         const myChart = new Chart(
//             document.getElementById('myChart'),
//             config
//         );

//     }
// });

