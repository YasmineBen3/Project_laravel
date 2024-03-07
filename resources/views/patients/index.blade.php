@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-4xl font-bold mb-6">Welcome, Patients!</h1>

        <ul>
            @foreach ($patients as $patient)
                <li>{{ $patient->name }}</li>
            @endforeach
        </ul>

        <div class="my-8">
            <h2 class="text-2xl font-bold mb-4">Make an Appointment</h2>
            <form action="{{ route('appointments.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="new_patient">Are you a new patient?</label>
                    <input type="checkbox" id="new_patient" name="new_patient" value="1">
                </div>
                <div id="patient_info_form" class="hidden">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input type="text" id="name" name="name" class="border rounded w-full py-2 px-3 mb-2">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="maladies">Maladies</label>
                    <textarea id="maladies" name="maladies" class="border rounded w-full py-2 px-3 mb-2"></textarea>
                </div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Schedule Appointment
                </button>
            </form>
        </div>
    </div>
@endsection
