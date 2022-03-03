<template>
    <main id="tt-pageContent" class="tw-bg-deep-black/5">
        <div class="container">
            <div class="tt-single-topic-list">
                <div class="tt-item">
                    <div class="tt-single-topic">
                        <div class="tt-item-header">
                            <div class="tt-item-info info-top">
                                <div class="tt-avatar-icon">
                                    <img src="https://gravatar.com/avatar" alt="" style="border-radius: 50%;">
                                </div>
                                <div class="tt-avatar-title">
                                    <a href="#">{{ post.user.name }}</a>
                                </div>
                                <p class="tt-info-time">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="height" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ post.created_date }}
                                </p>
                            </div>
                            <h3 class="tt-item-title">
                                <a href="#">{{ post.title }}</a>
                            </h3>
                            <div class="tt-item-tag">
                                <ul class="tt-list-badge">
                                    <li><a href="#"><span class="tt-color03 tt-badge">Category Name</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tt-item-description">
                            {{ post.body }}
                        </div>
                        <div class="tt-item-info info-bottom">
                            <a href="#" class="tt-icon-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span class="tt-text">671</span>
                            </a>
                            <div class="col-separator"></div>
                            <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="height" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </a>
                            <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="height red" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tt-item">
                    <div class="tt-info-box">
                        <h6 class="tt-title">Posts Status</h6>
                        <div class="tt-row-icon">
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    <span class="tt-text">283</span>
                                </a>
                            </div>
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px;" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span class="tt-text">10.5k</span>
                                </a>
                            </div>
                            <div class="tt-item">
                                <a href="#" class="tt-icon-btn tt-position-bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         style="height: 20px;"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                    </svg>
                                    <span class="tt-text">10.5k</span>
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
                <Replies :slug="post.slug" :path="post.path"></Replies>
            </div>

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
