var __reflect = (this && this.__reflect) || function (p, c, t) {
    p.__class__ = c, t ? t.push(c) : t = [c], p.__types__ = p.__types__ ? t.concat(p.__types__) : t;
};
var __extends = this && this.__extends || function __extends(t, e) { 
 function r() { 
 this.constructor = t;
}
for (var i in e) e.hasOwnProperty(i) && (t[i] = e[i]);
r.prototype = e.prototype, t.prototype = new r();
};
/**
  * 背包面板
  * by dily
  * (c) copyright 2014 - 2035
  * All Rights Reserved.
  */
var game;
(function (game) {
    var BackpackMediator = (function (_super) {
        __extends(BackpackMediator, _super);
        function BackpackMediator(viewComponent) {
            if (viewComponent === void 0) { viewComponent = null; }
            var _this = _super.call(this, BackpackMediator.NAME, viewComponent) || this;
            _this.backpackPanel = new game.BackpackPanel();
            return _this;
        }
        BackpackMediator.prototype.listNotificationInterests = function () {
            return [
                PanelNotify.OPEN_BACKPACK,
                PanelNotify.CLOSE_BACKPACK
            ];
        };
        BackpackMediator.prototype.handleNotification = function (notification) {
            var data = notification.getBody();
            switch (notification.getName()) {
                case PanelNotify.OPEN_BACKPACK: {
                    //显示角色面板
                    this.showUI(this.backpackPanel, false, 0, 0, 1);
                    break;
                }
                case PanelNotify.CLOSE_BACKPACK: {
                    this.closePanel(1);
                    break;
                }
            }
        };
        /**
         * 初始化面板ui
         */
        BackpackMediator.prototype.initUI = function () {
            this.backpackPanel.closeBtn.addEventListener(egret.TouchEvent.TOUCH_TAP, this.closeButtonClick, this);
            this.backpackPanel.readProxy.addEventListener(egret.TouchEvent.TOUCH_TAP, this.readProxyButtonClick, this);
            this.backpackPanel.saveProxy.addEventListener(egret.TouchEvent.TOUCH_TAP, this.saveProxyButtonClick, this);
        };
        /**
         * 初始化面板数据
         */
        BackpackMediator.prototype.initData = function () {
        };
        BackpackMediator.prototype.saveProxyButtonClick = function (event) {
            P.getGameDataProxy().setGameName(this.backpackPanel.input1.text);
            this.backpackPanel.showText.text += "保存成功...\n" + P.getGameDataProxy().getGameName() + "\n";
        };
        BackpackMediator.prototype.readProxyButtonClick = function (event) {
            this.backpackPanel.showText.text += P.getGameDataProxy().getGameName() + "\n";
        };
        BackpackMediator.prototype.closeButtonClick = function (event) {
            this.closePanel(1);
        };
        BackpackMediator.NAME = "BackpackMediator";
        return BackpackMediator;
    }(BaseMediator));
    game.BackpackMediator = BackpackMediator;
    __reflect(BackpackMediator.prototype, "game.BackpackMediator");
})(game || (game = {}));
//# sourceMappingURL=BackpackMediator.js.map