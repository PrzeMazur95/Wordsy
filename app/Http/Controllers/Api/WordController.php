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
use App\Models\PolishTranslation;
use App\Models\Word;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class WordController extends Controller
{
    /**
     * @param Word $word
     * @param PolishTranslation $polishTranslation
     * @param Log $logger
     */
    public function __construct(
        private readonly Word $word,
        private readonly PolishTranslation $polishTranslation,
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
            $word = $this->word->create($request->validated());
            $translation = $this->polishTranslation->make([
                'translation' => $request->validated()['polishTranslation']
            ]);
            $word->PolishTranslation()->save($translation);
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

               return response()->json(JsonResponseMessages::NOT_FOUND->value);
           }
            $word->delete();

            return response()->json(JsonResponseMessages::DELETED->value);
        } catch (\Exception $e) {
            $this->logger::error(LoggerMessages::DELETE_WORD->value ." : ". $e);

            return response()->json(ExceptionMessages::GENERAL_DB_ERROR->value);
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

    /**
     * Take specific amount of words
     *
     * @param int $size
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function amountOfWords(int $size): JsonResponse|AnonymousResourceCollection
    {
        try {
            $words = $this->word::with('PolishTranslation')->orderByDesc('id')->take($size)->get();
        } catch (\Exception $e) {
            $this->logger::error(LoggerMessages::AMOUNT_OF_WORDS->value ." : ". $e);

            return response()->json(ExceptionMessages::GENERAL_DB_ERROR->value, 500);
        }

        return WordResource::collection($words);
    }
}
