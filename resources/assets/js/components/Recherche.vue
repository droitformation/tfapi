<template>
    <div>

        <div class="row">
            <label class="col-md-5 mb-10">Recherche par article</label>
            <small class="text-muted col-md-7">
                Exemple = article : <strong>405</strong> ,loi: <strong>CPC</strong> , alinéa: <strong>1</strong>, chiffre: <strong>2</strong>, lettre: <strong>c</strong>
            </small>
        </div>

        <div class="row">

            <div class="col-md-1 text-center col-btn">
                <button type="button" class="btn btn-xs btn-info btn-row" @click="addRow"><i class="fa fa-plus"></i></button>
            </div>
            <div class="col-md-9">
                <div class="clone" v-for="law in laws">
                    <div class="form-group">
                        <input type="text" class="form-control w-80" placeholder="Article" :name="'laws[article]['+ law.id + ']'">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-80" placeholder="Loi" :name="'laws[loi]['+ law.id + ']'">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-80" placeholder="Alinéa" :name="'laws[alinea]['+ law.id + ']'">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-80" placeholder="Chiffre" :name="'laws[chiffre]['+ law.id + ']'">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-80" placeholder="Lettre" :name="'laws[lettre]['+ law.id + ']'">
                    </div>
                    <button v-if="law.id > 1" type="button" class="btn btn-xs btn-warning btn-row" @click="removeRow"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="col-md-2 text-right">
                <button type="submit" class="btn btn-sm btn-dark">OK</button>
            </div>
        </div>


    </div>
</template>
<style>
    .btn-row{
        padding: 3px;
        margin-top:7px;
    }
    .col-btn{
        max-width:20px;
    }
    .clone{
        margin-top: 4px;
    }
    .clone:first-child{
        margin-top: 0;
    }
</style>
<script>
    export default {
        props: ['arret','images','_token'],
        data(){
            return {
                laws: [
                    { id: 1 }
                ]
            }
        },
        mounted() {
        },
        methods: {
            addRow : function(){
                this.laws.push({id: this.laws.length + 1});
            },
            removeRow : function(){
                this.laws.pop();
            },
        }
    }
</script>
