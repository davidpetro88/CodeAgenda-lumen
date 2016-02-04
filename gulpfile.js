// Para rodar via console ----> gulp --production
var elixir = require('laravel-elixir'),
    bowerDir = "vendor/bower_components/";

elixir(function (mix) {
    mix.copy(bowerDir + 'bootstrap/fonts', 'public/fonts')
        .copy(bowerDir + 'font-awesome/fonts', 'public/fonts')
        .copy(bowerDir + 'bootstrap/dist/js/bootstrap.js', 'resources/assets/js')
        .copy(bowerDir + 'jquery/dist/jquery.js', 'resources/assets/js')

        //Vai ler os 2 arquivos e vai minificar os 2 em 1 só arquivo.
        .scripts([
            'jquery.js',
            'bootstrap.js',
            'custom.js'
        ], 'public/js/scripts.js')

        .less('app.less'); //minimiza o arquivo.

});