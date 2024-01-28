<?php

namespace App\DAO\Contacts;

use App\Models\ContactsModel;
use App\DAO\Conexao;

class ContactsDAO extends Conexao
{

    public function __construct()
    {

        parent::__construct();
    }

    public function getAllContacts(): array
    {

        $contacts = $this->pdo
            ->query("SELECT id , name , DATE_FORMAT (`birthday_date`,
            '%d/%m/%Y'
            ) 
            AS 
            `birthday_date` ,email , profession , cellphone, have_whatsapp, permission_send_email, permission_send_sms , created_in 
            FROM 
            `contacts`;")
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $contacts;
    }

    public function getContactById(int $idUser): array
    {

        $contacts = $this->pdo
            ->query("SELECT * FROM contacts where id = '$idUser';")
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $contacts;
    }

    public function insertContact(ContactsModel $contacts): void
    {

        $statement = $this->pdo
            ->prepare('INSERT INTO contacts(
            name,
            birthday_date,
            email,
            profession,
            phone,
            cellphone,
            have_whatsapp,
            permission_send_email,
            permission_send_sms
            ) VALUES (
            :name,
            :birthday_date,
            :email,
            :profession,
            :phone,
            :cellphone,
            :have_whatsapp,
            :permission_send_email,
            :permission_send_sms
            );');


        $statement->execute([
            'name' => $contacts->getName(),
            'birthday_date' => $contacts->getBirthdayDate(),
            'email' => $contacts->getEmail(),
            'profession' => $contacts->getProfession(),
            'phone' => $contacts->getPhone(),
            'cellphone' => $contacts->getCellphone(),
            'have_whatsapp' => $contacts->getHaveWhatsapp(),
            'permission_send_email' => $contacts->getPermissionSendEmail(),
            'permission_send_sms' => $contacts->getPermissionSendSms()
        ]);
    }

    public function existingEmailVerification(string $email)
    {
        $statement = $this->pdo
            ->query("SELECT * FROM contacts where email = '$email';")
            ->fetchAll(\PDO::FETCH_ASSOC);

        if (count($statement) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function existingEmailVerificationUpdate(string $email , int $id)
    {
        $statement = $this->pdo
            ->query("SELECT * FROM contacts where email = '$email' and id != '$id';")
            ->fetchAll(\PDO::FETCH_ASSOC);

        if (count($statement) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function existingPhoneVerification(string $phone)
    {
        $statement = $this->pdo
            ->query("SELECT * FROM contacts where phone = '$phone';")
            ->fetchAll(\PDO::FETCH_ASSOC);

        if (count($statement) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function existingCellphoneVerificationCreate(string $cellphone)
    {
        $statement = $this->pdo
            ->query("SELECT * FROM contacts where cellphone = '$cellphone';")
            ->fetchAll(\PDO::FETCH_ASSOC);

        if (count($statement) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function existingCellphoneVerificationUpdate(string $cellphone , int $id)
    {
        $statement = $this->pdo
            ->query("SELECT * FROM contacts where cellphone = '$cellphone' and id != '$id';;")
            ->fetchAll(\PDO::FETCH_ASSOC);

        if (count($statement) >= 1) {
            return true;
        } else {
            return false;
        }
    }



    public function updateContacts(ContactsModel $contacts): void
    {

        $statement = $this->pdo
            ->prepare('UPDATE contacts
            SET 
            name = :name,
            birthday_date = :birthday_date,
            email = :email,
            profession = :profession,
            phone = :phone,
            cellphone = :cellphone,
            have_whatsapp = :have_whatsapp,
            permission_send_email = :permission_send_email,
            permission_send_sms = :permission_send_sms
            WHERE
            id = :id;');

        $statement->execute([
            'id' => $contacts->getId(),
            'name' => $contacts->getName(),
            'birthday_date' => $contacts->getBirthdayDate(),
            'email' => $contacts->getEmail(),
            'profession' => $contacts->getProfession(),
            'phone' => $contacts->getPhone(),
            'cellphone' => $contacts->getCellphone(),
            'have_whatsapp' => $contacts->getHaveWhatsapp(),
            'permission_send_email' => $contacts->getPermissionSendEmail(),
            'permission_send_sms' => $contacts->getPermissionSendSms()
        ]);
    }

    public function deleteContacts(ContactsModel $contacts): void
    {
        $statement = $this->pdo->prepare('DELETE from contacts where id = :id;');

        $statement->execute([
            'id' => $contacts->getId()
        ]);
    }
}
