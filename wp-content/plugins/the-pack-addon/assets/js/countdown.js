// Generated by CoffeeScript 1.4.0

/*
countdown is a simple jquery plugin for countdowns

Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
and GPL-3.0 (http://opensource.org/licenses/GPL-3.0) licenses.

@source: http://github.com/rendro/countdown/
@autor: Robert Fleischmann
@version: 1.0.1
*/


(function () {

    (function ($) {
        $.countdown = function (el, options) {
            var getDateData,
                _this = this;
            this.el = el;
            this.$el = $(el);
            this.$el.data("countdown", this);
            this.init = function () {
                _this.options = $.extend({}, $.countdown.defaultOptions, options);
                if (_this.options.refresh) {
                    _this.interval = setInterval(function () {
                        return _this.render();
                    }, _this.options.refresh);
                }
                _this.render();
                return _this;
            };
            getDateData = function (endDate) {
                var dateData, diff;
                endDate = Date.parse($.isPlainObject(_this.options.date) ? _this.options.date : new Date(_this.options.date));
                diff = (endDate - Date.parse(new Date)) / 1000;
                if (diff <= 0) {
                    diff = 0;
                    if (_this.interval) {
                        _this.stop();
                    }
                    _this.options.onEnd.apply(_this);
                }
                dateData = {
                    days: 0,
                    hours: 0,
                    min: 0,
                    sec: 0,
                    millisec: 0
                };

                if (diff >= 86400) {
                    dateData.days = Math.floor(diff / 86400);
                    diff -= dateData.days * 86400;
                }
                if (diff >= 3600) {
                    dateData.hours = Math.floor(diff / 3600);
                    diff -= dateData.hours * 3600;
                }
                if (diff >= 60) {
                    dateData.min = Math.floor(diff / 60);
                    diff -= dateData.min * 60;
                }
                dateData.sec = diff;
                return dateData;
            };
            this.leadingZeros = function (num, length) {
                if (length == null) {
                    length = 2;
                }
                num = String(num);
                while (num.length < length) {
                    num = "0" + num;
                }
                return num;
            };
            this.update = function (newDate) {
                _this.options.date = newDate;
                return _this;
            };
            this.render = function () {
                _this.options.render.apply(_this, [getDateData(_this.options.date)]);
                return _this;
            };
            this.stop = function () {
                if (_this.interval) {
                    clearInterval(_this.interval);
                }
                _this.interval = null;
                return _this;
            };
            this.start = function (refresh) {
                if (refresh == null) {
                    refresh = _this.options.refresh || $.countdown.defaultOptions.refresh;
                }
                if (_this.interval) {
                    clearInterval(_this.interval);
                }
                _this.render();
                _this.options.refresh = refresh;
                _this.interval = setInterval(function () {
                    return _this.render();
                }, _this.options.refresh);
                return _this;
            };
            return this.init();
        };
        $.countdown.defaultOptions = {
            date: "June 7, 2087 15:03:25",
            refresh: 1000,
            onEnd: $.noop,
            render: function (date) {
                return $(this.el).html("<span class='days'><span class='inner'><span class='innerwrp'>" + date.days + "<span>days</span></span></span></span><span class='hour'><span class='inner'><span class='innerwrp'>" + (this.leadingZeros(date.hours)) + "<span>hours</span></span></span></span><span class='min'><span class='inner'><span class='innerwrp'>" + (this.leadingZeros(date.min)) + "<span>min</span></span></span></span><span class='sec'><span class='inner'><span class='innerwrp'>" + (this.leadingZeros(date.sec)) + "<span>sec</span></span></span></span>");
            }
        };
        $.fn.countdown = function (options) {
            return $.each(this, function (i, el) {
                var $el;
                $el = $(el);
                if (!$el.data('countdown')) {
                    return $el.data('countdown', new $.countdown(el, options));
                }
            });
        };
        return void 0;
    })(jQuery);

}).call(this);


/*
Animated headines
*/
!function (e) {
    e.fn.teletype = function (t) {
        var i = e.extend({}, e.fn.teletype.defaults, t), n = this, o = e(this), s = null,
            l = {string: "", index: 0, position: 0, loop: 0}, a = function () {
                return l.index++, l.index >= i.text.length && (l.index = 0, l.loop++, i.loop !== !1 && i.loop == l.loop) ? !1 : (l.position = 0, c(), "function" == typeof i.callbackNext && i.callbackNext(l, n), !0)
            }, r = function () {
                i.prefix && 0 === l.position && 0 === l.loop && 0 === l.index && e("<span />").addClass("teletype-prefix").html(i.prefix).prependTo(o);
                var t = l.string.split(""), c = t[l.position], d = l.position + 1;
                if ("^" == c || "~" == c) {
                    var f = l.string.substr(d).search(/[^0-9]/);
                    -1 == f && (f = l.string.length);
                    var y = l.string.substr(d, f);
                    if (e.isNumeric(y)) {
                        if (l.string = l.string.replace(c + y, ""), "^" == c) window.setTimeout(function () {
                            window.setTimeout(r, u(i.typeDelay))
                        }, y); else {
                            var h = l.position - y;
                            l.string = l.string.substr(0, h - 1) + l.string.substr(l.position - 1), window.setTimeout(function () {
                                p(Math.max(h, 0))
                            }, u(i.backDelay))
                        }
                        return
                    }
                } else if ("\\" == c) {
                    var m = l.string.substr(d, 1);
                    "n" == m && (l.position++, c = "<br />")
                }
                void 0 !== c && s.html(s.html() + c), l.position++, l.position < l.string.length ? window.setTimeout(r, u(i.typeDelay)) : i.preserve === !1 ? window.setTimeout(function () {
                    window.setTimeout(p, u(i.backDelay))
                }, i.delay) : (s.html(s.html() + '<span class="teletype-prefix">' + i.prefix + "</span>"), a() ? window.setTimeout(function () {
                    window.setTimeout(r, u(i.typeDelay))
                }, i.delay) : "function" == typeof i.callbackFinished && i.callbackFinished(n)), "function" == typeof i.callbackType && i.callbackType(c, l, n)
            }, p = function (e) {
                if (e || (e = 0), l.position > e) s.html(s.html().slice(0, -1)), window.setTimeout(function () {
                    p(e)
                }, u(i.backDelay)), l.position--; else {
                    if (0 === e && a() === !1) return;
                    window.setTimeout(r, u(i.typeDelay))
                }
            }, u = function (e) {
                var t = parseInt(e);
                return i.humanise && (t += Math.floor(200 * Math.random())), t
            }, c = function () {
                l.string = i.text[l.index].replace(/\n/g, "\\n")
            };
        return this.setCursor = function (t) {
            e(".teletype-cursor", o).text(t)
        }, this.each(function () {
            if (c(), o.addClass("teletype").empty(), s = e("<span />").addClass("teletype-text").appendTo(o), i.cursor) {
                var t = e("<span />").addClass("teletype-cursor").appendTo(o);
                n.setCursor(i.cursor), setInterval(function () {
                    t.animate({opacity: 0}).animate({opacity: 1})
                }, i.blinkSpeed)
            }
            r()
        })
    }, e.fn.teletype.defaults = {
        text: ["one", "two", "three"],
        typeDelay: 100,
        backDelay: 50,
        blinkSpeed: 1e3,
        delay: 2e3,
        cursor: "|",
        preserve: !1,
        prefix: "",
        loop: 0,
        humanise: !0,
        callbackNext: null,
        callbackType: null,
        callbackFinished: null
    }
}(jQuery);
