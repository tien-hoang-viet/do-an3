<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        $promotions = $this->convertDatePromotions($promotions);
        return view('admin.pages.promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.promotion.create');
    }

    public function convertDatePromotions($promotions)
    {
        foreach ($promotions as $key => $promotion) {
            $promotions[$key]['start_date'] = $this->getConvertDate($promotion['start_date']);
            $promotions[$key]['end_date'] = $this->getConvertDate($promotion['end_date']);
        }
        return $promotions;
    }

    public function getConvertDate($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function convertDateCreate($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_slice($request->all(), 1);
        $data['start_date'] = $this->convertDateCreate($request->start_date);
        $data['end_date'] = $this->convertDateCreate($request->end_date);
        Promotion::create($data);
        return redirect(route('promotion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $promotion->start_date = $this->getConvertDate($promotion->start_date);
        $promotion->end_date = $this->getConvertDate($promotion->end_date);
        return view('admin.pages.promotion.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $data = array_slice($request->all(), 1);
        $data['start_date'] = $this->convertDateCreate($request->start_date);
        $data['end_date'] = $this->convertDateCreate($request->end_date);
        $promotion->update($data);
        return redirect(route('promotion.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return response()->json(array('status' => true), 200);
    }
}
