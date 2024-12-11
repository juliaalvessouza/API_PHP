<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Services\ItemService;
use App\Http\Resources\ItemResource;



class ItemController extends Controller
{
    private $itemService;

    public function __construct(ItemService $itemService){
        $this->itemService = $itemService;

    }

    public function get(){     
        //dd('teste'); forma de testar
        $items = $this->itemService->get();
        return ItemResource::collection($items);
    }
      
    public function details($id){
        $item = $this->itemService->details($id);
        if($item){
            return new ItemResource($item);
        }return response()->json(['message' => 'Item not found'], 404);
        
    }
 
    public function store(ItemStoreRequest $request)
    {
        // Dados validados
        $data = $request->validated();
    
        // Cria uma instância do modelo e salva os dados
        $item = $this->itemService->store($data);
        
        return (new ItemResource($item))->response()->setStatusCode(201);
    }
    

    public function update($id, ItemUpdateRequest $request)
    {
        $data = $request->validated();
        $item = $this->itemService->update($id, $data);
        if($item){
            return new ItemResource($item);
        }
        return response()->json([
            'message' => 'Item not found'
        ], 404);
    }

    public function delete($id){
        $item = $this->itemService->delete($id);
        if($item){
            return new ItemResource($item);
        }   

        return response()->json([
           'message' => 'Item not found'
        ], 404);
    }
}
