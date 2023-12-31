<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="/">
                <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                    </div>
                    <input type="text" name="search"
                        class="h-14 w-full pl-10 pr-20 bg-black text-white bg-opacity-60 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder="Look up what you need" />
                    <div class="absolute top-2 right-2">
                        <button type="submit" class="h-10 w-20 text-white rounded-lg bg-lime-500 hover:bg-lime-700">
                            Search
                        </button>
                    </div>
                </div>
            </form>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid gap-4 grid-cols-5">
                    @foreach ($products as $product)
                        {{-- @if (auth()->user()->id != $product->user_id) --}}
                        <div class="w-full hover:bg-slate-700 bg-gray-900 rounded-xl">
                            <a href="{{ route('product.show', $product->id) }}">
                                @if ($product->image)
                                    <img class="rounded-md h-24 my-3 m-auto" src="{{ "/storage/$product->image" }}" alt>
                                @else
                                    <img class="rounded-md h-20 my-3 mx-auto" src="{{ '/storage/def.png' }}" alt>
                                @endif
                                <div class="flex justify-start">
                                    <p class="p-2">
                                        {{ Str::words($product->title, 2, '') }}
                                    </p>
                                </div>
                                <div class="flex justify-start">
                                    <p class="p-2">
                                        {{ Str::words($product->description, 20, '...') }}
                                    </p>
                                </div>
                                <div class="flex justify-start">
                                    <p class="justify-items-end p-2 ">Rs.{{ $product->price }} </p>
                                </div>
                                <div class="flex justify-start">
                                    <p class=" p-2"> {{ $product->created_at->diffForHumans() }} </p>
                                </div>
                                <form action="{{ route('product.update',$product->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="cart" value="$user->id"/>
                                    <x-primary-button class="ml-3">
                                        buy
                                    </x-primary-button>
                                    </form>
                            </a>
                        </div>
                        {{-- @endif --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
