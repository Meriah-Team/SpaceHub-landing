@extends('layout.adminLayout')

@section('content')
<div class="mb-4">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">{{ $workspace->name }}</h1>
        <div>
            <a href="{{ route('admin.workspace') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back
            </a>
            <button onclick="openEditModal({{ $workspace->id }})" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 ml-2">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </button>
            <button onclick="confirmDelete({{ $workspace->id }})" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 ml-2">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                Delete
            </button>
        </div>
    </div>
    <p class="text-gray-600">{{ $workspace->description }}</p>
</div>

<!-- Workspace Details -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Location</h2>
        <p class="text-gray-600">{{ $workspace->address }}</p>
        @if($workspace->maps)
            <a href="{{ $workspace->maps }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 inline-flex items-center mt-2">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                View on Google Maps
            </a>
        @endif
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Hours & Contact</h2>
        <p class="text-gray-600">
            <span class="font-medium">Hours:</span> 
            {{ \Carbon\Carbon::parse($workspace->opening_time)->format('g:i A') }} - 
            {{ \Carbon\Carbon::parse($workspace->closing_time)->format('g:i A') }}
        </p>
        <p class="text-gray-600"><span class="font-medium">Phone:</span> {{ $workspace->phone }}</p>
        @if($workspace->email)
            <p class="text-gray-600"><span class="font-medium">Email:</span> {{ $workspace->email }}</p>
        @endif
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Social Media</h2>
        @if($workspace->instagram)
            <a href="https://instagram.com/{{ $workspace->instagram }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 block">
                Instagram: {{ $workspace->instagram }}
            </a>
        @endif
        @if($workspace->tiktok)
            <a href="https://tiktok.com/@{{ $workspace->tiktok }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 block">
                TikTok: {{ $workspace->tiktok }}
            </a>
        @endif
    </div>
</div>

<!-- Cover Image Section -->
<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Cover Image</h2>
    
    @if($workspace->cover_image)
        <div class="relative">
            <img src="{{ $workspace->getCoverImageUrl() }}" alt="{{ $workspace->name }}" class="w-full h-64 object-cover rounded-lg">
        </div>
    @else
        <p class="text-gray-500 mb-3">No cover image set.</p>
    @endif
    
    <!-- Cover Image Upload Form -->
    <form action="{{ route('admin.workspace.setCoverImage', $workspace->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="flex items-center">
            <input type="file" name="cover_image" class="w-full px-3 py-2 border border-gray-300 rounded-md">
            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                {{ $workspace->cover_image ? 'Update' : 'Upload' }}
            </button>
        </div>
    </form>
</div>

<!-- Description Images Section -->
<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Description Images</h2>
    
    @if($workspace->description_images && count($workspace->description_images) > 0)
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($workspace->getDescriptionImageUrls() as $index => $imageUrl)
                <div class="relative group">
                    <img src="{{ $imageUrl }}" alt="{{ $workspace->name }}" class="w-full h-40 object-cover rounded-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                        <button type="button" onclick="removeDescriptionImage({{ $workspace->id }}, {{ $index }})" class="text-white bg-red-600 rounded-full p-2 hover:bg-red-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 mb-3">No description images uploaded.</p>
    @endif
    
    <!-- Description Images Upload Form -->
    <form action="{{ route('admin.workspace.addDescriptionImages', $workspace->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="flex items-center">
            <input type="file" name="description_images[]" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md">
            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Upload</button>
        </div>
    </form>
</div>

<!-- Workspace Images -->
@if($workspace->images && count($workspace->images) > 0)
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Images</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($workspace->getImageUrls() as $index => $imageUrl)
                <div class="relative group">
                    <img src="{{ $imageUrl }}" alt="{{ $workspace->name }}" class="w-full h-40 object-cover rounded-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                        <button type="button" onclick="removeImage({{ $workspace->id }}, {{ $index }})" class="text-white bg-red-600 rounded-full p-2 hover:bg-red-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <form action="{{ route('admin.workspace.addImages', $workspace->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <div class="flex items-center">
                <input type="file" name="images[]" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md">
                <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Upload</button>
            </div>
        </form>
    </div>
@endif

