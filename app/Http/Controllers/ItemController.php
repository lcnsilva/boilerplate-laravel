<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
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
		return response()->json($this->itemService->get($id));
	}

	public function store(ItemRequest $request): JsonResponse
	{
		$item = $this->itemService->create($request->validated());
		return response()->json($item, 201);
	}

	public function update(ItemRequest $request, int $id): JsonResponse
	{
		$item = $this->itemService->update($id, $request->validated());
		return response()->json($item);
	}

	public function destroy(int $id): JsonResponse
	{
		$this->itemService->delete($id);
		return response()->json(status: 204);
	}

}
