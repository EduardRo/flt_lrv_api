<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Invoice;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['B', 'P', 'V']);
        return [
            'customer_id'=>Customer::factory(),
            'amount'=>$this->faker->numberBetween(100,10000),
            'status'=>$status,
            'billed_date'=>$this->faker->dateTimeThisYear(),
            'paid_date'=>$status=='P'?$this->faker->dateTimeThisDecade(): NULL,

            //
        ];
    }
}
