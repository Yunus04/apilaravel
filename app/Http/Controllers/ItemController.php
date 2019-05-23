<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Transformers\ItemTransformer;
use Auth;


class ItemController extends Controller
{
    public function add(Request $request, Item $item){
    	$this->validate($request, [
    		'product_name' => 'required|min:6|max:20',
    		'description'  => 'required|min:5|max:50',
    		'price'		   => 'required',
    	]);

    	$item = $item->create([
    		'user_id'	   => Auth::user()->id,
    		'product_name' => $request->product_name,
    		'description'  => $request->description,
    		'price'		   => $request->price,
    	]);

    	$response = fractal()
    	->item($item)
    	->transformWith(new ItemTransformer)
        ->addMeta([
            'message' => 'Add data success',
        ])
    	->toArray();

    	return response()->json($response, 201); 
    }

    public function update(Request $request, Item $item){
       
        $this->authorize('update', $item);

        $item->product_name = $request->get('product_name', $item->product_name);
        $item->description = $request->get('description', $item->description);
        $item->price = $request->get('price', $item->price);
        $item->save();

        return fractal()
        ->item($item)
        ->transformWith(new ItemTransformer)
        ->toArray();
    }

    public function delete(Item $item){
        $this->authorize('delete', $item);
        $item->delete();

        return response()->json([
            'message' => "Item success delete",
        ]);
    }
}
