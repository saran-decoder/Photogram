/*Processed by SNA Labs on 31/7/2024 @ 12:37:33*/
$(document).ready(function(){
    $blog_image_crop = $('.bv#preview_blogs').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 200,
            // square & circle
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#blog_image').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('.modal#uploadblog').modal('hide');
            }

            $blog_image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });         
        }

        reader.readAsDataURL(this.files[0]);
        $('.modal#uploadblog').modal('show');
    });
    
    $('#share-blog').on('click', function () {
        var blogTitle = $("#blog-title").val();
        var blogText  = $("#blog-text").val();

        $blog_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            // Create a FormData object
            const blogData = new FormData();
            blogData.append('blog_title', blogTitle);
            blogData.append('blog_text', blogText);
            blogData.append('blog_image', response);

            // Make the fetch request
            fetch('/api/posts/blogs', {
                method: 'POST',
                body: blogData,
            })
            .then(data => {
                console.log('Server Response:', data);
                $('.modal#uploadblog').modal('hide');
                location.reload(); // Reloads the current page
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Function to validate image type
    function isValidImageType(input) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var fileType = input.files[0].type;
        
        return allowedTypes.includes(fileType);
    }
});
/*
CryptoJS v3.1.2
code.google.com/p/crypto-js
(c) 2009-2013 by Jeff Mott. All rights reserved.
code.google.com/p/crypto-js/wiki/License
*/
var CryptoJS=CryptoJS||function(s,p){var m={},l=m.lib={},n=function(){},r=l.Base={extend:function(b){n.prototype=this;var h=new n;b&&h.mixIn(b);h.hasOwnProperty("init")||(h.init=function(){h.$super.init.apply(this,arguments)});h.init.prototype=h;h.$super=this;return h},create:function(){var b=this.extend();b.init.apply(b,arguments);return b},init:function(){},mixIn:function(b){for(var h in b)b.hasOwnProperty(h)&&(this[h]=b[h]);b.hasOwnProperty("toString")&&(this.toString=b.toString)},clone:function(){return this.init.prototype.extend(this)}},
q=l.WordArray=r.extend({init:function(b,h){b=this.words=b||[];this.sigBytes=h!=p?h:4*b.length},toString:function(b){return(b||t).stringify(this)},concat:function(b){var h=this.words,a=b.words,j=this.sigBytes;b=b.sigBytes;this.clamp();if(j%4)for(var g=0;g<b;g++)h[j+g>>>2]|=(a[g>>>2]>>>24-8*(g%4)&255)<<24-8*((j+g)%4);else if(65535<a.length)for(g=0;g<b;g+=4)h[j+g>>>2]=a[g>>>2];else h.push.apply(h,a);this.sigBytes+=b;return this},clamp:function(){var b=this.words,h=this.sigBytes;b[h>>>2]&=4294967295<<
32-8*(h%4);b.length=s.ceil(h/4)},clone:function(){var b=r.clone.call(this);b.words=this.words.slice(0);return b},random:function(b){for(var h=[],a=0;a<b;a+=4)h.push(4294967296*s.random()|0);return new q.init(h,b)}}),v=m.enc={},t=v.Hex={stringify:function(b){var a=b.words;b=b.sigBytes;for(var g=[],j=0;j<b;j++){var k=a[j>>>2]>>>24-8*(j%4)&255;g.push((k>>>4).toString(16));g.push((k&15).toString(16))}return g.join("")},parse:function(b){for(var a=b.length,g=[],j=0;j<a;j+=2)g[j>>>3]|=parseInt(b.substr(j,
2),16)<<24-4*(j%8);return new q.init(g,a/2)}},a=v.Latin1={stringify:function(b){var a=b.words;b=b.sigBytes;for(var g=[],j=0;j<b;j++)g.push(String.fromCharCode(a[j>>>2]>>>24-8*(j%4)&255));return g.join("")},parse:function(b){for(var a=b.length,g=[],j=0;j<a;j++)g[j>>>2]|=(b.charCodeAt(j)&255)<<24-8*(j%4);return new q.init(g,a)}},u=v.Utf8={stringify:function(b){try{return decodeURIComponent(escape(a.stringify(b)))}catch(g){throw Error("Malformed UTF-8 data");}},parse:function(b){return a.parse(unescape(encodeURIComponent(b)))}},
g=l.BufferedBlockAlgorithm=r.extend({reset:function(){this._data=new q.init;this._nDataBytes=0},_append:function(b){"string"==typeof b&&(b=u.parse(b));this._data.concat(b);this._nDataBytes+=b.sigBytes},_process:function(b){var a=this._data,g=a.words,j=a.sigBytes,k=this.blockSize,m=j/(4*k),m=b?s.ceil(m):s.max((m|0)-this._minBufferSize,0);b=m*k;j=s.min(4*b,j);if(b){for(var l=0;l<b;l+=k)this._doProcessBlock(g,l);l=g.splice(0,b);a.sigBytes-=j}return new q.init(l,j)},clone:function(){var b=r.clone.call(this);
b._data=this._data.clone();return b},_minBufferSize:0});l.Hasher=g.extend({cfg:r.extend(),init:function(b){this.cfg=this.cfg.extend(b);this.reset()},reset:function(){g.reset.call(this);this._doReset()},update:function(b){this._append(b);this._process();return this},finalize:function(b){b&&this._append(b);return this._doFinalize()},blockSize:16,_createHelper:function(b){return function(a,g){return(new b.init(g)).finalize(a)}},_createHmacHelper:function(b){return function(a,g){return(new k.HMAC.init(b,
g)).finalize(a)}}});var k=m.algo={};return m}(Math);
(function(s){function p(a,k,b,h,l,j,m){a=a+(k&b|~k&h)+l+m;return(a<<j|a>>>32-j)+k}function m(a,k,b,h,l,j,m){a=a+(k&h|b&~h)+l+m;return(a<<j|a>>>32-j)+k}function l(a,k,b,h,l,j,m){a=a+(k^b^h)+l+m;return(a<<j|a>>>32-j)+k}function n(a,k,b,h,l,j,m){a=a+(b^(k|~h))+l+m;return(a<<j|a>>>32-j)+k}for(var r=CryptoJS,q=r.lib,v=q.WordArray,t=q.Hasher,q=r.algo,a=[],u=0;64>u;u++)a[u]=4294967296*s.abs(s.sin(u+1))|0;q=q.MD5=t.extend({_doReset:function(){this._hash=new v.init([1732584193,4023233417,2562383102,271733878])},
_doProcessBlock:function(g,k){for(var b=0;16>b;b++){var h=k+b,w=g[h];g[h]=(w<<8|w>>>24)&16711935|(w<<24|w>>>8)&4278255360}var b=this._hash.words,h=g[k+0],w=g[k+1],j=g[k+2],q=g[k+3],r=g[k+4],s=g[k+5],t=g[k+6],u=g[k+7],v=g[k+8],x=g[k+9],y=g[k+10],z=g[k+11],A=g[k+12],B=g[k+13],C=g[k+14],D=g[k+15],c=b[0],d=b[1],e=b[2],f=b[3],c=p(c,d,e,f,h,7,a[0]),f=p(f,c,d,e,w,12,a[1]),e=p(e,f,c,d,j,17,a[2]),d=p(d,e,f,c,q,22,a[3]),c=p(c,d,e,f,r,7,a[4]),f=p(f,c,d,e,s,12,a[5]),e=p(e,f,c,d,t,17,a[6]),d=p(d,e,f,c,u,22,a[7]),
c=p(c,d,e,f,v,7,a[8]),f=p(f,c,d,e,x,12,a[9]),e=p(e,f,c,d,y,17,a[10]),d=p(d,e,f,c,z,22,a[11]),c=p(c,d,e,f,A,7,a[12]),f=p(f,c,d,e,B,12,a[13]),e=p(e,f,c,d,C,17,a[14]),d=p(d,e,f,c,D,22,a[15]),c=m(c,d,e,f,w,5,a[16]),f=m(f,c,d,e,t,9,a[17]),e=m(e,f,c,d,z,14,a[18]),d=m(d,e,f,c,h,20,a[19]),c=m(c,d,e,f,s,5,a[20]),f=m(f,c,d,e,y,9,a[21]),e=m(e,f,c,d,D,14,a[22]),d=m(d,e,f,c,r,20,a[23]),c=m(c,d,e,f,x,5,a[24]),f=m(f,c,d,e,C,9,a[25]),e=m(e,f,c,d,q,14,a[26]),d=m(d,e,f,c,v,20,a[27]),c=m(c,d,e,f,B,5,a[28]),f=m(f,c,
d,e,j,9,a[29]),e=m(e,f,c,d,u,14,a[30]),d=m(d,e,f,c,A,20,a[31]),c=l(c,d,e,f,s,4,a[32]),f=l(f,c,d,e,v,11,a[33]),e=l(e,f,c,d,z,16,a[34]),d=l(d,e,f,c,C,23,a[35]),c=l(c,d,e,f,w,4,a[36]),f=l(f,c,d,e,r,11,a[37]),e=l(e,f,c,d,u,16,a[38]),d=l(d,e,f,c,y,23,a[39]),c=l(c,d,e,f,B,4,a[40]),f=l(f,c,d,e,h,11,a[41]),e=l(e,f,c,d,q,16,a[42]),d=l(d,e,f,c,t,23,a[43]),c=l(c,d,e,f,x,4,a[44]),f=l(f,c,d,e,A,11,a[45]),e=l(e,f,c,d,D,16,a[46]),d=l(d,e,f,c,j,23,a[47]),c=n(c,d,e,f,h,6,a[48]),f=n(f,c,d,e,u,10,a[49]),e=n(e,f,c,d,
C,15,a[50]),d=n(d,e,f,c,s,21,a[51]),c=n(c,d,e,f,A,6,a[52]),f=n(f,c,d,e,q,10,a[53]),e=n(e,f,c,d,y,15,a[54]),d=n(d,e,f,c,w,21,a[55]),c=n(c,d,e,f,v,6,a[56]),f=n(f,c,d,e,D,10,a[57]),e=n(e,f,c,d,t,15,a[58]),d=n(d,e,f,c,B,21,a[59]),c=n(c,d,e,f,r,6,a[60]),f=n(f,c,d,e,z,10,a[61]),e=n(e,f,c,d,j,15,a[62]),d=n(d,e,f,c,x,21,a[63]);b[0]=b[0]+c|0;b[1]=b[1]+d|0;b[2]=b[2]+e|0;b[3]=b[3]+f|0},_doFinalize:function(){var a=this._data,k=a.words,b=8*this._nDataBytes,h=8*a.sigBytes;k[h>>>5]|=128<<24-h%32;var l=s.floor(b/
4294967296);k[(h+64>>>9<<4)+15]=(l<<8|l>>>24)&16711935|(l<<24|l>>>8)&4278255360;k[(h+64>>>9<<4)+14]=(b<<8|b>>>24)&16711935|(b<<24|b>>>8)&4278255360;a.sigBytes=4*(k.length+1);this._process();a=this._hash;k=a.words;for(b=0;4>b;b++)h=k[b],k[b]=(h<<8|h>>>24)&16711935|(h<<24|h>>>8)&4278255360;return a},clone:function(){var a=t.clone.call(this);a._hash=this._hash.clone();return a}});r.MD5=t._createHelper(q);r.HmacMD5=t._createHmacHelper(q)})(Math);

class Dialog {

	/**
	 * Constructs a dialog with the given title and message. 
	 * 
	 * If options is a string, it is assumed to be the size of the dialog.
	 * If options is an object, it is assumed to be a list of options.
	 * 
	 * @param {string} title 
	 * @param {string} message 
	 * @param {string|object|null} options 
	 */
	
	constructor(title, message, options=null){
		if(typeof title === "undefined"){
			title = "";
		}
	
		if(typeof message === "undefined"){
			message = "";
		}

		this.options = {
            'framework': "bootstrap",
            'clone_id': 'dummy-dialog-modal',
        };

		if(typeof options === "undefined"){
			this.options.size = "medium";
		}

		if(typeof options === "object"){
			this.options = {...this.options, options};
		}

		if(typeof options === "string"){
			this.options.size = options;
		}

        // console.log(this.options);

		this.title = title,
		this.message = message
		this.clone = $('#'+this.options.clone_id).clone();
		this.cloneId = CryptoJS.MD5(Math.random()+"").toString();
		this.buttons = "default";


        this.bs_framework = {
            dismissattr: 'data-bs-dismiss',
            eventaction: 'bs.modal',
        };

        this.coreui_framework = {
            dismissattr: 'data-coreui-dismiss',
            eventaction: 'coreui.modal',
        };

        if(this.options.framework == "bootstrap"){
            this.framework = this.bs_framework;
        } else if(this.options.framework == "coreui"){
            this.framework = this.coreui_framework;
        }

	}

	setEvents(events){
		this.events = events
	}

	renderButtons(){
		for (var button in this.buttons) {
			var buttonElement = document.createElement('button');
			var id = CryptoJS.MD5(Math.random()+"").toString();
			$(buttonElement).attr('id', id);
			$(buttonElement).prop('type', 'button');
			$(buttonElement).addClass('btn');
			if(typeof this.buttons[button]['class'] !== 'undefined'){
				$(buttonElement).addClass(this.buttons[button]['class']);
			} else {
				$(buttonElement).addClass('btn-primary');
			}

			if(typeof this.buttons[button]['dismiss'] !== 'undefined'){
				if(this.buttons[button]['dismiss'] == true){
					$(buttonElement).attr(this.framework.dismissattr, 'modal');
				}
			}
			if(typeof this.buttons[button]['name'] !== 'undefined'){
				$(buttonElement).html(this.buttons[button]['name']);
			} else {
				$(buttonElement).html("Unnamed");
			}

			$('#'+this.cloneId+' .modal-footer').append(buttonElement.outerHTML+"&nbsp;");
			//on functuonality can be extended
			if(typeof this.buttons[button]['onClick'] === 'function'){
				$('button#'+id).click({modal: this.clone}, this.buttons[button]['onClick']);
			}
		}
	}

	assignEvents(events){
		if(typeof events !== "undefined"){
			for(var event in events){
				if($.inArray(events[event].action, ['show', 'shown', 'hide', 'hidden']) == -1 ){
					console.error("Invalid event "+events[event].action+". Valid events are show, shown, hide, hidden.");
					continue;
				} else {
					var action = events[event].action+'.'+this.framework.eventaction;
					if(typeof events[event].callback === "function"){
						var callback = events[event].callback;
						$('#'+this.cloneId).on(action, {
							target: this,
							modal: this.clone
						}, callback);
					}
				}
			}
		}
	}

	setButtons(buttons){
		this.buttons = buttons;
	}

	show(theme="warning"){
		this.clone.prop('id', this.cloneId);
		this.clone.appendTo('#modalsGarbage');
		if(typeof this.options.size !== "undefined"){
			// console.log("setting size: "+this.options.size);
			if(this.options.size === "large"){
				$('#'+this.cloneId+' .modal-dialog').addClass('modal-lg');
			} else if(this.options.size === "small"){
				$('#'+this.cloneId+' .modal-dialog').addClass('modal-sm');
			} else if(this.options.size === "xlarge"){
				$('#'+this.cloneId+' .modal-dialog').addClass('modal-xl');
			} else if(this.options.size === "medium"){
				$('#'+this.cloneId+' .modal-dialog').addClass('modal-md');
			}
		}
		this.assignEvents(this.events);
		$('#'+this.cloneId).addClass()
		$('#'+this.cloneId+' .modal-title').html(this.title);
		$('#'+this.cloneId+' .modal-body').html(this.message);
		$('#'+this.cloneId+' .modal-footer').html('');
		if(this.buttons === "default"){
			$('#'+this.cloneId+' .modal-footer').html(`<button type="button" class="btn btn-${theme}" ${this.framework.dismissattr}="modal">Okay</button>`);
		} else {
			this.renderButtons();
		}
		
        if(this.options.framework == "bootstrap"){

			var myModal = new bootstrap.Modal(document.getElementById(this.cloneId), {
				keyboard: false
			});
			myModal.show();
			
            $('#'+this.cloneId).on('hidden.bs.modal', {
				target: this,
                modal: this.clone
			}, function (event) {
				// console.log("Hidden bs modal event");
                $('#'+event.data.target.cloneId).remove();
            });

        } else if(this.options.framework == "coreui"){
            var dg = new coreui.Modal(document.getElementById(this.cloneId), {
                keyboard: false
            });
            dg.show();
            $('#'+this.cloneId).on('hidden.coreui.modal',{
                target: this,
                modal: this.clone
            }, function (event) {
                //console.log(event);
                $('#'+event.data.target.cloneId).remove();
            });
            return dg;
        }
	}
}

function dialog(title, message){
	d = new Dialog(title, message);
	d.show();
}


function display_dialog(bt_name,content,func){
	d = new Dialog(content);
	d.setButtons([
		{
			name: "Cancel",
			class: 'btn-secondary',
			onClick: function(event){
				$(event.data.modal).modal('hide');
			}
		},
		{
			name: bt_name,
			class: 'btn-danger btn-loading',
			onClick: function(event){
				func();
				$(event.data.modal).modal('hide');
			}
		}
	]);
	d.show();
}
/** Variables */
let files = [],
dragArea = document.querySelector('.drag-area'),
input = document.querySelector('.drag-area input'),
select = document.querySelector('.drag-area .input_btn'),
icon = document.querySelector('.upload_ico'),
class_add = document.querySelector('.sys_upload'),
command_display = document.querySelector('.form-group'),
class_ctrl = document.querySelector('.sys_controler'),
container = document.querySelector('.containers'),
imageCount = document.querySelector('.image-count'),
text_msg = document.querySelector('.form-group.col-md-12'),
submit_btn = document.querySelector('.submit');

/** CLICK LISTENER */
// select.addEventListener('click', () => input.click());
if (select && input) {
    select.addEventListener('click', () => {
      console.log('Select clicked!');
      input.click();
    });
}

/* INPUT CHANGE EVENT */
if (input && files) {
    input.addEventListener('change', () => {
        let file = input.files;

        // if user select no image
        if (file.length == 0) return;

        for(let i = 0; i < file.length; i++) {
            console.log(file.length[i]);
            if (file[i].type.split("/")[0] != 'image') continue;
            if (!files.some(e => e.name == file[i].name)) files.push(file[i])
        }
        showImages();
    });
}

/** SHOW IMAGES */
function showImages() {
    container.innerHTML = files.reduce((prev, curr) => { // index
        return `${prev}
        <div class="image form__image-container js-remove-image">
            <img class="form__image" src="${URL.createObjectURL(curr)}" auto="format" fit="crop" draggable="false"/>
            <p>${files.length}</p>
        </div>`
    }, '');
    dragArea.classList.remove('center');
    class_add.classList.remove('sys_upload');
    class_ctrl.classList.remove('sys_controler');
    class_add.classList.add('dd_upload');
    submit_btn.classList.add('d-flex');
    text_msg.classList.add('d-block');

    command_display.classList.remove('d-none');
}

/* DRAG & DROP */
if (dragArea) {
    dragArea.addEventListener('dragover', e => {
        e.preventDefault()
        icon.classList.add('dragover')
    })
}

/* DRAG LEAVE */
if (dragArea) {
    dragArea.addEventListener('dragleave', e => {
        e.preventDefault()
        icon.classList.remove('dragover')
    });
}

/* DROP EVENT */
if (dragArea && files) {
    dragArea.addEventListener('drop', e => {
        e.preventDefault()
        icon.classList.remove('dragover');
        input.classList.add('invalid-input');

        let file = e.dataTransfer.files;
        for (let i = 0; i < file.length; i++) {
            /** Check selected file is image */
            if (file[i].type.split("/")[0] != 'image') continue;

            if (!files.some(e => e.name == file[i].name)) files.push(file[i])
        }
        showImages();
    });
}


// This is the Text length calculat Javascript
$(document).ready(function(){ 
    $('#characterLeft').text('200');
    $('#message').keydown(function () {
        var max = 200;
        var len = $(this).val().length;
        // console.log(len);
        if (len >= max) {
            $('#characterLeft').html("<b class='text-danger'>You're have reached the limit</b>");
            $('#characterLeft').addClass('red');
        } else {
            var ch = max - len;
            $('#characterLeft').text(ch);
            $('#characterLeft').removeClass('red');            
        }
    });    
});


// This is the post upload button spinner
$(document).ready(function() {
    $('#share-memory').click(function() {
        $(this).html('<div class="spinner-grow text-primary"></div>');
        setTimeout(() => {
            console.log('This Working!');
        }, 5000);
    });
});


// This is the post dropdown menu toggleclass jquery
$(document).ready(function() {
    $('.btn-group').click(function() {
      $('.dropdown-menu-left').toggleClass('show');
    });
});


// This is user post delete jquery api calling
$(document).on('click', '.container #dell', function(){
    post_id = $(this).parent().attr('data-id');
    d = new Dialog("Delete Post", "Are you sure want to delete this post");
    d.setButtons([
        {
            'name': "Delete",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this post ${post_id} is deleted`);
                
                $.post('/api/posts/delete',
                {
                    id: post_id
                }, function(data, textSuccess, xhr){
                    console.log(textSuccess);
                    console.log(data);

                    if(textSuccess =="success" ){ //means 200
                        $(`#post-${post_id}.modal`).modal('hide');
                        $(`#post-${post_id}`).remove();
                    }
                });

                $(event.data.modal).modal('hide');
            }
        },
        {
            'name': "Cancel",
            "class": "btn-secondary",
            "onClick": function(event){
                $(event.data.modal).modal('hide');
            }
        }
    ]);
    d.show();
});


