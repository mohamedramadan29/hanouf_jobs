<div>
    @if($selected_conversation)
        <div class="single-msg-user-name-box">
            <div class="single-msg-short-discription d-flex align-items-center">
                <img style="width: 30px;height: 30px;border-radius: 50%;margin-left: 10px;"
                    src="{{asset('assets/website/images/user-avtar/pic4.jpg')}}"
                    alt="">
                <h4 class="single-msg-user-name"> {{$recieverUsers->name}}  </h4>
            </div>
        </div>
        <div id="msg-chat-wrap" class="single-user-msg-conversation scrollbar-macosx">
            @foreach($messages as $message)
                <div class="single-user-comment-wrap {{$auth_username == $message->sender_username ? '': 'sigle-user-reply'}}">
                    <div class="row {{$auth_username == $message->sender_username ? '': 'justify-content-end'}}">
                        <div class="col-xl-9 col-lg-12">
                            <div class="single-user-comment-block clearfix">
                                <div class="single-user-com-pic"><img
                                        src="{{asset('assets/website/images/user-avtar/pic4.jpg')}}"
                                        alt=""></div>
                                <div class="single-user-com-text">
                                    {{$message->body}}
                                </div>
                                <div class="single-user-msg-time"> {{$message->created_at->diffForHumans()}} </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach




        </div>
    @endif
</div>
