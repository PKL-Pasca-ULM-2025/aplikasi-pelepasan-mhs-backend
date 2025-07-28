<?php

function uuid() : string {
    return bin2hex(random_bytes(16));
}
