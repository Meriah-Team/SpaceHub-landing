<?php

namespace Database\Seeders;

use App\Models\Workspace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create dummy workspaces
        for ($i = 1; $i <= 20; $i++) {
            // Create array of facilities first
            $facilities = [
                "DUMMY WiFi #$i", 
                "DUMMY AC #$i", 
                "DUMMY Power Outlets #$i"
            ];
            
            // Add some random facilities
            if ($i % 2 == 0) {
                $facilities[] = "DUMMY Meeting Room #$i";
            }
            if ($i % 3 == 0) {
                $facilities[] = "DUMMY Coffee Service #$i";
            }
            if ($i % 4 == 0) {
                $facilities[] = "DUMMY Parking #$i";
            }

            Workspace::create([
                'name' => "DUMMY Workspace #$i",
                'address' => "DUMMY Address #$i, Jl. Test No.$i",
                'opening_time' => '08:00:00',
                'closing_time' => '22:00:00',
                'phone' => "081-DUMMY-$i",
                'maps' => "https://maps.example.com/dummy-$i",
                'email' => "dummy-workspace-$i@example.com",
                'latitude' => -6.8 + ($i / 100),
                'longitude' => 107.6 + ($i / 100),
                'instagram' => "@dummy_workspace_$i",
                'tiktok' => "@dummy_tiktok_$i",
                'facilities' => json_encode($facilities),
                'description' => "This is dummy workspace #$i for testing purposes.",
                'city' => ($i % 3 == 0) ? 'Jakarta' : 'Bandung',
                'province' => ($i % 3 == 0) ? 'DKI Jakarta' : 'Jawa Barat',
            ]);
        }
        
        $this->command->info('Created 10 dummy workspaces with facilities stored in JSON');
    }
}
