<?php

namespace App\Http\Controllers;

use App\Calls;
use App\Quote;
use Illuminate\Http\Request;

class Quotes extends Controller
{
    public function create(Request $request){

        $data = $request->all();

        $quote = Quote::create([
            'category_id' => $request->category_id,
            'plan_id' => $request->plan_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'region_id' => $request->region_id,
            'district_id' => $request->district_id,
            'quote_status' => $request->quote_status
        ]);

        if (isset($quote)){

            $sms = new SMS();
            $sms->sendSMS([
                'to' => 255764651630,
                'sms' => 'Quote Received, processing in progress'
                ]);

            return json_encode($quote);
        }

        $insert = Calls::insertGetId($data, 'user_id');
        if($insert > 0){

            if(isset($data['quotetype'])){
                switch ($data['quotetype']){
                    case 'default':
                        //  just return response
                        break;
                    case 'motor':

                        $motor = [
                            'plate_number' => $data[''],
                        ];

                        break;
                }
            }

        }

    }

    public function update(Request $request, $args)
    {

        $data = $request->all();
        $call = User::where( 'user_id', '=', ( (isset($data['user_id']))? $data['user_id'] : '-1' ) )->first();

        if( $call->update($data) ){
            return true;
        }

        return null;
    }

    public function get(Request $request, $args, $limit = 100){
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
}
