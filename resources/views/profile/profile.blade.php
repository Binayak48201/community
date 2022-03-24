@extends('layouts.app')

@section('content')
    <main id="tt-pageContent" class="tt-offset-small">
        <div class="tt-wrapper-section" style="background-image: radial-gradient(circle at 0 2%,#283e63,#172337 99%);">
            <div class="container">
                <div class="tt-user-header pb-5">
                    <div class="tt-col-avatar">
                        <div class="tt-icon">

                            <Avatar></Avatar>

                            {{--                            <img src="https://via.placeholder.com/150"--}}
                            {{--                                 style=" width: 100px;height: 100px;border-radius: 50%">--}}
                        </div>
                    </div>
                    <div class="tt-col-title pl-4">
                        <div class="tt-title">
                            <a href="#" class="white">{{ auth()->user()->name }}</a>
                        </div>
                    </div>
                    <div class="tt-col-btn" id="js-settings-btn">
                        <div class="tt-list-btn">
                            <a href="#" class="tt-btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none"
                                     class="white"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tt-tab-wrapper">
                <div class="tt-wrapper-inner">
                    <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                        <li class="nav-item show">
                            <a class="nav-link active" data-toggle="tab" href="#tt-tab-01" role="tab"
                               aria-selected="true"><span>Activity</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tt-tab-02" role="tab"
                               aria-selected="false"><span>My Posts</span></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane tt-indent-none show active" id="tt-tab-01" role="tabpanel">
                        @foreach($activities as $date => $activity)
                            <div class="tt-topic-list">
                                <div class="tt-list-header">
                                    <h3 class="tt-col-topic">{{ $date }}</h3>
                                </div>
                                @foreach($activity as $collection)
                                    @if(view()->exists("profile.activity.{$collection->type}"))
                                        @include("profile.activity.{$collection->type}",['activity' => $collection])
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane tt-indent-none" id="tt-tab-02" role="tabpanel">
                        <div class="tt-topic-list">
                            <div class="tt-list-header">
                                <div class="tt-col-topic">Topic</div>
                                <div class="tt-col-category">Category</div>
                                <div class="tt-col-value hide-mobile">Likes</div>
                                <div class="tt-col-value hide-mobile">Replies</div>
                                <div class="tt-col-value hide-mobile">Views</div>
                                <div class="tt-col-value">Activity</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-pinned"></use>
                                            </svg>
                                            Halloween Costume Contest 2018
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color01 tt-badge">politics</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">contests</span></a></li>
                                                <li><a href="#"><span class="tt-badge">authors</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">1h</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color01 tt-badge">politics</span></div>
                                <div class="tt-col-value hide-mobile">985</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">502</div>
                                <div class="tt-col-value hide-mobile">15.1k</div>
                                <div class="tt-col-value hide-mobile">1h</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-locked"></use>
                                            </svg>
                                            We’re removing Envato Credits from Market
                                        </a></h6>
                                    <div class="row align-items-center no-gutters hide-desktope">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color02 tt-badge">video</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">1d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color02 tt-badge">video</span></div>
                                <div class="tt-col-value hide-mobile">584</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">35</div>
                                <div class="tt-col-value hide-mobile">1.3k</div>
                                <div class="tt-col-value hide-mobile">2h</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            Web Hosting Packages for ThemeForest WordPress
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color03 tt-badge">exchange</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                                <li><a href="#"><span class="tt-badge">elements</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">2h</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color03 tt-badge">exchange</span></div>
                                <div class="tt-col-value hide-mobile">401</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">975</div>
                                <div class="tt-col-value hide-mobile">12.6k</div>
                                <div class="tt-col-value hide-mobile">2h</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            Review Queue Changes for VideoHive &amp; PhotoDune
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color04 tt-badge">pets</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                                <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">1d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color04 tt-badge">pets</span></div>
                                <div class="tt-col-value hide-mobile">308</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">660</div>
                                <div class="tt-col-value hide-mobile">8.3k</div>
                                <div class="tt-col-value hide-mobile">1d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            Does Envato act against the authors of Envato markets?
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color05 tt-badge">music</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                                <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">1d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color05 tt-badge">music</span></div>
                                <div class="tt-col-value hide-mobile">358</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">68</div>
                                <div class="tt-col-value hide-mobile">8.3k</div>
                                <div class="tt-col-value hide-mobile">1d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-locked"></use>
                                            </svg>
                                            We Want to Hear From You! What Would You Like?
                                        </a></h6>
                                    <div class="row align-items-center no-gutters hide-desktope">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color06 tt-badge">movies</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">2d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color06 tt-badge">movies</span></div>
                                <div class="tt-col-value hide-mobile">671</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">29</div>
                                <div class="tt-col-value hide-mobile">1.3k</div>
                                <div class="tt-col-value hide-mobile">2d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            Seeking partner backend developer
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color15 tt-badge">nature</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                                <li><a href="#"><span class="tt-badge">elements</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">2d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color15 tt-badge">nature</span></div>
                                <div class="tt-col-value hide-mobile">278</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">27</div>
                                <div class="tt-col-value hide-mobile">1.4k</div>
                                <div class="tt-col-value hide-mobile">2d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            Seeking partner backend developer
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color07 tt-badge">video games</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                                <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">2d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color07 tt-badge">video games</span></div>
                                <div class="tt-col-value hide-mobile">364</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">36</div>
                                <div class="tt-col-value hide-mobile">982</div>
                                <div class="tt-col-value hide-mobile">2d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-verified"></use>
                                            </svg>
                                            Microsoft Word and Power Point
                                        </a></h6>
                                    <div class="row align-items-center no-gutters hide-desktope">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color08 tt-badge">youtube</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">3d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color08 tt-badge">youtube</span></div>
                                <div class="tt-col-value hide-mobile">698</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">78</div>
                                <div class="tt-col-value hide-mobile">2.1k</div>
                                <div class="tt-col-value hide-mobile">3d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            First website template got rejected.
                                        </a></h6>
                                    <div class="row align-items-center no-gutters hide-desktope">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color09 tt-badge">social</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">3d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color09 tt-badge">social</span></div>
                                <div class="tt-col-value hide-mobile">12</div>
                                <div class="tt-col-value tt-color-select hide-mobile">3</div>
                                <div class="tt-col-value hide-mobile">268</div>
                                <div class="tt-col-value hide-mobile">3d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-pinned"></use>
                                            </svg>
                                            Proform or looking for contacting billing department
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color10 tt-badge">science</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">contests</span></a></li>
                                                <li><a href="#"><span class="tt-badge">authors</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">2d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color10 tt-badge">science</span></div>
                                <div class="tt-col-value hide-mobile">364</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">36</div>
                                <div class="tt-col-value hide-mobile">982</div>
                                <div class="tt-col-value hide-mobile">2d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-locked"></use>
                                            </svg>
                                            Refund for wrongly purchase HTML template
                                        </a></h6>
                                    <div class="row align-items-center no-gutters hide-desktope">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color11 tt-badge">entertainment</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">3d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color11 tt-badge">entertainment</span>
                                </div>
                                <div class="tt-col-value hide-mobile">657</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">177</div>
                                <div class="tt-col-value hide-mobile">2.6k</div>
                                <div class="tt-col-value hide-mobile">3d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            Why all my affiliate balance is pending?
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color03 tt-badge">exchange</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                                <li><a href="#"><span class="tt-badge">elements</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">4d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color03 tt-badge">exchange</span></div>
                                <div class="tt-col-value hide-mobile">37</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">31</div>
                                <div class="tt-col-value hide-mobile">257</div>
                                <div class="tt-col-value hide-mobile">4d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            Google snippets wordpress plugin
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color04 tt-badge">pets</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                                <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">4d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color04 tt-badge">pets</span></div>
                                <div class="tt-col-value hide-mobile">987</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">271</div>
                                <div class="tt-col-value hide-mobile">3.8k</div>
                                <div class="tt-col-value hide-mobile">4d</div>
                            </div>
                            <div class="tt-item">
                                <div class="tt-col-avatar">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-ava-d"></use>
                                    </svg>
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title"><a href="#">
                                            How to use Team Listing?
                                        </a></h6>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-11">
                                            <ul class="tt-list-badge">
                                                <li class="show-mobile"><a href="#"><span class="tt-color09 tt-badge">social</span></a>
                                                </li>
                                                <li><a href="#"><span class="tt-badge">videohive</span></a></li>
                                                <li><a href="#"><span class="tt-badge">photodune</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-1 ml-auto show-mobile">
                                            <div class="tt-value">5d</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt-col-category"><span class="tt-color09 tt-badge">social</span></div>
                                <div class="tt-col-value hide-mobile">324</div>
                                <div class="tt-col-value tt-color-select  hide-mobile">163</div>
                                <div class="tt-col-value hide-mobile">2.3k</div>
                                <div class="tt-col-value hide-mobile">5d</div>
                            </div>
                            <div class="tt-row-btn">
                                <button type="button" class="btn-icon js-topiclist-showmore">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-load_lore_icon"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{--    <div id="js-popup-settings" class="tt-popup-settings column-open ps-container ps-theme-default ps-active-y" data-ps-id="63c424cd-8ae6-337d-5dab-3b80a6ba4c01">--}}
    {{--	<div class="tt-btn-col-close">--}}
    {{--		<a href="#">--}}
    {{--			<span class="tt-icon-title">--}}
    {{--				<svg>--}}
    {{--					<use xlink:href="#icon-settings_fill"></use>--}}
    {{--				</svg>--}}
    {{--			</span>--}}
    {{--			<span class="tt-icon-text">--}}
    {{--				Settings--}}
    {{--			</span>--}}
    {{--			<span class="tt-icon-close">--}}
    {{--				<svg>--}}
    {{--					<use xlink:href="#icon-cancel"></use>--}}
    {{--				</svg>--}}
    {{--			</span>--}}
    {{--		</a>--}}
    {{--	</div>--}}
    {{--	<form class="form-default">--}}
    {{--		<div class="tt-form-upload">--}}
    {{--			<div class="row no-gutter">--}}
    {{--				<div class="col-auto">--}}
    {{--					<div class="tt-avatar">--}}
    {{--		                <svg>--}}
    {{--		                  <use xlink:href="#icon-ava-d"></use>--}}
    {{--		                </svg>--}}
    {{--		            </div>--}}
    {{--				</div>--}}
    {{--				<div class="col-auto ml-auto">--}}
    {{--					<a href="#" class="btn btn-primary">Upload Picture</a>--}}
    {{--				</div>--}}
    {{--			</div>--}}
    {{--		</div>--}}
    {{--		<div class="form-group">--}}
    {{--		    <label for="settingsUserName">Username</label>--}}
    {{--		   <input type="text" name="name" class="form-control" id="settingsUserName" placeholder="azyrusmax">--}}
    {{--		</div>--}}
    {{--		<div class="form-group">--}}
    {{--		    <label for="settingsUserEmail">Email</label>--}}
    {{--		   <input type="text" name="name" class="form-control" id="settingsUserEmail" placeholder="Sample@sample.com">--}}
    {{--		</div>--}}
    {{--		<div class="form-group">--}}
    {{--		    <label for="settingsUserPassword">Password</label>--}}
    {{--		   <input type="password" name="name" class="form-control" id="settingsUserPassword" placeholder="************">--}}
    {{--		</div>--}}
    {{--		<div class="form-group">--}}
    {{--		    <label for="settingsUserLocation">Location</label>--}}
    {{--		   <input type="text" name="name" class="form-control" id="settingsUserLocation" placeholder="Slovakia">--}}
    {{--		</div>--}}
    {{--		<div class="form-group">--}}
    {{--		    <label for="settingsUserWebsite">Website</label>--}}
    {{--		   <input type="text" name="name" class="form-control" id="settingsUserWebsite" placeholder="Sample.com">--}}
    {{--		</div>--}}
    {{--		<div class="form-group">--}}
    {{--		    <label for="settingsUserAbout">About</label>--}}
    {{--		    <textarea name="" placeholder="Few words about you" class="form-control" id="settingsUserAbout"></textarea>--}}
    {{--		</div>--}}
    {{--		<div class="form-group">--}}
    {{--			<label for="settingsUserAbout">Notify me via Email</label>--}}
    {{--			<div class="checkbox-group">--}}
    {{--		        <input type="checkbox" id="settingsCheckBox01" name="checkbox">--}}
    {{--		        <label for="settingsCheckBox01">--}}
    {{--		            <span class="check"></span>--}}
    {{--		            <span class="box"></span>--}}
    {{--		            <span class="tt-text">When someone replies to my thread</span>--}}
    {{--		        </label>--}}
    {{--		    </div>--}}
    {{--		    <div class="checkbox-group">--}}
    {{--		        <input type="checkbox" id="settingsCheckBox02" name="checkbox">--}}
    {{--		        <label for="settingsCheckBox02">--}}
    {{--		            <span class="check"></span>--}}
    {{--		            <span class="box"></span>--}}
    {{--		            <span class="tt-text">When someone likes my thread or reply</span>--}}
    {{--		        </label>--}}
    {{--		    </div>--}}
    {{--		    <div class="checkbox-group">--}}
    {{--		        <input type="checkbox" id="settingsCheckBox03" name="checkbox">--}}
    {{--		        <label for="settingsCheckBox03">--}}
    {{--		            <span class="check"></span>--}}
    {{--		            <span class="box"></span>--}}
    {{--		            <span class="tt-text">When someone mentions me</span>--}}
    {{--		        </label>--}}
    {{--		    </div>--}}
    {{--		</div>--}}
    {{--		<div class="form-group">--}}
    {{--			<a href="#" class="btn btn-secondary">Save</a>--}}
    {{--		</div>--}}
    {{--		</form>--}}
    {{--<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 271px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 60px;"></div></div></div>--}}
@endsection
