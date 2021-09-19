<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormTradeRequest;
use App\Http\Requests\IndexTradeRequest;
use App\Http\Resources\TradeResource;
use App\Trade;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexTradeRequest $request)
    {
        $input = $request->validated();
        $trade = new Trade();

        if(isset($input['user_id'])){
            $trade = $trade->where('user_id', $input['user_id']);
        }

        if(isset($input['type'])){
            $trade = $trade->where('type', $input['type']);
        }

        $trade = $trade->get();

        return response()->json(TradeResource::collection($trade), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FormTradeRequest $request)
    {
        $input = $request->validated();
        $trade = new Trade();
        foreach($input as $item => $value){
            $trade->$item = $value;
        }

        $trade->save();

        return response()->json($trade, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Trade $trade
     * @return \Illuminate\Http\Response
     */
    public function show(Trade $trade)
    {
        return response()->json(new TradeResource($trade));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        return response()->json('', 405);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return response()->json('', 405);
    }
}
