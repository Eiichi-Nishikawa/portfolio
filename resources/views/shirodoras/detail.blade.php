@extends('layouts.layout')

@section('content')
    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">
      <h1 class="page-title">{{ ('投稿詳細') }}</h1>
      <!-- Main -->
      <section id="main" >
        <div class="form-container form" style="width:100%;box-sizing:border-box;">
           <label>
              {{ ('ユーザーネーム') }}<br>
              <div class="detail-name">
              {{ $shirodora->user->name }}
              </div>
            </label>

            <label>
              {{ ('タイトル') }}<br>
              <div class="detail-title">
              {{ $shirodora -> title }}
              </div>
            </label>

            <label>
              {{ ('カテゴリー') }}<br>
              <div class="detail-category">
              {{ $shirodora->category->name }}
              </div>
            </label>

            
            <label>
              {{ ('詳細') }}<br>
              <div class="detail-comment">
              {{ $shirodora -> comment }}
              </div>
            </label>
        </div>
      </section> 
    </div>
    
    @endsection