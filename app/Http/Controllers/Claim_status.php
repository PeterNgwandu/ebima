<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Claimstatus;
use Illuminate\Http\Request;

class Claim_status extends Controller
{
    public function create(Request $request,$args){
        $claim = Claim::findOrFail($args);

        if (isset($claim)){
            $data = $claim->claimstatus()->create([
                'user_id' => $request->user_id,
                'claims_summary' => $request->claims_summary,
                'claims_detail' => $request->claims_details,
                'status' => $request->status
            ]);

            if (isset($claim->fname)){
                return json_encode($claim);
            }
        }
    }

    public function update(){

    }

    public function delete(){

    }

    public function get(){
        $data = Claimstatus::with('claim')->get();
        if (isset($data)){
            return json_encode($data);
        }
    }
}
