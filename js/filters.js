/*===============================================================
======================== PROGRAMMING FILTER =====================
================================================================= */
var programming = document.querySelector('#programming');
var programmingCheck = document.querySelector('#programming .check');
var marketingCards = document.querySelectorAll('.marketing');
var designCards = document.querySelectorAll('.design');

var programmingClicked = 0;
var marketingClicked = 0;
var designClicked = 0;


programming.addEventListener('click', function () {
    // Checking if other filters are clicked
    if (marketingClicked) {
        marketing.classList.remove('bg-red', 'text-mate');
        marketingCheck.classList.add('d-none');

        for (var i = 0; i < programmingCards.length; i++) {
            programmingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < designCards.length; i++) {
            designCards[i].classList.remove('d-none');
        }

        marketingClicked--;
    } else if (designClicked) {
        design.classList.remove('bg-red', 'text-mate');
        designCheck.classList.add('d-none');

        for (var i = 0; i < programmingCards.length; i++) {
            programmingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < marketing.length; i++) {
            marketingCards[i].classList.remove('d-none');
        }

        designClicked--;
    }

    // Executing current filter
    if (!programmingClicked) {
        programming.classList.add('bg-red', 'text-mate');
        programmingCheck.classList.remove('d-none');

        for (var i = 0; i < marketingCards.length; i++) {
            marketingCards[i].classList.add('d-none');
        }

        for (var i = 0; i < designCards.length; i++) {
            designCards[i].classList.add('d-none');
        }

        programmingClicked++;
    } else {
        programming.classList.remove('bg-red', 'text-mate');
        programmingCheck.classList.add('d-none');

        for (var i = 0; i < marketingCards.length; i++) {
            marketingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < designCards.length; i++) {
            designCards[i].classList.remove('d-none');
        }

        programmingClicked--;
    }
})


/*===============================================================
======================= MARKETING FILTER ========================
================================================================= */
var marketing = document.querySelector('#marketing');
var marketingCheck = document.querySelector('#marketing .check');
var programmingCards = document.querySelectorAll('.programming');
var designCards = document.querySelectorAll('.design');

marketing.addEventListener('click', function () {

    // Checking if other filters are clicked
    if (programmingClicked) {
        programming.classList.remove('bg-red', 'text-mate');
        programmingCheck.classList.add('d-none');

        for (var i = 0; i < marketingCards.length; i++) {
            marketingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < designCards.length; i++) {
            designCards[i].classList.remove('d-none');
        }

        programmingClicked--;
    } else if (designClicked) {
        design.classList.remove('bg-red', 'text-mate');
        designCheck.classList.add('d-none');

        for (var i = 0; i < programmingCards.length; i++) {
            programmingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < marketingCards.length; i++) {
            marketingCards[i].classList.remove('d-none');
        }

        designClicked--;
    }

    // Executing current filter
    if (!marketingClicked) {
        marketing.classList.add('bg-red', 'text-mate');
        marketingCheck.classList.remove('d-none');

        for (var i = 0; i < programmingCards.length; i++) {
            programmingCards[i].classList.add('d-none');
        }

        for (var i = 0; i < designCards.length; i++) {
            designCards[i].classList.add('d-none');
        }

        marketingClicked++;
    } else {
        marketing.classList.remove('bg-red', 'text-mate');
        marketingCheck.classList.add('d-none');

        for (var i = 0; i < programmingCards.length; i++) {
            programmingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < designCards.length; i++) {
            designCards[i].classList.remove('d-none');
        }

        marketingClicked--;
    }
})


/*===============================================================
========================== DESIGN FILTER ========================
================================================================= */
var design = document.querySelector('#design');
var designCheck = document.querySelector('#design .check');
var programmingCards = document.querySelectorAll('.programming');
var marketingCards = document.querySelectorAll('.marketing');

design.addEventListener('click', function () {

    // Checking if other filters are clicked
    if (programmingClicked) {
        programming.classList.remove('bg-red', 'text-mate');
        programmingCheck.classList.add('d-none');

        for (var i = 0; i < marketingCards.length; i++) {
            marketingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < designCards.length; i++) {
            designCards[i].classList.remove('d-none');
        }

        programmingClicked--;
    } else if (marketingClicked) {
        marketing.classList.remove('bg-red', 'text-mate');
        marketingCheck.classList.add('d-none');

        for (var i = 0; i < programmingCards.length; i++) {
            programmingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < designCards.length; i++) {
            designCards[i].classList.remove('d-none');
        }

        marketingClicked--;
    }


    // Executing current filter

    if (!designClicked) {
        design.classList.add('bg-red', 'text-mate');
        designCheck.classList.remove('d-none');

        for (var i = 0; i < programmingCards.length; i++) {
            programmingCards[i].classList.add('d-none');
        }

        for (var i = 0; i < marketingCards.length; i++) {
            marketingCards[i].classList.add('d-none');
        }

        designClicked++;
    } else {
        design.classList.remove('bg-red', 'text-mate');
        designCheck.classList.add('d-none');

        for (var i = 0; i < programmingCards.length; i++) {
            programmingCards[i].classList.remove('d-none');
        }

        for (var i = 0; i < marketingCards.length; i++) {
            marketingCards[i].classList.remove('d-none');
        }

        designClicked--;
    }
})







