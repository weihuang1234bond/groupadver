/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : bibilm

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-06-01 12:50:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zyads_administrator`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_administrator`;
CREATE TABLE `zyads_administrator` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL,
  `userinfo` varchar(200) NOT NULL,
  `loginnum` mediumint(8) NOT NULL DEFAULT '0',
  `logintime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('y','n') NOT NULL,
  `rolesid` mediumint(9) NOT NULL,
  `loginip` char(15) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_administrator
-- ----------------------------
INSERT INTO `zyads_administrator` VALUES ('1', 'admin', '69c493d2955cf44753caee56d9b74013', '', '10', '2016-06-01 12:45:32', 'y', '1', '122.242.69.118', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `zyads_ads`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_ads`;
CREATE TABLE `zyads_ads` (
  `adsid` mediumint(9) NOT NULL AUTO_INCREMENT,
  `adname` varchar(255) DEFAULT NULL,
  `planid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `adinfo` varchar(100) DEFAULT NULL,
  `adtplid` mediumint(8) NOT NULL,
  `files` varchar(10) NOT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `showtype` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `alt` varchar(255) DEFAULT NULL,
  `url` text NOT NULL,
  `width` smallint(6) NOT NULL DEFAULT '0',
  `height` smallint(6) NOT NULL DEFAULT '0',
  `specsid` smallint(6) NOT NULL,
  `headline` varchar(40) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `dispurl` varchar(255) DEFAULT NULL,
  `htmlfile` varchar(255) DEFAULT NULL,
  `htmlcode` mediumtext,
  `addtime` datetime NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `denyinfo` varchar(255) DEFAULT NULL,
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `mark` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `zlink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `htmlcontrol` mediumtext,
  PRIMARY KEY (`adsid`),
  KEY `planid` (`planid`),
  KEY `status` (`status`),
  KEY `width` (`width`),
  KEY `height` (`height`),
  KEY `adstypeid` (`adtplid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_ads
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_adstyle`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_adstyle`;
CREATE TABLE `zyads_adstyle` (
  `styleid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tplid` varchar(255) NOT NULL,
  `stylename` varchar(255) NOT NULL,
  `htmlcontrol` mediumtext,
  `specs` mediumtext,
  `viewjs` mediumtext,
  `iframejs` mediumtext,
  `adnum` tinyint(3) NOT NULL,
  `description` varchar(20) DEFAULT NULL,
  `status` enum('y','n') NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`styleid`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_adstyle
-- ----------------------------
INSERT INTO `zyads_adstyle` VALUES ('1', '7', 'Banner默认', '', '1000x90,960x90,960x60,950x90,760x90,728x90,640x60,640x90,640x100,640x96,580x90,500x200,480x160,468x60,460x60,360x300,336x280,300x100,300x250,300x300,250x200,250x250,200x200,160x600,125x125,120x120,120x600,120x240,120x270', '', 'var ext= ads[0].imageurl.substr(ads[0].imageurl.lastIndexOf(\".\")).toLowerCase();\r\nif(ext==\'.swf\'){\r\n	var str = \'<div id=\"v_ads\" style=\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\" style=\"display:block;width:\'+config.width+\'px;height:\'+config.height+\'px;\" id=\"_z_add_s_\"></a></div><embed src=\"\'+ads[0].imageurl+\'\" type=\"application/x-shockwave-flash\" height=\"\'+config.height+\'\" width=\"\'+config.width+\'\"   name=\"Zad\" quality=\"high\" wmode=\"opaque\"   allowscriptaccess=\"always\" >\'; \r\n	\r\n} else if(ext==\'.html\'){\r\n	var str = \'<div style=\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\" style=\"display:block;width:\'+config.width+\'px;height:\'+ config.height+\'px;\"></a></div><iframe src=\"\' + ads[0].imageurl + \'\" width=\"\' + config.width + \'\" height=\"\' + config.height + \'\"  marginheight=\"0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\"></iframe>\';\r\n}\r\n\r\nelse{\r\n	 var str = \"<a target=\'_blank\' href=\"+ads[0].url+\" id=\'v_ads\'><img src=\'\"+ads[0].imageurl+\"\' border=\'0\' width=\'\"+config.width+\"\' height=\'\"+config.height+\"\'></a>\";\r\n}\r\ndocument.writeln(str);\r\npvid.aid.push(ads[0].adsid); \r\npvid.pid.push(ads[0].planid);\r\npvstas(pvid);', '1', '', 'y', '2014-06-21 16:51:23');
INSERT INTO `zyads_adstyle` VALUES ('2', '3', '默认', '', '1000x90,960x90,960x60,950x90,760x130,760x90,728x90,640x60,640x90,640x100,640x960,640x96,600x500,580x90,500x200,480x160,480x75,468x60,460x60,360x300,336x280,320x75,320x480,320x50,300x100,300x50,300x250,300x300,264x160,256x58,250x200,250x250,240x38,240x180,230x300,200x200,180x150,160x600,125x125,120x120,120x600,120x240,120x270', '', 'var ext= ads[0].imageurl.substr(ads[0].imageurl.lastIndexOf(\".\")).toLowerCase();\r\nif(ext!=\'.swf\'){\r\n	var str = \"<a target=\'_blank\' href=\"+ads[0].url+\" id=\'v_ads\'><img src=\'\"+ads[0].imageurl+\"\' border=\'0\' width=\'\"+config.width+\"\' height=\'\"+config.height+\"\'></a>\";\r\n\r\n} else if(ext==\'.html\'){\r\n	var str = \'<div style=\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\" style=\"display:block;width:\'+config.width+\'px;height:\'+ config.height+\'px;\"></a></div><iframe src=\"\' + ads[0].imageurl + \'\" width=\"\' + config.width + \'\" height=\"\' + config.height + \'\"  marginheight=\"0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\"></iframe>\';\r\n}\r\n\r\nelse{\r\n	var str = \'<div id=\"v_ads\" style=\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\" style=\"display:block;width:\'+config.width+\'px;height:\'+config.height+\'px;\" id=\"_z_add_s_\"></a></div><embed src=\"\'+ads[0].imageurl+\'\" type=\"application/x-shockwave-flash\" height=\"\'+config.height+\'\" width=\"\'+config.width+\'\"   name=\"Zad\" quality=\"high\" wmode=\"opaque\"   allowscriptaccess=\"always\" >\';  \r\n\r\n} \r\ndocument.writeln(str);\r\n/*\r\n* RUN STATS\r\n*/\r\npvid.aid.push(ads[0].adsid); \r\npvid.pid.push(ads[0].planid);\r\npvstas(pvid);', '1', '', 'y', '2014-06-23 13:55:20');
INSERT INTO `zyads_adstyle` VALUES ('3', '11', '默认', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', null, 'config.tag_color = \"#ad68d7,#71cdc9,#49c081,#4792ff,#f67abe,#6cc3df,#d381e2,#ffbb39,#a4de9e,#cf8ef6,#79bebb,#5feda2,#76a8f0,#f490c7,#7cd7f4,#e9a1f6,#fbd010,#c2f5bc\";\r\n', '0', '', 'y', '2014-06-23 20:52:27');
INSERT INTO `zyads_adstyle` VALUES ('4', '11', '效果1', '', '950x90,760x90,728x90,468x60,336x280,300x250,250x250,200x200,160x600,120x240,120x600', '', 'config.tag_color = \"#0048BE,#91009E,#CC3333,#00839A,#542FB0,#FF9900,#0061d4,#b000bb,#de4646,#00a3b8,#7041ca,#ffb700\";', '0', '', 'y', '2014-06-24 14:03:03');
INSERT INTO `zyads_adstyle` VALUES ('14', '11', '效果2', '', '950x90,760x90,728x90,468x60,336x280,300x250,250x250,200x200,160x600,120x240,120x600', '', 'config.tag_color = \"#ad68d7,#71cdc9,#49c081,#4792ff,#f67abe,#6cc3df,#d381e2,#ffbb39,#a4de9e,#cf8ef6,#79bebb,#5feda2,#76a8f0,#f490c7,#7cd7f4,#e9a1f6,#fbd010,#c2f5bc\";\r\n', '0', '', 'y', '2014-09-19 13:23:29');
INSERT INTO `zyads_adstyle` VALUES ('26', '12', '居中插屏', '', '230x300', 'var mw =document.body.offsetWidth-60;\r\nif(mw<zone.width){\r\nzone.width = mw;\r\n}\r\nvar i = \'<iframe src=\"\' + ifsrc + \'\" width=\"\'+zone.width+\'\" height=\"\' + zone.height + \'\" marginheight=\"0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\"></iframe>\', o = document.createElement(\"div\");\r\nvar arand=Math.floor(Math.random()*100000);\r\no.id = arand;\r\no.style.cssText = \"position: fixed;z-index: 2147483646;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color: rgba(0,0,0,.5);box-shadow: 0 -1px 1px rgba(0,0,0,.10);\";\r\n \r\no.innerHTML = \"<div style=\'position: relative;display:inline-block; zoom:1; *display:inline; vertical-align:middle; text-align:left;width:\"+zone.width+\"px;height:\"+zone.height+\"px\'><img src=\'\"+domain.imgurl+\"/images/close.png\' style=\'position:absolute;top:18px;right:18px;cursor:pointer;width;40px;height:40px;z-index:2147483647\' id=\'c\"+arand+\"\'>\"+i+\"</div><div style=\'height:100%; overflow:hidden; display:inline-block; width:1px; overflow:hidden; margin-left:-1px; zoom:1; *display:inline; *margin-top:-1px; _margin-top:0; vertical-align:middle;\'></div>\";\r\ndocument.body.appendChild(o);  \r\nfunction close(){  \r\n	if(o) o.style.display=\'none\';\r\n}\r\n__A( __G(\'c\'+arand), \"click\",close);', 'var ext= ads[0].imageurl.substr(ads[0].imageurl.lastIndexOf(\".\")).toLowerCase();\r\nif(ext!=\'.swf\'){\r\n	var str = \"<a target=\'_blank\' href=\"+ads[0].url+\" id=\'v_ads\'><img src=\'\"+ads[0].imageurl+\"\' border=\'0\' width=\'100%\' height=\'\"+config.height+\"\'></a>\";\r\n}else{\r\n	var str = \'<div id=\"v_ads\" style=\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\" style=\"display:block;width:100%;height:\'+config.height+\'px;\" id=\"_z_add_s_\"></a></div><embed src=\"\'+ads[0].imageurl+\'\" type=\"application/x-shockwave-flash\" height=\"\'+config.height+\'\" width=\"100%\"   name=\"Zad\" quality=\"high\" wmode=\"opaque\"   allowscriptaccess=\"always\" >\';  \r\n}\r\ndocument.writeln(str);\r\n/*\r\n* RUN STATS\r\n*/\r\npvid.aid.push(ads[0].adsid); \r\npvid.pid.push(ads[0].planid);\r\npvstas(pvid);', '1', '', 'y', '2014-09-19 13:48:27');
INSERT INTO `zyads_adstyle` VALUES ('13', '17', '直接跳转', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:27:\"弹窗间隔时间（分）\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:16:\"androidrecpmtime\";}s:19:\"htmlcontrol_checked\";a:1:{i:0;s:7:\"checked\";}s:17:\"htmlcontrol_value\";a:1:{i:0;s:1:\"5\";}}', null, 'if(__B.android){\r\nif(!__Gc(\'androidrecpmtime\')){\r\n		var exptime = zone.htmlcontrol.androidrecpmtime*1000*60;\r\n		 __Sc(\"androidrecpmtime\",1,{expires:exptime });\r\n		location.href = ads[0].url; \r\n		pvid.aid.push(ads[0].adsid);\r\n		pvid.pid.push(ads[0].planid);\r\n		pvstas(pvid);\r\n	}\r\n}', '', '1', '', 'y', '2014-09-18 15:10:33');
INSERT INTO `zyads_adstyle` VALUES ('6', '13', '纯标题', '', '960x60,960x90,760x90,728x90,640x60,640x96,580x90,468x60,460x60,360x300,336x280,300x250,250x200,250x250,200x200,160x600,120x270,120x600,120x120', '', 'var show = {};\r\nshow.init = function() {\r\n     var w = 180,h=30; \r\n	 if(config.width<340){ \r\n		w = 130;\r\n	 };\r\n	 if(config.height<h) {\r\n		h = config.height;\r\n		 \r\n	 } ;\r\n	 if(config.width<w){ \r\n		w = config.width \r\n	 }; \r\n    show.minWidth = w;\r\n	show.minHeight = h; \r\n    show.row = Math.floor(config.height / show.minHeight);  \r\n    show.col = Math.floor(config.width /  show.minWidth);\r\n    show.putda();\r\n}\r\nshow.putda = function (){\r\n	css = \"<style type=\'text/css\'>.ad{border:#\"+config.border+\" 1px solid;position:relative; background:#\"+config.background+\";width:\"+(config.width-2)+\"px;height:\"+(config.height-2)+\"px; ;overflow:hidden;}.tables{width:100%;height:100%;}.unit{width:\"+(100/show.col)+\"%;text-align:left;1vertical-align:top;padding:0 5px;}.headline{  height: 22px;overflow: hidden; font-size:12px;line-height:22px;font-weight:normal;}.headline a{color:#\"+config.headline+\";text-decoration:none;}.headline:hover{text-decoration:none;}.tdb{width:100%;height:100%;}.div_headline{ height: 22px;overflow: hidden; }.num{width: 14px;display: block;float: left;height: 14px;text-align: center;background-color: #858585;color: #ffffff;line-height: 14px;font-size: 12px;margin-top: 3px;margin-right: 3px;}.i_num{background-color: #F2405B;}</style>\";\r\n	document.write(css);\r\n	var html=\'<div class=\"ad\" ><table class=\"tables\" cellpadding=\"0\" cellspacing=\"2\" >\';\r\n	var  s =  tn =  an = 1,acs=\'\' ;\r\n	for (k = 0, l = show.row * show.col; k < l; k++) {\r\n		 if (!ads[k]) {\r\n            var n = Math.floor(Math.random() * ads.length + 1) - 1;\r\n            ads[k] = ads[n];\r\n        }\r\n		if(an==tn){\r\n			acs = \"i_num\";\r\n		}else {\r\n			acs = \"\";\r\n		}\r\n		html +=\'<td class=\"unit\"><div class=\"headline\"><div class=\"num \'+acs+\'\">\'+tn+\'</div><a href=\"\'+ads[k].url+\'\" target=\"_blank\">\'+ads[k].headline+\'</a></div></td>\';\r\n		if (s %  show.col == 0) {\r\n				tn ++;\r\n				an ++;\r\n				tn = an;\r\n				html +=\"</tr>\";\r\n		}else {\r\n			tn = tn + show.row;\r\n		}\r\n		s++;\r\n		pvid.aid.push(ads[k].adsid);\r\n		pvid.pid.push(ads[k].planid);\r\n	}\r\n	html +=\'</table></div>\';\r\n	document.write(html);\r\n}\r\nshow.init();\r\npvstas(pvid);', '0', '', 'y', '2014-06-24 19:21:28');
INSERT INTO `zyads_adstyle` VALUES ('7', '8', '默认', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:27:\"弹窗间隔时间（分）\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:9:\"recpmtime\";}s:19:\"htmlcontrol_checked\";a:1:{i:0;s:7:\"checked\";}s:17:\"htmlcontrol_value\";a:1:{i:0;s:1:\"5\";}}', null, 'function pop(e){\r\n	var t = window, n = document, r = \"width=\" + screen.width + \",height=\" + screen.height + \",toolbar=1,location=1,titlebar=1,menubar=1,scrollbars=1,resizable=1,directories=1,status=1\", i = parseInt(Math.random() * 1e4).toString(), s = 0, o = function() {\r\n                if (s)\r\n                    return;\r\n                var t;\r\n                __B.sg ? (t = window.open(\"\"), t.location.href = e) : t = window.open(e, \"_blank\", r + \",left=0,top=0\"), t && (s = 1)\r\n            }, u = function() {\r\n                var t = parseInt(__B.ver);\r\n                if (t < 30 && t>0) {\r\n                    var n = document.createElement(\"a\");\r\n                    n.setAttribute(\"href\", e), n.setAttribute(\"style\", \"display:none;\");\r\n                    var r = document.createEvent(\"MouseEvents\");\r\n                    r.initMouseEvent(\"click\", !1, !1, window, 0, 0, 0, 0, 0, !0, !1, !1, !1, 0, null), n.dispatchEvent(r)\r\n                } else\r\n                    __A(document, \"click\", o)\r\n            }, a = function() {\r\n                if (s)\r\n                    return null;\r\n                try {\r\n                    setTimeout(function() {\r\n                        document.getElementById(\"DOMScript_\" + i).DOM.Script.open(e, \"_blank\", r), t.focus(), s = 1\r\n                    }, 200)\r\n                } catch (n) {\r\n                }\r\n            }, f = function() {\r\n                if (s)\r\n                    return null;\r\n                try {\r\n                    s = 1, document.getElementById(\"launchURL_\" + i).launchURL(e)\r\n                } catch (t) {\r\n                    s = 0, __A(document, \"click\", o)\r\n                }\r\n            };\r\n            \r\n			\r\n			if(__B.ie){\r\n				if(!document.getElementById(\"launchURL_\" + i)){\r\n					n.write(\"<object id=\'launchURL_\" + i + \"\' width=0 height=0 classid=CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6></object>\");\r\n				}\r\n				if(!document.getElementById(\"DOMScript_\" + i)){\r\n					n.write(\"<object id=\'DOMScript_\" + i + \"\'  style=position:absolute;left:1px;top:1px;width:1px;height:1px; classid=clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A></object>\");\r\n				}\r\n			}\r\n\r\n            try {\r\n                var l = window.open(e, \"_blank\", r + \",left=0,top=0\")\r\n            } catch (c) {\r\n                l = \"\"\r\n            }\r\n            l ? __B.chrome ? u() : s = 1 : __B.safari ? u() : __B.ie && !__B.sg ? __B.ver == \"6.0\" ? a() : f() : __A(document, \"click\", o);\r\n}\r\nvar popreid = zone.zoneid;\r\nif(!__Gc(zone.zoneid)){\r\n pop(ads[0].url  );\r\n var exptime = zone.htmlcontrol.recpmtime*1000*60;\r\n __Sc(zone.zoneid,1,{expires:exptime });\r\n}\r\npvid.aid.push(ads[0].adsid);\r\npvid.pid.push(ads[0].planid);\r\npvstas(pvid);', '', '1', '', 'y', '2014-06-25 13:39:32');
INSERT INTO `zyads_adstyle` VALUES ('8', '13', '标题加描述', '', '960x60,960x90,760x90,728x90,640x60,640x96,580x90,468x60,460x60,360x300,336x280,300x250,250x200,250x250,200x200,160x600,120x270,120x600,120x120', '', 'var show = {};\r\nshow.init = function() {\r\n    var w = 220,h=80;\r\n	show.wh=45;\r\n	show.vim = \'block\';\r\n	if(config.height<h) {\r\n		h = config.height;\r\n		show.wh = show.wh/2;\r\n	 } ;\r\n	if(config.width<w){ \r\n		w = config.width \r\n	 };\r\n    show.minWidth = w;\r\n	show.minHeight = h;\r\n	if(config.control){\r\n		show.vim = \'none\';\r\n	}\r\n	 \r\n    show.row = Math.floor(config.height / show.minHeight);  \r\n    show.col = Math.floor(config.width /  show.minWidth);\r\n    show.putda();\r\n	\r\n}\r\nshow.putda = function (){\r\n	css = \"<style type=\'text/css\'>.ad{border:#\"+config.border+\" 1px solid;position:relative; background:#\"+config.background+\";width:\"+(config.width-2)+\"px;height:\"+(config.height-2)+\"px; ;overflow:hidden;}.tables{width:100%;height:100%;}.unit{width:\"+(100/show.col)+\"%;text-align:left;1vertical-align:top;padding:0 5px;}.headline{color:#0000FF;font-weight:bold;}.headline{font-size:14px;text-decoration:underline;line-height:22px;font-weight:normal;color:#\"+config.headline+\";}.headline:hover{text-decoration:none;}.description{font-size:12px;line-height:18px;color:#\"+config.description+\";text-decoration:none;}.dispurl{font-size:10px;line-height:11px;color:#\"+config.dispurl+\";text-decoration:none;}.tdb{width:100%;height:100%;} .div_headline{ height: 22px;overflow: hidden; }.div_description{ height: 38px;overflow: hidden; }.icon{display:block;float:left;margin:1px 2px 0 0;width:\"+show.wh+\"px;height:\"+show.wh+\"px;border:1px solid #666666; display:\"+show.vim+\" }</style>\";\r\n	document.write(css);\r\n	var html=\'<div class=\"ad\" ><table class=\"tables\" cellpadding=\"0\" cellspacing=\"2\" >\';\r\n	var  s =  1;\r\n	for (k = 0, l = show.row * show.col; k < l; k++) {\r\n\r\n		 if (!ads[k]) {\r\n            var n = Math.floor(Math.random() * ads.length + 1) - 1;\r\n            ads[k] = ads[n];\r\n        }\r\n		\r\n		html +=\'<td class=\"unit\"><div class=\"div_headline\"><a href=\"\'+ads[k].url+\'\" target=\"_blank\" class=\"headline\">\'+ads[k].headline+\'</a></div><div> <div class=\"div_description\"><a href=\"\'+ads[k].url+\'\" target=\"_blank\" class=\"description\">\'+ads[k].description+\'</a></div><div><a href=\"\'+ads[k].url+\'\" target=\"_blank\" class=\"dispurl\">\'+ads[k].dispurl+\'</a></div></div></td>\';\r\n  \r\n		if (s %  show.col == 0) {\r\n				html +=\"</tr>\";\r\n		}\r\n		s++;\r\n		pvid.aid.push(ads[k].adsid);\r\n		pvid.pid.push(ads[k].planid);\r\n	}\r\n	html +=\'</table></div>\';\r\n	document.write(html);\r\n}\r\nshow.init();\r\npvstas(pvid);', '0', '', 'y', '2014-06-26 17:12:16');
INSERT INTO `zyads_adstyle` VALUES ('9', '13', '标题、描述、图标', '', '960x60,960x90,760x90,728x90,640x60,640x96,580x90,468x60,460x60,360x300,336x280,300x250,250x200,250x250,200x200,160x600,120x270,120x600,120x120', '', 'var show = {};\r\nshow.init = function() {\r\n    var w = 220,h=80;\r\n	show.wh=45;\r\n	show.vim = \'block\';\r\n	if(config.height<h) {\r\n		h = config.height;\r\n		show.wh = show.wh/2;\r\n	 } ;\r\n	if(config.width<w){ \r\n		w = config.width \r\n	 };\r\n    show.minWidth = w;\r\n	show.minHeight = h;\r\n	if(config.control){\r\n		show.vim = \'none\';\r\n	}\r\n	 \r\n    show.row = Math.floor(config.height / show.minHeight);  \r\n    show.col = Math.floor(config.width /  show.minWidth);\r\n    show.putda();\r\n	\r\n}\r\nshow.putda = function (){\r\n	css = \"<style type=\'text/css\'>.ad{border:#\"+config.border+\" 1px solid;position:relative; background:#\"+config.background+\";width:\"+(config.width-2)+\"px;height:\"+(config.height-2)+\"px; ;overflow:hidden;}.tables{width:100%;height:100%;}.unit{width:\"+(100/show.col)+\"%;text-align:left;1vertical-align:top;padding:0 5px;}.headline{color:#0000FF;font-weight:bold;}.headline{font-size:14px;text-decoration:underline;line-height:22px;font-weight:normal;color:#\"+config.headline+\";}.headline:hover{text-decoration:none;}.description{font-size:12px;line-height:18px;color:#\"+config.description+\";text-decoration:none;}.dispurl{font-size:10px;line-height:11px;color:#\"+config.dispurl+\";text-decoration:none;}.tdb{width:100%;height:100%;} .div_headline{ height: 22px;overflow: hidden; }.div_description{ height: 38px;overflow: hidden; }.icon{display:block;float:left;margin:1px 2px 0 0;width:\"+show.wh+\"px;height:\"+show.wh+\"px;border:1px solid #666666; display:\"+show.vim+\" }</style>\";\r\n	document.write(css);\r\n	var html=\'<div class=\"ad\" ><table class=\"tables\" cellpadding=\"0\" cellspacing=\"2\" >\';\r\n	var  s =  1;\r\n	for (k = 0, l = show.row * show.col; k < l; k++) {\r\n\r\n		 if (!ads[k]) {\r\n            var n = Math.floor(Math.random() * ads.length + 1) - 1;\r\n            ads[k] = ads[n];\r\n        }\r\n		\r\n		html +=\'<td class=\"unit\"><div class=\"div_headline\"><a href=\"\'+ads[k].url+\'\" target=\"_blank\" class=\"headline\">\'+ads[k].headline+\'</a></div><div><a href=\"\'+ads[k].url+\'\" ><img src=\"\'+ads[k].imageurl+\'\" class=\"icon\"></a><div class=\"div_description\"><a href=\"\'+ads[k].url+\'\" target=\"_blank\" class=\"description\">\'+ads[k].description+\'</a></div><div><a href=\"\'+ads[k].url+\'\" target=\"_blank\" class=\"dispurl\">\'+ads[k].dispurl+\'</a></div></div></td>\';\r\n  \r\n		if (s %  show.col == 0) {\r\n				html +=\"</tr>\";\r\n		}\r\n		s++;\r\n		pvid.aid.push(ads[k].adsid);\r\n		pvid.pid.push(ads[k].planid);\r\n	}\r\n	html +=\'</table></div>\';\r\n	document.write(html);\r\n}\r\nshow.init();\r\npvstas(pvid);', '0', '', 'y', '2014-06-26 17:15:01');
INSERT INTO `zyads_adstyle` VALUES ('10', '4', '默认', '', '760x90,760x130,728x90,468x60,336x280,300x250,250x250,200x200,160x600,120x600', '', 'var show = {};\r\nshow.init = function() {\r\n    var w = h = 125;\r\n	if(config.height<h) h = config.height ;\r\n	if(config.width<w) w = config.width ;\r\n    show.minWidth = w;\r\n	show.minHeight = h;\r\n    show.row = Math.floor(config.height / show.minHeight);  \r\n    show.col = Math.floor(config.width /  show.minWidth);\r\n    show.putda();\r\n}\r\nshow.putda = function (){\r\n	css = \"<style type=\'text/css\'>.ad{position:relative; background:#\"+config.background+\";border: 1px solid #\"+config.background+\";width:\"+(config.width-2)+\"px;height:\"+(config.height-2)+\"px; ;overflow:hidden;}.tables{width:100%;height:100%;}.unit{width:\"+config.width+\"%;text-align:left;1vertical-align:top;padding:0 5px;}.headline{color:#0000FF;font-weight:bold;}.headline{font-size:14px;text-decoration:underline;line-height:22px;font-weight:normal;color:#\"+config.headline+\";}.headline:hover{text-decoration:none;}.description{font-size:12px;line-height:18px;color:#\"+config.description+\";text-decoration:none;}.dispurl{font-size:10px;line-height:11px;color:#\"+config.dispurl+\";text-decoration:none;}.tdb{width:100%;height:100%;}.unit4{text-align: center;padding:0px;vertical-align: middle;width:\"+(100/show.col)+\"%; border:#\"+config.border+\" 1px solid;padding-top:3px }.div_headline_a4{text-align:center;height: 22px;overflow: hidden;padding-left: 5px;padding-right: 5px;}.img{border:0; width:\"+(config.width/show.col-show.col*2-8)+\"px;height:\"+(show.minHeight-31)+\"px;}</style>\";\r\n	document.write(css);\r\n	var html=\'<div class=\"ad\" ><table class=\"tables\" cellpadding=\"0\" cellspacing=\"2\" >\';\r\n	var  s =  1;\r\n	for (k = 0, l = show.row * show.col; k < l; k++) {\r\n\r\n		 if (!ads[k]) {\r\n            var n = Math.floor(Math.random() * ads.length + 1) - 1;\r\n            ads[k] = ads[n];\r\n        }\r\n		\r\n		html +=\'<td class=\"unit unit4\"><table cellpadding=\"0\"cellspacing=\"0\" align=\"center\"><tr><td><div style=\"text-align:center\"><a  href=\"\'+ads[k].url+\'\" target=\"_blank\"><img src=\"\'+ads[k].imageurl+\'\"   class=\"img\"></a></div> <div  class=\"div_headline_a4\"><a href=\"\'+ads[k].url+\'\" target=\"_blank\" class=\"headline\" style=\"text-decoration:none;\">\'+ads[k].headline+\'</a></div></td></tr></table> </td>\';\r\n  \r\n		if (s %  show.col == 0) {\r\n				html +=\"</tr>\";\r\n		}\r\n		pvid.aid.push(ads[k].adsid);\r\n		pvid.pid.push(ads[k].planid);\r\n		s++;\r\n	}\r\n	html +=\'</table></div>\';\r\n	document.write(html);\r\n}\r\nshow.init();\r\npvstas(pvid);', '0', '', 'y', '2014-06-26 17:41:20');
INSERT INTO `zyads_adstyle` VALUES ('11', '19', 'Banner图片', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"固定顶部\";i:1;s:12:\"固定底部\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:5:\"radio\";i:1;s:5:\"radio\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:8:\"position\";i:1;s:8:\"position\";}s:19:\"htmlcontrol_checked\";a:2:{i:0;s:7:\"checked\";i:1;s:0:\"\";}s:17:\"htmlcontrol_value\";a:2:{i:0;s:3:\"top\";i:1;s:6:\"bottom\";}}', '320x50,320x75', 'var i = \'<iframe src=\"\' + ifsrc + \'\" width=\"100%\" height=\"\' + zone.height + \'\" marginheight=\"0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\"></iframe>\', o = document.createElement(\"div\");\r\nvar arand=Math.floor(Math.random()*100000);\r\no.id = arand;\r\no.style.cssText = \"position: fixed;z-index: 2147483646;left:0px;width:100%;height:\"+zone.height+\"px;text-align:center;background-color: rgba(0,0,0,.64);box-shadow: 0 -1px 1px rgba(0,0,0,.10);\";\r\nif(zone.htmlcontrol){\r\n	if(zone.htmlcontrol.position== \'top\'){  \r\n		o.style.top = \"0px\";\r\n		var c_img_top = (zone.height/2-10)+\"px\";\r\n		var c_img_right = \"10px\";\r\n	}\r\n	if(zone.htmlcontrol.position== \'bottom\'){\r\n		o.style.bottom = \"0px\";\r\n		var c_img_top = (zone.height/2-10)+\"px\";\r\n		var c_img_right = \"10px\";\r\n	}\r\n}\r\no.innerHTML = \"<div style=\'position: relative;display:inline-block; zoom:1; *display:inline; vertical-align:middle; text-align:left;width:100%;height:\"+zone.height+\"px\'><img src=\'\"+domain.imgurl+\"/images/close.png\' style=\'position:absolute;top:\"+c_img_top+\";right:\"+c_img_right+\";cursor:pointer;width;20px;height:20px;z-index:2147483647\' id=\'c\"+arand+\"\'>\"+i+\"</div><div style=\'height:100%; overflow:hidden; display:inline-block; width:1px; overflow:hidden; margin-left:-1px; zoom:1; *display:inline; *margin-top:-1px; _margin-top:0; vertical-align:middle;\'></div>\";\r\ndocument.body.appendChild(o);  \r\n\r\nfunction close(){  \r\n	if(o) o.style.display=\'none\';\r\n}\r\n__A( __G(\'c\'+arand), \"click\",close);', 'var ext= ads[0].imageurl.substr(ads[0].imageurl.lastIndexOf(\".\")).toLowerCase();\r\nif(ext!=\'.swf\'){\r\n	var str = \"<a target=\'_blank\' href=\"+ads[0].url+\" id=\'v_ads\'><img src=\'\"+ads[0].imageurl+\"\' border=\'0\' width=\'100%\' height=\'\"+config.height+\"\'></a>\";\r\n}else{\r\n	var str = \'<div id=\"v_ads\" style=\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\" style=\"display:block;width:\'+config.width+\'px;height:\'+config.height+\'px;\" id=\"_z_add_s_\"></a></div><embed src=\"\'+ads[0].imageurl+\'\" type=\"application/x-shockwave-flash\" height=\"\'+config.height+\'\" width=\"\'+config.width+\'\"   name=\"Zad\" quality=\"high\" wmode=\"opaque\"   allowscriptaccess=\"always\" >\';  \r\n}\r\ndocument.writeln(str);\r\n/*\r\n* RUN STATS\r\n*/\r\npvid.aid.push(ads[0].adsid); \r\npvid.pid.push(ads[0].planid);\r\npvstas(pvid);', '1', '', 'y', '2014-08-30 16:11:05');
INSERT INTO `zyads_adstyle` VALUES ('15', '11', '效果3', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#8bb995,#ef774b,#ef774b,#eec140,#f4a64a,#769D7F,#CB6543,#CB6543,#CBA438,#D08D42\";', '3', '', 'y', '2014-09-19 13:25:02');
INSERT INTO `zyads_adstyle` VALUES ('16', '11', '效果4', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#e76069,#7fa9ae,#7fa9ae,#96c48f,#f78c6c,#C55359,#6C9093,#6C9093,#80A77A,#D2775C\";', '0', '', 'y', '2014-09-19 13:25:42');
INSERT INTO `zyads_adstyle` VALUES ('17', '11', '效果5', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#8f6256,#6bbab8,#6bbab8,#fbb859,#ef8751,#7A544B,#5B9E9C,#5B9E9C,#D69D4E,#CB7348\";', '0', '', 'y', '2014-09-19 13:27:39');
INSERT INTO `zyads_adstyle` VALUES ('19', '11', '效果6', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#b981b2,#7cbee8,#7cbee8,#f9aa95,#b2a0cd,#a568a0,#68A1C7,#68A1C7,#D5917D,#9787AF\";', '0', '', 'y', '2014-09-19 13:28:26');
INSERT INTO `zyads_adstyle` VALUES ('20', '11', '效果7', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#ed636e,#fa7f71,#fa7f71,#f4b5a6,#f48e83,#CA555E,#D56C60,#D56C60,#D09A8D,#D0796F\";', '0', '', 'y', '2014-09-19 13:29:00');
INSERT INTO `zyads_adstyle` VALUES ('21', '11', '效果8', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#bb4652,#eb5e35,#eb5e35,#fc9451,#fcb785,#9F3F48,#C8502E,#C8502E,#D69C71,#D67E48\";', '0', '', 'y', '2014-09-19 13:29:23');
INSERT INTO `zyads_adstyle` VALUES ('22', '11', '效果9', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#61617b,#788ab4,#788ab4,#bbd2ec,#83a0ca,#545469,#667599,#667599,#9FB3C9,#6F88AC\";', '0', '', 'y', '2014-09-19 13:29:42');
INSERT INTO `zyads_adstyle` VALUES ('23', '11', '效果10', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#557e9f,#5099a7,#5099a7,#97cda5,#61b8ad,#4A6A87,#46828E,#46828E,#80AE8C,#559D93\";', '0', '', 'y', '2014-09-19 13:30:04');
INSERT INTO `zyads_adstyle` VALUES ('24', '11', '效果11', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#424242,#424242,#424242,#424242,#424242,#2D2D2D,#2D2D2D,#2D2D2D,#2D2D2D,#2D2D2D\";', '0', '', 'y', '2014-09-19 13:30:28');
INSERT INTO `zyads_adstyle` VALUES ('25', '11', '效果12', '', '760x90,250x200,120x270,640x96,120x600,160x600,360x300,300x250,336x280,200x200,250x250,960x90,640x60,460x60,960x60,468x60,580x90,728x90,120x120', '', 'config.tag_color = \"#50afd1,#8c8bc6,#8c8bc6,#648272,#96c2aa,#4795B2,#7776A8,#7776A8,#566F61,#80A590\";', '0', '', 'y', '2014-09-19 13:30:48');
INSERT INTO `zyads_adstyle` VALUES ('27', '10', '默认', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"显示左边\";i:1;s:12:\"显示右边\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:8:\"checkbox\";i:1;s:8:\"checkbox\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:9:\"view_left\";i:1;s:10:\"view_right\";}s:19:\"htmlcontrol_checked\";a:2:{i:0;s:7:\"checked\";i:1;s:7:\"checked\";}s:17:\"htmlcontrol_value\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '160x600,120x240,120x270,120x600', '', 'var ext= ads[0].imageurl.substr(ads[0].imageurl.lastIndexOf(\".\")).toLowerCase();\r\nif(ext==\'.swf\'){\r\n	var str = \"<a target=\'_blank\' href=\"+ads[0].url+\" id=\'v_ads\'><img src=\'\"+ads[0].imageurl+\"\' border=\'0\' width=\'\"+config.width+\"\' height=\'\"+config.height+\"\'></a>\";\r\n}else{\r\n	var str = \'<div id=\"v_ads\" style=\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\" style=\"display:block;width:\'+config.width+\'px;height:\'+config.height+\'px;\" id=\"_z_add_s_\"></a></div><embed src=\"\'+ads[0].imageurl+\'\" type=\"application/x-shockwave-flash\" height=\"\'+config.height+\'\" width=\"\'+config.width+\'\"   name=\"Zad\" quality=\"high\" wmode=\"opaque\"   allowscriptaccess=\"always\" >\';  \r\n}\r\ndocument.writeln(str);\r\n/*\r\n* RUN STATS\r\n*/\r\npvid.aid.push(ads[0].adsid); \r\npvid.pid.push(ads[0].planid);\r\npvstas(pvid);', '1', '', 'y', '2014-10-20 15:16:01');
INSERT INTO `zyads_adstyle` VALUES ('28', '20', '直链跳转', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:27:\"弹窗间隔时间（分）\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:11:\"iarecpmtime\";}s:19:\"htmlcontrol_checked\";a:1:{i:0;s:7:\"checked\";}s:17:\"htmlcontrol_value\";a:1:{i:0;s:1:\"5\";}}', null, 'if(__B.android ||__B.ios || __B.iphone || __B.ipad){\r\n	if(!__Gc(\'iarecpmtime\')){\r\n		var exptime = zone.htmlcontrol.iarecpmtime*1000*60;\r\n		 __Sc(\"iarecpmtime\",1,{expires:exptime });\r\n		location.href = ads[0].url; \r\n		pvid.aid.push(ads[0].adsid);\r\n		pvid.pid.push(ads[0].planid);\r\n		pvstas(pvid);\r\n	}\r\n}', '', '1', '', 'y', '2014-10-22 15:19:55');
INSERT INTO `zyads_adstyle` VALUES ('29', '18', '直链跳转', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:23:\"弹窗间隔时间(分)\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:12:\"iosrecpmtime\";}s:19:\"htmlcontrol_checked\";a:1:{i:0;s:7:\"checked\";}s:17:\"htmlcontrol_value\";a:1:{i:0;s:1:\"5\";}}', null, 'if(__B.ios || __B.iphone || __B.ipad){\r\n	if(!__Gc(\'iosrecpmtime\')){\r\n		var exptime = zone.htmlcontrol.iosrecpmtime*1000*60;\r\n		 __Sc(\"iosrecpmtime\",1,{expires:exptime });\r\n		location.href = ads[0].url; \r\n		pvid.aid.push(ads[0].adsid);\r\n		pvid.pid.push(ads[0].planid);\r\n		pvstas(pvid);\r\n	}\r\n}', '', '1', '', 'y', '2014-11-26 20:30:22');
INSERT INTO `zyads_adstyle` VALUES ('30', '21', '默认', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"固定顶部\";i:1;s:12:\"固定底部\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:5:\"radio\";i:1;s:5:\"radio\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:8:\"position\";i:1;s:8:\"position\";}s:19:\"htmlcontrol_checked\";a:2:{i:0;s:7:\"checked\";i:1;s:0:\"\";}s:17:\"htmlcontrol_value\";a:2:{i:0;s:3:\"top\";i:1;s:6:\"bottom\";}}', '320x50', 'var i = \'<iframe src=\"\' + ifsrc + \'\" width=\"100%\" height=\"\' + zone.height + \'\" marginheight=\"0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\"></iframe>\', o = document.createElement(\"div\");\r\nvar arand=Math.floor(Math.random()*100000);\r\no.id = arand;\r\no.style.cssText = \"position: fixed;z-index: 2147483646;left:0px;width:100%;height:\"+zone.height+\"px;text-align:center;background-color: rgba(0,0,0,.64);box-shadow: 0 -1px 1px rgba(0,0,0,.10);\";\r\nif(zone.htmlcontrol){\r\n	if(zone.htmlcontrol.position== \'top\'){  \r\n		o.style.top = \"0px\";\r\n		var c_img_top = (zone.height/2-10)+\"px\";\r\n		var c_img_right = \"10px\";\r\n	}\r\n	if(zone.htmlcontrol.position== \'bottom\'){\r\n		o.style.bottom = \"0px\";\r\n		var c_img_top = (zone.height/2-10)+\"px\";\r\n		var c_img_right = \"10px\";\r\n	}\r\n}\r\no.innerHTML = \"<div style=\'position: relative;display:inline-block; zoom:1; *display:inline; vertical-align:middle; text-align:left;width:100%;height:\"+zone.height+\"px\'><img src=\'\"+domain.imgurl+\"/images/close.png\' style=\'position:absolute;top:\"+c_img_top+\";right:\"+c_img_right+\";cursor:pointer;width;20px;height:20px;z-index:2147483647\' id=\'c\"+arand+\"\'>\"+i+\"</div><div style=\'height:100%; overflow:hidden; display:inline-block; width:1px; overflow:hidden; margin-left:-1px; zoom:1; *display:inline; *margin-top:-1px; _margin-top:0; vertical-align:middle;\'></div>\";\r\ndocument.body.appendChild(o);  \r\n\r\nfunction close(){  \r\n	if(o) o.style.display=\'none\';\r\n}\r\n__A( __G(\'c\'+arand), \"click\",close);', 'var css = \'<style>header,body,div,h1,h2,h3,span,b,i,p,em,a{margin:0px;padding:0px}.main h1,.main h2,.main h3{font-weight:500;font-size:15px}.main b,.main i{font-style:normal;font-weight:400}.main a{font-size:16px;text-decoration:none}.main{height:54px;z-index:2;overflow:hidden;color:#FFF;position:fixed;left:0px;bottom:0px;background:none repeat scroll 0%0%#EEE;border-top:1px solid#DADADA;box-sizing:border-box;padding:0px 10px 0px 62px;width:100%;font-size:16px}.main p{height:20px;line-height:20px;font-size:13px}.main .img{display:block;position:absolute;left:8px;top:4px;background-position:0px-128px;width:42px;height:42px;border:1px solid#DADADA;border-radius:3px;overflow:hidden}.headline{color:#000;font-size:16px;margin-top:5px;line-height:24px}.headline a{color:#000}.description a{color:#2CA30B}.btn{display:block;position:absolute;height:36px;width:68px;line-height:36px;color:#FFF;text-align:center;background:none repeat scroll 0%0%#2CA30B;border-radius:2px;top:8px;right:56px;font-size:15px}</style>\';\r\n\r\nvar html = css+ \'<div class=\"main\"><b class=\"img\"><img src=\"\'+ads[0].imageurl+\'\"></b><h2 class=\"headline\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\">\'+ads[0].headline+\'</a></h2><p class=\"description\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\">\'+ads[0].description+\'</a></p>\';\r\nif(ads[0].htmlcontrol){\r\n	if(ads[0].htmlcontrol.btntext){\r\n		html +=\'<a class=\"btn\" href=\"\'+ads[0].url+\'\" target=\"_blank\">\'+ads[0].htmlcontrol.btntext+\'</a>\';\r\n	}\r\n}\r\nhtml +=\'</div>\';\r\n\r\ndocument.write(html);\r\n/*\r\n* RUN STATS\r\n*/\r\npvid.aid.push(ads[0].adsid); \r\npvid.pid.push(ads[0].planid);\r\npvstas(pvid);\r\n', '1', '', 'y', '2014-12-11 15:53:40');
INSERT INTO `zyads_adstyle` VALUES ('31', '22', '默认', '', '320x75', 'var i = \'<iframe src=\"\' + ifsrc + \'\" width=\"100%\" height=\"\' + zone.height + \'\" marginheight=\"0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\"></iframe>\';\r\n\r\nvar arand=Math.floor(Math.random()*100000);\r\nvar o = \"<div id=\"+arand+\" style=\'width:100%;height:\"+zone.height+\"px\'><div>\"+i+\"</div></div>\";\r\ndocument.write(o);\r\n\r\nfunction close(){  \r\n	if(o) o.style.display=\'none\';\r\n}\r\n__A( __G(\'c\'+arand), \"click\",close);', 'var ext= ads[0].imageurl.substr(ads[0].imageurl.lastIndexOf(\".\")).toLowerCase();\r\nif(ext!=\'.swf\'){\r\n	var str = \"<a target=\'_blank\' href=\"+ads[0].url+\" id=\'v_ads\'><img src=\'\"+ads[0].imageurl+\"\' border=\'0\' width=\'100%\' height=\'\"+config.height+\"\'></a>\";\r\n}else{\r\n	var str = \'<div id=\"v_ads\" style=\"position:absolute;z-index:10000;background-color:#fff;opacity:0.01;filter:alpha(opacity:1);\"><a href=\"\'+ads[0].url+\'\" target=\"_blank\" style=\"display:block;width:\'+config.width+\'px;height:\'+config.height+\'px;\" id=\"_z_add_s_\"></a></div><embed src=\"\'+ads[0].content+\'\" type=\"application/x-shockwave-flash\" height=\"\'+config.height+\'\" width=\"\'+config.width+\'\"   name=\"Zad\" quality=\"high\" wmode=\"opaque\"   allowscriptaccess=\"always\" >\';  \r\n}\r\ndocument.writeln(str);\r\n/*\r\n* RUN STATS\r\n*/\r\npvid.aid.push(ads[0].adsid); \r\npvid.pid.push(ads[0].planid);\r\npvstas(pvid);', '1', '', 'y', '2015-05-12 11:39:50');

-- ----------------------------
-- Table structure for `zyads_adtpl`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_adtpl`;
CREATE TABLE `zyads_adtpl` (
  `tplid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `adtypeid` mediumint(9) NOT NULL,
  `tplname` varchar(20) NOT NULL,
  `tpltype` enum('url_jump','iframe','script','script_iframe') NOT NULL,
  `htmlcontrol` mediumtext NOT NULL,
  `viewjs` mediumtext NOT NULL,
  `iframejs` mediumtext NOT NULL,
  `customspecs` tinyint(1) NOT NULL DEFAULT '1',
  `customcolor` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(20) NOT NULL,
  `sort` tinyint(3) NOT NULL DEFAULT '1',
  `status` enum('y','n') NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`tplid`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_adtpl
-- ----------------------------
INSERT INTO `zyads_adtpl` VALUES ('11', '3', '标签云', 'iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"广告地址\";i:1;s:12:\"标签名称\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:4:\"text\";i:1;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:3:\"url\";i:1;s:8:\"headline\";}s:14:\"htmlcontrol_id\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:16:\"htmlcontrol_span\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}}', '', 'var show = {};\r\n	show.init = function() {\r\n		show.bw = 2;\r\n		show.mb = [100, 25];\r\n		show.scale = [6, 6];\r\n		show.bA= Array();\r\n		show.preset();\r\n		show.putdata();\r\n	}\r\n	show.preset = function() {\r\n\r\n		document.write(\'<style>.ac {position: relative;}a {display: inline-block;position: absolute;background: #fff;text-align: center;overflow: hidden;color: #fff;font-family: \"微软雅黑\";text-decoration: none;}.b1 {font-size: 24px;}.b2 {font-size: 20px;}.b2_5 {font-size: 18px;}.b2_6 {font-size: 16px;}.b2_7 {font-size: 14px;}.b3 {font-size: 12px;}</style><div id=\"ac\" class=\"ac\"></div>\');\r\n		show.c = config.tag_color.split(\",\");\r\n		show.row = Math.floor(config.height / show.mb[1]); \r\n		show.col = Math.floor(config.width / show.mb[0]);  \r\n		show.bn1 = Math.round(show.row * show.col / show.scale[0]);\r\n		show.bn2 = Math.round(show.row * show.col / show.scale[1]);\r\n		 \r\n		if (show.row < 2) {\r\n			show.bn1 = 0;\r\n		}\r\n		if (show.col < 2) { \r\n			 show.bn1 = show.bn2 =  0;\r\n		}\r\n		  \r\n		if (show.row * show.row < 20) {\r\n			show.bw = 1;\r\n		}\r\n\r\n		show.ah = Math.floor(config.height / show.row)-show.bw ;\r\n		show.aw = Math.floor(config.width / show.col)-show.bw;\r\n		show.ac = document.getElementById(\"ac\");\r\n		show.ac.style.width = config.width + \"px\";\r\n		show.ac.style.height = config.height + \"px\";\r\n	}\r\n	show.putdata = function() { \r\n		for ( k = 0, l = show.row * show.col; k < l; k++) {  \r\n			show.flag = false;\r\n			var a = document.createElement(\"a\");\r\n			if (!ads[k]) {\r\n				var n = Math.floor(Math.random() * ads.length + 1) - 1;\r\n				ads[k] = ads[n];\r\n			}\r\n			a.innerHTML = ads[k].headline;\r\n			a.href = ads[k].url;\r\n			a.target = \"_blank\";  \r\n			if (show.bn1) {\r\n				show.bn1--;\r\n				show.run(show.box1, 1, 1, a)\r\n			}else {\r\n				if (show.bn2) {\r\n					show.bn2--;\r\n					show.run(show.box2, 1, 0, a)\r\n				} else {\r\n					show.run(show.box3, 0, 0, a)\r\n				}\r\n			}\r\n			pvid.aid.push(ads[k].adsid);\r\n			pvid.pid.push(ads[k].planid);\r\n		}\r\n	}\r\n	show.run = function(f, b, e, d) {  \r\n		\r\n		for (var c = 0; c < 300; c++) {\r\n			var a = Math.floor(Math.random() * (show.row - b)); \r\n			var g = Math.floor(Math.random() * (show.col - e)); \r\n			if (f(a, g, d)) {\r\n				break\r\n			}\r\n\r\n		}\r\n		if (!show.flag) {\r\n			for (var a = 0; a < show.row; a++) {\r\n				for (var g = 0; g < show.col; g++) {\r\n					if (show.box3(a, g, d)) {\r\n						a = show.row;\r\n						break\r\n					}\r\n				}\r\n			}\r\n		}\r\n	}\r\n	show.box1= function(a, d, b) {  \r\n		show.bA[a] = show.bA[a] || [];\r\n		show.bA[a + 1] = show.bA[a + 1] || [];\r\n		show.bA[a + 2] = show.bA[a + 2] || [];\r\n		show.bA[a + 3] = show.bA[a + 3] || [];\r\n		show.bA[a - 1] = show.bA[a - 1] || [];\r\n		show.bA[a - 2] = show.bA[a - 2] || [];\r\n		if ((show.bA[a - 1][d] == \"b1\" && show.bA[a - 1][d + 1] == \"b1\" && show.bA[a - 2][d] == \"b1\" && show.bA[a - 2][d + 1] == \"b1\") || (show.bA[a + 2][d] == \"b1\" && show.bA[a + 2][d + 1] == \"b1\" && show.bA[a + 3][d] == \"b1\" && show.bA[a + 3][d + 1] == \"b1\") || (show.bA[a][d + 2] == \"b1\" && show.bA[a][d + 3] == \"b1\" && show.bA[a + 1][d + 2] == \"b1\" && show.bA[a + 1][d + 3] == \"b1\") || (show.bA[a][d - 1] == \"b1\" && show.bA[a][d - 2] == \"b1\" && show.bA[a + 1][d - 1] == \"b1\" && show.bA[a + 1][d - 2] == \"b1\")) {\r\n			return false\r\n		}\r\n		if (!show.bA[a][d] && !show.bA[a][d + 1]) {\r\n			if (!show.bA[a + 1][d] && !show.bA[a + 1][d + 1]) {\r\n				show.bA[a][d] = show.bA[a][d + 1] = show.bA[a + 1][d] = show.bA[a + 1][d + 1] = \"b1\";\r\n				b.className = \"b1\";\r\n				var c = Math.floor(Math.random() * 1);\r\n				show.style(a, d, 2, 2, b, c);\r\n				show.flag = true;\r\n				return true\r\n			}\r\n		}\r\n		return false\r\n	}\r\n	show.box2 = function(a, e, c) {\r\n		show.bA[a] = show.bA[a] || [];\r\n		show.bA[a + 1] = show.bA[a + 1] || [];\r\n		show.bA[a + 2] = show.bA[a + 2] || [];\r\n		show.bA[a + 3] = show.bA[a + 3] || [];\r\n		show.bA[a - 1] = show.bA[a - 1] || [];\r\n		show.bA[a - 2] = show.bA[a - 2] || [];\r\n		if (!show.bA[a][e] && !show.bA[a + 1][e]) {\r\n			show.bA[a][e] = show.bA[a + 1][e] = \"b2\";\r\n			var b = Math.ceil(c.innerHTML.replace(/[^x00-xff]/g, \"ci\").length / 2); \r\n			c.className = \"b2 b2_\" + b;\r\n			var d = Math.floor(Math.random() * 2) + 1;\r\n			show.style(a, e, 2, 1, c, d);\r\n			show.flag = true;\r\n			return true\r\n		}\r\n		return false\r\n	}\r\n\r\n	show.box3 = function(a, d, b) {\r\n		show.bA[a] = show.bA[a] || [];\r\n		if (!show.bA[a][d]) {\r\n			show.bA[a][d] = 1;\r\n			b.className = \"b3\";\r\n			var c = Math.floor(Math.random() * (show.c.length / 2 - 3)) + 3;\r\n			show.style(a, d, 1, 1, b, c);\r\n			show.flag = true;\r\n			return true\r\n		}\r\n		return false\r\n	}\r\n	show.style = function(a, g, e, c, d, f) { \r\n		postop = (show.ah + show.bw ) * a; \r\n		posleft = (show.aw + show.bw ) * g;\r\n		d.style.top = postop + \"px\";\r\n		d.style.left = posleft + \"px\";\r\n		d.style.height = d.style.lineHeight = show.ah * e + show.bw * (e - 1) + \"px\";\r\n		d.style.width = show.aw * c + show.bw * (c - 1) + \"px\"; \r\n		var b = show.c[f];\r\n		d.style.backgroundColor = b;\r\n		show.ac.appendChild(d);\r\n		if (a + (e - 1) == (show.row - 1)) {\r\n            d.style.height = d.style.lineHeight = config.height - (show.ah + show.bw) * a + \"px\"\r\n        }\r\n        if (g + (c - 1) == (show.col - 1)) {\r\n            d.style.width = config.width - (show.aw + show.bw) * g + \"px\"\r\n        } \r\n	}\r\nshow.init();\r\npvstas(pvid);', '2', '1', '', '1', 'y', '2014-06-22 22:10:31');
INSERT INTO `zyads_adtpl` VALUES ('3', '8', '右下角', 'script_iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"上传图片\";i:1;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:4:\"file\";i:1;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:5:\"files\";i:1;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:16:\"htmlcontrol_span\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}}', 'var i = __I(), o = document.createElement(\"div\");\r\nvar rand=Math.floor(Math.random()*100000);\r\no.style.cssText = \"position:absolute;bottom:0px;\";\r\no.style.width = zone.width;\r\no.style.right = \"0px\";\r\nif (!window.XMLHttpRequest\r\n		|| (document.compatMode == \"BackCompat\" && !!window.ActiveXObject)) {\r\n	var abc = setInterval(function() {\r\n		scroll(o);\r\n	}, 20);\r\n} else {\r\n	o.style.position = \"fixed\";\r\n}\r\no.innerHTML = \"<img src=\'\"+domain.imgurl+\"/images/close2.png\' style=\'position:absolute;top:2px;right:2px;cursor:pointer;width;16px;height:16px;z-index:2147483647\' id=\'c\"+rand+\"\'>\"+i;\r\ndocument.body.appendChild(o);\r\nfunction scroll(o) {\r\n	var doc = (document.compatMode.toLowerCase() == \"css1compat\") ? document.documentElement\r\n			: document.body;\r\n	o.style.top = (doc.clientHeight - zone.height + doc.scrollTop) + \"px\";\r\n	o.style.left = (doc.clientWidth - zone.width + doc.scrollLeft) + \"px\";\r\n}\r\nfunction close(){  \r\n	if(o) o.style.display=\'none\';\r\n}\r\n__A( __G(\'c\'+rand), \"click\",close);', '', '1', '1', '', '1', 'y', '2014-06-19 22:24:36');
INSERT INTO `zyads_adtpl` VALUES ('4', '2', '上图下文', 'iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:3:{i:0;s:12:\"上传图片\";i:1;s:12:\"标题文字\";i:2;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:3:{i:0;s:4:\"file\";i:1;s:4:\"text\";i:2;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:3:{i:0;s:5:\"files\";i:1;s:8:\"headline\";i:2;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}s:16:\"htmlcontrol_span\";a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}}', '', '', '2', '2', '', '1', 'y', '2014-06-21 14:23:38');
INSERT INTO `zyads_adtpl` VALUES ('10', '8', '对联广告', 'script_iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"上传图片\";i:1;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:4:\"file\";i:1;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:5:\"files\";i:1;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:16:\"htmlcontrol_span\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}}', 'var i = __I();\r\n						function left() {\r\n							var o = document.createElement(\"div\"),rand=Math.floor(Math.random()*100000);\r\n							o.style.cssText = \"position:absolute;top:120px;left:10px;width:\"+zone.width;\r\n							if(!window.XMLHttpRequest || (document.compatMode==\"BackCompat\" && !!window.ActiveXObject)){\r\n								var abc = setInterval( function() { scroll(o); }, 20 ); \r\n							}else {  \r\n								o.style.position=\"fixed\";\r\n							}\r\n							o.innerHTML = \"<img src=\'\"+domain.imgurl+\"/images/close2.png\' style=\'position:absolute;top:2px;right:2px;cursor:pointer;width;16px;height:16px;z-index:2147483647\' id=\'c\"+rand+\"\'>\"+i;\r\n							document.body.appendChild(o);\r\n							function close(){  \r\n								if(o) o.style.display=\'none\';\r\n							}\r\n							__A( __G(\'c\'+rand), \"click\",close);\r\n						}\r\n						function right() {\r\n							var o = document.createElement(\"div\"),rand=Math.floor(Math.random()*100000);\r\n							o.style.cssText = \"position:absolute;top:120px;right:10px;width:\"+zone.width;\r\n							if(!window.XMLHttpRequest || (document.compatMode==\"BackCompat\" && !!window.ActiveXObject)){\r\n								var abc = setInterval( function() { scroll(o); }, 20 ); \r\n							}else {\r\n								o.style.position=\"fixed\";\r\n							}\r\n							o.innerHTML = \"<img src=\'\"+domain.imgurl+\"/images/close2.png\' style=\'position:absolute;top:2px;right:2px;cursor:pointer;width;16px;height:16px;z-index:2147483647\' id=\'c\"+rand+\"\'>\"+i;\r\n							document.body.appendChild(o);\r\n							function close(){  \r\n								if(o) o.style.display=\'none\';\r\n							}\r\n							__A( __G(\'c\'+rand), \"click\",close);\r\n						}\r\n					\r\n						function scroll(o){ \r\n								var d = document.body;e=document.documentElement;\r\n								document.compatMode==\"BackCompat\" ?  this.t=d.scrollTop : this.t=e.scrollTop==0?d.scrollTop:e.scrollTop;	\r\n								o.style.top=( this.t+50)+\"px\";\r\n						}\r\n						if(zone.htmlcontrol){\r\n							zone.htmlcontrol[\'view_right\'] && left(), zone.htmlcontrol[\'view_left\'] && right();\r\n						}else {\r\n							left();\r\n							right();\r\n						}\r\n						', '', '1', '1', '', '1', 'y', '2014-06-22 22:05:39');
INSERT INTO `zyads_adtpl` VALUES ('8', '5', '普通弹窗', 'script', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:1:{i:0;s:0:\"\";}s:16:\"htmlcontrol_span\";a:1:{i:0;s:0:\"\";}}', '', '', '1', '1', '', '1', 'y', '2014-06-22 21:47:54');
INSERT INTO `zyads_adtpl` VALUES ('17', '11', '安卓跳转', 'script', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:1:{i:0;s:0:\"\";}s:16:\"htmlcontrol_span\";a:1:{i:0;s:0:\"\";}}', '', '', '1', '1', '', '0', 'y', '2014-09-18 13:56:18');
INSERT INTO `zyads_adtpl` VALUES ('7', '1', '通栏广告', 'iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:3:{i:0;s:12:\"素材文件\";i:1;s:12:\"广告地址\";i:2;s:15:\"自定义字段\";}s:16:\"htmlcontrol_type\";a:3:{i:0;s:4:\"file\";i:1;s:4:\"text\";i:2;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:3:{i:0;s:5:\"files\";i:1;s:3:\"url\";i:2;s:5:\"zd[a]\";}s:14:\"htmlcontrol_id\";a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}s:16:\"htmlcontrol_span\";a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}}', '', '', '1', '1', '', '2', 'y', '2014-06-21 16:54:20');
INSERT INTO `zyads_adtpl` VALUES ('12', '10', '移动插屏', 'script_iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"上传图片\";i:1;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:4:\"file\";i:1;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:5:\"files\";i:1;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:16:\"htmlcontrol_span\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}}', '', '', '1', '1', '', '1', 'y', '2014-06-22 22:11:14');
INSERT INTO `zyads_adtpl` VALUES ('13', '3', '主题广告', 'iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:5:{i:0;s:12:\"图片文件\";i:1;s:12:\"文字标题\";i:2;s:12:\"内容描述\";i:3;s:12:\"广告地址\";i:4;s:12:\"显示地址\";}s:16:\"htmlcontrol_type\";a:5:{i:0;s:4:\"file\";i:1;s:4:\"text\";i:2;s:4:\"text\";i:3;s:4:\"text\";i:4;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:5:{i:0;s:5:\"files\";i:1;s:8:\"headline\";i:2;s:11:\"description\";i:3;s:3:\"url\";i:4;s:7:\"dispurl\";}s:14:\"htmlcontrol_id\";a:5:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";}s:16:\"htmlcontrol_span\";a:5:{i:0;s:17:\"上传图片50x50\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";}}', '', '', '2', '2', '', '1', 'y', '2014-06-22 22:17:53');
INSERT INTO `zyads_adtpl` VALUES ('14', '9', '直链广告', 'url_jump', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:1:{i:0;s:0:\"\";}s:16:\"htmlcontrol_span\";a:1:{i:0;s:0:\"\";}}', '', '', '1', '1', '', '1', 'y', '2014-06-23 12:59:02');
INSERT INTO `zyads_adtpl` VALUES ('18', '11', 'IOS跳转', 'script', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:1:{i:0;s:0:\"\";}s:16:\"htmlcontrol_span\";a:1:{i:0;s:0:\"\";}}', '', '', '1', '1', '', '0', 'y', '2014-09-18 13:56:40');
INSERT INTO `zyads_adtpl` VALUES ('19', '10', '移动Banner', 'script_iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"上传图片\";i:1;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:4:\"file\";i:1;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:5:\"files\";i:1;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:16:\"htmlcontrol_span\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}}', '', '', '1', '1', '', '0', 'y', '2014-09-18 13:58:48');
INSERT INTO `zyads_adtpl` VALUES ('20', '11', '移动跳转（IOS、安卓等）', 'script', 'a:5:{s:17:\"htmlcontrol_title\";a:1:{i:0;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:1:{i:0;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:1:{i:0;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:1:{i:0;s:0:\"\";}s:16:\"htmlcontrol_span\";a:1:{i:0;s:0:\"\";}}', '', '', '1', '1', '', '0', 'y', '2014-10-22 15:20:29');
INSERT INTO `zyads_adtpl` VALUES ('21', '10', '移动图文', 'script_iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:5:{i:0;s:12:\"图片文件\";i:1;s:12:\"文字标题\";i:2;s:21:\"第一行内容描述\";i:3;s:12:\"按钮文字\";i:4;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:5:{i:0;s:4:\"file\";i:1;s:4:\"text\";i:2;s:4:\"text\";i:3;s:4:\"text\";i:4;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:5:{i:0;s:5:\"files\";i:1;s:8:\"headline\";i:2;s:11:\"description\";i:3;s:11:\"zd[btntext]\";i:4;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:5:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";}s:16:\"htmlcontrol_span\";a:5:{i:0;s:17:\"上传图片60x60\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";}}', '', '', '1', '1', '', '1', 'y', '2014-12-11 14:48:57');
INSERT INTO `zyads_adtpl` VALUES ('22', '10', '固定banner', 'script_iframe', 'a:5:{s:17:\"htmlcontrol_title\";a:2:{i:0;s:12:\"上传图片\";i:1;s:12:\"广告地址\";}s:16:\"htmlcontrol_type\";a:2:{i:0;s:4:\"file\";i:1;s:4:\"text\";}s:16:\"htmlcontrol_name\";a:2:{i:0;s:5:\"files\";i:1;s:3:\"url\";}s:14:\"htmlcontrol_id\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:16:\"htmlcontrol_span\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}}', '', '', '1', '1', '', '1', 'y', '2015-05-12 11:35:43');

-- ----------------------------
-- Table structure for `zyads_adtype`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_adtype`;
CREATE TABLE `zyads_adtype` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `promotiontype` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL,
  `status` enum('y','n') NOT NULL,
  `statstype` varchar(200) NOT NULL,
  `sort` tinyint(3) NOT NULL DEFAULT '1',
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_adtype
-- ----------------------------
INSERT INTO `zyads_adtype` VALUES ('1', '图片Banner', '', '', 'y', 'cpc,cpv,cps,cpa,cpas', '1', '2013-07-23 17:32:02');
INSERT INTO `zyads_adtype` VALUES ('2', '图文混排', '', '', 'y', 'cpc,cpv,cps,cpa,cpas', '2', '2013-07-23 17:32:02');
INSERT INTO `zyads_adtype` VALUES ('5', '弹窗广告', '', '', 'y', 'cpm', '3', '2013-08-15 13:51:23');
INSERT INTO `zyads_adtype` VALUES ('3', '文字广告', '', '', 'y', 'cpc,cps,cpa', '5', '2013-07-15 23:24:24');
INSERT INTO `zyads_adtype` VALUES ('8', '悬浮广告', '', '', 'y', 'cpc,cpv,cps,cpa,cpas', '4', '2013-08-24 23:26:00');
INSERT INTO `zyads_adtype` VALUES ('9', 'URL直链', '', '', 'y', 'cpm,cpc,cpv,cps,cpa,cpas', '6', '2014-06-22 21:45:23');
INSERT INTO `zyads_adtype` VALUES ('10', '移动广告', '', '', 'y', 'cpc,cpv,cps,cpa', '0', '2014-09-18 13:55:07');
INSERT INTO `zyads_adtype` VALUES ('11', '移动弹窗', '', '', 'y', 'cpm', '0', '2014-09-18 14:00:42');

-- ----------------------------
-- Table structure for `zyads_apply`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_apply`;
CREATE TABLE `zyads_apply` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `siteid` text NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `applysiteidtype` tinyint(1) NOT NULL,
  `approvaluser` varchar(20) NOT NULL,
  `addtime` datetime NOT NULL,
  `approvaltime` datetime NOT NULL,
  `denyinfo` text,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_apply
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_article`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_article`;
CREATE TABLE `zyads_article` (
  `articleid` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `color` char(7) DEFAULT NULL,
  `top` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  `status` enum('y','n') NOT NULL,
  PRIMARY KEY (`articleid`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_article
-- ----------------------------
INSERT INTO `zyads_article` VALUES ('64', '关于对已备案网站信息进行抽样核查的通知', '<p><span style=\\\"color: #333333; font-family: 宋体, 黑体, Arial; font-size: 16px; font-weight: bold; line-height: 25px; text-align: -webkit-center;\\\">关于对已备案网站信息进行抽样核查的通知</span></p>', '1', '标题颜色', '0', '2012-03-30 21:39:06', 'y');
INSERT INTO `zyads_article` VALUES ('65', '在什么情况下会被拒付广告费', '<p><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\">1、网站本身及广告违反了国家法律或含有恶性代码与病毒，及包含成人、性、色情、</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\">淫秽、赌博、暴力、反动等等不健康的内容。&nbsp;</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\"> 2、所投放广告的网页不属于会员拥有。&nbsp;</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\"> 3、牵涉到知识产权纠纷的网站（如非法 MP3 、盗版软件网站，黑客站点，软件序列</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\">号站点，注册机、注册码站点，或链接至这些网页的站点）。&nbsp;</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\"> 4、链接、讨论或提供影响网络秩序的内容，如提供邮件炸弹、计算机病毒等的网站。&nbsp;</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\"> 5、对作弊的帐户我们一旦查出，将拒绝支付当周全部的佣金，并锁定帐户。&nbsp;</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\"> 6、被查出同一人注册多个帐号的网站。&nbsp;</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\"> 7、使用非 HTML 手段、 JAVASRIPT 窗口、隐藏 FRAME 、CGI 自动生成、网页</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\">REFRESH/AUTOLOAD 等手段来演绎广告代码。&nbsp;</span><br style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\" /><span style=\\\"font-family: Simsun; line-height: 22px; text-align: -webkit-left;\\\"> 8、不可由会员本人或指示、暗示第三方点击广告以获取非法广告费。</span></p>', '1', '标题颜色', '0', '2012-03-30 22:05:49', 'y');
INSERT INTO `zyads_article` VALUES ('66', '什么时候支付拥金', '<table style=\\\"color: #000000; font-family: Simsun; font-size: 12px; line-height: 22px;\\\" cellspacing=\\\"0\\\" cellpadding=\\\"5\\\" width=\\\"100%\\\">\r\n<tbody>\r\n<tr align=\\\"middle\\\" valign=\\\"center\\\">\r\n<td align=\\\"left\\\" valign=\\\"baseline\\\">当您的帐户余额超过我们指定的支付额时，我们会自动给你支付。</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '1', '标题颜色', '0', '2012-03-30 22:06:34', 'y');
INSERT INTO `zyads_article` VALUES ('67', '怎么推广', '<p>注册并登入到我们联盟后台，获取自己的代码。</p>', '1', '标题颜色', '0', '2012-03-30 22:09:04', 'y');
INSERT INTO `zyads_article` VALUES ('68', '如何查询我的收益', '<p>登入到联盟后台，点击&ldquo;查看报表&rdquo;即可看到相关数据。</p>', '1', '', '0', '2012-03-30 22:11:02', 'y');
INSERT INTO `zyads_article` VALUES ('4', '可否把广告代码放在多个页面里？或者同一个页面放多个广告代码？', '为了增加弹窗/点击的机率，或是避免未知因素导致某页面 无法弹出窗口或无法点击，您可\r\n以在多个页面上投放广告代码或在同一个页面投放多个广告代码。', '3', null, '0', '2014-02-10 02:16:35', 'y');
INSERT INTO `zyads_article` VALUES ('2', '什么是网站主', '是广告交易双方的其中一方，即网站的拥有者，具有修改、新增、删除网站内容的权力，并承担相关法律责任的法人。在自已网站上投放广告主的广告后，并按照本平台规定通过本平台收取佣金。', '3', null, '0', '2014-02-10 02:05:53', 'y');
INSERT INTO `zyads_article` VALUES ('3', '可不可以将代码放在空白页里？', '强烈建议不要将代码放在空白页面或是只有广告代码的页面！因为这将导致广告主在查看\r\n广告数据明细时看到空白页面或是只有广告代码页面而产生误会，从而导致广告主对您的投诉。', '3', null, '0', '2014-02-10 02:11:29', 'y');
INSERT INTO `zyads_article` VALUES ('6', '我如何赚钱？', '本站提供多种方法，供您获得广告点击。广告点击可以用来兑换人民币现金。简单的说，只要有点击，就表示您已经赚到钱了哦 ', '3', null, '0', '2007-07-16 02:25:33', 'y');
INSERT INTO `zyads_article` VALUES ('7', '你们怎么付费给我', '我们目前通过工商银行对客户汇款，没有的会员请到当地免费办理。 ', '3', null, '0', '2007-07-16 02:25:55', 'y');
INSERT INTO `zyads_article` VALUES ('8', '什么时候付钱给我', '当您的帐户余额超过我们指定的支付额时，我们会自动给你支付。 ', '3', null, '0', '2007-07-16 02:26:57', 'y');
INSERT INTO `zyads_article` VALUES ('9', '网站主会员审核标准是什么', '1. 网站本身及广告不能包含任何违反国家法律的内容。 \r\n　　2. 网站本身及广告不能含有恶性代码及病毒，不能包含不健康的内容，如成人、性、色\r\n情、淫秽、赌博、暴力、反动等等。 \r\n　　3. 必须有自己的国际顶级域名或国家顶级域名(如:http://www.abc.com)，原则上不通过\r\n使用二级域名或免费域名网站的审核。 \r\n　　4. 对只有论坛或无实际内容或页面排版不够专业美观的网站一律不予通过。 \r\n　　5. 每个网页的弹出窗口不得超过1个，不得自动弹出一次以上要求设为首页或加入收藏等\r\n类似对话框。 \r\n　　如网站在通过审核后违反或不再符合以上标准中的任何一条，联盟将保留与其终止合作\r\n关系的权力。 ', '3', null, '0', '2007-07-16 02:28:17', 'y');
INSERT INTO `zyads_article` VALUES ('10', '网站主会员在什么情况下会被拒付广告费', '1、网站本身及广告违反了国家法律或含有恶性代码与病毒，及包含成人、性、色情、\r\n淫秽、赌博、暴力、反动等等不健康的内容。 \r\n　　2、所投放广告的网页不属于会员拥有。 \r\n　　3、牵涉到知识产权纠纷的网站（如非法 MP3 、盗版软件网站，黑客站点，软件序列\r\n号站点，注册机、注册码站点，或链接至这些网页的站点）。 \r\n　　4、链接、讨论或提供影响网络秩序的内容，如提供邮件炸弹、计算机病毒等的网站。 \r\n　　5、对作弊的帐户我们一旦查出，将拒绝支付当周全部的佣金，并锁定帐户。 \r\n　　6、被查出同一人注册多个帐号的网站。 \r\n　　7、使用非 HTML 手段、 JAVASRIPT 窗口、隐藏 FRAME 、CGI 自动生成、网页\r\nREFRESH/AUTOLOAD 等手段来演绎广告代码。 \r\n　　8、不可由会员本人或指示、暗示第三方点击广告以获取非法广告费。 ', '3', null, '0', '2007-07-16 02:29:26', 'y');
INSERT INTO `zyads_article` VALUES ('11', '广告数据多久统计一次', '实时统计。\r\n通过本系统提供的精确详细的数据及直观的图表统计，广告主会员可以实时查看到每天的广告\r\n数据及历史详细数据，可以查询到每天有多少人看了您的广告(可依据弹窗数、点击数)，显示您的产品在各个时间段的受众状况。 ', '4', null, '0', '2007-07-16 02:34:53', 'y');
INSERT INTO `zyads_article` VALUES ('12', '如何评价网络广告效果', '这是一个比较复杂的问题，以下是一些参考观点。 \r\n　　网络广告效果最直接评价标准是弹窗次数和点击率，即有多少人看到了此广告，并且又有\r\n多少人对此广告感兴趣而点击了该广告。可能大多广告主比较看中点击率，但关于 Banner 显\r\n示时所带来的品牌传播作用，广告站点与广告主之间一直存在长期的争论。在直销型电子商务\r\n站点，最终的效果评价无疑是在线销售额的增长，因为 Web 服务器端的跟踪程序能判断任何一\r\n笔销售的买主是从哪个站点链接过来的。 ', '4', null, '0', '2007-07-16 02:37:06', 'y');
INSERT INTO `zyads_article` VALUES ('13', '广告正式投放之后还能进行修改吗？', '可以。 \r\n　　广告主可实时针对自己营销策略的变更而修改广告内容，如增加广告投放数量、改变单价、\r\n改变链接地址等。 \r\n　　注：新增加的广告在通过管理员审核前可以随意修改内容，正在投放中的广告修改后需管\r\n理员审核。 ', '4', null, '0', '2007-07-16 02:37:35', 'y');
INSERT INTO `zyads_article` VALUES ('14', '关于广告主广告页面的规定', '　1. 放置广告信息的弹窗/点击页面必须是真实页面，不得以任何形式将代码放置于非法\r\n页面上，也就是不能通过javascript、ifram、js等已知或未知的方式在其它页面调出，如有\r\n此类情况一经查实，我们将撤销该广告并清除该广告剩余投放金额。 \r\n　　2. 放置广告信息的弹窗页面不能再有弹出窗口，否则广告主广告将被暂停并清除该广告\r\n剩余投放金额。 \r\n　　3. 不允许弹出超过一次以上将广告页面设为主页和设为收藏的对话框，否则广告主广告\r\n将被暂停并清除该广告剩余投放金额。 ', '4', null, '0', '2007-07-16 02:38:25', 'y');
INSERT INTO `zyads_article` VALUES ('15', '广告主会员如何发布广告？', '      第一步：注册成为联盟的广告主会员； \r\n　　第二步：登陆管理区进行【帐户充值】操作，可选择在线支付和银行汇款两种支付方式； \r\n　　第三步：汇款确认之后，您可以进行【新增广告】操作，选择您希望投放的广告模式并填\r\n写广告资料(如购买的广告投放数量、单价、最高点/弹比例、广告地址、广告类型等)； \r\n　　第四步：待管理员审核并通过广告资料后，您的广告就正式开始投放了。 \r\n　　如果您有任何疑问，欢迎与我公司联系，如果您不熟悉操作的流程，您只需要告诉我们您\r\n的要求，我公司将免费为您定制全套的广告发布方案，最大限度的发挥广告宣传的有效性。 ', '4', null, '0', '2007-07-16 02:41:42', 'y');
INSERT INTO `zyads_article` VALUES ('16', '对联盟的网络广告产品不了解，怎么办？', '请与本公司客户服务人员或管理员取得联系，向我们咨询您想要了解的情况，我们亦会通\r\n过传真或E-mail将本产品相关信息发给您，精心为您免费量身定制网络广告投放计划。Sales@zyiis.com ', '4', null, '0', '2007-07-16 02:43:20', 'y');
INSERT INTO `zyads_article` VALUES ('17', '联盟有哪些广告类型', '<p>图片广告: 支持Flash文件广告,让广告更有特色,实时统计更新,模式包括通栏、横幅、画中画、按钮及旗帜等，有多种尺寸规格。系统采用扁平化的项目管理方式，每个广告项目对应一个广告样式，广告主会员可以任意发布多条相同或不同广告地址、广告样式的广告，系统默认采有的自动轮播的方式让你的网站更加美观。文字广告: 文字广告以文字形式较为详细的介绍广告主的广告产品，扩大企业或产品的知名度。文字广告位的安排非常灵活，可以出现在页面的任何位置，可以任意排放。弹窗广告: 弹窗广告是互联网上最古老也最常用的网络推广形式之一。随着网络广告的发展 ，弹窗广告虽然逐渐退位不再有那么多的倡导者，但弹窗广告依然广泛的应用于网站 、企业的产品快速推广和宣传。在竞争激烈的今天，弹窗广告更是企业快速占领用户 和市场的手段之一，同时也是宣传成本较低的方法之一 销售广告: 引导注册统既CPA计价方式是指按广告投放实际效果，即按回应的有效问卷或定单来计费，而不限广告投 放量。CPA的计价方式对于网站而言有一定的风险，但若广告投放成功，其收益也比CPM的计 价方式要大得多。</p>', '0', '标题颜色', '0', '2007-07-16 02:47:10', 'y');
INSERT INTO `zyads_article` VALUES ('81', '怎么修改财务信息', '<p>为安全起见站长无法自行在后台修改财务信息，请联系我们客服帮助修改。</p>', '3', '', '1', '2014-02-28 14:19:05', 'y');
INSERT INTO `zyads_article` VALUES ('82', '怎么增加网站信息', '<p>登入会员后台-》我的首页-》网站管理-》新建网站</p>', '3', '', '1', '2014-02-28 14:25:29', 'y');
INSERT INTO `zyads_article` VALUES ('83', '联盟付款规则', '<p>登入会员后台-》我的首页-》付款记录，查看付款规则。</p>', '3', '', '1', '2014-02-28 14:30:24', 'y');
INSERT INTO `zyads_article` VALUES ('84', '如何获取广告代码', '<p>登入会员后台-》我的广告，在广告位列表中可以获取已建立的广告代码，或是新建一个新的广告位。</p>', '3', '', '1', '2014-02-28 14:33:53', 'y');
INSERT INTO `zyads_article` VALUES ('85', '如何过渡广告', '<p>登入会员后台-》我的广告，修改或是新建广告位，下方的&ldquo;广告过渡&rdquo;栏选择手动选择广告，勾选自己想的广告，修改广告位可能会有几十分钟的缓存时间生效。</p>', '3', '', '1', '2014-02-28 14:40:14', 'y');
INSERT INTO `zyads_article` VALUES ('86', '广告代码有哪些类型', '<p>联盟广告样式种类较多，比如常用的图片,图文混排,文字描述,纯标题,上图下文,对联，右下角，弹窗等等。</p>', '3', '', '1', '2014-03-03 12:18:58', 'y');
INSERT INTO `zyads_article` VALUES ('87', '为什么修改广告位不能马上生效', '<p>修改了广告位信息没有马上生效的一般是信息不害缓存中，请稍等10几分钟联盟自动更新。</p>', '3', '', '1', '2014-03-03 12:21:51', 'y');
INSERT INTO `zyads_article` VALUES ('88', '什么是自定义链接', '<p>即生成一个计费跳转链接地址，首先我们打开活动域名，然后找到我们需要或是想要推广的商品地址，贴入框中，生成推广代码，制作属于您自己的图片链接广告和文字链接广告，或是直接发布推广代码到QQ群之类推广，一般应用在CPS CPA广告上。</p>', '3', '', '1', '2014-03-28 13:11:01', 'y');
INSERT INTO `zyads_article` VALUES ('89', '什么是Url直链', '<p>一个即时跳转计费链接，方便制作属于您自己的图片链接广告和文字链接广告，或是QQ 、邮件类推广，与自定义链接不同在于自定义链接只能在一个广告活动生成一条链接，一条Url只有一个广告地址，而Url直链为广告位方式管理，可以自已随时管理这条直链需要哪些广告。</p>', '3', '', '1', '2014-03-28 13:18:43', 'y');

-- ----------------------------
-- Table structure for `zyads_class`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_class`;
CREATE TABLE `zyads_class` (
  `classid` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_class
-- ----------------------------
INSERT INTO `zyads_class` VALUES ('112', '游戏', '1', '1');
INSERT INTO `zyads_class` VALUES ('111', '音乐影视', '1', '1');
INSERT INTO `zyads_class` VALUES ('110', '门户网站', '1', '1');
INSERT INTO `zyads_class` VALUES ('113', '网址导航', '1', '1');
INSERT INTO `zyads_class` VALUES ('114', '数码及手机', '1', '1');
INSERT INTO `zyads_class` VALUES ('115', '博客', '1', '1');
INSERT INTO `zyads_class` VALUES ('116', '电脑及硬件', '1', '1');
INSERT INTO `zyads_class` VALUES ('117', '医疗保健', '1', '1');
INSERT INTO `zyads_class` VALUES ('118', '女性时尚', '1', '1');
INSERT INTO `zyads_class` VALUES ('119', '教学及考试', '1', '1');
INSERT INTO `zyads_class` VALUES ('120', '生活服务', '1', '1');
INSERT INTO `zyads_class` VALUES ('121', '房产家居', '1', '1');
INSERT INTO `zyads_class` VALUES ('122', '汽车', '1', '1');
INSERT INTO `zyads_class` VALUES ('123', '交通旅游', '1', '1');
INSERT INTO `zyads_class` VALUES ('124', '体育运动', '1', '1');
INSERT INTO `zyads_class` VALUES ('125', '投资金融', '1', '1');
INSERT INTO `zyads_class` VALUES ('126', '新闻媒体', '1', '1');
INSERT INTO `zyads_class` VALUES ('127', '人文艺术', '1', '1');
INSERT INTO `zyads_class` VALUES ('128', '小说', '1', '1');
INSERT INTO `zyads_class` VALUES ('129', '人才招聘', '1', '1');
INSERT INTO `zyads_class` VALUES ('130', '网络购物', '1', '1');
INSERT INTO `zyads_class` VALUES ('131', 'QQ及非主流', '1', '1');
INSERT INTO `zyads_class` VALUES ('132', '下载', '1', '1');
INSERT INTO `zyads_class` VALUES ('133', '宠物及摄影', '1', '1');
INSERT INTO `zyads_class` VALUES ('143', '其它', '2', '1');
INSERT INTO `zyads_class` VALUES ('145', '商城', '2', '1');
INSERT INTO `zyads_class` VALUES ('146', '食品饮料', '2', '1');
INSERT INTO `zyads_class` VALUES ('147', '汽车自行车', '2', '1');
INSERT INTO `zyads_class` VALUES ('148', '招聘求职', '2', '1');
INSERT INTO `zyads_class` VALUES ('149', '电子家电', '2', '1');
INSERT INTO `zyads_class` VALUES ('150', '金融投资', '2', '1');
INSERT INTO `zyads_class` VALUES ('151', '团购', '2', '1');
INSERT INTO `zyads_class` VALUES ('152', '交友', '2', '1');
INSERT INTO `zyads_class` VALUES ('153', '键身美容', '2', '1');
INSERT INTO `zyads_class` VALUES ('154', '保险', '2', '1');
INSERT INTO `zyads_class` VALUES ('155', '医疗保健', '2', '1');
INSERT INTO `zyads_class` VALUES ('156', '娱乐行业', '2', '1');
INSERT INTO `zyads_class` VALUES ('157', '教育学校', '2', '1');
INSERT INTO `zyads_class` VALUES ('158', '服装时尚', '2', '1');
INSERT INTO `zyads_class` VALUES ('159', '网络游戏', '2', '1');
INSERT INTO `zyads_class` VALUES ('160', '旅游酒店', '2', '1');

-- ----------------------------
-- Table structure for `zyads_cpa_report`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_cpa_report`;
CREATE TABLE `zyads_cpa_report` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(250) NOT NULL,
  `uid` mediumint(9) unsigned NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `cpastatus` varchar(100) DEFAULT NULL,
  `num` int(8) NOT NULL DEFAULT '1',
  `price` double(10,4) NOT NULL,
  `priceadv` double(10,4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `day` date NOT NULL,
  `addtime` datetime NOT NULL,
  `confirmtime` datetime NOT NULL,
  `planid` mediumint(9) NOT NULL DEFAULT '0',
  `adsid` mediumint(9) NOT NULL DEFAULT '0',
  `zoneid` mediumint(9) NOT NULL DEFAULT '0',
  `siteid` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`unique_id`,`planid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_cpa_report
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_day`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_day`;
CREATE TABLE `zyads_day` (
  `day` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_day
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_gift`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_gift`;
CREATE TABLE `zyads_gift` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `integral` int(11) unsigned NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `num` int(8) unsigned NOT NULL DEFAULT '0',
  `top` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `addtime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_gift
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_giftlog`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_giftlog`;
CREATE TABLE `zyads_giftlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `giftid` int(10) unsigned NOT NULL,
  `integral` int(10) unsigned NOT NULL,
  `contact` varchar(20) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `addtime` datetime NOT NULL,
  `deliverytime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('y','n') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_giftlog
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_group`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_group`;
CREATE TABLE `zyads_group` (
  `groupid` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(20) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_group
-- ----------------------------
INSERT INTO `zyads_group` VALUES ('1', '普通站长');
INSERT INTO `zyads_group` VALUES ('2', '高级站长');
INSERT INTO `zyads_group` VALUES ('3', 'VIP站长');
INSERT INTO `zyads_group` VALUES ('4', '联盟站长');
INSERT INTO `zyads_group` VALUES ('5', '作弊站长');

-- ----------------------------
-- Table structure for `zyads_import`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_import`;
CREATE TABLE `zyads_import` (
  `importid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `planid` mediumint(9) NOT NULL,
  `numaff` mediumint(9) NOT NULL DEFAULT '1',
  `numadv` mediumint(9) NOT NULL DEFAULT '0',
  `orders` varchar(255) DEFAULT NULL,
  `userproportion` tinyint(3) NOT NULL DEFAULT '0',
  `advproportion` tinyint(3) NOT NULL DEFAULT '0',
  `userprice` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `advprice` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumadvpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumprofit` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `ordersprices` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `day` date NOT NULL,
  `addtime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`importid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_import
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_level`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_level`;
CREATE TABLE `zyads_level` (
  `levelid` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `levelname` varchar(20) NOT NULL,
  `levelcommission` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `commissiontime` tinyint(3) unsigned NOT NULL DEFAULT '30',
  `leveldeduction` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`levelid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_level
-- ----------------------------
INSERT INTO `zyads_level` VALUES ('22', '优等会员', '0', '0', '0');
INSERT INTO `zyads_level` VALUES ('23', '普通会员', '80', '0', '0');
INSERT INTO `zyads_level` VALUES ('21', '白金会员', '0', '0', '0');

-- ----------------------------
-- Table structure for `zyads_log_browser`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_log_browser`;
CREATE TABLE `zyads_log_browser` (
  `browser` varchar(20) NOT NULL,
  `ver` varchar(50) NOT NULL,
  `kernel` varchar(20) NOT NULL,
  `num` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `day` date NOT NULL,
  UNIQUE KEY `day` (`day`,`uid`,`browser`,`ver`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_log_browser
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_log_city_isp`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_log_city_isp`;
CREATE TABLE `zyads_log_city_isp` (
  `province` tinyint(3) unsigned NOT NULL,
  `city` smallint(3) unsigned NOT NULL,
  `isp` tinyint(3) unsigned NOT NULL,
  `num` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `day` date NOT NULL,
  UNIQUE KEY `day` (`day`,`uid`,`province`,`city`,`isp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_log_city_isp
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_log_hour`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_log_hour`;
CREATE TABLE `zyads_log_hour` (
  `day` date NOT NULL,
  `plantype` varchar(6) NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `advuid` mediumint(9) NOT NULL,
  `uid` mediumint(9) unsigned NOT NULL,
  `hour0` mediumint(9) unsigned NOT NULL,
  `hour1` mediumint(9) unsigned NOT NULL,
  `hour2` mediumint(9) unsigned NOT NULL,
  `hour3` mediumint(9) unsigned NOT NULL,
  `hour4` mediumint(9) unsigned NOT NULL,
  `hour5` mediumint(9) unsigned NOT NULL,
  `hour6` mediumint(9) unsigned NOT NULL,
  `hour7` mediumint(9) unsigned NOT NULL,
  `hour8` mediumint(9) unsigned NOT NULL,
  `hour9` mediumint(9) unsigned NOT NULL,
  `hour10` mediumint(9) unsigned NOT NULL,
  `hour11` mediumint(9) unsigned NOT NULL,
  `hour12` mediumint(9) unsigned NOT NULL,
  `hour13` mediumint(9) unsigned NOT NULL,
  `hour14` mediumint(9) unsigned NOT NULL,
  `hour15` mediumint(9) unsigned NOT NULL,
  `hour16` mediumint(9) unsigned NOT NULL,
  `hour17` mediumint(9) unsigned NOT NULL,
  `hour18` mediumint(9) unsigned NOT NULL,
  `hour19` mediumint(9) unsigned NOT NULL,
  `hour20` mediumint(9) unsigned NOT NULL,
  `hour21` mediumint(9) unsigned NOT NULL,
  `hour22` mediumint(9) unsigned NOT NULL,
  `hour23` mediumint(9) unsigned NOT NULL,
  UNIQUE KEY `day` (`day`,`plantype`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_log_hour
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_log_login`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_log_login`;
CREATE TABLE `zyads_log_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `ip` char(15) NOT NULL,
  `time` datetime NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=219 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_log_login
-- ----------------------------
INSERT INTO `zyads_log_login` VALUES ('213', 'admin', '0', '122.242.69.118', '2016-06-01 12:41:47', '2');
INSERT INTO `zyads_log_login` VALUES ('214', 'admin', '0', '122.242.69.118', '2016-06-01 12:41:53', '2');
INSERT INTO `zyads_log_login` VALUES ('215', 'admin', '0', '122.242.69.118', '2016-06-01 12:42:21', '2');
INSERT INTO `zyads_log_login` VALUES ('216', 'admin', '0', '122.242.69.118', '2016-06-01 12:42:23', '2');
INSERT INTO `zyads_log_login` VALUES ('217', 'admin', '0', '122.242.69.118', '2016-06-01 12:42:26', '1');
INSERT INTO `zyads_log_login` VALUES ('218', 'admin', '0', '122.242.69.118', '2016-06-01 12:45:32', '1');

-- ----------------------------
-- Table structure for `zyads_log_os`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_log_os`;
CREATE TABLE `zyads_log_os` (
  `os` varchar(20) NOT NULL,
  `mobile` enum('y','n') NOT NULL,
  `num` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `day` date NOT NULL,
  UNIQUE KEY `day` (`day`,`uid`,`os`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_log_os
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_log_screen`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_log_screen`;
CREATE TABLE `zyads_log_screen` (
  `screen` varchar(20) NOT NULL,
  `num` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `day` date NOT NULL,
  UNIQUE KEY `day` (`day`,`uid`,`screen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_log_screen
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_log_search`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_log_search`;
CREATE TABLE `zyads_log_search` (
  `search` varchar(20) NOT NULL,
  `search_url` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `uid` mediumint(8) NOT NULL,
  `day` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_log_search
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_log_visit`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_log_visit`;
CREATE TABLE `zyads_log_visit` (
  `planid` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `adsid` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `zoneid` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `referer_type` tinyint(1) unsigned DEFAULT '0',
  `referer_url` varchar(255) DEFAULT NULL,
  `referer_keyword` varchar(255) DEFAULT NULL,
  `siteid` mediumint(8) NOT NULL DEFAULT '0',
  `site_page` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `browser_name` varchar(10) DEFAULT NULL,
  `browser_kernel` varchar(20) DEFAULT NULL,
  `browser_version` varchar(20) DEFAULT NULL,
  `useragent` text,
  `os` varchar(50) DEFAULT NULL,
  `screen` varchar(20) DEFAULT NULL,
  `pdf` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `flash` varchar(20) DEFAULT '0',
  `java` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cookie` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ip` char(16) NOT NULL,
  `browser_lang` varchar(20) DEFAULT NULL,
  `region_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `city_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `isp_id` tinyint(3) NOT NULL DEFAULT '0',
  `price` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `priceadv` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `first_time` datetime NOT NULL,
  `last_time` datetime NOT NULL,
  `deduction` enum('y','n') NOT NULL DEFAULT 'n',
  `fail` varchar(20) DEFAULT NULL,
  `visitnum` smallint(3) NOT NULL DEFAULT '0',
  `ch` mediumint(8) NOT NULL DEFAULT '0',
  `is_mobile` enum('y','n') NOT NULL DEFAULT 'n',
  `xy` varchar(255) DEFAULT NULL,
  `xxyy` varchar(255) DEFAULT NULL,
  KEY `last_time` (`last_time`),
  KEY `ip` (`ip`),
  KEY `planid` (`planid`),
  KEY `adsid` (`adsid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_log_visit
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_msg`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_msg`;
CREATE TABLE `zyads_msg` (
  `messageid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `color` char(7) DEFAULT NULL,
  `addtime` datetime NOT NULL,
  `sendusername` varchar(50) NOT NULL,
  `rid0` mediumtext,
  `rid1` mediumtext,
  `rid2` mediumtext,
  `rid3` mediumtext,
  `rid4` mediumtext,
  `rid5` mediumtext,
  `rid6` mediumtext,
  `rid7` mediumtext,
  `rid8` mediumtext,
  `rid9` mediumtext,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  PRIMARY KEY (`messageid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_msg
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_oauth`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_oauth`;
CREATE TABLE `zyads_oauth` (
  `uid` mediumint(8) NOT NULL,
  `type` varchar(50) NOT NULL,
  `openid` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_oauth
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_onlinepay`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_onlinepay`;
CREATE TABLE `zyads_onlinepay` (
  `onlineid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `imoney` double(10,2) NOT NULL DEFAULT '0.00',
  `paytype` char(10) NOT NULL,
  `addtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `orderid` varchar(50) NOT NULL,
  `adminuser` varchar(50) NOT NULL,
  `payinfo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`onlineid`),
  KEY `orderid` (`orderid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM AUTO_INCREMENT=262 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_onlinepay
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_order`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_order`;
CREATE TABLE `zyads_order` (
  `orderid` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `ordersn` varchar(20) NOT NULL,
  `orderamount` double(10,2) NOT NULL,
  `goodsname` text NOT NULL,
  `goodsprice` text NOT NULL,
  `goodsclassid` text NOT NULL,
  `goodsmark` text NOT NULL,
  `proportionaff` varchar(50) NOT NULL,
  `proportionadv` varchar(50) NOT NULL,
  `payamountaff` double(10,2) NOT NULL,
  `payamountadv` double(10,2) NOT NULL,
  `orderstatus` varchar(255) DEFAULT NULL,
  `shipstatus` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `paystatus` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(9) NOT NULL,
  `planid` mediumint(9) NOT NULL DEFAULT '0',
  `adsid` mediumint(9) NOT NULL DEFAULT '0',
  `zoneid` mediumint(9) NOT NULL DEFAULT '0',
  `siteid` mediumint(9) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `day` date NOT NULL,
  `addtime` datetime NOT NULL,
  `confirmtime` datetime NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_order
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_paylog`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_paylog`;
CREATE TABLE `zyads_paylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) DEFAULT NULL,
  `xmoney` varchar(20) DEFAULT NULL,
  `money` varchar(20) DEFAULT NULL,
  `tax` varchar(20) DEFAULT NULL,
  `charges` varchar(20) DEFAULT NULL,
  `pay` varchar(20) DEFAULT NULL,
  `clearingadmin` varchar(20) DEFAULT NULL,
  `paytime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `scale` double(8,2) NOT NULL DEFAULT '0.00',
  `realmoney` double(10,4) NOT NULL DEFAULT '0.0000',
  `payinfo` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` date NOT NULL DEFAULT '0000-00-00',
  `clearingtype` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`uid`,`addtime`,`clearingtype`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_plan`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_plan`;
CREATE TABLE `zyads_plan` (
  `planid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `planname` char(50) NOT NULL,
  `price` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `priceadv` decimal(10,4) DEFAULT '0.0000',
  `mobile_price` float NOT NULL DEFAULT '1',
  `gradeprice` tinyint(1) NOT NULL DEFAULT '0',
  `siteprice` text NOT NULL,
  `classprice` text NOT NULL,
  `priceinfo` varchar(50) DEFAULT NULL,
  `budget` int(11) NOT NULL DEFAULT '0',
  `expire` date NOT NULL DEFAULT '0000-00-00',
  `checkplan` mediumtext NOT NULL,
  `plantype` varchar(10) NOT NULL DEFAULT '',
  `profit` tinyint(3) NOT NULL DEFAULT '0',
  `deduction` tinyint(3) DEFAULT '0',
  `clearing` varchar(10) NOT NULL,
  `stopaudit` tinyint(1) NOT NULL DEFAULT '1',
  `datatime` varchar(20) DEFAULT NULL,
  `planinfo` mediumtext,
  `audit` char(1) NOT NULL DEFAULT 'n',
  `restrictions` tinyint(1) NOT NULL DEFAULT '1',
  `resuid` mediumtext,
  `sitelimit` tinyint(1) NOT NULL DEFAULT '1',
  `limitsiteid` mediumtext,
  `in_site` tinyint(1) NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL DEFAULT '0',
  `logo` varchar(255) DEFAULT NULL,
  `mark` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` datetime NOT NULL,
  `billingtype` tinyint(1) NOT NULL DEFAULT '0',
  `pkey` varchar(20) DEFAULT NULL,
  `linkon` enum('y','n') NOT NULL DEFAULT 'n',
  `linkurl` varchar(255) NOT NULL,
  `cookie` mediumint(6) NOT NULL DEFAULT '30',
  `classid` mediumint(8) NOT NULL DEFAULT '0',
  `size` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`planid`),
  KEY `plantype` (`plantype`),
  KEY `uid` (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_plan
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_report`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_report`;
CREATE TABLE `zyads_report` (
  `uid` int(9) NOT NULL,
  `orderamount` decimal(10,2) NOT NULL,
  `ordernum` int(9) unsigned NOT NULL DEFAULT '0',
  `orderpaynum` int(9) unsigned NOT NULL DEFAULT '0',
  `payamount` decimal(10,2) NOT NULL,
  `pay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `day` date NOT NULL,
  UNIQUE KEY `unique` (`uid`,`day`),
  KEY `day` (`day`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_report
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_roles`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_roles`;
CREATE TABLE `zyads_roles` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `action` text NOT NULL,
  `native` enum('y','n') NOT NULL DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_roles
-- ----------------------------
INSERT INTO `zyads_roles` VALUES ('1', '超级管理员', 'a:137:{i:0;s:17:\"settings.get_list\";i:1;s:20:\"settings.update_post\";i:2;s:14:\"roles.get_list\";i:3;s:14:\"roles.add_post\";i:4;s:17:\"roles.update_post\";i:5;s:9:\"roles.del\";i:6;s:22:\"administrator.get_list\";i:7;s:22:\"administrator.add_post\";i:8;s:25:\"administrator.update_post\";i:9;s:17:\"administrator.del\";i:10;s:18:\"administrator.lock\";i:11;s:20:\"administrator.unlock\";i:12;s:12:\"pay.get_list\";i:13;s:16:\"pay.post_payment\";i:14;s:7:\"pay.del\";i:15;s:11:\"pay.add_pay\";i:16;s:18:\"onlinepay.get_list\";i:17;s:22:\"onlinepay.post_add_pay\";i:18;s:15:\"stats.plan_list\";i:19;s:15:\"stats.user_list\";i:20;s:14:\"stats.ads_list\";i:21;s:15:\"stats.zone_list\";i:22;s:9:\"stats.del\";i:23;s:15:\"orders.get_list\";i:24;s:10:\"orders.del\";i:25;s:11:\"orders.lock\";i:26;s:13:\"orders.unlock\";i:27;s:19:\"cpa_report.get_list\";i:28;s:14:\"cpa_report.del\";i:29;s:15:\"cpa_report.lock\";i:30;s:17:\"cpa_report.unlock\";i:31;s:11:\"ip.get_list\";i:32;s:6:\"ip.del\";i:33;s:11:\"ip.truncate\";i:34;s:14:\"trend.get_list\";i:35;s:9:\"trend.del\";i:36;s:24:\"client_trend.get_browser\";i:37;s:23:\"client_trend.get_screen\";i:38;s:20:\"client_trend.get_isp\";i:39;s:21:\"client_trend.get_city\";i:40;s:19:\"client_trend.get_os\";i:41;s:21:\"search_trend.get_list\";i:42;s:15:\"import.get_list\";i:43;s:15:\"import.add_post\";i:44;s:17:\"import.revocation\";i:45;s:10:\"import.del\";i:46;s:13:\"site.get_list\";i:47;s:13:\"site.add_post\";i:48;s:16:\"site.update_post\";i:49;s:8:\"site.del\";i:50;s:9:\"site.lock\";i:51;s:11:\"site.unlock\";i:52;s:16:\"site.get_alexapr\";i:53;s:13:\"zone.get_list\";i:54;s:16:\"zone.update_post\";i:55;s:8:\"zone.del\";i:56;s:9:\"zone.lock\";i:57;s:11:\"zone.unlock\";i:58;s:11:\"ad.get_list\";i:59;s:11:\"ad.add_post\";i:60;s:14:\"ad.update_post\";i:61;s:6:\"ad.del\";i:62;s:7:\"ad.lock\";i:63;s:9:\"ad.unlock\";i:64;s:15:\"ad.implant_zone\";i:65;s:13:\"plan.get_list\";i:66;s:13:\"plan.add_post\";i:67;s:16:\"plan.update_post\";i:68;s:8:\"plan.del\";i:69;s:9:\"plan.lock\";i:70;s:11:\"plan.unlock\";i:71;s:14:\"apply.get_list\";i:72;s:9:\"apply.del\";i:73;s:10:\"apply.lock\";i:74;s:12:\"apply.unlock\";i:75;s:19:\"user.affiliate_list\";i:76;s:20:\"user.advertiser_list\";i:77;s:20:\"user.commercial_list\";i:78;s:17:\"user.service_list\";i:79;s:13:\"user.add_post\";i:80;s:16:\"user.update_post\";i:81;s:8:\"user.del\";i:82;s:9:\"user.lock\";i:83;s:11:\"user.unlock\";i:84;s:14:\"group.get_list\";i:85;s:14:\"group.add_post\";i:86;s:17:\"group.update_post\";i:87;s:9:\"group.del\";i:88;s:10:\"group.lock\";i:89;s:12:\"group.unlock\";i:90;s:16:\"article.get_list\";i:91;s:16:\"article.add_post\";i:92;s:19:\"article.update_post\";i:93;s:11:\"article.del\";i:94;s:12:\"article.lock\";i:95;s:14:\"article.unlock\";i:96;s:15:\"syslog.get_list\";i:97;s:17:\"loginlog.get_list\";i:98;s:16:\"giftlog.get_list\";i:99;s:11:\"giftlog.del\";i:100;s:16:\"giftlog.delivery\";i:101;s:13:\"gift.get_list\";i:102;s:13:\"gift.add_post\";i:103;s:16:\"gift.update_post\";i:104;s:8:\"gift.del\";i:105;s:9:\"gift.lock\";i:106;s:11:\"gift.unlock\";i:107;s:14:\"class.get_list\";i:108;s:14:\"class.add_post\";i:109;s:17:\"class.update_post\";i:110;s:9:\"class.del\";i:111;s:12:\"msg.get_list\";i:112;s:12:\"msg.add_post\";i:113;s:15:\"msg.update_post\";i:114;s:7:\"msg.del\";i:115;s:15:\"adtype.get_list\";i:116;s:15:\"adtype.add_post\";i:117;s:18:\"adtype.update_post\";i:118;s:10:\"adtype.del\";i:119;s:11:\"adtype.lock\";i:120;s:13:\"adtype.unlock\";i:121;s:14:\"adtpl.get_list\";i:122;s:14:\"adtpl.add_post\";i:123;s:17:\"adtpl.update_post\";i:124;s:9:\"adtpl.del\";i:125;s:10:\"adtpl.lock\";i:126;s:12:\"adtpl.unlock\";i:127;s:16:\"adstyle.get_list\";i:128;s:16:\"adstyle.add_post\";i:129;s:19:\"adstyle.update_post\";i:130;s:11:\"adstyle.del\";i:131;s:12:\"adstyle.lock\";i:132;s:14:\"adstyle.unlock\";i:133;s:14:\"specs.get_list\";i:134;s:14:\"specs.add_post\";i:135;s:17:\"specs.update_post\";i:136;s:9:\"specs.del\";}', 'n');
INSERT INTO `zyads_roles` VALUES ('2', '普通管理员', 'a:130:{i:0;s:17:\"settings.get_list\";i:1;s:20:\"settings.update_post\";i:2;s:14:\"roles.get_list\";i:3;s:14:\"roles.add_post\";i:4;s:17:\"roles.update_post\";i:5;s:9:\"roles.del\";i:6;s:22:\"administrator.get_list\";i:7;s:22:\"administrator.add_post\";i:8;s:25:\"administrator.update_post\";i:9;s:17:\"administrator.del\";i:10;s:18:\"administrator.lock\";i:11;s:20:\"administrator.unlock\";i:12;s:12:\"pay.get_list\";i:13;s:16:\"pay.post_payment\";i:14;s:7:\"pay.del\";i:15;s:11:\"pay.add_pay\";i:16;s:18:\"onlinepay.get_list\";i:17;s:22:\"onlinepay.post_add_pay\";i:18;s:15:\"stats.plan_list\";i:19;s:15:\"stats.user_list\";i:20;s:14:\"stats.ads_list\";i:21;s:15:\"stats.zone_list\";i:22;s:9:\"stats.del\";i:23;s:11:\"ip.get_list\";i:24;s:6:\"ip.del\";i:25;s:15:\"orders.get_list\";i:26;s:10:\"orders.del\";i:27;s:11:\"orders.lock\";i:28;s:13:\"orders.unlock\";i:29;s:19:\"cpa_report.get_list\";i:30;s:14:\"cpa_report.del\";i:31;s:15:\"cpa_report.lock\";i:32;s:17:\"cpa_report.unlock\";i:33;s:14:\"trend.get_list\";i:34;s:9:\"trend.del\";i:35;s:24:\"client_trend.get_browser\";i:36;s:23:\"client_trend.get_screen\";i:37;s:20:\"client_trend.get_isp\";i:38;s:21:\"client_trend.get_city\";i:39;s:19:\"client_trend.get_os\";i:40;s:21:\"search_trend.get_list\";i:41;s:15:\"import.get_list\";i:42;s:15:\"import.add_post\";i:43;s:17:\"import.revocation\";i:44;s:10:\"import.del\";i:45;s:13:\"site.get_list\";i:46;s:13:\"site.add_post\";i:47;s:16:\"site.update_post\";i:48;s:8:\"site.del\";i:49;s:9:\"site.lock\";i:50;s:11:\"site.unlock\";i:51;s:16:\"site.get_alexapr\";i:52;s:13:\"zone.get_list\";i:53;s:16:\"zone.update_post\";i:54;s:8:\"zone.del\";i:55;s:9:\"zone.lock\";i:56;s:11:\"zone.unlock\";i:57;s:11:\"ad.get_list\";i:58;s:11:\"ad.add_post\";i:59;s:14:\"ad.update_post\";i:60;s:6:\"ad.del\";i:61;s:7:\"ad.lock\";i:62;s:9:\"ad.unlock\";i:63;s:15:\"ad.implant_zone\";i:64;s:13:\"plan.get_list\";i:65;s:13:\"plan.add_post\";i:66;s:16:\"plan.update_post\";i:67;s:8:\"plan.del\";i:68;s:9:\"plan.lock\";i:69;s:11:\"plan.unlock\";i:70;s:14:\"apply.get_list\";i:71;s:9:\"apply.del\";i:72;s:10:\"apply.lock\";i:73;s:12:\"apply.unlock\";i:74;s:19:\"user.affiliate_list\";i:75;s:20:\"user.advertiser_list\";i:76;s:20:\"user.commercial_list\";i:77;s:17:\"user.service_list\";i:78;s:13:\"user.add_post\";i:79;s:16:\"user.update_post\";i:80;s:8:\"user.del\";i:81;s:9:\"user.lock\";i:82;s:11:\"user.unlock\";i:83;s:14:\"group.get_list\";i:84;s:14:\"group.add_post\";i:85;s:17:\"group.update_post\";i:86;s:9:\"group.del\";i:87;s:10:\"group.lock\";i:88;s:12:\"group.unlock\";i:89;s:16:\"article.get_list\";i:90;s:16:\"article.add_post\";i:91;s:19:\"article.update_post\";i:92;s:11:\"article.del\";i:93;s:12:\"article.lock\";i:94;s:14:\"article.unlock\";i:95;s:15:\"syslog.get_list\";i:96;s:17:\"loginlog.get_list\";i:97;s:16:\"giftlog.get_list\";i:98;s:11:\"giftlog.del\";i:99;s:16:\"giftlog.delivery\";i:100;s:13:\"gift.get_list\";i:101;s:13:\"gift.add_post\";i:102;s:16:\"gift.update_post\";i:103;s:8:\"gift.del\";i:104;s:9:\"gift.lock\";i:105;s:11:\"gift.unlock\";i:106;s:14:\"class.get_list\";i:107;s:14:\"class.add_post\";i:108;s:17:\"class.update_post\";i:109;s:9:\"class.del\";i:110;s:12:\"msg.get_list\";i:111;s:12:\"msg.add_post\";i:112;s:15:\"msg.update_post\";i:113;s:7:\"msg.del\";i:114;s:15:\"adtype.get_list\";i:115;s:15:\"adtype.add_post\";i:116;s:18:\"adtype.update_post\";i:117;s:10:\"adtype.del\";i:118;s:14:\"adtpl.get_list\";i:119;s:14:\"adtpl.add_post\";i:120;s:17:\"adtpl.update_post\";i:121;s:9:\"adtpl.del\";i:122;s:16:\"adstyle.get_list\";i:123;s:16:\"adstyle.add_post\";i:124;s:19:\"adstyle.update_post\";i:125;s:11:\"adstyle.del\";i:126;s:14:\"specs.get_list\";i:127;s:14:\"specs.add_post\";i:128;s:17:\"specs.update_post\";i:129;s:9:\"specs.del\";}', 'n');

-- ----------------------------
-- Table structure for `zyads_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_sessions`;
CREATE TABLE `zyads_sessions` (
  `session_id` char(32) NOT NULL,
  `session_expires` int(10) unsigned NOT NULL DEFAULT '0',
  `session_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_sessions
-- ----------------------------
INSERT INTO `zyads_sessions` VALUES ('3f0bbs8747pvhg5hpv2v6uldq5', '1464759934', 'succ|b:0;err|b:0;captcha_key|s:4:\"PIPY\";admin|a:6:{s:8:\"username\";s:5:\"admin\";s:8:\"password\";s:32:\"69c493d2955cf44753caee56d9b74013\";s:8:\"usertype\";s:1:\"1\";s:13:\"last_login_ip\";s:14:\"122.242.69.118\";s:15:\"last_login_time\";s:19:\"2016-06-01 12:42:26\";s:8:\"userhash\";s:32:\"5dccdc3d9b2691a7588bc12e45ff1c2b\";}');
INSERT INTO `zyads_sessions` VALUES ('l7j1iq43hkfj7hrutv0nitfe86', '1464759917', 'succ|b:0;err|b:0;');
INSERT INTO `zyads_sessions` VALUES ('1ar5ha9v9tvg69icnfnshulhp1', '1464759918', 'succ|b:0;err|b:0;');

-- ----------------------------
-- Table structure for `zyads_settings`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_settings`;
CREATE TABLE `zyads_settings` (
  `title` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_settings
-- ----------------------------
INSERT INTO `zyads_settings` VALUES ('sitename', '广告联盟');
INSERT INTO `zyads_settings` VALUES ('stats_type', 'cpc,cpm,cpv,cps,cpa');
INSERT INTO `zyads_settings` VALUES ('domain_limit', '1');
INSERT INTO `zyads_settings` VALUES ('url_key', '2fd3');
INSERT INTO `zyads_settings` VALUES ('pv_step', '10');
INSERT INTO `zyads_settings` VALUES ('opne_affiliate_register', '1');
INSERT INTO `zyads_settings` VALUES ('opne_advertiser_register', '1');
INSERT INTO `zyads_settings` VALUES ('register_status', '1');
INSERT INTO `zyads_settings` VALUES ('site_status', '0');
INSERT INTO `zyads_settings` VALUES ('24_hours_register_num', '1');
INSERT INTO `zyads_settings` VALUES ('ban_ip_register', '');
INSERT INTO `zyads_settings` VALUES ('login_check_code', '1');
INSERT INTO `zyads_settings` VALUES ('register_add_money_on', '0');
INSERT INTO `zyads_settings` VALUES ('register_add_money_type', 'day');
INSERT INTO `zyads_settings` VALUES ('register_add_money', '111');
INSERT INTO `zyads_settings` VALUES ('cpc_deduction', '0');
INSERT INTO `zyads_settings` VALUES ('cpm_deduction', '0');
INSERT INTO `zyads_settings` VALUES ('cpv_deduction', '0');
INSERT INTO `zyads_settings` VALUES ('cps_deduction', '0');
INSERT INTO `zyads_settings` VALUES ('cpa_deduction', '0');
INSERT INTO `zyads_settings` VALUES ('site_ip', '27.126.191.92');
INSERT INTO `zyads_settings` VALUES ('js_url', 'http://');
INSERT INTO `zyads_settings` VALUES ('img_url', 'http://');
INSERT INTO `zyads_settings` VALUES ('jump_url', 'http://');
INSERT INTO `zyads_settings` VALUES ('sync_setting', '');
INSERT INTO `zyads_settings` VALUES ('db_ms', '0');
INSERT INTO `zyads_settings` VALUES ('cache_type', 'file');
INSERT INTO `zyads_settings` VALUES ('memcached_host', '');
INSERT INTO `zyads_settings` VALUES ('memcached_port', '');
INSERT INTO `zyads_settings` VALUES ('cache_time', '1800');
INSERT INTO `zyads_settings` VALUES ('mail_send', '2');
INSERT INTO `zyads_settings` VALUES ('mail_server', 'smtp.exmail.qq.com');
INSERT INTO `zyads_settings` VALUES ('mail_port', '25');
INSERT INTO `zyads_settings` VALUES ('mail_auth', '1');
INSERT INTO `zyads_settings` VALUES ('mail_from', 'a@zyiis.com.cn');
INSERT INTO `zyads_settings` VALUES ('mail_username', 'a@zyiis.com.cn');
INSERT INTO `zyads_settings` VALUES ('mail_password', 'b3e575079');
INSERT INTO `zyads_settings` VALUES ('min_pay', '100');
INSERT INTO `zyads_settings` VALUES ('default_pay', 'alipay');
INSERT INTO `zyads_settings` VALUES ('alipay_email', '');
INSERT INTO `zyads_settings` VALUES ('alipay_id', '');
INSERT INTO `zyads_settings` VALUES ('alipay_key', '');
INSERT INTO `zyads_settings` VALUES ('tenpay_id', '');
INSERT INTO `zyads_settings` VALUES ('tenpay_key', '');
INSERT INTO `zyads_settings` VALUES ('99bill_id', '');
INSERT INTO `zyads_settings` VALUES ('99bill_key', '');
INSERT INTO `zyads_settings` VALUES ('chinabank_id', '');
INSERT INTO `zyads_settings` VALUES ('chinabank_key', '');
INSERT INTO `zyads_settings` VALUES ('min_clearing', '100');
INSERT INTO `zyads_settings` VALUES ('clearing_atuo', '0');
INSERT INTO `zyads_settings` VALUES ('tax_status', '0');
INSERT INTO `zyads_settings` VALUES ('clearing_charges', '0');
INSERT INTO `zyads_settings` VALUES ('clearing_cycle', 'day,week,month');
INSERT INTO `zyads_settings` VALUES ('clearing_weekdata', '5');
INSERT INTO `zyads_settings` VALUES ('clearing_monthdata', '19');
INSERT INTO `zyads_settings` VALUES ('zy_cloud', '1');
INSERT INTO `zyads_settings` VALUES ('ban_ip_admin', '');
INSERT INTO `zyads_settings` VALUES ('integral_status', '0');
INSERT INTO `zyads_settings` VALUES ('integral_daypv', '10');
INSERT INTO `zyads_settings` VALUES ('integral_day', '1');
INSERT INTO `zyads_settings` VALUES ('integral_topay', '0.5');
INSERT INTO `zyads_settings` VALUES ('recommend_status', '2');
INSERT INTO `zyads_settings` VALUES ('recommend_tc', '2');
INSERT INTO `zyads_settings` VALUES ('show_text_nouserstatus', '用户没有激活');
INSERT INTO `zyads_settings` VALUES ('show_text_domain_limit', '当前域名已被限制投放');
INSERT INTO `zyads_settings` VALUES ('show_text_notad', '没有可以展示的广告');
INSERT INTO `zyads_settings` VALUES ('oauth_qq_app_id', '');
INSERT INTO `zyads_settings` VALUES ('oauth_qq_app_key', '');
INSERT INTO `zyads_settings` VALUES ('tomail', '');
INSERT INTO `zyads_settings` VALUES ('authorized_url', 'bibilm.com');

-- ----------------------------
-- Table structure for `zyads_site`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_site`;
CREATE TABLE `zyads_site` (
  `siteid` int(9) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `sitename` varchar(200) NOT NULL,
  `siteurl` varchar(200) NOT NULL,
  `pertainurl` mediumtext,
  `sitetype` varchar(100) NOT NULL,
  `siteinfo` mediumtext,
  `dayip` mediumint(8) NOT NULL DEFAULT '0',
  `sex` tinyint(1) NOT NULL DEFAULT '1',
  `age` tinyint(1) NOT NULL DEFAULT '1',
  `occupation` tinyint(1) NOT NULL DEFAULT '1',
  `income` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `denyinfo` varchar(255) DEFAULT NULL,
  `alexapr` varchar(20) DEFAULT '0',
  `alexa` mediumint(8) NOT NULL DEFAULT '0',
  `pr` tinyint(3) NOT NULL DEFAULT '0',
  `beian` varchar(30) DEFAULT NULL,
  `grade` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`siteid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_site
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_specs`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_specs`;
CREATE TABLE `zyads_specs` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `width` smallint(4) NOT NULL DEFAULT '0',
  `height` smallint(4) NOT NULL DEFAULT '0',
  `sort` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_specs
-- ----------------------------
INSERT INTO `zyads_specs` VALUES ('1', '760', '90', '1');
INSERT INTO `zyads_specs` VALUES ('2', '728', '90', '1');
INSERT INTO `zyads_specs` VALUES ('3', '580', '90', '1');
INSERT INTO `zyads_specs` VALUES ('4', '468', '60', '1');
INSERT INTO `zyads_specs` VALUES ('5', '960', '60', '1');
INSERT INTO `zyads_specs` VALUES ('6', '460', '60', '1');
INSERT INTO `zyads_specs` VALUES ('7', '640', '60', '1');
INSERT INTO `zyads_specs` VALUES ('8', '960', '90', '1');
INSERT INTO `zyads_specs` VALUES ('9', '250', '250', '1');
INSERT INTO `zyads_specs` VALUES ('10', '200', '200', '1');
INSERT INTO `zyads_specs` VALUES ('11', '336', '280', '1');
INSERT INTO `zyads_specs` VALUES ('12', '300', '250', '1');
INSERT INTO `zyads_specs` VALUES ('13', '360', '300', '1');
INSERT INTO `zyads_specs` VALUES ('14', '160', '600', '1');
INSERT INTO `zyads_specs` VALUES ('15', '120', '600', '1');
INSERT INTO `zyads_specs` VALUES ('16', '640', '96', '1');
INSERT INTO `zyads_specs` VALUES ('17', '120', '270', '1');
INSERT INTO `zyads_specs` VALUES ('22', '760', '130', '1');
INSERT INTO `zyads_specs` VALUES ('19', '250', '200', '1');
INSERT INTO `zyads_specs` VALUES ('21', '120', '120', '1');
INSERT INTO `zyads_specs` VALUES ('23', '600', '500', '1');
INSERT INTO `zyads_specs` VALUES ('24', '640', '960', '1');
INSERT INTO `zyads_specs` VALUES ('25', '320', '480', '1');
INSERT INTO `zyads_specs` VALUES ('26', '640', '100', '1');
INSERT INTO `zyads_specs` VALUES ('27', '480', '75', '1');
INSERT INTO `zyads_specs` VALUES ('28', '320', '50', '1');
INSERT INTO `zyads_specs` VALUES ('29', '240', '38', '1');
INSERT INTO `zyads_specs` VALUES ('30', '120', '240', '1');
INSERT INTO `zyads_specs` VALUES ('31', '125', '125', '1');
INSERT INTO `zyads_specs` VALUES ('32', '256', '58', '1');
INSERT INTO `zyads_specs` VALUES ('33', '300', '50', '1');
INSERT INTO `zyads_specs` VALUES ('34', '180', '150', '1');
INSERT INTO `zyads_specs` VALUES ('35', '240', '180', '1');
INSERT INTO `zyads_specs` VALUES ('36', '264', '160', '1');
INSERT INTO `zyads_specs` VALUES ('37', '300', '100', '1');
INSERT INTO `zyads_specs` VALUES ('38', '480', '160', '1');
INSERT INTO `zyads_specs` VALUES ('39', '500', '200', '1');
INSERT INTO `zyads_specs` VALUES ('40', '640', '90', '1');
INSERT INTO `zyads_specs` VALUES ('41', '950', '90', '1');
INSERT INTO `zyads_specs` VALUES ('42', '1000', '90', '1');
INSERT INTO `zyads_specs` VALUES ('43', '230', '300', '1');
INSERT INTO `zyads_specs` VALUES ('44', '320', '75', '1');

-- ----------------------------
-- Table structure for `zyads_stats`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_stats`;
CREATE TABLE `zyads_stats` (
  `views` mediumint(8) NOT NULL DEFAULT '0',
  `num` mediumint(8) NOT NULL DEFAULT '0',
  `effectnum` mediumint(8) NOT NULL DEFAULT '0',
  `do2click` mediumint(8) NOT NULL DEFAULT '0',
  `clicks` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `day` date NOT NULL DEFAULT '0000-00-00',
  `planid` mediumint(8) NOT NULL DEFAULT '0',
  `adsid` mediumint(8) NOT NULL DEFAULT '0',
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `advuid` mediumint(8) NOT NULL,
  `siteid` mediumint(8) NOT NULL DEFAULT '0',
  `zoneid` mediumint(8) NOT NULL DEFAULT '0',
  `plantype` char(3) NOT NULL,
  `adtplid` mediumint(8) NOT NULL DEFAULT '0',
  `deduction` mediumint(8) NOT NULL DEFAULT '0',
  `sumprofit` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `sumadvpay` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `zuid` mediumint(8) NOT NULL DEFAULT '0',
  UNIQUE KEY `unique` (`day`,`zoneid`,`adsid`,`uid`,`planid`),
  KEY `day` (`day`),
  KEY `planid` (`planid`),
  KEY `uid` (`uid`),
  KEY `zoneid` (`zoneid`),
  KEY `plantype` (`uid`,`day`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_stats
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_syslog`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_syslog`;
CREATE TABLE `zyads_syslog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `ip` char(15) NOT NULL,
  `controller` varchar(20) NOT NULL,
  `action` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_syslog
-- ----------------------------
INSERT INTO `zyads_syslog` VALUES ('84', 'admin', '122.242.69.118', 'settings', 'update_post', 'array (\n  \'sitename\' => \'广告联盟\',\n  \'stats_type\' => \n  array (\n    0 => \'cpc\',\n    1 => \'cpm\',\n    2 => \'cpv\',\n    3 => \'cps\',\n    4 => \'cpa\',\n  ),\n  \'domain_limit\' => \'1\',\n  \'url_key\' => \'2fd3\',\n  \'pv_step\' => \'10\',\n  \'opne_affiliate_register\' => \'1\',\n  \'opne_advertiser_register\' => \'1\',\n  \'register_status\' => \'1\',\n  \'site_status\' => \'0\',\n  \'24_hours_register_num\' => \'1\',\n  \'ban_ip_register\' => \'\',\n  \'login_check_code\' => \'1\',\n  \'register_add_money_on\' => \'0\',\n  \'register_add_money_type\' => \'day\',\n  \'register_add_money\' => \'111\',\n  \'cpc_deduction\' => \'0\',\n  \'cpm_deduction\' => \'0\',\n  \'cpv_deduction\' => \'0\',\n  \'cps_deduction\' => \'0\',\n  \'cpa_deduction\' => \'0\',\n  \'site_ip\' => \'27.126.191.92\',\n  \'js_url\' => \'http://\',\n  \'img_url\' => \'http://\',\n  \'jump_url\' => \'http://\',\n  \'sync_setting\' => \'\',\n  \'db_ms\' => \'0\',\n  \'cache_type\' => \'file\',\n  \'memcached_host\' => \'\',\n  \'memcached_port\' => \'\',\n  \'cache_time\' => \'1800\',\n  \'mail_send\' => \'2\',\n  \'mail_server\' => \'smtp.exmail.qq.com\',\n  \'mail_port\' => \'25\',\n  \'mail_auth\' => \'1\',\n  \'mail_from\' => \'a@zyiis.com.cn\',\n  \'mail_username\' => \'a@zyiis.com.cn\',\n  \'mail_password\' => \'b3e575079\',\n  \'min_pay\' => \'100\',\n  \'default_pay\' => \'alipay\',\n  \'alipay_email\' => \'\',\n  \'alipay_id\' => \'\',\n  \'alipay_key\' => \'\',\n  \'tenpay_id\' => \'\',\n  \'tenpay_key\' => \'\',\n  \'99bill_id\' => \'\',\n  \'99bill_key\' => \'\',\n  \'chinabank_id\' => \'\',\n  \'chinabank_key\' => \'\',\n  \'min_clearing\' => \'100\',\n  \'clearing_atuo\' => \'0\',\n  \'tax_status\' => \'0\',\n  \'clearing_charges\' => \'0\',\n  \'clearing_cycle\' => \n  array (\n    0 => \'day\',\n    1 => \'week\',\n    2 => \'month\',\n  ),\n  \'clearing_weekdata\' => \'5\',\n  \'clearing_monthdata\' => \'19\',\n  \'zy_cloud\' => \'1\',\n  \'ban_ip_admin\' => \'\',\n  \'integral_status\' => \'0\',\n  \'integral_daypv\' => \'10\',\n  \'integral_day\' => \'1\',\n  \'integral_topay\' => \'0.5\',\n  \'recommend_status\' => \'2\',\n  \'recommend_tc\' => \'2\',\n  \'show_text_nouserstatus\' => \'用户没有激活\',\n  \'show_text_domain_limit\' => \'当前域名已被限制投放\',\n  \'show_text_notad\' => \'没有可以展示的广告\',\n  \'oauth_qq_app_id\' => \'\',\n  \'oauth_qq_app_key\' => \'\',\n)', '2016-06-01 12:45:15');
INSERT INTO `zyads_syslog` VALUES ('85', 'admin', '122.242.69.118', 'settings', 'update_post', 'array (\n  \'sitename\' => \'广告联盟\',\n  \'stats_type\' => \n  array (\n    0 => \'cpc\',\n    1 => \'cpm\',\n    2 => \'cpv\',\n    3 => \'cps\',\n    4 => \'cpa\',\n  ),\n  \'domain_limit\' => \'1\',\n  \'url_key\' => \'2fd3\',\n  \'pv_step\' => \'10\',\n  \'opne_affiliate_register\' => \'1\',\n  \'opne_advertiser_register\' => \'1\',\n  \'register_status\' => \'1\',\n  \'site_status\' => \'0\',\n  \'24_hours_register_num\' => \'1\',\n  \'ban_ip_register\' => \'\',\n  \'login_check_code\' => \'1\',\n  \'register_add_money_on\' => \'0\',\n  \'register_add_money_type\' => \'day\',\n  \'register_add_money\' => \'111\',\n  \'cpc_deduction\' => \'0\',\n  \'cpm_deduction\' => \'0\',\n  \'cpv_deduction\' => \'0\',\n  \'cps_deduction\' => \'0\',\n  \'cpa_deduction\' => \'0\',\n  \'site_ip\' => \'27.126.191.92\',\n  \'js_url\' => \'http://\',\n  \'img_url\' => \'http://\',\n  \'jump_url\' => \'http://\',\n  \'sync_setting\' => \'\',\n  \'db_ms\' => \'0\',\n  \'cache_type\' => \'file\',\n  \'memcached_host\' => \'\',\n  \'memcached_port\' => \'\',\n  \'cache_time\' => \'1800\',\n  \'mail_send\' => \'2\',\n  \'mail_server\' => \'smtp.exmail.qq.com\',\n  \'mail_port\' => \'25\',\n  \'mail_auth\' => \'1\',\n  \'mail_from\' => \'a@zyiis.com.cn\',\n  \'mail_username\' => \'a@zyiis.com.cn\',\n  \'mail_password\' => \'b3e575079\',\n  \'min_pay\' => \'100\',\n  \'default_pay\' => \'alipay\',\n  \'alipay_email\' => \'\',\n  \'alipay_id\' => \'\',\n  \'alipay_key\' => \'\',\n  \'tenpay_id\' => \'\',\n  \'tenpay_key\' => \'\',\n  \'99bill_id\' => \'\',\n  \'99bill_key\' => \'\',\n  \'chinabank_id\' => \'\',\n  \'chinabank_key\' => \'\',\n  \'min_clearing\' => \'100\',\n  \'clearing_atuo\' => \'0\',\n  \'tax_status\' => \'0\',\n  \'clearing_charges\' => \'0\',\n  \'clearing_cycle\' => \n  array (\n    0 => \'day\',\n    1 => \'week\',\n    2 => \'month\',\n  ),\n  \'clearing_weekdata\' => \'5\',\n  \'clearing_monthdata\' => \'19\',\n  \'zy_cloud\' => \'1\',\n  \'ban_ip_admin\' => \'\',\n  \'integral_status\' => \'0\',\n  \'integral_daypv\' => \'10\',\n  \'integral_day\' => \'1\',\n  \'integral_topay\' => \'0.5\',\n  \'recommend_status\' => \'2\',\n  \'recommend_tc\' => \'2\',\n  \'show_text_nouserstatus\' => \'用户没有激活\',\n  \'show_text_domain_limit\' => \'当前域名已被限制投放\',\n  \'show_text_notad\' => \'没有可以展示的广告\',\n  \'oauth_qq_app_id\' => \'\',\n  \'oauth_qq_app_key\' => \'\',\n  \'tomail\' => \'\',\n)', '2016-06-01 12:45:34');

-- ----------------------------
-- Table structure for `zyads_tempcip`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_tempcip`;
CREATE TABLE `zyads_tempcip` (
  `ip` char(15) NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `adsid` mediumint(8) NOT NULL DEFAULT '0',
  `zoneid` mediumint(8) NOT NULL DEFAULT '0',
  `day` date NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  KEY `ip` (`ip`),
  KEY `planid` (`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_tempcip
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_tempip`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_tempip`;
CREATE TABLE `zyads_tempip` (
  `ip` char(15) CHARACTER SET gbk NOT NULL,
  `planid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `adsid` mediumint(8) NOT NULL DEFAULT '0',
  `hour` tinyint(3) unsigned NOT NULL DEFAULT '0',
  KEY `ip` (`ip`),
  KEY `planid` (`planid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_tempip
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_update_log`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_update_log`;
CREATE TABLE `zyads_update_log` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `planid` mediumint(8) NOT NULL,
  `adsid` mediumint(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `old_data` varchar(255) NOT NULL,
  `new_data` varchar(255) NOT NULL,
  `diff` varchar(255) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_update_log
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_users`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_users`;
CREATE TABLE `zyads_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `email` varchar(40) NOT NULL,
  `qq` varchar(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `idcard` varchar(20) DEFAULT NULL,
  `levelid` mediumint(9) NOT NULL DEFAULT '0',
  `commissiontime` tinyint(3) NOT NULL DEFAULT '0',
  `usercommission` tinyint(3) NOT NULL DEFAULT '0',
  `accountname` varchar(120) NOT NULL,
  `bankbranch` varchar(20) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `bankaccount` varchar(120) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `recommend` varchar(8) DEFAULT NULL,
  `regtime` datetime NOT NULL,
  `regip` char(15) NOT NULL,
  `logintime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `loginnum` mediumint(8) NOT NULL DEFAULT '0',
  `loginip` char(15) NOT NULL DEFAULT '0.0.0.0',
  `deduction` varchar(255) NOT NULL,
  `zlink` varchar(255) NOT NULL,
  `money` double(12,4) DEFAULT '0.0000',
  `daymoney` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `weekmoney` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `monthmoney` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `xmoney` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `memo` varchar(200) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `serviceid` mediumint(8) NOT NULL DEFAULT '0',
  `messageid` text,
  `groupid` smallint(8) NOT NULL DEFAULT '0',
  `pvstep` smallint(4) NOT NULL DEFAULT '0',
  `insite` tinyint(1) NOT NULL DEFAULT '1',
  `recpm` tinyint(4) NOT NULL DEFAULT '0',
  `recpmtime` varchar(20) DEFAULT NULL,
  `integral` int(10) NOT NULL DEFAULT '0',
  `activateid` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `serviceid` (`serviceid`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_users
-- ----------------------------

-- ----------------------------
-- Table structure for `zyads_zone`
-- ----------------------------
DROP TABLE IF EXISTS `zyads_zone`;
CREATE TABLE `zyads_zone` (
  `zoneid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `siteid` mediumint(8) NOT NULL DEFAULT '0',
  `zonename` varchar(255) NOT NULL,
  `zoneinfo` varchar(255) NOT NULL,
  `plantype` char(3) NOT NULL,
  `adtplid` mediumint(8) NOT NULL,
  `adstyleid` mediumint(8) NOT NULL,
  `viewtype` tinyint(1) NOT NULL DEFAULT '0',
  `viewadsid` varchar(255) DEFAULT NULL,
  `specsid` smallint(6) NOT NULL,
  `width` smallint(6) NOT NULL DEFAULT '0',
  `height` smallint(6) NOT NULL DEFAULT '0',
  `codestyle` mediumtext NOT NULL,
  `addtime` datetime NOT NULL,
  `uptime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `htmlcontrol` mediumtext,
  PRIMARY KEY (`zoneid`),
  KEY `uid` (`uid`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zyads_zone
-- ----------------------------
