<?php

namespace App\Services\Internal\URL\Generator;

use App\Models\ShortURL;

class CustomShortCodeGenerator implements GeneratorContract
{
    public function generate(array $data)
    {
        $message = '';
        $shortCode = $data['short_code'];

        if ($this->shortCodeExists($data['short_code'])) {
            $message = 'KO | The provided alias name already exists.';
            return $this->buildOutcome($message, $shortCode);
        }

        $message = 'OK | Custom alis short code created.';

        return $this->buildOutcome($message, $shortCode);
    }

    private function shortCodeExists(string $shortCode): bool
    {
        return ShortURL::query()->where('short_code', $shortCode)->exists();
    }

    private function buildOutcome(string $message, string $shortCode): array
    {
        return [$message, $shortCode];
    }
}
