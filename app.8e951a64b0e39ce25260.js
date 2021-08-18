 $(document).ready(function() {

 	phoneMask();

 	 function phoneMask() {
		  // $("input[type='tel']").inputmask({
		    // mask: '+7 (999) 999-99-99',
		    // placeholder: '_',
		    // greedy: false,
		    // showMaskOnFocus: false,
		    // showMaskOnHover: false,
		    // inputmode: 'tel',
		  // })
            let phone = $("input[type='tel']");
           
            //Маска по умолчанию
            phone.each(function() {

            	$(this).inputmask({
	                mask: '+7 (999) 999-99-99',
	                placeholder: '_',
	                greedy: false,
	                showMaskOnFocus: false,
	                showMaskOnHover: false,
	                inputmode: 'tel',
	            });
            })
            
            // phone.each(function() {
            //     var self = $(this);
            //      let flag = 1;
            //      $(this).on('focus', function(){
                
            //         self.on("keyup", function(event) {
                        
            //             //Получаем значение поле без маски
            //             let value = self.inputmask("unmaskedvalue");
                        
            //             console.log('flag before '+flag);
            //             if (value.length === 1 && value === "+") {
            //                 self.val('');
            //                 self.inputmask("+7 (999) 999-99-99");
            //             } else if (value.length === 1 && value === "7") {
            //                 if(flag === 1) {
            //                     self.val('');
            //                     self.inputmask("+7 (999) 999-99-99");
            //                     flag = 0;
            //                 }
            //             } else if (value.length === 1 && value === "8") {
            //                 if(flag === 1) {
            //                     self.val('');
            //                     self.inputmask("+7 (999) 999-99-99");
            //                     flag = 0;
            //                 }
            //             }

            //             if (value === "") { 
            //                 self.inputmask('remove').val("");
            //                 self.inputmask("+7 (999) 999-99-99");
            //                 flag = 1
            //             };

            //             console.log(value);
            //             console.log(flag);
            //         });
            //     });
            // })
          

            
		}


  })

