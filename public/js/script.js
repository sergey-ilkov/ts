const wrapper = document.querySelector('.wrapper');
const body = document.querySelector('body');
const header = document.querySelector('.header');
const navMenu = document.querySelector('#nav-menu');
const burgerMenu = document.querySelector('#burger-menu');

function correctionWrapper(margin = 0) {
    wrapper.style.marginRight = margin + 'px';
}

let width1, width2, margin;

if (burgerMenu) {
    burgerMenu.addEventListener('click', () => {
        menuToogle();
    })
}

function menuToogle() {
    width1 = wrapper.offsetWidth;

    navMenu.classList.toggle('open');
    body.classList.toggle('fixed');

    burgerMenu.classList.toggle('active');

    width2 = wrapper.offsetWidth;
    margin = width2 - width1;
    if (navMenu.classList.contains('open')) {
        correctionWrapper(margin);
    } else {
        correctionWrapper();
    }
}

function modalOpen(modal) {
    width1 = wrapper.offsetWidth;
    body.classList.toggle('fixed');
    width2 = wrapper.offsetWidth;
    margin = width2 - width1;
    correctionWrapper(margin);

    modal.classList.add('open');

}
function modalClose(modal) {
    body.classList.remove('fixed');
    correctionWrapper();
    modal.classList.remove('open');
}

function getGeneratedPassword(len = 10) {
    const letterSmall = 'absdefghijklmnpqrstuvwxyz';
    const letterCapital = 'ABSDEFGHIJKLMNPQRSTUVWXYZ';
    const numbers = '0123456789';
    const symbols = '~!@#$%^&*()_+-=[]{};:<>';
    const fullSymbols = letterSmall + letterCapital + numbers + symbols;

    let str = '';
    str += letterCapital[Math.floor(Math.random() * letterCapital.length)];
    str += letterSmall[Math.floor(Math.random() * letterSmall.length)];
    str += numbers[Math.floor(Math.random() * numbers.length)];
    str += symbols[Math.floor(Math.random() * symbols.length)];

    while (len > str.length) {
        str += fullSymbols[Math.floor(Math.random() * fullSymbols.length)];
    }

    return str;
}

const divAuthUser = document.querySelector('#auth-user');
if (divAuthUser) {

    const divUserBox = divAuthUser.querySelector('.auth-user-box');

    document.addEventListener('click', (e) => {
        if (e.target.closest('.auth-user-btn')) {
            divUserBox.classList.toggle('open');
        }

        if (!e.target.closest('.auth-user') && divUserBox.closest('.open')) {
            divUserBox.classList.remove('open');
        }

    });


}

class SvgMagicGrd {
    constructor(section, box) {

        this.section = section;
        this.box = box;

        this.coordsBox = null;

        this.boxTop = null;

        this.mouseX = 0;
        this.mouseY = 0;

        this.posX = 0;
        this.posY = 0;

        this.mask1 = null;
        this.mask2 = null;
        this.mask3 = null;

        this.maskSize = null;
        this.maskPos = null;

        this.color = null;
        this.hue = 0;

        this.init();

    }

    init() {

        if (!this.section || !this.box) {
            console.error('Error init SvgMagicGrd.');
            return;
        }
        this.coordsBox = this.box.getBoundingClientRect();

        this.boxTop = this.coordsBox.top + window.scrollY;

        this.mask1 = this.box.querySelector('.magic-grd-mask-1');
        this.mask2 = this.box.querySelector('.magic-grd-mask-2');
        this.mask3 = this.box.querySelector('.magic-grd-mask-3');

        this.setStyle();

        this.events();

    }

    setStyle() {
        this.maskSize = Math.ceil(this.coordsBox.height / 2.5);
        this.maskPos = Math.ceil(this.maskSize / 2);

        this.mask1.style.width = `${this.maskSize}px`;
        this.mask1.style.height = `${this.maskSize}px`;

        this.getColor();
        this.mask1.style.background = `${this.color}`;
        this.mask1.style.transition = `transform 0.1s ease, background-color 0.1s linear`;

        this.mask2.style.width = `${this.maskSize}px`;
        this.mask2.style.height = `${this.maskSize}px`;
        this.mask2.style.background = `${this.color}`;
        this.mask2.style.transition = `transform 0.2s ease, background-color 0.2s linear`;

        this.mask3.style.width = `${this.maskSize}px`;
        this.mask3.style.height = `${this.maskSize}px`;
        this.mask3.style.background = `${this.color}`;
        this.mask3.style.transition = `transform 0.3s ease, background-color 0.3s linear`;

    }

    events() {

        this.section.addEventListener('mousemove', this.animation.bind(this));

        window.addEventListener('resize', () => {
            this.update();
        });

    }

