let angkaGenap = [];
function countEvenNumbers(x, y) {
    if (x > y) {
        return "nilai x harus lebih kecil dari nilai y"
    } else {
        for (let i = x; i <= y; i++) {
            if (i % 2 == 0) {
                angkaGenap.push(i);
            }
        }
        return "Output : " + angkaGenap.length + "(" + angkaGenap + ")";
    }
}

console.log(countEvenNumbers(1,10))