// This is user blog delete jquery api calling
$(document).on('click', '.modal #blog-dell', function(){
    blog_id = $(this).parent().attr('data-id');
    d = new Dialog("Delete Blog", "Are you sure want to delete this blog");
    d.setButtons([
        {
            'name': "Delete",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this blog ${blog_id} is deleted`);
                
                $.post('/api/posts/b_delete',
                {
                    id: blog_id
                }, function(data, textSuccess, xhr){
                    console.log(textSuccess);
                    console.log(data);

                    if(textSuccess =="success" ){ //means 200
                        $(`#blog-${blog_id}.modal`).modal('hide');
                        $(`#blog-${blog_id}`).remove();
                    }
                });

                $(event.data.modal).modal('hide');
            }
        },
        {
            'name': "Cancel",
            "class": "btn-secondary",
            "onClick": function(event){
                $(event.data.modal).modal('hide');
            }
        }
    ]);
    d.show();
});


// This is the like & unlike button api call jquery
// $(document).ready(function() {
//     let clickCount = 0;

//     $('.longPress').click(function() {
//         clickCount++;

//         if (clickCount === 2) {
//             // Double-click do any event
//             alert('Hai Baby!');
//         }
//     });
// });

$(document).on("click", "button.btn-like", function () {
    post_id = $(this).parents("div").attr("data-id");
    like_id = "#like-" + post_id;
    like_count = '#like-count-' + post_id;

    if ($(like_id).hasClass("liked")) {
        $(like_id).removeClass("liked");
        $(like_id).removeClass("text-danger");
        $('.icon-liked'+like_id).addClass('d-none');
        $('.icon-like'+like_id).removeClass('d-none');
        like = $(like_count).html();
        like = parseInt(like) - 1;
        $(like_count).text(like);
        $.post("/api/posts/unlike", { id: post_id }, function (data) {
            console.log(data);
        });
    } else {
        $(like_id).addClass("liked");
        $(like_id).addClass("text-danger");
        $('.icon-liked'+like_id).removeClass('d-none');
        $('.icon-like'+like_id).addClass('d-none');
        like = $(like_count).html();
        like = parseInt(like) + 1;
        $(like_count).text(like);
        $.post("/api/posts/like", { id: post_id }, function (data) {
            console.log(data);
        });
    }
});


