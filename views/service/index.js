'use strict'

const baseUrl = 'http://localhost/crud-contacts-alphacode/';

const getContacts = async () => {

    const response = await fetch(`${baseUrl}/contacts`);

    return await response.json();

}

const getContactById = async (idcontact) => {

    const response = await fetch(`${baseUrl}/contactbyid/${idcontact}`);

    return await response.json();
}

const createContact = async (contact) => {
    const option = {
        method: 'POST',
        body: JSON.stringify(contact),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(`${baseUrl}/contacts`, option);

    if (response.ok)
        location.reload();
}


const updateContact = async (index, dataContact) => {

    const option = {
        method: 'PUT',
        body: JSON.stringify(dataContact),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(`${baseUrl}/contacts/${index}`, option);

    if (response.ok)
        location.reload();

}

const deleteContact = async (index) => {

    const option = {
        method: 'DELETE'
    }

    const response = await fetch(`${baseUrl}/contacts/${index}`, option);

    if (response.ok) {
        location.reload();
    }



}

const confirmEmailCreate = async (email) => {

    const option = {
        method: 'POST',
        body: JSON.stringify(email),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(`${baseUrl}/confirmEmailCreate`, option);

    return await response.json();

}

const confirmEmailUpdate = async (data) => {

    const option = {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(`${baseUrl}/confirmEmailUpdate`, option);

    return await response.json();

}

const confirmCellphoneCreate = async (data) => {

    const option = {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(`${baseUrl}/confirmCellphoneCreate`, option);

    return await response.json();

}

const confirmCellphoneUpdate = async (data) => {

    const option = {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'content-type': 'application/json'
        }
    }

    const response = await fetch(`${baseUrl}/confirmCellphoneUpdate`, option);

    return await response.json();

}

export {
    getContacts,
    getContactById,
    createContact,
    updateContact,
    deleteContact,
    confirmEmailCreate,
    confirmEmailUpdate,
    confirmCellphoneCreate,
    confirmCellphoneUpdate

}