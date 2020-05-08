<?php
namespace App\Helpers;

class FileHelper
{
  protected $uploadsDir = 'images/';
  public function upload(array $file):string
  {
      $userId = SessionHelper::getUserId();
      $folders = $this->uploadsDir . "{$userId}/";
      $this->createFolders($folders);
      $relativePath = $folders . time() . '_' .basename($file['name']);

      if (move_uploaded_file($file['tmp_name'], ASSETS_PATH . $relativePath)){
          return $relativePath;
      }
      return '';

  }
  public function remove(string $imagePath)
  {
      if (file_exists(ASSETS_PATH . $imagePath)){
          unlink(ASSETS_PATH . $imagePath);
      }

  }
  protected function createFolders(string $path)
  {
      if (!file_exists(ASSETS_PATH . $path)) {
          mkdir(ASSETS_PATH . $path, 0755, true);
      }
  }
}