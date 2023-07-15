<?php

    // Create Log folder if not exist
    function createLogFolder() {
        if (!file_exists(__DIR__.'/Log')) {
            mkdir(__DIR__.'/Log', 0755, true);
        }
    }