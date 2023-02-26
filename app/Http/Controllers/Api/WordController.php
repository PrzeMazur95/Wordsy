<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Enum\Api\ExceptionMessages;
use App\Enum\Api\JsonResponseMessages;
use App\Enum\Api\LoggerMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreWordRequest;
use App\Http\Requests\Api\UpdateWordRequest;
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
            $this->logger::error(LoggerMessages::ALL_WORDS->value ." : ". $e);

            return response()->json(ExceptionMessages::GENERAL_DB_ERROR->value, 500);
        }

        return response()->json($words);
    }

    /**
     * Store a newly created word in storage.
     *
     * @param StoreWordRequest $request
     * @return JsonResponse
     */
    public function store(StoreWordRequest $request): JsonResponse
    {
        try {
            $this->word->create($request->validated());
        } catch (\Exception $e) {
            $this->logger::error(LoggerMessages::STORE_WORD->value ." : ". $e);

            return response()->json(ExceptionMessages::GENERAL_DB_ERROR->value, 500);
        }

        return response()->json(JsonResponseMessages::SAVED->value);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Update the specified word in storage.
     *
     * @param UpdateWordRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateWordRequest $request, int $id): JsonResponse
    {
        try {
            $word = $this->word->find($id);
            if(!$word) {

                return response()->json(JsonResponseMessages::NOT_FOUND->value, 404);
            } else {
                $word->update($request->validated());

                return response()->json(JsonResponseMessages::UPDATED->value);
            }
        } catch (\Exception $e) {
            $this->logger::error(LoggerMessages::UPDATE_WORD->value ." : ". $e);

            return response()->json(ExceptionMessages::GENERAL_DB_ERROR->value, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        //
    }
}
