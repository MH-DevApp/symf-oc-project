<?php

namespace App\DataFixtures\Utils;

use Exception;

class FileUtils {
  /**
   * Copie un fichier dans un répertoire
   * @param string $folder
   * @param string $filename
   * @return string
   * @throws Exception
   */
  public static function moveFileToDir(string $folder, string $filename): string
  {
    $splitFilename = explode('.', $filename);
    $newFilename = bin2hex(random_bytes(10)) . '.' . $splitFilename[count($splitFilename)-1];

    copy(
      __DIR__.'/../Files/'.$folder.'/'.$filename,
      __DIR__.'/../../../public/'.$folder.'/'.$newFilename
    );

    return $folder.'/'.$newFilename;
  }
}