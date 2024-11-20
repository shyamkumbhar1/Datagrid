<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use Carbon\Carbon;

class FamilyController extends Controller
{
    public function create()
    {
        return view('family.create');
    }

    public function store(Request $request)
    {
        // Server-side validation
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'birthdate' => 'required|date|before_or_equal:' . Carbon::now()->subYears(21)->toDateString(),
            'mobile_no' => 'required|numeric',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|numeric',
            'marital_status' => 'required|in:Married,Unmarried',
            'wedding_date' => 'nullable|date|after_or_equal:birthdate',
            'hobbies' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Store family head data
        $familyHead = new FamilyHead;
        $familyHead->name = $request->name;
        $familyHead->surname = $request->surname;
        $familyHead->birthdate = $request->birthdate;
        $familyHead->mobile_no = $request->mobile_no;
        $familyHead->address = $request->address;
        $familyHead->state = $request->state;
        $familyHead->city = $request->city;
        $familyHead->pincode = $request->pincode;
        $familyHead->marital_status = $request->marital_status;
        $familyHead->wedding_date = $request->marital_status === 'Married' ? $request->wedding_date : null;
        $familyHead->hobbies = $request->hobbies ? implode(',', $request->hobbies) : null;

        if ($request->hasFile('photo')) {
            $familyHead->photo = $request->file('photo')->store('photos');
        }

        $familyHead->save();

        // Store family members data
        foreach ($request->family_members as $member) {
            $familyMember = new FamilyMember;
            $familyMember->family_head_id = $familyHead->id;
            $familyMember->name = $member['name'];
            $familyMember->birthdate = $member['birthdate'];
            $familyMember->marital_status = $member['marital_status'];
            $familyMember->wedding_date = $member['marital_status'] === 'Married' ? $member['wedding_date'] : null;
            $familyMember->education = $member['education'];
            
            if (isset($member['photo'])) {
                $familyMember->photo = $member['photo']->store('photos');
            }

            $familyMember->save();
        }

        return redirect()->route('family.list');
    }

    public function list()
    {
        $familyHeads = FamilyHead::withCount('familyMembers')->get();
        return view('family.list', compact('familyHeads'));
    }

    public function show($id)
    {
        $familyHead = FamilyHead::with('familyMembers')->findOrFail($id);
        return view('family.show', compact('familyHead'));
    }
}
