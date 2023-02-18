<footer class="mt-5" style="background-color: #2B0548">
    <div class="container section">
        <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <a class="d-inline-block mb-4 pb-2" href="/">
                    <img loading="prelaod" decoding="async" class="img-fluid"
                        src="/frontend/images/logo-favicon/logo_white.png" width="120" alt="{{ blogInfo()->blog_name }}">
                </a>
                <ul class="p-0 d-flex navbar-footer mb-0 list-unstyled">
                    <li class="nav-item my-0"> <a class="nav-link" href="{{ route('about_me') }}">About</a></li>
                    <li class="nav-item my-0"> <a class="nav-link" href="{{ route('contact_page') }}">Contact</a></li>
                    <li class="nav-item my-0"> <a class="nav-link" href="#">404 Page</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright content" style="background-color: #2B0548">&copy; <script>document.write(new Date().getFullYear())</script> Designed &amp; Developed By <a
            href="/">{{ blogInfo()->blog_name }}</a></div>
</footer>