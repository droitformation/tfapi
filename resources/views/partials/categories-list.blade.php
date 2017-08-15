@if(!$categories->isEmpty())
<ul class="list list-border angle-double-right">
    @foreach($categories as $categorie)
    <li><a href="#">{{ $categorie->name }}</a></li>
    @endforeach
</ul>
@endif