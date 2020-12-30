// Allows to use VueJS components in sweet alert 2

function VueSwal2(component, propsData, customClass)
{
    Vue.swal({
        html: '<div id="swal-component"></div>',
        showConfirmButton: false,
        customClass: customClass,
        willOpen: () => {
            let ComponentClass = Vue.extend(Vue.component(component));
            let instance = new ComponentClass({
                propsData: propsData
            });
            instance.$mount();
            document.getElementById('swal-component').appendChild(instance.$el);
        }
    });
}

// Cookie handler

function setCookie(name, value, days) {

    let expires = "";
    let date = "";

    if (days) {
        date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = ";expires=" + date.toUTCString();
    }

    document.cookie = name + "=" + (value || "")  + expires + ";path=/";

}

function getCookie(name) {

    let value = `; ${document.cookie}`;
    let parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();

}

function eraseCookie(name) {

    document.cookie = name +'= ;Path=/;Expires=Thu, 01 Jan 1970 00:00:01 GMT;';

}
