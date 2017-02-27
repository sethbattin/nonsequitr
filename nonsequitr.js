
if (typeof(console) != 'object') {
    console = {};
}
if (typeof(console.log) != 'function') {
    console.log = function(){;};
}
if (typeof(console.error) != 'function') {
    console.error = function(){;};
}

function nonsequitr_click(link, target) {
    jQuery(link).hide();
    jQuery(target).show();
    jQuery(target).on('click', function(evt){
        jQuery(this).hide();
        jQuery(link).show();
    });
}

jQuery(function($){
    
    var nonsequitr_init = function(number, f){
        var func = f;
        
        if (typeof(func) == 'string' &&
            typeof(window[func]) == 'function'
        ) {
            func = window[func];
        }
        if (typeof(func) != 'function') {
            var name = '';
            if (typeof(func) != 'undefined') {
                name = func.toString();
            }
            console.error('invalid consequitr function "' + name + '".');
            return;
        }
        
        $('a[data-nonsequitr=' + number + ']')[0].onclick = function (evt){
            console.log(evt);
            if (evt.target.dataset.nonsequitr != 'undefined') {
                evt.preventDefault();
                evt.stopPropagation();
                func(evt.target, $('div[data-nonsequitr=' + number + ']')[0]);
                return false;
            }
            return true;
        };
        
    };
    
    for (var number in nonsequitrs) {
        nonsequitr_init(number, nonsequitrs[number]);
    }
    
});