    animation(e) {
        this.mouseX = e.clientX;
        this.mouseY = e.clientY;

        if (e.clientX > this.coordsBox.left - this.maskPos && e.clientX < this.coordsBox.left + this.coordsBox.width - this.maskPos) {
            this.posX = e.clientX - this.coordsBox.left;
        }

        if (e.clientX > this.coordsBox.left + this.coordsBox.width - this.maskPos) {
            this.posX = this.coordsBox.width - this.maskPos;
        }

        if (e.clientY > this.boxTop && e.clientY < this.boxTop + this.coordsBox.height - this.maskPos) {

            this.posY = e.clientY - this.boxTop;
        }

        if (e.clientY > this.boxTop + this.coordsBox.height - this.maskPos) {
            this.posY = this.coordsBox.height - this.maskPos;
        }

        this.mask1.style.transform = `translate3D(${this.posX}px, ${this.posY}px, 0)`;
        this.mask2.style.transform = `translate3D(${this.posX}px, ${this.posY}px, 0)`;
        this.mask3.style.transform = `translate3D(${this.posX}px, ${this.posY}px, 0)`;

        this.getColor();
        this.mask1.style.backgroundColor = `${this.color}`;
        this.mask2.style.backgroundColor = `${this.color}`;
        this.mask3.style.backgroundColor = `${this.color}`;
    }

    getColor() {

        if (this.mouseX > this.coordsBox.left && this.mouseX < this.coordsBox.left + this.coordsBox.width) {

            this.hue = Math.ceil(this.posX * 220 / this.coordsBox.width);
        }
        if (this.mouseX > this.coordsBox.left + this.coordsBox.width) {
            this.hue = 220;
        }

        this.color = `hsl( ${this.hue}, 100%, 50%)`;

    }

    update() {

        this.coordsBox = this.box.getBoundingClientRect();

        this.boxTop = this.coordsBox.top + window.scrollY;

    }

}


function initSvgMagic() {


    const sectionSvgMagic = document.querySelector('.hero');
    const divSvgMagicWrap = document.querySelector('#svg-magic-wrap');

    if (sectionSvgMagic && divSvgMagicWrap) {
        new SvgMagicGrd(sectionSvgMagic, divSvgMagicWrap);
    }
}

const pageHome = document.querySelector('.page-home');

window.addEventListener('DOMContentLoaded', () => {
    if (pageHome) {
        initSvgMagic();
    }
})


const tokenCsrf = document.querySelector('[name="csrf-token"]').getAttribute('content');


class SecretCreate {
    constructor(form, modal) {

        this.form = form;
        this.modal = modal;


        this.url = this.form.getAttribute('action');

        this.divContent = this.form.querySelector('#secret-create-content');
        this.textarea = this.form.querySelector('#secret-create-text');
        this.divSymbols = this.form.querySelector('#secret-create-symbols');
        this.textMax = this.divSymbols.getAttribute('data-symbols');
        this.textValue = '';
        this.selectTtl = this.form.querySelector('#secret-create-select-ttl');
        this.inputPassphrase = this.form.querySelector('#secret-create-passphrase');
        this.btnPassShow = this.form.querySelector('.btn-pass-show');

        this.btnSend = this.form.querySelector('#secret-create-btn-send');

        this.preloader = this.modal.querySelector('.preloader');

        this.divSecretInfo = this.modal.querySelector('#secret-info');
        this.divSecretLink = this.modal.querySelector('#secret-info-link');
        this.btnCopy = this.modal.querySelector('#secret-info-btn-copy');
        this.divInfoCreated = this.modal.querySelector('#secret-info-created');
        this.divInfoDeleted = this.modal.querySelector('#secret-info-deleted');
        this.btnNew = this.modal.querySelector('#secret-btn-new');


        this.messageText = this.modal.querySelector('.message-secret-info');

        this.btnClose = this.modal.querySelector('.btn-modal-close');

        this.timerId = null;
        this.timeAnim = 1000;
        this.flagCopy = true;

        this.flagSend = true;
        this.objSendData = null;
        this.ttl = 259200;

        this.objData = null;

        this.init();
    }

    init() {
        // console.log('init Secret create...');

        this.default();
        this.events();
    }

    default() {

        this.divSymbols.innerHTML = `0 / ${this.textMax}`;
        this.divContent.setAttribute('data-content', '');
        this.textarea.value = '';

        this.objSendData = null;
        this.objData = null;

        this.messageText.innerHTML = '';
        this.divSecretLink.innerHTML = '';
        this.divInfoCreated.innerHTML = '';
        this.divInfoDeleted.innerHTML = '';

        this.divSecretInfo.classList.remove('success');
        this.divSecretInfo.classList.remove('error');

        if (this.inputPassphrase) {
            this.inputPassphrase.value = '';
        }
    }

