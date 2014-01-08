/*! bootstrap-timepicker v0.2.3 
 * http://jdewit.github.com/bootstrap-timepicker
 * Copyright (c) 2013 Joris de Wit
 * MIT License
 */
(function (t, i, e, s) {
    "use strict";
    var h = function (i, e) {
        this.widget = "", this.$element = t(i), this.defaultTime = e.defaultTime, this.disableFocus = e.disableFocus, this.isOpen = e.isOpen, this.minuteStep = e.minuteStep, this.modalBackdrop = e.modalBackdrop, this.secondStep = e.secondStep, this.showInputs = e.showInputs, this.showMeridian = e.showMeridian, this.showSeconds = e.showSeconds, this.template = e.template, this.appendWidgetTo = e.appendWidgetTo, this._init()
    };
    h.prototype = {
        constructor: h,
        _init: function () {
            var i = this;
            this.$element.parent().hasClass("input-append") || this.$element.parent().hasClass("input-prepend") ? (this.$element.parent(".input-append, .input-prepend").find(".add-on").on({
                "click.timepicker": t.proxy(this.showWidget, this)
            }), this.$element.on({
                "focus.timepicker": t.proxy(this.highlightUnit, this),
                "click.timepicker": t.proxy(this.highlightUnit, this),
                "keydown.timepicker": t.proxy(this.elementKeydown, this),
                "blur.timepicker": t.proxy(this.blurElement, this)
            })) : this.template ? this.$element.on({
                "focus.timepicker": t.proxy(this.showWidget, this),
                "click.timepicker": t.proxy(this.showWidget, this),
                "blur.timepicker": t.proxy(this.blurElement, this)
            }) : this.$element.on({
                "focus.timepicker": t.proxy(this.highlightUnit, this),
                "click.timepicker": t.proxy(this.highlightUnit, this),
                "keydown.timepicker": t.proxy(this.elementKeydown, this),
                "blur.timepicker": t.proxy(this.blurElement, this)
            }), this.$widget = this.template !== !1 ? t(this.getTemplate()).prependTo(this.$element.parents(this.appendWidgetTo)).on("click", t.proxy(this.widgetClick, this)) : !1, this.showInputs && this.$widget !== !1 && this.$widget.find("input").each(function () {
                t(this).on({
                    "click.timepicker": function () {
                        t(this).select()
                    },
                    "keydown.timepicker": t.proxy(i.widgetKeydown, i)
                })
            }), this.setDefaultTime(this.defaultTime)
        },
        blurElement: function () {
            this.highlightedUnit = s, this.updateFromElementVal()
        },
        decrementHour: function () {
            if (this.showMeridian)
                if (1 === this.hour) this.hour = 12;
                else {
                    if (12 === this.hour) return this.hour--, this.toggleMeridian();
                    if (0 === this.hour) return this.hour = 11, this.toggleMeridian();
                    this.hour--
                } else 0 === this.hour ? this.hour = 23 : this.hour--;
            this.update()
        },
        decrementMinute: function (t) {
            var i;
            i = t ? this.minute - t : this.minute - this.minuteStep, 0 > i ? (this.decrementHour(), this.minute = i + 60) : this.minute = i, this.update()
        },
        decrementSecond: function () {
            var t = this.second - this.secondStep;
            0 > t ? (this.decrementMinute(!0), this.second = t + 60) : this.second = t, this.update()
        },
        elementKeydown: function (t) {
            switch (t.keyCode) {
            case 9:
                switch (this.updateFromElementVal(), this.highlightedUnit) {
                case "hour":
                    t.preventDefault(), this.highlightNextUnit();
                    break;
                case "minute":
                    (this.showMeridian || this.showSeconds) && (t.preventDefault(), this.highlightNextUnit());
                    break;
                case "second":
                    this.showMeridian && (t.preventDefault(), this.highlightNextUnit())
                }
                break;
            case 27:
                this.updateFromElementVal();
                break;
            case 37:
                t.preventDefault(), this.highlightPrevUnit(), this.updateFromElementVal();
                break;
            case 38:
                switch (t.preventDefault(), this.highlightedUnit) {
                case "hour":
                    this.incrementHour(), this.highlightHour();
                    break;
                case "minute":
                    this.incrementMinute(), this.highlightMinute();
                    break;
                case "second":
                    this.incrementSecond(), this.highlightSecond();
                    break;
                case "meridian":
                    this.toggleMeridian(), this.highlightMeridian()
                }
                break;
            case 39:
                t.preventDefault(), this.updateFromElementVal(), this.highlightNextUnit();
                break;
            case 40:
                switch (t.preventDefault(), this.highlightedUnit) {
                case "hour":
                    this.decrementHour(), this.highlightHour();
                    break;
                case "minute":
                    this.decrementMinute(), this.highlightMinute();
                    break;
                case "second":
                    this.decrementSecond(), this.highlightSecond();
                    break;
                case "meridian":
                    this.toggleMeridian(), this.highlightMeridian()
                }
            }
        },
        formatTime: function (t, i, e, s) {
            return t = 10 > t ? "0" + t : t, i = 10 > i ? "0" + i : i, e = 10 > e ? "0" + e : e, t + ":" + i + (this.showSeconds ? ":" + e : "") + (this.showMeridian ? " " + s : "")
        },
        getCursorPosition: function () {
            var t = this.$element.get(0);
            if ("selectionStart" in t) return t.selectionStart;
            if (e.selection) {
                t.focus();
                var i = e.selection.createRange(),
                    s = e.selection.createRange().text.length;
                return i.moveStart("character", -t.value.length), i.text.length - s
            }
        },
        getTemplate: function () {
            var t, i, e, s, h, n;
            switch (this.showInputs ? (i = '<input type="text" name="hour" class="bootstrap-timepicker-hour" maxlength="2"/>', e = '<input type="text" name="minute" class="bootstrap-timepicker-minute" maxlength="2"/>', s = '<input type="text" name="second" class="bootstrap-timepicker-second" maxlength="2"/>', h = '<input type="text" name="meridian" class="bootstrap-timepicker-meridian" maxlength="2"/>') : (i = '<span class="bootstrap-timepicker-hour"></span>', e = '<span class="bootstrap-timepicker-minute"></span>', s = '<span class="bootstrap-timepicker-second"></span>', h = '<span class="bootstrap-timepicker-meridian"></span>'), n = '<table><tr><td><a href="#" data-action="incrementHour"><i class="icon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="icon-chevron-up"></i></a></td>' + (this.showSeconds ? '<td class="separator">&nbsp;</td><td><a href="#" data-action="incrementSecond"><i class="icon-chevron-up"></i></a></td>' : "") + (this.showMeridian ? '<td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="icon-chevron-up"></i></a></td>' : "") + "</tr>" + "<tr>" + "<td>" + i + "</td> " + '<td class="separator">:</td>' + "<td>" + e + "</td> " + (this.showSeconds ? '<td class="separator">:</td><td>' + s + "</td>" : "") + (this.showMeridian ? '<td class="separator">&nbsp;</td><td>' + h + "</td>" : "") + "</tr>" + "<tr>" + '<td><a href="#" data-action="decrementHour"><i class="icon-chevron-down"></i></a></td>' + '<td class="separator"></td>' + '<td><a href="#" data-action="decrementMinute"><i class="icon-chevron-down"></i></a></td>' + (this.showSeconds ? '<td class="separator">&nbsp;</td><td><a href="#" data-action="decrementSecond"><i class="icon-chevron-down"></i></a></td>' : "") + (this.showMeridian ? '<td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="icon-chevron-down"></i></a></td>' : "") + "</tr>" + "</table>", this.template) {
            case "modal":
                t = '<div class="bootstrap-timepicker-widget modal hide fade in" data-backdrop="' + (this.modalBackdrop ? "true" : "false") + '">' + '<div class="modal-header">' + '<a href="#" class="close" data-dismiss="modal">x</a>' + "<h3>Pick a Time</h3>" + "</div>" + '<div class="modal-content">' + n + "</div>" + '<div class="modal-footer">' + '<a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>' + "</div>" + "</div>";
                break;
            case "dropdown":
                t = '<div class="bootstrap-timepicker-widget dropdown-menu">' + n + "</div>"
            }
            return t
        },
        getTime: function () {
            return this.formatTime(this.hour, this.minute, this.second, this.meridian)
        },
        hideWidget: function () {
            this.isOpen !== !1 && (this.showInputs && this.updateFromWidgetInputs(), this.$element.trigger({
                type: "hide.timepicker",
                time: {
                    value: this.getTime(),
                    hours: this.hour,
                    minutes: this.minute,
                    seconds: this.second,
                    meridian: this.meridian
                }
            }), "modal" === this.template && this.$widget.modal ? this.$widget.modal("hide") : this.$widget.removeClass("open"), t(e).off("mousedown.timepicker"), this.isOpen = !1)
        },
        highlightUnit: function () {
            this.position = this.getCursorPosition(), this.position >= 0 && 2 >= this.position ? this.highlightHour() : this.position >= 3 && 5 >= this.position ? this.highlightMinute() : this.position >= 6 && 8 >= this.position ? this.showSeconds ? this.highlightSecond() : this.highlightMeridian() : this.position >= 9 && 11 >= this.position && this.highlightMeridian()
        },
        highlightNextUnit: function () {
            switch (this.highlightedUnit) {
            case "hour":
                this.highlightMinute();
                break;
            case "minute":
                this.showSeconds ? this.highlightSecond() : this.showMeridian ? this.highlightMeridian() : this.highlightHour();
                break;
            case "second":
                this.showMeridian ? this.highlightMeridian() : this.highlightHour();
                break;
            case "meridian":
                this.highlightHour()
            }
        },
        highlightPrevUnit: function () {
            switch (this.highlightedUnit) {
            case "hour":
                this.highlightMeridian();
                break;
            case "minute":
                this.highlightHour();
                break;
            case "second":
                this.highlightMinute();
                break;
            case "meridian":
                this.showSeconds ? this.highlightSecond() : this.highlightMinute()
            }
        },
        highlightHour: function () {
            var t = this.$element.get(0);
            this.highlightedUnit = "hour", t.setSelectionRange && setTimeout(function () {
                t.setSelectionRange(0, 2)
            }, 0)
        },
        highlightMinute: function () {
            var t = this.$element.get(0);
            this.highlightedUnit = "minute", t.setSelectionRange && setTimeout(function () {
                t.setSelectionRange(3, 5)
            }, 0)
        },
        highlightSecond: function () {
            var t = this.$element.get(0);
            this.highlightedUnit = "second", t.setSelectionRange && setTimeout(function () {
                t.setSelectionRange(6, 8)
            }, 0)
        },
        highlightMeridian: function () {
            var t = this.$element.get(0);
            this.highlightedUnit = "meridian", t.setSelectionRange && (this.showSeconds ? setTimeout(function () {
                t.setSelectionRange(9, 11)
            }, 0) : setTimeout(function () {
                t.setSelectionRange(6, 8)
            }, 0))
        },
        incrementHour: function () {
            if (this.showMeridian) {
                if (11 === this.hour) return this.hour++, this.toggleMeridian();
                12 === this.hour && (this.hour = 0)
            }
            return 23 === this.hour ? (this.hour = 0, s) : (this.hour++, this.update(), s)
        },
        incrementMinute: function (t) {
            var i;
            i = t ? this.minute + t : this.minute + this.minuteStep - this.minute % this.minuteStep, i > 59 ? (this.incrementHour(), this.minute = i - 60) : this.minute = i, this.update()
        },
        incrementSecond: function () {
            var t = this.second + this.secondStep - this.second % this.secondStep;
            t > 59 ? (this.incrementMinute(!0), this.second = t - 60) : this.second = t, this.update()
        },
        remove: function () {
            t("document").off(".timepicker"), this.$widget && this.$widget.remove(), delete this.$element.data().timepicker
        },
        setDefaultTime: function (t) {
            if (this.$element.val()) this.updateFromElementVal();
            else if ("current" === t) {
                var i = new Date,
                    e = i.getHours(),
                    s = Math.floor(i.getMinutes() / this.minuteStep) * this.minuteStep,
                    h = Math.floor(i.getSeconds() / this.secondStep) * this.secondStep,
                    n = "AM";
                this.showMeridian && (0 === e ? e = 12 : e >= 12 ? (e > 12 && (e -= 12), n = "PM") : n = "AM"), this.hour = e, this.minute = s, this.second = h, this.meridian = n, this.update()
            } else t === !1 ? (this.hour = 0, this.minute = 0, this.second = 0, this.meridian = "AM") : this.setTime(t)
        },
        setTime: function (t) {
            var i, e;
            this.showMeridian ? (i = t.split(" "), e = i[0].split(":"), this.meridian = i[1]) : e = t.split(":"), this.hour = parseInt(e[0], 10), this.minute = parseInt(e[1], 10), this.second = parseInt(e[2], 10), isNaN(this.hour) && (this.hour = 0), isNaN(this.minute) && (this.minute = 0), this.showMeridian ? (this.hour > 12 ? this.hour = 12 : 1 > this.hour && (this.hour = 12), "am" === this.meridian || "a" === this.meridian ? this.meridian = "AM" : ("pm" === this.meridian || "p" === this.meridian) && (this.meridian = "PM"), "AM" !== this.meridian && "PM" !== this.meridian && (this.meridian = "AM")) : this.hour >= 24 ? this.hour = 23 : 0 > this.hour && (this.hour = 0), 0 > this.minute ? this.minute = 0 : this.minute >= 60 && (this.minute = 59), this.showSeconds && (isNaN(this.second) ? this.second = 0 : 0 > this.second ? this.second = 0 : this.second >= 60 && (this.second = 59)), this.update()
        },
        showWidget: function () {
            if (!this.isOpen && !this.$element.is(":disabled")) {
                var i = this;
                t(e).on("mousedown.timepicker", function (e) {
                    0 === t(e.target).closest(".bootstrap-timepicker-widget").length && i.hideWidget()
                }), this.$element.trigger({
                    type: "show.timepicker",
                    time: {
                        value: this.getTime(),
                        hours: this.hour,
                        minutes: this.minute,
                        seconds: this.second,
                        meridian: this.meridian
                    }
                }), this.disableFocus && this.$element.blur(), this.updateFromElementVal(), "modal" === this.template && this.$widget.modal ? this.$widget.modal("show").on("hidden", t.proxy(this.hideWidget, this)) : this.isOpen === !1 && this.$widget.addClass("open"), this.isOpen = !0
            }
        },
        toggleMeridian: function () {
            this.meridian = "AM" === this.meridian ? "PM" : "AM", this.update()
        },
        update: function () {
            this.$element.trigger({
                type: "changeTime.timepicker",
                time: {
                    value: this.getTime(),
                    hours: this.hour,
                    minutes: this.minute,
                    seconds: this.second,
                    meridian: this.meridian
                }
            }), this.updateElement(), this.updateWidget()
        },
        updateElement: function () {
            this.$element.val(this.getTime()).change()
        },
        updateFromElementVal: function () {
            var t = this.$element.val();
            t && this.setTime(t)
        },
        updateWidget: function () {
            if (this.$widget !== !1) {
                var t = 10 > this.hour ? "0" + this.hour : this.hour,
                    i = 10 > this.minute ? "0" + this.minute : this.minute,
                    e = 10 > this.second ? "0" + this.second : this.second;
                this.showInputs ? (this.$widget.find("input.bootstrap-timepicker-hour").val(t), this.$widget.find("input.bootstrap-timepicker-minute").val(i), this.showSeconds && this.$widget.find("input.bootstrap-timepicker-second").val(e), this.showMeridian && this.$widget.find("input.bootstrap-timepicker-meridian").val(this.meridian)) : (this.$widget.find("span.bootstrap-timepicker-hour").text(t), this.$widget.find("span.bootstrap-timepicker-minute").text(i), this.showSeconds && this.$widget.find("span.bootstrap-timepicker-second").text(e), this.showMeridian && this.$widget.find("span.bootstrap-timepicker-meridian").text(this.meridian))
            }
        },
        updateFromWidgetInputs: function () {
            if (this.$widget !== !1) {
                var i = t("input.bootstrap-timepicker-hour", this.$widget).val() + ":" + t("input.bootstrap-timepicker-minute", this.$widget).val() + (this.showSeconds ? ":" + t("input.bootstrap-timepicker-second", this.$widget).val() : "") + (this.showMeridian ? " " + t("input.bootstrap-timepicker-meridian", this.$widget).val() : "");
                this.setTime(i)
            }
        },
        widgetClick: function (i) {
            i.stopPropagation(), i.preventDefault();
            var e = t(i.target).closest("a").data("action");
            e && this[e]()
        },
        widgetKeydown: function (i) {
            var e = t(i.target).closest("input"),
                s = e.attr("name");
            switch (i.keyCode) {
            case 9:
                if (this.showMeridian) {
                    if ("meridian" === s) return this.hideWidget()
                } else if (this.showSeconds) {
                    if ("second" === s) return this.hideWidget()
                } else if ("minute" === s) return this.hideWidget();
                this.updateFromWidgetInputs();
                break;
            case 27:
                this.hideWidget();
                break;
            case 38:
                switch (i.preventDefault(), s) {
                case "hour":
                    this.incrementHour();
                    break;
                case "minute":
                    this.incrementMinute();
                    break;
                case "second":
                    this.incrementSecond();
                    break;
                case "meridian":
                    this.toggleMeridian()
                }
                break;
            case 40:
                switch (i.preventDefault(), s) {
                case "hour":
                    this.decrementHour();
                    break;
                case "minute":
                    this.decrementMinute();
                    break;
                case "second":
                    this.decrementSecond();
                    break;
                case "meridian":
                    this.toggleMeridian()
                }
            }
        }
    }, t.fn.timepicker = function (i) {
        var e = Array.apply(null, arguments);
        return e.shift(), this.each(function () {
            var s = t(this),
                n = s.data("timepicker"),
                o = "object" == typeof i && i;
            n || s.data("timepicker", n = new h(this, t.extend({}, t.fn.timepicker.defaults, o, t(this).data()))), "string" == typeof i && n[i].apply(n, e)
        })
    }, t.fn.timepicker.defaults = {
        defaultTime: "current",
        disableFocus: !1,
        isOpen: !1,
        minuteStep: 15,
        modalBackdrop: !1,
        secondStep: 15,
        showSeconds: !1,
        showInputs: !0,
        showMeridian: !0,
        template: "dropdown",
        appendWidgetTo: ".bootstrap-timepicker"
    }, t.fn.timepicker.Constructor = h
})(jQuery, window, document);