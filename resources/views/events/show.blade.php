<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Showing event: ') }}
            {{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="pageHeader">
                                            
                    <p>{{ $event->description }}</p>
                    <p>Venue: {{ $event->venue }}</p>
                    <p>Start time: {{ $event->start_time }}</p>
                    <p>End time: {{ $event->end_time }}</p>
                    <p>Event capacity: {{ $event->capacity }}</p>


                    <form method="POST" action="/booking">
                        @csrf
                        <input type="hidden" name="event_id" value="{{$event->id}}"/>
                        <x-button type="submit">BOOK</x-button>
                    </form>

                    @if(Auth()->user()->user_type == 1)
                    <form action="{{ route('events.edit', $event->id) }}">
                        <x-button type="submit">Edit</x-button>
                    </form>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                        <x-button type="submit">Delete</x-button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