    events() {
        this.form.addEventListener('submit', e => {
            e.preventDefault();
        });

        this.textarea.addEventListener('input', () => {
            this.setValues();
        });

        this.textarea.addEventListener('blur', () => {
            this.divSymbols.style.display = 'none';
        });

        this.textarea.addEventListener('focus', () => {
            this.divSymbols.style.display = 'block';
        });

        this.btnSend.addEventListener('click', () => {
            if (this.flagSend && this.validation()) {
                this.btnSend.blur();
                modalOpen(this.modal);
                this.preloader.classList.add('show');
                this.getFormData();
                this.send();
            }
        });

        if (this.btnPassShow) {
            this.btnPassShow.addEventListener('click', () => {
                this.btnPassShow.classList.toggle('show');
                if (this.btnPassShow.classList.contains('show')) {
                    this.inputPassphrase.type = 'text';
                } else {
                    this.inputPassphrase.type = 'password';
                }
            })
        }


        this.btnClose.addEventListener('click', () => {
            modalClose(this.modal);
            this.default();
        });
        this.btnNew.addEventListener('click', () => {
            modalClose(this.modal);
            this.default();
        });

        this.btnCopy.addEventListener('click', () => {
            this.copyText(this.objData.secret.url);
        });
    }

    copyText(text) {
        if (this.flagCopy) {
            this.flagCopy = false;
            window.navigator.clipboard.writeText(text);
            this.divSecretLink.classList.add('copied');

            this.timerId = setTimeout(() => {
                clearTimeout(this.timerId);
                this.flagCopy = true;
                this.divSecretLink.classList.remove('copied');
            }, this.timeAnim);
        }
    }

    setValues() {
        this.textValue = this.textarea.value.slice(0, this.textMax);
        this.divContent.setAttribute('data-content', this.textValue);
        this.textarea.value = this.textValue;

        this.divSymbols.textContent = `${this.textValue.length} / ${this.textMax}`;


    }

    validation() {
        if (this.textarea.value.length == 0) {
            this.textarea.focus();
            return false;
        }
        if (this.inputPassphrase) {
            this.inputPassphrase.value = this.inputPassphrase.value.trim();
        }
        return true;
    }

    getFormData() {

        this.objSendData = {
            secret: {
                text: '',
                ttl: '',
            }
        };

        this.objSendData['_token'] = tokenCsrf;
        this.objSendData.secret.text = this.textarea.value;

        if (this.selectTtl) {
            this.ttl = this.selectTtl.value
        }
        this.objSendData.secret.ttl = this.ttl;

        if (this.inputPassphrase && this.inputPassphrase.value.length > 0) {
            this.objSendData.secret[this.inputPassphrase.name] = this.inputPassphrase.value
        }


        // console.log(this.objSendData);

    }

    timeConvertor(timestamp) {
        let date = new Date(timestamp * 1000);
        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();
        let hours = date.getHours();
        let minutes = date.getMinutes();

        day = day < 10 ? '0' + day : day;
        month = month < 10 ? '0' + month : month;
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;

        return `${day}.${month}.${year} ${hours}:${minutes}`;
    }

    resSuccess() {

        this.divSecretLink.innerHTML = this.objData.secret.url;

        this.divInfoCreated.innerHTML = this.timeConvertor(this.objData.secret.created);
        this.divInfoDeleted.innerHTML = this.timeConvertor(this.objData.secret.created + this.objData.secret.ttl);

        this.preloader.classList.remove('show');
        this.divSecretInfo.classList.add('success');
    }

    resError() {


        if (this.objData['status'] == 419 || this.objData['status'] == 429) {

            this.messageText.innerHTML = `<span>${this.objData.message}</span>`;

            this.preloader.classList.remove('show');
            this.divSecretInfo.classList.add('error');


            return;
        }

        this.errors = this.objData['errors'];


        this.html = '';
        for (const key in this.errors) {
            this.html += `<span>${this.errors[key]}</span>`;
        }

        this.messageText.innerHTML = this.html;

        this.preloader.classList.remove('show');
        this.divSecretInfo.classList.add('error');
    }

    send() {

        if (this.flagSend) {
            this.flagSend = false;

            this.objData = null;

            const options = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify(this.objSendData)

            };


            fetch(this.url, options)
                .then(async response => {
                    if (!response.ok) {

                        if (response.status === 419 || response.status === 429 || response.status == 422) {
                            const errorData = await response.json();
                            throw { status: response.status, errors: errorData };
                        }

                        throw new Error(`HTTP error, status = ${response.status}`);
                    }

                    return response.json();
                })
                .then(result => {

                    this.objData = result;

                    if (result.status == 'ok') {
                        this.resSuccess();
                    } else {
                        this.resError();

                    }

                    this.flagSend = true;

                })
                .catch(error => {

                    if (error.status === 419 || error.status === 429 || error.status === 422) {

                        this.objData = error.errors;
                        this.objData['status'] = error.status;

                        this.resError();
                    }

                    console.error('Fetch error:', error);

                    this.flagSend = true;
                });

        }
    }
}


const formSecretCreate = document.querySelector('#form-secret-create');
const modalSecretInfo = document.querySelector('#modal-secret-info');


if (formSecretCreate && modalSecretInfo) {
    new SecretCreate(formSecretCreate, modalSecretInfo)
}



// ? auth modal
const email_reg = /\S+@\S+\.\S+/;

