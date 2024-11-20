<!-- resources/views/family/list.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Family List</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Family Members</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($familyHeads as $familyHead)
                <tr>
                    <td>{{ $familyHead->name }} {{ $familyHead->surname }}</td>
                    <td>{{ $familyHead->family_members_count }}</td>
                    <td>
                        <a href="{{ route('family.show', $familyHead->id) }}" class="btn btn-info">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
