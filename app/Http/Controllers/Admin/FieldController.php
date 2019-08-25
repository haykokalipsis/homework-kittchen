<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view('admin.pages.fields.index', compact('fields'));
    }

    public function create()
    {
        return view('admin.pages.fields.new');
    }

    public function store(Request $request)
    {
        $data['type'] = $request->input('type');
        $data['name'] = $request->input('name');
        $data['placeholder'] = $request->input('placeholder');
        $data['title'] = $request->input('title');

        if ($request->input('type') === 'select')
            $data['value'] = json_encode($request->input('selectValues'));
        else
            $data['placeholder'] = $request->input('placeholder');

        $field = new Field;
        $field->fill($data);
        $field->save();

        return redirect()->route('fields.create');
    }

    public function show(Field $form)
    {
        //
    }

    public function edit($id)
    {
        $field = Field::findOrFail($id);
        return view('admin.pages.fields.edit', compact('field'));
    }

    public function update(Request $request, $id)
    {

        $field = Field::findOrFail($id);

        $data['type'] = $request->input('type');
        $data['name'] = $request->input('name');
        $data['title'] = $request->input('title');

        if ($request->input('type') === 'select')
            $data['value'] = json_encode($request->input('selectValues'));
        else
            $data['placeholder'] = $request->input('placeholder');

        $field->update($data);

        return redirect()->route('fields.index');
    }

    public function destroy(Field $form)
    {
        //
    }
}
