<x-guest-layout>
  <form method="POST" action="{{ route('login.github') }}" class="text-center">
  @csrf
  <x-primary-button class="ml-3">
  {{ __('github') }}
  </x-primary-button>

  </form>
</x-guest-layout>