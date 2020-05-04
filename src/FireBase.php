<?php

require_once __DIR__ . '/../vendor/autoload.php';


use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FireBase extends Factory
{

    public $filelist = [];
    private $account;
    private $storage;
    private $bucket;
    private $firebase;


    /**Задаем массив с настройками, устанавливаем соединение
     * @param array $param
     * @return bool
     * @throws Exception
     */
    public function SetConnect(array $param): bool
    {
        if (empty($param) && !isset($param)) {
            throw new Exception('File cfg not set!');
        }
        $this->account = ServiceAccount::fromValue($param['file_cfg']);
        $this->firebase = $this->withServiceAccount($this->account);
        $this->storage = $this->firebase->createStorage()->getStorageClient();
        $this->bucket = $this->storage->bucket($param['proj_name']);

        return true;
    }

    /**Задаем путь, формируем массив с именами полученных файлов
     * @param string $path
     * @return array
     * @throws Exception
     */
    public function GetStorageFiles(string $path): array
    {
        if (empty($path) && !isset($path)) {
            throw new Exception('Path not set!');
        }
        $this->bucket = $this->storage->bucket($path);

        foreach ($this->bucket->objects() as $object) {
            //var_dump($object->downloadToFile(__DIR__ . '/my-file.txt'));
            $this->filelist[] = $object->info()['name'];
        }

        return $this->filelist;
    }

    /**
     * @param string $path
     * @return bool
     * @throws Exception
     */
    public function UploadStorageFile(string $path)
    {
        if (empty($path) && !isset($path)) {
            throw new Exception('Path is empty');
        }
        $data = file_get_contents($path);
        $this->bucket->upload($data, ['name' => pathinfo($path)['basename']]);

        return true;
    }

    public function DonwloadStorageFile(string $path, $path_to)
    {
        if (empty($path) && !isset($path)) {
            throw new Exception('Path File not set');
        }
        if (empty($path_to) && !isset($path_to)) {
            throw new Exception('Path not set');
        }
        $this->bucket->object($path)->downloadToFile($path_to . $path);

        return true;
    }
}