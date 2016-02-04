<?php

$app->get('/', [
    'as' => 'agenda.index',
    'uses' => 'AgendaController@index'
]);

$app->get('/{letra}', [
    'as' => 'agenda.letra',
    'uses' => 'AgendaController@index'
]);

$app->post('/busca', [
    'as' => 'agenda.busca',
    'uses' => 'AgendaController@busca'
]);

/**
 * Pessoas
 */
$app->get('/contato/novo', [
    'as' => 'pessoa.create',
    'uses' => 'PessoaController@create'
]);
$app->post('/contato', [
    'as' => 'pessoa.store',
    'uses' => 'PessoaController@store'
]);
$app->get('/contato/{id}/editar', [
    'as' => 'pessoa.edit',
    'uses' => 'PessoaController@edit'
]);
$app->put('/contato/{id}', [
    'as' => 'pessoa.update',
    'uses' => 'PessoaController@update'
]);
$app->get('/contato/{id}/apagar', [
    'as' => 'pessoa.delete',
    'uses' => 'PessoaController@delete'
]);
$app->delete('/contato/{id}', [
    'as'    => 'pessoa.destroy',
    'uses'  => 'PessoaController@destroy'
]);

/**
 * Telefones
 */
$app->get('/telefone/{id}/novo', [
    'as' => 'telefone.create',
    'uses' => 'TelefoneController@create'
]);
$app->post('/telefone', [
    'as' => 'telefone.store',
    'uses' => 'TelefoneController@store'
]);
$app->get('/telefone/{pessoaId}/{id}/editar', [
    'as' => 'telefone.edit',
    'uses' => 'TelefoneController@edit'
]);
$app->put('/telefone/{pessoaID}/{id}', [
    'as' => 'telefone.update',
    'uses' => 'TelefoneController@update'
]);
$app->get('/telefone/{id}/apagar', [
    'as' => 'telefone.delete',
    'uses' => 'TelefoneController@delete'
]);
$app->delete('/telefone/{id}', [
    'as' => 'telefone.destroy',
    'uses' => 'TelefoneController@destroy'
]);