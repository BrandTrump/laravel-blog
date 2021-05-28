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

    <!-- ---- START FOOTER 6 dark w/ 3 cols and subscribe area ---- -->
    <footer class="footer py-10">
        <div class="container">
            <div class="row ">
                <div class="col-lg-2 col-md-2 col-4">
                    <h6 class="text-sm">Company</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.creative-tim.com" target="_blank">
                                Marketing
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.creative-tim.com" target="_blank">
                                Analytics
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.creative-tim.com" target="_blank">
                                Insights
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-4">
                    <h6 class="text-sm">Support</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.creative-tim.com" target="_blank">
                                Pricing
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.creative-tim.com" target="_blank">
                                Docs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.creative-tim.com" target="_blank">
                                Guides
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-4">
                    <h6 class="text-sm">Company</h6>
                    <ul class="flex-column ms-n3 nav">
                        <li class="nav-item">
                            <a class="nav-link text-muted" href="https://www.creative-tim.com/presentation" target="_blank">
                                About Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-muted" href="https://www.creative-tim.com/blog" target="_blank">
                                Blog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-muted" href="https://www.creative-tim.com" target="_blank">
                                Jobs
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-lg-4 col-md-5 col-sm-6 col-12 ms-auto mt-4 mt-sm-0">
                    <h6>Subscribe</h6>
                    <p class="text-sm">Get access to subscriber exclusive deals and be the first who gets informed about fresh sales.</p>
                    <div class="row">
                        <div class="col-md-8 col-7">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <input class="form-control" placeholder="Enter your e-mail" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-5 ps-0">
                            <button type="button" class="btn bg-gradient-info">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ---- END FOOTER 6 dark w/ 3 cols and subscribe area ---- -->


</x-layout>