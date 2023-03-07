<?php

namespace App\Http\Repositories\User\Main;

use App\Http\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getListByFilter(array $data);

    public function sendEmailUserRegister($user);

    public function sendEmailAdminRegisterUser();

    public function getListByCountry();

    public function getLisCountry();

}
