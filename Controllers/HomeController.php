<?php

namespace app\Controllers;

class HomeController
{
    public function contact(\IRequest $request,\Router $router)
    {

        return $router->getViewContent('contact',[
            'errors'=>[],
            'data'=>[]
        ]);
    }
    public function postContact(\IRequest $request,\Router $router)
    {
        $errors=[];
        $data = $request->getBody();
        $email=$data['email'];
        if(!$email)
        {
            $errors['email']='This field is required';
        }
        return $router->getViewContent('contact',[
            'errors'=>$errors,
        ]);
    }
}