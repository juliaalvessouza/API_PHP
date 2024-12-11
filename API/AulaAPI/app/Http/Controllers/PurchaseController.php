<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseStoreRequest;  
use App\Services\PurchaseService;  
use App\Http\Resources\PurchaseResource;  
use App\Http\Resources\PurchaseDetailsResource;  



class PurchaseController extends Controller
{
    private $purchaseService;

    public function __construct(PurchaseService $purchaseService){
        $this->purchaseService = $purchaseService;

    }

    public function store(PurchaseStoreRequest $request)
    {
        $data = $request->validated();        
        $purchase = $this->purchaseService->store($data);
        
        return (new PurchaseResource($purchase))->response()->setStatusCode(201);
    }

    public function get(){
        $purchases = $this->purchaseService->get();
        return PurchaseResource::collection($purchases);
    }

    public function details($id){
        $purchase = $this->purchaseService->details($id);
        if($purchase){
            return new PurchaseDetailsResource($purchase);
        }
        return response()->json(['error' => 'Purchase not found'], 404);
    }
    
}
