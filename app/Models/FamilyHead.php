<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyHead extends Model
{
    use HasFactory;

    protected $table = 'family_heads';

    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'mobile_no',
        'address',
        'state',
        'city',
        'pincode',
        'marital_status',
        'wedding_date',
        'hobbies',
        'photo',
    ];

    // Define the relationship with FamilyMember
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function getFamilyMembersCountAttribute()
    {
        return $this->familyMembers()->count();
    }
}
