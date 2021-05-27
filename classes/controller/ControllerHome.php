<?php
require_once "../view/ViewHome.php";
require_once "../view/ViewTemplate.php";

ViewTemplate::header();
viewTemplate::navbar();
ViewHome::HomeBody();
ViewTemplate::footer();
