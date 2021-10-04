@extends('homepage.layouts.app')

@section('title')
<title>Data Kehutanan - {{ env('APP_NAME') }}</title>
@endsection

@section('extraCss')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<main id="main">

  <div class="block"></div>

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12">
          <p class="mb-5">
            <select class="form-group form-select form-select-sm" aria-label=".form-select-sm example" id="category_id">
              <option value="" selected>Pilih Kategori Dokumen</option>
              @foreach($categories as $key => $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
          </p>
          <div class="table-responsive">
            <table id="document_table" class="hover" style="width: 100%;">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Dokumen</th>
                  <th>File Dokumen</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @foreach($documents as $key => $item)
                <tr>
                  <td>{{$no++}}.</td>
                  <td>{{$item['name']}}</td>
                  <td>
                    <a href="{{$item->file_url}}" target="_blank" class="btn btn-info btn-sm">Lihat Data</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Counts Section -->

</main><!-- End #main -->
@endsection


@section('extraJs')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  let flagURL = "{{route('homepage.forestry.search')}}";
  $(document).ready(function() {
    $('#document_table').dataTable();
  });

  $('#category_id').change(function() {
    let category_id = $(this).val();
    $.ajax({
      url: flagURL,
      method: "GET",
      data: {
        category_id: category_id,
      },
      dataType: 'json',
      success: function(data) {
        $('#document_table').dataTable({
          processing: true,
          destroy: true,
          data: data.result,
          columns: [{
              render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1 + ".";
              }
            },
            {
              render: function(data, type, row, meta) {
                return row.name;
              }
            },
            {
              render: function(data, type, row, meta) {
                return '<a href="' + row.file_url + '" target="_blank" class="btn btn-info btn-sm">Lihat Data</a>';
              }
            }
          ]
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });
</script>
@endsection