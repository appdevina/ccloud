@extends('layouts.master')

@section('content')
<div class="border-radius-xl mx-2 mx-md-3 position-relative" style="background-size: cover; background-color: white">
    <main class="main-content border-radius-lg h-100">
      <div class="section min-vh-85 position-relative transform-scale-0 transform-scale-md-7">
        <div class="container-fluid w-100">
          <div class="row pt-5">
            <div class="col-lg-12 col-md-12 ps-md-5 mb-5 mb-md-0">
              <div class="d-flex mb-5">
                <div class="me-auto">
                  <h1 class="display-1 font-weight-bold mt-n3 mb-0 text-black">Welcome</h1>
                  <h6 class="text-uppercase mb-0 ms-1 text-black">Choose an action</h6>
                </div>
              </div>
              <form action="/dashboard/menu" method="GET">
                <div class="row mt-4">
                    <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
                      <div class="card card-background align-items-start">
                        <div class="cursor-pointer w-100 !important">
                          <div class="full-background" style="background-color: #090089;"></div>
                          <div class="card-body">
                            <h5 class="text-white mb-0">UPLOAD</h5>
                            <p class="text-white text-sm">Upload your documentation</p>
                            <div class="d-flex mt-6">
                                <button type="submit" class="btn btn-outline-white btn-lg w-100">UPLOAD</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>                          
              </form>
                <div class="row mt-6 w-100">
                    <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
                      <div class="card align-items-start">
                        <div class="cursor-pointer w-100 !important">
                          <div style="background-color: #fff;"></div>
                          <div class="card-body">
                            <h5 class="text-black mb-0">HISTORY</h5>
                            <p class="text-black text-sm">Here's our latest activity</p>
                            <div class="d-flex mt-6">
                            <div class="table-responsive p-0">
                              <table class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th>HISTORY</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($activities as $a)
                                  <tr>
                                    <td>{{ $a->store->store_name .'  baru saja menambahkan  '. $a->filename }}</td>
                                  </tr>
                                  @endforeach
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
          </div>
        </div>
      </div>
    </main>
  </div>
@stop