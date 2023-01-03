__ = _ || window.lodash // make sure lodash is defined so plugins like gutenberg don't break it.
const i18n = zumeBase.translations;

jQuery(document).ready(function(){

  function write_request_form() {
    let fields = zumeBase.user_profile_fields
    if ( ! zumeBase.logged_in ) {
      window.location = `${zumeBase.site_urls.login}`
    } else { /* logged in */

      let location_grid_meta_label = ''
      if (fields.location_grid_meta) {
        window.location_grid_meta = fields.location_grid_meta
        window.mapbox_results = false
        location_grid_meta_label = fields.location_grid_meta.label
      } else {
        window.location_grid_meta = false
        window.mapbox_results = false
        location_grid_meta_label = ''
      }

      let languages = ''
      jQuery.each( zumeBase.languages, function( i, v ){
        languages += '<option value="'+v.code+'">'+v.enDisplayName + ' - ' + v.nativeName+'</option>'
      })

      jQuery('#form-container').empty().html(`
  <form id="coaching-request-form" data-abide>
      <div data-abide-error class="alert callout" style="display: none;">
          <p><i class="fi-alert"></i> ${__.escape( i18n.str.x70 )/*There are some errors in your form.*/}</p>
      </div>
      <table class="request-form">
          <tr style="vertical-align: top;">
              <td>
                  <label for="zume_full_name">${__.escape( i18n.str.x71 )/*Name*/}</label>
              </td>
              <td>
                  <input type="text"
                         placeholder="${__.escape( i18n.str.x72 )/*First and last name*/}"
                         aria-describedby="${__.escape( i18n.str.x72 )/*First and last name*/}"
                         class="profile-input"
                         id="zume_full_name"
                         name="zume_full_name"
                         value="${__.escape(fields.name)}"
                         required />
              </td>
          </tr>
          <tr>
              <td style="vertical-align: top;">
                  <label for="zume_phone_number">${__.escape( i18n.str.x73 )/*Phone Number*/}</label>
              </td>
              <td>
                  <input type="tel"
                         placeholder="111-111-1111"
                         class="profile-input"
                         id="zume_phone_number"
                         name="zume_phone_number"
                         value="${__.escape(fields.phone)}"
                         required
                  />
              </td>
          </tr>
          <tr>
              <td style="vertical-align: top;">
                  <label for="user_email">${__.escape( i18n.str.x74 )/*Email*/}</label>
              </td>
              <td>
                  <input type="text"
                         class="profile-input"
                         placeholder="name@email.com"
                         id="user_email"
                         name="user_email"
                         value="${__.escape(fields.email)}"
                         required
                         readonly
                  />
                  <span class="form-error">
                     ${__.escape( i18n.str.x75 )/*Email is required.*/}
                  </span>
              </td>
          </tr>

          <tr>
              <td style="vertical-align: top;">
                  <label for="validate_address">
                      ${__.escape( i18n.str.x76 )/*City*/}
                  </label>
              </td>
              <td>
                <div class="input-group">
                    <input type="text"
                           placeholder="${__.escape( i18n.str.x77 )/*What is your city or state or postal code?*/}"
                           class="profile-input input-group-field"
                           id="validate_address"
                           name="validate_address"
                           value="${__.escape(location_grid_meta_label)}"
                           onkeyup="validate_timer(jQuery(this).val())"
                           required
                    />
                    <div class="input-group-button">
                        <button class="button hollow" id="spinner_button" style="display:none;"><img src="${zumeBase.theme_uri}/assets/images/spinner.svg" alt="spinner" style="width: 18px;" /></button>
                    </div>
                </div>

                <div id="possible-results">
                    <input type="radio" style="display:none;" name="zume_user_address" id="zume_user_address" value="current" checked/>
                </div>
            </td>
          </tr>
          <tr>
              <td style="vertical-align: top;">
                  <label>${__.escape( i18n.str.x78 )/*How should we contact you?*/}</label>
              </td>
              <td>
                  <fieldset>
                      <input id="zume_contact_preference1" name="zume_contact_preference" class="zume_contact_preference" type="radio" value="email" checked data-abide-ignore>
                      <label for="zume_contact_preference1">${__.escape( i18n.str.x74 )/*Email*/}</label>
                      <input id="zume_contact_preference2" name="zume_contact_preference" class="zume_contact_preference" type="radio" value="text" data-abide-ignore>
                      <label for="zume_contact_preference2">${__.escape( i18n.str.x79 )/*Text*/}</label>
                      <input id="zume_contact_preference3" name="zume_contact_preference" class="zume_contact_preference" type="radio" value="phone" data-abide-ignore>
                      <label for="zume_contact_preference3">${__.escape( i18n.str.x80 )/*Phone*/}</label>
                      <input id="zume_contact_preference4" name="zume_contact_preference" class="zume_contact_preference" type="radio" value="whatsapp" data-abide-ignore>
                      <label for="zume_contact_preference4">${__.escape( i18n.str.x81 )/*WhatsApp*/}</label>
                      <input id="zume_contact_preference5" name="zume_contact_preference" class="zume_contact_preference" type="radio" value="other" data-abide-ignore>
                      <label for="zume_contact_preference6">${__.escape( i18n.str.x82 )/*Other*/}</label>
                  </fieldset>
              </td>
          </tr>
          <tr>
              <td style="vertical-align: top;">
                  <label for="zume_affiliation_key">Language Preference</label>
              </td>
              <td>
                  <select id="language_preference">
                    <option value="${zumeBase.current_language}">${zumeBase.current_language_name}</option>
                    <option disabled>----</option>
                    ${languages}
                  </select>
              </td>
          </tr>
          <tr>
              <td style="vertical-align: top;">
                  <label for="zume_affiliation_key">${__.escape( i18n.str.x83 )/*Affiliation Notes*/}</label>
              </td>
              <td>
                  <input type="text" value="${fields.affiliation_key}"
                         id="zume_affiliation_key"
                         name="zume_affiliation_key" placeholder="" />
              </td>
          </tr>
          <tr>
              <td style="vertical-align: top;">
                  <label for="zume_coaching_preference">${__.escape( i18n.str.x96 )/*Affiliation Notes*/}</label>
              </td>
              <td>
                  <fieldset>
                      <label>
                          <input name="zume_coaching_preference" class="zume_coaching_preference" type="checkbox" value="coaching" checked data-abide-ignore>
                          <span id="zume_coaching_preference_coaching">${__.escape( i18n.str.x97 )/*I want to be coached.*/}</span>
                      </label>
                      <label>
                          <input name="zume_coaching_preference" class="zume_coaching_preference" type="checkbox" value="technical_assistance" data-abide-ignore>
                          <span id="zume_coaching_preference_technical_assistance">${__.escape( i18n.str.x98 )/*I need technical assistance.*/}</span>
                      </label>
                      <label>
                          <input name="zume_coaching_preference" class="zume_coaching_preference" type="checkbox" value="advice_on_implementation" data-abide-ignore>
                          <span id="zume_coaching_preference_advice_on_implementation">${__.escape( i18n.str.x99 )/*I've gone through the training but need advice on implementation.*/}</span>
                      </label>
                      <label>
                          <input name="zume_coaching_preference" class="zume_coaching_preference" type="checkbox" value="content_question" data-abide-ignore>
                          <span id="zume_coaching_preference_content_question">${__.escape( i18n.str.x100 )/*I have a question about the content that I need to talk to somebody else about.*/}</span>
                      </label>
                      <label>
                          <input name="zume_coaching_preference" class="zume_coaching_preference" type="checkbox" value="group_started" data-abide-ignore>
                          <span id="zume_coaching_preference_group_started">${__.escape( i18n.str.x101 )/*I have a group started and need to know where do I go next.*/}</span>
                      </label>
                      <label style="display: flex; align-items:center">
                          <input name="zume_coaching_preference" class="zume_coaching_preference" type="checkbox" value="other" data-abide-ignore style="margin-bottom:2px;margin-top:0">
                          <div style="margin-inline-end:10px; margin-inline-start: 2px">
                            <span id="zume_coaching_preference_other">${__.escape( i18n.str.x102 )/*Other.*/}:</span>
                          </div>
                          <input name="zume_coaching_preference_other_text" id="zume_coaching_preference_other_text" type="text" style="display:inline-block; margin-bottom: 0">
                      </label>
                  </fieldset>
              </td>
        </tr>
      </table>
      <div data-abide-error  class="alert alert-box" style="display:none;" id="alert">
          <strong>${__.escape( i18n.str.x90 )/*Oh snap!*/}</strong>
      </div>
      <div class="cell request-form">
           <p>${__.escape( i18n.str.x84 )/*On submitting this request, we will do our best to connect you with a coach near you.*/}</p>
          <button class="button" type="button" onclick="load_form_validator()" id="submit_request">${__.escape( i18n.str.x85 )/*Submit*/}</button> <span id="request_spinner"></span>
      </div>
  </form>
  `)

      jQuery('.request-form').show()

      var elem = new Foundation.Abide(jQuery('#coaching-request-form'))

      let validate_address_textbox = jQuery('#validate_address')

      validate_address_textbox.keyup(function () {
        check_address()
      });

      validate_address_textbox.on('keypress', function (e) {
        if (e.which === 13) {
          validate_user_address_v4(validate_address_textbox.val())
          clear_timer()
        }
      });

      jQuery(document)
        .on("formvalid.zf.abide", function (ev, frm) {
          send_coaching_request()
        })
    }
  }

  function write_coaching_status() {
    let fields = zumeBase.user_profile_fields.zume_global_network
    jQuery('#already-submitted').empty().html(`
  <hr>
  <h3 class="center">${__.escape( i18n.str.x86 )/*You have requested coaching.*/}</h3>
  <hr>
  `)
  }

// delay location lookup
  window.validate_timer_id = '';
  function validate_timer(user_address) {
    // clear previous timer
    clear_timer()

    // toggle buttons
    jQuery('#validate_address_button').hide()
    jQuery('#spinner_button').show()

    // set timer
    window.validate_timer_id = setTimeout(function(){
      // call geocoder
      validate_user_address_v4(user_address)
      // toggle buttons back
      jQuery('#validate_address_button').show()
      jQuery('#spinner_button').hide()
    }, 1500);
  }
  function clear_timer() {
    clearTimeout(window.validate_timer_id);
  }
// end delay location lookup

  function validate_user_address_v4(user_address){

    if ( user_address.length < 1 ) {
      return;
    }

    let root = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'
    let settings = '.json?types=country,region,postcode,district,place,locality,neighborhood,address&limit=6&access_token='
    let key = zumeBase.map_key

    let url = root + encodeURI( user_address ) + settings + key

    jQuery.get( url, function( data ) {

      let possible_results = jQuery('#possible-results')
      possible_results.empty().append(`<fieldset id="multiple-results"></fieldset>`)
      let multiple_results = jQuery('#multiple-results')

      if( data.features.length < 1 ) {
        multiple_results.empty().append(`${__.escape( i18n.str.x87 )/*No location matches found. Try a less specific address.*/}`)
      }

      // Set globals
      // console.log(data)
      window.location_grid_meta = false
      window.mapbox_results = data

      // loop results
      jQuery.each( data.features, function( index, value ) {
        let checked = ''
        if( index === 0 ) {
          checked = 'checked'
        }
        multiple_results.append( `<input type="radio" name="zume_user_address" id="zume_user_address${__.escape( index )}" value="${__.escape( value.id )}" ${__.escape( checked )} /><label for="zume_user_address${__.escape( index )}">${__.escape( value.place_name )}</label><br>`)
      })

      // add responsive click event to populate text area, if selection is clicked. Expected user feedback.
      jQuery('#multiple-results input').on('click', function( ) {
        let selected_id = jQuery(this).val()
        jQuery.each( window.mapbox_results.features, function(i,v) {
          if ( v.id === selected_id ) {
            jQuery('#validate_address').val(__.escape( v.place_name ))
          }
        })
      })

      // enable save button if not already enabled
      jQuery('#submit_request').removeAttr('disabled')

    }); // end get request
  } // end validate_user_address

  function load_form_validator() {
    jQuery('#coaching-request-form').foundation('validateForm');
  }
  function check_address(key) {

    let fields = zumeBase.user_profile_fields
    let default_address = ''
    if ( fields.location_grid_meta ) {
      default_address = fields.location_grid_meta.label
    }
    let val_address = jQuery('#validate_address').val()
    let results_address = jQuery('#multiple-results').length

    if (val_address === default_address) // exactly same values
    {
      jQuery('#submit_request').removeAttr('disabled')
    }
    else if (results_address) // check if fieldset exists by validation
    {
      jQuery('#submit_request').removeAttr('disabled')
    }
    else if (val_address.length === 0) // check if fieldset exists by validation
    {
      jQuery('#submit_request').removeAttr('disabled')
    }
    else {
      jQuery('#submit_request').attr('disabled', 'disabled')
    }
  }


  function send_coaching_request() {
    jQuery('#submit_request').prop('disabled', true )
    let spinner = jQuery('#request_spinner')
    spinner.html( `<img src="${zumeBase.theme_uri}/assets/images/spinner.svg" style="width: 40px; vertical-align:top; margin-left: 5px;" alt="spinner" />` )

    let name = jQuery('#zume_full_name').val()
    let phone = jQuery('#zume_phone_number').val()
    let email = jQuery('#user_email').val()
    let preference = jQuery('input.zume_contact_preference:checked').val()
    let language_preference = jQuery('#language_preference').val()
    let affiliation_key = jQuery('#zume_affiliation_key').val()
    let coaching_preferences = [];
    jQuery('.zume_coaching_preference:checked').each((i,v)=>{
      let value = jQuery(v).val()
      let text = jQuery('#zume_coaching_preference_' + value).text()
      if ( value === "other"){
        text += ' ' + jQuery('#zume_coaching_preference_other_text').val();
      }
      coaching_preferences.push( text )
    })

    /**************/
    // Get address
    let location_grid_meta = false // base is false
    let selection_id = jQuery('#possible-results input:checked').val()

    // check if location grid
    if ( window.location_grid_meta && selection_id === 'current' ) {
      location_grid_meta = window.location_grid_meta
    }
    // check if mapbox results
    else if ( window.mapbox_results ) {
      // loop through features
      jQuery.each( window.mapbox_results.features, function(i,v) {
        if ( v.id === selection_id ) {
          location_grid_meta = {
            lng: v.center[0],
            lat: v.center[1],
            level: v.place_type[0],
            label: v.place_name,
            source: 'user',
            grid_id: false
          }
        }
      })
    }
    /**************/

    let data = {
      "name": name,
      "phone": phone,
      "email": email,
      "location_grid_meta": location_grid_meta,
      "language_preference": language_preference,
      "preference": preference,
      "affiliation_key": affiliation_key,
      "coaching_preference": coaching_preferences.join(',\n'),
    }

    API.coaching_request( data ).done( function(data) {
      console.log('postsend')
      console.log(data)
      jQuery('#coaching-request-form').hide()
      write_coaching_status()
    })
      .fail(function(e){
        console.log('coach_request error')
        console.log(e)
        spinner.empty().html( `${i18n.str.x88/*Oops. Something went wrong. Try again!*/}`)
      })

    if (typeof window.movement_logging !== "undefined") {
      window.movement_logging({
        "action": "coaching",
        "category": "joining",
        "data-language_code": zumeBase.current_language,
        "data-language_name": zumeBase.current_language_name,
        "data-note": "is requesting coaching from Zúme coaches!"
      })
    }
  }
})
