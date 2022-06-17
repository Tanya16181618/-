<?php

    function output_info() {
        if(isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            foreach ($errors as $error) {
                echo "<p class = 'err'>$error</p>";
            }
            unset($_SESSION['errors']);
        } else if (isset($_SESSION['success'])) {
            $successes = $_SESSION['success'];
            foreach ($successes as $success) {
                echo "<p class = 'succ'>$success</p>";
            }
            unset($_SESSION['success']);
        }
    }