<!-- Rooms Section -->
<div class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Rooms</h2>
        <button onclick="openAddRoomModal()" class="px-4 py-2 bg-[var(--color-spacehub-dark)] text-white rounded hover:bg-[var(--color-spacehub)] transition">
            Add Room
        </button>
    </div>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($workspace->rooms->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capacity</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($workspace->rooms as $room)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-900">{{ $room->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $room->max_capacity }} people</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $room->is_smoking ? 'Smoking' : 'Non-smoking' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Rp {{ number_format($room->starting_price) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="openEditRoomModal({{ $room->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                <button onclick="confirmDeleteRoom({{ $room->id }})" class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="py-8 text-center text-gray-500">
                No rooms available for this workspace. Click "Add Room" to create one.
            </div>
        @endif
    </div>
</div>

<!-- Tables Section -->
<div class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Tables</h2>
        <button onclick="openAddTableModal()" class="px-4 py-2 bg-[var(--color-spacehub-dark)] text-white rounded hover:bg-[var(--color-spacehub)] transition">
            Add Table
        </button>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($workspace->tables->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Table Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capacity</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($workspace->tables as $table)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-900">{{ $table->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $table->max_capacity }} people</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $table->is_smoking ? 'Smoking' : 'Non-smoking' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">Rp {{ number_format($table->starting_price) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="openEditTableModal({{ $table->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                <button onclick="confirmDeleteTable({{ $table->id }})" class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="py-8 text-center text-gray-500">
                No tables available for this workspace. Click "Add Table" to create one.
            </div>
        @endif
    </div>
</div>

<!-- Add Room Modal -->
<div id="addRoomModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full z-50">
            <form action="{{ route('admin.room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="workspace_id" value="{{ $workspace->id }}">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Add New Room</h3>
                    
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Room Name</label>
                        <input type="text" name="name" id="name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="max_capacity" class="block text-sm font-medium text-gray-700 mb-1">Maximum Capacity</label>
                            <input type="number" name="max_capacity" id="max_capacity" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="starting_price" class="block text-sm font-medium text-gray-700 mb-1">Starting Price (Rp)</label>
                            <input type="number" name="starting_price" id="starting_price" required min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Smoking</label>
                            <div class="flex items-center">
                                <input type="radio" name="is_smoking" id="is_smoking_yes" value="1" class="mr-2">
                                <label for="is_smoking_yes" class="mr-4">Yes</label>
                                
                                <input type="radio" name="is_smoking" id="is_smoking_no" value="0" checked class="mr-2">
                                <label for="is_smoking_no">No</label>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Book Type</label>
                            <div class="flex items-center">
                                <input type="radio" name="book_type" id="book_type_1" value="1" checked class="mr-2">
                                <label for="book_type_1" class="mr-4">Hourly</label>
                                
                                <input type="radio" name="book_type" id="book_type_0" value="0" class="mr-2">
                                <label for="book_type_0">Minimum Order</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                        <input type="file" name="cover_image" id="cover_image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[var(--color-spacehub-dark)] text-base font-medium text-white hover:bg-[var(--color-spacehub)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-spacehub)] sm:ml-3 sm:w-auto sm:text-sm">
                        Create
                    </button>
                    <button type="button" onclick="closeAddRoomModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Table Modal -->
<div id="addTableModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full z-50">
            <form action="{{ route('admin.table.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="workspace_id" value="{{ $workspace->id }}">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Add New Table</h3>
                    
                    <div class="mb-4">
                        <label for="table_name" class="block text-sm font-medium text-gray-700 mb-1">Table Name</label>
                        <input type="text" name="name" id="table_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="table_max_capacity" class="block text-sm font-medium text-gray-700 mb-1">Maximum Capacity</label>
                            <input type="number" name="max_capacity" id="table_max_capacity" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="table_starting_price" class="block text-sm font-medium text-gray-700 mb-1">Starting Price (Rp)</label>
                            <input type="number" name="starting_price" id="table_starting_price" required min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Smoking</label>
                            <div class="flex items-center">
                                <input type="radio" name="is_smoking" id="table_is_smoking_yes" value="1" class="mr-2">
                                <label for="table_is_smoking_yes" class="mr-4">Yes</label>
                                
                                <input type="radio" name="is_smoking" id="table_is_smoking_no" value="0" checked class="mr-2">
                                <label for="table_is_smoking_no">No</label>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Book Type</label>
                            <div class="flex items-center">
                                <input type="radio" name="book_type" id="table_book_type_1" value="1" checked class="mr-2">
                                <label for="table_book_type_1" class="mr-4">Hourly</label>
                                
                                <input type="radio" name="book_type" id="table_book_type_0" value="0" class="mr-2">
                                <label for="table_book_type_0">Minimum Order</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="table_cover_image" class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                        <input type="file" name="cover_image" id="table_cover_image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[var(--color-spacehub-dark)] text-base font-medium text-white hover:bg-[var(--color-spacehub)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-spacehub)] sm:ml-3 sm:w-auto sm:text-sm">
                        Create
                    </button>
                    <button type="button" onclick="closeAddTableModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Room Modal -->
<div id="editRoomModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full z-50">
            <form id="editRoomForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="workspace_id" value="{{ $workspace->id }}">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Room</h3>
                    
                    <div class="mb-4">
                        <label for="edit_room_name" class="block text-sm font-medium text-gray-700 mb-1">Room Name</label>
                        <input type="text" name="name" id="edit_room_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="edit_room_max_capacity" class="block text-sm font-medium text-gray-700 mb-1">Maximum Capacity</label>
                            <input type="number" name="max_capacity" id="edit_room_max_capacity" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="edit_room_starting_price" class="block text-sm font-medium text-gray-700 mb-1">Starting Price (Rp)</label>
                            <input type="number" name="starting_price" id="edit_room_starting_price" required min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Smoking</label>
                            <div class="flex items-center">
                                <input type="radio" name="is_smoking" id="edit_room_is_smoking_yes" value="1" class="mr-2">
                                <label for="edit_room_is_smoking_yes" class="mr-4">Yes</label>
                                
                                <input type="radio" name="is_smoking" id="edit_room_is_smoking_no" value="0" class="mr-2">
                                <label for="edit_room_is_smoking_no">No</label>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Book Type</label>
                            <div class="flex items-center">
                                <input type="radio" name="book_type" id="edit_room_book_type_1" value="1" class="mr-2">
                                <label for="edit_room_book_type_1" class="mr-4">Hourly</label>
                                
                                <input type="radio" name="book_type" id="edit_room_book_type_0" value="0" class="mr-2">
                                <label for="edit_room_book_type_0">Minimum Order</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="edit_room_cover_image" class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                        <input type="file" name="cover_image" id="edit_room_cover_image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[var(--color-spacehub-dark)] text-base font-medium text-white hover:bg-[var(--color-spacehub)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-spacehub)] sm:ml-3 sm:w-auto sm:text-sm">
                        Update
                    </button>
                    <button type="button" onclick="closeEditRoomModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Table Modal -->
<div id="editTableModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full z-50">
            <form id="editTableForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="workspace_id" value="{{ $workspace->id }}">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Table</h3>
                    
                    <div class="mb-4">
                        <label for="edit_table_name" class="block text-sm font-medium text-gray-700 mb-1">Table Name</label>
                        <input type="text" name="name" id="edit_table_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="edit_table_max_capacity" class="block text-sm font-medium text-gray-700 mb-1">Maximum Capacity</label>
                            <input type="number" name="max_capacity" id="edit_table_max_capacity" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="edit_table_starting_price" class="block text-sm font-medium text-gray-700 mb-1">Starting Price (Rp)</label>
                            <input type="number" name="starting_price" id="edit_table_starting_price" required min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Smoking</label>
                            <div class="flex items-center">
                                <input type="radio" name="is_smoking" id="edit_table_is_smoking_yes" value="1" class="mr-2">
                                <label for="edit_table_is_smoking_yes" class="mr-4">Yes</label>
                                
                                <input type="radio" name="is_smoking" id="edit_table_is_smoking_no" value="0" class="mr-2">
                                <label for="edit_table_is_smoking_no">No</label>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Book Type</label>
                            <div class="flex items-center">
                                <input type="radio" name="book_type" id="edit_table_book_type_1" value="1" class="mr-2">
                                <label for="edit_table_book_type_1" class="mr-4">Hourly</label>
                                
                                <input type="radio" name="book_type" id="edit_table_book_type_0" value="0" class="mr-2">
                                <label for="edit_table_book_type_0">Minimum Order</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="edit_table_cover_image" class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                        <input type="file" name="cover_image" id="edit_table_cover_image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[var(--color-spacehub-dark)] text-base font-medium text-white hover:bg-[var(--color-spacehub)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-spacehub)] sm:ml-3 sm:w-auto sm:text-sm">
                        Update
                    </button>
                    <button type="button" onclick="closeEditTableModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Confirm delete workspace
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the workspace and all associated rooms and tables. This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--color-spacehub-dark)',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create and submit form for delete
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/workspace/${id}`;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // Remove image
    function removeImage(workspaceId, imageIndex) {
        Swal.fire({
            title: 'Delete image?',
            text: "This image will be permanently removed",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--color-spacehub-dark)',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/workspace/${workspaceId}/image/${imageIndex}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }
        });
    }

    // Remove description image
    function removeDescriptionImage(workspaceId, imageIndex) {
        Swal.fire({
            title: 'Delete image?',
            text: "This image will be permanently removed",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--color-spacehub-dark)',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/workspace/${workspaceId}/description-image/${imageIndex}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }
        });
    }

    // Open edit modal
    function openEditModal(id) {
        // Redirect to workspace edit page or show modal
        // For now, we'll use a simple redirect
        window.location.href = `/admin/workspace/${id}/edit`;
        
        // If you want to implement a modal instead, uncomment this
        /*
        fetch(`/admin/workspace/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_name').value = data.name;
                document.getElementById('edit_description').value = data.description || '';
                // Populate other fields
                
                // Show modal
                document.getElementById('editModal').classList.remove('hidden');
            });
        */
    }

    // Add room modal functions
    function openAddRoomModal() {
        document.getElementById('addRoomModal').classList.remove('hidden');
    }
    
    function closeAddRoomModal() {
        document.getElementById('addRoomModal').classList.add('hidden');
    }
    
    // Add table modal functions
    function openAddTableModal() {
        document.getElementById('addTableModal').classList.remove('hidden');
    }
    
    function closeAddTableModal() {
        document.getElementById('addTableModal').classList.add('hidden');
    }

    // Confirm delete room
    function confirmDeleteRoom(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the room. This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--color-spacehub-dark)',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create and submit form for delete
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/room/${id}`;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // Open edit room modal
    function openEditRoomModal(id) {
        fetch(`/admin/room/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_room_name').value = data.name;
                document.getElementById('edit_room_max_capacity').value = data.max_capacity;
                document.getElementById('edit_room_starting_price').value = data.starting_price;
                
                // Set radio buttons
                if (data.is_smoking) {
                    document.getElementById('edit_room_is_smoking_yes').checked = true;
                } else {
                    document.getElementById('edit_room_is_smoking_no').checked = true;
                }
                
                if (data.book_type) {
                    document.getElementById('edit_room_book_type_1').checked = true;
                } else {
                    document.getElementById('edit_room_book_type_0').checked = true;
                }
                
                // Set form action
                document.getElementById('editRoomForm').action = `/admin/room/${id}`;
                
                // Show modal
                document.getElementById('editRoomModal').classList.remove('hidden');
            });
    }

    function closeEditRoomModal() {
        document.getElementById('editRoomModal').classList.add('hidden');
    }

    // Confirm delete table
    function confirmDeleteTable(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the table. This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--color-spacehub-dark)',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create and submit form for delete
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/table/${id}`;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // Open edit table modal
    function openEditTableModal(id) {
        fetch(`/admin/table/${id}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_table_name').value = data.name;
                document.getElementById('edit_table_max_capacity').value = data.max_capacity;
                document.getElementById('edit_table_starting_price').value = data.starting_price;
                
                // Set radio buttons
                if (data.is_smoking) {
                    document.getElementById('edit_table_is_smoking_yes').checked = true;
                } else {
                    document.getElementById('edit_table_is_smoking_no').checked = true;
                }
                
                if (data.book_type) {
                    document.getElementById('edit_table_book_type_1').checked = true;
                } else {
                    document.getElementById('edit_table_book_type_0').checked = true;
                }
                
                // Set form action
                document.getElementById('editTableForm').action = `/admin/table/${id}`;
                
                // Show modal
                document.getElementById('editTableModal').classList.remove('hidden');
            });
    }

    function closeEditTableModal() {
        document.getElementById('editTableModal').classList.add('hidden');
    }
</script>

@endsection