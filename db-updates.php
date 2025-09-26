<?php

use MapasCulturais\Entities\Subsite;

return [
    'cria subsite do som.vc' => function () {
        $subsite = new Subsite();
        $subsite->ownerId = 1;
        $subsite->namespace = 'SOM';
        $subsite->name = 'som.vc';
        $subsite->url = 'som.vc';
        $subsite->aliasUrl = 'som.localhost';
        $subsite->save(true);
    },
];
