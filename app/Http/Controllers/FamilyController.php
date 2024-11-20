<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use Carbon\Carbon;

class FamilyController extends Controller
{

    public function index()
{
    $familyHeads = FamilyHead::all(); // Or any data you want to show
    return view('family.list', compact('familyHeads'));
}
    public function create()
    {
        return view('family.create');
    }

    public function store(Request $request)
    {
        // dd( $request->all());
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
            'hobbies' => 'nullable|array',
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
        // $familyHead->hobbies = $request->hobbies;
        $familyHead->hobbies = $request->hobbies ? json_encode($request->hobbies) : null;

        if ($request->hasFile('photo')) {
            $familyHead->photo = $request->file('photo')->store('photos');
        }

        $familyHead->save();
        
        // return redirect()->route('family.list');
        return redirect()->route('family.addMembers', ['familyHeadId' => $familyHead->id]);
    }

    public function addMembers($familyHeadId)
{
    $familyHead = FamilyHead::findOrFail($familyHeadId);
    return view('family.addMembers', compact('familyHead', 'familyHeadId'));
}


    public function storeMembers(Request $request)
    {
        // Validate the family members data
        foreach ($request->family_members as $member) {
            $request->validate([
                'family_members.*.name' => 'required|string',
                'family_members.*.birthdate' => 'required|date',
                // Other validation rules...
            ]);
        }

        // Store each family member
        foreach ($request->family_members as $member) {
            $familyMember = new FamilyMember;
            $familyMember->family_head_id = $request->family_head_id;
            $familyMember->name = $member['name'];
            $familyMember->birthdate = $member['birthdate'];
            // Other member fields...
            $familyMember->save();
        }

        return redirect()->route('family.list'); // Redirect to family list page
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
