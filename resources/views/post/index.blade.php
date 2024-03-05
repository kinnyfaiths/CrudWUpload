<x-layout>
  <div>
      @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      @endif
  </div>
  <div class="container form-control">
    <h2>Post Here</h2>
    <x-form />
  </div>

  <x-post-list :posts="$posts" />
</x-layout>