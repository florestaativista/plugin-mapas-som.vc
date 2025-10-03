<?php

use MapasCulturais\App;
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

    'configura filtro de oportunidades' => function () {
        $app = App::i();
        $subsite = $app->repo('Subsite')->findOneBy(['namespace' => 'SOM']);
        $subsite->filter_subsite_opportunity = true;
        $subsite->save(true);
    },

    'configura filtro de projetos' => function () {
        $app = App::i();
        $subsite = $app->repo('Subsite')->findOneBy(['namespace' => 'SOM']);
        $subsite->filter_subsite_project = true;
        $subsite->save(true);
    }
];
