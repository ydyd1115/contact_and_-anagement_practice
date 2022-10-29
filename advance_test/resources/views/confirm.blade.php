<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTFrequest-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>内容確認</title>
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  <style>

    </style>
</head>
<body>
  <header>
    <h1>内容確認</h1>
  </header>
  <main>
    <div class="contact">
      <form class="contact__form" action="/add" method="post">
        @csrf
        <table  class="contact__table">
      <tr>
        <th>お名前<span>※</span></th>
        <td>
          <input class="contact__name" type="hidden" name="family_name" id="family_name" value="{{$contact['family_name']}}">
          <input class="contact__name" type="hidden" name="first_name" value="{{$contact['first_name']}}" >
          {{$contact['family_name']."　".$contact['first_name']}}
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          <input type="hidden" name="gender" value="{{$contact['gender']}}">
          
          @if($contact['gender']==1)
          男性
          @else
          女性
          @endif
          </td>
        </tr>
        <tr>
          <th>メールアドレス<span>※</span></th>
          <td>
            <input type="text" name="email" id="email" value="{{$contact['email']}}" readonly>
          </td>
        </tr>
        <tr>
          <th>郵便番号<span>※</span></th>
          <td>
            〒 <input type="text" name="postcode" id="postcode" value="{{$contact['postcode']}}" readonly>
          </td>
        </tr>
        <tr>
          <th>住所<span>※</span></th>
          <td>
            <input type="text" name="address" id="address" value="{{$contact['address']}}" readonly>
          </td>
        </tr>
        <tr>
          <th>建物名</th>
          <td>
            <input type="text" name="building_name" id="building_name" value="{{$contact['building_name']}}" readonly>
          </td>
        </tr>
        <tr>
          <th class="index_opinion">ご意見<span>※</span></th>
          <td>
            <textarea name="opinion"  cols="30" rows="10" value="{{$contact['opinion']}}" readonly>{{$contact['opinion']}}</textarea>
          </td>
        </tr>
      </table>
      <div  class="to-confirm" >
        <button class="to-confirm_btn" type="submit" value="">送信</button>
      </div>
      <div  class="to-confirm" >
        <button class="revice" type="submit" name="back" value="back">修正する</button>
      </div>
    </form>
  </div>
  </main>
</body>
</html>