<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'creator' => $this->creator,
            'assignee' => $this->assignee,
            'assigner' => $this->assigner,
            'parent' => $this->parent,
            'children' => $this->children,
            'deadline' => $this->deadline,
            // TODO: replace with actual Milestone model
            'milestone_id' => $this->milestone_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
