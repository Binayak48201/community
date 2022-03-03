<template>
    <main id="tt-pageContent" class="tw-bg-deep-black/5">
        <div class="container">
            <div class="tt-single-topic-list">
                <div class="tt-item">
                    <div class="tt-single-topic">
                        <div class="tt-item-header">
                            <div class="tt-item-info info-top">
                                <div class="tt-avatar-title">
                                    <a href="#">dylan89</a>
                                </div>
                                <a href="#" class="tt-info-time">
                                    {{ post.created_date }}
                                    <!--                                    @can('update',$post)-->
                                    <!--                                    <button>Delete</button>-->
                                    <!--                                    @endcan-->
                                </a>
                            </div>
                            <h3 class="tt-item-title">
                                <a href="#">{{ post.title }}</a>
                            </h3>
                        </div>
                        <div class="tt-item-description">
                            {{ post.body }}
                        </div>
                    </div>
                </div>
                <div class="tt-item">
                    <div class="tt-info-box">
                        <h6 class="tt-title">Posts Status</h6>
                        <p>
                            <!--                            This post was posted by {{ post.user.name }} which-->
                            <!--                            contains <span>1</span>-->
                            .
                        </p>
                        <div class="tt-row-icon">
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <i class="tt-icon">
                                        <svg>
                                            <use xlink:href="#icon-reply"></use>
                                        </svg>
                                    </i>
                                    <span class="tt-text">283</span>
                                </a>
                            </div>
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <i class="tt-icon">
                                        <svg>
                                            <use xlink:href="#icon-view"></use>
                                        </svg>
                                    </i>
                                    <span class="tt-text">10.5k</span>
                                </a>
                            </div>
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <i class="tt-icon">
                                        <svg>
                                            <use xlink:href="#icon-user"></use>
                                        </svg>
                                    </i>
                                    <span class="tt-text">168</span>
                                </a>
                            </div>
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <i class="tt-icon">
                                        <svg>
                                            <use xlink:href="#icon-like"></use>
                                        </svg>
                                    </i>
                                    <span class="tt-text">2.4k</span>
                                </a>
                            </div>
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <i class="tt-icon">
                                        <svg>
                                            <use xlink:href="#icon-favorite"></use>
                                        </svg>
                                    </i>
                                    <span class="tt-text">951</span>
                                </a>
                            </div>
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <i class="tt-icon">
                                        <svg>
                                            <use xlink:href="#icon-share"></use>
                                        </svg>
                                    </i>
                                    <span class="tt-text">32</span>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row-object-inline form-default">
                            <h6 class="tt-title">Sort replies by:</h6>
                            <ul class="tt-list-badge tt-size-lg">
                                <li><a href="#"><span class="tt-badge">Recent</span></a></li>
                                <li><a href="#"><span class="tt-color02 tt-badge">Most Liked</span></a></li>
                                <li><a href="#"><span class="tt-badge">Longest</span></a></li>
                                <li><a href="#"><span class="tt-badge">Shortest</span></a></li>
                                <li><a href="#"><span class="tt-badge">Accepted Answers</span></a></li>
                            </ul>
                            <select class="tt-select form-control">
                                <option value="Recent">Recent</option>
                                <option value="Most Liked">Most Liked</option>
                                <option value="Longest">Longest</option>
                                <option value="Shortest">Shortest</option>
                                <option value="Accepted Answer">Accepted Answer</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <Replies :slug="post.slug" :path="post.path"></Replies>
        </div>
    </main>
</template>
<script>
import Replies from "../components/Replies";

export default {
    name: 'RepliesView',
    props: ['post'],
    components: {Replies},
    data() {
        return {
            signedIn: window.App.signedIn,
            body: ''
        }
    },
}

</script>
