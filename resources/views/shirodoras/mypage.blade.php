@extends('layouts.layout')

@section('content')

<!-- メインコンテンツ -->
<div id="contents" class="site-width">
  
  <!-- Main -->
  <section id="main" >
    <h1 class="title">マイページ</h1>
    <div class="panel-list">
    @foreach ($shirodoras as $shirodora)
          <div class="list">
            <h2>{{ $shirodora -> title }}</h2>
              <ul>        
                  <li><a href="{{ route('shirodoras.detail',$shirodora->id) }}" class="btn btn-detail">{{ ('詳細ページ')  }}</a></li>
                  <li><a href="{{ route('shirodoras.edit',$shirodora->id) }}" class="btn btn-edit">{{ ('編集ページ') }}</a></li>
              
                  <form action="{{ route('shirodoras.delete',$shirodora->id) }}" method="post" class="form_delete">
                    @csrf
                    <button class="btn btn-delete" onclick='return confirm("削除しますか？");'>{{ ('削除する') }}</button>
                  </form>
              </ul>
          </div>
    @endforeach
    </div>
    
  </section>

</div>

@endsection
