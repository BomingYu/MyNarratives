 <div class="postCard">
     <h3 class="postTitle">{{ $post->title}}</h3>
     <div class="postDetail">
         <span>{{ $post->created_at }}</span>
         <a href=" {{ route('post.show') }} ">View</a>
         <a href="#">Edit</a>
     </div>
 </div>
