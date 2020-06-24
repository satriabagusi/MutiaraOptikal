@extends('templates.print')
@section('title', 'Mutiara Optik - Add Employee')
@section('transaksi-baru', 'active')

@section('container')

@if (Session::has('status'))
      <div aria-live="polite" aria-atomic="true" style="position: absolute">
        <div class="toast bg-light rounded-lg" data-animation="true" data-delay="5000" data-autohide="false" style="position: absolute; top: 0; right: 0;">
          <div class="toast-header">
            <span class="rounded mr-2 bg-success" style="width: 15px;height: 15px"></span>
            <strong class="mr-auto text-bold text-black-50 mr-2">Mutiara Optik - {{Auth::user()->name}}</strong>
            <small>{{date('H:i:s')}}</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            {{ Session::get('status') }}
            <br/>
          </div>
        </div>
      </div>
      @endif
      
<div class="row justify-content-between">
    <div class="col-2">
        <h1>LOGO</h1>
    </div>

    <div class="col-6">
      <div class="row">
        <div class="col">
          <table style="width: 600px">
            <thead>
              <tr>
                <th colspan="3">Mutiara Optikal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="3">Jl. Indramayu</td>
              </tr>
              <tr>
                <td>No. Telp</td>
                <td>:</td>
                <td>0878-2878-3696</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td>chairulamri@gmail.com</td>
              </tr>
            </tbody>
            </table>
        </div>

      </div>
        
    </div>

    <div class="col-3">
      <div class="row">
        <div class="col">
          <table style="width: 300px">
            <tbody>
          @foreach ($transactions as $item)
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{date_format($item->created_at, "d M Y")}} </td>
              </tr>
              <tr>
                <td>Jam</td>
                <td>:</td>
                <td>{{date_format($item->created_at, "H:i:s ")}}</td>
              </tr>
              <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td>{{$item->patient->nama_pasien}}</td>
              </tr>
              <tr>
                <td>No Hp</td>
                <td>:</td>
                <td>{{$item->patient->no_hp}}</td>
              </tr>
            </tbody>
            </table>
        </div>
          @endforeach
        </div>
      </div>
</div>
</div>

<div class="row justify-content-center">
  <div class="col">
    @foreach ($transactions as $item)
      <p><b>No. Transaksi :  {{$item->no_transaksi}}</b></p>
    @endforeach    
  </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="thead text-white bg-primary">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Frame</th>
            <th scope="col">Jenis Lensa</th>
            <th scope="col">Harga Frame</th>
            <th scope="col">Harga Lensa</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($transactions as $item)
                
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->patient->nama_pasien}}</td>
            <td class="text-bold">{{$item->frame_type->frame_brand->frame_brand}} {{$item->frame_type->frame_type}}</td>
            <td>{{$item->lens_type}}</td>
            <td id="price">{{$item->frame_type->price}}</td>
            <td id="lens_price">{{$item->lens_price}}</td>
            <td id="total">{{$item->total_transaction}}</td>
            @endforeach
          </tr>
          <tr>
            <td align="right" colspan="6" class="">Total </td>
            @foreach ($transactions as $item)
            <td id="total_all">{{$item->total_transaction}}</td>
            @endforeach
          </tr>
          <tr>
            @foreach ($transactions as $item)
            @if ($item->keterangan !== null)
            <td colspan="7" colspan="text-small"><em>Keterangan : {{$item->keterangan}} </em></td>
            @else
            <td colspan="6"> - </td>
            @endif
            @endforeach
          </tr>
        </tbody>
      </table>
</div>

<div class="row justify-content-around">
  <div class="col-4">
    
    <div class="row">
      
      <div class="col">
        <p>Deposit</p>
        <p>Sisa</p>
        <p>Sales</p>
      </div>
      <div class="col">
        <p>:</p>
        <p>:</p>
        <p>:</p>
      </div>
      <div class="col">
        <p id="total_pay">{{$item->total_pay}}</p>
        <p id="remain">{{(int)$item->total_transaction - (int)$item->total_pay}}</p>
        <p>{{$item->user->name}}</p>
      </div>

    </div>
    
  </div>

  <div class="col-4">
    <div class="row justify-content-center">
      <div class="col">
        <table style="width: 400px">
          <tbody>
            <tr>
              <td>&nbsp;</td>
              <td>Sph</td>
              <td>Cyl</td>
              <td>Axis</td>
              <td>Add</td>
              <td>Mpd</td>
              <td>PV</td>
            </tr>
            <tr>
            <td><strong>L</strong></td>
            </tr>
            <tr>
              <td><strong>R</strong></td>
            </tr> 

          </tbody>
        </table>
    </div>
  </div>
</div>

  <div class="col-4">

    <div class="row justify-content-center">
  
        <div class="col">
          <p class="text-center">Ttd,</p>
          <p>&nbsp;</p>
          <p class="text-center">(&nbsp;&nbsp;&nbsp; {{$cashier->user->name}} &nbsp;&nbsp;&nbsp;)</p>
        </div>
  
      </div>

  </div>


  
</div>

<div class="row justify-content-end">
  <div class="col-auto"  id="printbtn">
    <a href="javascript:window.print();" class="btn btn-lg btn-success">Print</a>
    <a href="/transaction/new-transaction" class="btn btn-lg btn-danger">Kembali</a>
  </div>
</div>


@endsection