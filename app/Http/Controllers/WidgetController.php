<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Widget;
use Redirect;
use Illuminate\Support\Facades\Auth;

class WidgetController extends Controller
{

  public function __construct()
    {
      $this->middleware('auth', ['except' => ['index', 'show']] );
    }


  /**
* Get the user that owns the widget.
*/
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $widgets = Widget::paginate(10);
        return view('widget.index', compact('widgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('widget.create');
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

        $this->validate($request, ['name' => 'required|unique:widgets|string|max:30',]);
        $slug = str_slug($request->name, "-");
        $widget = Widget::create(['name' => $request->name, 'slug'=>$slug, 'user_id'=>Auth::id()]);
        $widget->save();
        alert()->success('Congrats!', 'You made a Widget');
        return Redirect::route('widget.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}