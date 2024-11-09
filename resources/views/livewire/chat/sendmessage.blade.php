<div style="margin-top: 90px">
    <div class="single-msg-reply-comment">

        @if($selected_conversation)
            @php
                $offer_id = $selected_conversation->offer_id;
                $offer_data = \App\Models\website\Joboffer::where('id', $offer_id)->first();
                $offer_status = $offer_data['offer_status'];
                $last_message_from_company = \App\Models\website\Message::where('conversation_id', $selected_conversation->id)
                    ->where('type', 'company')
                    ->latest()
                    ->first();
            @endphp
{{--            @if($offer_status != 'مرفوض' || $offer_status == 'مرفوض' && \Illuminate\Support\Facades\Auth::guard('company')->check())--}}
            @if(($offer_status != 'مرفوض') ||
                ($offer_status == 'مرفوض' && \Illuminate\Support\Facades\Auth::guard('company')->check()) ||
                ($offer_status == 'مرفوض' && $last_message_from_company && $last_message_from_company->created_at > $selected_conversation->updated_at)
            )
                <form action="" wire:submit.prevent="sendmessage">
                    <div class="input-group" style="border: 1px solid #e9e9e9; border-radius: 2px;">
                        <textarea required class="form-control" wire:model="message_body"
                                  placeholder="اكتب رسالة هنا"></textarea>
                        <input type="file" wire:model="file" style="display: none;" id="fileInput">

                        <label style="margin-left: 70px" for="fileInput" class="btn">
                            <i class="fa fa-paperclip"></i>
                        </label>

                        <!-- زر الإرسال -->
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
            <!-- عرض شريط التحميل أثناء رفع الملف -->
            <div wire:loading wire:target="file" class="progress" style="margin-top: 10px;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                     style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <!-- عرض الملف المرفق أسفل مربع النص -->
            @if($file)
                <div class="file-preview" style="margin-top: 14px;margin-bottom: 15px;padding: 10px;border: 1px dashed #ccc;border-radius: 5px;">
                    <strong>الملف المرفق:</strong>
                    <!-- إذا كان الملف صورة أو مستند يمكن عرضه كمعاينة -->
                    @if(in_array(pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ $file->temporaryUrl() }}" alt="ملف مرفق" style="max-width: 200px; max-height: 200px;">
                    @else
                        <span>{{ $file->getClientOriginalName() }}</span>
                    @endif
                    <button type="button" wire:click="removeFile" class="btn btn-danger btn-sm" style="margin-left: 10px; top: 110px; color: red; width: 20px; height: 20px; border: none;">
                        <i class="fa fa-trash" style="font-size: 18px"></i>
                    </button>
                </div>
            @endif

            @error('file')
            <span class="alert alert-danger error"> {{ $message }} </span>
            @enderror
        @endif
    </div>
</div>
