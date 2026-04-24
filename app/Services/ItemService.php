<?php

namespace App\Services;

use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

class ItemService
{
    private $itemRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(
        ItemRepository $itemRepository
    )
    {
        $this->itemRepository = $itemRepository;
    }

    public function list(): Collection
    {
        return $this->itemRepository->getAll();
    }

    public function get(int $id): Item
    {
        $item = $this->itemRepository->getById($id);

        if(!$item) {
            throw ValidationException::withMessages([
                'item' => 'Item não encontrado.'
            ]);
        }

        return $item;
    }

    public function create(array $data): Item
	{
		return $this->itemRepository->create($data);
	}

	public function update(int $id, array $data): Item
	{
		$item = $this->get($id);
		return $this->itemRepository->update($item, $data);
	}

	public function delete(int $id): void
	{
		$item = $this->get($id);
		$this->itemRepository->delete($item);
	}
}
