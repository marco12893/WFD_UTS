@extends('template.base')
@section('content')
<div class="mx-8">
    <div class="flex justify-between border-b-1 py-4">
        <div class="font-bold text-2xl">
            Ticket Booking for
        </div>
        <div class="font-bold text-2xl">
            {{ $flight->flight_code }}
        </div>
    </div>
    <div class="flex justify-between">
        <div class="flex justify-center">
            <div>{{$flight->origin}}</div> →
            <div>{{$flight->destination}}</div>
        </div>
        <div class="flex justify-center">
            <div class="m-2">
                Departure
            </div>
            <div class="font-bold m-2">
                {{$flight->departure_time->format('l, d F Y, H:i')}}
            </div>
        </div>
        <div class="flex justify-center">
            <div class='m-2'>
                Arrival
            </div>
            <div class="font-bold m-2">
                {{$flight->departure_time->format('l, d F Y, H:i')}}
            </div>
        </div>
    </div>
</div>

<div class="mx-8">
    <form action="{{route('submit')}}" method="POST">
        @csrf
        <input type="hidden" name="flight_id" value="{{ $flight->id }}">
        
        <div class="m-4">
            <label for="passanger_name" class="px-4">Passanger Name</label>
            <input type="text" name="passanger_name" id="passanger_name" value="{{ old('passanger_name') }}" class="bg-gray-300 rounded">
            @error('passanger_name')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="m-4">
            <label for="passenger_phone" class="px-4">Passenger Phone</label>
            <input type="text" name="passenger_phone" id="passenger_phone" value="{{ old('passenger_phone') }}" class="bg-gray-300 rounded">
            @error('passenger_phone')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="m-4">
            <label for="seat_number" class="px-4">Seat Number</label>
            <input type="text" name="seat_number" id="seat_number" value="{{ old('seat_number') }}" class="bg-gray-300 rounded">
            @error('seat_number')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="flex justify-end gap-2">
            <button class="rounded-2xl font-bold bg-gray-300 hover:bg-gray-500 p-2">
                <a href="{{route('index')}}">Cancel</a>
            </button>
            <button type="submit" class="rounded-2xl font-bold bg-gray-400 p-2 hover:bg-gray-500">Book Ticket</button>
        </div>
    </form>
</div>

@endsection