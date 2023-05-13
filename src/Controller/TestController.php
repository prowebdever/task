<?php

namespace App\Controller;

use App\Service\ArchiverService;

class TestController
{
    /**
     * @param ArchiverService $archiverService
     */
    public function __construct(ArchiverService $archiverService)
    {
    }
}