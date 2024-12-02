/* flatpickr v4.6.13,, @license MIT */
!(function (e, n) {
	"object" == typeof exports && "undefined" != typeof module
		? (module.exports = n())
		: "function" == typeof define && define.amd
		? define(n)
		: ((e =
				"undefined" != typeof globalThis ? globalThis : e || self).flatpickr =
				n());
})(this, function () {
	"use strict";
	var e = function () {
		return (e =
			Object.assign ||
			function (e) {
				for (var n, t = 1, a = arguments.length; t < a; t++)
					for (var i in (n = arguments[t]))
						Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i]);
				return e;
			}).apply(this, arguments);
	};
	function n() {
		for (var e = 0, n = 0, t = arguments.length; n < t; n++)
			e += arguments[n].length;
		var a = Array(e),
			i = 0;
		for (n = 0; n < t; n++)
			for (var o = arguments[n], r = 0, l = o.length; r < l; r++, i++)
				a[i] = o[r];
		return a;
	}
	var t = [
			"onChange",
			"onClose",
			"onDayCreate",
			"onDestroy",
			"onKeyDown",
			"onMonthChange",
			"onOpen",
			"onParseConfig",
			"onReady",
			"onValueUpdate",
			"onYearChange",
			"onPreCalendarPosition",
		],
		a = {
			_disable: [],
			allowInput: !1,
			allowInvalidPreload: !1,
			altFormat: "F j, Y",
			altInput: !1,
			altInputClass: "form-control input",
			animate:
				"object" == typeof window &&
				-1 === window.navigator.userAgent.indexOf("MSIE"),
			ariaDateFormat: "F j, Y",
			autoFillDefaultTime: !0,
			clickOpens: !0,
			closeOnSelect: !0,
			conjunction: ", ",
			dateFormat: "Y-m-d",
			defaultHour: 12,
			defaultMinute: 0,
			defaultSeconds: 0,
			disable: [],
			disableMobile: !1,
			enableSeconds: !1,
			enableTime: !1,
			errorHandler: function (e) {
				return "undefined" != typeof console && console.warn(e);
			},
			getWeek: function (e) {
				var n = new Date(e.getTime());
				n.setHours(0, 0, 0, 0),
					n.setDate(n.getDate() + 3 - ((n.getDay() + 6) % 7));
				var t = new Date(n.getFullYear(), 0, 4);
				return (
					1 +
					Math.round(
						((n.getTime() - t.getTime()) / 864e5 - 3 + ((t.getDay() + 6) % 7)) /
							7
					)
				);
			},
			hourIncrement: 1,
			ignoredFocusElements: [],
			inline: !1,
			locale: "default",
			minuteIncrement: 5,
			mode: "single",
			monthSelectorType: "dropdown",
			nextArrow:
				"<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z' /></svg>",
			noCalendar: !1,
			now: new Date(),
			onChange: [],
			onClose: [],
			onDayCreate: [],
			onDestroy: [],
			onKeyDown: [],
			onMonthChange: [],
			onOpen: [],
			onParseConfig: [],
			onReady: [],
			onValueUpdate: [],
			onYearChange: [],
			onPreCalendarPosition: [],
			plugins: [],
			position: "auto",
			positionElement: void 0,
			prevArrow:
				"<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 17 17'><g></g><path d='M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z' /></svg>",
			shorthandCurrentMonth: !1,
			showMonths: 1,
			static: !1,
			time_24hr: !1,
			weekNumbers: !1,
			wrap: !1,
		},
		i = {
			weekdays: {
				shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
				longhand: [
					"Sunday",
					"Monday",
					"Tuesday",
					"Wednesday",
					"Thursday",
					"Friday",
					"Saturday",
				],
			},
			months: {
				shorthand: [
					"Jan",
					"Feb",
					"Mar",
					"Apr",
					"May",
					"Jun",
					"Jul",
					"Aug",
					"Sep",
					"Oct",
					"Nov",
					"Dec",
				],
				longhand: [
					"January",
					"February",
					"March",
					"April",
					"May",
					"June",
					"July",
					"August",
					"September",
					"October",
					"November",
					"December",
				],
			},
			daysInMonth: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
			firstDayOfWeek: 0,
			ordinal: function (e) {
				var n = e % 100;
				if (n > 3 && n < 21) return "th";
				switch (n % 10) {
					case 1:
						return "st";
					case 2:
						return "nd";
					case 3:
						return "rd";
					default:
						return "th";
				}
			},
			rangeSeparator: " to ",
			weekAbbreviation: "Wk",
			scrollTitle: "Scroll to increment",
			toggleTitle: "Click to toggle",
			amPM: ["AM", "PM"],
			yearAriaLabel: "Year",
			monthAriaLabel: "Month",
			hourAriaLabel: "Hour",
			minuteAriaLabel: "Minute",
			time_24hr: !1,
		},
		o = function (e, n) {
			return void 0 === n && (n = 2), ("000" + e).slice(-1 * n);
		},
		r = function (e) {
			return !0 === e ? 1 : 0;
		};
	function l(e, n) {
		var t;
		return function () {
			var a = this,
				i = arguments;
			clearTimeout(t),
				(t = setTimeout(function () {
					return e.apply(a, i);
				}, n));
		};
	}
	var c = function (e) {
		return e instanceof Array ? e : [e];
	};
	function s(e, n, t) {
		if (!0 === t) return e.classList.add(n);
		e.classList.remove(n);
	}
	function d(e, n, t) {
		var a = window.document.createElement(e);
		return (
			(n = n || ""),
			(t = t || ""),
			(a.className = n),
			void 0 !== t && (a.textContent = t),
			a
		);
	}
	function u(e) {
		for (; e.firstChild; ) e.removeChild(e.firstChild);
	}
	function f(e, n) {
		return n(e) ? e : e.parentNode ? f(e.parentNode, n) : void 0;
	}
	function m(e, n) {
		var t = d("div", "numInputWrapper"),
			a = d("input", "numInput " + e),
			i = d("span", "arrowUp"),
			o = d("span", "arrowDown");
		if (
			(-1 === navigator.userAgent.indexOf("MSIE 9.0")
				? (a.type = "number")
				: ((a.type = "text"), (a.pattern = "\\d*")),
			void 0 !== n)
		)
			for (var r in n) a.setAttribute(r, n[r]);
		return t.appendChild(a), t.appendChild(i), t.appendChild(o), t;
	}
	function g(e) {
		try {
			return "function" == typeof e.composedPath
				? e.composedPath()[0]
				: e.target;
		} catch (n) {
			return e.target;
		}
	}
	var p = function () {},
		h = function (e, n, t) {
			return t.months[n ? "shorthand" : "longhand"][e];
		},
		v = {
			D: p,
			F: function (e, n, t) {
				e.setMonth(t.months.longhand.indexOf(n));
			},
			G: function (e, n) {
				e.setHours((e.getHours() >= 12 ? 12 : 0) + parseFloat(n));
			},
			H: function (e, n) {
				e.setHours(parseFloat(n));
			},
			J: function (e, n) {
				e.setDate(parseFloat(n));
			},
			K: function (e, n, t) {
				e.setHours(
					(e.getHours() % 12) + 12 * r(new RegExp(t.amPM[1], "i").test(n))
				);
			},
			M: function (e, n, t) {
				e.setMonth(t.months.shorthand.indexOf(n));
			},
			S: function (e, n) {
				e.setSeconds(parseFloat(n));
			},
			U: function (e, n) {
				return new Date(1e3 * parseFloat(n));
			},
			W: function (e, n, t) {
				var a = parseInt(n),
					i = new Date(e.getFullYear(), 0, 2 + 7 * (a - 1), 0, 0, 0, 0);
				return i.setDate(i.getDate() - i.getDay() + t.firstDayOfWeek), i;
			},
			Y: function (e, n) {
				e.setFullYear(parseFloat(n));
			},
			Z: function (e, n) {
				return new Date(n);
			},
			d: function (e, n) {
				e.setDate(parseFloat(n));
			},
			h: function (e, n) {
				e.setHours((e.getHours() >= 12 ? 12 : 0) + parseFloat(n));
			},
			i: function (e, n) {
				e.setMinutes(parseFloat(n));
			},
			j: function (e, n) {
				e.setDate(parseFloat(n));
			},
			l: p,
			m: function (e, n) {
				e.setMonth(parseFloat(n) - 1);
			},
			n: function (e, n) {
				e.setMonth(parseFloat(n) - 1);
			},
			s: function (e, n) {
				e.setSeconds(parseFloat(n));
			},
			u: function (e, n) {
				return new Date(parseFloat(n));
			},
			w: p,
			y: function (e, n) {
				e.setFullYear(2e3 + parseFloat(n));
			},
		},
		D = {
			D: "",
			F: "",
			G: "(\\d\\d|\\d)",
			H: "(\\d\\d|\\d)",
			J: "(\\d\\d|\\d)\\w+",
			K: "",
			M: "",
			S: "(\\d\\d|\\d)",
			U: "(.+)",
			W: "(\\d\\d|\\d)",
			Y: "(\\d{4})",
			Z: "(.+)",
			d: "(\\d\\d|\\d)",
			h: "(\\d\\d|\\d)",
			i: "(\\d\\d|\\d)",
			j: "(\\d\\d|\\d)",
			l: "",
			m: "(\\d\\d|\\d)",
			n: "(\\d\\d|\\d)",
			s: "(\\d\\d|\\d)",
			u: "(.+)",
			w: "(\\d\\d|\\d)",
			y: "(\\d{2})",
		},
		w = {
			Z: function (e) {
				return e.toISOString();
			},
			D: function (e, n, t) {
				return n.weekdays.shorthand[w.w(e, n, t)];
			},
			F: function (e, n, t) {
				return h(w.n(e, n, t) - 1, !1, n);
			},
			G: function (e, n, t) {
				return o(w.h(e, n, t));
			},
			H: function (e) {
				return o(e.getHours());
			},
			J: function (e, n) {
				return void 0 !== n.ordinal
					? e.getDate() + n.ordinal(e.getDate())
					: e.getDate();
			},
			K: function (e, n) {
				return n.amPM[r(e.getHours() > 11)];
			},
			M: function (e, n) {
				return h(e.getMonth(), !0, n);
			},
			S: function (e) {
				return o(e.getSeconds());
			},
			U: function (e) {
				return e.getTime() / 1e3;
			},
			W: function (e, n, t) {
				return t.getWeek(e);
			},
			Y: function (e) {
				return o(e.getFullYear(), 4);
			},
			d: function (e) {
				return o(e.getDate());
			},
			h: function (e) {
				return e.getHours() % 12 ? e.getHours() % 12 : 12;
			},
			i: function (e) {
				return o(e.getMinutes());
			},
			j: function (e) {
				return e.getDate();
			},
			l: function (e, n) {
				return n.weekdays.longhand[e.getDay()];
			},
			m: function (e) {
				return o(e.getMonth() + 1);
			},
			n: function (e) {
				return e.getMonth() + 1;
			},
			s: function (e) {
				return e.getSeconds();
			},
			u: function (e) {
				return e.getTime();
			},
			w: function (e) {
				return e.getDay();
			},
			y: function (e) {
				return String(e.getFullYear()).substring(2);
			},
		},
		b = function (e) {
			var n = e.config,
				t = void 0 === n ? a : n,
				o = e.l10n,
				r = void 0 === o ? i : o,
				l = e.isMobile,
				c = void 0 !== l && l;
			return function (e, n, a) {
				var i = a || r;
				return void 0 === t.formatDate || c
					? n
							.split("")
							.map(function (n, a, o) {
								return w[n] && "\\" !== o[a - 1]
									? w[n](e, i, t)
									: "\\" !== n
									? n
									: "";
							})
							.join("")
					: t.formatDate(e, n, i);
			};
		},
		C = function (e) {
			var n = e.config,
				t = void 0 === n ? a : n,
				o = e.l10n,
				r = void 0 === o ? i : o;
			return function (e, n, i, o) {
				if (0 === e || e) {
					var l,
						c = o || r,
						s = e;
					if (e instanceof Date) l = new Date(e.getTime());
					else if ("string" != typeof e && void 0 !== e.toFixed)
						l = new Date(e);
					else if ("string" == typeof e) {
						var d = n || (t || a).dateFormat,
							u = String(e).trim();
						if ("today" === u) (l = new Date()), (i = !0);
						else if (t && t.parseDate) l = t.parseDate(e, d);
						else if (/Z$/.test(u) || /GMT$/.test(u)) l = new Date(e);
						else {
							for (
								var f = void 0, m = [], g = 0, p = 0, h = "";
								g < d.length;
								g++
							) {
								var w = d[g],
									b = "\\" === w,
									C = "\\" === d[g - 1] || b;
								if (D[w] && !C) {
									h += D[w];
									var M = new RegExp(h).exec(e);
									M &&
										(f = !0) &&
										m["Y" !== w ? "push" : "unshift"]({
											fn: v[w],
											val: M[++p],
										});
								} else b || (h += ".");
							}
							(l =
								t && t.noCalendar
									? new Date(new Date().setHours(0, 0, 0, 0))
									: new Date(new Date().getFullYear(), 0, 1, 0, 0, 0, 0)),
								m.forEach(function (e) {
									var n = e.fn,
										t = e.val;
									return (l = n(l, t, c) || l);
								}),
								(l = f ? l : void 0);
						}
					}
					if (l instanceof Date && !isNaN(l.getTime()))
						return !0 === i && l.setHours(0, 0, 0, 0), l;
					t.errorHandler(new Error("Invalid date provided: " + s));
				}
			};
		};
	function M(e, n, t) {
		return (
			void 0 === t && (t = !0),
			!1 !== t
				? new Date(e.getTime()).setHours(0, 0, 0, 0) -
				  new Date(n.getTime()).setHours(0, 0, 0, 0)
				: e.getTime() - n.getTime()
		);
	}
	var y = function (e, n, t) {
			return 3600 * e + 60 * n + t;
		},
		x = 864e5;
	function E(e) {
		var n = e.defaultHour,
			t = e.defaultMinute,
			a = e.defaultSeconds;
		if (void 0 !== e.minDate) {
			var i = e.minDate.getHours(),
				o = e.minDate.getMinutes(),
				r = e.minDate.getSeconds();
			n < i && (n = i),
				n === i && t < o && (t = o),
				n === i && t === o && a < r && (a = e.minDate.getSeconds());
		}
		if (void 0 !== e.maxDate) {
			var l = e.maxDate.getHours(),
				c = e.maxDate.getMinutes();
			(n = Math.min(n, l)) === l && (t = Math.min(c, t)),
				n === l && t === c && (a = e.maxDate.getSeconds());
		}
		return { hours: n, minutes: t, seconds: a };
	}
	"function" != typeof Object.assign &&
		(Object.assign = function (e) {
			for (var n = [], t = 1; t < arguments.length; t++)
				n[t - 1] = arguments[t];
			if (!e) throw TypeError("Cannot convert undefined or null to object");
			for (
				var a = function (n) {
						n &&
							Object.keys(n).forEach(function (t) {
								return (e[t] = n[t]);
							});
					},
					i = 0,
					o = n;
				i < o.length;
				i++
			) {
				var r = o[i];
				a(r);
			}
			return e;
		});
	function k(p, v) {
		var w = { config: e(e({}, a), I.defaultConfig), l10n: i };
		function k() {
			var e;
			return (
				(null === (e = w.calendarContainer) || void 0 === e
					? void 0
					: e.getRootNode()
				).activeElement || document.activeElement
			);
		}
		function T(e) {
			return e.bind(w);
		}
		function S() {
			var e = w.config;
			(!1 === e.weekNumbers && 1 === e.showMonths) ||
				(!0 !== e.noCalendar &&
					window.requestAnimationFrame(function () {
						if (
							(void 0 !== w.calendarContainer &&
								((w.calendarContainer.style.visibility = "hidden"),
								(w.calendarContainer.style.display = "block")),
							void 0 !== w.daysContainer)
						) {
							var n = (w.days.offsetWidth + 1) * e.showMonths;
							(w.daysContainer.style.width = n + "px"),
								(w.calendarContainer.style.width =
									n +
									(void 0 !== w.weekWrapper ? w.weekWrapper.offsetWidth : 0) +
									"px"),
								w.calendarContainer.style.removeProperty("visibility"),
								w.calendarContainer.style.removeProperty("display");
						}
					}));
		}
		function _(e) {
			if (0 === w.selectedDates.length) {
				var n =
						void 0 === w.config.minDate || M(new Date(), w.config.minDate) >= 0
							? new Date()
							: new Date(w.config.minDate.getTime()),
					t = E(w.config);
				n.setHours(t.hours, t.minutes, t.seconds, n.getMilliseconds()),
					(w.selectedDates = [n]),
					(w.latestSelectedDateObj = n);
			}
			void 0 !== e &&
				"blur" !== e.type &&
				(function (e) {
					e.preventDefault();
					var n = "keydown" === e.type,
						t = g(e),
						a = t;
					void 0 !== w.amPM &&
						t === w.amPM &&
						(w.amPM.textContent =
							w.l10n.amPM[r(w.amPM.textContent === w.l10n.amPM[0])]);
					var i = parseFloat(a.getAttribute("min")),
						l = parseFloat(a.getAttribute("max")),
						c = parseFloat(a.getAttribute("step")),
						s = parseInt(a.value, 10),
						d = e.delta || (n ? (38 === e.which ? 1 : -1) : 0),
						u = s + c * d;
					if (void 0 !== a.value && 2 === a.value.length) {
						var f = a === w.hourElement,
							m = a === w.minuteElement;
						u < i
							? ((u = l + u + r(!f) + (r(f) && r(!w.amPM))),
							  m && L(void 0, -1, w.hourElement))
							: u > l &&
							  ((u = a === w.hourElement ? u - l - r(!w.amPM) : i),
							  m && L(void 0, 1, w.hourElement)),
							w.amPM &&
								f &&
								(1 === c ? u + s === 23 : Math.abs(u - s) > c) &&
								(w.amPM.textContent =
									w.l10n.amPM[r(w.amPM.textContent === w.l10n.amPM[0])]),
							(a.value = o(u));
					}
				})(e);
			var a = w._input.value;
			O(), ye(), w._input.value !== a && w._debouncedChange();
		}
		function O() {
			if (void 0 !== w.hourElement && void 0 !== w.minuteElement) {
				var e,
					n,
					t = (parseInt(w.hourElement.value.slice(-2), 10) || 0) % 24,
					a = (parseInt(w.minuteElement.value, 10) || 0) % 60,
					i =
						void 0 !== w.secondElement
							? (parseInt(w.secondElement.value, 10) || 0) % 60
							: 0;
				void 0 !== w.amPM &&
					((e = t),
					(n = w.amPM.textContent),
					(t = (e % 12) + 12 * r(n === w.l10n.amPM[1])));
				var o =
						void 0 !== w.config.minTime ||
						(w.config.minDate &&
							w.minDateHasTime &&
							w.latestSelectedDateObj &&
							0 === M(w.latestSelectedDateObj, w.config.minDate, !0)),
					l =
						void 0 !== w.config.maxTime ||
						(w.config.maxDate &&
							w.maxDateHasTime &&
							w.latestSelectedDateObj &&
							0 === M(w.latestSelectedDateObj, w.config.maxDate, !0));
				if (
					void 0 !== w.config.maxTime &&
					void 0 !== w.config.minTime &&
					w.config.minTime > w.config.maxTime
				) {
					var c = y(
							w.config.minTime.getHours(),
							w.config.minTime.getMinutes(),
							w.config.minTime.getSeconds()
						),
						s = y(
							w.config.maxTime.getHours(),
							w.config.maxTime.getMinutes(),
							w.config.maxTime.getSeconds()
						),
						d = y(t, a, i);
					if (d > s && d < c) {
						var u = (function (e) {
							var n = Math.floor(e / 3600),
								t = (e - 3600 * n) / 60;
							return [n, t, e - 3600 * n - 60 * t];
						})(c);
						(t = u[0]), (a = u[1]), (i = u[2]);
					}
				} else {
					if (l) {
						var f =
							void 0 !== w.config.maxTime ? w.config.maxTime : w.config.maxDate;
						(t = Math.min(t, f.getHours())) === f.getHours() &&
							(a = Math.min(a, f.getMinutes())),
							a === f.getMinutes() && (i = Math.min(i, f.getSeconds()));
					}
					if (o) {
						var m =
							void 0 !== w.config.minTime ? w.config.minTime : w.config.minDate;
						(t = Math.max(t, m.getHours())) === m.getHours() &&
							a < m.getMinutes() &&
							(a = m.getMinutes()),
							a === m.getMinutes() && (i = Math.max(i, m.getSeconds()));
					}
				}
				A(t, a, i);
			}
		}
		function F(e) {
			var n = e || w.latestSelectedDateObj;
			n && n instanceof Date && A(n.getHours(), n.getMinutes(), n.getSeconds());
		}
		function A(e, n, t) {
			void 0 !== w.latestSelectedDateObj &&
				w.latestSelectedDateObj.setHours(e % 24, n, t || 0, 0),
				w.hourElement &&
					w.minuteElement &&
					!w.isMobile &&
					((w.hourElement.value = o(
						w.config.time_24hr ? e : ((12 + e) % 12) + 12 * r(e % 12 == 0)
					)),
					(w.minuteElement.value = o(n)),
					void 0 !== w.amPM && (w.amPM.textContent = w.l10n.amPM[r(e >= 12)]),
					void 0 !== w.secondElement && (w.secondElement.value = o(t)));
		}
		function N(e) {
			var n = g(e),
				t = parseInt(n.value) + (e.delta || 0);
			(t / 1e3 > 1 || ("Enter" === e.key && !/[^\d]/.test(t.toString()))) &&
				ee(t);
		}
		function P(e, n, t, a) {
			return n instanceof Array
				? n.forEach(function (n) {
						return P(e, n, t, a);
				  })
				: e instanceof Array
				? e.forEach(function (e) {
						return P(e, n, t, a);
				  })
				: (e.addEventListener(n, t, a),
				  void w._handlers.push({
						remove: function () {
							return e.removeEventListener(n, t, a);
						},
				  }));
		}
		function Y() {
			De("onChange");
		}
		function j(e, n) {
			var t =
					void 0 !== e
						? w.parseDate(e)
						: w.latestSelectedDateObj ||
						  (w.config.minDate && w.config.minDate > w.now
								? w.config.minDate
								: w.config.maxDate && w.config.maxDate < w.now
								? w.config.maxDate
								: w.now),
				a = w.currentYear,
				i = w.currentMonth;
			try {
				void 0 !== t &&
					((w.currentYear = t.getFullYear()), (w.currentMonth = t.getMonth()));
			} catch (e) {
				(e.message = "Invalid date supplied: " + t), w.config.errorHandler(e);
			}
			n && w.currentYear !== a && (De("onYearChange"), q()),
				!n ||
					(w.currentYear === a && w.currentMonth === i) ||
					De("onMonthChange"),
				w.redraw();
		}
		function H(e) {
			var n = g(e);
			~n.className.indexOf("arrow") &&
				L(e, n.classList.contains("arrowUp") ? 1 : -1);
		}
		function L(e, n, t) {
			var a = e && g(e),
				i = t || (a && a.parentNode && a.parentNode.firstChild),
				o = we("increment");
			(o.delta = n), i && i.dispatchEvent(o);
		}
		function R(e, n, t, a) {
			var i = ne(n, !0),
				o = d("span", e, n.getDate().toString());
			return (
				(o.dateObj = n),
				(o.$i = a),
				o.setAttribute("aria-label", w.formatDate(n, w.config.ariaDateFormat)),
				-1 === e.indexOf("hidden") &&
					0 === M(n, w.now) &&
					((w.todayDateElem = o),
					o.classList.add("today"),
					o.setAttribute("aria-current", "date")),
				i
					? ((o.tabIndex = -1),
					  be(n) &&
							(o.classList.add("selected"),
							(w.selectedDateElem = o),
							"range" === w.config.mode &&
								(s(
									o,
									"startRange",
									w.selectedDates[0] && 0 === M(n, w.selectedDates[0], !0)
								),
								s(
									o,
									"endRange",
									w.selectedDates[1] && 0 === M(n, w.selectedDates[1], !0)
								),
								"nextMonthDay" === e && o.classList.add("inRange"))))
					: o.classList.add("flatpickr-disabled"),
				"range" === w.config.mode &&
					(function (e) {
						return (
							!("range" !== w.config.mode || w.selectedDates.length < 2) &&
							M(e, w.selectedDates[0]) >= 0 &&
							M(e, w.selectedDates[1]) <= 0
						);
					})(n) &&
					!be(n) &&
					o.classList.add("inRange"),
				w.weekNumbers &&
					1 === w.config.showMonths &&
					"prevMonthDay" !== e &&
					a % 7 == 6 &&
					w.weekNumbers.insertAdjacentHTML(
						"beforeend",
						"<span class='flatpickr-day'>" + w.config.getWeek(n) + "</span>"
					),
				De("onDayCreate", o),
				o
			);
		}
		function W(e) {
			e.focus(), "range" === w.config.mode && oe(e);
		}
		function B(e) {
			for (
				var n = e > 0 ? 0 : w.config.showMonths - 1,
					t = e > 0 ? w.config.showMonths : -1,
					a = n;
				a != t;
				a += e
			)
				for (
					var i = w.daysContainer.children[a],
						o = e > 0 ? 0 : i.children.length - 1,
						r = e > 0 ? i.children.length : -1,
						l = o;
					l != r;
					l += e
				) {
					var c = i.children[l];
					if (-1 === c.className.indexOf("hidden") && ne(c.dateObj)) return c;
				}
		}
		function J(e, n) {
			var t = k(),
				a = te(t || document.body),
				i =
					void 0 !== e
						? e
						: a
						? t
						: void 0 !== w.selectedDateElem && te(w.selectedDateElem)
						? w.selectedDateElem
						: void 0 !== w.todayDateElem && te(w.todayDateElem)
						? w.todayDateElem
						: B(n > 0 ? 1 : -1);
			void 0 === i
				? w._input.focus()
				: a
				? (function (e, n) {
						for (
							var t =
									-1 === e.className.indexOf("Month")
										? e.dateObj.getMonth()
										: w.currentMonth,
								a = n > 0 ? w.config.showMonths : -1,
								i = n > 0 ? 1 : -1,
								o = t - w.currentMonth;
							o != a;
							o += i
						)
							for (
								var r = w.daysContainer.children[o],
									l =
										t - w.currentMonth === o
											? e.$i + n
											: n < 0
											? r.children.length - 1
											: 0,
									c = r.children.length,
									s = l;
								s >= 0 && s < c && s != (n > 0 ? c : -1);
								s += i
							) {
								var d = r.children[s];
								if (
									-1 === d.className.indexOf("hidden") &&
									ne(d.dateObj) &&
									Math.abs(e.$i - s) >= Math.abs(n)
								)
									return W(d);
							}
						w.changeMonth(i), J(B(i), 0);
				  })(i, n)
				: W(i);
		}
		function K(e, n) {
			for (
				var t = (new Date(e, n, 1).getDay() - w.l10n.firstDayOfWeek + 7) % 7,
					a = w.utils.getDaysInMonth((n - 1 + 12) % 12, e),
					i = w.utils.getDaysInMonth(n, e),
					o = window.document.createDocumentFragment(),
					r = w.config.showMonths > 1,
					l = r ? "prevMonthDay hidden" : "prevMonthDay",
					c = r ? "nextMonthDay hidden" : "nextMonthDay",
					s = a + 1 - t,
					u = 0;
				s <= a;
				s++, u++
			)
				o.appendChild(R("flatpickr-day " + l, new Date(e, n - 1, s), 0, u));
			for (s = 1; s <= i; s++, u++)
				o.appendChild(R("flatpickr-day", new Date(e, n, s), 0, u));
			for (
				var f = i + 1;
				f <= 42 - t && (1 === w.config.showMonths || u % 7 != 0);
				f++, u++
			)
				o.appendChild(R("flatpickr-day " + c, new Date(e, n + 1, f % i), 0, u));
			var m = d("div", "dayContainer");
			return m.appendChild(o), m;
		}
		function U() {
			if (void 0 !== w.daysContainer) {
				u(w.daysContainer), w.weekNumbers && u(w.weekNumbers);
				for (
					var e = document.createDocumentFragment(), n = 0;
					n < w.config.showMonths;
					n++
				) {
					var t = new Date(w.currentYear, w.currentMonth, 1);
					t.setMonth(w.currentMonth + n),
						e.appendChild(K(t.getFullYear(), t.getMonth()));
				}
				w.daysContainer.appendChild(e),
					(w.days = w.daysContainer.firstChild),
					"range" === w.config.mode && 1 === w.selectedDates.length && oe();
			}
		}
		function q() {
			if (
				!(w.config.showMonths > 1 || "dropdown" !== w.config.monthSelectorType)
			) {
				var e = function (e) {
					return (
						!(
							void 0 !== w.config.minDate &&
							w.currentYear === w.config.minDate.getFullYear() &&
							e < w.config.minDate.getMonth()
						) &&
						!(
							void 0 !== w.config.maxDate &&
							w.currentYear === w.config.maxDate.getFullYear() &&
							e > w.config.maxDate.getMonth()
						)
					);
				};
				(w.monthsDropdownContainer.tabIndex = -1),
					(w.monthsDropdownContainer.innerHTML = "");
				for (var n = 0; n < 12; n++)
					if (e(n)) {
						var t = d("option", "flatpickr-monthDropdown-month");
						(t.value = new Date(w.currentYear, n).getMonth().toString()),
							(t.textContent = h(n, w.config.shorthandCurrentMonth, w.l10n)),
							(t.tabIndex = -1),
							w.currentMonth === n && (t.selected = !0),
							w.monthsDropdownContainer.appendChild(t);
					}
			}
		}
		function $() {
			var e,
				n = d("div", "flatpickr-month"),
				t = window.document.createDocumentFragment();
			w.config.showMonths > 1 || "static" === w.config.monthSelectorType
				? (e = d("span", "cur-month"))
				: ((w.monthsDropdownContainer = d(
						"select",
						"flatpickr-monthDropdown-months"
				  )),
				  w.monthsDropdownContainer.setAttribute(
						"aria-label",
						w.l10n.monthAriaLabel
				  ),
				  P(w.monthsDropdownContainer, "change", function (e) {
						var n = g(e),
							t = parseInt(n.value, 10);
						w.changeMonth(t - w.currentMonth), De("onMonthChange");
				  }),
				  q(),
				  (e = w.monthsDropdownContainer));
			var a = m("cur-year", { tabindex: "-1" }),
				i = a.getElementsByTagName("input")[0];
			i.setAttribute("aria-label", w.l10n.yearAriaLabel),
				w.config.minDate &&
					i.setAttribute("min", w.config.minDate.getFullYear().toString()),
				w.config.maxDate &&
					(i.setAttribute("max", w.config.maxDate.getFullYear().toString()),
					(i.disabled =
						!!w.config.minDate &&
						w.config.minDate.getFullYear() === w.config.maxDate.getFullYear()));
			var o = d("div", "flatpickr-current-month");
			return (
				o.appendChild(e),
				o.appendChild(a),
				t.appendChild(o),
				n.appendChild(t),
				{ container: n, yearElement: i, monthElement: e }
			);
		}
		function V() {
			u(w.monthNav),
				w.monthNav.appendChild(w.prevMonthNav),
				w.config.showMonths && ((w.yearElements = []), (w.monthElements = []));
			for (var e = w.config.showMonths; e--; ) {
				var n = $();
				w.yearElements.push(n.yearElement),
					w.monthElements.push(n.monthElement),
					w.monthNav.appendChild(n.container);
			}
			w.monthNav.appendChild(w.nextMonthNav);
		}
		function z() {
			w.weekdayContainer
				? u(w.weekdayContainer)
				: (w.weekdayContainer = d("div", "flatpickr-weekdays"));
			for (var e = w.config.showMonths; e--; ) {
				var n = d("div", "flatpickr-weekdaycontainer");
				w.weekdayContainer.appendChild(n);
			}
			return G(), w.weekdayContainer;
		}
		function G() {
			if (w.weekdayContainer) {
				var e = w.l10n.firstDayOfWeek,
					t = n(w.l10n.weekdays.shorthand);
				e > 0 && e < t.length && (t = n(t.splice(e, t.length), t.splice(0, e)));
				for (var a = w.config.showMonths; a--; )
					w.weekdayContainer.children[a].innerHTML =
						"\n      <span class='flatpickr-weekday'>\n        " +
						t.join("</span><span class='flatpickr-weekday'>") +
						"\n      </span>\n      ";
			}
		}
		function Z(e, n) {
			void 0 === n && (n = !0);
			var t = n ? e : e - w.currentMonth;
			(t < 0 && !0 === w._hidePrevMonthArrow) ||
				(t > 0 && !0 === w._hideNextMonthArrow) ||
				((w.currentMonth += t),
				(w.currentMonth < 0 || w.currentMonth > 11) &&
					((w.currentYear += w.currentMonth > 11 ? 1 : -1),
					(w.currentMonth = (w.currentMonth + 12) % 12),
					De("onYearChange"),
					q()),
				U(),
				De("onMonthChange"),
				Ce());
		}
		function Q(e) {
			return w.calendarContainer.contains(e);
		}
		function X(e) {
			if (w.isOpen && !w.config.inline) {
				var n = g(e),
					t = Q(n),
					a =
						!(
							n === w.input ||
							n === w.altInput ||
							w.element.contains(n) ||
							(e.path &&
								e.path.indexOf &&
								(~e.path.indexOf(w.input) || ~e.path.indexOf(w.altInput)))
						) &&
						!t &&
						!Q(e.relatedTarget),
					i = !w.config.ignoredFocusElements.some(function (e) {
						return e.contains(n);
					});
				a &&
					i &&
					(w.config.allowInput &&
						w.setDate(
							w._input.value,
							!1,
							w.config.altInput ? w.config.altFormat : w.config.dateFormat
						),
					void 0 !== w.timeContainer &&
						void 0 !== w.minuteElement &&
						void 0 !== w.hourElement &&
						"" !== w.input.value &&
						void 0 !== w.input.value &&
						_(),
					w.close(),
					w.config &&
						"range" === w.config.mode &&
						1 === w.selectedDates.length &&
						w.clear(!1));
			}
		}
		function ee(e) {
			if (
				!(
					!e ||
					(w.config.minDate && e < w.config.minDate.getFullYear()) ||
					(w.config.maxDate && e > w.config.maxDate.getFullYear())
				)
			) {
				var n = e,
					t = w.currentYear !== n;
				(w.currentYear = n || w.currentYear),
					w.config.maxDate && w.currentYear === w.config.maxDate.getFullYear()
						? (w.currentMonth = Math.min(
								w.config.maxDate.getMonth(),
								w.currentMonth
						  ))
						: w.config.minDate &&
						  w.currentYear === w.config.minDate.getFullYear() &&
						  (w.currentMonth = Math.max(
								w.config.minDate.getMonth(),
								w.currentMonth
						  )),
					t && (w.redraw(), De("onYearChange"), q());
			}
		}
		function ne(e, n) {
			var t;
			void 0 === n && (n = !0);
			var a = w.parseDate(e, void 0, n);
			if (
				(w.config.minDate &&
					a &&
					M(a, w.config.minDate, void 0 !== n ? n : !w.minDateHasTime) < 0) ||
				(w.config.maxDate &&
					a &&
					M(a, w.config.maxDate, void 0 !== n ? n : !w.maxDateHasTime) > 0)
			)
				return !1;
			if (!w.config.enable && 0 === w.config.disable.length) return !0;
			if (void 0 === a) return !1;
			for (
				var i = !!w.config.enable,
					o =
						null !== (t = w.config.enable) && void 0 !== t
							? t
							: w.config.disable,
					r = 0,
					l = void 0;
				r < o.length;
				r++
			) {
				if ("function" == typeof (l = o[r]) && l(a)) return i;
				if (l instanceof Date && void 0 !== a && l.getTime() === a.getTime())
					return i;
				if ("string" == typeof l) {
					var c = w.parseDate(l, void 0, !0);
					return c && c.getTime() === a.getTime() ? i : !i;
				}
				if (
					"object" == typeof l &&
					void 0 !== a &&
					l.from &&
					l.to &&
					a.getTime() >= l.from.getTime() &&
					a.getTime() <= l.to.getTime()
				)
					return i;
			}
			return !i;
		}
		function te(e) {
			return (
				void 0 !== w.daysContainer &&
				-1 === e.className.indexOf("hidden") &&
				-1 === e.className.indexOf("flatpickr-disabled") &&
				w.daysContainer.contains(e)
			);
		}
		function ae(e) {
			var n = e.target === w._input,
				t = w._input.value.trimEnd() !== Me();
			!n ||
				!t ||
				(e.relatedTarget && Q(e.relatedTarget)) ||
				w.setDate(
					w._input.value,
					!0,
					e.target === w.altInput ? w.config.altFormat : w.config.dateFormat
				);
		}
		function ie(e) {
			var n = g(e),
				t = w.config.wrap ? p.contains(n) : n === w._input,
				a = w.config.allowInput,
				i = w.isOpen && (!a || !t),
				o = w.config.inline && t && !a;
			if (13 === e.keyCode && t) {
				if (a)
					return (
						w.setDate(
							w._input.value,
							!0,
							n === w.altInput ? w.config.altFormat : w.config.dateFormat
						),
						w.close(),
						n.blur()
					);
				w.open();
			} else if (Q(n) || i || o) {
				var r = !!w.timeContainer && w.timeContainer.contains(n);
				switch (e.keyCode) {
					case 13:
						r ? (e.preventDefault(), _(), fe()) : me(e);
						break;
					case 27:
						e.preventDefault(), fe();
						break;
					case 8:
					case 46:
						t && !w.config.allowInput && (e.preventDefault(), w.clear());
						break;
					case 37:
					case 39:
						if (r || t) w.hourElement && w.hourElement.focus();
						else {
							e.preventDefault();
							var l = k();
							if (void 0 !== w.daysContainer && (!1 === a || (l && te(l)))) {
								var c = 39 === e.keyCode ? 1 : -1;
								e.ctrlKey
									? (e.stopPropagation(), Z(c), J(B(1), 0))
									: J(void 0, c);
							}
						}
						break;
					case 38:
					case 40:
						e.preventDefault();
						var s = 40 === e.keyCode ? 1 : -1;
						(w.daysContainer && void 0 !== n.$i) ||
						n === w.input ||
						n === w.altInput
							? e.ctrlKey
								? (e.stopPropagation(), ee(w.currentYear - s), J(B(1), 0))
								: r || J(void 0, 7 * s)
							: n === w.currentYearElement
							? ee(w.currentYear - s)
							: w.config.enableTime &&
							  (!r && w.hourElement && w.hourElement.focus(),
							  _(e),
							  w._debouncedChange());
						break;
					case 9:
						if (r) {
							var d = [w.hourElement, w.minuteElement, w.secondElement, w.amPM]
									.concat(w.pluginElements)
									.filter(function (e) {
										return e;
									}),
								u = d.indexOf(n);
							if (-1 !== u) {
								var f = d[u + (e.shiftKey ? -1 : 1)];
								e.preventDefault(), (f || w._input).focus();
							}
						} else
							!w.config.noCalendar &&
								w.daysContainer &&
								w.daysContainer.contains(n) &&
								e.shiftKey &&
								(e.preventDefault(), w._input.focus());
				}
			}
			if (void 0 !== w.amPM && n === w.amPM)
				switch (e.key) {
					case w.l10n.amPM[0].charAt(0):
					case w.l10n.amPM[0].charAt(0).toLowerCase():
						(w.amPM.textContent = w.l10n.amPM[0]), O(), ye();
						break;
					case w.l10n.amPM[1].charAt(0):
					case w.l10n.amPM[1].charAt(0).toLowerCase():
						(w.amPM.textContent = w.l10n.amPM[1]), O(), ye();
				}
			(t || Q(n)) && De("onKeyDown", e);
		}
		function oe(e, n) {
			if (
				(void 0 === n && (n = "flatpickr-day"),
				1 === w.selectedDates.length &&
					(!e ||
						(e.classList.contains(n) &&
							!e.classList.contains("flatpickr-disabled"))))
			) {
				for (
					var t = e
							? e.dateObj.getTime()
							: w.days.firstElementChild.dateObj.getTime(),
						a = w.parseDate(w.selectedDates[0], void 0, !0).getTime(),
						i = Math.min(t, w.selectedDates[0].getTime()),
						o = Math.max(t, w.selectedDates[0].getTime()),
						r = !1,
						l = 0,
						c = 0,
						s = i;
					s < o;
					s += x
				)
					ne(new Date(s), !0) ||
						((r = r || (s > i && s < o)),
						s < a && (!l || s > l)
							? (l = s)
							: s > a && (!c || s < c) && (c = s));
				Array.from(
					w.rContainer.querySelectorAll(
						"*:nth-child(-n+" + w.config.showMonths + ") > ." + n
					)
				).forEach(function (n) {
					var i,
						o,
						s,
						d = n.dateObj.getTime(),
						u = (l > 0 && d < l) || (c > 0 && d > c);
					if (u)
						return (
							n.classList.add("notAllowed"),
							void ["inRange", "startRange", "endRange"].forEach(function (e) {
								n.classList.remove(e);
							})
						);
					(r && !u) ||
						(["startRange", "inRange", "endRange", "notAllowed"].forEach(
							function (e) {
								n.classList.remove(e);
							}
						),
						void 0 !== e &&
							(e.classList.add(
								t <= w.selectedDates[0].getTime() ? "startRange" : "endRange"
							),
							a < t && d === a
								? n.classList.add("startRange")
								: a > t && d === a && n.classList.add("endRange"),
							d >= l &&
								(0 === c || d <= c) &&
								((o = a),
								(s = t),
								(i = d) > Math.min(o, s) && i < Math.max(o, s)) &&
								n.classList.add("inRange")));
				});
			}
		}
		function re() {
			!w.isOpen || w.config.static || w.config.inline || de();
		}
		function le(e) {
			return function (n) {
				var t = (w.config["_" + e + "Date"] = w.parseDate(
						n,
						w.config.dateFormat
					)),
					a = w.config["_" + ("min" === e ? "max" : "min") + "Date"];
				void 0 !== t &&
					(w["min" === e ? "minDateHasTime" : "maxDateHasTime"] =
						t.getHours() > 0 || t.getMinutes() > 0 || t.getSeconds() > 0),
					w.selectedDates &&
						((w.selectedDates = w.selectedDates.filter(function (e) {
							return ne(e);
						})),
						w.selectedDates.length || "min" !== e || F(t),
						ye()),
					w.daysContainer &&
						(ue(),
						void 0 !== t
							? (w.currentYearElement[e] = t.getFullYear().toString())
							: w.currentYearElement.removeAttribute(e),
						(w.currentYearElement.disabled =
							!!a && void 0 !== t && a.getFullYear() === t.getFullYear()));
			};
		}
		function ce() {
			return w.config.wrap ? p.querySelector("[data-input]") : p;
		}
		function se() {
			"object" != typeof w.config.locale &&
				void 0 === I.l10ns[w.config.locale] &&
				w.config.errorHandler(
					new Error("flatpickr: invalid locale " + w.config.locale)
				),
				(w.l10n = e(
					e({}, I.l10ns.default),
					"object" == typeof w.config.locale
						? w.config.locale
						: "default" !== w.config.locale
						? I.l10ns[w.config.locale]
						: void 0
				)),
				(D.D = "(" + w.l10n.weekdays.shorthand.join("|") + ")"),
				(D.l = "(" + w.l10n.weekdays.longhand.join("|") + ")"),
				(D.M = "(" + w.l10n.months.shorthand.join("|") + ")"),
				(D.F = "(" + w.l10n.months.longhand.join("|") + ")"),
				(D.K =
					"(" +
					w.l10n.amPM[0] +
					"|" +
					w.l10n.amPM[1] +
					"|" +
					w.l10n.amPM[0].toLowerCase() +
					"|" +
					w.l10n.amPM[1].toLowerCase() +
					")"),
				void 0 ===
					e(e({}, v), JSON.parse(JSON.stringify(p.dataset || {}))).time_24hr &&
					void 0 === I.defaultConfig.time_24hr &&
					(w.config.time_24hr = w.l10n.time_24hr),
				(w.formatDate = b(w)),
				(w.parseDate = C({ config: w.config, l10n: w.l10n }));
		}
		function de(e) {
			if ("function" != typeof w.config.position) {
				if (void 0 !== w.calendarContainer) {
					De("onPreCalendarPosition");
					var n = e || w._positionElement,
						t = Array.prototype.reduce.call(
							w.calendarContainer.children,
							function (e, n) {
								return e + n.offsetHeight;
							},
							0
						),
						a = w.calendarContainer.offsetWidth,
						i = w.config.position.split(" "),
						o = i[0],
						r = i.length > 1 ? i[1] : null,
						l = n.getBoundingClientRect(),
						c = window.innerHeight - l.bottom,
						d = "above" === o || ("below" !== o && c < t && l.top > t),
						u = window.pageYOffset + l.top + (d ? -t - 2 : n.offsetHeight + 2);
					if (
						(s(w.calendarContainer, "arrowTop", !d),
						s(w.calendarContainer, "arrowBottom", d),
						!w.config.inline)
					) {
						var f = window.pageXOffset + l.left,
							m = !1,
							g = !1;
						"center" === r
							? ((f -= (a - l.width) / 2), (m = !0))
							: "right" === r && ((f -= a - l.width), (g = !0)),
							s(w.calendarContainer, "arrowLeft", !m && !g),
							s(w.calendarContainer, "arrowCenter", m),
							s(w.calendarContainer, "arrowRight", g);
						var p =
								window.document.body.offsetWidth -
								(window.pageXOffset + l.right),
							h = f + a > window.document.body.offsetWidth,
							v = p + a > window.document.body.offsetWidth;
						if ((s(w.calendarContainer, "rightMost", h), !w.config.static))
							if (((w.calendarContainer.style.top = u + "px"), h))
								if (v) {
									var D = (function () {
										for (
											var e = null, n = 0;
											n < document.styleSheets.length;
											n++
										) {
											var t = document.styleSheets[n];
											if (t.cssRules) {
												try {
													t.cssRules;
												} catch (e) {
													continue;
												}
												e = t;
												break;
											}
										}
										return null != e
											? e
											: ((a = document.createElement("style")),
											  document.head.appendChild(a),
											  a.sheet);
										var a;
									})();
									if (void 0 === D) return;
									var b = window.document.body.offsetWidth,
										C = Math.max(0, b / 2 - a / 2),
										M = D.cssRules.length,
										y = "{left:" + l.left + "px;right:auto;}";
									s(w.calendarContainer, "rightMost", !1),
										s(w.calendarContainer, "centerMost", !0),
										D.insertRule(
											".flatpickr-calendar.centerMost:before,.flatpickr-calendar.centerMost:after" +
												y,
											M
										),
										(w.calendarContainer.style.left = C + "px"),
										(w.calendarContainer.style.right = "auto");
								} else
									(w.calendarContainer.style.left = "auto"),
										(w.calendarContainer.style.right = p + "px");
							else
								(w.calendarContainer.style.left = f + "px"),
									(w.calendarContainer.style.right = "auto");
					}
				}
			} else w.config.position(w, e);
		}
		function ue() {
			w.config.noCalendar || w.isMobile || (q(), Ce(), U());
		}
		function fe() {
			w._input.focus(),
				-1 !== window.navigator.userAgent.indexOf("MSIE") ||
				void 0 !== navigator.msMaxTouchPoints
					? setTimeout(w.close, 0)
					: w.close();
		}
		function me(e) {
			e.preventDefault(), e.stopPropagation();
			var n = f(g(e), function (e) {
				return (
					e.classList &&
					e.classList.contains("flatpickr-day") &&
					!e.classList.contains("flatpickr-disabled") &&
					!e.classList.contains("notAllowed")
				);
			});
			if (void 0 !== n) {
				var t = n,
					a = (w.latestSelectedDateObj = new Date(t.dateObj.getTime())),
					i =
						(a.getMonth() < w.currentMonth ||
							a.getMonth() > w.currentMonth + w.config.showMonths - 1) &&
						"range" !== w.config.mode;
				if (((w.selectedDateElem = t), "single" === w.config.mode))
					w.selectedDates = [a];
				else if ("multiple" === w.config.mode) {
					var o = be(a);
					o ? w.selectedDates.splice(parseInt(o), 1) : w.selectedDates.push(a);
				} else
					"range" === w.config.mode &&
						(2 === w.selectedDates.length && w.clear(!1, !1),
						(w.latestSelectedDateObj = a),
						w.selectedDates.push(a),
						0 !== M(a, w.selectedDates[0], !0) &&
							w.selectedDates.sort(function (e, n) {
								return e.getTime() - n.getTime();
							}));
				if ((O(), i)) {
					var r = w.currentYear !== a.getFullYear();
					(w.currentYear = a.getFullYear()),
						(w.currentMonth = a.getMonth()),
						r && (De("onYearChange"), q()),
						De("onMonthChange");
				}
				if (
					(Ce(),
					U(),
					ye(),
					i || "range" === w.config.mode || 1 !== w.config.showMonths
						? void 0 !== w.selectedDateElem &&
						  void 0 === w.hourElement &&
						  w.selectedDateElem &&
						  w.selectedDateElem.focus()
						: W(t),
					void 0 !== w.hourElement &&
						void 0 !== w.hourElement &&
						w.hourElement.focus(),
					w.config.closeOnSelect)
				) {
					var l = "single" === w.config.mode && !w.config.enableTime,
						c =
							"range" === w.config.mode &&
							2 === w.selectedDates.length &&
							!w.config.enableTime;
					(l || c) && fe();
				}
				Y();
			}
		}
		(w.parseDate = C({ config: w.config, l10n: w.l10n })),
			(w._handlers = []),
			(w.pluginElements = []),
			(w.loadedPlugins = []),
			(w._bind = P),
			(w._setHoursFromDate = F),
			(w._positionCalendar = de),
			(w.changeMonth = Z),
			(w.changeYear = ee),
			(w.clear = function (e, n) {
				void 0 === e && (e = !0);
				void 0 === n && (n = !0);
				(w.input.value = ""), void 0 !== w.altInput && (w.altInput.value = "");
				void 0 !== w.mobileInput && (w.mobileInput.value = "");
				(w.selectedDates = []),
					(w.latestSelectedDateObj = void 0),
					!0 === n &&
						((w.currentYear = w._initialDate.getFullYear()),
						(w.currentMonth = w._initialDate.getMonth()));
				if (!0 === w.config.enableTime) {
					var t = E(w.config),
						a = t.hours,
						i = t.minutes,
						o = t.seconds;
					A(a, i, o);
				}
				w.redraw(), e && De("onChange");
			}),
			(w.close = function () {
				(w.isOpen = !1),
					w.isMobile ||
						(void 0 !== w.calendarContainer &&
							w.calendarContainer.classList.remove("open"),
						void 0 !== w._input && w._input.classList.remove("active"));
				De("onClose");
			}),
			(w.onMouseOver = oe),
			(w._createElement = d),
			(w.createDay = R),
			(w.destroy = function () {
				void 0 !== w.config && De("onDestroy");
				for (var e = w._handlers.length; e--; ) w._handlers[e].remove();
				if (((w._handlers = []), w.mobileInput))
					w.mobileInput.parentNode &&
						w.mobileInput.parentNode.removeChild(w.mobileInput),
						(w.mobileInput = void 0);
				else if (w.calendarContainer && w.calendarContainer.parentNode)
					if (w.config.static && w.calendarContainer.parentNode) {
						var n = w.calendarContainer.parentNode;
						if ((n.lastChild && n.removeChild(n.lastChild), n.parentNode)) {
							for (; n.firstChild; ) n.parentNode.insertBefore(n.firstChild, n);
							n.parentNode.removeChild(n);
						}
					} else
						w.calendarContainer.parentNode.removeChild(w.calendarContainer);
				w.altInput &&
					((w.input.type = "text"),
					w.altInput.parentNode &&
						w.altInput.parentNode.removeChild(w.altInput),
					delete w.altInput);
				w.input &&
					((w.input.type = w.input._type),
					w.input.classList.remove("flatpickr-input"),
					w.input.removeAttribute("readonly"));
				[
					"_showTimeInput",
					"latestSelectedDateObj",
					"_hideNextMonthArrow",
					"_hidePrevMonthArrow",
					"__hideNextMonthArrow",
					"__hidePrevMonthArrow",
					"isMobile",
					"isOpen",
					"selectedDateElem",
					"minDateHasTime",
					"maxDateHasTime",
					"days",
					"daysContainer",
					"_input",
					"_positionElement",
					"innerContainer",
					"rContainer",
					"monthNav",
					"todayDateElem",
					"calendarContainer",
					"weekdayContainer",
					"prevMonthNav",
					"nextMonthNav",
					"monthsDropdownContainer",
					"currentMonthElement",
					"currentYearElement",
					"navigationCurrentMonth",
					"selectedDateElem",
					"config",
				].forEach(function (e) {
					try {
						delete w[e];
					} catch (e) {}
				});
			}),
			(w.isEnabled = ne),
			(w.jumpToDate = j),
			(w.updateValue = ye),
			(w.open = function (e, n) {
				void 0 === n && (n = w._positionElement);
				if (!0 === w.isMobile) {
					if (e) {
						e.preventDefault();
						var t = g(e);
						t && t.blur();
					}
					return (
						void 0 !== w.mobileInput &&
							(w.mobileInput.focus(), w.mobileInput.click()),
						void De("onOpen")
					);
				}
				if (w._input.disabled || w.config.inline) return;
				var a = w.isOpen;
				(w.isOpen = !0),
					a ||
						(w.calendarContainer.classList.add("open"),
						w._input.classList.add("active"),
						De("onOpen"),
						de(n));
				!0 === w.config.enableTime &&
					!0 === w.config.noCalendar &&
					(!1 !== w.config.allowInput ||
						(void 0 !== e && w.timeContainer.contains(e.relatedTarget)) ||
						setTimeout(function () {
							return w.hourElement.select();
						}, 50));
			}),
			(w.redraw = ue),
			(w.set = function (e, n) {
				if (null !== e && "object" == typeof e)
					for (var a in (Object.assign(w.config, e), e))
						void 0 !== ge[a] &&
							ge[a].forEach(function (e) {
								return e();
							});
				else
					(w.config[e] = n),
						void 0 !== ge[e]
							? ge[e].forEach(function (e) {
									return e();
							  })
							: t.indexOf(e) > -1 && (w.config[e] = c(n));
				w.redraw(), ye(!0);
			}),
			(w.setDate = function (e, n, t) {
				void 0 === n && (n = !1);
				void 0 === t && (t = w.config.dateFormat);
				if ((0 !== e && !e) || (e instanceof Array && 0 === e.length))
					return w.clear(n);
				pe(e, t),
					(w.latestSelectedDateObj =
						w.selectedDates[w.selectedDates.length - 1]),
					w.redraw(),
					j(void 0, n),
					F(),
					0 === w.selectedDates.length && w.clear(!1);
				ye(n), n && De("onChange");
			}),
			(w.toggle = function (e) {
				if (!0 === w.isOpen) return w.close();
				w.open(e);
			});
		var ge = {
			locale: [se, G],
			showMonths: [V, S, z],
			minDate: [j],
			maxDate: [j],
			positionElement: [ve],
			clickOpens: [
				function () {
					!0 === w.config.clickOpens
						? (P(w._input, "focus", w.open), P(w._input, "click", w.open))
						: (w._input.removeEventListener("focus", w.open),
						  w._input.removeEventListener("click", w.open));
				},
			],
		};
		function pe(e, n) {
			var t = [];
			if (e instanceof Array)
				t = e.map(function (e) {
					return w.parseDate(e, n);
				});
			else if (e instanceof Date || "number" == typeof e)
				t = [w.parseDate(e, n)];
			else if ("string" == typeof e)
				switch (w.config.mode) {
					case "single":
					case "time":
						t = [w.parseDate(e, n)];
						break;
					case "multiple":
						t = e.split(w.config.conjunction).map(function (e) {
							return w.parseDate(e, n);
						});
						break;
					case "range":
						t = e.split(w.l10n.rangeSeparator).map(function (e) {
							return w.parseDate(e, n);
						});
				}
			else
				w.config.errorHandler(
					new Error("Invalid date supplied: " + JSON.stringify(e))
				);
			(w.selectedDates = w.config.allowInvalidPreload
				? t
				: t.filter(function (e) {
						return e instanceof Date && ne(e, !1);
				  })),
				"range" === w.config.mode &&
					w.selectedDates.sort(function (e, n) {
						return e.getTime() - n.getTime();
					});
		}
		function he(e) {
			return e
				.slice()
				.map(function (e) {
					return "string" == typeof e ||
						"number" == typeof e ||
						e instanceof Date
						? w.parseDate(e, void 0, !0)
						: e && "object" == typeof e && e.from && e.to
						? {
								from: w.parseDate(e.from, void 0),
								to: w.parseDate(e.to, void 0),
						  }
						: e;
				})
				.filter(function (e) {
					return e;
				});
		}
		function ve() {
			w._positionElement = w.config.positionElement || w._input;
		}
		function De(e, n) {
			if (void 0 !== w.config) {
				var t = w.config[e];
				if (void 0 !== t && t.length > 0)
					for (var a = 0; t[a] && a < t.length; a++)
						t[a](w.selectedDates, w.input.value, w, n);
				"onChange" === e &&
					(w.input.dispatchEvent(we("change")),
					w.input.dispatchEvent(we("input")));
			}
		}
		function we(e) {
			var n = document.createEvent("Event");
			return n.initEvent(e, !0, !0), n;
		}
		function be(e) {
			for (var n = 0; n < w.selectedDates.length; n++) {
				var t = w.selectedDates[n];
				if (t instanceof Date && 0 === M(t, e)) return "" + n;
			}
			return !1;
		}
		function Ce() {
			w.config.noCalendar ||
				w.isMobile ||
				!w.monthNav ||
				(w.yearElements.forEach(function (e, n) {
					var t = new Date(w.currentYear, w.currentMonth, 1);
					t.setMonth(w.currentMonth + n),
						w.config.showMonths > 1 || "static" === w.config.monthSelectorType
							? (w.monthElements[n].textContent =
									h(t.getMonth(), w.config.shorthandCurrentMonth, w.l10n) + " ")
							: (w.monthsDropdownContainer.value = t.getMonth().toString()),
						(e.value = t.getFullYear().toString());
				}),
				(w._hidePrevMonthArrow =
					void 0 !== w.config.minDate &&
					(w.currentYear === w.config.minDate.getFullYear()
						? w.currentMonth <= w.config.minDate.getMonth()
						: w.currentYear < w.config.minDate.getFullYear())),
				(w._hideNextMonthArrow =
					void 0 !== w.config.maxDate &&
					(w.currentYear === w.config.maxDate.getFullYear()
						? w.currentMonth + 1 > w.config.maxDate.getMonth()
						: w.currentYear > w.config.maxDate.getFullYear())));
		}
		function Me(e) {
			var n =
				e || (w.config.altInput ? w.config.altFormat : w.config.dateFormat);
			return w.selectedDates
				.map(function (e) {
					return w.formatDate(e, n);
				})
				.filter(function (e, n, t) {
					return (
						"range" !== w.config.mode ||
						w.config.enableTime ||
						t.indexOf(e) === n
					);
				})
				.join(
					"range" !== w.config.mode
						? w.config.conjunction
						: w.l10n.rangeSeparator
				);
		}
		function ye(e) {
			void 0 === e && (e = !0),
				void 0 !== w.mobileInput &&
					w.mobileFormatStr &&
					(w.mobileInput.value =
						void 0 !== w.latestSelectedDateObj
							? w.formatDate(w.latestSelectedDateObj, w.mobileFormatStr)
							: ""),
				(w.input.value = Me(w.config.dateFormat)),
				void 0 !== w.altInput && (w.altInput.value = Me(w.config.altFormat)),
				!1 !== e && De("onValueUpdate");
		}
		function xe(e) {
			var n = g(e),
				t = w.prevMonthNav.contains(n),
				a = w.nextMonthNav.contains(n);
			t || a
				? Z(t ? -1 : 1)
				: w.yearElements.indexOf(n) >= 0
				? n.select()
				: n.classList.contains("arrowUp")
				? w.changeYear(w.currentYear + 1)
				: n.classList.contains("arrowDown") && w.changeYear(w.currentYear - 1);
		}
		return (
			(function () {
				(w.element = w.input = p),
					(w.isOpen = !1),
					(function () {
						var n = [
								"wrap",
								"weekNumbers",
								"allowInput",
								"allowInvalidPreload",
								"clickOpens",
								"time_24hr",
								"enableTime",
								"noCalendar",
								"altInput",
								"shorthandCurrentMonth",
								"inline",
								"static",
								"enableSeconds",
								"disableMobile",
							],
							i = e(e({}, JSON.parse(JSON.stringify(p.dataset || {}))), v),
							o = {};
						(w.config.parseDate = i.parseDate),
							(w.config.formatDate = i.formatDate),
							Object.defineProperty(w.config, "enable", {
								get: function () {
									return w.config._enable;
								},
								set: function (e) {
									w.config._enable = he(e);
								},
							}),
							Object.defineProperty(w.config, "disable", {
								get: function () {
									return w.config._disable;
								},
								set: function (e) {
									w.config._disable = he(e);
								},
							});
						var r = "time" === i.mode;
						if (!i.dateFormat && (i.enableTime || r)) {
							var l = I.defaultConfig.dateFormat || a.dateFormat;
							o.dateFormat =
								i.noCalendar || r
									? "H:i" + (i.enableSeconds ? ":S" : "")
									: l + " H:i" + (i.enableSeconds ? ":S" : "");
						}
						if (i.altInput && (i.enableTime || r) && !i.altFormat) {
							var s = I.defaultConfig.altFormat || a.altFormat;
							o.altFormat =
								i.noCalendar || r
									? "h:i" + (i.enableSeconds ? ":S K" : " K")
									: s + " h:i" + (i.enableSeconds ? ":S" : "") + " K";
						}
						Object.defineProperty(w.config, "minDate", {
							get: function () {
								return w.config._minDate;
							},
							set: le("min"),
						}),
							Object.defineProperty(w.config, "maxDate", {
								get: function () {
									return w.config._maxDate;
								},
								set: le("max"),
							});
						var d = function (e) {
							return function (n) {
								w.config["min" === e ? "_minTime" : "_maxTime"] = w.parseDate(
									n,
									"H:i:S"
								);
							};
						};
						Object.defineProperty(w.config, "minTime", {
							get: function () {
								return w.config._minTime;
							},
							set: d("min"),
						}),
							Object.defineProperty(w.config, "maxTime", {
								get: function () {
									return w.config._maxTime;
								},
								set: d("max"),
							}),
							"time" === i.mode &&
								((w.config.noCalendar = !0), (w.config.enableTime = !0));
						Object.assign(w.config, o, i);
						for (var u = 0; u < n.length; u++)
							w.config[n[u]] =
								!0 === w.config[n[u]] || "true" === w.config[n[u]];
						t
							.filter(function (e) {
								return void 0 !== w.config[e];
							})
							.forEach(function (e) {
								w.config[e] = c(w.config[e] || []).map(T);
							}),
							(w.isMobile =
								!w.config.disableMobile &&
								!w.config.inline &&
								"single" === w.config.mode &&
								!w.config.disable.length &&
								!w.config.enable &&
								!w.config.weekNumbers &&
								/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
									navigator.userAgent
								));
						for (u = 0; u < w.config.plugins.length; u++) {
							var f = w.config.plugins[u](w) || {};
							for (var m in f)
								t.indexOf(m) > -1
									? (w.config[m] = c(f[m]).map(T).concat(w.config[m]))
									: void 0 === i[m] && (w.config[m] = f[m]);
						}
						i.altInputClass ||
							(w.config.altInputClass =
								ce().className + " " + w.config.altInputClass);
						De("onParseConfig");
					})(),
					se(),
					(function () {
						if (((w.input = ce()), !w.input))
							return void w.config.errorHandler(
								new Error("Invalid input element specified")
							);
						(w.input._type = w.input.type),
							(w.input.type = "text"),
							w.input.classList.add("flatpickr-input"),
							(w._input = w.input),
							w.config.altInput &&
								((w.altInput = d(w.input.nodeName, w.config.altInputClass)),
								(w._input = w.altInput),
								(w.altInput.placeholder = w.input.placeholder),
								(w.altInput.disabled = w.input.disabled),
								(w.altInput.required = w.input.required),
								(w.altInput.tabIndex = w.input.tabIndex),
								(w.altInput.type = "text"),
								w.input.setAttribute("type", "hidden"),
								!w.config.static &&
									w.input.parentNode &&
									w.input.parentNode.insertBefore(
										w.altInput,
										w.input.nextSibling
									));
						w.config.allowInput ||
							w._input.setAttribute("readonly", "readonly");
						ve();
					})(),
					(function () {
						(w.selectedDates = []),
							(w.now = w.parseDate(w.config.now) || new Date());
						var e =
							w.config.defaultDate ||
							(("INPUT" !== w.input.nodeName &&
								"TEXTAREA" !== w.input.nodeName) ||
							!w.input.placeholder ||
							w.input.value !== w.input.placeholder
								? w.input.value
								: null);
						e && pe(e, w.config.dateFormat);
						(w._initialDate =
							w.selectedDates.length > 0
								? w.selectedDates[0]
								: w.config.minDate &&
								  w.config.minDate.getTime() > w.now.getTime()
								? w.config.minDate
								: w.config.maxDate &&
								  w.config.maxDate.getTime() < w.now.getTime()
								? w.config.maxDate
								: w.now),
							(w.currentYear = w._initialDate.getFullYear()),
							(w.currentMonth = w._initialDate.getMonth()),
							w.selectedDates.length > 0 &&
								(w.latestSelectedDateObj = w.selectedDates[0]);
						void 0 !== w.config.minTime &&
							(w.config.minTime = w.parseDate(w.config.minTime, "H:i"));
						void 0 !== w.config.maxTime &&
							(w.config.maxTime = w.parseDate(w.config.maxTime, "H:i"));
						(w.minDateHasTime =
							!!w.config.minDate &&
							(w.config.minDate.getHours() > 0 ||
								w.config.minDate.getMinutes() > 0 ||
								w.config.minDate.getSeconds() > 0)),
							(w.maxDateHasTime =
								!!w.config.maxDate &&
								(w.config.maxDate.getHours() > 0 ||
									w.config.maxDate.getMinutes() > 0 ||
									w.config.maxDate.getSeconds() > 0));
					})(),
					(w.utils = {
						getDaysInMonth: function (e, n) {
							return (
								void 0 === e && (e = w.currentMonth),
								void 0 === n && (n = w.currentYear),
								1 === e && ((n % 4 == 0 && n % 100 != 0) || n % 400 == 0)
									? 29
									: w.l10n.daysInMonth[e]
							);
						},
					}),
					w.isMobile ||
						(function () {
							var e = window.document.createDocumentFragment();
							if (
								((w.calendarContainer = d("div", "flatpickr-calendar")),
								(w.calendarContainer.tabIndex = -1),
								!w.config.noCalendar)
							) {
								if (
									(e.appendChild(
										((w.monthNav = d("div", "flatpickr-months")),
										(w.yearElements = []),
										(w.monthElements = []),
										(w.prevMonthNav = d("span", "flatpickr-prev-month")),
										(w.prevMonthNav.innerHTML = w.config.prevArrow),
										(w.nextMonthNav = d("span", "flatpickr-next-month")),
										(w.nextMonthNav.innerHTML = w.config.nextArrow),
										V(),
										Object.defineProperty(w, "_hidePrevMonthArrow", {
											get: function () {
												return w.__hidePrevMonthArrow;
											},
											set: function (e) {
												w.__hidePrevMonthArrow !== e &&
													(s(w.prevMonthNav, "flatpickr-disabled", e),
													(w.__hidePrevMonthArrow = e));
											},
										}),
										Object.defineProperty(w, "_hideNextMonthArrow", {
											get: function () {
												return w.__hideNextMonthArrow;
											},
											set: function (e) {
												w.__hideNextMonthArrow !== e &&
													(s(w.nextMonthNav, "flatpickr-disabled", e),
													(w.__hideNextMonthArrow = e));
											},
										}),
										(w.currentYearElement = w.yearElements[0]),
										Ce(),
										w.monthNav)
									),
									(w.innerContainer = d("div", "flatpickr-innerContainer")),
									w.config.weekNumbers)
								) {
									var n = (function () {
											w.calendarContainer.classList.add("hasWeeks");
											var e = d("div", "flatpickr-weekwrapper");
											e.appendChild(
												d("span", "flatpickr-weekday", w.l10n.weekAbbreviation)
											);
											var n = d("div", "flatpickr-weeks");
											return (
												e.appendChild(n), { weekWrapper: e, weekNumbers: n }
											);
										})(),
										t = n.weekWrapper,
										a = n.weekNumbers;
									w.innerContainer.appendChild(t),
										(w.weekNumbers = a),
										(w.weekWrapper = t);
								}
								(w.rContainer = d("div", "flatpickr-rContainer")),
									w.rContainer.appendChild(z()),
									w.daysContainer ||
										((w.daysContainer = d("div", "flatpickr-days")),
										(w.daysContainer.tabIndex = -1)),
									U(),
									w.rContainer.appendChild(w.daysContainer),
									w.innerContainer.appendChild(w.rContainer),
									e.appendChild(w.innerContainer);
							}
							w.config.enableTime &&
								e.appendChild(
									(function () {
										w.calendarContainer.classList.add("hasTime"),
											w.config.noCalendar &&
												w.calendarContainer.classList.add("noCalendar");
										var e = E(w.config);
										(w.timeContainer = d("div", "flatpickr-time")),
											(w.timeContainer.tabIndex = -1);
										var n = d("span", "flatpickr-time-separator", ":"),
											t = m("flatpickr-hour", {
												"aria-label": w.l10n.hourAriaLabel,
											});
										w.hourElement = t.getElementsByTagName("input")[0];
										var a = m("flatpickr-minute", {
											"aria-label": w.l10n.minuteAriaLabel,
										});
										(w.minuteElement = a.getElementsByTagName("input")[0]),
											(w.hourElement.tabIndex = w.minuteElement.tabIndex = -1),
											(w.hourElement.value = o(
												w.latestSelectedDateObj
													? w.latestSelectedDateObj.getHours()
													: w.config.time_24hr
													? e.hours
													: (function (e) {
															switch (e % 24) {
																case 0:
																case 12:
																	return 12;
																default:
																	return e % 12;
															}
													  })(e.hours)
											)),
											(w.minuteElement.value = o(
												w.latestSelectedDateObj
													? w.latestSelectedDateObj.getMinutes()
													: e.minutes
											)),
											w.hourElement.setAttribute(
												"step",
												w.config.hourIncrement.toString()
											),
											w.minuteElement.setAttribute(
												"step",
												w.config.minuteIncrement.toString()
											),
											w.hourElement.setAttribute(
												"min",
												w.config.time_24hr ? "0" : "1"
											),
											w.hourElement.setAttribute(
												"max",
												w.config.time_24hr ? "23" : "12"
											),
											w.hourElement.setAttribute("maxlength", "2"),
											w.minuteElement.setAttribute("min", "0"),
											w.minuteElement.setAttribute("max", "59"),
											w.minuteElement.setAttribute("maxlength", "2"),
											w.timeContainer.appendChild(t),
											w.timeContainer.appendChild(n),
											w.timeContainer.appendChild(a),
											w.config.time_24hr &&
												w.timeContainer.classList.add("time24hr");
										if (w.config.enableSeconds) {
											w.timeContainer.classList.add("hasSeconds");
											var i = m("flatpickr-second");
											(w.secondElement = i.getElementsByTagName("input")[0]),
												(w.secondElement.value = o(
													w.latestSelectedDateObj
														? w.latestSelectedDateObj.getSeconds()
														: e.seconds
												)),
												w.secondElement.setAttribute(
													"step",
													w.minuteElement.getAttribute("step")
												),
												w.secondElement.setAttribute("min", "0"),
												w.secondElement.setAttribute("max", "59"),
												w.secondElement.setAttribute("maxlength", "2"),
												w.timeContainer.appendChild(
													d("span", "flatpickr-time-separator", ":")
												),
												w.timeContainer.appendChild(i);
										}
										w.config.time_24hr ||
											((w.amPM = d(
												"span",
												"flatpickr-am-pm",
												w.l10n.amPM[
													r(
														(w.latestSelectedDateObj
															? w.hourElement.value
															: w.config.defaultHour) > 11
													)
												]
											)),
											(w.amPM.title = w.l10n.toggleTitle),
											(w.amPM.tabIndex = -1),
											w.timeContainer.appendChild(w.amPM));
										return w.timeContainer;
									})()
								);
							s(w.calendarContainer, "rangeMode", "range" === w.config.mode),
								s(w.calendarContainer, "animate", !0 === w.config.animate),
								s(w.calendarContainer, "multiMonth", w.config.showMonths > 1),
								w.calendarContainer.appendChild(e);
							var i =
								void 0 !== w.config.appendTo &&
								void 0 !== w.config.appendTo.nodeType;
							if (
								(w.config.inline || w.config.static) &&
								(w.calendarContainer.classList.add(
									w.config.inline ? "inline" : "static"
								),
								w.config.inline &&
									(!i && w.element.parentNode
										? w.element.parentNode.insertBefore(
												w.calendarContainer,
												w._input.nextSibling
										  )
										: void 0 !== w.config.appendTo &&
										  w.config.appendTo.appendChild(w.calendarContainer)),
								w.config.static)
							) {
								var l = d("div", "flatpickr-wrapper");
								w.element.parentNode &&
									w.element.parentNode.insertBefore(l, w.element),
									l.appendChild(w.element),
									w.altInput && l.appendChild(w.altInput),
									l.appendChild(w.calendarContainer);
							}
							w.config.static ||
								w.config.inline ||
								(void 0 !== w.config.appendTo
									? w.config.appendTo
									: window.document.body
								).appendChild(w.calendarContainer);
						})(),
					(function () {
						w.config.wrap &&
							["open", "close", "toggle", "clear"].forEach(function (e) {
								Array.prototype.forEach.call(
									w.element.querySelectorAll("[data-" + e + "]"),
									function (n) {
										return P(n, "click", w[e]);
									}
								);
							});
						if (w.isMobile)
							return void (function () {
								var e = w.config.enableTime
									? w.config.noCalendar
										? "time"
										: "datetime-local"
									: "date";
								(w.mobileInput = d(
									"input",
									w.input.className + " flatpickr-mobile"
								)),
									(w.mobileInput.tabIndex = 1),
									(w.mobileInput.type = e),
									(w.mobileInput.disabled = w.input.disabled),
									(w.mobileInput.required = w.input.required),
									(w.mobileInput.placeholder = w.input.placeholder),
									(w.mobileFormatStr =
										"datetime-local" === e
											? "Y-m-d\\TH:i:S"
											: "date" === e
											? "Y-m-d"
											: "H:i:S"),
									w.selectedDates.length > 0 &&
										(w.mobileInput.defaultValue = w.mobileInput.value =
											w.formatDate(w.selectedDates[0], w.mobileFormatStr));
								w.config.minDate &&
									(w.mobileInput.min = w.formatDate(w.config.minDate, "Y-m-d"));
								w.config.maxDate &&
									(w.mobileInput.max = w.formatDate(w.config.maxDate, "Y-m-d"));
								w.input.getAttribute("step") &&
									(w.mobileInput.step = String(w.input.getAttribute("step")));
								(w.input.type = "hidden"),
									void 0 !== w.altInput && (w.altInput.type = "hidden");
								try {
									w.input.parentNode &&
										w.input.parentNode.insertBefore(
											w.mobileInput,
											w.input.nextSibling
										);
								} catch (e) {}
								P(w.mobileInput, "change", function (e) {
									w.setDate(g(e).value, !1, w.mobileFormatStr),
										De("onChange"),
										De("onClose");
								});
							})();
						var e = l(re, 50);
						(w._debouncedChange = l(Y, 300)),
							w.daysContainer &&
								!/iPhone|iPad|iPod/i.test(navigator.userAgent) &&
								P(w.daysContainer, "mouseover", function (e) {
									"range" === w.config.mode && oe(g(e));
								});
						P(w._input, "keydown", ie),
							void 0 !== w.calendarContainer &&
								P(w.calendarContainer, "keydown", ie);
						w.config.inline || w.config.static || P(window, "resize", e);
						void 0 !== window.ontouchstart
							? P(window.document, "touchstart", X)
							: P(window.document, "mousedown", X);
						P(window.document, "focus", X, { capture: !0 }),
							!0 === w.config.clickOpens &&
								(P(w._input, "focus", w.open), P(w._input, "click", w.open));
						void 0 !== w.daysContainer &&
							(P(w.monthNav, "click", xe),
							P(w.monthNav, ["keyup", "increment"], N),
							P(w.daysContainer, "click", me));
						if (
							void 0 !== w.timeContainer &&
							void 0 !== w.minuteElement &&
							void 0 !== w.hourElement
						) {
							var n = function (e) {
								return g(e).select();
							};
							P(w.timeContainer, ["increment"], _),
								P(w.timeContainer, "blur", _, { capture: !0 }),
								P(w.timeContainer, "click", H),
								P([w.hourElement, w.minuteElement], ["focus", "click"], n),
								void 0 !== w.secondElement &&
									P(w.secondElement, "focus", function () {
										return w.secondElement && w.secondElement.select();
									}),
								void 0 !== w.amPM &&
									P(w.amPM, "click", function (e) {
										_(e);
									});
						}
						w.config.allowInput && P(w._input, "blur", ae);
					})(),
					(w.selectedDates.length || w.config.noCalendar) &&
						(w.config.enableTime &&
							F(w.config.noCalendar ? w.latestSelectedDateObj : void 0),
						ye(!1)),
					S();
				var n = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
				!w.isMobile && n && de(), De("onReady");
			})(),
			w
		);
	}
	function T(e, n) {
		for (
			var t = Array.prototype.slice.call(e).filter(function (e) {
					return e instanceof HTMLElement;
				}),
				a = [],
				i = 0;
			i < t.length;
			i++
		) {
			var o = t[i];
			try {
				if (null !== o.getAttribute("data-fp-omit")) continue;
				void 0 !== o._flatpickr &&
					(o._flatpickr.destroy(), (o._flatpickr = void 0)),
					(o._flatpickr = k(o, n || {})),
					a.push(o._flatpickr);
			} catch (e) {
				console.error(e);
			}
		}
		return 1 === a.length ? a[0] : a;
	}
	"undefined" != typeof HTMLElement &&
		"undefined" != typeof HTMLCollection &&
		"undefined" != typeof NodeList &&
		((HTMLCollection.prototype.flatpickr = NodeList.prototype.flatpickr =
			function (e) {
				return T(this, e);
			}),
		(HTMLElement.prototype.flatpickr = function (e) {
			return T([this], e);
		}));
	var I = function (e, n) {
		return "string" == typeof e
			? T(window.document.querySelectorAll(e), n)
			: e instanceof Node
			? T([e], n)
			: T(e, n);
	};
	return (
		(I.defaultConfig = {}),
		(I.l10ns = { en: e({}, i), default: e({}, i) }),
		(I.localize = function (n) {
			I.l10ns.default = e(e({}, I.l10ns.default), n);
		}),
		(I.setDefaults = function (n) {
			I.defaultConfig = e(e({}, I.defaultConfig), n);
		}),
		(I.parseDate = C({})),
		(I.formatDate = b({})),
		(I.compareDates = M),
		"undefined" != typeof jQuery &&
			void 0 !== jQuery.fn &&
			(jQuery.fn.flatpickr = function (e) {
				return T(this, e);
			}),
		(Date.prototype.fp_incr = function (e) {
			return new Date(
				this.getFullYear(),
				this.getMonth(),
				this.getDate() + ("string" == typeof e ? parseInt(e, 10) : e)
			);
		}),
		"undefined" != typeof window && (window.flatpickr = I),
		I
	);
});
