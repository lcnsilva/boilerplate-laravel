<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

class ItemRepository
{
    /**
     * Create a new class instance.
     */
    public function getAll(): Collection
    {
        return Item::query()->orderByDesc('id')->get();
    }

    public function getById(int $id): ?Item
    {
        return Item::find($id);
    }

    public function create (array $data): Item
    {
        return Item::create($data);
    }

    public function update(Item $item, array $data): Item
    {
        $item->update($data);
        return $item->refresh();
    }

    public function delete(Item $item): void
    {
        $item->delete();
        //add deleted_at depois para implementar soft delete
    }
}
