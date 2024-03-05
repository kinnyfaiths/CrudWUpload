<form id="postForm" action="/createPost" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="index" value="{{ $index ?? null }}">
    <div class="form-floating">
        <textarea class="form-control" placeholder="Post a message here" id="message" name="message" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Post</label>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Upload a file</label>
        <input class="form-control" type="file" id="file" name="file" accept=".pdf, .docx">
    </div>
    <button class="form-control btn btn-primary" type="submit" value="Submit">Submit</button>

</form>

