<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理システム</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
  </head>
  <body>
    <header>
      <h1>管理システム</h1>
      <div >
        <div class="search_menu" id="search_menu">
          <span class="search_menu__line--top"></span>
          <span class="search_menu__line--middle"></span>
          <span class="search_menu__line--bottom"></span>
          <h3>検索<br>on/off</h3>
        </div>
      </div>
  </header>
  <main>

  <div class="search" id="search">
    <form action="search">
      @csrf
    <table class="search__table">
      <tr>
        <th>
          <label for="fullname">お名前</label>
        </th>
        <td>
          <input class="form__input" type="text" name="fullname" id="fullname">
        </td>
        <td>
          <span>性別</span>
          <input type="radio" name="gender" value="" checked>全て
          <input type="radio" name="gender" value="1">男性
          <input type="radio" name="gender" value="2">女性
        </td>
      </tr>
      <tr>
        <th>
          <label for="created_at">登録日</label>
        </th>
        <td>
          <input class="form__input" type="date" name="from" id="created_at">
          ～
        </td>
        <td>
          <input class="form__input" type="date" name="until" id="created_at">
        </td>
      </tr>
      <tr>
        <th>
          <label for="email">メールアドレス</label>
        </th>
        <td>
          <input class="form__input" type="text" name="keyword"  id="keyword" >
        </td>
        <td></td>
      </tr>
    </table>
    <div class="search__link">
      <button class="search__btn" type="submit">検索</button>
    </div>
    <div class="search__link">
      <a href="/admin">検索結果リセット</a>
    </div>
  </form>
</div>


<div class="result">
  <div class="result__paginate1">
    <div class="result__paginate2">
      {{$items->appends(request()->query())->links()}}  
    </div>
  </div>
  <div class="result__count">
    @if (count($items) >0)
    <p>全{{ $items->total() }}件中 
      {{  ($items->currentPage() -1) * $items->perPage() + 1}} - 
      {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件</p>
      @else
    <p>データがありません。</p>
    @endif 
  </div>
      
  <div>
    <table class="result__list">
      <tr class="t_head">
        <th class="result__list__id">ID</th>
        <th class="result__list__fullname">お名前</th>
        <th class="result__list__gender">性別</th>
        <th class="result__list__email">メールアドレス</th>
        <th class="result__list__opinion">ご意見</th>
        <th></th>
      </tr>
      @foreach($items as $item)
      <tr>
        <td>
          {{$item->id}}
        </td>
        <td class="result__list__fullname">{{$item->fullname}}</td>
        <td>
          @if($item->gender == 1)
          男性
          @else
          女性
          @endif
        </td>
        <td class="result__list__email">{{$item->email}}</td>
        <td >
          <label for="showtext" class="result__list__opinion">{{$item->opinion}}</label>
        </td>
        <td>
          <form action="/delete/?id={{ $item->id }}" method="POST">
            @csrf 
            <input class="result__del" type="submit" value="削除">
          </form>
        </td>
      </tr>   
      @endforeach
    </table>
  </div>
</div>
  <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
  </main>
</body>
</html>