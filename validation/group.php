<?php

$errors_group = [];
$number = 1;

foreach ($validationGroup_array as $key1 => $arr) {

    $validate = new Validate();

    $var_name = 'validation' . $key1;
    ${$var_name} = $validate->check($validationGroup_array[$key1], array(
      "0|Ime{$number}" => array(
        'required' => true,
        'min' => 3,
        'max' => 15,
      ),
      "1|Prezime{$number}" => array(
        'required' => true,
        'min' => 3,
        'max' => 15,
      ),
      "2|E-mail{$number}" => array(
        'required' => true,
        'min' => 7,
        'unique' => 'insured'
      ),
      "3|Datum rodjenja{$number}" => array(
        'required' => true,
      )
    ));

    if(!${$var_name}->passed()){
      $arr = ${$var_name}->errors();

      foreach ($arr as $error) {
        $errors_group[] = $error;
      }
    }

  $number++;

}

return $errors_group;
