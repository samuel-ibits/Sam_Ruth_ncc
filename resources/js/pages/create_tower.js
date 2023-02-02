jQuery(function () {
    Codebase.helpers(['flatpickr', 'datepicker']);
});

jQuery(function () {
    const _token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

    jQuery.validator.addMethod("date", function (date, element) {
        return this.optional(element) || date.match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/);
    }, "Please specify a valid date");

    const gettowername = ()=>{
        return {tower_name: document.querySelector("#tower_name").value}
    }
    jQuery('#create').validate({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: (error, e) => {
            jQuery(e).parents('.form-group').append(error);
        },
        highlight: e => {
            jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: (e) => {

            jQuery(e).closest('.form-group').removeClass('is-invalid');
            jQuery(e).remove();
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            console.log({
                event
            })
            form.submit();
            // do other things for a valid form
            // form.submit();
        },
        rules: {
            tower_owner: "required",
            tower_name: {
                //checkIfTowerNameExists: true,
                required: true,
                minlength: 3,
                remote: {
                    url: "/towers/checkiftowernameexists",
                    type: "post",
                    headers:{
                        'X-CSRF-TOKEN': _token,
                    },
                    data: { tower_name: ()=>document.querySelector("#tower_name").value}
                }
            },
            ncc_identity: {
                required: true,
                minlength: 3,
                remote: {
                    url: "/towers/checkifnccidentityexists",
                    type: "post",
                    headers:{
                        'X-CSRF-TOKEN': _token
                    },
                    data: {ncc_identity: ()=>$( "#ncc_identity" ).val()}
                }
            },
            address: {
                required: true,
                minlength: 3
            },
            state: "required",
            lga: "required",
            longitude: {
                required:true,
                type:'post',
                remote: {
                    url:'/towers/checkduplicategeoposition',
                    headers:{
                        'X-CSRF-TOKEN': _token
                    },
                    data: {latitude: ()=>document.querySelector("#latitude").value,longitude: ()=>document.querySelector("#longitude").value}
                }
            },
            latitude: {
                required:true,
                type:'post',
                remote: {
                    url:'/towers/checkduplicategeoposition',
                    headers:{
                        'X-CSRF-TOKEN': _token
                    },
                    data: {latitude: ()=>document.querySelector("#latitude").value,longitude: ()=>document.querySelector("#longitude").value}
                }
            },
            landlord_name: {
                required: true,
                minlength: 3
            },
            contact_number: "required",
            tower_type: "required",
            no_of_sections: "required",
            no_of_sections: {
                minlength: 1,
                required: true
            },
            tower_height: {
                minlength: 1,
                required: true
            },
            date_of_erection: {
                date: true,
                required: true
            },
            main_power: "required",
            first_backup: "required",
            secon_backup: "required",

        },
        messages: {
            tower_owner: 'Please select a value!',
            tower_name: {
                minlength: "Minimun length of three characters required",
                remote: "Tower exists"

            },
            ncc_identity: {
                minlength: "Minimun length of three characters required",
                remote: "this ncc identity exists!"
            },
            address: {
                minlength: "Minimun length of three characters required",
            },
            longitude: {
                remote: "This cordinate exist",
            },
            latitude: {
                remote: "This cordinate exist",
            },
            state: 'Please select a value!',
            lga: 'Please select a value!',
            landlord_name: {
                minlength: "Minimun length of three characters required",
            },
            tower_type: "Please select a value!",
            date_of_erection: {
                date: "enter a valid format"
            }
        }
    });

    const input = document.querySelector("#contact_number"),
        errorMsg = document.querySelector("#error-msg"),
        validMsg = document.querySelector("#valid-msg");

    // here, the index maps to the error code returned from getValidationError - see readme
    const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    // initialise plugin
    const iti = window.intlTelInput(input, {
        utilsScript: "../js/plugins/intlTelInput/utils.js"
    });
    iti.setCountry("ng");
    const reset = function () {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };
    // on blur: validate
    input.addEventListener('blur', function () {
        reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                validMsg.classList.remove("hide");
            } else {
                input.classList.add("error");
                var errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
            }
        }
    });

    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);

    const statedropdown = document.querySelector("#state");
    const lga = document.querySelector("#lga");
    const lgaid = document.querySelector("#lga_id");
    const getlgabystate =  (e=null)=>{
        try {
            const stateid = statedropdown.options[statedropdown.selectedIndex].value
            // console.log(stateid);
            if (+stateid > 0) {
                lga.innerHTML = "";
                lga.parentNode.classList.add("open");
                const defaultoption = document.createElement("option");
                +lgaid.value > 0?  "":defaultoption.text = "Select LGA";

                lga.options.add(defaultoption, 0)
                fetch(`/api/lgabystateid/${stateid}`)
                    .then(response => response.json())
                    .then(data => data.forEach((val, index) => {
                        const option = document.createElement("option");
                        option.text = val.name;
                        option.value = val.id;
                        option.selected = +option.value === +lgaid.value? true:false;
                        lga.options.add(option, ++index);
                    }));
            }
        } catch(ex){
            console.log(ex);
        }
    };
    statedropdown.addEventListener("change", getlgabystate);
    getlgabystate();

});
