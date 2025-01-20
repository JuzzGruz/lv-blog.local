<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::Create($data);
        
        return redirect()->route('admin.user.create');
    }
}
