<x-layout>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="text-center">
                    <a class="blog-header-logo text-dark" href="/">My Bolg</a>
                </div>
            </div>
        </header>

        <div id="app">
                <div class="mt-3">
<!--                    <articles></articles>-->

                    @include('post-creation.form')

                    <nav class="blog-pagination" aria-label="Pagination">
                        <br><a class="btn btn-outline-primary" href="/">Go Back</a>
                    </nav>
                </div>
        </div>
    </div>

    <script src ="{{ asset('js/app.js') }}"></script>


</x-layout>