<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{

    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize'=> 'Controller',// línea añadida
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => $this->referer()
        ]);
    
        // Permite ejecutar la acción display para que nuestros controladores
        // de páginas sigan funcionando.
        $this->Auth->allow(['display']);
    }

    public function isAuthorized($user)
    {
        return false;
    }

}
