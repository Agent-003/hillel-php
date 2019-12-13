<?php
include_once 'Validator.php';

try {
	$data = new Validator($_POST);
	$data->checkData();
} catch(EmptyStringException $exception) {
	echo $exception->getMessage() . ' '. $exception->getValueInput();
} catch(InvalidInputTypeException $exception) {
	echo $exception->getMessage(). ' '. $exception->getValueInput();
}


$sql = "INSERT into users_data ('login', 'pass') values (".$data->data['name'].", ".$data->data['pass'].") ";
