@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-semibold mb-6">Doctor Dashboard</h1>
        <div class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Appointments</h2>

            @if($appointments->count() > 0)
                <ul>
                    @foreach($appointments as $appointment)
                        <li>{{ $appointment->appointment_date }} - {{ $appointment->patient->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>No appointments available.</p>
            @endif
        </div>

        <div>
            <h2 class="text-2xl font-semibold mb-4">Notifications</h2>

            @if($notifications->count() > 0)
                <ul>
                    @foreach($notifications as $notification)
                        <li>{{ $notification->data['message'] }}</li>
                    @endforeach
                </ul>
            @else
                <p>No notifications available.</p>
            @endif
        </div>
    </div>
@endsection
