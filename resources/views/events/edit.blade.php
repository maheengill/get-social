<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit event: ') }}
            {{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if(Auth()->user()->user_type == 1)
                    
                    <form action="{{ route('events.update', $event->id) }}" method="POST">

                    @csrf

                    @method('PUT')

                    <div class="my-10">

                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="{{ $event->name }}" class=" p-2 bg-gray-200 @error('name') is-invalid @enderror" />

                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="my-10">

                        <label for="description">Description:</label>
                        <textarea name="description" id="description" row="5" class=" p-2 bg-gray-200 @error('description') is-invalid @enderror"> {{ $event->description }}</textarea>

                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class=" my-10">

                        <label for="venue">Venue:</label>
                        <textarea name="venue" id="venue" row="5" class=" p-2 bg-gray-200 @error('venue') is-invalid @enderror"></textarea>

                        @error('venue')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class=" my-10">

                        <label for="start_time">Start_time:</label>
                        <input type="datetime-local" name="start_time""></input>

                        @error('start_time')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class=" my-10">

                        <label for="end_time">End_time:</label>
                        <input type="datetime-local" name="end_time"></input>

                        @error('end_time')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class=" my-10">

                        <label for="capacity">Capacity:</label>
                        <textarea name="capacity" id="capacity" row="5" class=" p-2 bg-gray-200 @error('capacity') is-invalid @enderror"></textarea>

                        @error('capacity')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-blue">Update</button>

                    </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

