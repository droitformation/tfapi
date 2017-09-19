<div class="categories">
    <div class="panel panel-default">
        <div class="panel-body">

            @if($categorie->theparent)
                <p><a href="{{ url('category/'.$categorie->theparent->slug) }}"><i class="fa fa-caret-left"></i> &nbsp;{{ $categorie->theparent->name }}</a></p>
            @endif

            <h5 class="font-weight-600 font-16 text-danger">{{ $categorie->name }}</h5>
            <ul class="categories">
                <?php renderSidebar($categories); ?>
            </ul>
        </div>
    </div>
</div>
