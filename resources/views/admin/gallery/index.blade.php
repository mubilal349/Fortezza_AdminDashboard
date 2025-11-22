@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 ml-0 md:ml-64">
    <div class="px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <h1 class="text-3xl font-bold mb-4 md:mb-0">Gallery Products</h1>
            <a href="{{ route('admin.gallery.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-plus mr-2"></i>
                Add New Product
            </a>
        </div>

        <!-- Search and Filter Section -->
        <div class="mb-6 flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <input type="text" 
                       placeholder="Search products..." 
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 pl-10 focus:outline-none focus:border-indigo-500">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <div class="flex gap-2">
                <select class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500">
                    <option>All Categories</option>
                    <option>Category 1</option>
                    <option>Category 2</option>
                </select>
                <button class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-filter"></i>
                </button>
            </div>
        </div>

        <!-- Products Table - Desktop View -->
        <div class="hidden md:block overflow-x-auto bg-gray-900 rounded-lg shadow-lg">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left py-4 px-6 font-medium">Name</th>
                        <th class="text-left py-4 px-6 font-medium">Description</th>
                        <th class="text-left py-4 px-6 font-medium">Image</th>
                        <th class="text-left py-4 px-6 font-medium">Status</th>
                        <th class="text-left py-4 px-6 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors duration-150">
                        <td class="py-4 px-6">{{ $product->name }}</td>
                        <td class="py-4 px-6">{{ Str::limit($product->description, 100) }}</td>
                        <td class="py-4 px-6">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 bg-gray-800 rounded flex items-center justify-center">
                                    <i class="fas fa-image text-gray-600"></i>
                                </div>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                         {{ $product->status === 'active' ? 'bg-green-900 text-green-300' : 'bg-gray-700 text-gray-300' }}">
                                {{ $product->status ?? 'Active' }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.gallery.edit', $product->id) }}" 
                                   class="text-indigo-400 hover:text-indigo-300 transition-colors duration-150">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete({{ $product->id }})" 
                                        class="text-red-400 hover:text-red-300 transition-colors duration-150">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-400">
                            No products found. <a href="{{ route('admin.gallery.create') }}" class="text-indigo-400 hover:text-indigo-300">Add your first product</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Products Grid - Mobile View -->
        <div class="md:hidden grid grid-cols-1 gap-4">
            @forelse($products as $product)
            <div class="bg-gray-900 rounded-lg p-4 shadow-lg">
                <div class="flex items-start space-x-4">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-20 h-20 object-cover rounded">
                    @else
                        <div class="w-20 h-20 bg-gray-800 rounded flex items-center justify-center">
                            <i class="fas fa-image text-gray-600 text-xl"></i>
                        </div>
                    @endif
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg mb-1">{{ $product->name }}</h3>
                        <p class="text-gray-400 text-sm mb-2">{{ Str::limit($product->description, 80) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                         {{ $product->status === 'active' ? 'bg-green-900 text-green-300' : 'bg-gray-700 text-gray-300' }}">
                                {{ $product->status ?? 'Active' }}
                            </span>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.gallery.edit', $product->id) }}" 
                                   class="text-indigo-400 hover:text-indigo-300 transition-colors duration-150">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete({{ $product->id }})" 
                                        class="text-red-400 hover:text-red-300 transition-colors duration-150">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-gray-900 rounded-lg p-8 text-center text-gray-400">
                <i class="fas fa-box-open text-4xl mb-4"></i>
                <p>No products found.</p>
                <a href="{{ route('admin.gallery.create') }}" class="text-indigo-400 hover:text-indigo-300 mt-2 inline-block">
                    Add your first product
                </a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($products, 'links'))
        <div class="mt-8 flex justify-center">
            {{ $products->links() }}
        </div>
        @endif
    </div>
</div>

<script>
    function confirmDelete(productId) {
        if (confirm('Are you sure you want to delete this product?')) {
            // Create a form to submit the delete request
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/gallery/${productId}`;
            
            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);
            
            // Add method override for DELETE
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);
            
            // Submit the form
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection