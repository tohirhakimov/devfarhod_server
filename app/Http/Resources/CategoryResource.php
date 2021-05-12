<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
<<<<<<< HEAD:app/Http/Resources/PostResource.php
            'title' => $this->title,
=======
            'id' => $this->id,
            'name' => $this->name,
>>>>>>> origin/Create-CRUD-for-categories-table:app/Http/Resources/CategoryResource.php
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
        ];
    }
    public function with($request)
    {
        return [
            'version' => '1.0.2',
            'author' => 'Category'
        ];
    }
}