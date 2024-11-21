<?php
require_once 'config/database.php';
require_once 'app/controllers/userController.php';
require_once 'app/models/userModel.php';

$db = getPDO();
$userController = new UserController(new UserModel($db));
$userController->sendRequest();
