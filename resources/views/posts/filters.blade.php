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
                    <label class="my-2 " for="socialMediaId" class="form-label">Social Media</label>
                    <select class="form-select" name="socialMediaId" id="socialMediaId"
                    >
                        <option value="{{ NULL }}">Select</option>
                        @foreach ($socialMedia as $media)
                           <option value="{{ $media->id }}"
                                {{ request('socialMediaId') == $media->id ? "selected='selected'" : ''}}
                                 >
                                {{ $media->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-secondary ">
                    <label class="my-2 " for="accountId" class="form-label">UserName</label>
                    <select class="form-select" name="accountId" id="accountId">
                        <option value="{{ NULL }}">Select</option>

                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}"
                                {{ request('accountId') == $account->id ? "selected='selected'" : ''}}
                                >
                                {{ $account->user_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-secondary ">
                    <label class="my-2 " for="authorId" class="form-label">Author</label>
                    <select class="form-select" name="authorId" id="authorId">
                        <option value="{{ NULL }}">Select</option>
                        @foreach ($authors as $author)
                           <option value="{{ $author->id }}"
                                {{ request('authorId') == $author->id ? "selected='selected'" : ''}}
                                >
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-secondary ">
                    <label class="my-2 " for="listGroupId" class="form-label">List</label>
                    <select class="form-control" name="listGroupId" id="listGroupId">
                        <option value="{{ NULL }}">Select</option>
                        @foreach ($listGroups as $list)
                           <option value="{{ $list->id }}"
                                {{ request('listGroupId') == $list->id ? "selected='selected'" : ''}}
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
