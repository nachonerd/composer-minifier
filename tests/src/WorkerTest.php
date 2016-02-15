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
     * TestClassExist
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

    /**
     * ProviderCss
     *
     * @return array
     */
    public function providerCss()
    {
        $css = <<<CSS
/* HEADERBG STARTS */
.headerbg{
	background: url(../images/ignacio-galieri.jpg);
	min-height:700px;
	width:100%;
	background-size:cover;
}
CSS;
        $css1 = <<<CSS
/* HEADERBG STARTS */
.headerbg{background:url(../images/ignacio-galieri.jpg);min-height:700px;width:100%;background-size:cover}
CSS;
        $css2 = <<<CSS
        /*----
        	Author: W3layouts
        	Author URL: http://w3layouts.com
        	License: Creative Commons Attribution 3.0 Unported
        	License URL: http://creativecommons.org/licenses/by/3.0/
        ---*/
        html,body{
        	font-family: 'Lato', sans-serif;
        }
        .clear{
        	clear:both;
        }
        body a{
        	transition:0.5s all;
        	-webkit-transition:0.5s all;
        	-o-transition:0.5s all;
        	-ms-transition:0.5s all;
        	-o-transition:0.5s all;
        }
        body input,body input[type="submit"],body textarea,body input[type="button"]{
        	-webkit-appearance:none;
        }
        /*------ HEADERBG STARTS---------*/
        .headerbg{
        	background: url(../images/ignacio-galieri.jpg);
        	min-height:700px;
        	width:100%;
        	background-size:cover;
        }
        /*------ HEADER STARTS---------*/
        .header{
        	background:rgba(0, 0, 0, 0.24);
        }
        /*------ CONTAINER STARTS---------*/
        .container{
        	width:70%;
        }
        /*------ LOGO STARTS---------*/
        .logo{
        	float:left;
        	margin:0.5em 0 0.5em 0em;
        }
        .logo a{
        	color:#B5A9B7;
        	font-size:1.9em;
        }
        .logo a:hover{
        	color:#B5A9B7;
            text-decoration:none;
        }
        .logo img {
        	border-bottom-left-radius: 50%;
        	border-bottom-right-radius: 50%;
        	border-top-left-radius: 50%;
        	border-top-right-radius: 50%;
        }
        /*------ LOGO ENDS---------*/
CSS;
        $css3 = "body,html{font-family:Lato,sans-serif}.clear{clear:both}body a{transition:.5s all;-webkit-transition:.5s all;-ms-transition:.5s all;-o-transition:.5s all}body input,body input[type=submit],body input[type=button],body textarea{-webkit-appearance:none}.headerbg{background:url(../images/ignacio-galieri.jpg);min-height:700px;width:100%;background-size:cover}.header{background:rgba(0,0,0,.24)}.container{width:70%}.logo{float:left;margin:.5em 0}.logo a{color:#B5A9B7;font-size:1.9em}.logo a:hover{color:#B5A9B7;text-decoration:none}.logo img{border-radius:50%}";
        return array(
            array($css, ".headerbg{background:url(../images/ignacio-galieri.jpg);min-height:700px;width:100%;background-size:cover}"),
            array($css1, ".headerbg{background:url(../images/ignacio-galieri.jpg);min-height:700px;width:100%;background-size:cover}"),
            array($css2, "body,html{font-family:Lato,sans-serif}.clear{clear:both}body a{transition:.5s all;-webkit-transition:.5s all;-ms-transition:.5s all;-o-transition:.5s all}body input,body input[type=submit],body input[type=button],body textarea{-webkit-appearance:none}.headerbg{background:url(../images/ignacio-galieri.jpg);min-height:700px;width:100%;background-size:cover}.header{background:rgba(0,0,0,.24)}.container{width:70%}.logo{float:left;margin:.5em 0}.logo a{color:#B5A9B7;font-size:1.9em}.logo a:hover{color:#B5A9B7;text-decoration:none}.logo img{border-radius:50%}"),
            array($css3, "body,html{font-family:Lato,sans-serif}.clear{clear:both}body a{transition:.5s all;-webkit-transition:.5s all;-ms-transition:.5s all;-o-transition:.5s all}body input,body input[type=button],body input[type=submit],body textarea{-webkit-appearance:none}.headerbg{background:url(../images/ignacio-galieri.jpg);min-height:700px;width:100%;background-size:cover}.header{background:rgba(0,0,0,.24)}.container{width:70%}.logo{float:left;margin:.5em 0}.logo a{color:#B5A9B7;font-size:1.9em}.logo a:hover{color:#B5A9B7;text-decoration:none}.logo img{border-radius:50%}"),
        );
    }

    /**
     * TestMinifierCss
     *
     * @param string $css       Css no minified
     * @param string $cssResult Css minified
     *
     * @return void
     *
     * @dataProvider providerCss
     */
    public function testMinifierCss($css, $cssResult)
    {
        $result = \NachoNerd\Composer\Minifier\Worker::minifierCss($css);
        $this->assertEquals(
            $cssResult,
            $result,
            'Css Minifiy Fail'
        );
    }

    /**
     * ProviderJs
     *
     * @return array
     */
    public function providerJs()
    {
        $js = <<<JS
// circles
// copyright Artan Sinani
// https://github.com/lugolabs/circles

/*
  Lightwheight JavaScript library that generates circular graphs in SVG.

  Call Circles.create(options) with the following options:

    id         - the DOM element that will hold the graph
    percentage - the percentage dictating the smaller circle
    radius     - the radius of the circles
    width      - the width of the ring (optional, has value 10, if not specified)
    number     - the number to display at the centre of the graph (optional, the percentage will show if not specified)
    text       - the text to display after the number (optional, nothing will show if not specified)
    colors     - an array of colors, with the first item coloring the full circle
                 (optional, it will be `['#EEE', '#F00']` if not specified)
    duration   - value in ms of animation duration; (optional, defaults to 500);
                 if `null` is passed, the animation will not run

  API:
    generate(radius) - regenerates the circle with the given radius (see spec/responsive.html for an example hot to create a responsive circle)

*/

(function() {
  var Circles = window.Circles = function(options) {
    var elId = options.id;
    this._el = document.getElementById(elId);

    if (this._el === null) return;


    this._radius         = options.radius;
    this._percentage     = options.percentage;
    this._text           = options.text; // #3
    this._number         = options.number || this._percentage;
    this._strokeWidth    = options.width  || 10;
    this._colors         = options.colors || ['#EEE', '#F00'];
    this._interval       = 16;
    this._textWrpClass   = 'circles-text-wrp';
    this._textClass      = 'circles-text';
    this._numberClass    = 'circles-number';

    this._confirmAnimation(options.duration);

    var endAngleRad      = Math.PI / 180 * 270;
    this._start          = -Math.PI / 180 * 90;
    this._startPrecise   = this._precise(this._start);
    this._circ           = endAngleRad - this._start;

    this.generate();

    if (this._canAnimate) this._animate();
  };

  Circles.prototype = {
    VERSION: '0.0.4',

    generate: function(radius) {
      if (radius) {
        this._radius = radius;
        this._canAnimate = false;
      }
      this._svgSize        = this._radius * 2;
      this._radiusAdjusted = this._radius - (this._strokeWidth / 2);
      this._el.innerHTML   = this._wrap(this._generateSvg() + this._generateText());
    },

    _confirmAnimation: function(duration) {
      if (duration === null) {
        this._canAnimate = false;
        return;
      }

      duration = duration || 500;

      var step     = duration / this._interval,
        pathFactor = this._percentage / step,
        numberFactor = this._number / step;

      if (this._percentage <= (1 + pathFactor)) {
        this._canAnimate = false;
      } else {
        this._canAnimate   = true;
        this._pathFactor   = pathFactor;
        this._numberFactor = numberFactor;
      }
    },

    _animate: function() {
      var i      = 1,
        self     = this,
        path     = this._el.getElementsByTagName('path')[1],
        numberEl = this._getNumberElement(),

        isInt    = this._number % 1 === 0,

        requestAnimFrame = window.requestAnimationFrame       ||
                           window.webkitRequestAnimationFrame ||
                           window.mozRequestAnimationFrame    ||
                           window.oRequestAnimationFrame      ||
                           window.msRequestAnimationFrame     ||
                           function (callback) {
                               setTimeout(callback, self._interval);
                           },

        animate = function() {
          var percentage   = self._pathFactor * i,
            nextPercentage = self._pathFactor * (i + 1),
            number         = self._numberFactor * i,
            canContinue    = true;
          if (isInt) {
            number = Math.round(number);
          }
          if (nextPercentage > self._percentage) {
            percentage  = self._percentage;
            number      = self._number;
            canContinue = false;
          }
          if (percentage > self._percentage) return;
          path.setAttribute('d', self._calculatePath(percentage, true));
          numberEl.innerHTML = self._calculateNumber(number);
          i++;
          if (canContinue) requestAnimFrame(animate);
        };

      requestAnimFrame(animate);
    },

    _getNumberElement: function() {
      var divs = this._el.getElementsByTagName('span');
      for (var i = 0, l = divs.length; i < l; i++) {
        if (divs[i].className === this._numberClass) return divs[i];
      }
    },

    _wrap: function(content) {
      return '<div class="circles-wrp" style="position:relative; display:inline-block;">' + content + '</div>';
    },

    _generateText: function() {
      var html =  '<div class="' + this._textWrpClass + '" style="position:absolute; top:0; left:0; text-align:center; width:100%;' +
        ' font-size:' + this._radius * .7 + 'px; height:' + this._svgSize + 'px; line-height:' + this._svgSize + 'px;">' +
        this._calculateNumber(this._canAnimate ? 0 : this._number);
      if (this._text) {
        html += '<span class="' + this._textClass + '">' + this._text + '</span>';
      }
      html += '</div>';
      return html;
    },

    _calculateNumber: function(number) {
      var parts = (number + '').split('.'),
        html = '<span class="' + this._numberClass + '">' + parts[0];
      if (parts.length > 1) {
        html += '.<span style="font-size:.4em">' + parts[1].substring(0, 2) + '</span>';
      }
      return html + '</span>';
    },

    _generateSvg: function() {
      return '<svg width="' + this._svgSize + '" height="' + this._svgSize + '">' +
        this._generatePath(100, false, this._colors[0]) +
        this._generatePath(this._canAnimate ? 1 : this._percentage, true, this._colors[1]) +
      '</svg>';
    },

    _generatePath: function(percentage, open, color) {
      return '<path fill="transparent" stroke="' + color + '" stroke-width="' + this._strokeWidth + '" d="' + this._calculatePath(percentage, open) + '"/>';
    },

    _calculatePath: function(percentage, open) {
      var end      = this._start + ((percentage / 100) * this._circ),
        endPrecise = this._precise(end);
      return this._arc(endPrecise, open);
    },

    _arc: function(end, open) {
      var endAdjusted = end - 0.001,
        longArc       = end - this._startPrecise < Math.PI ? 0 : 1;

      return [
        'M',
        this._radius + this._radiusAdjusted * Math.cos(this._startPrecise),
        this._radius + this._radiusAdjusted * Math.sin(this._startPrecise),
        'A', // arcTo
        this._radiusAdjusted, // x radius
        this._radiusAdjusted, // y radius
        0, // slanting
        longArc, // long or short arc
        1, // clockwise
        this._radius + this._radiusAdjusted * Math.cos(endAdjusted),
        this._radius + this._radiusAdjusted * Math.sin(endAdjusted),
        open ? '' : 'Z' // close
      ].join(' ');
    },

    _precise: function(value) {
      return Math.round(value * 1000) / 1000;
    }
  };

  Circles.create = function(options) {
    return new Circles(options);
  };
})();
JS;
        $js1 = <<<JS
jQuery.extend(jQuery.easing,{easeInQuad:function(n,t,e,u,a){return u*(t/=a)*t+e},easeOutQuad:function(n,t,e,u,a){return-u*(t/=a)*(t-2)+e},easeInOutQuad:function(n,t,e,u,a){return(t/=a/2)<1?u/2*t*t+e:-u/2*(--t*(t-2)-1)+e},easeInCubic:function(n,t,e,u,a){return u*(t/=a)*t*t+e},easeOutCubic:function(n,t,e,u,a){return u*((t=t/a-1)*t*t+1)+e},easeInOutCubic:function(n,t,e,u,a){return(t/=a/2)<1?u/2*t*t*t+e:u/2*((t-=2)*t*t+2)+e},easeInQuart:function(n,t,e,u,a){return u*(t/=a)*t*t*t+e},easeOutQuart:function(n,t,e,u,a){return-u*((t=t/a-1)*t*t*t-1)+e},easeInOutQuart:function(n,t,e,u,a){return(t/=a/2)<1?u/2*t*t*t*t+e:-u/2*((t-=2)*t*t*t-2)+e},easeInQuint:function(n,t,e,u,a){return u*(t/=a)*t*t*t*t+e},easeOutQuint:function(n,t,e,u,a){return u*((t=t/a-1)*t*t*t*t+1)+e},easeInOutQuint:function(n,t,e,u,a){return(t/=a/2)<1?u/2*t*t*t*t*t+e:u/2*((t-=2)*t*t*t*t+2)+e},easeInSine:function(n,t,e,u,a){return-u*Math.cos(t/a*(Math.PI/2))+u+e},easeOutSine:function(n,t,e,u,a){return u*Math.sin(t/a*(Math.PI/2))+e},easeInOutSine:function(n,t,e,u,a){return-u/2*(Math.cos(Math.PI*t/a)-1)+e},easeInExpo:function(n,t,e,u,a){return 0==t?e:u*Math.pow(2,10*(t/a-1))+e},easeOutExpo:function(n,t,e,u,a){return t==a?e+u:u*(-Math.pow(2,-10*t/a)+1)+e},easeInOutExpo:function(n,t,e,u,a){return 0==t?e:t==a?e+u:(t/=a/2)<1?u/2*Math.pow(2,10*(t-1))+e:u/2*(-Math.pow(2,-10*--t)+2)+e},easeInCirc:function(n,t,e,u,a){return-u*(Math.sqrt(1-(t/=a)*t)-1)+e},easeOutCirc:function(n,t,e,u,a){return u*Math.sqrt(1-(t=t/a-1)*t)+e},easeInOutCirc:function(n,t,e,u,a){return(t/=a/2)<1?-u/2*(Math.sqrt(1-t*t)-1)+e:u/2*(Math.sqrt(1-(t-=2)*t)+1)+e},easeInElastic:function(n,t,e,u,a){var r=1.70158,i=0,s=u;if(0==t)return e;if(1==(t/=a))return e+u;if(i||(i=.3*a),s<Math.abs(u)){s=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/s);return-(s*Math.pow(2,10*(t-=1))*Math.sin((t*a-r)*(2*Math.PI)/i))+e},easeOutElastic:function(n,t,e,u,a){var r=1.70158,i=0,s=u;if(0==t)return e;if(1==(t/=a))return e+u;if(i||(i=.3*a),s<Math.abs(u)){s=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/s);return s*Math.pow(2,-10*t)*Math.sin((t*a-r)*(2*Math.PI)/i)+u+e},easeInOutElastic:function(n,t,e,u,a){var r=1.70158,i=0,s=u;if(0==t)return e;if(2==(t/=a/2))return e+u;if(i||(i=a*(.3*1.5)),s<Math.abs(u)){s=u;var r=i/4}else var r=i/(2*Math.PI)*Math.asin(u/s);return 1>t?-.5*(s*Math.pow(2,10*(t-=1))*Math.sin((t*a-r)*(2*Math.PI)/i))+e:s*Math.pow(2,-10*(t-=1))*Math.sin((t*a-r)*(2*Math.PI)/i)*.5+u+e},easeInBack:function(n,t,e,u,a,r){return void 0==r&&(r=1.70158),u*(t/=a)*t*((r+1)*t-r)+e},easeOutBack:function(n,t,e,u,a,r){return void 0==r&&(r=1.70158),u*((t=t/a-1)*t*((r+1)*t+r)+1)+e},easeInOutBack:function(n,t,e,u,a,r){return void 0==r&&(r=1.70158),(t/=a/2)<1?u/2*(t*t*(((r*=1.525)+1)*t-r))+e:u/2*((t-=2)*t*(((r*=1.525)+1)*t+r)+2)+e},easeInBounce:function(n,t,e,u,a){return u-jQuery.easing.easeOutBounce(n,a-t,0,u,a)+e},easeOutBounce:function(n,t,e,u,a){return(t/=a)<1/2.75?u*(7.5625*t*t)+e:2/2.75>t?u*(7.5625*(t-=1.5/2.75)*t+.75)+e:2.5/2.75>t?u*(7.5625*(t-=2.25/2.75)*t+.9375)+e:u*(7.5625*(t-=2.625/2.75)*t+.984375)+e},easeInOutBounce:function(n,t,e,u,a){return a/2>t?.5*jQuery.easing.easeInBounce(n,2*t,0,u,a)+e:.5*jQuery.easing.easeOutBounce(n,2*t-a,0,u,a)+.5*u+e}});
JS;
        $js2 = <<<JS
!function(){var t=window.Circles=function(t){var e=t.id;if(this._el=document.getElementById(e),null!==this._el){this._radius=t.radius,this._percentage=t.percentage,this._text=t.text,this._number=t.number||this._percentage,this._strokeWidth=t.width||10,this._colors=t.colors||["#EEE","#F00"],this._interval=16,this._textWrpClass="circles-text-wrp",this._textClass="circles-text",this._numberClass="circles-number",this._confirmAnimation(t.duration);var i=Math.PI/180*270;this._start=-Math.PI/180*90,this._startPrecise=this._precise(this._start),this._circ=i-this._start,this.generate(),this._canAnimate&&this._animate()}};t.prototype={VERSION:"0.0.4",generate:function(t){t&&(this._radius=t,this._canAnimate=!1),this._svgSize=2*this._radius,this._radiusAdjusted=this._radius-this._strokeWidth/2,this._el.innerHTML=this._wrap(this._generateSvg()+this._generateText())},_confirmAnimation:function(t){if(null===t)return void(this._canAnimate=!1);t=t||500;var e=t/this._interval,i=this._percentage/e,s=this._number/e;this._percentage<=1+i?this._canAnimate=!1:(this._canAnimate=!0,this._pathFactor=i,this._numberFactor=s)},_animate:function(){var t=1,e=this,i=this._el.getElementsByTagName("path")[1],s=this._getNumberElement(),a=this._number%1===0,n=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(t){setTimeout(t,e._interval)},r=function(){var h=e._pathFactor*t,_=e._pathFactor*(t+1),u=e._numberFactor*t,c=!0;a&&(u=Math.round(u)),_>e._percentage&&(h=e._percentage,u=e._number,c=!1),h>e._percentage||(i.setAttribute("d",e._calculatePath(h,!0)),s.innerHTML=e._calculateNumber(u),t++,c&&n(r))};n(r)},_getNumberElement:function(){for(var t=this._el.getElementsByTagName("span"),e=0,i=t.length;i>e;e++)if(t[e].className===this._numberClass)return t[e]},_wrap:function(t){return'<div class="circles-wrp" style="position:relative; display:inline-block;">'+t+"</div>"},_generateText:function(){var t='<div class="'+this._textWrpClass+'" style="position:absolute; top:0; left:0; text-align:center; width:100%; font-size:'+.7*this._radius+"px; height:"+this._svgSize+"px; line-height:"+this._svgSize+'px;">'+this._calculateNumber(this._canAnimate?0:this._number);return this._text&&(t+='<span class="'+this._textClass+'">'+this._text+"</span>"),t+="</div>"},_calculateNumber:function(t){var e=(t+"").split("."),i='<span class="'+this._numberClass+'">'+e[0];return e.length>1&&(i+='.<span style="font-size:.4em">'+e[1].substring(0,2)+"</span>"),i+"</span>"},_generateSvg:function(){return'<svg width="'+this._svgSize+'" height="'+this._svgSize+'">'+this._generatePath(100,!1,this._colors[0])+this._generatePath(this._canAnimate?1:this._percentage,!0,this._colors[1])+"</svg>"},_generatePath:function(t,e,i){return'<path fill="transparent" stroke="'+i+'" stroke-width="'+this._strokeWidth+'" d="'+this._calculatePath(t,e)+'"/>'},_calculatePath:function(t,e){var i=this._start+t/100*this._circ,s=this._precise(i);return this._arc(s,e)},_arc:function(t,e){var i=t-.001,s=t-this._startPrecise<Math.PI?0:1;return["M",this._radius+this._radiusAdjusted*Math.cos(this._startPrecise),this._radius+this._radiusAdjusted*Math.sin(this._startPrecise),"A",this._radiusAdjusted,this._radiusAdjusted,0,s,1,this._radius+this._radiusAdjusted*Math.cos(i),this._radius+this._radiusAdjusted*Math.sin(i),e?"":"Z"].join(" ")},_precise:function(t){return Math.round(1e3*t)/1e3}},t.create=function(e){return new t(e)}}();
JS;
        return array(
            array($js, $js2),
            array($js1, $js1),
        );
    }

    /**
     * TestMinifierJs
     *
     * @param string $js       JS no minified
     * @param string $jsResult JS minified
     *
     * @return void
     *
     * @dataProvider providerJs
     */
    public function testMinifierJs($js, $jsResult)
    {
        $result = \NachoNerd\Composer\Minifier\Worker::minifierJs($js);
        $this->assertEquals(
            trim($jsResult),
            trim($result),
            'JS Minifiy Fail'
        );
    }

    /**
     * ProviderHTML
     *
     * @return array
     */
    public function providerHTML()
    {
        $html = <<<JS
<div class="nav">
    <ul>
        <li><a class="scroll" href="#about">ABOUT</a></li>
        <li><a class="scroll" href="#skills">SKILLS</a></li>
        <li><a class="scroll" href="#port">PROJECTS</a></li>
        <li><a class="scroll" href="#contact">CONTACT</a></li>
        <li>
            <a href="https://github.com/irgalieri/web" title="Fork me on GitHub" target="_blank">
            <span class="fa-stack fa-lg" alt="Fork me on GitHub">
            <i class="fa fa-square-o fa-stack-2x" ></i>
            <i class="fa fa-code-fork fa-stack-1x"></i>
            </span>
            </a>
        </li>
    </ul>
</div>
JS;
        $html1 = <<<JS
<div class="nav"> <ul> <li><a class="scroll" href="#about">ABOUT</a></li><li><a class="scroll" href="#skills">SKILLS</a></li><li><a class="scroll" href="#port">PROJECTS</a></li><li><a class="scroll" href="#contact">CONTACT</a></li><li> <a href="https://github.com/irgalieri/web" title="Fork me on GitHub" target="_blank"> <span class="fa-stack fa-lg" alt="Fork me on GitHub"> <i class="fa fa-square-o fa-stack-2x" ></i> <i class="fa fa-code-fork fa-stack-1x"></i> </span> </a> </li></ul></div>
JS;
        $html2 = <<<JS
<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
<!DOCTYPE html>
<html>
    <head>
        <title>Ignacio R. Galieri | Freelance | Consulting | PHP | JS | javascript | Programmer | Development | Programador | Desarrollador</title>
        <meta name="keywords" content="consulting, php, programmer, js, javascript, java, script, development, programador, desarrollador, consultor, freelance, galieri">
        <meta name="description" content="Ignacio R. Galieri Personal web page | Consulting | PHP | JS | javascript | Programmer| Development | Programador | Desarrollador | freelance">
        <!------favicon begin--------->
        <link rel="apple-touch-icon" sizes="57x57" href="/images/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/images/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/images/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/images/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/images/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/images/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/images/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/images/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!------favicon end--------->
        <!------social begin--------->

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@NachoNerd">
        <meta name="twitter:title" content="Ignacio R. Galieri | Freelance | Consulting | PHP | JS | javascript | Programmer | Development | Programador | Desarrollador">
        <meta name="twitter:description" content="Ignacio R. Galieri Personal web page | Consulting | PHP | JS | javascript | Programmer| Development | Programador | Desarrollador | freelance">
        <meta name="twitter:creator" content="@NachoNerd">
        <meta name="twitter:image" content="http://elnachonerd.com/images/image.jpg">

        <!-- Open Graph data -->
        <meta property="og:title" content="Ignacio R. Galieri | Freelance | Consulting | PHP | JS | javascript | Programmer | Development | Programador | Desarrollador" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://elnachonerd.com/" />
        <meta property="og:image" content="http://elnachonerd.com/images/image-200x200.jpg" />
        <meta property="og:description" content="Ignacio R. Galieri Personal web page | Consulting | PHP | JS | javascript | Programmer| Development | Programador | Desarrollador | freelance" />
        <meta property="og:site_name" content="El Nacho Nerd, Ignacio R. Galieri" />
        <meta property="fb:admins" content="966242223397117" />
        <!------social end--------->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="css/style.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/animate.min.css" rel='stylesheet' type='text/css' />
        <link href="css/jquery.wordrotator.min.css" rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!------headerbg starts--------->
        <div id="top-top" class="headerbg">
            <!------header starts--------->
            <div class="header">
                <!------container starts--------->
                <div class="container">
                    <div class="logo">
                        <img alt="" class="avatar" height="40" src="images/nachonerd.jpg" width="40" style="border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;border-top-left-radius: 20px;border-top-right-radius: 20px;">
                    </div>
                    <!------Navigation starts--------->
                    <div class="nav">
                        <ul>
                            <li><a class="scroll" href="#about">ABOUT</a></li>
                            <li><a class="scroll" href="#skills">SKILLS</a></li>
                            <li><a class="scroll" href="#port">PROJECTS</a></li>
                            <li><a class="scroll" href="#contact">CONTACT</a></li>
                            <li>
                                <a href="https://github.com/irgalieri/web" title="Fork me on GitHub" target="_blank">
                                <span class="fa-stack fa-lg" alt="Fork me on GitHub">
                                <i class="fa fa-square-o fa-stack-2x" ></i>
                                <i class="fa fa-code-fork fa-stack-1x"></i>
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!------Navigation ends-------->
                    <div class="clear"></div>
                </div>
                <!------container ends--------->
            </div>
            <!------header ends--------->
            <!------Banner starts--------->
            <div class="banner">
                <div class="container">
                    <div class="banner-info">
                        <div class="bannerlogo">
                            <span class="fa-stack fa-lg fa-2x">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-terminal fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="bannerhead">
                            <h2>My name is <span>Ignacio Rodrigo Galieri.</span></h2>
                            <h3 style="color:#ffffe0;">PHP & JS Programmer. Consulting.</h3>
                            <p>"Learn from yesterday, live for today, hope for tomorrow. The important thing is not to stop questioning."</p>
                            <div style="float: right; padding-right: 20px; color:#ffffe0;"><b>Albert Einstein</b></div>
                            <a class="downarrow scroll" href="#about">
                            <i class="fa fa-chevron-circle-down fa-4x fa-inverse"></i>
                            </a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!------Banner ends-------->
        </div>
        <!------Headerbg ends-------->
        <!------Content starts--------->
        <div class="content">
            <!------About starts--------->
            <div id="about" class="about">
                <div class="container">
                    <div class="header-section text-center">
                        <h2><span> </span>ABOUT<span> </span></h2>
                    </div>
                    <span>
                        <p>
                            I am an electronics technician, but I am also an autodidact: I have learned my skills on my own and I have extensive experience in application development. You will find that I am a very enterprising person with great skills to conduct good research on my own. I am quite optimistic by nature, I don&#39;t know the meaning of the word &#39;no&#39;. I have a lot of experience working with PHP (more than 6 years), besides I have a great deal of expertise and knowledge of JavaScript (NodeJs and Browser native), Bash and Python.
                        </p>
                    </span>
                    <div class="years">
                        <h4><b>2002 - 2006</b></h4>
                        <span>
                            <h4>Computer Technician - Freelancer</h4>
                        </span>
                        <p><i>Maintain, repair, upgrade or replace hardware and software systems. Windows and Linux.</i></p>
                    </div>
                    <div class="years">
                        <h4><b>2006 - 2007</b></h4>
                        <span>
                            <h4>Assistant of Engineer - Alejandro Benaben</h4>
                        </span>
                        <p><i>Assistance to Alejandro Benaben in his line of work: administration of Linux servers.</i></p>
                    </div>
                    <div class="years">
                        <h4><b>2007 - 2007</b></h4>
                        <span>
                            <h4>Technical Auditor - UTN</h4>
                        </span>
                        <p><i>In charge of auditing all information related to the work of Engineers involved in several academic projects. I was also in charge of uploading this information for later statistical analysis.</i></p>
                    </div>
                    <div class="years">
                        <h4><b>2007 - 2008</b></h4>
                        <span>
                            <h4>Systems Development - Aufiero Informatica SRL</h4>
                        </span>
                        <p><i>Design, develop and implement of client-server and web systems. Working with languages such as C#, Java And ActionScript, with tools like Hibernate and Flex.</i></p>
                    </div>
                    <div class="years">
                        <h4><b>2008 - 2010</b></h4>
                        <span>
                            <h4>Systems Development - Certificado Digital S.A.</h4>
                        </span>
                        <p><i>Design, develop and implement of web systems, using digital certificates to authenticate users and sign documents, working with languages such as PHP, Python, Shell Script and ANSI SQL, with frameworks like jQuery, and libraries like RRDTOOLs.</i></p>
                    </div>
                    <div class="years">
                        <h4><b>2010 - 2013</b></h4>
                        <span>
                            <h4>Front-End Systems Programmer - Intraway</h4>
                        </span>
                        <p><i>Development and maintenance of web applications. Member of the Telephony team, using protocols like SIP and PacketCable, working with languages like PHP, JavaScript, and SQL, with jQuery, CodeIgniter and Prototype frameworks. The team also used Scrum, UML, and TDD methodologies.</i></p>
                    </div>
                    <div class="years">
                        <h4><b>2013 - Current</b></h4>
                        <span>
                            <h4>Project Leader - Intraway</h4>
                        </span>
                        <p><i>Design, development, maintenance and implementation of web applications. Leadership and training of development team (6 members). The team worked with several languages, such as PHP, JavaScript, Shell Script, Python and SQL, with several frameworks, such as Symfony2, CodeIgniter, jQuery and Silex. We used agile methodologies: Kanban, Scrum and TDD. The team also used several testing tools such as SoapUI and PHPUnit.</i></p>
                    </div>
                    <div class="years">
                        <h4><b>2015 - Current</b></h4>
                        <span>
                            <h4>API Practice Leader - Intraway</h4>
                        </span>
                        <p><i>Research of best practices regarding web APIs, such as REST and SOAP. In charge of defining corporate API guidelines. I am also in charge of training other developers regarding said best practices. I have written several articles on the subject and I currently lead the company API community.</i></p>
                    </div>
                    <a class="arrow scroll" href="#skills">
                    <i class="fa fa-chevron-circle-down fa-4x fa-inverse"></i>
                    </a>
                </div>
            </div>
            <!------About Ends--------->
            <!------SKILLS Starts--------->
            <div id="skills" class="skills">
                <div class="container">
                    <div class="skills-grids">
                        <div class="skill-section text-center">
                            <h2><span> </span>SKILLS<span> </span></h2>
                        </div>
                        <div class="services_grids">
                            <div id="canvas">
                                <div class="skill-grids text-center">
                                    <div style="float:none;">
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>PHP</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>JAVASCRIPT</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>PYTHON</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>BASH</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>SILEX</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>SYMFONY2</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>EXPRESS</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>JQUERY</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>OOP</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>SOAP</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>RESTful</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>UNIT TEST</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>MYSQL</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>ORACLE</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>ENGLISH</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="skill-grid">
                                                <h3>SPANISH</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="down scroll" href="#port">
                <i class="fa fa-chevron-circle-down fa-4x fa-inverse"></i>
                </a>
            </div>
        </div>
        <!------SKILLS Ends--------->
        <!------PORTFOLIO Starts--------->
        <div id="port" class="Portfolio">
            <div class="Portfolio-section text-center">
                <h2><span> </span>PROJECTS<span> </span></h2>
            </div>
            <div class="container">
                <div class="portfolio-grids">
                    <div class="portfolio-grid col-md-4">
                        <a href="https://www.npmjs.com/package/memqueue" target="_blank"><img src="images/monitr1.png"></a>
                        <p>This NodeJs library is an implementation of queue with Memcached.</p>
                        <a href="https://www.npmjs.com/package/memqueue" target="_blank"><i class="fa fa-arrow-circle-right fa-3x"></i></a>
                    </div>
                    <div class="portfolio-grid col-md-4">
                        <a href="https://packagist.org/packages/nachonerd/silex-finder-provider" target="_blank"><img src="images/monitr2.png"></a>
                        <p>This is a Silex service provider and a wrapper of Symfony finder.</p>
                        <a href="https://packagist.org/packages/nachonerd/silex-finder-provider" target="_blank"><i class="fa fa-arrow-circle-right fa-3x"></i></a>
                    </div>
                    <div class="portfolio-grid col-md-4">
                        <a href="https://packagist.org/packages/nachonerd/silex-markdown-provider" target="_blank"><img src="images/monitr3.png"></a>
                        <p>This is a Silex service provider and a wrapper of Cebe/markdown.</p>
                        <a href="https://packagist.org/packages/nachonerd/silex-markdown-provider" target="_blank"><i class="fa fa-arrow-circle-right fa-3x"></i></a>
                    </div>
                    <div class="clear"> </div>
                </div>
                <a class="portdown scroll" href="#contact">
                <i class="fa fa-chevron-circle-down fa-4x fa-inverse nacho-down"></i>
                </a>
            </div>
        </div>
        </div>
        <!------Content Ends-------->
        <!------FOOTER Starts----------->
        <div  id="contact" class="footer">
            <div class="container">
                <div class="contact-section text-center">
                    <h2><span> </span>CONTACT<span> </span></h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-left">
                            <div class="social-icons">
                                <a href="https://co.linkedin.com/in/ignacio-rodrigo-galieri-bb2022a"><i class="fa fa-linkedin-square fa-2x social-icon"></i></a>
                                <a href="https://github.com/irgalieri"><i class="fa fa-github-square fa-2x social-icon"></i></a>
                                <a href="https://twitter.com/NachoNerd"><i class="fa fa-twitter-square fa-2x social-icon"></i></a>
                            </div>
                            <p><b>Hire Me!</b></p>
                            <p>I'm available for freelance work on PHP or JavaScript projects. I can work in-house in Bogot&aacute;, I can also work remotely, if you are not based in Bogot&aacute;. Interested?</p>
                            <p>Please, fill out the following form to contact me. Thank you.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-right">
                            <div class="form">
                                <form id="contact-form">
                                    <input id="name" type="text" class="text" placeholder="Name" required>
                                    <input id="email" type="email" class="email" placeholder="E-mail address" required>
                                    <input id="subject" type="text" class="text" placeholder="Subject" required>
                                    <textarea id="body" rows="2" cols="70" placeholder="Your message..." required></textarea>
                                    <div class="clear"> </div>
                                    <div id="success" class="alert alert-success" role="alert" style="display:none; width: 300px; float: left; padding-top: 5px; padding-bottom: 5px; margin-left: 50px; text-align: left;">Thanks! I have received your message.</div>
                                    <div id="danger" class="alert alert-danger" role="alert" style="display:none; width: 300px; float: left; padding-top: 5px; padding-bottom: 5px; margin-left: 50px; text-align: left;">Upss!!!! Something was wrong!!!</div>
                                    <button id="send" class="btn btn-default" data-loading-text="Sending..." type="submit">SEND</button>
                                </form>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <p class="copy-right">Template by <a href="http://w3layouts.com/">W3layouts</a></p>
                    </div>
                </div>
            </div>
            <a class="up scroll" href="#top-top">
            <i class="fa fa-chevron-circle-up fa-4x fa-inverse"></i>
            </a>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script type="application/x-javascript" src="js/jquery.wordrotator.min.js" />
        <script type="application/x-javascript">
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
        </script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
JS;
        $html3 = <<<HTML
<!-- Author: W3layouts Author URL: http://w3layouts.com License: Creative Commons Attribution 3.0 Unported License URL: http://creativecommons.org/licenses/by/3.0/ --><!DOCTYPE html><html> <head> <title>Ignacio R. Galieri | Freelance | Consulting | PHP | JS | javascript | Programmer | Development | Programador | Desarrollador</title> <meta name="keywords" content="consulting, php, programmer, js, javascript, java, script, development, programador, desarrollador, consultor, freelance, galieri"> <meta name="description" content="Ignacio R. Galieri Personal web page | Consulting | PHP | JS | javascript | Programmer| Development | Programador | Desarrollador | freelance"> <link rel="apple-touch-icon" sizes="57x57" href="/images/apple-icon-57x57.png"> <link rel="apple-touch-icon" sizes="60x60" href="/images/apple-icon-60x60.png"> <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-icon-72x72.png"> <link rel="apple-touch-icon" sizes="76x76" href="/images/apple-icon-76x76.png"> <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-icon-114x114.png"> <link rel="apple-touch-icon" sizes="120x120" href="/images/apple-icon-120x120.png"> <link rel="apple-touch-icon" sizes="144x144" href="/images/apple-icon-144x144.png"> <link rel="apple-touch-icon" sizes="152x152" href="/images/apple-icon-152x152.png"> <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-icon-180x180.png"> <link rel="icon" type="image/png" sizes="192x192" href="/images/android-icon-192x192.png"> <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png"> <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon-96x96.png"> <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png"> <link rel="manifest" href="/manifest.json"> <meta name="viewport" content="width=device-width, initial-scale=1"> <meta name="msapplication-TileColor" content="#ffffff"> <meta name="msapplication-TileImage" content="/images/ms-icon-144x144.png"> <meta name="theme-color" content="#ffffff"> <meta name="twitter:card" content="summary"> <meta name="twitter:site" content="@NachoNerd"> <meta name="twitter:title" content="Ignacio R. Galieri | Freelance | Consulting | PHP | JS | javascript | Programmer | Development | Programador | Desarrollador"> <meta name="twitter:description" content="Ignacio R. Galieri Personal web page | Consulting | PHP | JS | javascript | Programmer| Development | Programador | Desarrollador | freelance"> <meta name="twitter:creator" content="@NachoNerd"> <meta name="twitter:image" content="http://elnachonerd.com/images/image.jpg"> <meta property="og:title" content="Ignacio R. Galieri | Freelance | Consulting | PHP | JS | javascript | Programmer | Development | Programador | Desarrollador"/> <meta property="og:type" content="article"/> <meta property="og:url" content="http://elnachonerd.com/"/> <meta property="og:image" content="http://elnachonerd.com/images/image-200x200.jpg"/> <meta property="og:description" content="Ignacio R. Galieri Personal web page | Consulting | PHP | JS | javascript | Programmer| Development | Programador | Desarrollador | freelance"/> <meta property="og:site_name" content="El Nacho Nerd, Ignacio R. Galieri"/> <meta property="fb:admins" content="966242223397117"/> <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> <link href="css/style.min.css" rel="stylesheet" type="text/css" media="all"/> <link href="css/animate.min.css" rel='stylesheet' type='text/css'/> <link href="css/jquery.wordrotator.min.css" rel='stylesheet' type='text/css'/> <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'> </head> <body> <div id="top-top" class="headerbg"> <div class="header"> <div class="container"> <div class="logo"> <img alt="" class="avatar" height="40" src="images/nachonerd.jpg" width="40" style="border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;border-top-left-radius: 20px;border-top-right-radius: 20px;"> </div><div class="nav"> <ul> <li><a class="scroll" href="#about">ABOUT</a></li><li><a class="scroll" href="#skills">SKILLS</a></li><li><a class="scroll" href="#port">PROJECTS</a></li><li><a class="scroll" href="#contact">CONTACT</a></li><li> <a href="https://github.com/irgalieri/web" title="Fork me on GitHub" target="_blank"> <span class="fa-stack fa-lg" alt="Fork me on GitHub"> <i class="fa fa-square-o fa-stack-2x" ></i> <i class="fa fa-code-fork fa-stack-1x"></i> </span> </a> </li></ul> </div><div class="clear"></div></div></div><div class="banner"> <div class="container"> <div class="banner-info"> <div class="bannerlogo"> <span class="fa-stack fa-lg fa-2x"> <i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span> </div><div class="bannerhead"> <h2>My name is <span>Ignacio Rodrigo Galieri.</span></h2> <h3 style="color:#ffffe0;">PHP &amp; JS Programmer. Consulting.</h3> <p>"Learn from yesterday, live for today, hope for tomorrow. The important thing is not to stop questioning."</p><div style="float: right; padding-right: 20px; color:#ffffe0;"><b>Albert Einstein</b></div><a class="downarrow scroll" href="#about"> <i class="fa fa-chevron-circle-down fa-4x fa-inverse"></i> </a> </div></div><div class="clear"></div></div></div></div><div class="content"> <div id="about" class="about"> <div class="container"> <div class="header-section text-center"> <h2><span> </span>ABOUT<span> </span></h2> </div><span> <p> I am an electronics technician, but I am also an autodidact: I have learned my skills on my own and I have extensive experience in application development. You will find that I am a very enterprising person with great skills to conduct good research on my own. I am quite optimistic by nature, I don&amp;#39;t know the meaning of the word &amp;#39;no&amp;#39;. I have a lot of experience working with PHP (more than 6 years), besides I have a great deal of expertise and knowledge of JavaScript (NodeJs and Browser native), Bash and Python. </p></span> <div class="years"> <h4><b>2002 - 2006</b></h4> <span> <h4>Computer Technician - Freelancer</h4> </span> <p><i>Maintain, repair, upgrade or replace hardware and software systems. Windows and Linux.</i></p></div><div class="years"> <h4><b>2006 - 2007</b></h4> <span> <h4>Assistant of Engineer - Alejandro Benaben</h4> </span> <p><i>Assistance to Alejandro Benaben in his line of work: administration of Linux servers.</i></p></div><div class="years"> <h4><b>2007 - 2007</b></h4> <span> <h4>Technical Auditor - UTN</h4> </span> <p><i>In charge of auditing all information related to the work of Engineers involved in several academic projects. I was also in charge of uploading this information for later statistical analysis.</i></p></div><div class="years"> <h4><b>2007 - 2008</b></h4> <span> <h4>Systems Development - Aufiero Informatica SRL</h4> </span> <p><i>Design, develop and implement of client-server and web systems. Working with languages such as C#, Java And ActionScript, with tools like Hibernate and Flex.</i></p></div><div class="years"> <h4><b>2008 - 2010</b></h4> <span> <h4>Systems Development - Certificado Digital S.A.</h4> </span> <p><i>Design, develop and implement of web systems, using digital certificates to authenticate users and sign documents, working with languages such as PHP, Python, Shell Script and ANSI SQL, with frameworks like jQuery, and libraries like RRDTOOLs.</i></p></div><div class="years"> <h4><b>2010 - 2013</b></h4> <span> <h4>Front-End Systems Programmer - Intraway</h4> </span> <p><i>Development and maintenance of web applications. Member of the Telephony team, using protocols like SIP and PacketCable, working with languages like PHP, JavaScript, and SQL, with jQuery, CodeIgniter and Prototype frameworks. The team also used Scrum, UML, and TDD methodologies.</i></p></div><div class="years"> <h4><b>2013 - Current</b></h4> <span> <h4>Project Leader - Intraway</h4> </span> <p><i>Design, development, maintenance and implementation of web applications. Leadership and training of development team (6 members). The team worked with several languages, such as PHP, JavaScript, Shell Script, Python and SQL, with several frameworks, such as Symfony2, CodeIgniter, jQuery and Silex. We used agile methodologies: Kanban, Scrum and TDD. The team also used several testing tools such as SoapUI and PHPUnit.</i></p></div><div class="years"> <h4><b>2015 - Current</b></h4> <span> <h4>API Practice Leader - Intraway</h4> </span> <p><i>Research of best practices regarding web APIs, such as REST and SOAP. In charge of defining corporate API guidelines. I am also in charge of training other developers regarding said best practices. I have written several articles on the subject and I currently lead the company API community.</i></p></div><a class="arrow scroll" href="#skills"> <i class="fa fa-chevron-circle-down fa-4x fa-inverse"></i> </a> </div></div><div id="skills" class="skills"> <div class="container"> <div class="skills-grids"> <div class="skill-section text-center"> <h2><span> </span>SKILLS<span> </span></h2> </div><div class="services_grids"> <div id="canvas"> <div class="skill-grids text-center"> <div style="float:none;"> <div class="col-md-3"> <div class="skill-grid"> <h3>PHP</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>JAVASCRIPT</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>PYTHON</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>BASH</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>SILEX</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>SYMFONY2</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>EXPRESS</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>JQUERY</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>OOP</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>SOAP</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>RESTful</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>UNIT TEST</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>MYSQL</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>ORACLE</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>ENGLISH</h3> </div></div><div class="col-md-3"> <div class="skill-grid"> <h3>SPANISH</h3> </div></div></div><div class="clearfix"> </div></div></div></div></div></div><a class="down scroll" href="#port"> <i class="fa fa-chevron-circle-down fa-4x fa-inverse"></i> </a> </div></div><div id="port" class="Portfolio"> <div class="Portfolio-section text-center"> <h2><span> </span>PROJECTS<span> </span></h2> </div><div class="container"> <div class="portfolio-grids"> <div class="portfolio-grid col-md-4"> <a href="https://www.npmjs.com/package/memqueue" target="_blank"><img src="images/monitr1.png"></a> <p>This NodeJs library is an implementation of queue with Memcached.</p><a href="https://www.npmjs.com/package/memqueue" target="_blank"><i class="fa fa-arrow-circle-right fa-3x"></i></a> </div><div class="portfolio-grid col-md-4"> <a href="https://packagist.org/packages/nachonerd/silex-finder-provider" target="_blank"><img src="images/monitr2.png"></a> <p>This is a Silex service provider and a wrapper of Symfony finder.</p><a href="https://packagist.org/packages/nachonerd/silex-finder-provider" target="_blank"><i class="fa fa-arrow-circle-right fa-3x"></i></a> </div><div class="portfolio-grid col-md-4"> <a href="https://packagist.org/packages/nachonerd/silex-markdown-provider" target="_blank"><img src="images/monitr3.png"></a> <p>This is a Silex service provider and a wrapper of Cebe/markdown.</p><a href="https://packagist.org/packages/nachonerd/silex-markdown-provider" target="_blank"><i class="fa fa-arrow-circle-right fa-3x"></i></a> </div><div class="clear"> </div></div><a class="portdown scroll" href="#contact"> <i class="fa fa-chevron-circle-down fa-4x fa-inverse nacho-down"></i> </a> </div></div></div><div id="contact" class="footer"> <div class="container"> <div class="contact-section text-center"> <h2><span> </span>CONTACT<span> </span></h2> </div><div class="row"> <div class="col-md-6"> <div class="footer-left"> <div class="social-icons"> <a href="https://co.linkedin.com/in/ignacio-rodrigo-galieri-bb2022a"><i class="fa fa-linkedin-square fa-2x social-icon"></i></a> <a href="https://github.com/irgalieri"><i class="fa fa-github-square fa-2x social-icon"></i></a> <a href="https://twitter.com/NachoNerd"><i class="fa fa-twitter-square fa-2x social-icon"></i></a> </div><p><b>Hire Me!</b></p><p>I'm available for freelance work on PHP or JavaScript projects. I can work in-house in Bogot&amp;aacute;, I can also work remotely, if you are not based in Bogot&amp;aacute;. Interested?</p><p>Please, fill out the following form to contact me. Thank you.</p></div></div><div class="col-md-6"> <div class="footer-right"> <div class="form"> <form id="contact-form"> <input id="name" type="text" class="text" placeholder="Name" required> <input id="email" type="email" class="email" placeholder="E-mail address" required> <input id="subject" type="text" class="text" placeholder="Subject" required> <textarea id="body" rows="2" cols="70" placeholder="Your message..." required></textarea> <div class="clear"> </div><div id="success" class="alert alert-success" role="alert" style="display:none; width: 300px; float: left; padding-top: 5px; padding-bottom: 5px; margin-left: 50px; text-align: left;">Thanks! I have received your message.</div><div id="danger" class="alert alert-danger" role="alert" style="display:none; width: 300px; float: left; padding-top: 5px; padding-bottom: 5px; margin-left: 50px; text-align: left;">Upss!!!! Something was wrong!!!</div><button id="send" class="btn btn-default" data-loading-text="Sending..." type="submit">SEND</button> </form> </div></div><div class="clear"></div><p class="copy-right">Template by <a href="http://w3layouts.com/">W3layouts</a></p></div></div></div><a class="up scroll" href="#top-top"> <i class="fa fa-chevron-circle-up fa-4x fa-inverse"></i> </a> </div><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> <script type="application/x-javascript" src="js/jquery.wordrotator.min.js"/> <script type="application/x-javascript"> addEventListener("load", function(){setTimeout(hideURLbar, 0);}, false); function hideURLbar(){window.scrollTo(0,1);}</script> <script type="text/javascript" src="js/move-top.js"></script> <script type="text/javascript" src="js/easing.js"></script> <script type="text/javascript" src="js/main.js"></script> </body></html>
HTML;
        return array(
            array($html, $html1),
            array($html2, $html3),
        );
    }

    /**
     * TestMinifierHTML
     *
     * @param string $html       HTML no minified
     * @param string $htmlResult HTML minified
     *
     * @return void
     *
     * @dataProvider providerHTML
     */
    public function testMinifierHTML($html, $htmlResult)
    {
        $result = \NachoNerd\Composer\Minifier\Worker::minifierHTML($html);
        $this->assertEquals(
            trim($htmlResult),
            trim($result),
            'HTML Minifiy Fail'
        );
    }

    /**
     * ProviderRunner
     *
     * @return array
     */
    public function providerRunner()
    {
        $extra = array(
            "minifier" => array(
                "path" => "./tests/misc/",
                "dest" => "./build/test1/",
                "ignore-css" => false,
                "ignore-js" => false,
                "ignore-html" => false,
                "copy-others-files" => false,
                "exclude" => array("./README.md")
            )
        );
        $result = <<<TXT
Destination folder is ./build/test1/
Serching Files In ./tests/misc/ ...
Enabled HTML minifier.
Enabled JS minifier.
Enabled CSS minifier.
TXT;

        return array(
            array(
                array(),
                'Not found extra minifier config. Using default config...'
            ),
            array(
                array("this isn't minifier"=> array("some"=>1)),
                'Not found extra minifier config. Using default config...'
            ),
            array(array(), "Serching files in ./ ..."),
            array($extra, "Serching files in ./tests/misc/ ..."),
            array(array(), "Destination folder is ./build/"),
            array($extra, "Destination folder is ./build/test1/"),
            array(array("minifier" => array("ignore-css" => true)), "Disabled CSS minifier."),
            array(array("minifier" => array("ignore-css" => false)), "Enabled CSS minifier."),
            array(array("minifier" => array("ignore-js" => true)), "Disabled JS minifier."),
            array(array("minifier" => array("ignore-js" => false)), "Enabled JS minifier."),
            array(array("minifier" => array("ignore-html" => true)), "Disabled HTML minifier."),
            array(array("minifier" => array("ignore-html" => false)), "Enabled HTML minifier.")
        );
    }

    /**
     * TestPostInstallMinifier
     *
     * @param array  $extra  Config
     * @param string $result Expected Script Output
     *
     * @return void
     *
     * @dataProvider providerRunner
     */
    public function testPostInstallMinifier($extra, $result)
    {
        $path = realpath(__DIR__."/../../vendor");
        $config = $this->getMockBuilder('Composer\Config')
            ->disableOriginalConstructor()
            ->getMock();
        $config->method('get')
            ->willReturn($path);

        $package = $this->getMockBuilder('Composer\Package\Package')
            ->disableOriginalConstructor()
            ->getMock();
        $package->method('getExtra')
            ->willReturn($extra);

        $composer = $this->getMockBuilder('Composer\Composer')
            ->disableOriginalConstructor()
            ->getMock();
        $composer->method('getPackage')
            ->willReturn($package);
        $composer->method('getConfig')
            ->willReturn($config);

        $event = $this->getMockBuilder('Composer\Script\Event')
            ->disableOriginalConstructor()
            ->getMock();
        $event->method('getComposer')
            ->willReturn($composer);

        ob_start();
        \NachoNerd\Composer\Minifier\Worker::run($event);
        $output = ob_get_contents();
        ob_end_clean();

        //$path, $toPath
        $this->assertContains(
            $result,
            $output,
            'Run minifier all files fail'
        );
    }
}
