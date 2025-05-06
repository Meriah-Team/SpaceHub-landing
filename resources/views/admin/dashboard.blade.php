@extends('layout.adminLayout')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600">Welcome to the SpaceHub admin panel.</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700">Total Workspaces</h2>
        <p class="text-3xl font-bold text-[var(--color-spacehub-dark)]">{{ $workspaceCount }}</p>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700">Total Feedback</h2>
        <p class="text-3xl font-bold text-[var(--color-spacehub-dark)]">{{ $feedbackCount }}</p>
    </div>
</div>

<!-- Recent Feedback -->
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Recent Feedback</h2>
    
    @if($recentFeedback->count() > 0)
        <div class="space-y-4">
            @foreach($recentFeedback as $feedback)
                <div class="border-b pb-4">
                    <p class="font-medium">{{ $feedback->name }}</p>
                    <p class="text-sm text-gray-500">{{ $feedback->email }}</p>
                    <p class="mt-2">{{ $feedback->message }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $feedback->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No feedback yet.</p>
    @endif
</div>
@endsection
