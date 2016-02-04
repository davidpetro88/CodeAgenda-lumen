<?php

namespace CodeAgenda\Http\Controllers;


use CodeAgenda\Entities\Pessoa;
use CodeAgenda\Entities\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TelefoneController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $pessoa = Pessoa::find($id);
        return view('telefone.create', compact('pessoa'));
    }

    /**
     * @param $pessoaId
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($pessoaId, $id)
    {
        $pessoa = Pessoa::find($pessoaId);
        $telefone = Telefone::find($id);
        return view('telefone.edit', compact(
            'pessoa',
            'telefone'
        ));
    }

    /**
     * @param Request $request
     * @param $pessoaID
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $pessoaID, $id)
    {
        $pessoa = Pessoa::find($pessoaID);
        $telefone = Telefone::find($id);
        $validator = Validator::make($request->all(), [
            'descricao' => 'required|min:3|max:255',
            'codPais' => 'required|min:1|max:8',
            'ddd' => 'required|min:2|max:3',
            'prefixo' => 'required|min:4|max:5',
            'sufixo' => 'required|min:4|max:4',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $telefone->fill($request->all())->save();
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
            'descricao' => 'required|min:3|max:255',
            'codPais' => 'required|min:1|max:8',
            'ddd' => 'required|min:2|max:3',
            'prefixo' => 'required|min:4|max:5',
            'sufixo' => 'required|min:4|max:4',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $pessoa = Pessoa::find($request->pessoa_id);
        $pessoa->telefones()->create($request->all());//insere
        $letra = strtoupper(substr($pessoa->apelido, 0,1));
        return redirect()->route('agenda.letra', [
            'letra' => $letra
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $telefone = Telefone::find($id);
        $pessoa = $telefone->pessoa;
        return view('telefone.delete', compact(
            'pessoa',
            'telefone'
        ));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Telefone::destroy($id);
        return redirect()->route('agenda.index');
    }
}