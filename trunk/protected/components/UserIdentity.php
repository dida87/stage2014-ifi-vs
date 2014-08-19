<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
/*
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 
          private $_id;
	public function authenticate()
	{
            /*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
             * 
             
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
             
          
             $record = User::model()->findByAttributes(array('name' => $this->username));
        if ($record === null) {
            $this->_id = 'user Null';
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        // here I compare db password with passwod field
        else if ($record->password !== $this->password) {
            $this->_id = $this->username_id;
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            // pass role function 
           // $this->setState('protein_login', ($record['protein_login'] > 0) ? true : false);
            //$this->setState('ligand_login', ($record['ligand_login'] > 0) ? true : false);
            //$this->setState('docking_login', ($record['docking_login'] > 0) ? true : false);
            
            $this->_id = $record['name'];
            $this->setState('title', $record['name']);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
        public function getId() {       //  override Id
        return $this->_id;
    }
}
 * */
?>

<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;

    public function authenticate() {
        // here I use Email as user name which comes from database
        $record = User::model()->findByAttributes(array('name' => $this->username));
        if ($record === null) {
            $this->_id = 'user Null';
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        // here I compare db password with passwod field
        else if ($record->password !== $this->password) {
            $this->_id = $this->username;
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            // pass role funcitons
            $this->setState('protein_login', ($record['protein_login'] > 0) ? true : false);
            $this->setState('ligand_login', ($record['ligand_login'] > 0) ? true : false);
            $this->setState('docking_login', ($record['docking_login'] > 0) ? true : false);
            
            $this->_id = $record['name'];
            $this->setState('title', $record['name']);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId() {       //  override Id
        return $this->_id;
    }

}
