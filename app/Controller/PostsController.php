<?php
class PostsController extends AppController
{
    
    public $helpers = array('Date');
    public $components = array('RequestHandler');
    
    function index()
    {
        $this->Post->contain('Tag');
        $d['posts'] = $this->Paginate('Post', array(
            'type' => 'post',
            'online' => 1
        ));
        $this->set($d);


    }


    
    function tag($name)
    {
        $this->loadModel('PostTag');
        $this->PostTag->recursive = 0;
        $this->PostTag->contain('Tag', 'Post');
        $posts    = $this->Paginate('PostTag', array(
            'Tag.name' => $name,
            'Post.type' => 'post',
            'Post.online' => 1
        ));
        $post_ids = Set::Combine($posts, '{n}.PostTag.post_id', '{n}.PostTag.post_id');
        $this->Post->contain('Tag');
        $d['posts'] = $this->Post->find('all', array(
            'conditions' => array(
                'id' => $post_ids
            )
        ));
        $this->set($d);
        $this->render('index');
    }
    
    
    function show($id = null, $slug = null)
    {
        if (!$id)
            throw new NotFoundException('Nenhuma página corresponde a esse ID');
        $post = $this->Post->find('first', array(
            'conditions' => array(
                'Post.id' => $id
            ),
            'recursive' => 0
        ));
        if (empty($post))
            throw new NotFoundException('Nenhuma página corresponde a esse ID');
        /*if ($slug != $post['Post']['slug'])
            $this->redirect($post['Post']['link'], 301);*/
        $d['post'] = $post;
        $this->set($d);
    }
    
    
    function feed()
    {
        if ($this->RequestHandler->isRss()) {
            $d['posts'] = $this->Post->find('all', array(
                'limit' => 20,
                'conditions' => array(
                    'type' => 'post'
                )
            ));
            return $this->set($d);
        }
    }
    
    function admin_index()
    {
        $d['posts'] = $this->Paginate('Post', array(
            'type' => 'post',
            'online >= 0'
        ));
        $this->set($d);
    }
    function admin_edit($id = null)
    {
        if ($this->request->is('put') || $this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
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
            $this->request->data = $this->Post->getDraft('post');
        }
        
        $this->Post->PostTag->contain('Tag');
        $d['tags'] = $this->Post->PostTag->find('all', array(
            'conditions' => array(
                'PostTag.post_id' => $id
            )
        ));
        $this->set($d);
    }
    function admin_delete($id)
    {
        $this->Session->setFlash('O post foi removido', 'notif');
        $this->Post->delete($id);
        $this->redirect($this->referer());
    }
    function admin_delTag($id)
    {
        $this->Post->PostTag->delete($id);
    }
    
}