<?php

class BaseController
{
    const ADMIN_GROUP_ID = 1;
    const EDITOR_GROUP_ID = 2;

    protected function isAdmin()
    {
        return isset($_SESSION['group_id']) && $_SESSION['group_id'] == self::ADMIN_GROUP_ID;
    }

    protected function isEditor()
    {
        return isset($_SESSION['group_id']) && $_SESSION['group_id'] == self::EDITOR_GROUP_ID;
    }
}
