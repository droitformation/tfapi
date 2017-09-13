<div class="categories">
    <div class="panel panel-default">
        <div class="panel-body">

            {!! !$categorie->parent_cat->isEmpty() ? '<p><a class="btn btn-sm btn-default" href="'.url('category/'.$categorie->parent_cat->first()->parent).'"><i class="fa fa-caret-left"></i>
            Retour à '.$categorie->parent_cat->first()->name.'</a></p>' : '' !!}

            <h5 class="font-weight-600 font-16 text-danger">{{ $categorie->name }}</h5>

            <ul class="categories">
                <?php renderSidebar($categorie); ?>
            </ul>
        </div>
    </div>
</div>
