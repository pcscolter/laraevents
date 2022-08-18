<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{User,Address};
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create()
    {

        return view('auth.register');

    }

    public function store(RegisterRequest $request){

        $requestData = $request->all();
        $requestData['user']['role'] = 'participant';

        DB::beginTransaction();
        try{
            $user = User::create($requestData['user']);

            $requestData['address']['user_id'] = $user->id;


            $user->address()->create($requestData['address']);

            foreach ($requestData['phones'] as $phone){
                $user->phones()->create($phone);
            }
            DB::commit();
            return redirect()
                ->route('auth.login.create')
                ->with('success','Conta criada com sucesso, efetue o login');
        }catch(\Exception $exception){
            DB::rollBack();
            return 'Mensagem: '. $exception->getMessage();
        }

    }

}
