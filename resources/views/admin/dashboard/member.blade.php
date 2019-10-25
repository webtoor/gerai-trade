@extends('admin.default')

@section('content')
<div class="text-center">
    <b>User</b>
    <h4 class="c-blue-900"><b>Data Member</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Ponsel</th>
                    <th>Join</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($member as $members)
                <tr>
                    <td>{{$members->user->nama_depan}} {{$members->user->nama_belakang}}</td>
                    <td>{{$members->user->email}}</td>
                    <td>{{$members->user->nomor_ponsel}}</td>
                    <td>{{ date("j M Y", strtotime($members->user->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
