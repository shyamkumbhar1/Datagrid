<!-- resources/views/family/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Family</h2>

    <form action="{{ route('family.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Family Head Information -->
        <h4>Family Head Information</h4>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
        </div>
        <div class="form-group">
            <label for="mobile_no">Mobile Number:</label>
            <input type="text" class="form-control" id="mobile_no" name="mobile_no" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="pincode">Pincode:</label>
            <input type="text" class="form-control" id="pincode" name="pincode" required>
        </div>
        <div class="form-group">
            <label for="marital_status">Marital Status:</label>
            <select class="form-control" id="marital_status" name="marital_status" required>
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
            </select>
        </div>
        <div class="form-group">
            <label for="wedding_date">Wedding Date:</label>
            <input type="date" class="form-control" id="wedding_date" name="wedding_date">
        </div>
        <div class="form-group">
            <label for="hobbies">Hobbies:</label>
            <input type="text" class="form-control" id="hobbies" name="hobbies">
        </div>
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <!-- Family Members -->
        <h4>Family Members</h4>
        <div id="family-members">
            <div class="form-group">
                <label for="family_members[0][name]">Name:</label>
                <input type="text" class="form-control" name="family_members[0][name]" required>
            </div>
            <div class="form-group">
                <label for="family_members[0][birthdate]">Birthdate:</label>
                <input type="date" class="form-control" name="family_members[0][birthdate]" required>
            </div>
            <div class="form-group">
                <label for="family_members[0][marital_status]">Marital Status:</label>
                <select class="form-control" name="family_members[0][marital_status]" required>
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                </select>
            </div>
            <div class="form-group">
                <label for="family_members[0][education]">Education:</label>
                <input type="text" class="form-control" name="family_members[0][education]" required>
            </div>
            <div class="form-group">
                <label for="family_members[0][photo]">Photo:</label>
                <input type="file" class="form-control" name="family_members[0][photo]">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
