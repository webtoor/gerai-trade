@section('css')
<link rel="stylesheet" type="text/css" href="../css/banner.css">
@endsection
@extends('users.default')
@section('content')

<section class="banner-area organic-breadcrumb" style="margin-top:-40px;">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                <div class="col-first">
                    <h1>Keranjang Belanja</h1>
                </div>
            </div>
        </div>
    </section>

    @if(count(Cart::content()))
        <div class="container" style="margin-top:-30px;">
          <div class="row bar">
            
            <div id="basket" class="col-lg-8">
              <div class="box mt-0 pb-0 no-horizontal-padding">
                <form action="#" method="POST">
                  {{ @csrf_field() }}
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Produk</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach(Cart::content() as $row) :?>
                        <tr>
                          <td><a href="#"><?php echo $row->name; ?></a></td>
                          <td>
                            <input type="hidden" name="rowid" value="{{ $row->rowId }}">
                            <input type="number" value="<?php echo $row->qty; ?>" class="form-control" name="qty" style="width:70px;">
                          </td>
                          <td>Rp {{number_format($row->price,0, ".", ".")}}</td>
                          <td>
                            <button style="border: none;background: none;" type="submit"><i class="fas fa-sync-alt green-text"></i>
                            </button>
                          </td>
                          <td>
                             <a href="{{ url('/cart-delete/'.$row->rowId) }}"><i class="fa fa-trash red-text" aria-hidden="true"></i>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach;?>
                         </form>
                      </tbody>
                      <tfoot>
                       
                      </tfoot>
                    </table>
                  </div>
              
                </form>
              </div>
            </div>
            <div class="col-lg-4" style="margin-top:10px;">
                    <div id="order-summary" class="card box mt-0 mb-4 p-0">
                            <div class="card-body">
                              <h6 class="card-title"><b>Ringkasan Belanja</b></h6>
                              <div class="table-responsive">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td>Total Harga</td>
                                          <th><?php echo Cart::total(); ?></th>
                                      </tr>
                                      </tbody>
                                    </table>
                  
                                  </div>
                              <a href="#" class="btn btn-outline-dark btn-block"><b>Beli ({{ Cart::count() }})</b></a>

                            </div>
                          </div>
            
            </div>
            
          </div>
        </div>
        @else
        <div class="text-center">
            <p>Wah, keranjang Anda kosong nih </p>
            <a href="/" class="btn btn-primary">Belanja</a>
        </div>
        @endif
@endsection