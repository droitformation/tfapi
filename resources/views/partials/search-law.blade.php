<div class="panel panel-default">
    <div class="panel-body">

        <form class="form-inline" method="POST" action="{{ url('law') }}">{{ csrf_field() }}
            <label for="terms" class="pull-left mb-10">Recherche par article</label>
            <small class="text-muted pull-right">
                Exemple = article : <strong>405</strong> ,
                loi: <strong>CPC</strong> , alinéa: <strong>1</strong>,
                chiffre: <strong>2</strong>, lettre: <strong>c</strong>
            </small>
            <div class="clearfix"></div>
            <div class="form-group">
                <input type="text" class="form-control w-80" placeholder="Article" name="article">
            </div>
            <div class="form-group">
                <input type="text" class="form-control w-80" placeholder="Loi" name="loi">
            </div>
            <div class="form-group">
                <input type="text" class="form-control w-80" placeholder="Alinéa" name="alinea">
            </div>
            <div class="form-group">
                <input type="text" class="form-control w-80" placeholder="Chiffre" name="chiffre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control w-80" placeholder="Lettre" name="lettre">
            </div>
            <button type="submit" class="btn btn-sm btn-dark">OK</button>
        </form>
    </div>
</div>