@extends('layouts.master')

@section('content')
<div class="border-radius-xl mx-2 mx-md-3 position-relative" style="background-size: cover; background-color: white">
    <main class="main-content border-radius-lg h-100">
      <div class="section min-vh-85 position-relative transform-scale-0 transform-scale-md-7">
        <div class="container-fluid">
          <div class="row pt-5">
            <div class="col-lg-12 col-md-12 ps-md-5 mb-5 mb-md-0">
              <div class="d-flex mb-5">
                <div class="me-auto">
                  <h3 class="text-uppercase mb-0 ms-1 text-black">Pick a category to backup your file</h3>
                </div>
              </div>
              <form action="/sales" method="GET">
              <div class="row mt-4">
                <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
                  <div class="card card-background move-on-hover align-items-start">
                    <div class="cursor-pointer w-100 !important">
                      <div class="full-background" style="background-color: #090089;"></div>
                      <div class="card-body">
                        <h5 class="text-white mb-0">Sales</h5>
                        <p class="text-white text-sm">Upload your Sales documentation</p>
                        <div class="d-flex mt-5">
                            <button type="submit" class="btn btn-outline-white btn-lg w-100">UPLOAD SALES</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </form>
              <form action="/activity" method="GET">
                <div class="row mt-4">
                    <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
                    <div class="card card-background move-on-hover align-items-start">
                        <div class="cursor-pointer w-100 !important">
                        <div class="full-background" style="background-color: #22559C"></div>
                        <div class="card-body">
                            <h5 class="text-white mb-0">Activity</h5>
                            <p class="text-white text-sm">Upload your Activity documentation</p>
                            <div class="d-flex mt-5">
                                <button type="submit" class="btn btn-outline-white btn-lg w-100">UPLOAD ACTIVITY</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
              </form>
              <form action="/visibility" method="GET">
              <div class="row mt-4">
                <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
                  <div class="card card-background move-on-hover align-items-start">
                    <div class="cursor-pointer w-100 !important">
                      <div class="full-background" style="background-color: #2E89BA;"></div>
                      <div class="card-body">
                        <h5 class="text-white mb-0">Visibility</h5>
                        <p class="text-white text-sm">Upload your Visibility documentation</p>
                        <div class="d-flex mt-5">
                            <button type="submit" class="btn btn-outline-white btn-lg w-100">UPLOAD VISIBILITY</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </form>
              <form action="/stockopname" method="GET">
              <div class="row mt-4">
                <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
                  <div class="card card-background move-on-hover align-items-start">
                    <div class="cursor-pointer w-100 !important">
                      <div class="full-background" style="background-color: #64D7D6;"></div>
                      <div class="card-body">
                        <h5 class="text-white mb-0">Stock Opname</h5>
                        <p class="text-white text-sm">Upload your Stock Opname documentation</p>
                        <div class="d-flex mt-5">
                            <button type="submit" class="btn btn-outline-white btn-lg w-100">UPLOAD STOCK OPNAME</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
@stop