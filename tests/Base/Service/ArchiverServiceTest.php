<?php

namespace App\Tests\Base\Service;

use App\Provider\ArchiverInterface;
use App\Provider\RarArchiver;
use App\Provider\ZipArchiver;
use App\Service\ArchiverService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ArchiverServiceTest extends KernelTestCase
{
    /**
     * @var ArchiverService
     */
    private $archiverService;

    protected function setUp()
    {
        self::bootKernel();
        /** @var ArchiverService */
        $this->archiverService = self::$container->get(ArchiverService::class);
    }

    public function testLoadedArchivers(): void
    {
        $this->assertCount(2, $this->archiverService->getArchivers());
    }

    /**
     * @dataProvider archiverFormatProvider
     */
    public function testGetBestArchiver(string $archiver, string $format): void
    {
        self::assertInstanceOf($archiver, $this->archiverService->getBestArchiver($format));
    }

    /**
     * @return array
     */
    public function archiverFormatProvider(): array
    {
        return [
            [RarArchiver::class, 'txt'],
            [RarArchiver::class, 'mp3'],
            [ZipArchiver::class, 'bmp'],
            [ZipArchiver::class, 'pdf'],
            [ArchiverInterface::class, 'jpg'],
        ];
    }

    /**
     * @dataProvider filesProvider
     */
    public function testCompress(string $file, string $compressedInfo): void
    {
        $compressed = $this->archiverService->compress($file);

        $this->assertEquals($compressedInfo, $compressed);
    }

    public function filesProvider(): array
    {
        return [
            ['sth.txt', 'sth.txt compressed with ' . RarArchiver::class],
            ['music.mp3', 'music.mp3 compressed with ' . RarArchiver::class],
            ['image.bmp', 'image.bmp compressed with ' . ZipArchiver::class],
            ['document.pdf', 'document.pdf compressed with ' . ZipArchiver::class],
        ];
    }
}