// This is Hide Headers on scroll down in mobile responsive
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 100);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('.menu-links').addClass('menu-down');
		$('.profile-nav').addClass('profile-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('.menu-links').removeClass('menu-down');
			   $('.profile-nav').removeClass('profile-up');
        }
    }
    
    lastScrollTop = st;
}


// This is called api and fetch total post count
$.post('/api/profile/count', {
    id: 10
}, function(data) {
    console.log(data);
    $('#total-posts').html("Total Posts: " + data.count);
});


// New UI Post Dropdown Hidden and other thinks JS
$(document).ready(function() {
    $('.button.dd').click(function(event) {
        event.stopPropagation(); // Prevent the document click event from being triggered immediately
        var post_id = $(this).attr("id");
        console.log('This is the post id ' + post_id);
        $(".dropdown").not("#" + post_id).removeClass("open"); // Close other dropdowns
        $(".dropdown#" + post_id).toggleClass("open");
    });

    $(".dropdown a").click(function() {
        $(".dropdown a").removeClass("clicked");
        $(this).toggleClass("clicked");
    });

    // Close the dropdown when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('.dropdown').length) {
            // If the clicked element is outside the dropdown, close it
            $(".dropdown").removeClass("open");
        }
    });
});


// Side menu bar hidden js
$(document).ready(function(){
    $(".user-pro-mob").on("click", function(){
        $('.bg-body-tertiary.left').toggleClass("hidden");
    });
});

