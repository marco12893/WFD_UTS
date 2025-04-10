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

    <div class="mx-8">
        <div class="flex justify-between border-b-1 py-4">
            <div class="font-bold text-2xl">
                Ticket Details for
            </div>
            <div class="text-lg font-bold">{{count($tickets)}} passengers • {{$boardingCount}} boardings</div>
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

    <div class="mb-4 mx-8">
        <h3 class="font-bold text-lg">Passengers list</h3>
    </div>
@if($tickets->isEmpty())
<div class="text-center py-8">
    <p class="text-gray-500">No passengers found for this flight</p>
    <a href="{{ route('book', $flight->id) }}" class="text-blue-500 hover:underline">Book a ticket</a>
</div>
@else
<table class="m-2 border-separate border-spacing-y-2 mx-8">
    <thead>
        <tr class="text-left">
            <th>
                No.
            </th>
            <th>
                Passanger Name
            </th>
            <th>
                Passenger Phone
            </th>
            <th>
                Seat Number
            </th>
            <th>
                Boarding
            </th>
            <th>
                Delete
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
            <tr class="mx-4">
                <td>
                    {{$ticket->id}}
                </td>
                <td>
                    {{$ticket->passanger_name}}
                </td>
                <td>
                    {{$ticket->passenger_phone}}
                </td>
                <td>
                    {{$ticket->seat_number}}
                </td>
                <td>
                    <form action="{{route('board',$ticket->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($ticket->is_boarding == true)
                        {{$ticket->boarding_time}}
                        @else
                            <button type="submit" class="rounded-2xl bg-gray-500 font-bold p-2 hover:bg-gray-600">
                                Confirm
                            </button>
                        @endif
                    </form>
                </td>
                <td>
                    <form action="{{route('delete', $ticket->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if ($ticket->is_boarding == true)
                            <button disabled type="submit" class="rounded-2xl bg-gray-100 font-extralight p-2">
                                Delete                        
                            </button>
                        @else
                            <button type="submit" class="rounded-2xl bg-gray-500 font-bold p-2 hover:bg-gray-600">
                                Delete 
                            </button>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
<div class="flex justify-center">
    <button class="rounded-2xl bg-gray-400 font-bold p-2 hover:bg-gray-500 px-6">
        <a href="{{route('index')}}">Back</a>
    </button>
</div>
@endsection