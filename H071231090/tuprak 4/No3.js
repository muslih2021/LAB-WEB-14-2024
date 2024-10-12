const prompt = require('prompt-sync')();

const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

const hariIni = prompt('Masukkan hari saat ini (Misal: Senin, Selasa, etc): ').toLowerCase();
const jumlahHari = parseInt(prompt('Masukkan jumlah hari ke depan: '));

let indeksHariIni = hari.findIndex(hari => hari.toLowerCase() === hariIni);

if (indeksHariIni === -1 || isNaN(jumlahHari)) {
    console.log('Inputan tidak valid.');
} else {
    let indeksHariMendatang = (indeksHariIni + jumlahHari) % 7;
    console.log(`Hari ${jumlahHari} hari ke depan adalah: ${hari[indeksHariMendatang]}`);
}