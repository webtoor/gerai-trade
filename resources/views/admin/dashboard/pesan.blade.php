@extends('admin.default')

@section('content')
<div class='bgc-white' >
          <div class="full-container bd bgc-white" >
            <div class="peers fxw-nw pos-r"  >
              <!-- Sidebar -->
              <div class="peer bdR" id="chat-sidebar">
                <div class="layers h-100">
                  <!-- Search -->
                  <div class="bdB layer w-100">
                        <div class="form-constrol p-15 bdrs-0 w-100 bdw-0 fw-600 text-center">KOTAK MASUK</div>
                    </div>

                  <!-- List -->
                  <div class="layer w-100 fxg-1 scrollable pos-r">
                      
                      @foreach($pesan as $pesans)
                     
                      <a href="{{route('admin-panel.getPesanById', ['pesan_id' => $pesans->id])}}">
                    <div class="peers fxw-nw ai-c p-20 bdB bgcH-grey-50 cur-p {{ $id_pesan == $pesans->id ? 'bgc-green-100' : 'bgc-white' }}">
                      <div class="peer">
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="" class="w-3r h-3r bdrs-50p">
                      </div>
                      <div class="peer peer-greed pL-20">
                        <h6 class="mB-0 lh-1 fw-400">{{$pesans->user->nama_depan}}</h6>
                        {{-- <small class="lh-1 c-green-500">Online</small> --}}
                      </div>
                    </div>
                    </a>
                    @endforeach
                  </div>
                </div>
              </div>

              <!-- Chat Box -->
              <div class="peer peer-greed" id='chat-box'>
                    @if(count($pesan) > 0)

                <div class="layers h-100">

                  <div class="layer w-100">
                        <div class="peers fxw-nw jc-sb ai-c pY-20 pX-30 bgc-white">
                                <div class="peers ai-c">
                                  <div class="peer d-n@md+">
                                    <a href="" title="" id='chat-sidebar-toggle' class="td-n c-grey-900 cH-blue-500 mR-30">
                                      <i class="ti-menu"></i>
                                    </a>
                                  </div>
                                  <div class="peer mR-20">
                                    <img src="https://randomuser.me/api/portraits/men/12.jpg" alt="" class="w-3r h-3r bdrs-50p">
                                  </div>
                                  <div class="peer">
                                    <h6 class="lh-1 mB-0">{{$pesan[$key_array]->user->nama_depan}}</h6>
                                  </div>
                                </div>
  
                              </div>

                  </div>

                  <div class="layer w-100 fxg-1 bgc-grey-200 scrollable pos-r" id="toDown">
                    <!-- Chat Box -->
                    <div class="p-20 gapY-15">
                      <!-- Chat Conversation -->
                      <div class="peers fxw-nw">
                        <div class="peer peer-greed">
                          <div class="layers ai-fs gapY-5">
                            <?php $dates = null; ?>

                            @foreach($pesan[$key_array]->pesan_detail as $details)
                            @if($details->pesan_id == $id_pesan)
                            @if($dates != date("Y-m-d", strtotime($details->created_at)))

                            <?php $dates = date("Y-m-d", strtotime($details->created_at)); ?>
                            <div style="margin-left:50%;">
                                    <small>{{ date("j-M-Y", strtotime($details->created_at))}}</small>
                                </div>
                            @endif
                            @if($details->admin_id == null)

                            <div class="layer">
                              <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                <div class="peer mR-10">
                                    <small>{{ date("H:i", strtotime($details->created_at))}}</small>
                                 </div>
                                <div class="peer-greed">
                                <span>{{$details->pesan}}</span>
                                </div>
                              </div>
                            </div>
                            @else
                            <div class="layer" style="margin-left:87%;">
                                <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                    <div class="peer mR-10">
                                        <small>{{ date("H:i", strtotime($details->created_at))}}</small>
                                    </div>
                                    <div class="peer-greed">
                                    <span>{{$details->pesan}}</span>
                                    </div>
                                </div>
                                </div>
                            @endif
                            @endif
                           @endforeach
                          </div>
                        </div>
                      </div>
                  </div>
                  </div>
                  <div class="layer w-100">
                        <div class="p-20 bdT bgc-white">
                          <div class="pos-r">
                            <input type="text" id="pesan" name="pesan" class="form-control bdrs-10em m-0" placeholder="Tulis Pesan...">
                            <button type="button" id="send" class="btn btn-primary bdrs-50p w-2r p-0 h-2r pos-a r-1 t-1">
                              <i class="fas fa-paper-plane"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      @else
                      <div class="text-center" style="margin-top:20%">
                          <button class="btn btn-dark">Belum ada yang mengirim pesan!</button>
                      </div>
                      @endif
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('js')
<script>

$(document).ready(function () {
    $('#toDown').scrollTop($('#toDown').height()); 
    /* $('button#send').click(function () {
        

        var user_id = "{{Auth::user()->id}}"
        var pesan = $("#pesan").val();
        var params = {
                'user_id' : user_id,
                'pesan' : pesan
            }
        $('#pesan').val('');
  
        var nows = new Date();
        var hours = nows.getHours().toString();
        var minutes = nows.getMinutes().toString();
        $('.newPesan').append("<div class='layer'><div class='peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2'><div class='peer mL-10 ord-1'><small> "+ hours + ":" +  minutes +" </small>  </div><div class='peer-greed ord-0'><span>"+ pesan +"</span></div></div>");
        $("#toDown").animate({ scrollTop: $("#toDown")[0].scrollHeight }, 1000);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: "application/json",
            dataType: "json",
            type: 'POST',
            url: 'chat',
            data: JSON.stringify(params),
        }).done(function (data) {
            
            console.log(data)
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('Gagal Mengirim Pesan, Silakan Coba Lagi Nanti');
              //console.log(thrownError)
        });
    }); */
});
</script>

@endsection