<div class="overflow-auto col-4" >
    <div class="mt-2 dropdown" height="200">
        <div>
            <form method="GET" action="#">
                <div class="text-secondary ">
                    <label class="my-2 " for="search" class="form-label">Post search</label>
                    <input class="form-control" id="search" name="search" placeholder="Type to search..."  value="{{ request('search') }}">
                </div>
                <div class="row-cols-2 d-flex text-secondary ">
                    <div class="me-1">
                        <label class="my-2 " for="dateStart" class="form-label">Data start</label>
                        <input class="form-control" type="date" name="dateStart" id="dateStart"
                            value="{{ request('dateStart') ?? $dateStart  }}"
                        >
                    </div>
                    <div class="ms-1">
                        <label class="my-2 " for="dateEnd" class="form-label">Data end</label>
                        <input class="form-control" type="date" name="dateEnd"
                            value="{{ request('dateEnd') ?? $dateEnd  }}"
                        >
                    </div>
                </div>
                <div class="text-secondary ">
                    <label class="my-2 " for="socialMedia" class="form-label">Social Media</label>
                    <select class="form-select" name="socialMedia" id="socialMedia"
                    >
                        <option value="{{ NULL }}">Select</option>
                        @foreach ($socialMedia as $media)
                           <option value="{{ $media->id }}"
                                {{ request('socialMedia') == $media->id ? "selected='selected'" : ''}}
                                 >
                                {{ $media->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-secondary ">
                    <label class="my-2 " for="author" class="form-label">UserName</label>
                    <select class="form-select" name="author" id="author">
                        <option value="{{ NULL }}">Select</option>

                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ request('author') == $author->id ? "selected='selected'" : ''}}
                                >
                                {{ $author->user_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-secondary ">
                    <label class="my-2 " for="user" class="form-label">Author</label>
                    <select class="form-select" name="user" id="user">
                        <option value="{{ NULL }}">Select</option>
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}"
                                {{ request('user') == $user->id ? "selected='selected'" : ''}}
                                >
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-secondary ">
                    <label class="my-2 " for="listGroup" class="form-label">List</label>
                    <select class="form-control" name="listGroup" id="listGroup">
                        <option value="{{ NULL }}">Select</option>
                        @foreach ($listGroups as $list)
                           <option value="{{ $list->id }}"
                                {{ request('listGroup') == $list->id ? "selected='selected'" : ''}}
                                >
                                {{ $list->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="my-4 d-flex justify-content-between">
                    <a href="/posts" type="" class="px-3 btn btn-outline-secondary">
                        Clear filters
                    </a href="/posts">
                    <button type="submit" class="px-3 btn btn-outline-primary">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
