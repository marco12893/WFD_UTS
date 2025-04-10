@extends('template.base')
@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
@if(session('info'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
        {{ session('info') }}
    </div>
@endif
<div class="grid grid-cols-3 gap-2">
    @foreach($flights as $flight)
        <div class="mx-4 my-2 bg-gray-300 rounded-2xl">
            <div class="flex justify-between">
                <div class="text-2xl font-bold p-2">{{$flight->flight_code}}</div>
                <div class="flex justify-center p-2">
                    <div>{{$flight->origin}}</div> →
                    <div>{{$flight->destination}}</div>
                </div>
            </div>
            <div class="px-2">Departure</div>
            <div class="font-bold px-2">{{$flight->departure_time->format('l, d F Y, H:i')}}</div>
            <div class="px-2">Arrived</div>
            <div class="font-bold px-2">{{$flight->arrival_time->format('l, d F Y, H:i')}}</div>
            <div class="flex justify-between">
                <button class="bg-gray-400 hover:bg-gray-500 ml-4 rounded-4xl p-2">
                    <a href="{{ route('book', $flight->id )}}">Book Ticket</a>
                </button>
                <button class="bg-gray-400 hover:bg-gray-500 mr-4 rounded-4xl p-2">
                    <a href="{{ route('ticket', $flight->id) }}">View Details</a>
                </button>
            </div>
        </div>
    @endforeach
</div>
@endsection