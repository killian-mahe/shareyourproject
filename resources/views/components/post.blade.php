<post-card :post_props='@json(new \App\Http\Resources\Post($post))' @auth :auth_user='@json(new \App\Http\Resources\User(Auth::user()))' @endauth></post-card>
