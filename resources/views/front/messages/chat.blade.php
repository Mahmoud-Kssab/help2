
<html>
<head>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('front/assets/chat/chat.css')}}">


<script
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<h3 class=" text-center">المحادثة</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading float-right">
                <h4 class="text-center">
                    @if (Auth::user()->type == 'worker')
                        كل العمال
                    @else
                        كل العملاء
                    @endif
              </h4>

            </div>

          </div>
          <div class="inbox_chat">
            @if( $users->count() )

                {{-- @foreach ($users as $user) --}}

                    <div class="chat_list active_chat ">
                    {{-- <div class="chat_list @if($user->id == $receiver_id) active_chat @endif "> --}}
                    <a href="{{route('chat.index', $receiver_id)}}">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                            <h5>{{\App\Models\User::where('id', $receiver_id)->first()->name}} <span class="chat_date">Dec 25</span></h5>
                            {{-- <h5>{{optional($user)->name}} <span class="chat_date">Dec 25</span></h5> --}}
                            @if( optional($mess)->count() )
                                <p>{{\App\Models\Message::where('sender_id', Auth::user()->id)->orWhere('sender_id', $receiver_id)->orderBy('created_at', 'desc')->first()->content}}</p>
                            @else
                                لا توجد رسائل بينكم
                            @endif
                        </div>
                        </div>
                    </a>
                    </div>
                {{-- @endforeach --}}

            @endif



          </div>
        </div>
        <div class="mesgs">

          <div class="msg_history">
            @if( $mess->count() )
              @foreach ($mess as $mes)
              @if ($mes->sender_id == Auth::user()->id)

                <div class="outgoing_msg">
                  <div class="sent_msg">
                    <p>{{optional($mes)->content}}</p>
                      @if (optional($mes)->medias()->count())
                      @foreach (optional($mes)->medias()->get() as $img)

                        <img src="{{$img->url}}" alt="sunil">

                      @endforeach
                      @endif

                      <span class="time_date"> {{optional(optional($mes))->created_at}}</span>

                  </div>
                </div>

              @else
                 <div class="incoming_msg">
                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                    <div class="received_msg">
                      <div class="received_withd_msg">
                        <p>{{optional($mes)->content}}</p>
                        @if (optional($mes)->medias()->count())
                        @foreach (optional($mes)->medias()->get() as $img)


                          <img src="{{ asset($img->url) }}" alt="sunil">

                        @endforeach
                        @endif
                        <span class="time_date"> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', optional($mes)->created_at)->format('Y-m-d') }}</span></div>
                    </div>
                  </div>
                @endif



        @endforeach
        @endif

          </div>
          <div class="type_msg">

            <div class="input_msg_write">
                <form action="" id="mesForm" method="post" files='true'>
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{$receiver_id}}">
                    <input type="hidden" name="sender_id" value="{{Auth::user()->id}}">
                    <input type="text"   name="content" class="write_msg" placeholder="....أكتب رسالتك" />
                    <input type="file" name="files[]" class="file" id="file" multiple >
                    <button class="msg_send_btn d-none"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>
            </div>
          </div>
        </div>
      </div>

    </div></div>


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        $(window).ready(function(){
            $(".msg_history").animate({ scrollTop: 100000000 }, 50);


        });

        $(document).on('click', '.msg_send_btn', function(e){

            e.preventDefault();
            var formData = new FormData($('#mesForm')[0]);
            $.ajax({
                url: '{{route('chat.create', )}}',
                type: 'post',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data)
                {

                    if(data.status == 1)
                    {

                        if(data.data.mes.content != null && !data.data.arr_img )
                        {
                            $('.msg_history').append('<div class="outgoing_msg"><div class="sent_msg"><p>'+ data.data.mes.content +'</p><span class="time_date">' + data.data.mes.created_at  + ' </span></div></div>');

                        }else if(data.data.mes.content == null && data.data.arr_img.length > 0)
                        {
                            $.each(data.data.arr_img, function( index, value ) {
                                $('.msg_history').append('<div class="outgoing_msg"><div class="sent_msg"><img src='+ value + ' alt="sunil"><span class="time_date">' + data.data.mes.created_at  + ' </span></div></div>');
                            });


                        }else if(data.data.mes.content != null && data.data.arr_img.length > 0)
                        {
                            $.each(data.data.arr_img, function( index, value ) {
                                $('.msg_history').append('<div class="outgoing_msg"><div class="sent_msg"><p>' + data.data.mes.content + '</p><img src='+ value + ' alt="sunil"><span class="time_date">' + data.data.mes.created_at  + ' </span></div></div>');
                            });
                        }

                        $('.write_msg').val('');
                        $(".msg_history").animate({ scrollTop: 100000000 }, 50);
                        $('.msg_send_btn').addClass('d-none');
                        $('#file').val('');
                    }
                }, error: function(reject)
                {

                }
            });
        });

        $('.write_msg, .file ').on('input', function(){

            if(!$(this).val())
            {
                $('.msg_send_btn').addClass('d-none');
            }else
            {
                $('.msg_send_btn').removeClass('d-none');
            }
        });



    </script>
    </body>
    </html>
