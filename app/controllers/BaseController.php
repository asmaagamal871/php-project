<?php

class BaseController
{
    const ADMIN_ROLE = 'admin';
    const EDITOR_ROLE = 'editor';

    protected function isAdmin()
    {
        //  isset($_SESSION['group_id']) && $_SESSION['group_id'] == self::ADMIN_GROUP_ID;
        if (isset($_SESSION['group_id'])) {
            $db = new MySQLHandler("groups");
            $group = $db->get_record_by_id($_SESSION['group_id']);
            if ($group[0]['role'] == self::ADMIN_ROLE) {
                return true;
            } else
                return false;
        }
    }

    protected function isEditor()
    {
        if (isset($_SESSION['group_id'])) {
            $db = new MySQLHandler("groups");
            $group = $db->get_record_by_id($_SESSION['group_id']);
            if ($group[0]['role'] == self::EDITOR_ROLE) {
                return true;
            } else
                return false;
        }
    }
}
