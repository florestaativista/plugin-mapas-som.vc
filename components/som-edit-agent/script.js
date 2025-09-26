app.component('som-edit-agent', {
    template: $TEMPLATES['som-edit-agent'],

    props: {
        entity: { type: Entity, required: true },
    },

    setup () {
        const vid = Vue.useId();
        return { vid };
    },

    data () {
        const { terms, user } = this.entity;
        const isMusic = Boolean(user.som_active || terms?.funcao_musica?.length);

        return {
            isMusic,
        }
    },
});
