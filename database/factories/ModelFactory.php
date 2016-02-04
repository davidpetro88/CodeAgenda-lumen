<?php

$factory->define(\CodeAgenda\Entities\Pessoa::class, function (Faker\Generator $faker) {
        return [
            'nome' => $faker->name,
            'apelido' => $faker->firstname,
            'sexo' => $faker->randomElement(['F','M'])
        ];
});

$factory->define(\CodeAgenda\Entities\Telefone::class, function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->randomElement(['Residencial','Comercial','Celular','Recados']),
        'codpais' => $faker->optional(0.7, 55)->numberBetween(1,197),
        'ddd'=> $faker->numberBetween(11,91),
        'prefixo'=> $faker->randomNumber(4),
        'sufixo' => $faker->randomNumber(4),
        'pessoa_id' => $faker->numberBetween(1,30)
    ];
});