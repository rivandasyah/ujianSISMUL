<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    </main>

    <footer class="page-footer" style="background-color: #000;">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h5 class="white-text" style="font-family: 'Mov5', sans-serif;">Mov5</h5>
                    <blockquote>
                        <p class="grey-text text-lighten-4">Empowering Your Movie Experience.</p>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="footer-copyright" style="background-color: #1E1E1E;">
            <div class="container">
                <small>
                    Copyright © <?= date("Y"); ?> Mov5. All rights reserved.
                </small>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
        var element = document.querySelector('.sidenav');
        var instance = M.Sidenav.init(element);
    </script>

    <style media="screen">
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        .page-footer {
            padding-top: 20px;
            padding-bottom: 10px;
        }

        .footer-copyright {
            text-align: center;
            background-color: #1E1E1E;
        }

        .btn-create {
            background-color: #0077FF;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-create:hover {
            background-color: #005BB5;
        }

        .login-link {
            color: #0077FF;
        }

        .login-link:hover {
            color: #005BB5;
        }
    </style>
</body>
</html>
