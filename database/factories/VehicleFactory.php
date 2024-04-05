<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class VehicleFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition() :array
    {
        $brands = [
            'Toyota'    => ['Camry', 'Corolla', 'Rav4', 'Highlander', 'Tacoma', 'Sienna', 'Prius', '4Runner', 'Tundra', 'Avalon'],
            'Honda'     => ['Accord', 'Civic', 'CR-V', 'Fit', 'HR-V', 'Odyssey', 'Pilot', 'Ridgeline', 'Insight', 'Passport'],
            'Ford'      => ['Fiesta', 'Focus', 'Mustang', 'Explorer', 'Escape', 'Edge', 'Fusion', 'Ranger', 'F-150', 'Expedition'],
            'Chevrolet' => ['Silverado', 'Equinox', 'Malibu', 'Traverse', 'Cruze', 'Tahoe', 'Suburban', 'Colorado', 'Impala', 'Blazer'],
            'Nissan'    => ['Altima', 'Rogue', 'Sentra', 'Maxima', 'Pathfinder', 'Murano', 'Versa', 'Titan', 'Frontier', 'Armada'],
            'BMW'       => ['3 Series', '5 Series', 'X5', 'X3', 'X1', '7 Series', '4 Series', 'X7', 'X6', 'X4'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'GLC', 'GLE', 'A-Class', 'S-Class', 'CLA', 'GLA', 'GLB', 'GLS'],
            'Audi'      => ['A4', 'Q5', 'A3', 'Q7', 'A6', 'Q3', 'A5', 'A7', 'Q8', 'RS5']
        
        ];

        // Choose a random brand and get its models
        $brand = $this->faker->randomElement(array_keys($brands));
        $models = $brands[$brand];

        $licensePlate = strtoupper($this->faker->bothify('??? ###'));

        return [
            'brand' => $brand,
            'model' => $this->faker->randomElement($models),
            'plate' => $licensePlate,
            'licenseRequired' => fake()->randomElement(['a', 'b', 'c', 'd'])
            // Add other attributes as needed
        ];
    }
}
