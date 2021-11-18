<?php

namespace App\Http\Controllers\api;

use App\Models\Dapp;
use Exception;
use Illuminate\Http\Request;

class DappController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['store', 'update', 'destroy']);
    }
    /**
     * Display all Dapps.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'message' => Dapp::all(),
        ],200);
    }

    /**
     * Store a new Dapp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'volume' => 'required|string',
            'market_cap' => 'required|string',
            'traders' => 'required|string',
            'flor_price' => 'required|string',
            'sales_price' => 'required|string',
            'average_price' => 'required|string',
            'chain' => 'required|string',
            'website' => 'required|string',
            'telegram' => 'required|string',
            'redit' => 'required|string',
            'twitter' => 'required|string',
            'launch_date' => 'required|string',
            'votes' => 'required|string',
            'description' => 'required|string',
            'type' => 'required',
        ]);
        $dapp = new Dapp;
        $dapp->name = $fields['name'];
        $dapp->is_promoted = false;
        $dapp->user_id = auth()->user()->id;
        $dapp->volume = $fields['volume'];
        $dapp->market_cap = $fields['market_cap'];
        $dapp->traders = $fields['traders'];
        $dapp->flor_price = $fields['flor_price'];
        $dapp->sales_price = $fields['sales_price'];
        $dapp->average_price = $fields['average_price'];
        $dapp->chain = $fields['chain'];
        $dapp->website = $fields['website'];
        $dapp->telegram = $fields['telegram'];
        $dapp->redit = $fields['redit'];
        $dapp->twitter = $fields['twitter'];
        $dapp->launch_date = $fields['launch_date'];
        $dapp->votes = 0;
        $dapp->rating = 0;
        $dapp->description = $fields['description'];
        if (strtoupper($request['type']) == 'NFT') {
            $dapp->is_nft = true;
        }elseif (strtoupper($request['type']) == 'COIN') {
            $dapp->is_coin = true;
        }elseif(strtoupper($request['type']) == 'DEX'){
            $dapp->is_dex = true;
        }else{
            return response([
                'message' => 'Invalid Type Entered'
            ],500);
        }
        $dapp->is_active = false;
        $dapp->save();
        return response([
            'Dapp' => $dapp,
        ], 201);
    }

    /**
     * Display the specified Dapp.
     *
     * @param  \App\Models\Dapp  $dapp
     * @return \Illuminate\Http\Response
     */
    public function show(Dapp $dapp)
    {
        $dapp = Dapp::find($dapp);
        return response($dapp, 200);
    }

    /**
     * Update the specified Dapp.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dapp  $dapp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dapp $dapp)
    {
        $dap = Dapp::find($dapp);
        $dap['name'] = $request['name'];
        $dap['volume'] = $request['volume'];
        $dap['market_cap'] = $request['market_cap'];
        $dap['traders'] = $request['traders'];
        $dap['flor_price'] = $request['flor_price'];
        $dap['sales_price'] = $request['sales_price'];
        $dap['average_price'] = $request['average_price'];
        $dap['chain'] = $request['chain'];
        $dap['website'] = $request['website'];
        $dap['telegram'] = $request['telegram'];
        $dap['redit'] = $request['redit'];
        $dap['twitter'] = $request['twitter'];
        $dap['is_active'] = $request['is_active'];
        $dap['is_promoted'] = $request['is_promoted'];
        $dap['launch_date'] = $request['launch_date'];
        $dap['votes'] = $request['votes'];
        $dap['description'] = $request['description'];
        $dap['rating'] = $request['rating'];
        $dap['is_nft'] = $request['is_nft'];
        $dap['is_coin'] = $request['is_coin'];
        $dap['is_dex'] = $request['is_dex'];
        $dap->save();
        return response([
            'message' => 'updated Successfully',
            $dapp,
        ]);
    }

    /**
     * Remove the specified Dapp.
     *
     * @param  \App\Models\Dapp  $dapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dapp $dapp)
    {
        $dapp = Dapp::find($dapp);
        $dapp->delete();
        return response([
            'message' => 'Dapp Removed Successfully'
        ], 201);
    }
}
