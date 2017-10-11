@extends('master')
@section('content')

      <!--medByCat -->
    <div class="medByCat">
        <div class="container">
            <div class="row ">

                <div class="col-md-12">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#!">Home</a></li>
                      <li class="breadcrumb-item"><a href="#!">Library</a></li>
                      <li class="breadcrumb-item active">Data</li>
                    </ol>
                </div>


                <div class="col-md-8">
                    <div class="cart-medList">
                        <h3 class="display-5">Shopping Cart</h3>
                        <table class="table ">
                            <thead>
                                <tr class="font-weight-bold">
                                    <td>Image</td>
                                    <td>Product Description</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                </tr>
                            </thead>
                          <tbody>
                              <tr>
                                  <td>
                                      <img src="/images/200x200.jpg" alt="" width="70px" />
                                      <div class="text-micro text-danger">
                                         X remove
                                      </div>
                                  </td>
                                  <td>
                                      <h6><a href="">Product Name</a></h6>
                                      <p>Lorem Pixlem lohkro fgheojd drodfkj dfoes dowejdf dfhrojksf dfkdhfe akdjf </p>
                                  </td>
                                  <td>
                                      <input type="number" class="form-control"value="0">
                                  </td>
                                  <td>$200.00</td>
                              </tr>
                              <tr>
                                  <td>
                                      <img src="/images/200x200.jpg" alt="" width="70px" />
                                      <div class="text-micro text-danger">
                                         X remove
                                      </div>
                                  </td>
                                  <td>
                                      <h6><a href="">Product Name</a></h6>
                                      <p>Lorem Pixlem lohkro fgheojd drodfkj dfoes dowejdf dfhrojksf dfkdhfe akdjf </p>
                                  </td>
                                  <td>
                                      <input type="number" class="form-control"value="0">
                                  </td>
                                  <td>$200.00</td>
                              </tr>
                              <tr>
                                  <td>
                                      <img src="/images/200x200.jpg" alt="" width="70px" />
                                      <div class="text-micro text-danger">
                                         X remove
                                      </div>
                                  </td>
                                  <td>
                                      <h6><a href="">Product Name</a></h6>
                                      <p>Lorem Pixlem lohkro fgheojd drodfkj dfoes dowejdf dfhrojksf dfkdhfe akdjf </p>
                                  </td>
                                  <td>
                                      <input type="number" class="form-control"value="0">
                                  </td>
                                  <td>$200.00</td>
                              </tr>
                              <tr>
                                  <td>
                                      <img src="/images/200x200.jpg" alt="" width="70px" />
                                      <div class="text-micro text-danger">
                                         X remove
                                      </div>
                                  </td>
                                  <td>
                                      <h6><a href="">Product Name</a></h6>
                                      <p>Lorem Pixlem lohkro fgheojd drodfkj dfoes dowejdf dfhrojksf dfkdhfe akdjf </p>
                                  </td>
                                  <td>
                                      <input type="number" class="form-control"value="0">
                                  </td>
                                  <td>$200.00</td>
                              </tr>
                          </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="cart-summary">
                        <h5>Cart summary</h5>
                        <table class="table ">
                          <tbody>
                              <tr>
                                  <td>Sub-total: </td>
                                  <td> $12.10</td>
                              </tr>
                              <tr>
                                  <td>0% Sales Tax (Edit): </td>
                                  <td> $0.00</td>
                              </tr>
                              <tr>
                                  <td>Shipping: </td>
                                  <td> $0.00</td>
                              </tr>
                              <tr>
                                  <td><h6>Grand Total:</h6> </td>
                                  <td> $12.10</td>
                              </tr>
                              <tr>
                                  <td><a href="/" class="btn btn-secondary">Continue Shopping</a></td>
                                  <td><a href="/" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Checkout</a></td>
                              </tr>
                          </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush
