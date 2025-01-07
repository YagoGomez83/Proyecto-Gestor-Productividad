<?php

namespace App\Repositories;

use App\Models\Group;

class GroupRepository
{
    public function getAllGroups()
    {
        return Group::all();
    }

    public function getGroupById($id)
    {
        return Group::find($id);
    }

    public function storeGroup($data)
    {
        return Group::create($data);
    }

    public function updateGroup($id, $data)
    {
        $group = Group::find($id);
        $group->update($data);
        return $group;
    }

    public function deleteGroup($id)
    {
        return Group::destroy($id);
    }

    public function getGroupWithMembers($id)
    {
        return Group::with('users')->find($id);
    }
}
