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


<!-- 検索結果フォーム 検索された時のみ表示する-->
@if (!empty($recruits))


<section id="main" >
    <div class="search-title">
    <p>全{{ $recruits->count() }}件</p>
    </div>
    <div class="panel-list">
    @foreach ($recruits as $recruit)
          <div class="list">
          <h2>{{ $recruit -> title }}</h2>
              <div class="name">
              {{ ('投稿者名') }}<br>
              {{ ($recruit->user->name) }}
              </div>
              <a href="{{ route('shirodoras.detail',$recruit->id) }}" class="btn btn-primary">{{ ('詳細ページ')  }}</a>
          </div>
@endforeach
    </div>
    <!--ページネーション-->
     <div class="pagination">
        <ul class="pagination-list">
          {{-- appendsでカテゴリを選択したまま遷移 --}}
          {{ $recruits->appends(request()->input())->links('shirodoras.pagination') }}
        </ul>
    </div>
    <!--ページネーションここまで-->
    @endif
    </div>
    
@endsection
