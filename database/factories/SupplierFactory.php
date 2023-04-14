<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\DocumentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sup_code' => $this->faker->numerify('####'),
            'sup_name' => $this->faker->name(),
            'sup_lastname' => $this->faker->name(),
            'sup_cellphone' => $this->faker->numerify('#########'),
            'sup_email' => $this->faker->unique()->safeEmail(),
            'department_id' => Department::factory(),
            'sup_city' => 'Bucaramanga',
            'sup_street' => 'Calle 63D #30-67',
            'document_type_id' => DocumentType::factory(),
            'document_number' => $this->faker->numerify('#########'),
        ];
    }
}
