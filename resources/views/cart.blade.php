<x-app-layout>
    <div class="text-white">
        <x-form-layout>
            <a class="p-2 m-11 bg-slate-950  rounded-lg hover:bg-slate-300" href="{{ route('dashboard') }}"> Buy
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
                    <p class=" p-2"> price(in rs) </p>
                </div>
            </div>
            @foreach ($products as $product)
            @if (auth()->user()->id === $product->cart)
            <p class="p-2"> {{ $product->title }} </p>
            <p class="p-2"> {{ $product->description }} </p>
            <p class="p-2"> {{ $product->created_at->diffForHumans() }} </p>
            <p class="p-2 ">Rs. {{ $product->price }} </p>
            @endif
            @endforeach
        </x-form-layout>

    </div>
</x-app-layout>
