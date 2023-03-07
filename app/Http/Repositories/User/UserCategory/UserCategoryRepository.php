<?php

namespace App\Http\Repositories\User\UserCategory;

use App\Http\Repositories\Repository;
use App\Http\Repositories\User\UserCategory\UserCategoryRepositoryInterface;
use App\Mail\NotifyAdminMail;
use App\Mail\NotifyUserMail;
use App\Models\UserCategory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;



class UserCategoryRepository extends Repository implements UserCategoryRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param UserCategory $model
     */
    public function __construct(UserCategory $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }



}
