@extends('layout.dasbormaster')
@section('datasiswa','active')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Data Siswa </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="id" name="id">#</th>
                                            <th name="nama">Nama Siswa</th>
                                            <th name="ortu">Nama OrangTua</th>
                                            <th name="waktubelajar">Waktu Belajar</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->nama_user }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->waktu_belajar }}</td>
                                                <td><span href="rapor.html" class="badge badge-complete">Rapor</span></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No records found.</td>
                                            </tr>
                                        @endforelse
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