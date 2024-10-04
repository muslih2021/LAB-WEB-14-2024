// nomor 1
let evenNumber =[]
function countEvenNumbers(start, end) {
    for (let i = start; i <= end; i++) {
        if (i % 2 === 0) {
            evenNumber.push(i);
        }
    }
}
countEvenNumbers(1, 15)
console.log(`${evenNumber.length} (${evenNumber})`);

// nomor 2
let diskon;
    let besaran_diskon;
    let harga = Number(prompt("Masukkan harga barang: "));
    let jenis = prompt("Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): ").toLowerCase();

    if (jenis === "elektronik") {
        diskon = "10%";
        besaran_diskon = 0.1 * harga;
    } else if (jenis === "pakaian") {
        diskon = "20%";
        besaran_diskon = 0.2 * harga;
    } else if (jenis === "makanan") {
        diskon = "5%";
        besaran_diskon = 0.05 * harga;
    } else if (jenis === "lainnya") {
        diskon = "Tidak ada diskon";
        besaran_diskon = 0;
    } else {
        diskon = "Jenis barang tidak valid";
        besaran_diskon = 0;
    }

    let total_harga = harga - besaran_diskon;

    alert(`Harga awal: Rp${harga}\nDiskon: ${diskon}\nHarga setelah diskon: Rp${total_harga}`)


// nomor 3
const hari = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];

let hariSekarang = prompt("Hari ini hari apa? ").toLowerCase();
let jumlahHari = Number(prompt("Berapa hari? "))

const indeksHariSekarang = hari.indexOf(hariSekarang);
function hitungHari(hariSekarang, jumlahHari) {
    const indeksHariMasaDepan = (indeksHariSekarang + jumlahHari) % 7;
    
    return hari[indeksHariMasaDepan];
}

if (indeksHariSekarang === -1) {
    alert("Hari yang dimasukkan tidak valid!");
} else {
    alert(`Jika hari ini adalah hari ${hariSekarang}, maka ${jumlahHari} hari kedepan adalah hari ${hitungHari(hariSekarang, jumlahHari)}`); 
}


// nomor 4
const minNum = 1;
const maxNum = 5;
const answer = Math.floor(Math.random() * maxNum) + minNum;

let attempts = 0;
let guess;
let running = true;

while (running) {
    guess = prompt(`Masukkan salah satu dari angka ${minNum} sampai ${maxNum}`);
    guess = Number(guess);

    if (isNaN(guess)) {
        alert("Masukkan tebakan yang valid (harus berupa angka).");
    } else if (guess < minNum || guess > maxNum) {
        alert(`Pilih angka dari ${minNum} sampai ${maxNum}.`);
    } else {
        attempts++;
        if (guess > answer) {
            alert("Masih terlalu tinggi! Coba lagi...");
        } else if (guess < answer) {
            alert("Masih terlalu rendah! Coba lagi...");
        } else if (guess === answer) {
            alert(`Selamat! Kamu berhasil menebak angka ${answer} dengan benar dalam ${attempts} percobaan.`);
            running = false; 
        }
    }
}



