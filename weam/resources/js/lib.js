// Allows to use VueJS components in sweet alert 2

function VueSwal2(component,propsData)
{
    Vue.swal({
        html: '<div id="swal-component"></div>',
        showConfirmButton: false,
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