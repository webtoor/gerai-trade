@extends('admin.default')

@section('content')
<div class="masonry-item  w-100">
        <div class="row gap-20">

           <!-- Organization ==================== -->
           <div class='col-md-3'>
              <div class="layers bd bgc-white p-20">
                  <div class="layer w-100 mB-10">
                      <h6 class="lh-1">Jumlah Member</h6>
                  </div>
                  <div class="layer w-100">
                      <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                              <span id="sparklinedash4"></span>
                          </div>
                          <div class="peer">
                              <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">
                                  {{$jumlah_member}}
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
             <!-- Total Admins ==================== -->
             <div class='col-md-3'>
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Jumlah Mitra</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                                <span id="sparklinedash3"></span>
                            </div>
                            <div class="peer">
                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">
                                {{$jumlah_mitra}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="bgc-white p-20 bd">
         
            <div class="mT-30">
                <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Ponsel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                               {{--  <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <button id="showModalMitra" data-toggle="modal" data-target="#showMitra" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                        data-nama="{{$mitras->user->nama_depan}} {{$mitras->user->nama_belakang}}" data-alamat="{{$mitras->alamat['alamat']}}" data-provinsi="{{$mitras->alamat['provinsi']['name']}}"
                                        data-kota_kabs="{{$mitras->alamat['kota_kabupatens']['name']}}" data-kecamatans="{{$mitras->alamat['kecamatans']['name']}}" data-kel_dess="{{$mitras->alamat['kelurahan_desa']['name']}}"
                                        >
                                                <span class="ti-zoom-in"></span>
                                        </button>
                                        </li>
                                </ul> --}}
                            </td>
                          
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

@endsection
