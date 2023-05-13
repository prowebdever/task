<?php

namespace App\Service;

use App\Provider\ArchiverInterface;
use App\Provider\RarArchiver;
use App\Provider\ZipArchiver;

class ArchiverService
{
    /**
     * @var ArchiverInterface[]
     */
    private $archivers = [];

    /**
     * @param ArchiverInterface $archiver
     */
    public function addArchiver(ArchiverInterface $archiver): void
    {
        $this->archivers[] = $archiver;
    }

    /**
     * @return ArchiverInterface[]
     */
    public function getArchivers()
    {
        return $this->archivers;
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    public function compress(string $filename): string
    {
        $archiver = $this->getBestArchiver($this->getFileExtension($filename));
        $archiver->compress($filename);

        return $filename . ' compressed with ' . get_class($archiver);
    }

    /**
     * @param string $fileExtension
     *
     * @return ArchiverInterface
     */
    public function getBestArchiver(string $fileExtension): ArchiverInterface
    {
        /**
         * @todo Implement:
         *       - check which archiver is for given extension
         *       - make sure to throw InvalidArchiverException if there are no archivers found for a given file
         *       - choose best archiver based on compression rate
         */



         switch ($fileExtension) {
            case 'rar':
                return new RarArchiver();
            case 'zip':
                return new ZipArchiver();
            default:
                throw new InvalidArchiverException(sprintf('No archiver found for file extension "%s"', $fileExtension));
        }
        
    }

    private function getFileExtension(string $filename): string
    {
        /**
         * @todo Implement getting extension form filename
         */

        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        return $extension;
    }

}