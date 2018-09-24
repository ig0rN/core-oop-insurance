<?php

require_once "classes/fpdf181/fpdf.php";

class PDF extends FPDF {

  public function makePDF($data, $name) {

    $this->AddPage();

    $this->SetFont("Arial", "B", 16);

    $this->Cell(120,10,"Putno osiguranje",1,1, "C");


    foreach ($data as $key => $value) {
      $this->Cell(30,10, $key, 1,0);
      $this->Cell(90,10, $value,1,1);
    }


    $this->output($name, "f");
  }

}
