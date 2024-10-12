const prompt = require('prompt-sync')();

const hargaAwal = parseFloat(prompt('Masukkan harga barang: Rp. '));
const jenisBarang = prompt('Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): ').toLowerCase();

let diskon = 0;
if (jenisBarang === 'elektronik') {
    diskon = 10; // Diskon 10% untuk Elektronik
} else if (jenisBarang === 'pakaian') {
    diskon = 20; // Diskon 20% untuk Pakaian
} else if (jenisBarang === 'makanan') {
    diskon = 5;  // Diskon 5% untuk Makanan
} else {
    diskon = 0;
}

const potonganHarga = (hargaAwal * diskon) / 100;
const hargaAkhir = hargaAwal - potonganHarga;

console.log(`Harga awal: Rp${hargaAwal}`);
console.log(`Diskon: ${diskon}%`);
console.log(`Harga akhir setelah diskon: Rp. ${hargaAkhir}`);