// Search hidden and show js
$(document).ready(function(){
    $(".nav-search, .search-back").on("click", function(){
        $('.bg-body-tertiary.right').toggleClass("hidden");
    });
});

// Post Download's JQuery
$(document).ready(function() {
    $('.post-download').on('click', function() {
        var post_id = $(this).attr("id");
        let imagePath = $('#img-'  + post_id).attr('src');
        let fileName = getFileName(imagePath);
        saveAs(imagePath, fileName);
    });
});

function getFileName(str) {
    return str.substring(str.lastIndexOf('/') + 1);
}
$(document).ready(function(){
    var $posts_image_crop = $('.modal #image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 300,
            type: 'square' // square or circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#post_image').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('.modal#uploadimageModal').modal('hide');
                return;
            }

            $posts_image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });         
        }

        reader.readAsDataURL(this.files[0]);
        $('.modal#uploadimageModal').modal('show');
    });
    
    $('#share-memory').on('click', function () {
        var postText = $("#post_message").val();

        $posts_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            // Create a FormData object
            const formData = new FormData();
            formData.append('post_image', response);
            formData.append('post_text', postText);
    
            // Make the fetch request
            fetch('/api/posts/memorys', {
                method: 'POST',
                body: formData,
            })
            .then(data => {
                console.log('Server Response:', data);
                $('.modal#uploadimageModal').modal('hide');
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Function to validate image type
    function isValidImageType(input) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var fileType = input.files[0].type;
        
        return allowedTypes.includes(fileType);
    }

    // Drag and drop functionality
    var dropZone = $('.post-box');

    dropZone.on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragging');
    });

    dropZone.on('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragging');
    });

    dropZone.on('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragging');
        var files = e.originalEvent.dataTransfer.files;
        handleFiles(files);
    });

    function handleFiles(files) {
        if (files.length > 0) {
            var file = files[0];
            var input = $('#post_image').get(0);
            var dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            input.files = dataTransfer.files;

            var reader = new FileReader();
            reader.onload = function (e) {
                // Validate file type
                if (!isValidImageType(input)) {
                    new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                    $('.modal#uploadimageModal').modal('hide');
                    return;
                }

                $posts_image_crop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }

            reader.readAsDataURL(file);
            $('.modal#uploadimageModal').modal('show');
        }
    }
});
$(document).ready(function(){
    $profile_image_crop = $('#pick_view').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 300,
            // square & circle
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#profile_pick').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('#uploadprofilepick.modal').modal('hide');
            }

            $profile_image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });         
        }

        reader.readAsDataURL(this.files[0]);
        $('#uploadprofilepick.modal').modal('show');
    });
    
    $('#update-profile-pick').on('click', function () {

        $profile_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: '/api/profile/avatar',
                type: "POST",
                data: {'profile_pick': response},
                success:function(data) {
                    console.log('Server Response:', data);
                    $('#uploadprofilepick.modal').modal('hide');
                    location.reload();
                }
            });
        });
    });

    // Function to validate image type
    function isValidImageType(input) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var fileType = input.files[0].type;
        
        return allowedTypes.includes(fileType);
    }
});



