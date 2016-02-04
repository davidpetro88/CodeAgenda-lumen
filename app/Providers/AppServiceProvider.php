<?php

namespace CodeAgenda\Providers;

use Illuminate\Support\ServiceProvider;
use CodeAgenda\Entities\Pessoa;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->share([
            'letras' => $this->getLetras()
        ]);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    protected function getLetras()
    {
        $letras = [];
        foreach(Pessoa::all() as $pessoa) {
            $letras[] = strtoupper(substr($pessoa->apelido,0 ,1));
        }
        sort($letras);
        return array_unique($letras);
    }
}
