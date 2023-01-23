<?php
/*
 * @Author: Yan 
 * @Date: 2020-09-15 21:13:01 
 * @Last Modified by: Yan
 * @Last Modified time: 2020-09-15 22:05:04
 */

namespace App\Services;

use Exception;
use App\Models\User;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository )
    {
        $this->userRepository = $userRepository;
    }

    public function getAuthenticatedUser()
    {
        return Auth::user();
    }

    public function getUsers()
    {
        return $this->userRepository->getUsers();
    }

    public function getFilterUsers($request)
    {
        return $this->userRepository->getUsers($request);
    }

    public function getUser($id)
    {
        return $this->userRepository->getUser($id);
    }

    public function create(array $data)
    {        
        $result = $this->userRepository->create($data);
        return $result;
    }

    public function update(User $user, array $data)
    {        
  
        DB::beginTransaction();
        try {
            $result = $this->userRepository->update($user, $data);
        }
        catch(Exception $exc){
            DB::rollBack();
            Log::error($exc->getMessage());
            throw new InvalidArgumentException('Unable to update user');
        }
        DB::commit();

        return $result;
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $result = $this->userRepository->destroy($user);
        }
        catch(Exception $exc){
            DB::rollBack();
            Log::error($exc->getMessage());
            throw new InvalidArgumentException('Unable to delete user');
        }
        DB::commit();
        
        return $result;
    }


}