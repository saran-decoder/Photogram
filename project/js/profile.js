/** Variables */
let profile = [],
profileinput = document.querySelector('.view_img input'),
select_input = document.querySelector('.input_profile_btn'),
view_img = document.querySelector('.view_image'),
update_img = document.querySelector('.update_img');

/** CLICK LISTENER */
if (select_input && profileinput) {
    select_input.addEventListener('click', () => {
      console.log('Update image clicked!');
      profileinput.click();
    });
}

/* INPUT CHANGE EVENT */
if (profileinput && profile) {
    profileinput.addEventListener('change', () => {
        let file = profileinput.profile;

        // if user select no image
        if (file == 0) return;

        for(let i = 0; i < file; i++) {
            console.log(file[i]);
            if (file[i].type.split("/")[0] != 'image') continue;
            if (!profile.some(e => e.name == file[i].name)) profile.push(file[i])
        }
        showImages();
    });
}

/** SHOW IMAGES */
function showImages() {
    view_img.innerHTML = profile.reduce((prev, curr) => { // index
        return `${prev}
            <img src="${URL.createObjectURL(curr)}" alt="..." width="130" style="border-radius: 4rem;"/>`
    }, '');
    update_img.classList.add('d-none');
    select_input.classList.add('d-none');
}