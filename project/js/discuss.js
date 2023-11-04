// start: Coversation
document.querySelectorAll('.conversation-item-dropdown-toggle').forEach(function(item) {
    item.addEventListener('click', function(e) {
        e.preventDefault()
        if(this.parentElement.classList.contains('active')) {
            this.parentElement.classList.remove('active')
        } else {
            document.querySelectorAll('.conversation-item-dropdown').forEach(function(i) {
                i.classList.remove('active')
            })
            this.parentElement.classList.add('active')
        }
    });
});

document.addEventListener('click', function(e) {
    if(!e.target.matches('.conversation-item-dropdown, .conversation-item-dropdown *')) {
        document.querySelectorAll('.conversation-item-dropdown').forEach(function(i) {
            i.classList.remove('active')
        });
    }
});

document.querySelectorAll('.conversation-form-input').forEach(function(item) {
    item.addEventListener('input', function() {
        this.rows = this.value.split('\n').length
    });
});

document.querySelectorAll('[data-conversation]').forEach(function(item) {
    item.addEventListener('click', function(e) {
        e.preventDefault()
        document.querySelectorAll('.conversation').forEach(function(i) {
            i.classList.remove('active')
        });
        document.querySelector(this.dataset.conversation).classList.add('active')
    });
});

document.querySelectorAll('.conversation-back').forEach(function(item) {
    item.addEventListener('click', function(e) {
        e.preventDefault()
        this.closest('.conversation').classList.remove('active')
        document.querySelector('.conversation-default').classList.add('active')
    });
});
// end: Coversation












// Code goes here

// $(document).ready(function(){
//     $('input#filtersearch').bind('keyup change', function () {
//         if ($(this).val().trim().length !== 0) {
    
//             $('#list li').show().hide().each(function () {
//                 if ($(this).is(':icontains(' + $('input#filtersearch').val() + ')'))
//                     $(this).show();
//             });
//         }
//         else {
//             $('#list li').show().hide().each(function () {
//                 $(this).show();
//             });
//         }
//     });

//     $.expr[':'].icontains = function (obj, index, meta, stack) {
//         return (obj.textContent || obj.innerText || jQuery(obj).text() || '').toLowerCase().indexOf(meta[3].toLowerCase()) >= 0;
//     };
// });

