<?php

namespace App\Provider;

use App\Model\SupportedFile;

abstract class AbstractArchiver implements ArchiverInterface
{
    /**
     * @var SupportedFile[]
     */
    protected $supportedFiles;

    /**
     * @param string $fileExtension
     *
     * @return int
     */
    public function getCompressionRateByExtension(string $fileExtension): int
    {
        foreach ($this->supportedFiles as $file) {
            if ($fileExtension === $file->extension) {
                return $file->compressionRate;
            }
        }
    }
}