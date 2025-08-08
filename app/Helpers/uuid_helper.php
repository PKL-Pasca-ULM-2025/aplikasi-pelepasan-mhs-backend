<?php

/**
 * Menghasilkan UUID acak berupa string heksadesimal 32 karakter.
 *
 * @return string UUID acak dalam format heksadesimal.
 */
function uuid(): string
{
    return bin2hex(random_bytes(16));
}
