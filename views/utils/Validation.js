'use strict'

import { confirmEmailCreate, confirmEmailUpdate, confirmCellphoneCreate, confirmCellphoneUpdate } from "../service/index.js";

const cellphone = document.getElementById("cellphone");

const phone = document.getElementById("phone");

cellphone.addEventListener("input", () => {

    var clearValue = cellphone.value.replace(/\D/g, "").substring(0, 11);

    var numberArray = clearValue.split("");

    var numberFormat = "";

    if (numberArray.length > 0)
        numberFormat += `(${numberArray.slice(0, 2).join("")}) `

    if (numberArray.length > 2)
        numberFormat += `${numberArray.slice(2, 7).join("")}`

    if (numberArray.length > 7)
        numberFormat += `-${numberArray.slice(7, 11).join("")}`

    cellphone.value = numberFormat;

})

phone.addEventListener("input", () => {

    var clearValue = phone.value.replace(/\D/g, "").substring(0, 10);

    var numberArray = clearValue.split("");

    var numberFormat = "";

    if (numberArray.length > 0)
        numberFormat += `(${numberArray.slice(0, 2).join("")}) `

    if (numberArray.length > 2)
        numberFormat += `${numberArray.slice(2, 6).join("")}`

    if (numberArray.length > 6)
        numberFormat += `-${numberArray.slice(6, 10).join("")}`

    phone.value = numberFormat;

});


const validateData = () => {

    var birthdayDate = document.getElementById("birthday-date").value;

    birthdayDate = birthdayDate.replace(/\//g, "-");

    var todayDate = new Date();

    var birth = new Date(birthdayDate);

    var age = todayDate.getFullYear() - birth.getFullYear();

    var month = todayDate.getMonth() - birth.getMonth();

    if (month < 0 || (todayDate === 0 && todayDate.getDate() < birth.getDate())) age--;

    if (age < 18)
        alert("Para registrar um contato, deve-se ser maior de idade.")
    else
        return true

}

const fieldValidation = () => {

    return document.getElementById("modal-form").reportValidity();

}

const existingEmailVerificationCreate = async (email) => {

    const data = {
        email: email
    }

    const confirmEmail = await confirmEmailCreate(data);

    if (confirmEmail) {
        alert('Esse e-mail já está cadastrado, cadastre um diferente!')
        return true
    }

    return false
}

const existingEmailVerificationUpdate = async (idContact, email) => {

    const data = {
        id: idContact,
        email: email
    }

    const confirmEmail = await confirmEmailUpdate(data);

    if (confirmEmail) {
        alert('Esse e-mail já está cadastrado, atualize o cadastro com um email diferente!')
        return true
    }

    return false
}

const existingCellphoneVerificationCreate = async (cellphone) => {

    const data = {
        cellphone: cellphone
    }

    const confirmCellphone = await confirmCellphoneCreate(data);

    if (confirmCellphone) {
        alert('Esse número de celular já pertence a um cadastro, faça o cadastro com um número celular diferente!')
        return true
    }

    return false
}

const existingCellphoneVerificationUpdate = async (idContact, cellphone) => {

    const data = {
        id: idContact,
        cellphone: cellphone
    }

    const confirmCellphone = await confirmCellphoneUpdate(data);

    if (confirmCellphone) {
        alert('Esse número de celular já pertence a um cadastro, atualize o cadastro com um numero de celular diferente!')
        return true
    }

    return false
}

export {
    validateData,
    fieldValidation,
    existingEmailVerificationCreate,
    existingEmailVerificationUpdate,
    existingCellphoneVerificationCreate,
    existingCellphoneVerificationUpdate
}