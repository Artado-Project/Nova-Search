<?php

session_start();
session_unset();
session_destroy();
header("location:\Nova-Search/index.php");