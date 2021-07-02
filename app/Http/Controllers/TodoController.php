<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('select * from todos');
        return view('index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $validate_rule = [
            'content' => 'required|max:20'
        ];
        $this->validate($request, $validate_rule);

        $param = [
            'content' => $request->content,
        ];
        DB::insert('insert into todos (content,created_at,updated_at) values (:content,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)', $param);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $validate_rule = [
            'content' => 'required|max:20'
        ];
        $this->validate($request, $validate_rule);

        $param = [
            'id' => $request->id,
            'content' => $request->content,
        ];
        DB::update('update todos set content =:content, updated_at =CURRENT_TIMESTAMP where id =:id', $param);
        return redirect('/');
    }
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from todos where id =:id', $param);
        return redirect('/');
    }
}