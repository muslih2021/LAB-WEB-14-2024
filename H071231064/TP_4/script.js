//A.M.Yusran Mazidan
//H071231064
//Nomor 1
function tentukanGanjilGenap(start, end) {
    let count = 0;
    for (let i = start; i <= end; i++) {
        if (i % 2 === 0) {
            count++;
        }
    }
    return count;
}

//Nomor 2
function hitungDiskon() {
    let discountPercentage = 0;
    let price = parseFloat(prompt('Masukkan harga barang:'));
    let itemType = prompt('Masukkan jenis barang (elektronik, pakaian, makanan, lainnya):').toLowerCase();

    switch (itemType) {
        case 'elektronik':
            discountPercentage = 10;
            break;
        case 'pakaian':
            discountPercentage = 20;
            break;
        case 'makanan':
            discountPercentage = 5;
            break;
        default:
            discountPercentage = 0;
    }

    let discountAmount = (discountPercentage / 100) * price;
    let finalPrice = price - discountAmount;

    console.log(`Harga awal: Rp${price}`);
    console.log(`Diskon: ${discountPercentage}%`);
    console.log(`Harga setelah diskon: Rp${convertToRupiah(finalPrice)}`);
}

//Nomor 3
function cariHariKemudian() {
    const daysOfWeek = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
    let currentDay = prompt('Hari Sekarang adalah').toLowerCase();
    let daysToAdd = parseInt(prompt('Berapa Hari kemudian'));
    let currentIndex = daysOfWeek.indexOf(currentDay);
    if (currentIndex === -1) {
        console.log('Hari tidak valid');
        return;
    }
    let futureIndex = (currentIndex + daysToAdd) % 7;
    console.log(`Hari ${daysToAdd} hari kemudian adalah: ${daysOfWeek[futureIndex]}`);
}

//Nomor 4
function tebakAngka() {
    let targetNumber = Math.floor(Math.random() * 100) + 1;
    let attempts = 0;
    let guess = 0;

    guess = parseInt(prompt('Masukkan salah satu dari angka 1 sampai 100:'));
    while (guess !== targetNumber) {
        attempts++;

        if (guess > targetNumber) {
            // console.log('Terlalu tinggi! Coba lagi.');
            guess = parseInt(prompt('Terlalu tinggi! Coba lagi. dari angka 1 sampai 100:'));
        } else if (guess < targetNumber) {
            // console.log('Terlalu rendah! Coba lagi.');
            guess = parseInt(prompt('Terlalu rendah! Coba lagi. dari angka 1 sampai 100:'));
        }
        
        if (guess === targetNumber){
            console.log(`Selamat! Kamu berhasil menebak angka ${targetNumber} dengan benar. Sebanyak ${attempts} kali percobaan.`);
        }
    }
}

function isPalindrome(kata){
    let coba = kata.split('').reverse().join('');
    if (coba === kata) {
        return true;
    }else{
        return false;
    }
}
function jalankanPalindrome(){
    let kata = prompt("Masukkan Kata");
    console.log(isPalindrome(kata));
}

function convertToRupiah(angka)
{
     var rupiah = '';    
     var angkarev = angka.toString().split('').reverse().join('');
      
     for(var i = 0; i < angkarev.length; i++) 
         if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
      
     return rupiah.split('',rupiah.length-1).reverse().join('');
}