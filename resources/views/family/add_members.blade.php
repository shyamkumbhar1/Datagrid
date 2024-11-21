@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Family Members</h2>

    <!-- Step 2: Family Members Information -->
    <form action="{{ route('family.storeMembers') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="family_head_id" value="{{ $familyHeadId }}">

        <div id="family-members">
            <!-- First Family Member -->
            <div class="family-member-form-group" id="family-member-0">
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
        </div>

        <button type="button" class="btn btn-secondary" id="add-member-btn">Add Another Family Member</button>
        <button type="submit" class="btn btn-primary">Submit Family Members</button>
    </form>
</div>

@push('scripts')
<script>
    let memberCount = 1;

    document.getElementById('add-member-btn').addEventListener('click', function () {
        const container = document.getElementById('family-members');

        // Create new member form
        const newMemberForm = document.createElement('div');
        newMemberForm.classList.add('family-member-form-group');
        newMemberForm.id = `family-member-${memberCount}`;

        newMemberForm.innerHTML = `
            <div class="form-group">
                <label for="family_members[${memberCount}][name]">Name:</label>
                <input type="text" class="form-control" name="family_members[${memberCount}][name]" required>
            </div>
            <div class="form-group">
                <label for="family_members[${memberCount}][birthdate]">Birthdate:</label>
                <input type="date" class="form-control" name="family_members[${memberCount}][birthdate]" required>
            </div>
            <div class="form-group">
                <label for="family_members[${memberCount}][marital_status]">Marital Status:</label>
                <select class="form-control" name="family_members[${memberCount}][marital_status]" required>
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                </select>
            </div>
            <div class="form-group">
                <label for="family_members[${memberCount}][education]">Education:</label>
                <input type="text" class="form-control" name="family_members[${memberCount}][education]" required>
            </div>
            <div class="form-group">
                <label for="family_members[${memberCount}][photo]">Photo:</label>
                <input type="file" class="form-control" name="family_members[${memberCount}][photo]">
            </div>
        `;

        container.appendChild(newMemberForm);
        memberCount++;
    });
</script>
@endpush

@endsection
