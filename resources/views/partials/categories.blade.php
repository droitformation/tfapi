@if(!$top_categories->isEmpty())

    <h3 class="mt-5 mb-0">
        Catégories
        <button class="btn btn-dark btn-sm pull-right" type="button" data-toggle="collapse" data-target="#collapseCategories"  aria-controls="collapseCategories">Choisir</button>
    </h3>

    <div class="collapse pt-10 mb-0" id="collapseCategories">
        <div class="container-categories mt-5">
            @foreach($top_categories as $term_id => $categorie)
                <a href="{{ url('category/'.$term_id) }}" class="categorie-item"><span><i class="fa fa-tag"></i> &nbsp;{{ $categorie }}</span></a>
            @endforeach
        </div>
    </div>

@endif