<?php

$cards = [
    ['Програмирање', 'programming', 'images/7.jpg'],
    ['Дизајн', 'design', 'images/2.jpg'],
    ['Маркетинг', 'marketing', 'images/3.jpg'],
    ['Програмирање', 'programming', 'images/4.jpg'],
    ['Маркетинг', 'marketing', 'images/5.jpg'],
    ['Дизајн', 'design', 'images/6.jpg'],
    ['Маркетинг', 'marketing', 'images/1.jpg'],
    ['Програмирање', 'programming', 'images/8.jpg'],
    ['Дизајн', 'design', 'images/9.jpg'],
    ['Маркетинг', 'marketing', 'images/10.jpg'],
    ['Програмирање', 'programming', 'images/11.jpg'],
    ['Програмирање', 'programming', 'images/12.jpg'],
    ['Програмирање', 'programming', 'images/13.jpg'],
    ['Дизајн', 'design', 'images/14.jpg'],
    ['Програмирање', 'programming', 'images/15.jpg'],
    ['Маркетинг', 'marketing', 'images/16.jpg'],
    ['Програмирање', 'programming', 'images/17.jpg'],
    ['Маркетинг', 'marketing', 'images/18.jpg'],
    ['Програмирање', 'programming', 'images/19.jpg'],
    ['Програмирање', 'programming', 'images/20.jpg']
];

function card(){
    global $cards;
    foreach ($cards as $card) {
        echo
        "<div class='col-12 col-md-6 col-lg-4 mb-4 $card[1]'>
            <div class='card border-0'>
                <img src='$card[2]' class='card-img-top'>
                <div class='card-body'>
                    <span class='card-title bg-yellow p-1 px-2 text-mate font-weight-bold'>Академија за $card[0]</span>
                    <p class='card-text h5 font-weight-bold pt-3'>Име на проектот стои овде со две линии</p>
                    <p class='card-text mb-2 line-height'>Краток опис во кој студентите ќе можат да опишат за што се работи во проектот.</p>
                    <small class='font-weight-bold'>Април - Октомври 2019</small>
                    <a href='#' class='btn btn-red text-white px-4 mt-4 font-weight-bold float-right'>Дознај Повеќе</a>
                </div>
            </div>
        </div>";
    }
}
