const angkaRahasia = Math.floor(Math.random() * 100) + 1;
let tebakanPemain = prompt("Coba tebak angka dari 1 sampai 100: (angka acak = " + angkaRahasia + ")");
let jumlahPercobaan = 1;

while (tebakanPemain != angkaRahasia) {
    jumlahPercobaan++;
    
    if (tebakanPemain > angkaRahasia) {
        console.log("Angka terlalu besar, coba lagi!");
        tebakanPemain = prompt("Terlalu besar! Coba lagi. (angka acak = " + angkaRahasia + ")");
    } else {
        console.log("Angka terlalu kecil, coba lagi!");
        tebakanPemain = prompt("Terlalu kecil! Coba lagi. (angka acak = " + angkaRahasia + ")");
    }
}

console.log("Hebat! Kamu berhasil menebak angka " + angkaRahasia + " dengan benar.");
console.log("Jumlah percobaan: " + jumlahPercobaan + " kali.");
