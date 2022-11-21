'use strict';
let caroussel = document.getElementsByClassName('descr');
for(var p of caroussel){p.style.background = 'blue';}

caroussel = document.getElementById('caroussel');
caroussel.children[1].style.background = 'red';