<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       
        $value=parent::toArray($request);
        if(isset($value['image'])){
            $value['image']=url( $value['image']);
        }
       
        $value['created_at']=date_format(date_create($value['created_at']),'d-m-y');
        unset($value['bio'],$value['id']);
        return $value;
    }
    public static function collection($resource)
    {
        
        $value=parent::collection($resource)->additional([
            'count'=>$resource->count()
        ]);
        return $value;
    }
}
