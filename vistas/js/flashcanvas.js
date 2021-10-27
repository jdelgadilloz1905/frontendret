/**
 * Created by COOR.SISTEMAS on 19/06/2019.
 */
/*
 * FlashCanvas
 *
 * Copyright (c) 2009      Tim Cameron Ryan
 * Copyright (c) 2009-2011 FlashCanvas Project
 * Released under the MIT/X License
 */
window.ActiveXObject&&!window.CanvasRenderingContext2D&&function(h,j){function D(a){this.code=a;this.message=T[a]}function U(a){this.width=a}function E(a){this.id=a.C++}function t(a){this.G=a;this.id=a.C++}function u(a,b){this.canvas=a;this.B=b;this.d=a.uniqueID;this.D();this.C=0;this.t="";var c=this;setInterval(function(){n[c.d]===0&&c.e()},30)}function A(){if(j.readyState==="complete"){j.detachEvent(F,A);for(var a=j.getElementsByTagName(r),b=0,c=a.length;b<c;++b)B.initElement(a[b])}}function G(){var a=
    event.srcElement,b=a.parentNode;a.blur();b.focus()}function H(){var a=event.propertyName;if(a==="width"||a==="height"){var b=event.srcElement,c=b[a],d=parseInt(c,10);if(isNaN(d)||d<0)d=a==="width"?300:150;if(c===d){b.style[a]=d+"px";b.getContext("2d").I(b.width,b.height)}else b[a]=d}}function I(){h.detachEvent(J,I);for(var a in s){var b=s[a],c=b.firstChild,d;for(d in c)if(typeof c[d]==="function")c[d]=k;for(d in b)if(typeof b[d]==="function")b[d]=k;c.detachEvent(K,G);b.detachEvent(L,H)}h[M]=k;h[N]=
    k;h[O]=k;h[C]=k;h[P]=k}function V(){var a=j.getElementsByTagName("script");a=a[a.length-1];return j.documentMode>=8?a.src:a.getAttribute("src",4)}function v(a){return(""+a).replace(/&/g,"&amp;").replace(/</g,"&lt;")}function W(a){return a.toLowerCase()}function i(a){throw new D(a);}function Q(a){var b=parseInt(a.width,10),c=parseInt(a.height,10);if(isNaN(b)||b<0)b=300;if(isNaN(c)||c<0)c=150;a.width=b;a.height=c}var k=null,r="canvas",M="CanvasRenderingContext2D",N="CanvasGradient",O="CanvasPattern",
    C="FlashCanvas",P="G_vmlCanvasManager",K="onfocus",L="onpropertychange",F="onreadystatechange",J="onunload",w=((h[C+"Options"]||{}).swfPath||V().replace(/[^\/]+$/,""))+"flashcanvas.swf",e=new function(a){for(var b=0,c=a.length;b<c;b++)this[a[b]]=b}(["toDataURL","save","restore","scale","rotate","translate","transform","setTransform","globalAlpha","globalCompositeOperation","strokeStyle","fillStyle","createLinearGradient","createRadialGradient","createPattern","lineWidth","lineCap","lineJoin","miterLimit",
        "shadowOffsetX","shadowOffsetY","shadowBlur","shadowColor","clearRect","fillRect","strokeRect","beginPath","closePath","moveTo","lineTo","quadraticCurveTo","bezierCurveTo","arcTo","rect","arc","fill","stroke","clip","isPointInPath","font","textAlign","textBaseline","fillText","strokeText","measureText","drawImage","createImageData","getImageData","putImageData","addColorStop","direction","resize"]),x={},n={},s={},y={};u.prototype={save:function(){this.b();this.c();this.m();this.l();this.z();this.w();
    this.F.push([this.f,this.g,this.A,this.u,this.j,this.h,this.i,this.k,this.p,this.q,this.n,this.o,this.v,this.r,this.s]);this.a.push(e.save)},restore:function(){var a=this.F;if(a.length){a=a.pop();this.globalAlpha=a[0];this.globalCompositeOperation=a[1];this.strokeStyle=a[2];this.fillStyle=a[3];this.lineWidth=a[4];this.lineCap=a[5];this.lineJoin=a[6];this.miterLimit=a[7];this.shadowOffsetX=a[8];this.shadowOffsetY=a[9];this.shadowBlur=a[10];this.shadowColor=a[11];this.font=a[12];this.textAlign=a[13];
    this.textBaseline=a[14]}this.a.push(e.restore)},scale:function(a,b){this.a.push(e.scale,a,b)},rotate:function(a){this.a.push(e.rotate,a)},translate:function(a,b){this.a.push(e.translate,a,b)},transform:function(a,b,c,d,f,g){this.a.push(e.transform,a,b,c,d,f,g)},setTransform:function(a,b,c,d,f,g){this.a.push(e.setTransform,a,b,c,d,f,g)},b:function(){var a=this.a;if(this.f!==this.globalAlpha){this.f=this.globalAlpha;a.push(e.globalAlpha,this.f)}if(this.g!==this.globalCompositeOperation){this.g=this.globalCompositeOperation;
    a.push(e.globalCompositeOperation,this.g)}},m:function(){if(this.A!==this.strokeStyle){var a=this.A=this.strokeStyle;this.a.push(e.strokeStyle,typeof a==="object"?a.id:a)}},l:function(){if(this.u!==this.fillStyle){var a=this.u=this.fillStyle;this.a.push(e.fillStyle,typeof a==="object"?a.id:a)}},createLinearGradient:function(a,b,c,d){isFinite(a)&&isFinite(b)&&isFinite(c)&&isFinite(d)||i(9);this.a.push(e.createLinearGradient,a,b,c,d);return new t(this)},createRadialGradient:function(a,b,c,d,f,g){isFinite(a)&&
isFinite(b)&&isFinite(c)&&isFinite(d)&&isFinite(f)&&isFinite(g)||i(9);if(c<0||g<0)i(1);this.a.push(e.createRadialGradient,a,b,c,d,f,g);return new t(this)},createPattern:function(a,b){a||i(17);var c=a.tagName,d,f=this.d;if(c){c=c.toLowerCase();if(c==="img")d=a.getAttribute("src",2);else if(c===r||c==="video")return;else i(17)}else if(a.src)d=a.src;else i(17);b==="repeat"||b==="no-repeat"||b==="repeat-x"||b==="repeat-y"||b===""||b===k||i(12);this.a.push(e.createPattern,v(d),b);if(x[f]){this.e();++n[f]}return new E(this)},
    z:function(){var a=this.a;if(this.j!==this.lineWidth){this.j=this.lineWidth;a.push(e.lineWidth,this.j)}if(this.h!==this.lineCap){this.h=this.lineCap;a.push(e.lineCap,this.h)}if(this.i!==this.lineJoin){this.i=this.lineJoin;a.push(e.lineJoin,this.i)}if(this.k!==this.miterLimit){this.k=this.miterLimit;a.push(e.miterLimit,this.k)}},c:function(){var a=this.a;if(this.p!==this.shadowOffsetX){this.p=this.shadowOffsetX;a.push(e.shadowOffsetX,this.p)}if(this.q!==this.shadowOffsetY){this.q=this.shadowOffsetY;
        a.push(e.shadowOffsetY,this.q)}if(this.n!==this.shadowBlur){this.n=this.shadowBlur;a.push(e.shadowBlur,this.n)}if(this.o!==this.shadowColor){this.o=this.shadowColor;a.push(e.shadowColor,this.o)}},clearRect:function(a,b,c,d){this.a.push(e.clearRect,a,b,c,d)},fillRect:function(a,b,c,d){this.b();this.c();this.l();this.a.push(e.fillRect,a,b,c,d)},strokeRect:function(a,b,c,d){this.b();this.c();this.m();this.z();this.a.push(e.strokeRect,a,b,c,d)},beginPath:function(){this.a.push(e.beginPath)},closePath:function(){this.a.push(e.closePath)},
    moveTo:function(a,b){this.a.push(e.moveTo,a,b)},lineTo:function(a,b){this.a.push(e.lineTo,a,b)},quadraticCurveTo:function(a,b,c,d){this.a.push(e.quadraticCurveTo,a,b,c,d)},bezierCurveTo:function(a,b,c,d,f,g){this.a.push(e.bezierCurveTo,a,b,c,d,f,g)},arcTo:function(a,b,c,d,f){f<0&&isFinite(f)&&i(1);this.a.push(e.arcTo,a,b,c,d,f)},rect:function(a,b,c,d){this.a.push(e.rect,a,b,c,d)},arc:function(a,b,c,d,f,g){c<0&&isFinite(c)&&i(1);this.a.push(e.arc,a,b,c,d,f,g?1:0)},fill:function(){this.b();this.c();
        this.l();this.a.push(e.fill)},stroke:function(){this.b();this.c();this.m();this.z();this.a.push(e.stroke)},clip:function(){this.a.push(e.clip)},w:function(){var a=this.a;if(this.v!==this.font)try{var b=y[this.d];b.style.font=this.v=this.font;var c=b.currentStyle;a.push(e.font,[c.fontStyle,c.fontWeight,b.offsetHeight,c.fontFamily].join(" "))}catch(d){}if(this.r!==this.textAlign){this.r=this.textAlign;a.push(e.textAlign,this.r)}if(this.s!==this.textBaseline){this.s=this.textBaseline;a.push(e.textBaseline,
        this.s)}if(this.t!==this.canvas.currentStyle.direction){this.t=this.canvas.currentStyle.direction;a.push(e.direction,this.t)}},fillText:function(a,b,c,d){this.b();this.l();this.c();this.w();this.a.push(e.fillText,v(a),b,c,d===void 0?Infinity:d)},strokeText:function(a,b,c,d){this.b();this.m();this.c();this.w();this.a.push(e.strokeText,v(a),b,c,d===void 0?Infinity:d)},measureText:function(a){var b=y[this.d];try{b.style.font=this.font}catch(c){}b.innerText=a.replace(/[ \n\f\r]/g,"\t");return new U(b.offsetWidth)},
    drawImage:function(a,b,c,d,f,g,o,l,z){a||i(17);var p=a.tagName,m,q=arguments.length,R=this.d;if(p){p=p.toLowerCase();if(p==="img")m=a.getAttribute("src",2);else if(p===r||p==="video")return;else i(17)}else if(a.src)m=a.src;else i(17);this.b();this.c();m=v(m);if(q===3)this.a.push(e.drawImage,q,m,b,c);else if(q===5)this.a.push(e.drawImage,q,m,b,c,d,f);else if(q===9){if(d===0||f===0)i(1);this.a.push(e.drawImage,q,m,b,c,d,f,g,o,l,z)}else return;if(x[R]){this.e();++n[R]}},D:function(){this.globalAlpha=
        this.f=1;this.globalCompositeOperation=this.g="source-over";this.fillStyle=this.u=this.strokeStyle=this.A="#000000";this.lineWidth=this.j=1;this.lineCap=this.h="butt";this.lineJoin=this.i="miter";this.miterLimit=this.k=10;this.shadowBlur=this.n=this.shadowOffsetY=this.q=this.shadowOffsetX=this.p=0;this.shadowColor=this.o="rgba(0, 0, 0, 0.0)";this.font=this.v="10px sans-serif";this.textAlign=this.r="start";this.textBaseline=this.s="alphabetic";this.a=[];this.F=[]},H:function(){var a=this.a;this.a=
        [];return a},e:function(){var a=this.H();if(a.length>0)return eval(this.B.CallFunction('<invoke name="executeCommand" returntype="javascript"><arguments><string>'+a.join("&#0;")+"</string></arguments></invoke>"))},I:function(a,b){this.e();this.D();if(a>0)this.B.width=a;if(b>0)this.B.height=b;this.a.push(e.resize,a,b)}};t.prototype={addColorStop:function(a,b){if(isNaN(a)||a<0||a>1)i(1);this.G.a.push(e.addColorStop,this.id,a,b)}};D.prototype=Error();var T={1:"INDEX_SIZE_ERR",9:"NOT_SUPPORTED_ERR",11:"INVALID_STATE_ERR",
    12:"SYNTAX_ERR",17:"TYPE_MISMATCH_ERR",18:"SECURITY_ERR"},B={initElement:function(a){if(a.getContext)return a;var b=a.uniqueID,c="external"+b;x[b]=false;n[b]=1;Q(a);a.innerHTML='<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="'+location.protocol+'//fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="100%" height="100%" id="'+c+'"><param name="allowScriptAccess" value="always"><param name="flashvars" value="id='+c+'"><param name="wmode" value="transparent"></object><span style="margin:0;padding:0;border:0;display:inline-block;position:static;height:1em;overflow:visible;white-space:nowrap"></span>';
    s[b]=a;var d=a.firstChild;y[b]=a.lastChild;var f=j.body.contains;if(f(a))d.movie=w;else var g=setInterval(function(){if(f(a)){clearInterval(g);d.movie=w}},0);if(j.compatMode==="BackCompat"||!h.XMLHttpRequest)y[b].style.overflow="hidden";var o=new u(a,d);a.getContext=function(l){return l==="2d"?o:k};a.toDataURL=function(l,z){(""+l).replace(/[A-Z]+/g,W)==="image/jpeg"?o.a.push(e.toDataURL,l,typeof z==="number"?z:""):o.a.push(e.toDataURL,l);return o.e()};d.attachEvent(K,G);return a},saveImage:function(a){a.firstChild.saveImage()},
    setOptions:function(){},trigger:function(a,b){s[a].fireEvent("on"+b)},unlock:function(a,b){n[a]&&--n[a];if(b){var c=s[a],d=c.firstChild,f,g;Q(c);f=c.width;g=c.height;c.style.width=f+"px";c.style.height=g+"px";if(f>0)d.width=f;if(g>0)d.height=g;d.resize(f,g);c.attachEvent(L,H);x[a]=true}}};j.createElement(r);j.createStyleSheet().cssText=r+"{display:inline-block;overflow:hidden;width:300px;height:150px}";j.readyState==="complete"?A():j.attachEvent(F,A);h.attachEvent(J,I);if(w.indexOf(location.protocol+
        "//"+location.host+"/")===0){var S=new ActiveXObject("Microsoft.XMLHTTP");S.open("GET",w,false);S.send(k)}h[M]=u;h[N]=t;h[O]=E;h[C]=B;h[P]={init:function(){},init_:function(){},initElement:B.initElement};keep=u.measureText}(window,document);