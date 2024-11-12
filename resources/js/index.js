import $ from 'jquery';
import Popper from 'popper.js';
import * as bootstrap from 'bootstrap';


const blocks = document.querySelectorAll('.card');
const modalLinks = [];
const modals = document.querySelectorAll('.modal');
let currentModalIndex = 0;
blocks.forEach(block => {
    const link = block.querySelector('a[data-bs-toggle="modal"]');
    if (link) {
        modalLinks.push(link);
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
        if (event.key === 'ArrowLeft') {
            currentModalIndex--;
            if (currentModalIndex < 0) {
                currentModalIndex = modalLinks.length - 1;
            }
        } else if (event.key === 'ArrowRight') {
            currentModalIndex++;
            if (currentModalIndex >= modalLinks.length) {
                currentModalIndex = 0;
            }
        }

        if (currentModalIndex >= 0 && currentModalIndex < modalLinks.length && modalLinks[currentModalIndex]) {
            modalLinks[currentModalIndex].click();
            modals[currentModalIndex].showModal();
        }
    }
});


let popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
let popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
});


const toastButton = document.getElementById('liveToastBtn');
const showingToast = document.querySelector('.toast');
toastButton.addEventListener('click', () => {
    new bootstrap.Toast(showingToast).show();
});
