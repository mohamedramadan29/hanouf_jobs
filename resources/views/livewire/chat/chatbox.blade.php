<div>
    @if($selected_conversation)
        <div class="single-msg-user-name-box">
            <div class="single-msg-short-discription d-flex align-items-center">
                <img style="width: 30px;height: 30px;border-radius: 50%;margin-left: 10px;"
                     src="{{asset($this->img_path.$recieverUsers->logo)}}"
                     alt="">
                <h4 class="single-msg-user-name"> {{$recieverUsers->name}}  </h4>
            </div>
            @if(\Illuminate\Support\Facades\Auth::guard('company')->user())

                <!-- Modal -->
                <div class="modal fade" id="unaccepted" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"> رفض العرض من الموظف </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form method="post" action="">
                                <div class="modal-body">

                                    @csrf
                                    <div class="box">
                                        <label for=""> من فضلك حدد سبب الرفص </label>
                                        <select name="refuse_reason" id="" class="form-control select2">
                                            <option selected disabled> - حدد سبب الرفض -</option>
                                            <option value="1"> السبب الاول</option>
                                            <option value="2"> السبب الثاني</option>
                                            <option value="3"> السبب الثالث</option>
                                            <option value="4"> السبب الرابع</option>
                                        </select>
                                    </div>
                                    <div class="box">
                                        <label for=""> اضافة نعليق اضافي </label>
                                        <textarea name="more_refuse_info" id="" class="form-control"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button style="background-color: #5c636a" type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">رجوع
                                        </button>
                                        <button style="background-color: #bb2d3b" type="button" class="btn btn-danger btn-sm"> رفض  </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @php
                    $offer_id = $selected_conversation->offer_id;
                    $offer_data = \App\Models\website\Joboffer::where('id',$offer_id)->first();
                    $offer_status = $offer_data['offer_status'];
                @endphp

                @if($offer_status == '' || $offer_status == null)
                    <div>
                        <a href="{{url('company/offer/acceptedOffer/'.$selected_conversation->id)}}"
                           class="btn btn-success btn-sm"><i class="fa fa-check"></i> الموافقة </a>
                        <a onclick="return confirm('  هل انت متاكد من رفض العرض المقدم  !!! ')"
                           href="{{url('company/offer/unacceptedOffer/'.$selected_conversation->id)}}"
                           class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> الرفض </a>
                        <!-- Button trigger modal -->
                        <button style="background-color: #bb2d3b" type="button" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#unaccepted">
                            <i class="far fa-trash-alt"></i> رفض
                        </button>

                    </div>
                @elseif($offer_status == 'مرفوض')
                    <div>
                        <button class="btn btn-danger"><i> x </i> تم رفض العرض</button>
                    </div>
                @elseif($offer_status == 'مقبول')
                    <div>
                        <button class="btn btn-success"><i class="fa fa-check"></i> تم قبول العرض</button>
                    </div>
                @endif

            @endif

        </div>
        <div id="msg-chat-wrap" class="single-user-msg-conversation scrollbar-macosx">
            @foreach($messages as $message)
                <div
                    class="single-user-comment-wrap {{$auth_username == $message->sender_username ? '': 'sigle-user-reply'}}">
                    <div class="row {{$auth_username == $message->sender_username ? '': 'justify-content-end'}}">
                        <div class="col-xl-9 col-lg-12">
                            <div class="single-user-comment-block clearfix">
                                <div
                                    class="img_content_chat1 {{$auth_username == $message->sender_username ? '': 'img_content_chat2'}}">
                                    <div class="single-user-com-pic">
                                        @if($message->type == 'company')
                                            <!-- Mean  the company Is Sender  -->
                                            <img
                                                src="{{asset('assets/uploads/companies/'.$this->sender_logo)}}"
                                                alt="">
                                        @elseif($message->type == 'employee')
                                            <!------- Mean  The emp Is Sender ---->
                                            <img
                                                src="{{asset('assets/uploads/users/'.$this->sender_logo)}}"
                                                alt="">
                                        @endif
                                    </div>
                                    <div class="single-user-com-text">
                                        {{$message->body}}
                                        <br>
                                        @if($message->files)
                                            @php
                                                $filePath = Storage::url($message->files);
                                                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                            @endphp
                                            @if(in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                                <a target="_blank" href="{{ $filePath }}">
                                                    <img src="{{ $filePath }}" alt="File" style="max-width: 150px;">
                                                </a>
                                            @elseif(in_array($fileExtension, ['pdf']))
                                                <a class="btn btn-primary btn-sm" href="{{ $filePath }}"
                                                   target="_blank">عرض الملف PDF</a>
                                            @elseif(in_array($fileExtension, ['doc', 'docx']))
                                                <a class="btn btn-primary btn-sm" href="{{ $filePath }}"
                                                   target="_blank">عرض الملف Word</a>
                                            @else
                                                <a class="btn btn-primary btn-sm" href="{{ $filePath }}"
                                                   target="_blank">تحميل الملف</a>
                                            @endif
                                        @endif
                                    </div>
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
