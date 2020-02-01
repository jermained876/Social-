<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
          'title' => $this->title,
          'path' => $this->path,
          'body'=>$this->body,
          'user'=>$this->user->name,
          'created_id'=>$this->id,
          'slug'=>$this->slug,
          'owner'=>true,
          'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
