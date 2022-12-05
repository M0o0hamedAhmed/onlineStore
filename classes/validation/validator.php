<?php
    
    namespace validation ;

    require_once 'validationInterface.php' ;
    require_once 'Email.php' ;
    require_once 'Max.php' ;
    require_once 'Numeric.php' ;
    require_once 'Str.php' ;
    require_once 'Required.php' ;

    class Validator {

        public $errors = [] ;

        private function makeValidation(ValidationInterface $v){
           return $v->validate() ;
        }
        public function rules($name, $value, array $rules){
            foreach($rules as $rule){
                if($rule == 'required') {
                    $errors = $this->makeValidation((new Required($name, $value))) ;
                }
                else if($rule == 'string') {
                    $errors = $this->makeValidation((new Str($name, $value))) ;
                }
                else if($rule == 'email') {
                    $errors = $this->makeValidation((new Email($name, $value))) ;
                }
                else if($rule == 'max:100') {
                    $errors = $this->makeValidation((new Max($name, $value))) ;
                }
                else if($rule == 'numeric') {
                    $errors = $this->makeValidation((new Numeric($name, $value))) ;
                }
                else {
                    $errors = '' ;
                }

               if($errors !==''){
                array_push($this->errors,$errors) ;
               }
            }

        }




    }
?>