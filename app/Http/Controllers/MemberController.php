<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function index() {
        $members = Member::latest()->paginate(10);
        return view('members.index', compact('members'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create() {
        return view('members.create');
    }

    public function store(Request $request) {
        request()->validate([
            'name'  => 'required',
            'email' => 'required',
        ]);

        Member::create($request->all());
        return redirect()->route('members.index')->with('success', 'Member created successfully');
    }

    public function show(Member $member) {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member) {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member) {
        request()->validate([
            'name'  => 'required',
            'email' => 'required',
        ]);

        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function destroy($id) {
        Member::destroy($id);
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
