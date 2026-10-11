const btnRegistration = document.getElementById('registration-btn');
const modal = document.getElementById('modal');
const btnModalClose = document.querySelector('.modal-content-close');
function hideModal() {
    modal.classList.remove('active')
}

btnRegistration.addEventListener('click', () => {
    modal.classList.add('active');
});

btnModalClose.addEventListener('click', () => hideModal());

modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        hideModal();
    }
})


const btnCreateUsualAcc = document.getElementById('rerular-btn');
const btnCreateSavingsAcc = document.getElementById('savings-btn');

//будет создавать акк. как-то нужно будет при клике на пхп его создавать
function createAcc (typeAcc) {

}