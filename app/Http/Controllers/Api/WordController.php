<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class WordController extends Controller
{
    /**
     * @param Word $word
     * @param Log $logger
     */
    public function __construct(
        private readonly Word $word,
        private readonly Log $logger
    ){
    }

    /**
     * Display all words.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $words = $this->word::all();
        } catch (\Exception $e) {
            $this->logger::error('Something went wrong when trying to get all words from database: '. $e);

            return response()->json('Something went wrong with database connection, please contact with admin', 500);
        }

        return response()->json($words);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        //
    }
}
