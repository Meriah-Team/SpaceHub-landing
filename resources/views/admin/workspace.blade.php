@extends('layout.adminLayout')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Workspace Management</h1>
        <p class="text-gray-600">Manage all your coworking spaces and cafes.</p>
    </div>
    <button onclick="openCreateModal()" class="px-4 py-2 bg-[var(--color-spacehub-dark)] text-white rounded hover:bg-[var(--color-spacehub)] transition">
        Add New Workspace
    </button>
</div>

<!-- Workspace Table -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hours</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($workspaces as $workspace)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $workspace->name }}</div>
                            <div class="text-xs text-gray-500">{{ $workspace->address }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs text-gray-500">{{ $workspace->address }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($workspace->opening_time)->format('g:i A') }} - 
                            {{ \Carbon\Carbon::parse($workspace->closing_time)->format('g:i A') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div>{{ $workspace->phone }}</div>
                            <div class="text-xs">{{ $workspace->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.workspace.detail', $workspace->id) }}" class="text-indigo-600 hover:text-indigo-900 inline-flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            No workspaces found. Click "Add New Workspace" to create one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-6 py-4 bg-gray-50">
        {{ $workspaces->links() }}
    </div>
</div>

<!-- Create Workspace Modal -->
<div id="createModal" class="fixed inset-0 z-40 hidden overflow-y-auto">
    <!-- Overlay -->
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <!-- Modal content - Added z-50 to make it appear on top -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full z-50">
            <form id="createForm" action="{{ route('admin.workspace.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Create New Workspace</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- Basic Info -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" name="name" id="name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <input type="text" name="address" id="address" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- Hours -->
                        <div>
                            <label for="opening_time" class="block text-sm font-medium text-gray-700 mb-1">Opening Time</label>
                            <input type="time" name="opening_time" id="opening_time" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="closing_time" class="block text-sm font-medium text-gray-700 mb-1">Closing Time</label>
                            <input type="time" name="closing_time" id="closing_time" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- Contact -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text" name="phone" id="phone" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <!-- Social & Maps -->
                        <div>
                            <label for="instagram" class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                            <input type="text" name="instagram" id="instagram" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="tiktok" class="block text-sm font-medium text-gray-700 mb-1">TikTok</label>
                            <input type="text" name="tiktok" id="tiktok" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="maps" class="block text-sm font-medium text-gray-700 mb-1">Google Maps Link</label>
                            <input type="text" name="maps" id="maps" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <!-- Facilities -->
                        <label for="facilities" class="block text-sm font-medium text-gray-700 mb-1">Facilities (comma separated)</label>
                        <input type="text" name="facilities" id="facilities" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="WiFi, AC, Coffee">
                        <p class="mt-1 text-xs text-gray-500">Enter facilities separated by commas</p>
                    </div>

                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <!-- Cover Image -->
                        <div>
                            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                            <input type="file" name="cover_image" id="cover_image" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <p class="mt-1 text-xs text-gray-500">Main image for workspace listings (JPG, PNG, WebP)</p>
                        </div>
                        
                        <!-- Description Images -->
                        <div>
                            <label for="description_images" class="block text-sm font-medium text-gray-700 mb-1">Description Images</label>
                            <input type="file" name="description_images[]" id="description_images" multiple
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <p class="mt-1 text-xs text-gray-500">Additional images for workspace description (JPG, PNG, WebP)</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[var(--color-spacehub-dark)] text-base font-medium text-white hover:bg-[var(--color-spacehub)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-spacehub)] sm:ml-3 sm:w-auto sm:text-sm">
                        Create
                    </button>
                    <button type="button" onclick="closeCreateModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Workspace Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
            <form id="editForm" action="" method="POST">
                @csrf
                @method('PUT')
                <!-- Form fields identical to create form but with id="edit_fieldname" -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Workspace</h3>
                    
                    <!-- Same form fields as create but with edit_ prefix -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" name="name" id="edit_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="edit_description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="edit_description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                    </div>
                    
                    <!-- Location, Hours, Contact, Social & Maps, Coordinates, Facilities sections -->
                    <!-- Similar to create form but with edit_ prefix for ids -->
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[var(--color-spacehub-dark)] text-base font-medium text-white hover:bg-[var(--color-spacehub)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-spacehub)] sm:ml-3 sm:w-auto sm:text-sm">
                        Update
                    </button>
                    <button type="button" onclick="closeEditModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Functions to handle modals
    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }
    
    function closeCreateModal() {
        document.getElementById('createModal').classList.add('hidden');
    }
    
    function openEditModal(id) {
        // Fetch workspace data and populate the form
        fetch(`/admin/workspace/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_name').value = data.name;
                document.getElementById('edit_description').value = data.description || '';
                // Populate other fields
                
                // Set form action
                document.getElementById('editForm').action = `/admin/workspace/${id}`;
                
                // Show modal
                document.getElementById('editModal').classList.remove('hidden');
            });
    }
    
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
