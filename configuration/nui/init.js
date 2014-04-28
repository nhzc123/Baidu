
(function(){

	var QUERY = window.location.search.substr(1);
	//var QUERY_SELECTOR = !!document.querySelectorAll;
	var SKIN = fGetSkin();

	var nui = {
		$				: $,				// 通过id获取dom
		init			: fInit,			// 初始化
		create			: fCreate,			// 生成组件
		parse			: fParse,			// 解析方式生成组件
		get				: fGet,				// 通过dom对象获取组件
		getParent		: fGetParent,		// 获取父组件
		getChild		: fGetChild,		// 获取子组件
		getComponents	: fGetChild,		// 获取当前节点下的所有组件
		addEvent		: fAddEvent,		// 绑定事件
		removeEvent		: fRemoveEvent,		// 解除绑定事件
		bind			: fBind,			// 绑定函数
		addClass		: fAddClass,		// 增加class
		removeClass		: fRemoveClass,		// 移除class
		destroy			: fDestroy,			// 销毁组件
		destroyParent	: fDestroyParent,	// 销毁父组件
		delegate		: fDelegate,		// 事件委托
		load			: fLoad,			// 加载js或css
		listen			: fListen,			// 监听自定义事件
		unlisten		: fUnlisten,		// 取消自定义事件监听
		fire			: fFire,			// 触发自定义事件
		tpl				: fTpl,				// 新增组件模版
		disable			: fDisable,			// 禁用
		text			: fText,			// 更改组件文字
		update			: fUpdate,			// 更新组件

		center			: fCenter,			// 居中绝对定位元素
		floatTo			: fFloatTo,			// 将元素浮到另一个元素上
		
		log				: function(str){try{nui.config.debug && console.log(str);}catch(e){}},

		c				: {},				// 已创建的组件集合
		config			: fGetConfig(),		// 配置
		
		CANCEL_FIRE		: false,
		
		_hideOnBodyClick	: [],			// 点击body时需要隐藏的元素集合

		_componentCount		: 0,			// 组件计数器
		_tpls				: {},			// 组件模版

		_loadCount			: 0,			// 文件加载计数器
		_loadTemplateCount	: 0,			// 模版加载计数器
		_loadTemplateQueue	: [],			// 模版动态加载回调函数队列

		_eventCount		: 0,				// 事件委托计数器
		_eventDelegate	: {click:{}},		// 事件委托handler集合
		_defaultHandler	: {					// 事件默认handler
			close : function(){
				this.destroy();
			}
		}
	};
	nui.init();
	window.nui = nui;

	/**
	 * 组件基类
	 * @param {object} oConf 配置对象
	 * @return {object} 组件对象
	 */
	var Component = nui.Component = function(oConf){
		this.id = oConf.id = oConf.id || 'nui-component' + nui._componentCount;
		nui._componentCount++;
		this.config = oConf;
		nui.c[oConf.id] = this;
		return this;
	};
	Component.prototype.getHtml = fComponentGetHtml;
	Component.prototype.update = fComponentUpdate;
	Component.prototype.disable = fComponentDisable;
	Component.prototype.listen = fComponentListen;
	Component.prototype.unlisten = fComponentUnlisten;
	Component.prototype.destroy = fComponentDestroy;
	Component.prototype.destroyParent = fComponentDestroyParent;
	Component.prototype.getDom = fComponentGetDom;
	Component.prototype.fire = fComponentFire;
	Component.prototype.render = fComponentRender;
	Component.prototype.text = fComponentText;
	Component.prototype.getParent = fComponentGetParent;
	Component.prototype.getChild = fComponentGetChild;

	
	/**
	 * 渲染组件
	 * @param {object} oRenderTo 渲染到的节点
	 * @param {bool} bReplace true为替换renderTo节点，false为渲染到renderTo节点内
	 * @return {void}
	 * @method render
	 * @for Component
	 */
	function fComponentRender(oRenderTo, bReplace){
		var that = this;
		var oConf = that.config;
		var sBaseclass = oConf.baseclass;

		fLoadTemplate(sBaseclass, function(sName, oTpl){
			if(!oTpl){return;}
			var oHtml = that.htmlObj = that.htmlObj || fGetHtml(oConf);
			var oDom = fGetDom(oHtml.html);
			oRenderTo = typeof oRenderTo == 'string' ? $(oRenderTo) : oRenderTo;
			fBeforeRender(oDom, oConf);
			if(!bReplace){
				(oRenderTo || document.body).appendChild(oDom);
			}else{
				oRenderTo.parentNode.replaceChild(oDom, oRenderTo);
			}
			fAfterRender(oDom, oConf);
			oConf = null;
			oRenderTo = null;
			
			fReplaceTmpNode();

		}, null, false);
	}
	
	/**
	 * 获取组件html
	 * @return {string} 返回组件html，如果模版还未加载则返回一个临时html
	 * @method getHtml
	 * @for Component
	 */
	function fComponentGetHtml(){
		var that = this;
		var oConf = that.config;
		if(that.htmlObj){
			return that.htmlObj.html;
		}else{
			// 临时节点
			var sId = that.id;
			nui._tmpNode = nui._tmpNode || [];
			nui._tmpNode.push(sId);
			
			// 加载模版后替换节点
			fLoadTemplate(oConf.baseclass, function(){
				that.htmlObj = fGetHtml(oConf);
				fReplaceTmpNode();
			});
			
			return '<i id="' + sId + '"></i>';
		}
	}

	/**
	 * 获取父组件
	 * @return {object} 返回父组件
	 * @method getParent
	 * @for Component
	 */
	function fComponentGetParent(){
		return nui.getParent(this.id);
	}

	/**
	 * 获取子组件
	 * @return {array} 子组件数组
	 * @method getChild
	 * @for Component
	 */
	function fComponentGetChild(){
		return nui.getChild(this.id);
	}

	/**
	 * 销毁父组件
	 * @return {void}
	 * @method destroyParent
	 * @for Component
	 */
	function fComponentDestroyParent(){
		nui.destroyParent(this.id);
	}

	/**
	 * 触发自定义事件
	 * @param {object} oDom 组件的id或dom
	 * @param {string} sEvent 事件类型
	 * @return {bool} 如果handler返回了CANCEL_FIRE则返回false，否则true
	 * @method fire
	 * @for Component
	 */
	function fComponentFire(sEvent){
		var that = this;
		if(that.config.disabled){
			return false;
		}
		
		var aArguments = [];
		for(var i=1, l=arguments.length; i<l; i++){
			aArguments.push(arguments[i]);
		}
		if(that){
			var aQueue = (that.listeners || {})[sEvent];
			if(aQueue){
				for(var i=0, l=aQueue.length; i<l; i++){
					var fHandler = aQueue[i];
					var oReturn = fHandler && fHandler.apply(that, aArguments);
					if(oReturn === nui.CANCEL_FIRE){
						return false;
					}
				}
			}
		}
		return true;
	}
	
	/**
	 * 获取组件dom
	 * @return {object} dom对象
	 * @method getDom
	 * @for Component
	 */
	function fComponentGetDom(){
		return nui.$(this.id);
	}

	/**
	 * 更新组件
	 * @param {object} oConf 更新的配置
	 * @param {function} fCall 回调
	 * @param {bool} bNoFire 不触发update事件
	 * @method update
	 * @for Component
	 */
	function fComponentUpdate(oConf, fCall, bNoFire){
		if(!oConf){return;}
		var that = this;
		var oNewConf = {};
		var oOldConf = that.config;
		fMixObj(oNewConf, oOldConf);
		fMixObj(oNewConf, oConf);
		//var oCmp = nui.create(oOldConf.baseclass, oNewConf, true);
		//var oHtml = oNewConf.htmlObj = fGetHtml(oNewConf);
		that.config = oNewConf;
		that.render(that.getDom(), true);
		fCall && fCall.call(oCmp);
		
		if(!bNoFire){
			that.fire('update');
		}
	}

	/**
	 * 禁用、恢复可用
	 * @param {bool} bDisabled 禁用/可用
	 * @method disable
	 * @for Component
	 */
	function fComponentDisable(bDisabled){
		bDisabled = bDisabled === false ? false : true;
		var that = this;
		var oDom = that.getDom();
		var aChild = oDom.getElementsByTagName('*');
		var aEventName = ['click', 'mouseup', 'mousedown', 'keypress', 'keydown', 'keyup'];// 需要禁用和恢复的事件
		var oEvents = that._domEvents = that._domEvents || {};
		for(var i=0, l=aEventName.length; i<l; i++){
			var sEvent = 'on' + aEventName[i];
			if(oDom[sEvent]){
				oEvents[sEvent] = oDom[sEvent];
			}
		}

		_fSet(oDom);
		_fSetChild();
		
		function _fSet(o){
			var oConf = (nui.c[o.id]||{}).config;
			if(bDisabled){
				o.setAttribute('disabled', 'true');
				if(oConf){
					oConf.disabled = true;
					o.className = fGetCompTpl(oConf).cls;
				}
				for(var i=0, l=aEventName.length; i<l; i++){
					var sEvent = 'on' + aEventName[i];
					if(oDom[sEvent]){
						oDom[sEvent] = null;
						o.removeAttribute(sEvent);
					}
				}
			}else{
				o.removeAttribute('disabled');
				if(oConf){
					oConf.disabled = false;
					o.className = fGetCompTpl(oConf).cls;
				}
				for(var i=0, l=aEventName.length; i<l; i++){
					var sEvent = 'on' + aEventName[i];
					if(oEvents[sEvent]){
						oDom[sEvent] = oEvents[sEvent];
						oEvents[sEvent] = null;
						delete oEvents[sEvent];
					}
				}
			}
		}
		
		function _fSetChild(){
			for(var i=0, l=aChild.length; i<l; i++){
				_fSet(aChild[i]);
			}
		}
	}

	/**
	 * 监听自定义事件
	 * @param {string} sEvent 事件类型
	 * @param {function} fHandler 事件处理函数
	 * @return {void}
	 * @method listen
	 * @for Component
	 */
	function fComponentListen(sEvent, fHandler){
		var that = this;
		if(fHandler){
			that.listeners = that.listeners || {};
			var oListeners = that.listeners;
			if(!oListeners[sEvent]){
				oListeners[sEvent] = [];
			}
			if(typeof fHandler == 'string'){
				fHandler = new Function('var arg=arguments;' + fHandler);
			}
			oListeners[sEvent].push(fHandler);
		}
	}

	/**
	 * 取消监听自定义事件
	 * @param {string} sEvent 事件类型
	 * @param {function} fHandler 事件处理函数
	 * @return {void}
	 * @method unlisten
	 * @for Component
	 */
	function fComponentUnlisten(sEvent, fHandler){
		var that = this;
		if(fHandler){
			var aQueue = (that.listeners||{})[sEvent];
			if(aQueue){
				for(var i=0, l=aQueue.length; i<l; i++){
					if(fHandler == aQueue[i]){
						aQueue.splice(i,1);
						break;
					}
				}
			}
		}
	}

	/**
	 * 销毁组件
	 * @return {void}
	 * @method destroy
	 * @for Component
	 */
	function fComponentDestroy(){
		var that = this;
		var sId = that.id;
		var oDom = that.getDom();
		if(!oDom){return;}
		// 先销毁子组建
		var aChild = nui.getChild(oDom);
		for(var i=0, l=aChild.length; i<l; i++){
			aChild[i].destroy();
		}

		// 触发ondestroy事件
		that.fire('destroy');
		
		// 移除事件
		var oEvents = nui._eventDelegate;
		for(var sEvt in oEvents){
			var sEvtId = oDom.getAttribute('data-' + sEvt);
			if(sEvtId){
				oEvents[sEvt][sEvtId] = null;
				delete oEvents[sEvt][sEvtId];
			}
			// 移除子节点的事件
			var aChild = oDom.getElementsByTagName('*');
			for(var i=0, l=aChild.length; i<l; i++){
				var oChild = aChild[i];
				var sEvtId = oChild.getAttribute('data-' + sEvt);
				if(sEvtId){
					oEvents[sEvt][sEvtId] = null;
					delete oEvents[sEvt][sEvtId];
				}
			}
		}
		// 移除自定义事件
		var oCustomEvents = that.listeners;
		for(var sEvt in oCustomEvents){
			var aEvts = oCustomEvents[sEvt];
			while(aEvts.length > 0){
				aEvts.shift();
			}
			delete that.listeners[sEvt];
		}
		delete that.listeners;
		
		// 移除dom
		oDom.parentNode.removeChild(oDom);
		
		nui.c[sId] = null;
		delete nui.c[sId];
	}

	/**
	 * 更改组件文字
	 * @param {object} oDom 组件id或dom对象
	 * @method text
	 * @for Component
	 */
	function fComponentText(sText){
		var that = this;
		var oDom = that.getDom();
		that.config.text = sText;
		var oText = $(oDom.id + '-text');
		if(oText){
			oText.innerHTML = sText;
		}else{
			oDom.innerHTML = sText;
		}
	}
	
	/* 替换模版未加载时产生的临时节点 */
	function fReplaceTmpNode(){
		if(nui._tmpNode){
			setTimeout(function(){
				var aTmpNode = nui._tmpNode;
				while(aTmpNode && aTmpNode.length > 0){
					var sTmpId = aTmpNode.shift();
					var oDom = $(sTmpId);
					var oCmp = nui.get(sTmpId);
					if(oCmp && oDom){
						oCmp.update({}, null, true);
					}
				}
				nui._tmpNode = null;
			},0);
		}
	}

	/**
	 * 由id获取dom
	 * @param {string} sId id
	 * @return {object} dom对象
	 * @method $
	 */
	function $(sId){
		return document.getElementById(sId);
	}
	
	/**
	 * 更新组件
	 * @param {object} oDom 组件id或dom
	 * @param {object} oConf 更新的配置
	 * @method update
	 */
	function fUpdate(oDom, oConf){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.update(oConf);
	}

	/**
	 * 更改组件文字
	 * @param {object} oDom 组件id或dom对象
	 * @param {string} sText 组件文字
	 * @method text
	 */
	function fText(oDom, sText){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.text(sText);
	}
	
	/**
	 * 禁用、恢复可用
	 * @param {object} oDom 组件id或dom对象
	 * @param {bool} bDisabled 禁用/可用
	 * @method disable
	 */
	function fDisable(oDom, bDisabled){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.disable(bDisabled);
	}

	/**
	 * 新建组件模板
	 * @param {string} sName 名称
	 * @param {object} oTpl 模板
	 * @param {bool} bOverlay 如果模板已经存在是否覆盖
	 * @method tpl
	 */
	 function fTpl(sName, oTpl, bOverlay){
	 	// 如果已经存在模板，并且配置不覆盖模板则不新建模板
	 	if(nui._tpls[sName] && !bOverlay){
	 		return;
	 	}else{
	 		if(oTpl.extend){
	 			var oSuper = fSimpleMix({}, (nui._tpls[oTpl.extend] || {}));
	 			nui._tpls[sName] = fSimpleMix(oSuper, oTpl);
	 		}else{
	 			nui._tpls[sName] = oTpl;
	 		}
	 	}
	 }

	/**
	 * 获取组件对象
	 * @param {string} sId id
	 * @return {object} 组件对象
	 * @method get
	 */
	function fGet(sId){
		if(!sId){return null;}
		return nui.c[sId];
	}

	/**
	 * 动态加载js
	 * @param {string} sSrc 文件url
	 * @param {string} sLoaderId loaderId
	 * @param {function} fCallback 成功回调
	 * @return {void}
	 * @method load
	 */
	function fLoad(sSrc, sLoaderId, fCallback){
		if(!sSrc){return;}
		sLoaderId = sLoaderId || (nui._loadCount++);
		var sType = sSrc.match(/\.js$/) ? 'js' : 'css';
		
		sLoaderId = 'nui-loader-' + sLoaderId;
		if(!$(sLoaderId)){
			if(sType == 'js'){
				var oDom = document.createElement('script');
				oDom.src = sSrc;
				oDom.id = sLoaderId;
				oDom.onload = oDom.onerror = oDom.onreadystatechange = function(){
					if(!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete'){
						oDom.onload = null;
						oDom.onerror = null;
						oDom.onreadystatechange = null;
						oDom.parentNode.removeChild(oDom);
						fCallback && fCallback();
					}else{
						//nui.log('readyState:' + this.readyState);
					}
				};
				document.body.appendChild(oDom);
			}else{
				var oDom = document.createElement('link');
				var oHead = document.getElementsByTagName('head')[0];
				oDom.href = sSrc;
				oDom.id = sLoaderId;
				var oTarget = $('nui-basecss');
				if(oTarget){
					oHead.insertBefore(oDom, oTarget.nextSibling);
				}
			}
			nui.log('loading ' + sSrc + ' by #' + sLoaderId);
		}else{
			fCallback && fCallback();
		}
	}

	/**
	 * 将元素浮到另一个元素上
	 * @param {object} oDom 要移动dom或id
	 * @return {object} oPointTo 目标的dom或id
	 * @return {array} aFix 坐标偏移量
	 * @method floatTo
	 */
	function fFloatTo(oDom, oPointTo, aFix){
		oDom = typeof oDom == 'string' ? $(oDom) : oDom;
		oPointTo = typeof oPointTo == 'string' ? $(oPointTo) : oPointTo;
		
		aFix = aFix === true ? [0, oPointTo.offsetHeight] : (aFix || [0,0]);
		
		var oParent = oPointTo;
		var nX = 0;
		var nY = 0;
		while(oParent){
			nX += oParent.offsetLeft || 0;
			nY += oParent.offsetTop || 0;
			oParent = oParent.offsetParent;
		}
		oDom.style.left = nX + aFix[0] + 'px';
		oDom.style.top = nY + aFix[1] + 'px';
	}
	
	/**
	 * 事件委托
	 * @param {object} oDom dom对象或id
	 * @param {string} sEvent 事件类型，只能是nui._eventDelegate中存在的类型
	 * @param {function} fHandler 事件处理函数
	 * @param {string} sRel fHandler在this指向的dom的id
	 * @method delegate
	 */
	function fDelegate(oDom, sEvent, fHandler, sRel){
		if(!nui._eventDelegate[sEvent]){return;}
		oDom = typeof oDom == 'string' ? $(oDom) : oDom;
		var sEvtId = 'nui-evt' + (nui._eventCount++);
		nui._eventDelegate[sEvent][sEvtId] = fHandler;
		oDom.setAttribute('data-' + sEvent, sEvtId);
		oDom.setAttribute('data-rel', sRel || oDom.id);
	}
	
	/**
	 * 获取配置
	 * @return {object} 配置对象
	 */
	function fGetConfig(){
		var oDom = $('nui-init');
		if(!oDom){return;}
		
		var oConf = {
			path : '',
			lib : fGetQuery('ver'),
			build : fGetQuery('build') || 'latest',
			skin : SKIN.skin,
			color : SKIN.color,
			html5 : true,
			base64 : false,
			tpl : false,
			debug : false
		};

		for(var sKey in oConf){
			oConf[sKey] = oDom.getAttribute('data-'+sKey) || oConf[sKey];
			if(oConf[sKey] == 'false' || oConf[sKey] == 'disabled'){oConf[sKey] = false;}
		}

		var oAllowedLib = {'js5':'js5', 'jy5':'jy5', 'hd':'hd'};
		oConf.lib = oAllowedLib[oConf.lib] || 'js5';
		oConf.libPath = oDom.getAttribute('src').replace(/[^\/]*$/, '') + oConf.lib + '/';
		
		// 版本对应
		var oBuild = {
			js5 : {
				'preview' : '130117',
				'latest' : '130117'
			},
			hd : {
				'latest' : '130121'
			}
		};
		
		// 不同模版库特殊处理
		switch(oConf.lib){
			case 'js5' :
				if(!oConf.debug){
					oConf.build = oBuild['js5'][oConf.build];
				}
				oConf.base64 = true;
				oConf.path = oConf.libPath + oConf.build + '/';
				oConf.cssPath = oConf.path + 'css/';
				oConf.cssUrl = oConf.cssPath + 'overlay_nui.css';
				oConf.base64CssUrl = oConf.cssPath + 'base64_nui.css';
				break;
			case 'hd' :
				if(!oConf.debug){
					oConf.build = oBuild['hd'][oConf.build];
				}
				oConf.path = oConf.libPath + oConf.build + '/';
				oConf.cssPath = oConf.path + 'css/';
				oConf.cssUrl = oConf.cssPath + 'nui.css';
				oConf.base64CssUrl = oConf.cssPath + 'base64_nui.css';
				break;
			default :
				oConf.path = oConf.libPath + oConf.build + '/';
				oConf.cssPath = oConf.path + 'css/';
				oConf.cssUrl = oConf.cssPath + 'nui.css';
				oConf.base64CssUrl = oConf.cssPath + 'base64_nui.css';
		}
		
		return oConf;
	}
	
	/**
	 * 居中
	 * @param {object} oDom 要居中的dom对象
	 * @param {object} oParent 相对dom对象居中
	 * @return {void}
	 * @method center
	 */
	function fCenter(oDom, oParent){
		var oBrowser = fGetBrowser();
		oParent = oParent || document.documentElement;
		var nParentHeight = oParent.offsetHeight < oParent.clientHeight ? oParent.clientHeight : Math.min(oParent.offsetHeight, oParent.clientHeight, oParent.scrollHeight);
		var nParentWidth = Math.min(oParent.offsetWidth, oParent.clientWidth, oParent.scrollWidth);
		oDom.style.top = parseInt((nParentHeight - oDom.offsetHeight)/2) + 'px';
		oDom.style.left = parseInt((nParentWidth - oDom.offsetWidth)/2) + 'px';
		if(oParent == document.documentElement && oBrowser.name == 'ie' && oBrowser.ver <= 6){
			oDom.style.top = oDom.offsetTop + document.documentElement.scrollTop + 'px';
		}
	}
	
	/**
	 * 获取父组件
	 * @param {object} oDom 组件的id或dom
	 * @return {object} 父组件
	 * @method getParent
	 */
	function fGetParent(oDom){
		oDom = typeof oDom == 'string' ? $(oDom) : oDom;
		while(oDom && oDom.nodeType == 1){
			oDom = oDom.parentNode;
			if(oDom){
				var oCmp = nui.c[oDom.id];
				if(oCmp){
					return oCmp;
				}
			}
		}
		return null;
	}
	
	/**
	 * 获取子组件
	 * @param {object} oDom 组件的id或dom
	 * @return {array} 子组件数组
	 * @method getChild
	 */
	function fGetChild(oDom){
		oDom = typeof oDom == 'string' ? $(oDom) : oDom;
		var aChild = [];
		var tmp = oDom.getElementsByTagName('*');
		for(var i=0, l=tmp.length; i<l; i++){
			var oDom = tmp[i];
			var oCmp = nui.c[oDom.id];
			if(oCmp){
				aChild.push(oCmp);
			}
		}
		return aChild;
	}
	
	/**
	 * 生成组件
	 * @param {string} sName 组件类型
	 * @param {object} oConf 配置对象
	 * @param {bool} bRender 是否渲染到页面，false的话适合于只取html字符串的情况
	 * @param {object} oRenderTo 渲染到的容器
	 * @return {string} 返回组件html，如果模版还未加载则返回一个临时html，加载完后会尝试替换这个dom为组件
	 * @method create
	 */
	function fCreate(sName, oConf, bRender, oRenderTo){
		var oNames = fGetConfigByName(sName);
		var sBaseclass = oNames.baseclass;
		var sSubclass = oNames.subclass;
		var sType = oNames.type;
		var sSubtype = oNames.subtype;
		var sParams = oNames.params;
		oConf = oConf || {};
		oConf.baseclass = sBaseclass;
		oConf.subclass = oConf.subclass || sSubclass;
		oConf.type = oConf.type || sType;
		oConf.subtype = oConf.subtype || sSubtype;
		oConf.params = oConf.params || sParams;
		var oCmp = new Component(oConf);
		oConf._createMode = true;
		delete oConf._parseMode;
		bRender = (typeof bRender == 'undefined') ? !!oConf.render : bRender;
		oRenderTo = (typeof oRenderTo == 'undefined') ? oConf.renderTo : oRenderTo;
		if(bRender){
			oCmp.render(oRenderTo);
		}
		return oCmp;
	}
	
	/**
	 * 通过dom获取配置
	 */
	function fGetConfigByDom(oDom){
		var aAttrs = oDom.attributes;
		var aChild = oDom.childNodes;
		var oConf = {
			id : oDom.id,
			className : oDom.getAttribute('data-class') || oDom.className
		};
		var oAllowedAttrs = {
			title : true,
			style : true,
			href : true,
			target : true,
			//type : true,
			value : true
		};
		// 通过属性获取配置
		for(var i=0; i<aAttrs.length; i++){
			var o = aAttrs[i];
			var sName = o.name;
			var sValue = o.value;
			if(sName.indexOf('data-')==0){
				if(sName.indexOf('data-attr-')==0){
					sName = sName.replace(/^data\-attr\-/,'');
					oConf.attrs = oConf.attrs || {};
					oConf.attrs[sName] = sValue;
				}else{
					sName = sName.substr(sName.indexOf('-')+1);
					if(sName.indexOf('-') > -1){ // 因为属性不能大写，所以使用my-class-name替代myClassName，需要转换
						sName = sName.replace(/-(\w)/g, function(sAll, sKey){
							return sKey.toUpperCase();
						});
					}
					oConf[sName] = sValue;
				}
				oDom.removeAttribute(o.name);
				i--;
			}else if(oAllowedAttrs[sName]){ // 允许某些html属性作为配置
				oConf.attrs = oConf.attrs || {};
				//if(sValue && sValue != 'null' && sValue != 'false'){oConf.attrs[sName] = sValue;}
				if(sName == 'style'){
					sValue = oDom.style.cssText || sValue;
				}
				if(sValue && sValue != 'null'){oConf.attrs[sName] = sValue;}
			}
		}
		// 通过第一层子节点中配置了data-config的节点获取配置
		for(var i=0; i<aChild.length; i++){
			var oChild = aChild[i];
			if(oChild.nodeType === 1 && oChild.getAttribute('data-config')){
				oConf[oChild.getAttribute('data-config')] = oChild.innerHTML;
				oChild.parentNode.removeChild(oChild);
				i--;
			}
		}
		
		oConf.text = oDom.innerHTML || oConf.text;
		
		return oConf;
	}
	
	/**
	 * 渲染前处理
	 */
	function fBeforeRender(oDom, oConf){
		if(!oDom){return;}// 找不到dom
		var sName = oConf.baseclass;
		var oTpl = nui._tpls[sName];
		
		// 监听自定义事件
		nui.listen(oDom, 'ready', oTpl.onready);
		nui.listen(oDom, 'ready', oConf.onready);
		nui.listen(oDom, 'destroy', oTpl.ondestroy);
		nui.listen(oDom, 'destroy', oConf.ondestroy);
		nui.listen(oDom, 'render', oTpl.onrender);
		nui.listen(oDom, 'render', oConf.onrender);

		if(oConf.disabled){
			nui.listen(oDom, 'render', function(){
				nui.disable(oDom);
			});
		}
		
		// 触发onready事件
		nui.fire(oDom, 'ready', oConf, oDom);
	}
	
	/**
	 * 渲染后处理
	 */
	function fAfterRender(oDom, oConf){
		if(!oDom){return;}// 找不到dom
		
		var sName = oConf.baseclass;
		var oTpl = nui._tpls[sName];
		var oComp = nui.c[oDom.id]

		// 增加属性
		if(oConf.attrs){
			var oAttrs = oConf.attrs;
			for(var sKey in oAttrs){
				oDom.setAttribute(sKey, oAttrs[sKey]);
				if(sKey == 'style' && !oDom.style.cssText){// style特殊处理
					oDom.style.cssText = oAttrs[sKey];
				}
			}
		}
		
		// 触发onrender事件
		if(oConf._parseMode){ // parse方式保存onrender事件，body渲染后执行
			nui._onrender = nui._onrender || [];
			nui._onrender.push(oDom.id);
		}else{ // create方式立即执行
			nui.fire(oDom, 'render', oConf, oDom);
		}
	}
	
	/**
	 * 触发自定义事件
	 * @param {object} oDom 组件的id或dom
	 * @param {string} sEvent 事件类型
	 * @return {bool} 如果handler返回了CANCEL_FIRE则返回false，否则true
	 * @method fire
	 */
	function fFire(oDom, sEvent){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		var arg = [];
		for(var i=1, l=arguments.length; i<l; i++){
			arg.push(arguments[i]);
		}
		
		return oCmp && oCmp.fire.apply(oCmp, arg);
	}
	
	/**
	 * 监听自定义事件
	 * @param {object} oDom 组件的id或dom
	 * @param {string} sEvent 事件类型
	 * @param {function} fHandler 事件处理函数
	 * @return {void}
	 * @method listen
	 */
	function fListen(oDom, sEvent, fHandler){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.listen(sEvent, fHandler);
	}
	
	
	/**
	 * 取消监听自定义事件
	 * @param {object} oDom 组件的id或dom
	 * @param {string} sEvent 事件类型
	 * @param {function} fHandler 事件处理函数
	 * @return {void}
	 * @method unlisten
	 */
	function fUnlisten(oDom, sEvent, fHandler){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.unlisten(sEvent, fHandler);
	}
	
	/**
	 * 销毁组件
	 * @param {object} oDom 组件的id或dom
	 * @return {void}
	 * @method destroy
	 */
	function fDestroy(oDom){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.destroy();
	}

	/**
	 * 销毁父组件
	 * @param {object} oDom 组件的id或dom
	 * @return {void}
	 * @method destroyParent
	 */
	function fDestroyParent(oDom){
		var oCmp = nui.getParent(oDom);
		oCmp && oCmp.destroy();
	}

	function fGetConfigByName(sName){
		var sParams = '';
		var n = sName.indexOf('(');
		if(n > -1){
			sParams = ((sName.match(/\((.*?)\)/) || [])[1]);
			sName = sName.substr(0, n);
		}
		var aClass = sName.split('/');// btn/smallBtn
		var sBaseclass = aClass[0];
		var sSubclass = aClass[1];
		var sType = sBaseclass.split('-')[1];// ico-info
		var sSubtype = sBaseclass.split('-')[2];// ico-info-l
		if(sType){
			sBaseclass = sBaseclass.split('-')[0];
		}
		if(sParams){
			sBaseclass = sBaseclass.split('(')[0];
		}
		return {
			baseclass : sBaseclass,
			subclass : sSubclass,
			type : sType,
			subtype : sSubtype,
			params : sParams
		};
	}
	
	function fGetBrowser(){
		var sUA = navigator.userAgent.toLowerCase();
		var sName = '';
		var sVer = '';
		if(sUA.match("msie")){
			sName = 'ie';
			sVer = sUA.match(/.*?msie\s(\d+?)\..*/)[1];
		}
		return {name:sName, ver:sVer};
	}
	
	/**
	 * 解析方式生成组件
	 * @param {object} oScale 解析范围的dom或者id
	 * @param {function} fCall 解析完成的回调函数
	 * @param {bool} bClone 是否克隆方式，true的话会clone一个容器出来解析减少重复渲染次数，但是事件绑定会丢失，所以调用者的所有事件绑定都要放在回调函数中进行
	 * @return {void}
	 * @method parse
	 */
	function fParse(oScale, fCall, bClone){
		var that = this;
		var oBrowser = fGetBrowser();

		// 仅传入一个参数的时候做一些简写处理
		if(arguments.length == 1){
			if(typeof arguments[0] == 'function'){
				fCall = arguments[0];
				oScale = null;
			}else{
				oScale = arguments[0];
				fCall = null;
			}
		}
		oScale = (typeof oScale == 'string' ? $(oScale) : oScale) || document.body;
		bNoClone = (oBrowser.name == 'ie' && oScale == document.body) || (oBrowser.name == 'ie' && oBrowser.ver <= 7);// 直接替换body在某些情况下有潜在风险
		bClone = bNoClone ? false : bClone;
		bClone = (bClone === false) ? false : true;
		var oBody = oScale;
		var oCloneBody = bClone ? oBody.cloneNode(true) : oBody;
		var aTags = ['a', 'i', 'b', 'input', 'button', 'table', 'ul', 'nui'];// 需要遍历的标签
		var oComponents = {_count:0};

		for(var j=0, m=aTags.length; j<m; j++){
			var sTag = aTags[j];
			var aAllTags = oCloneBody.getElementsByTagName(sTag);
			for(var i=0, l=aAllTags.length; i<l; i++){
				var o = aAllTags[i];
				if(o.getAttribute('data-nui')){
					var sName = o.getAttribute('data-nui');
					var oNames = fGetConfigByName(sName);
					var sBaseclass = oNames.baseclass;
					var sSubclass = oNames.subclass;
					var sType = oNames.type;// ico-info
					var sSubtype = oNames.subtype;// ico-info-l
					var sParams = oNames.params;
					if(sType){
						sBaseclass = sBaseclass.split('-')[0];
					}
					o.setAttribute('data-baseclass', sBaseclass);
					if(sSubclass){
						o.setAttribute('data-subclass', sSubclass);
					}
					if(sType){
						o.setAttribute('data-type', sType);
					}
					if(sSubtype){
						o.setAttribute('data-subtype', sSubtype);
					}
					if(sParams){
						o.setAttribute('data-params', sParams);
					}
					oComponents[sBaseclass] = oComponents[sBaseclass] || [];
					oComponents[sBaseclass].push(o);
					oComponents._count++;
				}
			}
		}

		if(oComponents._count<=0){
			fCall && fCall.call(oBody);
			nui.onparse && nui.onparse.call(oBody);
		}
		
		for(var sName in oComponents){
			if(sName == '_count'){continue;}
			fLoadTemplate(sName, function(sName, oTpl){
				var aQueue = oComponents[sName];
				nui.log('parsing ' + sName);
				if(!oTpl){
					oComponents._count -= aQueue.length;
					nui.log('parsing error:' + sName + ' no template');
				}else{
					// 倒序遍历来优先解析子节点
					for(var i=aQueue.length-1, l=0; i>=l; i--){
						var o = aQueue[i];
						var oConf = fGetConfigByDom(o);
						var oCmp = new Component(oConf);
						oConf._parseMode = true;
						delete oConf._createMode;
						var oHtml = fGetHtml(oConf);
						var sContent = oHtml.html;
						// 有模版的情况
						if(sContent){
							var oDom = fGetDom(sContent);
							try{
								fBeforeRender(oDom, oConf);
								o.parentNode.replaceChild(oDom, o);
								fAfterRender(oDom, oConf);
							}catch(e){
								nui.log(e);
							}
						}else{
							// 没有模版的情况
							var oDom = o;
							oDom.id = oHtml.id;
							oDom.className = oHtml.className;
							fBeforeRender(oDom, oConf);
							fAfterRender(oDom, oConf);
						}
						oComponents._count--;
					}
				}
				if(oComponents._count<=0){
					bClone && oBody.parentNode.replaceChild(oCloneBody, oBody);
					nui.log('parse complete');
					
					// 逐个触发onrender事件
					if(nui._onrender){
						while(nui._onrender.length > 0){
							var sId = nui._onrender.shift();
							nui.fire(sId, 'render', nui.c[sId].config, $(sId));
						}
						nui._onrender = null;
						delete nui._onrender;
					}
					fCall && fCall.call(oCloneBody);
					nui.onparse && nui.onparse.call(oCloneBody);
					
					oCloneBody = null;
					oComponents = null;
				}
			});
		}
	}
	
	/**
	 * 动态加载模版
	 * @param {string} sName 模版名称
	 * @param {function} fCallback 加载完成回调
	 * @param {bool} bSingle true为只加载单个组件模版，false为加载所有模版，默认false
	 * @return {void}
	 */
	function fLoadTemplate(sName, fCallback, bSingle){
		var sFileName = bSingle ? sName : 'pak';
		if(!nui.config.debug){sFileName += '_min'}
		if(nui._tpls[sName]){ // 如果已经存在模版则不再加载
			fCallback && fCallback(sName, nui._tpls[sName]);
			return;
		}else{
			nui._loadTemplateCount++;
			fCallback && nui._loadTemplateQueue.push([fCallback, sName]); // 将回调函数加入队列等所有模版加载完成后再执行
		}

		var sSrc = nui.config.path + 'tpl/' + sFileName + '.js';
		nui.load(sSrc, sFileName, function(){
			nui._loadTemplateCount--;
			if(nui._loadTemplateCount <= 0){
				var aQueue = nui._loadTemplateQueue;
				var aSingle = [];
				while(aQueue.length > 0){
					var arr = aQueue.shift();
					var f = arr[0];
					var a = arr[1];
					var o = nui._tpls[a];

					// 如果pak.js里没有，再请求一次单个模版
					if(!bSingle && !o){
						aSingle.push(arr);
					}else{
						// 加载css
						if(o && o.css){
							nui.load(o.css);
						}
						f(a, o);
					}
				}
				
				while(aSingle.length > 0){
					var arr = aSingle.shift();
					//fLoadTemplate(arr[1], arr[0], true);
				}
			}
		});
	}
	
	/**
	 * 获得组件的dom对象
	 */
	function fGetDom(sHtml){
		var oTmpDom = document.createElement('div');
		oTmpDom.innerHTML = sHtml;
		var oDom = oTmpDom.childNodes[0];
		return oDom;
	}

	/**
	 * 获取一个随机id
	 */
	function fRandom(){
		return (new Date()).getTime() + parseInt(Math.random()*10000);
	}
	
	/**
	 * 通过模版获取html
	 */
	function fGetHtml(o){
		//var nRan = fRandom();
		//o.id = o.id || 'nui-' + nRan;
		
		var oTpl = nui._tpls[o.baseclass];
		o.params = o.params || {};
		if(typeof o.params == 'string'){
			var tmp = o.params.replace(/,/g, ' ');
			tmp = o.params.split(' ');
			o.params = {};
			for(var i=0, l=tmp.length; i<l; i++){
				o.params[tmp] = true;
			}
		}
		var oData = o;
		
		if(oTpl.getConfig){
			oData = oTpl.getConfig(oData) || oData;
		}
		var sTemplate = '';
		var sHtml = '';
		var oCompTpl = fGetCompTpl(oData);

		if(oTpl.getTemplate){
			sTemplate = oTpl.getTemplate(oData) || '';
		}else if(oData.tpl){
			sTemplate = oData.tpl || '';
		}else{
			sTemplate = oCompTpl.tpl || '';
		}
		oData.compclass = oCompTpl.cls;

		if(oTpl.getHtml){
			sHtml = oTpl.getHtml(oData) || '';
		}else{
			sHtml = fExec(sTemplate, oData) || '';
		}

		//加id和data-nui
		sHtml = sHtml.replace(/(\s|>)/, ' id="' + oData.id + '"$1');
		
		return {
			id : oData.id,
			className : oCompTpl.cls,
			html : sHtml
		};
		
	}
	
	/**
	 * 合并对象
	 */
	function fMixObj(o1, o2){
		o1 = o1 || {};
		o2 = o2 || {};
		if((o1 || o1===0) && (o2 || o2===0)){
			for(var s in o2){
				o1[s] = o2[s];
			}
		}
		return o1;
	}
	
	/**
	 * 替换模版变量
	 */
	function fExec(str, data){
		if(!str){return '';}
		return str.replace(/#\{(.*?)\}/g, function(sAll, sKey){
					if(sKey.indexOf('~') == 0){
						sKey = sKey.replace('~','');
						var sEvent = sKey;
						var sCustom = sEvent;
						
						if(sKey.indexOf('/') > -1){
							var tmp = sKey.split('/');
							sEvent = tmp[0];
							sCustom = tmp[1] || sEvent;
						}
						
						// 依次取配置、模版、默认的handler
						var oHandler = data[sCustom] || (nui._tpls[data.baseclass].handlers || {})[sCustom] || nui._defaultHandler[sCustom];
						if(oHandler){
							var sEvtId = 'nui-evt' + (nui._eventCount++);
							nui.listen(data.id, sCustom, oHandler);
							nui._eventDelegate[sEvent][sEvtId] = nui.bind(function(sId, sCustom){
								nui.fire(sId, sCustom);
							}, this, data.id, sCustom);
							return 'data-' + sEvent + '="' + sEvtId + '" data-rel="' + data.id + '"';
						}else{
							return '';
						}
						
					}else if(sKey.indexOf('?') == 0){
						sKey = sKey.replace('?','');
						var oSubTpl = nui._tpls[data.baseclass].baseclass[sKey];
						if(typeof oSubTpl == 'string'){
							if(data[sKey]){
								return fExec(oSubTpl, data) || '';
							}else{
								return '';
							}
						}else{
							return fExec((oSubTpl[data[sKey]] || oSubTpl['_']), data) || '';
						}
					}else{
						var oValue = data[sKey];
						// 兼容旧方式
						if(typeof oValue == 'object'){
							oValue = oValue.getHtml && oValue.getHtml();
						}
						return oValue || '';
					}
				});
	}
	
	/**
	 * 获取组件模板
	 */
	function fGetCompTpl(oConf){
		var oTpls = nui._tpls;
		var oComp = oTpls[oConf.baseclass];
		if(!oComp){
			oComp = {
				baseclass : {
					cls : 'nui-' + oConf.baseclass
				}
			};
		}else if(!oComp.baseclass){
			oComp.baseclass = {
				cls : oComp.cls || 'nui-' + oConf.baseclass,
				tpl : oComp.tpl
			};
		}
		
		var oParams = oConf.params;
		var oBaseclass = oComp.baseclass;
		var aCompClass = [oBaseclass.cls];
		var sTpl = oBaseclass.tpl;
		
		if(oConf.subclass && oComp.subclass){
			var oSubclass = oComp.subclass[oConf.subclass];
			oSubclass && aCompClass.push(oSubclass.cls);
			sTpl = oSubclass.tpl || sTpl;
		}
		
		if(oConf.disabled){
			oParams['disabled'] = true;
		}else{
			delete oParams['disabled'];
		}
		
		if(oConf.type){
			var sBaseType = oBaseclass.cls + '-' + oConf.type;
			aCompClass.push(sBaseType);
			if(oConf.subclass){
				aCompClass.push(oSubclass.cls + '-' + oConf.type);
			}
			
			if(oConf.subtype){
				aCompClass.push(sBaseType + '-' + oConf.subtype);
			}
		}
		
		if(oConf.className){
			aCompClass.push(oConf.className);
		}
		
		if(oParams){
			for(var i in oParams){
				var sParam = i;
				if(oParams[i]){
					var sSubTpl = oBaseclass[sParam] || null;
					oConf[sParam] = fExec(sSubTpl, oConf);
					aCompClass.push(oBaseclass.cls + '-' + sParam);
					if(oConf.subclass){
						aCompClass.push(oSubclass.cls + '-' + sParam);
					}
				}
			}
			oConf.disabled = oParams['disabled'];
		}
		
		return {
			cls : aCompClass.join(' '),
			tpl : sTpl
		};
	}
	
	/**
	 * 从url中获取信息
	 */
	function fGetQuery(sKey){
		try{
			return (QUERY.match(new RegExp('(?:^|&)' + sKey + '=([^&]*)(?=$|&)')) || [])[1];
		}catch(e){
			return '';
		}
	}
	
	/**
	 * 初始化
	 * @return {void}
	 * @method init
	 */
	function fInit(){
		//try{
			var sHost = window.location.host;
			var sDomain = fGetDomain(sHost);
			var sUrlPrefix = window.location.href.indexOf('https://') == 0 ? 'https://ssl.mail.126.com/mimg127/' : 'http://mimg.127.net/';
			var oConf = nui.config;

			
			// html5标签
			if(oConf.html5){
				var aTags = ['header', 'footer', 'section', 'aside', 'article', 'nav', 'hgroup', 'figure', 'figcaption', 'details', 'summary', 'time', 'mark', 'ruby', 'rt', 'rp', 'output', 'keygen', 'meter', 'progress', 'command', 'source', 'video', 'audio', 'canvas', 'datalist'];
				for(var i=0, m=aTags.length; i<m; i++){
					document.createElement(aTags[i]);
				}
			}
			
			// 自定义标签
			document.createElement('nui');
			
			// 输出nui字体文件
			document.write("<style>@font-face{font-family:'nui';src:url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.eot');src:url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.eot?#iefix') format('embedded-opentype'),url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.woff') format('woff'),url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.ttf') format('truetype'),url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.svg#neteasefontregular') format('svg');}</style>");

			// 输出CSS
			var oBaseCSS = $('nui-basecss');
			if(!oBaseCSS){
				document.write('<link id="nui-basecss" rel="stylesheet"/>');
				oBaseCSS = $('nui-basecss');
			}
			if(oBaseCSS){
				if(oConf.base64){
					_fCheckBase64(
						function(){
							oBaseCSS.href = oConf.base64CssUrl;
						},
						function(){
							oBaseCSS.href = oConf.cssUrl;
						}
					);
				}else{
					oBaseCSS.href = oConf.cssUrl;
				}
			}

			/*
			if(oConf.skin && oConf.skin != '163blue'){
				var sSkinPath = oConf.path + 'css/skin_' + oConf.skin + '.css';
				var oSkinCSS = $('nui-skincss');
				if(!$('nui-skincss')){
					document.write('<link id="nui-skincss" rel="stylesheet"/>');
					oSkinCSS = $('nui-skincss');
				}
				if(oSkinCSS){
					oSkinCSS.href = sSkinPath;
				}
			}
			*/

			if(oConf.debug){
				document.write('<script src="' + oConf.path + 'tpl/doc.js"></script>');
			}

			// 组件的事件绑定在body上
			var oDelegate = nui._eventDelegate;
			for(var sEvent in oDelegate){
				
				nui.addEvent(document.documentElement, sEvent, function(oEvt){
					var oEvent = window.event || oEvt;
					var oTarget = oEvent.target || oEvent.srcElement;
					var sEvent = oEvent.type;
					
					while(oTarget && oTarget.nodeType == 1){
						var sEvtId = oTarget.getAttribute('data-' + sEvent);
						var sCompId = oTarget.getAttribute('data-rel');
						if(sEvtId){
							var fHandler = nui._eventDelegate[sEvent][sEvtId];
							if(oTarget.getAttribute('disabled') != 'true'){
								fHandler && fHandler.call(nui.c[sCompId] || $(sCompId) || oTarget);
							}
							break;
						}
						oTarget = oTarget.parentNode;
					}
					
					while(nui._hideOnBodyClick.length > 0){
						var sId = nui._hideOnBodyClick.shift();
						nui.destroy(sId);
					}
				});
			}
		//}catch(e){}

		/**
		 * 检查是否支持base64
		 */
		function _fCheckBase64(fSupport, fNotSupport){
			var oImg = new Image();
			oImg.onload = fSupport;
			oImg.onerror = fNotSupport;
			oImg.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';
		}
	};
	
	/**
	 * 获取皮肤信息
	 */
	function fGetSkin(){
		var sSkin = fGetQuery('skin');
		var sColor = fGetQuery('color');
		var oCookie = fGetSkinByCookie();
		var oDefault = fGetDefaultSkin();

		if(!sSkin || !sColor){
			sSkin = sSkin || oCookie.skin;
			sColor = sColor || oCookie.color;
		}else{
			fUpdateSkinCookie({skin:sSkin, color:sColor});
		}

		return {
			skin : sSkin || oDefault.skin,
			color : sColor || oDefault.color
		};
	}
	/**
	 * 从cookie中获取皮肤信息
	 */
	function fGetSkinByCookie(){
		var sCookie = document.cookie;
		var rExp = new RegExp('outlink_skin=([^;]*)(?=;|$)');
		var aResult = sCookie.match(rExp);
		if(aResult){
			var tmp = aResult[1].split('|');
			return {
				skin : tmp[0],
				color : tmp[1]
			};
		}else{
			return {};
		}
	}
	/**
	 * 更新cookie中的皮肤信息
	 */
	function fUpdateSkinCookie(oSkin){
		try{
			var sCookie = "";
			var oDate = new Date();
			oDate.setDate(oDate.getDate() + 1);
			sCookie = 'outlink_skin=' + oSkin.skin + '|' + oSkin.color + ";expires=' + oDate.toGMTString() + ';path=/;domain=" + sDomain;
			document.cookie = sCookie ;
		}catch(e){}
	}
	/**
	 * 获取各域默认皮肤
	 */
	function fGetDefaultSkin(){
		var oDefault = {
			'mail.163.com' : {
				skin : '163blue',
				color : '003399'
			},
			'126.com' : {
				skin : '126green',
				color : '008810'
			},
			'yeah.net' : {
				skin : 'yeahblue',
				color : '003399'
			}
		};
		return oDefault['mail.163.com'];
	}
	/**
	 * 获取域
	 */
	function fGetDomain(sUrl){
		if(sUrl.indexOf("126.com") > -1){
			sUrl = "126.com";
		}else if(sUrl.indexOf("yeah.net") > -1){
			sUrl = "yeah.net";
		}else if(sUrl.indexOf("188.com") > -1){
			sUrl = "188.com";
		}else if(sUrl.indexOf("vip.163.com") > -1){
			sUrl = "vip.163.com";
		}else if(sUrl.indexOf("vip.126.com") > -1){
			sUrl = "vip.126.com";
		}else{
			sUrl = "mail.163.com";
		}
		return sUrl;
	}

	/**
	 * 绑定事件
	 * @param {object} o dom对象
	 * @param {string} s 事件类型
	 * @param {function} f 事件处理函数
	 * @return {void}
	 * @method addEvent
	 */
	function fAddEvent(o,s,f){
		try{
			o.addEventListener(s,f,false);
		}catch(e){
			o.attachEvent("on"+s,f);
		}
	}

	/**
	 * 解除绑定事件
	 * @param {object} o dom对象
	 * @param {string} s 事件类型
	 * @param {function} f 事件处理函数
	 * @return {void}
	 * @method removeEvent
	 */
	function fRemoveEvent(o,s,f){
		try{
			o.removeEventListener(s,f,false);
		}catch(e){
			o.detachEvent("on"+s,f);
		}
	}
	
	function fBind(f,o){
		var a = [];
		for(var i=2, l=arguments.length; i<l; i++){
			a.push(arguments[i]);
		}
		return function(){
			return f.apply(o, a.concat(arguments));
		};
	}
	
	/**
	 * 移除class
	 * @param {object} oDom dom对象
	 * @param {string} sClassName 要移除的class
	 * @return {string} 移除后的class
	 */
	function fRemoveClass(oDom, sClassName){
		var aNewClassNames = [];
		var sNewClassName = '';
		var aClassNames = (oDom.className || '').split(' ');
		var bHas = false;
		for(var i=0, l=aClassNames.length; i<l; i++){
			var s = aClassNames[i];
			if(sClassName != s){
				aNewClassNames.push(s);
			}else{
				bHas = true;
			}
		}
		if(bHas){
			sNewClassName = aNewClassNames.join(' ');
			oDom.className = sNewClassName;
		}else{
			sNewClassName = oDom.className;
		}
		return sNewClassName;
	}
	
	/**
	 * 增加class
	 * @param {object} oDom dom对象
	 * @param {string} sClassName 要增加的class
	 * @return {string} 增加后的class
	 */
	function fAddClass(oDom, sClassName){
		var sNewClassName = '';
		var aClassNames = (oDom.className || '').split(' ');
		var bHas = false;
		for(var i=0, l=aClassNames.length; i<l; i++){
			if(sClassName == aClassNames[i]){
				bHas = true;
				break;
			}
		}
		if(bHas){
			sNewClassName = oDom.className;
		}else{
			aClassNames.push(sClassName);
			sNewClassName = aClassNames.join(' ');
			oDom.className = sNewClassName;
		}
		return sNewClassName;
	}

	function fSimpleMix(o1, o2){
		for(var i in o2){
			o1[i] = o2[i];
		}
		return o1;
	}
})();