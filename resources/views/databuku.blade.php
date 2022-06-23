@extends('layout.admin')

@section('content')
    
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard v2</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v2</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <a href="/tambahbuku" class="btn btn-success">Tambah +</a>
    <div class="row">
  
      <div class="row g-3 align-items-center mt-2">
            <div class="col-auto">
                  <form action="/perpustakaan" method="get">
                        <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                  </form>
            </div>
            <div class="col-auto">
      </div>
          @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
               {{ $message }}
          </div>
          @endif
          <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Descreption</th>
                    <th scope="col">Ditambah</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                      @php
                          $no = 1;
                      @endphp
                      @foreach ($data as $index =>  $row)
                      <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->isbn }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->created_at ->format('D M Y') }}</td>
                            <td>
                              <a href="/delete/{{ $row->id }}" class="btn btn-danger">Delete</a>
                              <a href="/tampildata/{{ $row->id }}" class="btn btn-info">Edit</a>
                            </td>
                          </tr>
                      @endforeach
                </tbody>
              </table>
              {{ $data->links() }}
    </div>
  </div>
</div>

@endsection