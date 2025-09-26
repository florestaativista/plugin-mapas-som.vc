<?php
use \MapasCulturais\i;

$this->import("
    entity-field
    entity-terms
")
?>
<div class="field col-12">
    <div class="field__group">
        <label class="field__checkbox">
            <input :id="vid" type="checkbox" v-model="isMusic"> <?php i::_e('Atua na música?') ?>
        </label>
    </div>
</div>

<template v-if="isMusic">
    <entity-terms editable :entity="entity" taxonomy="funcao_musica" classes="col-12" title="<?php i::esc_attr_e('Função na música');?>"></entity-terms>

    <template v-if="entity.terms.funcao_musica?.length > 0">
        <entity-field classes="col-12" :entity="entity.user" prop="som_active"></entity-field>
    </template>
</template>
