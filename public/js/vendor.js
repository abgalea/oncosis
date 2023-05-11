/*! Select2 4.0.3 | https://github.com/select2/select2/blob/master/LICENSE.md */!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b=function(){if(a&&a.fn&&a.fn.select2&&a.fn.select2.amd)var b=a.fn.select2.amd;var b;return function(){if(!b||!b.requirejs){b?c=b:b={};var a,c,d;!function(b){function e(a,b){return u.call(a,b)}function f(a,b){var c,d,e,f,g,h,i,j,k,l,m,n=b&&b.split("/"),o=s.map,p=o&&o["*"]||{};if(a&&"."===a.charAt(0))if(b){for(a=a.split("/"),g=a.length-1,s.nodeIdCompat&&w.test(a[g])&&(a[g]=a[g].replace(w,"")),a=n.slice(0,n.length-1).concat(a),k=0;k<a.length;k+=1)if(m=a[k],"."===m)a.splice(k,1),k-=1;else if(".."===m){if(1===k&&(".."===a[2]||".."===a[0]))break;k>0&&(a.splice(k-1,2),k-=2)}a=a.join("/")}else 0===a.indexOf("./")&&(a=a.substring(2));if((n||p)&&o){for(c=a.split("/"),k=c.length;k>0;k-=1){if(d=c.slice(0,k).join("/"),n)for(l=n.length;l>0;l-=1)if(e=o[n.slice(0,l).join("/")],e&&(e=e[d])){f=e,h=k;break}if(f)break;!i&&p&&p[d]&&(i=p[d],j=k)}!f&&i&&(f=i,h=j),f&&(c.splice(0,h,f),a=c.join("/"))}return a}function g(a,c){return function(){var d=v.call(arguments,0);return"string"!=typeof d[0]&&1===d.length&&d.push(null),n.apply(b,d.concat([a,c]))}}function h(a){return function(b){return f(b,a)}}function i(a){return function(b){q[a]=b}}function j(a){if(e(r,a)){var c=r[a];delete r[a],t[a]=!0,m.apply(b,c)}if(!e(q,a)&&!e(t,a))throw new Error("No "+a);return q[a]}function k(a){var b,c=a?a.indexOf("!"):-1;return c>-1&&(b=a.substring(0,c),a=a.substring(c+1,a.length)),[b,a]}function l(a){return function(){return s&&s.config&&s.config[a]||{}}}var m,n,o,p,q={},r={},s={},t={},u=Object.prototype.hasOwnProperty,v=[].slice,w=/\.js$/;o=function(a,b){var c,d=k(a),e=d[0];return a=d[1],e&&(e=f(e,b),c=j(e)),e?a=c&&c.normalize?c.normalize(a,h(b)):f(a,b):(a=f(a,b),d=k(a),e=d[0],a=d[1],e&&(c=j(e))),{f:e?e+"!"+a:a,n:a,pr:e,p:c}},p={require:function(a){return g(a)},exports:function(a){var b=q[a];return"undefined"!=typeof b?b:q[a]={}},module:function(a){return{id:a,uri:"",exports:q[a],config:l(a)}}},m=function(a,c,d,f){var h,k,l,m,n,s,u=[],v=typeof d;if(f=f||a,"undefined"===v||"function"===v){for(c=!c.length&&d.length?["require","exports","module"]:c,n=0;n<c.length;n+=1)if(m=o(c[n],f),k=m.f,"require"===k)u[n]=p.require(a);else if("exports"===k)u[n]=p.exports(a),s=!0;else if("module"===k)h=u[n]=p.module(a);else if(e(q,k)||e(r,k)||e(t,k))u[n]=j(k);else{if(!m.p)throw new Error(a+" missing "+k);m.p.load(m.n,g(f,!0),i(k),{}),u[n]=q[k]}l=d?d.apply(q[a],u):void 0,a&&(h&&h.exports!==b&&h.exports!==q[a]?q[a]=h.exports:l===b&&s||(q[a]=l))}else a&&(q[a]=d)},a=c=n=function(a,c,d,e,f){if("string"==typeof a)return p[a]?p[a](c):j(o(a,c).f);if(!a.splice){if(s=a,s.deps&&n(s.deps,s.callback),!c)return;c.splice?(a=c,c=d,d=null):a=b}return c=c||function(){},"function"==typeof d&&(d=e,e=f),e?m(b,a,c,d):setTimeout(function(){m(b,a,c,d)},4),n},n.config=function(a){return n(a)},a._defined=q,d=function(a,b,c){if("string"!=typeof a)throw new Error("See almond README: incorrect module build, no module name");b.splice||(c=b,b=[]),e(q,a)||e(r,a)||(r[a]=[a,b,c])},d.amd={jQuery:!0}}(),b.requirejs=a,b.require=c,b.define=d}}(),b.define("almond",function(){}),b.define("jquery",[],function(){var b=a||$;return null==b&&console&&console.error&&console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."),b}),b.define("select2/utils",["jquery"],function(a){function b(a){var b=a.prototype,c=[];for(var d in b){var e=b[d];"function"==typeof e&&"constructor"!==d&&c.push(d)}return c}var c={};c.Extend=function(a,b){function c(){this.constructor=a}var d={}.hasOwnProperty;for(var e in b)d.call(b,e)&&(a[e]=b[e]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},c.Decorate=function(a,c){function d(){var b=Array.prototype.unshift,d=c.prototype.constructor.length,e=a.prototype.constructor;d>0&&(b.call(arguments,a.prototype.constructor),e=c.prototype.constructor),e.apply(this,arguments)}function e(){this.constructor=d}var f=b(c),g=b(a);c.displayName=a.displayName,d.prototype=new e;for(var h=0;h<g.length;h++){var i=g[h];d.prototype[i]=a.prototype[i]}for(var j=(function(a){var b=function(){};a in d.prototype&&(b=d.prototype[a]);var e=c.prototype[a];return function(){var a=Array.prototype.unshift;return a.call(arguments,b),e.apply(this,arguments)}}),k=0;k<f.length;k++){var l=f[k];d.prototype[l]=j(l)}return d};var d=function(){this.listeners={}};return d.prototype.on=function(a,b){this.listeners=this.listeners||{},a in this.listeners?this.listeners[a].push(b):this.listeners[a]=[b]},d.prototype.trigger=function(a){var b=Array.prototype.slice,c=b.call(arguments,1);this.listeners=this.listeners||{},null==c&&(c=[]),0===c.length&&c.push({}),c[0]._type=a,a in this.listeners&&this.invoke(this.listeners[a],b.call(arguments,1)),"*"in this.listeners&&this.invoke(this.listeners["*"],arguments)},d.prototype.invoke=function(a,b){for(var c=0,d=a.length;d>c;c++)a[c].apply(this,b)},c.Observable=d,c.generateChars=function(a){for(var b="",c=0;a>c;c++){var d=Math.floor(36*Math.random());b+=d.toString(36)}return b},c.bind=function(a,b){return function(){a.apply(b,arguments)}},c._convertData=function(a){for(var b in a){var c=b.split("-"),d=a;if(1!==c.length){for(var e=0;e<c.length;e++){var f=c[e];f=f.substring(0,1).toLowerCase()+f.substring(1),f in d||(d[f]={}),e==c.length-1&&(d[f]=a[b]),d=d[f]}delete a[b]}}return a},c.hasScroll=function(b,c){var d=a(c),e=c.style.overflowX,f=c.style.overflowY;return e!==f||"hidden"!==f&&"visible"!==f?"scroll"===e||"scroll"===f?!0:d.innerHeight()<c.scrollHeight||d.innerWidth()<c.scrollWidth:!1},c.escapeMarkup=function(a){var b={"\\":"&#92;","&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#47;"};return"string"!=typeof a?a:String(a).replace(/[&<>"'\/\\]/g,function(a){return b[a]})},c.appendMany=function(b,c){if("1.7"===a.fn.jquery.substr(0,3)){var d=a();a.map(c,function(a){d=d.add(a)}),c=d}b.append(c)},c}),b.define("select2/results",["jquery","./utils"],function(a,b){function c(a,b,d){this.$element=a,this.data=d,this.options=b,c.__super__.constructor.call(this)}return b.Extend(c,b.Observable),c.prototype.render=function(){var b=a('<ul class="select2-results__options" role="tree"></ul>');return this.options.get("multiple")&&b.attr("aria-multiselectable","true"),this.$results=b,b},c.prototype.clear=function(){this.$results.empty()},c.prototype.displayMessage=function(b){var c=this.options.get("escapeMarkup");this.clear(),this.hideLoading();var d=a('<li role="treeitem" aria-live="assertive" class="select2-results__option"></li>'),e=this.options.get("translations").get(b.message);d.append(c(e(b.args))),d[0].className+=" select2-results__message",this.$results.append(d)},c.prototype.hideMessages=function(){this.$results.find(".select2-results__message").remove()},c.prototype.append=function(a){this.hideLoading();var b=[];if(null==a.results||0===a.results.length)return void(0===this.$results.children().length&&this.trigger("results:message",{message:"noResults"}));a.results=this.sort(a.results);for(var c=0;c<a.results.length;c++){var d=a.results[c],e=this.option(d);b.push(e)}this.$results.append(b)},c.prototype.position=function(a,b){var c=b.find(".select2-results");c.append(a)},c.prototype.sort=function(a){var b=this.options.get("sorter");return b(a)},c.prototype.highlightFirstItem=function(){var a=this.$results.find(".select2-results__option[aria-selected]"),b=a.filter("[aria-selected=true]");b.length>0?b.first().trigger("mouseenter"):a.first().trigger("mouseenter"),this.ensureHighlightVisible()},c.prototype.setClasses=function(){var b=this;this.data.current(function(c){var d=a.map(c,function(a){return a.id.toString()}),e=b.$results.find(".select2-results__option[aria-selected]");e.each(function(){var b=a(this),c=a.data(this,"data"),e=""+c.id;null!=c.element&&c.element.selected||null==c.element&&a.inArray(e,d)>-1?b.attr("aria-selected","true"):b.attr("aria-selected","false")})})},c.prototype.showLoading=function(a){this.hideLoading();var b=this.options.get("translations").get("searching"),c={disabled:!0,loading:!0,text:b(a)},d=this.option(c);d.className+=" loading-results",this.$results.prepend(d)},c.prototype.hideLoading=function(){this.$results.find(".loading-results").remove()},c.prototype.option=function(b){var c=document.createElement("li");c.className="select2-results__option";var d={role:"treeitem","aria-selected":"false"};b.disabled&&(delete d["aria-selected"],d["aria-disabled"]="true"),null==b.id&&delete d["aria-selected"],null!=b._resultId&&(c.id=b._resultId),b.title&&(c.title=b.title),b.children&&(d.role="group",d["aria-label"]=b.text,delete d["aria-selected"]);for(var e in d){var f=d[e];c.setAttribute(e,f)}if(b.children){var g=a(c),h=document.createElement("strong");h.className="select2-results__group";a(h);this.template(b,h);for(var i=[],j=0;j<b.children.length;j++){var k=b.children[j],l=this.option(k);i.push(l)}var m=a("<ul></ul>",{"class":"select2-results__options select2-results__options--nested"});m.append(i),g.append(h),g.append(m)}else this.template(b,c);return a.data(c,"data",b),c},c.prototype.bind=function(b,c){var d=this,e=b.id+"-results";this.$results.attr("id",e),b.on("results:all",function(a){d.clear(),d.append(a.data),b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("results:append",function(a){d.append(a.data),b.isOpen()&&d.setClasses()}),b.on("query",function(a){d.hideMessages(),d.showLoading(a)}),b.on("select",function(){b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("unselect",function(){b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("open",function(){d.$results.attr("aria-expanded","true"),d.$results.attr("aria-hidden","false"),d.setClasses(),d.ensureHighlightVisible()}),b.on("close",function(){d.$results.attr("aria-expanded","false"),d.$results.attr("aria-hidden","true"),d.$results.removeAttr("aria-activedescendant")}),b.on("results:toggle",function(){var a=d.getHighlightedResults();0!==a.length&&a.trigger("mouseup")}),b.on("results:select",function(){var a=d.getHighlightedResults();if(0!==a.length){var b=a.data("data");"true"==a.attr("aria-selected")?d.trigger("close",{}):d.trigger("select",{data:b})}}),b.on("results:previous",function(){var a=d.getHighlightedResults(),b=d.$results.find("[aria-selected]"),c=b.index(a);if(0!==c){var e=c-1;0===a.length&&(e=0);var f=b.eq(e);f.trigger("mouseenter");var g=d.$results.offset().top,h=f.offset().top,i=d.$results.scrollTop()+(h-g);0===e?d.$results.scrollTop(0):0>h-g&&d.$results.scrollTop(i)}}),b.on("results:next",function(){var a=d.getHighlightedResults(),b=d.$results.find("[aria-selected]"),c=b.index(a),e=c+1;if(!(e>=b.length)){var f=b.eq(e);f.trigger("mouseenter");var g=d.$results.offset().top+d.$results.outerHeight(!1),h=f.offset().top+f.outerHeight(!1),i=d.$results.scrollTop()+h-g;0===e?d.$results.scrollTop(0):h>g&&d.$results.scrollTop(i)}}),b.on("results:focus",function(a){a.element.addClass("select2-results__option--highlighted")}),b.on("results:message",function(a){d.displayMessage(a)}),a.fn.mousewheel&&this.$results.on("mousewheel",function(a){var b=d.$results.scrollTop(),c=d.$results.get(0).scrollHeight-b+a.deltaY,e=a.deltaY>0&&b-a.deltaY<=0,f=a.deltaY<0&&c<=d.$results.height();e?(d.$results.scrollTop(0),a.preventDefault(),a.stopPropagation()):f&&(d.$results.scrollTop(d.$results.get(0).scrollHeight-d.$results.height()),a.preventDefault(),a.stopPropagation())}),this.$results.on("mouseup",".select2-results__option[aria-selected]",function(b){var c=a(this),e=c.data("data");return"true"===c.attr("aria-selected")?void(d.options.get("multiple")?d.trigger("unselect",{originalEvent:b,data:e}):d.trigger("close",{})):void d.trigger("select",{originalEvent:b,data:e})}),this.$results.on("mouseenter",".select2-results__option[aria-selected]",function(b){var c=a(this).data("data");d.getHighlightedResults().removeClass("select2-results__option--highlighted"),d.trigger("results:focus",{data:c,element:a(this)})})},c.prototype.getHighlightedResults=function(){var a=this.$results.find(".select2-results__option--highlighted");return a},c.prototype.destroy=function(){this.$results.remove()},c.prototype.ensureHighlightVisible=function(){var a=this.getHighlightedResults();if(0!==a.length){var b=this.$results.find("[aria-selected]"),c=b.index(a),d=this.$results.offset().top,e=a.offset().top,f=this.$results.scrollTop()+(e-d),g=e-d;f-=2*a.outerHeight(!1),2>=c?this.$results.scrollTop(0):(g>this.$results.outerHeight()||0>g)&&this.$results.scrollTop(f)}},c.prototype.template=function(b,c){var d=this.options.get("templateResult"),e=this.options.get("escapeMarkup"),f=d(b,c);null==f?c.style.display="none":"string"==typeof f?c.innerHTML=e(f):a(c).append(f)},c}),b.define("select2/keys",[],function(){var a={BACKSPACE:8,TAB:9,ENTER:13,SHIFT:16,CTRL:17,ALT:18,ESC:27,SPACE:32,PAGE_UP:33,PAGE_DOWN:34,END:35,HOME:36,LEFT:37,UP:38,RIGHT:39,DOWN:40,DELETE:46};return a}),b.define("select2/selection/base",["jquery","../utils","../keys"],function(a,b,c){function d(a,b){this.$element=a,this.options=b,d.__super__.constructor.call(this)}return b.Extend(d,b.Observable),d.prototype.render=function(){var b=a('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');return this._tabindex=0,null!=this.$element.data("old-tabindex")?this._tabindex=this.$element.data("old-tabindex"):null!=this.$element.attr("tabindex")&&(this._tabindex=this.$element.attr("tabindex")),b.attr("title",this.$element.attr("title")),b.attr("tabindex",this._tabindex),this.$selection=b,b},d.prototype.bind=function(a,b){var d=this,e=(a.id+"-container",a.id+"-results");this.container=a,this.$selection.on("focus",function(a){d.trigger("focus",a)}),this.$selection.on("blur",function(a){d._handleBlur(a)}),this.$selection.on("keydown",function(a){d.trigger("keypress",a),a.which===c.SPACE&&a.preventDefault()}),a.on("results:focus",function(a){d.$selection.attr("aria-activedescendant",a.data._resultId)}),a.on("selection:update",function(a){d.update(a.data)}),a.on("open",function(){d.$selection.attr("aria-expanded","true"),d.$selection.attr("aria-owns",e),d._attachCloseHandler(a)}),a.on("close",function(){d.$selection.attr("aria-expanded","false"),d.$selection.removeAttr("aria-activedescendant"),d.$selection.removeAttr("aria-owns"),d.$selection.focus(),d._detachCloseHandler(a)}),a.on("enable",function(){d.$selection.attr("tabindex",d._tabindex)}),a.on("disable",function(){d.$selection.attr("tabindex","-1")})},d.prototype._handleBlur=function(b){var c=this;window.setTimeout(function(){document.activeElement==c.$selection[0]||a.contains(c.$selection[0],document.activeElement)||c.trigger("blur",b)},1)},d.prototype._attachCloseHandler=function(b){a(document.body).on("mousedown.select2."+b.id,function(b){var c=a(b.target),d=c.closest(".select2"),e=a(".select2.select2-container--open");e.each(function(){var b=a(this);if(this!=d[0]){var c=b.data("element");c.select2("close")}})})},d.prototype._detachCloseHandler=function(b){a(document.body).off("mousedown.select2."+b.id)},d.prototype.position=function(a,b){var c=b.find(".selection");c.append(a)},d.prototype.destroy=function(){this._detachCloseHandler(this.container)},d.prototype.update=function(a){throw new Error("The `update` method must be defined in child classes.")},d}),b.define("select2/selection/single",["jquery","./base","../utils","../keys"],function(a,b,c,d){function e(){e.__super__.constructor.apply(this,arguments)}return c.Extend(e,b),e.prototype.render=function(){var a=e.__super__.render.call(this);return a.addClass("select2-selection--single"),a.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'),a},e.prototype.bind=function(a,b){var c=this;e.__super__.bind.apply(this,arguments);var d=a.id+"-container";this.$selection.find(".select2-selection__rendered").attr("id",d),this.$selection.attr("aria-labelledby",d),this.$selection.on("mousedown",function(a){1===a.which&&c.trigger("toggle",{originalEvent:a})}),this.$selection.on("focus",function(a){}),this.$selection.on("blur",function(a){}),a.on("focus",function(b){a.isOpen()||c.$selection.focus()}),a.on("selection:update",function(a){c.update(a.data)})},e.prototype.clear=function(){this.$selection.find(".select2-selection__rendered").empty()},e.prototype.display=function(a,b){var c=this.options.get("templateSelection"),d=this.options.get("escapeMarkup");return d(c(a,b))},e.prototype.selectionContainer=function(){return a("<span></span>")},e.prototype.update=function(a){if(0===a.length)return void this.clear();var b=a[0],c=this.$selection.find(".select2-selection__rendered"),d=this.display(b,c);c.empty().append(d),c.prop("title",b.title||b.text)},e}),b.define("select2/selection/multiple",["jquery","./base","../utils"],function(a,b,c){function d(a,b){d.__super__.constructor.apply(this,arguments)}return c.Extend(d,b),d.prototype.render=function(){var a=d.__super__.render.call(this);return a.addClass("select2-selection--multiple"),a.html('<ul class="select2-selection__rendered"></ul>'),a},d.prototype.bind=function(b,c){var e=this;d.__super__.bind.apply(this,arguments),this.$selection.on("click",function(a){e.trigger("toggle",{originalEvent:a})}),this.$selection.on("click",".select2-selection__choice__remove",function(b){if(!e.options.get("disabled")){var c=a(this),d=c.parent(),f=d.data("data");e.trigger("unselect",{originalEvent:b,data:f})}})},d.prototype.clear=function(){this.$selection.find(".select2-selection__rendered").empty()},d.prototype.display=function(a,b){var c=this.options.get("templateSelection"),d=this.options.get("escapeMarkup");return d(c(a,b))},d.prototype.selectionContainer=function(){var b=a('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>');return b},d.prototype.update=function(a){if(this.clear(),0!==a.length){for(var b=[],d=0;d<a.length;d++){var e=a[d],f=this.selectionContainer(),g=this.display(e,f);f.append(g),f.prop("title",e.title||e.text),f.data("data",e),b.push(f)}var h=this.$selection.find(".select2-selection__rendered");c.appendMany(h,b)}},d}),b.define("select2/selection/placeholder",["../utils"],function(a){function b(a,b,c){this.placeholder=this.normalizePlaceholder(c.get("placeholder")),a.call(this,b,c)}return b.prototype.normalizePlaceholder=function(a,b){return"string"==typeof b&&(b={id:"",text:b}),b},b.prototype.createPlaceholder=function(a,b){var c=this.selectionContainer();return c.html(this.display(b)),c.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"),c},b.prototype.update=function(a,b){var c=1==b.length&&b[0].id!=this.placeholder.id,d=b.length>1;if(d||c)return a.call(this,b);this.clear();var e=this.createPlaceholder(this.placeholder);this.$selection.find(".select2-selection__rendered").append(e)},b}),b.define("select2/selection/allowClear",["jquery","../keys"],function(a,b){function c(){}return c.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),null==this.placeholder&&this.options.get("debug")&&window.console&&console.error&&console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."),this.$selection.on("mousedown",".select2-selection__clear",function(a){d._handleClear(a)}),b.on("keypress",function(a){d._handleKeyboardClear(a,b)})},c.prototype._handleClear=function(a,b){if(!this.options.get("disabled")){var c=this.$selection.find(".select2-selection__clear");if(0!==c.length){b.stopPropagation();for(var d=c.data("data"),e=0;e<d.length;e++){var f={data:d[e]};if(this.trigger("unselect",f),f.prevented)return}this.$element.val(this.placeholder.id).trigger("change"),this.trigger("toggle",{})}}},c.prototype._handleKeyboardClear=function(a,c,d){d.isOpen()||(c.which==b.DELETE||c.which==b.BACKSPACE)&&this._handleClear(c)},c.prototype.update=function(b,c){if(b.call(this,c),!(this.$selection.find(".select2-selection__placeholder").length>0||0===c.length)){var d=a('<span class="select2-selection__clear">&times;</span>');d.data("data",c),this.$selection.find(".select2-selection__rendered").prepend(d)}},c}),b.define("select2/selection/search",["jquery","../utils","../keys"],function(a,b,c){function d(a,b,c){a.call(this,b,c)}return d.prototype.render=function(b){var c=a('<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" /></li>');this.$searchContainer=c,this.$search=c.find("input");var d=b.call(this);return this._transferTabIndex(),d},d.prototype.bind=function(a,b,d){var e=this;a.call(this,b,d),b.on("open",function(){e.$search.trigger("focus")}),b.on("close",function(){e.$search.val(""),e.$search.removeAttr("aria-activedescendant"),e.$search.trigger("focus")}),b.on("enable",function(){e.$search.prop("disabled",!1),e._transferTabIndex()}),b.on("disable",function(){e.$search.prop("disabled",!0)}),b.on("focus",function(a){e.$search.trigger("focus")}),b.on("results:focus",function(a){e.$search.attr("aria-activedescendant",a.id)}),this.$selection.on("focusin",".select2-search--inline",function(a){e.trigger("focus",a)}),this.$selection.on("focusout",".select2-search--inline",function(a){e._handleBlur(a)}),this.$selection.on("keydown",".select2-search--inline",function(a){a.stopPropagation(),e.trigger("keypress",a),e._keyUpPrevented=a.isDefaultPrevented();var b=a.which;if(b===c.BACKSPACE&&""===e.$search.val()){var d=e.$searchContainer.prev(".select2-selection__choice");if(d.length>0){var f=d.data("data");e.searchRemoveChoice(f),a.preventDefault()}}});var f=document.documentMode,g=f&&11>=f;this.$selection.on("input.searchcheck",".select2-search--inline",function(a){return g?void e.$selection.off("input.search input.searchcheck"):void e.$selection.off("keyup.search")}),this.$selection.on("keyup.search input.search",".select2-search--inline",function(a){if(g&&"input"===a.type)return void e.$selection.off("input.search input.searchcheck");var b=a.which;b!=c.SHIFT&&b!=c.CTRL&&b!=c.ALT&&b!=c.TAB&&e.handleSearch(a)})},d.prototype._transferTabIndex=function(a){this.$search.attr("tabindex",this.$selection.attr("tabindex")),this.$selection.attr("tabindex","-1")},d.prototype.createPlaceholder=function(a,b){this.$search.attr("placeholder",b.text)},d.prototype.update=function(a,b){var c=this.$search[0]==document.activeElement;this.$search.attr("placeholder",""),a.call(this,b),this.$selection.find(".select2-selection__rendered").append(this.$searchContainer),this.resizeSearch(),c&&this.$search.focus()},d.prototype.handleSearch=function(){if(this.resizeSearch(),!this._keyUpPrevented){var a=this.$search.val();this.trigger("query",{term:a})}this._keyUpPrevented=!1},d.prototype.searchRemoveChoice=function(a,b){this.trigger("unselect",{data:b}),this.$search.val(b.text),this.handleSearch()},d.prototype.resizeSearch=function(){this.$search.css("width","25px");var a="";if(""!==this.$search.attr("placeholder"))a=this.$selection.find(".select2-selection__rendered").innerWidth();else{var b=this.$search.val().length+1;a=.75*b+"em"}this.$search.css("width",a)},d}),b.define("select2/selection/eventRelay",["jquery"],function(a){function b(){}return b.prototype.bind=function(b,c,d){var e=this,f=["open","opening","close","closing","select","selecting","unselect","unselecting"],g=["opening","closing","selecting","unselecting"];b.call(this,c,d),c.on("*",function(b,c){if(-1!==a.inArray(b,f)){c=c||{};var d=a.Event("select2:"+b,{params:c});e.$element.trigger(d),-1!==a.inArray(b,g)&&(c.prevented=d.isDefaultPrevented())}})},b}),b.define("select2/translation",["jquery","require"],function(a,b){function c(a){this.dict=a||{}}return c.prototype.all=function(){return this.dict},c.prototype.get=function(a){return this.dict[a]},c.prototype.extend=function(b){this.dict=a.extend({},b.all(),this.dict)},c._cache={},c.loadPath=function(a){if(!(a in c._cache)){var d=b(a);c._cache[a]=d}return new c(c._cache[a])},c}),b.define("select2/diacritics",[],function(){var a={"Ⓐ":"A","Ａ":"A","À":"A","Á":"A","Â":"A","Ầ":"A","Ấ":"A","Ẫ":"A","Ẩ":"A","Ã":"A","Ā":"A","Ă":"A","Ằ":"A","Ắ":"A","Ẵ":"A","Ẳ":"A","Ȧ":"A","Ǡ":"A","Ä":"A","Ǟ":"A","Ả":"A","Å":"A","Ǻ":"A","Ǎ":"A","Ȁ":"A","Ȃ":"A","Ạ":"A","Ậ":"A","Ặ":"A","Ḁ":"A","Ą":"A","Ⱥ":"A","Ɐ":"A","Ꜳ":"AA","Æ":"AE","Ǽ":"AE","Ǣ":"AE","Ꜵ":"AO","Ꜷ":"AU","Ꜹ":"AV","Ꜻ":"AV","Ꜽ":"AY","Ⓑ":"B","Ｂ":"B","Ḃ":"B","Ḅ":"B","Ḇ":"B","Ƀ":"B","Ƃ":"B","Ɓ":"B","Ⓒ":"C","Ｃ":"C","Ć":"C","Ĉ":"C","Ċ":"C","Č":"C","Ç":"C","Ḉ":"C","Ƈ":"C","Ȼ":"C","Ꜿ":"C","Ⓓ":"D","Ｄ":"D","Ḋ":"D","Ď":"D","Ḍ":"D","Ḑ":"D","Ḓ":"D","Ḏ":"D","Đ":"D","Ƌ":"D","Ɗ":"D","Ɖ":"D","Ꝺ":"D","Ǳ":"DZ","Ǆ":"DZ","ǲ":"Dz","ǅ":"Dz","Ⓔ":"E","Ｅ":"E","È":"E","É":"E","Ê":"E","Ề":"E","Ế":"E","Ễ":"E","Ể":"E","Ẽ":"E","Ē":"E","Ḕ":"E","Ḗ":"E","Ĕ":"E","Ė":"E","Ë":"E","Ẻ":"E","Ě":"E","Ȅ":"E","Ȇ":"E","Ẹ":"E","Ệ":"E","Ȩ":"E","Ḝ":"E","Ę":"E","Ḙ":"E","Ḛ":"E","Ɛ":"E","Ǝ":"E","Ⓕ":"F","Ｆ":"F","Ḟ":"F","Ƒ":"F","Ꝼ":"F","Ⓖ":"G","Ｇ":"G","Ǵ":"G","Ĝ":"G","Ḡ":"G","Ğ":"G","Ġ":"G","Ǧ":"G","Ģ":"G","Ǥ":"G","Ɠ":"G","Ꞡ":"G","Ᵹ":"G","Ꝿ":"G","Ⓗ":"H","Ｈ":"H","Ĥ":"H","Ḣ":"H","Ḧ":"H","Ȟ":"H","Ḥ":"H","Ḩ":"H","Ḫ":"H","Ħ":"H","Ⱨ":"H","Ⱶ":"H","Ɥ":"H","Ⓘ":"I","Ｉ":"I","Ì":"I","Í":"I","Î":"I","Ĩ":"I","Ī":"I","Ĭ":"I","İ":"I","Ï":"I","Ḯ":"I","Ỉ":"I","Ǐ":"I","Ȉ":"I","Ȋ":"I","Ị":"I","Į":"I","Ḭ":"I","Ɨ":"I","Ⓙ":"J","Ｊ":"J","Ĵ":"J","Ɉ":"J","Ⓚ":"K","Ｋ":"K","Ḱ":"K","Ǩ":"K","Ḳ":"K","Ķ":"K","Ḵ":"K","Ƙ":"K","Ⱪ":"K","Ꝁ":"K","Ꝃ":"K","Ꝅ":"K","Ꞣ":"K","Ⓛ":"L","Ｌ":"L","Ŀ":"L","Ĺ":"L","Ľ":"L","Ḷ":"L","Ḹ":"L","Ļ":"L","Ḽ":"L","Ḻ":"L","Ł":"L","Ƚ":"L","Ɫ":"L","Ⱡ":"L","Ꝉ":"L","Ꝇ":"L","Ꞁ":"L","Ǉ":"LJ","ǈ":"Lj","Ⓜ":"M","Ｍ":"M","Ḿ":"M","Ṁ":"M","Ṃ":"M","Ɱ":"M","Ɯ":"M","Ⓝ":"N","Ｎ":"N","Ǹ":"N","Ń":"N","Ñ":"N","Ṅ":"N","Ň":"N","Ṇ":"N","Ņ":"N","Ṋ":"N","Ṉ":"N","Ƞ":"N","Ɲ":"N","Ꞑ":"N","Ꞥ":"N","Ǌ":"NJ","ǋ":"Nj","Ⓞ":"O","Ｏ":"O","Ò":"O","Ó":"O","Ô":"O","Ồ":"O","Ố":"O","Ỗ":"O","Ổ":"O","Õ":"O","Ṍ":"O","Ȭ":"O","Ṏ":"O","Ō":"O","Ṑ":"O","Ṓ":"O","Ŏ":"O","Ȯ":"O","Ȱ":"O","Ö":"O","Ȫ":"O","Ỏ":"O","Ő":"O","Ǒ":"O","Ȍ":"O","Ȏ":"O","Ơ":"O","Ờ":"O","Ớ":"O","Ỡ":"O","Ở":"O","Ợ":"O","Ọ":"O","Ộ":"O","Ǫ":"O","Ǭ":"O","Ø":"O","Ǿ":"O","Ɔ":"O","Ɵ":"O","Ꝋ":"O","Ꝍ":"O","Ƣ":"OI","Ꝏ":"OO","Ȣ":"OU","Ⓟ":"P","Ｐ":"P","Ṕ":"P","Ṗ":"P","Ƥ":"P","Ᵽ":"P","Ꝑ":"P","Ꝓ":"P","Ꝕ":"P","Ⓠ":"Q","Ｑ":"Q","Ꝗ":"Q","Ꝙ":"Q","Ɋ":"Q","Ⓡ":"R","Ｒ":"R","Ŕ":"R","Ṙ":"R","Ř":"R","Ȑ":"R","Ȓ":"R","Ṛ":"R","Ṝ":"R","Ŗ":"R","Ṟ":"R","Ɍ":"R","Ɽ":"R","Ꝛ":"R","Ꞧ":"R","Ꞃ":"R","Ⓢ":"S","Ｓ":"S","ẞ":"S","Ś":"S","Ṥ":"S","Ŝ":"S","Ṡ":"S","Š":"S","Ṧ":"S","Ṣ":"S","Ṩ":"S","Ș":"S","Ş":"S","Ȿ":"S","Ꞩ":"S","Ꞅ":"S","Ⓣ":"T","Ｔ":"T","Ṫ":"T","Ť":"T","Ṭ":"T","Ț":"T","Ţ":"T","Ṱ":"T","Ṯ":"T","Ŧ":"T","Ƭ":"T","Ʈ":"T","Ⱦ":"T","Ꞇ":"T","Ꜩ":"TZ","Ⓤ":"U","Ｕ":"U","Ù":"U","Ú":"U","Û":"U","Ũ":"U","Ṹ":"U","Ū":"U","Ṻ":"U","Ŭ":"U","Ü":"U","Ǜ":"U","Ǘ":"U","Ǖ":"U","Ǚ":"U","Ủ":"U","Ů":"U","Ű":"U","Ǔ":"U","Ȕ":"U","Ȗ":"U","Ư":"U","Ừ":"U","Ứ":"U","Ữ":"U","Ử":"U","Ự":"U","Ụ":"U","Ṳ":"U","Ų":"U","Ṷ":"U","Ṵ":"U","Ʉ":"U","Ⓥ":"V","Ｖ":"V","Ṽ":"V","Ṿ":"V","Ʋ":"V","Ꝟ":"V","Ʌ":"V","Ꝡ":"VY","Ⓦ":"W","Ｗ":"W","Ẁ":"W","Ẃ":"W","Ŵ":"W","Ẇ":"W","Ẅ":"W","Ẉ":"W","Ⱳ":"W","Ⓧ":"X","Ｘ":"X","Ẋ":"X","Ẍ":"X","Ⓨ":"Y","Ｙ":"Y","Ỳ":"Y","Ý":"Y","Ŷ":"Y","Ỹ":"Y","Ȳ":"Y","Ẏ":"Y","Ÿ":"Y","Ỷ":"Y","Ỵ":"Y","Ƴ":"Y","Ɏ":"Y","Ỿ":"Y","Ⓩ":"Z","Ｚ":"Z","Ź":"Z","Ẑ":"Z","Ż":"Z","Ž":"Z","Ẓ":"Z","Ẕ":"Z","Ƶ":"Z","Ȥ":"Z","Ɀ":"Z","Ⱬ":"Z","Ꝣ":"Z","ⓐ":"a","ａ":"a","ẚ":"a","à":"a","á":"a","â":"a","ầ":"a","ấ":"a","ẫ":"a","ẩ":"a","ã":"a","ā":"a","ă":"a","ằ":"a","ắ":"a","ẵ":"a","ẳ":"a","ȧ":"a","ǡ":"a","ä":"a","ǟ":"a","ả":"a","å":"a","ǻ":"a","ǎ":"a","ȁ":"a","ȃ":"a","ạ":"a","ậ":"a","ặ":"a","ḁ":"a","ą":"a","ⱥ":"a","ɐ":"a","ꜳ":"aa","æ":"ae","ǽ":"ae","ǣ":"ae","ꜵ":"ao","ꜷ":"au","ꜹ":"av","ꜻ":"av","ꜽ":"ay","ⓑ":"b","ｂ":"b","ḃ":"b","ḅ":"b","ḇ":"b","ƀ":"b","ƃ":"b","ɓ":"b","ⓒ":"c","ｃ":"c","ć":"c","ĉ":"c","ċ":"c","č":"c","ç":"c","ḉ":"c","ƈ":"c","ȼ":"c","ꜿ":"c","ↄ":"c","ⓓ":"d","ｄ":"d","ḋ":"d","ď":"d","ḍ":"d","ḑ":"d","ḓ":"d","ḏ":"d","đ":"d","ƌ":"d","ɖ":"d","ɗ":"d","ꝺ":"d","ǳ":"dz","ǆ":"dz","ⓔ":"e","ｅ":"e","è":"e","é":"e","ê":"e","ề":"e","ế":"e","ễ":"e","ể":"e","ẽ":"e","ē":"e","ḕ":"e","ḗ":"e","ĕ":"e","ė":"e","ë":"e","ẻ":"e","ě":"e","ȅ":"e","ȇ":"e","ẹ":"e","ệ":"e","ȩ":"e","ḝ":"e","ę":"e","ḙ":"e","ḛ":"e","ɇ":"e","ɛ":"e","ǝ":"e","ⓕ":"f","ｆ":"f","ḟ":"f","ƒ":"f","ꝼ":"f","ⓖ":"g","ｇ":"g","ǵ":"g","ĝ":"g","ḡ":"g","ğ":"g","ġ":"g","ǧ":"g","ģ":"g","ǥ":"g","ɠ":"g","ꞡ":"g","ᵹ":"g","ꝿ":"g","ⓗ":"h","ｈ":"h","ĥ":"h","ḣ":"h","ḧ":"h","ȟ":"h","ḥ":"h","ḩ":"h","ḫ":"h","ẖ":"h","ħ":"h","ⱨ":"h","ⱶ":"h","ɥ":"h","ƕ":"hv","ⓘ":"i","ｉ":"i","ì":"i","í":"i","î":"i","ĩ":"i","ī":"i","ĭ":"i","ï":"i","ḯ":"i","ỉ":"i","ǐ":"i","ȉ":"i","ȋ":"i","ị":"i","į":"i","ḭ":"i","ɨ":"i","ı":"i","ⓙ":"j","ｊ":"j","ĵ":"j","ǰ":"j","ɉ":"j","ⓚ":"k","ｋ":"k","ḱ":"k","ǩ":"k","ḳ":"k","ķ":"k","ḵ":"k","ƙ":"k","ⱪ":"k","ꝁ":"k","ꝃ":"k","ꝅ":"k","ꞣ":"k","ⓛ":"l","ｌ":"l","ŀ":"l","ĺ":"l","ľ":"l","ḷ":"l","ḹ":"l","ļ":"l","ḽ":"l","ḻ":"l","ſ":"l","ł":"l","ƚ":"l","ɫ":"l","ⱡ":"l","ꝉ":"l","ꞁ":"l","ꝇ":"l","ǉ":"lj","ⓜ":"m","ｍ":"m","ḿ":"m","ṁ":"m","ṃ":"m","ɱ":"m","ɯ":"m","ⓝ":"n","ｎ":"n","ǹ":"n","ń":"n","ñ":"n","ṅ":"n","ň":"n","ṇ":"n","ņ":"n","ṋ":"n","ṉ":"n","ƞ":"n","ɲ":"n","ŉ":"n","ꞑ":"n","ꞥ":"n","ǌ":"nj","ⓞ":"o","ｏ":"o","ò":"o","ó":"o","ô":"o","ồ":"o","ố":"o","ỗ":"o","ổ":"o","õ":"o","ṍ":"o","ȭ":"o","ṏ":"o","ō":"o","ṑ":"o","ṓ":"o","ŏ":"o","ȯ":"o","ȱ":"o","ö":"o","ȫ":"o","ỏ":"o","ő":"o","ǒ":"o","ȍ":"o","ȏ":"o","ơ":"o","ờ":"o","ớ":"o","ỡ":"o","ở":"o","ợ":"o","ọ":"o","ộ":"o","ǫ":"o","ǭ":"o","ø":"o","ǿ":"o","ɔ":"o","ꝋ":"o","ꝍ":"o","ɵ":"o","ƣ":"oi","ȣ":"ou","ꝏ":"oo","ⓟ":"p","ｐ":"p","ṕ":"p","ṗ":"p","ƥ":"p","ᵽ":"p","ꝑ":"p","ꝓ":"p","ꝕ":"p","ⓠ":"q","ｑ":"q","ɋ":"q","ꝗ":"q","ꝙ":"q","ⓡ":"r","ｒ":"r","ŕ":"r","ṙ":"r","ř":"r","ȑ":"r","ȓ":"r","ṛ":"r","ṝ":"r","ŗ":"r","ṟ":"r","ɍ":"r","ɽ":"r","ꝛ":"r","ꞧ":"r","ꞃ":"r","ⓢ":"s","ｓ":"s","ß":"s","ś":"s","ṥ":"s","ŝ":"s","ṡ":"s","š":"s","ṧ":"s","ṣ":"s","ṩ":"s","ș":"s","ş":"s","ȿ":"s","ꞩ":"s","ꞅ":"s","ẛ":"s","ⓣ":"t","ｔ":"t","ṫ":"t","ẗ":"t","ť":"t","ṭ":"t","ț":"t","ţ":"t","ṱ":"t","ṯ":"t","ŧ":"t","ƭ":"t","ʈ":"t","ⱦ":"t","ꞇ":"t","ꜩ":"tz","ⓤ":"u","ｕ":"u","ù":"u","ú":"u","û":"u","ũ":"u","ṹ":"u","ū":"u","ṻ":"u","ŭ":"u","ü":"u","ǜ":"u","ǘ":"u","ǖ":"u","ǚ":"u","ủ":"u","ů":"u","ű":"u","ǔ":"u","ȕ":"u","ȗ":"u","ư":"u","ừ":"u","ứ":"u","ữ":"u","ử":"u","ự":"u","ụ":"u","ṳ":"u","ų":"u","ṷ":"u","ṵ":"u","ʉ":"u","ⓥ":"v","ｖ":"v","ṽ":"v","ṿ":"v","ʋ":"v","ꝟ":"v","ʌ":"v","ꝡ":"vy","ⓦ":"w","ｗ":"w","ẁ":"w","ẃ":"w","ŵ":"w","ẇ":"w","ẅ":"w","ẘ":"w","ẉ":"w","ⱳ":"w","ⓧ":"x","ｘ":"x","ẋ":"x","ẍ":"x","ⓨ":"y","ｙ":"y","ỳ":"y","ý":"y","ŷ":"y","ỹ":"y","ȳ":"y","ẏ":"y","ÿ":"y","ỷ":"y","ẙ":"y","ỵ":"y","ƴ":"y","ɏ":"y","ỿ":"y","ⓩ":"z","ｚ":"z","ź":"z","ẑ":"z","ż":"z","ž":"z","ẓ":"z","ẕ":"z","ƶ":"z","ȥ":"z","ɀ":"z","ⱬ":"z","ꝣ":"z","Ά":"Α","Έ":"Ε","Ή":"Η","Ί":"Ι","Ϊ":"Ι","Ό":"Ο","Ύ":"Υ","Ϋ":"Υ","Ώ":"Ω","ά":"α","έ":"ε","ή":"η","ί":"ι","ϊ":"ι","ΐ":"ι","ό":"ο","ύ":"υ","ϋ":"υ","ΰ":"υ","ω":"ω","ς":"σ"};return a}),b.define("select2/data/base",["../utils"],function(a){function b(a,c){b.__super__.constructor.call(this)}return a.Extend(b,a.Observable),b.prototype.current=function(a){throw new Error("The `current` method must be defined in child classes.")},b.prototype.query=function(a,b){throw new Error("The `query` method must be defined in child classes.")},b.prototype.bind=function(a,b){},b.prototype.destroy=function(){},b.prototype.generateResultId=function(b,c){var d=b.id+"-result-";return d+=a.generateChars(4),d+=null!=c.id?"-"+c.id.toString():"-"+a.generateChars(4)},b}),b.define("select2/data/select",["./base","../utils","jquery"],function(a,b,c){function d(a,b){this.$element=a,this.options=b,d.__super__.constructor.call(this)}return b.Extend(d,a),d.prototype.current=function(a){var b=[],d=this;this.$element.find(":selected").each(function(){var a=c(this),e=d.item(a);b.push(e)}),a(b)},d.prototype.select=function(a){var b=this;if(a.selected=!0,c(a.element).is("option"))return a.element.selected=!0,void this.$element.trigger("change");
if(this.$element.prop("multiple"))this.current(function(d){var e=[];a=[a],a.push.apply(a,d);for(var f=0;f<a.length;f++){var g=a[f].id;-1===c.inArray(g,e)&&e.push(g)}b.$element.val(e),b.$element.trigger("change")});else{var d=a.id;this.$element.val(d),this.$element.trigger("change")}},d.prototype.unselect=function(a){var b=this;if(this.$element.prop("multiple"))return a.selected=!1,c(a.element).is("option")?(a.element.selected=!1,void this.$element.trigger("change")):void this.current(function(d){for(var e=[],f=0;f<d.length;f++){var g=d[f].id;g!==a.id&&-1===c.inArray(g,e)&&e.push(g)}b.$element.val(e),b.$element.trigger("change")})},d.prototype.bind=function(a,b){var c=this;this.container=a,a.on("select",function(a){c.select(a.data)}),a.on("unselect",function(a){c.unselect(a.data)})},d.prototype.destroy=function(){this.$element.find("*").each(function(){c.removeData(this,"data")})},d.prototype.query=function(a,b){var d=[],e=this,f=this.$element.children();f.each(function(){var b=c(this);if(b.is("option")||b.is("optgroup")){var f=e.item(b),g=e.matches(a,f);null!==g&&d.push(g)}}),b({results:d})},d.prototype.addOptions=function(a){b.appendMany(this.$element,a)},d.prototype.option=function(a){var b;a.children?(b=document.createElement("optgroup"),b.label=a.text):(b=document.createElement("option"),void 0!==b.textContent?b.textContent=a.text:b.innerText=a.text),a.id&&(b.value=a.id),a.disabled&&(b.disabled=!0),a.selected&&(b.selected=!0),a.title&&(b.title=a.title);var d=c(b),e=this._normalizeItem(a);return e.element=b,c.data(b,"data",e),d},d.prototype.item=function(a){var b={};if(b=c.data(a[0],"data"),null!=b)return b;if(a.is("option"))b={id:a.val(),text:a.text(),disabled:a.prop("disabled"),selected:a.prop("selected"),title:a.prop("title")};else if(a.is("optgroup")){b={text:a.prop("label"),children:[],title:a.prop("title")};for(var d=a.children("option"),e=[],f=0;f<d.length;f++){var g=c(d[f]),h=this.item(g);e.push(h)}b.children=e}return b=this._normalizeItem(b),b.element=a[0],c.data(a[0],"data",b),b},d.prototype._normalizeItem=function(a){c.isPlainObject(a)||(a={id:a,text:a}),a=c.extend({},{text:""},a);var b={selected:!1,disabled:!1};return null!=a.id&&(a.id=a.id.toString()),null!=a.text&&(a.text=a.text.toString()),null==a._resultId&&a.id&&null!=this.container&&(a._resultId=this.generateResultId(this.container,a)),c.extend({},b,a)},d.prototype.matches=function(a,b){var c=this.options.get("matcher");return c(a,b)},d}),b.define("select2/data/array",["./select","../utils","jquery"],function(a,b,c){function d(a,b){var c=b.get("data")||[];d.__super__.constructor.call(this,a,b),this.addOptions(this.convertToOptions(c))}return b.Extend(d,a),d.prototype.select=function(a){var b=this.$element.find("option").filter(function(b,c){return c.value==a.id.toString()});0===b.length&&(b=this.option(a),this.addOptions(b)),d.__super__.select.call(this,a)},d.prototype.convertToOptions=function(a){function d(a){return function(){return c(this).val()==a.id}}for(var e=this,f=this.$element.find("option"),g=f.map(function(){return e.item(c(this)).id}).get(),h=[],i=0;i<a.length;i++){var j=this._normalizeItem(a[i]);if(c.inArray(j.id,g)>=0){var k=f.filter(d(j)),l=this.item(k),m=c.extend(!0,{},j,l),n=this.option(m);k.replaceWith(n)}else{var o=this.option(j);if(j.children){var p=this.convertToOptions(j.children);b.appendMany(o,p)}h.push(o)}}return h},d}),b.define("select2/data/ajax",["./array","../utils","jquery"],function(a,b,c){function d(a,b){this.ajaxOptions=this._applyDefaults(b.get("ajax")),null!=this.ajaxOptions.processResults&&(this.processResults=this.ajaxOptions.processResults),d.__super__.constructor.call(this,a,b)}return b.Extend(d,a),d.prototype._applyDefaults=function(a){var b={data:function(a){return c.extend({},a,{q:a.term})},transport:function(a,b,d){var e=c.ajax(a);return e.then(b),e.fail(d),e}};return c.extend({},b,a,!0)},d.prototype.processResults=function(a){return a},d.prototype.query=function(a,b){function d(){var d=f.transport(f,function(d){var f=e.processResults(d,a);e.options.get("debug")&&window.console&&console.error&&(f&&f.results&&c.isArray(f.results)||console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")),b(f)},function(){d.status&&"0"===d.status||e.trigger("results:message",{message:"errorLoading"})});e._request=d}var e=this;null!=this._request&&(c.isFunction(this._request.abort)&&this._request.abort(),this._request=null);var f=c.extend({type:"GET"},this.ajaxOptions);"function"==typeof f.url&&(f.url=f.url.call(this.$element,a)),"function"==typeof f.data&&(f.data=f.data.call(this.$element,a)),this.ajaxOptions.delay&&null!=a.term?(this._queryTimeout&&window.clearTimeout(this._queryTimeout),this._queryTimeout=window.setTimeout(d,this.ajaxOptions.delay)):d()},d}),b.define("select2/data/tags",["jquery"],function(a){function b(b,c,d){var e=d.get("tags"),f=d.get("createTag");void 0!==f&&(this.createTag=f);var g=d.get("insertTag");if(void 0!==g&&(this.insertTag=g),b.call(this,c,d),a.isArray(e))for(var h=0;h<e.length;h++){var i=e[h],j=this._normalizeItem(i),k=this.option(j);this.$element.append(k)}}return b.prototype.query=function(a,b,c){function d(a,f){for(var g=a.results,h=0;h<g.length;h++){var i=g[h],j=null!=i.children&&!d({results:i.children},!0),k=i.text===b.term;if(k||j)return f?!1:(a.data=g,void c(a))}if(f)return!0;var l=e.createTag(b);if(null!=l){var m=e.option(l);m.attr("data-select2-tag",!0),e.addOptions([m]),e.insertTag(g,l)}a.results=g,c(a)}var e=this;return this._removeOldTags(),null==b.term||null!=b.page?void a.call(this,b,c):void a.call(this,b,d)},b.prototype.createTag=function(b,c){var d=a.trim(c.term);return""===d?null:{id:d,text:d}},b.prototype.insertTag=function(a,b,c){b.unshift(c)},b.prototype._removeOldTags=function(b){var c=(this._lastTag,this.$element.find("option[data-select2-tag]"));c.each(function(){this.selected||a(this).remove()})},b}),b.define("select2/data/tokenizer",["jquery"],function(a){function b(a,b,c){var d=c.get("tokenizer");void 0!==d&&(this.tokenizer=d),a.call(this,b,c)}return b.prototype.bind=function(a,b,c){a.call(this,b,c),this.$search=b.dropdown.$search||b.selection.$search||c.find(".select2-search__field")},b.prototype.query=function(b,c,d){function e(b){var c=g._normalizeItem(b),d=g.$element.find("option").filter(function(){return a(this).val()===c.id});if(!d.length){var e=g.option(c);e.attr("data-select2-tag",!0),g._removeOldTags(),g.addOptions([e])}f(c)}function f(a){g.trigger("select",{data:a})}var g=this;c.term=c.term||"";var h=this.tokenizer(c,this.options,e);h.term!==c.term&&(this.$search.length&&(this.$search.val(h.term),this.$search.focus()),c.term=h.term),b.call(this,c,d)},b.prototype.tokenizer=function(b,c,d,e){for(var f=d.get("tokenSeparators")||[],g=c.term,h=0,i=this.createTag||function(a){return{id:a.term,text:a.term}};h<g.length;){var j=g[h];if(-1!==a.inArray(j,f)){var k=g.substr(0,h),l=a.extend({},c,{term:k}),m=i(l);null!=m?(e(m),g=g.substr(h+1)||"",h=0):h++}else h++}return{term:g}},b}),b.define("select2/data/minimumInputLength",[],function(){function a(a,b,c){this.minimumInputLength=c.get("minimumInputLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){return b.term=b.term||"",b.term.length<this.minimumInputLength?void this.trigger("results:message",{message:"inputTooShort",args:{minimum:this.minimumInputLength,input:b.term,params:b}}):void a.call(this,b,c)},a}),b.define("select2/data/maximumInputLength",[],function(){function a(a,b,c){this.maximumInputLength=c.get("maximumInputLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){return b.term=b.term||"",this.maximumInputLength>0&&b.term.length>this.maximumInputLength?void this.trigger("results:message",{message:"inputTooLong",args:{maximum:this.maximumInputLength,input:b.term,params:b}}):void a.call(this,b,c)},a}),b.define("select2/data/maximumSelectionLength",[],function(){function a(a,b,c){this.maximumSelectionLength=c.get("maximumSelectionLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){var d=this;this.current(function(e){var f=null!=e?e.length:0;return d.maximumSelectionLength>0&&f>=d.maximumSelectionLength?void d.trigger("results:message",{message:"maximumSelected",args:{maximum:d.maximumSelectionLength}}):void a.call(d,b,c)})},a}),b.define("select2/dropdown",["jquery","./utils"],function(a,b){function c(a,b){this.$element=a,this.options=b,c.__super__.constructor.call(this)}return b.Extend(c,b.Observable),c.prototype.render=function(){var b=a('<span class="select2-dropdown"><span class="select2-results"></span></span>');return b.attr("dir",this.options.get("dir")),this.$dropdown=b,b},c.prototype.bind=function(){},c.prototype.position=function(a,b){},c.prototype.destroy=function(){this.$dropdown.remove()},c}),b.define("select2/dropdown/search",["jquery","../utils"],function(a,b){function c(){}return c.prototype.render=function(b){var c=b.call(this),d=a('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" /></span>');return this.$searchContainer=d,this.$search=d.find("input"),c.prepend(d),c},c.prototype.bind=function(b,c,d){var e=this;b.call(this,c,d),this.$search.on("keydown",function(a){e.trigger("keypress",a),e._keyUpPrevented=a.isDefaultPrevented()}),this.$search.on("input",function(b){a(this).off("keyup")}),this.$search.on("keyup input",function(a){e.handleSearch(a)}),c.on("open",function(){e.$search.attr("tabindex",0),e.$search.focus(),window.setTimeout(function(){e.$search.focus()},0)}),c.on("close",function(){e.$search.attr("tabindex",-1),e.$search.val("")}),c.on("focus",function(){c.isOpen()&&e.$search.focus()}),c.on("results:all",function(a){if(null==a.query.term||""===a.query.term){var b=e.showSearch(a);b?e.$searchContainer.removeClass("select2-search--hide"):e.$searchContainer.addClass("select2-search--hide")}})},c.prototype.handleSearch=function(a){if(!this._keyUpPrevented){var b=this.$search.val();this.trigger("query",{term:b})}this._keyUpPrevented=!1},c.prototype.showSearch=function(a,b){return!0},c}),b.define("select2/dropdown/hidePlaceholder",[],function(){function a(a,b,c,d){this.placeholder=this.normalizePlaceholder(c.get("placeholder")),a.call(this,b,c,d)}return a.prototype.append=function(a,b){b.results=this.removePlaceholder(b.results),a.call(this,b)},a.prototype.normalizePlaceholder=function(a,b){return"string"==typeof b&&(b={id:"",text:b}),b},a.prototype.removePlaceholder=function(a,b){for(var c=b.slice(0),d=b.length-1;d>=0;d--){var e=b[d];this.placeholder.id===e.id&&c.splice(d,1)}return c},a}),b.define("select2/dropdown/infiniteScroll",["jquery"],function(a){function b(a,b,c,d){this.lastParams={},a.call(this,b,c,d),this.$loadingMore=this.createLoadingMore(),this.loading=!1}return b.prototype.append=function(a,b){this.$loadingMore.remove(),this.loading=!1,a.call(this,b),this.showLoadingMore(b)&&this.$results.append(this.$loadingMore)},b.prototype.bind=function(b,c,d){var e=this;b.call(this,c,d),c.on("query",function(a){e.lastParams=a,e.loading=!0}),c.on("query:append",function(a){e.lastParams=a,e.loading=!0}),this.$results.on("scroll",function(){var b=a.contains(document.documentElement,e.$loadingMore[0]);if(!e.loading&&b){var c=e.$results.offset().top+e.$results.outerHeight(!1),d=e.$loadingMore.offset().top+e.$loadingMore.outerHeight(!1);c+50>=d&&e.loadMore()}})},b.prototype.loadMore=function(){this.loading=!0;var b=a.extend({},{page:1},this.lastParams);b.page++,this.trigger("query:append",b)},b.prototype.showLoadingMore=function(a,b){return b.pagination&&b.pagination.more},b.prototype.createLoadingMore=function(){var b=a('<li class="select2-results__option select2-results__option--load-more"role="treeitem" aria-disabled="true"></li>'),c=this.options.get("translations").get("loadingMore");return b.html(c(this.lastParams)),b},b}),b.define("select2/dropdown/attachBody",["jquery","../utils"],function(a,b){function c(b,c,d){this.$dropdownParent=d.get("dropdownParent")||a(document.body),b.call(this,c,d)}return c.prototype.bind=function(a,b,c){var d=this,e=!1;a.call(this,b,c),b.on("open",function(){d._showDropdown(),d._attachPositioningHandler(b),e||(e=!0,b.on("results:all",function(){d._positionDropdown(),d._resizeDropdown()}),b.on("results:append",function(){d._positionDropdown(),d._resizeDropdown()}))}),b.on("close",function(){d._hideDropdown(),d._detachPositioningHandler(b)}),this.$dropdownContainer.on("mousedown",function(a){a.stopPropagation()})},c.prototype.destroy=function(a){a.call(this),this.$dropdownContainer.remove()},c.prototype.position=function(a,b,c){b.attr("class",c.attr("class")),b.removeClass("select2"),b.addClass("select2-container--open"),b.css({position:"absolute",top:-999999}),this.$container=c},c.prototype.render=function(b){var c=a("<span></span>"),d=b.call(this);return c.append(d),this.$dropdownContainer=c,c},c.prototype._hideDropdown=function(a){this.$dropdownContainer.detach()},c.prototype._attachPositioningHandler=function(c,d){var e=this,f="scroll.select2."+d.id,g="resize.select2."+d.id,h="orientationchange.select2."+d.id,i=this.$container.parents().filter(b.hasScroll);i.each(function(){a(this).data("select2-scroll-position",{x:a(this).scrollLeft(),y:a(this).scrollTop()})}),i.on(f,function(b){var c=a(this).data("select2-scroll-position");a(this).scrollTop(c.y)}),a(window).on(f+" "+g+" "+h,function(a){e._positionDropdown(),e._resizeDropdown()})},c.prototype._detachPositioningHandler=function(c,d){var e="scroll.select2."+d.id,f="resize.select2."+d.id,g="orientationchange.select2."+d.id,h=this.$container.parents().filter(b.hasScroll);h.off(e),a(window).off(e+" "+f+" "+g)},c.prototype._positionDropdown=function(){var b=a(window),c=this.$dropdown.hasClass("select2-dropdown--above"),d=this.$dropdown.hasClass("select2-dropdown--below"),e=null,f=this.$container.offset();f.bottom=f.top+this.$container.outerHeight(!1);var g={height:this.$container.outerHeight(!1)};g.top=f.top,g.bottom=f.top+g.height;var h={height:this.$dropdown.outerHeight(!1)},i={top:b.scrollTop(),bottom:b.scrollTop()+b.height()},j=i.top<f.top-h.height,k=i.bottom>f.bottom+h.height,l={left:f.left,top:g.bottom},m=this.$dropdownParent;"static"===m.css("position")&&(m=m.offsetParent());var n=m.offset();l.top-=n.top,l.left-=n.left,c||d||(e="below"),k||!j||c?!j&&k&&c&&(e="below"):e="above",("above"==e||c&&"below"!==e)&&(l.top=g.top-n.top-h.height),null!=e&&(this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--"+e),this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--"+e)),this.$dropdownContainer.css(l)},c.prototype._resizeDropdown=function(){var a={width:this.$container.outerWidth(!1)+"px"};this.options.get("dropdownAutoWidth")&&(a.minWidth=a.width,a.position="relative",a.width="auto"),this.$dropdown.css(a)},c.prototype._showDropdown=function(a){this.$dropdownContainer.appendTo(this.$dropdownParent),this._positionDropdown(),this._resizeDropdown()},c}),b.define("select2/dropdown/minimumResultsForSearch",[],function(){function a(b){for(var c=0,d=0;d<b.length;d++){var e=b[d];e.children?c+=a(e.children):c++}return c}function b(a,b,c,d){this.minimumResultsForSearch=c.get("minimumResultsForSearch"),this.minimumResultsForSearch<0&&(this.minimumResultsForSearch=1/0),a.call(this,b,c,d)}return b.prototype.showSearch=function(b,c){return a(c.data.results)<this.minimumResultsForSearch?!1:b.call(this,c)},b}),b.define("select2/dropdown/selectOnClose",[],function(){function a(){}return a.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),b.on("close",function(a){d._handleSelectOnClose(a)})},a.prototype._handleSelectOnClose=function(a,b){if(b&&null!=b.originalSelect2Event){var c=b.originalSelect2Event;if("select"===c._type||"unselect"===c._type)return}var d=this.getHighlightedResults();if(!(d.length<1)){var e=d.data("data");null!=e.element&&e.element.selected||null==e.element&&e.selected||this.trigger("select",{data:e})}},a}),b.define("select2/dropdown/closeOnSelect",[],function(){function a(){}return a.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),b.on("select",function(a){d._selectTriggered(a)}),b.on("unselect",function(a){d._selectTriggered(a)})},a.prototype._selectTriggered=function(a,b){var c=b.originalEvent;c&&c.ctrlKey||this.trigger("close",{originalEvent:c,originalSelect2Event:b})},a}),b.define("select2/i18n/en",[],function(){return{errorLoading:function(){return"The results could not be loaded."},inputTooLong:function(a){var b=a.input.length-a.maximum,c="Please delete "+b+" character";return 1!=b&&(c+="s"),c},inputTooShort:function(a){var b=a.minimum-a.input.length,c="Please enter "+b+" or more characters";return c},loadingMore:function(){return"Loading more results…"},maximumSelected:function(a){var b="You can only select "+a.maximum+" item";return 1!=a.maximum&&(b+="s"),b},noResults:function(){return"No results found"},searching:function(){return"Searching…"}}}),b.define("select2/defaults",["jquery","require","./results","./selection/single","./selection/multiple","./selection/placeholder","./selection/allowClear","./selection/search","./selection/eventRelay","./utils","./translation","./diacritics","./data/select","./data/array","./data/ajax","./data/tags","./data/tokenizer","./data/minimumInputLength","./data/maximumInputLength","./data/maximumSelectionLength","./dropdown","./dropdown/search","./dropdown/hidePlaceholder","./dropdown/infiniteScroll","./dropdown/attachBody","./dropdown/minimumResultsForSearch","./dropdown/selectOnClose","./dropdown/closeOnSelect","./i18n/en"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C){function D(){this.reset()}D.prototype.apply=function(l){if(l=a.extend(!0,{},this.defaults,l),null==l.dataAdapter){if(null!=l.ajax?l.dataAdapter=o:null!=l.data?l.dataAdapter=n:l.dataAdapter=m,l.minimumInputLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,r)),l.maximumInputLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,s)),l.maximumSelectionLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,t)),l.tags&&(l.dataAdapter=j.Decorate(l.dataAdapter,p)),(null!=l.tokenSeparators||null!=l.tokenizer)&&(l.dataAdapter=j.Decorate(l.dataAdapter,q)),null!=l.query){var C=b(l.amdBase+"compat/query");l.dataAdapter=j.Decorate(l.dataAdapter,C)}if(null!=l.initSelection){var D=b(l.amdBase+"compat/initSelection");l.dataAdapter=j.Decorate(l.dataAdapter,D)}}if(null==l.resultsAdapter&&(l.resultsAdapter=c,null!=l.ajax&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,x)),null!=l.placeholder&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,w)),l.selectOnClose&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,A))),null==l.dropdownAdapter){if(l.multiple)l.dropdownAdapter=u;else{var E=j.Decorate(u,v);l.dropdownAdapter=E}if(0!==l.minimumResultsForSearch&&(l.dropdownAdapter=j.Decorate(l.dropdownAdapter,z)),l.closeOnSelect&&(l.dropdownAdapter=j.Decorate(l.dropdownAdapter,B)),null!=l.dropdownCssClass||null!=l.dropdownCss||null!=l.adaptDropdownCssClass){var F=b(l.amdBase+"compat/dropdownCss");l.dropdownAdapter=j.Decorate(l.dropdownAdapter,F)}l.dropdownAdapter=j.Decorate(l.dropdownAdapter,y)}if(null==l.selectionAdapter){if(l.multiple?l.selectionAdapter=e:l.selectionAdapter=d,null!=l.placeholder&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,f)),l.allowClear&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,g)),l.multiple&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,h)),null!=l.containerCssClass||null!=l.containerCss||null!=l.adaptContainerCssClass){var G=b(l.amdBase+"compat/containerCss");l.selectionAdapter=j.Decorate(l.selectionAdapter,G)}l.selectionAdapter=j.Decorate(l.selectionAdapter,i)}if("string"==typeof l.language)if(l.language.indexOf("-")>0){var H=l.language.split("-"),I=H[0];l.language=[l.language,I]}else l.language=[l.language];if(a.isArray(l.language)){var J=new k;l.language.push("en");for(var K=l.language,L=0;L<K.length;L++){var M=K[L],N={};try{N=k.loadPath(M)}catch(O){try{M=this.defaults.amdLanguageBase+M,N=k.loadPath(M)}catch(P){l.debug&&window.console&&console.warn&&console.warn('Select2: The language file for "'+M+'" could not be automatically loaded. A fallback will be used instead.');continue}}J.extend(N)}l.translations=J}else{var Q=k.loadPath(this.defaults.amdLanguageBase+"en"),R=new k(l.language);R.extend(Q),l.translations=R}return l},D.prototype.reset=function(){function b(a){function b(a){return l[a]||a}return a.replace(/[^\u0000-\u007E]/g,b)}function c(d,e){if(""===a.trim(d.term))return e;if(e.children&&e.children.length>0){for(var f=a.extend(!0,{},e),g=e.children.length-1;g>=0;g--){var h=e.children[g],i=c(d,h);null==i&&f.children.splice(g,1)}return f.children.length>0?f:c(d,f)}var j=b(e.text).toUpperCase(),k=b(d.term).toUpperCase();return j.indexOf(k)>-1?e:null}this.defaults={amdBase:"./",amdLanguageBase:"./i18n/",closeOnSelect:!0,debug:!1,dropdownAutoWidth:!1,escapeMarkup:j.escapeMarkup,language:C,matcher:c,minimumInputLength:0,maximumInputLength:0,maximumSelectionLength:0,minimumResultsForSearch:0,selectOnClose:!1,sorter:function(a){return a},templateResult:function(a){return a.text},templateSelection:function(a){return a.text},theme:"default",width:"resolve"}},D.prototype.set=function(b,c){var d=a.camelCase(b),e={};e[d]=c;var f=j._convertData(e);a.extend(this.defaults,f)};var E=new D;return E}),b.define("select2/options",["require","jquery","./defaults","./utils"],function(a,b,c,d){function e(b,e){if(this.options=b,null!=e&&this.fromElement(e),this.options=c.apply(this.options),e&&e.is("input")){var f=a(this.get("amdBase")+"compat/inputData");this.options.dataAdapter=d.Decorate(this.options.dataAdapter,f)}}return e.prototype.fromElement=function(a){var c=["select2"];null==this.options.multiple&&(this.options.multiple=a.prop("multiple")),null==this.options.disabled&&(this.options.disabled=a.prop("disabled")),null==this.options.language&&(a.prop("lang")?this.options.language=a.prop("lang").toLowerCase():a.closest("[lang]").prop("lang")&&(this.options.language=a.closest("[lang]").prop("lang"))),null==this.options.dir&&(a.prop("dir")?this.options.dir=a.prop("dir"):a.closest("[dir]").prop("dir")?this.options.dir=a.closest("[dir]").prop("dir"):this.options.dir="ltr"),a.prop("disabled",this.options.disabled),a.prop("multiple",this.options.multiple),a.data("select2Tags")&&(this.options.debug&&window.console&&console.warn&&console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'),a.data("data",a.data("select2Tags")),a.data("tags",!0)),a.data("ajaxUrl")&&(this.options.debug&&window.console&&console.warn&&console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."),a.attr("ajax--url",a.data("ajaxUrl")),a.data("ajax--url",a.data("ajaxUrl")));var e={};e=b.fn.jquery&&"1."==b.fn.jquery.substr(0,2)&&a[0].dataset?b.extend(!0,{},a[0].dataset,a.data()):a.data();var f=b.extend(!0,{},e);f=d._convertData(f);for(var g in f)b.inArray(g,c)>-1||(b.isPlainObject(this.options[g])?b.extend(this.options[g],f[g]):this.options[g]=f[g]);return this},e.prototype.get=function(a){return this.options[a]},e.prototype.set=function(a,b){this.options[a]=b},e}),b.define("select2/core",["jquery","./options","./utils","./keys"],function(a,b,c,d){var e=function(a,c){null!=a.data("select2")&&a.data("select2").destroy(),this.$element=a,this.id=this._generateId(a),c=c||{},this.options=new b(c,a),e.__super__.constructor.call(this);var d=a.attr("tabindex")||0;a.data("old-tabindex",d),a.attr("tabindex","-1");var f=this.options.get("dataAdapter");this.dataAdapter=new f(a,this.options);var g=this.render();this._placeContainer(g);var h=this.options.get("selectionAdapter");this.selection=new h(a,this.options),this.$selection=this.selection.render(),this.selection.position(this.$selection,g);var i=this.options.get("dropdownAdapter");this.dropdown=new i(a,this.options),this.$dropdown=this.dropdown.render(),this.dropdown.position(this.$dropdown,g);var j=this.options.get("resultsAdapter");this.results=new j(a,this.options,this.dataAdapter),this.$results=this.results.render(),this.results.position(this.$results,this.$dropdown);var k=this;this._bindAdapters(),this._registerDomEvents(),this._registerDataEvents(),this._registerSelectionEvents(),this._registerDropdownEvents(),this._registerResultsEvents(),this._registerEvents(),this.dataAdapter.current(function(a){k.trigger("selection:update",{data:a})}),a.addClass("select2-hidden-accessible"),a.attr("aria-hidden","true"),this._syncAttributes(),a.data("select2",this)};return c.Extend(e,c.Observable),e.prototype._generateId=function(a){var b="";return b=null!=a.attr("id")?a.attr("id"):null!=a.attr("name")?a.attr("name")+"-"+c.generateChars(2):c.generateChars(4),b=b.replace(/(:|\.|\[|\]|,)/g,""),b="select2-"+b},e.prototype._placeContainer=function(a){a.insertAfter(this.$element);var b=this._resolveWidth(this.$element,this.options.get("width"));null!=b&&a.css("width",b)},e.prototype._resolveWidth=function(a,b){var c=/^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;if("resolve"==b){var d=this._resolveWidth(a,"style");return null!=d?d:this._resolveWidth(a,"element")}if("element"==b){var e=a.outerWidth(!1);return 0>=e?"auto":e+"px"}if("style"==b){var f=a.attr("style");if("string"!=typeof f)return null;for(var g=f.split(";"),h=0,i=g.length;i>h;h+=1){var j=g[h].replace(/\s/g,""),k=j.match(c);if(null!==k&&k.length>=1)return k[1]}return null}return b},e.prototype._bindAdapters=function(){this.dataAdapter.bind(this,this.$container),this.selection.bind(this,this.$container),this.dropdown.bind(this,this.$container),this.results.bind(this,this.$container)},e.prototype._registerDomEvents=function(){var b=this;this.$element.on("change.select2",function(){b.dataAdapter.current(function(a){b.trigger("selection:update",{data:a})})}),this.$element.on("focus.select2",function(a){b.trigger("focus",a)}),this._syncA=c.bind(this._syncAttributes,this),this._syncS=c.bind(this._syncSubtree,this),this.$element[0].attachEvent&&this.$element[0].attachEvent("onpropertychange",this._syncA);var d=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver;null!=d?(this._observer=new d(function(c){a.each(c,b._syncA),a.each(c,b._syncS)}),this._observer.observe(this.$element[0],{attributes:!0,childList:!0,subtree:!1})):this.$element[0].addEventListener&&(this.$element[0].addEventListener("DOMAttrModified",b._syncA,!1),this.$element[0].addEventListener("DOMNodeInserted",b._syncS,!1),this.$element[0].addEventListener("DOMNodeRemoved",b._syncS,!1))},e.prototype._registerDataEvents=function(){var a=this;this.dataAdapter.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerSelectionEvents=function(){var b=this,c=["toggle","focus"];this.selection.on("toggle",function(){b.toggleDropdown()}),this.selection.on("focus",function(a){b.focus(a)}),this.selection.on("*",function(d,e){-1===a.inArray(d,c)&&b.trigger(d,e)})},e.prototype._registerDropdownEvents=function(){var a=this;this.dropdown.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerResultsEvents=function(){var a=this;this.results.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerEvents=function(){var a=this;this.on("open",function(){a.$container.addClass("select2-container--open")}),this.on("close",function(){a.$container.removeClass("select2-container--open")}),this.on("enable",function(){a.$container.removeClass("select2-container--disabled")}),this.on("disable",function(){a.$container.addClass("select2-container--disabled")}),this.on("blur",function(){a.$container.removeClass("select2-container--focus")}),this.on("query",function(b){a.isOpen()||a.trigger("open",{}),this.dataAdapter.query(b,function(c){a.trigger("results:all",{data:c,query:b})})}),this.on("query:append",function(b){this.dataAdapter.query(b,function(c){a.trigger("results:append",{data:c,query:b})})}),this.on("keypress",function(b){var c=b.which;a.isOpen()?c===d.ESC||c===d.TAB||c===d.UP&&b.altKey?(a.close(),b.preventDefault()):c===d.ENTER?(a.trigger("results:select",{}),b.preventDefault()):c===d.SPACE&&b.ctrlKey?(a.trigger("results:toggle",{}),b.preventDefault()):c===d.UP?(a.trigger("results:previous",{}),b.preventDefault()):c===d.DOWN&&(a.trigger("results:next",{}),b.preventDefault()):(c===d.ENTER||c===d.SPACE||c===d.DOWN&&b.altKey)&&(a.open(),b.preventDefault())})},e.prototype._syncAttributes=function(){this.options.set("disabled",this.$element.prop("disabled")),this.options.get("disabled")?(this.isOpen()&&this.close(),this.trigger("disable",{})):this.trigger("enable",{})},e.prototype._syncSubtree=function(a,b){var c=!1,d=this;if(!a||!a.target||"OPTION"===a.target.nodeName||"OPTGROUP"===a.target.nodeName){if(b)if(b.addedNodes&&b.addedNodes.length>0)for(var e=0;e<b.addedNodes.length;e++){var f=b.addedNodes[e];f.selected&&(c=!0)}else b.removedNodes&&b.removedNodes.length>0&&(c=!0);else c=!0;c&&this.dataAdapter.current(function(a){d.trigger("selection:update",{data:a})})}},e.prototype.trigger=function(a,b){var c=e.__super__.trigger,d={open:"opening",close:"closing",select:"selecting",unselect:"unselecting"};if(void 0===b&&(b={}),a in d){var f=d[a],g={prevented:!1,name:a,args:b};if(c.call(this,f,g),g.prevented)return void(b.prevented=!0)}c.call(this,a,b)},e.prototype.toggleDropdown=function(){this.options.get("disabled")||(this.isOpen()?this.close():this.open())},e.prototype.open=function(){this.isOpen()||this.trigger("query",{})},e.prototype.close=function(){this.isOpen()&&this.trigger("close",{})},e.prototype.isOpen=function(){return this.$container.hasClass("select2-container--open")},e.prototype.hasFocus=function(){return this.$container.hasClass("select2-container--focus")},e.prototype.focus=function(a){this.hasFocus()||(this.$container.addClass("select2-container--focus"),this.trigger("focus",{}))},e.prototype.enable=function(a){this.options.get("debug")&&window.console&&console.warn&&console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'),(null==a||0===a.length)&&(a=[!0]);var b=!a[0];this.$element.prop("disabled",b)},e.prototype.data=function(){this.options.get("debug")&&arguments.length>0&&window.console&&console.warn&&console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');var a=[];return this.dataAdapter.current(function(b){a=b}),a},e.prototype.val=function(b){if(this.options.get("debug")&&window.console&&console.warn&&console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'),null==b||0===b.length)return this.$element.val();var c=b[0];a.isArray(c)&&(c=a.map(c,function(a){return a.toString()})),this.$element.val(c).trigger("change")},e.prototype.destroy=function(){this.$container.remove(),this.$element[0].detachEvent&&this.$element[0].detachEvent("onpropertychange",this._syncA),null!=this._observer?(this._observer.disconnect(),this._observer=null):this.$element[0].removeEventListener&&(this.$element[0].removeEventListener("DOMAttrModified",this._syncA,!1),this.$element[0].removeEventListener("DOMNodeInserted",this._syncS,!1),this.$element[0].removeEventListener("DOMNodeRemoved",this._syncS,!1)),this._syncA=null,this._syncS=null,this.$element.off(".select2"),this.$element.attr("tabindex",this.$element.data("old-tabindex")),this.$element.removeClass("select2-hidden-accessible"),this.$element.attr("aria-hidden","false"),this.$element.removeData("select2"),this.dataAdapter.destroy(),this.selection.destroy(),this.dropdown.destroy(),this.results.destroy(),this.dataAdapter=null,this.selection=null,this.dropdown=null,this.results=null;
},e.prototype.render=function(){var b=a('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');return b.attr("dir",this.options.get("dir")),this.$container=b,this.$container.addClass("select2-container--"+this.options.get("theme")),b.data("element",this.$element),b},e}),b.define("select2/compat/utils",["jquery"],function(a){function b(b,c,d){var e,f,g=[];e=a.trim(b.attr("class")),e&&(e=""+e,a(e.split(/\s+/)).each(function(){0===this.indexOf("select2-")&&g.push(this)})),e=a.trim(c.attr("class")),e&&(e=""+e,a(e.split(/\s+/)).each(function(){0!==this.indexOf("select2-")&&(f=d(this),null!=f&&g.push(f))})),b.attr("class",g.join(" "))}return{syncCssClasses:b}}),b.define("select2/compat/containerCss",["jquery","./utils"],function(a,b){function c(a){return null}function d(){}return d.prototype.render=function(d){var e=d.call(this),f=this.options.get("containerCssClass")||"";a.isFunction(f)&&(f=f(this.$element));var g=this.options.get("adaptContainerCssClass");if(g=g||c,-1!==f.indexOf(":all:")){f=f.replace(":all:","");var h=g;g=function(a){var b=h(a);return null!=b?b+" "+a:a}}var i=this.options.get("containerCss")||{};return a.isFunction(i)&&(i=i(this.$element)),b.syncCssClasses(e,this.$element,g),e.css(i),e.addClass(f),e},d}),b.define("select2/compat/dropdownCss",["jquery","./utils"],function(a,b){function c(a){return null}function d(){}return d.prototype.render=function(d){var e=d.call(this),f=this.options.get("dropdownCssClass")||"";a.isFunction(f)&&(f=f(this.$element));var g=this.options.get("adaptDropdownCssClass");if(g=g||c,-1!==f.indexOf(":all:")){f=f.replace(":all:","");var h=g;g=function(a){var b=h(a);return null!=b?b+" "+a:a}}var i=this.options.get("dropdownCss")||{};return a.isFunction(i)&&(i=i(this.$element)),b.syncCssClasses(e,this.$element,g),e.css(i),e.addClass(f),e},d}),b.define("select2/compat/initSelection",["jquery"],function(a){function b(a,b,c){c.get("debug")&&window.console&&console.warn&&console.warn("Select2: The `initSelection` option has been deprecated in favor of a custom data adapter that overrides the `current` method. This method is now called multiple times instead of a single time when the instance is initialized. Support will be removed for the `initSelection` option in future versions of Select2"),this.initSelection=c.get("initSelection"),this._isInitialized=!1,a.call(this,b,c)}return b.prototype.current=function(b,c){var d=this;return this._isInitialized?void b.call(this,c):void this.initSelection.call(null,this.$element,function(b){d._isInitialized=!0,a.isArray(b)||(b=[b]),c(b)})},b}),b.define("select2/compat/inputData",["jquery"],function(a){function b(a,b,c){this._currentData=[],this._valueSeparator=c.get("valueSeparator")||",","hidden"===b.prop("type")&&c.get("debug")&&console&&console.warn&&console.warn("Select2: Using a hidden input with Select2 is no longer supported and may stop working in the future. It is recommended to use a `<select>` element instead."),a.call(this,b,c)}return b.prototype.current=function(b,c){function d(b,c){var e=[];return b.selected||-1!==a.inArray(b.id,c)?(b.selected=!0,e.push(b)):b.selected=!1,b.children&&e.push.apply(e,d(b.children,c)),e}for(var e=[],f=0;f<this._currentData.length;f++){var g=this._currentData[f];e.push.apply(e,d(g,this.$element.val().split(this._valueSeparator)))}c(e)},b.prototype.select=function(b,c){if(this.options.get("multiple")){var d=this.$element.val();d+=this._valueSeparator+c.id,this.$element.val(d),this.$element.trigger("change")}else this.current(function(b){a.map(b,function(a){a.selected=!1})}),this.$element.val(c.id),this.$element.trigger("change")},b.prototype.unselect=function(a,b){var c=this;b.selected=!1,this.current(function(a){for(var d=[],e=0;e<a.length;e++){var f=a[e];b.id!=f.id&&d.push(f.id)}c.$element.val(d.join(c._valueSeparator)),c.$element.trigger("change")})},b.prototype.query=function(a,b,c){for(var d=[],e=0;e<this._currentData.length;e++){var f=this._currentData[e],g=this.matches(b,f);null!==g&&d.push(g)}c({results:d})},b.prototype.addOptions=function(b,c){var d=a.map(c,function(b){return a.data(b[0],"data")});this._currentData.push.apply(this._currentData,d)},b}),b.define("select2/compat/matcher",["jquery"],function(a){function b(b){function c(c,d){var e=a.extend(!0,{},d);if(null==c.term||""===a.trim(c.term))return e;if(d.children){for(var f=d.children.length-1;f>=0;f--){var g=d.children[f],h=b(c.term,g.text,g);h||e.children.splice(f,1)}if(e.children.length>0)return e}return b(c.term,d.text,d)?e:null}return c}return b}),b.define("select2/compat/query",[],function(){function a(a,b,c){c.get("debug")&&window.console&&console.warn&&console.warn("Select2: The `query` option has been deprecated in favor of a custom data adapter that overrides the `query` method. Support will be removed for the `query` option in future versions of Select2."),a.call(this,b,c)}return a.prototype.query=function(a,b,c){b.callback=c;var d=this.options.get("query");d.call(null,b)},a}),b.define("select2/dropdown/attachContainer",[],function(){function a(a,b,c){a.call(this,b,c)}return a.prototype.position=function(a,b,c){var d=c.find(".dropdown-wrapper");d.append(b),b.addClass("select2-dropdown--below"),c.addClass("select2-container--below")},a}),b.define("select2/dropdown/stopPropagation",[],function(){function a(){}return a.prototype.bind=function(a,b,c){a.call(this,b,c);var d=["blur","change","click","dblclick","focus","focusin","focusout","input","keydown","keyup","keypress","mousedown","mouseenter","mouseleave","mousemove","mouseover","mouseup","search","touchend","touchstart"];this.$dropdown.on(d.join(" "),function(a){a.stopPropagation()})},a}),b.define("select2/selection/stopPropagation",[],function(){function a(){}return a.prototype.bind=function(a,b,c){a.call(this,b,c);var d=["blur","change","click","dblclick","focus","focusin","focusout","input","keydown","keyup","keypress","mousedown","mouseenter","mouseleave","mousemove","mouseover","mouseup","search","touchend","touchstart"];this.$selection.on(d.join(" "),function(a){a.stopPropagation()})},a}),function(c){"function"==typeof b.define&&b.define.amd?b.define("jquery-mousewheel",["jquery"],c):"object"==typeof exports?module.exports=c:c(a)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b),d=c["offsetParent"in a.fn?"offsetParent":"parent"]();return d.length||(d=a("body")),parseInt(d.css("fontSize"),10)||parseInt(c.css("fontSize"),10)||16},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})}),b.define("jquery.select2",["jquery","jquery-mousewheel","./select2/core","./select2/defaults"],function(a,b,c,d){if(null==a.fn.select2){var e=["open","close","destroy"];a.fn.select2=function(b){if(b=b||{},"object"==typeof b)return this.each(function(){var d=a.extend(!0,{},b);new c(a(this),d)}),this;if("string"==typeof b){var d,f=Array.prototype.slice.call(arguments,1);return this.each(function(){var c=a(this).data("select2");null==c&&window.console&&console.error&&console.error("The select2('"+b+"') method was called on an element that is not using Select2."),d=c[b].apply(c,f)}),a.inArray(b,e)>-1?this:d}throw new Error("Invalid arguments for Select2: "+b)}}return null==a.fn.select2.defaults&&(a.fn.select2.defaults=d),c}),{define:b.define,require:b.require}}(),c=b.require("jquery.select2");return a.fn.select2.amd=b,c});
!function(e,t,n){"use strict";!function o(e,t,n){function a(s,l){if(!t[s]){if(!e[s]){var i="function"==typeof require&&require;if(!l&&i)return i(s,!0);if(r)return r(s,!0);var u=new Error("Cannot find module '"+s+"'");throw u.code="MODULE_NOT_FOUND",u}var c=t[s]={exports:{}};e[s][0].call(c.exports,function(t){var n=e[s][1][t];return a(n?n:t)},c,c.exports,o,e,t,n)}return t[s].exports}for(var r="function"==typeof require&&require,s=0;s<n.length;s++)a(n[s]);return a}({1:[function(o){var a,r,s,l,i=function(e){return e&&e.__esModule?e:{"default":e}},u=o("./modules/handle-dom"),c=o("./modules/utils"),d=o("./modules/handle-swal-dom"),f=o("./modules/handle-click"),p=o("./modules/handle-key"),m=i(p),v=o("./modules/default-params"),y=i(v),h=o("./modules/set-params"),g=i(h);s=l=function(){function o(e){var t=s;return t[e]===n?y["default"][e]:t[e]}var s=arguments[0];if(u.addClass(t.body,"stop-scrolling"),d.resetInput(),s===n)return c.logStr("SweetAlert expects at least 1 attribute!"),!1;var l=c.extend({},y["default"]);switch(typeof s){case"string":l.title=s,l.text=arguments[1]||"",l.type=arguments[2]||"";break;case"object":if(s.title===n)return c.logStr('Missing "title" argument!'),!1;l.title=s.title;for(var i in y["default"])l[i]=o(i);l.confirmButtonText=l.showCancelButton?"Confirm":y["default"].confirmButtonText,l.confirmButtonText=o("confirmButtonText"),l.doneFunction=arguments[1]||null;break;default:return c.logStr('Unexpected type of argument! Expected "string" or "object", got '+typeof s),!1}g["default"](l),d.fixVerticalPosition(),d.openModal(arguments[1]);for(var p=d.getModal(),v=p.querySelectorAll("button"),h=["onclick","onmouseover","onmouseout","onmousedown","onmouseup","onfocus"],b=function(e){return f.handleButton(e,l,p)},w=0;w<v.length;w++)for(var C=0;C<h.length;C++){var S=h[C];v[w][S]=b}d.getOverlay().onclick=b,a=e.onkeydown;var x=function(e){return m["default"](e,l,p)};e.onkeydown=x,e.onfocus=function(){setTimeout(function(){r!==n&&(r.focus(),r=n)},0)}},s.setDefaults=l.setDefaults=function(e){if(!e)throw new Error("userParams is required");if("object"!=typeof e)throw new Error("userParams has to be a object");c.extend(y["default"],e)},s.close=l.close=function(){var o=d.getModal();u.fadeOut(d.getOverlay(),5),u.fadeOut(o,5),u.removeClass(o,"showSweetAlert"),u.addClass(o,"hideSweetAlert"),u.removeClass(o,"visible");var s=o.querySelector(".sa-icon.sa-success");u.removeClass(s,"animate"),u.removeClass(s.querySelector(".sa-tip"),"animateSuccessTip"),u.removeClass(s.querySelector(".sa-long"),"animateSuccessLong");var l=o.querySelector(".sa-icon.sa-error");u.removeClass(l,"animateErrorIcon"),u.removeClass(l.querySelector(".sa-x-mark"),"animateXMark");var i=o.querySelector(".sa-icon.sa-warning");return u.removeClass(i,"pulseWarning"),u.removeClass(i.querySelector(".sa-body"),"pulseWarningIns"),u.removeClass(i.querySelector(".sa-dot"),"pulseWarningIns"),setTimeout(function(){var e=o.getAttribute("data-custom-class");u.removeClass(o,e)},300),u.removeClass(t.body,"stop-scrolling"),e.onkeydown=a,e.previousActiveElement&&e.previousActiveElement.focus(),r=n,clearTimeout(o.timeout),!0},s.showInputError=l.showInputError=function(e){var t=d.getModal(),n=t.querySelector(".sa-input-error");u.addClass(n,"show");var o=t.querySelector(".sa-error-container");u.addClass(o,"show"),o.querySelector("p").innerHTML=e,t.querySelector("input").focus()},s.resetInputError=l.resetInputError=function(e){if(e&&13===e.keyCode)return!1;var t=d.getModal(),n=t.querySelector(".sa-input-error");u.removeClass(n,"show");var o=t.querySelector(".sa-error-container");u.removeClass(o,"show")},"undefined"!=typeof e?e.sweetAlert=e.swal=s:c.logStr("SweetAlert is a frontend module!")},{"./modules/default-params":2,"./modules/handle-click":3,"./modules/handle-dom":4,"./modules/handle-key":5,"./modules/handle-swal-dom":6,"./modules/set-params":8,"./modules/utils":9}],2:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});var o={title:"",text:"",type:null,allowOutsideClick:!1,showConfirmButton:!0,showCancelButton:!1,closeOnConfirm:!0,closeOnCancel:!0,confirmButtonText:"OK",confirmButtonColor:"#AEDEF4",cancelButtonText:"Cancel",imageUrl:null,imageSize:null,timer:null,customClass:"",html:!1,animation:!0,allowEscapeKey:!0,inputType:"text",inputPlaceholder:"",inputValue:""};n["default"]=o,t.exports=n["default"]},{}],3:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var a=t("./utils"),r=(t("./handle-swal-dom"),t("./handle-dom")),s=function(t,n,o){function s(e){m&&n.confirmButtonColor&&(p.style.backgroundColor=e)}var u,c,d,f=t||e.event,p=f.target||f.srcElement,m=-1!==p.className.indexOf("confirm"),v=-1!==p.className.indexOf("sweet-overlay"),y=r.hasClass(o,"visible"),h=n.doneFunction&&"true"===o.getAttribute("data-has-done-function");switch(m&&n.confirmButtonColor&&(u=n.confirmButtonColor,c=a.colorLuminance(u,-.04),d=a.colorLuminance(u,-.14)),f.type){case"mouseover":s(c);break;case"mouseout":s(u);break;case"mousedown":s(d);break;case"mouseup":s(c);break;case"focus":var g=o.querySelector("button.confirm"),b=o.querySelector("button.cancel");m?b.style.boxShadow="none":g.style.boxShadow="none";break;case"click":var w=o===p,C=r.isDescendant(o,p);if(!w&&!C&&y&&!n.allowOutsideClick)break;m&&h&&y?l(o,n):h&&y||v?i(o,n):r.isDescendant(o,p)&&"BUTTON"===p.tagName&&sweetAlert.close()}},l=function(e,t){var n=!0;r.hasClass(e,"show-input")&&(n=e.querySelector("input").value,n||(n="")),t.doneFunction(n),t.closeOnConfirm&&sweetAlert.close()},i=function(e,t){var n=String(t.doneFunction).replace(/\s/g,""),o="function("===n.substring(0,9)&&")"!==n.substring(9,10);o&&t.doneFunction(!1),t.closeOnCancel&&sweetAlert.close()};o["default"]={handleButton:s,handleConfirm:l,handleCancel:i},n.exports=o["default"]},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],4:[function(n,o,a){Object.defineProperty(a,"__esModule",{value:!0});var r=function(e,t){return new RegExp(" "+t+" ").test(" "+e.className+" ")},s=function(e,t){r(e,t)||(e.className+=" "+t)},l=function(e,t){var n=" "+e.className.replace(/[\t\r\n]/g," ")+" ";if(r(e,t)){for(;n.indexOf(" "+t+" ")>=0;)n=n.replace(" "+t+" "," ");e.className=n.replace(/^\s+|\s+$/g,"")}},i=function(e){var n=t.createElement("div");return n.appendChild(t.createTextNode(e)),n.innerHTML},u=function(e){e.style.opacity="",e.style.display="block"},c=function(e){if(e&&!e.length)return u(e);for(var t=0;t<e.length;++t)u(e[t])},d=function(e){e.style.opacity="",e.style.display="none"},f=function(e){if(e&&!e.length)return d(e);for(var t=0;t<e.length;++t)d(e[t])},p=function(e,t){for(var n=t.parentNode;null!==n;){if(n===e)return!0;n=n.parentNode}return!1},m=function(e){e.style.left="-9999px",e.style.display="block";var t,n=e.clientHeight;return t="undefined"!=typeof getComputedStyle?parseInt(getComputedStyle(e).getPropertyValue("padding-top"),10):parseInt(e.currentStyle.padding),e.style.left="",e.style.display="none","-"+parseInt((n+t)/2)+"px"},v=function(e,t){if(+e.style.opacity<1){t=t||16,e.style.opacity=0,e.style.display="block";var n=+new Date,o=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){e.style.opacity=+e.style.opacity+(new Date-n)/100,n=+new Date,+e.style.opacity<1&&setTimeout(o,t)});o()}e.style.display="block"},y=function(e,t){t=t||16,e.style.opacity=1;var n=+new Date,o=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){e.style.opacity=+e.style.opacity-(new Date-n)/100,n=+new Date,+e.style.opacity>0?setTimeout(o,t):e.style.display="none"});o()},h=function(n){if("function"==typeof MouseEvent){var o=new MouseEvent("click",{view:e,bubbles:!1,cancelable:!0});n.dispatchEvent(o)}else if(t.createEvent){var a=t.createEvent("MouseEvents");a.initEvent("click",!1,!1),n.dispatchEvent(a)}else t.createEventObject?n.fireEvent("onclick"):"function"==typeof n.onclick&&n.onclick()},g=function(t){"function"==typeof t.stopPropagation?(t.stopPropagation(),t.preventDefault()):e.event&&e.event.hasOwnProperty("cancelBubble")&&(e.event.cancelBubble=!0)};a.hasClass=r,a.addClass=s,a.removeClass=l,a.escapeHtml=i,a._show=u,a.show=c,a._hide=d,a.hide=f,a.isDescendant=p,a.getTopMargin=m,a.fadeIn=v,a.fadeOut=y,a.fireClick=h,a.stopEventPropagation=g},{}],5:[function(t,o,a){Object.defineProperty(a,"__esModule",{value:!0});var r=t("./handle-dom"),s=t("./handle-swal-dom"),l=function(t,o,a){var l=t||e.event,i=l.keyCode||l.which,u=a.querySelector("button.confirm"),c=a.querySelector("button.cancel"),d=a.querySelectorAll("button[tabindex]");if(-1!==[9,13,32,27].indexOf(i)){for(var f=l.target||l.srcElement,p=-1,m=0;m<d.length;m++)if(f===d[m]){p=m;break}9===i?(f=-1===p?u:p===d.length-1?d[0]:d[p+1],r.stopEventPropagation(l),f.focus(),o.confirmButtonColor&&s.setFocusStyle(f,o.confirmButtonColor)):13===i?("INPUT"===f.tagName&&(f=u,u.focus()),f=-1===p?u:n):27===i&&o.allowEscapeKey===!0?(f=c,r.fireClick(f,l)):f=n}};a["default"]=l,o.exports=a["default"]},{"./handle-dom":4,"./handle-swal-dom":6}],6:[function(n,o,a){var r=function(e){return e&&e.__esModule?e:{"default":e}};Object.defineProperty(a,"__esModule",{value:!0});var s=n("./utils"),l=n("./handle-dom"),i=n("./default-params"),u=r(i),c=n("./injected-html"),d=r(c),f=".sweet-alert",p=".sweet-overlay",m=function(){var e=t.createElement("div");for(e.innerHTML=d["default"];e.firstChild;)t.body.appendChild(e.firstChild)},v=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){var e=t.querySelector(f);return e||(m(),e=v()),e}),y=function(){var e=v();return e?e.querySelector("input"):void 0},h=function(){return t.querySelector(p)},g=function(e,t){var n=s.hexToRgb(t);e.style.boxShadow="0 0 2px rgba("+n+", 0.8), inset 0 0 0 1px rgba(0, 0, 0, 0.05)"},b=function(n){var o=v();l.fadeIn(h(),10),l.show(o),l.addClass(o,"showSweetAlert"),l.removeClass(o,"hideSweetAlert"),e.previousActiveElement=t.activeElement;var a=o.querySelector("button.confirm");a.focus(),setTimeout(function(){l.addClass(o,"visible")},500);var r=o.getAttribute("data-timer");if("null"!==r&&""!==r){var s=n;o.timeout=setTimeout(function(){var e=(s||null)&&"true"===o.getAttribute("data-has-done-function");e?s(null):sweetAlert.close()},r)}},w=function(){var e=v(),t=y();l.removeClass(e,"show-input"),t.value=u["default"].inputValue,t.setAttribute("type",u["default"].inputType),t.setAttribute("placeholder",u["default"].inputPlaceholder),C()},C=function(e){if(e&&13===e.keyCode)return!1;var t=v(),n=t.querySelector(".sa-input-error");l.removeClass(n,"show");var o=t.querySelector(".sa-error-container");l.removeClass(o,"show")},S=function(){var e=v();e.style.marginTop=l.getTopMargin(v())};a.sweetAlertInitialize=m,a.getModal=v,a.getOverlay=h,a.getInput=y,a.setFocusStyle=g,a.openModal=b,a.resetInput=w,a.resetInputError=C,a.fixVerticalPosition=S},{"./default-params":2,"./handle-dom":4,"./injected-html":7,"./utils":9}],7:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});var o='<div class="sweet-overlay" tabIndex="-1"></div><div class="sweet-alert"><div class="sa-icon sa-error">\n      <span class="sa-x-mark">\n        <span class="sa-line sa-left"></span>\n        <span class="sa-line sa-right"></span>\n      </span>\n    </div><div class="sa-icon sa-warning">\n      <span class="sa-body"></span>\n      <span class="sa-dot"></span>\n    </div><div class="sa-icon sa-info"></div><div class="sa-icon sa-success">\n      <span class="sa-line sa-tip"></span>\n      <span class="sa-line sa-long"></span>\n\n      <div class="sa-placeholder"></div>\n      <div class="sa-fix"></div>\n    </div><div class="sa-icon sa-custom"></div><h2>Title</h2>\n    <p>Text</p>\n    <fieldset>\n      <input type="text" tabIndex="3" />\n      <div class="sa-input-error"></div>\n    </fieldset><div class="sa-error-container">\n      <div class="icon">!</div>\n      <p>Not valid!</p>\n    </div><div class="sa-button-container">\n      <button class="cancel" tabIndex="2">Cancel</button>\n      <button class="confirm" tabIndex="1">OK</button>\n    </div></div>';n["default"]=o,t.exports=n["default"]},{}],8:[function(e,t,o){Object.defineProperty(o,"__esModule",{value:!0});var a=e("./utils"),r=e("./handle-swal-dom"),s=e("./handle-dom"),l=["error","warning","info","success","input","prompt"],i=function(e){var t=r.getModal(),o=t.querySelector("h2"),i=t.querySelector("p"),u=t.querySelector("button.cancel"),c=t.querySelector("button.confirm");if(o.innerHTML=e.html?e.title:s.escapeHtml(e.title).split("\n").join("<br>"),i.innerHTML=e.html?e.text:s.escapeHtml(e.text||"").split("\n").join("<br>"),e.text&&s.show(i),e.customClass)s.addClass(t,e.customClass),t.setAttribute("data-custom-class",e.customClass);else{var d=t.getAttribute("data-custom-class");s.removeClass(t,d),t.setAttribute("data-custom-class","")}if(s.hide(t.querySelectorAll(".sa-icon")),e.type&&!a.isIE8()){var f=function(){for(var o=!1,a=0;a<l.length;a++)if(e.type===l[a]){o=!0;break}if(!o)return logStr("Unknown alert type: "+e.type),{v:!1};var i=["success","error","warning","info"],u=n;-1!==i.indexOf(e.type)&&(u=t.querySelector(".sa-icon.sa-"+e.type),s.show(u));var c=r.getInput();switch(e.type){case"success":s.addClass(u,"animate"),s.addClass(u.querySelector(".sa-tip"),"animateSuccessTip"),s.addClass(u.querySelector(".sa-long"),"animateSuccessLong");break;case"error":s.addClass(u,"animateErrorIcon"),s.addClass(u.querySelector(".sa-x-mark"),"animateXMark");break;case"warning":s.addClass(u,"pulseWarning"),s.addClass(u.querySelector(".sa-body"),"pulseWarningIns"),s.addClass(u.querySelector(".sa-dot"),"pulseWarningIns");break;case"input":case"prompt":c.setAttribute("type",e.inputType),c.value=e.inputValue,c.setAttribute("placeholder",e.inputPlaceholder),s.addClass(t,"show-input"),setTimeout(function(){c.focus(),c.addEventListener("keyup",swal.resetInputError)},400)}}();if("object"==typeof f)return f.v}if(e.imageUrl){var p=t.querySelector(".sa-icon.sa-custom");p.style.backgroundImage="url("+e.imageUrl+")",s.show(p);var m=80,v=80;if(e.imageSize){var y=e.imageSize.toString().split("x"),h=y[0],g=y[1];h&&g?(m=h,v=g):logStr("Parameter imageSize expects value with format WIDTHxHEIGHT, got "+e.imageSize)}p.setAttribute("style",p.getAttribute("style")+"width:"+m+"px; height:"+v+"px")}t.setAttribute("data-has-cancel-button",e.showCancelButton),e.showCancelButton?u.style.display="inline-block":s.hide(u),t.setAttribute("data-has-confirm-button",e.showConfirmButton),e.showConfirmButton?c.style.display="inline-block":s.hide(c),e.cancelButtonText&&(u.innerHTML=s.escapeHtml(e.cancelButtonText)),e.confirmButtonText&&(c.innerHTML=s.escapeHtml(e.confirmButtonText)),e.confirmButtonColor&&(c.style.backgroundColor=e.confirmButtonColor,r.setFocusStyle(c,e.confirmButtonColor)),t.setAttribute("data-allow-outside-click",e.allowOutsideClick);var b=e.doneFunction?!0:!1;t.setAttribute("data-has-done-function",b),e.animation?"string"==typeof e.animation?t.setAttribute("data-animation",e.animation):t.setAttribute("data-animation","pop"):t.setAttribute("data-animation","none"),t.setAttribute("data-timer",e.timer)};o["default"]=i,t.exports=o["default"]},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],9:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var a=function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},r=function(e){var t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);return t?parseInt(t[1],16)+", "+parseInt(t[2],16)+", "+parseInt(t[3],16):null},s=function(){return e.attachEvent&&!e.addEventListener},l=function(t){e.console&&e.console.log("SweetAlert: "+t)},i=function(e,t){e=String(e).replace(/[^0-9a-f]/gi,""),e.length<6&&(e=e[0]+e[0]+e[1]+e[1]+e[2]+e[2]),t=t||0;var n,o,a="#";for(o=0;3>o;o++)n=parseInt(e.substr(2*o,2),16),n=Math.round(Math.min(Math.max(0,n+n*t),255)).toString(16),a+=("00"+n).substr(n.length);return a};o.extend=a,o.hexToRgb=r,o.isIE8=s,o.logStr=l,o.colorLuminance=i},{}]},{},[1]),"function"==typeof define&&define.amd?define(function(){return sweetAlert}):"undefined"!=typeof module&&module.exports&&(module.exports=sweetAlert)}(window,document);
!function(e){e(["jquery"],function(e){return function(){function t(e,t,n){return f({type:O.error,iconClass:g().iconClasses.error,message:e,optionsOverride:n,title:t})}function n(t,n){return t||(t=g()),v=e("#"+t.containerId),v.length?v:(n&&(v=c(t)),v)}function i(e,t,n){return f({type:O.info,iconClass:g().iconClasses.info,message:e,optionsOverride:n,title:t})}function o(e){w=e}function s(e,t,n){return f({type:O.success,iconClass:g().iconClasses.success,message:e,optionsOverride:n,title:t})}function a(e,t,n){return f({type:O.warning,iconClass:g().iconClasses.warning,message:e,optionsOverride:n,title:t})}function r(e){var t=g();v||n(t),l(e,t)||u(t)}function d(t){var i=g();return v||n(i),t&&0===e(":focus",t).length?void h(t):void(v.children().length&&v.remove())}function u(t){for(var n=v.children(),i=n.length-1;i>=0;i--)l(e(n[i]),t)}function l(t,n){return t&&0===e(":focus",t).length?(t[n.hideMethod]({duration:n.hideDuration,easing:n.hideEasing,complete:function(){h(t)}}),!0):!1}function c(t){return v=e("<div/>").attr("id",t.containerId).addClass(t.positionClass).attr("aria-live","polite").attr("role","alert"),v.appendTo(e(t.target)),v}function p(){return{tapToDismiss:!0,toastClass:"toast",containerId:"toast-container",debug:!1,showMethod:"fadeIn",showDuration:300,showEasing:"swing",onShown:void 0,hideMethod:"fadeOut",hideDuration:1e3,hideEasing:"swing",onHidden:void 0,extendedTimeOut:1e3,iconClasses:{error:"toast-error",info:"toast-info",success:"toast-success",warning:"toast-warning"},iconClass:"toast-info",positionClass:"toast-top-right",timeOut:5e3,titleClass:"toast-title",messageClass:"toast-message",target:"body",closeHtml:'<button type="button">&times;</button>',newestOnTop:!0,preventDuplicates:!1,progressBar:!1}}function m(e){w&&w(e)}function f(t){function i(t){return!e(":focus",l).length||t?(clearTimeout(O.intervalId),l[r.hideMethod]({duration:r.hideDuration,easing:r.hideEasing,complete:function(){h(l),r.onHidden&&"hidden"!==b.state&&r.onHidden(),b.state="hidden",b.endTime=new Date,m(b)}})):void 0}function o(){(r.timeOut>0||r.extendedTimeOut>0)&&(u=setTimeout(i,r.extendedTimeOut),O.maxHideTime=parseFloat(r.extendedTimeOut),O.hideEta=(new Date).getTime()+O.maxHideTime)}function s(){clearTimeout(u),O.hideEta=0,l.stop(!0,!0)[r.showMethod]({duration:r.showDuration,easing:r.showEasing})}function a(){var e=(O.hideEta-(new Date).getTime())/O.maxHideTime*100;f.width(e+"%")}var r=g(),d=t.iconClass||r.iconClass;if("undefined"!=typeof t.optionsOverride&&(r=e.extend(r,t.optionsOverride),d=t.optionsOverride.iconClass||d),r.preventDuplicates){if(t.message===C)return;C=t.message}T++,v=n(r,!0);var u=null,l=e("<div/>"),c=e("<div/>"),p=e("<div/>"),f=e("<div/>"),w=e(r.closeHtml),O={intervalId:null,hideEta:null,maxHideTime:null},b={toastId:T,state:"visible",startTime:new Date,options:r,map:t};return t.iconClass&&l.addClass(r.toastClass).addClass(d),t.title&&(c.append(t.title).addClass(r.titleClass),l.append(c)),t.message&&(p.append(t.message).addClass(r.messageClass),l.append(p)),r.closeButton&&(w.addClass("toast-close-button").attr("role","button"),l.prepend(w)),r.progressBar&&(f.addClass("toast-progress"),l.prepend(f)),l.hide(),r.newestOnTop?v.prepend(l):v.append(l),l[r.showMethod]({duration:r.showDuration,easing:r.showEasing,complete:r.onShown}),r.timeOut>0&&(u=setTimeout(i,r.timeOut),O.maxHideTime=parseFloat(r.timeOut),O.hideEta=(new Date).getTime()+O.maxHideTime,r.progressBar&&(O.intervalId=setInterval(a,10))),l.hover(s,o),!r.onclick&&r.tapToDismiss&&l.click(i),r.closeButton&&w&&w.click(function(e){e.stopPropagation?e.stopPropagation():void 0!==e.cancelBubble&&e.cancelBubble!==!0&&(e.cancelBubble=!0),i(!0)}),r.onclick&&l.click(function(){r.onclick(),i()}),m(b),r.debug&&console&&console.log(b),l}function g(){return e.extend({},p(),b.options)}function h(e){v||(v=n()),e.is(":visible")||(e.remove(),e=null,0===v.children().length&&(v.remove(),C=void 0))}var v,w,C,T=0,O={error:"error",info:"info",success:"success",warning:"warning"},b={clear:r,remove:d,error:t,getContainer:n,info:i,options:{},subscribe:o,success:s,version:"2.1.0",warning:a};return b}()})}("function"==typeof define&&define.amd?define:function(e,t){"undefined"!=typeof module&&module.exports?module.exports=t(require("jquery")):window.toastr=t(window.jQuery)});
//# sourceMappingURL=/toastr.js.map
(function(){function require(path,parent,orig){var resolved=require.resolve(path);if(null==resolved){orig=orig||path;parent=parent||"root";var err=new Error('Failed to require "'+orig+'" from "'+parent+'"');err.path=orig;err.parent=parent;err.require=true;throw err}var module=require.modules[resolved];if(!module._resolving&&!module.exports){var mod={};mod.exports={};mod.client=mod.component=true;module._resolving=true;module.call(this,mod.exports,require.relative(resolved),mod);delete module._resolving;module.exports=mod.exports}return module.exports}require.modules={};require.aliases={};require.resolve=function(path){if(path.charAt(0)==="/")path=path.slice(1);var paths=[path,path+".js",path+".json",path+"/index.js",path+"/index.json"];for(var i=0;i<paths.length;i++){var path=paths[i];if(require.modules.hasOwnProperty(path))return path;if(require.aliases.hasOwnProperty(path))return require.aliases[path]}};require.normalize=function(curr,path){var segs=[];if("."!=path.charAt(0))return path;curr=curr.split("/");path=path.split("/");for(var i=0;i<path.length;++i){if(".."==path[i]){curr.pop()}else if("."!=path[i]&&""!=path[i]){segs.push(path[i])}}return curr.concat(segs).join("/")};require.register=function(path,definition){require.modules[path]=definition};require.alias=function(from,to){if(!require.modules.hasOwnProperty(from)){throw new Error('Failed to alias "'+from+'", it does not exist')}require.aliases[to]=from};require.relative=function(parent){var p=require.normalize(parent,"..");function lastIndexOf(arr,obj){var i=arr.length;while(i--){if(arr[i]===obj)return i}return-1}function localRequire(path){var resolved=localRequire.resolve(path);return require(resolved,parent,path)}localRequire.resolve=function(path){var c=path.charAt(0);if("/"==c)return path.slice(1);if("."==c)return require.normalize(p,path);var segs=parent.split("/");var i=lastIndexOf(segs,"deps")+1;if(!i)i=0;path=segs.slice(0,i+1).join("/")+"/deps/"+path;return path};localRequire.exists=function(path){return require.modules.hasOwnProperty(localRequire.resolve(path))};return localRequire};require.register("abpetkov-transitionize/transitionize.js",function(exports,require,module){module.exports=Transitionize;function Transitionize(element,props){if(!(this instanceof Transitionize))return new Transitionize(element,props);this.element=element;this.props=props||{};this.init()}Transitionize.prototype.isSafari=function(){return/Safari/.test(navigator.userAgent)&&/Apple Computer/.test(navigator.vendor)};Transitionize.prototype.init=function(){var transitions=[];for(var key in this.props){transitions.push(key+" "+this.props[key])}this.element.style.transition=transitions.join(", ");if(this.isSafari())this.element.style.webkitTransition=transitions.join(", ")}});require.register("ftlabs-fastclick/lib/fastclick.js",function(exports,require,module){function FastClick(layer){"use strict";var oldOnClick,self=this;this.trackingClick=false;this.trackingClickStart=0;this.targetElement=null;this.touchStartX=0;this.touchStartY=0;this.lastTouchIdentifier=0;this.touchBoundary=10;this.layer=layer;if(!layer||!layer.nodeType){throw new TypeError("Layer must be a document node")}this.onClick=function(){return FastClick.prototype.onClick.apply(self,arguments)};this.onMouse=function(){return FastClick.prototype.onMouse.apply(self,arguments)};this.onTouchStart=function(){return FastClick.prototype.onTouchStart.apply(self,arguments)};this.onTouchMove=function(){return FastClick.prototype.onTouchMove.apply(self,arguments)};this.onTouchEnd=function(){return FastClick.prototype.onTouchEnd.apply(self,arguments)};this.onTouchCancel=function(){return FastClick.prototype.onTouchCancel.apply(self,arguments)};if(FastClick.notNeeded(layer)){return}if(this.deviceIsAndroid){layer.addEventListener("mouseover",this.onMouse,true);layer.addEventListener("mousedown",this.onMouse,true);layer.addEventListener("mouseup",this.onMouse,true)}layer.addEventListener("click",this.onClick,true);layer.addEventListener("touchstart",this.onTouchStart,false);layer.addEventListener("touchmove",this.onTouchMove,false);layer.addEventListener("touchend",this.onTouchEnd,false);layer.addEventListener("touchcancel",this.onTouchCancel,false);if(!Event.prototype.stopImmediatePropagation){layer.removeEventListener=function(type,callback,capture){var rmv=Node.prototype.removeEventListener;if(type==="click"){rmv.call(layer,type,callback.hijacked||callback,capture)}else{rmv.call(layer,type,callback,capture)}};layer.addEventListener=function(type,callback,capture){var adv=Node.prototype.addEventListener;if(type==="click"){adv.call(layer,type,callback.hijacked||(callback.hijacked=function(event){if(!event.propagationStopped){callback(event)}}),capture)}else{adv.call(layer,type,callback,capture)}}}if(typeof layer.onclick==="function"){oldOnClick=layer.onclick;layer.addEventListener("click",function(event){oldOnClick(event)},false);layer.onclick=null}}FastClick.prototype.deviceIsAndroid=navigator.userAgent.indexOf("Android")>0;FastClick.prototype.deviceIsIOS=/iP(ad|hone|od)/.test(navigator.userAgent);FastClick.prototype.deviceIsIOS4=FastClick.prototype.deviceIsIOS&&/OS 4_\d(_\d)?/.test(navigator.userAgent);FastClick.prototype.deviceIsIOSWithBadTarget=FastClick.prototype.deviceIsIOS&&/OS ([6-9]|\d{2})_\d/.test(navigator.userAgent);FastClick.prototype.needsClick=function(target){"use strict";switch(target.nodeName.toLowerCase()){case"button":case"select":case"textarea":if(target.disabled){return true}break;case"input":if(this.deviceIsIOS&&target.type==="file"||target.disabled){return true}break;case"label":case"video":return true}return/\bneedsclick\b/.test(target.className)};FastClick.prototype.needsFocus=function(target){"use strict";switch(target.nodeName.toLowerCase()){case"textarea":return true;case"select":return!this.deviceIsAndroid;case"input":switch(target.type){case"button":case"checkbox":case"file":case"image":case"radio":case"submit":return false}return!target.disabled&&!target.readOnly;default:return/\bneedsfocus\b/.test(target.className)}};FastClick.prototype.sendClick=function(targetElement,event){"use strict";var clickEvent,touch;if(document.activeElement&&document.activeElement!==targetElement){document.activeElement.blur()}touch=event.changedTouches[0];clickEvent=document.createEvent("MouseEvents");clickEvent.initMouseEvent(this.determineEventType(targetElement),true,true,window,1,touch.screenX,touch.screenY,touch.clientX,touch.clientY,false,false,false,false,0,null);clickEvent.forwardedTouchEvent=true;targetElement.dispatchEvent(clickEvent)};FastClick.prototype.determineEventType=function(targetElement){"use strict";if(this.deviceIsAndroid&&targetElement.tagName.toLowerCase()==="select"){return"mousedown"}return"click"};FastClick.prototype.focus=function(targetElement){"use strict";var length;if(this.deviceIsIOS&&targetElement.setSelectionRange&&targetElement.type.indexOf("date")!==0&&targetElement.type!=="time"){length=targetElement.value.length;targetElement.setSelectionRange(length,length)}else{targetElement.focus()}};FastClick.prototype.updateScrollParent=function(targetElement){"use strict";var scrollParent,parentElement;scrollParent=targetElement.fastClickScrollParent;if(!scrollParent||!scrollParent.contains(targetElement)){parentElement=targetElement;do{if(parentElement.scrollHeight>parentElement.offsetHeight){scrollParent=parentElement;targetElement.fastClickScrollParent=parentElement;break}parentElement=parentElement.parentElement}while(parentElement)}if(scrollParent){scrollParent.fastClickLastScrollTop=scrollParent.scrollTop}};FastClick.prototype.getTargetElementFromEventTarget=function(eventTarget){"use strict";if(eventTarget.nodeType===Node.TEXT_NODE){return eventTarget.parentNode}return eventTarget};FastClick.prototype.onTouchStart=function(event){"use strict";var targetElement,touch,selection;if(event.targetTouches.length>1){return true}targetElement=this.getTargetElementFromEventTarget(event.target);touch=event.targetTouches[0];if(this.deviceIsIOS){selection=window.getSelection();if(selection.rangeCount&&!selection.isCollapsed){return true}if(!this.deviceIsIOS4){if(touch.identifier===this.lastTouchIdentifier){event.preventDefault();return false}this.lastTouchIdentifier=touch.identifier;this.updateScrollParent(targetElement)}}this.trackingClick=true;this.trackingClickStart=event.timeStamp;this.targetElement=targetElement;this.touchStartX=touch.pageX;this.touchStartY=touch.pageY;if(event.timeStamp-this.lastClickTime<200){event.preventDefault()}return true};FastClick.prototype.touchHasMoved=function(event){"use strict";var touch=event.changedTouches[0],boundary=this.touchBoundary;if(Math.abs(touch.pageX-this.touchStartX)>boundary||Math.abs(touch.pageY-this.touchStartY)>boundary){return true}return false};FastClick.prototype.onTouchMove=function(event){"use strict";if(!this.trackingClick){return true}if(this.targetElement!==this.getTargetElementFromEventTarget(event.target)||this.touchHasMoved(event)){this.trackingClick=false;this.targetElement=null}return true};FastClick.prototype.findControl=function(labelElement){"use strict";if(labelElement.control!==undefined){return labelElement.control}if(labelElement.htmlFor){return document.getElementById(labelElement.htmlFor)}return labelElement.querySelector("button, input:not([type=hidden]), keygen, meter, output, progress, select, textarea")};FastClick.prototype.onTouchEnd=function(event){"use strict";var forElement,trackingClickStart,targetTagName,scrollParent,touch,targetElement=this.targetElement;if(!this.trackingClick){return true}if(event.timeStamp-this.lastClickTime<200){this.cancelNextClick=true;return true}this.cancelNextClick=false;this.lastClickTime=event.timeStamp;trackingClickStart=this.trackingClickStart;this.trackingClick=false;this.trackingClickStart=0;if(this.deviceIsIOSWithBadTarget){touch=event.changedTouches[0];targetElement=document.elementFromPoint(touch.pageX-window.pageXOffset,touch.pageY-window.pageYOffset)||targetElement;targetElement.fastClickScrollParent=this.targetElement.fastClickScrollParent}targetTagName=targetElement.tagName.toLowerCase();if(targetTagName==="label"){forElement=this.findControl(targetElement);if(forElement){this.focus(targetElement);if(this.deviceIsAndroid){return false}targetElement=forElement}}else if(this.needsFocus(targetElement)){if(event.timeStamp-trackingClickStart>100||this.deviceIsIOS&&window.top!==window&&targetTagName==="input"){this.targetElement=null;return false}this.focus(targetElement);if(!this.deviceIsIOS4||targetTagName!=="select"){this.targetElement=null;event.preventDefault()}return false}if(this.deviceIsIOS&&!this.deviceIsIOS4){scrollParent=targetElement.fastClickScrollParent;if(scrollParent&&scrollParent.fastClickLastScrollTop!==scrollParent.scrollTop){return true}}if(!this.needsClick(targetElement)){event.preventDefault();this.sendClick(targetElement,event)}return false};FastClick.prototype.onTouchCancel=function(){"use strict";this.trackingClick=false;this.targetElement=null};FastClick.prototype.onMouse=function(event){"use strict";if(!this.targetElement){return true}if(event.forwardedTouchEvent){return true}if(!event.cancelable){return true}if(!this.needsClick(this.targetElement)||this.cancelNextClick){if(event.stopImmediatePropagation){event.stopImmediatePropagation()}else{event.propagationStopped=true}event.stopPropagation();event.preventDefault();return false}return true};FastClick.prototype.onClick=function(event){"use strict";var permitted;if(this.trackingClick){this.targetElement=null;this.trackingClick=false;return true}if(event.target.type==="submit"&&event.detail===0){return true}permitted=this.onMouse(event);if(!permitted){this.targetElement=null}return permitted};FastClick.prototype.destroy=function(){"use strict";var layer=this.layer;if(this.deviceIsAndroid){layer.removeEventListener("mouseover",this.onMouse,true);layer.removeEventListener("mousedown",this.onMouse,true);layer.removeEventListener("mouseup",this.onMouse,true)}layer.removeEventListener("click",this.onClick,true);layer.removeEventListener("touchstart",this.onTouchStart,false);layer.removeEventListener("touchmove",this.onTouchMove,false);layer.removeEventListener("touchend",this.onTouchEnd,false);layer.removeEventListener("touchcancel",this.onTouchCancel,false)};FastClick.notNeeded=function(layer){"use strict";var metaViewport;var chromeVersion;if(typeof window.ontouchstart==="undefined"){return true}chromeVersion=+(/Chrome\/([0-9]+)/.exec(navigator.userAgent)||[,0])[1];if(chromeVersion){if(FastClick.prototype.deviceIsAndroid){metaViewport=document.querySelector("meta[name=viewport]");if(metaViewport){if(metaViewport.content.indexOf("user-scalable=no")!==-1){return true}if(chromeVersion>31&&window.innerWidth<=window.screen.width){return true}}}else{return true}}if(layer.style.msTouchAction==="none"){return true}return false};FastClick.attach=function(layer){"use strict";return new FastClick(layer)};if(typeof define!=="undefined"&&define.amd){define(function(){"use strict";return FastClick})}else if(typeof module!=="undefined"&&module.exports){module.exports=FastClick.attach;module.exports.FastClick=FastClick}else{window.FastClick=FastClick}});require.register("switchery/switchery.js",function(exports,require,module){var transitionize=require("transitionize"),fastclick=require("fastclick");module.exports=Switchery;var defaults={color:"#64bd63",secondaryColor:"#dfdfdf",className:"switchery",disabled:false,disabledOpacity:.5,speed:"0.4s"};function Switchery(element,options){if(!(this instanceof Switchery))return new Switchery(element,options);this.element=element;this.options=options||{};for(var i in defaults){if(this.options[i]==null){this.options[i]=defaults[i]}}if(this.element!=null&&this.element.type=="checkbox")this.init()}Switchery.prototype.hide=function(){this.element.style.display="none"};Switchery.prototype.show=function(){var switcher=this.create();this.insertAfter(this.element,switcher)};Switchery.prototype.create=function(){this.switcher=document.createElement("span");this.jack=document.createElement("small");this.switcher.appendChild(this.jack);this.switcher.className=this.options.className;return this.switcher};Switchery.prototype.insertAfter=function(reference,target){reference.parentNode.insertBefore(target,reference.nextSibling)};Switchery.prototype.isChecked=function(){return this.element.checked};Switchery.prototype.isDisabled=function(){return this.options.disabled||this.element.disabled};Switchery.prototype.setPosition=function(clicked){var checked=this.isChecked(),switcher=this.switcher,jack=this.jack;if(clicked&&checked)checked=false;else if(clicked&&!checked)checked=true;if(checked===true){this.element.checked=true;if(window.getComputedStyle)jack.style.left=parseInt(window.getComputedStyle(switcher).width)-parseInt(window.getComputedStyle(jack).width)+"px";else jack.style.left=parseInt(switcher.currentStyle["width"])-parseInt(jack.currentStyle["width"])+"px";if(this.options.color)this.colorize();this.setSpeed()}else{jack.style.left=0;this.element.checked=false;this.switcher.style.boxShadow="inset 0 0 0 0 "+this.options.secondaryColor;this.switcher.style.borderColor=this.options.secondaryColor;this.switcher.style.backgroundColor="";this.setSpeed()}};Switchery.prototype.setSpeed=function(){var switcherProp={},jackProp={left:this.options.speed.replace(/[a-z]/,"")/2+"s"};if(this.isChecked()){switcherProp={border:this.options.speed,"box-shadow":this.options.speed,"background-color":this.options.speed.replace(/[a-z]/,"")*3+"s"}}else{switcherProp={border:this.options.speed,"box-shadow":this.options.speed}}transitionize(this.switcher,switcherProp);transitionize(this.jack,jackProp)};Switchery.prototype.setAttributes=function(){var id=this.element.getAttribute("id"),name=this.element.getAttribute("name");if(id)this.switcher.setAttribute("id",id);if(name)this.switcher.setAttribute("name",name)};Switchery.prototype.colorize=function(){this.switcher.style.backgroundColor=this.options.color;this.switcher.style.borderColor=this.options.color;this.switcher.style.boxShadow="inset 0 0 0 16px "+this.options.color};Switchery.prototype.handleOnchange=function(state){if(typeof Event==="function"||!document.fireEvent){var event=document.createEvent("HTMLEvents");event.initEvent("change",true,true);this.element.dispatchEvent(event)}else{this.element.fireEvent("onchange")}};Switchery.prototype.handleChange=function(){var self=this,el=this.element;if(el.addEventListener){el.addEventListener("change",function(){self.setPosition()})}else{el.attachEvent("onchange",function(){self.setPosition()})}};Switchery.prototype.handleClick=function(){var self=this,switcher=this.switcher;if(this.isDisabled()===false){fastclick(switcher);if(switcher.addEventListener){switcher.addEventListener("click",function(){self.setPosition(true);self.handleOnchange(self.element.checked)})}else{switcher.attachEvent("onclick",function(){self.setPosition(true);self.handleOnchange(self.element.checked)})}}else{this.element.disabled=true;this.switcher.style.opacity=this.options.disabledOpacity}};Switchery.prototype.disableLabel=function(){var parent=this.element.parentNode,labels=document.getElementsByTagName("label"),attached=null;for(var i=0;i<labels.length;i++){if(labels[i].getAttribute("for")===this.element.id){attached=true}}if(attached===true||parent.tagName.toLowerCase()==="label"){if(parent.addEventListener){parent.addEventListener("click",function(e){e.preventDefault()})}else{parent.attachEvent("onclick",function(e){e.returnValue=false})}}};Switchery.prototype.markAsSwitched=function(){this.element.setAttribute("data-switchery",true)};Switchery.prototype.markedAsSwitched=function(){return this.element.getAttribute("data-switchery")};Switchery.prototype.init=function(){this.hide();this.show();this.setPosition();this.setAttributes();this.markAsSwitched();this.disableLabel();this.handleChange();this.handleClick()}});require.alias("abpetkov-transitionize/transitionize.js","switchery/deps/transitionize/transitionize.js");require.alias("abpetkov-transitionize/transitionize.js","switchery/deps/transitionize/index.js");require.alias("abpetkov-transitionize/transitionize.js","transitionize/index.js");require.alias("abpetkov-transitionize/transitionize.js","abpetkov-transitionize/index.js");require.alias("ftlabs-fastclick/lib/fastclick.js","switchery/deps/fastclick/lib/fastclick.js");require.alias("ftlabs-fastclick/lib/fastclick.js","switchery/deps/fastclick/index.js");require.alias("ftlabs-fastclick/lib/fastclick.js","fastclick/index.js");require.alias("ftlabs-fastclick/lib/fastclick.js","ftlabs-fastclick/index.js");require.alias("switchery/switchery.js","switchery/index.js");if(typeof exports=="object"){module.exports=require("switchery")}else if(typeof define=="function"&&define.amd){define(function(){return require("switchery")})}else{this["Switchery"]=require("switchery")}})();
/* =========================================================
 * bootstrap-datepicker.js
 * Repo: https://github.com/eternicode/bootstrap-datepicker/
 * Demo: http://eternicode.github.io/bootstrap-datepicker/
 * Docs: http://bootstrap-datepicker.readthedocs.org/
 * Forked from http://www.eyecon.ro/bootstrap-datepicker
 * =========================================================
 * Started by Stefan Petre; improvements by Andrew Rowls + contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */

(function($, undefined){

	var $window = $(window);

	function UTCDate(){
		return new Date(Date.UTC.apply(Date, arguments));
	}
	function UTCToday(){
		var today = new Date();
		return UTCDate(today.getFullYear(), today.getMonth(), today.getDate());
	}
	function alias(method){
		return function(){
			return this[method].apply(this, arguments);
		};
	}

	var DateArray = (function(){
		var extras = {
			get: function(i){
				return this.slice(i)[0];
			},
			contains: function(d){
				// Array.indexOf is not cross-browser;
				// $.inArray doesn't work with Dates
				var val = d && d.valueOf();
				for (var i=0, l=this.length; i < l; i++)
					if (this[i].valueOf() === val)
						return i;
				return -1;
			},
			remove: function(i){
				this.splice(i,1);
			},
			replace: function(new_array){
				if (!new_array)
					return;
				if (!$.isArray(new_array))
					new_array = [new_array];
				this.clear();
				this.push.apply(this, new_array);
			},
			clear: function(){
				this.splice(0);
			},
			copy: function(){
				var a = new DateArray();
				a.replace(this);
				return a;
			}
		};

		return function(){
			var a = [];
			a.push.apply(a, arguments);
			$.extend(a, extras);
			return a;
		};
	})();


	// Picker object

	var Datepicker = function(element, options){
		this.dates = new DateArray();
		this.viewDate = UTCToday();
		this.focusDate = null;

		this._process_options(options);

		this.element = $(element);
		this.isInline = false;
		this.isInput = this.element.is('input');
		this.component = this.element.is('.date') ? this.element.find('.add-on, .input-group-addon, .btn') : false;
		this.hasInput = this.component && this.element.find('input').length;
		if (this.component && this.component.length === 0)
			this.component = false;

		this.picker = $(DPGlobal.template);
		this._buildEvents();
		this._attachEvents();

		if (this.isInline){
			this.picker.addClass('datepicker-inline').appendTo(this.element);
		}
		else {
			this.picker.addClass('datepicker-dropdown dropdown-menu');
		}

		if (this.o.rtl){
			this.picker.addClass('datepicker-rtl');
		}

		this.viewMode = this.o.startView;

		if (this.o.calendarWeeks)
			this.picker.find('tfoot th.today')
						.attr('colspan', function(i, val){
							return parseInt(val) + 1;
						});

		this._allow_update = false;

		this.setStartDate(this._o.startDate);
		this.setEndDate(this._o.endDate);
		this.setDaysOfWeekDisabled(this.o.daysOfWeekDisabled);

		this.fillDow();
		this.fillMonths();

		this._allow_update = true;

		this.update();
		this.showMode();

		if (this.isInline){
			this.show();
		}
	};

	Datepicker.prototype = {
		constructor: Datepicker,

		_process_options: function(opts){
			// Store raw options for reference
			this._o = $.extend({}, this._o, opts);
			// Processed options
			var o = this.o = $.extend({}, this._o);

			// Check if "de-DE" style date is available, if not language should
			// fallback to 2 letter code eg "de"
			var lang = o.language;
			if (!dates[lang]){
				lang = lang.split('-')[0];
				if (!dates[lang])
					lang = defaults.language;
			}
			o.language = lang;

			switch (o.startView){
				case 2:
				case 'decade':
					o.startView = 2;
					break;
				case 1:
				case 'year':
					o.startView = 1;
					break;
				default:
					o.startView = 0;
			}

			switch (o.minViewMode){
				case 1:
				case 'months':
					o.minViewMode = 1;
					break;
				case 2:
				case 'years':
					o.minViewMode = 2;
					break;
				default:
					o.minViewMode = 0;
			}

			o.startView = Math.max(o.startView, o.minViewMode);

			// true, false, or Number > 0
			if (o.multidate !== true){
				o.multidate = Number(o.multidate) || false;
				if (o.multidate !== false)
					o.multidate = Math.max(0, o.multidate);
				else
					o.multidate = 1;
			}
			o.multidateSeparator = String(o.multidateSeparator);

			o.weekStart %= 7;
			o.weekEnd = ((o.weekStart + 6) % 7);

			var format = DPGlobal.parseFormat(o.format);
			if (o.startDate !== -Infinity){
				if (!!o.startDate){
					if (o.startDate instanceof Date)
						o.startDate = this._local_to_utc(this._zero_time(o.startDate));
					else
						o.startDate = DPGlobal.parseDate(o.startDate, format, o.language);
				}
				else {
					o.startDate = -Infinity;
				}
			}
			if (o.endDate !== Infinity){
				if (!!o.endDate){
					if (o.endDate instanceof Date)
						o.endDate = this._local_to_utc(this._zero_time(o.endDate));
					else
						o.endDate = DPGlobal.parseDate(o.endDate, format, o.language);
				}
				else {
					o.endDate = Infinity;
				}
			}

			o.daysOfWeekDisabled = o.daysOfWeekDisabled||[];
			if (!$.isArray(o.daysOfWeekDisabled))
				o.daysOfWeekDisabled = o.daysOfWeekDisabled.split(/[,\s]*/);
			o.daysOfWeekDisabled = $.map(o.daysOfWeekDisabled, function(d){
				return parseInt(d, 10);
			});

			var plc = String(o.orientation).toLowerCase().split(/\s+/g),
				_plc = o.orientation.toLowerCase();
			plc = $.grep(plc, function(word){
				return (/^auto|left|right|top|bottom$/).test(word);
			});
			o.orientation = {x: 'auto', y: 'auto'};
			if (!_plc || _plc === 'auto')
				; // no action
			else if (plc.length === 1){
				switch (plc[0]){
					case 'top':
					case 'bottom':
						o.orientation.y = plc[0];
						break;
					case 'left':
					case 'right':
						o.orientation.x = plc[0];
						break;
				}
			}
			else {
				_plc = $.grep(plc, function(word){
					return (/^left|right$/).test(word);
				});
				o.orientation.x = _plc[0] || 'auto';

				_plc = $.grep(plc, function(word){
					return (/^top|bottom$/).test(word);
				});
				o.orientation.y = _plc[0] || 'auto';
			}
		},
		_events: [],
		_secondaryEvents: [],
		_applyEvents: function(evs){
			for (var i=0, el, ch, ev; i < evs.length; i++){
				el = evs[i][0];
				if (evs[i].length === 2){
					ch = undefined;
					ev = evs[i][1];
				}
				else if (evs[i].length === 3){
					ch = evs[i][1];
					ev = evs[i][2];
				}
				el.on(ev, ch);
			}
		},
		_unapplyEvents: function(evs){
			for (var i=0, el, ev, ch; i < evs.length; i++){
				el = evs[i][0];
				if (evs[i].length === 2){
					ch = undefined;
					ev = evs[i][1];
				}
				else if (evs[i].length === 3){
					ch = evs[i][1];
					ev = evs[i][2];
				}
				el.off(ev, ch);
			}
		},
		_buildEvents: function(){
			if (this.isInput){ // single input
				this._events = [
					[this.element, {
						focus: $.proxy(this.show, this),
						keyup: $.proxy(function(e){
							if ($.inArray(e.keyCode, [27,37,39,38,40,32,13,9]) === -1)
								this.update();
						}, this),
						keydown: $.proxy(this.keydown, this)
					}]
				];
			}
			else if (this.component && this.hasInput){ // component: input + button
				this._events = [
					// For components that are not readonly, allow keyboard nav
					[this.element.find('input'), {
						focus: $.proxy(this.show, this),
						keyup: $.proxy(function(e){
							if ($.inArray(e.keyCode, [27,37,39,38,40,32,13,9]) === -1)
								this.update();
						}, this),
						keydown: $.proxy(this.keydown, this)
					}],
					[this.component, {
						click: $.proxy(this.show, this)
					}]
				];
			}
			else if (this.element.is('div')){  // inline datepicker
				this.isInline = true;
			}
			else {
				this._events = [
					[this.element, {
						click: $.proxy(this.show, this)
					}]
				];
			}
			this._events.push(
				// Component: listen for blur on element descendants
				[this.element, '*', {
					blur: $.proxy(function(e){
						this._focused_from = e.target;
					}, this)
				}],
				// Input: listen for blur on element
				[this.element, {
					blur: $.proxy(function(e){
						this._focused_from = e.target;
					}, this)
				}]
			);

			this._secondaryEvents = [
				[this.picker, {
					click: $.proxy(this.click, this)
				}],
				[$(window), {
					resize: $.proxy(this.place, this)
				}],
				[$(document), {
					'mousedown touchstart': $.proxy(function(e){
						// Clicked outside the datepicker, hide it
						if (!(
							this.element.is(e.target) ||
							this.element.find(e.target).length ||
							this.picker.is(e.target) ||
							this.picker.find(e.target).length
						)){
							this.hide();
						}
					}, this)
				}]
			];
		},
		_attachEvents: function(){
			this._detachEvents();
			this._applyEvents(this._events);
		},
		_detachEvents: function(){
			this._unapplyEvents(this._events);
		},
		_attachSecondaryEvents: function(){
			this._detachSecondaryEvents();
			this._applyEvents(this._secondaryEvents);
		},
		_detachSecondaryEvents: function(){
			this._unapplyEvents(this._secondaryEvents);
		},
		_trigger: function(event, altdate){
			var date = altdate || this.dates.get(-1),
				local_date = this._utc_to_local(date);

			this.element.trigger({
				type: event,
				date: local_date,
				dates: $.map(this.dates, this._utc_to_local),
				format: $.proxy(function(ix, format){
					if (arguments.length === 0){
						ix = this.dates.length - 1;
						format = this.o.format;
					}
					else if (typeof ix === 'string'){
						format = ix;
						ix = this.dates.length - 1;
					}
					format = format || this.o.format;
					var date = this.dates.get(ix);
					return DPGlobal.formatDate(date, format, this.o.language);
				}, this)
			});
		},

		show: function(){
			if (!this.isInline)
				this.picker.appendTo('body');
			this.picker.show();
			this.place();
			this._attachSecondaryEvents();
			this._trigger('show');
		},

		hide: function(){
			if (this.isInline)
				return;
			if (!this.picker.is(':visible'))
				return;
			this.focusDate = null;
			this.picker.hide().detach();
			this._detachSecondaryEvents();
			this.viewMode = this.o.startView;
			this.showMode();

			if (
				this.o.forceParse &&
				(
					this.isInput && this.element.val() ||
					this.hasInput && this.element.find('input').val()
				)
			)
				this.setValue();
			this._trigger('hide');
		},

		remove: function(){
			this.hide();
			this._detachEvents();
			this._detachSecondaryEvents();
			this.picker.remove();
			delete this.element.data().datepicker;
			if (!this.isInput){
				delete this.element.data().date;
			}
		},

		_utc_to_local: function(utc){
			return utc && new Date(utc.getTime() + (utc.getTimezoneOffset()*60000));
		},
		_local_to_utc: function(local){
			return local && new Date(local.getTime() - (local.getTimezoneOffset()*60000));
		},
		_zero_time: function(local){
			return local && new Date(local.getFullYear(), local.getMonth(), local.getDate());
		},
		_zero_utc_time: function(utc){
			return utc && new Date(Date.UTC(utc.getUTCFullYear(), utc.getUTCMonth(), utc.getUTCDate()));
		},

		getDates: function(){
			return $.map(this.dates, this._utc_to_local);
		},

		getUTCDates: function(){
			return $.map(this.dates, function(d){
				return new Date(d);
			});
		},

		getDate: function(){
			return this._utc_to_local(this.getUTCDate());
		},

		getUTCDate: function(){
			return new Date(this.dates.get(-1));
		},

		setDates: function(){
			var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
			this.update.apply(this, args);
			this._trigger('changeDate');
			this.setValue();
		},

		setUTCDates: function(){
			var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
			this.update.apply(this, $.map(args, this._utc_to_local));
			this._trigger('changeDate');
			this.setValue();
		},

		setDate: alias('setDates'),
		setUTCDate: alias('setUTCDates'),

		setValue: function(){
			var formatted = this.getFormattedDate();
			if (!this.isInput){
				if (this.component){
					this.element.find('input').val(formatted).change();
				}
			}
			else {
				this.element.val(formatted).change();
			}
		},

		getFormattedDate: function(format){
			if (format === undefined)
				format = this.o.format;

			var lang = this.o.language;
			return $.map(this.dates, function(d){
				return DPGlobal.formatDate(d, format, lang);
			}).join(this.o.multidateSeparator);
		},

		setStartDate: function(startDate){
			this._process_options({startDate: startDate});
			this.update();
			this.updateNavArrows();
		},

		setEndDate: function(endDate){
			this._process_options({endDate: endDate});
			this.update();
			this.updateNavArrows();
		},

		setDaysOfWeekDisabled: function(daysOfWeekDisabled){
			this._process_options({daysOfWeekDisabled: daysOfWeekDisabled});
			this.update();
			this.updateNavArrows();
		},

		place: function(){
			if (this.isInline)
				return;
			var calendarWidth = this.picker.outerWidth(),
				calendarHeight = this.picker.outerHeight(),
				visualPadding = 10,
				windowWidth = $window.width(),
				windowHeight = $window.height(),
				scrollTop = $window.scrollTop();

			var zIndex = parseInt(this.element.parents().filter(function(){
					return $(this).css('z-index') !== 'auto';
				}).first().css('z-index'))+10;
			var offset = this.component ? this.component.parent().offset() : this.element.offset();
			var height = this.component ? this.component.outerHeight(true) : this.element.outerHeight(false);
			var width = this.component ? this.component.outerWidth(true) : this.element.outerWidth(false);
			var left = offset.left,
				top = offset.top;

			this.picker.removeClass(
				'datepicker-orient-top datepicker-orient-bottom '+
				'datepicker-orient-right datepicker-orient-left'
			);

			if (this.o.orientation.x !== 'auto'){
				this.picker.addClass('datepicker-orient-' + this.o.orientation.x);
				if (this.o.orientation.x === 'right')
					left -= calendarWidth - width;
			}
			// auto x orientation is best-placement: if it crosses a window
			// edge, fudge it sideways
			else {
				// Default to left
				this.picker.addClass('datepicker-orient-left');
				if (offset.left < 0)
					left -= offset.left - visualPadding;
				else if (offset.left + calendarWidth > windowWidth)
					left = windowWidth - calendarWidth - visualPadding;
			}

			// auto y orientation is best-situation: top or bottom, no fudging,
			// decision based on which shows more of the calendar
			var yorient = this.o.orientation.y,
				top_overflow, bottom_overflow;
			if (yorient === 'auto'){
				top_overflow = -scrollTop + offset.top - calendarHeight;
				bottom_overflow = scrollTop + windowHeight - (offset.top + height + calendarHeight);
				if (Math.max(top_overflow, bottom_overflow) === bottom_overflow)
					yorient = 'top';
				else
					yorient = 'bottom';
			}
			this.picker.addClass('datepicker-orient-' + yorient);
			if (yorient === 'top')
				top += height;
			else
				top -= calendarHeight + parseInt(this.picker.css('padding-top'));

			this.picker.css({
				top: top,
				left: left,
				zIndex: zIndex
			});
		},

		_allow_update: true,
		update: function(){
			if (!this._allow_update)
				return;

			var oldDates = this.dates.copy(),
				dates = [],
				fromArgs = false;
			if (arguments.length){
				$.each(arguments, $.proxy(function(i, date){
					if (date instanceof Date)
						date = this._local_to_utc(date);
					dates.push(date);
				}, this));
				fromArgs = true;
			}
			else {
				dates = this.isInput
						? this.element.val()
						: this.element.data('date') || this.element.find('input').val();
				if (dates && this.o.multidate)
					dates = dates.split(this.o.multidateSeparator);
				else
					dates = [dates];
				delete this.element.data().date;
			}

			dates = $.map(dates, $.proxy(function(date){
				return DPGlobal.parseDate(date, this.o.format, this.o.language);
			}, this));
			dates = $.grep(dates, $.proxy(function(date){
				return (
					date < this.o.startDate ||
					date > this.o.endDate ||
					!date
				);
			}, this), true);
			this.dates.replace(dates);

			if (this.dates.length)
				this.viewDate = new Date(this.dates.get(-1));
			else if (this.viewDate < this.o.startDate)
				this.viewDate = new Date(this.o.startDate);
			else if (this.viewDate > this.o.endDate)
				this.viewDate = new Date(this.o.endDate);

			if (fromArgs){
				// setting date by clicking
				this.setValue();
			}
			else if (dates.length){
				// setting date by typing
				if (String(oldDates) !== String(this.dates))
					this._trigger('changeDate');
			}
			if (!this.dates.length && oldDates.length)
				this._trigger('clearDate');

			this.fill();
		},

		fillDow: function(){
			var dowCnt = this.o.weekStart,
				html = '<tr>';
			if (this.o.calendarWeeks){
				var cell = '<th class="cw">&nbsp;</th>';
				html += cell;
				this.picker.find('.datepicker-days thead tr:first-child').prepend(cell);
			}
			while (dowCnt < this.o.weekStart + 7){
				html += '<th class="dow">'+dates[this.o.language].daysMin[(dowCnt++)%7]+'</th>';
			}
			html += '</tr>';
			this.picker.find('.datepicker-days thead').append(html);
		},

		fillMonths: function(){
			var html = '',
			i = 0;
			while (i < 12){
				html += '<span class="month">'+dates[this.o.language].monthsShort[i++]+'</span>';
			}
			this.picker.find('.datepicker-months td').html(html);
		},

		setRange: function(range){
			if (!range || !range.length)
				delete this.range;
			else
				this.range = $.map(range, function(d){
					return d.valueOf();
				});
			this.fill();
		},

		getClassNames: function(date){
			var cls = [],
				year = this.viewDate.getUTCFullYear(),
				month = this.viewDate.getUTCMonth(),
				today = new Date();
			if (date.getUTCFullYear() < year || (date.getUTCFullYear() === year && date.getUTCMonth() < month)){
				cls.push('old');
			}
			else if (date.getUTCFullYear() > year || (date.getUTCFullYear() === year && date.getUTCMonth() > month)){
				cls.push('new');
			}
			if (this.focusDate && date.valueOf() === this.focusDate.valueOf())
				cls.push('focused');
			// Compare internal UTC date with local today, not UTC today
			if (this.o.todayHighlight &&
				date.getUTCFullYear() === today.getFullYear() &&
				date.getUTCMonth() === today.getMonth() &&
				date.getUTCDate() === today.getDate()){
				cls.push('today');
			}
			if (this.dates.contains(date) !== -1)
				cls.push('active');
			if (date.valueOf() < this.o.startDate || date.valueOf() > this.o.endDate ||
				$.inArray(date.getUTCDay(), this.o.daysOfWeekDisabled) !== -1){
				cls.push('disabled');
			}
			if (this.range){
				if (date > this.range[0] && date < this.range[this.range.length-1]){
					cls.push('range');
				}
				if ($.inArray(date.valueOf(), this.range) !== -1){
					cls.push('selected');
				}
			}
			return cls;
		},

		fill: function(){
			var d = new Date(this.viewDate),
				year = d.getUTCFullYear(),
				month = d.getUTCMonth(),
				startYear = this.o.startDate !== -Infinity ? this.o.startDate.getUTCFullYear() : -Infinity,
				startMonth = this.o.startDate !== -Infinity ? this.o.startDate.getUTCMonth() : -Infinity,
				endYear = this.o.endDate !== Infinity ? this.o.endDate.getUTCFullYear() : Infinity,
				endMonth = this.o.endDate !== Infinity ? this.o.endDate.getUTCMonth() : Infinity,
				todaytxt = dates[this.o.language].today || dates['en'].today || '',
				cleartxt = dates[this.o.language].clear || dates['en'].clear || '',
				tooltip;
			this.picker.find('.datepicker-days thead th.datepicker-switch')
						.text(dates[this.o.language].months[month]+' '+year);
			this.picker.find('tfoot th.today')
						.text(todaytxt)
						.toggle(this.o.todayBtn !== false);
			this.picker.find('tfoot th.clear')
						.text(cleartxt)
						.toggle(this.o.clearBtn !== false);
			this.updateNavArrows();
			this.fillMonths();
			var prevMonth = UTCDate(year, month-1, 28),
				day = DPGlobal.getDaysInMonth(prevMonth.getUTCFullYear(), prevMonth.getUTCMonth());
			prevMonth.setUTCDate(day);
			prevMonth.setUTCDate(day - (prevMonth.getUTCDay() - this.o.weekStart + 7)%7);
			var nextMonth = new Date(prevMonth);
			nextMonth.setUTCDate(nextMonth.getUTCDate() + 42);
			nextMonth = nextMonth.valueOf();
			var html = [];
			var clsName;
			while (prevMonth.valueOf() < nextMonth){
				if (prevMonth.getUTCDay() === this.o.weekStart){
					html.push('<tr>');
					if (this.o.calendarWeeks){
						// ISO 8601: First week contains first thursday.
						// ISO also states week starts on Monday, but we can be more abstract here.
						var
							// Start of current week: based on weekstart/current date
							ws = new Date(+prevMonth + (this.o.weekStart - prevMonth.getUTCDay() - 7) % 7 * 864e5),
							// Thursday of this week
							th = new Date(Number(ws) + (7 + 4 - ws.getUTCDay()) % 7 * 864e5),
							// First Thursday of year, year from thursday
							yth = new Date(Number(yth = UTCDate(th.getUTCFullYear(), 0, 1)) + (7 + 4 - yth.getUTCDay())%7*864e5),
							// Calendar week: ms between thursdays, div ms per day, div 7 days
							calWeek =  (th - yth) / 864e5 / 7 + 1;
						html.push('<td class="cw">'+ calWeek +'</td>');

					}
				}
				clsName = this.getClassNames(prevMonth);
				clsName.push('day');

				if (this.o.beforeShowDay !== $.noop){
					var before = this.o.beforeShowDay(this._utc_to_local(prevMonth));
					if (before === undefined)
						before = {};
					else if (typeof(before) === 'boolean')
						before = {enabled: before};
					else if (typeof(before) === 'string')
						before = {classes: before};
					if (before.enabled === false)
						clsName.push('disabled');
					if (before.classes)
						clsName = clsName.concat(before.classes.split(/\s+/));
					if (before.tooltip)
						tooltip = before.tooltip;
				}

				clsName = $.unique(clsName);
				html.push('<td class="'+clsName.join(' ')+'"' + (tooltip ? ' title="'+tooltip+'"' : '') + '>'+prevMonth.getUTCDate() + '</td>');
				if (prevMonth.getUTCDay() === this.o.weekEnd){
					html.push('</tr>');
				}
				prevMonth.setUTCDate(prevMonth.getUTCDate()+1);
			}
			this.picker.find('.datepicker-days tbody').empty().append(html.join(''));

			var months = this.picker.find('.datepicker-months')
						.find('th:eq(1)')
							.text(year)
							.end()
						.find('span').removeClass('active');

			$.each(this.dates, function(i, d){
				if (d.getUTCFullYear() === year)
					months.eq(d.getUTCMonth()).addClass('active');
			});

			if (year < startYear || year > endYear){
				months.addClass('disabled');
			}
			if (year === startYear){
				months.slice(0, startMonth).addClass('disabled');
			}
			if (year === endYear){
				months.slice(endMonth+1).addClass('disabled');
			}

			html = '';
			year = parseInt(year/10, 10) * 10;
			var yearCont = this.picker.find('.datepicker-years')
								.find('th:eq(1)')
									.text(year + '-' + (year + 9))
									.end()
								.find('td');
			year -= 1;
			var years = $.map(this.dates, function(d){
					return d.getUTCFullYear();
				}),
				classes;
			for (var i = -1; i < 11; i++){
				classes = ['year'];
				if (i === -1)
					classes.push('old');
				else if (i === 10)
					classes.push('new');
				if ($.inArray(year, years) !== -1)
					classes.push('active');
				if (year < startYear || year > endYear)
					classes.push('disabled');
				html += '<span class="' + classes.join(' ') + '">'+year+'</span>';
				year += 1;
			}
			yearCont.html(html);
		},

		updateNavArrows: function(){
			if (!this._allow_update)
				return;

			var d = new Date(this.viewDate),
				year = d.getUTCFullYear(),
				month = d.getUTCMonth();
			switch (this.viewMode){
				case 0:
					if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear() && month <= this.o.startDate.getUTCMonth()){
						this.picker.find('.prev').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.prev').css({visibility: 'visible'});
					}
					if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear() && month >= this.o.endDate.getUTCMonth()){
						this.picker.find('.next').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.next').css({visibility: 'visible'});
					}
					break;
				case 1:
				case 2:
					if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear()){
						this.picker.find('.prev').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.prev').css({visibility: 'visible'});
					}
					if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear()){
						this.picker.find('.next').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.next').css({visibility: 'visible'});
					}
					break;
			}
		},

		click: function(e){
			e.preventDefault();
			var target = $(e.target).closest('span, td, th'),
				year, month, day;
			if (target.length === 1){
				switch (target[0].nodeName.toLowerCase()){
					case 'th':
						switch (target[0].className){
							case 'datepicker-switch':
								this.showMode(1);
								break;
							case 'prev':
							case 'next':
								var dir = DPGlobal.modes[this.viewMode].navStep * (target[0].className === 'prev' ? -1 : 1);
								switch (this.viewMode){
									case 0:
										this.viewDate = this.moveMonth(this.viewDate, dir);
										this._trigger('changeMonth', this.viewDate);
										break;
									case 1:
									case 2:
										this.viewDate = this.moveYear(this.viewDate, dir);
										if (this.viewMode === 1)
											this._trigger('changeYear', this.viewDate);
										break;
								}
								this.fill();
								break;
							case 'today':
								var date = new Date();
								date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);

								this.showMode(-2);
								var which = this.o.todayBtn === 'linked' ? null : 'view';
								this._setDate(date, which);
								break;
							case 'clear':
								var element;
								if (this.isInput)
									element = this.element;
								else if (this.component)
									element = this.element.find('input');
								if (element)
									element.val("").change();
								this.update();
								this._trigger('changeDate');
								if (this.o.autoclose)
									this.hide();
								break;
						}
						break;
					case 'span':
						if (!target.is('.disabled')){
							this.viewDate.setUTCDate(1);
							if (target.is('.month')){
								day = 1;
								month = target.parent().find('span').index(target);
								year = this.viewDate.getUTCFullYear();
								this.viewDate.setUTCMonth(month);
								this._trigger('changeMonth', this.viewDate);
								if (this.o.minViewMode === 1){
									this._setDate(UTCDate(year, month, day));
								}
							}
							else {
								day = 1;
								month = 0;
								year = parseInt(target.text(), 10)||0;
								this.viewDate.setUTCFullYear(year);
								this._trigger('changeYear', this.viewDate);
								if (this.o.minViewMode === 2){
									this._setDate(UTCDate(year, month, day));
								}
							}
							this.showMode(-1);
							this.fill();
						}
						break;
					case 'td':
						if (target.is('.day') && !target.is('.disabled')){
							day = parseInt(target.text(), 10)||1;
							year = this.viewDate.getUTCFullYear();
							month = this.viewDate.getUTCMonth();
							if (target.is('.old')){
								if (month === 0){
									month = 11;
									year -= 1;
								}
								else {
									month -= 1;
								}
							}
							else if (target.is('.new')){
								if (month === 11){
									month = 0;
									year += 1;
								}
								else {
									month += 1;
								}
							}
							this._setDate(UTCDate(year, month, day));
						}
						break;
				}
			}
			if (this.picker.is(':visible') && this._focused_from){
				$(this._focused_from).focus();
			}
			delete this._focused_from;
		},

		_toggle_multidate: function(date){
			var ix = this.dates.contains(date);
			if (!date){
				this.dates.clear();
			}
			else if (ix !== -1){
				this.dates.remove(ix);
			}
			else {
				this.dates.push(date);
			}
			if (typeof this.o.multidate === 'number')
				while (this.dates.length > this.o.multidate)
					this.dates.remove(0);
		},

		_setDate: function(date, which){
			if (!which || which === 'date')
				this._toggle_multidate(date && new Date(date));
			if (!which || which  === 'view')
				this.viewDate = date && new Date(date);

			this.fill();
			this.setValue();
			this._trigger('changeDate');
			var element;
			if (this.isInput){
				element = this.element;
			}
			else if (this.component){
				element = this.element.find('input');
			}
			if (element){
				element.change();
			}
			if (this.o.autoclose && (!which || which === 'date')){
				this.hide();
			}
		},

		moveMonth: function(date, dir){
			if (!date)
				return undefined;
			if (!dir)
				return date;
			var new_date = new Date(date.valueOf()),
				day = new_date.getUTCDate(),
				month = new_date.getUTCMonth(),
				mag = Math.abs(dir),
				new_month, test;
			dir = dir > 0 ? 1 : -1;
			if (mag === 1){
				test = dir === -1
					// If going back one month, make sure month is not current month
					// (eg, Mar 31 -> Feb 31 == Feb 28, not Mar 02)
					? function(){
						return new_date.getUTCMonth() === month;
					}
					// If going forward one month, make sure month is as expected
					// (eg, Jan 31 -> Feb 31 == Feb 28, not Mar 02)
					: function(){
						return new_date.getUTCMonth() !== new_month;
					};
				new_month = month + dir;
				new_date.setUTCMonth(new_month);
				// Dec -> Jan (12) or Jan -> Dec (-1) -- limit expected date to 0-11
				if (new_month < 0 || new_month > 11)
					new_month = (new_month + 12) % 12;
			}
			else {
				// For magnitudes >1, move one month at a time...
				for (var i=0; i < mag; i++)
					// ...which might decrease the day (eg, Jan 31 to Feb 28, etc)...
					new_date = this.moveMonth(new_date, dir);
				// ...then reset the day, keeping it in the new month
				new_month = new_date.getUTCMonth();
				new_date.setUTCDate(day);
				test = function(){
					return new_month !== new_date.getUTCMonth();
				};
			}
			// Common date-resetting loop -- if date is beyond end of month, make it
			// end of month
			while (test()){
				new_date.setUTCDate(--day);
				new_date.setUTCMonth(new_month);
			}
			return new_date;
		},

		moveYear: function(date, dir){
			return this.moveMonth(date, dir*12);
		},

		dateWithinRange: function(date){
			return date >= this.o.startDate && date <= this.o.endDate;
		},

		keydown: function(e){
			if (this.picker.is(':not(:visible)')){
				if (e.keyCode === 27) // allow escape to hide and re-show picker
					this.show();
				return;
			}
			var dateChanged = false,
				dir, newDate, newViewDate,
				focusDate = this.focusDate || this.viewDate;
			switch (e.keyCode){
				case 27: // escape
					if (this.focusDate){
						this.focusDate = null;
						this.viewDate = this.dates.get(-1) || this.viewDate;
						this.fill();
					}
					else
						this.hide();
					e.preventDefault();
					break;
				case 37: // left
				case 39: // right
					if (!this.o.keyboardNavigation)
						break;
					dir = e.keyCode === 37 ? -1 : 1;
					if (e.ctrlKey){
						newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveYear(focusDate, dir);
						this._trigger('changeYear', this.viewDate);
					}
					else if (e.shiftKey){
						newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveMonth(focusDate, dir);
						this._trigger('changeMonth', this.viewDate);
					}
					else {
						newDate = new Date(this.dates.get(-1) || UTCToday());
						newDate.setUTCDate(newDate.getUTCDate() + dir);
						newViewDate = new Date(focusDate);
						newViewDate.setUTCDate(focusDate.getUTCDate() + dir);
					}
					if (this.dateWithinRange(newDate)){
						this.focusDate = this.viewDate = newViewDate;
						this.setValue();
						this.fill();
						e.preventDefault();
					}
					break;
				case 38: // up
				case 40: // down
					if (!this.o.keyboardNavigation)
						break;
					dir = e.keyCode === 38 ? -1 : 1;
					if (e.ctrlKey){
						newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveYear(focusDate, dir);
						this._trigger('changeYear', this.viewDate);
					}
					else if (e.shiftKey){
						newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveMonth(focusDate, dir);
						this._trigger('changeMonth', this.viewDate);
					}
					else {
						newDate = new Date(this.dates.get(-1) || UTCToday());
						newDate.setUTCDate(newDate.getUTCDate() + dir * 7);
						newViewDate = new Date(focusDate);
						newViewDate.setUTCDate(focusDate.getUTCDate() + dir * 7);
					}
					if (this.dateWithinRange(newDate)){
						this.focusDate = this.viewDate = newViewDate;
						this.setValue();
						this.fill();
						e.preventDefault();
					}
					break;
				case 32: // spacebar
					// Spacebar is used in manually typing dates in some formats.
					// As such, its behavior should not be hijacked.
					break;
				case 13: // enter
					focusDate = this.focusDate || this.dates.get(-1) || this.viewDate;
					this._toggle_multidate(focusDate);
					dateChanged = true;
					this.focusDate = null;
					this.viewDate = this.dates.get(-1) || this.viewDate;
					this.setValue();
					this.fill();
					if (this.picker.is(':visible')){
						e.preventDefault();
						if (this.o.autoclose)
							this.hide();
					}
					break;
				case 9: // tab
					this.focusDate = null;
					this.viewDate = this.dates.get(-1) || this.viewDate;
					this.fill();
					this.hide();
					break;
			}
			if (dateChanged){
				if (this.dates.length)
					this._trigger('changeDate');
				else
					this._trigger('clearDate');
				var element;
				if (this.isInput){
					element = this.element;
				}
				else if (this.component){
					element = this.element.find('input');
				}
				if (element){
					element.change();
				}
			}
		},

		showMode: function(dir){
			if (dir){
				this.viewMode = Math.max(this.o.minViewMode, Math.min(2, this.viewMode + dir));
			}
			this.picker
				.find('>div')
				.hide()
				.filter('.datepicker-'+DPGlobal.modes[this.viewMode].clsName)
					.css('display', 'block');
			this.updateNavArrows();
		}
	};

	var DateRangePicker = function(element, options){
		this.element = $(element);
		this.inputs = $.map(options.inputs, function(i){
			return i.jquery ? i[0] : i;
		});
		delete options.inputs;

		$(this.inputs)
			.datepicker(options)
			.bind('changeDate', $.proxy(this.dateUpdated, this));

		this.pickers = $.map(this.inputs, function(i){
			return $(i).data('datepicker');
		});
		this.updateDates();
	};
	DateRangePicker.prototype = {
		updateDates: function(){
			this.dates = $.map(this.pickers, function(i){
				return i.getUTCDate();
			});
			this.updateRanges();
		},
		updateRanges: function(){
			var range = $.map(this.dates, function(d){
				return d.valueOf();
			});
			$.each(this.pickers, function(i, p){
				p.setRange(range);
			});
		},
		dateUpdated: function(e){
			// `this.updating` is a workaround for preventing infinite recursion
			// between `changeDate` triggering and `setUTCDate` calling.  Until
			// there is a better mechanism.
			if (this.updating)
				return;
			this.updating = true;

			var dp = $(e.target).data('datepicker'),
				new_date = dp.getUTCDate(),
				i = $.inArray(e.target, this.inputs),
				l = this.inputs.length;
			if (i === -1)
				return;

			$.each(this.pickers, function(i, p){
				if (!p.getUTCDate())
					p.setUTCDate(new_date);
			});

			if (new_date < this.dates[i]){
				// Date being moved earlier/left
				while (i >= 0 && new_date < this.dates[i]){
					this.pickers[i--].setUTCDate(new_date);
				}
			}
			else if (new_date > this.dates[i]){
				// Date being moved later/right
				while (i < l && new_date > this.dates[i]){
					this.pickers[i++].setUTCDate(new_date);
				}
			}
			this.updateDates();

			delete this.updating;
		},
		remove: function(){
			$.map(this.pickers, function(p){ p.remove(); });
			delete this.element.data().datepicker;
		}
	};

	function opts_from_el(el, prefix){
		// Derive options from element data-attrs
		var data = $(el).data(),
			out = {}, inkey,
			replace = new RegExp('^' + prefix.toLowerCase() + '([A-Z])');
		prefix = new RegExp('^' + prefix.toLowerCase());
		function re_lower(_,a){
			return a.toLowerCase();
		}
		for (var key in data)
			if (prefix.test(key)){
				inkey = key.replace(replace, re_lower);
				out[inkey] = data[key];
			}
		return out;
	}

	function opts_from_locale(lang){
		// Derive options from locale plugins
		var out = {};
		// Check if "de-DE" style date is available, if not language should
		// fallback to 2 letter code eg "de"
		if (!dates[lang]){
			lang = lang.split('-')[0];
			if (!dates[lang])
				return;
		}
		var d = dates[lang];
		$.each(locale_opts, function(i,k){
			if (k in d)
				out[k] = d[k];
		});
		return out;
	}

	var old = $.fn.datepicker;
	$.fn.datepicker = function(option){
		var args = Array.apply(null, arguments);
		args.shift();
		var internal_return;
		this.each(function(){
			var $this = $(this),
				data = $this.data('datepicker'),
				options = typeof option === 'object' && option;
			if (!data){
				var elopts = opts_from_el(this, 'date'),
					// Preliminary otions
					xopts = $.extend({}, defaults, elopts, options),
					locopts = opts_from_locale(xopts.language),
					// Options priority: js args, data-attrs, locales, defaults
					opts = $.extend({}, defaults, locopts, elopts, options);
				if ($this.is('.input-daterange') || opts.inputs){
					var ropts = {
						inputs: opts.inputs || $this.find('input').toArray()
					};
					$this.data('datepicker', (data = new DateRangePicker(this, $.extend(opts, ropts))));
				}
				else {
					$this.data('datepicker', (data = new Datepicker(this, opts)));
				}
			}
			if (typeof option === 'string' && typeof data[option] === 'function'){
				internal_return = data[option].apply(data, args);
				if (internal_return !== undefined)
					return false;
			}
		});
		if (internal_return !== undefined)
			return internal_return;
		else
			return this;
	};

	var defaults = $.fn.datepicker.defaults = {
		autoclose: false,
		beforeShowDay: $.noop,
		calendarWeeks: false,
		clearBtn: false,
		daysOfWeekDisabled: [],
		endDate: Infinity,
		forceParse: true,
		format: 'mm/dd/yyyy',
		keyboardNavigation: true,
		language: 'en',
		minViewMode: 0,
		multidate: false,
		multidateSeparator: ',',
		orientation: "auto",
		rtl: false,
		startDate: -Infinity,
		startView: 0,
		todayBtn: false,
		todayHighlight: false,
		weekStart: 0
	};
	var locale_opts = $.fn.datepicker.locale_opts = [
		'format',
		'rtl',
		'weekStart'
	];
	$.fn.datepicker.Constructor = Datepicker;
	var dates = $.fn.datepicker.dates = {
		en: {
			days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
			daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
			daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
			months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			today: "Today",
			clear: "Clear"
		}
	};

	var DPGlobal = {
		modes: [
			{
				clsName: 'days',
				navFnc: 'Month',
				navStep: 1
			},
			{
				clsName: 'months',
				navFnc: 'FullYear',
				navStep: 1
			},
			{
				clsName: 'years',
				navFnc: 'FullYear',
				navStep: 10
		}],
		isLeapYear: function(year){
			return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
		},
		getDaysInMonth: function(year, month){
			return [31, (DPGlobal.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
		},
		validParts: /dd?|DD?|mm?|MM?|yy(?:yy)?/g,
		nonpunctuation: /[^ -\/:-@\[\u3400-\u9fff-`{-~\t\n\r]+/g,
		parseFormat: function(format){
			// IE treats \0 as a string end in inputs (truncating the value),
			// so it's a bad format delimiter, anyway
			var separators = format.replace(this.validParts, '\0').split('\0'),
				parts = format.match(this.validParts);
			if (!separators || !separators.length || !parts || parts.length === 0){
				throw new Error("Invalid date format.");
			}
			return {separators: separators, parts: parts};
		},
		parseDate: function(date, format, language){
			if (!date)
				return undefined;
			if (date instanceof Date)
				return date;
			if (typeof format === 'string')
				format = DPGlobal.parseFormat(format);
			var part_re = /([\-+]\d+)([dmwy])/,
				parts = date.match(/([\-+]\d+)([dmwy])/g),
				part, dir, i;
			if (/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/.test(date)){
				date = new Date();
				for (i=0; i < parts.length; i++){
					part = part_re.exec(parts[i]);
					dir = parseInt(part[1]);
					switch (part[2]){
						case 'd':
							date.setUTCDate(date.getUTCDate() + dir);
							break;
						case 'm':
							date = Datepicker.prototype.moveMonth.call(Datepicker.prototype, date, dir);
							break;
						case 'w':
							date.setUTCDate(date.getUTCDate() + dir * 7);
							break;
						case 'y':
							date = Datepicker.prototype.moveYear.call(Datepicker.prototype, date, dir);
							break;
					}
				}
				return UTCDate(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(), 0, 0, 0);
			}
			parts = date && date.match(this.nonpunctuation) || [];
			date = new Date();
			var parsed = {},
				setters_order = ['yyyy', 'yy', 'M', 'MM', 'm', 'mm', 'd', 'dd'],
				setters_map = {
					yyyy: function(d,v){
						return d.setUTCFullYear(v);
					},
					yy: function(d,v){
						return d.setUTCFullYear(2000+v);
					},
					m: function(d,v){
						if (isNaN(d))
							return d;
						v -= 1;
						while (v < 0) v += 12;
						v %= 12;
						d.setUTCMonth(v);
						while (d.getUTCMonth() !== v)
							d.setUTCDate(d.getUTCDate()-1);
						return d;
					},
					d: function(d,v){
						return d.setUTCDate(v);
					}
				},
				val, filtered;
			setters_map['M'] = setters_map['MM'] = setters_map['mm'] = setters_map['m'];
			setters_map['dd'] = setters_map['d'];
			date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);
			var fparts = format.parts.slice();
			// Remove noop parts
			if (parts.length !== fparts.length){
				fparts = $(fparts).filter(function(i,p){
					return $.inArray(p, setters_order) !== -1;
				}).toArray();
			}
			// Process remainder
			function match_part(){
				var m = this.slice(0, parts[i].length),
					p = parts[i].slice(0, m.length);
				return m === p;
			}
			if (parts.length === fparts.length){
				var cnt;
				for (i=0, cnt = fparts.length; i < cnt; i++){
					val = parseInt(parts[i], 10);
					part = fparts[i];
					if (isNaN(val)){
						switch (part){
							case 'MM':
								filtered = $(dates[language].months).filter(match_part);
								val = $.inArray(filtered[0], dates[language].months) + 1;
								break;
							case 'M':
								filtered = $(dates[language].monthsShort).filter(match_part);
								val = $.inArray(filtered[0], dates[language].monthsShort) + 1;
								break;
						}
					}
					parsed[part] = val;
				}
				var _date, s;
				for (i=0; i < setters_order.length; i++){
					s = setters_order[i];
					if (s in parsed && !isNaN(parsed[s])){
						_date = new Date(date);
						setters_map[s](_date, parsed[s]);
						if (!isNaN(_date))
							date = _date;
					}
				}
			}
			return date;
		},
		formatDate: function(date, format, language){
			if (!date)
				return '';
			if (typeof format === 'string')
				format = DPGlobal.parseFormat(format);
			var val = {
				d: date.getUTCDate(),
				D: dates[language].daysShort[date.getUTCDay()],
				DD: dates[language].days[date.getUTCDay()],
				m: date.getUTCMonth() + 1,
				M: dates[language].monthsShort[date.getUTCMonth()],
				MM: dates[language].months[date.getUTCMonth()],
				yy: date.getUTCFullYear().toString().substring(2),
				yyyy: date.getUTCFullYear()
			};
			val.dd = (val.d < 10 ? '0' : '') + val.d;
			val.mm = (val.m < 10 ? '0' : '') + val.m;
			date = [];
			var seps = $.extend([], format.separators);
			for (var i=0, cnt = format.parts.length; i <= cnt; i++){
				if (seps.length)
					date.push(seps.shift());
				date.push(val[format.parts[i]]);
			}
			return date.join('');
		},
		headTemplate: '<thead>'+
							'<tr>'+
								'<th class="prev">&laquo;</th>'+
								'<th colspan="5" class="datepicker-switch"></th>'+
								'<th class="next">&raquo;</th>'+
							'</tr>'+
						'</thead>',
		contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>',
		footTemplate: '<tfoot>'+
							'<tr>'+
								'<th colspan="7" class="today"></th>'+
							'</tr>'+
							'<tr>'+
								'<th colspan="7" class="clear"></th>'+
							'</tr>'+
						'</tfoot>'
	};
	DPGlobal.template = '<div class="datepicker">'+
							'<div class="datepicker-days">'+
								'<table class=" table-condensed">'+
									DPGlobal.headTemplate+
									'<tbody></tbody>'+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
							'<div class="datepicker-months">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
							'<div class="datepicker-years">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
						'</div>';

	$.fn.datepicker.DPGlobal = DPGlobal;


	/* DATEPICKER NO CONFLICT
	* =================== */

	$.fn.datepicker.noConflict = function(){
		$.fn.datepicker = old;
		return this;
	};


	/* DATEPICKER DATA-API
	* ================== */

	$(document).on(
		'focus.datepicker.data-api click.datepicker.data-api',
		'[data-provide="datepicker"]',
		function(e){
			var $this = $(this);
			if ($this.data('datepicker'))
				return;
			e.preventDefault();
			// component click requires us to explicitly show it
			$this.datepicker('show');
		}
	);
	$(function(){
		$('[data-provide="datepicker-inline"]').datepicker();
	});

}(window.jQuery));

!function(a){a.fn.datepicker.dates.es={days:["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],daysShort:["Dom","Lun","Mar","Mié","Jue","Vie","Sáb"],daysMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],months:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],monthsShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],today:"Hoy",monthsTitle:"Meses",clear:"Borrar",weekStart:1,format:"dd/mm/yyyy"}}(jQuery);
/*
	Redactor v10.0.9
	Updated: March 16, 2015

	http://imperavi.com/redactor/

	Copyright (c) 2009-2015, Imperavi LLC.
	License: http://imperavi.com/redactor/license/

	Usage: $('#content').redactor();
*/

(function($)
{
	'use strict';

	if (!Function.prototype.bind)
	{
		Function.prototype.bind = function(scope)
		{
			var fn = this;
			return function()
			{
				return fn.apply(scope);
			};
		};
	}

	var uuid = 0;

	var reUrlYoutube = /https?:\/\/(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube\.com\S*[^\w\-\s])([\w\-]{11})(?=[^\w\-]|$)(?![?=&+%\w.\-]*(?:['"][^<>]*>|<\/a>))[?=&+%\w.-]*/ig;
	var reUrlVimeo = /https?:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;

	// Plugin
	$.fn.redactor = function(options)
	{
		var val = [];
		var args = Array.prototype.slice.call(arguments, 1);

		if (typeof options === 'string')
		{
			this.each(function()
			{
				var instance = $.data(this, 'redactor');
				var func;

				if (options.search(/\./) != '-1')
				{
					func = options.split('.');
					if (typeof instance[func[0]] != 'undefined')
					{
						func = instance[func[0]][func[1]];
					}
				}
				else
				{
					func = instance[options];
				}

				if (typeof instance !== 'undefined' && $.isFunction(func))
				{
					var methodVal = func.apply(instance, args);
					if (methodVal !== undefined && methodVal !== instance)
					{
						val.push(methodVal);
					}
				}
				else
				{
					$.error('No such method "' + options + '" for Redactor');
				}
			});
		}
		else
		{
			this.each(function()
			{
				$.data(this, 'redactor', {});
				$.data(this, 'redactor', Redactor(this, options));
			});
		}

		if (val.length === 0) return this;
		else if (val.length === 1) return val[0];
		else return val;

	};

	// Initialization
	function Redactor(el, options)
	{
		return new Redactor.prototype.init(el, options);
	}

	// Functionality
	$.Redactor = Redactor;
	$.Redactor.VERSION = '10.0.9';
	$.Redactor.modules = ['alignment', 'autosave', 'block', 'buffer', 'build', 'button',
						  'caret', 'clean', 'code', 'core', 'dropdown', 'file', 'focus',
						  'image', 'indent', 'inline', 'insert', 'keydown', 'keyup',
						  'lang', 'line', 'link', 'list', 'modal', 'observe', 'paragraphize',
						  'paste', 'placeholder', 'progress', 'selection', 'shortcuts',
						  'tabifier', 'tidy',  'toolbar', 'upload', 'utils'];

	$.Redactor.opts = {

		// settings
		lang: 'en',
		direction: 'ltr', // ltr or rtl

		plugins: false, // array

		focus: false,
		focusEnd: false,

		placeholder: false,

		visual: true,
		tabindex: false,

		minHeight: false,
		maxHeight: false,

		linebreaks: false,
		replaceDivs: true,
		paragraphize: true,
		cleanStyleOnEnter: false,
		enterKey: true,

		cleanOnPaste: true,
		cleanSpaces: true,
		pastePlainText: false,

		autosave: false, // false or url
		autosaveName: false,
		autosaveInterval: 60, // seconds
		autosaveOnChange: false,
		autosaveFields: false,

		linkTooltip: true,
		linkProtocol: 'http',
		linkNofollow: false,
		linkSize: 50,

		imageEditable: true,
		imageLink: true,
		imagePosition: true,
		imageFloatMargin: '10px',
		imageResizable: true,

		imageUpload: null,
		imageUploadParam: 'file',

		uploadImageField: false,

		dragImageUpload: true,

		fileUpload: null,
		fileUploadParam: 'file',

		dragFileUpload: true,

		s3: false,

		convertLinks: true,
		convertUrlLinks: true,
		convertImageLinks: true,
		convertVideoLinks: true,

		preSpaces: 4, // or false
		tabAsSpaces: false, // true or number of spaces
		tabKey: true,

		scrollTarget: false,

		toolbar: true,
		toolbarFixed: true,
		toolbarFixedTarget: document,
		toolbarFixedTopOffset: 0, // pixels
		toolbarExternal: false, // ID selector
		toolbarOverflow: false,

		source: true,
		buttons: ['html', 'formatting', 'bold', 'italic', 'deleted', 'unorderedlist', 'orderedlist',
				  'outdent', 'indent', 'image', 'file', 'link', 'alignment', 'horizontalrule'], // + 'underline'

		buttonsHide: [],
		buttonsHideOnMobile: [],

		formatting: ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
		formattingAdd: false,

		tabifier: true,

		deniedTags: ['script', 'style'],
		allowedTags: false, // or array

		removeComments: false,
		replaceTags: [
			['strike', 'del']
		],
		replaceStyles: [
            ['font-weight:\\s?bold', "strong"],
            ['font-style:\\s?italic', "em"],
            ['text-decoration:\\s?underline', "u"],
            ['text-decoration:\\s?line-through', 'del']
        ],
        removeDataAttr: false,

		removeAttr: false, // or multi array
		allowedAttr: false, // or multi array

		removeWithoutAttr: ['span'], // or false
		removeEmpty: ['p'], // or false;

		activeButtons: ['deleted', 'italic', 'bold', 'underline', 'unorderedlist', 'orderedlist',
						'alignleft', 'aligncenter', 'alignright', 'justify'],
		activeButtonsStates: {
			b: 'bold',
			strong: 'bold',
			i: 'italic',
			em: 'italic',
			del: 'deleted',
			strike: 'deleted',
			ul: 'unorderedlist',
			ol: 'orderedlist',
			u: 'underline'
		},

		shortcuts: {
			'ctrl+shift+m, meta+shift+m': { func: 'inline.removeFormat' },
			'ctrl+b, meta+b': { func: 'inline.format', params: ['bold'] },
			'ctrl+i, meta+i': { func: 'inline.format', params: ['italic'] },
			'ctrl+h, meta+h': { func: 'inline.format', params: ['superscript'] },
			'ctrl+l, meta+l': { func: 'inline.format', params: ['subscript'] },
			'ctrl+k, meta+k': { func: 'link.show' },
			'ctrl+shift+7':   { func: 'list.toggle', params: ['orderedlist'] },
			'ctrl+shift+8':   { func: 'list.toggle', params: ['unorderedlist'] }
		},
		shortcutsAdd: false,

		// private
		buffer: [],
		rebuffer: [],
		emptyHtml: '<p>&#x200b;</p>',
		invisibleSpace: '&#x200b;',
		imageTypes: ['image/png', 'image/jpeg', 'image/gif'],
		indentValue: 20,
		verifiedTags: 		['a', 'img', 'b', 'strong', 'sub', 'sup', 'i', 'em', 'u', 'small', 'strike', 'del', 'cite', 'ul', 'ol', 'li'], // and for span tag special rule
		inlineTags: 		['strong', 'b', 'u', 'em', 'i', 'code', 'del', 'ins', 'samp', 'kbd', 'sup', 'sub', 'mark', 'var', 'cite', 'small'],
		alignmentTags: 		['P', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6',  'DL', 'DT', 'DD', 'DIV', 'TD', 'BLOCKQUOTE', 'OUTPUT', 'FIGCAPTION', 'ADDRESS', 'SECTION', 'HEADER', 'FOOTER', 'ASIDE', 'ARTICLE'],
		blockLevelElements: ['PRE', 'UL', 'OL', 'LI'],


		// lang
		langs: {
			en: {
				html: 'HTML',
				video: 'Insert Video',
				image: 'Insert Image',
				table: 'Table',
				link: 'Link',
				link_insert: 'Insert link',
				link_edit: 'Edit link',
				unlink: 'Unlink',
				formatting: 'Formatting',
				paragraph: 'Normal text',
				quote: 'Quote',
				code: 'Code',
				header1: 'Header 1',
				header2: 'Header 2',
				header3: 'Header 3',
				header4: 'Header 4',
				header5: 'Header 5',
				bold: 'Bold',
				italic: 'Italic',
				fontcolor: 'Font Color',
				backcolor: 'Back Color',
				unorderedlist: 'Unordered List',
				orderedlist: 'Ordered List',
				outdent: 'Outdent',
				indent: 'Indent',
				cancel: 'Cancel',
				insert: 'Insert',
				save: 'Save',
				_delete: 'Delete',
				insert_table: 'Insert Table',
				insert_row_above: 'Add Row Above',
				insert_row_below: 'Add Row Below',
				insert_column_left: 'Add Column Left',
				insert_column_right: 'Add Column Right',
				delete_column: 'Delete Column',
				delete_row: 'Delete Row',
				delete_table: 'Delete Table',
				rows: 'Rows',
				columns: 'Columns',
				add_head: 'Add Head',
				delete_head: 'Delete Head',
				title: 'Title',
				image_position: 'Position',
				none: 'None',
				left: 'Left',
				right: 'Right',
				center: 'Center',
				image_web_link: 'Image Web Link',
				text: 'Text',
				mailto: 'Email',
				web: 'URL',
				video_html_code: 'Video Embed Code or Youtube/Vimeo Link',
				file: 'Insert File',
				upload: 'Upload',
				download: 'Download',
				choose: 'Choose',
				or_choose: 'Or choose',
				drop_file_here: 'Drop file here',
				align_left: 'Align text to the left',
				align_center: 'Center text',
				align_right: 'Align text to the right',
				align_justify: 'Justify text',
				horizontalrule: 'Insert Horizontal Rule',
				deleted: 'Deleted',
				anchor: 'Anchor',
				link_new_tab: 'Open link in new tab',
				underline: 'Underline',
				alignment: 'Alignment',
				filename: 'Name (optional)',
				edit: 'Edit',
				upload_label: 'Drop file here or '

			}
		}
	};

	// Functionality
	Redactor.fn = $.Redactor.prototype = {

		keyCode: {
			BACKSPACE: 8,
			DELETE: 46,
			DOWN: 40,
			ENTER: 13,
			SPACE: 32,
			ESC: 27,
			TAB: 9,
			CTRL: 17,
			META: 91,
			SHIFT: 16,
			ALT: 18,
			RIGHT: 39,
			LEFT: 37,
			LEFT_WIN: 91
		},

		// Initialization
		init: function(el, options)
		{
			this.$element = $(el);
			this.uuid = uuid++;

			// if paste event detected = true
			this.rtePaste = false;
			this.$pasteBox = false;

			this.loadOptions(options);
			this.loadModules();

			// formatting storage
			this.formatting = {};

			// block level tags
			$.merge(this.opts.blockLevelElements, this.opts.alignmentTags);
			this.reIsBlock = new RegExp('^(' + this.opts.blockLevelElements.join('|' ) + ')$', 'i');

			// setup allowed and denied tags
			this.tidy.setupAllowed();

			// setup denied tags
			if (this.opts.deniedTags !== false)
			{
				var tags = ['html', 'head', 'link', 'body', 'meta', 'applet'];
				for (var i = 0; i < tags.length; i++)
				{
					this.opts.deniedTags.push(tags[i]);
				}
			}

			// load lang
			this.lang.load();

			// extend shortcuts
			$.extend(this.opts.shortcuts, this.opts.shortcutsAdd);

			// start callback
			this.core.setCallback('start');

			// build
			this.start = true;
			this.build.run();
		},

		loadOptions: function(options)
		{
			this.opts = $.extend(
				{},
				$.extend(true, {}, $.Redactor.opts),
				this.$element.data(),
				options
			);
		},
		getModuleMethods: function(object)
		{
			return Object.getOwnPropertyNames(object).filter(function(property)
			{
				return typeof object[property] == 'function';
			});
		},
		loadModules: function()
		{
			var len = $.Redactor.modules.length;
			for (var i = 0; i < len; i++)
			{
				this.bindModuleMethods($.Redactor.modules[i]);
			}
		},
		bindModuleMethods: function(module)
		{
			if (typeof this[module] == 'undefined') return;

			// init module
			this[module] = this[module]();

			var methods = this.getModuleMethods(this[module]);
			var len = methods.length;

			// bind methods
			for (var z = 0; z < len; z++)
			{
				this[module][methods[z]] = this[module][methods[z]].bind(this);
			}
		},

		alignment: function()
		{
			return {
				left: function()
				{
					this.alignment.set('');
				},
				right: function()
				{
					this.alignment.set('right');
				},
				center: function()
				{
					this.alignment.set('center');
				},
				justify: function()
				{
					this.alignment.set('justify');
				},
				set: function(type)
				{
					// focus
					if (!this.utils.browser('msie')) this.$editor.focus();

					this.buffer.set();
					this.selection.save();

					// get blocks
					this.alignment.blocks = this.selection.getBlocks();
					this.alignment.type = type;

					// set alignment
					if (this.alignment.isLinebreaksOrNoBlocks())
					{
						this.alignment.setText();
					}
					else
					{
						this.alignment.setBlocks();
					}

					// sync
					this.selection.restore();
					this.code.sync();
				},
				setText: function()
				{
					var wrapper = this.selection.wrap('div');
					$(wrapper).attr('data-tagblock', 'redactor').css('text-align', this.alignment.type);
				},
				setBlocks: function()
				{
					$.each(this.alignment.blocks, $.proxy(function(i, el)
					{
						var $el = this.utils.getAlignmentElement(el);
						if (!$el) return;

						if (this.alignment.isNeedReplaceElement($el))
						{
							this.alignment.replaceElement($el);
						}
						else
						{
							this.alignment.alignElement($el);
						}

					}, this));
				},
				isLinebreaksOrNoBlocks: function()
				{
					return (this.opts.linebreaks && this.alignment.blocks[0] === false);
				},
				isNeedReplaceElement: function($el)
				{
					return (this.alignment.type === '' && typeof($el.data('tagblock')) !== 'undefined');
				},
				replaceElement: function($el)
				{
					$el.replaceWith($el.html());
				},
				alignElement: function($el)
				{
					$el.css('text-align', this.alignment.type);
					this.utils.removeEmptyAttr($el, 'style');
				}
			};
		},
		autosave: function()
		{
			return {
				enable: function()
				{
					if (!this.opts.autosave) return;

					this.autosave.html = false;
					this.autosave.name = (this.opts.autosaveName) ? this.opts.autosaveName : this.$textarea.attr('name');

					if (this.opts.autosaveOnChange) return;
					this.autosaveInterval = setInterval(this.autosave.load, this.opts.autosaveInterval * 1000);
				},
				onChange: function()
				{
					if (!this.opts.autosaveOnChange) return;
					this.autosave.load();
				},
				load: function()
				{
					this.autosave.source = this.code.get();

					if (this.autosave.html === this.autosave.source) return;
					if (this.utils.isEmpty(this.autosave.source)) return;

					// data
					var data = {};
					data['name'] = this.autosave.name;
					data[this.autosave.name] = this.autosave.source;
					data = this.autosave.getHiddenFields(data);

					// ajax
					var jsxhr = $.ajax({
						url: this.opts.autosave,
						type: 'post',
						data: data
					});

					jsxhr.done(this.autosave.success);
				},
				getHiddenFields: function(data)
				{
					if (this.opts.autosaveFields === false || typeof this.opts.autosaveFields !== 'object')
					{
						return data;
					}

					$.each(this.opts.autosaveFields, $.proxy(function(k, v)
					{
						if (v !== null && v.toString().indexOf('#') === 0) v = $(v).val();
						data[k] = v;

					}, this));

					return data;

				},
				success: function(data)
				{
					var json;
					try
					{
						json = $.parseJSON(data);
					}
					catch(e)
					{
						//data has already been parsed
						json = data;
					}

					var callbackName = (typeof json.error == 'undefined') ? 'autosave' :  'autosaveError';

					this.core.setCallback(callbackName, this.autosave.name, json);
					this.autosave.html = this.autosave.source;
				},
				disable: function()
				{
					clearInterval(this.autosaveInterval);
				}
			};
		},
		block: function()
		{
			return {
				formatting: function(name)
				{
					this.block.clearStyle = false;
					var type, value;

					if (typeof this.formatting[name].data != 'undefined') type = 'data';
					else if (typeof this.formatting[name].attr != 'undefined') type = 'attr';
					else if (typeof this.formatting[name]['class'] != 'undefined') type = 'class';

					if (typeof this.formatting[name].clear != 'undefined')
					{
						this.block.clearStyle = true;
					}

					if (type) value = this.formatting[name][type];

					this.block.format(this.formatting[name].tag, type, value);

				},
				format: function(tag, type, value)
				{
					if (tag == 'quote') tag = 'blockquote';

					var formatTags = ['p', 'pre', 'blockquote', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
					if ($.inArray(tag, formatTags) == -1) return;

					this.block.isRemoveInline = (tag == 'pre' || tag.search(/h[1-6]/i) != -1);

					// focus
					if (!this.utils.browser('msie')) this.$editor.focus();

					this.block.blocks = this.selection.getBlocks();

					this.block.blocksSize = this.block.blocks.length;
					this.block.type = type;
					this.block.value = value;

					this.buffer.set();
					this.selection.save();

					this.block.set(tag);

					this.selection.restore();
					this.code.sync();

				},
				set: function(tag)
				{
					this.selection.get();
					this.block.containerTag = this.range.commonAncestorContainer.tagName;

					if (this.range.collapsed)
					{
						this.block.setCollapsed(tag);
					}
					else
					{
						this.block.setMultiple(tag);
					}
				},
				setCollapsed: function(tag)
				{
					var block = this.block.blocks[0];
					if (block === false) return;

					if (block.tagName == 'LI')
					{
						if (tag != 'blockquote') return;

						this.block.formatListToBlockquote();
						return;
					}

					var isContainerTable = (this.block.containerTag  == 'TD' || this.block.containerTag  == 'TH');
					if (isContainerTable && !this.opts.linebreaks)
					{

						document.execCommand('formatblock', false, '<' + tag + '>');

						block = this.selection.getBlock();
						this.block.toggle($(block));

					}
					else if (block.tagName.toLowerCase() != tag)
					{
						if (this.opts.linebreaks && tag == 'p')
						{
							$(block).prepend('<br>').append('<br>');
							this.utils.replaceWithContents(block);
						}
						else
						{
							var $formatted = this.utils.replaceToTag(block, tag);

							this.block.toggle($formatted);

							if (tag != 'p' && tag != 'blockquote') $formatted.find('img').remove();
							if (this.block.isRemoveInline) this.utils.removeInlineTags($formatted);
							if (tag == 'p' || this.block.headTag) $formatted.find('p').contents().unwrap();

							this.block.formatTableWrapping($formatted);
						}
					}
					else if (tag == 'blockquote' && block.tagName.toLowerCase() == tag)
					{
						// blockquote off
						if (this.opts.linebreaks)
						{
							$(block).prepend('<br>').append('<br>');
							this.utils.replaceWithContents(block);
						}
						else
						{
							var $el = this.utils.replaceToTag(block, 'p');
							this.block.toggle($el);
						}
					}
					else if (block.tagName.toLowerCase() == tag)
					{
						this.block.toggle($(block));
					}

					if (typeof this.block.type == 'undefined' && typeof this.block.value == 'undefined')
					{
						$(block).removeAttr('class').removeAttr('style');
					}

				},
				setMultiple: function(tag)
				{
					var block = this.block.blocks[0];
					var isContainerTable = (this.block.containerTag  == 'TD' || this.block.containerTag  == 'TH');

					if (block !== false && this.block.blocksSize === 1)
					{
						if (block.tagName.toLowerCase() == tag &&  tag == 'blockquote')
						{
							// blockquote off
							if (this.opts.linebreaks)
							{
								$(block).prepend('<br>').append('<br>');
								this.utils.replaceWithContents(block);
							}
							else
							{
								var $el = this.utils.replaceToTag(block, 'p');
								this.block.toggle($el);
							}
						}
						else if (block.tagName == 'LI')
						{
							if (tag != 'blockquote') return;

							this.block.formatListToBlockquote();
						}
						else if (this.block.containerTag == 'BLOCKQUOTE')
						{
							this.block.formatBlockquote(tag);
						}
						else if (this.opts.linebreaks && ((isContainerTable) || (this.range.commonAncestorContainer != block)))
						{
							this.block.formatWrap(tag);
						}
						else
						{
							if (this.opts.linebreaks && tag == 'p')
							{
								$(block).prepend('<br>').append('<br>');
								this.utils.replaceWithContents(block);
							}
							else if (block.tagName === 'TD')
							{
								this.block.formatWrap(tag);
							}
							else
							{
								var $formatted = this.utils.replaceToTag(block, tag);

								this.block.toggle($formatted);

								if (this.block.isRemoveInline) this.utils.removeInlineTags($formatted);
								if (tag == 'p' || this.block.headTag) $formatted.find('p').contents().unwrap();
							}
						}
					}
					else
					{

						if (this.opts.linebreaks || tag != 'p')
						{
							if (tag == 'blockquote')
							{
								var count = 0;
								for (var i = 0; i < this.block.blocksSize; i++)
								{
									if (this.block.blocks[i].tagName == 'BLOCKQUOTE') count++;
								}

								// only blockquote selected
								if (count == this.block.blocksSize)
								{
									$.each(this.block.blocks, $.proxy(function(i,s)
									{
										var $formatted = false;
										if (this.opts.linebreaks)
										{
											$(s).prepend('<br>').append('<br>');
											$formatted = this.utils.replaceWithContents(s);
										}
										else
										{
											$formatted = this.utils.replaceToTag(s, 'p');
										}

										if ($formatted && typeof this.block.type == 'undefined' && typeof this.block.value == 'undefined')
										{
											$formatted.removeAttr('class').removeAttr('style');
										}

									}, this));

									return;
								}

							}


							this.block.formatWrap(tag);
						}
						else
						{
							var classSize = 0;
							var toggleType = false;
							if (this.block.type == 'class')
							{
								toggleType = 'toggle';
								classSize = $(this.block.blocks).filter('.' + this.block.value).length;

								if (this.block.blocksSize == classSize) toggleType = 'toggle';
								else if (this.block.blocksSize > classSize) toggleType = 'set';
								else if (classSize === 0) toggleType = 'set';

							}

							var exceptTags = ['ul', 'ol', 'li', 'td', 'th', 'dl', 'dt', 'dd'];
							$.each(this.block.blocks, $.proxy(function(i,s)
							{
								if ($.inArray(s.tagName.toLowerCase(), exceptTags) != -1) return;

								var $formatted = this.utils.replaceToTag(s, tag);

								if (toggleType)
								{
									if (toggleType == 'toggle') this.block.toggle($formatted);
									else if (toggleType == 'remove') this.block.remove($formatted);
									else if (toggleType == 'set') this.block.setForce($formatted);
								}
								else this.block.toggle($formatted);

								if (tag != 'p' && tag != 'blockquote') $formatted.find('img').remove();
								if (this.block.isRemoveInline) this.utils.removeInlineTags($formatted);
								if (tag == 'p' || this.block.headTag) $formatted.find('p').contents().unwrap();

								if (typeof this.block.type == 'undefined' && typeof this.block.value == 'undefined')
								{
									$formatted.removeAttr('class').removeAttr('style');
								}


							}, this));
						}
					}
				},
				setForce: function($el)
				{
					// remove style and class if the specified setting
					if (this.block.clearStyle)
					{
						$el.removeAttr('class').removeAttr('style');
					}

					if (this.block.type == 'class')
					{
						$el.addClass(this.block.value);
						return;
					}
					else if (this.block.type == 'attr' || this.block.type == 'data')
					{
						$el.attr(this.block.value.name, this.block.value.value);
						return;
					}
				},
				toggle: function($el)
				{
					// remove style and class if the specified setting
					if (this.block.clearStyle)
					{
						$el.removeAttr('class').removeAttr('style');
					}

					if (this.block.type == 'class')
					{
						$el.toggleClass(this.block.value);
						return;
					}
					else if (this.block.type == 'attr' || this.block.type == 'data')
					{
						if ($el.attr(this.block.value.name) == this.block.value.value)
						{
							$el.removeAttr(this.block.value.name);
						}
						else
						{
							$el.attr(this.block.value.name, this.block.value.value);
						}

						return;
					}
					else
					{
						$el.removeAttr('style class');
						return;
					}
				},
				remove: function($el)
				{
					$el.removeClass(this.block.value);
				},
				formatListToBlockquote: function()
				{
					var block = $(this.block.blocks[0]).closest('ul, ol');

					$(block).find('ul, ol').contents().unwrap();
					$(block).find('li').append($('<br>')).contents().unwrap();

					var $el = this.utils.replaceToTag(block, 'blockquote');
					this.block.toggle($el);
				},
				formatBlockquote: function(tag)
				{
					document.execCommand('outdent');
					document.execCommand('formatblock', false, tag);

					this.clean.clearUnverified();
					this.$editor.find('p:empty').remove();

					var formatted = this.selection.getBlock();

					if (tag != 'p')
					{
						$(formatted).find('img').remove();
					}

					if (!this.opts.linebreaks)
					{
						this.block.toggle($(formatted));
					}

					this.$editor.find('ul, ol, tr, blockquote, p').each($.proxy(this.utils.removeEmpty, this));

					if (this.opts.linebreaks && tag == 'p')
					{
						this.utils.replaceWithContents(formatted);
					}

				},
				formatWrap: function(tag)
				{
					if (this.block.containerTag == 'UL' || this.block.containerTag == 'OL')
					{
						if (tag == 'blockquote')
						{
							this.block.formatListToBlockquote();
						}
						else
						{
							return;
						}
					}

					var formatted = this.selection.wrap(tag);
					if (formatted === false) return;

					var $formatted = $(formatted);

					this.block.formatTableWrapping($formatted);

					var $elements = $formatted.find(this.opts.blockLevelElements.join(',') + ', td, table, thead, tbody, tfoot, th, tr');

					if ((this.opts.linebreaks && tag == 'p') || tag == 'pre' || tag == 'blockquote')
					{
						$elements.append('<br />');
					}

					$elements.contents().unwrap();

					if (tag != 'p' && tag != 'blockquote') $formatted.find('img').remove();

					$.each(this.block.blocks, $.proxy(this.utils.removeEmpty, this));

					$formatted.append(this.selection.getMarker(2));

					if (!this.opts.linebreaks)
					{
						this.block.toggle($formatted);
					}

					this.$editor.find('ul, ol, tr, blockquote, p').each($.proxy(this.utils.removeEmpty, this));
					$formatted.find('blockquote:empty').remove();

					if (this.block.isRemoveInline)
					{
						this.utils.removeInlineTags($formatted);
					}

					if (this.opts.linebreaks && tag == 'p')
					{
						this.utils.replaceWithContents($formatted);
					}

				},
				formatTableWrapping: function($formatted)
				{
					if ($formatted.closest('table').length === 0) return;

					if ($formatted.closest('tr').length === 0) $formatted.wrap('<tr>');
					if ($formatted.closest('td').length === 0 && $formatted.closest('th').length === 0)
					{
						$formatted.wrap('<td>');
					}
				},
				removeData: function(name, value)
				{
					var blocks = this.selection.getBlocks();
					$(blocks).removeAttr('data-' + name);

					this.code.sync();
				},
				setData: function(name, value)
				{
					var blocks = this.selection.getBlocks();
					$(blocks).attr('data-' + name, value);

					this.code.sync();
				},
				toggleData: function(name, value)
				{
					var blocks = this.selection.getBlocks();
					$.each(blocks, function()
					{
						if ($(this).attr('data-' + name))
						{
							$(this).removeAttr('data-' + name);
						}
						else
						{
							$(this).attr('data-' + name, value);
						}
					});
				},
				removeAttr: function(attr, value)
				{
					var blocks = this.selection.getBlocks();
					$(blocks).removeAttr(attr);

					this.code.sync();
				},
				setAttr: function(attr, value)
				{
					var blocks = this.selection.getBlocks();
					$(blocks).attr(attr, value);

					this.code.sync();
				},
				toggleAttr: function(attr, value)
				{
					var blocks = this.selection.getBlocks();
					$.each(blocks, function()
					{
						if ($(this).attr(name))
						{
							$(this).removeAttr(name);
						}
						else
						{
							$(this).attr(name, value);
						}
					});
				},
				removeClass: function(className)
				{
					var blocks = this.selection.getBlocks();
					$(blocks).removeClass(className);

					this.utils.removeEmptyAttr(blocks, 'class');

					this.code.sync();
				},
				setClass: function(className)
				{
					var blocks = this.selection.getBlocks();
					$(blocks).addClass(className);

					this.code.sync();
				},
				toggleClass: function(className)
				{
					var blocks = this.selection.getBlocks();
					$(blocks).toggleClass(className);

					this.code.sync();
				}
			};
		},
		buffer: function()
		{
			return {
				set: function(type)
				{
					if (typeof type == 'undefined' || type == 'undo')
					{
						this.buffer.setUndo();
					}
					else
					{
						this.buffer.setRedo();
					}
				},
				setUndo: function()
				{
					this.selection.save();
					this.opts.buffer.push(this.$editor.html());
					this.selection.restore();
				},
				setRedo: function()
				{
					this.selection.save();
					this.opts.rebuffer.push(this.$editor.html());
					this.selection.restore();
				},
				getUndo: function()
				{
					this.$editor.html(this.opts.buffer.pop());
				},
				getRedo: function()
				{
					this.$editor.html(this.opts.rebuffer.pop());
				},
				add: function()
				{
					this.opts.buffer.push(this.$editor.html());
				},
				undo: function()
				{
					if (this.opts.buffer.length === 0) return;

					this.buffer.set('redo');
					this.buffer.getUndo();

					this.selection.restore();

					setTimeout($.proxy(this.observe.load, this), 50);
				},
				redo: function()
				{
					if (this.opts.rebuffer.length === 0) return;

					this.buffer.set('undo');
					this.buffer.getRedo();

					this.selection.restore();

					setTimeout($.proxy(this.observe.load, this), 50);
				}
			};
		},
		build: function()
		{
			return {
				run: function()
				{
					this.build.createContainerBox();
					this.build.loadContent();
					this.build.loadEditor();
					this.build.enableEditor();
					this.build.setCodeAndCall();
				},
				isTextarea: function()
				{
					return (this.$element[0].tagName === 'TEXTAREA');
				},
				createContainerBox: function()
				{
					this.$box = $('<div class="redactor-box" />');
				},
				createTextarea: function()
				{
					this.$textarea = $('<textarea />').attr('name', this.build.getTextareaName());
				},
				getTextareaName: function()
				{
					return ((typeof(name) == 'undefined')) ? 'content-' + this.uuid : this.$element.attr('id');
				},
				loadContent: function()
				{
					var func = (this.build.isTextarea()) ? 'val' : 'html';
					this.content = $.trim(this.$element[func]());
				},
				enableEditor: function()
				{
					this.$editor.attr({ 'contenteditable': true, 'dir': this.opts.direction });
				},
				loadEditor: function()
				{
					var func = (this.build.isTextarea()) ? 'fromTextarea' : 'fromElement';
					this.build[func]();
				},
				fromTextarea: function()
				{
					this.$editor = $('<div />');
					this.$textarea = this.$element;
					this.$box.insertAfter(this.$element).append(this.$editor).append(this.$element);
					this.$editor.addClass('redactor-editor');

					this.$element.hide();
				},
				fromElement: function()
				{
					this.$editor = this.$element;
					this.build.createTextarea();
					this.$box.insertAfter(this.$editor).append(this.$editor).append(this.$textarea);
					this.$editor.addClass('redactor-editor');

					this.$textarea.hide();
				},
				setCodeAndCall: function()
				{
					// set code
					this.code.set(this.content);

					this.build.setOptions();
					this.build.callEditor();

					// code mode
					if (this.opts.visual) return;
					setTimeout($.proxy(this.code.showCode, this), 200);
				},
				callEditor: function()
				{
					this.build.disableMozillaEditing();
					this.build.setEvents();
					this.build.setHelpers();

					// load toolbar
					if (this.opts.toolbar)
					{
						this.opts.toolbar = this.toolbar.init();
						this.toolbar.build();
					}

					// modal templates init
					this.modal.loadTemplates();

					// plugins
					this.build.plugins();

					// observers
					setTimeout($.proxy(this.observe.load, this), 4);

					// init callback
					this.core.setCallback('init');
				},
				setOptions: function()
				{
					// textarea direction
					$(this.$textarea).attr('dir', this.opts.direction);

					if (this.opts.linebreaks) this.$editor.addClass('redactor-linebreaks');

					if (this.opts.tabindex) this.$editor.attr('tabindex', this.opts.tabindex);

					if (this.opts.minHeight) this.$editor.css('minHeight', this.opts.minHeight);
					if (this.opts.maxHeight) this.$editor.css('maxHeight', this.opts.maxHeight);

				},
				setEventDropUpload: function(e)
				{
					e.preventDefault();

					if (!this.opts.dragImageUpload || !this.opts.dragFileUpload) return;

					var files = e.dataTransfer.files;
					this.upload.directUpload(files[0], e);
				},
				setEventDrop: function(e)
				{
					this.code.sync();
					setTimeout(this.clean.clearUnverified, 1);
					this.core.setCallback('drop', e);
				},
				setEvents: function()
				{
					// drop
					this.$editor.on('drop.redactor', $.proxy(function(e)
					{
						e = e.originalEvent || e;

						if (window.FormData === undefined || !e.dataTransfer) return true;

						if (e.dataTransfer.files.length === 0)
						{
							return this.build.setEventDrop(e);
						}
						else
						{
							this.build.setEventDropUpload(e);
						}

						setTimeout(this.clean.clearUnverified, 1);
						this.core.setCallback('drop', e);

					}, this));


					// click
					this.$editor.on('click.redactor', $.proxy(function(e)
					{
						var event = this.core.getEvent();
						var type = (event == 'click' || event == 'arrow') ? false : 'click';

						this.core.addEvent(type);
						this.utils.disableSelectAll();
						this.core.setCallback('click', e);

					}, this));

					// paste
					this.$editor.on('paste.redactor', $.proxy(this.paste.init, this));

					// keydown
					this.$editor.on('keydown.redactor', $.proxy(this.keydown.init, this));

					// keyup
					this.$editor.on('keyup.redactor', $.proxy(this.keyup.init, this));

					// textarea keydown
					if ($.isFunction(this.opts.codeKeydownCallback))
					{
						this.$textarea.on('keydown.redactor-textarea', $.proxy(this.opts.codeKeydownCallback, this));
					}

					// textarea keyup
					if ($.isFunction(this.opts.codeKeyupCallback))
					{
						this.$textarea.on('keyup.redactor-textarea', $.proxy(this.opts.codeKeyupCallback, this));
					}

					// focus
					if ($.isFunction(this.opts.focusCallback))
					{
						this.$editor.on('focus.redactor', $.proxy(this.opts.focusCallback, this));
					}

					var clickedElement;
					$(document).on('mousedown', function(e) { clickedElement = e.target; });

					// blur
					this.$editor.on('blur.redactor', $.proxy(function(e)
					{
						if (this.rtePaste) return;
						if (!this.build.isBlured(clickedElement)) return;

						this.utils.disableSelectAll();
						if ($.isFunction(this.opts.blurCallback)) this.core.setCallback('blur', e);

					}, this));
				},
				isBlured: function(clickedElement)
				{
					var $el = $(clickedElement);

					return (!$el.hasClass('redactor-toolbar, redactor-dropdown') && !$el.is('#redactor-modal') && $el.parents('.redactor-toolbar, .redactor-dropdown, #redactor-modal').length === 0);
				},
				setHelpers: function()
				{
					// autosave
					this.autosave.enable();

					// placeholder
					this.placeholder.enable();

					// focus
					if (this.opts.focus) setTimeout(this.focus.setStart, 100);
					if (this.opts.focusEnd) setTimeout(this.focus.setEnd, 100);

				},
				plugins: function()
				{
					if (!this.opts.plugins) return;
					if (!RedactorPlugins) return;

					$.each(this.opts.plugins, $.proxy(function(i, s)
					{
						if (typeof RedactorPlugins[s] === 'undefined') return;

						if ($.inArray(s, $.Redactor.modules) !== -1)
						{
							$.error('Plugin name "' + s + '" matches the name of the Redactor\'s module.');
							return;
						}

						if (!$.isFunction(RedactorPlugins[s])) return;

						this[s] = RedactorPlugins[s]();

						// get methods
						var methods = this.getModuleMethods(this[s]);
						var len = methods.length;

						// bind methods
						for (var z = 0; z < len; z++)
						{
							this[s][methods[z]] = this[s][methods[z]].bind(this);
						}

						if ($.isFunction(this[s].init)) this[s].init();


					}, this));

				},
				disableMozillaEditing: function()
				{
					if (!this.utils.browser('mozilla')) return;

					// FF fix
					try {
						document.execCommand('enableObjectResizing', false, false);
						document.execCommand('enableInlineTableEditing', false, false);
					} catch (e) {}
				}
			};
		},
		button: function()
		{
			return {
				build: function(btnName, btnObject)
				{
					var $button = $('<a href="#" class="re-icon re-' + btnName + '" rel="' + btnName + '" />').attr('tabindex', '-1');

					// click
					if (btnObject.func || btnObject.command || btnObject.dropdown)
					{
						this.button.setEvent($button, btnName, btnObject);
					}

					// dropdown
					if (btnObject.dropdown)
					{
						var $dropdown = $('<div class="redactor-dropdown redactor-dropdown-' + this.uuid + ' redactor-dropdown-box-' + btnName + '" style="display: none;">');
						$button.data('dropdown', $dropdown);
						this.dropdown.build(btnName, $dropdown, btnObject.dropdown);
					}

					// tooltip
					if (this.utils.isDesktop())
					{
						this.button.createTooltip($button, btnName, btnObject.title);
					}

					return $button;
				},
				setEvent: function($button, btnName, btnObject)
				{
					$button.on('touchstart click', $.proxy(function(e)
					{
						if ($button.hasClass('redactor-button-disabled')) return false;

						var type = 'func';
						var callback = btnObject.func;

						if (btnObject.command)
						{
							type = 'command';
							callback = btnObject.command;
						}
						else if (btnObject.dropdown)
						{
							type = 'dropdown';
							callback = false;
						}

						this.button.onClick(e, btnName, type, callback);

					}, this));
				},
				createTooltip: function($button, name, title)
				{
					var $tooltip = $('<span>').addClass('redactor-toolbar-tooltip redactor-toolbar-tooltip-' + name).hide().html(title);
					$tooltip.appendTo('body');

					$button.on('mouseover', function()
					{
						if ($(this).hasClass('redactor-button-disabled')) return;

						var pos = $button.offset();

						$tooltip.show();
						$tooltip.css({
							top: (pos.top + $button.innerHeight()) + 'px',
							left: (pos.left + $button.innerWidth()/2 - $tooltip.innerWidth()/2) + 'px'
						});
					});

					$button.on('mouseout', function()
					{
						$tooltip.hide();
					});

				},
				onClick: function(e, btnName, type, callback)
				{
					this.button.caretOffset = this.caret.getOffset();

					e.preventDefault();

					if (this.utils.browser('msie')) e.returnValue = false;

					if (type == 'command') this.inline.format(callback);
					else if (type == 'dropdown') this.dropdown.show(e, btnName);
					else this.button.onClickCallback(e, callback, btnName);
				},
				onClickCallback: function(e, callback, btnName)
				{
					var func;

					if ($.isFunction(callback)) callback.call(this, btnName);
					else if (callback.search(/\./) != '-1')
					{
						func = callback.split('.');
						if (typeof this[func[0]] == 'undefined') return;

						this[func[0]][func[1]](btnName);
					}
					else this[callback](btnName);

					this.observe.buttons(e, btnName);
				},
				get: function(key)
				{
					return this.$toolbar.find('a.re-' + key);
				},
				setActive: function(key)
				{
					this.button.get(key).addClass('redactor-act');
				},
				setInactive: function(key)
				{
					this.button.get(key).removeClass('redactor-act');
				},
				setInactiveAll: function(key)
				{
					if (typeof key === 'undefined')
					{
						this.$toolbar.find('a.re-icon').removeClass('redactor-act');
					}
					else
					{
						this.$toolbar.find('a.re-icon').not('.re-' + key).removeClass('redactor-act');
					}
				},
				setActiveInVisual: function()
				{
					this.$toolbar.find('a.re-icon').not('a.re-html').removeClass('redactor-button-disabled');
				},
				setInactiveInCode: function()
				{
					this.$toolbar.find('a.re-icon').not('a.re-html').addClass('redactor-button-disabled');
				},
				changeIcon: function(key, classname)
				{
					this.button.get(key).addClass('re-' + classname);
				},
				removeIcon: function(key, classname)
				{
					this.button.get(key).removeClass('re-' + classname);
				},
				setAwesome: function(key, name)
				{
					var $button = this.button.get(key);
					$button.removeClass('redactor-btn-image').addClass('fa-redactor-btn');
					$button.html('<i class="fa ' + name + '"></i>');
				},
				addCallback: function($btn, callback)
				{
					var type = (callback == 'dropdown') ? 'dropdown' : 'func';
					var key = $btn.attr('rel');
					$btn.on('touchstart click', $.proxy(function(e)
					{
						if ($btn.hasClass('redactor-button-disabled')) return false;
						this.button.onClick(e, key, type, callback);

					}, this));
				},
				addDropdown: function($btn, dropdown)
				{
					var key = $btn.attr('rel');
					this.button.addCallback($btn, 'dropdown');

					var $dropdown = $('<div class="redactor-dropdown redactor-dropdown-' + this.uuid + ' redactor-dropdown-box-' + key + '" style="display: none;">');
					$btn.data('dropdown', $dropdown);

					// build dropdown
					if (dropdown) this.dropdown.build(key, $dropdown, dropdown);

					return $dropdown;
				},
				add: function(key, title)
				{
					if (!this.opts.toolbar) return;

					var btn = this.button.build(key, { title: title });
					btn.addClass('redactor-btn-image');

					this.$toolbar.append($('<li>').append(btn));

					return btn;
				},
				addFirst: function(key, title)
				{
					if (!this.opts.toolbar) return;

					var btn = this.button.build(key, { title: title });
					btn.addClass('redactor-btn-image');
					this.$toolbar.prepend($('<li>').append(btn));

					return btn;
				},
				addAfter: function(afterkey, key, title)
				{
					if (!this.opts.toolbar) return;

					var btn = this.button.build(key, { title: title });
					btn.addClass('redactor-btn-image');
					var $btn = this.button.get(afterkey);

					if ($btn.length !== 0) $btn.parent().after($('<li>').append(btn));
					else this.$toolbar.append($('<li>').append(btn));

					return btn;
				},
				addBefore: function(beforekey, key, title)
				{
					if (!this.opts.toolbar) return;

					var btn = this.button.build(key, { title: title });
					btn.addClass('redactor-btn-image');
					var $btn = this.button.get(beforekey);

					if ($btn.length !== 0) $btn.parent().before($('<li>').append(btn));
					else this.$toolbar.append($('<li>').append(btn));

					return btn;
				},
				remove: function(key)
				{
					this.button.get(key).remove();
				}
			};
		},
		caret: function()
		{
			return {
				setStart: function(node)
				{
					// inline tag
					if (!this.utils.isBlock(node))
					{
						var space = this.utils.createSpaceElement();

						$(node).prepend(space);
						this.caret.setEnd(space);
					}
					else
					{
						this.caret.set(node, 0, node, 0);
					}
				},
				setEnd: function(node)
				{
					this.caret.set(node, 1, node, 1);
				},
				set: function(orgn, orgo, focn, foco)
				{
					// focus
					// disabled in 10.0.7
					// if (!this.utils.browser('msie')) this.$editor.focus();

					orgn = orgn[0] || orgn;
					focn = focn[0] || focn;

					if (this.utils.isBlockTag(orgn.tagName) && orgn.innerHTML === '')
					{
						orgn.innerHTML = this.opts.invisibleSpace;
					}

					if (orgn.tagName == 'BR' && this.opts.linebreaks === false)
					{
						var parent = $(this.opts.emptyHtml)[0];
						$(orgn).replaceWith(parent);
						orgn = parent;
						focn = orgn;
					}

					this.selection.get();

					try
					{
						this.range.setStart(orgn, orgo);
						this.range.setEnd(focn, foco);
					}
					catch (e) {}

					this.selection.addRange();
				},
				setAfter: function(node)
				{
					try
					{
						var tag = $(node)[0].tagName;

						// inline tag
						if (tag != 'BR' && !this.utils.isBlock(node))
						{
							var space = this.utils.createSpaceElement();

							$(node).after(space);
							this.caret.setEnd(space);
						}
						else
						{
							if (tag != 'BR' && this.utils.browser('msie'))
							{
								this.caret.setStart($(node).next());
							}
							else
							{
								this.caret.setAfterOrBefore(node, 'after');
							}
						}
					}
					catch (e)
					{
						var space = this.utils.createSpaceElement();
						$(node).after(space);
						this.caret.setEnd(space);
					}
				},
				setBefore: function(node)
				{
					// block tag
					if (this.utils.isBlock(node))
					{
						this.caret.setEnd($(node).prev());
					}
					else
					{
						this.caret.setAfterOrBefore(node, 'before');
					}
				},
				setAfterOrBefore: function(node, type)
				{
					// focus
					if (!this.utils.browser('msie')) this.$editor.focus();

					node = node[0] || node;

					this.selection.get();

					if (type == 'after')
					{
						try {

							this.range.setStartAfter(node);
							this.range.setEndAfter(node);
						}
						catch (e) {}
					}
					else
					{
						try {
							this.range.setStartBefore(node);
							this.range.setEndBefore(node);
						}
						catch (e) {}
					}


					this.range.collapse(false);
					this.selection.addRange();
				},
				getOffsetOfElement: function(node)
				{
					node = node[0] || node;

					this.selection.get();

					var cloned = this.range.cloneRange();
					cloned.selectNodeContents(node);
					cloned.setEnd(this.range.endContainer, this.range.endOffset);

					return $.trim(cloned.toString()).length;
				},
				getOffset: function()
				{
					var offset = 0;
				    var sel = window.getSelection();

				    if (sel.rangeCount > 0)
				    {
				        var range = window.getSelection().getRangeAt(0);
				        var caretRange = range.cloneRange();
				        caretRange.selectNodeContents(this.$editor[0]);
				        caretRange.setEnd(range.endContainer, range.endOffset);
				        offset = caretRange.toString().length;
				    }

					return offset;
				},
				setOffset: function(start, end)
				{
					if (typeof end == 'undefined') end = start;
					if (!this.focus.isFocused()) this.focus.setStart();

					var sel = this.selection.get();
					var node, offset = 0;
					var walker = document.createTreeWalker(this.$editor[0], NodeFilter.SHOW_TEXT, null, null);

					while (node = walker.nextNode())
					{
						offset += node.nodeValue.length;
						if (offset > start)
						{
							this.range.setStart(node, node.nodeValue.length + start - offset);
							start = Infinity;
						}

						if (offset >= end)
						{
							this.range.setEnd(node, node.nodeValue.length + end - offset);
							break;
						}
					}

					this.range.collapse(false);
					this.selection.addRange();
				},
				// deprecated
				setToPoint: function(start, end)
				{
					this.caret.setOffset(start, end);
				},
				getCoords: function()
				{
					return this.caret.getOffset();
				}
			};
		},
		clean: function()
		{
			return {
				onSet: function(html)
				{
					html = this.clean.savePreCode(html);

					// convert script tag
					html = html.replace(/<script(.*?[^>]?)>([\w\W]*?)<\/script>/gi, '<pre class="redactor-script-tag" style="display: none;" $1>$2</pre>');

					// replace dollar sign to entity
					html = html.replace(/\$/g, '&#36;');

					// replace special characters in links
					html = html.replace(/<a href="(.*?[^>]?)®(.*?[^>]?)">/gi, '<a href="$1&reg$2">');

					if (this.opts.replaceDivs) html = this.clean.replaceDivs(html);
					if (this.opts.linebreaks)  html = this.clean.replaceParagraphsToBr(html);

					// save form tag
					html = this.clean.saveFormTags(html);

					// convert font tag to span
					var $div = $('<div>');
					$div.html(html);
					var fonts = $div.find('font[style]');
					if (fonts.length !== 0)
					{
						fonts.replaceWith(function()
						{
							var $el = $(this);
							var $span = $('<span>').attr('style', $el.attr('style'));
							return $span.append($el.contents());
						});

						html = $div.html();
					}
					$div.remove();

					// remove font tag
					html = html.replace(/<font(.*?[^<])>/gi, '');
					html = html.replace(/<\/font>/gi, '');

					// tidy html
					html = this.tidy.load(html);

					// paragraphize
					if (this.opts.paragraphize) html = this.paragraphize.load(html);

					// verified
					html = this.clean.setVerified(html);

					// convert inline tags
					html = this.clean.convertInline(html);

					return html;
				},
				onSync: function(html)
				{
					// remove spaces
					html = html.replace(/[\u200B-\u200D\uFEFF]/g, '');
					html = html.replace(/&#x200b;/gi, '');

					if (this.opts.cleanSpaces)
					{
						html = html.replace(/&nbsp;/gi, ' ');
					}

					if (html.search(/^<p>(||\s||<br\s?\/?>||&nbsp;)<\/p>$/i) != -1)
					{
						return '';
					}

					// reconvert script tag
					html = html.replace(/<pre class="redactor-script-tag" style="display: none;"(.*?[^>]?)>([\w\W]*?)<\/pre>/gi, '<script$1>$2</script>');

					// restore form tag
					html = this.clean.restoreFormTags(html);

					var chars = {
						'\u2122': '&trade;',
						'\u00a9': '&copy;',
						'\u2026': '&hellip;',
						'\u2014': '&mdash;',
						'\u2010': '&dash;'
					};
					// replace special characters
					$.each(chars, function(i,s)
					{
						html = html.replace(new RegExp(i, 'g'), s);
					});

					// remove br in the of li
					html = html.replace(new RegExp('<br\\s?/?></li>', 'gi'), '</li>');
					html = html.replace(new RegExp('</li><br\\s?/?>', 'gi'), '</li>');
					// remove verified
					html = html.replace(new RegExp('<div(.*?[^>]) data-tagblock="redactor"(.*?[^>])>', 'gi'), '<div$1$2>');
					html = html.replace(new RegExp('<(.*?) data-verified="redactor"(.*?[^>])>', 'gi'), '<$1$2>');
					html = html.replace(new RegExp('<span(.*?[^>])\srel="(.*?[^>])"(.*?[^>])>', 'gi'), '<span$1$3>');
					html = html.replace(new RegExp('<img(.*?[^>])\srel="(.*?[^>])"(.*?[^>])>', 'gi'), '<img$1$3>');
					html = html.replace(new RegExp('<img(.*?[^>])\sstyle="" (.*?[^>])>', 'gi'), '<img$1 $2>');
					html = html.replace(new RegExp('<img(.*?[^>])\sstyle (.*?[^>])>', 'gi'), '<img$1 $2>');
					html = html.replace(new RegExp('<span class="redactor-invisible-space">(.*?)</span>', 'gi'), '$1');
					html = html.replace(/ data-save-url="(.*?[^>])"/gi, '');

					// remove image resize
					html = html.replace(/<span(.*?)id="redactor-image-box"(.*?[^>])>([\w\W]*?)<img(.*?)><\/span>/gi, '$3<img$4>');
					html = html.replace(/<span(.*?)id="redactor-image-resizer"(.*?[^>])>(.*?)<\/span>/gi, '');
					html = html.replace(/<span(.*?)id="redactor-image-editter"(.*?[^>])>(.*?)<\/span>/gi, '');

					// remove font tag
					html = html.replace(/<font(.*?[^<])>/gi, '');
					html = html.replace(/<\/font>/gi, '');

					// tidy html
					html = this.tidy.load(html);

					// link nofollow
					if (this.opts.linkNofollow)
					{
						html = html.replace(/<a(.*?)rel="nofollow"(.*?[^>])>/gi, '<a$1$2>');
						html = html.replace(/<a(.*?[^>])>/gi, '<a$1 rel="nofollow">');
					}

					// reconvert inline
					html = html.replace(/\sdata-redactor-(tag|class|style)="(.*?[^>])"/gi, '');
					html = html.replace(new RegExp('<(.*?) data-verified="redactor"(.*?[^>])>', 'gi'), '<$1$2>');
					html = html.replace(new RegExp('<(.*?) data-verified="redactor">', 'gi'), '<$1>');

					return html;
				},
				onPaste: function(html, setMode)
				{
					html = $.trim(html);

					html = html.replace(/\$/g, '&#36;');

					// convert dirty spaces
					html = html.replace(/<span class="s1">/gi, '<span>');
					html = html.replace(/<span class="Apple-converted-space">&nbsp;<\/span>/gi, ' ');
					html = html.replace(/<span class="Apple-tab-span"[^>]*>\t<\/span>/gi, '\t');
					html = html.replace(/<span[^>]*>(\s|&nbsp;)<\/span>/gi, ' ');

					if (this.opts.pastePlainText)
					{
						return this.clean.getPlainText(html);
					}

					if (!this.utils.isSelectAll() && typeof setMode == 'undefined')
					{
						if (this.utils.isCurrentOrParent(['FIGCAPTION', 'A']))
						{
							return this.clean.getPlainText(html, false);
						}

						if (this.utils.isCurrentOrParent('PRE'))
						{
							html = html.replace(/”/g, '"');
							html = html.replace(/“/g, '"');
							html = html.replace(/‘/g, '\'');
							html = html.replace(/’/g, '\'');

							return this.clean.getPreCode(html);
						}

						if (this.utils.isCurrentOrParent(['BLOCKQUOTE', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6']))
						{
							html = this.clean.getOnlyImages(html);

							if (!this.utils.browser('msie'))
							{
								var block = this.selection.getBlock();
								if (block && block.tagName == 'P')
								{
									html = html.replace(/<img(.*?)>/gi, '<p><img$1></p>');
								}
							}

							return html;
						}

						if (this.utils.isCurrentOrParent(['TD']))
						{
							html = this.clean.onPasteTidy(html, 'td');

							if (this.opts.linebreaks) html = this.clean.replaceParagraphsToBr(html);

							html = this.clean.replaceDivsToBr(html);

							return html;
						}


						if (this.utils.isCurrentOrParent(['LI']))
						{
							return this.clean.onPasteTidy(html, 'li');
						}
					}


					html = this.clean.isSingleLine(html, setMode);

					if (!this.clean.singleLine)
					{
						if (this.opts.linebreaks)  html = this.clean.replaceParagraphsToBr(html);
						if (this.opts.replaceDivs) html = this.clean.replaceDivs(html);

						html = this.clean.saveFormTags(html);
					}


					html = this.clean.onPasteWord(html);
					html = this.clean.onPasteExtra(html);

					html = this.clean.onPasteTidy(html, 'all');


					// paragraphize
					if (!this.clean.singleLine && this.opts.paragraphize)
					{
						html = this.paragraphize.load(html);
					}

					html = this.clean.removeDirtyStyles(html);
					html = this.clean.onPasteRemoveSpans(html);
					html = this.clean.onPasteRemoveEmpty(html);


					html = this.clean.convertInline(html);

					return html;
				},
				onPasteWord: function(html)
				{
					// comments
					html = html.replace(/<!--[\s\S]*?-->/gi, '');

					// style
					html = html.replace(/<style[^>]*>[\s\S]*?<\/style>/gi, '');

					if (/(class=\"?Mso|style=\"[^\"]*\bmso\-|w:WordDocument)/.test(html))
					{
						html = this.clean.onPasteIeFixLinks(html);

						// shapes
						html = html.replace(/<img(.*?)v:shapes=(.*?)>/gi, '');
						html = html.replace(/src="file\:\/\/(.*?)"/, 'src=""');

						// list
						html = html.replace(/<p(.*?)class="MsoListParagraphCxSpFirst"([\w\W]*?)<\/p>/gi, '<ul><li$2</li>');
						html = html.replace(/<p(.*?)class="MsoListParagraphCxSpMiddle"([\w\W]*?)<\/p>/gi, '<li$2</li>');
						html = html.replace(/<p(.*?)class="MsoListParagraphCxSpLast"([\w\W]*?)<\/p>/gi, '<li$2</li></ul>');
						// one line
						html = html.replace(/<p(.*?)class="MsoListParagraph"([\w\W]*?)<\/p>/gi, '<ul><li$2</li></ul>');
						// remove ms word's bullet
						html = html.replace(/·/g, '');
						html = html.replace(/<p class="Mso(.*?)"/gi, '<p');

						// classes
						html = html.replace(/ class=\"(mso[^\"]*)\"/gi,	"");
						html = html.replace(/ class=(mso\w+)/gi, "");

						// remove ms word tags
						html = html.replace(/<o:p(.*?)>([\w\W]*?)<\/o:p>/gi, '$2');

						// ms word break lines
						html = html.replace(/\n/g, ' ');

						// ms word lists break lines
						html = html.replace(/<p>\n?<li>/gi, '<li>');
					}

					// remove nbsp
					if (this.opts.cleanSpaces)
					{
						html = html.replace(/(\s|&nbsp;)+/g, ' ');
					}

					return html;
				},
				onPasteExtra: function(html)
				{
					// remove google docs markers
					html = html.replace(/<b\sid="internal-source-marker(.*?)">([\w\W]*?)<\/b>/gi, "$2");
					html = html.replace(/<b(.*?)id="docs-internal-guid(.*?)">([\w\W]*?)<\/b>/gi, "$3");

					// google docs styles
			 		html = html.replace(/<span[^>]*(font-style: italic; font-weight: bold|font-weight: bold; font-style: italic)[^>]*>/gi, '<span style="font-weight: bold;"><span style="font-style: italic;">');
			 		html = html.replace(/<span[^>]*font-style: italic[^>]*>/gi, '<span style="font-style: italic;">');
					html = html.replace(/<span[^>]*font-weight: bold[^>]*>/gi, '<span style="font-weight: bold;">');
					html = html.replace(/<span[^>]*text-decoration: underline[^>]*>/gi, '<span style="text-decoration: underline;">');

					html = html.replace(/<img>/gi, '');
					html = html.replace(/\n{3,}/gi, '\n');
					html = html.replace(/<font(.*?)>([\w\W]*?)<\/font>/gi, '$2');

					// remove dirty p
					html = html.replace(/<p><p>/gi, '<p>');
					html = html.replace(/<\/p><\/p>/gi, '</p>');
					html = html.replace(/<li>(\s*|\t*|\n*)<p>/gi, '<li>');
					html = html.replace(/<\/p>(\s*|\t*|\n*)<\/li>/gi, '</li>');

					// remove space between paragraphs
					html = html.replace(/<\/p>\s<p/gi, '<\/p><p');

					// remove safari local images
					html = html.replace(/<img src="webkit-fake-url\:\/\/(.*?)"(.*?)>/gi, '');

					// bullets
					html = html.replace(/<p>•([\w\W]*?)<\/p>/gi, '<li>$1</li>');

					// FF fix
					if (this.utils.browser('mozilla'))
					{
						html = html.replace(/<br\s?\/?>$/gi, '');
					}

					return html;
				},
				onPasteTidy: function(html, type)
				{
					// remove all tags except these
					var tags = ['span', 'a', 'pre', 'blockquote', 'small', 'em', 'strong', 'code', 'kbd', 'mark', 'address', 'cite', 'var', 'samp', 'dfn', 'sup', 'sub', 'b', 'i', 'u', 'del',
								'ol', 'ul', 'li', 'dl', 'dt', 'dd', 'p', 'br', 'video', 'audio', 'iframe', 'embed', 'param', 'object', 'img', 'table',
								'td', 'th', 'tr', 'tbody', 'tfoot', 'thead', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
					var tagsEmpty = false;
					var attrAllowed =  [
							['a', '*'],
							['img', ['src', 'alt']],
							['span', ['class', 'rel', 'data-verified']],
							['iframe', '*'],
							['video', '*'],
							['audio', '*'],
							['embed', '*'],
							['object', '*'],
							['param', '*'],
							['source', '*']
						];

					if (type == 'all')
					{
						tagsEmpty = ['p', 'span', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
						attrAllowed =  [
							['table', 'class'],
							['td', ['colspan', 'rowspan']],
							['a', '*'],
							['img', ['src', 'alt', 'data-redactor-inserted-image']],
							['span', ['class', 'rel', 'data-verified']],
							['iframe', '*'],
							['video', '*'],
							['audio', '*'],
							['embed', '*'],
							['object', '*'],
							['param', '*'],
							['source', '*']
						];
					}
					else if (type == 'td')
					{
						// remove all tags except these and remove all table tags: tr, td etc
						tags = ['ul', 'ol', 'li', 'span', 'a', 'small', 'em', 'strong', 'code', 'kbd', 'mark', 'cite', 'var', 'samp', 'dfn', 'sup', 'sub', 'b', 'i', 'u', 'del',
								'ol', 'ul', 'li', 'dl', 'dt', 'dd', 'br', 'iframe', 'video', 'audio', 'embed', 'param', 'object', 'img', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

					}
					else if (type == 'li')
					{
						// only inline tags and ul, ol, li
						tags = ['ul', 'ol', 'li', 'span', 'a', 'small', 'em', 'strong', 'code', 'kbd', 'mark', 'cite', 'var', 'samp', 'dfn', 'sup', 'sub', 'b', 'i', 'u', 'del', 'br',
								'iframe', 'video', 'audio', 'embed', 'param', 'object', 'img'];
					}

					var options = {
						deniedTags: false,
						allowedTags: tags,
						removeComments: true,
						removePhp: true,
						removeAttr: false,
						allowedAttr: attrAllowed,
						removeEmpty: tagsEmpty
					};

					// denied tags
					if (this.opts.deniedTags)
					{
						options.deniedTags = this.opts.deniedTags;
					}

					// allowed tags
					if (this.opts.allowedTags)
					{
						options.allowedTags = this.opts.allowedTags;
					}

					return this.tidy.load(html, options);

				},
				onPasteRemoveEmpty: function(html)
				{
					html = html.replace(/<(p|h[1-6])>(|\s|\n|\t|<br\s?\/?>)<\/(p|h[1-6])>/gi, '');

					// remove br in the end
					if (!this.opts.linebreaks) html = html.replace(/<br>$/i, '');

					return html;
				},
				onPasteRemoveSpans: function(html)
				{
					html = html.replace(/<span>(.*?)<\/span>/gi, '$1');
					html = html.replace(/<span[^>]*>\s|&nbsp;<\/span>/gi, ' ');

					return html;
				},
				onPasteIeFixLinks: function(html)
				{
					if (!this.utils.browser('msie')) return html;

					var tmp = $.trim(html);
					if (tmp.search(/^<a(.*?)>(.*?)<\/a>$/i) === 0)
					{
						html = html.replace(/^<a(.*?)>(.*?)<\/a>$/i, "$2");
					}

					return html;
				},
				isSingleLine: function(html, setMode)
				{
					this.clean.singleLine = false;

					if (!this.utils.isSelectAll() && typeof setMode == 'undefined')
					{
						var blocks = this.opts.blockLevelElements.join('|').replace('P|', '').replace('DIV|', '');

						var matchBlocks = html.match(new RegExp('</(' + blocks + ')>', 'gi'));
						var matchContainers = html.match(/<\/(p|div)>/gi);

						if (!matchBlocks && (matchContainers === null || (matchContainers && matchContainers.length <= 1)))
						{
							var matchBR = html.match(/<br\s?\/?>/gi);
							var matchIMG = html.match(/<img(.*?[^>])>/gi);
							if (!matchBR && !matchIMG)
							{
								this.clean.singleLine = true;
								html = html.replace(/<\/?(p|div)(.*?)>/gi, '');
							}
						}
					}

					return html;
				},
				stripTags: function(input, allowed)
				{
				    allowed = (((allowed || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
				    var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi;

				    return input.replace(tags, function ($0, $1) {
				        return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
				    });
				},
				savePreCode: function(html)
				{
					html = this.clean.savePreFormatting(html);
					html = this.clean.saveCodeFormatting(html);

					return html;
				},
				savePreFormatting: function(html)
				{
					var pre = html.match(/<pre(.*?)>([\w\W]*?)<\/pre>/gi);
					if (pre !== null)
					{
						$.each(pre, $.proxy(function(i,s)
						{
							var arr = s.match(/<pre(.*?)>([\w\W]*?)<\/pre>/i);

							arr[2] = arr[2].replace(/<br\s?\/?>/g, '\n');
							arr[2] = arr[2].replace(/&nbsp;/g, ' ');

							if (this.opts.preSpaces)
							{
								arr[2] = arr[2].replace(/\t/g, Array(this.opts.preSpaces + 1).join(' '));
							}

							arr[2] = this.clean.encodeEntities(arr[2]);

							// $ fix
							arr[2] = arr[2].replace(/\$/g, '&#36;');

							html = html.replace(s, '<pre' + arr[1] + '>' + arr[2] + '</pre>');

						}, this));
					}

					return html;
				},
				saveCodeFormatting: function(html)
				{
					var code = html.match(/<code(.*?[^>])>(.*?)<\/code>/gi);
					if (code !== null)
					{
						$.each(code, $.proxy(function(i,s)
						{
							var arr = s.match(/<code(.*?[^>])>(.*?)<\/code>/i);

							arr[2] = arr[2].replace(/&nbsp;/g, ' ');
							arr[2] = this.clean.encodeEntities(arr[2]);

							// $ fix
							arr[2] = arr[2].replace(/\$/g, '&#36;');

							html = html.replace(s, '<code' + arr[1] + '>' + arr[2] + '</code>');

						}, this));
					}

					return html;
				},
				getTextFromHtml: function(html)
				{
					html = html.replace(/<br\s?\/?>|<\/H[1-6]>|<\/p>|<\/div>|<\/li>|<\/td>/gi, '\n');

					var tmp = document.createElement('div');
					tmp.innerHTML = html;
					html = tmp.textContent || tmp.innerText;

					return $.trim(html);
				},
				getPlainText: function(html, paragraphize)
				{
					html = this.clean.getTextFromHtml(html);
					html = html.replace(/\n/g, '<br />');

					if (this.opts.paragraphize && typeof paragraphize == 'undefined' && !this.utils.browser('mozilla'))
					{
						html = this.paragraphize.load(html);
					}

					return html;
				},
				getPreCode: function(html)
				{
					html = html.replace(/<img(.*?) style="(.*?)"(.*?[^>])>/gi, '<img$1$3>');
					html = html.replace(/<img(.*?)>/gi, '&lt;img$1&gt;');
					html = this.clean.getTextFromHtml(html);

					if (this.opts.preSpaces)
					{
						html = html.replace(/\t/g, Array(this.opts.preSpaces + 1).join(' '));
					}

					html = this.clean.encodeEntities(html);

					return html;
				},
				getOnlyImages: function(html)
				{
					html = html.replace(/<img(.*?)>/gi, '[img$1]');

					// remove all tags
					html = html.replace(/<([Ss]*?)>/gi, '');

					html = html.replace(/\[img(.*?)\]/gi, '<img$1>');

					return html;
				},
				getOnlyLinksAndImages: function(html)
				{
					html = html.replace(/<a(.*?)href="(.*?)"(.*?)>([\w\W]*?)<\/a>/gi, '[a href="$2"]$4[/a]');
					html = html.replace(/<img(.*?)>/gi, '[img$1]');

					// remove all tags
					html = html.replace(/<(.*?)>/gi, '');

					html = html.replace(/\[a href="(.*?)"\]([\w\W]*?)\[\/a\]/gi, '<a href="$1">$2</a>');
					html = html.replace(/\[img(.*?)\]/gi, '<img$1>');

					return html;
				},
				encodeEntities: function(str)
				{
					str = String(str).replace(/&amp;/g, '&').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&quot;/g, '"');
					return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
				},
				removeDirtyStyles: function(html)
				{
					if (this.utils.browser('msie')) return html;

					var div = document.createElement('div');
					div.innerHTML = html;

					this.clean.clearUnverifiedRemove($(div));

					html = div.innerHTML;
					$(div).remove();

					return html;
				},
				clearUnverified: function()
				{
					if (this.utils.browser('msie')) return;

					this.clean.clearUnverifiedRemove(this.$editor);

					var headers = this.$editor.find('h1, h2, h3, h4, h5, h6');
					headers.find('span').removeAttr('style');
					headers.find(this.opts.verifiedTags.join(', ')).removeAttr('style');

					this.code.sync();
				},
				clearUnverifiedRemove: function($editor)
				{
					$editor.find(this.opts.verifiedTags.join(', ')).removeAttr('style');
					$editor.find('span').not('[data-verified="redactor"]').removeAttr('style');

					$editor.find('span[data-verified="redactor"], img[data-verified="redactor"]').each(function(i, s)
					{
						var $s = $(s);
						$s.attr('style', $s.attr('rel'));
					});

				},
				setVerified: function(html)
				{
					if (this.utils.browser('msie')) return html;

					html = html.replace(new RegExp('<img(.*?[^>])>', 'gi'), '<img$1 data-verified="redactor">');
					html = html.replace(new RegExp('<span(.*?[^>])>', 'gi'), '<span$1 data-verified="redactor">');

					var matches = html.match(new RegExp('<(span|img)(.*?)style="(.*?)"(.*?[^>])>', 'gi'));

					if (matches)
					{
						var len = matches.length;
						for (var i = 0; i < len; i++)
						{
							try {

								var newTag = matches[i].replace(/style="(.*?)"/i, 'style="$1" rel="$1"');
								html = html.replace(matches[i], newTag);

							}
							catch (e) {}
						}
					}

					return html;
				},
				convertInline: function(html)
				{
					var $div = $('<div />').html(html);

					var tags = this.opts.inlineTags;
					tags.push('span');

					$div.find(tags.join(',')).each(function()
					{
						var $el = $(this);
						var tag = this.tagName.toLowerCase();
						$el.attr('data-redactor-tag', tag);

						if (tag == 'span')
						{
							if ($el.attr('style')) $el.attr('data-redactor-style', $el.attr('style'));
							else if ($el.attr('class')) $el.attr('data-redactor-class', $el.attr('class'));
						}

					});

					html = $div.html();
					$div.remove();

					return html;
				},
				normalizeLists: function()
				{
					this.$editor.find('li').each(function(i,s)
					{
						var $next = $(s).next();
						if ($next.length !== 0 && ($next[0].tagName == 'UL' || $next[0].tagName == 'OL'))
						{
							$(s).append($next);
						}

					});
				},
				removeSpaces: function(html)
				{
					html = html.replace(/\n/g, '');
					html = html.replace(/[\t]*/g, '');
					html = html.replace(/\n\s*\n/g, "\n");
					html = html.replace(/^[\s\n]*/g, ' ');
					html = html.replace(/[\s\n]*$/g, ' ');
					html = html.replace( />\s{2,}</g, '> <'); // between inline tags can be only one space
					html = html.replace(/\n\n/g, "\n");
					html = html.replace(/[\u200B-\u200D\uFEFF]/g, '');

					return html;
				},
				replaceDivs: function(html)
				{
					if (this.opts.linebreaks)
					{
						html = html.replace(/<div><br\s?\/?><\/div>/gi, '<br />');
						html = html.replace(/<div(.*?)>([\w\W]*?)<\/div>/gi, '$2<br />');
					}
					else
					{
						html = html.replace(/<div(.*?)>([\w\W]*?)<\/div>/gi, '<p$1>$2</p>');
					}

					html = html.replace(/<div(.*?[^>])>/gi, '');
					html = html.replace(/<\/div>/gi, '');

					return html;
				},
				replaceDivsToBr: function(html)
				{
					html = html.replace(/<div\s(.*?)>/gi, '<p>');
					html = html.replace(/<div><br\s?\/?><\/div>/gi, '<br /><br />');
					html = html.replace(/<div>([\w\W]*?)<\/div>/gi, '$1<br /><br />');

					return html;
				},
				replaceParagraphsToBr: function(html)
				{
					html = html.replace(/<p\s(.*?)>/gi, '<p>');
					html = html.replace(/<p><br\s?\/?><\/p>/gi, '<br />');
					html = html.replace(/<p>([\w\W]*?)<\/p>/gi, '$1<br /><br />');
					html = html.replace(/(<br\s?\/?>){1,}\n?<\/blockquote>/gi, '</blockquote>');

					return html;
				},
				saveFormTags: function(html)
				{
					return html.replace(/<form(.*?)>([\w\W]*?)<\/form>/gi, '<section$1 rel="redactor-form-tag">$2</section>');
				},
				restoreFormTags: function(html)
				{
					return html.replace(/<section(.*?) rel="redactor-form-tag"(.*?)>([\w\W]*?)<\/section>/gi, '<form$1$2>$3</form>');
				}
			};
		},
		code: function()
		{
			return {
				set: function(html)
				{
					html = $.trim(html.toString());

					// clean
					html = this.clean.onSet(html);

					this.$editor.html(html);
					this.code.sync();

					if (html !== '') this.placeholder.remove();

					setTimeout($.proxy(this.buffer.add, this), 15);
					if (this.start === false) this.observe.load();

				},
				get: function()
				{
					var code = this.$textarea.val();

					// indent code
					code = this.tabifier.get(code);

					return code;
				},
				sync: function()
				{
					setTimeout($.proxy(this.code.startSync, this), 10);
				},
				startSync: function()
				{
					var html = this.$editor.html();

					// is there a need to synchronize
					if (this.code.syncCode && this.code.syncCode == html)
					{
						// do not sync
						return;
					}

					// save code
					this.code.syncCode = html;

					// before clean callback
					html = this.core.setCallback('syncBefore', html);

					// clean
					html = this.clean.onSync(html);

					// set code
					this.$textarea.val(html);

					// after sync callback
					this.core.setCallback('sync', html);

					if (this.start === false)
					{
						this.core.setCallback('change', html);
					}

					this.start = false;

					// autosave on change
					this.autosave.onChange();
				},
				toggle: function()
				{
					if (this.opts.visual)
					{
						this.code.showCode();
					}
					else
					{
						this.code.showVisual();
					}
				},
				showCode: function()
				{
					this.code.offset = this.caret.getOffset();
					var scroll = $(window).scrollTop();

					var height = this.$editor.innerHeight();

					this.$editor.hide();

					var html = this.$textarea.val();
					this.modified = this.clean.removeSpaces(html);

					// indent code
					html = this.tabifier.get(html);

					this.$textarea.val(html).height(height).show().focus();
					this.$textarea.on('keydown.redactor-textarea-indenting', this.code.textareaIndenting);

					$(window).scrollTop(scroll);

					if (this.$textarea[0].setSelectionRange)
					{
						this.$textarea[0].setSelectionRange(0, 0);
					}

					this.$textarea[0].scrollTop = 0;

					this.opts.visual = false;

					this.button.setInactiveInCode();
					this.button.setActive('html');
					this.core.setCallback('source', html);
				},
				showVisual: function()
				{
					if (this.opts.visual) return;

					var html = this.$textarea.hide().val();

					if (this.modified !== this.clean.removeSpaces(html))
					{
						this.code.set(html);
					}

					this.$editor.show();

					if (!this.utils.isEmpty(html))
					{
						this.placeholder.remove();
					}

					this.caret.setOffset(this.code.offset);

					this.$textarea.off('keydown.redactor-textarea-indenting');

					this.button.setActiveInVisual();
					this.button.setInactive('html');

					this.observe.load();
					this.opts.visual = true;
					this.core.setCallback('visual', html);
				},
				textareaIndenting: function(e)
				{
					if (e.keyCode !== 9) return true;

					var $el = this.$textarea;
					var start = $el.get(0).selectionStart;
					$el.val($el.val().substring(0, start) + "\t" + $el.val().substring($el.get(0).selectionEnd));
					$el.get(0).selectionStart = $el.get(0).selectionEnd = start + 1;

					return false;
				}
			};
		},
		core: function()
		{
			return {
				getObject: function()
				{
					return $.extend({}, this);
				},
				getEditor: function()
				{
					return this.$editor;
				},
				getBox: function()
				{
					return this.$box;
				},
				getElement: function()
				{
					return this.$element;
				},
				getTextarea: function()
				{
					return this.$textarea;
				},
				getToolbar: function()
				{
					return (this.$toolbar) ? this.$toolbar : false;
				},
				addEvent: function(name)
				{
					this.core.event = name;
				},
				getEvent: function()
				{
					return this.core.event;
				},
				setCallback: function(type, e, data)
				{
					var callback = this.opts[type + 'Callback'];
					if ($.isFunction(callback))
					{
						return (typeof data == 'undefined') ? callback.call(this, e) : callback.call(this, e, data);
					}
					else
					{
						return (typeof data == 'undefined') ? e : data;
					}
				},
				destroy: function()
				{
					this.core.setCallback('destroy');

					// off events and remove data
					this.$element.off('.redactor').removeData('redactor');
					this.$editor.off('.redactor');

					$(document).off('click.redactor-image-delete.' + this.uuid);
					$(document).off('click.redactor-image-resize-hide.' + this.uuid);
					$(document).off('touchstart.redactor.' + this.uuid + ' click.redactor.' + this.uuid);
					$("body").off('scroll.redactor.' + this.uuid);
					$(this.opts.toolbarFixedTarget).off('scroll.redactor.' + this.uuid);

					// common
					this.$editor.removeClass('redactor-editor redactor-linebreaks redactor-placeholder');
					this.$editor.removeAttr('contenteditable');

					var html = this.code.get();

					// dropdowns off
					this.$toolbar.find('a').each(function()
					{
						var $el = $(this);
						if ($el.data('dropdown'))
						{
							$el.data('dropdown').remove();
							$el.data('dropdown', {});
						}
					});


					if (this.build.isTextarea())
					{
						this.$box.after(this.$element);
						this.$box.remove();
						this.$element.val(html).show();
					}
					else
					{
						this.$box.after(this.$editor);
						this.$box.remove();
						this.$element.html(html).show();
					}

					// paste box
					if (this.$pasteBox) this.$pasteBox.remove();

					// modal
					if (this.$modalBox) this.$modalBox.remove();
					if (this.$modalOverlay) this.$modalOverlay.remove();

					// buttons tooltip
					$('.redactor-toolbar-tooltip').remove();

					// autosave
					clearInterval(this.autosaveInterval);

				}
			};
		},
		dropdown: function()
		{
			return {
				build: function(name, $dropdown, dropdownObject)
				{
					if (name == 'formatting' && this.opts.formattingAdd)
					{
						$.each(this.opts.formattingAdd, $.proxy(function(i,s)
						{
							var name = s.tag;
							if (typeof s['class'] != 'undefined')
							{
								name = name + '-' + s['class'];
							}

							s.type = (this.utils.isBlockTag(s.tag)) ? 'block' : 'inline';
							var func = (s.type == 'inline') ? 'inline.formatting' : 'block.formatting';

							if (this.opts.linebreaks && s.type == 'block' && s.tag == 'p') return;

							this.formatting[name] = {
								tag: s.tag,
								style: s.style,
								'class': s['class'],
								attr: s.attr,
								data: s.data,
								clear: s.clear
							};

							dropdownObject[name] = {
								func: func,
								title: s.title
							};

						}, this));

					}

					$.each(dropdownObject, $.proxy(function(btnName, btnObject)
					{
						var $item = $('<a href="#" class="redactor-dropdown-' + btnName + '">' + btnObject.title + '</a>');
						if (name == 'formatting') $item.addClass('redactor-formatting-' + btnName);

						$item.on('click', $.proxy(function(e)
						{
							e.preventDefault();

							var type = 'func';
							var callback = btnObject.func;
							if (btnObject.command)
							{
								type = 'command';
								callback = btnObject.command;
							}
							else if (btnObject.dropdown)
							{
								type = 'dropdown';
								callback = btnObject.dropdown;
							}

							this.button.onClick(e, btnName, type, callback);
							this.dropdown.hideAll();

						}, this));

						$dropdown.append($item);

					}, this));
				},
				show: function(e, key)
				{
					if (!this.opts.visual)
					{
						e.preventDefault();
						return false;
					}

					var $button = this.button.get(key);

					// Always re-append it to the end of <body> so it always has the highest sub-z-index.
					var $dropdown = $button.data('dropdown').appendTo(document.body);

					// ios keyboard hide
					if (this.utils.isMobile() && !this.utils.browser('msie'))
					{
						document.activeElement.blur();
					}

					if ($button.hasClass('dropact'))
					{
						this.dropdown.hideAll();
					}
					else
					{
						this.dropdown.hideAll();
						this.core.setCallback('dropdownShow', { dropdown: $dropdown, key: key, button: $button });

						this.button.setActive(key);

						$button.addClass('dropact');

						var keyPosition = $button.offset();

						// fix right placement
						var dropdownWidth = $dropdown.width();
						if ((keyPosition.left + dropdownWidth) > $(document).width())
						{
							keyPosition.left = Math.max(0, keyPosition.left - dropdownWidth);
						}

						var left = keyPosition.left + 'px';
						if (this.$toolbar.hasClass('toolbar-fixed-box'))
						{
							var top = this.$toolbar.innerHeight() + this.opts.toolbarFixedTopOffset;
							var position = 'fixed';
							if (this.opts.toolbarFixedTarget !== document)
							{
								top = (this.$toolbar.innerHeight() + this.$toolbar.offset().top) + this.opts.toolbarFixedTopOffset;
								position = 'absolute';
							}

							$dropdown.css({ position: position, left: left, top: top + 'px' }).show();
						}
						else
						{
							var top = ($button.innerHeight() + keyPosition.top) + 'px';

							$dropdown.css({ position: 'absolute', left: left, top: top }).show();
						}

						this.core.setCallback('dropdownShown', { dropdown: $dropdown, key: key, button: $button });
					}

					$(document).one('click', $.proxy(this.dropdown.hide, this));
					this.$editor.one('click', $.proxy(this.dropdown.hide, this));

					// disable scroll whan dropdown scroll
					var $body = $(document.body);
					var width = $body.width();

					$dropdown.on('mouseover', function() {

						$body.addClass('body-redactor-hidden');
						$body.css('margin-right', ($body.width() - width) + 'px');

					 });

					$dropdown.on('mouseout', function() {

						$body.removeClass('body-redactor-hidden').css('margin-right', 0);

					});


					e.stopPropagation();
				},
				hideAll: function()
				{
					this.$toolbar.find('a.dropact').removeClass('redactor-act').removeClass('dropact');

					$(document.body).removeClass('body-redactor-hidden').css('margin-right', 0);
					$('.redactor-dropdown-' + this.uuid).hide();
					this.core.setCallback('dropdownHide');
				},
				hide: function (e)
				{
					var $dropdown = $(e.target);
					if (!$dropdown.hasClass('dropact'))
					{
						$dropdown.removeClass('dropact');
						this.dropdown.hideAll();
					}
				}
			};
		},
		file: function()
		{
			return {
				show: function()
				{
					this.modal.load('file', this.lang.get('file'), 700);
					this.upload.init('#redactor-modal-file-upload', this.opts.fileUpload, this.file.insert);

					this.selection.save();

					this.selection.get();
					var text = this.sel.toString();

					$('#redactor-filename').val(text);

					this.modal.show();
				},
				insert: function(json, direct, e)
				{
					// error callback
					if (typeof json.error != 'undefined')
					{
						this.modal.close();
						this.selection.restore();
						this.core.setCallback('fileUploadError', json);
						return;
					}

					var link;
					if (typeof json == 'string')
					{
						link = json;
					}
					else
					{
						var text = $('#redactor-filename').val();
						if (typeof text == 'undefined' || text === '') text = json.filename;

						link = '<a href="' + json.filelink + '" id="filelink-marker">' + text + '</a>';
					}

					if (direct)
					{
						this.selection.removeMarkers();
						var marker = this.selection.getMarker();
						this.insert.nodeToCaretPositionFromPoint(e, marker);
					}
					else
					{
						this.modal.close();
					}

					this.selection.restore();
					this.buffer.set();

					this.insert.htmlWithoutClean(link);

					if (typeof json == 'string') return;

					var linkmarker = $(this.$editor.find('a#filelink-marker'));
					if (linkmarker.length !== 0)
					{
						linkmarker.removeAttr('id').removeAttr('style');
					}
					else linkmarker = false;

					this.core.setCallback('fileUpload', linkmarker, json);

				}
			};
		},
		focus: function()
		{
			return {
				setStart: function()
				{
					this.$editor.focus();

					var first = this.$editor.children().first();

					if (first.length === 0) return;
					if (first[0].length === 0 || first[0].tagName == 'BR' || first[0].nodeType == 3)
					{
						return;
					}

					if (first[0].tagName == 'UL' || first[0].tagName == 'OL')
					{
						var child = first.find('li').first();
						if (!this.utils.isBlock(child) && child.text() === '')
						{
							// empty inline tag in li
							this.caret.setStart(child);
							return;
						}
					}

					if (this.opts.linebreaks && !this.utils.isBlockTag(first[0].tagName))
					{
						this.selection.get();
						this.range.setStart(this.$editor[0], 0);
						this.range.setEnd(this.$editor[0], 0);
						this.selection.addRange();

						return;
					}

					// if node is tag
					this.caret.setStart(first);
				},
				setEnd: function()
				{
					if (this.utils.browser('mozilla') || this.utils.browser('msie'))
					{
						var last = this.$editor.children().last();

						this.$editor.focus();
						this.caret.setEnd(last);
					}
					else
					{
						this.selection.get();

						try {
							this.range.selectNodeContents(this.$editor[0]);
							this.range.collapse(false);

							this.selection.addRange();
						}
						catch (e) {}
					}

				},
				isFocused: function()
				{
					var focusNode = document.getSelection().focusNode;
					if (focusNode === null) return false;

					if (this.opts.linebreaks && $(focusNode.parentNode).hasClass('redactor-linebreaks')) return true;
					else if (!this.utils.isRedactorParent(focusNode.parentNode)) return false;

					return this.$editor.is(':focus');
				}
			};
		},
		image: function()
		{
			return {
				show: function()
				{
					this.modal.load('image', this.lang.get('image'), 700);
					this.upload.init('#redactor-modal-image-droparea', this.opts.imageUpload, this.image.insert);

					this.selection.save();
					this.modal.show();

				},
				showEdit: function($image)
				{
					var $link = $image.closest('a');

					this.modal.load('imageEdit', this.lang.get('edit'), 705);

					this.modal.createCancelButton();
					this.image.buttonDelete = this.modal.createDeleteButton(this.lang.get('_delete'));
					this.image.buttonSave = this.modal.createActionButton(this.lang.get('save'));

					this.image.buttonDelete.on('click', $.proxy(function()
					{
						this.image.remove($image);

					}, this));

					this.image.buttonSave.on('click', $.proxy(function()
					{
						this.image.update($image);

					}, this));

					$('#redactor-image-title').val($image.attr('alt'));

					if (!this.opts.imageLink) $('.redactor-image-link-option').hide();
					else
					{
						var $redactorImageLink = $('#redactor-image-link');

						$redactorImageLink.attr('href', $image.attr('src'));
						if ($link.length !== 0)
						{
							$redactorImageLink.val($link.attr('href'));
							if ($link.attr('target') == '_blank') $('#redactor-image-link-blank').prop('checked', true);
						}
					}

					if (!this.opts.imagePosition) $('.redactor-image-position-option').hide();
					else
					{
						var floatValue = ($image.css('display') == 'block' && $image.css('float') == 'none') ? 'center' : $image.css('float');
						$('#redactor-image-align').val(floatValue);
					}

					this.modal.show();

				},
				setFloating: function($image)
				{
					var floating = $('#redactor-image-align').val();

					var imageFloat = '';
					var imageDisplay = '';
					var imageMargin = '';

					switch (floating)
					{
						case 'left':
							imageFloat = 'left';
							imageMargin = '0 ' + this.opts.imageFloatMargin + ' ' + this.opts.imageFloatMargin + ' 0';
						break;
						case 'right':
							imageFloat = 'right';
							imageMargin = '0 0 ' + this.opts.imageFloatMargin + ' ' + this.opts.imageFloatMargin;
						break;
						case 'center':
							imageDisplay = 'block';
							imageMargin = 'auto';
						break;
					}

					$image.css({ 'float': imageFloat, display: imageDisplay, margin: imageMargin });
					$image.attr('rel', $image.attr('style'));
				},
				update: function($image)
				{
					this.image.hideResize();
					this.buffer.set();

					var $link = $image.closest('a');

					$image.attr('alt', $('#redactor-image-title').val());

					this.image.setFloating($image);

					// as link
					var link = $.trim($('#redactor-image-link').val());
					if (link !== '')
					{
						// test url (add protocol)
						var pattern = '((xn--)?[a-z0-9]+(-[a-z0-9]+)*\\.)+[a-z]{2,}';
						var re = new RegExp('^(http|ftp|https)://' + pattern, 'i');
						var re2 = new RegExp('^' + pattern, 'i');

						if (link.search(re) == -1 && link.search(re2) === 0 && this.opts.linkProtocol)
						{
							link = this.opts.linkProtocol + '://' + link;
						}

						var target = ($('#redactor-image-link-blank').prop('checked')) ? true : false;

						if ($link.length === 0)
						{
							var a = $('<a href="' + link + '">' + this.utils.getOuterHtml($image) + '</a>');
							if (target) a.attr('target', '_blank');

							$image.replaceWith(a);
						}
						else
						{
							$link.attr('href', link);
							if (target)
							{
								$link.attr('target', '_blank');
							}
							else
							{
								$link.removeAttr('target');
							}
						}
					}
					else if ($link.length !== 0)
					{
						$link.replaceWith(this.utils.getOuterHtml($image));

					}

					this.modal.close();
					this.observe.images();
					this.code.sync();


				},
				setEditable: function($image)
				{
					if (this.opts.imageEditable)
					{
						$image.on('dragstart', $.proxy(this.image.onDrag, this));
					}

					$image.on('mousedown', $.proxy(this.image.hideResize, this));
					$image.on('click.redactor touchstart', $.proxy(function(e)
					{
						this.observe.image = $image;

						if (this.$editor.find('#redactor-image-box').length !== 0) return false;

						this.image.resizer = this.image.loadEditableControls($image);

						$(document).on('click.redactor-image-resize-hide.' + this.uuid, $.proxy(this.image.hideResize, this));
						this.$editor.on('click.redactor-image-resize-hide.' + this.uuid, $.proxy(this.image.hideResize, this));

						// resize
						if (!this.opts.imageResizable) return;

						this.image.resizer.on('mousedown.redactor touchstart.redactor', $.proxy(function(e)
						{
							this.image.setResizable(e, $image);
						}, this));


					}, this));
				},
				setResizable: function(e, $image)
				{
					e.preventDefault();

				    this.image.resizeHandle = {
				        x : e.pageX,
				        y : e.pageY,
				        el : $image,
				        ratio: $image.width() / $image.height(),
				        h: $image.height()
				    };

				    e = e.originalEvent || e;

				    if (e.targetTouches)
				    {
				         this.image.resizeHandle.x = e.targetTouches[0].pageX;
				         this.image.resizeHandle.y = e.targetTouches[0].pageY;
				    }

					this.image.startResize();


				},
				startResize: function()
				{
					$(document).on('mousemove.redactor-image-resize touchmove.redactor-image-resize', $.proxy(this.image.moveResize, this));
					$(document).on('mouseup.redactor-image-resize touchend.redactor-image-resize', $.proxy(this.image.stopResize, this));
				},
				moveResize: function(e)
				{
					e.preventDefault();

					e = e.originalEvent || e;

					var height = this.image.resizeHandle.h;

		            if (e.targetTouches) height += (e.targetTouches[0].pageY -  this.image.resizeHandle.y);
		            else height += (e.pageY -  this.image.resizeHandle.y);

					var width = Math.round(height * this.image.resizeHandle.ratio);

					if (height < 50 || width < 100) return;

		            this.image.resizeHandle.el.width(width);
		            this.image.resizeHandle.el.height(this.image.resizeHandle.el.width()/this.image.resizeHandle.ratio);

		            this.code.sync();
				},
				stopResize: function()
				{
					this.handle = false;
					$(document).off('.redactor-image-resize');

					this.image.hideResize();
				},
				onDrag: function(e)
				{
					if (this.$editor.find('#redactor-image-box').length !== 0)
					{
						e.preventDefault();
						return false;
					}

					this.$editor.on('drop.redactor-image-inside-drop', $.proxy(function()
					{
						setTimeout($.proxy(this.image.onDrop, this), 1);

					}, this));
				},
				onDrop: function()
				{
					this.image.fixImageSourceAfterDrop();
					this.observe.images();
					this.$editor.off('drop.redactor-image-inside-drop');
					this.clean.clearUnverified();
					this.code.sync();
				},
				fixImageSourceAfterDrop: function()
				{
					this.$editor.find('img[data-save-url]').each(function()
					{
						var $el = $(this);
						$el.attr('src', $el.attr('data-save-url'));
						$el.removeAttr('data-save-url');
					});
				},
				hideResize: function(e)
				{
					if (e && $(e.target).closest('#redactor-image-box').length !== 0) return;
					if (e && e.target.tagName == 'IMG')
					{
						var $image = $(e.target);
						$image.attr('data-save-url', $image.attr('src'));
					}

					var imageBox = this.$editor.find('#redactor-image-box');
					if (imageBox.length === 0) return;

					if (this.opts.imageEditable)
					{
						this.image.editter.remove();
					}

					$(this.image.resizer).remove();

					imageBox.find('img').css({
						marginTop: imageBox[0].style.marginTop,
						marginBottom: imageBox[0].style.marginBottom,
						marginLeft: imageBox[0].style.marginLeft,
						marginRight: imageBox[0].style.marginRight
					});

					imageBox.css('margin', '');
					imageBox.find('img').css('opacity', '');
					imageBox.replaceWith(function()
					{
						return $(this).contents();
					});

					$(document).off('click.redactor-image-resize-hide.' + this.uuid);
					this.$editor.off('click.redactor-image-resize-hide.' + this.uuid);

					if (typeof this.image.resizeHandle !== 'undefined')
					{
						this.image.resizeHandle.el.attr('rel', this.image.resizeHandle.el.attr('style'));
					}

					this.code.sync();

				},
				loadResizableControls: function($image, imageBox)
				{
					if (this.opts.imageResizable && !this.utils.isMobile())
					{
						var imageResizer = $('<span id="redactor-image-resizer" data-redactor="verified"></span>');

						if (!this.utils.isDesktop())
						{
							imageResizer.css({ width: '15px', height: '15px' });
						}

						imageResizer.attr('contenteditable', false);
						imageBox.append(imageResizer);
						imageBox.append($image);

						return imageResizer;
					}
					else
					{
						imageBox.append($image);
						return false;
					}
				},
				loadEditableControls: function($image)
				{
					var imageBox = $('<span id="redactor-image-box" data-redactor="verified">');
					imageBox.css('float', $image.css('float')).attr('contenteditable', false);

					if ($image[0].style.margin != 'auto')
					{
						imageBox.css({
							marginTop: $image[0].style.marginTop,
							marginBottom: $image[0].style.marginBottom,
							marginLeft: $image[0].style.marginLeft,
							marginRight: $image[0].style.marginRight
						});

						$image.css('margin', '');
					}
					else
					{
						imageBox.css({ 'display': 'block', 'margin': 'auto' });
					}

					$image.css('opacity', '.5').after(imageBox);


					if (this.opts.imageEditable)
					{
						// editter
						this.image.editter = $('<span id="redactor-image-editter" data-redactor="verified">' + this.lang.get('edit') + '</span>');
						this.image.editter.attr('contenteditable', false);
						this.image.editter.on('click', $.proxy(function()
						{
							this.image.showEdit($image);
						}, this));

						imageBox.append(this.image.editter);

						// position correction
						var editerWidth = this.image.editter.innerWidth();
						this.image.editter.css('margin-left', '-' + editerWidth/2 + 'px');
					}

					return this.image.loadResizableControls($image, imageBox);

				},
				remove: function(image)
				{
					var $image = $(image);
					var $link = $image.closest('a');
					var $figure = $image.closest('figure');
					var $parent = $image.parent();
					if ($('#redactor-image-box').length !== 0)
					{
						$parent = $('#redactor-image-box').parent();
					}

					var $next;
					if ($figure.length !== 0)
					{
						$next = $figure.next();
						$figure.remove();
					}
					else if ($link.length !== 0)
					{
						$parent = $link.parent();
						$link.remove();
					}
					else
					{
						$image.remove();
					}

					$('#redactor-image-box').remove();

					if ($figure.length !== 0)
					{
						this.caret.setStart($next);
					}
					else
					{
						this.caret.setStart($parent);
					}

					// delete callback
					this.core.setCallback('imageDelete', $image[0].src, $image);

					this.modal.close();
					this.code.sync();
				},
				insert: function(json, direct, e)
				{
					// error callback
					if (typeof json.error != 'undefined')
					{
						this.modal.close();
						this.selection.restore();
						this.core.setCallback('imageUploadError', json);
						return;
					}

					var $img;
					if (typeof json == 'string')
					{
						$img = $(json).attr('data-redactor-inserted-image', 'true');
					}
					else
					{
						$img = $('<img>');
						$img.attr('src', json.filelink).attr('data-redactor-inserted-image', 'true');
					}


					var node = $img;
					var isP = this.utils.isCurrentOrParent('P');
					if (isP)
					{
						// will replace
						node = $('<blockquote />').append($img);
					}

					if (direct)
					{
						this.selection.removeMarkers();
						var marker = this.selection.getMarker();
						this.insert.nodeToCaretPositionFromPoint(e, marker);
					}
					else
					{
						this.modal.close();
					}

					this.selection.restore();
					this.buffer.set();

					this.insert.html(this.utils.getOuterHtml(node), false);

					var $image = this.$editor.find('img[data-redactor-inserted-image=true]').removeAttr('data-redactor-inserted-image');

					if (isP)
					{
						$image.parent().contents().unwrap().wrap('<p />');
					}
					else if (this.opts.linebreaks)
					{
						$image.before('<br>').after('<br>');
					}

					if (typeof json == 'string') return;

					this.core.setCallback('imageUpload', $image, json);

				}
			};
		},
		indent: function()
		{
			return {
				increase: function()
				{
					// focus
					if (!this.utils.browser('msie')) this.$editor.focus();

					this.buffer.set();
					this.selection.save();

					var block = this.selection.getBlock();

					if (block && block.tagName == 'LI')
					{
						this.indent.increaseLists();
					}
					else if (block === false && this.opts.linebreaks)
					{
						this.indent.increaseText();
					}
					else
					{
						this.indent.increaseBlocks();
					}

					this.selection.restore();
					this.code.sync();
				},
				increaseLists: function()
				{
					document.execCommand('indent');

					this.indent.fixEmptyIndent();
					this.clean.normalizeLists();
					this.clean.clearUnverified();
				},
				increaseBlocks: function()
				{
					$.each(this.selection.getBlocks(), $.proxy(function(i, elem)
					{
						if (elem.tagName === 'TD' || elem.tagName === 'TH') return;

						var $el = this.utils.getAlignmentElement(elem);

						var left = this.utils.normalize($el.css('margin-left')) + this.opts.indentValue;
						$el.css('margin-left', left + 'px');

					}, this));
				},
				increaseText: function()
				{
					var wrapper = this.selection.wrap('div');
					$(wrapper).attr('data-tagblock', 'redactor');
					$(wrapper).css('margin-left', this.opts.indentValue + 'px');
				},
				decrease: function()
				{
					this.buffer.set();
					this.selection.save();

					var block = this.selection.getBlock();
					if (block && block.tagName == 'LI')
					{
						this.indent.decreaseLists();
					}
					else
					{
						this.indent.decreaseBlocks();
					}

					this.selection.restore();
					this.code.sync();
				},
				decreaseLists: function ()
				{
					document.execCommand('outdent');

					var current = this.selection.getCurrent();

					var $item = $(current).closest('li');
					var $parent = $item.parent();
					if ($item.length !== 0 && $parent.length !== 0 && $parent[0].tagName == 'LI')
					{
						$parent.after($item);
					}

					this.indent.fixEmptyIndent();

					if (!this.opts.linebreaks && $item.length === 0)
					{
						document.execCommand('formatblock', false, 'p');
						this.$editor.find('ul, ol, blockquote, p').each($.proxy(this.utils.removeEmpty, this));
					}

					this.clean.clearUnverified();
				},
				decreaseBlocks: function()
				{
					$.each(this.selection.getBlocks(), $.proxy(function(i, elem)
					{
						var $el = this.utils.getAlignmentElement(elem);
						var left = this.utils.normalize($el.css('margin-left')) - this.opts.indentValue;

						if (left <= 0)
						{
							if (this.opts.linebreaks && typeof($el.data('tagblock')) !== 'undefined')
							{
								$el.replaceWith($el.html() + '<br />');
							}
							else
							{
								$el.css('margin-left', '');
								this.utils.removeEmptyAttr($el, 'style');
							}
						}
						else
						{
							$el.css('margin-left', left + 'px');
						}

					}, this));
				},
				fixEmptyIndent: function()
				{
					var block = this.selection.getBlock();

					if (this.range.collapsed && block && block.tagName == 'LI' && this.utils.isEmpty($(block).text()))
					{
						var $block = $(block);
						$block.find('span').not('.redactor-selection-marker').contents().unwrap();
						$block.append('<br>');
					}
				}
			};
		},
		inline: function()
		{
			return {
				formatting: function(name)
				{
					var type, value;

					if (typeof this.formatting[name].style != 'undefined') type = 'style';
					else if (typeof this.formatting[name]['class'] != 'undefined') type = 'class';

					if (type) value = this.formatting[name][type];

					this.inline.format(this.formatting[name].tag, type, value);

				},
				format: function(tag, type, value)
				{
					// Stop formatting pre and headers
					if (this.utils.isCurrentOrParent('PRE') || this.utils.isCurrentOrParentHeader()) return;

					var tags = ['b', 'bold', 'i', 'italic', 'underline', 'strikethrough', 'deleted', 'superscript', 'subscript'];
					var replaced = ['strong', 'strong', 'em', 'em', 'u', 'del', 'del', 'sup', 'sub'];

					for (var i = 0; i < tags.length; i++)
					{
						if (tag == tags[i]) tag = replaced[i];
					}

					this.inline.type = type || false;
					this.inline.value = value || false;

					this.buffer.set();

					if (!this.utils.browser('msie'))
					{
						this.$editor.focus();
					}

					this.selection.get();

					if (this.range.collapsed)
					{
						this.inline.formatCollapsed(tag);
					}
					else
					{
						this.inline.formatMultiple(tag);
					}
				},
				formatCollapsed: function(tag)
				{
					var current = this.selection.getCurrent();
					var $parent = $(current).closest(tag + '[data-redactor-tag=' + tag + ']');

					// inline there is
					if ($parent.length !== 0 && (this.inline.type != 'style' && $parent[0].tagName != 'SPAN'))
					{
						// remove empty
						if (this.utils.isEmpty($parent.text()))
						{
							this.caret.setAfter($parent[0]);

							$parent.remove();
							this.code.sync();
						}
						else if (this.utils.isEndOfElement($parent))
						{
							this.caret.setAfter($parent[0]);
						}

						return;
					}

					// create empty inline
					var node = $('<' + tag + '>').attr('data-verified', 'redactor').attr('data-redactor-tag', tag);
					node.html(this.opts.invisibleSpace);

					node = this.inline.setFormat(node);

					var node = this.insert.node(node);
					this.caret.setEnd(node);

					this.code.sync();
				},
				formatMultiple: function(tag)
				{
					this.inline.formatConvert(tag);

					this.selection.save();
					document.execCommand('strikethrough');

					this.$editor.find('strike').each($.proxy(function(i,s)
					{
						var $el = $(s);

						this.inline.formatRemoveSameChildren($el, tag);

						var $span;
						if (this.inline.type)
						{
							$span = $('<span>').attr('data-redactor-tag', tag).attr('data-verified', 'redactor');
							$span = this.inline.setFormat($span);
						}
						else
						{
							$span = $('<' + tag + '>').attr('data-redactor-tag', tag).attr('data-verified', 'redactor');
						}

						$el.replaceWith($span.html($el.contents()));

						if (tag == 'span')
						{
							var $parent = $span.parent();
							if ($parent && $parent[0].tagName == 'SPAN' && this.inline.type == 'style')
							{
								var arr = this.inline.value.split(';');

								for (var z = 0; z < arr.length; z++)
								{
									if (arr[z] === '') return;
									var style = arr[z].split(':');
									$parent.css(style[0], '');

									if (this.utils.removeEmptyAttr($parent, 'style'))
									{
										$parent.replaceWith($parent.contents());
									}

								}

							}
						}

					}, this));

					// clear text decoration
					if (tag != 'span')
					{
						this.$editor.find(this.opts.inlineTags.join(', ')).each($.proxy(function(i,s)
						{
							var $el = $(s);
							var property = $el.css('text-decoration');
							if (property == 'line-through')
							{
								$el.css('text-decoration', '');
								this.utils.removeEmptyAttr($el, 'style');
							}
						}, this));
					}

					if (tag != 'del')
					{
						var _this = this;
						this.$editor.find('inline').each(function(i,s)
						{
							_this.utils.replaceToTag(s, 'del');
						});
					}

					this.selection.restore();
					this.code.sync();

				},
				formatRemoveSameChildren: function($el, tag)
				{
					var self = this;
					$el.children(tag).each(function()
					{
						var $child = $(this);

						if (!$child.hasClass('redactor-selection-marker'))
						{
							if (self.inline.type == 'style')
							{
								var arr = self.inline.value.split(';');

								for (var z = 0; z < arr.length; z++)
								{
									if (arr[z] === '') return;

									var style = arr[z].split(':');
									$child.css(style[0], '');

									if (self.utils.removeEmptyAttr($child , 'style'))
									{
										$child.replaceWith($child.contents());
									}

								}
							}
							else
							{
								$child.contents().unwrap();
							}
						}

					});
				},
				formatConvert: function(tag)
				{
					this.selection.save();

					var find = '';
					if (this.inline.type == 'class') find = '[data-redactor-class=' + this.inline.value + ']';
					else if (this.inline.type == 'style')
					{
						find = '[data-redactor-style="' + this.inline.value + '"]';
					}

					var self = this;
					if (tag != 'del')
					{
						this.$editor.find('del').each(function(i,s)
						{
							self.utils.replaceToTag(s, 'inline');
						});
					}

					if (tag != 'span')
					{
						this.$editor.find(tag).each(function()
						{
							var $el = $(this);
							$el.replaceWith($('<strike />').html($el.contents()));

						});
					}

					this.$editor.find('[data-redactor-tag="' + tag + '"]' + find).each(function()
					{
						if (find === '' && tag == 'span' && this.tagName.toLowerCase() == tag) return;

						var $el = $(this);
						$el.replaceWith($('<strike />').html($el.contents()));

					});

					this.selection.restore();
				},
				setFormat: function(node)
				{
					switch (this.inline.type)
					{
						case 'class':

							if (node.hasClass(this.inline.value))
							{
								node.removeClass(this.inline.value);
								node.removeAttr('data-redactor-class');
							}
							else
							{
								node.addClass(this.inline.value);
								node.attr('data-redactor-class', this.inline.value);
							}


						break;
						case 'style':

							node[0].style.cssText = this.inline.value;
							node.attr('data-redactor-style', this.inline.value);

						break;
					}

					return node;
				},
				removeStyle: function()
				{
					this.buffer.set();
					var current = this.selection.getCurrent();
					var nodes = this.selection.getInlines();

					this.selection.save();

					if (current && current.tagName === 'SPAN')
					{
						var $s = $(current);

						$s.removeAttr('style');
						if ($s[0].attributes.length === 0)
						{
							$s.replaceWith($s.contents());
						}
					}

					$.each(nodes, $.proxy(function(i,s)
					{
						var $s = $(s);
						if ($.inArray(s.tagName.toLowerCase(), this.opts.inlineTags) != -1 && !$s.hasClass('redactor-selection-marker'))
						{
							$s.removeAttr('style');
							if ($s[0].attributes.length === 0)
							{
								$s.replaceWith($s.contents());
							}
						}
					}, this));

					this.selection.restore();
					this.code.sync();

				},
				removeStyleRule: function(name)
				{
					this.buffer.set();
					var parent = this.selection.getParent();
					var nodes = this.selection.getInlines();

					this.selection.save();

					if (parent && parent.tagName === 'SPAN')
					{
						var $s = $(parent);

						$s.css(name, '');
						this.utils.removeEmptyAttr($s, 'style');
						if ($s[0].attributes.length === 0)
						{
							$s.replaceWith($s.contents());
						}
					}

					$.each(nodes, $.proxy(function(i,s)
					{
						var $s = $(s);
						if ($.inArray(s.tagName.toLowerCase(), this.opts.inlineTags) != -1 && !$s.hasClass('redactor-selection-marker'))
						{
							$s.css(name, '');
							this.utils.removeEmptyAttr($s, 'style');
							if ($s[0].attributes.length === 0)
							{
								$s.replaceWith($s.contents());
							}
						}
					}, this));

					this.selection.restore();
					this.code.sync();
				},
				removeFormat: function()
				{
					this.buffer.set();
					var current = this.selection.getCurrent();

					this.selection.save();

					document.execCommand('removeFormat');

					if (current && current.tagName === 'SPAN')
					{
						$(current).replaceWith($(current).contents());
					}


					$.each(this.selection.getNodes(), $.proxy(function(i,s)
					{
						var $s = $(s);
						if ($.inArray(s.tagName.toLowerCase(), this.opts.inlineTags) != -1 && !$s.hasClass('redactor-selection-marker'))
						{
							$s.replaceWith($s.contents());
						}
					}, this));

					this.selection.restore();
					this.code.sync();

				},
				toggleClass: function(className)
				{
					this.inline.format('span', 'class', className);
				},
				toggleStyle: function(value)
				{
					this.inline.format('span', 'style', value);
				}
			};
		},
		insert: function()
		{
			return {
				set: function(html, clean)
				{
					this.placeholder.remove();

					html = this.clean.setVerified(html);

					if (typeof clean == 'undefined')
					{
						html = this.clean.onPaste(html, false);
					}

					this.$editor.html(html);
					this.selection.remove();
					this.focus.setEnd();
					this.clean.normalizeLists();
					this.code.sync();
					this.observe.load();

					if (typeof clean == 'undefined')
					{
						setTimeout($.proxy(this.clean.clearUnverified, this), 10);
					}
				},
				text: function(text)
				{
					this.placeholder.remove();

					text = text.toString();
					text = $.trim(text);
					text = this.clean.getPlainText(text, false);

					this.$editor.focus();

					if (this.utils.browser('msie'))
					{
						this.insert.htmlIe(text);
					}
					else
					{
						this.selection.get();

						this.range.deleteContents();
						var el = document.createElement("div");
						el.innerHTML = text;
						var frag = document.createDocumentFragment(), node, lastNode;
						while ((node = el.firstChild))
						{
							lastNode = frag.appendChild(node);
						}

						this.range.insertNode(frag);

						if (lastNode)
						{
							var range = this.range.cloneRange();
							range.setStartAfter(lastNode);
							range.collapse(true);
							this.sel.removeAllRanges();
							this.sel.addRange(range);
						}
					}

					this.code.sync();
					this.clean.clearUnverified();
				},
				htmlWithoutClean: function(html)
				{
					this.insert.html(html, false);
				},
				html: function(html, clean)
				{
					this.placeholder.remove();

					if (typeof clean == 'undefined') clean = true;

					this.$editor.focus();

					html = this.clean.setVerified(html);

					if (clean)
					{
						html = this.clean.onPaste(html);
					}

					if (this.utils.browser('msie'))
					{
						this.insert.htmlIe(html);
					}
					else
					{
						if (this.clean.singleLine) this.insert.execHtml(html);
						else document.execCommand('insertHTML', false, html);

						this.insert.htmlFixMozilla();

					}

					this.clean.normalizeLists();

					// remove empty paragraphs finaly
					if (!this.opts.linebreaks)
					{
						this.$editor.find('p').each($.proxy(this.utils.removeEmpty, this));
					}

					this.code.sync();
					this.observe.load();

					if (clean)
					{
						this.clean.clearUnverified();
					}

				},
				htmlFixMozilla: function()
				{
					// FF inserts empty p when content was selected dblclick
					if (!this.utils.browser('mozilla')) return;

					var $next = $(this.selection.getBlock()).next();
					if ($next.length > 0 && $next[0].tagName == 'P' && $next.html() === '')
					{
						$next.remove();
					}

				},
				htmlIe: function(html)
				{
					if (this.utils.isIe11())
					{
						var parent = this.utils.isCurrentOrParent('P');
						var $html = $('<div>').append(html);
						var blocksMatch = $html.contents().is('p, :header, dl, ul, ol, div, table, td, blockquote, pre, address, section, header, footer, aside, article');

						if (parent && blocksMatch) this.insert.ie11FixInserting(parent, html);
						else this.insert.ie11PasteFrag(html);

						return;
					}

					document.selection.createRange().pasteHTML(html);

				},
				execHtml: function(html)
				{
					html = this.clean.setVerified(html);

					this.selection.get();

					this.range.deleteContents();

					var el = document.createElement('div');
					el.innerHTML = html;

					var frag = document.createDocumentFragment(), node, lastNode;
					while ((node = el.firstChild))
					{
						lastNode = frag.appendChild(node);
					}

					this.range.insertNode(frag);

					this.range.collapse(true);
					this.caret.setAfter(lastNode);

				},
				node: function(node, deleteContents)
				{
					node = node[0] || node;

					var html = this.utils.getOuterHtml(node);
					html = this.clean.setVerified(html);

					if (html.match(/</g) !== null)
					{
						node = $(html)[0];
					}

					this.selection.get();

					if (deleteContents !== false)
					{
						this.range.deleteContents();
					}

					this.range.insertNode(node);
					this.range.collapse(false);
					this.selection.addRange();

					return node;
				},
				nodeToPoint: function(node, x, y)
				{
					node = node[0] || node;

					this.selection.get();

					var range;
					if (document.caretPositionFromPoint)
					{
					    var pos = document.caretPositionFromPoint(x, y);

					    this.range.setStart(pos.offsetNode, pos.offset);
					    this.range.collapse(true);
					    this.range.insertNode(node);
					}
					else if (document.caretRangeFromPoint)
					{
					    range = document.caretRangeFromPoint(x, y);
					    range.insertNode(node);
					}
					else if (typeof document.body.createTextRange != "undefined")
					{
				        range = document.body.createTextRange();
				        range.moveToPoint(x, y);
				        var endRange = range.duplicate();
				        endRange.moveToPoint(x, y);
				        range.setEndPoint("EndToEnd", endRange);
				        range.select();
					}
				},
				nodeToCaretPositionFromPoint: function(e, node)
				{
					node = node[0] || node;

					var range;
					var x = e.clientX, y = e.clientY;
					if (document.caretPositionFromPoint)
					{
					    var pos = document.caretPositionFromPoint(x, y);
					    var sel = document.getSelection();
					    range = sel.getRangeAt(0);
					    range.setStart(pos.offsetNode, pos.offset);
					    range.collapse(true);
					    range.insertNode(node);
					}
					else if (document.caretRangeFromPoint)
					{
					    range = document.caretRangeFromPoint(x, y);
					    range.insertNode(node);
					}
					else if (typeof document.body.createTextRange != "undefined")
					{
				        range = document.body.createTextRange();
				        range.moveToPoint(x, y);
				        var endRange = range.duplicate();
				        endRange.moveToPoint(x, y);
				        range.setEndPoint("EndToEnd", endRange);
				        range.select();
					}

				},
				ie11FixInserting: function(parent, html)
				{
					var node = document.createElement('span');
					node.className = 'redactor-ie-paste';
					this.insert.node(node);

					var parHtml = $(parent).html();

					parHtml = '<p>' + parHtml.replace(/<span class="redactor-ie-paste"><\/span>/gi, '</p>' + html + '<p>') + '</p>';
					$(parent).replaceWith(parHtml);
				},
				ie11PasteFrag: function(html)
				{
					this.selection.get();
					this.range.deleteContents();

					var el = document.createElement("div");
					el.innerHTML = html;

					var frag = document.createDocumentFragment(), node, lastNode;
					while ((node = el.firstChild))
					{
						lastNode = frag.appendChild(node);
					}

					this.range.insertNode(frag);
					this.range.collapse(false);
					this.selection.addRange();
				}
			};
		},
		keydown: function()
		{
			return {
				init: function(e)
				{
					if (this.rtePaste) return;

					var key = e.which;
					var arrow = (key >= 37 && key <= 40);

					this.keydown.ctrl = e.ctrlKey || e.metaKey;
					this.keydown.current = this.selection.getCurrent();
					this.keydown.parent = this.selection.getParent();
					this.keydown.block = this.selection.getBlock();

			        // detect tags
					this.keydown.pre = this.utils.isTag(this.keydown.current, 'pre');
					this.keydown.blockquote = this.utils.isTag(this.keydown.current, 'blockquote');
					this.keydown.figcaption = this.utils.isTag(this.keydown.current, 'figcaption');

					// shortcuts setup
					this.shortcuts.init(e, key);

					this.keydown.checkEvents(arrow, key);
					this.keydown.setupBuffer(e, key);
					this.keydown.addArrowsEvent(arrow);
					this.keydown.setupSelectAll(e, key);

					// callback
					var keydownStop = this.core.setCallback('keydown', e);
					if (keydownStop === false)
					{
						e.preventDefault();
						return false;
					}

					// ie and ff exit from table
					if (this.opts.enterKey && (this.utils.browser('msie') || this.utils.browser('mozilla')) && (key === this.keyCode.DOWN || key === this.keyCode.RIGHT))
					{
						var isEndOfTable = false;
						var $table = false;
						if (this.keydown.block && this.keydown.block.tagName === 'TD')
						{
							$table = $(this.keydown.block).closest('table');
						}

						if ($table && $table.find('td').last()[0] === this.keydown.block)
						{
							isEndOfTable = true;
						}

						if (this.utils.isEndOfElement() && isEndOfTable)
						{
							var node = $(this.opts.emptyHtml);
							$table.after(node);
							this.caret.setStart(node);
						}
					}

					// down
					if (this.opts.enterKey && key === this.keyCode.DOWN)
					{
						this.keydown.onArrowDown();
					}

					// turn off enter key
					if (!this.opts.enterKey && key === this.keyCode.ENTER)
					{
						e.preventDefault();
						// remove selected
						if (!this.range.collapsed) this.range.deleteContents();
						return;
					}

					// on enter
					if (key == this.keyCode.ENTER && !e.shiftKey && !e.ctrlKey && !e.metaKey)
					{
						var stop = this.core.setCallback('enter', e);
						if (stop === false)
						{
							e.preventDefault();
							return false;
						}

						if (this.keydown.blockquote && this.keydown.exitFromBlockquote(e) === true)
						{
							return false;
						}

						var current, $next;
						if (this.keydown.pre)
						{
							return this.keydown.insertNewLine(e);
						}
						else if (this.keydown.blockquote || this.keydown.figcaption)
						{
							current = this.selection.getCurrent();
							$next = $(current).next();

							if ($next.length !== 0 && $next[0].tagName == 'BR')
							{
								return this.keydown.insertBreakLine(e);
							}
							else if (this.utils.isEndOfElement() && (current && current != 'SPAN'))
							{
								return this.keydown.insertDblBreakLine(e);
							}
							else
							{
								return this.keydown.insertBreakLine(e);
							}
						}
						else if (this.opts.linebreaks && !this.keydown.block)
						{
							current = this.selection.getCurrent();
							$next = $(this.keydown.current).next();



							if ($next.length !== 0 && $next[0].tagName == 'BR')
							{
								return this.keydown.insertBreakLine(e);
							}
							else if (current !== false && $(current).hasClass('redactor-invisible-space'))
							{
								this.caret.setAfter(current);
								$(current).contents().unwrap();

								return this.keydown.insertDblBreakLine(e);
							}
							else
							{
								if (this.utils.isEndOfEditor())
								{
									return this.keydown.insertDblBreakLine(e);
								}
								else if ($next.length === 0 && current === false && typeof $next.context != 'undefined')
								{
									return this.keydown.insertBreakLine(e);
								}

								return this.keydown.insertBreakLine(e);
							}
						}
						else if (this.opts.linebreaks && this.keydown.block)
						{
							setTimeout($.proxy(this.keydown.replaceDivToBreakLine, this), 1);
						}
						// paragraphs
						else if (!this.opts.linebreaks && this.keydown.block)
						{
							if (this.keydown.block.tagName !== 'LI')
							{
								setTimeout($.proxy(this.keydown.replaceDivToParagraph, this), 1);
							}
							else
							{
								current = this.selection.getCurrent();
								var $parent = $(current).closest('li');
								var $list = $parent.closest('ul,ol');

								if ($parent.length !== 0 && this.utils.isEmpty($parent.html()) && $list.next().length === 0)
								{
									var node = $(this.opts.emptyHtml);
									$list.after(node);
									this.caret.setStart(node);

									return false;
								}
							}
						}
						else if (!this.opts.linebreaks && !this.keydown.block)
						{
							return this.keydown.insertParagraph(e);
						}
					}

					// Shift+Enter or Ctrl+Enter
					if (key === this.keyCode.ENTER && (e.ctrlKey || e.shiftKey))
					{
						return this.keydown.onShiftEnter(e);
					}


					// tab or cmd + [
					if (key === this.keyCode.TAB || e.metaKey && key === 221 || e.metaKey && key === 219)
					{
						return this.keydown.onTab(e, key);
					}

					// image delete and backspace
					if (key === this.keyCode.BACKSPACE || key === this.keyCode.DELETE)
					{
						if (this.utils.browser('mozilla') && this.keydown.current && this.keydown.current.tagName === 'TD')
						{
							e.preventDefault();
							return false;
						}

						var nodes = this.selection.getNodes();
						if (nodes)
						{
							var len = nodes.length;
							var last;
							for (var i = 0; i < len; i++)
							{
								var children = $(nodes[i]).children('img');
								if (children.length !== 0)
								{
									var self = this;
									$.each(children, function(z,s)
									{
										var $s = $(s);
										if ($s.css('float') != 'none') return;

										// image delete callback
										self.core.setCallback('imageDelete', s.src, $s);
										last = s;
									});
								}
								else if (nodes[i].tagName == 'IMG')
								{
									if (last != nodes[i])
									{
										// image delete callback
										this.core.setCallback('imageDelete', nodes[i].src, $(nodes[i]));
										last = nodes[i];
									}
								}
							}
						}
					}

					// backspace
					if (key === this.keyCode.BACKSPACE)
					{
						this.keydown.removeInvisibleSpace();
						this.keydown.removeEmptyListInTable(e);
					}

					this.code.sync();
				},
				checkEvents: function(arrow, key)
				{
					if (!arrow && (this.core.getEvent() == 'click' || this.core.getEvent() == 'arrow'))
					{
						this.core.addEvent(false);

						if (this.keydown.checkKeyEvents(key))
						{
							this.buffer.set();
						}
					}
				},
				checkKeyEvents: function(key)
				{
					var k = this.keyCode;
					var keys = [k.BACKSPACE, k.DELETE, k.ENTER, k.SPACE, k.ESC, k.TAB, k.CTRL, k.META, k.ALT, k.SHIFT];

					return ($.inArray(key, keys) == -1) ? true : false;

				},
				addArrowsEvent: function(arrow)
				{
					if (!arrow) return;

					if ((this.core.getEvent() == 'click' || this.core.getEvent() == 'arrow'))
					{
						this.core.addEvent(false);
						return;
					}

				    this.core.addEvent('arrow');
				},
				setupBuffer: function(e, key)
				{
					if (this.keydown.ctrl && key === 90 && !e.shiftKey && !e.altKey && this.opts.buffer.length) // z key
					{
						e.preventDefault();
						this.buffer.undo();
						return;
					}
					// undo
					else if (this.keydown.ctrl && key === 90 && e.shiftKey && !e.altKey && this.opts.rebuffer.length !== 0)
					{
						e.preventDefault();
						this.buffer.redo();
						return;
					}
					else if (!this.keydown.ctrl)
					{
						if (key == this.keyCode.BACKSPACE || key == this.keyCode.DELETE || (key == this.keyCode.ENTER && !e.ctrlKey && !e.shiftKey) || key == this.keyCode.SPACE)
						{
							this.buffer.set();
						}
					}
				},
				setupSelectAll: function(e, key)
				{
					if (this.keydown.ctrl && key === 65)
					{
						this.utils.enableSelectAll();
					}
					else if (key != this.keyCode.LEFT_WIN && !this.keydown.ctrl)
					{
						this.utils.disableSelectAll();
					}
				},
				onArrowDown: function()
				{
					var tags = [this.keydown.blockquote, this.keydown.pre, this.keydown.figcaption];

					for (var i = 0; i < tags.length; i++)
					{
						if (tags[i])
						{
							this.keydown.insertAfterLastElement(tags[i]);
							return false;
						}
					}
				},
				onShiftEnter: function(e)
				{
					this.buffer.set();

					if (this.utils.isEndOfElement())
					{
						return this.keydown.insertDblBreakLine(e);
					}

					return this.keydown.insertBreakLine(e);
				},
				onTab: function(e, key)
				{
					if (!this.opts.tabKey) return true;
					if (this.utils.isEmpty(this.code.get()) && this.opts.tabAsSpaces === false) return true;

					e.preventDefault();

					var node;
					if (this.keydown.pre && !e.shiftKey)
					{
						node = (this.opts.preSpaces) ? document.createTextNode(Array(this.opts.preSpaces + 1).join('\u00a0')) : document.createTextNode('\t');
						this.insert.node(node);
						this.code.sync();
					}
					else if (this.opts.tabAsSpaces !== false)
					{
						node = document.createTextNode(Array(this.opts.tabAsSpaces + 1).join('\u00a0'));
						this.insert.node(node);
						this.code.sync();
					}
					else
					{
						if (e.metaKey && key === 219) this.indent.decrease();
						else if (e.metaKey && key === 221) this.indent.increase();
						else if (!e.shiftKey) this.indent.increase();
						else this.indent.decrease();
					}

					return false;
				},
				replaceDivToBreakLine: function()
				{
					var blockElem = this.selection.getBlock();
					var blockHtml = blockElem.innerHTML.replace(/<br\s?\/?>/gi, '');
					if ((blockElem.tagName === 'DIV' || blockElem.tagName === 'P') && blockHtml === '' && !$(blockElem).hasClass('redactor-editor'))
					{
						var br = document.createElement('br');

						$(blockElem).replaceWith(br);
						this.caret.setBefore(br);

						this.code.sync();

						return false;
					}
				},
				replaceDivToParagraph: function()
				{
					var blockElem = this.selection.getBlock();
					var blockHtml = blockElem.innerHTML.replace(/<br\s?\/?>/gi, '');
					if (blockElem.tagName === 'DIV' && blockHtml === '' && !$(blockElem).hasClass('redactor-editor'))
					{
						var p = document.createElement('p');
						p.innerHTML = this.opts.invisibleSpace;

						$(blockElem).replaceWith(p);
						this.caret.setStart(p);

						this.code.sync();

						return false;
					}
					else if (this.opts.cleanStyleOnEnter && blockElem.tagName == 'P')
					{
						$(blockElem).removeAttr('class').removeAttr('style');
					}
				},
				insertParagraph: function(e)
				{
					e.preventDefault();

					this.selection.get();

					var p = document.createElement('p');
					p.innerHTML = this.opts.invisibleSpace;

					this.range.deleteContents();
					this.range.insertNode(p);

					this.caret.setStart(p);

					this.code.sync();

					return false;
				},
				exitFromBlockquote: function(e)
				{
					if (!this.utils.isEndOfElement()) return;

					var tmp = $.trim($(this.keydown.block).html());
					if (tmp.search(/(<br\s?\/?>){2}$/i) != -1)
					{
						e.preventDefault();

						if (this.opts.linebreaks)
						{
							var br = document.createElement('br');
							$(this.keydown.blockquote).after(br);

							this.caret.setBefore(br);
							$(this.keydown.block).html(tmp.replace(/<br\s?\/?>$/i, ''));
						}
						else
						{
							var node = $(this.opts.emptyHtml);
							$(this.keydown.blockquote).after(node);
							this.caret.setStart(node);
						}

						return true;

					}

					return;

				},
				insertAfterLastElement: function(element)
				{
					if (!this.utils.isEndOfElement()) return;

					this.buffer.set();

					if (this.opts.linebreaks)
					{
						var contents = $('<div>').append($.trim(this.$editor.html())).contents();
						var last = contents.last()[0];
						if (last.tagName == 'SPAN' && last.innerHTML === '')
						{
							last = contents.prev()[0];
						}

						if (this.utils.getOuterHtml(last) != this.utils.getOuterHtml(element)) return;

						var br = document.createElement('br');
						$(element).after(br);
						this.caret.setAfter(br);

					}
					else
					{
						if (this.$editor.contents().last()[0] !== element) return;

						var node = $(this.opts.emptyHtml);
						$(element).after(node);
						this.caret.setStart(node);
					}
				},
				insertNewLine: function(e)
				{
					e.preventDefault();

					var node = document.createTextNode('\n');

					this.selection.get();

					this.range.deleteContents();
					this.range.insertNode(node);

					this.caret.setAfter(node);

					this.code.sync();

					return false;
				},
				insertBreakLine: function(e)
				{
					return this.keydown.insertBreakLineProcessing(e);
				},
				insertDblBreakLine: function(e)
				{
					return this.keydown.insertBreakLineProcessing(e, true);
				},
				insertBreakLineProcessing: function(e, dbl)
				{
					e.stopPropagation();

					this.selection.get();
					var br1 = document.createElement('br');

					if (this.utils.browser('msie'))
					{
						this.range.collapse(false);
						this.range.setEnd(this.range.endContainer, this.range.endOffset);
					}
					else
					{
						this.range.deleteContents();
					}

					this.range.insertNode(br1);

					if (dbl === true)
					{

						var $next = $(br1).next();
						if ($next.length !== 0 && $next[0].tagName === 'BR' && this.utils.isEndOfEditor())
						{
							this.caret.setAfter(br1);
							this.code.sync();
							return false;
						}

						var br2 = document.createElement('br');
						this.range.insertNode(br2);
						this.caret.setAfter(br2);
					}
					else
					{
						this.keydown.insertBreakLineProcessingAfter(br1);
					}

					this.code.sync();
					return false;
				},
				insertBreakLineProcessingAfter: function(node)
				{
					var space = this.utils.createSpaceElement();
					$(node).after(space);
					this.selection.selectElement(space);

					$(space).replaceWith(function()
					{
						return $(this).contents();
					});
				},
				removeInvisibleSpace: function()
				{
					var $current = $(this.keydown.current);
					if ($current.text().search(/^\u200B$/g) === 0)
					{
						$current.remove();
					}
				},
				removeEmptyListInTable: function(e)
				{
					var $current = $(this.keydown.current);
					var $parent = $(this.keydown.parent);
					var td = $current.closest('td');

					if (td.length !== 0 && $current.closest('li') && $parent.children('li').length === 1)
					{
						if (!this.utils.isEmpty($current.text())) return;

						e.preventDefault();

						$current.remove();
						$parent.remove();

						this.caret.setStart(td);
					}
				}
			};
		},
		keyup: function()
		{
			return {
				init: function(e)
				{
					if (this.rtePaste) return;

					var key = e.which;

					this.keyup.current = this.selection.getCurrent();
					this.keyup.parent = this.selection.getParent();
					var $parent = this.utils.isRedactorParent($(this.keyup.parent).parent());

					// callback
					var keyupStop = this.core.setCallback('keyup', e);
					if (keyupStop === false)
					{
						e.preventDefault();
						return false;
					}

					// replace to p before / after the table or body
					if (!this.opts.linebreaks && this.keyup.current.nodeType == 3 && this.keyup.current.length <= 1 && (this.keyup.parent === false || this.keyup.parent.tagName == 'BODY'))
					{
						this.keyup.replaceToParagraph();
					}

					// replace div after lists
					if (!this.opts.linebreaks && this.utils.isRedactorParent(this.keyup.current) && this.keyup.current.tagName === 'DIV')
					{
						this.keyup.replaceToParagraph(false);
					}


					if (!this.opts.linebreaks && $(this.keyup.parent).hasClass('redactor-invisible-space') && ($parent === false || $parent[0].tagName == 'BODY'))
					{
						$(this.keyup.parent).contents().unwrap();
						this.keyup.replaceToParagraph();
					}

					// linkify
					if (this.keyup.isLinkify(key))
					{
						this.formatLinkify(this.opts.linkProtocol, this.opts.convertLinks, this.opts.convertUrlLinks, this.opts.convertImageLinks, this.opts.convertVideoLinks, this.opts.linkSize);

						this.observe.load();
						this.code.sync();
					}

					if (key === this.keyCode.DELETE || key === this.keyCode.BACKSPACE)
					{
						// clear unverified
						this.clean.clearUnverified();

						if (this.observe.image)
						{
							e.preventDefault();

							this.image.hideResize();

							this.buffer.set();
							this.image.remove(this.observe.image);
							this.observe.image = false;

							return false;
						}

						// remove empty paragraphs
						this.$editor.find('p').each($.proxy(this.utils.removeEmpty, this));

						// remove invisible space
						if (this.opts.linebreaks && this.keyup.current && this.keyup.current.tagName == 'DIV' && this.utils.isEmpty(this.keyup.current.innerHTML))
						{
							$(this.keyup.current).after(this.selection.getMarkerAsHtml());
							this.selection.restore();
							$(this.keyup.current).remove();
						}

						// if empty
						return this.keyup.formatEmpty(e);
					}
				},
				isLinkify: function(key)
				{
					return this.opts.convertLinks && (this.opts.convertUrlLinks || this.opts.convertImageLinks || this.opts.convertVideoLinks) && key === this.keyCode.ENTER && !this.utils.isCurrentOrParent('PRE');
				},
				replaceToParagraph: function(clone)
				{
					var $current = $(this.keyup.current);

					var node;
					if (clone === false)
					{
						node = $('<p>').append($current.html());
					}
					else
					{
						node = $('<p>').append($current.clone());
					}

					$current.replaceWith(node);
					var next = $(node).next();
					if (typeof(next[0]) !== 'undefined' && next[0].tagName == 'BR')
					{
						next.remove();
					}

					this.caret.setEnd(node);
				},
				formatEmpty: function(e)
				{
					var html = $.trim(this.$editor.html());

					if (!this.utils.isEmpty(html)) return;

					e.preventDefault();

					if (this.opts.linebreaks)
					{
						this.$editor.html(this.selection.getMarkerAsHtml());
						this.selection.restore();
					}
					else
					{
						html = '<p><br /></p>';

						this.$editor.html(html);
						this.focus.setStart();
					}

					this.code.sync();

					return false;
				}
			};
		},
		lang: function()
		{
			return {
				load: function()
				{
					this.opts.curLang = this.opts.langs[this.opts.lang];
				},
				get: function(name)
				{
					return (typeof this.opts.curLang[name] != 'undefined') ? this.opts.curLang[name] : '';
				}
			};
		},
		line: function()
		{
			return {
				insert: function()
				{
					this.buffer.set();

					var blocks = this.selection.getBlocks();
 					if (blocks[0] !== false && this.line.isExceptLastOrFirst(blocks))
	 				{
	 					if (!this.utils.browser('msie')) this.$editor.focus();
	 					return;
					}

					if (this.utils.browser('msie'))
					{
						this.line.insertInIe();
					}
					else
					{
						this.line.insertInOthersBrowsers();
					}
				},
				isExceptLastOrFirst: function(blocks)
				{
					var exceptTags = ['li', 'td', 'th', 'blockquote', 'figcaption', 'pre', 'dl', 'dt', 'dd'];

					var first = blocks[0].tagName.toLowerCase();
					var last = this.selection.getLastBlock();

					last = (typeof last == 'undefined') ? first : last.tagName.toLowerCase();

					var firstFound = $.inArray(first, exceptTags) != -1;
					var lastFound = $.inArray(last, exceptTags) != -1;

					if ((firstFound && lastFound) || firstFound)
					{
						return true;
					}
				},
				insertInIe: function()
				{
					this.utils.saveScroll();
					this.buffer.set();

					this.insert.node(document.createElement('hr'));

					this.utils.restoreScroll();
					this.code.sync();
				},
				insertInOthersBrowsers: function()
				{
					this.buffer.set();

					var extra = '<p id="redactor-insert-line"><br /></p>';
					if (this.opts.linebreaks) extra = '<br id="redactor-insert-line">';

					document.execCommand('insertHTML', false, '<hr>' + extra);

					this.line.setFocus();
					this.code.sync();
				},
				setFocus: function()
				{
					var node = this.$editor.find('#redactor-insert-line');
					var next = $(node).next()[0];

					if (next)
					{
						this.caret.setAfter(node);
						node.remove();
					}
					else
					{
						node.removeAttr('id');
					}
				}
			};
		},
		link: function()
		{
			return {
				show: function(e)
				{
					if (typeof e != 'undefined' && e.preventDefault) e.preventDefault();

					this.modal.load('link', this.lang.get('link_insert'), 600);

					this.modal.createCancelButton();
					this.link.buttonInsert = this.modal.createActionButton(this.lang.get('insert'));

					this.selection.get();

					this.link.getData();
					this.link.cleanUrl();

					if (this.link.target == '_blank') $('#redactor-link-blank').prop('checked', true);

					this.link.$inputUrl = $('#redactor-link-url');
					this.link.$inputText = $('#redactor-link-url-text');

					this.link.$inputText.val(this.link.text);
					this.link.$inputUrl.val(this.link.url);

					this.link.buttonInsert.on('click', $.proxy(this.link.insert, this));

					// hide link's tooltip
					$('.redactor-link-tooltip').remove();

					// show modal
					this.selection.save();
					this.modal.show();
					this.link.$inputUrl.focus();
				},
				cleanUrl: function()
				{
					var thref = self.location.href.replace(/\/$/i, '');
					this.link.url = this.link.url.replace(thref, '');
					this.link.url = this.link.url.replace(/^\/#/, '#');
					this.link.url = this.link.url.replace('mailto:', '');

					// remove host from href
					if (!this.opts.linkProtocol)
					{
						var re = new RegExp('^(http|ftp|https)://' + self.location.host, 'i');
						this.link.url = this.link.url.replace(re, '');
					}

				},
				getData: function()
				{
					this.link.$node = false;

					var $el = $(this.selection.getCurrent()).closest('a');
					if ($el.length !== 0 && $el[0].tagName === 'A')
					{
						this.link.$node = $el;

						this.link.url = $el.attr('href');
						this.link.text = $el.text();
						this.link.target = $el.attr('target');
					}
					else
					{
						this.link.text = this.sel.toString();
						this.link.url = '';
						this.link.target = '';
					}

				},
				insert: function()
				{
					var target = '';
					var link = this.link.$inputUrl.val();
					var text = this.link.$inputText.val();

					if ($.trim(link) === '')
					{
						this.link.$inputUrl.addClass('redactor-input-error').on('keyup', function()
						{
							$(this).removeClass('redactor-input-error');
							$(this).off('keyup');

						});

						return;
					}

					// mailto
					if (link.search('@') != -1 && /(http|ftp|https):\/\//i.test(link) === false)
					{
						link = 'mailto:' + link;
					}
					// url, not anchor
					else if (link.search('#') !== 0)
					{
						if ($('#redactor-link-blank').prop('checked'))
						{
							target = '_blank';
						}

						// test url (add protocol)
						var pattern = '((xn--)?[a-z0-9]+(-[a-z0-9]+)*\\.)+[a-z]{2,}';
						var re = new RegExp('^(http|ftp|https)://' + pattern, 'i');
						var re2 = new RegExp('^' + pattern, 'i');
						var re3 = new RegExp('\.(html|php)$', 'i');
						if (link.search(re) == -1 && link.search(re3) == -1 && link.search(re2) === 0 && this.opts.linkProtocol)
						{
							link = this.opts.linkProtocol + '://' + link;
						}
					}

					this.link.set(text, link, target);
					this.modal.close();
				},
				set: function(text, link, target)
				{
					text = $.trim(text.replace(/<|>/g, ''));

					this.selection.restore();

					if (text === '' && link === '') return;
					if (text === '' && link !== '') text = link;

					if (this.link.$node)
					{
						this.buffer.set();

						this.link.$node.text(text).attr('href', link);
						if (target !== '')
						{
							this.link.$node.attr('target', target);
						}
						else
						{
							this.link.$node.removeAttr('target');
						}

						this.code.sync();
					}
					else
					{
						if (this.utils.browser('mozilla') && this.link.text === '')
						{
							var $a = $('<a />').attr('href', link).text(text);
							if (target !== '') $a.attr('target', target);

							this.insert.node($a);
							this.selection.selectElement($a);
						}
						else
						{
							var $a;
							if (this.utils.browser('msie'))
							{
								$a = $('<a href="' + link + '">').text(text);
								if (target !== '') $a.attr('target', target);

								$a = $(this.insert.node($a));
								this.selection.selectElement($a);
							}
							else
							{
								document.execCommand('createLink', false, link);

								$a = $(this.selection.getCurrent()).closest('a');
								if (this.utils.browser('mozilla'))
								{
									$a = $('a[_moz_dirty=""]');
								}

								if (target !== '') $a.attr('target', target);
								$a.removeAttr('style').removeAttr('_moz_dirty');

								if (this.link.text !== '' || this.link.text != text)
								{

									$a.text(text);
									this.selection.selectElement($a);
								}
							}
						}

						this.code.sync();
						this.core.setCallback('insertedLink', $a);

					}

					// link tooltip
					setTimeout($.proxy(function()
					{
						this.observe.links();

					}, this), 5);
				},
				unlink: function(e)
				{
					if (typeof e != 'undefined' && e.preventDefault)
					{
						e.preventDefault();
					}

					var nodes = this.selection.getNodes();
					if (!nodes) return;

					this.buffer.set();

					var len = nodes.length;
					for (var i = 0; i < len; i++)
					{
						var $node = $(nodes[i]).closest('a');
						$node.replaceWith($node.contents());
					}

					// hide link's tooltip
					$('.redactor-link-tooltip').remove();

					this.code.sync();

				},
				toggleClass: function(className)
				{
					this.link.setClass(className, 'toggleClass');
				},
				addClass: function(className)
				{
					this.link.setClass(className, 'addClass');
				},
				removeClass: function(className)
				{
					this.link.setClass(className, 'removeClass');
				},
				setClass: function(className, func)
				{
					var links = this.selection.getInlinesTags(['a']);
					if (links === false) return;

					$.each(links, function()
					{
						$(this)[func](className);
					});
				}
			};
		},
		list: function()
		{
			return {
				toggle: function(cmd)
				{
					this.placeholder.remove();
					if (!this.utils.browser('msie')) this.$editor.focus();

					this.buffer.set();
					this.selection.save();

					var parent = this.selection.getParent();
					var $list = $(parent).closest('ol, ul');

					if (!this.utils.isRedactorParent($list) && $list.length !== 0)
					{
						$list = false;
					}

					var isUnorderedCmdOrdered, isOrderedCmdUnordered;
					var remove = false;
					if ($list && $list.length)
					{
						remove = true;
						var listTag = $list[0].tagName;

						isUnorderedCmdOrdered = (cmd === 'orderedlist' && listTag === 'UL');
						isOrderedCmdUnordered = (cmd === 'unorderedlist' && listTag === 'OL');
					}

					if (isUnorderedCmdOrdered)
					{
						this.utils.replaceToTag($list, 'ol');
					}
					else if (isOrderedCmdUnordered)
					{
						this.utils.replaceToTag($list, 'ul');
					}
					else
					{
						if (remove)
						{
							this.list.remove(cmd);
						}
						else
						{
							this.list.insert(cmd);
						}
					}


					this.selection.restore();
					this.code.sync();
				},
				insert: function(cmd)
				{
					var parent = this.selection.getParent();
					var current = this.selection.getCurrent();
					var $td = $(current).closest('td, th');

					if (this.utils.browser('msie') && this.opts.linebreaks)
					{
						this.list.insertInIe(cmd);
					}
					else
					{
						document.execCommand('insert' + cmd);
					}

					var $list = $(this.selection.getParent()).closest('ol, ul');

					if ($td.length !== 0)
					{
						var prev = $td.prev();
						var html = $td.html();
						$td.html('');
						if (prev && prev.length === 1 && (prev[0].tagName === 'TD' || prev[0].tagName === 'TH'))
						{
							$(prev).after($td);
						}
						else
						{
							$(parent).prepend($td);
						}

						$td.html(html);
					}

					if (this.utils.isEmpty($list.find('li').text()))
					{
						var $children = $list.children('li');
						$children.find('br').remove();
						$children.append(this.selection.getMarkerAsHtml());
					}

					if ($list.length)
					{
						// remove block-element list wrapper
						var $listParent = $list.parent();
						if (this.utils.isRedactorParent($listParent) && $listParent[0].tagName != 'LI' && this.utils.isBlock($listParent[0]))
						{
							$listParent.replaceWith($listParent.contents());
						}
					}

					if (!this.utils.browser('msie'))
					{
						this.$editor.focus();
					}

					this.clean.clearUnverified();
				},
				insertInIe: function(cmd)
				{
					var wrapper = this.selection.wrap('div');
					var wrapperHtml = $(wrapper).html();

					var tmpList = (cmd == 'orderedlist') ? $('<ol>') : $('<ul>');
					var tmpLi = $('<li>');

					if ($.trim(wrapperHtml) === '')
					{
						tmpLi.append(this.selection.getMarkerAsHtml());
						tmpList.append(tmpLi);
						this.$editor.find('#selection-marker-1').replaceWith(tmpList);
					}
					else
					{
						var items = wrapperHtml.split(/<br\s?\/?>/gi);
						if (items)
						{
							for (var i = 0; i < items.length; i++)
							{
								if ($.trim(items[i]) !== '')
								{
									tmpList.append($('<li>').html(items[i]));
								}
							}
						}
						else
						{
							tmpLi.append(wrapperHtml);
							tmpList.append(tmpLi);
						}

						$(wrapper).replaceWith(tmpList);
					}
				},
				remove: function(cmd)
				{
					document.execCommand('insert' + cmd);

					var $current = $(this.selection.getCurrent());

					this.indent.fixEmptyIndent();

					if (!this.opts.linebreaks && $current.closest('li, th, td').length === 0)
					{
						document.execCommand('formatblock', false, 'p');
						this.$editor.find('ul, ol, blockquote').each($.proxy(this.utils.removeEmpty, this));
					}

					var $table = $(this.selection.getCurrent()).closest('table');
					var $prev = $table.prev();
					if (!this.opts.linebreaks && $table.length !== 0 && $prev.length !== 0 && $prev[0].tagName == 'BR')
					{
						$prev.remove();
					}

					this.clean.clearUnverified();

				}
			};
		},
		modal: function()
		{
			return {
				callbacks: {},
				loadTemplates: function()
				{
					this.opts.modal = {
						imageEdit: String()
						+ '<section id="redactor-modal-image-edit">'
							+ '<label>' + this.lang.get('title') + '</label>'
							+ '<input type="text" id="redactor-image-title" />'
							+ '<label class="redactor-image-link-option">' + this.lang.get('link') + '</label>'
							+ '<input type="text" id="redactor-image-link" class="redactor-image-link-option" />'
							+ '<label class="redactor-image-link-option"><input type="checkbox" id="redactor-image-link-blank"> ' + this.lang.get('link_new_tab') + '</label>'
							+ '<label class="redactor-image-position-option">' + this.lang.get('image_position') + '</label>'
							+ '<select class="redactor-image-position-option" id="redactor-image-align">'
								+ '<option value="none">' + this.lang.get('none') + '</option>'
								+ '<option value="left">' + this.lang.get('left') + '</option>'
								+ '<option value="center">' + this.lang.get('center') + '</option>'
								+ '<option value="right">' + this.lang.get('right') + '</option>'
							+ '</select>'
						+ '</section>',

						image: String()
						+ '<section id="redactor-modal-image-insert">'
							+ '<div id="redactor-modal-image-droparea"></div>'
 						+ '</section>',

						file: String()
						+ '<section id="redactor-modal-file-insert">'
							+ '<div id="redactor-modal-file-upload-box">'
								+ '<label>' + this.lang.get('filename') + '</label>'
								+ '<input type="text" id="redactor-filename" /><br><br>'
								+ '<div id="redactor-modal-file-upload"></div>'
							+ '</div>'
						+ '</section>',

						link: String()
						+ '<section id="redactor-modal-link-insert">'
							+ '<label>URL</label>'
							+ '<input type="url" id="redactor-link-url" />'
							+ '<label>' + this.lang.get('text') + '</label>'
							+ '<input type="text" id="redactor-link-url-text" />'
							+ '<label><input type="checkbox" id="redactor-link-blank"> ' + this.lang.get('link_new_tab') + '</label>'
						+ '</section>'
					};


					$.extend(this.opts, this.opts.modal);

				},
				addCallback: function(name, callback)
				{
					this.modal.callbacks[name] = callback;
				},
				createTabber: function($modal)
				{
					this.modal.$tabber = $('<div>').attr('id', 'redactor-modal-tabber');

					$modal.prepend(this.modal.$tabber);
				},
				addTab: function(id, name, active)
				{
					var $tab = $('<a href="#" rel="tab' + id + '">').text(name);
					if (active)
					{
						$tab.addClass('active');
					}

					var self = this;
					$tab.on('click', function(e)
					{
						e.preventDefault();
						$('.redactor-tab').hide();
						$('.redactor-' + $(this).attr('rel')).show();

						self.modal.$tabber.find('a').removeClass('active');
						$(this).addClass('active');

					});

					this.modal.$tabber.append($tab);
				},
				addTemplate: function(name, template)
				{
					this.opts.modal[name] = template;
				},
				getTemplate: function(name)
				{
					return this.opts.modal[name];
				},
				getModal: function()
				{
					return this.$modalBody.find('section');
				},
				load: function(templateName, title, width)
				{
					this.modal.templateName = templateName;
					this.modal.width = width;

					this.modal.build();
					this.modal.enableEvents();
					this.modal.setTitle(title);
					this.modal.setDraggable();
					this.modal.setContent();

					// callbacks
					if (typeof this.modal.callbacks[templateName] != 'undefined')
					{
						this.modal.callbacks[templateName].call(this);
					}

				},
				show: function()
				{
					// ios keyboard hide
					if (this.utils.isMobile() && !this.utils.browser('msie'))
					{
						document.activeElement.blur();
					}

					$(document.body).removeClass('body-redactor-hidden');
					this.modal.bodyOveflow = $(document.body).css('overflow');
					$(document.body).css('overflow', 'hidden');

					if (this.utils.isMobile())
					{
						this.modal.showOnMobile();
					}
					else
					{
						this.modal.showOnDesktop();
					}

					this.$modalOverlay.show();
					this.$modalBox.show();

					this.modal.setButtonsWidth();

					this.utils.saveScroll();

					// resize
					if (!this.utils.isMobile())
					{
						setTimeout($.proxy(this.modal.showOnDesktop, this), 0);
						$(window).on('resize.redactor-modal', $.proxy(this.modal.resize, this));
					}

					// modal shown callback
					this.core.setCallback('modalOpened', this.modal.templateName, this.$modal);

					// fix bootstrap modal focus
					$(document).off('focusin.modal');

					// enter
					this.$modal.find('input[type=text],input[type=url],input[type=email]').on('keydown.redactor-modal', $.proxy(this.modal.setEnter, this));
				},
				showOnDesktop: function()
				{
					var height = this.$modal.outerHeight();
					var windowHeight = $(window).height();
					var windowWidth = $(window).width();

					if (this.modal.width > windowWidth)
					{
						this.$modal.css({
							width: '96%',
							marginTop: (windowHeight/2 - height/2) + 'px'
						});
						return;
					}

					if (height > windowHeight)
					{
						this.$modal.css({
							width: this.modal.width + 'px',
							marginTop: '20px'
						});
					}
					else
					{
						this.$modal.css({
							width: this.modal.width + 'px',
							marginTop: (windowHeight/2 - height/2) + 'px'
						});
					}
				},
				showOnMobile: function()
				{
					this.$modal.css({
						width: '96%',
						marginTop: '2%'
					});

				},
				resize: function()
				{
					if (this.utils.isMobile())
					{
						this.modal.showOnMobile();
					}
					else
					{
						this.modal.showOnDesktop();
					}
				},
				setTitle: function(title)
				{
					this.$modalHeader.html(title);
				},
				setContent: function()
				{
					this.$modalBody.html(this.modal.getTemplate(this.modal.templateName));
				},
				setDraggable: function()
				{
					if (typeof $.fn.draggable === 'undefined') return;

					this.$modal.draggable({ handle: this.$modalHeader });
					this.$modalHeader.css('cursor', 'move');
				},
				setEnter: function(e)
				{
					if (e.which != 13) return;

					e.preventDefault();
					this.$modal.find('button.redactor-modal-action-btn').click();
				},
				createCancelButton: function()
				{
					var button = $('<button>').addClass('redactor-modal-btn redactor-modal-close-btn').html(this.lang.get('cancel'));
					button.on('click', $.proxy(this.modal.close, this));

					this.$modalFooter.append(button);
				},
				createDeleteButton: function(label)
				{
					return this.modal.createButton(label, 'delete');
				},
				createActionButton: function(label)
				{
					return this.modal.createButton(label, 'action');
				},
				createButton: function(label, className)
				{
					var button = $('<button>').addClass('redactor-modal-btn').addClass('redactor-modal-' + className + '-btn').html(label);
					this.$modalFooter.append(button);

					return button;
				},
				setButtonsWidth: function()
				{
					var buttons = this.$modalFooter.find('button');
					var buttonsSize = buttons.length;
					if (buttonsSize === 0) return;

					buttons.css('width', (100/buttonsSize) + '%');
				},
				build: function()
				{
					this.modal.buildOverlay();

					this.$modalBox = $('<div id="redactor-modal-box" />').hide();
					this.$modal = $('<div id="redactor-modal" />');
					this.$modalHeader = $('<header />');
					this.$modalClose = $('<span id="redactor-modal-close" />').html('&times;');
					this.$modalBody = $('<div id="redactor-modal-body" />');
					this.$modalFooter = $('<footer />');

					this.$modal.append(this.$modalHeader);
					this.$modal.append(this.$modalClose);
					this.$modal.append(this.$modalBody);
					this.$modal.append(this.$modalFooter);
					this.$modalBox.append(this.$modal);
					this.$modalBox.appendTo(document.body);
				},
				buildOverlay: function()
				{
					this.$modalOverlay = $('<div id="redactor-modal-overlay">').hide();
					$('body').prepend(this.$modalOverlay);
				},
				enableEvents: function()
				{
					this.$modalClose.on('click.redactor-modal', $.proxy(this.modal.close, this));
					$(document).on('keyup.redactor-modal', $.proxy(this.modal.closeHandler, this));
					this.$editor.on('keyup.redactor-modal', $.proxy(this.modal.closeHandler, this));
					this.$modalBox.on('click.redactor-modal', $.proxy(this.modal.close, this));
				},
				disableEvents: function()
				{
					this.$modalClose.off('click.redactor-modal');
					$(document).off('keyup.redactor-modal');
					this.$editor.off('keyup.redactor-modal');
					this.$modalBox.off('click.redactor-modal');
					$(window).off('resize.redactor-modal');
				},
				closeHandler: function(e)
				{
					if (e.which != this.keyCode.ESC) return;

					this.modal.close(false);
				},
				close: function(e)
				{
					if (e)
					{
						if (!$(e.target).hasClass('redactor-modal-close-btn') && e.target != this.$modalClose[0] && e.target != this.$modalBox[0])
						{
							return;
						}

						e.preventDefault();
					}

					if (!this.$modalBox) return;

					this.modal.disableEvents();

					this.$modalOverlay.remove();

					this.$modalBox.fadeOut('fast', $.proxy(function()
					{
						this.$modalBox.remove();

						setTimeout($.proxy(this.utils.restoreScroll, this), 0);

						if (e !== undefined) this.selection.restore();

						$(document.body).css('overflow', this.modal.bodyOveflow);
						this.core.setCallback('modalClosed', this.modal.templateName);

					}, this));

				}
			};
		},
		observe: function()
		{
			return {
				load: function()
				{
					this.observe.images();
					this.observe.links();
				},
				buttons: function(e, btnName)
				{
					var current = this.selection.getCurrent();
					var parent = this.selection.getParent();

					if (e !== false)
					{
						this.button.setInactiveAll();
					}
					else
					{
						this.button.setInactiveAll(btnName);
					}

					if (e === false && btnName !== 'html')
					{
						if ($.inArray(btnName, this.opts.activeButtons) != -1) this.button.toggleActive(btnName);
						return;
					}

					//var linkButtonName = (this.utils.isCurrentOrParent('A')) ? this.lang.get('link_edit') : this.lang.get('link_insert');
					//$('body').find('a.redactor-dropdown-link').text(linkButtonName);

					$.each(this.opts.activeButtonsStates, $.proxy(function(key, value)
					{
						var parentEl = $(parent).closest(key);
						var currentEl = $(current).closest(key);

						if (parentEl.length !== 0 && !this.utils.isRedactorParent(parentEl)) return;
						if (!this.utils.isRedactorParent(currentEl)) return;
						if (parentEl.length !== 0 || currentEl.closest(key).length !== 0)
						{
							this.button.setActive(value);
						}

					}, this));

					var $parent = $(parent).closest(this.opts.alignmentTags.toString().toLowerCase());
					if (this.utils.isRedactorParent(parent) && $parent.length)
					{
						var align = ($parent.css('text-align') === '') ? 'left' : $parent.css('text-align');
						this.button.setActive('align' + align);
					}
				},
				addButton: function(tag, btnName)
				{
					this.opts.activeButtons.push(btnName);
					this.opts.activeButtonsStates[tag] = btnName;
				},
				images: function()
				{
					this.$editor.find('img').each($.proxy(function(i, img)
					{
						var $img = $(img);

						// IE fix (when we clicked on an image and then press backspace IE does goes to image's url)
						$img.closest('a').on('click', function(e) { e.preventDefault(); });

						if (this.utils.browser('msie')) $img.attr('unselectable', 'on');

						this.image.setEditable($img);

					}, this));

					$(document).on('click.redactor-image-delete.' + this.uuid, $.proxy(function(e)
					{
						this.observe.image = false;
						if (e.target.tagName == 'IMG' && this.utils.isRedactorParent(e.target))
						{
							this.observe.image = (this.observe.image && this.observe.image == e.target) ? false : e.target;
						}

					}, this));

				},
				links: function()
				{
					if (!this.opts.linkTooltip) return;

					this.$editor.find('a').on('touchstart.redactor.' + this.uuid + ' click.redactor.' + this.uuid, $.proxy(this.observe.showTooltip, this));
					this.$editor.on('touchstart.redactor.' + this.uuid + ' click.redactor.' + this.uuid, $.proxy(this.observe.closeTooltip, this));
					$(document).on('touchstart.redactor.' + this.uuid + ' click.redactor.' + this.uuid, $.proxy(this.observe.closeTooltip, this));
				},
				getTooltipPosition: function($link)
				{
					return $link.offset();
				},
				showTooltip: function(e)
				{
					var $link = $(e.target);
					var $parent = $link.closest('a');
					var tag = ($link.length !== 0) ? $link[0].tagName : false;

					if ($parent[0].tagName === 'A')
					{
						if (tag === 'IMG') return;
						else if (tag !== 'A') $link = $parent;
					}

					if (tag !== 'A')
					{
						return;
					}

					var pos = this.observe.getTooltipPosition($link);
					var tooltip = $('<span class="redactor-link-tooltip"></span>');

					var href = $link.attr('href');
					if (href === undefined)
					{
						href = '';
					}

					if (href.length > 24) href = href.substring(0, 24) + '...';

					var aLink = $('<a href="' + $link.attr('href') + '" target="_blank" />').html(href).addClass('redactor-link-tooltip-action');
					var aEdit = $('<a href="#" />').html(this.lang.get('edit')).on('click', $.proxy(this.link.show, this)).addClass('redactor-link-tooltip-action');
					var aUnlink = $('<a href="#" />').html(this.lang.get('unlink')).on('click', $.proxy(this.link.unlink, this)).addClass('redactor-link-tooltip-action');

					tooltip.append(aLink).append(' | ').append(aEdit).append(' | ').append(aUnlink);
					tooltip.css({
						top: (pos.top + parseInt($link.css('line-height'), 10)) + 'px',
						left: pos.left + 'px'
					});

					$('.redactor-link-tooltip').remove();
					$('body').append(tooltip);
				},
				closeTooltip: function(e)
				{
					e = e.originalEvent || e;

					var target = e.target;
					var $parent = $(target).closest('a');
					if ($parent.length !== 0 && $parent[0].tagName === 'A' && target.tagName !== 'A')
					{
						return;
					}
					else if ((target.tagName === 'A' && this.utils.isRedactorParent(target)) || $(target).hasClass('redactor-link-tooltip-action'))
					{
						return;
					}

					$('.redactor-link-tooltip').remove();
				}

			};
		},
		paragraphize: function()
		{
			return {
				load: function(html)
				{
					if (this.opts.linebreaks) return html;
					if (html === '' || html === '<p></p>') return this.opts.emptyHtml;

					this.paragraphize.blocks = ['table', 'div', 'pre', 'form', 'ul', 'ol', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'dl', 'blockquote', 'figcaption',
					'address', 'section', 'header', 'footer', 'aside', 'article', 'object', 'style', 'script', 'iframe', 'select', 'input', 'textarea',
					'button', 'option', 'map', 'area', 'math', 'hr', 'fieldset', 'legend', 'hgroup', 'nav', 'figure', 'details', 'menu', 'summary', 'p'];

					html = html + "\n";

					this.paragraphize.safes = [];
					this.paragraphize.z = 0;

					html = html.replace(/(<br\s?\/?>){1,}\n?<\/blockquote>/gi, '</blockquote>');

					html = this.paragraphize.getSafes(html);
					html = this.paragraphize.getSafesComments(html);
					html = this.paragraphize.replaceBreaksToNewLines(html);
					html = this.paragraphize.replaceBreaksToParagraphs(html);
					html = this.paragraphize.clear(html);
					html = this.paragraphize.restoreSafes(html);

					html = html.replace(new RegExp('<br\\s?/?>\n?<(' + this.paragraphize.blocks.join('|') + ')(.*?[^>])>', 'gi'), '<p><br /></p>\n<$1$2>');

					return $.trim(html);
				},
				getSafes: function(html)
				{
					var $div = $('<div />').append(html);

					// remove paragraphs in blockquotes
					$div.find('blockquote p').replaceWith(function()
					{
						return $(this).append('<br />').contents();
					});

					html = $div.html();

					$div.find(this.paragraphize.blocks.join(', ')).each($.proxy(function(i,s)
					{
						this.paragraphize.z++;
						this.paragraphize.safes[this.paragraphize.z] = s.outerHTML;
						html = html.replace(s.outerHTML, '\n{replace' + this.paragraphize.z + '}');

					}, this));

					return html;
				},
				getSafesComments: function(html)
				{
					var commentsMatches = html.match(/<!--([\w\W]*?)-->/gi);

					if (!commentsMatches) return html;

					$.each(commentsMatches, $.proxy(function(i,s)
					{
						this.paragraphize.z++;
						this.paragraphize.safes[this.paragraphize.z] = s;
						html = html.replace(s, '\n{replace' + this.paragraphize.z + '}');
					}, this));

					return html;
				},
				restoreSafes: function(html)
				{
					$.each(this.paragraphize.safes, function(i,s)
					{
						s = (typeof s !== 'undefined') ? s.replace(/\$/g, '&#36;') : s;
						html = html.replace('{replace' + i + '}', s);

					});

					return html;
				},
				replaceBreaksToParagraphs: function(html)
				{
					var htmls = html.split(new RegExp('\n', 'g'), -1);

					html = '';
					if (htmls)
					{
						var len = htmls.length;
						for (var i = 0; i < len; i++)
						{
							if (!htmls.hasOwnProperty(i)) return;

							if (htmls[i].search('{replace') == -1)
							{
								htmls[i] = htmls[i].replace(/<p>\n\t?<\/p>/gi, '');
								htmls[i] = htmls[i].replace(/<p><\/p>/gi, '');

								if (htmls[i] !== '')
								{
									html += '<p>' +  htmls[i].replace(/^\n+|\n+$/g, "") + "</p>";
								}
							}
							else html += htmls[i];
						}
					}

					return html;
				},
				replaceBreaksToNewLines: function(html)
				{
					html = html.replace(/<br \/>\s*<br \/>/gi, "\n\n");
					html = html.replace(/<br\s?\/?>\n?<br\s?\/?>/gi, "\n<br /><br />");

					html = html.replace(new RegExp("\r\n", 'g'), "\n");
					html = html.replace(new RegExp("\r", 'g'), "\n");
					html = html.replace(new RegExp("/\n\n+/"), 'g', "\n\n");

					return html;
				},
				clear: function(html)
				{
					html = html.replace(new RegExp('</blockquote></p>', 'gi'), '</blockquote>');
					html = html.replace(new RegExp('<p></blockquote>', 'gi'), '</blockquote>');
					html = html.replace(new RegExp('<p><blockquote>', 'gi'), '<blockquote>');
					html = html.replace(new RegExp('<blockquote></p>', 'gi'), '<blockquote>');

					html = html.replace(new RegExp('<p><p ', 'gi'), '<p ');
					html = html.replace(new RegExp('<p><p>', 'gi'), '<p>');
					html = html.replace(new RegExp('</p></p>', 'gi'), '</p>');
					html = html.replace(new RegExp('<p>\\s?</p>', 'gi'), '');
					html = html.replace(new RegExp("\n</p>", 'gi'), '</p>');
					html = html.replace(new RegExp('<p>\t?\t?\n?<p>', 'gi'), '<p>');
					html = html.replace(new RegExp('<p>\t*</p>', 'gi'), '');

					return html;
				}
			};
		},
		paste: function()
		{
			return {
				init: function(e)
				{
					if (!this.opts.cleanOnPaste)
					{
						setTimeout($.proxy(this.code.sync, this), 1);
						return;
					}

					this.rtePaste = true;

					this.buffer.set();
					this.selection.save();
					this.utils.saveScroll();

					this.paste.createPasteBox();

					$(window).on('scroll.redactor-freeze', $.proxy(function()
					{
						$(window).scrollTop(this.saveBodyScroll);

					}, this));

					setTimeout($.proxy(function()
					{
						var html = this.$pasteBox.html();

						this.$pasteBox.remove();

						this.selection.restore();
						this.utils.restoreScroll();

						this.paste.insert(html);

						$(window).off('scroll.redactor-freeze');

					}, this), 1);

				},
				createPasteBox: function()
				{
					this.$pasteBox = $('<div>').html('').attr('contenteditable', 'true').css({ position: 'fixed', width: 0, top: 0, left: '-9999px' });

					if (this.utils.browser('msie'))
					{
						this.$box.append(this.$pasteBox);
					}
					else
					{
						$('body').append(this.$pasteBox);
					}

					this.$pasteBox.focus();
				},
				insert: function(html)
				{
					html = this.core.setCallback('pasteBefore', html);

					// clean
					html = (this.utils.isSelectAll()) ? this.clean.onPaste(html, false) : this.clean.onPaste(html);

					html = this.core.setCallback('paste', html);

					if (this.utils.isSelectAll())
					{
						this.insert.set(html, false);
					}
					else
					{
						this.insert.html(html, false);
					}

					this.utils.disableSelectAll();
					this.rtePaste = false;

					setTimeout($.proxy(this.clean.clearUnverified, this), 10);

					// clean empty spans
					setTimeout($.proxy(function()
					{
						var spans = this.$editor.find('span');
						$.each(spans, function(i,s)
						{
							var html = s.innerHTML.replace(/[\u200B-\u200D\uFEFF]/, '');
							if (html === '' && s.attributes.length === 0) $(s).remove();

						});

					}, this), 10);
				}
			};
		},
		placeholder: function()
		{
			return {
				enable: function()
				{
					if (!this.placeholder.is()) return;

					this.$editor.attr('placeholder', this.$element.attr('placeholder'));

					this.placeholder.toggle();
					this.$editor.on('keyup.redactor-placeholder', $.proxy(this.placeholder.toggle, this));

				},
				toggle: function()
				{
					var func = 'removeClass';
					if (this.utils.isEmpty(this.$editor.html(), false)) func = 'addClass';
					this.$editor[func]('redactor-placeholder');
				},
				remove: function()
				{
					this.$editor.removeClass('redactor-placeholder');
				},
				is: function()
				{
					if (this.opts.placeholder)
					{
						return this.$element.attr('placeholder', this.opts.placeholder);
					}
					else
					{
						return !(typeof this.$element.attr('placeholder') == 'undefined' || this.$element.attr('placeholder') === '');
					}
				}
			};
		},
		progress: function()
		{
			return {
				show: function()
				{
					$(document.body).append($('<div id="redactor-progress"><span></span></div>'));
					$('#redactor-progress').fadeIn();
				},
				hide: function()
				{
					$('#redactor-progress').fadeOut(1500, function()
					{
						$(this).remove();
					});
				}

			};
		},
		selection: function()
		{
			return {
				get: function()
				{
					this.sel = document.getSelection();

					if (document.getSelection && this.sel.getRangeAt && this.sel.rangeCount)
					{
						this.range = this.sel.getRangeAt(0);
					}
					else
					{
						this.range = document.createRange();
					}
				},
				addRange: function()
				{
					try {
						this.sel.removeAllRanges();
					} catch (e) {}

					this.sel.addRange(this.range);
				},
				getCurrent: function()
				{
					var el = false;
					this.selection.get();

					if (this.sel && this.sel.rangeCount > 0)
					{
						el = this.sel.getRangeAt(0).startContainer;
					}

					return this.utils.isRedactorParent(el);
				},
				getParent: function(elem)
				{
					elem = elem || this.selection.getCurrent();
					if (elem)
					{
						return this.utils.isRedactorParent($(elem).parent()[0]);
					}

					return false;
				},
				getBlock: function(node)
				{
					node = node || this.selection.getCurrent();

					while (node)
					{
						if (this.utils.isBlockTag(node.tagName))
						{
							return ($(node).hasClass('redactor-editor')) ? false : node;
						}

						node = node.parentNode;
					}

					return false;
				},
				getInlines: function(nodes, tags)
				{
					this.selection.get();

					if (this.range && this.range.collapsed)
					{
						return false;
					}

					var inlines = [];
					nodes = (typeof nodes == 'undefined' || nodes === false) ? this.selection.getNodes() : nodes;
					var inlineTags = this.opts.inlineTags;
					inlineTags.push('span');

					if (typeof tags !== 'undefined')
					{
						for (var i = 0; i < tags.length; i++)
						{
							inlineTags.push(tags[i]);
						}
					}

					$.each(nodes, $.proxy(function(i,node)
					{
						if ($.inArray(node.tagName.toLowerCase(), inlineTags) != -1)
						{
							inlines.push(node);
						}

					}, this));

					return (inlines.length === 0) ? false : inlines;
				},
				getInlinesTags: function(tags)
				{
					this.selection.get();

					if (this.range && this.range.collapsed)
					{
						return false;
					}

					var inlines = [];
					var nodes =  this.selection.getNodes();
					$.each(nodes, $.proxy(function(i,node)
					{
						if ($.inArray(node.tagName.toLowerCase(), tags) != -1)
						{
							inlines.push(node);
						}

					}, this));

					return (inlines.length === 0) ? false : inlines;
				},
				getBlocks: function(nodes)
				{
					this.selection.get();

					if (this.range && this.range.collapsed)
					{
						return [this.selection.getBlock()];
					}

					var blocks = [];
					nodes = (typeof nodes == 'undefined') ? this.selection.getNodes() : nodes;
					$.each(nodes, $.proxy(function(i,node)
					{
						if (this.utils.isBlock(node))
						{
							this.selection.lastBlock = node;
							blocks.push(node);
						}

					}, this));

					return (blocks.length === 0) ? [this.selection.getBlock()] : blocks;
				},
				getLastBlock: function()
				{
					return this.selection.lastBlock;
				},
				getNodes: function()
				{
					this.selection.get();

					var startNode = this.selection.getNodesMarker(1);
					var endNode = this.selection.getNodesMarker(2);
					var range = this.range.cloneRange();

					if (this.range.collapsed === false)
					{
						var startContainer = range.startContainer;
						var startOffset = range.startOffset;

						// end marker
						this.selection.setNodesMarker(range, endNode, false);

						// start marker
						range.setStart(startContainer, startOffset);
						this.selection.setNodesMarker(range, startNode, true);
					}
					else
					{
						this.selection.setNodesMarker(range, startNode, true);
						endNode = startNode;
					}

					var nodes = [];
					var counter = 0;

					var self = this;
					this.$editor.find('*').each(function()
					{
						if (this == startNode)
						{
							var parent = $(this).parent();
							if (parent.length !== 0 && parent[0].tagName != 'BODY' && self.utils.isRedactorParent(parent[0]))
							{
								nodes.push(parent[0]);
							}

							nodes.push(this);
							counter = 1;
						}
						else
						{
							if (counter > 0)
							{
								nodes.push(this);
								counter = counter + 1;
							}
						}

						if (this == endNode)
						{
							return false;
						}

					});

					var finalNodes = [];
					var len = nodes.length;
					for (var i = 0; i < len; i++)
					{
						if (nodes[i].id != 'nodes-marker-1' && nodes[i].id != 'nodes-marker-2')
						{
							finalNodes.push(nodes[i]);
						}
					}

					this.selection.removeNodesMarkers();

					return finalNodes;

				},
				getNodesMarker: function(num)
				{
					return $('<span id="nodes-marker-' + num + '" class="redactor-nodes-marker" data-verified="redactor">' + this.opts.invisibleSpace + '</span>')[0];
				},
				setNodesMarker: function(range, node, type)
				{
					try {
						range.collapse(type);
						range.insertNode(node);
					}
					catch (e) {}
				},
				removeNodesMarkers: function()
				{
					$(document).find('span.redactor-nodes-marker').remove();
					this.$editor.find('span.redactor-nodes-marker').remove();
				},
				fromPoint: function(start, end)
				{
					this.caret.setOffset(start, end);
				},
				wrap: function(tag)
				{
					this.selection.get();

					if (this.range.collapsed) return false;

					var wrapper = document.createElement(tag);
					wrapper.appendChild(this.range.extractContents());
					this.range.insertNode(wrapper);

					return wrapper;
				},
				selectElement: function(node)
				{
					this.caret.set(node, 0, node, 1);
				},
				selectAll: function()
				{
					this.selection.get();
					this.range.selectNodeContents(this.$editor[0]);
					this.selection.addRange();
				},
				remove: function()
				{
					this.selection.get();
					this.sel.removeAllRanges();
				},
				save: function()
				{
					this.selection.createMarkers();
				},
				// createMarkers: function()
				// {
				// 	this.selection.get();

				// 	var node1 = this.selection.getMarker(1);

				// 	this.selection.setMarker(this.range, node1, true);

				// 	if (this.range.collapsed === false)
				// 	{
				// 		var node2 = this.selection.getMarker(2);
				// 		this.selection.setMarker(this.range, node2, false);
				// 	}

				// 	this.savedSel = this.$editor.html();
				// },
                createMarkers: function()
                {
                  this.selection.get();

                  var node1 = this.selection.getMarker(1);

                  this.selection.setMarker(this.range, node1, true);

                  if (this.range.collapsed === false)
                  {
                    var node2 = this.selection.getMarker(2);
                    this.selection.setMarker(this.range, node2, false);

                    // Fix for Chrome58 Issues
                    if (this.utils.browser('chrome')) {
                          this.caret.set(node1, 0, node2, 0);
                     }
                     // End Chrome58 Issues
                  }

                  this.savedSel = this.$editor.html();
                },
				getMarker: function(num)
				{
					if (typeof num == 'undefined') num = 1;

					return $('<span id="selection-marker-' + num + '" class="redactor-selection-marker"  data-verified="redactor">' + this.opts.invisibleSpace + '</span>')[0];
				},
				getMarkerAsHtml: function(num)
				{
					return this.utils.getOuterHtml(this.selection.getMarker(num));
				},
				setMarker: function(range, node, type)
				{
					range = range.cloneRange();

					try {
						range.collapse(type);
						range.insertNode(node);
					}
					catch (e)
					{
						this.focus.setStart();
					}
				},
				restore: function()
				{
					var node1 = this.$editor.find('span#selection-marker-1');
					var node2 = this.$editor.find('span#selection-marker-2');

					if (node1.length !== 0 && node2.length !== 0)
					{
						this.caret.set(node1, 0, node2, 0);
					}
					else if (node1.length !== 0)
					{
						this.caret.set(node1, 0, node1, 0);
					}
					else
					{
						this.$editor.focus();
					}

					this.selection.removeMarkers();
					this.savedSel = false;

				},
				removeMarkers: function()
				{
					this.$editor.find('span.redactor-selection-marker').each(function(i,s)
					{
						var text = $(s).text().replace(/[\u200B-\u200D\uFEFF]/g, '');
						if (text === '') $(s).remove();
						else $(s).replaceWith(function() { return $(this).contents(); });
					});
				},
				getText: function()
				{
					this.selection.get();

					return this.sel.toString();
				},
				getHtml: function()
				{
					var html = '';

					this.selection.get();
					if (this.sel.rangeCount)
					{
						var container = document.createElement('div');
						var len = this.sel.rangeCount;
						for (var i = 0; i < len; ++i)
						{
							container.appendChild(this.sel.getRangeAt(i).cloneContents());
						}

						html = container.innerHTML;
					}

					return this.clean.onSync(html);
				},
				replaceWithHtml: function(html)
				{
					html = this.selection.getMarkerAsHtml(1) + html + this.selection.getMarkerAsHtml(2);

					this.selection.get();

					if (window.getSelection && window.getSelection().getRangeAt)
					{
						this.range.deleteContents();
						var div = document.createElement("div");
						div.innerHTML = html;

						var frag = document.createDocumentFragment(), child;
						while ((child = div.firstChild))
						{
							frag.appendChild(child);
						}

						this.range.insertNode(frag);
					}
					else if (document.selection && document.selection.createRange)
					{
						this.range.pasteHTML(html);
					}

					this.selection.restore();
					this.code.sync();
				}
			};
		},
		shortcuts: function()
		{
			return {
				init: function(e, key)
				{
					// disable browser's hot keys for bold and italic
					if (!this.opts.shortcuts)
					{
						if ((e.ctrlKey || e.metaKey) && (key === 66 || key === 73)) e.preventDefault();
						return false;
					}

					$.each(this.opts.shortcuts, $.proxy(function(str, command)
					{
						var keys = str.split(',');
						var len = keys.length;
						for (var i = 0; i < len; i++)
						{
							if (typeof keys[i] === 'string')
							{
								this.shortcuts.handler(e, $.trim(keys[i]), $.proxy(function()
								{
									var func;
									if (command.func.search(/\./) != '-1')
									{
										func = command.func.split('.');
										if (typeof this[func[0]] != 'undefined')
										{
											this[func[0]][func[1]].apply(this, command.params);
										}
									}
									else
									{
										this[command.func].apply(this, command.params);
									}

								}, this));
							}

						}

					}, this));
				},
				handler: function(e, keys, origHandler)
				{
					// based on https://github.com/jeresig/jquery.hotkeys
					var hotkeysSpecialKeys =
					{
						8: "backspace", 9: "tab", 10: "return", 13: "return", 16: "shift", 17: "ctrl", 18: "alt", 19: "pause",
						20: "capslock", 27: "esc", 32: "space", 33: "pageup", 34: "pagedown", 35: "end", 36: "home",
						37: "left", 38: "up", 39: "right", 40: "down", 45: "insert", 46: "del", 59: ";", 61: "=",
						96: "0", 97: "1", 98: "2", 99: "3", 100: "4", 101: "5", 102: "6", 103: "7",
						104: "8", 105: "9", 106: "*", 107: "+", 109: "-", 110: ".", 111 : "/",
						112: "f1", 113: "f2", 114: "f3", 115: "f4", 116: "f5", 117: "f6", 118: "f7", 119: "f8",
						120: "f9", 121: "f10", 122: "f11", 123: "f12", 144: "numlock", 145: "scroll", 173: "-", 186: ";", 187: "=",
						188: ",", 189: "-", 190: ".", 191: "/", 192: "`", 219: "[", 220: "\\", 221: "]", 222: "'"
					};


					var hotkeysShiftNums =
					{
						"`": "~", "1": "!", "2": "@", "3": "#", "4": "$", "5": "%", "6": "^", "7": "&",
						"8": "*", "9": "(", "0": ")", "-": "_", "=": "+", ";": ": ", "'": "\"", ",": "<",
						".": ">",  "/": "?",  "\\": "|"
					};

					keys = keys.toLowerCase().split(" ");
					var special = hotkeysSpecialKeys[e.keyCode],
						character = String.fromCharCode( e.which ).toLowerCase(),
						modif = "", possible = {};

					$.each([ "alt", "ctrl", "meta", "shift"], function(index, specialKey)
					{
						if (e[specialKey + 'Key'] && special !== specialKey)
						{
							modif += specialKey + '+';
						}
					});


					if (special) possible[modif + special] = true;
					if (character)
					{
						possible[modif + character] = true;
						possible[modif + hotkeysShiftNums[character]] = true;

						// "$" can be triggered as "Shift+4" or "Shift+$" or just "$"
						if (modif === "shift+")
						{
							possible[hotkeysShiftNums[character]] = true;
						}
					}

					for (var i = 0, len = keys.length; i < len; i++)
					{
						if (possible[keys[i]])
						{
							e.preventDefault();
							return origHandler.apply(this, arguments);
						}
					}
				}
			};
		},
		tabifier: function()
		{
			return {
				get: function(code)
				{
					if (!this.opts.tabifier) return code;

					// clean setup
					var ownLine = ['area', 'body', 'head', 'hr', 'i?frame', 'link', 'meta', 'noscript', 'style', 'script', 'table', 'tbody', 'thead', 'tfoot'];
					var contOwnLine = ['li', 'dt', 'dt', 'h[1-6]', 'option', 'script'];
					var newLevel = ['p', 'blockquote', 'div', 'dl', 'fieldset', 'form', 'frameset', 'map', 'ol', 'pre', 'select', 'td', 'th', 'tr', 'ul'];

					this.tabifier.lineBefore = new RegExp('^<(/?' + ownLine.join('|/?' ) + '|' + contOwnLine.join('|') + ')[ >]');
					this.tabifier.lineAfter = new RegExp('^<(br|/?' + ownLine.join('|/?' ) + '|/' + contOwnLine.join('|/') + ')[ >]');
					this.tabifier.newLevel = new RegExp('^</?(' + newLevel.join('|' ) + ')[ >]');

					var i = 0,
					codeLength = code.length,
					point = 0,
					start = null,
					end = null,
					tag = '',
					out = '',
					cont = '';

					this.tabifier.cleanlevel = 0;

					for (; i < codeLength; i++)
					{
						point = i;

						// if no more tags, copy and exit
						if (-1 == code.substr(i).indexOf( '<' ))
						{
							out += code.substr(i);

							return this.tabifier.finish(out);
						}

						// copy verbatim until a tag
						while (point < codeLength && code.charAt(point) != '<')
						{
							point++;
						}

						if (i != point)
						{
							cont = code.substr(i, point - i);
							if (!cont.match(/^\s{2,}$/g))
							{
								if ('\n' == out.charAt(out.length - 1)) out += this.tabifier.getTabs();
								else if ('\n' == cont.charAt(0))
								{
									out += '\n' + this.tabifier.getTabs();
									cont = cont.replace(/^\s+/, '');
								}

								out += cont;
							}

							if (cont.match(/\n/)) out += '\n' + this.tabifier.getTabs();
						}

						start = point;

						// find the end of the tag
						while (point < codeLength && '>' != code.charAt(point))
						{
							point++;
						}

						tag = code.substr(start, point - start);
						i = point;

						var t;

						if ('!--' == tag.substr(1, 3))
						{
							if (!tag.match(/--$/))
							{
								while ('-->' != code.substr(point, 3))
								{
									point++;
								}
								point += 2;
								tag = code.substr(start, point - start);
								i = point;
							}

							if ('\n' != out.charAt(out.length - 1)) out += '\n';

							out += this.tabifier.getTabs();
							out += tag + '>\n';
						}
						else if ('!' == tag[1])
						{
							out = this.tabifier.placeTag(tag + '>', out);
						}
						else if ('?' == tag[1])
						{
							out += tag + '>\n';
						}
						else if (t = tag.match(/^<(script|style|pre)/i))
						{
							t[1] = t[1].toLowerCase();
							tag = this.tabifier.cleanTag(tag);
							out = this.tabifier.placeTag(tag, out);
							end = String(code.substr(i + 1)).toLowerCase().indexOf('</' + t[1]);

							if (end)
							{
								cont = code.substr(i + 1, end);
								i += end;
								out += cont;
							}
						}
						else
						{
							tag = this.tabifier.cleanTag(tag);
							out = this.tabifier.placeTag(tag, out);
						}
					}

					return this.tabifier.finish(out);
				},
				getTabs: function()
				{
					var s = '';
					for ( var j = 0; j < this.tabifier.cleanlevel; j++ )
					{
						s += '\t';
					}

					return s;
				},
				finish: function(code)
				{
					code = code.replace(/\n\s*\n/g, '\n');
					code = code.replace(/^[\s\n]*/, '');
					code = code.replace(/[\s\n]*$/, '');
					code = code.replace(/<script(.*?)>\n<\/script>/gi, '<script$1></script>');

					this.tabifier.cleanlevel = 0;

					return code;
				},
				cleanTag: function (tag)
				{
					var tagout = '';
					tag = tag.replace(/\n/g, ' ');
					tag = tag.replace(/\s{2,}/g, ' ');
					tag = tag.replace(/^\s+|\s+$/g, ' ');

					var suffix = '';
					if (tag.match(/\/$/))
					{
						suffix = '/';
						tag = tag.replace(/\/+$/, '');
					}

					var m;
					while (m = /\s*([^= ]+)(?:=((['"']).*?\3|[^ ]+))?/.exec(tag))
					{
						if (m[2]) tagout += m[1].toLowerCase() + '=' + m[2];
						else if (m[1]) tagout += m[1].toLowerCase();

						tagout += ' ';
						tag = tag.substr(m[0].length);
					}

					return tagout.replace(/\s*$/, '') + suffix + '>';
				},
				placeTag: function (tag, out)
				{
					var nl = tag.match(this.tabifier.newLevel);

					if (tag.match(this.tabifier.lineBefore) || nl)
					{
						out = out.replace(/\s*$/, '');
						out += '\n';
					}

					if (nl && '/' == tag.charAt(1)) this.tabifier.cleanlevel--;
					if ('\n' == out.charAt(out.length - 1)) out += this.tabifier.getTabs();
					if (nl && '/' != tag.charAt(1)) this.tabifier.cleanlevel++;

					out += tag;

					if (tag.match(this.tabifier.lineAfter) || tag.match(this.tabifier.newLevel))
					{
						out = out.replace(/ *$/, '');
						//out += '\n';
					}

					return out;
				}
			};
		},
		tidy: function()
		{
			return {
				setupAllowed: function()
				{
					if (this.opts.allowedTags) this.opts.deniedTags = false;
					if (this.opts.allowedAttr) this.opts.removeAttr = false;

					if (this.opts.linebreaks) return;

					var tags = ['p', 'section'];
					if (this.opts.allowedTags) this.tidy.addToAllowed(tags);
					if (this.opts.deniedTags) this.tidy.removeFromDenied(tags);

				},
				addToAllowed: function(tags)
				{
					var len = tags.length;
					for (var i = 0; i < len; i++)
					{
						if ($.inArray(tags[i], this.opts.allowedTags) == -1)
						{
							this.opts.allowedTags.push(tags[i]);
						}
					}
				},
				removeFromDenied: function(tags)
				{
					var len = tags.length;
					for (var i = 0; i < len; i++)
					{
						var pos = $.inArray(tags[i], this.opts.deniedTags);
						if (pos != -1)
						{
							this.opts.deniedTags.splice(pos, 1);
						}
					}
				},
				load: function(html, options)
				{
					this.tidy.settings = {
						deniedTags: this.opts.deniedTags,
						allowedTags: this.opts.allowedTags,
						removeComments: this.opts.removeComments,
						replaceTags: this.opts.replaceTags,
						replaceStyles: this.opts.replaceStyles,
						removeDataAttr: this.opts.removeDataAttr,
						removeAttr: this.opts.removeAttr,
						allowedAttr: this.opts.allowedAttr,
						removeWithoutAttr: this.opts.removeWithoutAttr,
						removeEmpty: this.opts.removeEmpty
					};

					$.extend(this.tidy.settings, options);

					html = this.tidy.removeComments(html);

					// create container
					this.tidy.$div = $('<div />').append(html);

					// clean
					this.tidy.replaceTags();
					this.tidy.replaceStyles();
					this.tidy.removeTags();

					this.tidy.removeAttr();
					this.tidy.removeEmpty();
					this.tidy.removeParagraphsInLists();
					this.tidy.removeDataAttr();
					this.tidy.removeWithoutAttr();

					html = this.tidy.$div.html();
					this.tidy.$div.remove();

					return html;
				},
				removeComments: function(html)
				{
					if (!this.tidy.settings.removeComments) return html;

					return html.replace(/<!--[\s\S]*?-->/gi, '');
				},
				replaceTags: function(html)
				{
					if (!this.tidy.settings.replaceTags) return html;

					var len = this.tidy.settings.replaceTags.length;
					var replacement = [], rTags = [];
					for (var i = 0; i < len; i++)
					{
						rTags.push(this.tidy.settings.replaceTags[i][1]);
						replacement.push(this.tidy.settings.replaceTags[i][0]);
					}

					this.tidy.$div.find(replacement.join(',')).each($.proxy(function(n,s)
					{
						var tag = rTags[n];
						$(s).replaceWith(function()
						{
							var replaced = $('<' + tag + ' />').append($(this).contents());

							for (var i = 0; i < this.attributes.length; i++)
							{
								replaced.attr(this.attributes[i].name, this.attributes[i].value);
							}

							return replaced;
						});

					}, this));

					return html;
				},
				replaceStyles: function()
				{
					if (!this.tidy.settings.replaceStyles) return;

					var len = this.tidy.settings.replaceStyles.length;
					this.tidy.$div.find('span').each($.proxy(function(n,s)
					{
						var $el = $(s);
						var style = $el.attr('style');
						for (var i = 0; i < len; i++)
						{
							if (style && style.match(new RegExp('^' + this.tidy.settings.replaceStyles[i][0], 'i')))
							{
								var tagName = this.tidy.settings.replaceStyles[i][1];
								$el.replaceWith(function()
								{
									var tag = document.createElement(tagName);
									return $(tag).append($(this).contents());
								});
							}
						}

					}, this));

				},
				removeTags: function()
				{
					if (!this.tidy.settings.deniedTags && this.tidy.settings.allowedTags)
					{
						this.tidy.$div.find('*').not(this.tidy.settings.allowedTags.join(',')).each(function(i, s)
						{
							if (s.innerHTML === '') $(s).remove();
							else $(s).contents().unwrap();
						});
					}

					if (this.tidy.settings.deniedTags)
					{
						this.tidy.$div.find(this.tidy.settings.deniedTags.join(',')).each(function(i, s)
						{
							if (s.innerHTML === '') $(s).remove();
							else $(s).contents().unwrap();
						});
					}
				},
				removeAttr: function()
				{
					var len;
					if (!this.tidy.settings.removeAttr && this.tidy.settings.allowedAttr)
					{

						var allowedAttrTags = [], allowedAttrData = [];
						len = this.tidy.settings.allowedAttr.length;
						for (var i = 0; i < len; i++)
						{
							allowedAttrTags.push(this.tidy.settings.allowedAttr[i][0]);
							allowedAttrData.push(this.tidy.settings.allowedAttr[i][1]);
						}


						this.tidy.$div.find('*').each($.proxy(function(n,s)
						{
							var $el = $(s);
							var pos = $.inArray($el[0].tagName.toLowerCase(), allowedAttrTags);
							var attributesRemove = this.tidy.removeAttrGetRemoves(pos, allowedAttrData, $el);

							if (attributesRemove)
							{
								$.each(attributesRemove, function(z,f) {
									$el.removeAttr(f);
								});
							}
						}, this));
					}

					if (this.tidy.settings.removeAttr)
					{
						len = this.tidy.settings.removeAttr.length;
						for (var i = 0; i < len; i++)
						{
							var attrs = this.tidy.settings.removeAttr[i][1];
							if ($.isArray(attrs)) attrs = attrs.join(' ');

							this.tidy.$div.find(this.tidy.settings.removeAttr[i][0]).removeAttr(attrs);
						}
					}

				},
				removeAttrGetRemoves: function(pos, allowed, $el)
				{
					var attributesRemove = [];

					// remove all attrs
					if (pos == -1)
					{
						$.each($el[0].attributes, function(i, item)
						{
							attributesRemove.push(item.name);
						});

					}
					// allow all attrs
					else if (allowed[pos] == '*')
					{
						attributesRemove = [];
					}
					// allow specific attrs
					else
					{
						$.each($el[0].attributes, function(i, item)
						{
							if ($.isArray(allowed[pos]))
							{
								if ($.inArray(item.name, allowed[pos]) == -1)
								{
									attributesRemove.push(item.name);
								}
							}
							else if (allowed[pos] != item.name)
							{
								attributesRemove.push(item.name);
							}

						});
					}

					return attributesRemove;
				},
				removeAttrs: function (el, regex)
				{
					regex = new RegExp(regex, "g");
					return el.each(function()
					{
						var self = $(this);
						var len = this.attributes.length - 1;
						for (var i = len; i >= 0; i--)
						{
							var item = this.attributes[i];
							if (item && item.specified && item.name.search(regex)>=0)
							{
								self.removeAttr(item.name);
							}
						}
					});
				},
				removeEmpty: function()
				{
					if (!this.tidy.settings.removeEmpty) return;

					this.tidy.$div.find(this.tidy.settings.removeEmpty.join(',')).each(function()
					{
						var $el = $(this);
						var text = $el.text();
						text = text.replace(/[\u200B-\u200D\uFEFF]/g, '');
						text = text.replace(/&nbsp;/gi, '');
						text = text.replace(/\s/g, '');

		    	    	if (text === '' && $el.children().length === 0)
		    	    	{
			    	    	$el.remove();
		    	    	}
					});
				},
				removeParagraphsInLists: function()
				{
					this.tidy.$div.find('li p').contents().unwrap();
				},
				removeDataAttr: function()
				{
					if (!this.tidy.settings.removeDataAttr) return;

					var tags = this.tidy.settings.removeDataAttr;
					if ($.isArray(this.tidy.settings.removeDataAttr)) tags = this.tidy.settings.removeDataAttr.join(',');

					this.tidy.removeAttrs(this.tidy.$div.find(tags), '^(data-)');

				},
				removeWithoutAttr: function()
				{
					if (!this.tidy.settings.removeWithoutAttr) return;

					this.tidy.$div.find(this.tidy.settings.removeWithoutAttr.join(',')).each(function()
					{
						if (this.attributes.length === 0)
						{
							$(this).contents().unwrap();
						}
					});
				}
			};
		},
		toolbar: function()
		{
			return {
				init: function()
				{
					return {
						html:
						{
							title: this.lang.get('html'),
							func: 'code.toggle'
						},
						formatting:
						{
							title: this.lang.get('formatting'),
							dropdown:
							{
								p:
								{
									title: this.lang.get('paragraph'),
									func: 'block.format'
								},
								blockquote:
								{
									title: this.lang.get('quote'),
									func: 'block.format'
								},
								pre:
								{
									title: this.lang.get('code'),
									func: 'block.format'
								},
								h1:
								{
									title: this.lang.get('header1'),
									func: 'block.format'
								},
								h2:
								{
									title: this.lang.get('header2'),
									func: 'block.format'
								},
								h3:
								{
									title: this.lang.get('header3'),
									func: 'block.format'
								},
								h4:
								{
									title: this.lang.get('header4'),
									func: 'block.format'
								},
								h5:
								{
									title: this.lang.get('header5'),
									func: 'block.format'
								}
							}
						},
						bold:
						{
							title: this.lang.get('bold'),
							func: 'inline.format'
						},
						italic:
						{
							title: this.lang.get('italic'),
							func: 'inline.format'
						},
						deleted:
						{
							title: this.lang.get('deleted'),
							func: 'inline.format'
						},
						underline:
						{
							title: this.lang.get('underline'),
							func: 'inline.format'
						},
						unorderedlist:
						{
							title: '&bull; ' + this.lang.get('unorderedlist'),
							func: 'list.toggle'
						},
						orderedlist:
						{
							title: '1. ' + this.lang.get('orderedlist'),
							func: 'list.toggle'
						},
						outdent:
						{
							title: '< ' + this.lang.get('outdent'),
							func: 'indent.decrease'
						},
						indent:
						{
							title: '> ' + this.lang.get('indent'),
							func: 'indent.increase'
						},
						image:
						{
							title: this.lang.get('image'),
							func: 'image.show'
						},
						file:
						{
							title: this.lang.get('file'),
							func: 'file.show'
						},
						link:
						{
							title: this.lang.get('link'),
							dropdown:
							{
								link:
								{
									title: this.lang.get('link_insert'),
									func: 'link.show'
								},
								unlink:
								{
									title: this.lang.get('unlink'),
									func: 'link.unlink'
								}
							}
						},
						alignment:
						{
							title: this.lang.get('alignment'),
							dropdown:
							{
								left:
								{
									title: this.lang.get('align_left'),
									func: 'alignment.left'
								},
								center:
								{
									title: this.lang.get('align_center'),
									func: 'alignment.center'
								},
								right:
								{
									title: this.lang.get('align_right'),
									func: 'alignment.right'
								},
								justify:
								{
									title: this.lang.get('align_justify'),
									func: 'alignment.justify'
								}
							}
						},
						horizontalrule:
						{
							title: this.lang.get('horizontalrule'),
							func: 'line.insert'
						}
					};
				},
				build: function()
				{
					this.toolbar.hideButtons();
					this.toolbar.hideButtonsOnMobile();
					this.toolbar.isButtonSourceNeeded();

					if (this.opts.buttons.length === 0) return;

					this.$toolbar = this.toolbar.createContainer();

					this.toolbar.setOverflow();
					this.toolbar.append();
					this.toolbar.setFormattingTags();
					this.toolbar.loadButtons();
					this.toolbar.setFixed();

					// buttons response
					if (this.opts.activeButtons)
					{
						this.$editor.on('mouseup.redactor keyup.redactor focus.redactor', $.proxy(this.observe.buttons, this));
					}

				},
				createContainer: function()
				{
					return $('<ul>').addClass('redactor-toolbar').attr('id', 'redactor-toolbar-' + this.uuid);
				},
				setFormattingTags: function()
				{
					$.each(this.opts.toolbar.formatting.dropdown, $.proxy(function (i, s)
					{
						if ($.inArray(i, this.opts.formatting) == -1) delete this.opts.toolbar.formatting.dropdown[i];
					}, this));

				},
				loadButtons: function()
				{
					$.each(this.opts.buttons, $.proxy(function(i, btnName)
					{
						if (!this.opts.toolbar[btnName]) return;

						if (btnName === 'file')
						{
							 if (this.opts.fileUpload === false) return;
							 else if (!this.opts.fileUpload && this.opts.s3 === false) return;
						}

						if (btnName === 'image')
						{
							 if (this.opts.imageUpload === false) return;
							 else if (!this.opts.imageUpload && this.opts.s3 === false) return;
						}

						var btnObject = this.opts.toolbar[btnName];
						this.$toolbar.append($('<li>').append(this.button.build(btnName, btnObject)));

					}, this));
				},
				append: function()
				{
					if (this.opts.toolbarExternal)
					{
						this.$toolbar.addClass('redactor-toolbar-external');
						$(this.opts.toolbarExternal).html(this.$toolbar);
					}
					else
					{
						this.$box.prepend(this.$toolbar);
					}
				},
				setFixed: function()
				{
					if (!this.utils.isDesktop()) return;
					if (this.opts.toolbarExternal) return;
					if (!this.opts.toolbarFixed) return;

					this.toolbar.observeScroll();
					$(this.opts.toolbarFixedTarget).on('scroll.redactor.' + this.uuid, $.proxy(this.toolbar.observeScroll, this));

				},
				setOverflow: function()
				{
					if (this.utils.isMobile() && this.opts.toolbarOverflow)
					{
						this.$toolbar.addClass('redactor-toolbar-overflow');
					}
				},
				isButtonSourceNeeded: function()
				{
					if (this.opts.source) return;

					var index = this.opts.buttons.indexOf('html');
					if (index !== -1)
					{
						this.opts.buttons.splice(index, 1);
					}
				},
				hideButtons: function()
				{
					if (this.opts.buttonsHide.length === 0) return;

					$.each(this.opts.buttonsHide, $.proxy(function(i, s)
					{
						var index = this.opts.buttons.indexOf(s);
						this.opts.buttons.splice(index, 1);

					}, this));
				},
				hideButtonsOnMobile: function()
				{
					if (!this.utils.isMobile() || this.opts.buttonsHideOnMobile.length === 0) return;

					$.each(this.opts.buttonsHideOnMobile, $.proxy(function(i, s)
					{
						var index = this.opts.buttons.indexOf(s);
						this.opts.buttons.splice(index, 1);

					}, this));
				},
				observeScroll: function()
				{
					var scrollTop = $(this.opts.toolbarFixedTarget).scrollTop();
					var boxTop = 1;

					if (this.opts.toolbarFixedTarget === document)
					{
						boxTop = this.$box.offset().top;
					}

					if (scrollTop > boxTop)
					{
						this.toolbar.observeScrollEnable(scrollTop, boxTop);
					}
					else
					{
						this.toolbar.observeScrollDisable();
					}
				},
				observeScrollEnable: function(scrollTop, boxTop)
				{
					var top = this.opts.toolbarFixedTopOffset + scrollTop - boxTop;
					var left = 0;
					var end = boxTop + this.$box.height() - 32;
					var width = this.$box.innerWidth();

					this.$toolbar.addClass('toolbar-fixed-box');
					this.$toolbar.css({
						position: 'absolute',
						width: width,
						top: top + 'px',
						left: left
					});

					this.toolbar.setDropdownsFixed();
					this.$toolbar.css('visibility', (scrollTop < end) ? 'visible' : 'hidden');
				},
				observeScrollDisable: function()
				{
					this.$toolbar.css({
						position: 'relative',
						width: 'auto',
						top: 0,
						left: 0,
						visibility: 'visible'
					});

					this.toolbar.unsetDropdownsFixed();
					this.$toolbar.removeClass('toolbar-fixed-box');


				},
				setDropdownsFixed: function()
				{
					var top = this.$toolbar.innerHeight() + this.opts.toolbarFixedTopOffset;
					var position = 'fixed';
					if (this.opts.toolbarFixedTarget !== document)
					{
						top = (this.$toolbar.innerHeight() + this.$toolbar.offset().top) + this.opts.toolbarFixedTopOffset;
						position = 'absolute';
					}

					$('.redactor-dropdown-' + this.uuid).each(function()
					{
						$(this).css({ position: position, top: top + 'px' });
					});
				},
				unsetDropdownsFixed: function()
				{
					var top = (this.$toolbar.innerHeight() + this.$toolbar.offset().top);
					$('.redactor-dropdown-' + this.uuid).each(function()
					{
						$(this).css({ position: 'absolute', top: top + 'px' });
					});
				}
			};
		},
		upload: function()
		{
			return {
				init: function(id, url, callback)
				{
					this.upload.direct = false;
					this.upload.callback = callback;
					this.upload.url = url;
					this.upload.$el = $(id);
					this.upload.$droparea = $('<div id="redactor-droparea" />');

					this.upload.$placeholdler = $('<div id="redactor-droparea-placeholder" />').text(this.lang.get('upload_label'));
					this.upload.$input = $('<input type="file" name="file" />');

					this.upload.$placeholdler.append(this.upload.$input);
					this.upload.$droparea.append(this.upload.$placeholdler);
					this.upload.$el.append(this.upload.$droparea);

					this.upload.$droparea.off('redactor.upload');
					this.upload.$input.off('redactor.upload');

					this.upload.$droparea.on('dragover.redactor.upload', $.proxy(this.upload.onDrag, this));
					this.upload.$droparea.on('dragleave.redactor.upload', $.proxy(this.upload.onDragLeave, this));

					// change
					this.upload.$input.on('change.redactor.upload', $.proxy(function(e)
					{
						e = e.originalEvent || e;
						this.upload.traverseFile(this.upload.$input[0].files[0], e);
					}, this));

					// drop
					this.upload.$droparea.on('drop.redactor.upload', $.proxy(function(e)
					{
						e.preventDefault();

						this.upload.$droparea.removeClass('drag-hover').addClass('drag-drop');
						this.upload.onDrop(e);

					}, this));
				},
				directUpload: function(file, e)
				{
					this.upload.direct = true;
					this.upload.traverseFile(file, e);
				},
				onDrop: function(e)
				{
					e = e.originalEvent || e;
					var files = e.dataTransfer.files;

					this.upload.traverseFile(files[0], e);
				},
				traverseFile: function(file, e)
				{
					if (this.opts.s3)
					{
						this.upload.setConfig(file);
						this.upload.s3uploadFile(file);
						return;
					}

					var formData = !!window.FormData ? new FormData() : null;
					if (window.FormData)
					{
						this.upload.setConfig(file);

						var name = (this.upload.type == 'image') ? this.opts.imageUploadParam : this.opts.fileUploadParam;
						formData.append(name, file);
					}

					this.progress.show();
					this.core.setCallback('uploadStart', e, formData);
					this.upload.sendData(formData, e);
				},
				setConfig: function(file)
				{
					this.upload.getType(file);

					if (this.upload.direct)
					{
						this.upload.url = (this.upload.type == 'image') ? this.opts.imageUpload : this.opts.fileUpload;
						this.upload.callback = (this.upload.type == 'image') ? this.image.insert : this.file.insert;
					}
				},
				getType: function(file)
				{
					this.upload.type = 'image';
					if (this.opts.imageTypes.indexOf(file.type) == -1)
					{
						this.upload.type = 'file';
					}
				},
				getHiddenFields: function(obj, fd)
				{
					if (obj === false || typeof obj !== 'object') return fd;

					$.each(obj, $.proxy(function(k, v)
					{
						if (v !== null && v.toString().indexOf('#') === 0) v = $(v).val();
						fd.append(k, v);

					}, this));

					return fd;

				},
				sendData: function(formData, e)
				{
					// append hidden fields
					if (this.upload.type == 'image')
					{
						formData = this.upload.getHiddenFields(this.opts.uploadImageFields, formData);
						formData = this.upload.getHiddenFields(this.upload.imageFields, formData);
					}
					else
					{
						formData = this.upload.getHiddenFields(this.opts.uploadFileFields, formData);
						formData = this.upload.getHiddenFields(this.upload.fileFields, formData);
					}

					var xhr = new XMLHttpRequest();
					xhr.open('POST', this.upload.url);

					// complete
					xhr.onreadystatechange = $.proxy(function()
					{
					    if (xhr.readyState == 4)
					    {
					        var data = xhr.responseText;

							data = data.replace(/^\[/, '');
							data = data.replace(/\]$/, '');

							var json;
							try
							{
								json = (typeof data === 'string' ? $.parseJSON(data) : data);
							}
							catch(err)
							{
								json = {
									error: true
								};
							}


							this.progress.hide();

							if (!this.upload.direct)
							{
								this.upload.$droparea.removeClass('drag-drop');
							}

							this.upload.callback(json, this.upload.direct, e);
					    }
					}, this);


					/*
					xhr.upload.onprogress = $.proxy(function(e)
					{
						if (e.lengthComputable)
						{
							var complete = (e.loaded / e.total * 100 | 0);
							//progress.value = progress.innerHTML = complete;
						}

					}, this);
					*/


					xhr.send(formData);
				},
				onDrag: function(e)
				{
					e.preventDefault();
					this.upload.$droparea.addClass('drag-hover');
				},
				onDragLeave: function(e)
				{
					e.preventDefault();
					this.upload.$droparea.removeClass('drag-hover');
				},
				clearImageFields: function()
				{
					this.upload.imageFields = {};
				},
				addImageFields: function(name, value)
				{
					this.upload.imageFields[name] = value;
				},
				removeImageFields: function(name)
				{
					delete this.upload.imageFields[name];
				},
				clearFileFields: function()
				{
					this.upload.fileFields = {};
				},
				addFileFields: function(name, value)
				{
					this.upload.fileFields[name] = value;
				},
				removeFileFields: function(name)
				{
					delete this.upload.fileFields[name];
				},


				// S3
				s3uploadFile: function(file)
				{
					this.upload.s3executeOnSignedUrl(file, $.proxy(function(signedURL)
					{
						this.upload.s3uploadToS3(file, signedURL);
					}, this));
				},
				s3executeOnSignedUrl: function(file, callback)
				{
					var xhr = new XMLHttpRequest();

					var mark = '?';
					if (this.opts.s3.search(/\?/) != '-1') mark = '&';

					xhr.open('GET', this.opts.s3 + mark + 'name=' + file.name + '&type=' + file.type, true);

					// Hack to pass bytes through unprocessed.
					if (xhr.overrideMimeType) xhr.overrideMimeType('text/plain; charset=x-user-defined');

					var that = this;
					xhr.onreadystatechange = function(e)
					{
						if (this.readyState == 4 && this.status == 200)
						{
							that.progress.show();
							callback(decodeURIComponent(this.responseText));
						}
						else if (this.readyState == 4 && this.status != 200)
						{
							//setProgress(0, 'Could not contact signing script. Status = ' + this.status);
						}
					};

					xhr.send();
				},
				s3createCORSRequest: function(method, url)
				{
					var xhr = new XMLHttpRequest();
					if ("withCredentials" in xhr)
					{
						xhr.open(method, url, true);
					}
					else if (typeof XDomainRequest != "undefined")
					{
						xhr = new XDomainRequest();
						xhr.open(method, url);
					}
					else
					{
						xhr = null;
					}

					return xhr;
				},
				s3uploadToS3: function(file, url)
				{
					var xhr = this.upload.s3createCORSRequest('PUT', url);
					if (!xhr)
					{
						//setProgress(0, 'CORS not supported');
					}
					else
					{
						xhr.onload = $.proxy(function()
						{
							if (xhr.status == 200)
							{
								//setProgress(100, 'Upload completed.');

								this.progress.hide();

								var s3file = url.split('?');

								if (!s3file[0])
								{
									 // url parsing is fail
									 return false;
								}


								if (!this.upload.direct)
								{
									this.upload.$droparea.removeClass('drag-drop');
								}

								var json = { filelink: s3file[0] };
								if (this.upload.type == 'file')
								{
									var arr = s3file[0].split('/');
									json.filename = arr[arr.length-1];
								}

								this.upload.callback(json, this.upload.direct, false);


							}
							else
							{
								//setProgress(0, 'Upload error: ' + xhr.status);
							}
						}, this);

						xhr.onerror = function()
						{
							//setProgress(0, 'XHR error.');
						};

						xhr.upload.onprogress = function(e)
						{
							/*
							if (e.lengthComputable)
							{
								var percentLoaded = Math.round((e.loaded / e.total) * 100);
								setProgress(percentLoaded, percentLoaded == 100 ? 'Finalizing.' : 'Uploading.');
							}
							*/
						};

						xhr.setRequestHeader('Content-Type', file.type);
						xhr.setRequestHeader('x-amz-acl', 'public-read');

						xhr.send(file);
					}
				}
			};
		},
		utils: function()
		{
			return {
				isMobile: function()
				{
					return /(iPhone|iPod|BlackBerry|Android)/.test(navigator.userAgent);
				},
				isDesktop: function()
				{
					return !/(iPhone|iPod|iPad|BlackBerry|Android)/.test(navigator.userAgent);
				},
				isString: function(obj)
				{
					return Object.prototype.toString.call(obj) == '[object String]';
				},
				isEmpty: function(html, removeEmptyTags)
				{
					html = html.replace(/[\u200B-\u200D\uFEFF]/g, '');
					html = html.replace(/&nbsp;/gi, '');
					html = html.replace(/<\/?br\s?\/?>/g, '');
					html = html.replace(/\s/g, '');
					html = html.replace(/^<p>[^\W\w\D\d]*?<\/p>$/i, '');
					html = html.replace(/<iframe(.*?[^>])>$/i, 'iframe');
					html = html.replace(/<source(.*?[^>])>$/i, 'source');

					// remove empty tags
					if (removeEmptyTags !== false)
					{
						html = html.replace(/<[^\/>][^>]*><\/[^>]+>/gi, '');
						html = html.replace(/<[^\/>][^>]*><\/[^>]+>/gi, '');
					}

					html = $.trim(html);

					return html === '';
				},
				normalize: function(str)
				{
					if (typeof(str) === 'undefined') return 0;
					return parseInt(str.replace('px',''), 10);
				},
				hexToRgb: function(hex)
				{
					if (typeof hex == 'undefined') return;
					if (hex.search(/^#/) == -1) return hex;

					var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
					hex = hex.replace(shorthandRegex, function(m, r, g, b)
					{
						return r + r + g + g + b + b;
					});

					var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
					return 'rgb(' + parseInt(result[1], 16) + ', ' + parseInt(result[2], 16) + ', ' + parseInt(result[3], 16) + ')';
				},
				getOuterHtml: function(el)
				{
					return $('<div>').append($(el).eq(0).clone()).html();
				},
				getAlignmentElement: function(el)
				{
					if ($.inArray(el.tagName, this.opts.alignmentTags) !== -1)
					{
						return $(el);
					}
					else
					{
						return $(el).closest(this.opts.alignmentTags.toString().toLowerCase(), this.$editor[0]);
					}
				},
				removeEmptyAttr: function(el, attr)
				{
					var $el = $(el);
					if (typeof $el.attr(attr) == 'undefined')
					{
						return true;
					}

					if ($el.attr(attr) === '')
					{
						$el.removeAttr(attr);
						return true;
					}

					return false;
				},
				removeEmpty: function(i, s)
				{
					var $s = $(s);

					$s.find('.redactor-invisible-space').removeAttr('style').removeAttr('class');

					if ($s.find('hr, br, img, iframe, source').length !== 0) return;
					var text = $.trim($s.text());
					if (this.utils.isEmpty(text, false))
					{
						$s.remove();
					}
				},

				// save and restore scroll
				saveScroll: function()
				{
					this.saveEditorScroll = this.$editor.scrollTop();
					this.saveBodyScroll = $(window).scrollTop();

					if (this.opts.scrollTarget) this.saveTargetScroll = $(this.opts.scrollTarget).scrollTop();
				},
				restoreScroll: function()
				{
					if (typeof this.saveScroll === 'undefined' && typeof this.saveBodyScroll === 'undefined') return;

					$(window).scrollTop(this.saveBodyScroll);
					this.$editor.scrollTop(this.saveEditorScroll);

					if (this.opts.scrollTarget) $(this.opts.scrollTarget).scrollTop(this.saveTargetScroll);
				},

				// get invisible space element
				createSpaceElement: function()
				{
					var space = document.createElement('span');
					space.className = 'redactor-invisible-space';
					space.innerHTML = this.opts.invisibleSpace;

					return space;
				},

				// replace
				removeInlineTags: function(node)
				{
					var tags = this.opts.inlineTags;
					tags.push('span');

					if (node.tagName == 'PRE') tags.push('a');

					$(node).find(tags.join(',')).not('span.redactor-selection-marker').contents().unwrap();
				},
				replaceWithContents: function(node, removeInlineTags)
				{
					var self = this;
					$(node).replaceWith(function()
					{
						if (removeInlineTags === true) self.utils.removeInlineTags(this);

						return $(this).contents();
					});

					return $(node);
				},
				replaceToTag: function(node, tag, removeInlineTags)
				{
					var replacement;
					var self = this;
					$(node).replaceWith(function()
					{
						replacement = $('<' + tag + ' />').append($(this).contents());

						for (var i = 0; i < this.attributes.length; i++)
						{
							replacement.attr(this.attributes[i].name, this.attributes[i].value);
						}

						if (removeInlineTags === true) self.utils.removeInlineTags(replacement);

						return replacement;
					});

					return replacement;
				},

				// start and end of element
				isStartOfElement: function()
				{
					var block = this.selection.getBlock();
					if (!block) return false;

					var offset = this.caret.getOffsetOfElement(block);

					return (offset === 0) ? true : false;
				},
				isEndOfElement: function(element)
				{
					if (typeof element == 'undefined')
					{
						var element = this.selection.getBlock();
						if (!element) return false;
					}

					var offset = this.caret.getOffsetOfElement(element);
					var text = $.trim($(element).text()).replace(/\n\r\n/g, '');

					return (offset == text.length) ? true : false;
				},
				isEndOfEditor: function()
				{
					var block = this.$editor[0];

					var offset = this.caret.getOffsetOfElement(block);
					var text = $.trim($(block).html().replace(/(<([^>]+)>)/gi,''));

					return (offset == text.length) ? true : false;
				},

				// test blocks
				isBlock: function(block)
				{
					block = block[0] || block;

					return block && this.utils.isBlockTag(block.tagName);
				},
				isBlockTag: function(tag)
				{
					if (typeof tag == 'undefined') return false;

					return this.reIsBlock.test(tag);
				},

				// tag detection
				isTag: function(current, tag)
				{
					var element = $(current).closest(tag);
					if (element.length == 1)
					{
						return element[0];
					}

					return false;
				},

				// select all
				isSelectAll: function()
				{
					return this.selectAll;
				},
				enableSelectAll: function()
				{
					this.selectAll = true;
				},
				disableSelectAll: function()
				{
					this.selectAll = false;
				},

				// parents detection
				isRedactorParent: function(el)
				{
					if (!el)
					{
						return false;
					}

					if ($(el).parents('.redactor-editor').length === 0 || $(el).hasClass('redactor-editor'))
					{
						return false;
					}

					return el;
				},
				isCurrentOrParentHeader: function()
				{
					return this.utils.isCurrentOrParent(['H1', 'H2', 'H3', 'H4', 'H5', 'H6']);
				},
				isCurrentOrParent: function(tagName)
				{
					var parent = this.selection.getParent();
					var current = this.selection.getCurrent();

					if ($.isArray(tagName))
					{
						var matched = 0;
						$.each(tagName, $.proxy(function(i, s)
						{
							if (this.utils.isCurrentOrParentOne(current, parent, s))
							{
								matched++;
							}
						}, this));

						return (matched === 0) ? false : true;
					}
					else
					{
						return this.utils.isCurrentOrParentOne(current, parent, tagName);
					}
				},
				isCurrentOrParentOne: function(current, parent, tagName)
				{
					tagName = tagName.toUpperCase();

					return parent && parent.tagName === tagName ? parent : current && current.tagName === tagName ? current : false;
				},


				// browsers detection
				isOldIe: function()
				{
					return (this.utils.browser('msie') && parseInt(this.utils.browser('version'), 10) < 9) ? true : false;
				},
				isLessIe10: function()
				{
					return (this.utils.browser('msie') && parseInt(this.utils.browser('version'), 10) < 10) ? true : false;
				},
				isIe11: function()
				{
					return !!navigator.userAgent.match(/Trident\/7\./);
				},
				browser: function(browser)
				{
					var ua = navigator.userAgent.toLowerCase();
					var match = /(opr)[\/]([\w.]+)/.exec( ua ) ||
		            /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
		            /(webkit)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec(ua) ||
		            /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
		            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
		            /(msie) ([\w.]+)/.exec( ua ) ||
		            ua.indexOf("trident") >= 0 && /(rv)(?::| )([\w.]+)/.exec( ua ) ||
		            ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
		            [];

					if (browser == 'safari') return (typeof match[3] != 'undefined') ? match[3] == 'safari' : false;
					if (browser == 'version') return match[2];
					if (browser == 'webkit') return (match[1] == 'chrome' || match[1] == 'opr' || match[1] == 'webkit');
					if (match[1] == 'rv') return browser == 'msie';
					if (match[1] == 'opr') return browser == 'webkit';

					return browser == match[1];
				}
			};
		}
	};

	$(window).on('load.tools.redactor', function()
	{
		$('[data-tools="redactor"]').redactor();
	});

	// constructor
	Redactor.prototype.init.prototype = Redactor.prototype;

	// LINKIFY
	$.Redactor.fn.formatLinkify = function(protocol, convertLinks, convertUrlLinks, convertImageLinks, convertVideoLinks, linkSize)
	{
		var urlCheck = '((?:http[s]?:\\/\\/(?:www\\.)?|www\\.){1}(?:[0-9A-Za-z\\-%_]+\\.)+[a-zA-Z]{2,}(?::[0-9]+)?(?:(?:/[0-9A-Za-z\\-#\\.%\+_]*)+)?(?:\\?(?:[0-9A-Za-z\\-\\.%_]+(?:=[0-9A-Za-z\\-\\.%_\\+]*)?)?(?:&(?:[0-9A-Za-z\\-\\.%_]+(?:=[0-9A-Za-z\\-\\.%_\\+]*)?)?)*)?(?:#[0-9A-Za-z\\-\\.%_\\+=\\?&;]*)?)';
		var regex = new RegExp(urlCheck, 'gi');
		var rProtocol = /(https?|ftp):\/\//i;
		var urlImage = new RegExp('(?:([^:/?#]+):)?(?:\/\/([^/?#]*))?([^?#]*\\.(?:jpg|gif|png))(?:\\?([^#]*))?(?:#(.*))?', 'gi');

		var childNodes = (this.$editor ? this.$editor[0] : this).childNodes, i = childNodes.length;
		while (i--)
		{
			var n = childNodes[i];

			if (n.nodeType === 3 && n.parentNode !== 'PRE')
			{
				var html = n.nodeValue;

				// youtube & vimeo
				if (convertVideoLinks && html)
				{
					var iframeStart = '<iframe width="500" height="281" src="',
						iframeEnd = '" frameborder="0" allowfullscreen></iframe>';

					if (html.match(reUrlYoutube))
					{
						html = html.replace(reUrlYoutube, iframeStart + '//www.youtube.com/embed/$1' + iframeEnd);
						$(n).after(html).remove();
					}
					else if (html.match(reUrlVimeo))
					{
						html = html.replace(reUrlVimeo, iframeStart + '//player.vimeo.com/video/$2' + iframeEnd);
						$(n).after(html).remove();
					}
				}

				// image
				if (convertImageLinks && html && html.match(urlImage))
				{
					var matches = html.match(urlImage);
					html = html.replace(urlImage, '<img src="' + matches + '" />');

					$(n).after(html).remove();
					return;
				}

				// link
				if (html.search(/\$/g) != -1) html = html.replace(/\$/g, '&#36;');

				var matches = html.match(regex);
				if (convertUrlLinks && html && matches)
				{
					var len = matches.length;
					for (var z = 0; z < len; z++)
					{
						// remove dot in the end
						if (matches[z].match(/\.$/) !== null) matches[z] = matches[z].replace(/\.$/, '');

						var href = matches[z];
						var text = href;

						var space = '';
						if (href.match(/\s$/) !== null) space = ' ';

						var addProtocol = protocol + '://';
						if (href.match(rProtocol) !== null) addProtocol = '';

						if (text.length > linkSize) text = text.substring(0, linkSize) + '...';
						text = text.replace(/&#36;/g, '$').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

						// buffer
						var buffer = [];
						var links = html.match('<a(.*?)</a>');
						if (links !== null)
						{
							var len = links.length;
							for (i = 0; i < len; i++)
							{
								buffer[i] = links[i];
								html = html.replace(links[i], '{abuffer' + i + '}');
							}
						}

						html = html.replace(href, '<a href=\"' + addProtocol + $.trim(href) + '\">' + $.trim(text) + '</a>' + space);

						// rebuffer
						$.each(buffer, function(i,s)
						{
							html = html.replace('{abuffer' + i + '}', s);
						});
					}

					$(n).after(html).remove();
				}
			}
			else if (n.nodeType === 1 && !/^(pre|a|button|textarea)$/i.test(n.tagName))
			{
				$.Redactor.fn.formatLinkify.call(n, protocol, convertLinks, convertUrlLinks, convertImageLinks, convertVideoLinks, linkSize);
			}
		}
	};

})(jQuery);

if ( ! RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.instructions = function() {
	return {
		init: function() {
			var dropdown = {};
			dropdown.nombres = { title: 'Insertar Campo', func: this.instructions.insertSubscriberFirstName };
			// dropdown.apellidos = { title: 'Insertar Variable Apellidos', func: this.instructions.insertSubscriberLastName };
			// dropdown.email = { title: 'Insertar Variable Email', func: this.instructions.insertSubscriberEmail };

			var button = this.button.add('instructions', 'Campos');
			this.button.setAwesome('instructions', 'fa-pencil');
			this.button.addDropdown(button, dropdown);
		},
        testButton: function(buttonName) {
            alert(buttonName);
        },
		insertSubscriberFirstName: function(buttonName) {
			// this.$editor.focus();
			// this.selection.restore();
			// var node = $('<span>{{nombres}}</span>');
			// this.insert.node(node);
			// this.code.sync();
			this.insert.text('{{campo}}');
		},
		insertSubscriberLastName: function(buttonName) {
			this.insert.text('{{apellidos}}');
		},
		insertSubscriberEmail: function(buttonName) {
			this.insert.text('{{email}}');
		}
	};
};

if (!RedactorPlugins) var RedactorPlugins = {};

(function($)
{
	RedactorPlugins.table = function()
	{
		return {
			getTemplate: function()
			{
				return String()
				+ '<section id="redactor-modal-table-insert">'
					+ '<label>' + this.lang.get('rows') + '</label>'
					+ '<input type="text" size="5" value="2" id="redactor-table-rows" />'
					+ '<label>' + this.lang.get('columns') + '</label>'
					+ '<input type="text" size="5" value="3" id="redactor-table-columns" />'
				+ '</section>';
			},
			init: function()
			{

				var dropdown = {};

				dropdown.insert_table = { title: this.lang.get('insert_table'), func: this.table.show };
				dropdown.insert_row_above = { title: this.lang.get('insert_row_above'), func: this.table.addRowAbove };
				dropdown.insert_row_below = { title: this.lang.get('insert_row_below'), func: this.table.addRowBelow };
				dropdown.insert_column_left = { title: this.lang.get('insert_column_left'), func: this.table.addColumnLeft };
				dropdown.insert_column_right = { title: this.lang.get('insert_column_right'), func: this.table.addColumnRight };
				dropdown.add_head = { title: this.lang.get('add_head'), func: this.table.addHead };
				dropdown.delete_head = { title: this.lang.get('delete_head'), func: this.table.deleteHead };
				dropdown.delete_column = { title: this.lang.get('delete_column'), func: this.table.deleteColumn };
				dropdown.delete_row = { title: this.lang.get('delete_row'), func: this.table.deleteRow };
				dropdown.delete_table = { title: this.lang.get('delete_table'), func: this.table.deleteTable };

				this.observe.addButton('td', 'table');
				this.observe.addButton('th', 'table');

				var button = this.button.addBefore('link', 'table', this.lang.get('table'));
				this.button.addDropdown(button, dropdown);
			},
			show: function()
			{
				this.modal.addTemplate('table', this.table.getTemplate());

				this.modal.load('table', this.lang.get('insert_table'), 300);
				this.modal.createCancelButton();

				var button = this.modal.createActionButton(this.lang.get('insert'));
				button.on('click', this.table.insert);

				this.selection.save();
				this.modal.show();

				$('#redactor-table-rows').focus();

			},
			insert: function()
			{
				this.placeholder.remove();
				this.clean.cleanEmptyParagraph();
				
				var rows = $('#redactor-table-rows').val(),
					columns = $('#redactor-table-columns').val(),
					$tableBox = $('<div>'),
					tableId = Math.floor(Math.random() * 99999),
					$table = $('<table id="table' + tableId + '"><tbody></tbody></table>'),
					i, $row, z, $column;

				for (i = 0; i < rows; i++)
				{
					$row = $('<tr>');

					for (z = 0; z < columns; z++)
					{
						$column = $('<td>' + this.opts.invisibleSpace + '</td>');

						// set the focus to the first td
						if (i === 0 && z === 0)
						{
							$column.append(this.selection.getMarker());
						}

						$($row).append($column);
					}

					$table.append($row);
				}

				$tableBox.append($table);
				var html = $tableBox.html();

				this.modal.close();
				this.selection.restore();

				if (this.table.getTable()) return;

				this.buffer.set();

				var current = this.selection.getBlock() || this.selection.getCurrent();
				if (current && current.tagName != 'BODY')
				{
					if (current.tagName == 'LI') current = $(current).closest('ul, ol');
					$(current).after(html);
				}
				else
				{
					this.insert.html(html, false);
				}

				this.selection.restore();

				var table = this.$editor.find('#table' + tableId);

				if (!this.opts.linebreaks && (this.utils.browser('mozilla') || this.utils.browser('msie')))
				{
					var $next = table.next();
					if ($next.length === 0)
					{
						 table.after(this.opts.emptyHtml);
					}
				}

				this.observe.buttons();

				table.find('span.redactor-selection-marker').remove();
				table.removeAttr('id');

				this.code.sync();
				this.core.setCallback('insertedTable', table);
			},
			getTable: function()
			{
				var $table = $(this.selection.getParent()).closest('table');

				if (!this.utils.isRedactorParent($table)) return false;
				if ($table.size() === 0) return false;

				return $table;
			},
			restoreAfterDelete: function($table)
			{
				this.selection.restore();
				$table.find('span.redactor-selection-marker').remove();
				this.code.sync();
			},
			deleteTable: function()
			{
				var $table = this.table.getTable();
				if (!$table) return;

				this.buffer.set();


				var $next = $table.next();
				if (!this.opts.linebreaks && $next.length !== 0)
				{
					this.caret.setStart($next);
				}
				else
				{
					this.caret.setAfter($table);
				}


				$table.remove();

				this.code.sync();
			},
			deleteRow: function()
			{
			var $table = this.table.getTable();
			if (!$table) return;

			var $current = $(this.selection.getCurrent());

			this.buffer.set();

			var $current_tr = $current.closest('tr');
			var $focus_tr = $current_tr.prev().length ? $current_tr.prev() : $current_tr.next();
			if ($focus_tr.length)
			{
				var $focus_td = $focus_tr.children('td, th').first();
				if ($focus_td.length) $focus_td.prepend(this.selection.getMarker());
			}

			$current_tr.remove();
			this.table.restoreAfterDelete($table);
		},
			deleteColumn: function()
			{
			var $table = this.table.getTable();
			if (!$table) return;

			this.buffer.set();

			var $current = $(this.selection.getCurrent());
			var $current_td = $current.closest('td, th');
			var index = $current_td[0].cellIndex;

			$table.find('tr').each($.proxy(function(i, elem)
			{
				var $elem = $(elem);
				var focusIndex = index - 1 < 0 ? index + 1 : index - 1;
				if (i === 0) $elem.find('td, th').eq(focusIndex).prepend(this.selection.getMarker());

				$elem.find('td, th').eq(index).remove();

			}, this));

			this.table.restoreAfterDelete($table);
		},
			addHead: function()
			{
				var $table = this.table.getTable();
				if (!$table) return;

				this.buffer.set();

				if ($table.find('thead').size() !== 0)
				{
					this.table.deleteHead();
					return;
				}

				var tr = $table.find('tr').first().clone();
				tr.find('td').replaceWith($.proxy(function()
				{
					return $('<th>').html(this.opts.invisibleSpace);
				}, this));

				$thead = $('<thead></thead>').append(tr);
				$table.prepend($thead);

				this.code.sync();

			},
			deleteHead: function()
			{
				var $table = this.table.getTable();
				if (!$table) return;

				var $thead = $table.find('thead');
				if ($thead.size() === 0) return;

				this.buffer.set();

				$thead.remove();
				this.code.sync();
			},
			addRowAbove: function()
			{
				this.table.addRow('before');
			},
			addRowBelow: function()
			{
				this.table.addRow('after');
			},
			addColumnLeft: function()
			{
				this.table.addColumn('before');
			},
			addColumnRight: function()
			{
				this.table.addColumn('after');
			},
			addRow: function(type)
			{
				var $table = this.table.getTable();
				if (!$table) return;

				this.buffer.set();

				var $current = $(this.selection.getCurrent());
				var $current_tr = $current.closest('tr');
				var new_tr = $current_tr.clone();

				new_tr.find('th').replaceWith(function()
				{
					var $td = $('<td>');
					$td[0].attributes = this.attributes;

					return $td.append($(this).contents());
				});

				new_tr.find('td').html(this.opts.invisibleSpace);

				if (type == 'after')
				{
					$current_tr.after(new_tr);
				}
				else
				{
					$current_tr.before(new_tr);
				}

				this.code.sync();
			},
			addColumn: function (type)
			{
				var $table = this.table.getTable();
				if (!$table) return;

				var index = 0;
				var current = $(this.selection.getCurrent());

				this.buffer.set();

				var $current_tr = current.closest('tr');
				var $current_td = current.closest('td, th');

				$current_tr.find('td, th').each($.proxy(function(i, elem)
				{
					if ($(elem)[0] === $current_td[0]) index = i;

				}, this));

				$table.find('tr').each($.proxy(function(i, elem)
				{
					var $current = $(elem).find('td, th').eq(index);

					var td = $current.clone();
					td.html(this.opts.invisibleSpace);

					if (type == 'after')
					{
						$current.after(td);
					}
					else
					{
						$current.before(td);
					}

				}, this));

				this.code.sync();
			}
		};
	};
})(jQuery);
if (!RedactorPlugins) var RedactorPlugins = {};

(function($)
{
	RedactorPlugins.imagemanager = function()
	{
		return {
			init: function()
			{
				if (!this.opts.imageManagerJson) return;

				this.modal.addCallback('image', this.imagemanager.load);
			},
			load: function()
			{
				var $modal = this.modal.getModal();

				this.modal.createTabber($modal);
				this.modal.addTab(1, 'Cargar', 'active');
				this.modal.addTab(2, 'Seleccionar');

				$('#redactor-modal-image-droparea').addClass('redactor-tab redactor-tab1');

				var $box = $('<div id="redactor-image-manager-box" style="overflow: auto; height: 300px;" class="redactor-tab redactor-tab2">').hide();
				$modal.append($box);

				$.ajax({
				  dataType: "json",
				  cache: false,
				  url: this.opts.imageManagerJson,
				  success: $.proxy(function(data)
					{
						$.each(data, $.proxy(function(key, val)
						{
							// title
							var thumbtitle = '';
							if (typeof val.title !== 'undefined') thumbtitle = val.title;

							var img = $('<img src="' + val.thumb + '" rel="' + val.image + '" title="' + thumbtitle + '" style="width: 100px; height: 75px; cursor: pointer;" />');
							$('#redactor-image-manager-box').append(img);
							$(img).click($.proxy(this.imagemanager.insert, this));

						}, this));


					}, this)
				});


			},
			insert: function(e)
			{
				this.image.insert('<img src="' + $(e.target).attr('rel') + '" alt="' + $(e.target).attr('title') + '">');
			}
		};
	};
})(jQuery);

if (!RedactorPlugins) var RedactorPlugins = {};

(function($)
{
	RedactorPlugins.filemanager = function()
	{
		return {
			init: function()
			{
				if (!this.opts.fileManagerJson) return;

				this.modal.addCallback('file', this.filemanager.load);
			},
			load: function()
			{
				var $modal = this.modal.getModal();

				this.modal.createTabber($modal);
				this.modal.addTab(1, 'Cargar', 'active');
				this.modal.addTab(2, 'Seleccionar');

				$('#redactor-modal-file-upload-box').addClass('redactor-tab redactor-tab1');

				var $box = $('<div id="redactor-file-manager-box" style="overflow: auto; height: 300px;" class="redactor-tab redactor-tab2">').hide();
				$modal.append($box);


				$.ajax({
				  dataType: "json",
				  cache: false,
				  url: this.opts.fileManagerJson,
				  success: $.proxy(function(data)
					{
						var ul = $('<ul id="redactor-modal-list">');
						$.each(data, $.proxy(function(key, val)
						{
							var a = $('<a href="#" title="' + val.title + '" rel="' + val.link + '" class="redactor-file-manager-link">' + val.title + ' <span style="font-size: 11px; color: #888;">' + val.name + '</span> <span style="position: absolute; right: 10px; font-size: 11px; color: #888;">(' + val.size + ')</span></a>');
							var li = $('<li />');

							a.on('click', $.proxy(this.filemanager.insert, this));

							li.append(a);
							ul.append(li);

						}, this));

						$('#redactor-file-manager-box').append(ul);


					}, this)
				});

			},
			insert: function(e)
			{
				e.preventDefault();

				var $target = $(e.target).closest('.redactor-file-manager-link');

				this.file.insert('<a href="' + $target.attr('rel') + '">' + $target.attr('title') + '</a>');
			}
		};
	};
})(jQuery);

(function ($) {
$.Redactor.opts.langs['es_ar'] = {
	html: 'HTML',
	video: 'Video',
	image: 'Imagen',
	table: 'Tabla',
	link: 'Enlace',
	link_insert: 'Insertar enlace ...',
	link_edit: 'Editar enlace',
	unlink: 'Eliminar enlace',
	formatting: 'Estilos',
	paragraph: 'Párrafo',
	quote: 'Comillas',
	code: 'Código',
	header1: 'Cabecera 1',
	header2: 'Cabecera 2',
	header3: 'Cabecera 3',
	header4: 'Cabecera 4',
	header5: 'Cabecera 5',
	bold:  'Negrita',
	italic: 'Itálica',
	fontcolor: 'Color fuente',
	backcolor: 'Color fondo',
	unorderedlist: 'Lista sin orden',
	orderedlist: 'Lista ordenada',
	outdent: 'Disminuir sangría',
	indent: 'Aumentar sangría',
	cancel: 'Cancelar',
	insert: 'Agregar',
	save: 'Guardar',
	_delete: 'Eliminar',
	insert_table: 'Agregar tabla',
	insert_row_above: 'Agregar fila arriba',
	insert_row_below: 'Agregar fila debajo',
	insert_column_left: 'Agregar columna a la izquierda',
	insert_column_right: 'Agregar column a la derecha',
	delete_column: 'Eliminar columna',
	delete_row: 'Eliminar fila',
	delete_table: 'Eliminar tabla',
	rows: 'Filas',
	columns: 'Columnas',
	add_head: 'Agregar encabezado',
	delete_head: 'Eliminar encabezado',
	title: 'Título',
	image_position: 'Posición',
	none: 'ninguna',
	left: 'izquierda',
	right: 'derecha',
	image_web_link: 'Enlace de imagen web',
	text: 'Texto',
	mailto: 'Email',
	web: 'URL',
	video_html_code: 'Código embebido del video',
	file: 'Archivo',
	upload: 'Cargar',
	download: 'Descargar',
	choose: 'Seleccionar',
	or_choose: 'O seleccionar',
	drop_file_here: 'Soltar el archivo aquí',
	align_left:	'Alinear a la izquierda',
	align_center: 'Alinear al centro',
	align_right: 'Alinear a la derecha',
	align_justify: 'Justificar',
	horizontalrule: 'Trazo horizontal',
	fullscreen: 'Pantalla completa',
	deleted: 'Eliminado',
	anchor: 'Anclaje',
	link_new_tab: 'Abrir enlace en otra pestaña',
	underline: 'Subrayado',
	alignment: 'Alineación',
	filename: 'Nombre (opcional)',
	edit: 'Editar',
	center: 'centrar',
	upload_label: 'Suelte el archivo aquí o '
};
})( jQuery );

//# sourceMappingURL=vendor.js.map
