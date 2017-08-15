@if(!$categories->isEmpty())
    <h3 class="mt-5">Catégories</h3>
    <div class="container-categories">
        @foreach($categories as $categorie)
            <a href="{{ url('categorie/'.$categorie->term_id) }}" class="categorie-item"><span><i class="fa fa-tag"></i> &nbsp;{{ $categorie->name }}</span></a>
        @endforeach
    </div>
@endif