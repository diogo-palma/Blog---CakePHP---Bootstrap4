<?php 
class Post extends AppModel{

	public $actsAs = array('containable'); 
	public $hasMany = array(
		'Media' => array(
			'dependent' => true
		),
		'PostTag'
	); 
	public $belongsTo = array(
		'Category' => array(
			'counterCache' => array('post_count' => array('Post.online'=>1))
		)
	);
	public $hasAndBelongsToMany = array('Tag'); 


	public $recursive = -1; 
	public $validate = array(
		'slug' => array(
			'rule' 		 => '/^[a-z0-9\-]+$/',
			'allowEmpty' => true,
			'message'	 => "URL inválido!"
		),
		'name' => array(
			'rule' 		 => 'notEmpty',
			'message'	 => "Você deve especificar um título!"
      ),
      'content' => array(
			'rule' 		 => 'notEmpty',
			'message'	 => "Você deve especificar um conteúdo!"
      ),
	);
	public $order = 'Post.created DESC';

	/**
	* Permet de générer / récupérer un brouillon
	**/
	public function getDraft($type){
		$post = $this->find('first',array(
			'conditions' => array('online' => -1,'type' => $type)
		));
		if(empty($post)){
			$this->save(array(
				'type' => $type,
				'online' => -1
			),false);
			$post = $this->read();
		}
		$post['Post']['online'] = 0; 
		return $post; 
	}

	
	public function afterFind($data, $primary = false){
		foreach($data as $k=>$d){
			if(isset($d['Post']['slug']) && isset($d['Post']['id']) && isset($d['Post']['type'])){
				$d['Post']['link'] = array(
					'controller'	=> Inflector::pluralize($d['Post']['type']),
					'action'		=> 'show',
					'id'			=> $d['Post']['id'],
					'slug'			=> $d['Post']['slug']
				);
			}
			$data[$k] = $d;
		}
		return $data;
	}


	public function beforeSave($options = array()){
		if(empty($this->data['Post']['slug']) && isset($this->data['Post']['slug']) && !empty($this->data['Post']['name']))
			$this->data['Post']['slug'] = strtolower(Inflector::slug($this->data['Post']['name'],'-'));
		return true; 
	}

	public function afterSave($created){
		if(!empty($this->data['Post']['tags'])){
			$tags = explode(',',$this->data['Post']['tags']); 
			foreach($tags as $tag){
				$tag = trim($tag);
				if(!empty($tag)){
					$d = $this->Tag->findByName($tag);
					if(!empty($d)){
						$this->Tag->id = $d['Tag']['id']; 
					}else{
						$this->Tag->create(); 
						$this->Tag->save(array(
							'name' => $tag
						)); 
					}
					$this->PostTag->create(); 
					$this->PostTag->save(array(
						'post_id' => $this->id,
						'tag_id' => $this->Tag->id
					)); 
				}
			}
		}
	 	return true; 
	}


}