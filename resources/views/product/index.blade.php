<table border='1'>
    <thead>
    <tr>
        <th>ID</th>
        <th>商品コード</th>
        <th>商品名</th>
        <th>商品価格</th>
        <th>商品詳細</th>
        <th>備考</th>

    </tr>
    </thead>

    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }} </td>
            <td>{{ $product->product_code }} </td>
            <td>
                <form action="/cart/index" method="post">
                    <?=csrf_field()?>
                    <input type="submit" value="add">
                    <input type="hidden" name="delete_id" value="<?=$->?>">
                </form>
            </td>
            <td>{!! link_to(action('CartController@add', ['id' => $product->id , 'qty' => 1]), $product->product_name) !!}</td>
            <td>{{ $product->product_price }} </td>
            <td>{{ $product->product_detail }} </td>
            <td>{{ $product->product_remarks }} </td>
        </tr>
    @endforeach
    </tbody>
</table>