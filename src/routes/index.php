<?php

use function src\slimConfiguration;
use App\Controllers\ContactsController;
use App\Middlewares\ErrorHandling\errorsInsertContact;
use App\Middlewares\ErrorHandling\errorsUpdateContact;
use App\Middlewares\ErrorHandling\errorsVerificationCreateContactCellphone;
use App\Middlewares\ErrorHandling\errorsVerificationCreateContactEmail;
use App\Middlewares\ErrorHandling\errorsVerificationUpdateContactCellphone;
use App\Middlewares\ErrorHandling\errorsVerificationUpdateContactEmail;

$app = new \Slim\App(slimConfiguration()); 

// ============ CRUD and Attributes =========================

$app -> get('/contacts' , ContactsController::class . ':getContacts');

$app -> get('/contactbyid/{id}' , ContactsController::class . ':getContactById');

$app -> post('/contacts' , ContactsController::class . ':insertContact') 
-> add(new errorsInsertContact());

$app -> put('/contacts/{id}' , ContactsController::class . ':updateContact') 
-> add(new errorsUpdateContact());

$app -> delete('/contacts/{id}' , ContactsController::class . ':deleteContacts');

// =======================================

// ============== Confirm verication =========================

$app -> post('/confirmEmailCreate' , ContactsController::class . ':verificationCreateContactEmail') 
-> add(new errorsVerificationCreateContactEmail());

$app -> post('/confirmEmailUpdate' , ContactsController::class . ':verificationUpdateContactEmail')
-> add(new errorsVerificationUpdateContactEmail());

$app -> post('/confirmCellphoneCreate' , ContactsController::class . ':verificationCreateContactCellphone')
-> add (new errorsVerificationCreateContactCellphone());

$app -> post('/confirmCellphoneUpdate' , ContactsController::class . ':verificationUpdateContactCellphone')
-> add(new errorsVerificationUpdateContactCellphone());

// =======================================


$app -> run();

?>
