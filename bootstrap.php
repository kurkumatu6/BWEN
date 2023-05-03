<?php
session_start();

include $_SERVER["DOCUMENT_ROOT"] . "/app/config/db.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/helpers/Connection.php";

include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Auto.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Brand.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Model.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/User.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Image.php";

include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Type_color.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Color.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Class.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Body.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Gearbox.php";

include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Role.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Booking.php";

include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Element.php";