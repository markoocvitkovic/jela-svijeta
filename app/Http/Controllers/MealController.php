<?php

namespace App\Http\Controllers;

use App\Models\Meal;

class MealController extends Controller
{
    public function index(Request $request)
    {
        $validatedData = $request->validate([
            'per_page' => 'integer|min:1',
            'category' => 'nullable|in:NULL,!NULL|integer',
            'tags' => 'nullable|string',
            'with' => 'nullable|string',
            'lang' => 'required|string',
            'diff_time' => 'integer|min:0',
        ]);
        
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
                $q->whereIn('id', $tagsArray);
            });
        }

    
        if ($with !== null) {
            $withArray = explode(',', $with);
            $query->with($withArray);
        }


        $query->where('lang', $lang);

        
        if ($diffTime > 0) {
            $query->where(function ($q) use ($diffTime) {
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