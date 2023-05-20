<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvenementSportifResource extends JsonResource
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
            'id' => $this->id,
            'nom' => $this->nom,
            'description' => $this->description,
            'lieu' => $this->lieu,
            'poster' => $this->poster,
            'dateDebut' => $this->dateDebut,
            'dateFin' => $this->dateFin,
            'categories' => CategorieResource::collection($this->whenLoaded('categories'))
        ];
    }
}