function checkEmail(data) {
    return email_reg.test(data);
}


class AuthUsers {
    constructor(modal, buttons) {
        this.modal = modal;
        this.buttons = buttons;
        this.forms = this.modal.querySelectorAll('.auth-form');
        this.inputs = this.modal.querySelectorAll('input');
        this.btnClose = this.modal.querySelector('.btn-modal-close');
        this.messageError = this.modal.querySelector('.message-error');
        this.preloader = this.modal.querySelector('.modal-preloader');

        this.formSignUp = this.modal.querySelector('#sign-up');
        this.inputsSignUp = this.formSignUp.querySelectorAll('input');
        this.emailValid = this.formSignUp.querySelector('#email-validation');
        this.btnSendCode = this.formSignUp.querySelector('#btn-auth-send-code');
        this.btnSignUp = this.formSignUp.querySelector('#btn-auth-sign-up');

        this.messageSignUp = this.formSignUp.querySelector('.message-sign-up');

        this.formSignIn = this.modal.querySelector('#sign-in');
        this.inputsSignIn = this.formSignIn.querySelectorAll('input');
        this.btnSignIn = this.formSignIn.querySelector('#btn-auth-sign-in');

        this.urlSignUp = this.formSignUp.getAttribute('action');
        this.urlSignIn = this.formSignIn.getAttribute('action');

        this.btnPassShows = this.modal.querySelectorAll('.btn-pass-show');

        this.btnPassGenerate = this.formSignUp.querySelector('.btn-pass-generate');

        this.currentForm = null;
        this.flagSend = true;
        this.objData = null;
        this.objSendData = null;
        this.action = null;
        this.url = null;

        this.timerId = null;

        this.init();
    }

    init() {
        // console.log('init AuthUser...');

        this.default();
        this.events();
    }

    default() {
        this.modal.classList.remove(this.currentForm);
        this.forms.forEach(form => {
            form.classList.remove('active');
        });


        this.currentForm = null;
        this.flagSend = true;
        this.objData = null;
        this.objSendData = null;
        this.action = null;
        this.url = null;
        this.timerId = null;

        this.preloader.classList.remove('show');
        this.messageSignUp.classList.remove('show');
        this.messageError.classList.remove('show');
        this.messageSignUp.innerHTML = '';
        this.messageError.innerHTML = '';

    }

