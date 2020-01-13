@section('css')
    <style>
        /*============== contact_area css ================*/
.mapBox {
  height: 420px;
  margin-top: 80px;
  margin-bottom: 100px; }

.contact_info .info_item {
  position: relative;
  padding-left: 45px; }
  .contact_info .info_item i {
    position: absolute;
    left: 0;
    top: 0;
    font-size: 20px;
    line-height: 24px;
    color: #ffba00;
    font-weight: 600; }
  .contact_info .info_item h6 {
    font-size: 16px;
    line-height: 24px;
    color: "Roboto", sans-serif;
    font-weight: bold;
    margin-bottom: 0px;
    color: #222222; }
    .contact_info .info_item h6 a {
      color: #222222; }
  .contact_info .info_item p {
    font-size: 14px;
    line-height: 24px;
    padding: 2px 0px; }

.contact_form .form-group {
  margin-bottom: 10px; }
  .contact_form .form-group .form-control {
    font-size: 13px;
    line-height: 26px;
    color: #999;
    border: 1px solid #eeeeee;
    font-family: "Roboto", sans-serif;
    border-radius: 0px;
    padding-left: 20px; }
    .contact_form .form-group .form-control:focus {
      box-shadow: none;
      outline: none; }
    .contact_form .form-group .form-control.placeholder {
      color: #999; }
    .contact_form .form-group .form-control:-moz-placeholder {
      color: #999; }
    .contact_form .form-group .form-control::-moz-placeholder {
      color: #999; }
    .contact_form .form-group .form-control::-webkit-input-placeholder {
      color: #999; }
  .contact_form .form-group textarea {
    resize: none; }
    .contact_form .form-group textarea.form-control {
      height: 134px; }
.contact_form .primary-btn {
  background: #ffba00;
  color: #fff;
  margin-top: 20px;
  border: none;
  border-radius: 0; }

/* Contact Success and error Area css
============================================================================================ */
    </style>
    @endsection
@extends('users.default')

@section('content')


<div class="container">

<!--================Contact Area =================-->
<section class="section_gap_bottom" style="margin-top:30px; padding-bottom:40px;">
    <div class="container">
        <div id="map">
            <iframe width="100%" height="400px" frameborder="0" style="border:0; margin:0;"
            src="https://www.google.com/maps/embed/v1/place?q=Kemitraan%20Partnership%20For%20Governance%20Reform&key=AIzaSyAkf6QLWDuZKt6OSsN-SofihM4KsMocFZs" allowfullscreen></iframe>
          </div>
          <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Jakarta, Indonesia</h6>
                        <p> Jl. Taman Margasatwa No. 26C, Pasar Minggu, Jakarta 12550</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="#">087871214284</a></h6>
                        <p>Senin-Jumat 09:00-17:00</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="#">hairudinberry@gmail.com</a></h6>
                        <p>Senin-Jumat 09:00-17:00</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
</div>
<footer class="ftco-footer ftco-section" style="background-color:#f8f9fa">
    @include('users.partials.footer');
</footer> 

<!--================Contact Area =================-->


@endsection