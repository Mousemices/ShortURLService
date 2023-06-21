<?php

namespace App\Http\Controllers;

use App\Models\ShortURL;
use App\Models\ShortURLDetail;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Facades\Agent;

class RedirectController extends Controller
{
    public function redirect(string $shortCode)
    {
        $URL = ShortURL::query()->whereShortCode($shortCode)->firstOrFail();

        ShortURLDetail::create([
            'device' => request()->header('User-Agent'),
            'ip_address' => request()->ip(),
            'operating_system' => Agent::platform(),
            'short_url_id' => $URL->id,
        ]);

        return Redirect::to($URL->destination_url);
    }
}
