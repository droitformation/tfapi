@if(!$top_categories->isEmpty())

    <h3 class="mt-5 mb-0">
        Catégories
        <button class="btn btn-dark btn-sm pull-right" type="button" data-toggle="collapse" data-target="#collapseCategories"  aria-controls="collapseCategories">Choisir</button>
    </h3>

    <div class="collapse {{ isset($open) ? 'in' : '' }} pt-10 mb-0" id="collapseCategories">
        <div class="container-categories mt-5">
            @foreach($top_categories as $categorie)
                <a href="{{ url('category/'.$categorie->slug) }}" class="categorie-item"><span><i class="fa fa-tag"></i> &nbsp;{{ $categorie->name }}</span></a>
            @endforeach
        </div>
    </div>

@endif