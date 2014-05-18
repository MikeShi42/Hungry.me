<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	//disable updated_at and created_at columns
	public $timestamps = false;

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	
	//Arbitrarily implemented to satisfy the interface
	public function getAuthPassword(){ return '.'; }
	public function getRememberToken(){ return $this->attributes['remember_token']; }
	public function setRememberToken($value){ $this->attributes['remember_token'] = $value; }
	public function getRememberTokenName(){ return 'remember_token'; }
}
