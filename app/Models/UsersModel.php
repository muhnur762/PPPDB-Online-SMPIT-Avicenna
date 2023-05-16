<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['fullname', 'username', 'email', 'password_hash', 'active'];

    public function getAdmin()
    {

        return $this->select('users.id id_user, fullname, email, username, g.name role')->join('auth_groups_users gu', 'users.id=gu.user_id')->join('auth_groups g', 'g.id=gu.group_id')->where('g.name !=', 'user')->findAll();
    }
    public function getUser()
    {

        return $this->select('users.id id_user, fullname, email, username, g.name role')->join('auth_groups_users gu', 'users.id=gu.user_id')->join('auth_groups g', 'g.id=gu.group_id')->where('g.name', 'user')->findAll();
    }

    public function getAllrole($id_user)
    {

        return $this->select('users.id id_user,password_hash, fullname, email, username, g.name role')->join('auth_groups_users gu', 'users.id=gu.user_id')->join('auth_groups g', 'g.id=gu.group_id')->where('users.id', $id_user)->findAll();
    }
    public function getProfile($username)
    {

        return $this->select('users.id id_user,password_hash, fullname, email, username, g.name role')->join('auth_groups_users gu', 'users.id=gu.user_id')->join('auth_groups g', 'g.id=gu.group_id')->where('username', $username)->findAll();
    }
}
