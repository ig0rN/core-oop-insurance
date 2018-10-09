<?php

$validate = new Validate();
$validation = $validate->check($_POST, array(
  'carrier_name|Ime i prezime' => array(
    'required' => true,
    'min' => 3,
    'max' => 35,
  ),
  'type' => array(
    'required' => true
  ),
  'phone|Telefon' => array(
    'required' => true,
    'min' => 6,
    'max' => 20
  ),
  'email|E-mail' => array(
    'required' => true,
    'min' => 7,
    'unique' => 'insurance_carrier'
  ),
  'date_from|Datum pocetka' => array(
    'required' => true
  ),
  'date_to|Datum zavrsetka' => array(
    'required' => true
  ),
));

return $validation;
