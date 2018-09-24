<?php
require_once "config.php";

if(Input::exist('post')) {
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
}

if ($validation->passed()) {

    $form = new Form([
       'full_name' => $_POST['carrier_name'],
       'email' => $_POST['email'],
       'type' => $_POST['type'],
       'phone' => $_POST['phone'],
       'date_from' => $_POST['date_from'],
       'date_to' => $_POST['date_to']
    ]);
    //make PDF
    $pdf = new PDF();
    $pdf->makePDF($form, $form->full_name);
    //send PDF with e-mail
    $mail = new Mailer();
    $mail->sendMail($form->email, './proba.pdf', 'novo');
    //Save into DB
  $db = new QueryBuilder(Connection::make());
  $db->saveForm('insurance_carrier', $form);

  Session::set('validation_success', ['Uspesno ste kupili osugiranje.']);
  redirect('index.php');
} else {
  Session::set('validation_errors', $validation->errors());
  redirect('index.php');
}
