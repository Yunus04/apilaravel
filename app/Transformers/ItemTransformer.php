<?php 

namespace App\Transformers;

use App\Item;
use League\Fractal\TransformerAbstract;

class ItemTransformer extends TransformerAbstract
{
	
	public function transform(Item $item)
	{
		return [
			'id' 			=> $item->id,
			'product_name'	=> $item->product_name,
			'description'	=> $item->description,
			'price'			=> $item->price,
			'published'		=> $item->created_at->diffForHumans(),
		];
	}
}