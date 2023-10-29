<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>顧客一覧</h1>
    <table border="solid">
        <tr>
            <th>id</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
    @foreach ($customers as $customer)
        <tr>
            <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->id }}</a></td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->mail }}</td>
            <td>{{ $customer->zipcode }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->tel }}</td>
        </tr>
    @endforeach
    </table>

    <button onclick="location.href='{{ route('customers.create') }}'">新規登録</button>
</body>
</html>
