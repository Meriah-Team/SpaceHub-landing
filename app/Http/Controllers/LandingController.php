<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Get top 6 workspaces
        $topWorkspaces = Workspace::take(6)->get();
        
        return view('pages.landing', [
            'topWorkspaces' => $topWorkspaces
        ]);
    }

    public function explore(Request $request)
    {
        $query = Workspace::query();
        $searchLocation = $request->input('location');
        
        // Apply search filter if location parameter exists
        if ($searchLocation) {
            $query->where('name', 'like', "%{$searchLocation}%")
                  ->orWhere('address', 'like', "%{$searchLocation}%")
                  ->orWhere('city', 'like', "%{$searchLocation}%");
        }
        
        // Get workspaces (paginated)
        $topWorkspaces = $query->paginate(12);
        
        return view('pages.explore', [
            'topWorkspaces' => $topWorkspaces,
            'searchLocation' => $searchLocation
        ]);
    }

    public function search()
    {
        
    }
}
