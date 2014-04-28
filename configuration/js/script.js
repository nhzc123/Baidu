

(function(){
	var oa = {
		go				: fContentGo,
		init			: fInit,				// ��ʼ��
		resize			: fResize,				// ���¼������ߴ�
		find 			: fFind,				// ͨ��data-type�����ҽڵ�
		doScripts		: fDoScripts,			// ִ��ͨ��innerHTML����Ĵ����е�script
		bind			: fBind,				// ѭ���а��¼�
		fold			: fFold,				// �۵�չ��
		tab				: fTab,					// ѡ�
		addEvent		: fAddEvent,			// �����¼�����
		removeEvent		: fRemoveEvent,			// ɾ���¼�����

		replaceContent	: fContentReplace,		// �滻����������
		$				: $						// ͨ��id���dom����
	};
	
	// ������
	oa.content = {
		go				: fContentGo,
		replace			: fContentReplace,		// �滻����
		createMaxIcon	: fContentCreateMaxIcon,// ���ͼ��
		toggleView		: fContentToggleView,	// ����󻯡�������ͼ���л�
		maxView			: fContentMaxView,		// ���
		resetView		: fContentResetView	// ����
	};
	
	// ����
	oa.msgbox = {
		show : function(oConf){
			return nui.create('msgbox', oConf, true);
		}
	};
	
	// ���ݸ���
	oa.contentLayer = {
		show : function(oConf){
			oConf = oConf || {};
			if(oConf.url){
				oConf.text = '<iframe src="' + oConf.url + '"></iframe>';
			}else{
				oConf.text = '<div class="contentLayer-inner">' + oConf.text + '</div>';
			}
			oConf.params = 'hasClose';
			oConf.className = 'contentLayer';
			oConf.onrender = function(oConf){
				var oLayer = this;
				nui.create('_mask', {
					render:true,
					id:'contentLayer-mask',
					onrender : function(){
						this.getDom().onclick=function(){
							oLayer.destroy();
						}
					}
				});
			};
			oConf.ondestroy = function(){
				nui.get('contentLayer-mask').destroy();
			};
			return nui.create('layer', oConf, true);
		}
	};


	/**
	 * ִ�ж�̬�����html�ڵĽű�
	 * @param src
	 */
	function fDoScripts(src){
		try{
		src.replace(/<script[^>]*?>((?:.|\r|\n)+?)<\/script>/g,function(){
			var oScript = document.createElement("SCRIPT");
			oScript.text = arguments[1];
			document.body.appendChild(oScript);
		});}catch(e){}
		
		return src;
	}

	/**
	 * ͨ��data-type������Ԫ��
	 * @param aDoms
	 * @param sType
	 * @returns
	 */
	function fFind(aDoms,sType){
		return fFindDomByData(aDoms,"type",sType);
	}

	/**
	 * ͨ��data-xxx������Ԫ��
	 * @param aDoms
	 * @param sName
	 * @param sValue
	 * @returns
	 */
	function fFindDomByData(aDoms,sName,sValue){
		for(var i=0,l=aDoms.length;i<l;i++){
			if(aDoms[i].getAttribute("data-" + sName)==sValue){
				return aDoms[i];
			}
		}
	}
	
	function fContentGo(sUrl){
		var tmp = $("dContent").getElementsByTagName('iframe');
		var oIframe;
		if(tmp.length > 0){
			oIframe = tmp[0];
		}else{
			oIframe = document.createElement('iframe');
			$("dContent").appendChild(oIframe);
		}
		oIframe.src = sUrl;
	}
	
	/**
	 * ���������ͼ��
	 */
	function fContentCreateMaxIcon(){
		
		var oContent = $("dContent");
		var oMaxContent = $("dMaxContent") || document.createElement("B");
		oMaxContent.className = "ico ico-maxContent";
		oMaxContent.id = "dMaxContent";
		oMaxContent.onclick = function(){
			oa.content.toggleView();
		};
		
		setTimeout(function(){
			oMaxContent.style.left = oContent.offsetLeft + "px";
			oMaxContent.style.top = oContent.offsetTop + "px";
		},0);
		
		oContent.parentNode.appendChild(oMaxContent);
	}

	/**
	 * �������л����/����ģʽ
	 */
	function fContentToggleView(){
		var oContent = $("dContent");
		if(oContent.className.match(/-max/)){
			this.resetView();
		}else{
			this.maxView();
		}
	}
	
	/**
	 * �������л������ģʽ
	 */
	function fContentMaxView(){
		var oContent = $("dContent");
		var oMaxContent = $("dMaxContent");
		oContent.className += " content-max";
		oMaxContent.className += " ico-maxContent-max";
		document.documentElement.style.overflow = "hidden";
		if($("popup-layer")){
			$("popup-layer").style.top ="63px";
		};
		
	}
	
	/**
	 * �������ָ�����ģʽ
	 */
	function fContentResetView(){
		var oContent = $("dContent");
		var oMaxContent = $("dMaxContent");
		oContent.className = oContent.className.replace(/\scontent-max/g,"");
		oMaxContent.className = oMaxContent.className.replace(/\sico-maxContent-max/g,"");
		document.documentElement.style.overflow = "auto";
		
		oContent.style.display = "none";
		setTimeout(function(){
			oContent.style.display = "block";
			if($("popup-layer")){
				$("popup-layer").style.top ="165px";
			};
			
		},0);

	}
	
	/**
	 * �滻����������
	 * @param sHTML
	 */
	function fContentReplace(sHTML){
		var o = $("dContent");
		oa.tmpContent = o.innerHTML;
		o.innerHTML = sHTML;
		oa.doScripts(sHTML);
		o.style.display = "block";
		oa.resize();
	}
	

	/**
	 * ��ʼ��
	 */
	function fInit(){
		var that = this;
		that.resize();
		that.content.createMaxIcon();
		
		// ͷͼ�ֻ�
		var aBanners = ['bg1','bg2','bg3','bg4','bg5'];
		
		var oUserInfo = $('dUserInfo');
		var nRandom = Math.floor(aBanners.length * Math.random());
		oUserInfo.className += ' userInfo-' + aBanners[nRandom];
	}

	/**
	 * �������ý���ߴ�
	 */
	function fResize(){
		var oHeader = $("dHeader");
		var oUserInfo = $("dUserInfo");
		var oCont = $("dContent");
		var nHeight = document.documentElement.clientHeight - oHeader.clientHeight - oUserInfo.clientHeight - 40;
		var nSideHeight = $("dNavs").clientHeight;
		var nMin = 200;
		
		if(nSideHeight > nHeight){
			oCont.style.height = "auto";

			oCont.style.height = (nSideHeight > oCont.clientHeight ? nSideHeight + "px" : "auto");
			oCont.style.overflow = "visible";
		}else{	
			oCont.style.height = (nHeight > nMin ? nHeight : nMin) + "px";
			oCont.style.overflow = "auto";
		}
	}
	
	
	/**
	 * �����¼�����
	 * @param o
	 * @param s
	 * @param f
	 */
	function fAddEvent(o,s,f){
		try{
			o.addEventListener(s,f,false);
		}catch(e){
			o.attachEvent("on"+s,f);
		}
	}
	
	/**
	 * �Ƴ��¼�����
	 * @param o
	 * @param s
	 * @param f
	 */
	function fRemoveEvent(o,s,f){
		try{
			o.removeEventListener(s,f,false);
		}catch(e){
			o.detachEvent("on"+s,f);
		}
	}
	
	/**
	 * 
	 */
	function fBind(f,a){
		return function(){f(a);};
	}
	
	/**
	 * �۵�չ��
	 * @param src
	 * @param sPre
	 */
	function fFold(src,sPre,bFoldOther,sToggleMode){
		
		var oDom,oParentDom;
		sToggleMode = sToggleMode || "auto";
		
		if(typeof(src) == "string"){
			oDom = $(src);
		}else{
			oDom = src;
		}

		oParentDom = oDom.parentNode;
		
		if(sToggleMode == "auto"){
			if(bFoldOther){
				var tmp = oParentDom.childNodes;
				
				for(var i=0,l=tmp.length; i<l; i++){
					if(tmp[i].nodeType == 1 && tmp[i] != oDom){
						_fRemoveUnfold(tmp[i]);
					}
				}
			}
			
			var bFold = !oDom.className.match(new RegExp(sPre+"-unfold"));
			if(bFold){
				_fAddUnfold(oDom);
			}else{
				_fRemoveUnfold(oDom);
			}
		}else if(sToggleMode == "unfold"){
			_fRemoveUnfold(oDom);
			_fAddUnfold(oDom);
		}else if(sToggleMode == "fold"){
			_fRemoveUnfold(oDom);
		}
		
		
		
		function _fAddUnfold(obj){
			obj.className += " " + sPre + "-unfold";
		}
		
		function _fRemoveUnfold(obj){
			obj.className = obj.className.replace(" " + sPre + "-unfold","");
		}
		
	}
	
	/**
	 * ѡ��л�
	 * @param src
	 * @param nIdx
	 */
	function fTab(src,nIdx){
		var oTabview;
		if(typeof(src) == "object"){
			oTabview = src;
		}else{
			oTabview = $(src);
		}
		oTabview.className = oTabview.className.replace(/(tabview\-)\d+/,"$1"+nIdx);
	}
	
	/**
	 * ͨ��ID���DOM����
	 * @param sID
	 */
	function $(sID){
		return document.getElementById(sID);
	}
	
	
	window.oa = window.OA = oa;
})();

(function(){
	oa.addEvent(window,"load",function(){
		oa.addEvent(document.getElementById("dNavs"),"click",oa.resize);
		oa.addEvent(document.getElementById("dContent"),"click",oa.resize);
		oa.init();
	});
	oa.addEvent(window,"resize",oa.resize);
})();

var fFold = oa.fold;
var fTab = oa.tab;
var fAddEvent = oa.addEvent;

