@extends('layout.adminLayout')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Feedback Management</h1>
    <p class="text-gray-600">View and manage all user feedback submissions.</p>
</div>

<!-- Feedback Table -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Message
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($feedbacks as $feedback)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $feedback->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $feedback->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-xs break-words">{{ $feedback->message }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $feedback->created_at->format('M d, Y') }}
                            <div class="text-xs text-gray-400">{{ $feedback->created_at->diffForHumans() }}</div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                            No feedback submissions found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-6 py-4 bg-gray-50">
        {{ $feedbacks->links() }}
    </div>
</div>

<!-- Stats Card -->
<div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700">Total Feedback</h2>
        <p class="text-3xl font-bold text-[var(--color-spacehub-dark)]">{{ $feedbacks->total() }}</p>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700">Latest Feedback</h2>
        <p class="text-sm text-gray-600">
            @if($feedbacks->count() > 0)
                {{ $feedbacks->first()->created_at->diffForHumans() }}
            @else
                No feedback yet
            @endif
        </p>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700">Actions</h2>
        <div class="mt-2">
            <a href="/admin/feedbacks/export" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[var(--color-spacehub-dark)] hover:bg-[var(--color-spacehub)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-spacehub)]">
                Export Data
            </a>
        </div>
    </div>
</div>
@endsection