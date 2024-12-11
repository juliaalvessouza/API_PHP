<?php

namespace App\Http\Controllers;
use App\Services\ItemTypeService;
use App\Http\Resources\ItemTypeResource;
use App\Http\Requests\ItemTypeStoreRequest;
use App\Http\Requests\ItemTypeUpdateRequest;
use App\Http\Resources\ItemTypeDetailsResource;


use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    private $itemTypeService;

    public function __construct(ItemTypeService $itemTypeService){
        $this->itemTypeService = $itemTypeService;

    }

    public function get(){     
        //dd('teste'); forma de testar
        $items = $this->itemTypeService->get();
        return ItemTypeResource::collection($items);
    }
      
    public function details($id){
        $item = $this->itemTypeService->details($id);
        if($item){
            return new ItemTypeDetailsResource($item);
        }return response()->json(['message' => 'Item not found'], 404);
        
    }
 
    public function store(ItemTypeStoreRequest $request)
    {
        $data = $request->validated();
        $item = $this->itemTypeService->store($data);
        
        return (new ItemTypeResource($item))->response()->setStatusCode(201);
    }
    

    public function update($id, ItemTypeUpdateRequest $request)
    {        
        $data = $request->validated();
        dd($data);
        $item = $this->itemTypeService->update($id, $data);
        if($item){
            return new ItemTypeResource($item);
        }
        return response()->json([
            'message' => 'Item not found'
        ], 404);
    }
   
    public function delete($id){
        $item = $this->itemTypeService->delete($id);
        if($item){
            return new ItemTypeResource($item);
        }   

        return response()->json([
           'message' => 'Item not found'
        ], 404);
    }
}
