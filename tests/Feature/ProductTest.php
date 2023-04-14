<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function can_fetch_several_products()
    {
        $this->withoutExceptionHandling();

        $products = Product::factory()->count(2)->create();
        $response = $this->getJson(route('api.get.products'));

        $response->assertExactJson([
            'data' => [
                [
                    'type' => 'products',
                    'id' => (string) $products[0]->getRouteKey(),
                    'attributes' => [
                        'pro_code' => $products[0]->pro_code,
                        'pro_img' => $products[0]->pro_img,
                        'pro_name' => $products[0]->pro_name,
                        'pro_brand' => $products[0]->pro_brand,
                        'pro_color' => $products[0]->pro_color,
                        'pro_model' => $products[0]->pro_model,
                        'pro_description' => $products[0]->pro_description,
                        'pro_presentation' => $products[0]->pro_presentation,
                        'pro_stock' => $products[0]->pro_stock,
                        'pro_min_stock' => $products[0]->pro_min_stock,
                        'pro_max_stock' => $products[0]->pro_max_stock,
                        'pro_purchased_price' => $products[0]->pro_purchased_price,
                        'pro_cost' => $products[0]->pro_cost,
                        'pro_wholesale_cost' => $products[0]->pro_wholesale_cost,
                        'pro_iva' => $products[0]->pro_iva,
                        'pro_state' => $products[0]->pro_state,
                        'pro_discount' => $products[0]->pro_discount,
                        'category_id' => $products[0]->category_id,
                        'supplier_id' => $products[0]->supplier_id,
                    ],
                ],

                [
                    'type' => 'products',
                    'id' => (string) $products[1]->getRouteKey(),
                    'attributes' => [
                        'pro_code' => $products[1]->pro_code,
                        'pro_img' => $products[1]->pro_img,
                        'pro_name' => $products[1]->pro_name,
                        'pro_brand' => $products[1]->pro_brand,
                        'pro_color' => $products[1]->pro_color,
                        'pro_model' => $products[1]->pro_model,
                        'pro_description' => $products[1]->pro_description,
                        'pro_presentation' => $products[1]->pro_presentation,
                        'pro_stock' => $products[1]->pro_stock,
                        'pro_min_stock' => $products[1]->pro_min_stock,
                        'pro_max_stock' => $products[1]->pro_max_stock,
                        'pro_purchased_price' => $products[1]->pro_purchased_price,
                        'pro_cost' => $products[0]->pro_cost,
                        'pro_wholesale_cost' => $products[1]->pro_wholesale_cost,
                        'pro_iva' => $products[1]->pro_iva,
                        'pro_state' => $products[1]->pro_state,
                        'pro_discount' => $products[1]->pro_discount,
                    ],
                ],
            ],

        ]);
    }
}
