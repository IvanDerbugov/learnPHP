const btnRegistration = document.getElementById('registration-btn');
const modal = document.getElementById('modal');
const btnModalClose = document.querySelector('.modal-content-close');

const btnCreateUsualAcc = document.getElementById('rerular-btn');
const btnCreateSavingsAcc = document.getElementById('savings-btn');
const wrapperBtnsCreateAcc = document.querySelector('.modal-content .type-btn');
const formCreateAcc = document.querySelector('.modal-content-form');
const btnCreateAcc = document.getElementById('create-btn');

function hideModal() {
    modal.classList.remove('active')
    wrapperBtnsCreateAcc.classList.add('active');
    formCreateAcc.classList.remove('active');
    btnCreateAcc.removeAttribute('data-type');
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


function hideBtnsCreateAcc() {
    wrapperBtnsCreateAcc.classList.remove('active');
}

wrapperBtnsCreateAcc.addEventListener('click', (e) => {
    hideBtnsCreateAcc();
    formCreateAcc.classList.add('active');
    if (e.target === btnCreateSavingsAcc) {
        btnCreateAcc.setAttribute('data-type', 'savings');
    }
});


//TODO: доделать создание аккаунта, отправить данные тут в обработчик аяксом
btnCreateAcc.addEventListener('click', () => {

})