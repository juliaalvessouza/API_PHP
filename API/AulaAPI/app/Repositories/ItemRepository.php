<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    public function get(){
        return Item::all();
    }

    public function store($data): Item{
        return Item::create($data);
    }

    public function details($id){
        return Item::find($id);
    }

    public function update($id, $data): Item{
        $item = Item::findOrFail($id);
        if($item){      
            $item->update($data);
            return $item;         
        }
        return null;
    }

    public function delete($id): string{
        $item = Item::findOrFail($id);
        if($item){      
            $item->delete();
            return $item;         
        }
        return null;
    }
}