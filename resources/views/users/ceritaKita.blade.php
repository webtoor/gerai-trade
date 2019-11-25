@section('css')
    <style>
.blog_item {
  margin-bottom: 40px; }

.blog_info {
  padding-top: 30px; }
  .blog_info .post_tag {
    padding-bottom: 20px; }
    .blog_info .post_tag a {
      font: 300 14px/21px "Roboto", sans-serif;
      color: #222222; }
      .blog_info .post_tag a:hover {
        color: #777777; }
      .blog_info .post_tag a.active {
        color: #ffba00; }
  .blog_info .blog_meta li a {
    font: 300 14px/20px "Roboto", sans-serif;
    color: #777777;
    vertical-align: middle;
    padding-bottom: 12px;
    display: inline-block; }
    .blog_info .blog_meta li a i {
      color: #222222;
      font-size: 16px;
      font-weight: 600;
      padding-left: 15px;
      line-height: 20px;
      vertical-align: middle; }
    .blog_info .blog_meta li a:hover {
      color: #ffba00; }

.blog_post img {
  max-width: 100%; }
.blog_post .white_bg_btn {
  border: 1px solid #eeeeee;
  text-transform: uppercase;
  font-size: 12px;
  padding: 0 30px;
  line-height: 34px;
  display: inline-block;
  color: #222222; }

.blog_details {
  padding-top: 20px; }
  .blog_details h2 {
    font-size: 24px;
    line-height: 36px;
    color: #222222;
    font-weight: 600;
    transition: all 0.3s linear; }
    .blog_details h2:hover {
      color: #c5322d; }
  .blog_details p {
    margin-bottom: 26px; }

.view_btn {
  font-size: 14px;
  line-height: 36px;
  display: inline-block;
  color: #222222;
  font-weight: 500;
  padding: 0px 30px;
  background: #fff; }

.blog_right_sidebar {
  border: 1px solid #eeeeee;
  background: #fafaff;
  padding: 30px; }
  .blog_right_sidebar .widget_title {
    font-size: 18px;
    line-height: 25px;
    background: #ffba00;
    text-align: center;
    color: #fff;
    padding: 8px 0px;
    margin-bottom: 30px; }
  .blog_right_sidebar .search_widget .input-group .form-control {
    font-size: 14px;
    line-height: 29px;
    border: 0px;
    width: 100%;
    font-weight: 300;
    color: #fff;
    padding-left: 20px;
    border-radius: 45px;
    z-index: 0;
    background: #ffba00; }
    .blog_right_sidebar .search_widget .input-group .form-control.placeholder {
      color: #fff; }
    .blog_right_sidebar .search_widget .input-group .form-control:-moz-placeholder {
      color: #fff; }
    .blog_right_sidebar .search_widget .input-group .form-control::-moz-placeholder {
      color: #fff; }
    .blog_right_sidebar .search_widget .input-group .form-control::-webkit-input-placeholder {
      color: #fff; }
    .blog_right_sidebar .search_widget .input-group .form-control:focus {
      box-shadow: none; }
  .blog_right_sidebar .search_widget .input-group .btn-default {
    position: absolute;
    right: 20px;
    background: transparent;
    border: 0px;
    box-shadow: none;
    font-size: 14px;
    color: #fff;
    padding: 0px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1; }
  .blog_right_sidebar .author_widget {
    text-align: center; }
    .blog_right_sidebar .author_widget h4 {
      font-size: 18px;
      line-height: 20px;
      color: #222222;
      margin-bottom: 5px;
      margin-top: 30px; }
    .blog_right_sidebar .author_widget p {
      margin-bottom: 0px; }
    .blog_right_sidebar .author_widget .social_icon {
      padding: 7px 0px 15px; }
      .blog_right_sidebar .author_widget .social_icon a {
        font-size: 14px;
        color: #222222;
        transition: all 0.2s linear; }
        .blog_right_sidebar .author_widget .social_icon a + a {
          margin-left: 20px; }
        .blog_right_sidebar .author_widget .social_icon a:hover {
          color: #c5322d; }
  .blog_right_sidebar .popular_post_widget .post_item .media-body {
    justify-content: center;
    align-self: center;
    padding-left: 20px; }
    .blog_right_sidebar .popular_post_widget .post_item .media-body h3 {
      font-size: 14px;
      line-height: 20px;
      color: #222222;
      margin-bottom: 4px;
      transition: all 0.3s linear; }
      .blog_right_sidebar .popular_post_widget .post_item .media-body h3:hover {
        color: #ffba00; }
    .blog_right_sidebar .popular_post_widget .post_item .media-body p {
      font-size: 12px;
      line-height: 21px;
      margin-bottom: 0px; }
  .blog_right_sidebar .popular_post_widget .post_item + .post_item {
    margin-top: 20px; }
  .blog_right_sidebar .post_category_widget .cat-list li {
    border-bottom: 2px dotted #eee;
    transition: all 0.3s ease 0s;
    padding-bottom: 12px; }
    .blog_right_sidebar .post_category_widget .cat-list li a {
      font-size: 14px;
      line-height: 20px;
      color: #777; }
      .blog_right_sidebar .post_category_widget .cat-list li a p {
        margin-bottom: 0px; }
    .blog_right_sidebar .post_category_widget .cat-list li + li {
      padding-top: 15px; }
    .blog_right_sidebar .post_category_widget .cat-list li:hover {
      border-color: #ffba00; }
      .blog_right_sidebar .post_category_widget .cat-list li:hover a {
        color: #ffba00; }
  .blog_right_sidebar .newsletter_widget {
    text-align: center; }
    .blog_right_sidebar .newsletter_widget .form-group {
      margin-bottom: 8px; }
    .blog_right_sidebar .newsletter_widget .input-group-prepend {
      margin-right: -1px; }
    .blog_right_sidebar .newsletter_widget .input-group-text {
      background: #fff;
      border-radius: 0px;
      vertical-align: top;
      font-size: 12px;
      line-height: 36px;
      padding: 0px 0px 0px 15px;
      border: 1px solid #eeeeee;
      border-right: 0px; }
    .blog_right_sidebar .newsletter_widget .form-control {
      font-size: 12px;
      line-height: 24px;
      color: #cccccc;
      border: 1px solid #eeeeee;
      border-left: 0px;
      border-radius: 0px; }
      .blog_right_sidebar .newsletter_widget .form-control.placeholder {
        color: #cccccc; }
      .blog_right_sidebar .newsletter_widget .form-control:-moz-placeholder {
        color: #cccccc; }
      .blog_right_sidebar .newsletter_widget .form-control::-moz-placeholder {
        color: #cccccc; }
      .blog_right_sidebar .newsletter_widget .form-control::-webkit-input-placeholder {
        color: #cccccc; }
      .blog_right_sidebar .newsletter_widget .form-control:focus {
        outline: none;
        box-shadow: none; }
    .blog_right_sidebar .newsletter_widget .bbtns {
      background: #ffba00;
      color: #fff;
      font-size: 12px;
      line-height: 38px;
      display: inline-block;
      font-weight: 500;
      padding: 0px 24px 0px 24px;
      border-radius: 0; }
    .blog_right_sidebar .newsletter_widget .text-bottom {
      font-size: 12px; }
  .blog_right_sidebar .tag_cloud_widget ul li {
    display: inline-block; }
    .blog_right_sidebar .tag_cloud_widget ul li a {
      display: inline-block;
      border: 1px solid #eee;
      background: #fff;
      padding: 0px 13px;
      margin-bottom: 8px;
      transition: all 0.3s ease 0s;
      color: #222222;
      font-size: 12px; }
      .blog_right_sidebar .tag_cloud_widget ul li a:hover {
        background: #ffba00;
        color: #fff; }
  .blog_right_sidebar .br {
    width: 100%;
    height: 1px;
    background: #eeeeee;
    margin: 30px 0px; }

.blog-pagination {
  padding-top: 25px;
  padding-bottom: 95px; }
  .blog-pagination .page-link {
    border-radius: 0; }
  .blog-pagination .page-item {
    border: none; }

.page-link {
  background: transparent;
  font-weight: 400; }

.blog-pagination .page-item.active .page-link {
  color: #fff; }

.blog-pagination .page-link {
  position: relative;
  display: block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #8a8a8a;
  border: none; }

.blog-pagination .page-link .lnr {
  font-weight: 600; }

.blog-pagination .page-item:last-child .page-link,
.blog-pagination .page-item:first-child .page-link {
  border-radius: 0; }

.blog-pagination .page-link:hover {
  color: #fff;
  text-decoration: none;
  background-color: #c5322d;
  border-color: #eee; }

.single-post-area .social-links {
  padding-top: 10px; }
  .single-post-area .social-links li {
    display: inline-block;
    margin-bottom: 10px; }
    .single-post-area .social-links li a {
      color: #cccccc;
      padding: 7px;
      font-size: 14px;
      transition: all 0.2s linear; }
      .single-post-area .social-links li a:hover {
        color: #222222; }
.single-post-area .blog_details {
  padding-top: 26px; }
  .single-post-area .blog_details p {
    margin-bottom: 10px; }
.single-post-area .quotes {
  margin-top: 20px;
  margin-bottom: 30px;
  padding: 24px 35px 24px 30px;
  background-color: white;
  box-shadow: -20.84px 21.58px 30px 0px rgba(176, 176, 176, 0.1);
  font-size: 14px;
  line-height: 24px;
  color: #777;
  font-style: italic; }
.single-post-area .arrow {
  position: absolute; }
  .single-post-area .arrow .lnr {
    font-size: 20px;
    font-weight: 600; }
.single-post-area .thumb .overlay-bg {
  background: rgba(0, 0, 0, 0.8); }
.single-post-area .navigation-area {
  border-top: 1px solid #eee;
  padding-top: 30px;
  margin-top: 60px; }
  .single-post-area .navigation-area p {
    margin-bottom: 0px; }
  .single-post-area .navigation-area h4 {
    font-size: 18px;
    line-height: 25px;
    color: #222222; }
  .single-post-area .navigation-area .nav-left {
    text-align: left; }
    .single-post-area .navigation-area .nav-left .thumb {
      margin-right: 20px;
      background: #000; }
      .single-post-area .navigation-area .nav-left .thumb img {
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s; }
    .single-post-area .navigation-area .nav-left .lnr {
      margin-left: 20px;
      opacity: 0;
      -webkit-transition: all 0.3s ease 0s;
      -moz-transition: all 0.3s ease 0s;
      -o-transition: all 0.3s ease 0s;
      transition: all 0.3s ease 0s; }
    .single-post-area .navigation-area .nav-left:hover .lnr {
      opacity: 1; }
    .single-post-area .navigation-area .nav-left:hover .thumb img {
      opacity: .5; }
    @media (max-width: 767px) {
      .single-post-area .navigation-area .nav-left {
        margin-bottom: 30px; } }
  .single-post-area .navigation-area .nav-right {
    text-align: right; }
    .single-post-area .navigation-area .nav-right .thumb {
      margin-left: 20px;
      background: #000; }
      .single-post-area .navigation-area .nav-right .thumb img {
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s; }
    .single-post-area .navigation-area .nav-right .lnr {
      margin-right: 20px;
      opacity: 0;
      -webkit-transition: all 0.3s ease 0s;
      -moz-transition: all 0.3s ease 0s;
      -o-transition: all 0.3s ease 0s;
      transition: all 0.3s ease 0s; }
    .single-post-area .navigation-area .nav-right:hover .lnr {
      opacity: 1; }
    .single-post-area .navigation-area .nav-right:hover .thumb img {
      opacity: .5; }
@media (max-width: 991px) {
  .single-post-area .sidebar-widgets {
    padding-bottom: 0px; } }

.comments-area {
  background: #fafaff;
  border: 1px solid #eee;
  padding: 50px 30px;
  margin-top: 50px; }
  @media (max-width: 414px) {
    .comments-area {
      padding: 50px 8px; } }
  .comments-area h4 {
    text-align: center;
    margin-bottom: 50px;
    color: #222222;
    font-size: 18px; }
  .comments-area h5 {
    font-size: 16px;
    margin-bottom: 0px; }
  .comments-area a {
    color: #222222; }
  .comments-area .comment-list {
    padding-bottom: 48px; }
    .comments-area .comment-list:last-child {
      padding-bottom: 0px; }
    .comments-area .comment-list.left-padding {
      padding-left: 25px; }
    @media (max-width: 413px) {
      .comments-area .comment-list .single-comment h5 {
        font-size: 12px; }
      .comments-area .comment-list .single-comment .date {
        font-size: 11px; }
      .comments-area .comment-list .single-comment .comment {
        font-size: 10px; } }
  .comments-area .thumb {
    margin-right: 20px; }
  .comments-area .date {
    font-size: 13px;
    color: #cccccc;
    margin-bottom: 13px; }
  .comments-area .comment {
    color: #777777;
    margin-bottom: 0px; }
  .comments-area .btn-reply {
    background-color: #fff;
    color: #222222;
    border: 1px solid #eee;
    padding: 2px 18px;
    font-size: 12px;
    display: block;
    font-weight: 600;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s; }
    .comments-area .btn-reply:hover {
      background-color: #c5322d;
      color: #fff; }

.comment-form {
  background: #fafaff;
  text-align: center;
  border: 1px solid #eee;
  padding: 47px 30px 43px;
  margin-top: 50px;
  margin-bottom: 40px; }
  .comment-form h4 {
    text-align: center;
    margin-bottom: 50px;
    font-size: 18px;
    line-height: 22px;
    color: #222222; }
  .comment-form .name {
    padding-left: 0px; }
    @media (max-width: 767px) {
      .comment-form .name {
        padding-right: 0px;
        margin-bottom: 1rem; } }
  .comment-form .email {
    padding-right: 0px; }
    @media (max-width: 991px) {
      .comment-form .email {
        padding-left: 0px; } }
  .comment-form .form-control {
    padding: 8px 20px;
    background: #fff;
    border: none;
    border-radius: 0px;
    width: 100%;
    font-size: 14px;
    color: #777777;
    border: 1px solid transparent; }
    .comment-form .form-control:focus {
      box-shadow: none;
      border: 1px solid #eee; }
  .comment-form textarea.form-control {
    height: 140px;
    resize: none; }
  .comment-form ::-webkit-input-placeholder {
    /* Chrome/Opera/Safari */
    font-size: 13px;
    color: #777; }
  .comment-form ::-moz-placeholder {
    /* Firefox 19+ */
    font-size: 13px;
    color: #777; }
  .comment-form :-ms-input-placeholder {
    /* IE 10+ */
    font-size: 13px;
    color: #777; }
  .comment-form :-moz-placeholder {
    /* Firefox 18- */
    font-size: 13px;
    color: #777; }

/*============ End Blog Single Styles  =============*/
        </style>
@endsection
@extends('users.default')

@section('content')

 <!--================Blog Area =================-->
 <section class="blog_area" style="margin-top:5%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach($blogAll as $blogAlls)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list" style="list-style-type:none;">
                                        <li><a href="#"> {{$blogAlls->user->nama_depan}}<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{ date("j-M-Y", strtotime($blogAlls->created_at))}}<i class="lnr lnr-calendar-full"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{ asset('storage/' .$blogAlls->image)}}" alt="" style="width:500px; height:280px;">
                                    <div class="blog_details">
                                        <a href="{{ url('single/'.$blogAlls->slug) }}">
                                        <h2>{{$blogAlls->judul}}</h2>
                                        </a>
                                        <div>
                                            {!! \Illuminate\Support\Str::limit($blogAlls->konten, 100) !!}
                                        </div>
                                        <a href="{{ url('single/'.$blogAlls->slug) }}" class="white_bg_btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                     
                        <nav class="blog-pagination justify-content-center d-flex">
                                <div class="filter-bar d-flex flex-wrap align-items-center">
                                        <div class="pagination ml-auto">
                                            {{ $blogAll->links() }}
                                        </div>
                                    </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            @foreach($side as $sides)
                            <div class="media post_item">
                                 <img src="{{ asset('storage/' .$sides->image)}}" alt="post" style="height:60px; width:100px;">
                                    <div class="media-body">
                                        <a href="{{ url('single/'.$sides->slug) }}">
                                            <h3>{{$sides->judul}}</h3>
                                        </a>
                                </div>
                            </div>
                            @endforeach
                            <div class="br"></div>
                        </aside>
                       <!--  <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                            <div class="br"></div>
                        </aside> -->
                      <!--   <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Post Catgories</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Technology</p>
                                        <p>37</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Lifestyle</p>
                                        <p>24</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Fashion</p>
                                        <p>59</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Art</p>
                                        <p>29</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Food</p>
                                        <p>15</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Architecture</p>
                                        <p>09</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Adventure</p>
                                        <p>44</p>
                                    </a>
                                </li>
                            </ul>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <p>
                                Here, I focus on a range of items and features that we use in life without
                                giving them a second thought.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns">Subcribe</a>
                            </div>
                            <p class="text-bottom">You can unsubscribe at any time</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Adventure</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Adventure</a></li>
                            </ul>
                        </aside> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection