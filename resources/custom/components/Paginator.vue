<template>
    <nav class="custom-flex mt-4">
        <ul class="pagination row">
            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">‹ Previous</span>
            </li>

            <li class="page-item">
                <a class="page-link" href="http://127.0.0.1:8000/posts?page=2" rel="next"
                   aria-label="Next »">› Next</a></li>
        </ul>
    </nav>
</template>
<script>
export default {}
</script>
