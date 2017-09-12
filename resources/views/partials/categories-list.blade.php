<div class="categories">
    <div class="panel panel-default">
        <div class="panel-body">

            {!! $categorie->parent_cat ? '<p><a class="btn btn-sm btn-default" href="'.url('category/'.$categorie->parent_cat->term->term_id).'"><i class="fa fa-caret-left"></i>
            Retour à '.$categorie->parent_cat->term->name.'</a></p>' : '' !!}

            <h5 class="font-weight-600 font-16 text-danger">{{ $categorie->term->name }}</h5>

            @if(!$subcategories->isEmpty())
                <ul class="categories">
                    @foreach($subcategories as $subcategorie)
                        <?php renderSidebar($subcategorie); ?>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