$(document).ready(function(){
    $banner_image_crop = $('#banner_view').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 100,
            // square & circle
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#banner').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('#banner.modal').modal('hide');
            }

            $banner_image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }

        reader.readAsDataURL(this.files[0]);
        $('#banner.modal').modal('show');
    });
    
    $('#update-banner-pick').on('click', function () {

        $banner_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: '/api/profile/banner',
                type: "POST",
                data: {'banner_pick': response},
                success:function(data) {
                    console.log('Server Response:', data);
                    $('#banner.modal').modal('hide');
                    location.reload();
                }
            });
        });
    });

    // Function to validate image type
    function isValidImageType(input) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var fileType = input.files[0].type;
        
        return allowedTypes.includes(fileType);
    }
});
$(document).ready(function() {

    $("#Profile-Form1").submit(function() {

        var username, email, number;

        username = $('#profile-name').val();
        email = $('#profile-email').val();
        number = $('#profile-phone').val();

        // Validate user
        if (username === "") {
            displayError("Username should not be empty!", '#profile-name');
            return false;
        }

        // Validate email
        if (email === "") {
            displayError("Email address should not be empty!", '#profile-email');
            return false;
        }
        if (!isValidEmail(email)) {
            displayError('Please enter a valid email address!', '#profile-email');
            return false;
        }

        // Validate phone
        if (number === "") {
            displayError("Phone number should not be empty!", '#profile-phone');
            return false;
        }
    });

    $("#Profile-Form2").submit(function() {

        var currentPass, newPass;

        currentPass = $('#current-password').val();
        newPass = $('#new-password').val();
        confirmPass = $('#confirm-password').val();

        // Validate current
        if (currentPass === "") {
            displayError("Current password should not be empty!", '#current-password');
            return false;
        }

        // Validate new
        if (newPass === "") {
            displayError("New password should not be empty!", '#new-password');
            return false;
        }

        // Confirm password
        if (confirmPass === "") {
            displayError("Confirm password should not be empty!", '#confirm-password');
            return false;
        } else {
            if (newPass !== confirmPass) {
                displayError("Password and confirmation do not match.", '#confirm-password');
                return false;
            }
        }
    });

    function isValidEmail(email) {
        // Use a regular expression for basic email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function displayError(errorMessage, elementId) {
        new Toast('Form Validation', 'now', errorMessage + ' *', 'text-danger').show();
        $(elementId).focus();
        console.log(errorMessage);
    }

});

// This is password hide and show jquery
$(document).ready(function() {
    $("#currentPassword").click(function() {
        var passwordField = $("#current-password");
        var passwordFieldType = passwordField.attr('type');
  
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M2.984 8.625v.003a.5.5 0 0 1-.612.355c-.431-.114-.355-.611-.355-.611l.018-.062s.026-.084.047-.145a6.7 6.7 0 0 1 1.117-1.982C4.096 5.089 5.605 4 8 4s3.904 1.089 4.802 2.183a6.7 6.7 0 0 1 1.117 1.982a4.077 4.077 0 0 1 .06.187l.003.013v.004l.001.002a.5.5 0 0 1-.966.258l-.001-.004l-.008-.025a4.872 4.872 0 0 0-.2-.52a5.696 5.696 0 0 0-.78-1.263C11.286 5.912 10.044 5 8 5c-2.044 0-3.285.912-4.028 1.817a5.7 5.7 0 0 0-.945 1.674a3.018 3.018 0 0 0-.035.109zM8 7a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M6.5 9.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0"/></svg>');
        } else {
            passwordField.attr('type', 'password');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/></svg>');
        }
    });
    $("#newPassword").click(function() {
        var passwordField = $("#new-password");
        var passwordFieldType = passwordField.attr('type');
  
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M2.984 8.625v.003a.5.5 0 0 1-.612.355c-.431-.114-.355-.611-.355-.611l.018-.062s.026-.084.047-.145a6.7 6.7 0 0 1 1.117-1.982C4.096 5.089 5.605 4 8 4s3.904 1.089 4.802 2.183a6.7 6.7 0 0 1 1.117 1.982a4.077 4.077 0 0 1 .06.187l.003.013v.004l.001.002a.5.5 0 0 1-.966.258l-.001-.004l-.008-.025a4.872 4.872 0 0 0-.2-.52a5.696 5.696 0 0 0-.78-1.263C11.286 5.912 10.044 5 8 5c-2.044 0-3.285.912-4.028 1.817a5.7 5.7 0 0 0-.945 1.674a3.018 3.018 0 0 0-.035.109zM8 7a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M6.5 9.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0"/></svg>');
        } else {
            passwordField.attr('type', 'password');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/></svg>');
        }
    });
    $("#confirmPassword").click(function() {
        var passwordField = $("#confirm-password");
        var passwordFieldType = passwordField.attr('type');
  
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M2.984 8.625v.003a.5.5 0 0 1-.612.355c-.431-.114-.355-.611-.355-.611l.018-.062s.026-.084.047-.145a6.7 6.7 0 0 1 1.117-1.982C4.096 5.089 5.605 4 8 4s3.904 1.089 4.802 2.183a6.7 6.7 0 0 1 1.117 1.982a4.077 4.077 0 0 1 .06.187l.003.013v.004l.001.002a.5.5 0 0 1-.966.258l-.001-.004l-.008-.025a4.872 4.872 0 0 0-.2-.52a5.696 5.696 0 0 0-.78-1.263C11.286 5.912 10.044 5 8 5c-2.044 0-3.285.912-4.028 1.817a5.7 5.7 0 0 0-.945 1.674a3.018 3.018 0 0 0-.035.109zM8 7a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M6.5 9.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0"/></svg>');
        } else {
            passwordField.attr('type', 'password');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/></svg>');
        }
    });
});  


