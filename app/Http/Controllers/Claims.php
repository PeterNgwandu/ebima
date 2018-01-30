<?php

namespace App\Http\Controllers;

use App\Claim;
use Illuminate\Http\Request;

class Claims extends Controller
{
    public function create(Request $request){

        $data = Claim::create([
            'fname'           => $request->fname,
            'lname'           => $request->lname,
            'mobile'          => $request->mobile,
            'email'           => $request->email,
            'region_id'       => $request->region_id,
            'district_id'     => $request->district_id,
            'category_id'     => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'plan_id'         => $request->plan_id,
            'policy_no'       => $request->policy_no,
            'status'          => $request->status,

        ]);

        if (isset($data)){

            $sms = new SMS();

            $sms->sendSMS([
                'to' => 255764651630,
                'sms' => 'Claim received, processing in progress'
            ]);

            return json_encode([
                'status' => 'success',
                'offset' => 0,
                'rows' => 1,
                'msg' => 'Thank you your claim received and our team will process it and send you feedback!',
                'response' => $data
            ]);
        }

        return json_encode([
            'status' => 'failed',
            'offset' => 0,
            'rows' => 1,
            'msg' => 'Sorry, something went wrong with your internet!',
            'response' => null
        ]);
    }
}
