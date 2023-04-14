<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'type' => 'products',
            'id' => (string) $this->getRouteKey(),
            'attributes' => [
                'pro_code' => 'mierda',
                'pro_img' => $this->pro_img,
                'pro_name' => $this->pro_name,
                'pro_brand' => $this->pro_brand,
                'pro_color' => $this->pro_color,
                'pro_model' => $this->pro_model,
                'pro_description' => $this->pro_description,
                'pro_presentation' => $this->pro_presentation,
                'pro_stock' => $this->pro_stock,
                'pro_min_stock' => $this->pro_min_stock,
                'pro_max_stock' => $this->pro_max_stock,
                'pro_purchased_price' => $this->pro_purchased_price,
                'pro_cost' => $this->pro_cost,
                'pro_wholesale_cost' => $this->pro_wholesale_cost,
                'pro_iva' => $this->pro_iva,
                'pro_state' => $this->pro_state,
                'pro_discount' => $this->pro_discount,
                'category_id' => $this->category_id,
                'supplier_id' => $this->supplier_id,

            ],
        ];
    }
}
