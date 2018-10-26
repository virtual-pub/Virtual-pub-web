<?php
$GLOBALS['commentDisabled'] = "";
if(!Auth::check())
    $GLOBALS['commentDisabled'] = "disabled";
$GLOBALS['commentClass'] = -1;
?>
<div class="laravelComment" id="laravelComment-{{ $comment_item_id }}">
    <h3 class="ui dividing header"></h3>
    <div class="ui threaded comments" id="{{ $comment_item_id }}-comment-0">
        <button class="ui basic small submit button" id="write-comment" data-form="#{{ $comment_item_id }}-comment-form">Escrever Comentário </button>
        <form class="ui laravelComment-form form" id="{{ $comment_item_id }}-comment-form" data-parent="0" data-item="{{ $comment_item_id }}" style="display: none;">
            <div class="field">
                <textarea id="0-textarea" rows="2" {{ $GLOBALS['commentDisabled'] }}></textarea>
                @if(!Auth::check())
                    <small>Please Log in to comment</small>
                @endif
            </div>
            <input type="submit" class="ui basic small submit button" value="Comentar" {{ $GLOBALS['commentDisabled'] }}>
        </form>
<?php
if(!function_exists("dfs")) {
$GLOBALS['commentVisit'] = array();
function dfs($comments, $comment){
    $GLOBALS['commentVisit'][$comment->id] = 1;
    $GLOBALS['commentClass']++;
?>
    <div class="comment show-{{ $comment->item_id }}-{{ (int)($GLOBALS['commentClass'] / 5) }}" id="comment-{{ $comment->id }}">
        <a class="avatar">
            @if($comment->avatar == null)
            <img class="img-circle" src="{{ asset('images/avatar-placeholder.svg') }}">
            @else
            <img class="img-circle" src="{{ $comment->avatar }}">
            @endif
        </a>
        <div class="content">
            <a class="author" url="{{ $comment->url or '' }}"> {{ $comment->name }} </a>
            <div class="metadata">
                <span class="date">{{ $comment->updated_at->diffForHumans() }}</span>
            </div>
            <div class="text">
                {{ $comment->comment }}
            </div>
            <div class="actions">
                <a class="{{ $GLOBALS['commentDisabled'] }} reply reply-button" data-toggle="{{ $comment->id }}-reply-form">Responder</a>
            </div>
            {{ \risul\LaravelLikeComment\Controllers\CommentController::viewLike('comment-'.$comment->id) }}
            <form id="{{ $comment->id }}-reply-form" class="ui laravelComment-form form" data-parent="{{ $comment->id }}" data-item="{{ $comment->item_id }}" style="display: none;">
                <div class="field">
                    <textarea id="{{ $comment->id }}-textarea" rows="2" {{ $GLOBALS['commentDisabled'] }}></textarea>
                    @if(!Auth::check())
                        <small>Please Log in to comment</small>
                    @endif
                </div>
                <input type="submit" class="ui basic small submit button" value="Comentar" {{ $GLOBALS['commentDisabled'] }}>
            </form>
        </div>
        <div class="comments" id="{{ $comment->item_id }}-comment-{{ $comment->id }}">
<?php
    foreach ($comments as $child) {
        if($child->parent_id == $comment->id && !isset($GLOBALS['commentVisit'][$child->id])){
            
            dfs($comments, $child);
        }
    }
    echo "</div>";
    echo "</div>";
}
}

$comments = \risul\LaravelLikeComment\Controllers\CommentController::getComments($comment_item_id);
foreach ($comments as $comment) {
    if(!isset($GLOBALS['commentVisit'][$comment->id])){
        dfs($comments, $comment);
    }
}
?>
    </div>
    <button class="ui basic button" id="showComment" data-show-comment="0" data-item-id="{{ $comment_item_id }}">Mostrar Comentários</button>
</div>
