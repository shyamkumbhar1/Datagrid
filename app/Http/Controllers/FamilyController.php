<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use Carbon\Carbon;
use App\Http\Requests\FamilyHeadRequest;

class FamilyController extends Controller
{

    public function index()
{
    $familyHeads = FamilyHead::all();   
    return view('family.list', compact('familyHeads'));
}
    public function create()
    {
        return view('family.create');
    }

    public function store(FamilyHeadRequest  $request)
    {
        // dd( $request->all());
        $familyHead = FamilyHead::create($request->validated());      

        if ($request->hasFile('photo')) {
            $familyHead->photo = $request->file('photo')->store('photos','public');            
            $familyHead->save();   
        }

             
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
