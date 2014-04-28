
(function(){

	var QUERY = window.location.search.substr(1);
	//var QUERY_SELECTOR = !!document.querySelectorAll;
	var SKIN = fGetSkin();

	var nui = {
		$				: $,				// ͨ��id��ȡdom
		init			: fInit,			// ��ʼ��
		create			: fCreate,			// �������
		parse			: fParse,			// ������ʽ�������
		get				: fGet,				// ͨ��dom�����ȡ���
		getParent		: fGetParent,		// ��ȡ�����
		getChild		: fGetChild,		// ��ȡ�����
		getComponents	: fGetChild,		// ��ȡ��ǰ�ڵ��µ��������
		addEvent		: fAddEvent,		// ���¼�
		removeEvent		: fRemoveEvent,		// ������¼�
		bind			: fBind,			// �󶨺���
		addClass		: fAddClass,		// ����class
		removeClass		: fRemoveClass,		// �Ƴ�class
		destroy			: fDestroy,			// �������
		destroyParent	: fDestroyParent,	// ���ٸ����
		delegate		: fDelegate,		// �¼�ί��
		load			: fLoad,			// ����js��css
		listen			: fListen,			// �����Զ����¼�
		unlisten		: fUnlisten,		// ȡ���Զ����¼�����
		fire			: fFire,			// �����Զ����¼�
		tpl				: fTpl,				// �������ģ��
		disable			: fDisable,			// ����
		text			: fText,			// �����������
		update			: fUpdate,			// �������

		center			: fCenter,			// ���о��Զ�λԪ��
		floatTo			: fFloatTo,			// ��Ԫ�ظ�����һ��Ԫ����
		
		log				: function(str){try{nui.config.debug && console.log(str);}catch(e){}},

		c				: {},				// �Ѵ������������
		config			: fGetConfig(),		// ����
		
		CANCEL_FIRE		: false,
		
		_hideOnBodyClick	: [],			// ���bodyʱ��Ҫ���ص�Ԫ�ؼ���

		_componentCount		: 0,			// ���������
		_tpls				: {},			// ���ģ��

		_loadCount			: 0,			// �ļ����ؼ�����
		_loadTemplateCount	: 0,			// ģ����ؼ�����
		_loadTemplateQueue	: [],			// ģ�涯̬���ػص���������

		_eventCount		: 0,				// �¼�ί�м�����
		_eventDelegate	: {click:{}},		// �¼�ί��handler����
		_defaultHandler	: {					// �¼�Ĭ��handler
			close : function(){
				this.destroy();
			}
		}
	};
	nui.init();
	window.nui = nui;

	/**
	 * �������
	 * @param {object} oConf ���ö���
	 * @return {object} �������
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
	 * ��Ⱦ���
	 * @param {object} oRenderTo ��Ⱦ���Ľڵ�
	 * @param {bool} bReplace trueΪ�滻renderTo�ڵ㣬falseΪ��Ⱦ��renderTo�ڵ���
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
	 * ��ȡ���html
	 * @return {string} �������html�����ģ�滹δ�����򷵻�һ����ʱhtml
	 * @method getHtml
	 * @for Component
	 */
	function fComponentGetHtml(){
		var that = this;
		var oConf = that.config;
		if(that.htmlObj){
			return that.htmlObj.html;
		}else{
			// ��ʱ�ڵ�
			var sId = that.id;
			nui._tmpNode = nui._tmpNode || [];
			nui._tmpNode.push(sId);
			
			// ����ģ����滻�ڵ�
			fLoadTemplate(oConf.baseclass, function(){
				that.htmlObj = fGetHtml(oConf);
				fReplaceTmpNode();
			});
			
			return '<i id="' + sId + '"></i>';
		}
	}

	/**
	 * ��ȡ�����
	 * @return {object} ���ظ����
	 * @method getParent
	 * @for Component
	 */
	function fComponentGetParent(){
		return nui.getParent(this.id);
	}

	/**
	 * ��ȡ�����
	 * @return {array} ���������
	 * @method getChild
	 * @for Component
	 */
	function fComponentGetChild(){
		return nui.getChild(this.id);
	}

	/**
	 * ���ٸ����
	 * @return {void}
	 * @method destroyParent
	 * @for Component
	 */
	function fComponentDestroyParent(){
		nui.destroyParent(this.id);
	}

	/**
	 * �����Զ����¼�
	 * @param {object} oDom �����id��dom
	 * @param {string} sEvent �¼�����
	 * @return {bool} ���handler������CANCEL_FIRE�򷵻�false������true
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
	 * ��ȡ���dom
	 * @return {object} dom����
	 * @method getDom
	 * @for Component
	 */
	function fComponentGetDom(){
		return nui.$(this.id);
	}

	/**
	 * �������
	 * @param {object} oConf ���µ�����
	 * @param {function} fCall �ص�
	 * @param {bool} bNoFire ������update�¼�
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
	 * ���á��ָ�����
	 * @param {bool} bDisabled ����/����
	 * @method disable
	 * @for Component
	 */
	function fComponentDisable(bDisabled){
		bDisabled = bDisabled === false ? false : true;
		var that = this;
		var oDom = that.getDom();
		var aChild = oDom.getElementsByTagName('*');
		var aEventName = ['click', 'mouseup', 'mousedown', 'keypress', 'keydown', 'keyup'];// ��Ҫ���úͻָ����¼�
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
	 * �����Զ����¼�
	 * @param {string} sEvent �¼�����
	 * @param {function} fHandler �¼�������
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
	 * ȡ�������Զ����¼�
	 * @param {string} sEvent �¼�����
	 * @param {function} fHandler �¼�������
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
	 * �������
	 * @return {void}
	 * @method destroy
	 * @for Component
	 */
	function fComponentDestroy(){
		var that = this;
		var sId = that.id;
		var oDom = that.getDom();
		if(!oDom){return;}
		// ���������齨
		var aChild = nui.getChild(oDom);
		for(var i=0, l=aChild.length; i<l; i++){
			aChild[i].destroy();
		}

		// ����ondestroy�¼�
		that.fire('destroy');
		
		// �Ƴ��¼�
		var oEvents = nui._eventDelegate;
		for(var sEvt in oEvents){
			var sEvtId = oDom.getAttribute('data-' + sEvt);
			if(sEvtId){
				oEvents[sEvt][sEvtId] = null;
				delete oEvents[sEvt][sEvtId];
			}
			// �Ƴ��ӽڵ���¼�
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
		// �Ƴ��Զ����¼�
		var oCustomEvents = that.listeners;
		for(var sEvt in oCustomEvents){
			var aEvts = oCustomEvents[sEvt];
			while(aEvts.length > 0){
				aEvts.shift();
			}
			delete that.listeners[sEvt];
		}
		delete that.listeners;
		
		// �Ƴ�dom
		oDom.parentNode.removeChild(oDom);
		
		nui.c[sId] = null;
		delete nui.c[sId];
	}

	/**
	 * �����������
	 * @param {object} oDom ���id��dom����
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
	
	/* �滻ģ��δ����ʱ��������ʱ�ڵ� */
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
	 * ��id��ȡdom
	 * @param {string} sId id
	 * @return {object} dom����
	 * @method $
	 */
	function $(sId){
		return document.getElementById(sId);
	}
	
	/**
	 * �������
	 * @param {object} oDom ���id��dom
	 * @param {object} oConf ���µ�����
	 * @method update
	 */
	function fUpdate(oDom, oConf){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.update(oConf);
	}

	/**
	 * �����������
	 * @param {object} oDom ���id��dom����
	 * @param {string} sText �������
	 * @method text
	 */
	function fText(oDom, sText){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.text(sText);
	}
	
	/**
	 * ���á��ָ�����
	 * @param {object} oDom ���id��dom����
	 * @param {bool} bDisabled ����/����
	 * @method disable
	 */
	function fDisable(oDom, bDisabled){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.disable(bDisabled);
	}

	/**
	 * �½����ģ��
	 * @param {string} sName ����
	 * @param {object} oTpl ģ��
	 * @param {bool} bOverlay ���ģ���Ѿ������Ƿ񸲸�
	 * @method tpl
	 */
	 function fTpl(sName, oTpl, bOverlay){
	 	// ����Ѿ�����ģ�壬�������ò�����ģ�����½�ģ��
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
	 * ��ȡ�������
	 * @param {string} sId id
	 * @return {object} �������
	 * @method get
	 */
	function fGet(sId){
		if(!sId){return null;}
		return nui.c[sId];
	}

	/**
	 * ��̬����js
	 * @param {string} sSrc �ļ�url
	 * @param {string} sLoaderId loaderId
	 * @param {function} fCallback �ɹ��ص�
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
	 * ��Ԫ�ظ�����һ��Ԫ����
	 * @param {object} oDom Ҫ�ƶ�dom��id
	 * @return {object} oPointTo Ŀ���dom��id
	 * @return {array} aFix ����ƫ����
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
	 * �¼�ί��
	 * @param {object} oDom dom�����id
	 * @param {string} sEvent �¼����ͣ�ֻ����nui._eventDelegate�д��ڵ�����
	 * @param {function} fHandler �¼�������
	 * @param {string} sRel fHandler��thisָ���dom��id
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
	 * ��ȡ����
	 * @return {object} ���ö���
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
		
		// �汾��Ӧ
		var oBuild = {
			js5 : {
				'preview' : '130117',
				'latest' : '130117'
			},
			hd : {
				'latest' : '130121'
			}
		};
		
		// ��ͬģ������⴦��
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
	 * ����
	 * @param {object} oDom Ҫ���е�dom����
	 * @param {object} oParent ���dom�������
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
	 * ��ȡ�����
	 * @param {object} oDom �����id��dom
	 * @return {object} �����
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
	 * ��ȡ�����
	 * @param {object} oDom �����id��dom
	 * @return {array} ���������
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
	 * �������
	 * @param {string} sName �������
	 * @param {object} oConf ���ö���
	 * @param {bool} bRender �Ƿ���Ⱦ��ҳ�棬false�Ļ��ʺ���ֻȡhtml�ַ��������
	 * @param {object} oRenderTo ��Ⱦ��������
	 * @return {string} �������html�����ģ�滹δ�����򷵻�һ����ʱhtml���������᳢���滻���domΪ���
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
	 * ͨ��dom��ȡ����
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
		// ͨ�����Ի�ȡ����
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
					if(sName.indexOf('-') > -1){ // ��Ϊ���Բ��ܴ�д������ʹ��my-class-name���myClassName����Ҫת��
						sName = sName.replace(/-(\w)/g, function(sAll, sKey){
							return sKey.toUpperCase();
						});
					}
					oConf[sName] = sValue;
				}
				oDom.removeAttribute(o.name);
				i--;
			}else if(oAllowedAttrs[sName]){ // ����ĳЩhtml������Ϊ����
				oConf.attrs = oConf.attrs || {};
				//if(sValue && sValue != 'null' && sValue != 'false'){oConf.attrs[sName] = sValue;}
				if(sName == 'style'){
					sValue = oDom.style.cssText || sValue;
				}
				if(sValue && sValue != 'null'){oConf.attrs[sName] = sValue;}
			}
		}
		// ͨ����һ���ӽڵ���������data-config�Ľڵ��ȡ����
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
	 * ��Ⱦǰ����
	 */
	function fBeforeRender(oDom, oConf){
		if(!oDom){return;}// �Ҳ���dom
		var sName = oConf.baseclass;
		var oTpl = nui._tpls[sName];
		
		// �����Զ����¼�
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
		
		// ����onready�¼�
		nui.fire(oDom, 'ready', oConf, oDom);
	}
	
	/**
	 * ��Ⱦ����
	 */
	function fAfterRender(oDom, oConf){
		if(!oDom){return;}// �Ҳ���dom
		
		var sName = oConf.baseclass;
		var oTpl = nui._tpls[sName];
		var oComp = nui.c[oDom.id]

		// ��������
		if(oConf.attrs){
			var oAttrs = oConf.attrs;
			for(var sKey in oAttrs){
				oDom.setAttribute(sKey, oAttrs[sKey]);
				if(sKey == 'style' && !oDom.style.cssText){// style���⴦��
					oDom.style.cssText = oAttrs[sKey];
				}
			}
		}
		
		// ����onrender�¼�
		if(oConf._parseMode){ // parse��ʽ����onrender�¼���body��Ⱦ��ִ��
			nui._onrender = nui._onrender || [];
			nui._onrender.push(oDom.id);
		}else{ // create��ʽ����ִ��
			nui.fire(oDom, 'render', oConf, oDom);
		}
	}
	
	/**
	 * �����Զ����¼�
	 * @param {object} oDom �����id��dom
	 * @param {string} sEvent �¼�����
	 * @return {bool} ���handler������CANCEL_FIRE�򷵻�false������true
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
	 * �����Զ����¼�
	 * @param {object} oDom �����id��dom
	 * @param {string} sEvent �¼�����
	 * @param {function} fHandler �¼�������
	 * @return {void}
	 * @method listen
	 */
	function fListen(oDom, sEvent, fHandler){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.listen(sEvent, fHandler);
	}
	
	
	/**
	 * ȡ�������Զ����¼�
	 * @param {object} oDom �����id��dom
	 * @param {string} sEvent �¼�����
	 * @param {function} fHandler �¼�������
	 * @return {void}
	 * @method unlisten
	 */
	function fUnlisten(oDom, sEvent, fHandler){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.unlisten(sEvent, fHandler);
	}
	
	/**
	 * �������
	 * @param {object} oDom �����id��dom
	 * @return {void}
	 * @method destroy
	 */
	function fDestroy(oDom){
		var sId = oDom.id || oDom;
		var oCmp = nui.c[sId];
		oCmp && oCmp.destroy();
	}

	/**
	 * ���ٸ����
	 * @param {object} oDom �����id��dom
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
	 * ������ʽ�������
	 * @param {object} oScale ������Χ��dom����id
	 * @param {function} fCall ������ɵĻص�����
	 * @param {bool} bClone �Ƿ��¡��ʽ��true�Ļ���cloneһ�������������������ظ���Ⱦ�����������¼��󶨻ᶪʧ�����Ե����ߵ������¼��󶨶�Ҫ���ڻص������н���
	 * @return {void}
	 * @method parse
	 */
	function fParse(oScale, fCall, bClone){
		var that = this;
		var oBrowser = fGetBrowser();

		// ������һ��������ʱ����һЩ��д����
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
		bNoClone = (oBrowser.name == 'ie' && oScale == document.body) || (oBrowser.name == 'ie' && oBrowser.ver <= 7);// ֱ���滻body��ĳЩ�������Ǳ�ڷ���
		bClone = bNoClone ? false : bClone;
		bClone = (bClone === false) ? false : true;
		var oBody = oScale;
		var oCloneBody = bClone ? oBody.cloneNode(true) : oBody;
		var aTags = ['a', 'i', 'b', 'input', 'button', 'table', 'ul', 'nui'];// ��Ҫ�����ı�ǩ
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
					// ������������Ƚ����ӽڵ�
					for(var i=aQueue.length-1, l=0; i>=l; i--){
						var o = aQueue[i];
						var oConf = fGetConfigByDom(o);
						var oCmp = new Component(oConf);
						oConf._parseMode = true;
						delete oConf._createMode;
						var oHtml = fGetHtml(oConf);
						var sContent = oHtml.html;
						// ��ģ������
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
							// û��ģ������
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
					
					// �������onrender�¼�
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
	 * ��̬����ģ��
	 * @param {string} sName ģ������
	 * @param {function} fCallback ������ɻص�
	 * @param {bool} bSingle trueΪֻ���ص������ģ�棬falseΪ��������ģ�棬Ĭ��false
	 * @return {void}
	 */
	function fLoadTemplate(sName, fCallback, bSingle){
		var sFileName = bSingle ? sName : 'pak';
		if(!nui.config.debug){sFileName += '_min'}
		if(nui._tpls[sName]){ // ����Ѿ�����ģ�����ټ���
			fCallback && fCallback(sName, nui._tpls[sName]);
			return;
		}else{
			nui._loadTemplateCount++;
			fCallback && nui._loadTemplateQueue.push([fCallback, sName]); // ���ص�����������е�����ģ�������ɺ���ִ��
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

					// ���pak.js��û�У�������һ�ε���ģ��
					if(!bSingle && !o){
						aSingle.push(arr);
					}else{
						// ����css
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
	 * ��������dom����
	 */
	function fGetDom(sHtml){
		var oTmpDom = document.createElement('div');
		oTmpDom.innerHTML = sHtml;
		var oDom = oTmpDom.childNodes[0];
		return oDom;
	}

	/**
	 * ��ȡһ�����id
	 */
	function fRandom(){
		return (new Date()).getTime() + parseInt(Math.random()*10000);
	}
	
	/**
	 * ͨ��ģ���ȡhtml
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

		//��id��data-nui
		sHtml = sHtml.replace(/(\s|>)/, ' id="' + oData.id + '"$1');
		
		return {
			id : oData.id,
			className : oCompTpl.cls,
			html : sHtml
		};
		
	}
	
	/**
	 * �ϲ�����
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
	 * �滻ģ�����
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
						
						// ����ȡ���á�ģ�桢Ĭ�ϵ�handler
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
						// ���ݾɷ�ʽ
						if(typeof oValue == 'object'){
							oValue = oValue.getHtml && oValue.getHtml();
						}
						return oValue || '';
					}
				});
	}
	
	/**
	 * ��ȡ���ģ��
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
	 * ��url�л�ȡ��Ϣ
	 */
	function fGetQuery(sKey){
		try{
			return (QUERY.match(new RegExp('(?:^|&)' + sKey + '=([^&]*)(?=$|&)')) || [])[1];
		}catch(e){
			return '';
		}
	}
	
	/**
	 * ��ʼ��
	 * @return {void}
	 * @method init
	 */
	function fInit(){
		//try{
			var sHost = window.location.host;
			var sDomain = fGetDomain(sHost);
			var sUrlPrefix = window.location.href.indexOf('https://') == 0 ? 'https://ssl.mail.126.com/mimg127/' : 'http://mimg.127.net/';
			var oConf = nui.config;

			
			// html5��ǩ
			if(oConf.html5){
				var aTags = ['header', 'footer', 'section', 'aside', 'article', 'nav', 'hgroup', 'figure', 'figcaption', 'details', 'summary', 'time', 'mark', 'ruby', 'rt', 'rp', 'output', 'keygen', 'meter', 'progress', 'command', 'source', 'video', 'audio', 'canvas', 'datalist'];
				for(var i=0, m=aTags.length; i<m; i++){
					document.createElement(aTags[i]);
				}
			}
			
			// �Զ����ǩ
			document.createElement('nui');
			
			// ���nui�����ļ�
			document.write("<style>@font-face{font-family:'nui';src:url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.eot');src:url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.eot?#iefix') format('embedded-opentype'),url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.woff') format('woff'),url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.ttf') format('truetype'),url('" + sUrlPrefix + "p/font/js5/v1/neteasefont-regular.svg#neteasefontregular') format('svg');}</style>");

			// ���CSS
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

			// ������¼�����body��
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
		 * ����Ƿ�֧��base64
		 */
		function _fCheckBase64(fSupport, fNotSupport){
			var oImg = new Image();
			oImg.onload = fSupport;
			oImg.onerror = fNotSupport;
			oImg.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';
		}
	};
	
	/**
	 * ��ȡƤ����Ϣ
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
	 * ��cookie�л�ȡƤ����Ϣ
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
	 * ����cookie�е�Ƥ����Ϣ
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
	 * ��ȡ����Ĭ��Ƥ��
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
	 * ��ȡ��
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
	 * ���¼�
	 * @param {object} o dom����
	 * @param {string} s �¼�����
	 * @param {function} f �¼�������
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
	 * ������¼�
	 * @param {object} o dom����
	 * @param {string} s �¼�����
	 * @param {function} f �¼�������
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
	 * �Ƴ�class
	 * @param {object} oDom dom����
	 * @param {string} sClassName Ҫ�Ƴ���class
	 * @return {string} �Ƴ����class
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
	 * ����class
	 * @param {object} oDom dom����
	 * @param {string} sClassName Ҫ���ӵ�class
	 * @return {string} ���Ӻ��class
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