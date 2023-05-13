<?php

namespace App\Provider;

use App\Model\SupportedFile;

interface ArchiverInterface
{
    /**
     * @return SupportedFile[]
     */
    public function getSupportedFiles(): array;

    /**
     * @param string $fileExtension
     *
     * @return int
     */
    public function getCompressionRateByExtension(string $fileExtension): int;

    /**
     * @param string $filename
     */
    public function compress(string $filename): void;

}