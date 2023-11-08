@auth
    <div class="rightDiv">
        <form class="d-flex m-2" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        @include('components.sideBars.myRightFollowsBar')
        @include('components.sideBars.myRightFollowersBar')
    </div>
@endauth
