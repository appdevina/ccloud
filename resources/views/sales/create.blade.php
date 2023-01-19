@extends('layouts.master')

@section('content')
<div class="border-radius-xl mx-2 mx-md-3 position-relative" style="background-size: cover; background-color: white">
    <main class="main-content border-radius-lg h-100">
      <div class="section min-vh-85 position-relative transform-scale-0 transform-scale-md-7">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
          <div class="row pt-0">
            <div class="col-lg-12 col-md-12 ps-md-5 mb-5 mb-md-0 mt-5">
                <div class="p-4">
                    <form action="/sales" method="POST" enctype="multipart/form-data">
                    @csrf
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="store_id" id="store_id" required>
                            <option value="">-- Pilih Toko --</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->store_name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <div class="input-group input-group-static mb-4">
                            <label>Unit Terjual</label>
                            <input type="text" class="form-control" name="unit_sold" id="unit_sold" required>
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>IMEI</label>
                            <input type="text" class="form-control" name="imei" id="imei" required>
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="inputSales" class="form-label">Sales</label><br>
                            <input type="file" name="sales" class="form-control-file">
                        </div>
                        <div class="d-flex mt-5">
                            <button type="submit" class="btn btn-outline-info btn-lg w-100">UPLOAD</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
@stop