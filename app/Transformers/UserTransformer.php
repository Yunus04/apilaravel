<?php 
namespace App\Transformers;

use App\User;
use App\Transformers\ItemTransformer;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	protected $availableIncludes = [
		'items'
	];  

	public function transform(User $user){
		return [
			'id' 		 => $user->id,
			'name' 		 => $user->name,
			'email' 	 => $user->email,
			'registered' => $user->created_at->diffForHumans(),
		];
	}

	public function includeItems(User $user){
		$items = $user->items()->latesFirst()->get();

		return $this->collection($items, new ItemTransformer);
	}
}