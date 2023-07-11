<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($products as $product)
                    <td>
                        <a href="{{ route('product.show', $product->id) }}">
                            <div class="flex justify-between w-full hover:bg-slate-700 rounded-xl">
                                <div class=" basis-2/5">
                                    <p class=" p-2">
                                        {{ Str::words($product->title, 1, '') }}
                                    </p>
                                </div>
                                <div class=" basis-2/5">
                                    <p class=" p-2"> {{ $product->created_at->diffForHumans() }} </p>
                                </div>
                                <div class=" basis-1/5 ">
                                    <p class=" p-2 ">{{ $product->price }} </p>
                                </div>
                            </div>
                        </a>
                    </td>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
