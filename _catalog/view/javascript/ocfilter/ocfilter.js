Math.easeIn=function(t,e,a,i){return t/=a,(a-1)*Math.pow(t,i)+e},function(x){function M(t,e){var i,o,n=this,s=x(e),a=parseFloat(s.data().rangeMin),r=parseFloat(s.data().rangeMax),l=0,p={behaviour:"drag-tap",connect:!0,range:{min:a,max:r}};if("p"==s.data().optionId&&100<r-a){p.pips={mode:"range",density:4};var d=25,c=3.5;for(r-a<100&&(c=2);d<100;d+=25)p.range[d+"%"]=Math.ceil(Math.easeIn((r-a)/100*d,a,r,c))}else p.pips={mode:"count",values:3,density:4};p.start=r&&a!=r?[parseFloat(s.data().startMin),parseFloat(s.data().startMax)]:parseFloat(s.data().startMin),(/\./.test(s.data().rangeMin)||/\./.test(s.data().rangeMax))&&(l=Math.max(s.data().rangeMin.toString().replace(/^\d+?\./,"").length,s.data().rangeMax.toString().replace(/^\d+?\./,"").length)),p.format={to:function(t){return parseFloat(t).toFixed(l)},from:function(t){return parseFloat(t).toFixed(l)}},noUiSlider.create(s.get(0),p),s.data().elementMin&&x(s.data().elementMin).length&&(i=x(s.data().elementMin)),s.data().elementMax&&x(s.data().elementMax).length&&(o=x(s.data().elementMax)),s.get(0).noUiSlider.on("slide",function(t,e,a){void 0!==t[0]&&(i&&i.html(t[0]),s.data().controlMin&&x(s.data().controlMin).length&&x(s.data().controlMin).val(a[0].toFixed(l))),void 0!==t[1]&&(o&&o.html(t[1]),s.data().controlMax&&x(s.data().controlMax).length&&x(s.data().controlMax).val(a[1].toFixed(l)))}),s.get(0).noUiSlider.on("change",function(t,e,a,i,o){n.params.remove.call(n,s.data().optionId),o[1]-o[0]<100&&n.params.set.call(n,s.data().optionId,a[0].toFixed(l)+"-"+a[1].toFixed(l)),n.update(s)}),s.data().controlMin&&n.$element.on("change",s.data().controlMin,function(t){if(""==this.value)return!1;(this.value<a||this.value>r)&&(this.value=a),s.get(0).noUiSlider.set([this.value,null])}),s.data().controlMax&&n.$element.on("change",s.data().controlMax,function(t){if(""==this.value)return!1;(this.value<a||this.value>r)&&(this.value=r),s.get(0).noUiSlider.set([null,this.value])})}var a={timers:{},values:{},options:{},init:function(t){this.options=x.extend({},t),this.$element=x("#ocfilter"),this.$fields=x(".option-values input",this.$element),this.$target=x(".ocf-target",this.$element),this.$values=x("label",this.$element);var i=this;this.$values.each(function(){i.values[x(this).attr("id")]=this}),this.$target.on("change",function(t){t.preventDefault();var e=x(this),a=e.closest("label");e.closest(".dropdown");i.options.php.params=e.val(),e.is(":radio")&&e.closest(".ocf-option-values").find("label.ocf-selected").removeClass("ocf-selected"),a.toggleClass("ocf-selected",e.prop("checked")),i.update(a)}),this.$element.on("click.ocf",".dropdown-menu",function(t){x(this).closest(".dropdown").one("hide.bs.dropdown",function(t){return!1})}),this.$element.on("click.ocf",".disabled, [disabled]",function(t){t.stopPropagation(),t.preventDefault()});var e=!1;this.$element.on({mouseenter:function(t){e=!0},mouseleave:function(t){e=!1,x('[aria-describedby="'+x(this).attr("id")+'"]').popover("toggle")}},".popover").on("hide.bs.popover",'[aria-describedby^="popover"]',function(t){setTimeout(function(t){x(t).show()},0,t.target),e&&t.preventDefault()}),this.$element.find(".dropdown").on("hide.bs.dropdown",function(t){i.$element.find('[aria-describedby^="popover"]').popover("hide")}),this.options.php.manualPrice&&x("[data-toggle='popover-price']").popover({content:function(){return'<div class="form-inline"><div class="form-group"><input name="price[min]" value="'+x("#price-from").text()+'" type="text" class="form-control input-sm" id="min-price-value" /></div><div class="form-group">-</div><div class="form-group"><input name="price[max]" value="'+x("#price-to").text()+'" type="text" class="form-control input-sm" id="max-price-value" /></div></div>'},html:!0,delay:{show:700,hide:500},placement:"top",container:"#ocfilter",title:"Указать цену",trigger:"hover"}),x("#ocfilter .scale").each(x.proxy(M,this))},update:function(v){var g=this,b=v.hasClass("scale"),t={path:this.options.php.path,option_id:v.data().optionId};this.options.php.params&&(t[this.options.php.index]=this.options.php.params),this.preload(),x.get("index.php?route=extension/module/ocfilter/callback",t,function(t){for(var e in t.values){var a=t.values[e],i=x(g.values["v-"+e]),o=a.t,n=a.s,s=a.p;0<i.length&&(i.is("label")?(0!==o||n?i.removeClass("disabled").find("input").removeAttr("disabled"):i.addClass("disabled").removeClass("ocf-selected").find("input").attr("disabled",!0).prop("checked",!1),x("input",i).val(s),g.options.php.showCounter&&x("small",i).text(o)):i.prop("disabled",0===o).val(s))}if(0===t.total)x("#ocfilter-button button").removeAttr("onclick").addClass("disabled").text(g.options.text.select),void 0!==v&&v.hasClass("scale")&&x("#ocfilter .scale").removeAttr("disabled");else{if(!g.options.php.searchButton&&!b)return void(window.location=t.href);x("#ocfilter-button button").attr("onclick","location = '"+t.href+"'").removeClass("disabled").text(t.text_total)}if(g.$fields.filter(".enabled").removeAttr("disabled"),void 0!==v&&g.scroll(v),b&&v.removeAttr("disabled"),x.isPlainObject(t.sliders)&&!x.isEmptyObject(t.sliders))for(var r in t.sliders)if(!(x('.scale[data-option-id="'+r+'"]').length<1)){var l=x('.scale[data-option-id="'+r+'"]').removeAttr("disabled"),p=l.get(0).noUiSlider,d=g.params.has.call(g,r),c=parseFloat(t.sliders[r].min),h=parseFloat(t.sliders[r].max),u=c,m=h,f=p.get();x.isArray(f)||(f=[f,f]),d&&(f[1]<=h&&(m=f[1]),f[0]>=c&&(u=f[0])),c!=h?(p.destroy(),l.data({startMin:u,startMax:m,rangeMin:c,rangeMax:h}),l.data().controlMin&&x(l.data().controlMin).length&&x(l.data().controlMin).val(u),l.data().controlMax&&x(l.data().controlMax).length&&x(l.data().controlMax).val(m),l.data().elementMin&&x(l.data().elementMin).length&&x(l.data().elementMin).html(u),l.data().elementMax&&x(l.data().elementMax).length&&x(l.data().elementMax).html(m),M.call(g,0,l.get(0))):l.attr("disabled","disabled")}},"json")},params:{decode:function(){var t={};if(this.options.php.params)for(var e=this.options.php.params.split(";"),a=0;a<e.length;a++){var i=e[a].split(":");t[i[0]]=void 0!==i[1]?i[1].split(","):[]}this.options.php.params=t},encode:function(){var t=[];if(this.options.php.params)for(i in this.options.php.params)t.push(i+":"+("object"==typeof this.options.php.params[i]?this.options.php.params[i].join(","):this.options.php.params[i]));this.options.php.params=t.join(";")},set:function(t,e){this.params.decode.call(this),void 0!==this.options.php.params[t]?this.options.php.params[t].push(e):this.options.php.params[t]=[e],this.params.encode.call(this)},has:function(t){this.params.decode.call(this);var e=void 0!==this.options.php.params[t];return this.params.encode.call(this),e},remove:function(t,e){this.params.decode.call(this),void 0!==this.options.php.params[t]&&(1!==this.options.php.params[t].length&&e?this.options.php.params[t].splice(a.options.php.params[t].indexOf(e),1):delete this.options.php.params[t]),this.params.encode.call(this)}},preload:function(){x(".ocfilter-option-popover").length&&x(".ocfilter-option-popover button").button("loading"),this.$element.find(".scale").attr("disabled","disabled"),this.$values.addClass("disabled").find("small").text("0")},scroll:function(t){if(t.find("input:checked").length<1&&0<t.parent().find("input:checked").length&&(t=t.parent().find("input:checked:first").parent()),this.options.mobile&&t.is("label")&&(t=t.find("input")),t.is(":hidden")&&(t=t.parents(":visible:first")),this.$element.find('[aria-describedby^="popover"]').not('[data-toggle="popover-price"]').not(t).popover("destroy"),t.attr("aria-describedby"))x("#"+t.attr("aria-describedby")+" button").replaceWith(x("#ocfilter-button").html());else{var e={placement:this.options.mobile?"bottom":"right",selector:!!this.options.mobile&&"> input",delay:{show:400,hide:600},content:function(){return x("#ocfilter-button").html()},container:this.$element,trigger:"hover",html:!0};t.popover(e).popover("show"),x("#"+t.attr("aria-describedby")).addClass("ocfilter-option-popover")}}};void 0===Object.create&&(Object.create=function(t){function e(){}return e.prototype=t,new e}),x.fn.ocfilter=function(e){return this.each(function(){var t=x(this);if(t.data("ocfilter"))return t.data("ocfilter");t.data("ocfilter",Object.create(a).init(e,t))})}}(jQuery);