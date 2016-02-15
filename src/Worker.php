<?php
/**
 * NachoNerd Minifiier
 * Copyright (C) 2016  Ignacio R. Galieri
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP VERSION 5.4
 *
 * @category  Class
 * @package   NachoNerd\Composer\Minifier
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2016 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/minifier
 */

namespace NachoNerd\Composer\Minifier;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;
use Symfony\Component\Finder\Finder;

/**
 * Worker Class
 *
 * @category  Class
 * @package   NachoNerd\Composer\Minifier
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2016 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/silex-markdown-provider
 */
class Worker
{
    /**
     * MinifierCss
     *
     * @param String $css Css no minified
     *
     * @return String
     */
    public static function minifierCss($css)
    {
        $url = 'http://cssminifier.com/raw';
        $postdata = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(
                    array('input' => $css)
                )
            )
        );
        return file_get_contents($url, false, stream_context_create($postdata));
    }
    /**
     * MinifierJs
     *
     * @param String $js JS no minified
     *
     * @return String
     */
    public static function minifierJs($js)
    {
        $url = 'http://javascript-minifier.com/raw';
        $postdata = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(
                    array('input' => $js)
                )
            )
        );
        return file_get_contents($url, false, stream_context_create($postdata));
    }
    /**
     * MinifierHTML
     *
     * @param String $html HTML no minified
     *
     * @return String
     */
    public static function minifierHTML($html)
    {
        $url = 'http://www.willpeavy.com/minifier/';
        $postdata = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(
                    array('html' => $html)
                )
            )
        );
        $result = file_get_contents($url, false, stream_context_create($postdata));
        preg_match_all(
            "/<textarea id=\"html\" name=\"html\">.+<\/textarea>/",
            $result,
            $results
        );
        return str_replace(
            array("<textarea id=\"html\" name=\"html\">","</textarea>","\\"),
            '',
            $results[0][0]
        );
    }

    /**
     * minifier
     *
     * @return void
     */
    public static function minifier(Event $event)
    {
        
    }
}
