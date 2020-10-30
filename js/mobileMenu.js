var slider = document.querySelector('.slide');

var hamburger = document.querySelector('#hamburgerBtn');
var x = document.querySelector('#closeSlider');

hamburger.addEventListener('click', function(){
    slider.classList.remove('d-none');
})

x.addEventListener('click', function(){
    slider.classList.add('d-none');
})