    events() {

        this.forms.forEach(form => {
            form.addEventListener('submit', e => {
                e.preventDefault();
            });
        });


        this.buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                btn.blur();
                this.currentForm = btn.getAttribute('data-target');
                this.modal.classList.add(this.currentForm);
                this.activeForm();
                if (navMenu.closest('.open')) {
                    menuToogle();
                }
                modalOpen(this.modal);
            })
        })

        this.btnClose.addEventListener('click', () => {
            modalClose(this.modal);
            this.default();
        })
        this.btnPassShows.forEach(btn => {
            btn.addEventListener('click', () => {
                btn.classList.toggle('show');
                const input = btn.parentNode.querySelector('input');
                if (btn.classList.contains('show')) {
                    input.type = 'text';
                } else {
                    input.type = 'password';
                }
            })
        })

        this.btnPassGenerate.addEventListener('click', () => {
            const currentGroup = this.btnPassGenerate.parentNode;
            const input = currentGroup.querySelector('input');
            const btnShow = currentGroup.querySelector('.btn-pass-show');
            btnShow.classList.add('show');
            input.type = 'text';
            input.value = getGeneratedPassword();
        })

        this.btnSendCode.addEventListener('click', () => {
            if (checkEmail(this.emailValid.value)) {

                this.action = 'send-code';
                this.url = this.urlSignUp;
                this.getFormData(this.inputsSignUp);
                this.preloader.classList.add('show');
                this.send();

            } else {
                this.emailValid.parentNode.classList.add('error');
            }
        })

        this.inputs.forEach(input => {
            input.addEventListener('input', () => {


                if (input.type == 'checkbox') {
                    if (input.checked) {

                        input.parentNode.classList.remove('error');
                    }

                } else {
                    if (input.value.length >= 3) {
                        input.parentNode.classList.remove('error');
                    }
                }

            })
        })

        this.btnSignUp.addEventListener('click', () => {

            this.validation(this.inputsSignUp);

            if (this.flagSend) {
                this.action = 'sign-up';
                this.url = this.urlSignUp;
                this.getFormData(this.inputsSignUp);
                this.preloader.classList.add('show');
                this.send();
            }
        })

        this.btnSignIn.addEventListener('click', () => {

            this.validation(this.inputsSignIn);

            if (this.flagSend) {
                this.action = 'sign-in';
                this.url = this.urlSignIn;
                this.getFormData(this.inputsSignIn);
                this.preloader.classList.add('show');
                this.send();
            }
        })

    }

    activeForm() {
        this.forms.forEach(form => {
            if (form.getAttribute('id') == this.currentForm) {
                form.classList.add('active');
            }
        })
    }

    validation(inputs) {
        this.flagSend = true;

        inputs.forEach(input => {
            if (input.name == 'email') {
                if (!checkEmail(input.value)) {
                    this.flagSend = false;
                    input.parentNode.classList.add('error');
                } else {
                    input.parentNode.classList.remove('error');
                }
            }
            if (input.name == 'code') {
                if (input.value.length < 4) {
                    this.flagSend = false;
                    input.parentNode.classList.add('error');
                } else {
                    input.parentNode.classList.remove('error');
                }
            }
            if (input.name == 'password') {
                if (input.value.length < 10) {
                    this.flagSend = false;
                    input.parentNode.classList.add('error');
                } else {
                    input.parentNode.classList.remove('error');
                }
            }
            if (input.type == 'checkbox') {
                if (!input.checked) {
                    this.flagSend = false;
                    input.parentNode.classList.add('error');
                } else {
                    input.parentNode.classList.remove('error');
                }
            }
        })
    }

    getFormData(inputs) {
        this.objSendData = {};

        this.objSendData['_token'] = tokenCsrf;
        this.objSendData['action'] = this.action;

        if (this.action === 'send-code') {

            this.objSendData['email'] = this.emailValid.value;

        } else {
            inputs.forEach(input => {
                if (input.type == 'checkbox') {
                    this.objSendData[input.name] = input.checked;
                } else {
                    this.objSendData[input.name] = input.value;
                }
            })
        }
    }

    resSuccess() {
        if (this.action === 'send-code') {
            this.preloader.classList.remove('show');
            this.messageSignUp.innerHTML = this.objData.message;
            this.messageSignUp.classList.add('show');

            this.timerId = setTimeout(() => {
                clearTimeout(this.timerId);
                this.messageSignUp.classList.remove('show');
                this.messageSignUp.innerHTML = '';
            }, 2000);
        }

        if (this.action === 'sign-up') {
            this.preloader.classList.remove('show');
            this.messageSignUp.innerHTML = this.objData.message;
            this.messageSignUp.classList.add('show');

            if (this.objData.auth) {
                this.timerId = setTimeout(() => {
                    clearTimeout(this.timerId);
                    window.location.reload();
                }, 500);
            }
        }

        if (this.action === 'sign-in' && this.objData.auth) {
            window.location.reload();
        }
    }

    resError() {
        if (this.objData['status'] == 419 || this.objData['status'] == 429) {

            this.messageError.innerHTML = `<span>${this.objData.message}</span>`;
            this.messageError.classList.add('show');
            this.preloader.classList.remove('show');

            return;
        }

        this.errors = this.objData['errors'];

        this.html = '';
        for (const key in this.errors) {
            this.html += `<span>${this.errors[key]}</span>`;
        }

        this.messageError.innerHTML = this.html;
        this.messageError.classList.add('show');
        this.preloader.classList.remove('show');

    }

    send() {

        this.messageError.classList.remove('show');
        this.messageError.innerHTML = '';

        if (this.flagSend) {
            this.flagSend = false;

            this.objData = null;

            const options = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify(this.objSendData)

            };


            fetch(this.url, options)
                .then(async response => {
                    if (!response.ok) {

                        if (response.status === 419 || response.status === 429 || response.status == 422) {
                            const errorData = await response.json();
                            throw { status: response.status, errors: errorData };
                        }

                        throw new Error(`HTTP error, status = ${response.status}`);
                    }

                    return response.json();
                })
                .then(result => {

                    this.objData = result;

                    if (result.status == 'ok') {
                        this.resSuccess();
                    } else {
                        this.resError();

                    }

                    this.flagSend = true;

                })
                .catch(error => {

                    if (error.status === 419 || error.status === 429 || error.status === 422) {

                        this.objData = error.errors;
                        this.objData['status'] = error.status;

                        this.resError();
                    }

                    console.error('Fetch error:', error);

                    this.flagSend = true;
                });

        }

    }
}

const modalAuth = document.querySelector('#modal-auth');
const buttonsAuth = document.querySelectorAll('.btn-auth');
if (modalAuth && buttonsAuth.length > 0) {
    new AuthUsers(modalAuth, buttonsAuth);
}



// ? modal Password reset
class PasswordResetModal {
    constructor(modal, btn) {
        this.modal = modal;
        this.btnOpenModal = btn;
        this.modalAuth = document.querySelector('#modal-auth');
        this.authForms = this.modalAuth.querySelectorAll('form');

        this.form = this.modal.querySelector('#form-password-reset');
        this.btnClose = this.modal.querySelector('.btn-modal-close');
        this.preloader = this.modal.querySelector('.modal-preloader');
        this.messageSuccess = this.modal.querySelector('.message-success');
        this.messageError = this.modal.querySelector('.message-error');

        this.inputEmail = this.form.querySelector('#email-password-reset');
        this.btnSend = this.form.querySelector('#btn-send-password-reset');
        this.url = this.form.getAttribute('action');

        this.flagSend = true;
        this.objData = null;
        this.objSendData = null;


        this.init();
    }

