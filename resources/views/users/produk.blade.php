@section('css')

    <style>
    ============================================================================================ */
/* Single Product Area css
============================================================================================ */


.product_image_area {
  padding-top: 120px; }



.s_product_text {
  margin-left: -15px;
  margin-top: 65px; }
  @media (max-width: 575px) {
    .s_product_text {
      margin-left: 0px; } }
  .s_product_text h3 {
    font-size: 24px;
    font-weight: 500;
    color: #222222;
    margin-bottom: 10px; }
  .s_product_text h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px; }
  .s_product_text .list li {
    margin-bottom: 5px; }
    .s_product_text .list li a {
      font-size: 16px;
      /* font-family: "Roboto", sans-serif; */
      font-weight: normal;
      color: #555555; }
      .s_product_text .list li a span {
        width: 90px;
        display: inline-block; }
        .s_product_text .list li a span:hover {
          color: #555; }
      .s_product_text .list li a.active span {
        color: #555;
        -webkit-text-fill-color: #555; }
    .s_product_text .list li:last-child {
      margin-bottom: 0px; }
  .s_product_text p {
    padding-top: 20px;
    border-top: 1px dotted #d5d5d5;
    margin-top: 20px;
    margin-bottom: 70px; }
  .s_product_text .card_area .primary-btn {
    line-height: 38px;
    padding: 0px 38px;
    text-transform: uppercase;
    margin-right: 10px;
    border-radius: 5px; }
  .s_product_text .card_area .icon_btn {
    position: relative;
    height: 40px;
    width: 40px;
    line-height: 40px;
    text-align: center;
    background: #828bb2;
    border-radius: 50%;
    display: inline-block;
    color: #fff;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    margin-right: 10px;
    z-index: 1; }
    .s_product_text .card_area .icon_btn:after {
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      content: "";
      border-radius: 50%;
      opacity: 0;
      visibility: hidden;
      z-index: -1; }
    .s_product_text .card_area .icon_btn:hover:after {
      opacity: 1;
      visibility: visible; }

.product_count {
  display: inline-block;
  position: relative;
  margin-bottom: 24px; }
  .product_count label {
    font-size: 16px;
    color: #777777;
    font-weight: normal;
    padding-right: 10px; }
  .product_count input {
    width: 76px;
    border: 1px solid #eeeeee;
    border-radius: 3px;
    padding-left: 10px; }
  .product_count button {
    display: block;
    border: none;
    background: transparent;
    box-shadow: none;
    cursor: pointer;
    position: absolute;
    right: 0px;
    font-size: 14px;
    color: #cccccc;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s; }
    .product_count button:hover {
      color: #222222; }
  .product_count .increase {
    top: -4px; }
  .product_count .reduced {
    bottom: -8px; }

.product_description_area {
  padding-bottom: 120px;
  margin-top: 60px; }
  .product_description_area .nav.nav-tabs {
    background: #f3f4f5;
    text-align: center;
    display: block;
    border: none;
    padding: 10px 0px; }
    .product_description_area .nav.nav-tabs li {
      display: inline-block;
      margin-right: 7px; }
      .product_description_area .nav.nav-tabs li:last-child {
        margin-right: 0px; }
        @media (max-width: 441px) {
          .product_description_area .nav.nav-tabs li:last-child {
            margin-top: 15px; } }
      .product_description_area .nav.nav-tabs li a {
        padding: 0px;
        border: none;
        line-height: 38px;
        background: #fff;
        border: 1px solid #eeeeee;
        border-radius: 0px;
        padding: 0px 30px;
        color: #222222;
        font-size: 13px;
        font-weight: normal; }
        @media (max-width: 570px) {
          .product_description_area .nav.nav-tabs li a {
            padding: 0 15px; } }
        .product_description_area .nav.nav-tabs li a.active {
          color: #fff;
          border: 1px solid transparent; }
  .product_description_area .tab-content {
    border-left: 1px solid #eee;
    border-right: 1px solid #eee;
    border-bottom: 1px solid #eee;
    padding: 30px; }
    .product_description_area .tab-content .total_rate .box_total {
      background: #e8f0f2;
      text-align: center;
      padding-top: 20px;
      padding-bottom: 20px; }
      .product_description_area .tab-content .total_rate .box_total h4 {
        font-size: 48px;
        font-weight: bold; }
      .product_description_area .tab-content .total_rate .box_total h5 {
        color: #222222;
        margin-bottom: 0px;
        font-size: 24px; }
      .product_description_area .tab-content .total_rate .box_total h6 {
        color: #222222;
        margin-bottom: 0px;
        font-size: 14px;
        color: #777777;
        font-weight: normal; }
    .product_description_area .tab-content .total_rate .rating_list {
      margin-bottom: 30px; }
      .product_description_area .tab-content .total_rate .rating_list h3 {
        font-size: 18px;
        color: #222222;
        font-family: "Roboto", sans-serif;
        font-weight: 500;
        margin-bottom: 10px; }
      .product_description_area .tab-content .total_rate .rating_list .list li a {
        font-size: 14px;
        color: #777777; }
        .product_description_area .tab-content .total_rate .rating_list .list li a i {
          color: #fbd600; }
      .product_description_area .tab-content .total_rate .rating_list .list li:nth-child a i:last-child {
        color: #eeeeee; }
    .product_description_area .tab-content .table {
      margin-bottom: 0px; }
      .product_description_area .tab-content .table tbody tr td {
        padding-left: 65px;
        padding-right: 65px;
        padding-top: 14px;
        padding-bottom: 14px; }
        .product_description_area .tab-content .table tbody tr td h5 {
          font-size: 14px;
          font-family: "Roboto", sans-serif;
          font-weight: normal;
          color: #777777;
          margin-bottom: 0px;
          white-space: nowrap; }
      .product_description_area .tab-content .table tbody tr:first-child td {
        border-top: 0px; }

.review_item {
  margin-bottom: 15px; }
  .review_item:last-child {
    margin-bottom: 0px; }
  .review_item .media {
    position: relative; }
    .review_item .media .d-flex {
      padding-right: 15px; }
    .review_item .media .media-body {
      vertical-align: middle;
      align-self: center; }
      .review_item .media .media-body h4 {
        margin-bottom: 0px;
        font-size: 14px;
        color: #222222;
        font-family: "Roboto", sans-serif;
        margin-bottom: 8px; }
      .review_item .media .media-body i {
        color: #fbd600; }
      .review_item .media .media-body h5 {
        font-size: 13px;
        font-weight: normal;
        color: #777777; }
      .review_item .media .media-body .reply_btn {
        border: 1px solid #e0e0e0;
        padding: 0px 28px;
        display: inline-block;
        line-height: 32px;
        border-radius: 16px;
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #222222;
        position: absolute;
        right: 0px;
        top: 14px;
        @icnlude transition; }
        .review_item .media .media-body .reply_btn:hover {
          background: #ffba00;
          border-color: #ffba00;
          color: #fff; }
  .review_item p {
    padding-top: 10px;
    margin-bottom: 0px; }
  .review_item.reply {
    padding-left: 28px; }

.review_box h4 {
  font-size: 24px;
  color: #222222;
  margin-bottom: 20px; }
.review_box p {
  margin-bottom: 0px;
  display: inline-block; }
.review_box .list {
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px; }
  .review_box .list li {
    display: inline-block; }
    .review_box .list li a {
      display: inline-block;
      color: #fbd600; }
.review_box .contact_form {
  margin-top: 15px; }
.review_box .primary-btn {
  line-height: 38px !important;
  padding: 0px 38px;
  text-transform: uppercase;
  margin-right: 10px;
  border-radius: 5px;
  border: none; }

  .gradient-bg, .primary-btn, .add-bag .add-btn, .single-product .product-details .prd-bottom .social-info span:after, .grid-btn:hover, .list-btn:hover, .grid-btn.active, .list-btn.active, .pagination a.active, .pagination a:hover, .s_Product_carousel .owl-dots div.active, .s_product_text .card_area .icon_btn:after, .product_description_area .nav.nav-tabs li a.active, .blog-pagination .page-item.active .page-link, .single-footer-widget .click-btn {
    background-image: -moz-linear-gradient(45deg, #3f51b5 0%, #0277bd 45%, #03a9f4 100%);
  background-image: -webkit-linear-gradient(45deg, #3f51b5 0%, #0277bd 45%, #03a9f4 100%);
  background-image: -ms-linear-gradient(45deg, #3f51b5 0%, #0277bd 45%, #03a9f4 100%);}

/* End Single Product Area css
============================================================================================ */

    </style>
@endsection
@extends('users.default')
@section('content')
<div class="product_image_area" style="margin-top:30px; padding-bottom:50px;">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div id="carousel-example-1z" class="carousel slide my-2 " data-ride="carousel" data-interval="false">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                @if(count($produk_detail->produk_image) > 0)

                                @foreach($produk_detail->produk_image as $key => $images)
                                <li data-target="#carousel-example-1z" data-slide-to="{{$key}}" class="<?php if($key==0){echo "active";} ?>"></li>
                                @endforeach
                                @else
                                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                @endif
                            </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <!--First slide-->
                                @if(count($produk_detail->produk_image) > 0)
                                @foreach($produk_detail->produk_image as $key=> $images)
                                <div class="carousel-item  <?php if($key==0){echo "active";} ?>">
                                  <img class="d-block w-100 " src="{{ asset('storage/' .$images->image_path)}}" style="max-height:500px; min-height:300px;;">     
                                </div>
                                @endforeach
                                @else
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src="http://placehold.it/555x600" alt="First slide" >
                              </div>
                                @endif

                            </div>
                            <!--/.Slides-->
                            <!--Controls-->
                            <a class="carousel-control-prev" href="#carousel-example-1z" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1z" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
            <h3>{{$produk_detail->nama_produk}}</h3>
            <?php $nr = $produk_detail->rating;?>
            <div class="tests">
                @for($i = 0; $i < 5; $i++)
                    <span style="color:#ffc200"><i class="{{ $nr <= $i ? 'far fa-star' : 'fas fa-star' }}" aria-hidden="true"></i></span>
                @endfor
            </div>
						<h2>Rp {{number_format($produk_detail->harga,0, ".", ".")}}</h2>
						<ul style="list-style-type:none;" class="list">
              <li style="margin-left:-40px;"><a class="active" href="#"><span>Kategori</span> : 
                @if($produk_detail->subkategori)
                {{$produk_detail->subkategori->subkategori_name}}
                @else
                {{$produk_detail->kategori->kategori_name}}
                @endif
              </a>
            </li>
              <li style="margin-left:-40px;"><a href="#"><span>Ketersediaan</span> : 
                @if($produk_detail->stok > 0)
                {{$produk_detail->stok}}
                @else
                Habis
              @endif
          </a>
        </li>
        <li style="margin-left:-40px;"><a href="#"><span>Berat</span> : 
          {{$produk_detail->berat}} gram
        </a>
      </li>
      <li style="margin-left:-40px;"><a href="#"><span>Lokasi</span> : 
        {{$produk_detail->user->alamat->city_name}}
      </a>
    </li>
            </ul>
          <p>{{-- {{Cart::instance('default')->content()}} --}}</p>
  
            @guest
            
            <form action="{{ url('cart') }}" method="POST"  style="margin-top:-50px;">
              {{ @csrf_field() }}
					
						<div class="card_area d-flex align-items-center">
							<div>
                 
                  <input type="hidden" name="produk_id" value="<?php echo $produk_detail->id;?>">

                  @if($produk_detail->stok > 0)
                  <button type="submit" class="btn btn-primary" href="#">Beli</button>
                  @endif

                  @else
                  @if(Auth::user()->role->role_id == '1' && $produk_detail->stok > 0)


                  <form action="{{ url('cart') }}" method="POST"  style="margin-top:-50px;">
                    {{ @csrf_field() }}
                <div class="product_count">
                  <label for="qty">Jumlah:</label>
                  <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                  <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                   class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                  <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
                   class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                </div>
               
                <div class="card_area d-flex align-items-center">
                  <div>

                      <input type="hidden" name="produk_id" value="<?php echo $produk_detail->id;?>">
    

                      <button type="submit" class="btn btn-primary" href="#">Masukan Keranjang</button>
                      @else
                      
                      @endif

                  @endguest
                
              

                  </form>
               </div>
							{{-- <div><a class="btn btn-success" href="{{$produk_detail->link_tokped}}">Beli di Tokopedia</a></div>

              </div>
              <div class="card_area d-flex align-items-center">
                      <div><a class="btn btn-warning" href="{{$produk_detail->link_shopee}}">Beli di Shopee</a></div>
                      <div><a class="btn btn-danger" href="{{$produk_detail->link_bukalapak}}">Beli di Bukalapak</a> </div>

              </div> --}}
					
					</div>
				</div>
        </div>
    </div>
</div>
<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">INFORMASI PRODUK</a>
        </li>

          <li class="nav-item">
              <a class="nav-link" id="ulasan-tab" data-toggle="tab" href="#ulasan" role="tab" aria-controls="ulasan" aria-selected="true">ULASAN</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="diskusi-tab" data-toggle="tab" href="#diskusi" role="tab" aria-controls="diskusi" aria-selected="true">DISKUSI PRODUK</a>
            </li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
          <div style="color:black">
              {!! html_entity_decode($produk_detail->deskripsi) !!}

          </div>

        </div>
       {{--  <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
            <p>Deskripsi Detail/Cerita Kita Deskripsi Detail/Cerita Kita Deskripsi Detail/Cerita Kita Deskripsi Detail/Cerita Kita Deskripsi Detail/Cerita Kita Deskripsi Detail/Cerita Kita </p>
            
          </div> --}}

          <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
              <div class="row">
                <div class="col-lg-6">
                  <div class="row total_rate">
                    <div class="col-6">
                      <div class="box_total">
                        <h5>Rating</h5>
                        <h4>{{number_format($produk_detail->rating,1, ".", ".")}}</h4>
                      <h6>({{$produk_ulasan->total()}} Ulasan)</h6>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="review_list">
                   <div class="ajaxPaginationProduk">
                      @include('users.pagination.produkUlasan')
                   </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="diskusi" role="tabpanel" aria-labelledby="diskusi-tab">
              <div class="row">
                @guest
                <div class="col-lg-12">
                  <div class="review_box" style="margin-top:20px;">
                    <h4 style="text-align:center">Pertanyaan</h4>
                    <form class="row contact_form" action="javascript:void(0)" method="post" id="diskusiForm">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" id="form_name" name="name" placeholder="Nama" required>
                          <input type="hidden"  id="form_id" name="id" value="{{$produk_detail->id}}" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" name="message" id="form_message" rows="4" placeholder="Apa yang ingin Anda tanyakan mengenai produk ini?" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 text-right">
                        <button type="submit" id="ask-send" value="submit" class="btn btn-info">KIRIM</button>
                      </div>
                    </form>
                  </div>
                </div>
                @else
                @if(Auth::user()->role->role_id == '1')
                <div class="col-lg-12">
                  <div class="review_box" style="margin-top:20px;">
                    <h4 style="text-align:center">Pertanyaan</h4>
                    <form class="row contact_form" action="javascript:void(0)" method="post" id="diskusiForm">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" class="form-control" id="form_name" name="name" placeholder="Nama" required>
                          <input type="hidden"  id="form_id" name="id" value="{{$produk_detail->id}}" required>

                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" name="message" id="form_message" rows="4" placeholder="Apa yang ingin Anda tanyakan mengenai produk ini?" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 text-right">
                        <button type="submit" id="ask-send" value="submit" class="btn btn-info">KIRIM</button>
                      </div>
                    </form>
                  </div>
                </div>
                @endif
                @endguest
                <div class="col-lg-12">
                  <div class="comment_list">
                    <div class="ajaxPaginationDiskusi">
                      @include('users.pagination.diskusiProduk')
                   </div>
                  </div>
                </div>
              
              </div>
            </div>
		</div>
	</section>
@endsection
@section('js')

	<script>
        $(document).ready(function () {
          
            
         

        // PAGINATION Page Produk
      $('.ajaxPaginationProduk').on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var produk_id = "{{$produk_detail->id}}";
        console.log(produk_id)
        readPageProduk(produk_id, page)
      })

      $('.ajaxPaginationDiskusi').on('click', '.pagination a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var produk_id = "{{$produk_detail->id}}";
        console.log(produk_id)
        readPageDiskusi(produk_id, page)
      })

       // Request Page Produk
    function readPageProduk(produk_id, page) {
        $.ajax({
            url: '/produk/pagination/' + produk_id + '?page=' + page
        }).done(function (data) {
          console.log(data)
            $('.ajaxPaginationProduk').html(data);
            location.hash = page;
        })
    }

    function readPageDiskusi(produk_id, page) {
        $.ajax({
            url: '/diskusi/pagination/' + produk_id + '?page=' + page
        }).done(function (data) {
          console.log(data)
            $('.ajaxPaginationDiskusi').html(data);
            location.hash = page;
        })
    }


    $("button#ask-send").click(function () {
          console.log('readyss')
        var params = {
          'name' : $('#form_name').val(),
          'produk_id' : $('#form_id').val(),
          'message' :  $('#form_message').val(),
        }
          console.log(params)
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          contentType: "application/json",
          dataType: "json",
          type: 'POST',
          url: "/diskusi",
          data: JSON.stringify(params),
      success: function (results) {
        console.log(results);
        if(results['status'] == '1'){
          $('#diskusiForm')[0].reset();
          $( ".ajax_item" ).prepend( '<div class="review_item"><div class="media"><div class="d-flex"><img src="/images/user.png" alt="" style="height:50px; width:50px;"></div><div class="media-body"><h4>'+results['data']['nama']+'</h4><h5>'+ 'now' +'</h5></div></div> <p>'+results['data']['pesan']+'</p></div>' );
        }
    }
});
});
$(".ajaxPaginationDiskusi" ).on( "click","button#ask-detail-send", function() {
          console.log('readyss')
        var paramx = {
          'name' : $('#form_detail_name').val(),
          'diskusi_id' : $('#form_detail_id').val(),
          'message' :  $('#form_detail_message').val(),
        }
          console.log(paramx)
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          contentType: "application/json",
          dataType: "json",
          type: 'POST',
          url: "/diskusi-detail",
          data: JSON.stringify(paramx),
      success: function (results) {
        console.log(results);
        if(results['status'] == '1'){
          $('#diskusiDetailForm')[0].reset();
          $( ".ajax_detail" ).append( ' <div class="media"><div class="d-flex"><img src="/images/user.png" alt="" style="height:50px; width:50px;"></div><div class="media-body"><h4>'+results['data']['nama'] +'</h4><h5>'+ 'now' +'</h5></div></div><p>'+results['data']['pesan']+'</p>' );
        }
    }
});
});
$(".ajaxPaginationDiskusi" ).on( "click","button#hub-detail-send", function() {
          console.log('readyss')
        var paramx = {
          'diskusi_id' : $('#form_detail_id').val(),
          'message' :  $('#form_detail_message').val(),
        }
          console.log(paramx)
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          contentType: "application/json",
          dataType: "json",
          type: 'POST',
          url: "/diskusi-hub",
          data: JSON.stringify(paramx),
      success: function (results) {
        console.log(results);
        if(results['status'] == '1'){
          $('#diskusiDetailForm')[0].reset();
          $( ".ajax_detail" ).append( ' <div class="media"><div class="d-flex"><img src="/images/user.png" alt="" style="height:50px; width:50px;"></div><div class="media-body"><h4>'+results['data']['nama']+' - <button class="btn-outline-secondary btn-sm">Penjual</button></h4><h5>'+ 'now' +'</h5></div></div><p>'+results['data']['pesan']+'</p>' );
        }
    }
});
});
});
    </script>


@endsection