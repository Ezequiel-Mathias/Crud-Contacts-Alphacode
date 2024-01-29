<?php


namespace App\Middlewares\ErrorHandling;

use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response as Response;

final class errorsVerificationUpdateContactCellphone
{

    public function __invoke(Request $request, Response $response, callable $next): Response
    {

        $data = $request->getParsedBody();

        if (!isset($data['id']) || empty($data['id'])) {

            try {
                throw new \Exception("Preencha o id do contato para prosseguir com a requisição");
            } catch (\Exception | \Throwable $ex) {

                return $response->withJson([
                    'error' => \Exception::class,
                    'status' => 422,
                    'code' => "001",
                    'userMessage' => 'Campo id vazio ou inexistente',
                    'developerMessage' => $ex->getMessage()
                ], 422);
            }
        } else if (!isset($data['cellphone']) || empty($data['cellphone'])) {

            try {
                throw new \Exception("Preencha o campo de celular para prosseguir com a requisição");
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
