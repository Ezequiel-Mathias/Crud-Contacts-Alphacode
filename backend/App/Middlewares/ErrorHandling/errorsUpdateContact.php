<?php

namespace App\Middlewares\ErrorHandling;

use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response as Response;

final class errorsUpdateContact
{

    public function __invoke(Request $request, Response $response, callable $next): Response
    {

        $data = $request->getParsedBody();

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
        }


        $response = $next($request, $response);

        return $response;
    }
}
