<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateShortURLRequest;
use App\Services\Internal\URL\ShortURLService;
use Illuminate\View\View;


class ShortURLController extends Controller
{
    public function generate(
        GenerateShortURLRequest $generateShortURLRequest,
        ShortURLService         $shortURLService
    )
    {
        $urlInfo = $generateShortURLRequest->validated();

        $shortURL = $shortURLService->using(data: $urlInfo)->create();

        return view('dashboard')->with([
            'url' => $shortURL
        ]);
    }

    public function create(): View
    {
        return view('shortUrl_create');
    }
}
