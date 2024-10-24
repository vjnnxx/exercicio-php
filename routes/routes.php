<?php

$request_method = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER["REQUEST_URI"];
$uri_segments = explode('/', parse_url($uri, PHP_URL_PATH));

// echo(json_encode($uri_segments));