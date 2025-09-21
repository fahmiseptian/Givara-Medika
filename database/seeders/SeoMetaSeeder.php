<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoMetaSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'page' => 'home',
                'meta_title' => 'Home - Givara Medika',
                'meta_description' => 'Welcome to Givara Medika, your trusted healthcare center for your family.',
                'meta_keywords' => 'clinic, sehat, home',
            ],
            [
                'page' => 'about',
                'meta_title' => 'About Us - Givara Medika',
                'meta_description' => 'Learn more about the vision, mission, and team behind Givara Medika.',
                'meta_keywords' => 'about us, vision mission, clinic',
            ],
            [
                'page' => 'doctors',
                'meta_title' => 'Doctors List - Givara Medika',
                'meta_description' => 'Get to know the experienced and professional doctors at Givara Medika.',
                'meta_keywords' => 'doctor, Givara Medika, specialist',
            ],
            [
                'page' => 'services',
                'meta_title' => 'Our Services - Givara Medika',
                'meta_description' => 'See the complete healthcare services available at Givara Medika for you.',
                'meta_keywords' => 'healthcare services, clinic, medical service',
            ],
            [
                'page' => 'reviews',
                'meta_title' => 'Patient Reviews - Givara Medika',
                'meta_description' => 'Read reviews from patients about their experiences with Givara Medika.',
                'meta_keywords' => 'patient reviews, testimonials, review',
            ],
            [
                'page' => 'contact',
                'meta_title' => 'Contact Us - Givara Medika',
                'meta_description' => 'Contact Givara Medika for more information or make an appointment now.',
                'meta_keywords' => 'contact, address, phone, clinic',
            ],
        ];

        DB::table('seo_meta')->insert($pages);
    }
}
