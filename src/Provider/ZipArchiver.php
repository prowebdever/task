<?php

namespace App\Provider;

use App\Model\SupportedFile;

class ZipArchiver extends AbstractArchiver
{
    public function __construct()
    {
        $this->supportedFiles = [
            new SupportedFile('txt', 30),
            new SupportedFile('jpg', 0),
            new SupportedFile('bmp', 59),
            new SupportedFile('pdf', 54),
        ];
    }

    /**
     * @return SupportedFile[]
     */
    public function getSupportedFiles(): array
    {
        return $this->supportedFiles;
    }

    public function compress(string $filename): void
    {
        // this method is only for example
    }
}