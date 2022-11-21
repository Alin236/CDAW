'use strict';

let b1 = document.getElementById('b1');
let b2 = document.getElementById('b2');
let bs = [b1, b2];

function handler(event){
    console.log('button ' + event.target.id + ' pressed');
    bs.forEach(b => {b.style.color = 'green'; b.addEventListener('click', handler)});
    event.target.removeEventListener('click', handler);
    event.target.style.color = 'red';
}

b1.addEventListener('click', handler);
b1.style.color = 'green';
b2.style.color = 'red';