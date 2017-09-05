<?php

namespace App\Http\Controllers;
use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Http\Request;
use App\Widget;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UnauthorizedException;

class WidgetController extends Controller
{
  use OwnsRecord;
  public function __construct()
    {
      $this->middleware('auth', ['except' => 'index'] );
      $this->middleware('admin', ['except' => ['index', 'show']] );
    }
  /**
* Get the user that owns the widget.
*/
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function index()
    {
        $widgets = Widget::paginate(10);
        return view('widget.index', compact('widgets'));
    }


    public function create()
    {
        return view('widget.create');
    }


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


   // public function show($id, $slug = '')
   //  {
   //      $widget = Widget::findOrFail($id);
   //      if ($widget->slug !== $slug) {
   //          return Redirect::route('widget.show', ['id' => $widget->id, 'slug' => $widget->slug], 301);
   //      }
   //      return view('widget.show', compact('widget'));
   //  }

    //show method with automatic route model binding
    public function show(Widget $widget, $slug = '')
    {
        if ($widget->slug !== $slug) {

            return Redirect::route('widget.show', ['id' => $widget->id,
                                                   'slug' => $widget->slug],
                                                   301);
        }
        return view('widget.show', compact('widget'));
    }

   // public function edit($id)
   //  {
   //      $widget = Widget::findOrFail($id);
        
   //      return view('widget.edit', compact('widget'));
   //  }

    public function edit($id)
    {
            $widget = Widget::findOrFail($id);

            if ( ! $this->adminOrCurrentUserOwns($widget)){

                throw new UnauthorizedException;

            }

            return view('widget.edit', compact('widget'));
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
        $this->validate($request, [
            'name' => 'required|string|max:30|unique:widgets,name,' .$id

        ]);
        $widget = Widget::findOrFail($id);
        // if ($this->userNotOwnerOf($widget)){
        //     throw new UnauthorizedException;
        // }
        if ( ! $this->adminOrCurrentUserOwns($widget)){
          throw new UnauthorizedException;
        }
        $slug = str_slug($request->name, "-");
        $widget->update(['name' => $request->name,'slug' => $slug,'user_id' => Auth::id()]);
        alert()->success('Congrats!', 'You updated a widget');
        return Redirect::route('widget.show', ['widget' => $widget, 'slug' =>$slug]);
    }


    public function destroy($id)
    {
        Widget::destroy($id);
        alert()->overlay('Attention!', 'You deleted a widget', 'error');
        return Redirect::route('widget.index');
    }
}
