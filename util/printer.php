<?php

// helper function to print out a variable
function dd($data) {
	echo '<pre>';
	die(var_dump($data));
	echo '</pre>';
}