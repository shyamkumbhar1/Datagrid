<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $table = 'family_members';

    protected $fillable = [
        'family_head_id',
        'name',
        'relation',
        'birthdate',
        'marital_status',
        'wedding_date',
        'education',
        'photo',
    ];

    // Define the relationship with FamilyHead
    public function familyHead()
    {
        return $this->belongsTo(FamilyHead::class);
    }
}
