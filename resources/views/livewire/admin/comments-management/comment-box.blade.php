<div>
    <div class="post">
        <p>
        {{ $comment->description }}
        </p>

        <div class="row">
            @if($comment->status == 0)
                <a href="#" wire:click="changeStatus(1)" class="btn btn-success m-1">تایید</a>
                <a href="#" class="btn btn-danger m-1" wire:click="changeStatus(-1)">رد</a>
            @elseif($comment->status == 1)
                <a href="#" class="btn btn-danger m-1" wire:click="changeStatus(-1)">رد</a>
            @elseif($comment->status == -1)
                <a href="#" wire:click="changeStatus(1)" class="btn btn-success m-1">تایید</a>
            @endif
        </div>
    </div>
</div>
