/*!
 * HTML5 export buttons for Buttons and DataTables.
 * © SpryMedia Ltd - datatables.net/license
 *
 * FileSaver.js (1.3.3) - MIT license
 * Copyright © 2016 Eli Grey - http://eligrey.com
 */
!(function (o) {
	var l, n;
	"function" == typeof define && define.amd
		? define(
				["jquery", "datatables.net", "datatables.net-buttons"],
				function (t) {
					return o(t, window, document);
				}
		  )
		: "object" == typeof exports
		? ((l = require("jquery")),
		  (n = function (t, e) {
				e.fn.dataTable || require("datatables.net")(t, e),
					e.fn.dataTable.Buttons || require("datatables.net-buttons")(t, e);
		  }),
		  "undefined" == typeof window
				? (module.exports = function (t, e) {
						return (
							(t = t || window), (e = e || l(t)), n(t, e), o(e, t, t.document)
						);
				  })
				: (n(window, l), (module.exports = o(l, window, window.document))))
		: o(jQuery, window, document);
})(function (S, C, u) {
	"use strict";
	var e,
		o,
		t = S.fn.dataTable;
	function T() {
		return e || C.JSZip;
	}
	function s() {
		return o || C.pdfMake;
	}
	(t.Buttons.pdfMake = function (t) {
		if (!t) return s();
		o = t;
	}),
		(t.Buttons.jszip = function (t) {
			if (!t) return T();
			e = t;
		});
	function k(t) {
		var e = "Sheet1";
		return (e = t.sheetName ? t.sheetName.replace(/[\[\]\*\/\\\?\:]/g, "") : e);
	}
	function c(t, e) {
		function o(t) {
			for (var e = "", o = 0, l = t.length; o < l; o++)
				0 < o && (e += a),
					(e += r ? r + ("" + t[o]).replace(d, p + r) + r : t[o]);
			return e;
		}
		var l = y(e),
			n = t.buttons.exportData(e.exportOptions),
			r = e.fieldBoundary,
			a = e.fieldSeparator,
			d = new RegExp(r, "g"),
			p = void 0 !== e.escapeChar ? e.escapeChar : "\\",
			t = "",
			i = "",
			f = [];
		e.header &&
			(t =
				n.headerStructure
					.map(function (t) {
						return o(
							t.map(function (t) {
								return t ? t.title : "";
							})
						);
					})
					.join(l) + l),
			e.footer &&
				n.footer &&
				(i =
					n.footerStructure
						.map(function (t) {
							return o(
								t.map(function (t) {
									return t ? t.title : "";
								})
							);
						})
						.join(l) + l);
		for (var s = 0, m = n.body.length; s < m; s++) f.push(o(n.body[s]));
		return { str: t + f.join(l) + l + i, rows: f.length };
	}
	function m() {
		var t;
		return (
			-1 !== navigator.userAgent.indexOf("Safari") &&
			-1 === navigator.userAgent.indexOf("Chrome") &&
			-1 === navigator.userAgent.indexOf("Opera") &&
			!!(
				(t = navigator.userAgent.match(/AppleWebKit\/(\d+\.\d+)/)) &&
				1 < t.length &&
				+t[1] < 603.1
			)
		);
	}
	var N = (function (d) {
			var p, i, f, s, m, u, e, c, y, l, t;
			if (
				!(
					void 0 === d ||
					("undefined" != typeof navigator &&
						/MSIE [1-9]\./.test(navigator.userAgent))
				)
			)
				return (
					(t = d.document),
					(p = function () {
						return d.URL || d.webkitURL || d;
					}),
					(i = t.createElementNS("http://www.w3.org/1999/xhtml", "a")),
					(f = "download" in i),
					(s = /constructor/i.test(d.HTMLElement) || d.safari),
					(m = /CriOS\/[\d]+/.test(navigator.userAgent)),
					(u = function (t) {
						(d.setImmediate || d.setTimeout)(function () {
							throw t;
						}, 0);
					}),
					(e = 4e4),
					(c = function (t) {
						setTimeout(function () {
							"string" == typeof t ? p().revokeObjectURL(t) : t.remove();
						}, e);
					}),
					(y = function (t) {
						return /^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(
							t.type
						)
							? new Blob([String.fromCharCode(65279), t], { type: t.type })
							: t;
					}),
					(t = (l = function (t, o, e) {
						e || (t = y(t));
						var l,
							n,
							r = this,
							e = "application/octet-stream" === t.type,
							a = function () {
								for (
									var t = r,
										e = "writestart progress write writeend".split(" "),
										o = void 0,
										l = (e = [].concat(e)).length;
									l--;

								) {
									var n = t["on" + e[l]];
									if ("function" == typeof n)
										try {
											n.call(t, o || t);
										} catch (t) {
											u(t);
										}
								}
							};
						(r.readyState = r.INIT),
							f
								? ((l = p().createObjectURL(t)),
								  setTimeout(function () {
										var t, e;
										(i.href = l),
											(i.download = o),
											(t = i),
											(e = new MouseEvent("click")),
											t.dispatchEvent(e),
											a(),
											c(l),
											(r.readyState = r.DONE);
								  }))
								: (m || (e && s)) && d.FileReader
								? (((n = new FileReader()).onloadend = function () {
										var t = m
											? n.result
											: n.result.replace(
													/^data:[^;]*;/,
													"data:attachment/file;"
											  );
										d.open(t, "_blank") || (d.location.href = t),
											(r.readyState = r.DONE),
											a();
								  }),
								  n.readAsDataURL(t),
								  (r.readyState = r.INIT))
								: ((l = l || p().createObjectURL(t)),
								  (!e && d.open(l, "_blank")) || (d.location.href = l),
								  (r.readyState = r.DONE),
								  a(),
								  c(l));
					}).prototype),
					"undefined" != typeof navigator && navigator.msSaveOrOpenBlob
						? function (t, e, o) {
								return (
									(e = e || t.name || "download"),
									o || (t = y(t)),
									navigator.msSaveOrOpenBlob(t, e)
								);
						  }
						: ((t.abort = function () {}),
						  (t.readyState = t.INIT = 0),
						  (t.WRITING = 1),
						  (t.DONE = 2),
						  (t.error =
								t.onwritestart =
								t.onprogress =
								t.onwrite =
								t.onabort =
								t.onerror =
								t.onwriteend =
									null),
						  function (t, e, o) {
								return new l(t, e || t.name || "download", o);
						  })
				);
		})(
			("undefined" != typeof self && self) ||
				(void 0 !== C && C) ||
				this.content
		),
		y =
			((t.fileSave = N),
			function (t) {
				return (
					t.newline || (navigator.userAgent.match(/Windows/) ? "\r\n" : "\n")
				);
			});
	function O(t) {
		for (
			var e = "A".charCodeAt(0), o = "Z".charCodeAt(0) - e + 1, l = "";
			0 <= t;

		)
			(l = String.fromCharCode((t % o) + e) + l), (t = Math.floor(t / o) - 1);
		return l;
	}
	try {
		var z,
			E = new XMLSerializer();
	} catch (t) {}
	function A(t, e, o) {
		var l = t.createElement(e);
		return (
			o &&
				(o.attr && S(l).attr(o.attr),
				o.children &&
					S.each(o.children, function (t, e) {
						l.appendChild(e);
					}),
				null !== o.text) &&
				void 0 !== o.text &&
				l.appendChild(t.createTextNode(o.text)),
			l
		);
	}
	function D(t, e, o, l, n) {
		var r = S("mergeCells", t);
		r[0].appendChild(
			A(t, "mergeCell", {
				attr: { ref: O(o) + e + ":" + O(o + n - 1) + (e + l - 1) },
			})
		),
			r.attr("count", parseFloat(r.attr("count")) + 1);
	}
	var R = {
			"_rels/.rels":
				'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/></Relationships>',
			"xl/_rels/workbook.xml.rels":
				'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/><Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/></Relationships>',
			"[Content_Types].xml":
				'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types"><Default Extension="xml" ContentType="application/xml" /><Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml" /><Default Extension="jpeg" ContentType="image/jpeg" /><Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml" /><Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml" /><Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml" /></Types>',
			"xl/workbook.xml":
				'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><fileVersion appName="xl" lastEdited="5" lowestEdited="5" rupBuild="24816"/><workbookPr showInkAnnotation="0" autoCompressPictures="0"/><bookViews><workbookView xWindow="0" yWindow="0" windowWidth="25600" windowHeight="19020" tabRatio="500"/></bookViews><sheets><sheet name="Sheet1" sheetId="1" r:id="rId1"/></sheets><definedNames/></workbook>',
			"xl/worksheets/sheet1.xml":
				'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><sheetData/><mergeCells count="0"/></worksheet>',
			"xl/styles.xml":
				'<?xml version="1.0" encoding="UTF-8"?><styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><numFmts count="6"><numFmt numFmtId="164" formatCode="[$$-409]#,##0.00;-[$$-409]#,##0.00"/><numFmt numFmtId="165" formatCode="&quot;£&quot;#,##0.00"/><numFmt numFmtId="166" formatCode="[$€-2] #,##0.00"/><numFmt numFmtId="167" formatCode="0.0%"/><numFmt numFmtId="168" formatCode="#,##0;(#,##0)"/><numFmt numFmtId="169" formatCode="#,##0.00;(#,##0.00)"/></numFmts><fonts count="5" x14ac:knownFonts="1"><font><sz val="11" /><name val="Calibri" /></font><font><sz val="11" /><name val="Calibri" /><color rgb="FFFFFFFF" /></font><font><sz val="11" /><name val="Calibri" /><b /></font><font><sz val="11" /><name val="Calibri" /><i /></font><font><sz val="11" /><name val="Calibri" /><u /></font></fonts><fills count="6"><fill><patternFill patternType="none" /></fill><fill><patternFill patternType="none" /></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD9D9D9" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD99795" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6efce" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6cfef" /><bgColor indexed="64" /></patternFill></fill></fills><borders count="2"><border><left /><right /><top /><bottom /><diagonal /></border><border diagonalUp="false" diagonalDown="false"><left style="thin"><color auto="1" /></left><right style="thin"><color auto="1" /></right><top style="thin"><color auto="1" /></top><bottom style="thin"><color auto="1" /></bottom><diagonal /></border></borders><cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" /></cellStyleXfs><cellXfs count="68"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="left"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="center"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="right"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="fill"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment textRotation="90"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment wrapText="1"/></xf><xf numFmtId="9"   fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="164" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="165" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="166" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="167" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="168" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="169" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="3" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="4" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="1" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="2" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="14" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/></cellXfs><cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0" /></cellStyles><dxfs count="0" /><tableStyles count="0" defaultTableStyle="TableStyleMedium9" defaultPivotStyle="PivotStyleMedium4" /></styleSheet>',
		},
		_ = [
			{
				match: /^\-?\d+\.\d%$/,
				style: 60,
				fmt: function (t) {
					return t / 100;
				},
			},
			{
				match: /^\-?\d+\.?\d*%$/,
				style: 56,
				fmt: function (t) {
					return t / 100;
				},
			},
			{ match: /^\-?\$[\d,]+.?\d*$/, style: 57 },
			{ match: /^\-?£[\d,]+.?\d*$/, style: 58 },
			{ match: /^\-?€[\d,]+.?\d*$/, style: 59 },
			{ match: /^\-?\d+$/, style: 65 },
			{ match: /^\-?\d+\.\d{2}$/, style: 66 },
			{
				match: /^\([\d,]+\)$/,
				style: 61,
				fmt: function (t) {
					return -1 * t.replace(/[\(\)]/g, "");
				},
			},
			{
				match: /^\([\d,]+\.\d{2}\)$/,
				style: 62,
				fmt: function (t) {
					return -1 * t.replace(/[\(\)]/g, "");
				},
			},
			{ match: /^\-?[\d,]+$/, style: 63 },
			{ match: /^\-?[\d,]+\.\d{2}$/, style: 64 },
			{
				match: /^(19\d\d|[2-9]\d\d\d)\-(0\d|1[012])\-[0123][\d]$/,
				style: 67,
				fmt: function (t) {
					return Math.round(25569 + Date.parse(t) / 864e5);
				},
			},
		];
	return (
		(t.ext.buttons.copyHtml5 = {
			className: "buttons-copy buttons-html5",
			text: function (t) {
				return t.i18n("buttons.copy", "Copy");
			},
			action: function (t, e, o, l, n) {
				var r = c(e, l),
					a = e.buttons.exportInfo(l),
					d = y(l),
					p = r.str,
					i = S("<div/>").css({
						height: 1,
						width: 1,
						overflow: "hidden",
						position: "fixed",
						top: 0,
						left: 0,
					}),
					d =
						(a.title && (p = a.title + d + d + p),
						a.messageTop && (p = a.messageTop + d + d + p),
						a.messageBottom && (p = p + d + d + a.messageBottom),
						l.customize && (p = l.customize(p, l, e)),
						S("<textarea readonly/>").val(p).appendTo(i));
				if (u.queryCommandSupported("copy")) {
					i.appendTo(e.table().container()), d[0].focus(), d[0].select();
					try {
						var f = u.execCommand("copy");
						if ((i.remove(), f))
							return (
								l.copySuccess &&
									e.buttons.info(
										e.i18n("buttons.copyTitle", "Copy to clipboard"),
										e.i18n(
											"buttons.copySuccess",
											{
												1: "Copied one row to clipboard",
												_: "Copied %d rows to clipboard",
											},
											r.rows
										),
										2e3
									),
								void n()
							);
					} catch (t) {}
				}
				function s() {
					m.off("click.buttons-copy"),
						S(u).off(".buttons-copy"),
						e.buttons.info(!1);
				}
				var a = S(
						"<span>" +
							e.i18n(
								"buttons.copyKeys",
								"Press <i>ctrl</i> or <i>⌘</i> + <i>C</i> to copy the table data<br>to your system clipboard.<br><br>To cancel, click this message or press escape."
							) +
							"</span>"
					).append(i),
					m =
						(e.buttons.info(
							e.i18n("buttons.copyTitle", "Copy to clipboard"),
							a,
							0
						),
						d[0].focus(),
						d[0].select(),
						S(a).closest(".dt-button-info"));
				m.on("click.buttons-copy", function () {
					s(), n();
				}),
					S(u)
						.on("keydown.buttons-copy", function (t) {
							27 === t.keyCode && (s(), n());
						})
						.on("copy.buttons-copy cut.buttons-copy", function () {
							s(), n();
						});
			},
			async: 100,
			copySuccess: !0,
			exportOptions: {},
			fieldSeparator: "\t",
			fieldBoundary: "",
			header: !0,
			footer: !0,
			title: "*",
			messageTop: "*",
			messageBottom: "*",
		}),
		(t.ext.buttons.csvHtml5 = {
			bom: !1,
			className: "buttons-csv buttons-html5",
			available: function () {
				return void 0 !== C.FileReader && C.Blob;
			},
			text: function (t) {
				return t.i18n("buttons.csv", "CSV");
			},
			action: function (t, e, o, l, n) {
				var r = c(e, l).str,
					a = e.buttons.exportInfo(l),
					d = l.charset;
				l.customize && (r = l.customize(r, l, e)),
					(d =
						!1 !== d
							? (d = d || u.characterSet || u.charset) && ";charset=" + d
							: ""),
					l.bom && (r = String.fromCharCode(65279) + r),
					N(new Blob([r], { type: "text/csv" + d }), a.filename, !0),
					n();
			},
			async: 100,
			filename: "*",
			extension: ".csv",
			exportOptions: { escapeExcelFormula: !0 },
			fieldSeparator: ",",
			fieldBoundary: '"',
			escapeChar: '"',
			charset: null,
			header: !0,
			footer: !0,
		}),
		(t.ext.buttons.excelHtml5 = {
			className: "buttons-excel buttons-html5",
			available: function () {
				return void 0 !== C.FileReader && void 0 !== T() && !m() && E;
			},
			text: function (t) {
				return t.i18n("buttons.excel", "Excel");
			},
			action: function (t, e, o, f, l) {
				function n(t) {
					return (t = R[t]), S.parseXML(t);
				}
				function r(t) {
					m = A(c, "row", { attr: { r: (s = u + 1) } });
					for (var e = 0, o = t.length; e < o; e++) {
						var l = O(e) + "" + s,
							n = null;
						if (null === t[e] || void 0 === t[e] || "" === t[e]) {
							if (!0 !== f.createEmptyCells) continue;
							t[e] = "";
						}
						var r = t[e];
						t[e] = "function" == typeof t[e].trim ? t[e].trim() : t[e];
						for (var a = 0, d = _.length; a < d; a++) {
							var p = _[a];
							if (t[e].match && !t[e].match(/^0\d+/) && t[e].match(p.match)) {
								var i = t[e].replace(/[^\d\.\-]/g, "");
								p.fmt && (i = p.fmt(i)),
									(n = A(c, "c", {
										attr: { r: l, s: p.style },
										children: [A(c, "v", { text: i })],
									}));
								break;
							}
						}
						(n =
							n ||
							("number" == typeof t[e] ||
							(t[e].match &&
								t[e].match(/^-?\d+(\.\d+)?([eE]\-?\d+)?$/) &&
								!t[e].match(/^0\d+/))
								? A(c, "c", {
										attr: { t: "n", r: l },
										children: [A(c, "v", { text: t[e] })],
								  })
								: ((r = r.replace
										? r.replace(/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F-\x9F]/g, "")
										: r),
								  A(c, "c", {
										attr: { t: "inlineStr", r: l },
										children: {
											row: A(c, "is", {
												children: {
													row: A(c, "t", {
														text: r,
														attr: { "xml:space": "preserve" },
													}),
												},
											}),
										},
								  })))),
							m.appendChild(n);
					}
					y.appendChild(m), u++;
				}
				function a(t) {
					t.forEach(function (t) {
						r(
							t.map(function (t) {
								return t ? t.title : "";
							})
						),
							S("row:last c", c).attr("s", "2"),
							t.forEach(function (t, e) {
								t &&
									(1 < t.colSpan || 1 < t.rowSpan) &&
									D(c, u, e, t.rowSpan, t.colSpan);
							});
					});
				}
				var d,
					s,
					m,
					u = 0,
					c = n("xl/worksheets/sheet1.xml"),
					y = c.getElementsByTagName("sheetData")[0],
					p = {
						_rels: { ".rels": n("_rels/.rels") },
						xl: {
							_rels: { "workbook.xml.rels": n("xl/_rels/workbook.xml.rels") },
							"workbook.xml": n("xl/workbook.xml"),
							"styles.xml": n("xl/styles.xml"),
							worksheets: { "sheet1.xml": c },
						},
						"[Content_Types].xml": n("[Content_Types].xml"),
					},
					i = e.buttons.exportData(f.exportOptions),
					I = e.buttons.exportInfo(f);
				I.title &&
					(r([I.title]),
					D(c, u, 0, 1, i.header.length),
					S("row:last c", c).attr("s", "51")),
					I.messageTop && (r([I.messageTop]), D(c, u, 0, 1, i.header.length)),
					f.header && a(i.headerStructure);
				for (var F = u, x = 0, h = i.body.length; x < h; x++) r(i.body[x]);
				(d = u),
					f.footer && i.footer && a(i.footerStructure),
					I.messageBottom &&
						(r([I.messageBottom]), D(c, u, 0, 1, i.header.length));
				var b = A(c, "cols");
				S("worksheet", c).prepend(b);
				for (var g = 0, v = i.header.length; g < v; g++)
					b.appendChild(
						A(c, "col", {
							attr: {
								min: g + 1,
								max: g + 1,
								width: (function (t, e) {
									var o = t.header[e].length;
									t.footer &&
										t.footer[e] &&
										t.footer[e].length > o &&
										(o = t.footer[e].length);
									for (var l = 0, n = t.body.length; l < n; l++) {
										var r,
											a = t.body[l][e];
										if (
											40 <
											(o =
												o <
												(r = (
													-1 !==
													(a = null != a ? a.toString() : "").indexOf("\n")
														? ((r = a.split("\n")).sort(function (t, e) {
																return e.length - t.length;
														  }),
														  r[0])
														: a
												).length)
													? r
													: o)
										)
											return 54;
									}
									return 6 < (o *= 1.35) ? o : 6;
								})(i, g),
								customWidth: 1,
							},
						})
					);
				var w = p.xl["workbook.xml"];
				S("sheets sheet", w).attr("name", k(f)),
					f.autoFilter &&
						(S("mergeCells", c).before(
							A(c, "autoFilter", {
								attr: { ref: "A" + F + ":" + O(i.header.length - 1) + d },
							})
						),
						S("definedNames", w).append(
							A(w, "definedName", {
								attr: {
									name: "_xlnm._FilterDatabase",
									localSheetId: "0",
									hidden: 1,
								},
								text:
									"'" +
									k(f).replace(/'/g, "''") +
									"'!$A$" +
									F +
									":" +
									O(i.header.length - 1) +
									d,
							})
						)),
					f.customize && f.customize(p, f, e),
					0 === S("mergeCells", c).children().length &&
						S("mergeCells", c).remove();
				var w = new (T())(),
					F = {
						compression: "DEFLATE",
						type: "blob",
						mimeType:
							"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
					},
					B =
						(!(function f(s, t) {
							void 0 === z &&
								(z =
									-1 ===
									E.serializeToString(
										new C.DOMParser().parseFromString(
											R["xl/worksheets/sheet1.xml"],
											"text/xml"
										)
									).indexOf("xmlns:r")),
								S.each(t, function (t, e) {
									if (S.isPlainObject(e)) f(s.folder(t), e);
									else {
										if (z) {
											for (
												var o,
													l = e.childNodes[0],
													n = [],
													r = l.attributes.length - 1;
												0 <= r;
												r--
											) {
												var a = l.attributes[r].nodeName,
													d = l.attributes[r].nodeValue;
												-1 !== a.indexOf(":") &&
													(n.push({ name: a, value: d }), l.removeAttribute(a));
											}
											for (r = 0, o = n.length; r < o; r++) {
												var p = e.createAttribute(
													n[r].name.replace(":", "_dt_b_namespace_token_")
												);
												(p.value = n[r].value), l.setAttributeNode(p);
											}
										}
										var i = E.serializeToString(e),
											i = (i = z
												? (i = (i =
														-1 === i.indexOf("<?xml")
															? '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' +
															  i
															: i).replace(
														/_dt_b_namespace_token_/g,
														":"
												  )).replace(/xmlns:NS[\d]+="" NS[\d]+:/g, "")
												: i).replace(
												/<([^<>]*?) xmlns=""([^<>]*?)>/g,
												"<$1 $2>"
											);
										s.file(t, i);
									}
								});
						})(w, p),
						I.filename);
				175 < B && (B = B.substr(0, 175)),
					f.customizeZip && f.customizeZip(w, i, B),
					w.generateAsync
						? w.generateAsync(F).then(function (t) {
								N(t, B), l();
						  })
						: (N(w.generate(F), B), l());
			},
			async: 100,
			filename: "*",
			extension: ".xlsx",
			exportOptions: {},
			header: !0,
			footer: !0,
			title: "*",
			messageTop: "*",
			messageBottom: "*",
			createEmptyCells: !1,
			autoFilter: !1,
			sheetName: "",
		}),
		(t.ext.buttons.pdfHtml5 = {
			className: "buttons-pdf buttons-html5",
			available: function () {
				return void 0 !== C.FileReader && s();
			},
			text: function (t) {
				return t.i18n("buttons.pdf", "PDF");
			},
			action: function (t, e, o, l, n) {
				var r = e.buttons.exportData(l.exportOptions),
					a = e.buttons.exportInfo(l),
					d = [];
				l.header &&
					r.headerStructure.forEach(function (t) {
						d.push(
							t.map(function (t) {
								return t
									? {
											text: t.title,
											colSpan: t.colspan,
											rowSpan: t.rowspan,
											style: "tableHeader",
									  }
									: {};
							})
						);
					});
				for (var p = 0, i = r.body.length; p < i; p++)
					d.push(
						r.body[p].map(function (t) {
							return {
								text: null == t ? "" : "string" == typeof t ? t : t.toString(),
							};
						})
					);
				l.footer &&
					r.footerStructure.forEach(function (t) {
						d.push(
							t.map(function (t) {
								return t
									? {
											text: t.title,
											colSpan: t.colspan,
											rowSpan: t.rowspan,
											style: "tableHeader",
									  }
									: {};
							})
						);
					});
				var f = {
						pageSize: l.pageSize,
						pageOrientation: l.orientation,
						content: [
							{
								style: "table",
								table: {
									headerRows: r.headerStructure.length,
									footerRows: r.footerStructure.length,
									body: d,
								},
								layout: {
									hLineWidth: function (t, e) {
										return 0 === t || t === e.table.body.length ? 0 : 0.5;
									},
									vLineWidth: function () {
										return 0;
									},
									hLineColor: function (t, e) {
										return t === e.table.headerRows ||
											t === e.table.body.length - e.table.footerRows
											? "#333"
											: "#ddd";
									},
									fillColor: function (t) {
										return t < r.headerStructure.length
											? "#fff"
											: t % 2 == 0
											? "#f3f3f3"
											: null;
									},
									paddingTop: function () {
										return 5;
									},
									paddingBottom: function () {
										return 5;
									},
								},
							},
						],
						styles: {
							tableHeader: { bold: !0, fontSize: 11, alignment: "center" },
							tableFooter: { bold: !0, fontSize: 11 },
							table: { margin: [0, 5, 0, 5] },
							title: { alignment: "center", fontSize: 13 },
							message: {},
						},
						defaultStyle: { fontSize: 10 },
					},
					e =
						(a.messageTop &&
							f.content.unshift({
								text: a.messageTop,
								style: "message",
								margin: [0, 0, 0, 12],
							}),
						a.messageBottom &&
							f.content.push({
								text: a.messageBottom,
								style: "message",
								margin: [0, 0, 0, 12],
							}),
						a.title &&
							f.content.unshift({
								text: a.title,
								style: "title",
								margin: [0, 0, 0, 12],
							}),
						l.customize && l.customize(f, l, e),
						s().createPdf(f));
				"open" !== l.download || m() ? e.download(a.filename) : e.open(), n();
			},
			async: 100,
			title: "*",
			filename: "*",
			extension: ".pdf",
			exportOptions: {},
			orientation: "portrait",
			pageSize:
				"en-US" === navigator.language || "en-CA" === navigator.language
					? "LETTER"
					: "A4",
			header: !0,
			footer: !0,
			messageTop: "*",
			messageBottom: "*",
			customize: null,
			download: "download",
		}),
		t
	);
});
