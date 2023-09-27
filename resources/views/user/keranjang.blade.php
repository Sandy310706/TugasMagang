<table>
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Daftar Produk</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($keranjangs as $keranjang)
        {{$keranjang ->menu_id}}
        {{$keranjang ->nama}}
        <img src="{{ asset('storage/img/' . $makanans->foto) }}"alt="">
        {{$keranjang ->harga}}
      @endforeach
    </tbody>
</table>
