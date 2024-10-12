function countEvenNumbers(start, end) {
    let angka = 0;
    let jumlah = [];
  
    for (let i = start; i <= end; i++) {
      if (i % 2 === 0) {
        angka++;
        jumlah.push(i);
      }
    }

    console.log(`Output: ${angka} (${jumlah.join(", ")})`);
}
  
countEvenNumbers(1, 10);