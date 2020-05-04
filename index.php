<?php

require_once __DIR__ . '/vendor/autoload.php';


$obj = new FireBase();
$obj->SetConnect(['file_cfg' => __DIR__ . '/secret/project-8971229381582235306-d7e7ef75e967.json', 'proj_name' => 'project-8971229381582235306.appspot.com']);
PHP_EOL;
$obj->GetStorageFiles('project-8971229381582235306.appspot.com');
var_dump($obj->DonwloadStorageFile('dump.sql', __DIR__ . '/'));