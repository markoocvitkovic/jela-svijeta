<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Requests\MealIndexRequest;

class MealController extends Controller
{
    public function index(MealIndexRequest $request)
    {        

        $perPage = $request->input('per_page', 10);
        $category = $request->input('category');
        $tags = $request->input('tags');
        $with = $request->input('with');
        $lang = $request->input('lang');
        $diffTime = $request->input('diff_time', 0);

        $query = Meal::query();

        if ($category === 'NULL') {
            $query->whereNull('category_id');
        } elseif ($category === '!NULL') {
            $query->whereNotNull('category_id');
        } elseif ($category !== null) {
            $query->where('category_id', $category);
        }

        if ($tags !== null) {
            $tagsArray = explode(',', $tags);
        
            $query->whereHas('tags', function ($q) use ($tagsArray) {
                foreach ($tagsArray as $tagId) {
                    $q->where('id', $tagId);
                }
            }, '=', count($tagsArray));
        }
        
        
        if ($with !== null) {
            $withArray = explode(',', $with);
            $query->with($withArray);
        }

        $query->where('lang', $lang);

        if ($diffTime > 0) {
            $query->withTrashed() 
                ->where(function ($q) use ($diffTime) {
                    $q->where('created_at', '>', $diffTime)
                        ->orWhere('updated_at', '>', $diffTime)
                        ->orWhere('deleted_at', '>', $diffTime);
                });
        }
        

        $meals = $query->paginate($perPage);

        return response()->json([
            'meta' => [
                'currentPage' => $meals->currentPage(),
                'totalItems' => $meals->total(),
                'itemsPerPage' => $meals->perPage(),
                'totalPages' => $meals->lastPage(),
            ],
            'data' => $meals->items(),
            'links' => [
                'prev' => $meals->previousPageUrl(),
                'next' => $meals->nextPageUrl(),
                'self' => $meals->url($meals->currentPage()),
            ],
        ]);
    }
}
