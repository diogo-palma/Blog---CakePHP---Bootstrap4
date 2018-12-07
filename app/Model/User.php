<?php 
class User extends AppModel{
	
	public $validate = array(
		'username' => array(
			'rule' 		 => 'isUnique',
			'allowEmpty' => false,
			'message'	 => "*Campo inválido"
		),
		'password' => array(
			'rule' 		 => 'notEmpty',
			'message'	 => "*Campo inválido"
		)
	);

	function beforeSave($options = array()){
		if(!empty($this->data['User']['password'])){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true; 
	}

}