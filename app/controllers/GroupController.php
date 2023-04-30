<?php

require_once(__DIR__ . '/../models/Group.php');
require_once(__DIR__ . '/../controllers/BaseController.php');
class GroupController extends BaseController
{
    public function index()
    {
        $group = new Group();
        $groups = $group->getGroups();

        if ($this->isAdmin() || $this->isEditor()) {
            include __DIR__ . '/../views/groups/index.php';
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin or editor";
            header("Location: /");
        }
    }

    public function show($id)
    {
        $group = new Group();
        $result = $group->getByID($id);
        if ($this->isAdmin() || $this->isEditor()) {
            include __DIR__ . '/../views/groups/show.php';
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin or editor";
            header("Location: /");
        }
    }

    public function create()
    {
        if ($this->isAdmin()) {
            include __DIR__ . '/../views/groups/create.php';
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /groups");
        }
    }

    public function store()
    {
        $check = $this->isAdmin();
        $name = $_POST['name'];
        $pattern = '/^[A-Za-z]{4,}$/';
        if (!preg_match($pattern, $name)) {
            $_SESSION['error'] = "Input must be at least 4 letters long and only contain letters.";
            header("Location: /groups/create");
            exit();
        }
        if ($check) {
            $group = new Group();
            $create = $group->create();
            if ($create) {
                header("Location: /groups");
                exit;
            } else {
                $_SESSION['error'] = "Failed to Create, group name must be Unique";
                header("Location: /groups/create");
            }
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /groups");
        }
    }

    public function edit($id)
    {
        $check = $this->isAdmin();
        if ($check) {
            $group = new Group();
            $result = $group->getByID($id);
            include __DIR__ . '/../views/groups/edit.php';
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /groups");
        }
    }

    public function update($id)
    {
        $check = $this->isAdmin();
        $name = $_POST['name'];
        $pattern = '/^[A-Za-z]{4,}$/';
        if (!preg_match($pattern, $name)) {
            $_SESSION['error'] = "Input must be at least 4 letters long and only contain letters.";
            header("Location: /groups/" . $_POST["id"] . "/edit");
            exit();
        }
        if ($check) {
            $group = new Group();
            $update = $group->update($id);
            if ($update) {
                header("Location: /groups");
                exit;
            } else {
                $_SESSION['error'] = "Failed to Update";
                include __DIR__ . '/../views/groups/edit.php';
            }
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /groups");
        }
    }

    public function destroy($id)
    {
        $check = $this->isAdmin();
        if ($check) {
            $group = new Group();
            $delete = $group->delete($id);
            if ($delete) {
                header("Location: /groups");
                exit;
            } else {
                $_SESSION['error'] = "Failed to delete";
                header("Location: /groups");
            }
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /groups");
        }
    }

    public function restore($id)
    {
        $check = $this->isAdmin();
        if ($check) {
            $group = new Group();
            $restore = $group->restore($id);
            if ($restore) {
                header("Location: /groups");
                exit;
            } else {
                $_SESSION['error'] = "Failed to restore";
                header("Location: /groups");
            }
        } else {
            $_SESSION['error'] = "Sorry, you are not an admin";
            header("Location: /groups");
        }
    }
}
