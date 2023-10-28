 <div class="postCard">
     <h3 class="postTitle">{{ $post->title}}</h3>
     <div class="postDetail">
         <span>{{ $post->created_at }}</span>
         <a href=" {{ route('post.show' , $post->id)}} ">View</a>
         <a href=" {{ route('post.edit' , $post->id) }} ">Edit</a>
         <form method="POST" action="{{route('post.delete' , $post->id)}}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">X</button>
         </form>
     </div>
 </div>
