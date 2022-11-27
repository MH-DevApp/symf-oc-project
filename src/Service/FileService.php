<?php

namespace App\Service;

use Exception;
use Symfony\Component\HttpFoundation\File\File;

class FileService {
  /**
   * Copie un fichier dans un répertoire
   * @param string $folder
   * @param File $file
   * @param string|null $oldFile
   * @return string
   * @throws Exception
   */
  public function saveFile(string $folder, File $file, string $oldFile = null): string
  {
    $ext = $file->guessExtension() ?? 'bin';
    $filename = bin2hex(random_bytes(10)) . '.' . $ext;
    $file->move($folder, $filename);

    if ($oldFile && file_exists($oldFile))
    {
      unlink($oldFile);
    }

    return $filename;
  }
}