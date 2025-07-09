<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    public function index()
    {
        $topWorkspaces = Workspace::take(6)->get();
        return view('pages.landing', ['topWorkspaces' => $topWorkspaces]);
    }

    public function explore(Request $request)
    {
        $query = Workspace::query();
        $searchLocation = $request->input('location');

        if ($searchLocation) {
            $query->where('name', 'like', "%{$searchLocation}%")
                  ->orWhere('address', 'like', "%{$searchLocation}%");
                //   ->orWhere('city', 'like', "%{$searchLocation}%");
        }

        $topWorkspaces = $query->paginate(12);
        return view('pages.explore', [
            'topWorkspaces' => $topWorkspaces,
            'searchLocation' => $searchLocation
        ]);
    }

    public function detail(Request $request, $id = null)
    {
        // Get workspace ID from query parameter or route parameter
        $workspaceId = $id ?? $request->query('id');
        
        if (!$workspaceId) {
            abort(404, 'Workspace ID not provided');
        }

        // Find workspace by ID
        $workspace = Workspace::find($workspaceId);
        
        if (!$workspace) {
            abort(404, 'Workspace not found');
        }
        
        // Debugging
        Log::info('Workspace data:', ['workspace' => $workspace->toArray()]);
        
        $workspace->load(['rooms', 'tables']);

        // Get recommended workspaces with fallback options
        $recommendedWorkspaces = collect();

        // Try to get workspaces from the same city first
        if ($workspace->city) {
            $recommendedWorkspaces = Workspace::where('city', $workspace->city)
                                            ->where('id', '!=', $workspace->id)
                                            ->inRandomOrder()
                                            ->take(3)
                                            ->get();
        }

        // If we don't have enough from same city, get random workspaces
        if ($recommendedWorkspaces->count() < 3) {
            $additionalWorkspaces = Workspace::whereNotIn('id', $recommendedWorkspaces->pluck('id'))
                                           ->where('id', '!=', $workspace->id)
                                           ->inRandomOrder()
                                           ->take(3 - $recommendedWorkspaces->count())
                                           ->get();
            
            $recommendedWorkspaces = $recommendedWorkspaces->concat($additionalWorkspaces);
        }

        // If still not enough, get any workspace except current one
        if ($recommendedWorkspaces->count() < 3) {
            $fallbackWorkspaces = Workspace::where('id', '!=', $workspace->id)
                                         ->inRandomOrder()
                                         ->take(3 - $recommendedWorkspaces->count())
                                         ->get();
            
            $recommendedWorkspaces = $recommendedWorkspaces->concat($fallbackWorkspaces);
        }
                                        
        // Debugging
        Log::info('Recommended workspaces:', ['recommended' => $recommendedWorkspaces->toArray()]);
        
        return view('pages.detail', [
            'workspace' => $workspace,
            'recommendedWorkspaces' => $recommendedWorkspaces
        ]);
    }

    public function search()
    {
        // Implement search logic if needed
    }
}
?>
