function isPalindrome(input) {
    let j = input.split("").reverse().join("");
    // console.log(j);
    if (input == j) {
        hasil = true;
    } else {
        hasil = false;
    }
    console.log(hasil)
}

input = prompt("Input : ")

isPalindrome(input)
