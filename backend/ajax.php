<?php

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

require_once '../autoload.php';
require_once 'init.php';

new BackendInit('backend_ajax');
new BackendAJAX();
