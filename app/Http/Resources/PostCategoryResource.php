<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $postcategory
     * @return array
     */
    public function toArray($request)
    {
        return [
            'post_id' => $this->post_id,
            'category_id' => $this->category_id
        ];
    }
    
    public function with($request)
    {
        return [
            'version' => '1.0.2',
            'author' => 'PostCategory'
        ];
    }
}
