/*
 * Satoko Imageboard JavaScript
 * (c)Flashwave 2013-2015 <http://flash.moe>
 * Released under the Apache License Version 2
 */

var Satoko = {

    // Variables
    cookiePrefix: null,

    // Get or set cookie data
    cookieData: function(action, name, data) {
        
        switch(action) {
            
            case 'get':
                return (result = new RegExp('(^|; )' + encodeURIComponent(name) + '=([^;]*)').exec(document.cookie)) ? result[2] : '';
                
            case 'set':
                document.cookie = name + '=' + data;
                return true;
                
            default:
                return;
                
        }
        
    },
    
    changeStyle: function() {
        
    },
    
    // Set a style
    setStyle: function(title) {
        var i, a;
        var styles = document.getElementsByTagName('link');
        var t = false;
        
        this.cookieData('set', this.cookiePrefix + 'style', title);
        
        for(i = 0; (a = styles[i]); i++) {
            if(
                a.getAttribute('rel').indexOf('style') != -1 &&
                a.getAttribute('title')
            ) {
                a.disabled = (a.getAttribute('title') == title) ? false : true;
                t = true;
            }
        }
        
        if(!t && title != null)
            this.setStyle(styles[0]);
    }
    
};
