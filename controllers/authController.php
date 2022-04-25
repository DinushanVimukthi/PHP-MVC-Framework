<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\middlewares\BaseMiddleware;
use app\core\Request;
use app\core\response;
use app\models\logInForm;
use app\models\User;

class authController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request,Response $response)
    {
        $loginForm=new logInForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');

                return ;
            }
        }
        $this->setLayout('auth');
        return $this->render('login',[
            'model'=>$loginForm
        ]);
    }

    public function logout(Request $request,Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
    public function register(Request $request)
    {
        $this->setLayout('auth');
        $user=new User();
        if($request->isPost()){
            $user->loadData($request->getBody());

            if($user->validate() && $user->save()){
                Application::$app->session->setFlash('success','Thanks for Registration');
                Application::$app->response->redirect('/');
                exit();
            }
//            echo '<pre>';
//            var_dump($registerModel->errors);
//            echo '</pre>';
//            exit();
            return $this->render('register',
                ['model'=>$user]
            );
        }
        return $this->render('register',['model'=>$user]);
    }

    public function profile()
    {

        return $this->render('profile');
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[]=$middleware;
    }
}

