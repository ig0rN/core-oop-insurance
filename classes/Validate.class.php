<?php

class Validate {

    private $passed = false;
    private $errors = array();

    public function check($variable, $fields = array()) {

        foreach ($fields as $field => $rules) {

          $field = explode('|', $field);

          foreach ($rules as $rule => $rule_value) {

            $value = trim($variable[$field[0]]);
            $name = isset($field[1]) ? $field[1] : $field[0];

            if ($rule === 'required' && empty($value)) {
              $this->addError($field[0], "{$name} se zahteva.");
            } else if (!empty($value)) {
              switch ($rule) {
                  case 'min':
                      if(strlen($value) < $rule_value) {
                        $this->addError($field[0], "{$name} mora da sadrzi/e minimum {$rule_value} karaktera.");
                      }
                  break;
                  case 'max':
                      if(strlen($value) > $rule_value) {
                        $this->addError($field[0], "{$name} ne sme da sadrzi/e vise od {$rule_value} karaktera.");
                      }
                  break;
                  case 'unique':
                      $check = new QueryBuilder(Connection::make());
                      $result = $check->selectWhere($rule_value, $field[0], '=', $value);
                      if(count($result)) {
                        $this->addError($field[0], "{$name} vec postoji.");
                      }
                  break;
              }
            }

          }
        }

        if (empty($this->errors)) {
          $this->passed = true;
        }

        return $this;
    }

    private function addError($field, $error) {
      $this->errors[$field] = $error;
    }

    public function errors() {
      return $this->errors;
    }

    public function passed() {
      return $this->passed;
    }
}
