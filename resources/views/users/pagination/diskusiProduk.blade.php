@foreach($produk_diskusi as $row_diskusi)
<div class="review_item">
  <div class="media">
    <div class="d-flex">
      <img src="/images/user.png" alt="" style="height:50px; width:50px;">
    </div>
    <div class="media-body">
      <h4>{{$row_diskusi->nama}} - {{$row_diskusi->email}}</h4>
      <h5>{{ date("j-M-Y, H:i", strtotime($row_diskusi->created_at))}}</h5>
    </div>
  </div>
  <p>{{$row_diskusi->pesan}} </p>
</div>
<div class="review_item reply" style="background-color:#fafafa; margin-left:30px;">
  <div class="media">
    <div class="d-flex">
      <img src="/images/user.png" alt="" style="height:50px; width:50px;">
    </div>
    <div class="media-body">
      <h4>Blake Ruiz</h4>
      <h5>12th Feb, 2018 at 05:56 pm</h5>
    </div>
  </div>
  <p>Test</p>
  <div class="review_box" style="margin-top:20px;">
    <form class="row contact_forms" action="javascript:void(0)" method="post" id="diskusiDetailForm">
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" class="form-control" id="form_detail_name" name="name" placeholder="Nama" required>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <input type="email" class="form-control" id="form_detail_email" name="email" placeholder="Email" required>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <textarea class="form-control" name="message" id="form_detail_message" rows="4" placeholder="Komentar" required></textarea>
        </div>
      </div>
      <div class="col-md-12 text-right">
        <button type="submit" id="ask-detail-send" value="submit" class="btn btn-dark">KIRIM</button>
      </div>
    </form>
  </div>
</div>
@endforeach

{{ $produk_diskusi->render() }}
