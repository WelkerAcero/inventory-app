<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /*         return [
            "pro_img" => "https://c8.alamy.com/compes/2j8jxhd/belgrado-serbia-11-de-mayo-de-2022-nuevos-zapatos-de-tenis-adidas-sobre-fondo-blanco-con-caja-de-paquete-nuevos-adivas-sneakers-o-entrenadores-sobre-fondo-blanco-yo-2j8jxhd.jpg",
            "pro_code" => "SS-1",
            "pro_name" => "Alamy",
            "pro_description" => "Zapato tenis de alta gama",
            "pro_presentation" => "unidad",
            "supplier_id" => Supplier::factory(),
            "pro_purchased_price" => 72000,
            "pro_cost" => 98200,
            "pro_wholesale_cost" => 90000,
            "pro_stock" => 20,
            "category_id" => Category::factory(),
            "pro_min_stock" => 5,
            "pro_max_stock" => 50,
            "pro_discount" => 0,
            "pro_brand" => "Adidas",
            "pro_model" => "Tenis 2022",
            "pro_state" => True
        ]; */

        return [
            "pro_img" => "https://c8.alamy.com/compes/2j8jxhd/belgrado-serbia-11-de-mayo-de-2022-nuevos-zapatos-de-tenis-adidas-sobre-fondo-blanco-con-caja-de-paquete-nuevos-adivas-sneakers-o-entrenadores-sobre-fondo-blanco-yo-2j8jxhd.jpg",
            "pro_code" => $this->faker->name(),
            "pro_name" => $this->faker->name(),
            "pro_description" => $this->faker->name(),
            "pro_presentation" => $this->faker->text(10),
            "supplier_id" => Supplier::factory(),
            "pro_purchased_price" => $this->faker->numerify('####'),
            "pro_cost" => $this->faker->numerify('#####'),
            "pro_wholesale_cost" => $this->faker->numerify('#####'),
            "pro_stock" => $this->faker->numerify('##'),
            "category_id" => Category::factory(),
            "pro_min_stock" => $this->faker->numerify('##'),
            "pro_max_stock" => $this->faker->numerify('##'),
            "pro_discount" => $this->faker->numerify('##'),
            "pro_brand" => $this->faker->text(10),
            "pro_model" => $this->faker->text(10),
            "pro_state" => True
        ];
    }
}
