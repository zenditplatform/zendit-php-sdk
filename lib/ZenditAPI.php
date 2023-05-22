<?php

namespace Zendit;

use Zendit\API\ZenditApi as baseAPI;

class ZenditAPI extends baseAPI
{
    public function __construct(
        string $apiKey,
    )
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('Authorization', "Bearer " . $apiKey);

        parent::__construct(
            null,
            $config
        );
    }
}

