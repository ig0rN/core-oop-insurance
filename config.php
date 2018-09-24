<?php
function __autoload($c){
	require_once "classes/{$c}.class.php";
}

Session::init();

function redirect($value) {
	header("Location: {$value}");
}

function showValidationError($validation_messages) {
	if ($validation_messages != null) {
		echo "<ul class='alert alert-danger'>";
		foreach ($validation_messages as $m) {
			echo "<li>" . $m . "</li>";
		}
		echo "</ul>";
	}
}

function showValidationSuccess($validation_messages) {
	if ($validation_messages != null) {
		echo "<ul class='alert alert-success'>";
		foreach ($validation_messages as $m) {
			echo "<li>" . $m . "</li>";
		}
		echo "</ul>";
	}
}
