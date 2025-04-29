<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Workspace;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all workspace IDs
        $workspaces = Workspace::all();
        
        if ($workspaces->isEmpty()) {
            $this->command->error('No workspaces found. Run WorkspaceSeeder first.');
            return;
        }
        
        $roomCount = 0;
        
        // For each workspace, create 2-4 rooms
        foreach ($workspaces as $workspace) {
            $numRooms = rand(2, 4);
            
            for ($i = 1; $i <= $numRooms; $i++) {
                Room::create([
                    'workspace_id' => $workspace->id,
                    'name' => "DUMMY Room #$i - {$workspace->name}",
                ]);
                $roomCount++;
            }
        }
        
        $this->command->info("Created $roomCount dummy rooms across {$workspaces->count()} workspaces");
    }
}
