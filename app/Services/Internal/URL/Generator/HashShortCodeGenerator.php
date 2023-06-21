<?php

namespace App\Services\Internal\URL\Generator;

use App\Models\ShortURL;
use Hashids\Hashids;
use Illuminate\Support\Facades\DB;

class HashShortCodeGenerator implements GeneratorContract
{
    private Hashids $hashids;

    private int $maxAttempts = 10;

    public function __construct()
    {
        [$salt, $minHashLength, $alphabet] = [
            config('short-url.key_salt'),
            config('short-url.key_length'),
            config('short-url.characters')
        ];

        $this->hashids = new Hashids($salt, $minHashLength, $alphabet);
    }

    public function generate(array $data): array
    {
        $message = '';
        $generatedCode = '';

        if ($this->destinationUrlExists($data['destination_url'])) {
            $message = 'KO | The provided url already exists.';

            return $this->buildOutcome($message, $generatedCode);
        }


        $lastID = $this->getLastID();
        $times = 0;

        do {
            $lastID++;
            $times++;
            $generatedCode = $this->hashids->encode($lastID);
        } while (ShortURL::query()->where('short_code', $generatedCode)->exists()
                && $times < $this->maxAttempts
        );

        $message = 'OK | Short code created.';

        return $this->buildOutcome($message, $generatedCode);
    }

    private function getLastID(): int
    {
        $lastID = DB::table('short_urls')
            ->latest()
            ->value('id');

        if (is_null($lastID)) {
            return 0;
        }

        return $lastID;
    }

    private function destinationUrlExists(string $destinationUrl): bool
    {
        return ShortURL::query()->where('destination_url', $destinationUrl)->exists();
    }

    private function shortCodeExists(string $generatedCode): bool
    {
        return ShortURL::query()->where('short_code', $generatedCode)->exists();
    }

    private function buildOutcome(string $message, string $generatedCode): array
    {
        return [$message, $generatedCode];
    }
}
