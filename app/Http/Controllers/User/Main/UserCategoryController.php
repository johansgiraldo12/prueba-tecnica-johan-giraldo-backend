<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Http\Repositories\User\UserCategory\UserCategoryRepositoryInterface;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    private $userCategoryRepository;

    public function __construct(UserCategoryRepositoryInterface $userCategoryRepository)
    {
        $this->userCategoryRepository = $userCategoryRepository;
    }

    public function index(Request $request)
    {
        $userCategories = $this->userCategoryRepository->all();
        return response()->json($userCategories,200);
    }
}
