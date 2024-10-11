const hari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];

let hariSekarang = prompt("Masukkan hari ini: ").toLowerCase();
let hariKedepan = parseInt(prompt("Masukkan jumlah hari ke depan: "));
let indeksHariSekarang = -1;

// Cek validitas hari yang dimasukkan
for (let i = 0; i < hari.length; i++) {
    if (hari[i] === hariSekarang) {
        indeksHariSekarang = i;
        break;
    }
}

// Jika hari valid, hitung hari berikutnya, jika tidak tampilkan pesan error
if (indeksHariSekarang !== -1) {
    let hasilIndeks = (indeksHariSekarang + hariKedepan) % 7;
    console.log(hariKedepan + " hari ke depan adalah: " + hari[hasilIndeks]);
} else {
    console.log("Hari yang dimasukkan tidak valid: " + hariSekarang);
}
