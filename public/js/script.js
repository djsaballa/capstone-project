function loadDistricts3(districts_json) {
  var districts = districts_json;
  // Get the selected division ID
  var division = document.getElementById('division-filter-3');
  var division_id = division.options[division.selectedIndex].value;

  // Get the "District" dropdown
  var district_dropdown = document.getElementById('district-filter-3');
  
  // Filter the districts based on the selected division
  var filtered_districts = districts.filter(function(district) {
      return district.division_id == division_id;
  });
  
  // Generate the options for the "District" dropdown
  var district_options = '<option value="" selected disabled>Select District</option>';
  for (var i = 0; i < filtered_districts.length; i++) {
      var district = filtered_districts[i];
      district_options += '<option value="' + district.id + '">' + district.district + '</option>';
  }
  
  // Update the "District" dropdown with the new options
  district_dropdown.innerHTML = (district_options += '<option value=""> N/A </option>' );
  district_dropdown.disabled = false;
}

function loadLocales3(locales_json) {
  var locales = locales_json;
  // Get the selected category ID
  var district = document.getElementById('district-filter-3');
  var district_id = district.options[district.selectedIndex].value;

  // Get the "Locale" dropdown
  var locale_dropdown = document.getElementById('locale-filter-3');

  // Filter the locales based on the selected district
  var filtered_locales = locales.filter(function(locale) {
      return locale.district_id == district_id;
  });

  // Generate the options for the "Locale" dropdown
  var locale_options = '<option value="" selected disabled>Select Locale</option>';
  for (var i = 0; i < filtered_locales.length; i++) {
      var locale = filtered_locales[i];
      locale_options += '<option value="' + locale.id + '">' + locale.locale + '</option>';
  }

  // Update the "Locale" dropdown with the new options
  locale_dropdown.innerHTML = (locale_options += '<option value=""> N/A </option>' );
  locale_dropdown.disabled = false;
}

function loadLocales2(locales_json) {
  var locales = locales_json;
  // Get the selected category ID
  var district = document.getElementById('district-filter-2');
  var district_id = district.options[district.selectedIndex].value;

  // Get the "Locale" dropdown
  var locale_dropdown = document.getElementById('locale-filter-2');

  // Filter the locales based on the selected district
  var filtered_locales = locales.filter(function(locale) {
      return locale.district_id == district_id;
  });

  // Generate the options for the "Locale" dropdown
  var locale_options = '<option value="" selected disabled>Select Locale</option>';
  for (var i = 0; i < filtered_locales.length; i++) {
      var locale = filtered_locales[i];
      locale_options += '<option value="' + locale.id + '">' + locale.locale + '</option>';
  }

  // Update the "Locale" dropdown with the new options
  locale_dropdown.innerHTML = (locale_options += '<option value=""> N/A </option>' );
  locale_dropdown.disabled = false;
}

function filter3Profiles(user_id) {
  var locale = document.getElementById('locale-filter-3');
  var locale_id = locale.options[locale.selectedIndex].value;
  
  var district = document.getElementById('district-filter-3');
  var district_id = district.options[district.selectedIndex].value;
  
  var division = document.getElementById('division-filter-3');
  var division_id = division.options[division.selectedIndex].value;
  
  if(locale_id) {
    window.location.href = "/filter-locale-profiles/" + user_id + "/" + locale_id;
  } else if(district_id) {
    window.location.href = "/filter-district-profiles/" + user_id + "/" + district_id;
  } else if(division_id) {
    window.location.href = "/filter-division-profiles/" + user_id + "/" + division_id;
  }
}

function filter2Profiles(user_id) {
  var locale = document.getElementById('locale-filter-2');
  var locale_id = locale.options[locale.selectedIndex].value;

  var district = document.getElementById('district-filter-2');
  var district_id = district.options[district.selectedIndex].value;
    
  if(locale_id) {
    window.location.href = "/filter-locale-profiles/" + user_id + "/" + locale_id;
  } else if(district_id) {
    window.location.href = "/filter-district-profiles/" + user_id + "/" + district_id;
  }
}

function filter1Profiles(user_id) {
  var locale = document.getElementById('locale-filter-1');
  var locale_id = locale.options[locale.selectedIndex].value;
    
  if(locale_id) {
    window.location.href = "/filter-locale-profiles/" + user_id + "/" + locale_id;
  }
}

function filter3ProfilesArchive(user_id) {
  var locale = document.getElementById('locale-filter-3');
  var locale_id = locale.options[locale.selectedIndex].value;
  
  var district = document.getElementById('district-filter-3');
  var district_id = district.options[district.selectedIndex].value;
  
  var division = document.getElementById('division-filter-3');
  var division_id = division.options[division.selectedIndex].value;
  
  if(locale_id) {
    window.location.href = "/filter-locale-profiles-archive/" + user_id + "/" + locale_id;
  } else if(district_id) {
    window.location.href = "/filter-district-profiles-archive/" + user_id + "/" + district_id;
  } else if(division_id) {
    window.location.href = "/filter-division-profiles-archive/" + user_id + "/" + division_id;
  }
}

function filter2ProfilesArchive(user_id) {
  var locale = document.getElementById('locale-filter-2');
  var locale_id = locale.options[locale.selectedIndex].value;
  
  var district = document.getElementById('district-filter-2');
  var district_id = district.options[district.selectedIndex].value;
  
  if(locale_id) {
    window.location.href = "/filter-locale-profiles-archive/" + user_id + "/" + locale_id;
  } else if(district_id) {
    window.location.href = "/filter-district-profiles-archive/" + user_id + "/" + district_id;
  } 
}

function filter1ProfilesArchive(user_id) {
  var locale = document.getElementById('locale-filter-1');
  var locale_id = locale.options[locale.selectedIndex].value;
 
  if(locale_id) {
    window.location.href = "/filter-locale-profiles-archive/" + user_id + "/" + locale_id;
  } 
}
