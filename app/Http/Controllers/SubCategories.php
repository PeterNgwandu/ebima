<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;

class SubCategories extends Controller
{
    public function get(Request $request,$args,$limit = 100){
        $data = $request->all();

        $star = (isset($data['offset']))? $data['offset'] : 0 ;

        $call = SubCategory::with([
            'plans' => function($query) {
                $query->where('status', '=', 1);
            }
        ])

            ->when( isset($args['sub_category_id']) , function ($query) use ($args) {
                return $query->whereRaw('sub_category_id = ?', [ $args['sub_category_id'] ]);
            })

            ->when( isset($data['category_id']) , function ($query) use ($data) {
                return $query->whereRaw('category_id = ?', [ $data['category_id'] ]);
            })

            ->limit($limit)->offset($star)->get();

        if(isset($limit, $call[0]['category_id'])){
            //  set latest "offset"
            $offset = $star * 1 + $limit * 1;
            return json_encode([
                'status' => 'success', 'offset' => $offset, 'rows' => $call->count(), 'response' => $call->toArray()
            ]);
        }

        return json_encode([
            'status' => 'failed', 'offset' => $star, 'rows' => 0, 'response' => null
        ]);

    }
}
