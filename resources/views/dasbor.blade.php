@extends('layout.dasbormaster')
@section('dasbor','active')

@section('content')

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="box-title">Kartu Selamat Datang</h1>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card-body align-items-center" style="display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ url('assets/img/dasbor/selamatdatang.png') }}" alt="Logo">
                                </div> 
                            </div>
                        </div> 
                        <div class="card-body"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title box-title">Daftar Kegiatan</h4>
                            <div class="card-content">
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i class="check-box"></i><span>Menambah materi untuk semester depan...</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-plus"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i class="check-box"></i><span>Mengisi rapor siswa</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-plus"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i class="check-box"></i><span>Istirahat dan turu</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-plus"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i class="check-box"></i><span>Istirahat dan turu</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-plus"></a>
                                                    </label>
                                                </li>

                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i class="check-box"></i><span>Istirahat dan turu</span>
                                                        <a href='#' class="fa fa-times"></a>
                                                        <a href='#' class="fa fa-pencil"></a>
                                                        <a href='#' class="fa fa-plus"></a>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                
                    <div class="card">
                        <div class="card-body">
                            <div class="calender-cont widget-calender">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Modal TODOLIST -->
            <div class="modal fade none-border" id="event-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add New Event</strong></h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal TODOLIST -->

            <!-- Modal CALENDER -->
            <div class="modal fade none-border" id="add-category">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Tambah Nategori </strong></h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Nama Kategori</label>
                                        <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Pilih Warna Kategori</label>
                                        <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                            <option value="success">Selesai</option>
                                            <option value="danger">Penting</option>
                                            <option value="info">Info</option>
                                            <option value="pink">Emosi</option>
                                            <option value="primary">Biasa</option>
                                            <option value="warning">Waspada</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal CALENDER -->

        </div>
    </div>
    <div class="clearfix"></div>
    
@endsection