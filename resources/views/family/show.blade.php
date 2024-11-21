<!-- resources/views/family/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $familyHead->name }} {{ $familyHead->surname }} - Family Details</h2>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Birthdate:</strong> {{ $familyHead->birthdate }}</p>
            <p><strong>Mobile Number:</strong> {{ $familyHead->mobile_no }}</p>
            <p><strong>Address:</strong> {{ $familyHead->address }}</p>
            <p><strong>State:</strong> {{ $familyHead->state }}</p>
            <p><strong>City:</strong> {{ $familyHead->city }}</p>
            <p><strong>Pincode:</strong> {{ $familyHead->pincode }}</p>
            <p><strong>Marital Status:</strong> {{ $familyHead->marital_status }}</p>
            <p><strong>Wedding Date:</strong> {{ $familyHead->wedding_date }}</p>
            <p><strong>Hobbies:</strong> {{ $familyHead->hobbies }}</p>
        </div>
        <div class="col-md-6">
            <!-- <img src="{{ asset('storage/' . $familyHead->photo) }}" alt="Family Head Photo" class="img-fluid"> -->
            <img src="{{ asset('storage/' . $familyHead->photo) }}" alt="Family Head Photo" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">

        </div>
    </div>

    <h3>Family Members12</h3>
    <ul>
        @foreach ($familyHead->familyMembers as $member)
            <li>
                {{ $member->name }} ({{ $member->relation }})
                @if ($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}" alt="Family Member Photo" class="img-thumbnail" width="50">
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
