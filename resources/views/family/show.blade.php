@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $familyHead->name }} {{ $familyHead->surname }}  Details :</h2>

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
            
            <p><strong>Hobbies:</strong></p>
            <ul>
                @foreach(json_decode($familyHead->hobbies) ?? [] as $hobby)
                    <li>{{ $hobby }}</li>
                @endforeach
            </ul>
        </div>
        
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $familyHead->photo) }}" alt="Family Head Photo" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
        </div>
    </div>

    <h3>Family Members</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Relation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($familyHead->familyMembers as $member)
                <tr>
                    <td>{{ $member->id }}</td> 
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->relation }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
