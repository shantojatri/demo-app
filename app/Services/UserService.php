<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Constants\GlobalConstant;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    protected $model;

    public function __construct()
    {
        $this->model = User::class;
    }

    public function getPaginateData(int $perPage = GlobalConstant::DEFAULT_PER_PAGE, string $orderBy ='id'){
        return $this->model::query()
        ->when(auth()->user()->role == UserRoleEnum::ADMIN->value, function ($q) {
            return $q->whereIn('role', [UserRoleEnum::CUSTOMER->value, UserRoleEnum::ADMIN->value]);
        })
        ->orderByDesc($orderBy)
        ->paginate($perPage)->withQueryString();
    }

    public function storeData(array $data){
        try {
            $data['password'] = Hash::make($data['password']);
            return $this->model::store($data);
        } catch (Exception $e) {
            Log::info('Something went wrong- '. $e->getMessage());
        }
    }

    public function updateData(array $data, Model $model){
        try {
            $data['password'] = $data['password'] ? Hash::make($data['password']) : $model->password;
            return $this->model::update($data, $model);
        } catch (Exception $e) {
            Log::info('Something went wrong- '. $e->getMessage());
        }
    }

    public function deleteData(Model $model){
        try {
            return $model->delete();
        } catch (Exception $e) {
            Log::info('Something went wrong- '. $e->getMessage());
        }
    }
}
