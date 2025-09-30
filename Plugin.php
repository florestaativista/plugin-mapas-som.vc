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
            i::__('Cantor'),
            i::__('Compositor'),
            i::__('Instrumentista'),
            i::__('DJ'),
            i::__('VJ'),
            i::__('Produtor de Festival'),
            i::__('Curadoria'),
            i::__('Produtor'),
            i::__('Arranjador'),
            i::__('Engenheiro de som'),
            i::__('Técnico de estúdio'),
            i::__('A.R'),
            i::__('Diretor criativo'),
            i::__('Design de palco'),
            i::__('Produtor de Campo'),
            i::__('Tour Manager'),
            i::__('Técnico de Monitor'),
            i::__('Técnico de PA'),
            i::__('Roadie'),
            i::__('Clipe'),
            i::__('Transmissão ao vivo'),
            i::__('Cobertura'),
            i::__('Professor'),
            i::__('Jornalista'),
            i::__('P.R'),
            i::__('Produtor de Conteúdo'),
            i::__('Social Media'),
            i::__('Redator'),
            i::__('Assessor de imprensa'),
            i::__('Desenvolvimento'),
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
