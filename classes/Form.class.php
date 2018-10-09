<?php

class Form {


    public function __construct(array $data) {
      foreach ($data as $key => $value) {
        if($key == 'email') {
          $this->setEmail($value);
        } else {
          $this->setString($key, $value);
        }
      }
    }

    private function setString($field, $variable)  {
      if (isset($variable)) {

        $value = strip_tags(trim($variable));

        $this->$field = $value;
      }
    }

    private function setEmail($variable) {
        if(preg_match('^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$^', $variable)) {

            $value = strip_tags(trim($variable));

            $this->email = $value;
        }
    }

    public static function sensitizeString ($value) {
      return strip_tags(trim($value));
    }




  }
