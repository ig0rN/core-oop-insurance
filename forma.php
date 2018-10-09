<?php
require_once "config.php";

$insurence_type = Form::sensitizeString($_POST['type']);

switch ($insurence_type) {
  case 'individual':

          if(Input::exist('post')) {
            $validation = require_once 'validation/form.php';
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
              // $pdf = new PDF();
              // $pdf->makePDF($form, $form->full_name);
              //Save into DB
            $db = new QueryBuilder(Connection::make());
            $db->saveForm('insurance_carrier', $form);

            Session::set('validation_success', ['Uspesno ste kupili osugiranje.']);
            redirect('index.php');
          } else {
            Session::set('validation_errors', $validation->errors());
            redirect('index.php');
          }

    break;

    case 'group':

    $validationGroup_array = array_chunk($_POST['group'], 4);

          if(Input::exist('post')) {
            $validation_carrier = require_once 'validation/form.php';
            $validation_group = require_once 'validation/group.php';
            // dd($validation_group);
          }

          if ($validation_carrier->passed() && empty($validation_group) ) {

            $carrier_form = new Form([
               'full_name' => $_POST['carrier_name'],
               'email' => $_POST['email'],
               'type' => $_POST['type'],
               'phone' => $_POST['phone'],
               'date_from' => $_POST['date_from'],
               'date_to' => $_POST['date_to']
            ]);
            //make PDF
            // $pdf = new PDF();
            // $pdf->makePDF($form, $form->full_name);
            $db = new QueryBuilder(Connection::make());
            $db->saveForm('insurance_carrier', $carrier_form);
            $id = $db->lastID();

            foreach ($validationGroup_array as $array) {
              $full_name = $array[0] . " " . $array[1];
              $group_form = new Form([
                 'full_name' => $full_name,
                 'email' => $array[2],
                 'birth_date' => $array[3],
                 'fk_ic' => $id
              ]);

              $db = new QueryBuilder(Connection::make());
              $db->saveForm('insured', $group_form);
            }

            Session::set('validation_success', ['Uspesno ste kupili osugiranje.']);
            redirect('index.php');
          } else {
            Session::set('validation_group_errors', $validation_group);
            Session::set('validation_errors', $validation_carrier->errors());
            redirect('index.php');
          }
    break;
}
