<?php


namespace App\Middlewares\ErrorHandling;

use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Response as Response;

final class errorsVerificationCreateContactEmail
{

    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        
        $data = $request->getParsedBody();

        if (!isset($data['email']) || empty($data['email'])) {

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
        }

        $response = $next($request, $response);

        return $response;
    }
}
