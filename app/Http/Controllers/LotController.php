<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Category;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lots = Lot::paginate(5);
        $result = [];
        //dd($request->input('search_benutzer_id'));
        $insuranceQuery = Lot::with('categories')->whereHas('categories', function ($query) use ($request) {
            if ($request->has('search_category') && $request->input('search_category')) {
                $query->where('title', "{$request->input('search_category')}");
            }
        });

        $insuranceQuery->orderBy('updated_at', 'DESC')->orderBy('id', 'DESC');
        $lots = $insuranceQuery->paginate(10);

        $result += [
            'search' => $this->setSearchParam($request),

        ];

        return view('lots.index')->with('lots', $lots)->with('search', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id', 'title']);

        return view('lots.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $lot = Lot::create($request->post());

        $category_ids = explode(',', implode(",", $request->category));
        foreach ($category_ids as $category_id) {
            $result_array[] = (int) $category_id;
        }
        $lot->categories()->sync($result_array);

        return redirect('lots');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lot  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Lot $lot)
    {
        return response()->json($lot);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all(['id', 'title']);
        $lot = Lot::findOrFail($id);
        return view('lots.edit')->with('categories', $categories)->with('lot', $lot);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lot  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $category_ids = explode(',', implode(",", $request->category));
        foreach ($category_ids as $category_id) {
            $result_array[] = (int) $category_id;
        }
        $lot = Lot::findOrFail($id);
        $lot->fill($request->post())->save();
        $lot->categories()->sync($result_array);

        return redirect('lots');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lot  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lot = Lot::findOrFail($id);
        $lot->delete();

        return redirect('lots');
    }

    public function setSearchParam($request)
    {
        $search['status'] = '';
        $search = [];

        if ($request->has('search_category') && $request->input('search_category')) {
            $search += [
                'search_category' => $request->input('search_category')
            ];
        }

        return $search;
    }
}