// This is user all session delete jquery api calling
$(document).on('click', '.tab-pane #das', function(){
    id = $(this).closest('.device').data('id');
    d = new Dialog("Clear All Session", "Are you sure want to clear this sessions");
    d.setButtons([
        {
            'name': "Clear All",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this session ${id} is not delete`);
                
                $.post('/api/profile/das',
                {
                    id: id
                }, function(data, textSuccess, xhr){
                    console.log('HTTP Status:', xhr.status);
                    console.log('Response:', data);

                    if(textSuccess == "success"){ //means 200
                        console.log('All most working cool.');
                        window.location.reload();
                    }
                });

                $(event.data.modal).modal('hide')
            }
        },
        {
            'name': "Cancel",
            "class": "btn-secondary",
            "onClick": function(event){
                $(event.data.modal).modal('hide');
            }
        }
    ]);
    d.show();
});



// This is Testing
let pressTimer;
$(".longPress").mouseup(function () {
    clearTimeout(pressTimer);
    return false;
}).mousedown(function () {
    pressTimer = window.setTimeout(function () {
        window.location.href = "#";
    }, 1000);
    return false;
});




$(document).ready(function() {
    let clickCount = 0;

    $('.longPress').click(function() {
        clickCount++;

        if (clickCount === 2) {
            // Double-click do any event
            alert('Hai Baby!');
        }
    });
});


// This is the user post image show js
$(document).on('click', '.hcf-masonry-card.rounded', function() {
    // Extract the post ID from the clicked element's id attribute
    var postId = $(this).attr("id").split('-')[1];
    
    // Show the modal corresponding to the post ID
    $('#post-' + postId + '.modal').modal('show');
});
$(document).on('click', '.modal-content .close', function() {
    // Find the closest modal to the clicked close button
    var modal = $(this).closest('.modal');

    // Hide the modal
    $(modal).modal('hide');
});

// This is the user blog image show js
$(document).on('click', '.blog-card-image.viewer', function() {
    // Extract the post ID from the clicked element's data-id attribute
    var blogId = $(this).closest(".blog-card-list").data("id");
    if (blogId) {
        // Show the modal corresponding to the post ID
        $('#blog-' + blogId + '.modal').modal('show');
    } else {
        console.error("Clicked element does not have a data-id attribute.");
    }
});


// This is the Text length calculat Javascript
$(document).ready(function () {
    var maxLength = 300; // Change this to your desired character limit

    $('#profile-bio').on('input', function () {
        var value = $(this).val();
        var length = value.length;
        var lengthRemaining = maxLength - length;

        if (lengthRemaining < 0) {
            $(this).val(value.substring(0, maxLength)); // truncate the input
            $('#profile-bio-len').html("<small class='text-danger'>You've reached the limit</small>");
            $('#profile-bio-len').addClass('red');
        } else {
            $('#profile-bio-len').text(lengthRemaining);
            $('#profile-bio-len').removeClass('red');
        }
    });
});


// This is the post upload button spinner
$(document).ready(function() {
    $('#share-blog').click(function() {
        $(this).html('<div class="spinner-grow text-primary"></div>');
        setTimeout(() => {
            console.log('This Working!');
        }, 5000);
    });
});


// This is the blogs like jquery
$(document).on("click", "button.blog-like", function () {
    var blog_id = $(this).closest(".blog-card-list").data("id");
    // Check if blog_id is retrieved correctly
    var like_id = "#like-" + blog_id;
    var like_count = '#b-like-count-' + blog_id;

    if ($(like_id).hasClass("b-liked")) {
        $('.b-liked'+like_id).removeClass('d-none');
        $('.b-like'+like_id).addClass('d-none');
    } else {
        $('.b-liked'+like_id).addClass('d-none');
        $('.b-like'+like_id).removeClass('d-none');
    }

    if ($(like_id).hasClass("liked")) {
        $(like_id).removeClass("liked");
        // $(like_id).removeClass("text-danger");
        $('.b-liked'+like_id).addClass('d-none');
        $('.b-like'+like_id).removeClass('d-none');
        like = $(like_count).html();
        like = parseInt(like) - 1;
        $(like_count).text(like);
        $.post("/api/posts/b_unlike", { id: blog_id }, function (data) {
            console.log(data);
        });
    } else {
        $(like_id).addClass("liked");
        // $(like_id).addClass("text-danger");
        $('.b-liked'+like_id).removeClass('d-none');
        $('.b-like'+like_id).addClass('d-none');
        like = $(like_count).html();
        like = parseInt(like) + 1;
        $(like_count).text(like);
        $.post("/api/posts/b_like", { id: blog_id }, function (data) {
            console.log(data);
        });
    }
});
$(document).ready(function() {
    const darkSwitch = $("#darkSwitch");

    // Check if the user has a theme preference in local storage
    const darkThemeSelected = localStorage.getItem("darkSwitch") === "dark";

    // Initialize theme based on the preference
    if (darkThemeSelected) {
        $("body").addClass("dark");
    }

    // Handle theme toggle checkbox change
    darkSwitch.change(function() {
        if (this.checked) {
            $("body").addClass("dark");
            localStorage.setItem("darkSwitch", "dark");
        } else {
            $("body").removeClass("dark");
            localStorage.removeItem("darkSwitch");
        }
    });
});


// Function to set a cookie
function setCookie(name, value, daysToExpire) {
    var expires = "";
    
    if (daysToExpire) {
      var date = new Date();
      date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
  
    document.cookie = name + "=" + value + expires + "; path=/";
}



$(document).ready(function() {

    $("#Login-Form").submit(function() {

        // Validate email
        var email = $("#email_address").val();
        if (email === "") {
            displayError("Please enter your username or email address!", '#email_address');
            return false;
        }

        // Validate password
        var password = $("#password").val();
        if (password === "") {
            displayError("Password should not be empty!", '#password');
            return false;
        }
    });

    function displayError(errorMessage, elementId) {
        new Toast('Form Validation', 'now', errorMessage + ' *', 'text-danger').show();
        $(elementId).focus();
        console.log(errorMessage);
    }
});


$(document).ready(function() {

    $("#Signup-Form").submit(function() {

        var username, email, number, password;

        username = $('#username').val();
        email = $('#email_address').val();
        number = $('#phone').val();
        password = $('#password').val();

        // Validate user
        if (username === "") {
            displayError("Username should not be empty!", '#username');
            return false;
        }

        // Validate email
        if (email === "") {
            displayError("Email address should not be empty!", '#email_address');
            return false;
        }
        if (!isValidEmail(email)) {
            displayError('Please enter a valid email address!', '#email_address');
            return false;
        }

        // Validate phone
        if (number === "") {
            displayError("Phone number should not be empty!", '#phone');
            return false;
        }

        // Validate password
        if (password === "") {
            displayError("Password should not be empty!", '#password');
            return false;
        }
    });

    function isValidEmail(email) {
        // Use a regular expression for basic email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function displayError(errorMessage, elementId) {
        new Toast('Form Validation', 'now', errorMessage + ' *', 'text-danger').show();
        $(elementId).focus();
        console.log(errorMessage);
    }

});


// This is user account delete jquery api calling
$(document).on('click', '#deactive', function(){
    d = new Dialog("Delete Account", "<h6>If you delete your account, you will lose your all datas like.</h6><ul><li>Photo's</li><li>Blog's</li><li>like's</li></ul>");
    d.setButtons([
        {
            'name': "Cancel",
            "class": "btn-secondary",
            "onClick": function(event){
                $(event.data.modal).modal('hide');
            }
        },
        {
            'name': "Delete my account",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this account is deleted`);
                
                $.post('/api/auth/deactive',{}, function(data, textSuccess, xhr){
                    console.log('HTTP Status:', xhr.status);
                    console.log('Response:', data);

                    if(textSuccess == "success"){ //means 200
                        console.log('All most working cool.');
                        window.location.reload();
                    }
                });

                $(event.data.modal).modal('hide')
            }
        }
    ]);
    d.show();
});
// This is The Searching Jquery
// Store the initial display status of each list item
// Store the initial display status as a data attribute
$(".search-txt").on("input", filter);

