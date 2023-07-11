<x-app-layout>
    <div class="text-white">
        <x-form-layout>
            <a class="p-2 m-11 bg-slate-950  rounded-lg hover:bg-slate-300" href="{{ route('product.create') }}">Add
                product</a>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="flex justify-between w-full bg-slate-900 rounded-xl px-2">
                <div class=" basis-2/5">
                    <p class=" p-2"> Title </p>
                </div>
                <div class=" basis-2/5 ">
                    <p class=" p-2 "> Time </p>
                </div>
                <div class=" basis-1/5">
                    <p class=" p-2"> price <br> (in rs) </p>
                </div>
            </div>
            @foreach ($products as $product)
                @if (auth()->user()->isAdmin)
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
                @else
                    @if (auth()->user()->id === $product->user_id)
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
                    @endif
                @endif
            @endforeach
        </x-form-layout>

    </div>
</x-app-layout>
