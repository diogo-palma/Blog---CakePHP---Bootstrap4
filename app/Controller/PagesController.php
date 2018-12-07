<?php
class PagesController extends AppController
{
    
    public $uses = array('Post');
    
    function menu()
    {
        $pages = $this->Post->find('all', array(
            'conditions' => array(
                'type' => 'page',
                'online' => 1
            ),
            'fields' => array(
                'id',
                'slug',
                'name',
                'type'
            )
        ));
        return $pages;
    }
    
    function show($id = null, $slug = null)
    {
        if (!$id)
            throw new NotFoundException('Nenhuma página corresponde a esse ID');
        $page = $this->Post->find('first', array(
            'conditions' => array(
                'id' => $id,
                'type' => 'page'
            )
        ));
        if (empty($page))
            throw new NotFoundException('Nenhuma página corresponde a esse ID');
        if ($slug != $page['Post']['slug'])
            $this->redirect($page['Post']['link'], 301);
        $d['page'] = current($page);
        $this->set($d);
    }
    

    function admin_index()
    {
        $d['pages'] = $this->Paginate('Post', array(
            'type' => 'page',
            'online >= 0'
        ));
        $this->set($d);
    }
    function admin_edit($id = null)
    {
        if ($this->request->is('put') || $this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash("Concluido com sucesso", "notif");
                $this->redirect(array(
                    'action' => 'index'
                ));
            }
        } elseif ($id) {
            $this->Post->id      = $id;
            $this->request->data = $this->Post->read();
        } else {
            $this->request->data = $this->Post->getDraft('page');
        }
        
    }
    function admin_delete($id)
    {
        $this->Session->setFlash('La page a bien été supprimée', 'notif');
        $this->Post->delete($id);
        $this->redirect($this->referer());
    }
    
    
    
}