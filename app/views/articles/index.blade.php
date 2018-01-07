<head>
    <link href="{{asset('css/doctorList.css')}}" rel="stylesheet">
{{--<link href="{{asset('css/article.css')}}">--}}
<style>
 .show-read-more .more-text{
        display: none;
    }

.selectedClass{
text-decoration: underline;
color: #00A0C6;
cursor:pointer;
font-size: 16px;
}
.articleLike:hover
{
     color:#00A0C6;
     font-size: 16px;
     cursor:pointer;
     text-decoration: underline;
}
</style>

</head>


@extends('layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
    Articles
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section("current_articles")
class="current"
@stop

@section('redBar')
    <div class = "user_logo">
        <div class="header_1 wrap_3 color_3 login-bar">Health Articles
        </div>
    </div>
@stop

@section('sliderContent')
@stop


@section('content')

<br><div class="container-fluid" style="background-color: whitesmoke">
    <div class="carousel" role="listbox">
      <div class="carousel-item active">
         <div class="row">
            <div class="col-lg-3 col-sm-12 post-block post-thumb" style="background-color: white">
               {{--Main page left Panel--}}
               <div class="post-box">
                  <h3 class="green">This is left Panel of Article</h3>
                  <img src="{{asset('images/blog/blog3.jpg')}}" alt="Slide" /><br>

               </div>
            </div>
            {{--Main Page right Panel--}}
            <div class="col-lg-9 col-sm-12 ">
               {{--
               <div class="col-lg-8 col-sm-12 post-block post-big">
                  --}}
                  {{--Article List left panel--}}
                  @foreach($articles as $article)
                  <?php $image = '/articleimage'.'/'.$article->articleId.'/'.$article->bannar_image?>
                  <div class="col-md-12 col-sm-12  col-lg-12 card listBox" style="border-radius: 5px; padding-top: 10px; ">
                  {{--<div class="col-md-12 col-sm-12  col-lg-12">--}}
                     <div class="col-md-5">
                        <div class="post-box">
                           <img src="{{asset($image)}}"   style="margin-bottom: 10px; height:250px;" /><br>
                           {{--Like Button--}}
                          @if(Auth::check())

                           <span id="like_{{$article->articleId}}" onclick="hitLikes('{{$article->articleId}}','{{Auth::user()->id}}')" class="pB10 fL"> <i class="fa fa-thumbs-up articleLike" aria-hidden="false">&nbsp; Likes&nbsp;<span id="totalLike_{{$article->articleId}}">
                            {{$article->article_likes}}
                          </span></i></span>

                          @endif
                           {{--Like end--}}
                        </div>
                     </div>
                     {{--Article list right panel--}}
                     <div class="col-md-7">
                        <span class="post-category"><a href="{{route('articles',$article->articleId)}}" title="Travel" style="font-size: 20px;">{{$article->title}}</a></span><br>
                        <h5 style="color: #808080">By Dr.{{$article->full_name}}</h5><br>
                        <span><a href="{{route('articles',$article->articleId)}}" title="White Sand of The Desert Discovery">13 Surprising Habits Proven to Trigger Kidney Stones</a></span><br>
                        {{--<p><span class="show-read-more">{{$article->article_text}}</span>--}}
                        <span><div class="show-read-more">{{$article->article_text}}</div>
{{--                        <a href="{{route('articles/'.$article->articleId)}}" title="Read More">Read More</a></p>--}}
                        </span>
                        <a href="{{route('articles',$article->articleId)}}" title="Read More">Read More</a>
                        {{--
                     </div>
                     --}}
                  </div>
               </div>
               @endforeach
                <span class="center"><?php echo $articles->links(); ?></span>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- LikeBtn.com BEGIN -->
<script src="{{asset('js/articleListScript.js')}}"></script>
@stop