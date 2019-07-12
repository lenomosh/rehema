<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LiveVotingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
////        return $this->$request;
//      return [
//        'votes'=>$this->votes,
//        'id'=>$this->candidate_id
//
//      ];
      // return $response;
         return parent::toArray($request);
    }
}
