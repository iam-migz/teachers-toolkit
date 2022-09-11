<?php
session_start();
session_destroy();
header(
    "Location: http://localhost/teachers-toolkit-app/client/login/login.html"
);
