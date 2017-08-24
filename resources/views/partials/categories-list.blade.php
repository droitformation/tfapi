@if(!$categories->isEmpty())

    <ul>
        @foreach($subcategories as $subcategorie)
        <?php renderSidebar($subcategorie); ?>
        @endforeach
    </ul>

@endif