<?php

require_once __DIR__ . '/vendor/autoload.php';

//use Kreait\Firebase\Factory;
//use Kreait\Firebase\Storage;
//use Kreait\Firebase\ServiceAccount;
//
//$account = ServiceAccount::fromValue(__DIR__ . '/secret/project-8971229381582235306-d7e7ef75e967.json');
//
//$firebase = (new Factory())->withServiceAccount($account);
//
//$storage = $firebase->createStorage()->getStorageClient();
//
//$bucket = $storage->bucket('project-8971229381582235306.appspot.com');
//
//$data = file_get_contents(__DIR__ . '/PyTorch.pdf');
//
////var_dump($bucket->upload($data, ['name' => 'PyTorch.pdf']));
//
////var_dump($bucket->objects());
//
//foreach ($bucket->objects() as $object) {
//    var_dump($arr_link[] = $object->info());
//}
//
//var_dump($arr_link['1']['name']);
//var_dump($arr_link['1']['metadata']['firebaseStorageDownloadTokens']);
//
////var_dump($arr_link['metadata']['firebaseStorageDownloadTokens']);
//
//
//$res = file_get_contents('https://firebasestorage.googleapis.com/v0/b/project-8971229381582235306.appspot.com/o/' . $arr_link['1']['name'] . '?alt=media&token=' . $arr_link['1']['metadata']['firebaseStorageDownloadTokens']);
//
//var_dump($res);

$obj = new FireBase();
$obj->SetConnect(['file_cfg' => __DIR__ . '/secret/project-8971229381582235306-d7e7ef75e967.json', 'proj_name' => 'project-8971229381582235306.appspot.com']);
PHP_EOL;
$obj->UploadStorageFile(__DIR__ . '/text.txt');
var_dump($obj);