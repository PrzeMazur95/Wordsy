<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Enum\Api\ExceptionMessages;
use App\Enum\Api\JsonResponseMessages;
use App\Enum\Api\LoggerMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreWordRequest;
use App\Http\Requests\Api\UpdateWordRequest;
use App\Http\Resources\WordResource;
use App\Models\Word;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $words = $this->word::all();
        } catch (\Exception $e) {
            $this->logger::error(LoggerMessages::ALL_WORDS->value ." : ". $e);

            return response()->json(ExceptionMessages::GENERAL_DB_ERROR->value, 500);
        }

        return WordResource::collection($words);
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
     * @param int $id
     * @return WordResource|JsonResponse
     */
    public function show(int $id): WordResource|JsonResponse
    {
        try{
            $word = $this->findWord($id);
            if(!$word) {

                return response()->json(JsonResponseMessages::NOT_FOUND->value, 404);
            }

            return new WordResource($word);
        } catch (\Exception $e) {
            $this->logger::error(LoggerMessages::SHOW_WORD->value ." : ". $e);

            return response()->json(ExceptionMessages::GENERAL_DB_ERROR->value, 500);
        }
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
            $word = $this->findWord($id);
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
     * Remove the specified word from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try{
           $word = $this->findWord($id);
           if(!$word) {

               return response()->json('entity nt found');
           }
            $word->delete();

            return response()->json('entity deletd');
        } catch (\Exception $ex) {

            return response()->json('there wa an error' .$ex);
        }

    }

    /**
     * Find specific word by id
     *
     * @param int $id
     * @return Word|null
     */
    private function findWord(int $id): Word|null
    {
        return $this->word->find($id);
    }
}
