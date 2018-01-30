<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;

class Categories extends Controller
{
    public function get(Request $request,$args,$limit = 100){
        $data = $request->all();

        $star = (isset($data['offset']))? $data['offset'] : 0 ;

        if (isset($data)){
            $category = Category::with([
               'plans' => function($query){
                    $query->with('benefit');
               }
            ])

            ->when( isset($args['category_id']) , function ($query) use ($args) {
                return $query->whereRaw('category_id = ?', [ $args['category_id'] ]);
            })->limit($limit)->offset($star)->get()->toArray();

            if(isset($limit, $call[0]['category_id'])){
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
    }
}
