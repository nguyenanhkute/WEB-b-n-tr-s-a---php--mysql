<?php
	 
class User {
    private  $user;
    private  $password;
    private  $type;


    public function __construct($user, $password,$type) {
        $this->user = $user;
        $this->password = $password;
        $this->type = $type;
    }

    public function getUser() {
        return $this->customerID;
    }

    public function setUser( $user) {
        $this->user = $user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword( $password) {
        $this->password = $password;
    }
    

    public function getType() {
        return $this->password;
    }

    public function setType( $type) {
        $this->password = $type;
    }
    
}

?>