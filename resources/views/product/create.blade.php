<x-app-layout>
    <div class="text-white">
        <x-form-layout>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- title -->
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" placeholder="Title of Product" name="title" :value="old('title')" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-Textarea id="description" class="block mt-1 w-full" type="text" placeholder="Describe  product" name="description" :value="old('description')" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- image -->
                <div class="mt-4">
                    <x-input-label for="image" :value="__('Image')" />
                    <x-file-input id="image" class="block mt-1 w-full" type="file" name="image" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <!-- price -->
                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="text" placeholder="price of Product" name="price" :value="old('price')" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <!-- button -->
                <div class="flex items-center justify-center  mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('submit') }}
                    </x-primary-button>
                </div>
            </form>

        </x-form-layout>

    </div>
</x-app-layout>