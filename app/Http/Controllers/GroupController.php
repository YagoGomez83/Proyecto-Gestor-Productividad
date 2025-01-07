<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GroupService;
use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{
    protected $groupService;
    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index()
    {
        $groups = $this->groupService->getAllGroups();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }


    public function store(GroupRequest $request)
    {
        $this->groupService->createGroup($request->validated());
        return redirect()->route('groups.index')->with('success', 'Group created successfully');
    }

    public function edit($id)
    {
        $group = $this->groupService->getGroupById($id);
        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found');
        }
        return view('groups.edit', compact('group'));
    }
    public function update($id, GroupRequest $request)
    {
        $this->groupService->updateGroup($id, $request->validated());
        return redirect()->route('groups.index')->with('success', 'Group updated successfully');
    }
    public function destroy($id)
    {
        $this->groupService->deleteGroup($id);
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully');
    }

    public function showMembers($id)
    {
        $group = $this->groupService->getGroupWithMembers($id);
        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found');
        }
        return view('center.groups.operators.index', compact('group'));
    }
}
