<div id="msg-list-wrap" class="wt-dashboard-msg-search-list scrollbar-macosx">
    @foreach($conversations as $conversation)

        <div class="wt-dashboard-msg-search-list-wrap">
            <a href="javascript:;" class="msg-user-info clearfix"
               wire:click="ChatUserSelected({{$conversation}},'{{$this->getUsers($conversation,$name = 'username')}}')">
                <div class="msg-user-timing"> {{$conversation->Messages->last()->created_at->diffForHumans()}} </div>
                <div class="msg-user-info-pic"><img

                            src="{{asset($this->img_path.$this->getUsers($conversation,$name = 'logo'))}}"
                            alt=""></div>
                <div class="msg-user-info-text">
                    <div class="msg-user-name"> {{$this->getUsers($conversation,$name = 'name')}}
                    </div>
                    @php
                        if (auth()->guard('company')->check()){
                             if(count($conversation->messages->where('read',0)->where('receiver_username',Auth()->guard('company')->user()->username))){

                        echo ' <div class="unread_count badge rounded-pill text-light bg-danger">  '
                            . count($conversation->messages->where('read',0)->where('receiver_username',Auth()->guard('company')->user()->username)) .'</div> ';
                           }
                        }else{
                           if(count($conversation->messages->where('read',0)->where('receiver_username',Auth()->user()->username))){

                        echo ' <div class="unread_count badge rounded-pill text-light bg-danger">  '
                            . count($conversation->messages->where('read',0)->where('receiver_username',Auth()->user()->username)) .'</div> ';
                           }
                        }
                    @endphp
                    <div class="msg-user-discription">
                        <!-- Make Messages Class In ConversationModel To get The Last Message  -->
                        {{ $conversation->Messages->last()->body }}
                    </div>
                </div>
            </a>
        </div>

    @endforeach

</div>
