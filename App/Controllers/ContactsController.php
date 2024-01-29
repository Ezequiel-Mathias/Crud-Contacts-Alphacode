<?php

namespace App\Controllers;

use App\DAO\Contacts\ContactsDAO;
use App\Models\ContactsModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response as Response;

final class ContactsController
{
    public function getContacts(Request $request, Response $response, array $args): Response
    {
        $contactsDAO = new ContactsDAO();

        $contacts = $contactsDAO->getAllContacts();

        $response = $response->withJson($contacts);

        return $response;
    }

    public function getContactById(Request $request, Response $response, array $args): Response
    {
        $idContact = $args['id'];

        $contactsDAO = new ContactsDAO;

        $contactUserById = $contactsDAO->getContactById($idContact);

        $response = $response->withJson($contactUserById);

        return $response;
    }

    public function insertContact(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $contactsDAO = new ContactsDAO();

        $contacts = new ContactsModel();

        $contacts->setName($data['name'])
            ->setBirthdayDate($data['birthdayDate'])
            ->setEmail($data['email'])
            ->setProfession($data['profession'])
            ->setPhone($data['phone'])
            ->setCellphone($data['cellphone'])
            ->setHaveWhatsapp($data['haveWhatsapp'])
            ->setPermissionSendEmail($data['permissionSendEmail'])
            ->setPermissionSendSms($data['permissionSendSms']);

        $contactsDAO->insertContact($contacts);

        $response = $response->withJson([
            'message' => 'Usuario Cadastrado com sucesso'
        ]);

        return $response;
    }



    public function updateContact(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $idContact = $args['id'];

        $contactsDAO = new ContactsDAO();

        $contacts = new ContactsModel();

        $contacts
            ->setId($idContact)
            ->setName($data['name'])
            ->setBirthdayDate($data['birthdayDate'])
            ->setEmail($data['email'])
            ->setProfession($data['profession'])
            ->setPhone($data['phone'])
            ->setCellphone($data['cellphone'])
            ->setHaveWhatsapp($data['haveWhatsapp'])
            ->setPermissionSendEmail($data['permissionSendEmail'])
            ->setPermissionSendSms($data['permissionSendSms']);

        $contactsDAO->updateContacts($contacts);

        $response = $response->withJson([
            'message' => 'Dados atualizados com sucesso!'
        ]);


        return $response;
    }

    public function deleteContacts(Request $request, Response $response, array $args): Response
    {
        $idUser = $args['id'];;

        $contactsDAO = new ContactsDAO;

        $contacts = new ContactsModel;

        $contacts->setId($idUser);

        $contactsDAO->deleteContacts($contacts);

        $response = $response->withJson([
            "message" => "Contato deletado com sucesso"
        ]);

        return $response;
    }


    public function verificationCreateContactEmail(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $contactsDAO = new ContactsDAO();

        $verification = $contactsDAO->existingEmailVerification($data['email']);

        $response = $response->withJson($verification);

        return $response;
    }

    public function verificationUpdateContactEmail(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $contactsDAO = new ContactsDAO();

        $verification = $contactsDAO->existingEmailVerificationUpdate($data['email'], $data['id']);

        $response = $response->withJson($verification);

        return $response;
        
    }

    public function verificationCreateContactCellphone(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $contactsDAO = new ContactsDAO();

        $verification = $contactsDAO->existingCellphoneVerificationCreate($data['cellphone']);

        $response = $response->withJson($verification);

        return $response;
    }

    public function verificationUpdateContactCellphone(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $contactsDAO = new ContactsDAO();

        $verification = $contactsDAO->existingCellphoneVerificationUpdate($data['cellphone'], $data['id']);

        $response = $response->withJson($verification);

        return $response;
    }
}
