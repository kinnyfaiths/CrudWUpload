<x-layout>
    <div class="container form-control">
        <h1>Update your data</h1>
        <form id="postForm" action="/doUpdatePost/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="index" value="{{ $post->id }}">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Post a message here" id="message" name="message" style="height: 100px">{{ $post->message }}</textarea>
                <label for="floatingTextarea2">Post</label>
            </div>

            <div>
                <span><b>File Uploaded:</b> {{ $post->original_filename ?? "None" }}</i></span>                
            </div>
            
            <div class="mb-3 pt-3">
                <label for="formFile" class="form-label">Upload/Replace a file</label>
                <input class="form-control" type="file" id="file" name="file" accept=".pdf, .docx" value="{{ $post->filepath }}">
            </div>
            <button class="form-control btn btn-primary" type="submit" value="Submit">Update</button>
            <p class="text-center"><a href="/" class="link-offset-2">Back</a></p>
        
        </form>
    </div>
</x-layout>