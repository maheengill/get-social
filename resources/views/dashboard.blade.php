<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="pageHeader">
                        <div class="container mx-auto">
                            <h1 class="font-bold text-xl mt-2 mb-2">Get Social</h1>
                        </div>
                    </section>

                    <section class="navigation">
                        <div class="container mx-auto">
                            <ul>
                                <li class="mt-1"><a href="/">Home</a></li>
                                <li class="mt-1"><a href="/events">Events</a></li>
                                <li class="mt-1"><a href="/bookings">My Bookings</a></li>

                                @if(Auth()->user()->user_type == 1)
                                <li class="mt-1"><a href="/events/create">Add Event</a></li>
                                @endif
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
