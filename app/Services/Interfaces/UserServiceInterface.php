<?php
/*
 * @Author: Yan 
 * @Date: 2020-09-15 21:13:16 
 * @Last Modified by: Yan
 * @Last Modified time: 2020-09-15 21:31:44
 */

namespace App\Services\Interfaces;

use App\Models\User;

interface UserServiceInterface
{
    public function getAuthenticatedUser();
    public function getUser($id);
    public function getUsers();
    public function getFilterUsers($request);
    public function create(array $data);
    public function update(User $user,array $data);
}