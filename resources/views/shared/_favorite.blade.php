<a title="Click to mark as favorite {{ $name }}(click again to undo)" class="favorite mt-2 {{ Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited': '') }} "  onclick="event.preventDefault(); document.getElementById('favorite-{{ $name }}-{{ $model->id }}').submit();">
    <i class="fas fa-star fa-lg"></i>
</a>
<form id="favorite-{{ $name }}-{{ $model->id }}" method="POST" action="/{{ $uriSegment }}/{{ $model->id}}/favorites" style="display: none;">
	{{ csrf_field() }}
	@if($model->is_favorited)
	    {{ method_field('DELETE') }}
	@endif
</form>
<span class="favorites-count ">{{ $model->favorites_count }}</span>