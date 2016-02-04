<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pessoa.create');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoa.edit', compact('pessoa'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);
        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:3|max:255|unique:pessoas,nome,'.$pessoa->id,
            'apelido' => 'required|min:3|max:50',
            'sexo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('pessoa.create')->withErrors($validator->errors())
                ->withInput();
        }
        $pessoa->fill($request->all())->save();
        $letra = strtoupper(substr($pessoa->apelido, 0,1));
        return redirect()->route('agenda.letra', [
            'letra' => $letra
        ]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:3|max:255|unique:pessoas',
            'apelido' => 'required|min:3|max:50',
            'sexo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $pessoa = Pessoa::create($request->all());
        $letra = strtoupper(substr($pessoa->apelido, 0,1));
        return redirect()->route('agenda.letra', ['letra' => $letra]);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoa.delete', compact('pessoa'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Pessoa::destroy($id);
        return redirect()->route('agenda.index');
    }
}
