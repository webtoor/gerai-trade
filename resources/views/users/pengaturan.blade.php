@extends('users.default')

@section('content')


<div class="container-fluid">
    <div class="row">
    @include('users.partials.sidebar')
    <div class="col-sm-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:10px;">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="true">Alamat Pengiriman</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">

                    <div class="row" style="margin-top:40px;">
                      <div class="col-sm-12">
                        <a href="#" class="btn btn-primary btn-md" title="{{ trans('Tambah Cerita') }}"><b><i class="fa fa-plus"></i> Tambah Alamat Baru</b></a>
                        <div class="mT-20">
                            <table class="table table-bordered" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="150px">Penerima</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Daerah Pengiriman</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <tr>
                                        <td></td>
                                        
                                        <td> </td>
                                        <td></td>
                                        <td></td>
                                        
                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                             
                     </div>
                           
            </div>
          </div>    
    </div>
    </div>       
</div>
 
@endsection