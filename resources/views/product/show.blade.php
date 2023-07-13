<x-app-layout>
    <x-form-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="text-white h-auto mb-4 px-2 ">
            <div class="rounded-md w-full mx-auto my-4 p-3 bg-white bg-opacity-10">
                @if ($product->image)
                <img class="rounded-md w-full" src="{{ "/storage/$product->image" }}">
                    
                @else
                    
                <img class="rounded-md w-full" src="{{ "/storage/q.png" }}">
                @endif
            </div>
            <p class="p-2"> {{ $product->title }} </p>
            <p class="p-2"> {{ $product->description }} </p>
            <p class="p-2"> {{ $product->created_at->diffForHumans() }} </p>
            <p class="p-2 ">Rs. {{ $product->price }} </p>
            <p class="p-2 ">{{ $product->instock }} </p>
            @if (auth()->user()->id === $product->user_id)
                <div class="flex justify-around mt-10">
                    <x-primary-button>
                        <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                    </x-primary-button>
                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <x-primary-button>
                            delete
                        </x-primary-button>
                    </form>
                    <x-primary-button>
                        <a href="{{ route('product.edit', $product->id) }}">Add stock</a>
                    </x-primary-button>
                </div>
            @endif
            @if (auth()->user()->isAdmin)
                <div class="flex justify-around mt-10">
                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <x-primary-button>
                            remove
                        </x-primary-button>
                    </form>
                </div>
            @endif
        </div>
    </x-form-layout>
</x-app-layout>
