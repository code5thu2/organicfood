<h2>Xin chào {{$cus_name}}</h2>
<p>Bạn đã đặt hàng thành công</p>
<h3>Thông tin đơn hàng</h3>
<h4>Mã đơn hàng: {{$order->id}}</h4>
<h4>Ngày đặt: {{$order->created_at}}</h4>
<h3>Chi tiết sản phẩm:</h3>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1; ?>
        @foreach($items as $key => $item)
        <tr>
            <td scope="row">{{$stt}}</td>
            <td>{{$item['name']}}</td>
            <td>{{number_format($item['price'])}} VND</td>
            <td>{{$item['quantity']}}</td>
            <td>{{number_format($item['quantity']*$item['price'])}} VND</td>
        </tr>
        <?php $stt++; ?>
        @endforeach
    </tbody>
</table>