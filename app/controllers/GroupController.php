<?php

require_once(__DIR__ . '/../models/Group.php');
class GroupController extends BaseController
{
    public function index()
    {
        $group = new Group;
        $groups = $group->getGroups();
        include __DIR__ . '/../views/groups/index.php';
    }

    public function show($id)
    {
        $group = new Group;
        $result = $group->getByID($id);
        include __DIR__ . '/../views/groups/show.php';
    }

    public function create()
    {
        if ($this->isAdmin()) {
            include __DIR__ . '/../views/groups/create.php';
        } else {
            $_SESSION['error'] = "sorry, you are not an admin";
            header("Location: /groups");
        }
    }

    public function store()
    {
        $group = new Group;
        $create = $group->create();
        if ($create) {
            header("Location: /groups");
            exit;
        } else {
            include __DIR__ . '/../views/groups/create.php';
        }
    }

    public function edit($id)
    {
        $group = new Group;
        $result = $group->getByID($id);
        include __DIR__ . '/../views/groups/edit.php';
    }

    public function update($id)
    {
        $group = new Group;
        $update = $group->update($id);
        if ($update) {
            header("Location: /groups");
            exit;
        } else {
            include __DIR__ . '/../views/groups/edit.php';
        }
    }

    public function destroy($id)
    {
        $group = new Group;
        $delete = $group->delete($id);
        if ($delete) {
            header("Location: /groups");
            exit;
        } else {
            //include __DIR__ . '/../views/groups/create.php';
        }
    }
}
