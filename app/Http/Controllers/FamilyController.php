<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamilyHeadRequest;
use App\Http\Requests\StoreFamilyMembersRequest;
use App\Models\FamilyHead;
use App\Services\FamilyMemberService;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    protected $familyMemberService;

    public function __construct(FamilyMemberService $familyMemberService)
    {
        $this->familyMemberService = $familyMemberService;
    }

    public function index()
    {
        $familyHeads = FamilyHead::all();
        return view('family.list', compact('familyHeads'));
    }

    public function create()
    {
        $stateCityData = config('state_city');
        return view('family.create', compact('stateCityData'));
    }

    public function store(FamilyHeadRequest $request)
    {
        $familyHead = FamilyHead::create($request->validated());

        if ($request->hasFile('photo')) {
            $familyHead->photo = $request->file('photo')->store('photos', 'public');
            $familyHead->save();
        }

        return redirect()->route('family.addMembers', ['familyHeadId' => $familyHead->id]);
    }

    public function addMembers($familyHeadId)
    {
        $familyHead = FamilyHead::findOrFail($familyHeadId);
        return view('family.addMembers', compact('familyHead', 'familyHeadId'));
    }

    public function storeMembers(StoreFamilyMembersRequest $request)
    {
        $this->familyMemberService->storeFamilyMembers($request);

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
