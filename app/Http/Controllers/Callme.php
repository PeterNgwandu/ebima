<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Calls as Calls;
use Symfony\Component\HttpKernel\Tests\DependencyInjection\RendererService;

class Callme extends Controller
{
    public function create(Request $request){
        $callback = $request->all();

        $insert = Calls::insertGetId($callback, 'user_id');
        if($insert > 0){
            return json_encode($insert);
        }

        return null;
    }

    public function update(Request $request){
        $data = $request->all();

        $call = User::where('user_id', '=',((isset($data['user_id'])) ? $data['user_id'] : '-1'))->first();
        if (isset($call)){
            return json_encode($call);
        }
        return null;
    }

    public function get(Request $request,$args, $limit = 100){
        $data = $request->all();

        $star = (isset($data['offset']))? $data['offset'] : 0 ;

        $call = Calls::with('category', 'plan', 'region', 'district', 'reason')
            ->when( isset($args['callme_id']) , function ($query) use ($args) {
                return $query->whereRaw('callme_id = ?', [ $args['callme_id'] ]);
            })->limit($limit)->offset($star)->get()->toArray();

        if(isset($limit, $call[0]['callme_id'])){
            //  set latest "offset"
            $offset = $star * 1 + $limit * 1;
            return json_encode([
                'status' => 'success', 'offset' => $offset, 'response' => $call
            ]);
        }

        return json_encode([
            'status' => 'failed', 'offset' => $star, 'response' => null
        ]);
    }

    public function validation(Request $request){

        $data_validation = $request->validate(
            [
                'fname' => 'required',
                'lname' => 'required',
                'mobile' => 'required',
                'dob' => 'required',
                'sex' => 'required',
                'password' => 'required',
                're_password' => 'required',
                'usergroup' => 'required',
            ]
        );

    }
}
