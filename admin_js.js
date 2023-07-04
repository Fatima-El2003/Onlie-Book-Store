let accountBox=document.querySelector('.account-box');

document.getElementById('user-btn').onclick=()=>{
   accountBox.classList.toggle('active');
   navBar.classList.remove('active');
}
let navBar=document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick=()=>{
    navBar.classList.toggle('active');
    accountBox.classList.remove('active');
}
window.onscroll=()=>{
    accountBox.classList.remove('active');
    navBar.classList.remove('active');

}