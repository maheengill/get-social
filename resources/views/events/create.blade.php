<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 leading-tight">
            {{ __('Create event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-white-200">

                    <p>Enter the event details.</p>
                    <p class="text-xs">All fields are required.</p>
                    
                    @if(Auth()->user()->user_type == 1)
                    
                    <form action="{{ route('events.store') }}" method="POST">

                        @csrf

                        <div class=" my-10">

                            <x-label for="name">Name:</x-label>
                            <input type="text" name="name" id="name" class=" p-2 bg-white-200 @error('name') is-invalid @enderror" />

                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                        </div>

                        <div class=" my-10">

                            <x-label for="description">Description:</x-label>
                            <textarea name="description" id="description" row="5" class=" p-2 bg-white-200 @error('description') is-invalid @enderror"></textarea>

                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class=" my-10">

                            <x-label for="venue">Venue:</x-label>
                            <textarea name="venue" id="venue" row="5" class=" p-2 bg-white-200 @error('venue') is-invalid @enderror"></textarea>

                            @error('venue')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class=" my-10">

                            <x-label for="start_time">Start time:</x-label>
                            <input type="datetime-local" name="start_time""></input>

                            @error('start_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class=" my-10">

                            <x-label for="end_time">End time:</x-label>
                            <input type="datetime-local" name="end_time"></input>

                            @error('end_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class=" my-10">

                            <x-label for="capacity">Capacity:</x-label>
                            <textarea name="capacity" id="capacity" row="5" class=" p-2 bg-white-200 @error('capacity') is-invalid @enderror"></textarea>

                            @error('capacity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <x-button type="submit" class="btn btn-blue">Create</x-button>

                    </form>

                    @else 
                    <p>You are not authorised to create an event</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
