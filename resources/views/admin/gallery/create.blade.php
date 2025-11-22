@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black text-white p-4 md:p-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center mb-2">
                <a href="{{ route('admin.gallery.index') }}" 
                   class="text-indigo-400 hover:text-indigo-300 transition-colors duration-200 mr-3">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="text-3xl font-bold">Add Gallery Product</h1>
            </div>
            <p class="text-gray-400">Fill in the details below to add a new product to your gallery</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 bg-red-900 bg-opacity-50 border border-red-700 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-400 mt-0.5 mr-3"></i>
                    <div>
                        <h3 class="text-red-300 font-medium mb-2">Please fix the following errors:</h3>
                        <ul class="list-disc list-inside text-red-200 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Success Message (if needed) -->
        @if(session('success'))
            <div class="mb-6 bg-green-900 bg-opacity-50 border border-green-700 rounded-lg p-4">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 mr-3"></i>
                    <p class="text-green-200">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.gallery.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="bg-gray-900 rounded-lg shadow-xl p-6 md:p-8">
            @csrf

            <!-- Product Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium mb-2">
                    Product Name <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       required
                       value="{{ old('name') }}"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                       placeholder="Enter product name">
                @error('name')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium mb-2">
                    Description
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="4"
                          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200 resize-none"
                          placeholder="Enter product description">{{ old('description') }}</textarea>
                <p class="mt-2 text-sm text-gray-400">
                    <span id="charCount">0</span> / 500 characters
                </p>
                @error('description')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium mb-2">
                    Product Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed rounded-lg hover:border-indigo-500 transition-colors duration-200">
                    <div class="space-y-1 text-center">
                        <div id="imagePreview" class="mb-4 hidden">
                            <img src="" alt="Preview" class="mx-auto h-32 w-32 object-cover rounded-lg">
                        </div>
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-500 mb-3"></i>
                        <div class="flex text-sm text-gray-400">
                            <label for="image" 
                                   class="relative cursor-pointer bg-indigo-600 rounded-md font-medium text-white hover:bg-indigo-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input id="image" 
                                       name="image" 
                                       type="file" 
                                       accept="image/*"
                                       class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                </div>
                @error('image')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Additional Options -->
            <div class="mb-6">
                <label class="block text-sm font-medium mb-2">
                    Additional Options
                </label>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="featured" 
                               value="1"
                               class="h-4 w-4 bg-gray-800 border-gray-600 rounded focus:ring-indigo-500 focus:ring-2">
                        <span class="ml-2 text-sm">Feature this product</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="active" 
                               value="1"
                               checked
                               class="h-4 w-4 bg-gray-800 border-gray-600 rounded focus:ring-indigo-500 focus:ring-2">
                        <span class="ml-2 text-sm">Make product active</span>
                    </label>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4">
                <button type="submit" 
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    <i class="fas fa-plus mr-2"></i>
                    Add Product
                </button>
                <a href="{{ route('admin.gallery.index') }}" 
                   class="flex-1 bg-gray-700 hover:bg-gray-600 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 text-center focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Character counter for description
    const descriptionTextarea = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    
    descriptionTextarea.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count;
        
        if (count > 500) {
            this.value = this.value.substring(0, 500);
            charCount.textContent = 500;
        }
    });

    // Image preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = imagePreview.querySelector('img');
    
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('hidden');
        }
    });

    // Drag and drop functionality
    const dropZone = document.querySelector('.border-dashed');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });
    
    function highlight(e) {
        dropZone.classList.add('border-indigo-500');
    }
    
    function unhighlight(e) {
        dropZone.classList.remove('border-indigo-500');
    }
    
    dropZone.addEventListener('drop', handleDrop, false);
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        if (files.length > 0) {
            imageInput.files = files;
            const event = new Event('change', { bubbles: true });
            imageInput.dispatchEvent(event);
        }
    }
</script>
@endsection