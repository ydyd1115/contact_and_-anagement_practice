<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.zip2addr.js') }}"></script>
  <script>
    function toHalfWidth(elm) {
        return elm.value.replace(/[Ａ-Ｚａ-ｚ０-９！-～]/g, function(s){
            return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
        });
    }
  </script>
  <title>お問い合わせ</title>
</head>
<body>
  <header>
    <h1>お問い合わせ</h1>
  </header>
  <main>
  <div class="contact">
    <form class="contact__form" action="/confirm" method="post">
      @csrf
      <table class="contact__table">
        <tr>
          <th>
            <label for="family_name" >
            お名前<span>※</span>
            </label>
          </th>
          <td class="contact__fullname">
            <input class="contact__name" type="text" name="family_name" id="family_name" value="{{old('family_name')}}">
            <input class="contact__name" type="text" name="first_name" value="{{old('first_name')}}">
          </td>
        </tr>
        <tr class="contact__example">
          <th></th>
          <td class="contact__example__fullname">
            <p class="contact__example__name">例）山田</p>
            <p class="contact__example__name">例）太郎</p>
          </td>
        @if ($errors->has('family_name'))
        <tr>
          <th></th>
          <td class="error-message">{{$errors->first('family_name')}}</td>
        </tr>
        @endif
        @if ($errors->has('first_name'))
        <tr>
          <th></th>
          <td class="error-message">{{$errors->first('first_name')}}</td>
        </tr>
        @endif
      </tr>
      <tr>
        <th>性別</th>
        <td>
          <input type="radio" name="gender" value="1" 
            <?php if(empty($_POST['gender'])){echo 'checked';}
            else if( !empty($_POST['gender']) && $_POST['gender'] === "1" ){ echo 'checked'; } ?>>男性
          <input type="radio" name="gender" value="2"
            <?php if( !empty($_POST['gender']) && $_POST['gender'] === "2" ){ echo 'checked'; } ?>>女性
        </td>
      </tr>
      <tr>
        <th>
          <label for="email">
            メールアドレス<span>※</span>
          </label>
        </th>
        <td>
          <input class="contact__forms" type="text" name="email" id="email" value="{{old('email')}}">
        </td>
      </tr>
      <tr class="contact__example">
        <th></th>
          <td>
            例）test@example.com
          </td>
      </tr>
      @if ($errors->has('email'))
      <tr>
        <th></th>
        <td class="error-message">{{$errors->first('email')}}</td>
      </tr>
      @endif
      <tr>
        <th>
          <label for="postcode">
            郵便番号<span>※</span>
          </label>
        </th>
        <td>
        〒<input class="postcode" type="text" name="postcode" id="postcode" 
                  value="{{old('postcode')}}" onKeyUp="$('#postcode').zip2addr('#address');" onblur="toHalfWidth(this)">
        </td>
      </tr>
      <tr class="contact__example">
        <th></th>
        <td>
          例）123-4567　※3ケタ - (ハイフン) 4 ケタで入力してください
        </td>
      </tr>
      @if ($errors->has('postcode'))
      <tr>
        <th></th>
        <td class="error-message">{{$errors->first('postcode')}}</td>
      </tr>
      @endif
      <tr>
        <th>
          <label for="address">
            住所<span>※</span>
          </label>
        </th>
          <td>
            <input class="contact__forms" type="text" name="address" id="address" value="{{old('address')}}">
          </td>
        </tr>
        <tr class="contact__example">
          <th></th>
          <td>
            例）東京都渋谷区千駄ヶ谷1-2-3
          </td>
        </tr>
        @if ($errors->has('address'))
        <tr>
          <th></th>
          <td class="error-message">{{$errors->first('address')}}</td>
        </tr>
        @endif
        <tr>
          <th>
            <label for="building_name">
              建物名
            </label>
          </th>
          <td>
            <input class="contact__forms" type="text" name="building_name" id="building_name" value="{{old('building_name')}}">
          </td>
        </tr>
        <tr class="contact__example">
          <th></th>
          <td>
            例）千駄ヶ谷マンション101
          </td>
        </tr>
        <tr>
          <th class="index_opinion">
            <label for="opinion">
              ご意見<span>※</span>
            </label>
          </th>
          <td>
          <textarea class="contact__forms" name="opinion"  cols="30" rows="10">{{old('opinion')}}</textarea>
          </td>
        @if ($errors->has('opinion'))
        <tr>
          <th></th>
          <td class="error-message">{{$errors->first('opinion')}}</td>
        </tr>
        @endif
        </tr>
      </table>
      <div  class="to-confirm" >
        <button class="to-confirm_btn" type="submit">確認</button>
      </div>
    </form>
  </div>
  </main>
</body>
</html>