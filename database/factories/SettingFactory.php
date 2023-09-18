<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ['key' => 'header' , 'value' => 'Have a Medical Question?'],
            ['key' => 'header_1' , 'value' => 'ya ali, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque, laborum saepe enim maxime, delectus, dicta cumque error '],
            ['key' => 'info_header' , 'value' => 'everything you need is found at VCare.'],
            ['key' => 'info_1' , 'value' => 'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery.'],
            ['key' => 'info_2' , 'value' => 'Users can provide feedback and ratings for doctors and services, helping others make informed choices.'],
            ['key' => 'info_3' , 'value' => 'Strong measures to ensure the security and privacy of user data, especially health-related information.'],
            ['key' => 'info_4' , 'value' => 'Users can provide feedback and ratings for doctors and services, helping others make informed choices.'],
            ['key' => 'application_download' , 'value' => 'download the application now'],
            ['key' => 'download' , 'value' => 'download the application now, this technology can be seamlessly adapted and integrated into various healthcare and clinical applications to aid in generating accurate and well-structured medical documents, patient records, and clinical communications, ensuring precision and efficiency in the healthcare domain.'],
            ['key' => 'about_us' , 'value' => 'About Us aa'],
            ['key' => 'us' , 'value' => 'Welcome to v-care, your trusted healthcare provider, we are dedicated to delivering high-quality medical care and personalized attention to our patients. Our team of experienced healthcare professionals is committed to your well-being and ensuring that you receive the best possible care.'],
        ];
    }
}
