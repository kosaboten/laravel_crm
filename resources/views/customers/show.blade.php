<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="solid">
        <tr>
            <th>id</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        <tr>
            <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->id }}</a></td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->mail }}</td>
            <td>{{ $customer->zipcode }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->tel }}</td>
        </tr>
    </table>
    <div class="button-group">
        <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧へ戻る</button>
        <button type="button" onclick="location.href='{{ route('customers.edit', $customer) }}'">編集する</button>
        <form action="{{ route('customers.destroy', $customer) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="if(!confirm('削除していいですか?')){return false}">削除する</button>
        </form>
    </div>
</body>
</html>
