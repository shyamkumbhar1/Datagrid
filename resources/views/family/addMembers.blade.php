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
                    <input type="text" class="form-control" name="family_members[0][name]" value="{{ old('family_members.0.name') }}" required>
                    @error('family_members.0.name') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="family_members[0][relation]">Relation:</label>
                    <select class="form-control" name="family_members[0][relation]" required>
                        <option value="Father" {{ old('family_members.0.relation') == 'Father' ? 'selected' : '' }}>Father</option>
                        <option value="Mother" {{ old('family_members.0.relation') == 'Mother' ? 'selected' : '' }}>Mother</option>
                        <option value="Brother" {{ old('family_members.0.relation') == 'Brother' ? 'selected' : '' }}>Brother</option>
                        <option value="Sister" {{ old('family_members.0.relation') == 'Sister' ? 'selected' : '' }}>Sister</option>
                        <option value="Spouse" {{ old('family_members.0.relation') == 'Spouse' ? 'selected' : '' }}>Spouse</option>
                        <option value="Other" {{ old('family_members.0.relation') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('family_members.0.relation') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="family_members[0][birthdate]">Birthdate:</label>
                    <input type="date" class="form-control" name="family_members[0][birthdate]" value="{{ old('family_members.0.birthdate') }}" required>
                    @error('family_members.0.birthdate') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="family_members[0][marital_status]">Marital Status:</label>
                    <select class="form-control" name="family_members[0][marital_status]" required>
                        <option value="Married" {{ old('family_members.0.marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="Unmarried" {{ old('family_members.0.marital_status') == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
                    </select>
                    @error('family_members.0.marital_status') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group" id="wedding-date-container" style="display: none;">
                    <label for="wedding_date">Wedding Date:</label>
                    <input type="date" class="form-control" id="wedding_date" name="wedding_date" value="{{ old('wedding_date') }}">
                    @error('wedding_date') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="family_members[0][education]">Education:</label>
                    <input type="text" class="form-control" name="family_members[0][education]" value="{{ old('family_members.0.education') }}" required>
                    @error('family_members.0.education') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="family_members[0][photo]">Photo:</label>
                    <input type="file" class="form-control" name="family_members[0][photo]">
                    @error('family_members.0.photo') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
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
                <input type="text" class="form-control" name="family_members[${memberCount}][name]" value="{{ old('family_members.${memberCount}.name') }}" required>
                @error('family_members.${memberCount}.name') 
                    <div class="text-danger">{{ $message }}</div> 
                @enderror
            </div>
            <div class="form-group">
                <label for="family_members[${memberCount}][birthdate]">Birthdate:</label>
                <input type="date" class="form-control" name="family_members[${memberCount}][birthdate]" value="{{ old('family_members.${memberCount}.birthdate') }}" required>
                @error('family_members.${memberCount}.birthdate') 
                    <div class="text-danger">{{ $message }}</div> 
                @enderror
            </div>
            <div class="form-group">
                <label for="family_members[${memberCount}][marital_status]">Marital Status:</label>
                <select class="form-control" name="family_members[${memberCount}][marital_status]" required>
                    <option value="Married" {{ old('family_members.${memberCount}.marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                    <option value="Unmarried" {{ old('family_members.${memberCount}.marital_status') == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
                </select>
                @error('family_members.${memberCount}.marital_status') 
                    <div class="text-danger">{{ $message }}</div> 
                @enderror
            </div>
            <div class="form-group">
                <label for="family_members[${memberCount}][education]">Education:</label>
                <input type="text" class="form-control" name="family_members[${memberCount}][education]" value="{{ old('family_members.${memberCount}.education') }}" required>
                @error('family_members.${memberCount}.education') 
                    <div class="text-danger">{{ $message }}</div> 
                @enderror
            </div>
            <div class="form-group">
                <label for="family_members[${memberCount}][photo]">Photo:</label>
                <input type="file" class="form-control" name="family_members[${memberCount}][photo]">
                @error('family_members.${memberCount}.photo') 
                    <div class="text-danger">{{ $message }}</div> 
                @enderror
            </div>
        `;

        container.appendChild(newMemberForm);
        memberCount++;
    });
</script>
<script>
    document.querySelector('[name="family_members[0][marital_status]"]').addEventListener('change', function() {
    const weddingDateContainer = document.getElementById('wedding-date-container');
    if (this.value === 'Married') {
        weddingDateContainer.style.display = 'block';
    } else {
        weddingDateContainer.style.display = 'none';
    }
});

</script>

@endpush

@endsection
