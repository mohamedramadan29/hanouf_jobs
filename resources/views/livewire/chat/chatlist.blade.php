<div id="msg-list-wrap" class="wt-dashboard-msg-search-list scrollbar-macosx">
    @if($conversations ->count() > 0)
        @foreach($conversations as $conversation)

            <div class="wt-dashboard-msg-search-list-wrap">
                <a href="javascript:;" class="msg-user-info clearfix"
                   wire:click="ChatUserSelected({{$conversation}},'{{$this->getUsers($conversation,$name = 'username')}}')">
                    @if(isset($conversation->Messages->last()->created_at))
                        <div
                            class="msg-user-timing"> {{$conversation->Messages->last()->created_at->diffForHumans()}} </div>
                    @endif

                    <div class="msg-user-info-pic"><img

                            src="{{asset($this->img_path.$this->getUsers($conversation,$name = 'logo'))}}"
                            alt=""></div>
                    <div class="msg-user-info-text">
                        <div class="msg-user-name"> {{$this->getUsers($conversation,$name = 'name')}}
                        </div>
                        <div class="msg-user-discription">
                            <!-- Make Messages Class In ConversationModel To get The Last Message  -->
                            @if(isset($conversation->Messages->last()->body))
                                {{ $conversation->Messages->last()->body}}
                            @endif

                        </div>
                    </div>
                </a>
            </div>

        @endforeach

    @else
        <div class="alert alert-info"> لا يوجد محادثات بعد</div>
    @endif

</div>
