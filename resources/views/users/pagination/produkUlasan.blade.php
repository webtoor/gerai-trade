@foreach($produk_ulasan as $produk_ulasans)
<div class="review_item">
  <div class="media">
    <div class="d-flex">
      <img src="/images/profiluser.png" alt="" style="height:30px; width:30px;">
    </div>
    <div class="media-body">
    <h4>{{$produk_ulasans->user->nama_depan}} {{$produk_ulasans->user->nama_belakang}}</h4>
      <?php $nr = $produk_ulasans->rating;?>
      <div class="tests">
          @for($i = 0; $i < 5; $i++)
              <span style="color:#ffc200"><i class="{{ $nr <= $i ? 'far fa-star' : 'fas fa-star' }}" aria-hidden="true"></i></span>
          @endfor
      </div>
    </div>
  </div>
  <p>{{$produk_ulasans->ulasan}}</p>
</div>


@endforeach

{{ $produk_ulasan->render() }}
