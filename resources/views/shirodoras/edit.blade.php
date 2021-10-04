@extends('layouts.layout')

@section('content')
    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">
      <h1 class="page-title">{{ ('投稿編集') }}</h1>
      <!-- Main -->
      <section id="main" >
        <div class="form-container">
          <form action="{{ route('shirodoras.update',$shirodora->id ) }}" method="post" class="form" enctype="multipart/form-data" style="width:100%;box-sizing:border-box;">
           @csrf
            <label>
              {{ ('タイトル') }}<span class="label-require">{{ ('必須') }}</span>
              <input type="text" name="title" class="@error('title') is-invalid @enderror"  value="{{ $shirodora -> title }}" autocomplete="title" autofocus>
              
              @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </label>

            <label>
              {{ ('カテゴリ') }}<span class="label-require">必須</span>
                <select name="category_id" value="{{ $categoryId }}">

                  @foreach($categories as $id => $category_name)
                      <option value="{{ $id }}" {{ $id == $shirodora['category_id'] ? "selected" : ('未選択') }}>{{ $category_name }}</option>
                  @endforeach
                  
                </select>
            </label>
            
            <label>
              {{ ('詳細') }}
              <textarea name="comment" id="js-count" cols="30" rows="10" style="height:150px;" class="@error('comment') is-invalid @enderror" autocomplete="comment" autofocus>{{ $shirodora -> comment }}</textarea>
                  
                 

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
              <button type="submit" class="btn btn-mid">編集する</button>
            </div>
          </form>
        </div>
      </section> 
    </div>
    
    @endsection

    