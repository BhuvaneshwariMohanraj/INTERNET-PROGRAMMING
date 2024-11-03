let score = 0;
let timeLeft = 30; // Countdown timer

function generateBubble() {
    const bubble = $('#bubble');
    const randomLetter = String.fromCharCode(Math.floor(Math.random() * 26) + 65); // A-Z
    const width = $(window).width() - 100;
    const height = $(window).height() - 200;

    bubble.text(randomLetter);
    bubble.css({
        left: Math.random() * width + 'px',
        top: Math.random() * height + 'px',
        backgroundColor: `hsl(${Math.random() * 360}, 100%, 50%)`
    }).fadeIn();

    setTimeout(() => {
        bubble.fadeOut();
        if (timeLeft > 0) generateBubble();
    }, 3000);
}

function startGame() {
    $('#score').text('Score: ' + score);
    $('#timer').text('Time Left: ' + timeLeft + 's');

    const countdown = setInterval(() => {
        timeLeft--;
        $('#timer').text('Time Left: ' + timeLeft + 's');
        if (timeLeft <= 0) {
            clearInterval(countdown);
            alert('Game Over! Your final score is ' + score);
        }
    }, 1000);

    generateBubble();
}

$(document).ready(function() {
    $(document).keypress(function(event) {
        const key = String.fromCharCode(event.which);
        const bubbleLetter = $('#bubble').text();

        if (key.toUpperCase() === bubbleLetter) {
            score++;
            $('#score').text('Score: ' + score);

            const sound = new Audio('success.mp3'); // Add a success sound
            sound.play();

            $('#bubble').fadeOut();
            generateBubble();
        }
    });

    startGame();
});