    init() {
        // console.log('init PasswordResetModal');

        this.events();
    }

    default() {

        this.flagSend = true;
        this.objData = null;
        this.objSendData = null;

        this.inputEmail.parentNode.classList.remove('error');
        this.inputEmail.value = '';

        this.form.classList.remove('hidden');
        this.messageError.classList.remove('show');
        this.messageError.innerHTML = '';
        this.messageSuccess.classList.remove('show');

    }

    events() {

        this.form.addEventListener('submit', e => {
            e.preventDefault();
        });

        this.btnOpenModal.addEventListener('click', () => {

            modalClose(this.modalAuth);
            this.authForms.forEach(form => {
                form.classList.remove('active');
            })
            modalOpen(this.modal);

        })

        this.btnClose.addEventListener('click', () => {
            modalClose(this.modal);
            this.default();

        })
        this.inputEmail.addEventListener('focus', () => {
            this.inputEmail.parentNode.classList.remove('error');
        })

        this.btnSend.addEventListener('click', () => {
            this.validation();

            if (this.flagSend) {
                this.getFormData();
                this.preloader.classList.add('show');
                this.send();
            }
        })
    }
    validation() {
        this.flagSend = true;
        if (!checkEmail(this.inputEmail.value)) {
            this.flagSend = false;
            this.inputEmail.parentNode.classList.add('error');
        } else {
            this.inputEmail.parentNode.classList.remove('error');
        }
    }
    getFormData() {
        this.objSendData = {};
        this.objSendData['_token'] = tokenCsrf;
        this.objSendData['email'] = this.inputEmail.value;
    }

    resSuccess() {
        this.preloader.classList.remove('show');
        this.form.classList.add('hidden');
        this.messageSuccess.classList.add('show');
    }

    resError() {
        if (this.objData['status'] == 419 || this.objData['status'] == 429) {

            this.messageError.innerHTML = `<span>${this.objData.message}</span>`;
            this.messageError.classList.add('show');
            this.preloader.classList.remove('show');


            return;
        }

        this.errors = this.objData['errors'];

        this.html = '';
        for (const key in this.errors) {
            this.html += `<span>${this.errors[key]}</span>`;
        }

        this.messageError.innerHTML = this.html;
        this.messageError.classList.add('show');
        this.preloader.classList.remove('show');

    }

    send() {

        this.messageError.classList.remove('show');
        this.messageError.innerHTML = '';

        if (this.flagSend) {
            this.flagSend = false;

            this.objData = null;

            const options = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify(this.objSendData)

            };


            fetch(this.url, options)
                .then(async response => {
                    if (!response.ok) {

                        if (response.status === 419 || response.status === 429 || response.status == 422) {
                            const errorData = await response.json();
                            throw { status: response.status, errors: errorData };
                        }

                        throw new Error(`HTTP error, status = ${response.status}`);
                    }

                    return response.json();
                })
                .then(result => {

                    this.objData = result;

                    if (result.status == 'ok') {
                        this.resSuccess();
                    } else {
                        this.resError();

                    }

                    this.flagSend = true;

                })
                .catch(error => {

                    if (error.status === 419 || error.status === 429 || error.status === 422) {

                        this.objData = error.errors;
                        this.objData['status'] = error.status;

                        this.resError();
                    }

                    console.error('Fetch error:', error);

                    this.flagSend = true;
                });

        }
    }
}

const modalPasswordReset = document.querySelector('#modal-password-reset');
const btnPasswordReset = document.querySelector('#btn-modal-password-reset');
if (modalPasswordReset && btnPasswordReset) {
    new PasswordResetModal(modalPasswordReset, btnPasswordReset);
}



// ? Password reset
class PasswordResetForm {
    constructor(divPassReset) {
        this.divPassReset = divPassReset;
        this.form = this.divPassReset.querySelector('#form-pass-reset');

        this.preloader = this.divPassReset.querySelector('.preloader');
        this.messageSuccess = this.divPassReset.querySelector('.message-success');
        this.messageError = this.divPassReset.querySelector('.message-error');

        this.inputs = this.form.querySelectorAll('input');

        this.btnPassShow = this.form.querySelector('.btn-pass-show');
        this.btnPassGenerate = this.form.querySelector('.btn-pass-generate');

        this.btnSend = this.form.querySelector('#btn-send-pass-reset');
        this.url = this.form.getAttribute('action');


        this.flagSend = true;
        this.objData = null;
        this.objSendData = null;

        this.init();
    }

    init() {
        // console.log('init PasswordResetForm...');

        this.events();

    }
    default() {
        this.flagSend = true;
        this.objData = null;
        this.objSendData = null;

        this.inputs.forEach(input => {
            input.parentNode.classList.remove('error');
            input.value = '';
        })
        this.form.classList.remove('hidden');
        this.messageError.classList.remove('show');
        this.messageError.innerHTML = '';
        this.messageSuccess.classList.remove('show');
    }