! function(t) {
    function e(e) {
        for (var n, i, u = e[0], a = e[1], c = e[2], f = 0, d = []; f < u.length; f++) i = u[f], Object.prototype.hasOwnProperty.call(s, i) && s[i] && d.push(s[i][0]), s[i] = 0;
        for (n in a) Object.prototype.hasOwnProperty.call(a, n) && (t[n] = a[n]);
        for (l && l(e); d.length;) d.shift()();
        return o.push.apply(o, c || []), r()
    }

    function r() {
        for (var t, e = 0; e < o.length; e++) {
            for (var r = o[e], n = !0, u = 1; u < r.length; u++) {
                var a = r[u];
                0 !== s[a] && (n = !1)
            }
            n && (o.splice(e--, 1), t = i(i.s = r[0]))
        }
        return t
    }
    var n = {},
        s = {
            0: 0
        },
        o = [];

    function i(e) {
        if (n[e]) return n[e].exports;
        var r = n[e] = {
            i: e,
            l: !1,
            exports: {}
        };
        return t[e].call(r.exports, r, r.exports, i), r.l = !0, r.exports
    }
    i.m = t, i.c = n, i.d = function(t, e, r) {
        i.o(t, e) || Object.defineProperty(t, e, {
            enumerable: !0,
            get: r
        })
    }, i.r = function(t) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(t, "__esModule", {
            value: !0
        })
    }, i.t = function(t, e) {
        if (1 & e && (t = i(t)), 8 & e) return t;
        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
        var r = Object.create(null);
        if (i.r(r), Object.defineProperty(r, "default", {
                enumerable: !0,
                value: t
            }), 2 & e && "string" != typeof t)
            for (var n in t) i.d(r, n, function(e) {
                return t[e]
            }.bind(null, n));
        return r
    }, i.n = function(t) {
        var e = t && t.__esModule ? function() {
            return t.default
        } : function() {
            return t
        };
        return i.d(e, "a", e), e
    }, i.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, i.p = "/";
    var u = window.webpackJsonp = window.webpackJsonp || [],
        a = u.push.bind(u);
    u.push = e, u = u.slice();
    for (var c = 0; c < u.length; c++) e(u[c]);
    var l = a;
    o.push([7, 1, 2]), r()
}([, , function(t, e, r) {
    "use strict";
    r.d(e, "a", (function() {
        return o
    }));
    var n = r(3),
        s = r(5);

    function o() {
        return n.a.init(), s.a.init(), "The main application is initiated"
    }
}, function(t, e, r) {
    "use strict";
    (function(t) {
        r.d(e, "a", (function() {
            return n
        }));
        var n, s = r(4);
        ! function(e) {
            e.init = function() {
                // t("*[type=tel]").inputmask("+7 (999) 999-99-99"), new s.a
            }
        }(n || (n = {}))
    }).call(this, r(0))
}, function(t, e, r) {
    "use strict";
    (function(t) {
        function r(t) {
            return (r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
                return typeof t
            } : function(t) {
                return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
            })(t)
        }
        var n = function() {
            function e(e) {
                var r = this;
                if (this.config = {
                        target: "form .btn-submit",
                        defaultClass: {
                            prefix: "cst-",
                            errorClass: "error",
                            validClass: "valid",
                            dirtyClass: "dirty"
                        },
                        emptyMsg: "Пожалуйста, заполните это поле",
                        types: {
                            tel: {
                                messages: {
                                    errorMsg: "Введите корректный номер"
                                },
                                handler: function(t) {
                                    var e = t.value;
                                    return /\+\d \(\d{3}\) \d{3}-\d{2}-\d{2}/i.test(e)
                                }
                            },
                            email: {
                                messages: {
                                    errorMsg: "Введите корректный email"
                                },
                                handler: function(t) {
                                    var e = t.value;
                                    return /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i.test(e)
                                }
                            },
                            password: {
                                messages: {
                                    errorMsg: "Пароли не совпадают"
                                },
                                handler: function(e) {
                                    console.log;
                                    t(e).closest("form").find('[data-bind="' + e.dataset.bind + '"]');
                                    return t(e).closest("form").find('input[type="password"][data-type="retryPassword"]').trigger("blur"), !0
                                }
                            },
                            retryPassword: {
                                messages: {
                                    errorMsg: "Пароли не совпадают"
                                },
                                handler: function(e) {
                                    var r = t(e).closest("form").find('[data-bind="' + e.dataset.bind + '"]');
                                    t(e).closest("form").find('input[type="password"]:not([data-type="retryPassword"])'), r.toArray().every((function(t) {
                                        return t.value === r[0].value
                                    }));
                                    return r.toArray().every((function(t) {
                                        return t.value === r[0].value
                                    }))
                                }
                            }
                        }
                    }, e && function t(e) {
                        var r, n;
                        var o = [];
                        for (var i = 1; i < arguments.length; i++) o[i - 1] = arguments[i];
                        if (!o.length) return !1;
                        var u = o.shift();
                        if (s(e) && s(u))
                            for (var a in u) s(u[a]) ? (e[a] || Object.assign(e, ((r = {})[a] = {}, r)), t(e[a], u[a])) : Object.assign(e, ((n = {})[a] = u[a], n));
                        return !0
                    }(this.config, e), !this.config.target) throw new Error("can't set target options");
                var n = t(this.config.target);
                "FORM" === n.prop("tagName") ? n.submit((function(t) {
                    return r.checkFormStatus(t)
                })) : n.click((function(t) {
                    return r.checkFormStatus(t)
                })), n.closest("form").find("input:required, textarea:required").blur((function(t) {
                    return r.checker(t.currentTarget)
                })).each((function(t, e) {
                    e.setCustomValidity(r.config.emptyMsg)
                })), n.closest("form").find("input, textarea").blur((function(t) {
                    return t.currentTarget.classList.add(r.getStatusClass(t.currentTarget, "dirtyClass"))
                }))
            }
            return e.prototype.checker = function(t) {
                t.required && t.value && this.config.types[this.getType(t)] && this.config.types[this.getType(t)].handler ? this.config.types[this.getType(t)].handler(t) ? this.validAct(t) : this.errorAct(t) : t.required && (t.value ? this.validAct(t) : this.errorAct(t))
            }, e.prototype.checkFormStatus = function(e) {
                var r = this,
                    n = t(e.currentTarget).closest("form");
                if (n.find("input, textarea").each((function(t, e) {
                        r.checker(e)
                    })), n.find(".has-error").length) return !1
            }, e.prototype.validAct = function(t) {
                t.classList.remove(this.getStatusClass(t, "errorClass")), t.classList.add(this.getStatusClass(t, "validClass")), t.setCustomValidity(""), t.onkeyup = ""
            }, e.prototype.errorAct = function(t) {
                var e = this;
                t.classList.remove(this.getStatusClass(t, "validClass")), t.classList.contains(this.getStatusClass(t, "errorClass")) ? t.validationMessage !== (t.value ? this.getErrMsg(t) : this.config.emptyMsg) && (t.setCustomValidity(t.value ? this.getErrMsg(t) : this.config.emptyMsg), console.log(t.value ? this.getErrMsg(t) : this.config.emptyMsg)) : (t.classList.add(this.getStatusClass(t, "errorClass")), t.onkeyup = function(t) {
                    return e.checker(t.currentTarget)
                })
            }, e.prototype.getErrMsg = function(t) {
                return t.dataset.errorMsg ? t.dataset.errorMsg : this.config.types[this.getType(t)] && this.config.types[this.getType(t)].messages && this.config.types[this.getType(t)].messages.errorMsg ? this.config.types[this.getType(t)].messages.errorMsg : this.config.emptyMsg
            }, e.prototype.getStatusClass = function(t, e) {
                return this.getPrefix(t) + (t.dataset[e] ? t.dataset[e] : this.config.types[this.getType(t)] && this.config.types[this.getType(t)].classes && this.config.types[this.getType(t)].classes[e] ? this.config.types[this.getType(t)].classes[e] : this.config.defaultClass[e])
            }, e.prototype.getPrefix = function(t) {
                return t.dataset.prefix ? t.dataset.prefix : this.config.types[this.getType(t)] && this.config.types[this.getType(t)].classes && this.config.types[this.getType(t)].classes.prefix ? this.config.types[this.getType(t)].classes.prefix : this.config.defaultClass.prefix ? this.config.defaultClass.prefix : ""
            }, e.prototype.getType = function(t) {
                return t.dataset.type ? t.dataset.type : t.type
            }, e
        }();

        function s(t) {
            return t && "object" === r(t) && !Array.isArray(t)
        }
        e.a = n
    }).call(this, r(0))
}, function(t, e, r) {
    "use strict";
    (function(t) {
        var n;
        r.d(e, "a", (function() {
                return n
            })),
            function(e) {
                function r() {
                    window.scrollY > 200 ? t("header").addClass("sticky") : t("header").removeClass("sticky")
                }
                e.init = function() {
                    if (window.addEventListener("scroll", r), r(), t("#mobile-menu").length) {
                        t("#mobile-menu").mmenu({
                            extensions: ["pagedim-black", "shadow-page"],
                            navbars: [document.querySelector(".header-mobile__auth-wrapper") ? {
                                position: "top",
                                content: ['\n                        <div class="header-mobile__auth">\n                        ' + document.querySelector(".header-mobile__auth-wrapper").innerHTML + "\n                       </div>\n                       "]
                            } : {}, {
                                position: "bottom",
                                content: ["" + (document.querySelector(".header-mobile__tel") ? document.querySelector(".header-mobile__tel").innerHTML : "")]
                            }],
                            iconbar: {
                                add: !0,
                                top: [].map.call(document.querySelectorAll(".icon-top li"), (function(t) {
                                    return t.innerHTML
                                })),
                                bottom: [].map.call(document.querySelectorAll(".icon-bottom li"), (function(t) {
                                    return t.innerHTML
                                }))
                            }
                        }, {
                            offCanvas: {
                                pageSelector: "#page"
                            }
                        }), document.querySelector(".icon-bottom") && t(document.querySelector(".icon-bottom")).remove(), document.querySelector(".icon-top") && t(document.querySelector(".icon-top")).remove(), document.querySelector(".header-mobile__tel") && t(document.querySelector(".header-mobile__tel")).remove(), document.querySelector(".header-mobile__auth-wrapper") && (t(document.querySelector(".header-mobile__auth-wrapper")).remove(), t(".header-mobile__menu").addClass("is-auth"));
                        var e = t("#mobile-menu").data("mmenu");
                        e.bind("open:start", (function() {
                            t(".hamburger").addClass("event-none"), setTimeout((function() {
                                t(".hamburger").addClass("is-active")
                            }), 0)
                        })), e.bind("open:finish", (function() {
                            t(".hamburger").removeClass("event-none")
                        })), e.bind("close:start", (function() {
                            t(".hamburger").addClass("event-none"), setTimeout((function() {
                                t(".hamburger").removeClass("is-active")
                            }), 0)
                        })), e.bind("close:finish", (function() {
                            t(".hamburger").removeClass("event-none")
                        })), t(".hamburger").click((function(r) {
                            t(r.currentTarget).toggleClass("is-active"), t(r.currentTarget).hasClass("is-active") ? e.open() : e.close()
                        }))
                    }
                }
            }(n || (n = {}))
    }).call(this, r(0))
}, , function(t, e, r) {
    "use strict";
    r.r(e),
        function(t) {
            r(9), r(10), r(11), r(12), r(13), r(14), r(15), r(16), r(17), r(18), r(19), r(20), r(21), r(22), r(23), r(24), r(25);
            var e = r(2);
            console.info(Object(e.a)()), window.$ = t
        }.call(this, r(0))
}, , , function(t, e, r) {}, function(t, e, r) {}, , , , , function(t, e, r) {}]);

