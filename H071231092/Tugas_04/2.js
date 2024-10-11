function hargaSetelahDiskon(harga, jenis) {
    let diskon = 0;

    if (jenis.toLowerCase() == "elektronik") {
        diskon = 10;
    } else if (jenis.toLowerCase() == "pakaian") {
        diskon = 20;
    } else if (jenis.toLowerCase() == "makanan") {
        diskon = 5;
    } else {
        diskon = 0;
    }

    let jumlahDiskon = (diskon/100) * harga;
    let hargaAkhir = harga - jumlahDiskon;

    console.log("Harga awal: Rp" + harga);
    console.log("Diskon: " + diskon + "%");
    console.log("Harga setelah diskon: " + hargaAkhir);
}


let harga = prompt("Masukkan Harga Barang: ");
let jenis = prompt("Masukkan Jenis Barang (Elektronik, Pakaian, Makanan, Lainnya): ");

harga = parseFloat(harga);

hargaSetelahDiskon(harga, jenis);
