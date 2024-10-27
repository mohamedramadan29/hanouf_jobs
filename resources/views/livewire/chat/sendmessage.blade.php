<div style="margin-top: 90px">
    <div class="single-msg-reply-comment">
        @if($selected_conversation)
            @php
                $offer_id = $selected_conversation->offer_id;
                $offer_data = \App\Models\website\Joboffer::where('id',$offer_id)->first();
                $offer_status = $offer_data['offer_status'];
            @endphp
            @if($offer_status != 'مرفوض')
                <form action="" wire:submit.prevent="sendmessage">
                    <div class="input-group" style="border: 1px solid #e9e9e9;border-radius: 2px;">
                        <textarea required class="form-control" wire:model="message_body"
                                  placeholder="اكتب رسالة هنا"></textarea>
                        <input type="file" wire:model="file" style="display: none;" id="fileInput">
                        <label style="margin-left: 70px" for="fileInput" class="btn"><i
                                class="fa fa-paperclip"></i></label>

                        <button class="btn" type="submit"
                                wire:loading.attr="disabled"
                                wire:loading.class="disabled"
                                wire:target="sendmessage, file">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>

                </form>
            @endif

            <br>
            <div wire:loading wire:target="file" class="progress" style="margin-top: 10px;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                     style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            @error('file')
            <span class="alert alert-danger error"> {{ $message }} </span>
            @enderror
        @endif
    </div>
</div>
