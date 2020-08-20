<?php
	/**
	*	This module is part of REST-auth and is released under
	*	the AGPL v3 License: https://www.gnu.org/licenses/agpl-3.0.txt
	*
	*	This program is free software: you can redistribute it and/or modify
	*	it under the terms of the GNU Affero General Public License as published by
	*	the Free Software Foundation, either version 3 of the License, or
	*	any later version.
	*
	*	This program is distributed in the hope that it will be useful,
	*	but WITHOUT ANY WARRANTY; without even the implied warranty of
	*	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	*	GNU Affero General Public License for more details.
	*
	*	You should have received a copy of the GNU Affero General Public License
	*	along with this program. If not, see <https://www.gnu.org/licenses/>.
	*/
    require_once('.config.inc.php');
    
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
    header('Content-Type: application/json');
    
    $j = array(
        "status" => 200,
        "result" => null
    );

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['api_key']) && $_POST['api_key'] === $API_KEY) {
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);

        switch ($_POST['location']) {
            case 'update':
                $redis->set($KEY_NAME, '1', $KEY_TTL);
                $j['result'] = 'SUCCESS';
                break;
            case 'query':
                $j['result'] = $redis->get($KEY_NAME);
                break;
            default:
                $j['status'] = 400;
        }
        $redis->close();
    }
    else {
        $j['status'] = 400;
    }
    echo json_encode($j, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>