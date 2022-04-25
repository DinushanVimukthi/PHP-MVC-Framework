<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\contactForm;
use app\core\Response;

class siteController extends Controller
{
    public function handle_contact(Request $request)
    {
        $body= $request->getBody();
        return 'Handling Submitted Data';
    }
    public function contact(Request $request,Response $response)
    {
        $contact=new contactForm();
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success','Your message has been sent!');
//                echo '<pre>';
//                var_dump($contact);
//                echo '</pre>';
//                exit();
                return $response->redirect('/contact');
            }
        }
                return $this->render('contact',['model'=>$contact]);
    }
    public function home()
    {
        $params=[
            'name'=>'PHP CODES'
        ];
        return $this->render('home',$params);
    }
}