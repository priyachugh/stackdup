@if ($model instanceof App\Question)
    @php
        $name="question";
        $uriSegment = "questions";
    @endphp
@elseif($model instanceof App\Answer)
    @php
        $name="answer";
        $uriSegment = "answers";
    @endphp
@endif

<div class="d-flex flex-column vote-controls">
    <a title="this {{ $name }} is useful" 
    class="vote-up {{ Auth::guest() ? 'off' : '' }}"
    onclick="event.preventDefault(); document.getElementById('up-vote-{{ $name }}-{{ $model->id }}').submit();">
        <i class="fas fa-caret-up fa-2x"></i>
    </a> 
    <form id="up-vote-{{ $name }}-{{ $model->id }}" method="POST" action="/{{ $uriSegment }}/{{ $model->id}}/vote" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" name="vote" value="1">
    </form>
    <span class="votes-count">{{ $model->votes_count }}</span>
    <a title="this {{ $name }} is not useful" 
    class="vote-down {{ Auth::guest() ? 'off' : ''}}"
    onclick="event.preventDefault(); document.getElementById('down-vote-{{ $name }}-{{ $model->id }}').submit();">
        <i class="fas fa-caret-down fa-2x"></i>
    </a>
    <form id="down-vote-{{ $name }}-{{ $model->id }}" method="POST" action="/{{ $uriSegment }}/{{ $model->id}}/vote" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" name="vote" value="-1">
    </form>

    @if ($model instanceof App\Question)
        @include('shared._favorite', [
            'model' => $model,
        ])
    @elseif ($model instanceof App\Answer)
        @include('shared._accept', [
            'model' => $model,
        ])
    @endif
</div>