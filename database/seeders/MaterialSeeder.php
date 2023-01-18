<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = ['wood', 'iron', 'steel', 'plastic', 'recycled'];

        foreach ($materials as $material) {
            $newmaterial = new Material();
            $newmaterial->name = $material;
            $newmaterial->save();
        }
    }
}
