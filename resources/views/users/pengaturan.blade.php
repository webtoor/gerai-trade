@extends('users.default')

@section('content')


<div class="container-fluid">
    <div class="row">
    @include('users.partials.sidebar')
    <div class="col-sm-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:10px;">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="true">Wishlist</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">

                    <div class="row" style="margin-top:50px;">
                                
                                   <div class="col-lg-3 col-sm-4">
                               <div class="single-product">
                                       <div class="card">
                                           <div class="view overlay">
                                                                                                         
                                               <a href="#">
                                                           <div class="mask rgba-white-slight"></div>
                                               </a>
                                           </div>
                                           
                               </div>
                           </div>
                       </div>
                     </div>
                           
                           

 
@endsection