<?php

namespace App\Services\Internal\URL;

use App\Services\Internal\Agent\Agent;
use App\Services\Internal\Base;
use App\Services\Internal\URL\Generator\CustomShortCodeGenerator;
use App\Services\Internal\URL\Generator\GeneratorContract;
use Illuminate\Support\Str;

class ShortURLService extends Base
{
    protected string $name = 'ShortURL';

    protected string $description = 'This is responsible for create short url from large url.';

    private string $shortenedURL;

    private string $shortCode;

    private array $urlInfo;

    private GeneratorContract $hashShortCodeGenerator;

    public function __construct(GeneratorContract $hashShortCodeGenerator)
    {
        $this->hashShortCodeGenerator = $hashShortCodeGenerator;
    }

    public function create(): ?string
    {
        [$message, $shortCode] = $this->generateShortCode();

        if ($this->isErrorMessage($message)) {
            return null;
        }

        $this->setShortCode($shortCode);

        return $this->createShortURL();
    }

    public function using(array $data): self
    {
        $this->setUrlInfo($data);

        return $this;
    }

    private function createShortURL(): string
    {
        $shortURL = auth()->user()->shortenedUrls()->create([
            'destination_url' => $this->urlInfo()['destination_url'],
            'short_code' => $this->shortCode()
        ]);

        $this->setShortenedURL($shortURL->short_code);

        return $this->shortenedURL();
    }

    private function urlInfo(): array
    {
        return $this->urlInfo;
    }

    private function shortCode(): string
    {
        return $this->shortCode;
    }

    private function shortenedURL(): string
    {
        return $this->shortenedURL;
    }

    private function setUrlInfo(array $urlInfo): void
    {
        $this->urlInfo = $urlInfo;
    }

    private function setShortCode(string $shortCode): void
    {
        $this->shortCode = $shortCode;
    }

    private function setShortenedURL($shortCode): void
    {
        $this->shortenedURL = env('APP_URL') . config('short-url.prefix') . '/' . $shortCode;
    }

    private function isErrorMessage(string $message): bool
    {
        return Str::startsWith($message, ['KO']);
    }

    private function generateShortCode(): array
    {
        if (!is_null($this->urlInfo()['short_code'])) {
            return (new CustomShortCodeGenerator())->generate($this->urlInfo());
        }

        return $this->hashShortCodeGenerator->generate($this->urlInfo());
    }
}
