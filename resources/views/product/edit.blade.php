<x-app-layout>
    <x-form-layout>
        <p class=" justify-items-center">Edit product info</p>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action=" {{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <!-- title -->
            <div class="my-4">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" placeholder="Title of Product"
                    name="title" :value="$product->title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- description -->
            <div class="my-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-Textarea id="description" class="block mt-1 w-full" type="text" placeholder="Describe  product"
                    name="description" :value="$product->description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            {{-- img --}}
            <div class="my-4">
                <img class="rounded-md w-2/3  mx-auto" src="{{ "/storage/$product->image" }}">
                <x-input-label for="image" :value="__('Image')" />
                <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" autofocus autocomplete="image" />
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <!-- price -->
            <div class="my-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" placeholder="price of Product"
                    name="price" :value="$product->price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <!-- button -->
            <div class="my-4" class="flex items-center justify-center  mt-4">
                <x-primary-button class="ml-3">
                    {{ __('submit') }}
                </x-primary-button>
            </div>
        </form>

    </x-form-layout>
</x-app-layout>
