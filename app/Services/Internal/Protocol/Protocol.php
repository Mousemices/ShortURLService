<?php

namespace App\Services\Internal\Protocol;

use App\Services\Internal\Base;

    class Protocol extends Base
    {
        const http = 'http://';

        const https = 'https://';

        protected string $name = 'Protocol';

        protected string $description = 'This is responsible for demonstrate current supported protocol by browser.';

        public static function supported(): array
        {
            return [self::http, self::https];
        }
    }
