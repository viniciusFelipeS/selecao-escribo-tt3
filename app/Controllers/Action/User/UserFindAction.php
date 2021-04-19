<?php

namespace App\Controllers\Action\User;

use App\Controllers\Controller\Controller;
use App\Model\Entity\User\Service\UserFind;
use App\Model\Session\Session;
use Selective\Validation\Exception\ValidationException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class UserFindAction
{
    private UserFind $user;

    public function __construct(UserFind $user)
    {
        $this->user = $user;
    }
    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        try {
            $result = $this->user->find($data);
        } catch (ValidationException $e) {
            $response = $response->withStatus($e->getCode());
            $response->getBody()->write($e->getMessage());
            return $response;
        };

        $response =  $response->withHeader('Content-Type', 'application/json')->withStatus(201);
        $response->getBody()->write(json_encode($result));
        Session::set('user',$result);
        return $response;
    }

}
