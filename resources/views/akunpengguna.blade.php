@extends('layout.dasbormaster')
@section('akunpengguna', 'active')

@section('content')
  <div class="content">
    <div class="animated fadeIn">
      <div class="orders">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="box-title">Manajemen Pengguna</h4>
              </div>
              <div class="card-body--">
                <div class="table-stats order-table ov-h">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="id" name="id">#</th>
                        <th name="nama">Nama</th>
                        <th name="ortu">Email</th>
                        <th name="role">Role</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($users as $row)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $row->name }}</td>
                          <td>{{ $row->email ?? 'Tidak terhubung' }}</td>
                          <td>{{ $row->role }}</td>
                          {{-- lihat --}}
                          <td> <a href="{{ route('akun.edit', ['nama' => $row->name]) }}">
                              <button class="btn">
                                <span class="btn-label">
                                  <i class="fa fa-eye"></i>
                                </span>
                                Lihat
                              </button>
                            </a>
                          </td>
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
