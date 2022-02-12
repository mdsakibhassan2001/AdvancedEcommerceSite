
@extends('layouts.admin_master')
@section('product')
active show-sub
@endsection
@section('manage_product')
active
@endsection
@section('main_content')

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-20p">Image</th>
                  <th class="wd-20p">Product Name English</th>
                  <th class="wd-20p">Product Price</th>
                  <th class="wd-15p">Product Quantity</th>
                  <th class="wd-5p">Product Discount</th>
                  <th class="wd-5p">Status</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($products as $item)
                    <tr>
                      <td><img height="70px" width="80px" src="{{asset($item->product_thambnail)}}" alt=""></td>
                      <td>{{$item->product_name_en}}</td>
                      <td>{{$item->selling_price}}</td>
                      <td>{{$item->product_qty}}</td>
                      <td>
                        @if ($item->discount_price == null)

                            <span class="badge-pill badge-success">No</span>
                            @else

                                @php

                                    $amount = $item->selling_price - $item->discount_price;
                                    $discount = ($amount/$item->selling_price) * 100;

                                @endphp

                                <span class=" badge-pill badge-success">{{round($discount)}}%</span>

                        @endif


                      </td>
                      <td>
                        @if ($item->status==1)
                                <span class="badge-pill badge-success">Active</span>
                            @else
                            <span class="badge-pill badge-danger">Inactive</span>
                        @endif


                      </td>
                      <td>

                        <a class="btn btn-info btn-sm" href="{{route('product.edit',$item->id)}}"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-info btn-sm mt-2" href="{{route('product.edit',$item->id)}}"><i class="fa fa-pencil"></i></a>
                        @if ($item->status==1)
                           <a class="btn btn-info btn-sm mt-2" href="{{route('product.inactive',$item->id)}}"><i class="fa fa-arrow-down"></i></a>
                            @else
                            <a class="btn btn-info btn-sm mt-2" href="{{route('product.active',$item->id)}}"><i class="fa fa-arrow-up"></i></a>
                        @endif

                        <a class="btn btn-info btn-sm mt-2"  id="delete" href="{{route('product.delete',$item->id)}}"><i class="fa fa-trash"></i></a>
                      </td>

                    </tr>
                @endforeach

              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
           </div>

      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@endsection

