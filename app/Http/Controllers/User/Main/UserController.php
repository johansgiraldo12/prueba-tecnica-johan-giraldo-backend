<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Http\Repositories\User\Main\UserRepositoryInterface;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Response;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $users = $this->userRepository->getListByFilter($request->all());
        return response()->json($users,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        $user = $this->userRepository->create($request->all());

        $this->userRepository->sendEmailUserRegister($user);

        $this->userRepository->sendEmailAdminRegisterUser();

        DB::commit();
        return response()->json($user,200);
        try {
        } catch (\Exception $e) {
            DB::rollback();
            response()->json($e->getMessage(),500);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
       $user = $this->userRepository->update($request->all(),$id);
        return response()->json($user,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = $this->userRepository->delete($id);
        return response()->json($user,200);
    }
}
