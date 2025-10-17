<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\submissions;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleSubmissions = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'message' => 'I would like to inquire about your services. Can you provide more information?',
            ],
            [
                'name' => 'Bob Williams',
                'email' => 'bob@example.com',
                'message' => 'Thank you for the excellent support. Your team was very helpful.',
            ],
            [
                'name' => 'Carol Davis',
                'email' => 'carol@example.com',
                'message' => 'I am interested in partnering with your organization. Please contact me.',
            ],
            [
                'name' => 'David Brown',
                'email' => 'david@example.com',
                'message' => 'Could you send me a quote for your enterprise plan?',
            ],
            [
                'name' => 'Emma Wilson',
                'email' => 'emma@example.com',
                'message' => 'I found a bug in your application. Please let me know how to report it.',
            ],
        ];

        foreach ($sampleSubmissions as $submission) {
            submissions::create($submission);
        }
    }
}
