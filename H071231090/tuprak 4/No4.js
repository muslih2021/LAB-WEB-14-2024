const prompt = require('prompt-sync')();

const angkaTebakan = Math.floor(Math.random() * 100) + 1;

let jumlahTebakan = 0;
let tebakan = 0;

console.log('Selamat datang di permainan tebak angka!');

while (tebakan !== angkaTebakan) {
    tebakan = parseInt(prompt('Masukkan salah satu dari angka 1 sampai 100: '));
    if (isNaN(tebakan) || tebakan < 1 || tebakan > 100) {
        console.log('Masukkan angka yang valid antara 1 sampai 100.');
        continue;
    }

    jumlahTebakan++;
    
    if (tebakan > angkaTebakan) {
        console.log('Terlalu tinggi! Coba lagi.');
    } else if (tebakan < angkaTebakan) {
        console.log('Terlalu rendah! Coba lagi.');
    } else {
        console.log(`Selamat! Kamu berhasil menebak angka ${angkaTebakan} dengan benar.`);
        console.log(`Sebanyak ${jumlahTebakan}x percobaan.`);
    }
}
