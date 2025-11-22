@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Product</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update product information</p>
                </div>
                <a href="{{ route('products.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="p-6 sm:p-8 space-y-6">
                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Product Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name"
                               name="name" 
                               value="{{ old('name', $product->name) }}"
                               class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                               placeholder="Enter product name"
                               required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Price <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-gray-400 font-medium">$</span>
                            <input type="number" 
                                   id="price"
                                   name="price" 
                                   value="{{ old('price', $product->price) }}"
                                   step="0.01"
                                   min="0"
                                   class="w-full pl-8 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                   placeholder="0.00"
                                   required>
                        </div>
                        @error('price')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Product Image
                        </label>
                        
                        <!-- Current Image Display -->
                        @if($product->image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Current Image:</p>
                            <div class="relative inline-block">
                                <img src="{{ asset('uploads/products/'.$product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="h-32 w-32 object-cover rounded-lg border-2 border-gray-300 dark:border-gray-600 shadow-sm">
                                <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 rounded-lg transition-all duration-200 flex items-center justify-center">
                                    <span class="text-white text-xs font-medium opacity-0 hover:opacity-100 transition-opacity duration-200">Current</span>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Upload New Image -->
                        <div class="flex items-center justify-center w-full">
                            <label for="image" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Click to upload new image</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or WEBP (MAX. 2MB)</p>
                                    @if($product->image)
                                    <p class="text-xs text-blue-600 dark:text-blue-400 mt-2">Leave empty to keep current image</p>
                                    @endif
                                </div>
                                <input id="image" 
                                       name="image" 
                                       type="file" 
                                       class="hidden" 
                                       accept="image/*"
                                       onchange="previewImage(event)">
                            </label>
                        </div>
                        
                        <!-- New Image Preview -->
                        <div id="imagePreview" class="mt-4 hidden">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">New Image Preview:</p>
                            <div class="relative inline-block">
                                <img id="preview" class="h-32 w-32 object-cover rounded-lg border-2 border-blue-500 dark:border-blue-400 shadow-sm" src="" alt="Preview">
                                <button type="button" 
                                        onclick="removeImage()"
                                        class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 transition-colors duration-200 shadow-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">
                            Description
                        </label>
                        <textarea id="description"
                                  name="description" 
                                  rows="4"
                                  class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                  placeholder="Enter product description...">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 sm:px-8 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <span class="text-red-500">*</span> Required fields
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('products.index') }}" 
                           class="px-6 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200 text-center">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 inline-flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Product
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Delete Product Section -->
        <div class="mt-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-red-200 dark:border-red-900/50 overflow-hidden">
            <div class="p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-red-600 dark:text-red-400">Danger Zone</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Permanently delete this product from your inventory</p>
                    </div>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('imagePreview').classList.add('hidden');
    document.getElementById('preview').src = '';
}
</script>
@endsection