<div style="margin-top: 90px">
<div class="single-msg-reply-comment">
    @if($selected_conversation)
    <form action="" wire:submit.prevent="sendmessage">
    <div class="input-group" style="border: 1px solid #e9e9e9;border-radius: 2px;">
        <textarea class="form-control" wire:model="message_body" placeholder="اكتب رسالة هنا"></textarea>
        <button class="btn" type="submit"><i class="fa fa-paper-plane"></i>
        </button>
    </div>
    </form>
    @endif
</div>
</div>
