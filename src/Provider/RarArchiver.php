<?php

namespace App\Provider;

use App\Model\SupportedFile;

class RarArchiver extends AbstractArchiver
{
    public function __construct()
    {
        $this->supportedFiles = [
            new SupportedFile('txt', 34),
            new SupportedFile('jpg', 0),
            new SupportedFile('bmp', 54),
            new SupportedFile('mp3', 4),
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