@extends('layouts.2page-colum')

@section('content')

<!-- メインコンテンツ -->
<div id="contents" class="site-width">
  <!-- サイドバー -->
  <section id="sidebar">
    <form method="GET" action="{{ route('shirodoras.searchrecruit') }}">
      <h1 class="title">{{ ('カテゴリー') }}</h1>
      <div class="selectbox">
        <span class="icn_select"></span>
        <select name="category_id" value="{{ $categoryId }}">
          <option value="">未選択</option>

          @foreach($categories as $id => $category_name)
          <option value="{{ $id }}">
            {{ $category_name }}
          </option>
          @endforeach
        </select>
      </div>
      <input type="submit" value="検索">
    </form>

  </section>

  <!-- Main -->
  <section id="main" >
    <div class="search-title">
    <p>全{{ $count->count() }}件</p>
    </div>
    <div class="panel-list">
    @foreach ($shirodoras as $shirodora)
          <div class="list">
            <h2>{{ $shirodora -> title }}</h2>
              <div class="name">
              {{ ('投稿者名') }}<br>
              {{ ($shirodora->user->name) }}
              </div>        
                <a href="{{ route('shirodoras.detail',$shirodora->id) }}" class="btn btn-primary">{{ ('詳細ページ')  }}</a>
          </div>
@endforeach
    </div>
    
          {{  $shirodoras->appends(request()->input())->links('shirodoras.pagination')   }}
        
  </section>

</div>
@endsection
