<?php

function uuid() : string {
    return random_bytes(64);
}
