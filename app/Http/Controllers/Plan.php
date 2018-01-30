<?php

namespace App\Http\Controllers;

use App\Plans;
use Illuminate\Http\Request;

class Plan extends Controller
{
    public function get(Request $request, $args, $limit = 100){
        $data = $request->all();

        $star = (isset($data['offset']))? $data['offset'] : 0 ;

        $call = Plans::with('category', 'benefit')

            ->when( isset($args['plan_id']) , function ($query) use ($args) {
                return $query->whereRaw('plan_id = ?', [ $args['plan_id'] ]);
            })

            ->when( isset($data['sub_category_id']) , function ($query) use ($data) {
                return $query->whereRaw('sub_category_id = ?', [ $data['sub_category_id'] ]);
            })

            ->limit($limit)->offset($star)->get();

        if(isset($limit, $call[0]['plan_id'])){
            //  set latest "offset"
            $offset = $star * 1 + $limit * 1;
            return json_encode([
                'status' => 'success', 'msg' => '', 'offset' => $offset, 'rows' => $call->count(), 'response' => $call->toArray()
            ]);
        }

        return json_encode([
            'status' => 'failed', 'msg' => 'bad json str', 'offset' => $star, 'rows' => 0, 'response' => null
        ]);
    }

}