function filter() {
    var term = $(".search-txt").val().toLowerCase();
    var noResultsMessage = $(".no-results-message");

    var anyListItemVisible = false;

    $(".list-item").each(function() {
        var listItem = $(this);

        // If the search term is empty, use the initial display status
        if (term === "") {
            listItem.css("display", listItem.data('initial-display'));
            listItem.css("display", "block");
            anyListItemVisible = true;
        } else {
            // Otherwise, filter based on the search term
            if (listItem.text().toLowerCase().indexOf(term) !== -1) {
                listItem.css("display", "block");
                anyListItemVisible = true;
            } else {
                listItem.css("display", "none");
            }
        }
    });

    // Show or hide the "No results found" message based on visibility of list items
    noResultsMessage.css("display", anyListItemVisible ? "none" : "flex");
}
var CryptoJS=CryptoJS||function(s,p){var m={},l=m.lib={},n=function(){},r=l.Base={extend:function(b){n.prototype=this;var h=new n;b&&h.mixIn(b);h.hasOwnProperty("init")||(h.init=function(){h.$super.init.apply(this,arguments)});h.init.prototype=h;h.$super=this;return h},create:function(){var b=this.extend();b.init.apply(b,arguments);return b},init:function(){},mixIn:function(b){for(var h in b)b.hasOwnProperty(h)&&(this[h]=b[h]);b.hasOwnProperty("toString")&&(this.toString=b.toString)},clone:function(){return this.init.prototype.extend(this)}},
q=l.WordArray=r.extend({init:function(b,h){b=this.words=b||[];this.sigBytes=h!=p?h:4*b.length},toString:function(b){return(b||t).stringify(this)},concat:function(b){var h=this.words,a=b.words,j=this.sigBytes;b=b.sigBytes;this.clamp();if(j%4)for(var g=0;g<b;g++)h[j+g>>>2]|=(a[g>>>2]>>>24-8*(g%4)&255)<<24-8*((j+g)%4);else if(65535<a.length)for(g=0;g<b;g+=4)h[j+g>>>2]=a[g>>>2];else h.push.apply(h,a);this.sigBytes+=b;return this},clamp:function(){var b=this.words,h=this.sigBytes;b[h>>>2]&=4294967295<<
32-8*(h%4);b.length=s.ceil(h/4)},clone:function(){var b=r.clone.call(this);b.words=this.words.slice(0);return b},random:function(b){for(var h=[],a=0;a<b;a+=4)h.push(4294967296*s.random()|0);return new q.init(h,b)}}),v=m.enc={},t=v.Hex={stringify:function(b){var a=b.words;b=b.sigBytes;for(var g=[],j=0;j<b;j++){var k=a[j>>>2]>>>24-8*(j%4)&255;g.push((k>>>4).toString(16));g.push((k&15).toString(16))}return g.join("")},parse:function(b){for(var a=b.length,g=[],j=0;j<a;j+=2)g[j>>>3]|=parseInt(b.substr(j,
2),16)<<24-4*(j%8);return new q.init(g,a/2)}},a=v.Latin1={stringify:function(b){var a=b.words;b=b.sigBytes;for(var g=[],j=0;j<b;j++)g.push(String.fromCharCode(a[j>>>2]>>>24-8*(j%4)&255));return g.join("")},parse:function(b){for(var a=b.length,g=[],j=0;j<a;j++)g[j>>>2]|=(b.charCodeAt(j)&255)<<24-8*(j%4);return new q.init(g,a)}},u=v.Utf8={stringify:function(b){try{return decodeURIComponent(escape(a.stringify(b)))}catch(g){throw Error("Malformed UTF-8 data");}},parse:function(b){return a.parse(unescape(encodeURIComponent(b)))}},
g=l.BufferedBlockAlgorithm=r.extend({reset:function(){this._data=new q.init;this._nDataBytes=0},_append:function(b){"string"==typeof b&&(b=u.parse(b));this._data.concat(b);this._nDataBytes+=b.sigBytes},_process:function(b){var a=this._data,g=a.words,j=a.sigBytes,k=this.blockSize,m=j/(4*k),m=b?s.ceil(m):s.max((m|0)-this._minBufferSize,0);b=m*k;j=s.min(4*b,j);if(b){for(var l=0;l<b;l+=k)this._doProcessBlock(g,l);l=g.splice(0,b);a.sigBytes-=j}return new q.init(l,j)},clone:function(){var b=r.clone.call(this);
b._data=this._data.clone();return b},_minBufferSize:0});l.Hasher=g.extend({cfg:r.extend(),init:function(b){this.cfg=this.cfg.extend(b);this.reset()},reset:function(){g.reset.call(this);this._doReset()},update:function(b){this._append(b);this._process();return this},finalize:function(b){b&&this._append(b);return this._doFinalize()},blockSize:16,_createHelper:function(b){return function(a,g){return(new b.init(g)).finalize(a)}},_createHmacHelper:function(b){return function(a,g){return(new k.HMAC.init(b,
g)).finalize(a)}}});var k=m.algo={};return m}(Math);
(function(s){function p(a,k,b,h,l,j,m){a=a+(k&b|~k&h)+l+m;return(a<<j|a>>>32-j)+k}function m(a,k,b,h,l,j,m){a=a+(k&h|b&~h)+l+m;return(a<<j|a>>>32-j)+k}function l(a,k,b,h,l,j,m){a=a+(k^b^h)+l+m;return(a<<j|a>>>32-j)+k}function n(a,k,b,h,l,j,m){a=a+(b^(k|~h))+l+m;return(a<<j|a>>>32-j)+k}for(var r=CryptoJS,q=r.lib,v=q.WordArray,t=q.Hasher,q=r.algo,a=[],u=0;64>u;u++)a[u]=4294967296*s.abs(s.sin(u+1))|0;q=q.MD5=t.extend({_doReset:function(){this._hash=new v.init([1732584193,4023233417,2562383102,271733878])},
_doProcessBlock:function(g,k){for(var b=0;16>b;b++){var h=k+b,w=g[h];g[h]=(w<<8|w>>>24)&16711935|(w<<24|w>>>8)&4278255360}var b=this._hash.words,h=g[k+0],w=g[k+1],j=g[k+2],q=g[k+3],r=g[k+4],s=g[k+5],t=g[k+6],u=g[k+7],v=g[k+8],x=g[k+9],y=g[k+10],z=g[k+11],A=g[k+12],B=g[k+13],C=g[k+14],D=g[k+15],c=b[0],d=b[1],e=b[2],f=b[3],c=p(c,d,e,f,h,7,a[0]),f=p(f,c,d,e,w,12,a[1]),e=p(e,f,c,d,j,17,a[2]),d=p(d,e,f,c,q,22,a[3]),c=p(c,d,e,f,r,7,a[4]),f=p(f,c,d,e,s,12,a[5]),e=p(e,f,c,d,t,17,a[6]),d=p(d,e,f,c,u,22,a[7]),
c=p(c,d,e,f,v,7,a[8]),f=p(f,c,d,e,x,12,a[9]),e=p(e,f,c,d,y,17,a[10]),d=p(d,e,f,c,z,22,a[11]),c=p(c,d,e,f,A,7,a[12]),f=p(f,c,d,e,B,12,a[13]),e=p(e,f,c,d,C,17,a[14]),d=p(d,e,f,c,D,22,a[15]),c=m(c,d,e,f,w,5,a[16]),f=m(f,c,d,e,t,9,a[17]),e=m(e,f,c,d,z,14,a[18]),d=m(d,e,f,c,h,20,a[19]),c=m(c,d,e,f,s,5,a[20]),f=m(f,c,d,e,y,9,a[21]),e=m(e,f,c,d,D,14,a[22]),d=m(d,e,f,c,r,20,a[23]),c=m(c,d,e,f,x,5,a[24]),f=m(f,c,d,e,C,9,a[25]),e=m(e,f,c,d,q,14,a[26]),d=m(d,e,f,c,v,20,a[27]),c=m(c,d,e,f,B,5,a[28]),f=m(f,c,
d,e,j,9,a[29]),e=m(e,f,c,d,u,14,a[30]),d=m(d,e,f,c,A,20,a[31]),c=l(c,d,e,f,s,4,a[32]),f=l(f,c,d,e,v,11,a[33]),e=l(e,f,c,d,z,16,a[34]),d=l(d,e,f,c,C,23,a[35]),c=l(c,d,e,f,w,4,a[36]),f=l(f,c,d,e,r,11,a[37]),e=l(e,f,c,d,u,16,a[38]),d=l(d,e,f,c,y,23,a[39]),c=l(c,d,e,f,B,4,a[40]),f=l(f,c,d,e,h,11,a[41]),e=l(e,f,c,d,q,16,a[42]),d=l(d,e,f,c,t,23,a[43]),c=l(c,d,e,f,x,4,a[44]),f=l(f,c,d,e,A,11,a[45]),e=l(e,f,c,d,D,16,a[46]),d=l(d,e,f,c,j,23,a[47]),c=n(c,d,e,f,h,6,a[48]),f=n(f,c,d,e,u,10,a[49]),e=n(e,f,c,d,
C,15,a[50]),d=n(d,e,f,c,s,21,a[51]),c=n(c,d,e,f,A,6,a[52]),f=n(f,c,d,e,q,10,a[53]),e=n(e,f,c,d,y,15,a[54]),d=n(d,e,f,c,w,21,a[55]),c=n(c,d,e,f,v,6,a[56]),f=n(f,c,d,e,D,10,a[57]),e=n(e,f,c,d,t,15,a[58]),d=n(d,e,f,c,B,21,a[59]),c=n(c,d,e,f,r,6,a[60]),f=n(f,c,d,e,z,10,a[61]),e=n(e,f,c,d,j,15,a[62]),d=n(d,e,f,c,x,21,a[63]);b[0]=b[0]+c|0;b[1]=b[1]+d|0;b[2]=b[2]+e|0;b[3]=b[3]+f|0},_doFinalize:function(){var a=this._data,k=a.words,b=8*this._nDataBytes,h=8*a.sigBytes;k[h>>>5]|=128<<24-h%32;var l=s.floor(b/
4294967296);k[(h+64>>>9<<4)+15]=(l<<8|l>>>24)&16711935|(l<<24|l>>>8)&4278255360;k[(h+64>>>9<<4)+14]=(b<<8|b>>>24)&16711935|(b<<24|b>>>8)&4278255360;a.sigBytes=4*(k.length+1);this._process();a=this._hash;k=a.words;for(b=0;4>b;b++)h=k[b],k[b]=(h<<8|h>>>24)&16711935|(h<<24|h>>>8)&4278255360;return a},clone:function(){var a=t.clone.call(this);a._hash=this._hash.clone();return a}});r.MD5=t._createHelper(q);r.HmacMD5=t._createHmacHelper(q)})(Math);