    events() {
        this.form.addEventListener('submit', e => {
            e.preventDefault();
        });

        this.btnPassShow.addEventListener('click', () => {
            this.btnPassShow.classList.toggle('show');
            const input = this.btnPassShow.parentNode.querySelector('input');
            if (this.btnPassShow.classList.contains('show')) {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        })
        this.btnPassGenerate.addEventListener('click', () => {
            const currentGroup = this.btnPassGenerate.parentNode;
            const input = currentGroup.querySelector('input');
            const btnShow = currentGroup.querySelector('.btn-pass-show');
            btnShow.classList.add('show');
            input.type = 'text';
            input.value = getGeneratedPassword();
        })

        this.inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentNode.classList.remove('error');
            })
        })

        this.btnSend.addEventListener('click', () => {
            this.validation();

            if (this.flagSend) {
                this.getFormData();
                this.preloader.classList.add('show');
                this.send();
            }
        })

    }

    validation() {
        this.flagSend = true;
        this.inputs.forEach(input => {
            if (input.type == 'email') {
                if (!checkEmail(input.value)) {
                    this.flagSend = false;
                    input.parentNode.classList.add('error');
                } else {
                    input.parentNode.classList.remove('error');
                }
            }
            if (input.type == 'password') {
                if (input.value.length < 10) {
                    this.flagSend = false;
                    input.parentNode.classList.add('error');
                } else {
                    input.parentNode.classList.remove('error');
                }
            }
        })
    }

    getFormData() {
        this.objSendData = {};
        this.objSendData['_token'] = tokenCsrf;
        this.inputs.forEach(input => {
            this.objSendData[input.name] = input.value;
        })


    }
    resSuccess() {
        this.preloader.classList.remove('show');
        this.form.classList.add('hidden');
        this.messageSuccess.classList.add('show');
    }
    resError() {
        if (this.objData['status'] == 419 || this.objData['status'] == 429) {

            this.messageError.innerHTML = `<span>${this.objData.message}</span>`;
            this.messageError.classList.add('show');
            this.preloader.classList.remove('show');

            return;
        }

        this.errors = this.objData['errors'];

        this.html = '';
        for (const key in this.errors) {
            this.html += `<span>${this.errors[key]}</span>`;
        }

        this.messageError.innerHTML = this.html;
        this.messageError.classList.add('show');
        this.preloader.classList.remove('show');
    }

    send() {

        this.messageError.classList.remove('show');
        this.messageError.innerHTML = '';

        if (this.flagSend) {
            this.flagSend = false;

            this.objData = null;

            const options = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify(this.objSendData)

            };


            fetch(this.url, options)
                .then(async response => {
                    if (!response.ok) {

                        if (response.status === 419 || response.status === 429 || response.status == 422) {
                            const errorData = await response.json();
                            throw { status: response.status, errors: errorData };
                        }

                        throw new Error(`HTTP error, status = ${response.status}`);
                    }

                    return response.json();
                })
                .then(result => {

                    this.objData = result;

                    if (result.status == 'ok') {
                        this.resSuccess();
                    } else {
                        this.resError();

                    }

                    this.flagSend = true;

                })
                .catch(error => {

                    if (error.status === 419 || error.status === 429 || error.status === 422) {

                        this.objData = error.errors;
                        this.objData['status'] = error.status;

                        this.resError();
                    }

                    console.error('Fetch error:', error);

                    this.flagSend = true;
                });

        }
    }
}

const divPassReset = document.querySelector('#pass-reset-box');
if (divPassReset) {
    new PasswordResetForm(divPassReset);
}


class Feedback {
    constructor(divFeedback) {
        this.divFeedback = divFeedback;
        this.form = this.divFeedback.querySelector('#form-feedback');

        this.divContent = this.form.querySelector('#feedback-content');
        this.textarea = this.form.querySelector('#feedback-text');
        this.btnSend = this.form.querySelector('#btn-send-feedback');

        this.preloader = this.divFeedback.querySelector('.preloader');
        this.messageSuccess = this.divFeedback.querySelector('.message-success');
        this.messageError = this.divFeedback.querySelector('.message-error');

        this.url = this.form.getAttribute('action');

        this.textMax = 2000;

        this.textValue = '';
        this.flagSend = true;
        this.objData = null;
        this.objSendData = null;

        this.timerId = null;

        this.init();

    }

    init() {
        // console.log('init Feedback...');
        this.events();
    }

    default() {
        this.flagSend = true;
        this.objData = null;
        this.objSendData = null;
        this.textValue = '';
        this.timerId = null;

        this.divContent.setAttribute('data-content', '');
        this.textarea.value = '';


        this.messageError.classList.remove('show');
        this.messageError.innerHTML = '';
        this.messageSuccess.classList.remove('show');
    }

