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
     * Run
     *
     * @param Composer\Script\Event $event Composer Event
     *
     * @return void
     */
    public static function run(Event $event)
    {
        $extra = $event->getComposer()->getPackage()->getExtra();
        $rootPath = realpath(
            $event->getComposer()->getConfig()->get('vendor-dir').'/../'
        )."/";
        $path = "./";
        $dest = "./build/";
        $css = true;
        $js = true;
        $html = true;
        $others = false;

        if (!isset($extra["minifier"])) {
            echo "Not found extra minifier config. Using default config...".
                PHP_EOL;
        } else {
            if (isset($extra["minifier"]["path"])) {
                $path = $extra["minifier"]["path"];
            }
            if (isset($extra["minifier"]["dest"])) {
                $dest = $extra["minifier"]["dest"];
            }
            if (isset($extra["minifier"]["ignore-js"])) {
                $js = !$extra["minifier"]["ignore-js"];
            }
            if (isset($extra["minifier"]["ignore-css"])) {
                $css = !$extra["minifier"]["ignore-css"];
            }
            if (isset($extra["minifier"]["ignore-html"])) {
                $html = !$extra["minifier"]["ignore-html"];
            }
            if (isset($extra["minifier"]["copy-others-files"])) {
                $others = $extra["minifier"]["copy-others-files"];
            }
        }
        echo "Destination folder is {$dest}".PHP_EOL;
        echo "Serching files in {$path} ...".PHP_EOL;
        if ($html) {
            echo "Enabled HTML minifier.".PHP_EOL;
            $finder = new Finder();
            $finder->files()->name("*.html")->in(
                realpath($rootPath.$path)
            )->exclude('vendor')->exclude('coverage');
            foreach ($finder as $file) {
                echo "    ".$file->getRealpath().PHP_EOL;
                echo "    ".realpath($rootPath.$dest)."/".$file->getRelativePathname().PHP_EOL;
            }
        } else {
            echo "Disabled HTML minifier.".PHP_EOL;
        }
        if ($js) {
            echo "Enabled JS minifier.".PHP_EOL;
            $finder = new Finder();
            $finder->files()->name("*.js")->in(
                realpath($rootPath.$path)
            )->exclude('vendor')->exclude('coverage');
            foreach ($finder as $file) {
                echo "    ".$file->getRealpath().PHP_EOL;
                echo "    ".realpath($rootPath.$dest)."/".$file->getRelativePathname().PHP_EOL;
            }
        } else {
            echo "Disabled JS minifier.".PHP_EOL;
        }
        if ($css) {
            echo "Enabled CSS minifier.".PHP_EOL;
            $finder = new Finder();
            $finder->files()->name("*.css")->in(
                realpath($rootPath.$path)
            )->exclude('vendor')->exclude('coverage');
            foreach ($finder as $file) {
                echo "    ".$file->getRealpath().PHP_EOL;
                echo "    ".realpath($rootPath.$dest)."/".$file->getRelativePathname().PHP_EOL;
            }
        } else {
            echo "Disabled CSS minifier.".PHP_EOL;
        }
        if ($others) {
            echo "Copying Other Files...".PHP_EOL;
            $finder = new Finder();
            $finder->files()->notName(
                '*.html'
            )->notName(
                '*.js'
            )->notName(
                '*.css'
            )->in(
                realpath($rootPath.$path)
            )->exclude('vendor')->exclude('coverage');
            foreach ($finder as $file) {
                echo "    ".$file->getRealpath().PHP_EOL;
                echo "    ".realpath($rootPath.$dest)."/".$file->getRelativePathname().PHP_EOL;
            }
        }
    }
}