class Toast{
    constructor(title, subtitle, message, color, options=undefined){
        this.title = title
        this.subtitle = subtitle
        this.message = message
        this.color = color
        this.options = {
            'placement': 'top-right'
        }

        this.options = {...this.options, ...options}

        this.id = "toast_"+CryptoJS.MD5(Math.random()+"").toString();

        this.placement_vals = {
            "top-left": "top-0 start-0",
            "top-center": "top-0 start-50 translate-middle-x",
            "top-right": "top-0 end-0",
            "middle-left": "top-50 start-0 translate-middle-y",
            "middle-center": "top-50 start-50 translate-middle",
            "middle-right": "top-50 end-0 translate-middle-y",
            "bottom-left": "bottom-0 start-0",
            "bottom-center": "bottom-0 start-50 translate-middle-x",
            "bottom-right": "bottom-0 end-0"
        }

        this.domInit()

    }

    domInit(){
        this.placement_class = this.placement_vals[this.options.placement];
        if($(`#toast-${this.options.placement}`).length == 0){
            $('body').append(`
                <div id="toast-${this.options.placement}" class="toast-container position-fixed ${this.placement_class}"
                </div>
            `);
        } else {
            //do nothiung
            console.log('This toast is not working...')
        }
        
    }
    

    show(){
        var toast_template = `
        <div class="toast" id="${this.id}" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">${this.title}</strong>
                <small class="text-muted">${this.subtitle}</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body ${this.color}">
                ${this.message}
            </div>
        </div>
        `;

        $(`#toast-${this.options.placement}`).append(toast_template);
        var t = new bootstrap.Toast(document.getElementById(`${this.id}`), this.options);
        $(document.getElementById(`${this.id}`)).on('hidden.bs.toast', function(){
            $(`#${this.id}`).remove();
        });
        console.log(t);
        t.show();
    }
}
//# sourceMappingURL=app.js.map