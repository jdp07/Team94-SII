<?php 

function validateText(&$errors, $field_list, $field_name) {
	$pattern = '^[0-9]{2}\[0-9]{2}\[0-9]{4}$^';
	if (!isset($field_list[$field_name])|| empty($field_list[$field_name])){
		echo "DOB required";
		}

}
?>