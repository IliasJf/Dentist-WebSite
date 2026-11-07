let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .nav');
let header = document.querySelector('.header');

function setMenu(open){
   menu.classList.toggle('fa-times', open);
   navbar.classList.toggle('active', open);
   menu.setAttribute('aria-expanded', String(open));
   menu.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
}

menu.onclick = () =>{
   setMenu(!navbar.classList.contains('active'));
}

// Close the menu after choosing a link, and with the Escape key.
navbar.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setMenu(false)));
document.addEventListener('keydown', e => { if(e.key === 'Escape') setMenu(false); });

window.onscroll = () =>{
   setMenu(false);
   header.classList.toggle('active', window.scrollY > 0);
}
