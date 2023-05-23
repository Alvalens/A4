@extends('layout.dasbormaster')

@section('dasbor', 'active')

@section('css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
  <style>
    #clock {
      font-size: 4rem;
      font-family: sans-serif;
      color: #000000;
      margin-bottom: 10px;
    }
    body {
      overflow: hidden;
    }
  </style>
@endsection

@section('content')
  {{-- src --}}

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
              <div class="card-body align-items-center"
                style="display: flex; justify-content: center; align-items: center;">
                <img src="{{ url('assets/img/dasbor/selamatdatang.png') }}" alt="Logo">
              </div>
            </div>
          </div>
          <div class="card-body"></div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          {{-- add a digital clock --}}
          <div class="card-body">
            <h1 class="box-title">Jam </h1>
            <div id="clock"></div>
          </div>
        </div>
        <script>
          var clock = document.getElementById('clock');
          setInterval(function() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            if (hours < 10) hours = '0' + hours;
            if (minutes < 10) minutes = '0' + minutes;
            if (seconds < 10) seconds = '0' + seconds;
            clock.textContent = hours + ':' + minutes + ':' + seconds;
          }, 1000);
        </script>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title box-title">Daftar Kegiatan</h4>
            <div class="card-content">
              <div class="todo-list">
                <div class="tdl-content">
                  <ul style="list-style: none" id="list-kegiatan">
                    {{-- kegiatan --}}
                    <div id="default">
                      Tidak ada kegiatan
                    </div>
                  </ul>
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

    </div>
  </div>
  </div>
  <div class="clearfix"></div>
  {{-- jquery --}}

  <script>
    $(document).ready(function() {
      var username = "{{ auth()->user()->name }}";

      /*Get Site URL*/
      var SITEURL = "{{ url('/') }}";

      $.ajax({
        url: SITEURL + "/kegiatan",
        method: 'GET',
        success: function(response) {
          var kegiatanList = $('#list-kegiatan');
          if (!response.kegiatan.length == 0) {
            kegiatanList.empty();
          }

          $.each(response.kegiatan, function(index, kegiatan) {
            var kegiatanItem = $('<li>');
            var kegiatanContent = $('<div>').addClass('kegiatan');
            var tanggal = $('<span>').addClass('tanggal').text('(' + kegiatan.start + ')');
            var judul = $('<span>').addClass('judul').text(kegiatan.title);

            kegiatanContent.append(tanggal).append(judul);
            kegiatanItem.append(kegiatanContent);
            kegiatanList.append(kegiatanItem);
            tanggal.css('margin-right', '10px');
            judul.css('font-weight', 'bold');
          });
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });


      /*CSRF Token Setup*/
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      /*FullCalender JS*/
      var calendar = $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        editable: true,
        events: SITEURL + "/fullcalender",
        displayEventTime: false,
        editable: true,
        eventRender: function(event, element, view) {
          if (event.allDay === 'true') {
            event.allDay = true;
          } else {
            event.allDay = false;
          }
        },

        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          var title = prompt('Event Title:');
          if (title) {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
            $.ajax({
              url: SITEURL + "/fullcalenderAjax",
              data: {
                name: username,
                title: title,
                start: start,
                end: end,
                type: 'add'
              },
              type: "POST",
              success: function(data) {
                // remove the default message
                $('#default').remove();
                displayMessage("Event Created Successfully");
                calendar.fullCalendar('renderEvent', {
                  id: data.id,
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                }, true);
                calendar.fullCalendar('unselect');
                // also loop in the kegiatan list and add the new kegiatan
                var kegiatanList = $('#list-kegiatan');
                var kegiatanItem = $('<li>');
                var kegiatanContent = $('<div>').addClass('kegiatan');
                var tanggal = $('<span>').addClass('tanggal').text('(' + start + ')');
                var judul = $('<span>').addClass('judul').text(title);


                kegiatanContent.append(tanggal).append(judul);
                kegiatanItem.append(kegiatanContent);
                kegiatanList.append(kegiatanItem);
                // style the tanggal element to be more readable, also add a fixed space between the tanggal and judul elements
                tanggal.css('margin-right', '10px');
                // style the judul element to be more readable
                judul.css('font-weight', 'bold');
              },
              error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
                console.log(textStatus);
                console.log(errorThrown);
                alert("Error: " + errorThrown);
              },

            });
          }
        },
        eventDrop: function(event, delta) {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

          $.ajax({
            url: SITEURL + '/fullcalenderAjax',
            data: {
              title: event.title,
              start: start,
              end: end,
              id: event.id,
              type: 'update'
            },
            type: "POST",
            success: function(response) {
              displayMessage("Event Updated Successfully");
              // also loop in the kegiatan list and update the kegiatan
              var kegiatanList = $('#list-kegiatan');
              kegiatanList.children().each(function(index, kegiatanItem) {
                var judul = $(kegiatanItem).find('.judul').text();
                if (judul === event.title) {
                  $(kegiatanItem).find('.tanggal').text('(' + start + ')');
                }
              });
            }
          });
        },
        eventClick: function(event) {
          var deleteMsg = confirm("Do you really want to delete?");
          if (deleteMsg) {
            $.ajax({
              type: "POST",
              url: SITEURL + '/fullcalenderAjax',
              data: {
                id: event.id,
                type: 'delete'
              },
              success: function(response) {
                calendar.fullCalendar('removeEvents', event.id);
                displayMessage("Event Deleted Successfully");
                // also loop in the kegiatan list and remove the deleted kegiatan
                var kegiatanList = $('#list-kegiatan');
                kegiatanList.children().each(function(index, kegiatanItem) {
                  var judul = $(kegiatanItem).find('.judul').text();
                  if (judul === event.title) {
                    $(kegiatanItem).remove();
                    if (kegiatanList.children().length === 0) {
                      kegiatanList.append('<li id="default">Tidak ada kegiatan</li>');
                    }
                  }
                });
              }
            });
          }
        }
      });
    });

    /*Toastr Success Code*/
    function displayMessage(message) {
      toastr.success(message, 'Event');
    }
  </script>
@endsection

{{-- script --}}
@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
