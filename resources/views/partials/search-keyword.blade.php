<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline" method="POST" action="{{ url('search') }}">{{ csrf_field() }}
            <label for="search" class="mb-10">Recherche par mots-clés</label><br/>

            <div class="input-group w-p-90">
                <input type="text" class="form-control" placeholder="Recherche" name="terms">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-sm btn-dark">OK</button>
                </span>
            </div><!-- /input-group -->
        </form>
    </div>
</div>