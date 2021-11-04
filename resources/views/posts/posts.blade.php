<div class="overflow-auto col-8" style="height: 85vh;">
    @if($posts->isEmpty())
        <div class="text-secondary text-center mt-5 ">
            <span class="fst-italic">
                No posts available
            </span>
        </div>
    @endif
    @foreach ($posts as $post)
        <div class="p-2 m-2 overflow-hidden rounded shadow-sm opacity-75 bg-light text-dark">
            <div>
                <span class="fs-4">{{ $post->title }}</span>
            </div>
            <div>
                <span class="fs-6">{{ $post->body }}</span>
            </div>
            <div>
                <a href="#" alt=#>
                    {{ $post->link }}
                </a>
            </div>
            <div>
                @foreach($post->author->listGroups as $list)
                    <span class="badge rounded-pill bg-success">
                        {{ $list->name }}
                    </span>
                @endforeach
            </div>
            <div class="flex-row my-0 mb-0 d-flex justify-content-end">
                <span class="fw-light">
                    <a href="?author={{ $post->author->id }}">{{ $post->author->name }}</a>
                </span>
                &nbsp;
                <span class="fw-light fst-italic">
                    <span class="fs-6 fst-italic">posted</span>
                    {{ ($post->date)->diffForHumans() }}
                </span>
                &nbsp;
                <span class="fw-light fst-italic">
                    on {{ $post->socialMedia->name }}
                </span>
            </div>
        </div>
    @endforeach
</div>
