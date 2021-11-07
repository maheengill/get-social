<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h2 class="font-bold text-xl mb-3">Upcoming events</h2>
                    
                    @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                    @endif

                    @foreach ($events as $event)

                    <article>

                        <h2 class="font-bold text-l mt-2"><a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a></h2>
                        <p>{{ $event->description }}</p>
                        <p>Start time: {{ $event->start_time }}</p>

                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            
                            <x-nav-link class="btn btn-blue" href="{{ route('events.show', $event->id) }}">Show</x-nav-link>

                            @if(Auth()->user()->user_type == 1)
                            <x-nav-link class="btn btn-blue" href="{{ route('events.edit', $event->id) }}">Edit</x-nav-link>

                            @csrf
                            @method('DELETE')

                            <x-button type="submit" class="btn btn-red">Delete</x-button>
                            @endif

                        </form>

                    </article>

                    @endforeach

                    {{ $events->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


