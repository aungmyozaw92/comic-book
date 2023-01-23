<?php
/*
 * @Author: Yan 
 * @Date: 2020-09-15 21:48:55 
 * @Last Modified by: Yan
 * @Last Modified time: 2020-09-15 21:57:46
 */

namespace App\Repositories;

use App\Models\User as AppUser;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return AppUser::class;
    }

    /**
     * @param string $id
     *
     * @return User
     */
    public function getUser($id)
    {
        return AppUser::getById($id);
    }

    /**
     * @return Users
     */
    public function getUsers()
    {
        return AppUser::orderBy('created_at','desc')->get();
    }

    public function getFilterUsers($request)
    {
            return AppUser::orderBy('created_at','desc')->get();
          
    }

     /**
     * @param array $data
     *
     * @return User
     */
    public function create(array $data)
    {
        return AppUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => isset($data['username']) ? $data['username'] : null,
            // 'is_admin' => isset($data['is_admin']) ? $data['is_admin'] : false,
        ]);
    }

    /**
     * @param Category  $user
     * @param array $data
     *
     * @return mixed
     */
    public function update(User $user, array $data)
    {
       $user->name = $data['name'];
       $user->email = $data['email'];
       $user->username = isset($data['username']) ? $data['username'] : $user->username;
    //    $user->is_admin = isset($data['is_admin']) ? $data['is_admin'] : $user->is_admin;
       $user->password = isset($data['password']) ? Hash::make($data['password']) : $user->password;

       if($user->isDirty()){
           $user->save();
       }
       return $user->refresh();
    }

    /**
     * @param User $user
     */
    public function destroy(User $user)
    {   
        $this->deleteById($user->id);
    }
}