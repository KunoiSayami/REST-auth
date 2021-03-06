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
    ini_set("display_errors","Off");
	header('X-Frame-Options:SAMEORIGIN');

    static $API_KEY = '';
    static $KEY_NAME = '';
    static $KEY_TTL = 1200;
?>