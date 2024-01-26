'use strict'

import { validateData, fieldValidation, existingEmailVerificationCreate, existingEmailVerificationUpdate, existingCellphoneVerificationCreate, existingCellphoneVerificationUpdate } from "./utils/Validation.js";

import { getContacts, getContactById, createContact, updateContact, deleteContact } from "./service/index.js";

const clearRowsTable = () => {

    const row = document.querySelectorAll('#table-contacts>table>tbody tr');

    row.forEach(row => row.parentNode.removeChild(row))

}

const createRows = ({ name, birthday_date, email, cellphone, id }) => {

    const newRow = document.createElement('tr');

    newRow.innerHTML = `
    <td class="table-contacts__content">${name}</td>
    <td class="table-contacts__content">${birthday_date}</td>
    <td class="table-contacts__content">${email}</td>
    <td class="table-contacts__content">${cellphone}</td>
    <td class="table-contacts__actions">
        <input type="image" src="./img/editar.png" alt="" id="edit-${id}">
        <input type="image" src="./img/excluir.png" alt="" id="delete-${id}">
    </td>
    `;

    document.querySelector('#table-contacts>table>tbody').appendChild(newRow)

}

const readContacts = async () => {

    const readContacts = await getContacts();

    readContacts.forEach(createRows);

}

readContacts()

const powerDataContacts = async () => {

    const checkedWhatsapp = document.getElementById('checked-whatsapp').checked;
    const checkedSms = document.getElementById('checked-sms').checked;
    const checkedEmail = document.getElementById('checked-email').checked;
    const index = document.getElementById("name").dataset.index;
    const email = document.getElementById('email').value;
    const cellphone = document.getElementById('cellphone').value

    const dataContact = {

        name: document.getElementById('name').value,
        birthdayDate: document.getElementById('birthday-date').value,
        email: email,
        profession: document.getElementById('profession').value,
        phone: document.getElementById('phone').value,
        cellphone: cellphone,
        haveWhatsapp: checkedWhatsapp ? 1 : 0,
        permissionSendEmail: checkedEmail ? 1 : 0,
        permissionSendSms: checkedSms ? 1 : 0

    }

    if (fieldValidation() && validateData()) {

        if (index == "new") {
            const createVereficationEmail = await existingEmailVerificationCreate(email);
            const createVereficationCellphone = await existingCellphoneVerificationCreate(cellphone);

            if (!createVereficationEmail && !createVereficationCellphone) {
                clearRowsTable();
                createContact(dataContact);
                location.reload();
            }

        } else {
            const updateVereficationEmail = await existingEmailVerificationUpdate(index , email);
            const updateVereficationCellphone = await existingCellphoneVerificationUpdate(index , cellphone);

            if (!updateVereficationEmail && !updateVereficationCellphone) {
                clearRowsTable();
                updateContact(index, dataContact);
                location.reload();
            }
        }
    }
}

const fillInInputs = ({ name, birthday_date, email, profession, cellphone, phone, id }) => {

    document.getElementById('name').value = name
    document.getElementById('birthday-date').value = birthday_date
    document.getElementById('email').value = email
    document.getElementById('profession').value = profession
    document.getElementById('phone').value = phone
    document.getElementById('cellphone').value = cellphone
    document.getElementById('name').dataset.index = id

}

const styleContactRegistrationButton = () => {

    const buttonRegisterContact = document.getElementById('register-contact__button')

    buttonRegisterContact.innerText = "Editar contato"

    buttonRegisterContact.style.backgroundColor = "gray"

}


const editContact = async (idContact) => {

    const contactSearchedById = await getContactById(idContact);

    const contact = await contactSearchedById[0];

    styleContactRegistrationButton();

    fillInInputs(contact)

}


const choiceOfActionTable = async (event) => {

    if (event.target.type == 'image') {

        const [action, index] = event.target.id.split('-');

        if (action == 'edit') {

            editContact(index)

        } else {
            clearRowsTable();
            deleteContact(index);


        }
    }
}

document.getElementById('register-contact__button').addEventListener('click', powerDataContacts);

document.querySelector('#table-contacts>table>tbody').addEventListener('click', choiceOfActionTable);