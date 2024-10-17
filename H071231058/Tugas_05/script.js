let playerMoney = 5000;
let playerHand = [];
let dealerHand = [];
let deck = [];
let playerScore = 0;
let dealerScore = 0;
let betAmount = 0;


const moneyEl = document.getElementById('money');
const playerCardsEl = document.getElementById('player-cards');
const dealerCardsEl = document.getElementById('dealer-cards');
const playerScoreEl = document.getElementById('player-score');
const dealerScoreEl = document.getElementById('dealer-score');
const statusEl = document.getElementById('status');
const betInput = document.getElementById('bet-amount');
const gameOverEl = document.getElementById('game-over');
const finalMessageEl = document.getElementById('final-message');

document.getElementById('start-game').addEventListener('click', startGame);
document.getElementById('hit-btn').addEventListener('click', playerHit);
document.getElementById('stay-btn').addEventListener('click', playerStay);
document.getElementById('restart-btn').addEventListener('click', restartGame);

function getCardFileName(card) {
    // Ambil huruf pertama dari suit
    let suitLetter = '';
    switch(card.suit) {
        case 'hearts':
            suitLetter = 'h';
            break;
        case 'diamonds':
            suitLetter = 'd';
            break;
        case 'clubs':
            suitLetter = 'c';
            break;
        case 'spades':
            suitLetter = 's';
            break;
    }

    // Konversi nilai kartu menjadi nomor yang sesuai
    let cardValue = '';
    switch(card.value) {
        case 'A':
            cardValue = '01'; // As
            break;
        case 'J':
            cardValue = '11'; // Jack
            break;
        case 'Q':
            cardValue = '12'; // Queen
            break;
        case 'K':
            cardValue = '13'; // King
            break;
        default:
            cardValue = card.value.padStart(2, '0'); // Nilai 2-10
    }

    // Return nama file, misalnya: "c01.png"
    return `${suitLetter}${cardValue}.png`;
}


function initializeDeck() {
    const suits = ['hearts', 'diamonds', 'clubs', 'spades'];
    const values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
    deck = [];
    for (let suit of suits) {
        for (let value of values) {
            deck.push({ suit, value });
        }
    }
    deck = shuffle(deck);
}

function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function startGame() {
    document.getElementById('hit-btn').disabled = false;
    document.getElementById('stay-btn').disabled = false;

    betAmount = parseInt(betInput.value);
    if (betAmount < 100) {
        alert('The minimum bet is $100.');
        return;
    } else if (betAmount > playerMoney) {
        alert('Insufficient funds. You do not have enough money to place this bet.');
        return;
    }

    playerHand = [];
    dealerHand = [];
    playerScore = 0;
    dealerScore = 0;
    initializeDeck();

    playerHand.push(deck.pop());
    playerHand.push(deck.pop());
    dealerHand.push(deck.pop());
    dealerHand.push(deck.pop());

    renderHands();
    updateScores();

    if (playerScore === 21) {
        endGame('Blackjack! You win!');
        playerMoney += betAmount * 2;
        updateMoney();
    }
}

function renderHands() {
    playerCardsEl.innerHTML = '';
    dealerCardsEl.innerHTML = '';

    // Menampilkan kartu pemain
    playerHand.forEach(card => {
        const cardImage = `<img src="images/${getCardFileName(card)}" alt="${card.value} of ${card.suit}">`;
        playerCardsEl.innerHTML += cardImage;
    });

    // Menampilkan kartu dealer (satu kartu tertutup)
    const hiddenCard = `<img src="images/back.png" alt="Hidden card">`;
    const dealerUpcard = `<img src="images/${getCardFileName(dealerHand[1])}" alt="${dealerHand[1].value} of ${dealerHand[1].suit}">`;

    dealerCardsEl.innerHTML += hiddenCard; // kartu hole yang tertutup
    dealerCardsEl.innerHTML += dealerUpcard; // kartu upcard yang terbuka
}


function updateScores() {
    playerScore = calculateScore(playerHand);
    dealerScore = calculateScore(dealerHand);
    playerScoreEl.textContent = `Player: ${playerScore}`;
    dealerScoreEl.textContent = `Dealer: ?`;
}

function calculateScore(hand) {
    let score = 0;
    let hasAce = false;
    hand.forEach(card => {
        if (card.value === 'A') {
            hasAce = true;
            score += 11;
        } else if (['J', 'Q', 'K'].includes(card.value)) {
            score += 10;
        } else {
            score += parseInt(card.value);
        }
    });
    if (hasAce && score > 21) {
        score -= 10;
    }
    return score;
}

function playerHit() {
    playerHand.push(deck.pop());
    renderHands();
    updateScores();
    if (playerScore > 21) {
        endGame('You bust! Dealer wins.');
        playerMoney -= betAmount;
        updateMoney();
    }
}

function playerStay() {
    while (dealerScore < 17) {
        dealerHand.push(deck.pop());
        dealerScore = calculateScore(dealerHand);
    }
    renderHands();
    dealerScoreEl.textContent = `Dealer: ${dealerScore}`;
    determineWinner();
}

function determineWinner() {
    if (dealerScore > 21) {
        endGame('Dealer busts! You win!');
        playerMoney += betAmount * 2;
    } else if (playerScore > dealerScore) {
        endGame('You win!');
        playerMoney += betAmount * 2;
    } else if (playerScore < dealerScore) {
        endGame('Dealer wins.');
        playerMoney -= betAmount;
    } else {
        endGame('Push! It\'s a tie.');
    }
    updateMoney();
}

function updateMoney() {
    moneyEl.textContent = playerMoney;
    if (playerMoney <= 0) {
        gameOver('You are out of money!');
    }
}

function endGame(message) {
    statusEl.textContent = message;
    document.getElementById('hit-btn').disabled = true;
    document.getElementById('stay-btn').disabled = true;
}

function gameOver(message) {
    gameOverEl.classList.remove('hidden');
    finalMessageEl.textContent = message;
}

function restartGame() {
    playerMoney = 5000;
    updateMoney();
    gameOverEl.classList.add('hidden');
    startGame();
}

function endGame(message) {
    statusEl.textContent = message;
    document.getElementById('hit-btn').disabled = true;
    document.getElementById('stay-btn').disabled = true;

    // Tampilkan modal
    showModal(message);
}

function showModal(message) {
    const modal = document.getElementById('gameModal');
    const modalMessage = document.getElementById('modalMessage');
    
    modalMessage.textContent = message; // Set pesan modal

    // Tampilkan modal
    modal.classList.remove('hidden');

    // Tambahkan event listener untuk tombol restart
    document.getElementById('restartButton').onclick = function() {
        modal.classList.add('hidden'); // Sembunyikan modal
        startGame(); // Restart permainan
    };
}
