<x-main>
    <div class="container mt-3 bg-white w-100">
        <div class="rounded shadow-sm row row-cols-3">
            <div class=" p-2 rounded shadow-sm col-4 text-center text-secondary">
                  <h3>Filters</h3>
            </div>
            <div class=" p-2 text-center text-secondary rounded shadow-sm col-8">
                <h3>Posts</h3>
            </div>
        </div>
        <div class="row row-cols-3 bg-light" style="height: 1vh;">
        </div>
        <div class="rounded shadow-sm row row-cols-3" style="height: 90vh;">
            @include('posts/filters')
            @include('posts/posts')
        </div>
        <div class="rounded shadow-sm row">
            <div class="d-flex justify-content-end px-2 pt-3 ">
                {{ $posts->appends($data)->links() }}
            </div>
        </div>
    </div>
</x-main>
