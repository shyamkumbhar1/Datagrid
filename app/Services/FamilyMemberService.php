<?php
namespace App\Services;

use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberService
{
    public function storeFamilyMembers(Request $request)
    {
        foreach ($request->family_members as $index => $member) {
            $familyMember = new FamilyMember();
            $familyMember->family_head_id = $request->family_head_id;
            $familyMember->name = $member['name'];
            $familyMember->birthdate = $member['birthdate'];

            if ($request->hasFile("family_members.$index.photo")) {
                $file = $request->file("family_members.$index.photo");
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('family_photos', $filename, 'public');
                $familyMember->photo = $path;
            }

            $familyMember->save();
        }
    }
}




?>