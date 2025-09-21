<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contactusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    \App\Models\contactus::create([
        'title' => 'Your Headline',
        'content' => 'Lorem ipsum dolor sit amet consectetur. Dignissim molestie mi arcu in fermentum in nulla non. Turpis consequat eleifend est mat.'
    ]);
    \App\Models\contactus::create([
        'title' => 'Your Headline',
        'content' => 'Lorem ipsum dolor sit amet consectetur. Dignissim molestie mi arcu in fermentum in nulla non. Turpis consequat eleifend est mat.'
    ]);
    }
}
