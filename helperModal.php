<?php 
    class Helper {
        var $name, $email, $phone, $password, $typeOfHelper;

        /**
         * @param mixed $name
     * @param mixed $email
     * @param mixed $phone
     * @param mixed $password
     * @param mixed $typeOfHelper
         */
        public function __construct($name, $email, $phone, $password, $typeOfHelper){
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = $password;
            $this->typeOfHelper = $typeOfHelper;
        }

        public function showHelperInfo(){
            var_dump($this->name, $this->email, $this->phone);
            
        }

        public function storeHelper(){
        }
        
    }
