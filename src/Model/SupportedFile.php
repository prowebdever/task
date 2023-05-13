<?php

namespace App\Model;

class SupportedFile
{
    /**
     * @var string
     */
    public $extension;

    /**
     * @var int
     */
    public $compressionRate;

    /**
     * @param string $extension
     * @param int    $compressionRate
     */
    public function __construct(string $extension, int $compressionRate)
    {
        $this->extension = $extension;
        $this->compressionRate = $compressionRate;
    }
}