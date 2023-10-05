<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->first_name . ' ' . $this->resource->last_name,
            'avatar' => $this->resource->avatar,
            'email' => $this->resource->email,

            'total_news_count' => $this->resource->news()->count(),
            "public_news_count" => $this->resource->news()->where('visible', true)->count(),
            "private_news_count" => $this->resource->news()->where('visible', false)->count(),
            "completed_news_count" => $this->resource->news()->where('completed', true)->count(),
        ];
    }
}
