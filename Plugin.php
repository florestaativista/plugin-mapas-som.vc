<?php

namespace PluginSOM;

use MapasCulturais\App;
use MapasCulturais\Definitions;
use MapasCulturais\Entities;
use MapasCulturais\i;

class Plugin extends \MapasCulturais\Plugin {

    public function _init() {
        $app = App::i();

        $app->hook('template(agent.edit.entity-info):end', function () use ($app) {
            $som_active = $app->view instanceof \SOM\Theme;

            if (!$som_active && $app->user->is('som-tester')) {
                $this->import('som-edit-agent');
            ?>
                <som-edit-agent :entity="entity"></som-edit-agent>
            <?php
            }
        });
    }

    public function register() {
        $app = App::i();

        $som_active = $app->view instanceof \SOM\Theme;

        $funcao_terms = [
            i::__('Artista'),
            i::__('Produção'),
        ];

        $funcao_musica = new Definitions\Taxonomy(503, 'funcao_musica', i::__('Função na música'), $funcao_terms, $som_active);
        $app->registerTaxonomy(Entities\Agent::class, $funcao_musica);

        $this->registerUserMetadata('som_active', [
            'label' => i::__('Usuário ativo no som.vc'),
            'type' => 'boolean',
            'field_type' => 'checkbox',
        ]);
    }
}
