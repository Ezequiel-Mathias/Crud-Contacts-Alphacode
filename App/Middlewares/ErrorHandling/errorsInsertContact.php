<?php


namespace App\Middlewares\ErrorHandling;

use App\DAO\Contacts\ContactsDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response as Response;

final class errorsInsertContact
{

    public function __invoke(Request $request, Response $response,  callable $next): Response
    {
        $data = $request->getParsedBody();

        $contactsDAO = new ContactsDAO();

        $emailVerification = $contactsDAO->existingEmailVerification($data['email']);

        $phoneVerification = $contactsDAO->existingPhoneVerification($data['phone']);

        $cellphoneVerification = $contactsDAO->existingCellphoneVerificationCreate($data['cellphone']);

        if (!isset($data['name']) || empty($data['name'])) {

            try {
                throw new \Exception("Preencha o campo nome para prosseguir com a requisição");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'code' => "001",
                    'userMessage' => 'Campo nome vazio ou inexistente',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        } else if (!isset($data['birthdayDate']) || empty($data['birthdayDate'])) {

            try {
                throw new \Exception("Preencha o campo data de aniversário para prosseguir com a requisição");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'code' => "001",
                    'userMessage' => 'Campo data de aniversário vazio ou inexistente',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        } else if (!isset($data['email']) || empty($data['email'])) {

            try {
                throw new \Exception("Preencha o campo email para prosseguir com a requisição");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'code' => "001",
                    'userMessage' => 'Campo email vazio ou inexistente',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        } else if ($emailVerification) {

            try {
                throw new \Exception("Esse email ja está cadastrado no sistema.");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 409,
                    'code' => "002",
                    'userMessage' => 'O email ja corresponde a um contato, utilize um email não existente.',
                    'developerMessage' => $ex->getMessage()
                ], 409);
            }
        } else if (!isset($data['profession']) || empty($data['profession'])) {

            try {
                throw new \Exception("Preencha o campo profissão para prosseguir com a requisição");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'code' => "001",
                    'userMessage' => 'Campo profissão vazio ou inexistente',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        } else if (!isset($data['phone']) || empty($data['phone'])) {

            try {
                throw new \Exception("Preencha o campo telefone para prosseguir com a requisição");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'code' => "001",
                    'userMessage' => 'Campo telefone vazio ou inexistente',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        } else if ($phoneVerification) {

            try {
                throw new \Exception("Esse telefone ja está cadastrado no sistema.");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 409,
                    'code' => "002",
                    'userMessage' => 'O telefone já corresponde a um contato, utilize um número telefone não existente.',
                    'developerMessage' => $ex->getMessage()
                ], 409);
            }
        } else if (!isset($data['cellphone']) || empty($data['cellphone'])) {

            try {
                throw new \Exception("Preencha o campo celular para prosseguir com a requisição");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'code' => "001",
                    'userMessage' => 'Campo celular vazio ou inexistente',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        } else if ($cellphoneVerification) {

            try {
                throw new \Exception("Esse celular ja está cadastrado no sistema.");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 409,
                    'code' => "002",
                    'userMessage' => 'O celular já corresponde a um contato, utilize um número de celular não existente.',
                    'developerMessage' => $ex->getMessage()
                ], 409);
            }
        } 

        $response = $next($request, $response);

        return $response;
    }
}
