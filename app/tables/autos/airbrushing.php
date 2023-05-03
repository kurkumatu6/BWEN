<?php

use App\models\Element;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$air = Element::getElement('Аэрография');

$imgAir = Element::getElement('картинки аэрографии');
$contactAir = Element::getElement('контакты аэрографии');

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/airbrushing.view.php";