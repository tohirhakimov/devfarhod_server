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
    public function toArray($postcategory)
    {
        return [
            'post_id' => $this->post_id,
            'gategory_id' => $this->gategory_id,


        ];
    }
}
