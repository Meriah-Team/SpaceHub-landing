<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample feedback messages
        $feedbackMessages = [
            "DUMMY: I love how easy it is to find workspaces!",
            "DUMMY: The app needs better filtering options.",
            "DUMMY: Had a great experience using your platform.",
            "DUMMY: Could you add more cafes in the BSD area?",
            "DUMMY: Website is very intuitive, good job!",
            "DUMMY: Booking process should be simplified.",
            "DUMMY: Please add payment integration.",
            "DUMMY: I found my favorite study spot through your app!",
            "DUMMY: More photos of the spaces would be helpful.",
            "DUMMY: Great concept, but needs more partner locations.",
        ];

        // Create 20 dummy feedback entries
        for ($i = 1; $i <= 20; $i++) {
            Feedback::create([
                'name' => "DUMMY User #$i",
                'email' => "dummy$i@example.com",
                'message' => $feedbackMessages[$i % count($feedbackMessages)],
            ]);
        }
        
        $this->command->info('Created 20 dummy feedback entries');
    }
}
