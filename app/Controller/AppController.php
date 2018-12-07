<?php
class AppController extends Controller
{
    
    public $helpers = array('Text', 'Form', 'Html', 'Session', 'Cache');
    public $components = array('Session', 'Auth');
    
    
    function beforeFilter()
    {
        $this->Auth->loginAction = array(
            'controller' => 'users',
            'action' => 'login',
            'admin' => false
        );
        $this->Auth->authorize   = array(
            'Controller'
        );
        
        
        if (!isset($this->request->params['prefix'])) {
            $this->Auth->allow();
        }
        if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
            $this->layout = 'admin';
        }
    }
    
    function isAuthorized($user)
    {
        if (!isset($this->request->params['prefix'])) {
            return true;
        }
        $roles = array(
            'admin' => 10,
            'user' => 5
        );
        if (isset($roles[$this->request->params['prefix']])) {
            $lvlAction = $roles[$this->request->params['prefix']];
            $lvlUser   = $roles[$user['role']];
            if ($lvlUser >= $lvlAction) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }   
}