<?php

require_once("../Models/diagnosticoModel.php");
$objdiagnostico = new diagnosticos();

$diagnosticos = $objdiagnostico->verdiagnosticos();
