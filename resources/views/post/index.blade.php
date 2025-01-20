@extends('layouts.main')

@section('content')
<main class="blog-post">
  <div class="container">
      <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
      <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written by <a href="{{ route('public_user_profile.index', $post->authorPost->id) }}">{{ $post->authorPost->name }}</a> • {{ $post->created_at->day }} {{ $post->created_at->format('F') }} {{ $post->created_at->year }} • {{ $post->usersComments()->count() }} Comments</p>
      <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
          <div class="p-0 m-0" style="height: 300px; overflow: hidden;">
            <img src="{{ asset('Storage/' . $post->main_image) }}" alt="featured image" class="w-100">
          </div>
      </section>
      <section class="post-content">
          <div class="row">
              <div class="col-lg-9 mx-auto" data-aos="fade-up">
                  <p>{!! $post->content !!}</p>
          </div>
      </section>
      <div class="row">
          <div class="col-lg-9 mx-auto">
                @if (isset($relatedPosts))
                    <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-left">Related Posts</h2>
                    <div class="row">
                        @foreach ($relatedPosts as $relPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{ asset('Storage/' . $relPost->preview_image) }}" alt="related post" class="post-thumbnail">
                                <a href="{{ route('public_user_profile.index', $post->authorPost->id) }}"><p class="blog-post-category">{{ $post->authorPost->name }}</p></a>
                                <a href="{{ route('post.index', $relPost->id) }}"><h5 class="post-title">{{ $relPost->title }}</h5></a>
                            </div>
                        @endforeach
                    </div>
                    </section>
                @endif
                @foreach ($post->usersComments as $comment)
                <div class="card mb-4" data-aos="fade-up">
                    <div class="card-body">
                      <p>{{ $comment->message }}</p>
                      <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/' . ($comment->user->avatar ?? $comment->user->noAvatar)) }}" alt="avatar" width="25" height="25" />
                                
                                @if (isset($comment->user->id))
                                    <a href="{{ route('public_user_profile.index', $comment->user->id) }}" class="text-reset"><p class="small mb-0 ms-2">{{ $comment->user->name }}</p></a>
                                @else
                                    <p class="small mb-0 ms-2">Deleted User</p>
                                @endif
                                
                            </div>
                            <div class="d-flex align-items-center ml-auto">
                                <p class="small m-0">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                      </div>
                    </div>
                </div>
                @endforeach
                @auth
                <form action="{{ route('post.like.store', $post->id) }}" method="post" class="col-2 p-0">
                    @csrf
                    <button type="submit" class="b-0 bg-transparent">
                        @if (! auth()->user()->likedPosts->contains($post->id))
                        <div data-aos="fade-up">
                            <i class="fa-regular fa-heart pr-1"></i>{{ $post->users_liked_count }}
                        </div>
                        @else
                        <div data-aos="fade-up">
                            <i class="fa-solid fa-heart" style="color: #ff0000;"></i>{{ $post->users_liked_count }}
                        </div>
                        @endif
                    </button>
                </form>
                @endauth
                @guest
                <div data-aos="fade-up">
                    <i class="fa-solid fa-heart" style="color: #ff0000;"></i>{{ $post->users_liked_count }}
                </div>
                @endguest
                @auth
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                    @if (empty(auth()->user()->email_verified_at))
                        <p class="edica-blog-post-meta mb-5" data-aos="fade-up">"Only for verified user"</p>
                    @endif
                    <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                    @csrf
                        <div class="row">
                          <div class="form-group col-12" data-aos="fade-up">
                              <label for="comment" class="sr-only">Comment</label>
                              <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
                @endauth
          </div>
      </div>
  </div>
</main>

@endsection