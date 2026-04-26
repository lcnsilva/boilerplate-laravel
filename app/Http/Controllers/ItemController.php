<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
use Exception;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    private $itemService;

    public function __construct(
        ItemService $itemService
    ){
        $this->itemService = $itemService;
    }

    public function list(): JsonResponse
    {
        return response()->json($this->itemService->list());
    }

    public function listById(int $id): JsonResponse
	{
		try {
			$item = $this->itemService->get($id);
			return response()->json([
				'item' => $item
			], 200);
		} catch (Exception $e) {
			return response()->json([
				'error' => $e->getMessage(),
			], 500);
		};
	}

	public function store(ItemRequest $request): JsonResponse
	{
		try {
			$item = $this->itemService->create($request->validated());
			return response()->json([
				'message' => 'Item criado com sucesso.',
				'item' => $item
			], 201);
		} catch (Exception $e) {
			return response()->json([
				'error' => $e->getMessage(),
			], 500);
		};
	}

	public function update(ItemRequest $request, int $id): JsonResponse
	{
		try {
			$item = $this->itemService->update($id, $request->validated());
			return response()->json([
				'message' => 'Item atualizado com sucesso.',
				'item' => $item
			], 200);
		} catch (Exception $e) {
			return response()->json([
				'error' => $e->getMessage(),
			], 500);
		};
	}

	public function destroy(int $id): JsonResponse
	{
		try {
			$this->itemService->delete($id);
			return response()->json([
				'message' => 'Item excluído com sucesso.'
			]);
		} catch (Exception $e) {
			return response()->json([
				'error' => $e->getMessage(),
			], 500);
		};
	}

}
