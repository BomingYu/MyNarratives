<div class="profileCard">
    <h2>Profile Editing</h2>
    <form enctype="multipart/form-data" class="postForm" action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="labelNinput">
            <label class="form-check-label" for="randomIcon">Avatar File </label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="labelNinput">
            <label class="form-check-label" for="randomIcon">Use Random Avatar</label>
            <input class="form-check-input mt-0" type="checkbox" name="randomIcon" id="randomIcon">
        </div>
        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
        @error('name')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
        <textarea class="form-control" name="bio">{{ $user->bio }}</textarea>
        @error('bio')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
        <div>
            <button class="btn btn-success" style="margin-right: 10px;" type="submit">Update</button>
            <a href="{{ route('user.profile', $user->id) }}">Back To View</a>
        </div>
    </form>
    {{-- <form action="">
        <button class="btn btn-warning">Random Avatar</button>
    </form> --}}
</div>
<script>
    document.getElementById('randomIcon').addEventListener('change', function() {
        var imageInput = document.getElementById('image');
        if (this.checked) {
            imageInput.disabled = true;
        } else {
            imageInput.disabled = false;
        }
    });
</script>
