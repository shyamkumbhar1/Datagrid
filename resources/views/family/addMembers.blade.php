<!-- resources/views/family/add_members.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Family Members</h2>

    <!-- Step 2: Family Members Information -->
    <form action="{{ route('family.storeMembers') }}" method="POST">
        @csrf
        <input type="hidden" name="family_head_id" value="{{ $familyHeadId }}">

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

        <button type="submit" class="btn btn-primary">Submit Family Members</button>
    </form>
</div>
@endsection
