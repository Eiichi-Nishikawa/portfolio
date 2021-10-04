@extends('layouts.layout')

@section('content')
    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">
      <h1 class="page-title">{{ ('新規募集') }}</h1>
      <!-- Main -->
      <section id="main" >
        <div class="form-container">
          <form action="{{ route('shirodoras.create') }}" method="post" class="form" enctype="multipart/form-data" style="width:100%;box-sizing:border-box;">
           @csrf
            <label>
              {{ ('タイトル') }}<span class="label-require">{{ ('必須') }}</span>
              <input type="text" name="title" placeholder="例）リーグ募集" class="@error('title') is-invalid @enderror"  value="{{ old('title') }}" autocomplete="title" autofocus> 
            </label>

            <label>
              {{ ('カテゴリ') }}<span class="label-require">必須</span>
                <select name="category_id" class="@error('category_id') is-invalid @enderror" value="{{ $categoryId }}">
                  <option value="">未選択</option>
                    @foreach($categories as $id => $category_name)
                      <option value="{{ $id }}">
                        {{ $category_name }}
                      </option>
                    @endforeach
                </select>
            </label>
            
            <label>
              {{ ('詳細') }}
              <textarea name="comment" placeholder="例)城レベル５０以上でダイヤクラス以上を○人募集など" cols="30" rows="10" style="height:150px;" value="{{ old('comment') }}" autocomplete="comment" autofocus></textarea>
                  
            </label>
            
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <div class="btn-container">
              <button type="submit" class="btn btn-mid">投稿する</button>
            </div>
          </form>
        </div>
      </section> 
    </div>
    
    @endsection

    