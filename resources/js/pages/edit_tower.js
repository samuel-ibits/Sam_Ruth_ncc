jQuery(function () {
  try {
    Codebase.helpers(['flatpickr', 'datepicker']);
    const resettenant = document.querySelector("#resettenant"),
      _token = document.querySelector("meta[name='csrf-token']").getAttribute("content"),
      tower = document.querySelector("#tower_id"),
      towerid = tower.value,
      nextButton = document.querySelector(".next-button"),
      previousButton = document.querySelector(".previous-button"),
      activeTab = document.querySelector(".nav-tabs .active"),
      contactnumber = document.querySelector("#contact_number"),
      errorMsg = document.querySelector("#error-msg"),
      validMsg = document.querySelector("#valid-msg"),
      statedropdown = document.querySelector("#state"),
      lga = document.querySelector("#lga"),
      lgaid = document.querySelector("#lga_id"),
      resetinsurance = document.querySelector("#resetinsurance"),
      insurancetab = document.querySelector("#insurance-tab"),
      AddInsurance = document.querySelector("#AddInsurance"),
      AddTenant = document.querySelector("#AddTenant"),
      insurancecompany = document.querySelector("#insurance_company"),
      insurancepolicy = document.querySelector("#insurance_policy"),
      insurancelimit = document.querySelector("#insurance_limit"),
      insurancepremium = document.querySelector("#insurance_premium"),
      insuranceexpirydate = document.querySelector("#insurance_expiry_date"),
      edittowerinsurancebutton = document.querySelectorAll('.edit-tower-insurance'),
      edittowertenantbutton = document.querySelectorAll('.edit-tower-tenant'),
      saveinsurance = document.querySelector('.add-insurance'),
      savetenant = document.querySelector('.add-tenant'),
      insuranceform = document.querySelector('.insurance-form'),
      deletetowerinsuranceforms = document.querySelectorAll('.delete-tower-insurance-form'),
      deletetowertenantforms = document.querySelectorAll('.delete-tower-tenant-form'),
      _insurancemethod = document.querySelector('#_insurancemethod'),
      _tenantmethod = document.querySelector('#_tenantmethod'),
      searchtenantname = document.querySelector("#search_tenant_name"),
      searchantennamake = document.querySelector("#search_antenna_make"),
      searchantennamodel = document.querySelector("#search_antenna_model"),
      hiddentenantname = document.querySelector("#tenant_name"),
      hiddenantennamake = document.querySelector("#antenna_make"),
      hiddenantennamodel = document.querySelector("#antenna_model"),
      insuranceaccordion = document.querySelector('#insurance_accordion'),
      tenantaccordion = document.querySelector('#tenant_accordion_body'),
      antennatype = document.querySelector('#antenna_type'),
      configuration = document.querySelector('#configuration'),
      tenantform = document.querySelector(".tenant-form"),
      maintenanceform = document.querySelector(".maintenance-form"),
      searchmaintenanceagentname = document.querySelector("#search_maintenance_agent_name"),
      searchmaintenanceaengineername = document.querySelector("#search_maintenance_engineer_name"),
      hiddenmaintenanceengineername = document.querySelector("#maintenance_engineer_name"),
      hiddenmaintenanceagentname = document.querySelector("#maintenance_agent_name"),
      maintenanceschedule = document.querySelector("#maintenance_schedule"),
      addmaintenancetower = document.querySelector("#add_maintenance_tower"),
      resetmaintenance = document.querySelector("#resetmaintenance"),
      auditform = document.querySelector(".audit-information"),
      agentncclicence = document.querySelector("#agent_ncc_licence"),
      searchauditagentname = document.querySelector("#search_audit_agent_name"),
      hiddenauditagentname = document.querySelector("#audit_agent_name"),
      audittypes = document.querySelectorAll(".audit_type"),
      auditschedule = document.querySelector("#audit_schedule"),
      saveaudit = document.querySelector(".add-audit"),
      _auditmethod = document.querySelector("#auditmethod"),
      edittowerauditbutton = document.querySelectorAll('.edit-tower-audit'),
      resetaudit = document.querySelector("#resetaudit"),
      auditaccordion = document.querySelector('#audit_accordion_body'),
      AddAudit = document.querySelector('#AddAudit'),
      powersuppliertypes = document.querySelectorAll(".power-supplier-type"),
      powersuppliers = document.querySelectorAll(".power-supplier"),
      powersuppliersinput = document.querySelectorAll(".power-supplier-input"),
      powersupplierskey = document.querySelectorAll(".power-supplier-key"),
      formatDate = (date) => {
        try {

          var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

          if (month.length < 2)
            month = '0' + month;
          if (day.length < 2)
            day = '0' + day;

          return [year, month, day].join('-');
        } catch (error) {

        }
      },
      PopulateTowerInsurance = (data) => {
        try {

          insuranceform.action = `/towers/${data.id}/updatetowerinsurance?tab=step2`;
          insuranceform.querySelectorAll('.form-group').forEach(formgroup => formgroup.classList.remove('is-invalid'));

          _insurancemethod.name = "_method";
          _insurancemethod.value = "PUT";

          //console.log(insurancecompany);

          insurancecompany.options.forEach(option => option.value == data['insurance_company_id'] ? option.selected = true : "");
          insurancepolicy.options.forEach(option => option.value == data['insurance_policy_id'] ? option.selected = true : "");
          insurancelimit.options.forEach(option => option.value == data['insurance_limit_id'] ? option.selected = true : "");
          insurancepremium.value = data['insurancepremium'];
          insurancepremium.parentNode.classList.add("open");
          insuranceexpirydate.parentNode.classList.add("open");

          const insuranceexpirydates = jQuery(insuranceexpirydate).flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            defaultDate: formatDate(data['expires_at'])
          });
          AddInsurance.textContent = "Edit Insurance";
          saveinsurance.textContent = "Update"
          jQuery('#insurance_accordion').collapse('show');
        } catch (error) {

        }
      },
      PopulateTowerTenant = (data) => {
        try {
          tenantform.action = `/towers/${data.id}/updatetenanttower?tab=step3`;
          tenantform.querySelectorAll('.form-group').forEach(formgroup => formgroup.classList.remove('is-invalid'));

          _tenantmethod.name = "_method";
          _tenantmethod.value = "PUT";

          //console.log(insurancecompany);

          antennatype.options.forEach(option => option.value == data['antenna_type_id'] ? option.selected = true : "");

          hiddenantennamodel.value = data['antenna_model_id'];
          searchantennamodel.value = data['antennamodel']['name'];
          hiddenantennamake.value = data['antenna_make_id'];
          searchantennamake.value = data['antennamake']['name'];
          hiddentenantname.value = data['tenant_id'];
          searchtenantname.value = data['tenant']['name'];
          configuration.value = data['configuration'];
          antennatype.parentNode.classList.add("open");
          configuration.parentNode.classList.add("open");
          AddTenant.textContent = "Edit Tenant";
          savetenant.textContent = "Update"
          jQuery(tenantaccordion).collapse('show');
        } catch (error) {

        }
      },
      PopulateTowerAudit = (data) => {
        try {
          auditform.action = `/towers/${data.id}/updatetowerauditschedule?tab=step5`;
          auditform.querySelectorAll('.form-group').forEach(formgroup => formgroup.classList.remove('is-invalid'));

          _auditmethod.name = "_method";
          _auditmethod.value = "PUT";

          // console.log(insurancecompany);
          // debugger
          audittypes.forEach(audittypeoption => {
            audittypeoption.checked = false;
            const auditagenttoweraudittypeid = audittypeoption.parentElement.querySelector('.auditagenttoweraudittypeid');
            auditagenttoweraudittypeid.value = 0;
            data.auditagenttoweraudittypes.forEach(auditagenttoweraudittype => {

              +audittypeoption.value === auditagenttoweraudittype.audittype.id ? (function () {
                audittypeoption.checked = true;
                auditagenttoweraudittypeid.value = auditagenttoweraudittype.id;
              }()) : ""
            });
          });
          hiddenauditagentname.value = data['audit_agent_id'];
          searchauditagentname.value = data['auditagent']['name'];
          auditschedule.parentNode.classList.add("open");

          const auditscheduledate = jQuery(auditschedule).flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            defaultDate: formatDate(data['audit_date'])
          });
          // audittypes.value = await data['configuration'];
          //
          searchauditagentname.parentNode.classList.add("open");
          AddAudit.textContent = "Edit Audit Information";
          saveaudit.textContent = "Update Audit Information"
          jQuery(auditaccordion).collapse('show');
        } catch (error) {

        }
      },
      GetTowerInsranceById = async (insurancecompanytowerid) => {
        try {
          const response = await fetch(`/api/towers/gettowerinsurancebyid/${insurancecompanytowerid}`);
          return response.json();

        } catch (error) {

        }
      },
      GetTowerTenantById = async (tenanttowerid) => {
        try {
          const response = await fetch(`/api/towers/gettenanttowerbyid/${tenanttowerid}`);
          return response.json();

        } catch (error) {

        }
      },
      GetTowerAuditById = async (audittowerid) => {
        try {
          const response = await fetch(`/api/towers/getauditagenttowerbyid/${audittowerid}`);
          return response.json();
        } catch (error) {

        }
      },
      EditTowerInsurance = async (e) => {
        e.preventDefault();
        try {
          const insurancecompanytowerid = e.currentTarget.querySelector("input[type='hidden']").value;
          const towerinsurance = await GetTowerInsranceById(insurancecompanytowerid);
          PopulateTowerInsurance(await towerinsurance)
        } catch (error) {

        }
      },
      EditTowerTenant = async (e) => {
        e.preventDefault();
        try {
          const tenanttowerid = e.currentTarget.querySelector("input[type='hidden']").value;
          const towertenant = await GetTowerTenantById(tenanttowerid);
          PopulateTowerTenant(await towertenant);
        } catch (error) {

        }
      },
      EditTowerAudit = async (e) => {
        e.preventDefault();
        try {
          const tenantauditid = e.currentTarget.querySelector("input[type='hidden']").value;
          const toweraudit = await GetTowerAuditById(tenantauditid);
          PopulateTowerAudit(await toweraudit);
        } catch (error) {

        }
      },
      getlgabystate = (e = null) => {
        try {
          const stateid = statedropdown.options[statedropdown.selectedIndex].value
          // console.log(stateid);
          if (+stateid > 0) {
            lga.innerHTML = "";
            lga.parentNode.classList.add("open");
            const defaultoption = document.createElement("option"); +
              lgaid.value > 0 ? "" : defaultoption.text = "Select LGA";

            lga.options.add(defaultoption, 0)
            fetch(`/api/lgabystateid/${stateid}`)
              .then(response => response.json())
              .then(data => data.forEach((val, index) => {
                const option = document.createElement("option");
                option.text = val.name;
                option.value = val.id;
                option.selected = +option.value === +lgaid.value ? true : false;
                lga.options.add(option, ++index);
              }));
          }
        } catch (ex) {
          console.log(ex);
        }
      },
      GetPowerSuppliersByPowerSourceType = async (e) => {
        try {
          // debugger
          const selectedPowerSupplierTypeHTML = e.currentTarget;
          const selectedPowerSupplierTypeId = selectedPowerSupplierTypeHTML.id
          const selectedPowerSupplierTypeIndex = +selectedPowerSupplierTypeId.split("-")[1];
          const selectedPowerSupplier = powersuppliers[+selectedPowerSupplierTypeIndex];
          const selectedPowerSupplierInput = powersuppliersinput[+selectedPowerSupplierTypeIndex];
          const selectedPowerSupplierkey = powersupplierskey[+selectedPowerSupplierTypeIndex];
          selectedPowerSupplier.removeAttribute('disabled')
          selectedPowerSupplierInput.removeAttribute('disabled')
          selectedPowerSupplierInput.setAttribute("name", "")
          selectedPowerSupplier.setAttribute("name", "")
          selectedPowerSupplierInput.classList.remove('hide')
          selectedPowerSupplier.classList.remove('hide')
          const selectedPowerSourceType = powersuppliertypes[selectedPowerSupplierTypeIndex].options[selectedPowerSupplierTypeHTML.selectedIndex]
          // debugger
          const selectedPowerSourceTypeText = selectedPowerSourceType.text
          if (selectedPowerSourceTypeText.toLowerCase() !== "others") {
            selectedPowerSupplier.setAttribute("name", `power_supplier[${selectedPowerSupplierkey.value}]`)
            selectedPowerSupplierInput.setAttribute('disabled', 'disabled')
            selectedPowerSupplierInput.classList.add('hide')
            const selectedPowerSourceTypeid = selectedPowerSourceType.value
            selectedPowerSupplier.parentNode.classList.add("open");
            const defaultoption = document.createElement("option");
            defaultoption.text = `Select ${selectedPowerSourceType.text}`;
            fetch(`/api/powers/getpowersuppliersbypowersuppliertypeid/${selectedPowerSourceTypeid}`)
              .then((response) => response.json())
              .then((data) =>
                data.forEach((val, index) => {
                  // debugger
                  if (index === 0) {
                    selectedPowerSupplier.innerHTML = ""
                    defaultoption.text = `Select ${selectedPowerSourceType.text}`;
                  }
                  const option = document.createElement("option");
                  option.text = val.name;
                  option.value = val.id;
                  selectedPowerSupplier.options.add(option, ++index);
                })
              )
          } else {
            selectedPowerSupplier.setAttribute('disabled', 'disabled')
            selectedPowerSupplier.classList.add('hide')
            selectedPowerSupplierInput.setAttribute("name", `power_supplier[${selectedPowerSupplierkey.value}]`)

          }
        } catch (error) {
          console.error({ error })
        }
      },
      SearchTenant = async (term) => {
        try {
          let search = await fetch(`/api/tenants/searchtenantbyname/${term}`);
          return search.json();
        } catch (error) {

        }
      },
      SearchAntennaMake = async (term) => {
        try {
          let search = await fetch(`/api/antennas/searchantennamakebyname/${term}`);
          return search.json();
        } catch (error) {

        }
      },
      SearchAntennaModel = async (term) => {
        try {
          let search = await fetch(`/api/antennas/searchantennamodelbyname/${term}`);
          return search.json();
        } catch (error) {

        }
      },
      SearchMaintenanceAgent = async (term) => {
        try {
          let search = await fetch(`/api/maintenances/searchmaintenanceagentbyname/${term}`);
          return search.json();
        } catch (error) {

        }
      },
      SearchMaintenanceEngineer = async (term) => {
        try {
          let search = await fetch(`/api/maintenances/searchmaintenanceengineerbynameandagentid/${term}/${hiddenmaintenanceagentname.value}`);
          return search.json();
        } catch (error) {

        }
      },
      SearcAuditAgent = async (term) => {
        try {
          let search = await fetch(`/api/audits/searchauditagentbyname/${term}`);
          return search.json();
        } catch (error) {

        }
      },
      insuranceformvalidation = !jQuery(insuranceform) ? "" : jQuery(insuranceform).validate({
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
          // console.log({
          //     event
          // })
          // form.submit();
          // do other things for a valid form
          form.submit();
        },
        rules: {
          add_insurance_tower: {
            required: true,
            digits: true
          },
          insurance_company: "required",
          insurance_limit: "required",
          insurance_policy: "required",
          insurance_premium: {
            required: true,
            number: true
          },
          insurance_expiry_date: {
            date: true,
            required: true
          }
        },
        messages: {
          insurance_expiry_date: {
            date: "Please use the right date format"
          }
        }
      }),
      tenantformvalidation = !jQuery(tenantform) ? "" : jQuery(tenantform).validate({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: (error, e) => {
          jQuery(e).parents('.form-group').append(error);
        },
        highlight: (e) => {
          jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: (e) => {

          jQuery(e).closest('.form-group').removeClass('is-invalid');
          jQuery(e).remove();
        },
        submitHandler: async (form, event) => {
          event.preventDefault();
          // console.log({
          //     event
          // })
          // form.submit();
          // do other things for a valid form
          await form.submit();
        },
        rules: {
          search_tenant_name: "required",
          search_antenna_model: "required",
          search_antenna_make: "required",
          antenna_type: "required",
          configuration: "required"
        }
      }),
      maintenanceformvalidation = !jQuery(maintenanceform) ? "" : jQuery(maintenanceform).validate({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: (error, e) => {
          jQuery(e).parents('.form-group').append(error);
        },
        highlight: (e) => {
          jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: (e) => {

          jQuery(e).closest('.form-group').removeClass('is-invalid');
          jQuery(e).remove();
        },
        submitHandler: async (form, event) => {
          event.preventDefault();

          await form.submit();
        },
        rules: {
          search_maintenance_engineer_name: "required",
          search_maintenance_agent_name: "required",
          agent_ncc_licence: "required",
          maintenance_schedule: "required"
        }
      }),
      auditformvalidation = !jQuery(auditform) ? "" : jQuery(auditform).validate({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: (error, e) => {
          jQuery(e).parents('.form-group').append(error);
        },
        highlight: (e) => {
          jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: (e) => {

          jQuery(e).closest('.form-group').removeClass('is-invalid');
          jQuery(e).remove();
        },
        submitHandler: async (form, event) => {
          event.preventDefault();

          await form.submit();
        },
        rules: {
          search_audit_agent_name: "required",
          audit_schedule: "required",
          audit_type: "required"
        }
      });

    jQuery(auditschedule) ? jQuery(auditschedule).flatpickr({
      altInput: true,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
      defaultDate: formatDate(auditschedule.value)
    }) : "";

    if (activeTab) {
      const activeParentTab = activeTab.parentElement
      if (activeParentTab) {
        if (activeParentTab.nextElementSibling) {
          if (nextButton) {
            nextButton.addEventListener("click", e => window.location.href = activeParentTab.nextElementSibling.querySelector(".nav-link").href)
          }
        } else {
          nextButton.style.display = "none";
        }
        if (activeParentTab.previousElementSibling) {
          if (previousButton) {
            previousButton.addEventListener("click", e => window.location.href = activeParentTab.previousElementSibling.querySelector(".nav-link").href)
          }
        } else {
          previousButton.style.display = "none";
        }

      }
    }
    jQuery.validator.addMethod("date", function (date, element) {
      return this.optional(element) || date.match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/);
    }, "Please specify a valid date");
    if (jQuery('#profile')) {
      jQuery('#profile').validate({
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
          // console.log({
          //     event
          // })
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
              headers: {
                'X-CSRF-TOKEN': _token
              },
              data: { tower_name: () => $("#tower_name").val(), towerid }
            }
          },
          ncc_identity: {
            required: true,
            minlength: 3,
            remote: {
              url: "/towers/checkifnccidentityexists",
              type: "post",
              headers: {
                'X-CSRF-TOKEN': _token
              },
              data: { ncc_identity: () => $("#ncc_identity").val(), towerid }
            }
          },
          address: {
            required: true,
            minlength: 3
          },
          state: "required",
          lga: "required",
          longitude: {
            required: true,
            remote: {
              type: 'post',
              url: '/towers/checkduplicategeoposition',
              headers: {
                'X-CSRF-TOKEN': _token
              },
              data: { latitude: () => document.querySelector("#latitude").value, longitude: () => document.querySelector("#longitude").value, towerid }
            }
          },
          latitude: {
            required: true,
            remote: {
              type: 'post',
              url: '/towers/checkduplicategeoposition',
              headers: {
                'X-CSRF-TOKEN': _token
              },
              data: { latitude: () => document.querySelector("#latitude").value, longitude: () => document.querySelector("#longitude").value, towerid }
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
          }

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
    }
    if (contactnumber) {
      // here, the index maps to the error code returned from getValidationError - see readme
      const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

      // initialise plugin
      const iti = window.intlTelInput(contactnumber, {
        utilsScript: "../../js/plugins/intlTelInput/utils.js"
      });
      iti.setCountry("ng");
      const reset = function () {
        contactnumber.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
      };
      // on blur: validate
      contactnumber.addEventListener('blur', function () {
        reset();
        if (contactnumber.value.trim()) {
          if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
          } else {
            contactnumber.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
          }
        }
      });

      // on keyup / change flag: reset
      contactnumber.addEventListener('change', reset);
      contactnumber.addEventListener('keyup', reset);
    }
    if (statedropdown) {
      statedropdown.addEventListener("change", getlgabystate);
    }
    if (deletetowerinsuranceforms) {
      deletetowerinsuranceforms.forEach(deletetowerinsuranceform =>
        jQuery(deletetowerinsuranceform).validate({
          ignore: [],
          submitHandler: function (form, event) {
            event.preventDefault();

            const conf = confirm("Are you sure you want to delete?");
            conf ? form.submit() : "";

          },
          rules: {
            delete_tower: {
              digits: true,
              required: true
            },
            delete_insurance_company: {
              digits: true,
              required: true
            }
          }
        })
      )
    }
    if (deletetowertenantforms) {
      deletetowertenantforms.forEach(deletetowertenantform =>
        jQuery(deletetowertenantform).validate({
          ignore: [],
          submitHandler: function (form, event) {
            event.preventDefault();

            const conf = confirm("Are you sure you want to delete?");
            conf ? form.submit() : "";

          },
          rules: {
            delete_tower: {
              digits: true,
              required: true
            },
            delete_tenant: {
              digits: true,
              required: true
            }
          }
        })
      )
    }
    if (edittowerinsurancebutton) {

      edittowerinsurancebutton.forEach(btn => btn.addEventListener("click", EditTowerInsurance));

    }
    if (edittowertenantbutton) {
      edittowertenantbutton.forEach(btn => btn.addEventListener("click", EditTowerTenant));
    }
    if (edittowerauditbutton) {
      edittowerauditbutton.forEach(btn => btn.addEventListener("click", EditTowerAudit));
    }
    if (jQuery(insuranceaccordion)) {
      if (AddInsurance) {
        AddInsurance.addEventListener("click", (e) => jQuery(insuranceaccordion).collapse("show"))
      }
      if (resetinsurance) {
        resetinsurance.addEventListener("click", (e) => jQuery(insuranceaccordion).collapse("hide"))
      }
      jQuery(insuranceaccordion).on('show.bs.collapse', function (e) {
        // do something...
      });

      jQuery(insuranceaccordion).on('hide.bs.collapse', function (e) {
        // debugger
        _insurancemethod.name = "";
        _insurancemethod.value = "";
        insuranceform.action = `towers/addtowerinsurance/${towerid}?tab=step2`
        // do something...
        AddInsurance.textContent = "Add Insurance"
        saveinsurance.textContent = "Save"

        insurancecompany.selectedIndex = 0;
        insurancepolicy.selectedIndex = 0;
        insurancelimit.selectedIndex = 0;
        insurancepremium.value = "";

        const insuranceexpirydates = jQuery(insuranceexpirydate).flatpickr({
          altInput: true,
          altFormat: "F j, Y",
          dateFormat: "Y-m-d"
        });

        // console.log({insuranceformvalidation});
        insuranceformvalidation.resetForm();
        insuranceform.querySelectorAll('.form-group').forEach(formgroup => formgroup.classList.remove('is-invalid'));
        // insuranceform.innerHTML = children;
        // console.log(children);
        // children.forEach(child => insuranceform.appendChild(child));
      });
    }
    if (jQuery(auditaccordion)) {
      if (AddAudit) {
        AddAudit.addEventListener("click", (e) => jQuery(auditaccordion).collapse("show"))
      }
      if (resetaudit) {
        resetaudit.addEventListener("click", (e) => jQuery(auditaccordion).collapse("hide"))
      }
      jQuery(auditaccordion).on('show.bs.collapse', function (e) {

      });

      jQuery(auditaccordion).on('hide.bs.collapse', function (e) {
        // debugger
        _auditmethod.name = "";
        _auditmethod.value = "";
        auditform.action = `towers/addtowerauditschedule/${towerid}?tab=step5`
        AddAudit.textContent = "Add Audit Schedule"
        saveaudit.textContent = "Save Audit Schedule"
        audittypes.forEach(audittype => audittype.checked = false);

        searchauditagentname.value = "";
        hiddenauditagentname.value = 0

        const auditscheduledate = jQuery(auditschedule).flatpickr({
          altInput: true,
          altFormat: "F j, Y",
          dateFormat: "Y-m-d"
        });

        // console.log({insuranceformvalidation});
        auditformvalidation.resetForm();
        auditform.querySelectorAll('.form-group').forEach(formgroup => formgroup.classList.remove('is-invalid'));
        // insuranceform.innerHTML = children;
        // console.log(children);
        // children.forEach(child => insuranceform.appendChild(child));
      });
    }
    if (jQuery(tenantaccordion)) {
      if (AddTenant) {
        AddTenant.addEventListener("click", e => jQuery(tenantaccordion).collapse("show"))
      }
      if (resettenant) {
        resettenant.addEventListener("click", e => jQuery(tenantaccordion).collapse("hide"))
      }
      jQuery(tenantaccordion).on('hide.bs.collapse', function (e) {

        _tenantmethod.name = "";
        _tenantmethod.value = "";
        tenantform.action = `towers/addtowertenant/${towerid}?tab=step3`

        AddTenant.textContent = "Add Tenant"
        savetenant.textContent = "Save"

        searchantennamake.value = "";
        searchantennamodel.value = "";
        searchtenantname.value = "";
        hiddenantennamake.value = 0;
        hiddenantennamodel.value = 0;
        hiddenantennamake.value = 0;
        antennatype.selectedIndex = 0;
        configuration.value = "";

        tenantformvalidation.resetForm();
        tenantform.querySelectorAll('.form-group').forEach(formgroup => formgroup.classList.remove('is-invalid'));

      });
    }
    if (searchtenantname) {
      $(searchtenantname).autoComplete({
        source: async (term, suggest) => {
          hiddentenantname.value = 0;
          const tenant = await SearchTenant(term);
          const tenentname = await tenant.map((result) => ({ id: result.id, value: result.name, label: result.name }));
          suggest(await tenentname);
        },
        minChars: 2,
        onSelect: async (event, term, item, result) => {
          // debugger;

          console.log(result);
          hiddentenantname.value = await result.id;
        }
      })

    }
    if (searchantennamake) {
      $(searchantennamake).autoComplete({
        source: async (term, suggest) => {
          hiddenantennamake.value = 0;
          const antenna = await SearchAntennaMake(term);
          const antennamake = await antenna.map((result) => ({ id: result.id, value: result.name, label: result.name }));

          suggest(await antennamake);
        },
        minChars: 2,
        onSelect: async (event, term, item, result) => {
          // debugger;
          console.log(item);
          hiddenantennamake.value = await result.id;
        }
      })
    }
    if (searchantennamodel) {
      $(searchantennamodel).autoComplete({
        source: async (term, suggest) => {
          hiddenantennamodel.value = 0;
          const antenna = await SearchAntennaModel(term);
          const antennamake = await antenna.map((result) => ({ id: result.id, value: result.name, label: result.name }));

          suggest(await antennamake);
        },
        minChars: 2,
        onSelect: async (event, term, item, result) => {
          // debugger;
          console.log(item);
          hiddenantennamake.value = await result.id;
        }
      })
    }
    if (searchmaintenanceagentname) {
      $(searchmaintenanceagentname).autoComplete({
        source: async (term, suggest) => {
          hiddenmaintenanceagentname.value = 0;
          agentncclicence.removeAttribute("readonly");
          const maintenanceagent = await SearchMaintenanceAgent(term),
            maintenanceagentname = await maintenanceagent.map((result) => ({ id: result.id, value: result.name, label: result.name, ncc_licence: result.ncc_licence }));

          suggest(await maintenanceagentname);
        },
        minChars: 2,
        renderItem: function (item, search, index) {
          // escape special characters
          search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
          var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
          return '<div class="autocomplete-suggestion" data-pos = "' + index + '" data-val="' + item.value + '">' + item.label.replace(re, "<b>$1</b>") + `<br><small>${item.ncc_licence}<small>` + '</div>';
        },
        onSelect: async (event, term, item, result) => {
          debugger;
          console.log(item);
          hiddenmaintenanceagentname.value = await result.id;
          agentncclicence.value = await result.ncc_licence
          agentncclicence.setAttribute("readonly", true);
        }
      })
    }
    const initiateMaintenance = () => {
      if (!searchmaintenanceaengineername.value) {
        $(searchmaintenanceaengineername).autoComplete({
          source: async (term, suggest) => {
            hiddenmaintenanceengineername.value = 0;
            const maintenanceengineer = await SearchMaintenanceEngineer(term),
              maintenanceengineername = await maintenanceengineer.map((result) => ({ id: result.id, value: result.name, label: result.name, maintenanceagent: result.maintenanceagent.name }));

            suggest(await maintenanceengineername);
          },
          minChars: 2,
          renderItem: function (item, search, index) {
            // escape special characters
            search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
            var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
            return '<div class="autocomplete-suggestion" data-pos = "' + index + '" data-val="' + item.value + '">' + item.label.replace(re, "<b>$1</b>") + `<br><small>${item.maintenanceagent}<small>` + '</div>';
          },
          onSelect: async (event, term, item, result) => {
            // debugger;
            console.log(item);
            hiddenmaintenanceagentname.value = await result.id;
          }
        })
      }
    }
    initiateMaintenance()
    if (resetmaintenance) {
      resetmaintenance.addEventListener('click', (e) => {
        e.preventDefault()
        try {
          const _maintenancemethod = maintenanceform.querySelector("input[name='_method']"),
            updatemaintenance = document.querySelector('.btn-update-maintenance');
          updatemaintenance.textContent = "Save maintenance information";
          updatemaintenance.classList.remove("ml-auto", "mr-3", "btn-update-maintenance");
          updatemaintenance.classList.add("m-auto");
          searchauditagentname.value = "";
          hiddenauditagentname.value = "";
          searchmaintenanceaengineername.removeAttribute("readonly");
          hiddenmaintenanceengineername.value = 0;
          searchmaintenanceaengineername.value = ""
          searchmaintenanceagentname.value = ""
          maintenanceschedule.selectedIndex = 0,
            agentncclicence.value = "";
          maintenanceformvalidation.resetForm();
          maintenanceform.querySelectorAll('.form-group').forEach(formgroup => formgroup.classList.remove('is-invalid'));
          maintenanceform.action = `/towers/addtowermaintenance/${addmaintenancetower.value}`;
          maintenanceform.removeChild(_maintenancemethod);
          resetmaintenance.parentElement.removeChild(resetmaintenance);
          initiateMaintenance()
        } catch (error) {

        }
      });
    }
    if (searchauditagentname) {
      $(searchauditagentname).autoComplete({
        source: async (term, suggest) => {
          hiddenmaintenanceengineername.value = 0;
          const auditagent = await SearcAuditAgent(term),
            auditagentname = await auditagent.map((result) => ({ id: result.id, value: result.name, label: result.name }));

          suggest(await auditagentname);
        },
        minChars: 2,
        onSelect: async (event, term, item, result) => {
          // debugger;
          console.log(item);
          hiddenauditagentname.value = await result.id;
        }
      })
    }
    if (powersuppliertypes) {
      // debugger
      powersuppliertypes.forEach(btn => btn.addEventListener("change", GetPowerSuppliersByPowerSourceType));
    }

  } catch (error) {
    console.error({ error })
  }
});
