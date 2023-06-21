<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShortURL;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ShortURLAnalyticController extends Controller
{
    public function index(): JsonResponse
    {
        $shortedUrlsAnalytics = ShortURL::query()
            ->withCount('shortUrlDetails')
            ->where('user_id', auth()->user()->id)
            ->withLastVisitedDate()
            ->get();

        return response()->json([
            'shortened-urls' => $shortedUrlsAnalytics
        ], Response::HTTP_OK);
    }

    public function active(): JsonResponse
    {
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        $user = Auth::user();

        $monthlyVisits = $user->shortenedUrls()
            ->join('short_url_details', 'short_urls.id', '=', 'short_url_details.short_url_id')
            ->whereYear('short_url_details.visited_at', $currentYear)
            ->whereMonth('short_url_details.visited_at', '<=', $currentMonth)
            ->select(
                DB::raw('DATE_FORMAT(short_url_details.visited_at, "%M") AS month'),
                DB::raw('COUNT(*) AS visits')
            )
            ->groupBy('month')
            ->orderBy(DB::raw('MONTH(short_url_details.visited_at)'))
            ->pluck('visits', 'month')
            ->all();

        $labels = [];
        $datasets = [];

        for ($month = 1; $month <= $currentMonth; $month++) {
            $monthName = Carbon::createFromDate($currentYear, $month, 1)->format('F');
            $labels[] = $monthName;
            $datasets[] = $monthlyVisits[$monthName] ?? 0;
        }

        return response()->json([
            'short_url_labels' => $labels,
            'short_url_datasets' => $datasets
        ], Response::HTTP_OK);
    }
}
