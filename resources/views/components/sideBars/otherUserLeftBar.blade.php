<div class="leftDiv">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a class="nav-link mx-3" href="#"><strong>{{$user->name}}'s</strong>  Posts &#40;{{$user->posts()->count()}}&#41;</a>
        </li>
        <li class="list-group-item">
            <a class="nav-link mx-3" href="#"><strong>{{$user->name}}'s</strong> Photos</a>
        </li>
        <li class="list-group-item">
            <a class="nav-link mx-3" href="#"><strong>{{$user->name}}'s</strong> Music</a>
        </li>
        <li class="list-group-item">
            <a class="nav-link mx-3" href="#"><strong>{{$user->name}}'s</strong> Followings</a>
        </li>
        <li class="list-group-item">
            <a class="nav-link mx-3" href="#"><strong>{{$user->name}}'s</strong> Followers</a>
        </li>
    </ul>
</div>