    events() {
        this.form.addEventListener('submit', e => {
            e.preventDefault();
        });


        this.textarea.addEventListener('input', () => {
            this.textValue = this.textarea.value.slice(0, this.textMax);
            this.divContent.setAttribute('data-content', this.textValue);
            this.textarea.value = this.textValue;
        });

        this.btnSend.addEventListener('click', () => {
            this.validation();

            if (this.flagSend) {
                this.preloader.classList.add('show');
                this.getFormData();
                this.send();
            }
        });
    }

    validation() {
        this.flagSend = true;
        if (this.textarea.value.length == 0) {
            this.textarea.focus();
            this.flagSend = false;
        }

    }

    getFormData() {
        this.objSendData = {};

        this.objSendData['_token'] = tokenCsrf;
        this.objSendData[this.textarea.name] = this.textarea.value;

    }

    resSuccess() {
        this.preloader.classList.remove('show');
        this.messageSuccess.classList.add('show');

        this.timerId = setTimeout(() => {
            clearTimeout(this.timerId);
            this.default();
        }, 1500);
    }

    resError() {

        if (this.objData['status'] == 419 || this.objData['status'] == 429) {

            this.messageError.innerHTML = `<span>${this.objData.message}</span>`;
            this.messageError.classList.add('show');
            this.preloader.classList.remove('show');

            return;
        }

        this.errors = this.objData['errors'];

        this.html = '';
        for (const key in this.errors) {
            this.html += `<span>${this.errors[key]}</span>`;
        }

        this.messageError.innerHTML = this.html;
        this.messageError.classList.add('show');
        this.preloader.classList.remove('show');
    }

    send() {
        this.messageError.classList.remove('show');
        this.messageError.innerHTML = '';

        if (this.flagSend) {
            this.flagSend = false;

            this.objData = null;

            const options = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify(this.objSendData)

            };
            fetch(this.url, options)
                .then(async response => {
                    if (!response.ok) {

                        if (response.status === 419 || response.status === 429 || response.status == 422) {
                            const errorData = await response.json();
                            throw { status: response.status, errors: errorData };
                        }

                        throw new Error(`HTTP error, status = ${response.status}`);
                    }

                    return response.json();
                })
                .then(result => {

                    this.objData = result;

                    if (result.status == 'ok') {
                        this.resSuccess();
                    } else {
                        this.resError();

                    }

                    this.flagSend = true;

                })
                .catch(error => {

                    if (error.status === 419 || error.status === 429 || error.status === 422) {

                        this.objData = error.errors;
                        this.objData['status'] = error.status;

                        this.resError();
                    }

                    console.error('Fetch error:', error);

                    this.flagSend = true;
                });

        }
    }
}

const divFeedback = document.querySelector('#feedback-box');
if (divFeedback) {
    new Feedback(divFeedback);
}


// ? custom-select
const customSelectWraps = document.querySelectorAll('.custom-select-wrap');

if (customSelectWraps.length > 0) {
    customSelectWraps.forEach(wrap => {
        createCustomSelect(wrap);
        eventsCustomSelect(wrap);
    });
}

function createCustomSelect(wrap) {

    const select = wrap.querySelector('select');
    select.style.display = 'none';
    let selectedValue = '';
    let selectedText = '';

    const options = select.querySelectorAll('option');
    options.forEach(option => {
        if (option.selected) {
            selectedValue = option.value;
            selectedText = option.textContent;
        }
    });

    let html = '';
    html += '<div class="custom-select">';
    html += `<div class="custom-select-trigger">${selectedText}</div>`;
    html += '<div class="custom-select-options">';
    options.forEach(option => {
        if (option.selected) {
            html += `<div class="custom-select-option selected" data-value="${option.value}">${option.textContent}</div>`;
        } else {
            html += `<div class="custom-select-option" data-value="${option.value}">${option.textContent}</div>`;
        }
    });

    html += '</div>';
    html += '</div>';

    wrap.insertAdjacentHTML('beforeend', html);

}

function eventsCustomSelect(wrap) {
    const customSelect = wrap.querySelector('.custom-select');
    const customSelectTrigger = wrap.querySelector('.custom-select-trigger');
    const customOptions = wrap.querySelectorAll('.custom-select-option');

    const options = wrap.querySelectorAll('select option');

    document.addEventListener('click', e => {
        if (!e.target.closest('.custom-select')) {
            customSelect.classList.remove('open');

        }
    })

    customSelectTrigger.addEventListener('click', () => {
        customSelect.classList.toggle('open');
    })


    customOptions.forEach(customOption => {
        customOption.addEventListener('click', () => {
            customSelectTrigger.innerHTML = customOption.innerHTML;
            const newValue = customOption.getAttribute('data-value');
            customOptions.forEach(customOption => {
                customOption.classList.remove('selected');
                if (customOption.getAttribute('data-value') == newValue) {
                    customOption.classList.add('selected');
                }
            });
            options.forEach(option => {
                option.removeAttribute('selected');
                if (option.value == newValue) {
                    option.setAttribute('selected', newValue);
                }
            });

            customSelect.classList.remove('open');
        });
    });
}