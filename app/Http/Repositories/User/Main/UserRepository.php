<?php

namespace App\Http\Repositories\User\Main;

use App\Http\Repositories\Repository;
use App\Http\Repositories\User\Main\UserRepositoryInterface;
use App\Mail\NotifyAdminMail;
use App\Mail\NotifyUserMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;



class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getListByFilter(array $data)
    {
       $query = $this->model;
       if(!empty($data['filter'])){
            $query = $query->whereHas('userCategory', function ($query2) use ($data) {
                $query2->where('name', $data['filter']);
            });
       }
       return $query->with('userCategory')->get();
    }

    public function sendEmailUserRegister($user){
        return Mail::to($user->email)->send(new NotifyUserMail($user));
    }

    public function sendEmailAdminRegisterUser(){

        $listUser = $this->getListByCountry();
        return Mail::to(config('app.emailAdmin'))->send(new NotifyAdminMail($listUser));
    }

    public function getListByCountry(){
        $listCountry = $this->getLisCountry();
        $i = 0;
        $countUserByCountry = array();
        foreach ($listCountry as $country){
            $users = $this->model->where('countryName',$country->translations->spa->common)->get();
            $countUserByCountry[$i]=array('countryName' => $country->translations->spa->common,
                                            'countUser' => count($users));
            $i++;
        }
        return $countUserByCountry;
    }

    public function getLisCountry($region = 'South America'){
        $response = Http::get('https://restcountries.com/v3.1/subregion/'.$region);
        $response->object();
        return $response->object();
    }

}
