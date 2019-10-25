@extends('admin.default')

@section('content')
<div class="text-center" >
        <b>User</b>
        <h4 class="c-blue-900"><b>Data Mitra</b></h4>
      </div>
<div class="bgc-white p-20 bd">
        <button data-toggle="modal" data-target="#TrainerModals" class="btn btn-dark btn-md" title="{{ trans('app.add_button') }}">
          <b>Tambah Mitra</b></button>
        <div class="mT-30">
          <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Nomor Ponsel</th>
                  <th>Join</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
                 

@endsection
