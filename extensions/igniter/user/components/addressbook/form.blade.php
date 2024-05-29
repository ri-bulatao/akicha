
<form
    method="POST"
    accept-charset="utf-8"
    data-request="{{ $submitAddressEventHandler }}"
    role="form"
    class="mb-3"
>
    <input
        type="hidden"
        name="address[address_id]"
        value="{{ set_value('address[address_id]', $address->address_id) }}"
    />
    <div class="form-group">
        <label>Address</label>
        <input
            type="text"
            name="address[address_1]"
            class="form-control"
            value="{{ set_value('address[address_1]', $address->address_1) }}"
        />
        {!! form_error('address.address_1', '<span class="text-danger">', '</span>') !!}
    </div>
    
        <input
            type="hidden"
            type="text"
            name="address[address_2]"
            class="form-control"
            value="{{ set_value('address[address_2]', $address->address_2) }}"
        />

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label>@lang('igniter.user::default.account.label_city')</label>
                <input
                    style="background: lightgray; cursor: not-allowed;"
                    type="text"
                    class="form-control"
                    name="address[city]"
                    value="{{ set_value('address[city]', $address->city) }}"
                    placeholder="@lang('igniter.user::default.account.label_city')"
                >
                {!! form_error('address.city', '<span class="text-danger">', '</span>') !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label>@lang('igniter.user::default.account.label_state')</label>
                <input
                    style="background: lightgray; cursor: not-allowed;"
                    type="text"
                    class="form-control"
                    value="{{ set_value('address[state]', $address->state) }}"
                    name="address[state]"
                    placeholder="@lang('igniter.user::default.account.label_state')"
                >
                {!! form_error('address.state', '<span class="text-danger">', '</span>') !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
                <label>@lang('igniter.user::default.account.label_postcode')</label>
                <input
                    style="background: lightgray; cursor: not-allowed;"
                    type="text"
                    class="form-control"
                    name="address[postcode]"
                    value="{{ set_value('address[postcode]', $address->postcode) }}"
                    placeholder="@lang('igniter.user::default.account.label_postcode')"
                >
                {!! form_error('address.postcode', '<span class="text-danger">', '</span>') !!}
            </div>
        </div>
    </div>

    <div class="form-group disabled">
        <label>@lang('igniter.user::default.account.label_country')</label>
        <select name="address[country_id]" class="form-select" default="168" style="background: lightgray; cursor: not-allowed;">
            @foreach (countries() as $key => $value)
                <option
                    value="{{ $key }}"
                    {!! $key == 168 ? ' selected="selected"' : '' !!}
                >{{ $value }}</option>
            @endforeach
        </select>
        {!! form_error('address.country', '<span class="text-danger">', '</span>') !!}
    </div>
    


    <div class="d-flex justify-content-between">
        <button
            type="submit"
            class="btn btn-primary"
        >@lang('igniter.user::default.account.button_update')</button>
        <a
            class="btn btn-light"
            href="{{ site_url('account/address') }}"
        >@lang('igniter.user::default.account.button_back')</a>
    </div>


    
</form>


<div id="google-map" style="height: 300px; width: 100%;"></div>

<script>
   // Define the map initialization function
function initialize() {

    // Initialize the map
    const map = new google.maps.Map(document.getElementById("google-map"), {
        center: { lat: 15.4816, lng: 120.6015 }, // Tarlac City, Philippines
        zoom: 13,
    });

    // Define bounds for Tarlac area
    const tarlacBounds = new google.maps.LatLngBounds(
        { lat: 15.4400, lng: 120.5000 }, // Southwest boundary
        { lat: 15.5200, lng: 120.7000 }  // Northeast boundary
    );

    // Create AdvancedMarkerElement
    const marker = new google.maps.Marker({
        map,
        position: map.getCenter(),
        draggable: true, // Allows the marker to be moved
    });

   // Keep marker within bounds
    google.maps.event.addListener(marker, "dragend", function () {
        let newPosition = marker.getPosition(); // Get the new marker position

        if (!tarlacBounds.contains(newPosition)) {
            // If marker is outside the bounds, move it back inside
            newPosition = tarlacBounds.getCenter(); // Alternatively, you can use the closest point within bounds
            marker.setPosition(newPosition);
            map.setCenter(newPosition);
            alert('Please set it inside Tarlac Area only. Thank you!');
        } else {
            map.setCenter(newPosition); // Center the map at the marker's new location

            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ location: newPosition }, (results, status) => {
                if (status === "OK" && results.length > 0) {
                    const place = results[0];
                    updateFormFields(place);
                } else {
                    console.error("Failed to get address for the new location.");
                }
            });
        }
    });

    // Function to update form fields with address components
    function updateFormFields(place) {
        const addressComponents = place.address_components;

        const getComponent = (type) => {
            const component = addressComponents.find((c) => c.types.includes(type));
            return component ? component.long_name : "";
        };
         // Set latitude and longitude
        const latitude = place.geometry.location.lat(); // Get latitude
        const longitude = place.geometry.location.lng(); // Get longitude

        document.querySelector('input[name="address[address_2]"]').value = `${latitude}, ${longitude}`; // Set lat, lng in address_2
        document.querySelector('input[name="address[address_1]"]').value = getComponent("street_number") + " " + getComponent("route");
        document.querySelector('input[name="address[city]"]').value = getComponent("locality") ?? "Tarlac City";
        document.querySelector('input[name="address[state]"]').value = getComponent("administrative_area_level_1") ?? "Central Luzon";
        document.querySelector('input[name="address[postcode]"]').value = getComponent("postal_code") ?? 2300;
    }
}

initialize();

</script>