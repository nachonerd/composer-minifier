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
 * @category  Test
 * @package   Test
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2016 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/minifier
 */

/**
 * WorkerTest Class
 *
 * @category  TestCase
 * @package   Tests
 * @author    Ignacio R. Galieri <irgalieri@gmail.com>
 * @copyright 2016 Ignacio R. Galieri
 * @license   GNU GPL v3
 * @link      https://github.com/nachonerd/markdownblog
 */
class WorkerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture. This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        // To no call de parent setUp.
    }
    /**
     * Tears down the fixture. This method is called after a test is executed.
     *
     * @return void
     */
    protected function tearDown()
    {
    }

    /**
     * testClassExist
     *
     * @return void
     */
    public function testClassExist()
    {
        $this->assertEquals(
            true,
            class_exists('\NachoNerd\Composer\Minifier\Worker'),
            'Class \NachoNerd\Composer\Minifier\Worker not found'
        );
    }
}
