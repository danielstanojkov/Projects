var input = document.querySelector('#emptyInput');

var programming = document.querySelector('#programming');
var marketing = document.querySelector('#marketing');
var datascience = document.querySelector('#datascience');
var design = document.querySelector('#design');

var dropdownTitle = document.querySelector('.dropdown-title');

programming.addEventListener('click', function () {
    dropdownTitle.innerHTML = programming.textContent;
    input.setAttribute('value', 'Programming');
})
marketing.addEventListener('click', function () {
    dropdownTitle.innerHTML = marketing.textContent;
    input.setAttribute('value', 'Marketing');
})
datascience.addEventListener('click', function () {
    dropdownTitle.innerHTML = datascience.textContent;
    input.setAttribute('value', 'Data Science');
})
design.addEventListener('click', function () {
    dropdownTitle.innerHTML = design.textContent;
    input.setAttribute('value', 'Design');
})



