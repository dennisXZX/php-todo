<?php

// take advantage of the composer autoload feature
require 'vendor/autoload.php';

$query = require 'core/bootstrap.php';

// direct to the controller matched to the URI
Router::load('routes.php')
        ->direct(Request::uri(), Request::method());