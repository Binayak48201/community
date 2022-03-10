<header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <div class="tt-logo">
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
                <div class="tt-desktop-menu">
                    <nav>
                        <ul>
<<<<<<< HEAD
<<<<<<< HEAD
                            <li><a href="/posts"><span>All Posts</span></a></li>
                            @if (auth()->check())
=======
                            <li><a href="\posts"><span>All Posts</span></a></li>
                            @if(auth()->check())
>>>>>>> 39a8856ac9d4f6b5ccd51bcbfe82be822d083db8
                                <li>
                                    <a href="/posts?by={{ auth()->user()->name }}">
                                        <span>My Post</span>
                                    </a>
                                </li>
                            @endif
                            <li><a href="/posts?popular=1"><span>Views</span></a></li>
                            <li><a href="page-create-topic.html"><span>Popular</span></a></li>
                            <li><a href="page-create-topic.html"><span>Likes</span></a></li>
=======
>>>>>>> 42856189f19480ffb30e9ea01fc6dc6dd6ffa36b
                            <li>
                                <a href="#"><span>Posts</span></a>
                                <ul>
                                    <li>
                                        <a href="/posts">All Posts</a>
                                        @if(auth()->check())
                                            <a href="/posts?by={{ auth()->user()->name }}">
                                                <span>My Post</span>
                                            </a>
                                        @endif
                                        <a href="page-create-topic.html"><span>Views</span></a>
                                        <a href="/posts?popular=1"><span>Popular</span></a>
                                        <a href="/posts?unanswered=1"><span>UnAnswared</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span>All Categories</span></a>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="/posts/{{ $category->slug }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- /desctop menu -->
                <!-- tt-search -->
                <div class="tt-search pl-5">
                    <!-- toggle -->
                    <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-search"></use>
                        </svg>
                    </button>
                    <!-- /toggle -->
                    <form class="search-wrapper">
                        <div class="search-form">
                            <input type="text" class="tt-search__input" placeholder="Search">
                            <button class="tt-search__btn" type="submit">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                            <button class="tt-search__close">
                                <svg class="tt-icon">
                                    <use xlink:href="#cancel"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="search-results">
                            <div class="tt-search-scroll">
                                <ul>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Rdr2 secret easter eggs</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Top 10 easter eggs in Red Dead Rede..</h6>
                                            <div class="tt-description">
                                                You can find these easter eggs in Red Dea..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Rdr2 secret easter eggs</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Top 10 easter eggs in Red Dead Rede..</h6>
                                            <div class="tt-description">
                                                You can find these easter eggs in Red Dea..
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page-single-topic.html">
                                            <h6 class="tt-title">Red Dead Redemtion: Arthur Morgan..</h6>
                                            <div class="tt-description">
                                                Here’s what I’ve found in Red Dead Redem..
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button type="button" class="tt-view-all" data-toggle="modal"
                                data-target="#modalAdvancedSearch">Advanced Search
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /tt-search -->
            </div>
            <div class="col-auto ml-auto">
                <div class="tt-user-info d-flex justify-content-center">
                    <a href="#" class="tt-btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="height" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </a>
                    <div class="tt-avatar-icon tt-size-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="custom-select-01">
                        <select>
                            <option value="Default Sorting">My Profile</option>
                            <option value="value 01">Log out</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-auto ml-auto mr-5">
                <div class="tt-account-btn">
                    @auth
                        <a href="/posts/create" class="btn btn-color02">
                            <svg xmlns="http://www.w3.org/2000/svg" class="height" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </a>
                    @else
                        <a href="/login" class="btn btn-primary">Log in</a>
                        <a href="/register" class="btn btn-secondary">Sign up</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>
