<?php
if (file_exists(base_path($includePath))) {
    include_once base_path($includePath);
} else {
    echo "Can not find {$includePath}";
}
