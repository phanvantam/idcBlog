(window.yoastWebpackJsonp=window.yoastWebpackJsonp||[]).push([[21],{469:function(e,t,o){"use strict";var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r=new RegExp("\\[[^<>&/\\[\\]\0- =]+?( [^\\]]+?)?\\]","g"),i=new RegExp("\\[/[^<>&/\\[\\]\0- =]+?\\]","g");!function(){var e=function(e){var t=e.registerPlugin,o=e.registerModification,n=e.pluginReady,r=e.pluginReloaded;this._registerModification=o,this._pluginReady=n,this._pluginReloaded=r,t("YoastShortcodePlugin",{status:"loading"}),this.bindElementEvents();var i="("+wpseoShortcodePluginL10n.wpseo_shortcode_tags.join("|")+")";this.keywordRegex=new RegExp(i,"g"),this.closingTagRegex=new RegExp("\\[\\/"+i+"\\]","g"),this.nonCaptureRegex=new RegExp("\\["+i+"[^\\]]*?\\]","g"),this.parsedShortcodes=[],this.loadShortcodes(this.declareReady.bind(this))};e.prototype.declareReady=function(){this._pluginReady("YoastShortcodePlugin"),this.registerModifications()},e.prototype.declareReloaded=function(){this._pluginReloaded("YoastShortcodePlugin")},e.prototype.registerModifications=function(){this._registerModification("content",this.replaceShortcodes.bind(this),"YoastShortcodePlugin")},e.prototype.removeUnknownShortCodes=function(e){return e=(e=e.replace(r,"")).replace(i,"")},e.prototype.replaceShortcodes=function(e){var t=this.parsedShortcodes;if("string"==typeof e&&t.length>0)for(var o=0;o<t.length;o++)e=e.replace(t[o].shortcode,t[o].output);return e=this.removeUnknownShortCodes(e)},e.prototype.loadShortcodes=function(e){var t=this.getUnparsedShortcodes(this.getShortcodes(this.getContentTinyMCE()));if(!(t.length>0))return e();this.parseShortcodes(t,e)},e.prototype.bindElementEvents=function(){var e=document.getElementById("content")||!1,t=_.debounce(this.loadShortcodes.bind(this,this.declareReloaded.bind(this)),500);e&&(e.addEventListener("keyup",t),e.addEventListener("change",t)),"undefined"!=typeof tinyMCE&&"function"==typeof tinyMCE.on&&tinyMCE.on("addEditor",function(e){e.editor.on("change",t),e.editor.on("keyup",t)})},e.prototype.getContentTinyMCE=function(){var e=document.getElementById("content")&&document.getElementById("content").value||"";return"undefined"!=typeof tinyMCE&&void 0!==tinyMCE.editors&&0!==tinyMCE.editors.length&&(e=tinyMCE.get("content")&&tinyMCE.get("content").getContent()||""),e},e.prototype.getUnparsedShortcodes=function(e){if("object"!==(void 0===e?"undefined":n(e)))return console.error("Failed to get unparsed shortcodes. Expected parameter to be an array, instead received "+(void 0===e?"undefined":n(e))),!1;for(var t=[],o=0;o<e.length;o++){var r=e[o];-1===t.indexOf(r)&&this.isUnparsedShortcode(r)&&t.push(r)}return t},e.prototype.isUnparsedShortcode=function(e){for(var t=!1,o=0;o<this.parsedShortcodes.length;o++)this.parsedShortcodes[o].shortcode===e&&(t=!0);return!1===t},e.prototype.getShortcodes=function(e){if("string"!=typeof e)return console.error("Failed to get shortcodes. Expected parameter to be a string, instead received"+(void 0===e?"undefined":n(e))),!1;for(var t=this.matchCapturingShortcodes(e),o=0;o<t.length;o++)e=e.replace(t[o],"");var r=this.matchNonCapturingShortcodes(e);return t.concat(r)},e.prototype.matchCapturingShortcodes=function(e){for(var t=[],o=(e.match(this.closingTagRegex)||[]).join(" ").match(this.keywordRegex)||[],n=0;n<o.length;n++){var r=o[n],i="\\["+r+"[^\\]]*?\\].*?\\[\\/"+r+"\\]",d=e.match(new RegExp(i,"g"))||[];t=t.concat(d)}return t},e.prototype.matchNonCapturingShortcodes=function(e){return e.match(this.nonCaptureRegex)||[]},e.prototype.parseShortcodes=function(e,t){return"function"!=typeof t?(console.error("Failed to parse shortcodes. Expected parameter to be a function, instead received "+(void 0===t?"undefined":n(t))),!1):"object"===(void 0===e?"undefined":n(e))&&e.length>0?void jQuery.post(ajaxurl,{action:"wpseo_filter_shortcodes",_wpnonce:wpseoShortcodePluginL10n.wpseo_filter_shortcodes_nonce,data:e},function(e){this.saveParsedShortcodes(e,t)}.bind(this)):t()},e.prototype.saveParsedShortcodes=function(e,t){e=JSON.parse(e);for(var o=0;o<e.length;o++)this.parsedShortcodes.push(e[o]);t()},window.YoastShortcodePlugin=e}()}},[[469,0]]]);