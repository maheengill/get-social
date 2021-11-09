<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>
                    @endif

                    @if (count($events) > 0)
                    <h2 class="font-bold text-xl mt-3 mb-4">You have boooked the following events:</h2>
                    <p class="text-xs">Click event name to view details</p>

                    @else
                    <h2 class="font-bold text-xl mt-3 mb-4">You have no events booked currently</h2>
                    <p>View <x-nav-link href="{{ route('events.index')}}">events</x-nav-link>to book</p>
                    
                    @endif

                    @foreach ($events as $event)

                    <h2 class="font-bold text-l mt-4"><a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a></h2>
                    <p>{{ $event->description }}</p>
                    <p>Start time: {{ $event->start_time }}</p>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>