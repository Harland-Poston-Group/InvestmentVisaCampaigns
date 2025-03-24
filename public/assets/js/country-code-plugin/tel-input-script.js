/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************************************!*\
  !*** ./resources/js/country-code-plugin/tel-input-script.js ***!
  \**************************************************************/
/* Phone Number Country Code Extension for phone number inputs in forms so we can collect them */

// var globalCountryAbbrElement = $("#global_country_abbr");
// var globalCountryAbbrValue;

// if( globalCountryAbbrElement.length ){
//     globalCountryAbbrValue = globalCountryAbbrElement.data('value');
// }else{
//     globalCountryAbbrValue = 'auto';
// }

// console.log(globalCountryAbbrValue);

// $(document).ready(function () {
jQuery(function() {
  var form = $('form');

  // Insert the hidden input for the country code extension
  if (form.length > 0) {
    var element = '<div style="opacity: 0; height: 0; overflow: hidden;">\
            <label for="country_code">Extension Phone Number</label>\
            <input id="country_code" type="text" class="extension-input" name="country_code" value="">\
        </div>';

    // var element = '<input type="hidden" class="extension-input" name="country_code" value="">';

    form.append(element);
  }

  // Fetch geolocation data only once
  var geoDataPromise = fetchGeoData();

  // Iterate over each .phone-number-extension input
  $('.phone-number-extension').each(function () {
    var input = this;
    var countryCallingCode;
    var iti = window.intlTelInput(input, {
      initialCountry: "auto",
      // Automatically select the user's country based on their IP address
      separateDialCode: true // Show the country code separately in the input field
    });

    // Use the fetched data once it's available
    geoDataPromise.then(function (data) {

        // ipgeolocation.io
        if (data.country_code2) {
            iti.setCountry(data.country_code2.toUpperCase()); // Set country code based on response
            $(input).closest('form').find('.extension-input').attr('value', data.calling_code);

        // ipapi.co
        } else if (data.country) {
            iti.setCountry(data.country.toUpperCase()); // Set country code based on response
            $(input).closest('form').find('.extension-input').attr('value', data.country_calling_code);

        } else {
            console.log(data);
            console.warn("Unable to determine country code from API response.");
        }

    })["catch"](function (error) {
      console.error("Error fetching geolocation data:", error);
    });

    $(input).on("countrychange", function () {

        console.log("The user changed the selected country");
        /* I'll comment the rest of the code as it may be useful to know specifically the country the person selected */
        countryCallingCode = $(this).siblings('.iti__flag-container').find('.iti__selected-flag').attr('title');
        // countryCallingCode = countryCallingCode.replace(/[^0-9]/g,'');
        // countryCallingCode = "+"+countryCallingCode;

        // Emptying the contact number whenever the person changes the country
        $(this).val("");
        $(this).attr('data-country-code', countryCallingCode);

        // Apply only to the extension input within this form and not other forms in the page
        var form = $(this).closest('form');
        if (form.find(".extension-input").length) {
        // $(".extension-input").attr('value', countryCallingCode);
        // form.find(".extension-input").val(countryCallingCode);
        form.find(".extension-input").attr('value', countryCallingCode);
        }

        //   console.log(countryCallingCode);
    });

  });

  // Function to fetch geolocation data with fallback
  function fetchGeoData() {
    return fetchPrimaryGeoData()["catch"](function () {
      return fetchFallbackGeoData();
    });
  }

    // Function to fetch geolocation data from primary API
    function fetchPrimaryGeoData() {
        return fetch('https://api.ipgeolocation.io/ipgeo?apiKey=55e4b1ac2c0b4e05ad22deb513fe9bcd').then(function (response) {
            if (response.status === 429) {
                console.warn("Received 429 status code from primary API");
                throw new Error("Rate limit exceeded");
            }
            return response.json();

        })["catch"](function (error) {
            console.error("Error fetching geolocation data from primary API:", error);
            throw error;
        });
    }

  // Function to fetch geolocation data from fallback API
  function fetchFallbackGeoData() {
    return fetch('https://ipapi.co/json/').then(function (response) {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })["catch"](function (error) {
      console.error("Error fetching geolocation data from fallback API:", error);
      throw error;
    });
  }

  ///////////////////////////////

  // var input = document.querySelector("#phone_number");
  // var inputJquery = $("#phone_number");
  // var countryCallingCode;
  // const iti = window.intlTelInput(input, {
  //     initialCountry: "auto", // Automatically select the user's country based on their IP address
  //     // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/utils.js",
  //     separateDialCode: true // Show the country code separately in the input field
  // });

  // fetch(`https://api.ipgeolocation.io/ipgeo?apiKey=55e4b1ac2c0b4e05ad22deb513fe9bcd`)
  // .then(response => response.json())
  // .then(data => {
  //     if (data.country_code2) {
  //         iti.setCountry(data.country_code2.toUpperCase()); // Set country code based on response
  //         jQuery('.extension-input').attr('value', data.calling_code)
  //         // alert('test');
  //     } else {
  //         console.warn("Unable to determine country code from API response.");
  //     }
  // })
  // .catch(error => console.error("Error fetching geolocation data:", error));

  // $(".contact-number").on("countrychange", function () {

  //     console.log("The user changed the selected country");
  //     /* I'll comment the rest of the code as it may be useful to know specifically the country the person selected */
  //     countryCallingCode = $(this).siblings('.iti__flag-container').find('.iti__selected-flag').attr('title');
  //     // countryCallingCode = countryCallingCode.replace(/[^0-9]/g,'');
  //     // countryCallingCode = "+"+countryCallingCode;

  //     // Emptying the contact number whenever the person changes the country
  //     $(this).val("");
  //     $(this).attr('data-country-code', countryCallingCode);

  //     // Apply only to the extension input within this form and not other forms in the page
  //     var form = $(this).closest('form');

  //     if( form.find(".extension-input").length ){
  //         // $(".extension-input").attr('value', countryCallingCode);
  //         // form.find(".extension-input").val(countryCallingCode);
  //         form.find(".extension-input").attr('value', countryCallingCode);
  //     }

  //  //   console.log(countryCallingCode);
  // })
});
/******/ })()
;