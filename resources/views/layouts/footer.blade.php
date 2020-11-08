<footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="https://filoblu.atlassian.net/wiki/spaces/TECH/pages/1423671305/CATALOG+FLOW" target="_blank">{{ __('Catalog Flow') }}</a>
                    </li>
                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>{{ __(', made with ') }}<i class="fa fa-heart heart"></i>{{ __(' by ') }}<a class="@if(Auth::guest()) text-white @endif" href="https://www.filoblu.com" target="_blank">{{ __('FiloBlu S.p.A.') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>