<?php
function __autoload($c){
	require_once "classes/{$c}.class.php";
}

Session::init();

function dd($variable) {
		echo "<pre>";
    var_dump($variable);
    echo "</pre>";
	die();
}

function redirect($value) {
	header("Location: {$value}");
}

function showValidationError($validation_messages) {
	if ($validation_messages != null) {
		echo "<ul class='alert alert-danger'>";
		foreach ($validation_messages as $messages) {
			echo "<li>" . $messages . "</li>";
		}
		echo "</ul>";
	}
}

function showValidationGroupError($validation_messages) {
	if ($validation_messages != null) {
		echo "<ul class='alert alert-danger'>";
		foreach ($validation_messages as $messages) {
			echo "<li>" . $messages . "</li>";
		}
		echo "</ul>";
	}
}

function showValidationSuccess($validation_messages) {
	if ($validation_messages != null) {
		echo "<ul class='alert alert-success'>";
		foreach ($validation_messages as $messages) {
			echo "<li>" . $messages . "</li>";
		}
		echo "</ul>";
	}
}
