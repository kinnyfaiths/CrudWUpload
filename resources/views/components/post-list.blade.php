@props(['posts']);

<div class="container">
    <h2>Posts</h2>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Message</th>
            <th scope="col">File</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $index => $post)
            <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $post->message }}</td>
            <td>{{ $post->original_filename ?? "No file uploaded" }}</td>
            <td>
                <form id="formDelete" action="/deletePost/{{ $post->id }}" method="POST">
                    <a href="/updatePost/{{ $post->id }}" class="btn btn-primary">Update</a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger pt-2" value="Delete">
                </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>