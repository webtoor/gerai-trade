<div class="ajax_item">

@foreach($produk_diskusi as $row_diskusi)

<div class="review_item">
  <div class="media">
    <div class="d-flex">
      <img src="/images/user.png" alt="" style="height:50px; width:50px;">
    </div>
    <div class="media-body">
      <h4>{{$row_diskusi->nama}}</h4>
      <h5>{{ date("j-M-Y, H:i", strtotime($row_diskusi->created_at))}}</h5>
    </div>
  </div>
  <p>{{$row_diskusi->pesan}} </p>
</div>
    
<div class="review_item reply" style="background-color:#fafafa; margin-left:20px;">
 <div class="ajax_detail">

@foreach ($row_diskusi->diskusi_detail as $row_item)
  <div class="media">
    <div class="d-flex">
      <img src="/images/user.png" alt="" style="height:50px; width:50px;">
    </div>
    <div class="media-body">
      <h4>{{$row_item->nama}} 
        @if($row_item->user_id != null)
        - <button class="btn-outline-secondary btn-sm">Penjual</button>
        @else
        @endif
    </h4>
      <h5>{{ date("j-M-Y, H:i", strtotime($row_item->created_at))}}</h5>
    </div>
  </div>
  <p>{{$row_item->pesan}} </p>
  @endforeach
 </div>
 @guest
  <div class="review_box" style="margin-top:20px;">
    <form class="row contact_forms" action="javascript:void(0)" method="post" id="diskusiDetailForm" style="margin-right:10px;">
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" class="form-control" id="form_detail_name" name="name" placeholder="Nama" required>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <input type="hidden"  id="form_detail_id" name="id" value="{{$row_diskusi->id}}" required>
          <textarea class="form-control" name="message" id="form_detail_message" rows="4" placeholder="Komentar" required></textarea>
        </div>
      </div>
      <div class="col-md-12 text-right">
        <button type="submit" id="ask-detail-send" value="submit" class="btn btn-dark">KIRIM</button>
      </div>
    </form>
  </div>
  @else
  @if(Auth::user()->role->role_id == '2')
  <div class="review_box" style="margin-top:20px;">
    <form class="row contact_forms" action="javascript:void(0)" method="post" id="diskusiDetailForm" style="margin-right:10px;">
      <div class="col-md-12">
        <div class="form-group">
            <input type="hidden"  id="form_detail_id" name="id" value="{{$row_diskusi->id}}" required>
          <textarea class="form-control" name="message" id="form_detail_message" rows="4" placeholder="Komentar" required></textarea>
        </div>
      </div>
      <div class="col-md-12 text-right">
        <button type="submit" id="hub-detail-send" value="submit" class="btn btn-dark">KIRIM</button>
      </div>
    </form>
  </div>
  @else
  <div class="review_box" style="margin-top:20px;">
    <form class="row contact_forms" action="javascript:void(0)" method="post" id="diskusiDetailForm" style="margin-right:10px;">
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" class="form-control" id="form_detail_name" name="name" placeholder="Nama" required>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <input type="hidden"  id="form_detail_id" name="id" value="{{$row_diskusi->id}}" required>
          <textarea class="form-control" name="message" id="form_detail_message" rows="4" placeholder="Komentar" required></textarea>
        </div>
      </div>
      <div class="col-md-12 text-right">
        <button type="submit" id="ask-detail-send" value="submit" class="btn btn-dark">KIRIM</button>
      </div>
    </form>
  </div>
  @endif
  @endguest
</div>

@endforeach
</div>
<div style="padding-top:30px;">
  {{ $produk_diskusi->render() }}
</div>
