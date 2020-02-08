<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
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
          'reply' => $this->body,
          'id'=>$this->id,
          'user_name' =>$this->user->name,
          'user_id'=>$this->user_id,
          'created_at' => $this->created_at->diffForHumans(),
          'like'=>$this->like,
          'likecount'=>$this->like->count()
        ];
    }
}
