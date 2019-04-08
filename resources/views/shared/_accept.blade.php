@can('accept', $model)
    <a title="mark this answer as favorite answer" 
        class="{{ $model->status }} mt-2"
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();">
        <i class="fas fa-check fa-lg"></i>
    </a>
    <form id="accept-answer-{{ $model->id }}" method="POST" action="{{ route('answers.accept', $model->id) }}" style="display: none;">
    {{ csrf_field() }}
    </form>
   @else
    @if($model->is_best)
        <a title="Owner of the question accepted this answer as favorite answer" 
            class="{{ $model->status }} mt-2">
            <i class="fas fa-check fa-lg"></i>
        </a>
    @endif 
@endcan