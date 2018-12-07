<?php
class UsersController extends AppController
{
    
    
    function login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash("Seu login ou senha não corresponde", "notif", array(
                    'type' => 'alert-danger'
                ));
            }
        }
    }
    
    function logout()
    {
        $this->Auth->logout();
        $this->Session->setFlash("Desconetado com sucesso!", "notif");
        $this->redirect('/');
    }
    
    function admin_index()
    {
        $d['users'] = $this->Paginate('User');
        $this->set($d);
    }
    
    function admin_edit($id = null)
    {
        if ($this->request->is('post') || $this->request->is('put')) {
            $d = $this->request->data['User'];
            if ($d['password'] != $d['passwordconfirm']) {
                $this->Session->setFlash("As senhas não conferem!", "notif", array(
                    'type' => 'alert-danger'
                ));
            } else {
                if (empty($d['password']))
                    unset($d['password']);
                if ($this->User->save($d)) {
                    $this->Session->setFlash("Usuário adicionado!", "notif");
                }
            }
        } elseif ($id) {
            $this->User->id      = $id;
            $this->request->data = $this->User->read('username,role,id');
        }
        $d          = array();
        $d['roles'] = array(
            'admin' => 'admin',
            'user' => 'membro'
        );
        $this->set($d);
    }
    
    function admin_delete($id)
    {
        $this->User->delete($id);
        $this->Session->setFlash("O usuário foi excluido", "notif");
        $this->redirect($this->referer());
    }
    
    
}