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
<section class="blog_area single-post-area section_gap" style="margin-top:5%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('storage/' .$blog->image)}}" alt="" style="height: 350px; width:750px;">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <ul class="blog_meta list" style="list-style-type:none;">
                                <li><a href="#">Admin<i class="lnr lnr-user"></i></a></li>
                                <li><a href="#">12 Oct, 2019<i class="lnr lnr-calendar-full"></i></a></li>
                               {{--  <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li> --}}
                            </ul>
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>{{$blog->judul}}</h2>
                        <p class="excert"> 
                          {{$blog->konten}}
                        </p>
                    </div>
                    {{-- <div class="col-lg-12">
                        <div class="quotes">
                            Deskripsi Deskripsi Deskripsi Deskripsi Deskripsi
                            Deskripsi Deskripsi Deskripsi Deskripsi Deskripsi
                            Deskripsi Deskripsi Deskripsi Deskripsi Deskripsi
                        </div>
                        
                    </div> --}}
                </div>
                <!-- <div class="navigation-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                            </div>
                            <div class="detials">
                                <p>Prev Post</p>
                                <a href="#">
                                    <h4>Space The Final Frontier</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                                <p>Next Post</p>
                                <a href="#">
                                    <h4>Telescopes 101</h4>
                                </a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                            </div>
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div> -->
                {{-- <div class="comments-area">
                    <h4>05 Comments</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="/img/blog/c1.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2018 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="/img/blog/c2.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Elsie Cunningham</a></h5>
                                    <p class="date">December 4, 2018 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="/img/blog/c3.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Annie Stephens</a></h5>
                                    <p class="date">December 4, 2018 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="/img/blog/c4.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Maria Luna</a></h5>
                                    <p class="date">December 4, 2018 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c5.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Ina Hayes</a></h5>
                                    <p class="date">December 4, 2018 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="comment-form"> --}} <div style="margin-top:50px;">
                   {{--  <h4>Leave a Reply</h4>
                    <form>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-6 name">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter Name'">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 email">
                                <input type="email" class="form-control" id="email" placeholder="Enter email address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <a href="#" class="primary-btn submit_btn">Post Comment</a>
                    </form> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                   <!--  <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                            </span>
                        </div>
                        <div class="br"></div>
                    </aside> -->
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="/img/blog/author.png" alt="">
                        <h4>{{$blog->user->firstname}}</h4>
                        <p>Admin</p>
                        <div class="social_icon">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                        {{-- <p>Deskripsi Deskripsi Deskripsi Deskripsi Deskripsi Deskripsi</p> --}}
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        @foreach($blogAll as $allblog)
                        <div class="media post_item">
                            <img src="{{ asset('storage/' .$allblog->image)}}" alt="post" style="height:60px; width:100px;">
                            <div class="media-body">
                                <a href="{{ url('single/'.$allblog->slug) }}">
                                    <h3>{{$allblog->judul}}</h3>
                                </a>
                                <p></p>
                            </div>
                        </div>
                        @endforeach
                        <div class="br"></div>
                    </aside>
                  
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection