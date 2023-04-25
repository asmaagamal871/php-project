<?php

require_once(__DIR__.'/../models/Group.php');
class GroupController
{
    public function index()
    {
        $group = new Group;
        $groups = $group->getGroups();
        include __DIR__ . '/../views/groups/index.php';
    }

    public function show($id)
    {
    }

    public function create()
    {
        include __DIR__ . '/../views/groups/create.php';
    }

    public function store($request)
    {
    }

    public function edit($id)
    {
    }

    public function update($request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
