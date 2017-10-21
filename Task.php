<?php

// define a Task
class Task {
	private $description;
	private $completed;

	 public function getDescription() {
	 	return $this->description;
	 }

	 public function isCompleted() {
	 	return $this->completed;
	 }

	 public function complete() {
	 	$this->completed = true;
	 }
}