var btnPopup = document.getElementById('btnPopup1');
var overlay = document.getElementById('overlay1');
btnPopup.addEventListener('click',openMoadl);
function openMoadl() {
	overlay.style.display='block';
}

var btnClose = document.getElementById('btnClose1');
btnClose.addEventListener('click',closeModal);
function closeModal() {
	overlay.style.display='none';
}