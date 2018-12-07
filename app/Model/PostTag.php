<?php 
class PostTag extends AppModel{

	public $recursive = -1; 
	public $useTable = "posts_tags"; 
	public $actsAs = array('containable'); 
	public $belongsTo = array(
		'Post',
		'Tag' => array(
			'counterCache' => 'count'
		)
	); 

	public function afterDelete(){
		$this->Tag->deleteAll(array(
			'count' => 0
		)); 
	}

}