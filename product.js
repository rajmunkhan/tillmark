var clickButton=document.querySelector('.buy_now');
var modal=document.querySelector('.modal-bg');
clickButton.addEventListener('click', function(){
    modal.classList.add('modal-active');
});
var closebut=document.querySelector('.modal-close')
// var modalClose=document.querySelector('.modal-close');
closebut.addEventListener('click', function(){
    modal.classList.remove('modal-active');
})