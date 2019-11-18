@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Cerita</b>
    <h4 class="c-blue-900"><b>Kelola Cerita</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <a href="#" class="btn btn-primary btn-md" title="{{ trans('Tambah Cerita') }}"><b><i class="fa fa-plus"></i> Cerita Baru</b></a>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th width="150px">Judul</th>
                    <th>Cerita</th>
                    <th>Pembuat</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                   
              
                <tr>
                    <td> 
                       
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                            <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" title="{{ trans('Edit Produk') }}" class="btn btn-dark px-3 btn-sm">
                                            <span class="ti-pencil"></span>
                                        </a>
                                    </li>
                            </ul>
                      
                    </td>
                  
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

