<?php

namespace App\Controllers\Action\User;

use App\Model\Entity\User\Service\UserCreate;
use Selective\Validation\Exception\ValidationException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class UserCreateAction
{
    private UserCreate $user;

    public function __construct(UserCreate $user)
    {
        $this->user = $user;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();

        try{
            $result = $this->user->insert($data);
        }catch(ValidationException $e){
            $response = $response->withStatus($e->getCode());
            $response->getBody()->write($e->getMessage());
            return $response;
        };
        
        $response =  $response->withStatus(201);
        $response->getBody()->write($result);
        return $response;
    }   
}
