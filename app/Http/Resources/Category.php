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
        return [
            'table' => $this->table,
            'row' => $this->row,
            'column' => $this->column,
            'value' => $this->value,
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.1',
            'author' => 'Category'
        ];
    }
}
