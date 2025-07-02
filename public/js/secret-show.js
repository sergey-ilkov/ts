function setVH() {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}
setVH();
window.addEventListener('resize', setVH);

const tokenCsrf = document.querySelector('[name="csrf-token"]').getAttribute('content');

class SecretShow {
    constructor(form) {
        this.form = form;
        this.url = this.form.getAttribute('action');

        this.inputPassphrase = this.form.querySelector('input');
        this.btnPassShow = this.form.querySelector('.btn-pass-show');

        this.message = this.form.querySelector('.message');
        this.btnShowSecret = this.form.querySelector('#secret-btn-show');


        this.divSecretInfo = document.querySelector('#secret-info');
        this.preloader = document.querySelector('#preloader-secret');

        this.divSecretShow = document.querySelector('#secret-show');

        this.divTextareaWrap = this.divSecretShow.querySelector('.secret-show-wrap');
        this.textarea = this.divSecretShow.querySelector('#secret-show-textarea');
        this.btnCopy = document.querySelector('#secret-btn-copy');

        this.timerId = null;
        this.timeAnim = 1000;
        this.flagCopy = true;

        this.flagSend = true;
        this.objSendData = null;
        this.objData = null;

        this.secret = null;

        this.init();
    }

    init() {

        // console.log('init Secret show');

        this.default();
        this.events();
    }

    default() {
        this.objSendData = {};
        this.objData = {};
        this.secret = null;


        this.divSecretInfo.classList.remove('hidden');
        this.preloader.classList.remove('show');
        this.divSecretShow.classList.remove('show');
        this.message.classList.remove('show');
        this.message.innerHTML = '';
    }

    events() {
        this.form.addEventListener('submit', e => {
            e.preventDefault();
        })

        if (this.inputPassphrase) {
            this.inputPassphrase.addEventListener('focus', () => {
                this.inputPassphrase.parentNode.classList.remove('error');
            })
        }
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

        this.btnShowSecret.addEventListener('click', () => {
            if (this.flagSend && this.validation()) {
                this.btnShowSecret.blur();
                this.default();
                this.divSecretInfo.classList.add('hidden');
                this.preloader.classList.add('show');
                this.getFormData();

                this.send();
            }
        })

        this.btnCopy.addEventListener('click', () => {

            this.copyText(this.textarea.value);
        })
    }

    copyText(text) {
        if (this.flagCopy) {
            this.flagCopy = false;
            window.navigator.clipboard.writeText(text);
            this.divTextareaWrap.classList.add('copied');

            this.timerId = setTimeout(() => {
                clearTimeout(this.timerId);
                this.flagCopy = true;
                this.divTextareaWrap.classList.remove('copied');
            }, this.timeAnim);
        }
    }

    validation() {


        if (this.inputPassphrase) {
            this.inputPassphrase.value = this.inputPassphrase.value.trim();
            if (this.inputPassphrase.value.length == 0) {
                this.inputPassphrase.parentNode.classList.add('error');
                return false;
            }
        }

        return true;
    }

    getFormData() {
        this.objSendData = {};
        this.objSendData['_token'] = tokenCsrf;

        if (this.inputPassphrase) {
            this.objSendData[this.inputPassphrase.name] = this.inputPassphrase.value;
        }
        // console.log(this.objSendData);
    }

    resSuccess() {

        this.textarea.innerHTML = this.objData.secret.text;

        this.preloader.classList.remove('show');
        this.divSecretShow.classList.add('show');

        this.timerId = setTimeout(() => {
            clearTimeout(this.timerId);
            this.textarea.style.height = this.textarea.scrollHeight + 'px';
        }, 200);


        this.objSendData = {};
        this.objData = {};

    }

    resError() {
        if (this.objData['status'] == 419 || this.objData['status'] == 429) {

            this.message.innerHTML = `<span>${this.objData.message}</span>`;

            this.preloader.classList.remove('show');

            this.divSecretInfo.classList.remove('hidden');


            return;
        }

        this.errors = this.objData['errors'];
        if (this.errors['no-secret']) {
            location.reload();
            return;
        }

        this.html = '';
        for (const key in this.errors) {
            this.html += `<span>${this.errors[key]}</span>`;
        }

        this.message.innerHTML = this.html;

        this.preloader.classList.remove('show');
        this.divSecretInfo.classList.remove('hidden');

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

const formSecretShow = document.querySelector('#form-secret-info');


if (formSecretShow) {
    new SecretShow(formSecretShow);
}