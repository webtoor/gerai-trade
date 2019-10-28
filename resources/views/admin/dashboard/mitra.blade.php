@extends('admin.default')

@section('content')
<div class="text-center">
    <b>User</b>
    <h4 class="c-blue-900"><b>Data Mitra</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <button data-toggle="modal" data-target="#TrainerModals" class="btn btn-primary btn-md" title="{{ trans('app.add_button') }}">
        <b><i class="fa fa-plus"></i> Tambah Mitra</b></button>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Ponsel</th>
                    <th>Join</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($mitra as $mitras)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$mitras->user->nama_depan}} {{$mitras->user->nama_belakang}}</td>
                    <td>{{$mitras->user->email}}</td>
                    <td>{{$mitras->user->nomor_ponsel}}</td>
                    <td>{{ date("j M Y", strtotime($mitras->user->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
