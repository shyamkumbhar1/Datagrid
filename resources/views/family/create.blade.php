@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Family</h2>

    <!-- Step 1: Family Head Information -->
    <form action="{{ route('family.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h4>Family Head Information</h4>

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Surname -->
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}" required>
            @error('surname') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Birthdate -->
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
            @error('birthdate') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Mobile Number -->
        <div class="form-group">
            <label for="mobile_no">Mobile Number:</label>
            <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{ old('mobile_no') }}" required>
            @error('mobile_no') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
            @error('address') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- State -->
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" required>
            @error('state') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- City -->
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
            @error('city') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Pincode -->
        <div class="form-group">
            <label for="pincode">Pincode:</label>
            <input type="text" class="form-control" id="pincode" name="pincode" value="{{ old('pincode') }}" required>
            @error('pincode') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Marital Status -->
        <div class="form-group">
            <label for="marital_status">Marital Status:</label>
            <select class="form-control" id="marital_status" name="marital_status" required>
                <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="Unmarried" {{ old('marital_status') == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
            </select>
            @error('marital_status') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Wedding Date -->
        <div class="form-group">
            <label for="wedding_date">Wedding Date:</label>
            <input type="date" class="form-control" id="wedding_date" name="wedding_date" value="{{ old('wedding_date') }}">
            @error('wedding_date') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Hobbies -->
        <div class="form-group">
        <label for="hobbies">Hobbies:</label>
        <div id="hobbies-container">
            <input type="text" class="form-control mb-2" id="hobbies" name="hobbies[]" value="{{ old('hobbies.0') }}">
        </div>
        <button type="button" class="btn btn-secondary" onclick="addHobby()">Add Another Hobby</button>
        @error('hobbies')
            <div class="text-danger">{{ $message }}</div> 
        @enderror
        </div>

        <!-- Photo -->
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control" id="photo" name="photo" required>
            @error('photo') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Next: Add Family Members</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function addHobby() {
        const container = document.getElementById('hobbies-container');
        const inputCount = container.querySelectorAll('input').length;
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.className = 'form-control mb-2';
        newInput.name = `hobbies[${inputCount}]`;
        container.appendChild(newInput);
    }
</script>
@endpush
