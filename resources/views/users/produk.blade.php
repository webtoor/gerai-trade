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
      font-size: 14px;
      font-family: "Roboto", sans-serif;
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
    font-size: 14px;
    color: #777777;
    font-family: "Roboto", sans-serif;
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
    background: #e8f0f2;
    text-align: left;
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
  background: -webkit-linear-gradient(90deg, #ffba00 0%, #ff6c00 100%);
  background: -moz-linear-gradient(90deg, #ffba00 0%, #ff6c00 100%);
  background: -o-linear-gradient(90deg, #ffba00 0%, #ff6c00 100%);
  background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%); }

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
                                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                            </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <!--First slide-->
                                @if(count($produk_detail->produk_image) > 0)
                                @foreach($produk_detail->produk_image as $images)
                                <div class="carousel-item active">
                                  <img src="{{ asset('storage/' .$images->image_path)}}">     
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
						<h2>Rp {{number_format($produk_detail->harga,0, ".", ".")}}</h2>
						<ul style="list-style-type:none;" class="list">
              <li style="margin-left:-40px;"><a class="active" href="#"><span>Kategori</span> : 
                @if($produk_detail->subkategori)
                {{$produk_detail->subkategori->subkategori_name}}
                @else
                {{$produk_detail->kategori->kategori_name}}
                @endif
              </a></li>
              <li style="margin-left:-40px;"><a href="#"><span>Ketersediaan</span> : 
                @if($produk_detail->stok > 0)
                Tersedia
                @else
                Habis
              @endif
          </a></li>
						</ul>
            <div>
              {!! html_entity_decode($produk_detail->deskripsi) !!}
            
            </div>
						<div class="product_count">
							<label for="qty">Jumlah:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="card_area d-flex align-items-center">
							<div><a class="btn btn-primary" href="#">Masukan Keranjang</a> </div>
							<div><a class="btn btn-success" href="https://www.tokopedia.com">Beli di Tokopedia</a></div>

                        </div>
                        <div class="card_area d-flex align-items-center">
                                <div><a class="btn btn-warning" href="https://www.shopee.co.id">Beli di Shopee</a></div>
                                <div><a class="btn btn-danger" href="https://www.bukalapak.com">Beli di Bukalapak</a> </div>
    
                        </div>
					
					</div>
				</div>
        </div>
    </div>
</div>
{{-- <section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" style="margin-left: 30px;">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
        </li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				</div>
				
			</div>
		</div>
	</section> --}}
@endsection
@section('js')

	<script>
      /*   $(document).ready(function () {
            $(".s_Product_carousel").owlCarousel({
                
            });
            
            }); */
    </script>


@endsection